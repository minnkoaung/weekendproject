<?php

use Illuminate\Database\Seeder;

<<<<<<< HEAD
class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//$this->call(UsersTableSeeder::class);
		$this->call(AdminSeeder::class);
		$this->call(RoleSeeder::class);
	}
=======
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(BlogSeeder::class);
        $this->call(AdminSeeder::class);

        // $this->call(AdminSeeder::class);
        $this->call(RoleSeeder::class);

    }
>>>>>>> heinhtut
}
