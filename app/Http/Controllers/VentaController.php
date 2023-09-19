<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\productos;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::paginate(7);
        return view("ventas.index", [
            "ventas" => $ventas,
        ]);
    }

    public function create()
    {
        $productos = productos::all();

        return view("ventas.create",[
            "productos" => $productos,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "producto_id" => "required",
            "cantidad" => "required|integer|min:1", // Ensure quantity is a positive integer
        ]);
    
        $producto = productos::find($request->producto_id);
    
        if (!$producto) {
            return redirect()->route("ventas.index")->with("error", "El producto seleccionado no existe.");
        }
    
        if ($request->cantidad > $producto->stock) {
            return redirect()->route("ventas.index")->with("error", "La cantidad solicitada supera el stock disponible para este producto.");
        }
    
        $producto_precio = $producto->precio;
        $precio_total = $producto_precio * $request->cantidad;
    
        $venta = new Venta();
        $venta->producto_id = $request->producto_id;
        $venta->cantidad = $request->cantidad;
        $venta->precio_total = $precio_total;
        $venta->save();
    
        $producto->decrement('stock', $request->cantidad);
    
        return redirect()->route("ventas.index")->with("info", "La venta se ha registrado con éxito");
    }
    
}
