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
        Schema::create('statistic_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('name');
            $table->integer('number');
            $table->string('logo');
            $table->foreignId('statistic_id')->constrained('statistics')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistic_items');
    }
};
