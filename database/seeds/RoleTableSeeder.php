<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Role::truncate();

       Role::create(['name' => 'admin']);
       Role::create(['name' => 'teacher']);
       Role::create(['name' => 'student']);
       Role::create(['name' => 'headteacher']);
       Role::create(['name' => 'dean']);
       Role::create(['name' => 'register']);
       
    }
}
