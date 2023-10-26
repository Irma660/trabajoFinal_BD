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
        return view('ventas', compact('ventas'));
    }
    
    public function create()
    {
        return view('createV');
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
        $producto = Producto::where('nombre', $validatedData['producto_nombre'])->first();
    
        if (!$producto) {
            return redirect()->route('ventas.create')->with('error', 'El producto no se encontró en la base de datos.');
        }
    
        // Crea la venta relacionada con el producto
        Ventas::create([
            'producto_id' => $producto->id,
            'cantidad' => $validatedData['cantidad'],
            'fecha_venta' => $validatedData['fecha_venta'],
            'precio_unitario' => $validatedData['precio_unitario'],
        ]);
    
        return redirect()->route('ventas.index')->with('success', 'Venta registrada con éxito');
    }

    public function show(Ventas $venta)
    {
        return view('showV', compact('venta'));
    }

    public function edit(Ventas $venta)
    {
        return view('editV', compact('venta'));
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
}
