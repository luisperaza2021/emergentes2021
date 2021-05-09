<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class Categoria extends MongoModel
{
    use HasFactory;

    protected $primaryKey = "_id";
    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
    ];

    public function libros(){
        return $this->hasMany(Libro::class);
    }
}
