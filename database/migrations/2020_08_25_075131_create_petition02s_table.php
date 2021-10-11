<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetition02sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petition02s', function (Blueprint $table) {
            $table->id();
            $table->string('studentcsv_id');
            $table->integer('petition_id')->nullable(); 
            $table->integer('user_id')->nullable(); 
            $table->integer('approve_id')->nullable(); 
            $table->string('Date')->nullable(); //วันที่
            $table->string('Dear')->nullable(); //เรียน
            $table->string('Case_radio')->nullable();
            $table->string('Status_case1')->nullable();
            $table->string('For_case1')->nullable();
            $table->integer('CertTH_case1')->nullable();
            $table->integer('CertEN_case1')->nullable();
            $table->string('For_case2')->nullable();
            $table->integer('CertTH_case2')->nullable();
            $table->integer('CertEN_case2')->nullable();
            $table->string('Advice')->nullable();
            $table->string('Phone')->nullable(); //เบอร์
            $table->string('Datepickup')->nullable();//วันรับเอกสาร
            $table->string('Idpickup')->nullable();//เลขรับเอกสาร
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
        Schema::dropIfExists('petition02s');
    }
}
