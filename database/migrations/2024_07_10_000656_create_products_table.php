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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('title_vi', 191)->nullable();
            $table->string('payload_vi', 191)->nullable();
            $table->text('description_vi')->nullable();
            $table->string('slug', 191)->nullable();
            $table->string('title_en', 191)->nullable();
            $table->string('payload_en', 191)->nullable();
            $table->text('description_en')->nullable();
            $table->text('general_specifications_vi')->nullable();
            $table->text('features_vi')->nullable();
            $table->text('general_specifications_en')->nullable();
            $table->text('features_en')->nullable();
            $table->integer('price')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
