<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachercsvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachercsvs', function (Blueprint $table) {
            $table->id();
            $table->string('Titlename');
            $table->string('Fname');
            $table->string('Lname');
            $table->string('Major'); //สาขา
            $table->string('Faculty'); //คณะ
            $table->string('Mail');
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
        Schema::dropIfExists('teachercsvs');
    }
}
