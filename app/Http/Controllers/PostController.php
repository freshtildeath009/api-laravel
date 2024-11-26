<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestFields = $request->validate([
            'title' => 'required|max: 255',
            'description' => 'required',
            'technologies' => 'required',
        ]);

        $posts = Post::create($requestFields);
        return ['post' => $posts];
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return ['post' => $post];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $requestFields = $request->validate([
            'title' => 'required|max: 255',
            'description' => 'required',
            'technologies' => 'required',
        ]);

        $post->update($requestFields);
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return ['message' => 'Successfully delete!'];
    }
}
