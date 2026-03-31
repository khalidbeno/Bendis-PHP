@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/gracias.css') }}?v={{ time() }}">
@endsection

@section('contenido')
<div class="page-container">
    <div class="confirmation-container">
        <!-- Icono de confirmación -->
        <div class="confirmation-icon">✓</div>
        
        <h1 class="confirmation-title">BENDIS</h1>
        
        <div class="confirmation-message">
            <p>¡Gracias por tu compra!</p>
            <p>Tu pedido ha sido recibido correctamente.</p>
            <p>En breve recibirás un correo con los detalles.</p>
        </div>
        
        <a href="{{ route('index') }}" class="btn-back">Volver a la tienda</a>
    </div>
</div>
@endsection