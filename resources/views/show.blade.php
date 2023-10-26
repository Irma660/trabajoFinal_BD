<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalles del Producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver a la lista de productos</a>

            <div class="mt-4">
                <h3>Nombre del Producto: {{ $producto->nombre }}</h3>
                <p>Precio: {{ $producto->precio }}</p>
                <p>Categoría: {{ $producto->categoria }}</p>
                <p>Stock: {{ $producto->stock }}</p>
                <p>Proveedor: {{ $producto->proveedor }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
