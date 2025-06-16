@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Respuestas</h1>
    <a href="{{ route('answers.create') }}" class="btn btn-primary">Agregar Respuesta</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Contenido</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($answers as $answer)
                <tr>
                    <td>{{ $answer->id }}</td>
                    <td>{{ $answer->content }}</td>
                    <td>{{ $answer->creation_date }}</td>
                    <td>
                        <a href="{{ route('answers.edit', $answer) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('answers.destroy', $answer) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
