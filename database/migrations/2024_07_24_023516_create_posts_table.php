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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name_vi')->nullable();
            $table->string('name_en')->nullable();
            $table->text('pic')->nullable();
            $table->string('slug');
            $table->text('description_vi')->nullable();
            $table->text('description_en')->nullable();
            $table->longText('detail_vi')->nullable();
            $table->longText('detail_en')->nullable();
            $table->foreignId('years_id')->constrained('years')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
