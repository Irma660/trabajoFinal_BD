<x-app-layout> <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Ventas') }}
    </h2>
    </x-slot>


<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('createV') }}" class="btn btn-primary">Agregar Venta</a>
        <!-- Buscador de ventas por producto -->
        <form action="{{ route('consultarVentasPorProducto') }}" method="get">
                <div class="form-group">
                    <input type="text" name="producto_nombre" class="form-control" placeholder="Consultar por Producto">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <!-- Buscador de ventas por fecha -->
            <form action="{{ route('consultarVentasPorFecha') }}" method="get">
                <div class="form-group">
                    <input type="date" name="fecha_venta" class="form-control">
                    <button type="submit" class="btn btn-primary">Consultar por Fecha</button>
                </div>
            </form>
           
                <table class="table mt-4">
                    <thead>
                    <tr>
                    <th>ID de Venta</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Fecha de Venta</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ventas as $venta)
                    <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->producto->nombre }}</td>
                    <td>{{ $venta->cantidad }}</td>
                    <td>{{ $venta->fecha_venta }}</td>
                    <td>{{ $venta->precio_unitario }}</td>
                    <td>{{ $venta->total }}</td>
                    <td>
                    <a href="{{ route('showV', $venta) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('editV', $venta) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('destroy', $venta) }}" method="POST" style="display: inline;">
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
            </div>

            </x-app-layout>