<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class Libro extends MongoModel
{
    use HasFactory;

    protected $primaryKey = "_id";

    protected $fillable = [
        'titulo',
        'imagen',
        'descripcion',
        'publicacion',
        'cantidad',
        'prestados',
        'activo',
        'slug',
        'autores_id',
        'editoriales_id',
        'categorias_id',
    ];

    protected $casts = [
        'publicacion' => 'datetime',
        '_id' => 'string',
        'autores_id' => 'string',
    ];

    public function autor(){
        return $this->belongsTo(Autor::class, '_id.toString()', 'autores_id');
    }

    public function categoria(){
        return $this->hasOne(Categoria::class, '_id.toString()', 'editoriales_id');
    }

    public function editorial(){
        return $this->hasOne(Editorial::class, '_id.toString()', 'categorias_id');
    }
}
