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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->string('business_name')->nullable();
            $table->integer('business_tin')->nullable();
            $table->longText('business_address')->nullable();
            $table->string('business_contact')->nullable();
            $table->integer('op_duration_year')->nullable();
            $table->integer('op_duration_month')->nullable();
            $table->integer('no_workers')->nullable();
            $table->string('yearly_income')->nullable();
            $table->string('source_income')->nullable();
            $table->string('monthly_income')->nullable();

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
        Schema::dropIfExists('businesses');
    }
};
