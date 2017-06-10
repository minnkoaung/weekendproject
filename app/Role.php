<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Role extends Model {
	//
	protected $fillable = ['name', 'slug', 'permissions'];
	protected $casts = [
		'permissions' => 'array',
	];
=======
class Role extends Model
{
    //
    protected $casts = [
    	'permissions' => 'array'
    ];
>>>>>>> heinhtut
}
