<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_users extends Model
{
    //
    protected $fillable = ['user_id', 'role_id'];
    protected $primaryKey = 'user_id';
}
