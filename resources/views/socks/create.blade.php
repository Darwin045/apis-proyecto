@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Crear Sock</h2>

    <form action="{{ route('socks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Guy</label>
            <input type="text" name="Guy" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>URL</label>
            <input type="url" name="URL" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Upload Date</label>
            <input type="date" name="Upload_Date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Usuario</label>
            <select name="users_id" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('socks.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
