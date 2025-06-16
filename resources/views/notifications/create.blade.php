@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Crear Notificación</h2>

    <form action="{{ route('notifications.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Title" class="form-label">Título</label>
            <input type="text" name="Title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Description" class="form-label">Descripción</label>
            <textarea name="Description" class="form-control" rows="4" required></textarea>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
