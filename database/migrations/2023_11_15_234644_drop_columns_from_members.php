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
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('ben_fname');
            $table->dropColumn('ben_mname');
            $table->dropColumn('ben_lname');
            $table->dropColumn('ben_suffix');
            $table->dropColumn('ben_dob');
            $table->dropColumn('ben_relationship');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            //
        });
    }
};
