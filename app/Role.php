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

	public function users()
	{
		return $this->belongsToMany(User::class, 'role_users');
	}
}
