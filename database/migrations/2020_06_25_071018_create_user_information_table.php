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
            $table->string('fullname');
            $table->string('call_sign')->nullable();
            $table->string('chapter')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('present_employment')->nullable();
            $table->string('home_address');
            $table->date('birth_date');
            $table->string('birth_place')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('gender');
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('emergency_name')->nullable();
            $table->string('emergency_relation')->nullable();
            $table->string('emergency_contact_no')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
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
            $table->string('siblings1')->nullable();
            $table->string('siblings2')->nullable();
            $table->string('siblings3')->nullable();
            $table->string('siblings4')->nullable();
            $table->string('siblings5')->nullable();
            $table->string('siblings6')->nullable();
            $table->string('school_secondary')->nullable();
            $table->string('secondary_date_graduate')->nullable();
            $table->string('school_college')->nullable();
            $table->string('college_date_graduate')->nullable();
            $table->string('school_post')->nullable();
            $table->string('post_date_graduate')->nullable();
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
