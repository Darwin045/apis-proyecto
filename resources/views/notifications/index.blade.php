@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Notificaciones</h2>
    <a href="{{ route('notifications.create') }}" class="btn btn-primary mb-3">Nueva Notificación</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifications as $notification)
                <tr>
                    <td>{{ $notification->Title }}</td>
                    <td>{{ $notification->Description }}</td>
                    <td>
                        <a href="{{ route('notifications.show', $notification) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('notifications.edit', $notification) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('notifications.destroy', $notification) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
