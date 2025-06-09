<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Get all users
    public function index(): JsonResponse
    {
        return response()->json(User::all());
    }

    // Get user by id
    public function show(int $id)
    {
        $user = User::find($id);
        return $user
            ? response()->json($user)
            : response()->json(['message' => 'User not found'], 404);
    }

    // Create new user
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Hash password
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        return response()->json($user, 201);
    }

    // Update user
    public function update(Request $request, int $id): JsonResponse
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);

        $data = $request->only(['name', 'email']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        return response()->json($user);
    }

    // Delete user
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);

        $user->delete();
        return response()->json(['message' => 'User deleted']);
    }
}
