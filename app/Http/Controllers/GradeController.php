<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return response()->json(['data' => $grades], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,branch_id',
            'grade_tag_id' => 'required|exists:grade_tags,grade_tag_id',
            'title' => 'required|string|max:255',
        ]);

        $grade = Grade::create($request->all());
        return response()->json(['message' => 'Grade created successfully', 'data' => $grade], 201);
    }

    public function show($id)
    {
        $grade = Grade::find($id);

        if (!$grade) {
            return response()->json(['message' => 'Grade not found'], 404);
        }

        return response()->json(['data' => $grade], 200);
    }

    public function update(Request $request, $id)
    {
        $grade = Grade::find($id);

        if (!$grade) {
            return response()->json(['message' => 'Grade not found'], 404);
        }

        $request->validate([
            'branch_id' => 'sometimes|exists:branches,branch_id',
            'grade_tag_id' => 'sometimes|exists:grade_tags,grade_tag_id',
            'title' => 'sometimes|string|max:255',
        ]);

        $grade->update($request->all());
        return response()->json(['message' => 'Grade updated successfully', 'data' => $grade], 200);
    }

    public function destroy($id)
    {
        $grade = Grade::find($id);

        if (!$grade) {
            return response()->json(['message' => 'Grade not found'], 404);
        }

        $grade->delete();
        return response()->json(['message' => 'Grade deleted successfully'], 200);
    }
}
