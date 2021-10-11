<?php

use Illuminate\Database\Seeder;
use App\Approve;
class ApproveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Approve::truncate();

        Approve::create(['name' => 'รออาจารย์ที่ปรึกษาอนุมัติ']);
        Approve::create(['name' => 'รอหัวหน้าสาขาอนุมัติ']);
        Approve::create(['name' => 'รอคณบดีอนุมัติ']);
        Approve::create(['name' => 'รอเจ้่าหน้าหน้าที่สำนักงานทะเบียนอนุมัติ']);
        Approve::create(['name' => 'อาจารย์ที่ปรึกษาไม่อนุมัติ']);
        Approve::create(['name' => 'หัวหน้าสาขาไม่อนุมัติ']);
        Approve::create(['name' => 'คณบดีไม่อนุมัติ']);
        Approve::create(['name' => 'อนุมัติเสร็จสิ้น']);
        Approve::create(['name' => 'รอทะเบียนอนุมัติ']);
        Approve::create(['name' => 'ทะเทียบไม่รับคำร้อง']);
        Approve::create(['name' => 'ทะเบียนอนุมัติคำร้องเรียบร้อย']);
        
    }
}
