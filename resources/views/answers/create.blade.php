@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Respuesta</h1>
    <form action="{{ route('answers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Contenido:</label>
            <input type="text" class="form-control" name="content" required>
        </div>
        <div class="form-group">
            <label for="creation_date">Fecha de Creación:</label>
            <input type="date" class="form-control" name="creation_date" required>
        </div>
        <div class="form-group">
            <label for="topic_id">Tema:</label>
            <select class="form-control" name="topic_id" required>
                @foreach ($topics as $topic)
                    <option value="{{ $topics->id }}">{{ $topic->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="users_id">Usuario:</label>
            <select class="form-control" name="users_id" required>
                @foreach ($users as $user)
                    <option value="{{ $users->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('answers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
