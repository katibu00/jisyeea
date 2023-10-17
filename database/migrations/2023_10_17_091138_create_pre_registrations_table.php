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
        Schema::create('pre_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('yeea_number')->unique();
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('contact_number');
            $table->string('address');
            $table->string('email');
            $table->string('lga_origin');
            $table->string('ward');
            $table->string('marital_status');
            $table->string('highest_education');
            $table->string('institution_of_study')->nullable();
            $table->string('area_of_study')->nullable();
            $table->string('nin')->nullable();
            $table->string('voter')->nullable();
            $table->string('interests')->nullable();
            $table->string('artisan_skills');
            $table->string('computer_skills');
            $table->string('preferred_category');
            $table->string('status')->default('pending');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('cv_upload')->nullable();
            $table->string('nysc_certificate_upload')->nullable();
            $table->string('other_uploads')->nullable();
            $table->string('employment_status');
            $table->string('business_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('student_details')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company_name')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_registrations');
    }
};
