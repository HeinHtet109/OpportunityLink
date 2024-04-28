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
        Schema::create('active_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('freelancer_id');
            $table->unsignedBigInteger('employer_id');
            $table->timestamp('start_at');
            $table->timestamp('end_at')->nullable();
            $table->boolean('freelancer_end')->default(false);
            $table->boolean('employer_end')->default(false);
            $table->enum('status', ACTIVEJOB_STATUS);
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('job_listings')->onDelete('cascade');
            $table->foreign('freelancer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('active_jobs');
    }
};
