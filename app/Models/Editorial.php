<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class Editorial extends MongoModel
{
    use HasFactory;

    protected $primaryKey = "_id";
    protected $table = 'editoriales';

    protected $fillable = [
        'nombre',
        'telefono',
    ];

    public function libros(){
        return $this->hasMany(Libro::class);
    }
}
