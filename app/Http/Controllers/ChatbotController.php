<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ChatbotController extends Controller
{
    /**
     * Handle incoming chatbot messages and return AI response using Hugging Face API.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->input('message');

        // Retrieve or initialize conversation history from session
        $history = Session::get('chat_history', []);

        // System prompt to define the persona (matching the image's style)
        $systemPrompt = "You are TalkToText Pro assistant, a helpful AI for meeting productivity. You can help users understand our features, answer questions about meeting transcriptions, or summarize meeting content. Respond professionally, concisely, and helpfully. Always end by asking how else you can assist.";

        // Format history for the model (Mistral-Instruct uses [INST] for system/user, [/INST] for assistant)
        $formattedHistory = "[INST] $systemPrompt [/INST]\n";
        foreach ($history as $entry) {
            $formattedHistory .= "[INST] {$entry['user']} [/INST] {$entry['assistant']}\n";
        }
        $formattedInput = $formattedHistory . "[INST] $userMessage [/INST]";

        // Detect if this is a summarization request (e.g., for meeting transcripts)
        if (stripos($userMessage, 'summarize') !== false || stripos($userMessage, 'meeting') !== false || stripos($userMessage, 'transcript') !== false) {
            // Use a specialized summarization model for better results
            $apiUrl = 'https://api-inference.huggingface.co/models/knkarthick/MEETING_SUMMARY'; // Fine-tuned for meetings
            $inputs = $userMessage; // For summarization, pass raw text to summarize
        } else {
            // Use conversational model
            $apiUrl = 'https://api-inference.huggingface.co/models/mistralai/Mistral-7B-Instruct-v0.3';
            $inputs = $formattedInput;
        }

        $apiKey = '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'; // Your API key

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post($apiUrl, [
            'inputs' => $inputs,
            'parameters' => [
                'max_length' => 300, // Increased for better summaries
                'num_return_sequences' => 1,
                'temperature' => 0.7, // For natural responses
            ],
        ]);

        if ($response->successful()) {
            $aiResponse = $response->json()[0]['generated_text'] ?? 'Sorry, I couldn\'t generate a response.';
            // Clean up the response (remove prompt echo if present)
            $aiResponse = trim(str_replace($formattedInput, '', $aiResponse));
        } else {
            $aiResponse = 'Sorry, there was an issue with the AI service. Please try again later.';
        }

        // Update history
        $history[] = ['user' => $userMessage, 'assistant' => $aiResponse];
        Session::put('chat_history', $history);

        return response()->json([
            'text' => $aiResponse,
            'time' => now()->format('H:i'),
        ]);
    }
}