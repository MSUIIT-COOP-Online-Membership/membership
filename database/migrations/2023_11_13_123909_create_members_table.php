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
        Schema::create('members', function (Blueprint $table) {
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
            $table->text('religion')->nullable();
            $table->string('email')->nullable();
            $table->longText('place_birth')->nullable();
            $table->longText('present_address')->nullable();
            $table->string('duration_residency')->nullable();
            $table->string('living_parents')->nullable();
            $table->string('house')->nullable();
            $table->decimal('house_month')->nullable();
            $table->string('lot')->nullable();
            $table->decimal('lot_month')->nullable();
            $table->integer('tin')->nullable();
            $table->longText('educational_attainment')->nullable();
            $table->string('img')->nullable();
            $table->string('emp_stat')->nullable();
            $table->string('emp_type')->nullable();
            $table->longText('profession')->nullable();
            $table->string('emp_others')->nullable();
            $table->string('business_type')->nullable();
            $table->string('asset_size')->nullable();
            $table->string('employer_name')->nullable();
            $table->string('service_length')->nullable();
            $table->string('employer_status')->nullable();
            $table->longText('employer_address')->nullable();
            $table->string('employer_contact')->nullable();
            $table->string('monthly_salary')->nullable();
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
            $table->string('father_fname')->nullable();
            $table->string('father_mname')->nullable();
            $table->string('father_lname')->nullable();
            $table->string('father_suffix')->nullable();
            $table->date('father_dob')->nullable();
            $table->integer('father_age')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('father_occu')->nullable();
            $table->string('mother_fname')->nullable();
            $table->string('mother_mname')->nullable();
            $table->string('mother_lname')->nullable();
            $table->string('mother_suffix')->nullable();
            $table->date('mother_dob')->nullable();
            $table->integer('mother_age')->nullable();
            $table->string('mother_contact')->nullable();
            $table->string('mother_occu')->nullable();
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
            $table->integer('no_child')->nullable();
            $table->integer('no_child_contrib')->nullable();
            $table->string('total_monthly_contrib')->nullable();
            $table->integer('no_child_work')->nullable();
            $table->integer('no_child_study')->nullable();
            $table->integer('no_child_notstudy')->nullable();
            $table->string('house_yearly_income')->nullable();
            $table->string('emer_name')->nullable();
            $table->string('emer_contact')->nullable();
            $table->longText('emer_address')->nullable();
            $table->string('ben_fname')->nullable();
            $table->string('ben_mname')->nullable();
            $table->string('ben_lname')->nullable(); 
            $table->string('ben_suffix')->nullable();
            $table->date('ben_dob')->nullable();
            $table->string('ben_relationship')->nullable();
            $table->string('e_signature')->nullable();
            $table->string('app_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
