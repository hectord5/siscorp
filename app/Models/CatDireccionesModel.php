<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatDireccionesModel extends Model
{
    protected $table = 'cat_direcciones';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'texto',
    ];

}
