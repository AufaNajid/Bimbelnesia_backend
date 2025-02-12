<?php

namespace App\Http\Controllers;

use App\Models\Violation;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    public function index()
    {
        return Violation::with('user')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'violation' => 'required|string|max:255',
            'punishment' => 'required|string|max:255',
        ]);

        $violation = Violation::create($validated);
        return response()->json($violation, 201);
    }

    public function show($id)
    {
        $violation = Violation::with('user')->findOrFail($id);
        return response()->json($violation);
    }

    public function update(Request $request, $id)
    {
        $violation = Violation::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'exists:users,user_id',
            'violation' => 'string|max:255',
            'punishment' => 'string|max:255',
        ]);

        $violation->update($validated);
        return response()->json($violation);
    }

    public function destroy($id)
    {
        $violation = Violation::findOrFail($id);
        $violation->delete();

        return response()->json(['message' => 'Violation deleted successfully']);
    }
}
