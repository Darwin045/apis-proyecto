@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalle de Notificación</h2>

    <p><strong>Título:</strong> {{ $notification->Title }}</p>
    <p><strong>Descripción:</strong> {{ $notification->Description }}</p>

    <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
