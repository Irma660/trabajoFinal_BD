<x-app-layout> <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Ventas') }}
    </h2>

    </x-slot> <div class="py-12"> 
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="mb-3"> 
    <a href="{{ route('ventas') }}" class="btn btn-primary">Volver a la lista de ventas</a>
     </div> 
    <form method="POST" action="{{ route('storeV') }}">
    @csrf

    <div class="form-group">
    <label for="producto_nombre">Producto:</label>
    <select name="producto_nombre" id="producto_nombre" class="form-control">
        @foreach ($productos as $producto)
        <option value="{{ $producto->nombre }}">{{ $producto->nombre }}</option>
        @endforeach
        </select>
        @error('producto_nombre')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control">
        </div>

        <div class="form-group">
            <label for="fecha_venta">Fecha de Venta:</label>
            <input type="date" name="fecha_venta" id="fecha_venta" class="form-control">
        </div>

        <div class="form-group">
            <label for="precio_unitario">Precio Unitario:</label>
            <input type="text" name="precio_unitario" id="precio_unitario" class="form-control">
        </div>
         <div class="form-group">
                <label for="total">Total:</label>
                <input type="text" class="form-control" id="total" name="total" readonly>
            </div>
        <button type="submit" class="btn btn-success" style="background-color: green; color: white;">Registrar
            Venta</button>
        </form>
        </div>
        </div>
        <script>
        // Función para calcular el total en tiempo real
        function calcularTotal() {
            const cantidad = parseFloat($('#cantidad').val());
            const precioUnitario = parseFloat($('#precio_unitario').val());
            const total = cantidad * precioUnitario;

            if (!isNaN(total)) {
                $('#total').val(total.toFixed(2)); // Muestra el total con 2 decimales
            }
        }

        // Escucha cambios en los campos de cantidad y precio unitario
        $('#cantidad, #precio_unitario').on('input', calcularTotal);

        // Calcula el total al cargar la página
        calcularTotal();
    </script>

        </x-app-layout>