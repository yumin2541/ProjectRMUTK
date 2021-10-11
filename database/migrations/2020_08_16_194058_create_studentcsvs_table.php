<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentcsvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentcsvs', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id');
            $table->string('IDstudent');
            $table->string('Titlename');
            $table->string('Fname');
            $table->string('Lname');
            $table->string('Titlename_eng');
            $table->string('Fname_eng');
            $table->string('Lname_eng');
            $table->string('Major'); //สาขา
            $table->string('Faculty'); //คณะ
            $table->string('course'); //หลักสูตร
            $table->string('Mail');
            $table->string('Status');//สถานะ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentcsvs');
    }
}
