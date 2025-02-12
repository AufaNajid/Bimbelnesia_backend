<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchivementController extends Controller
{
    public function index()
    {
        return Achievement::with('user')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'achievement' => 'required|string|max:255',
            'score' => 'required|integer',
        ]);

        $achievement = Achievement::create($validated);
        return response()->json($achievement, 201);
    }

    public function show($id)
    {
        $achievement = Achievement::with('user')->findOrFail($id);
        return response()->json($achievement);
    }

    public function update(Request $request, $id)
    {
        $achievement = Achievement::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'exists:users,user_id',
            'achievement' => 'string|max:255',
            'score' => 'integer',
        ]);

        $achievement->update($validated);
        return response()->json($achievement);
    }

    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();

        return response()->json(['message' => 'Achievement deleted successfully']);
    }
}
