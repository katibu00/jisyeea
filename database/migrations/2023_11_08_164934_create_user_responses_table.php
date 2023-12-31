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
        Schema::create('user_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('question_id');
            $table->text('response')->nullable();
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('program_id')->references('id')->on('programs');
            $table->foreign('question_id')->references('id')->on('program_questions');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_responses');
    }
};
