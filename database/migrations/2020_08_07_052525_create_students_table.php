<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('IDstudent');
            $table->integer('IDteacher');
            $table->string('Fname');
            $table->string('Lname');
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
        Schema::dropIfExists('students');
    }
}
