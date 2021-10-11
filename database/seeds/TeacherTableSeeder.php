<?php

use Illuminate\Database\Seeder;
use App\Teacher;
class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::truncate();

        Teacher::create(['name' => 'อ.ชนาเตร อรรถยุกติ']);
        Teacher::create(['name' => 'อ.มลรดา ศิริมงคล']);
        Teacher::create(['name' => 'อ.ชาญวิทย์ มุสิกะ']);
       
    }
}
