<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    // Get all posts
    public function index(): JsonResponse
    {
        return response()->json(Post::all());
    }

    // Get post by id
    public function show(int $id)
    {
        $post = Post::find($id);

        return $post
            ? response()->json($post)
            : response()->json(['message' => 'Post not found'], 404);
    }

    // Create a new post
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'user_id' => 'required|integer',
        ]);

        $post = Post::create($data);

        return response()->json($post, 201);
    }

    // Update a post
    public function update(Request $request, int $id)
    {
        $data = $this->validate($request, [
            'title' => 'sometimes|required|string|max:255',
            'body' => 'sometimes|required|string',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $post = Post::findOrFail($id);
        $post->update($data);

        return response()->json($post);
    }

    // Delete a post
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) return response()->json(['message' => 'Post not found'], 404);

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
