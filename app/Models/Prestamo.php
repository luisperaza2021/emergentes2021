<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class Prestamo extends MongoModel
{
    use HasFactory;

    protected $primaryKey = "_id";

    protected $fillable = [
        'libros_id',
        'users_id',
    ];
}
