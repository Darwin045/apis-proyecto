@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalle del Sock</h2>

    <p><strong>Guy:</strong> {{ $sock->Guy }}</p>
    <p><strong>URL:</strong> <a href="{{ $sock->URL }}" target="_blank">{{ $sock->URL }}</a></p>
    <p><strong>Fecha de carga:</strong> {{ $sock->Upload_Date }}</p>
    <p><strong>Usuario:</strong> {{ $sock->user->name ?? 'N/A' }}</p>

    <a href="{{ route('socks.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
