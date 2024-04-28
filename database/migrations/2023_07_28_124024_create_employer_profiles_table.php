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
        Schema::create('employer_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('logo');
            $table->string('company_name');
            $table->string('company_phone');
            $table->string('website')->nullable();
            $table->string('since')->nullable();
            $table->enum('team_size', TEAM_SIZE);
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
        Schema::dropIfExists('employer_profiles');
    }
};
