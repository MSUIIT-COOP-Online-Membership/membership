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
        Schema::create('spouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('spouse_fname')->nullable();
            $table->string('spouse_mname')->nullable();
            $table->string('spouse_lname')->nullable();
            $table->string('spouse_suffix')->nullable();
            $table->date('spouse_dob')->nullable();
            $table->integer('spouse_age')->nullable();
            $table->string('spouse_contact')->nullable();
            $table->string('spouse_occu')->nullable();
            $table->string('spouse_emp_name')->nullable();
            $table->string('spouse_emp_stat')->nullable();
            $table->string('spouse_monthly_income')->nullable();
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
        Schema::dropIfExists('spouses');
    }
};
