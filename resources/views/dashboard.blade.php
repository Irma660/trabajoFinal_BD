<x-app-layout> <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Productos') }} </h2>
    </x-slot> <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Buscador de productos -->
        <form action="{{ route('buscarProducto') }}" method="get">
    <div class="input-group mb-3">
        <input type="text" name="producto_nombre" class="form-control" placeholder="Buscar producto">
        <div class="input-group-append">
        <button type="submit" class="btn btn-primary" style="background-color: green; color: white;">Buscar</button>
        </div>
        </div>
        </form>
     <table class="table mt-4"> <thead>
        <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Categoría</th>
        <th>Stock</th>
        <th>Proveedor</th>
        <th>Descripción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->categoria }}</td>
            <td>{{ $producto->stock }}</td>
            <td>{{ $producto->proveedor }}</td>
            <td>{{ $producto->descripcion }}</td>

            <td>
            <a href="{{ route('show', $producto) }}" class="btn btn-info">Ver</a>
            <a href="{{ route('edit', $producto) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('destroy', $producto) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
            onclick="return confirm('¿Estás seguro de eliminar este producto?')"
            style="background-color: red; color: white;">Eliminar</button>
            </form>
            </td>

        </tr>
        @endforeach
        </tbody>
        </table>

        <a href="{{ route('create') }}" class="btn btn-primary">Agregar Producto</a>
    </div>

    </div>

    </x-app-layout>