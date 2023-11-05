<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buscar Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form id="search-form" action="{{ route('buscarProducto') }}" method="get">
            <div class="input-group mb-3">
        <input type="text" name="nombre" class="form-control" placeholder="Consultar por Producto">
        <div class="input-group-append">
        <button type="submit" class="btn btn-primary" style="background-color: green; color: white;">Buscar</button>
        </div>
        </div>
        </form>

            @if($productos)
            <div class="mt-4">
                <table class="table">
                    <thead>
                        <tr>
                        <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Categoría</th>
                                    <th>Stock</th>
                                    <th>Proveedor</th>
                                    <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                        <tr>
                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->precio }}</td>
                                        <td>{{ $producto->categoria }}</td>
                                        <td>{{ $producto->stock }}</td>
                                        <td>{{ $producto->proveedor }}</td>
                                        <td>{{ $producto->descripcion }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('create') }}" class="btn btn-primary">Agregar Producto</a>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
