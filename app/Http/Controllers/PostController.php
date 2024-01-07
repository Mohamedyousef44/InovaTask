<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        // Validation logic for creating a new post
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        // Create a new post
        $post = Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => $request->input('user_id'),
        ]);

        return response()->json($post, 201);
    }

    public function userPosts($user)
    {
        $userPosts = Post::where('user_id', $user)->paginate(10);
        return response()->json($userPosts);
    }

    public function listTopPosts()
    {
        $topPosts = Post::join('reviews', 'posts.id', '=', 'reviews.post_id')
            ->select('posts.*', \DB::raw('AVG(reviews.rating) as avg_rating'))
            ->groupBy('posts.id')
            ->orderByDesc('avg_rating')
            ->paginate(10);

        return response()->json($topPosts);
    }
}
