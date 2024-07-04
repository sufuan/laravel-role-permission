<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->posts;
        return view('dashboard', compact('posts'));
    }

    public function create()
    {
        return view('create_post');
    }

    public function storeDefault()
    {
        $user = Auth::user();

        if ($user->posts()->exists()) {
            return redirect()->route('dashboard')->with('error', 'You already have a post.');
        }

        Post::create([
            'title' => 'post title',
            'description' => 'post des',
            'post_status' => 'pending',
            'user_id' => $user->id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Default post created successfully.');
    }

    public function storeForm(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $user = Auth::user();

        if ($user->posts()->exists()) {
            return redirect()->route('dashboard')->with('error', 'You already have a post.');
        }

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'post_status' => 'pending',
            'user_id' => $user->id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Post created successfully.');
    }

    public function updateStatus(Request $request, Post $post)
    {
        $request->validate([
            'post_status' => 'required|in:pending,published'
        ]);

        $post->post_status = $request->post_status;
        $post->save();

        return redirect()->route('dashboard')->with('success', 'Post status updated successfully!');
    }
}
