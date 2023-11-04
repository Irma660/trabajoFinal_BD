<x-app-layout> <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Reporte de Ventas') }}
    </h2>

    </x-slot> <div class="py-12"> <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <a href="{{ route('ventas') }}" class="btn btn-primary">Volver a la lista de ventas</a>
    <form method="POST" action="{{ route('storeV') }}">
    @csrf
    <div class="form-group">
    <h1>Generar Reporte de Ventas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID de Venta</th>
                    <th>Producto Vendido</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->producto_nombre }}</td>
                    <td>{{ $venta->cantidad }}</td>
                    <td>{{ $venta->fecha_venta }}</td>
                    <td>${{ $venta->cantidad * $venta->precio_unitario }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>