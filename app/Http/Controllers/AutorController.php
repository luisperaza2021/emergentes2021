<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $params = [
            "collection" => Autor::all(),
            "hasPhone" => false,
            "label" => "Autor",
            "editUrl" => 'autores.edit',
            "createUrl" => 'autores.create',
        ];

        return view('admin.item', $params);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autor  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autor)
    {
        $params = [
            "item" => $autor,
            "hasPhone" => false,
            "label" => "Autores",
            "table" => "autores",
            "previusUrl" => route('autores'),
        ];

        return view('admin.editItem', $params);
    }

    public function create()
    {
        $params = [
            "hasPhone" => false,
            "label" => "Autores",
            "table" => "autores",
            "previusUrl" => route('autores'),
        ];

        return view('admin.createItem', $params);
    }
}
