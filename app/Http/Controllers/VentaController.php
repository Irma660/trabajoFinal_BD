<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;



class VentaController extends Controller
{
    public function create()
    {
        return view('ventas.create');
    }

    public function store(Request $request)
    {
        // Valida y almacena la venta en la base de datos
        $validatedData = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'fecha_venta' => 'required|date',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        Ventas::create($validatedData);

        return redirect()->route('ventas')->with('success', 'Venta registrada con éxito');
    }

    public function index()
    {
        $ventas = Ventas::all();
        return view('ventas', compact('ventas'));
    }

    public function show(Ventas $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    public function edit(Ventas $venta)
    {
        return view('ventas.edit', compact('venta'));
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
