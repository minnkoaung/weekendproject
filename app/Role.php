<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*Role Controller*/
class Role extends Model {


	//
	 protected $fillable = ['name', 'slug', 'permissions'];
	protected $casts = [
		'permissions' => 'array',
	];
}
