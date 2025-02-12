<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        return Plan::with('user')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $plan = Plan::create($validated);
        return response()->json($plan, 201);
    }

    public function show($id)
    {
        $plan = Plan::with('user')->findOrFail($id);
        return response()->json($plan);
    }

    public function update(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'exists:users,user_id',
            'title' => 'string|max:255',
            'description' => 'nullable|string',
            'date' => 'date',
        ]);

        $plan->update($validated);
        return response()->json($plan);
    }

    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();

        return response()->json(['message' => 'Plan deleted successfully']);
    }
}
