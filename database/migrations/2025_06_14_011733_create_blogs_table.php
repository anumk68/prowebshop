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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog');
            $table->string('image');
            $table->string('meta_image');
            $table->string('short_description');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->string('meta_keyword');
            $table->string('image_alt');
            $table->string('slug');
            $table->string('title');
            $table->string('description');
            $table->string('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
