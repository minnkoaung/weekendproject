<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        //
        
        // User::create([
        // 	'name'	=> 'Super Admin',
        // 	'email'	=> 'admin@wpa26.org',
        // 	'password'	=> bcrypt("123456"),
        // 	'is_admin'	=> true,
        // 	'is_super'	=> true,
        // 	]);

        User::create([
            'name'  => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password'  => bcrypt("123456"),
            'is_admin'  => false,
            'is_super'  => true
            ]);

    }
}
