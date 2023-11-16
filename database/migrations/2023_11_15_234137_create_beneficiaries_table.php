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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('ben_fname')->nullable();
            $table->string('ben_mname')->nullable();
            $table->string('ben_lname')->nullable(); 
            $table->string('ben_suffix')->nullable();
            $table->date('ben_dob')->nullable();
            $table->string('ben_relationship')->nullable();
            $table->timestamps();   

            // Define foreign key constraints
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
