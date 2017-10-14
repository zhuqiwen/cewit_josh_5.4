<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCtFacultiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_faculties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rank')->nullable();
            $table->string('administrative_title')->nullable();
            $table->string('school')->nullable();
            $table->string('school_code')->nullable();
            $table->string('department')->nullable();
            $table->string('department_code')->nullable();
            $table->string('campus_code')->nullable();
            $table->string('stem')->nullable();
            $table->string('campus_phone')->nullable();
            $table->integer('contact_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ct_faculties');
    }
}
