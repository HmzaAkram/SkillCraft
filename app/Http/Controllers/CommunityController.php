<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;

class CommunityController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments')->latest()->paginate(10);
        return view('community', compact('posts'));
    }

public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'type' => 'required|string|in:question,project,discussion',
        ]);

        Post::create([
            'user_id' => Auth::id(), // Ensure user_id is set
            'title' => $request->title,
            'body' => $request->body,
            'type' => $request->type,
        ]);

        return redirect()->route('community')->with('success', 'Post created!');
    }

   public function storeComment(Request $request, $postId)
    {
        $request->validate(['body' => 'required|string']);

        Comment::create([
            'user_id' => Auth::id(), // Set the authenticated user's ID
            'post_id' => $postId,    // Set the post ID from the route
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Comment added!');
    }
}