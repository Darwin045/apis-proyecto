<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::included()->filter()->get();
        return response()->json($answers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'creation_date' => 'required|date',
            'users_id' => 'required|exists:users,id',
            'topic_id' => 'required|exists:topics,id',
        ]);

        $answer = Answer::create($request->all());
        return response()->json($answer);
    }

    public function show($id)
    {
        $answer = Answer::included()->findOrFail($id);
        return response()->json($answer);
    }

    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'content' => 'required',
            'creation_date' => 'required|date',
            'users_id' => 'required|exists:users,id',
            'topic_id' => 'required|exists:topics,id',
        ]);

        $answer->update($request->all());
        return response()->json($answer);
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
        return response()->json(['message' => 'Respuesta eliminada.']);
    }
}
