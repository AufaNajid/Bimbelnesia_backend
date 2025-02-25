<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function index()
    {
        return response()->json(Homework::with(['activity', 'user'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'due_date' => 'required|date',
            'status' => 'required|in:initialized,finished,corrected'
        ]);

        $homework = Homework::create($request->all());
        return response()->json($homework, 201);
    }

    public function show($id)
    {
        return response()->json(Homework::with(['activity', 'user'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $homework = Homework::findOrFail($id);
        $homework->update($request->all());
        return response()->json($homework);
    }

    public function destroy($id)
    {
        Homework::destroy($id);
        return response()->json(['message' => 'Homework deleted']);
    }
}
