<x-app-layout> <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Detalles de Ventas
    </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <table class="table">
        <tr>
            <th>ID de Venta:</th>
            <td>{{ $venta->id }}</td>
        </tr>
        <tr>
        <th>Producto:</th>
        <td>{{ $venta->producto->nombre }}</td>
        </tr>
        <tr>
            <th>Cantidad:</th>
            <td>{{ $venta->cantidad }}</td>
        </tr>
        <tr>
            <th>Fecha de Venta:</th>
            <td>{{ $venta->fecha_venta }}</td>
        </tr>
        <tr>
            <th>Precio Unitario:</th>
            <td>{{ $venta->precio_unitario }}</td>
        </tr>
        </table>
        <div class="text-center mt-4">
            <a href="{{ route('ventas') }}" class="btn btn-primary">Volver a la Lista de Ventas</a>
        </div>
    </div>

    </x-app-layout>