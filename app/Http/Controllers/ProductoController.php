<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|decimal',
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

        return redirect()->route('productos.index');
    }
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|decimal',
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

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente');
    }
}
