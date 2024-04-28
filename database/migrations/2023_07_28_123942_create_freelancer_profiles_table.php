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
        Schema::create('freelancer_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('profile_photo')->default(USER_DEFAULT_IMG_PATH);
            $table->string('job_title');
            $table->string('age');
            $table->string('gender');
            $table->enum('experience_level',[EXPERIENCE_LEVEL]);
            $table->enum('education_level',[EDUCATION_LEVEL]);
            $table->string('languages')->nullable();
            $table->string('current_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->longText('address');
            $table->unsignedBigInteger('city_id');
            $table->enum('status', PROFILE_STATUS)->default(INACTIVE);
            $table->longText('biography')->nullable();
            $table->timestamps();

            $table->foreign('city_id')->on('cities')->references('id')->onDelete('cascade');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freelancer_profiles');
    }
};
