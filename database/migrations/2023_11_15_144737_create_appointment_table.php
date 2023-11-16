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
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->unsignedBigInteger('branch_id');
            $table->text('subject');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('status');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment');
    }
};
