<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*Role Controller*/
class Role extends Model {
	//
	protected $casts = [
		'permissions' => 'array',
	];
}
