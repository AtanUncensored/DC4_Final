<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'List data post',
            'data' => $posts
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255'
        ]);
        $posts = Post::create([
            'task' => $request->task,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post created',
            'data' => $posts
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return response()->json([
            'success' => true,
            'message' => 'Detail data post',
            'data' => $post
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);
        $post = Post::find($post->id);

        if ($post) {
            $post->update([
                'task' => $request->task,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Post updated',
                'data' => $post
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Post not found'
        ], 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post) {
            $post->delete();

            return response()->json([
                'success' => true,
                'message' => 'Post deleted'
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Post not found'
        ], 404);
    }
}
