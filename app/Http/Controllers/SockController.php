<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sock;
use App\Models\User;

class SockController extends Controller
{
    public function index()
    {
        $socks = Sock::with('user')->get();
        return view('socks.index', compact('socks'));
    }

    public function create()
    {
        $users = User::all();
        return view('socks.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Guy' => 'required|string',
            'URL' => 'required|url',
            'Upload_Date' => 'required|date',
            'users_id' => 'required|exists:users,id',
        ]);

        Sock::create($request->all());

        return redirect()->route('socks.index')->with('success', 'Sock creado con éxito.');
    }

    public function show(Sock $sock)
    {
        return view('socks.show', compact('sock'));
    }

    public function edit(Sock $sock)
    {
        $users = User::all();
        return view('socks.edit', compact('sock', 'users'));
    }

    public function update(Request $request, Sock $sock)
    {
        $request->validate([
            'Guy' => 'required|string',
            'URL' => 'required|url',
            'Upload_Date' => 'required|date',
            'users_id' => 'required|exists:users,id',
        ]);

        $sock->update($request->all());

        return redirect()->route('socks.index')->with('success', 'Sock actualizado.');
    }

    public function destroy(Sock $sock)
    {
        $sock->delete();

        return redirect()->route('socks.index')->with('success', 'Sock eliminado.');
    }
}
