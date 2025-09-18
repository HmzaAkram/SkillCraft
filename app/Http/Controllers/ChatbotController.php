<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    /**
     * Handle incoming chatbot messages and return AI response using Google Gemini 2.0 Flash.
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

        // System prompt to define the persona
        $systemPrompt = "You are SkillCrafter AI assistant, a helpful AI for personalized learning and skill development. You can help users understand our features, answer questions about skill building, course recommendations, learning paths, progress tracking, and provide general learning guidance. Respond professionally, concisely, and helpfully. Keep responses under 150 words. Always end by asking how else you can assist with their learning journey.";

        try {
            // Build conversation context for Gemini
            $messages = [];
            
            // Add system message
            $messages[] = [
                'role' => 'user',
                'parts' => [['text' => $systemPrompt]]
            ];
            $messages[] = [
                'role' => 'model',
                'parts' => [['text' => 'I understand. I am SkillCrafter AI assistant, ready to help with learning and skill development.']]
            ];

            // Add conversation history
            foreach ($history as $entry) {
                $messages[] = [
                    'role' => 'user',
                    'parts' => [['text' => $entry['user']]]
                ];
                $messages[] = [
                    'role' => 'model',
                    'parts' => [['text' => $entry['assistant']]]
                ];
            }

            // Add current user message
            $messages[] = [
                'role' => 'user',
                'parts' => [['text' => $userMessage]]
            ];

            // Make API call to Gemini
            $apiKey = env('GEMINI_API_KEY');
            $apiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash-exp:generateContent?key={$apiKey}";

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($apiUrl, [
                'contents' => $messages,
                'generationConfig' => [
                    'temperature' => 0.7,
                    'topK' => 40,
                    'topP' => 0.95,
                    'maxOutputTokens' => 200,
                    'stopSequences' => []
                ],
                'safetySettings' => [
                    [
                        'category' => 'HARM_CATEGORY_HARASSMENT',
                        'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'
                    ],
                    [
                        'category' => 'HARM_CATEGORY_HATE_SPEECH',
                        'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'
                    ],
                    [
                        'category' => 'HARM_CATEGORY_SEXUALLY_EXPLICIT',
                        'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'
                    ],
                    [
                        'category' => 'HARM_CATEGORY_DANGEROUS_CONTENT',
                        'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'
                    ]
                ]
            ]);

            if ($response->successful()) {
                $responseData = $response->json();
                
                if (isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
                    $aiResponse = $responseData['candidates'][0]['content']['parts'][0]['text'];
                } else {
                    $aiResponse = 'I apologize, but I encountered an issue generating a response. How can I help you with your learning goals?';
                }
            } else {
                // Log the error for debugging
                Log::error('Gemini API Error: ' . $response->body());
                $aiResponse = 'I\'m having trouble connecting to my knowledge base right now. Please try again in a moment, or feel free to explore our platform features!';
            }

        } catch (\Exception $e) {
            // Log the exception
            Log::error('Chatbot Exception: ' . $e->getMessage());
            $aiResponse = 'I encountered an unexpected error. Please try again, and I\'ll do my best to help you with your learning journey!';
        }

        // Update history (keep only last 10 exchanges to manage memory)
        $history[] = ['user' => $userMessage, 'assistant' => $aiResponse];
        if (count($history) > 10) {
            $history = array_slice($history, -10);
        }
        Session::put('chat_history', $history);

        return response()->json([
            'text' => $aiResponse,
            'time' => now()->format('H:i'),
        ]);
    }

    /**
     * Clear chat history
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function clearHistory()
    {
        Session::forget('chat_history');
        return response()->json(['message' => 'Chat history cleared']);
    }
}