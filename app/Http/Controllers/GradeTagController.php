<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradeTag;

class GradeTagController extends Controller
{
    public function index()
    {
        $gradeTags = GradeTag::all();
        return response()->json(['data' => $gradeTags], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $gradeTag = GradeTag::create($request->all());
        return response()->json(['message' => 'GradeTag created successfully', 'data' => $gradeTag], 201);
    }

    public function show($id)
    {
        $gradeTag = GradeTag::find($id);

        if (!$gradeTag) {
            return response()->json(['message' => 'GradeTag not found'], 404);
        }

        return response()->json(['data' => $gradeTag], 200);
    }

    public function update(Request $request, $id)
    {
        $gradeTag = GradeTag::find($id);

        if (!$gradeTag) {
            return response()->json(['message' => 'GradeTag not found'], 404);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
        ]);

        $gradeTag->update($request->all());
        return response()->json(['message' => 'GradeTag updated successfully', 'data' => $gradeTag], 200);
    }

    public function destroy($id)
    {
        $gradeTag = GradeTag::find($id);

        if (!$gradeTag) {
            return response()->json(['message' => 'GradeTag not found'], 404);
        }

        $gradeTag->delete();
        return response()->json(['message' => 'GradeTag deleted successfully'], 200);
    }
}
