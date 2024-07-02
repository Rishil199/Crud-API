<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostAddRequest;
use App\Http\Requests\PostUpdateRequest;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts  = Post::all();
        return response()->json([
            'message' => 'List of Posts',
            'posts' => $posts
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostAddRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->description= $request->description;
        $post->save();

        return response()->json([
            'message' => "Post created successfully",
            'post' => $post
        ],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json([
            'message' => 'Post displayed',
            'post' => $post
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->title = $request->title ?? $post->title;
        $post->description= $request->description ?? $post->content;
        $post->save();

        return response()->json([
            'message' => "Post updated successfully",
            'post' => $post
        ],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return response()->json([
            'message' => 'Post deleted successfully',
            'post' => $post->delete()
        ]);
    }
}
