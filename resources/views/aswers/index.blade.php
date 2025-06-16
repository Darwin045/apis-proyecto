@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Lista de Respuestas</h2>
    <a href="{{ route('aswers.create') }}" class="btn btn-primary mb-3">Crear Respuesta</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Contenido</th>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aswers as $aswer)
            <tr>
                <td>{{ $aswer->content }}</td>
                <td>{{ $aswer->creation_date }}</td>
                <td>{{ $aswer->user->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('aswers.edit', $aswer) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('aswers.destroy', $aswer) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                    </form>
                    <a href="{{ route('aswers.show', $aswer) }}" class="btn btn-info btn-sm">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
