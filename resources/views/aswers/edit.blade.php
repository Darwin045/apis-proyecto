@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Respuesta</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('aswers.update', $aswer) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Contenido</label>
            <input type="text" name="content" class="form-control" value="{{ old('content', $aswer->content) }}" required>
        </div>

        <div class="mb-3">
            <label>Fecha de creación</label>
            <input type="date" name="creation_date" class="form-control" value="{{ old('creation_date', $aswer->creation_date) }}" required>
        </div>

        <div class="mb-3">
            <label>Usuario</label>
            <select name="users_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @selected(old('users_id', $aswer->users_id) == $user->id)>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tema (Topic)</label>
            <select name="topic_id" class="form-control" required>
                @foreach($topics as $topic)
                    <option value="{{ $topic->id }}" @selected(old('topic_id', $aswer->topic_id) == $topic->id)>
                        {{ $topic->Qualification }} ({{ $topic->user->name ?? 'N/A' }})
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('aswers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
