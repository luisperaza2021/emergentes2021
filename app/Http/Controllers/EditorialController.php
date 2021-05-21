<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function index()
    {
        $params = [
            "collection" => Editorial::all(),
            "hasPhone" => true,
            "label" => "Editorial",
            "editUrl" => 'editoriales.edit',
            "createUrl" => 'editoriales.create',
        ];

        return view('admin.item', $params);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Editorial  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Editorial $editorial)
    {
        $params = [
            "item" => $editorial,
            "hasPhone" => true,
            "label" => "Editorial",
            "table" => "editoriales",
            "previusUrl" => route('editoriales'),
        ];

        return view('admin.editItem', $params);
    }

    public function create()
    {
        $params = [
            "hasPhone" => true,
            "label" => "Editorial",
            "table" => "editoriales",
            "previusUrl" => route('editoriales'),
        ];

        return view('admin.createItem', $params);
    }
}
