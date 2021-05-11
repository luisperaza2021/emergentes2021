<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Editorial;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = [
            'libros' => Libro::all(),
        ];

        return view('admin.dashboard', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'autores' => Autor::all(),
            'editoriales' => Editorial::all(),
            'categorias' => Categoria::all(),
        ];

        return view('admin.createBook', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => ['required'],
            'imagen' => ['required','file', 'mimes:jpg,jpeg,png'],
            'descripcion' => ['nullable'],
            'publicacion' => ['nullable'],
            'cantidad' => ['required','numeric'],
            'autores_id' => ['required'],
            'aditoriales_id' => ['required'],
            'categorias_id' => ['required']
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $libro = new Libro();

        $libro->titulo = $request['titulo'];
        $libro->descripcion = $request['descripcion'];
        $libro->publicacion = $request['publicacion'];
        $libro->cantidad = $request['cantidad'];
        $libro->autores_id = $request['autores_id'];
        $libro->editoriales_id = $request['aditoriales_id'];
        $libro->categorias_id = $request['categorias_id'];
        $libro->activo = true;
        $libro->slug = Str::slug($request['titulo'], '-');

        $file = $request->file("imagen");
        $nombrearchivo = $file->getClientOriginalName();
        $file->move(public_path("images/uploads/"), $nombrearchivo);

        $libro->imagen = $nombrearchivo;

        $libro->save();

        return redirect()->route('libros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $params = [
            'libro' => Libro::where('slug', $slug)->first(),
        ];

        return view('libros.show', $params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        $params = [
            'libro' => $libro,
            'autores' => Autor::all(),
            'editoriales' => Editorial::all(),
            'categorias' => Categoria::all(),

            'autor' => Autor::where('_id', '=', $libro->autores_id)->get()[0],
            'editorial' => Editorial::where('_id', '=', $libro->editoriales_id)->get()[0],
            'categoria' => Categoria::where('_id', '=', $libro->categorias_id)->get()[0],
        ];

        return view('admin.editBook', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => ['required'],
            'imagen' => ['required','file', 'mimes:jpg,jpeg,png'],
            'descripcion' => ['nullable'],
            'publicacion' => ['nullable'],
            'cantidad' => ['required','numeric'],
            'autores_id' => ['required'],
            'aditoriales_id' => ['required'],
            'categorias_id' => ['required']
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $libro = Libro::where('_id', '=', $id)->get()[0];

        $libro->titulo = $request['titulo'];
        $libro->descripcion = $request['descripcion'];
        $libro->publicacion = $request['publicacion'];
        $libro->cantidad = $request['cantidad'];
        $libro->autores_id = $request['autores_id'];
        $libro->aditoriales_id = $request['aditoriales_id'];
        $libro->categorias_id = $request['categorias_id'];
        $libro->slug = Str::slug($request['titulo'], '-');

        $file = $request->file("imagen");
        $nombrearchivo = $file->getClientOriginalName();
        $file->move(public_path("images/uploads/"), $nombrearchivo);

        $libro->imagen = $nombrearchivo;

        $libro->save();

        return Redirect::back()->with('status', "Libro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index');
    }
}
