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
        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        return response()->json($todo);
    }

    // Create a new todo
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'completed' => 'required|boolean',
            'user_id' => 'required|integer',
        ]);

        $todo = Todo::create($data);

        // dd($request->all());

        return response()->json($todo, 201);
    }

    // Update a todo
    public function update(Request $request, int $id): JsonResponse
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        $todo->update($request->only(['title', 'description', 'completed']));
        return response()->json($todo);
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully']);
    }
}
