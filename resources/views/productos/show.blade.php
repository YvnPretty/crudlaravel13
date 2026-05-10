@extends('layouts.main')

@section('title', 'Ver Producto')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">Detalles del Producto</div>
        <div class="card-body">
            <h5 class="card-title text-primary">{{ $producto->nombre }}</h5>
            <hr>
            <p class="card-text"><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $producto->stock }} unidades</p>
            
            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Confirmar Eliminación</button>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
            </form>
        </div>
    </div>
@endsection
