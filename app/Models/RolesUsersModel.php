<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolesUsersModel extends Model
{
   // protected $connection = "mysql_revista";
    protected $table = 'role_user';
    public $timestamps = false;
    protected $fillable = [
        'role_id',
        'user_id'
    ];

}
