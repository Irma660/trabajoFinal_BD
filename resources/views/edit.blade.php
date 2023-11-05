<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-3"> 
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver a la lista de productos</a>
           </div> 
            <form method="POST" action="{{ route('update', $producto) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}">
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" step="0.01" class="form-control" value="{{ $producto->precio }}">
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
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $producto->descripcion}}">
                </div>
                <div class="form-group d-flex justify-content-between">
        <button type="submit" class="btn btn-success" style="background-color: green; color: white;">Actualizar producto</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancelar</a>
        </div>
            </form>
        </div>
    </div>
</x-app-layout>