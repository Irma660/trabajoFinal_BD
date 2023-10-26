<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver a la lista de productos</a>

            <form method="POST" action="{{ route('update', $producto) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}">
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" class="form-control" value="{{ $producto->precio }}">
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <input type="text" name="categoria" id="categoria" class="form-control" value="{{ $producto->categoria }}">
                </div>
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="{{ $producto->stock }}">
                </div>
                <div class="form-group">
                    <label for="proveedor">Proveedor:</label>
                    <input type="text" name="proveedor" id="proveedor" class="form-control" value="{{ $producto->proveedor }}">
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
        </div>
    </div>
</x-app-layout>