<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;
use App\Approve;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name' , 'admin')->first();
        $teacherRole = Role::where('name' , 'teacher')->first();
        $studentRole = Role::where('name' , 'student')->first();
        $headteacherRole = Role::where('name' , 'headteacher')->first();
        $deanRole = Role::where('name' , 'dean')->first();
        $registerRole = Role::where('name' , 'register')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'provider' => '',
            'provider_id' => ''

        ]);

        $teacher = User::create([
            'name' => 'Teacher User',
            'email' => 'teacher@teacher.com',
            'password' => Hash::make('123456'),
            'provider' => '',
            'provider_id' => ''

        ]);

        $student = User::create([
            'name' => 'Student User',
            'email' => 'student@student.com',
            'password' => Hash::make('123456'),
            'provider' => '',
            'provider_id' => ''

        ]);
        $headteacher = User::create([
            'name' => 'Headteacher User',
            'email' => 'headteacher@headteacher.com',
            'password' => Hash::make('123456'),
            'provider' => '',
            'provider_id' => ''

        ]);
        $dean = User::create([
            'name' => 'Dean User',
            'email' => 'dean@dean.com',
            'password' => Hash::make('123456'),
            'provider' => '',
            'provider_id' => ''

        ]);
        $register = User::create([
            'name' => 'Register User',
            'email' => 'register@register.com',
            'password' => Hash::make('123456'),
            'provider' => '',
            'provider_id' => ''

        ]);
        

        $admin->roles()->attach($adminRole);
        $teacher->roles()->attach($teacherRole);
        $student->roles()->attach($studentRole);
        $headteacher->roles()->attach($headteacherRole);
        $dean->roles()->attach($deanRole);
        $register->roles()->attach($registerRole);
       
    }
}
