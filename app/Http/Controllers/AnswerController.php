<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\topic;
use App\Models\User;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::all();
        return view('answers.index', compact('answers'));
    }

    public function create()
    {
        $topics = topic::all(); // Obtener todos los temas
        $users = User::all();   // Obtener todos los usuarios
        return view('answers.create', compact('topics', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'creation_date' => 'required|date',
            'topic_id' => 'required|exists:topics,id',
            'users_id' => 'required|exists:users,id',
        ]);

        Answer::create($request->all());
        return redirect()->route('answers.index')->with('success', 'Respuesta creada con éxito.');
    }

    public function show(Answer $answer)
    {
        return view('answers.show', compact('answer'));
    }

    public function edit(Answer $answer)
    {
        $topics = topic::all(); // Obtener todos los temas
        $users = User::all();   // Obtener todos los usuarios
        return view('answers.edit', compact('answer', 'topics', 'users'));
    }

    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'content' => 'required|string',
            'creation_date' => 'required|date',
            'topic_id' => 'required|exists:topics,id',
            'users_id' => 'required|exists:users,id',
        ]);

        $answer->update($request->all());
        return redirect()->route('answers.index')->with('success', 'Respuesta actualizada con éxito.');
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
        return redirect()->route('answers.index')->with('success', 'Respuesta eliminada con éxito.');
    }
}
