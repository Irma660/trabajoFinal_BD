<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Producto;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Ventas::all();
        $productos = Producto::all();
        return view('ventas', compact('productos', 'ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('createV', compact('productos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'producto_nombre' => 'required',
            'cantidad' => 'required|integer|min:1',
            'fecha_venta' => 'required|date',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        // Encuentra el producto por su nombre
        $producto = Producto::where('nombre', $request->input('producto_nombre'))->first();

        if (!$producto) {
            return redirect()->route('createV')->with('error', 'El producto no se encontró en la base de datos.');
        }
        // Verifica si hay suficiente stock para la venta
    if ($producto->stock < $validatedData['cantidad']) {
        return redirect()->route('createV')->with('error', 'No hay suficiente stock para esta venta.');
    }
    $total = $request->input('cantidad') * $request->input('precio_unitario');

        // Crea la venta relacionada con el producto
        Ventas::create([
            'producto_id' => $producto->id,
            'producto_nombre' => $request->input('producto_nombre'),
            'cantidad' => $request->input('cantidad'),
            'fecha_venta' => $request->input('fecha_venta'),
            'precio_unitario' => $request->input('precio_unitario'),
            'total' => $total,
            
        ]);

        // Actualiza el stock del producto
    $producto->decrement('stock', $validatedData['cantidad']);

        return redirect()->route('ventas')->with('success', 'Venta registrada con éxito');
    }
    public function show(Ventas $venta)
    {
        return view('showV', compact('venta'));
    }

    public function edit(Ventas $venta)
    {
        $productos = Producto::all();
        return view('editV', compact('venta', 'productos'));
    }

    public function update(Request $request, Ventas $venta)
    {
        $validatedData = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'fecha_venta' => 'required|date',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        $venta->update($validatedData);

        return redirect()->route('ventas')->with('success', 'Venta actualizada con éxito');
    }

    public function destroy(Ventas $venta)
    {
        $venta->delete();

        return redirect()->route('ventas')->with('success', 'Venta eliminada con éxito');
    }
    public function registrarVenta(Request $request)
{
    $validatedData = $request->validate([
        'producto_id' => 'required|exists:productos,id',
        'cantidad' => 'required|integer|min:1',
        'fecha_venta' => 'required|date',
        'precio_unitario' => 'required|numeric|min:0',
    ]);

    Ventas::create($validatedData);

    return redirect()->route('ventas')->with('success', 'Venta registrada con éxito');
}

public function calcularTotalVenta($id)
{
    $venta = Ventas::findOrFail($id);
    $total = $venta->cantidad * $venta->precio_unitario;

    return view('calcularTotalVenta', compact('venta', 'total'));
}

public function generarReporteVentas()
{
    $ventas = Ventas::all();
    return view('generarReporteVentas', compact('ventas'));
}

public function consultarVentasPorProducto($productoId)
{
    $ventas = Ventas::where('producto_id', $productoId)->get();
    $producto = Producto::findOrFail($productoId);

    return view('consultarVentasPorProducto', compact('ventas', 'producto'));
}

public function consultarVentasPorFecha(Request $request)
{
    $validatedData = $request->validate([
        'fecha_venta' => 'required|date',
    ]);

    $fechaVenta = $request->input('fecha_venta');

    $ventas = Ventas::whereDate('fecha_venta', $fechaVenta)->get();

    return view('consultarVentasPorFecha', compact('ventas', 'fechaVenta'));
}
}
