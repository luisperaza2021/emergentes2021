<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $params = [
            "collection" => Categoria::all(),
            "hasPhone" => false,
            "label" => "Categoría",
            "editUrl" => 'categorias.edit',
            "createUrl" => 'categorias.create',
        ];

        return view('admin.item', $params);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        $params = [
            "item" => $categoria,
            "hasPhone" => false,
            "label" => "Categoría",
            "table" => "categorias",
            "previusUrl" => route('categorias'),
        ];

        return view('admin.editItem', $params);
    }

    public function create()
    {
        $params = [
            "hasPhone" => false,
            "label" => "Categoría",
            "table" => "categorias",
            "previusUrl" => route('categorias'),
        ];

        return view('admin.createItem', $params);
    }
}
