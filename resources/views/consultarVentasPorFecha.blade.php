<x-app-layout> <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Consulta de Ventas por Fecha') }}
    </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-3">
        <a href="{{ route('ventas') }}" class="btn btn-primary">Volver a la lista de ventas</a>
    </div>
    <!-- Formulario para consultar ventas por fecha -->
    <form action="{{ route('consultarVentasPorFecha') }}" method="get">
    @csrf
    <div class="form-group">
    <label for="fecha_venta">Selecciona la fecha:</label>
    <div class="input-group">
        <input type="date" name="fecha_venta" class="form-control">
        <div class="input-group-append">
        <button type="submit" class="btn btn-primary" style="background-color: green; color: white;">Consultar</button>
        </div> </div> </div>
        </form>

        @if(isset($ventas) && count($ventas) > 0)
        <h3>Resultados de la consulta:</h3>
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
                        onclick="return confirm('¿Estás seguro de eliminar esta venta?')"
                        style="background-color: red; color: white;">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        @elseif(isset($ventas) && count($ventas) === 0)
        <p>No se encontraron ventas para la fecha especificada.</p>
        @endif
    </div>
    </div>
    </x-app-layout>