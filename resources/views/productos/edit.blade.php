@extends('layouts.main')

@section('title', 'Editar Producto')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-warning">Editar Producto</div>
        <div class="card-body">
            <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01" name="precio" class="form-control" value="{{ $producto->precio }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}" required>
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
