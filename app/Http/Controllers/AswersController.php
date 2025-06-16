<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AswersController extends Controller
{
    public function index()
{
    $aswers = Aswer::with(['user', 'topic.user'])->get();
    return view('aswers.index', compact('aswers'));
}

public function create()
{
    $users = User::all();
    $topics = Topic::with('user')->get();
    return view('aswers.create', compact('users', 'topics'));
}

public function store(Request $request)
{
    $request->validate([
        'content' => 'required',
        'creation_date' => 'required|date',
        'users_id' => 'required|exists:users,id',
        'topic_id' => 'required|exists:topics,id',
    ]);

    Aswer::create($request->all());
    return redirect()->route('aswers.index')->with('success', 'Respuesta creada.');
}

public function edit(Aswer $aswer)
{
    $users = User::all();
    $topics = Topic::with('user')->get();
    return view('aswers.edit', compact('aswer', 'users', 'topics'));
}

public function update(Request $request, Aswer $aswer)
{
    $request->validate([
        'content' => 'required',
        'creation_date' => 'required|date',
        'users_id' => 'required|exists:users,id',
        'topic_id' => 'required|exists:topics,id',
    ]);

    $aswer->update($request->all());
    return redirect()->route('aswers.index')->with('success', 'Respuesta actualizada.');
}

public function show(Aswer $aswer)
{
    $aswer->load(['user', 'topic.user']);
    return view('aswers.show', compact('aswer'));
}
}