<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BitacoraModel extends Model
{
    protected $table = 'bitacoras';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'consulta',
        'tipo_consulta',
    ];

}
