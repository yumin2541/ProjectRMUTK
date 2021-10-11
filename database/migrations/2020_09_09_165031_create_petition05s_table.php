<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetition05sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petition05s', function (Blueprint $table) {
            $table->id();
            $table->string('studentcsv_id'); 
            $table->integer('petition_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('approve_id')->nullable(); 
            $table->string('Date')->nullable(); //วันที่
            $table->string('Dear')->nullable(); //เรียน

            $table->string('Startyear')->nullable();
            $table->string('Sec')->nullable();
            $table->string('Schoolyear')->nullable();

            $table->string('Case_radio')->nullable();
            $table->string('Header'); //เรื่อง

            $table->string('Numstay')->nullable();
            $table->string('Secstay')->nullable();
            $table->string('Yearstay')->nullable();
            $table->string('Reason')->nullable();
            $table->string('File_stay')->nullable();

            $table->string('Advice')->nullable(); 
            $table->string('Phone')->nullable(); //เบอร์

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
        Schema::dropIfExists('petition05s');
    }
}
