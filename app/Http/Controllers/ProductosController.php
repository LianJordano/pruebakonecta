<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = productos::paginate(7);
        return view("productos.index", [
            "productos" => $productos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("productos.create",[
            
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            "nombre_producto" => "required",
            "referencia" => "required",
            "precio" => "required",
            "peso" => "required",
            "categoria" => "required",
            "stock" => "required",
            "fecha_creacion" => "required",
        ]);

        $producto = Productos::create($request->all());

        return redirect()->route("productos.index", [
        ])->with("info", "El producto se creó con éxito");

    }

    /**
     * Display the specified resource.
     */
    public function show(productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(productos $producto)
    {
        return view("productos.edit",[
            "producto" => $producto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, productos $producto)
    {
        $request->validate([
            "nombre_producto" => "required",
            "referencia" => "required",
            "precio" => "required",
            "peso" => "required",
            "categoria" => "required",
            "stock" => "required",
            "fecha_creacion" => "required",
        ]);

        $producto->update($request->all());

        return redirect()->route("productos.index")->with("info", "El producto se actualizó con éxito");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(productos $producto)
    {
        $producto->delete();
        
        return redirect()->route("productos.index")->with("info", "El producto se eliminó con éxito");
    }
    
}