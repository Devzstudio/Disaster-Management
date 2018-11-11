<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'demos@esxample.com',
            'password' => bcrypt('demopassword'),
            'isAdmin' => '1'
        ]);
        $this->command->info("User added successfully :)");
    }
}
