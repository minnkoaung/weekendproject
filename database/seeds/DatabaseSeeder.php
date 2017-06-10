<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
<<<<<<< HEAD
        // $this->call(BlogSeeder::class);
        $this->call(AdminSeeder::class);
=======
        $this->call(AdminSeeder::class);
        // $this->call(RoleSeeder::class);
>>>>>>> 50bb81ac8db89d7672c4ae7460b27f843c24b0db
    }
}
