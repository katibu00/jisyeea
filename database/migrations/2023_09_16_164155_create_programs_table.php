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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->integer('category_id');
            $table->string('featured_image')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->boolean('is_open')->default(true);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('lga_origin');
            $table->string('category_interest');
            $table->string('gender');
            $table->string('education_level');
            $table->string('max_applicants')->nullable();
            $table->string('max_age')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
