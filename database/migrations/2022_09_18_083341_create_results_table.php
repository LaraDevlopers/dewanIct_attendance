<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('reg_number');
            $table->integer('roll_no');
            $table->string('s_name');
            $table->string('f_name');
            $table->string('m_name');
            $table->float('cgpa');
            $table->text('institute');
            $table->integer('institute_code');
            $table->string('course_name');
            $table->string('course_duration');
            $table->string('passing_year');


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
        Schema::dropIfExists('results');
    }
};
