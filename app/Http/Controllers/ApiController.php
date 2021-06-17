<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Tipos;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCategorias()
    {
        return Categorias::with('tipos')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTipos()
    {
        return Tipos::with('categorias')->get();

    }

}
