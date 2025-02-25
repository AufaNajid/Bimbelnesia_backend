<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        return response()->json(Sesi::with(['schedule', 'study', 'teacher'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:grade_schedules,grade_schedule_id',
            'study_id' => 'required|exists:studies,id',
            'teacher_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'time' => 'required'
        ]);

        $session = Sesi::create($request->all());
        return response()->json($session, 201);
    }

    public function show($id)
    {
        return response()->json(Sesi::with(['schedule', 'study', 'teacher'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $session = Sesi::findOrFail($id);
        $session->update($request->all());
        return response()->json($session);
    }

    public function destroy($id)
    {
        Sesi::destroy($id);
        return response()->json(['message' => 'Session deleted']);
    }
}
