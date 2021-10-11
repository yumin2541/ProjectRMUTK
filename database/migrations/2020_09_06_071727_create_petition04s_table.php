<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetition04sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petition04s', function (Blueprint $table) {
            $table->id();
            $table->string('studentcsv_id');

            $table->integer('petition_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('approve_id')->nullable(); 
            $table->string('Date')->nullable(); //วันที่
            $table->string('Dear')->nullable(); //เรียน
           
            $table->string('IDcard')->nullable(); //เมล์
            $table->string('Birthday')->nullable();
            $table->string('Sex')->nullable();
            $table->string('Nationality')->nullable();
            $table->string('House_number')->nullable();
            $table->string('Building')->nullable();
            $table->string('Floor')->nullable();
            $table->string('Moo')->nullable();
            $table->string('Soi')->nullable();
            $table->string('Street')->nullable();
            $table->string('Province')->nullable();
            $table->string('County')->nullable();
            $table->string('District')->nullable();
            $table->string('Postal_code')->nullable();
            $table->string('Tel')->nullable();
            $table->string('Tel_mobile')->nullable();
            $table->string('Year')->nullable();
            $table->string('Case_radio')->nullable();
            $table->string('Image_case1')->nullable();
            $table->string('Docidcard_case1')->nullable();
            $table->string('Docidcard_case2')->nullable();
            $table->string('Docname_case2')->nullable();

            $table->string('Advice')->nullable();

            $table->string('Status_stu')->nullable();
            $table->string('Daystart_card')->nullable();
            $table->string('Dayend_card')->nullable();

            $table->string('Dateapprove_register')->nullable();
            $table->string('Sig_register')->nullable();
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
        Schema::dropIfExists('petition04s');
    }
}
