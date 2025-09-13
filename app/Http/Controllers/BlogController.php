<?php
namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(6);
        return view('blogs.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $user = $blog->author;  // Load the author via the relationship
        return view('blogs.show', compact('blog', 'user'));
    }
}