<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sock;

class SockController extends Controller
{
    public function index()
    {
        $socks = Sock::included()->filter()->get();
        return response()->json($socks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Guy' => 'required|string',
            'URL' => 'required|url',
            'Upload_Date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $sock = Sock::create($request->all());
        return response()->json($sock, 201);
    }

    public function show($id)
    {
        $sock = Sock::included()->findOrFail($id);
        return response()->json($sock);
    }

    public function update(Request $request, Sock $sock)
    {
        $request->validate([
            'Guy' => 'required|string',
            'URL' => 'required|url',
            'Upload_Date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $sock->update($request->all());
        return response()->json($sock);
    }

    public function destroy(Sock $sock)
    {
        $sock->delete();
        return response()->json(['message' => 'Sock eliminado correctamente.']);
    }
}
