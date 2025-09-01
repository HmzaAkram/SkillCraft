<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ChatbotController extends Controller
{
  
public function index()
{
    $history = session('chat_history', []);
    
    if (empty($history)) {
        $history[] = [
            'role' => 'assistant',
            'content' => "Hello! I'm SkillCrafter AI. How can I assist you with your skill development today?"
        ];
        session(['chat_history' => $history]);
    }

    // ✅ User name check
    $userName = Auth::check() ? Auth::user()->name : 'Guest';

    return view('chatbot', [
        'history' => $history,
        'userName' => $userName
    ]);
}

    public function message(Request $request)
    {
        $message = $request->input('message');
        $userName = $request->user() ? $request->user()->name : 'Guest';
        $hfApiKey = env('HF_API_KEY');

        $history = session('chat_history', []);
        $history[] = ['role' => 'user', 'content' => $message];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $hfApiKey,
                'Content-Type' => 'application/json',
            ])->post('https://router.huggingface.co/v1/chat/completions', [
                'model' => 'meta-llama/Llama-3.1-8B-Instruct',
                'messages' => $history,
                'max_tokens' => 500,
                'stream' => false,
            ]);

            if (!$response->successful()) {
                $reply = "❌ API Error: " . $response->status() . "\n" . $response->body();
            } else {
                $data = $response->json();
                $reply = $data['choices'][0]['message']['content'] ?? '⚠️ No reply from HuggingFace model.';
            }
        } catch (\Exception $e) {
            $reply = "❌ Exception: " . $e->getMessage();
        }

        $history[] = ['role' => 'assistant', 'content' => $reply];
        session(['chat_history' => $history]);
        session(['user_name' => $userName]);

        return redirect()->route('chatbot');
    }
}