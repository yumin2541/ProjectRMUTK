<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetition01sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petition01s', function (Blueprint $table) {
            $table->id();
            $table->string('studentcsv_id'); 
            $table->integer('petition_id');
            $table->integer('user_id'); 
            $table->integer('approve_id'); 
            $table->string('Date'); //วันที่
            $table->string('Dear'); //เรียน
            $table->string('Header'); //เรื่อง
            $table->string('Body'); 
            $table->string('Advice')->nullable(); 
            $table->string('Phone')->nullable(); //เบอร์
            $table->string('Dateapprove_teacher')->nullable(); //วันที่
            $table->string('Dateapprove_headteacher')->nullable(); //วันที่
            $table->string('Dateapprove_dean')->nullable(); //วันที่
            $table->string('Advice_teacher')->nullable(); 
            $table->string('Advice_headteacher')->nullable(); 
            $table->string('Advice_dean')->nullable();
            $table->string('sig_teacher')->nullable(); 
            $table->string('sig_headteacher')->nullable(); 
            $table->string('sig_dean')->nullable();  
            
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
        Schema::dropIfExists('petition01s');
    }
}
