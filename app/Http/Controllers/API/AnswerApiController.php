<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Http\Request;

class AnswerApiController extends Controller
{
    public function index()
    {
        $answers = Answer::with(['user', 'topic.user'])->get();
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
        return response()->json($answer, 201);
    }

    public function show(Answer $answer)
    {
        $answer->load(['user', 'topic.user']);
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
        return response()->json(null, 204);
    }
}

