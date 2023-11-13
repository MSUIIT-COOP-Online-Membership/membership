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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('branch_id');
            $table->text('q_one');
            $table->text('q_two');
            $table->text('q_three');
            $table->text('q_four');
            $table->text('q_five');
            $table->text('q_six');
            $table->text('q_seven');
            $table->text('q_eight');
            $table->text('q_nine');
            $table->text('q_ten');
            $table->integer('score');
            $table->string('pass_status');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
};

