<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('dashboard', compact('productos'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'categoria' => 'required',
            'stock' => 'required|integer',
            'proveedor' => 'required',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->categoria = $request->input('categoria');
        $producto->stock = $request->input('stock');
        $producto->proveedor = $request->input('proveedor');

        $producto->save();

        return redirect()->route('dashboard');
    }
    public function show(Producto $producto)
    {
        return view('show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'categoria' => 'required',
            'stock' => 'required|integer',
            'proveedor' => 'required',
        ]);

        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->categoria = $request->input('categoria');
        $producto->stock = $request->input('stock');
        $producto->proveedor = $request->input('proveedor');
        $producto->save();

        return redirect()->route('dashboard')
            ->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('dashboard')
            ->with('success', 'Producto eliminado exitosamente');
    }
}
