<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function index()
    {
        $reply = session('reply', null);
        return view('chatbot', compact('reply'));
    }

    public function message(Request $request)
    {
        $message = $request->input('message');
        $hfApiKey = env('HF_API_KEY');

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $hfApiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api-inference.huggingface.co/models/microsoft/DialoGPT-small', [
                'inputs' => $message
            ]);

            if (!$response->successful()) {
                $reply = "❌ API Error: " . $response->status() . "\n" . $response->body();
            } else {
                $data = $response->json();
                $reply = $data[0]['generated_text'] ?? '⚠️ No reply from HuggingFace model.';
            }
        } catch (\Exception $e) {
            $reply = "❌ Exception: " . $e->getMessage();
        }

        return redirect()->route('chatbot')->with('reply', $reply);
    }
}
