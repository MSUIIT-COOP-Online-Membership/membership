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
        Schema::create('branches_', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('area')->nullable();
            $table->longText('address')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches_');
    }
};
