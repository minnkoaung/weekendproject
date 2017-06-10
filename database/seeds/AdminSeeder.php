<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		User::create([
			'name' => 'Super Admin',
			'email' => 'admin@wpa26.org',
			'password' => bcrypt("123456"),
			'is_admin' => true,
			'is_super' => true,
		]);

		User::create([
			'name' => 'Admin',
			'email' => 'administrator@wpa26.org',
			'password' => bcrypt("123456"),
			'is_admin' => true,
			'is_super' => false,
		]);
	}
}
