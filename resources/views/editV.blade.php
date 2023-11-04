
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Venta
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

            <div class="form-group">
                <label for="total">Total:</label>
                <input type="text" class="form-control" id="total" name="total" value="{{ $venta->total }}" readonly>
            </div>
        </form>

        <div class="form-group d-flex justify-content-between">
        <button type="submit" class="btn btn-success" style="background-color: green; color: white;">Actualizar Venta</button>
        <a href="{{ route('ventas') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
    </div>

    </x-app-layout>