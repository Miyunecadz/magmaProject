<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('call_sign');
            $table->string('chapter');
            $table->string('contact_no');
            $table->string('present_employment');
            $table->string('home_address');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('citizenship');
            $table->string('gender');
            $table->string('height');
            $table->string('weight');
            $table->string('blood_type');
            $table->string('emergency_name');
            $table->string('emergency_relation');
            $table->string('emergency_contact_no');
            $table->string('father_name');
            $table->string('father_occupation');
            $table->string('mother_name');
            $table->string('mother_occupation');
            $table->integer('setup_hr');
            $table->integer('setup_vhf');
            $table->integer('setup_uhf');
            $table->integer('setup_areal_antenna');
            $table->integer('setup_spare_battery');
            $table->integer('setup_generator');
            $table->integer('setup_solar_panel');
            $table->integer('setup_battery');
            $table->integer('setup_mobile_setup');
            $table->integer('setup_drone');
            $table->string('siblings1');
            $table->string('siblings2');
            $table->string('siblings3');
            $table->string('siblings4');
            $table->string('siblings5');
            $table->string('siblings6');
            $table->string('school_secondary');
            $table->date('secondary_date_graduate');
            $table->string('school_college');
            $table->date('college_date_graduate');
            $table->string('school_post');
            $table->date('post_date_graduate');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_information');
    }
}
