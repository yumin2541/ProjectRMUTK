<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetition07sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petition07s', function (Blueprint $table) {
            $table->id();
            $table->string('studentcsv_id'); 
            $table->integer('petition_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('approve_id')->nullable(); 
            $table->string('Header'); //เรื่อง
            $table->string('Date')->nullable(); //วันที่
            $table->string('Dear')->nullable(); //เรียน
           
            $table->string('Phone')->nullable(); //เบอร์
            $table->string('Startyear')->nullable();

            $table->string('Year')->nullable();
            $table->string('Sec')->nullable();
            $table->string('Because')->nullable();

            $table->string('Advice')->nullable(); 
            $table->string('Advice_teacher')->nullable(); 
            $table->string('Dateapprove_teacher')->nullable(); //วันที่
            $table->string('Dateapprove_headteacher')->nullable(); //วันที่
            $table->string('Dateapprove_dean')->nullable(); //วันที่
           
            $table->string('Sig_teacher')->nullable(); 
            $table->string('Sig_headteacher')->nullable(); 
            $table->string('Sig_dean')->nullable(); 
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
        Schema::dropIfExists('petition07s');
    }
}
