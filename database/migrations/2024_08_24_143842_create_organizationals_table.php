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
        Schema::create('organizationals', function (Blueprint $table) {
            $table->id();
            $table->string('parent_id')->nullable();
            $table->string('pic')->nullable();
            $table->string('name_vi')->nullable();
            $table->string('name_en')->nullable();
            $table->string('position_vi')->nullable();
            $table->string('position_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizationals');
    }
};
