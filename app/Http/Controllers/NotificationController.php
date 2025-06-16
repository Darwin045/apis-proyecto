<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('trainers')->get();
        return view('notifications.index', compact('notifications'));
    }

    public function create()
    {
        $trainers = Trainer::all();
        return view('notifications.create', compact('trainers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Trainer_id' => 'required|exists:trainers,id',
            'Title' => 'required|string|max:255',
            'Description' => 'required|string',
        ]);

        Notification::create($request->all());

        return redirect()->route('notifications.index')->with('success', 'Notificación creada exitosamente.');
    }

    public function show(Notification $notification)
    {
        return view('notifications.show', compact('notification'));
    }

    public function edit(Notification $notification)
    {
        $trainers = Trainer::all();
        return view('notifications.edit', compact('notification', 'trainers'));
    }

    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'Trainer_id' => 'required|exists:trainers,id',
            'Title' => 'required|string|max:255',
            'Description' => 'required|string',
        ]);

        $notification->update($request->all());

        return redirect()->route('notifications.index')->with('success', 'Notificación actualizada exitosamente.');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->route('notifications.index')->with('success', 'Notificación eliminada.');
    }
}


