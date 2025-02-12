<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradeStudent;

class GradeStudentController extends Controller
{
    public function index()
    {
        $gradeStudents = GradeStudent::all();
        return response()->json(['data' => $gradeStudents], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'grade_id' => 'required|exists:grades,grade_id',
        ]);

        $gradeStudent = GradeStudent::create($request->all());
        return response()->json(['message' => 'GradeStudent created successfully', 'data' => $gradeStudent], 201);
    }

    public function show($id)
    {
        $gradeStudent = GradeStudent::find($id);

        if (!$gradeStudent) {
            return response()->json(['message' => 'GradeStudent not found'], 404);
        }

        return response()->json(['data' => $gradeStudent], 200);
    }

    public function update(Request $request, $id)
    {
        $gradeStudent = GradeStudent::find($id);

        if (!$gradeStudent) {
            return response()->json(['message' => 'GradeStudent not found'], 404);
        }

        $request->validate([
            'user_id' => 'sometimes|exists:users,user_id',
            'grade_id' => 'sometimes|exists:grades,grade_id',
        ]);

        $gradeStudent->update($request->all());
        return response()->json(['message' => 'GradeStudent updated successfully', 'data' => $gradeStudent], 200);
    }

    public function destroy($id)
    {
        $gradeStudent = GradeStudent::find($id);

        if (!$gradeStudent) {
            return response()->json(['message' => 'GradeStudent not found'], 404);
        }

        $gradeStudent->delete();
        return response()->json(['message' => 'GradeStudent deleted successfully'], 200);
    }
}
