<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradeSchedule;

class GradeScheduleController extends Controller
{
    public function index()
    {
        $gradeSchedules = GradeSchedule::all();
        return response()->json(['data' => $gradeSchedules], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'grade_id' => 'required|exists:grades,grade_id',
            'repeat_at' => 'required|string|max:255',
        ]);

        $gradeSchedule = GradeSchedule::create($request->all());
        return response()->json(['message' => 'GradeSchedule created successfully', 'data' => $gradeSchedule], 201);
    }

    public function show($id)
    {
        $gradeSchedule = GradeSchedule::find($id);

        if (!$gradeSchedule) {
            return response()->json(['message' => 'GradeSchedule not found'], 404);
        }

        return response()->json(['data' => $gradeSchedule], 200);
    }

    public function update(Request $request, $id)
    {
        $gradeSchedule = GradeSchedule::find($id);

        if (!$gradeSchedule) {
            return response()->json(['message' => 'GradeSchedule not found'], 404);
        }

        $request->validate([
            'grade_id' => 'sometimes|exists:grades,grade_id',
            'repeat_at' => 'sometimes|string|max:255',
        ]);

        $gradeSchedule->update($request->all());
        return response()->json(['message' => 'GradeSchedule updated successfully', 'data' => $gradeSchedule], 200);
    }

    public function destroy($id)
    {
        $gradeSchedule = GradeSchedule::find($id);

        if (!$gradeSchedule) {
            return response()->json(['message' => 'GradeSchedule not found'], 404);
        }

        $gradeSchedule->delete();
        return response()->json(['message' => 'GradeSchedule deleted successfully'], 200);
    }
}
