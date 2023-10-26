<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ventas') }}
        </h2>
        
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver a la lista de productos</a>
            <form method="POST" action="{{ route('storev') }}">
                @csrf
                <div class="form-group">
                    <label for="producto_nombre">Producto:</label>
                    <select name="producto_nombre" id="producto_nombre" class="form-control">
                        @foreach ($productos as $producto)
                        <option value="{{ $producto->nombre }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control">
                </div>

                <div class="form-group">
                    <label for="fecha_venta">Fecha de Venta:</label>
                    <input type="date" name="fecha_venta" id="fecha_venta" class="form-control">
                </div>

                <div class="form-group">
                    <label for="precio_unitario">Precio Unitario:</label>
                    <input type="text" name="precio_unitario" id="precio_unitario" class="form-control">
                </div>
                <button type="submit" class="btn btn-success" style="background-color: green; color: white;">Registrar Venta</button>
            </form>
        </div>
    </div>


    @endsection
</x-app-layout>