<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $fillable = [
        'producto_id',
        'cantidad',
        'fecha_venta',
        'precio_unitario',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
