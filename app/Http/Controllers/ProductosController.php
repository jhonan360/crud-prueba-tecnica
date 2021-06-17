<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Productos::with('tipos.categorias')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'idTipo' => 'required',
            'nombre' => 'required',
            'precio' => 'required|numeric',
        ];
        $mensajes = [
            'idTipo.required' => 'Debe seleccionar el tipo de producto.',
            'nombre.required' => 'Debe digitar el nombre del producto.',
            'precio.required' => 'Debe digitar el precio del producto.',
            'precio.numeric' => 'El precio debe ser un valor numérico.',
        ];

        $v = \Validator::make($request->all(), $reglas, $mensajes);
        if ($v->fails()){
            return response()->json($v->errors(), 400);
        }
        
        $producto = new Productos();
        $producto->idTipo = $request->idTipo;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->save();
        return response()->json($producto, 201);
    }

    /**
     * Display the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return Productos::with('tipos.categorias')->findOrFail($id); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $reglas = [
            'idTipo' => 'required',
            'nombre' => 'required',
            'precio' => 'required|numeric',
        ];
        $mensajes = [
            'idTipo.required' => 'Debe seleccionar el tipo de producto.',
            'nombre.required' => 'Debe digitar el nombre del producto.',
            'precio.required' => 'Debe digitar el precio del producto.',
            'precio.numeric' => 'El precio debe ser un valor numérico.',
        ];

        $v = \Validator::make($request->all(), $reglas, $mensajes);
        if ($v->fails())
        {
            return response()->json($v->errors(), 400);
        }
        $producto = Productos::findOrFail($id);
        $producto->idTipo = $request->idTipo;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->save();
        return response()->json($producto, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Productos::findOrFail($id);
        $producto->delete($id);
        return response()->json(null, 204);
    }
}
