<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Venta') }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>Editar Venta</h1>

        <form method="POST" action="{{ route('updateV', $venta) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="producto_nombre">Producto:</label>
                <select class="form-control" id="producto_nombre" name="producto_nombre">
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->nombre }}" @if ($producto->nombre === $venta->producto->nombre) selected @endif>{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $venta->cantidad }}">
            </div>

            <div class="form-group">
                <label for="fecha_venta">Fecha de Venta:</label>
                <input type="date" class="form-control" id="fecha_venta" name="fecha_venta" value="{{ $venta->fecha_venta }}">
            </div>

            <div class="form-group">
                <label for="precio_unitario">Precio Unitario:</label>
                <input type="number" class="form-control" id="precio_unitario" name="precio_unitario" value="{{ $venta->precio_unitario }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Venta</button>
        </form>

        <a href="{{ route('ventas') }}" class="btn btn-secondary">Cancelar</a>
    </div>

    </x-app-layout>