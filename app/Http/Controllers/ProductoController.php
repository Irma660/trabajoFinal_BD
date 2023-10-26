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

        return redirect()->route('productos.index');
    }
}
