@extends('layouts.main')

@section('title', 'Crear Producto')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">Nuevo Producto</div>
        <div class="card-body">
            <form action="{{ route('productos.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01" name="precio" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
