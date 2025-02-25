<?php

namespace App\Http\Controllers;

use App\Models\SessionPresences;
use Illuminate\Http\Request;

class SessionPresencesController extends Controller
{
    public function index()
    {
        return response()->json(SessionPresences::with(['activity', 'user'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'user_id' => 'required|exists:users,id',
            'is_present' => 'required|boolean'
        ]);

        $presence = SessionPresences::create($request->all());
        return response()->json($presence, 201);
    }

    public function show($id)
    {
        return response()->json(SessionPresences::with(['activity', 'user'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $presence = SessionPresences::findOrFail($id);
        $presence->update($request->all());
        return response()->json($presence);
    }

    public function destroy($id)
    {
        SessionPresences::destroy($id);
        return response()->json(['message' => 'Session Presence deleted']);
    }
}
