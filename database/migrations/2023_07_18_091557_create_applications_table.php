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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('application_number')->unique();
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
            $table->string('artisan_skills');
            $table->string('computer_skills');
            $table->string('category');
            $table->string('programs');
            $table->string('status')->default('pending');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('cv_upload')->nullable();
            $table->string('nysc_certificate_upload')->nullable();
            $table->string('other_uploads')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
