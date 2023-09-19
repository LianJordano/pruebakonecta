<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre_producto",
        "referencia",
        "precio",
        "peso",
        "categoria",
        "stock",
        "fecha_creacion"
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'producto_id');
    }
}
