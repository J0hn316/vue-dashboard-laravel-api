<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TodoController extends Controller
{
    // Get all todos
    public function index(): JsonResponse
    {
        return response()->json(Todo::all());
    }

    // Get a todo by id
    public function show(int $id): JsonResponse
    {
        $todo = Todo::find($id);

        return $todo
            ? response()->json($todo)
            : response()->json(['message' => 'Todo not found'], 404);
    }

    // Create a new todo
    public function store(Request $request): JsonResponse
    {
        // Get the authenticated user
        $user = $request->user();

        if (!$user) return response()->json(['message' => 'Unauthorized'], 401);

        // Validate the incoming request (no need to include user_id here)
        $data = $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
        ]);

        // Attach the authenticated user's ID
        $data['user_id'] = $user->id;

        $todo = Todo::create($data);

        return response()->json($todo, 201);
    }

    // Update a todo
    public function update(Request $request, int $id): JsonResponse
    {
        $data = $this->validate($request, [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'completed' => 'sometimes|boolean',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update($data);

        return response()->json($todo);
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);

        if (!$todo) return response()->json(['message' => 'Todo not found'], 404);

        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully']);
    }
}
