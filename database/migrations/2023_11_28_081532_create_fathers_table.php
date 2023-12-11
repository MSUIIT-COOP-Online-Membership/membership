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
        Schema::create('fathers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('father_fname')->nullable();
            $table->string('father_mname')->nullable();
            $table->string('father_lname')->nullable();
            $table->string('father_suffix')->nullable();
            $table->date('father_dob')->nullable();
            $table->integer('father_age')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('father_occu')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fathers');
    }
};
