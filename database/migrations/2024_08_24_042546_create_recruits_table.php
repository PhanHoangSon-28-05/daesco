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
        Schema::create('recruits', function (Blueprint $table) {
            $table->id();
            $table->string('title_vi')->nullable();
            $table->string('title_en')->nullable();
            $table->string('position_vi')->nullable();
            $table->string('position_en')->nullable();
            $table->string('workplace_vi')->nullable();
            $table->string('workplace_en')->nullable();
            $table->longText('content_vi')->nullable();
            $table->longText('content_en')->nullable();
            $table->string('salary')->nullable();
            $table->bigInteger('amount')->default(0);
            $table->string('email')->nullable();
            $table->date('expired_at')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruits');
    }
};
