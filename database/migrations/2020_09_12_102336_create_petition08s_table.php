<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetition08sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petition08s', function (Blueprint $table) {
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
            $table->string('Case_radio')->nullable();

            $table->string('Sec_case1')->nullable();
            $table->string('Year_case1')->nullable();

            $table->string('Sec_case2')->nullable();
            $table->string('Year_case2')->nullable();
            $table->string('Because_case2')->nullable();
            $table->string('Secout_case2')->nullable();
            $table->string('Yearout_case2')->nullable();

            $table->string('Advice')->nullable(); 
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
        Schema::dropIfExists('petition08s');
    }
}
