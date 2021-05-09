<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class Autor extends MongoModel
{
    use HasFactory;

    protected $primaryKey = "_id";
    protected $table = 'autores';

    protected $fillable = [
        'nombre',
    ];

    public function libros(){
        return $this->hasMany(Libro::class);
    }
}
