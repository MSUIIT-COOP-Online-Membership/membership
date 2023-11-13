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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('lname')->nullable();
            $table->string('mname')->nullable();
            $table->string('fname')->nullable();
            $table->string('suffix')->nullable();
            $table->string('sex')->nullable();
            $table->string('civil_status')->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->longText('present_address')->nullable();
            $table->text('position')->nullable();
            $table->string('id_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
};

