@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Lista de Socks</h2>
    <a href="{{ route('socks.create') }}" class="btn btn-primary mb-3">Agregar Sock</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Guy</th>
                <th>URL</th>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($socks as $sock)
                <tr>
                    <td>{{ $sock->id }}</td>
                    <td>{{ $sock->Guy }}</td>
                    <td><a href="{{ $sock->URL }}" target="_blank">{{ $sock->URL }}</a></td>
                    <td>{{ $sock->Upload_Date }}</td>
                    <td>{{ $sock->user->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('socks.show', $sock) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('socks.edit', $sock) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('socks.destroy', $sock) }}" method="POST" style="display:inline-block">
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
