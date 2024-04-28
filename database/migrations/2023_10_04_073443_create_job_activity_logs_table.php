<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('active_job_id');
            $table->unsignedBigInteger('user_id');
            $table->longText('message');
            $table->enum('status', ACTIVITY_STATUS)->default(DELIVERED);
            $table->timestamps();

            $table->foreign('active_job_id')->references('id')->on('active_jobs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_activity_logs');
    }
};
