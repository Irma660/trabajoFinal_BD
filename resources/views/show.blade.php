<x-app-layout> <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Detalles del Producto
    </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table class="table">
        <tr>
        <th>ID de Producto:</th>
        <td>{{ $producto->id }}</td>
        </tr>
        <tr>
            <th>Nombre del Producto:</th>
            <td>{{ $producto->nombre }}</td>
        </tr>
        <tr>
        <th>Precio:</th>
        <td>{{ $producto->precio }}</td>
        </tr>
        <tr>
            <th>Categoría:</th>
            <td>{{ $producto->categoria }}</td>
        </tr>
        <tr>
            <th>Stock:</th>
            <td>{{ $producto->stock }}</td>
        </tr>
        <tr>
            <th>Proveedor:</th>
            <td>{{ $producto->proveedor }}</td>
        </tr>
        </table>
        <div class="text-center mt-4">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver a la lista de productos</a>
        </div>
    </div>
    </x-app-layout>