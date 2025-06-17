<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    // Obtener todos con filtros y relaciones
    public function index()
    {
        $notifications = Notification::included()->filter()->get();
        return response()->json($notifications);
    }

    // Guardar una nueva notificación
    public function store(Request $request)
    {
        $request->validate([
            'Trainer_id' => 'required|exists:trainers,id',
            'Title' => 'required|string|max:255',
            'Description' => 'required|string',
        ]);

        $notification = Notification::create($request->all());
        return response()->json($notification, 201);
    }

    // Mostrar una notificación con relaciones si se piden
    public function show($id)
    {
        $notification = Notification::included()->findOrFail($id);
        return response()->json($notification);
    }

    // Actualizar una notificación existente
    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'Trainer_id' => 'required|exists:trainers,id',
            'Title' => 'required|string|max:255',
            'Description' => 'required|string',
        ]);

        $notification->update($request->all());
        return response()->json($notification);
    }

    // Eliminar una notificación
    public function destroy(Notification $notification)
    {
        $notification->delete();
        return response()->json(['message' => 'Notificación eliminada correctamente.']);
    }
}


