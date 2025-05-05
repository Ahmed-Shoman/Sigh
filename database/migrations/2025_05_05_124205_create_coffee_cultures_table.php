<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coffee_cultures', function (Blueprint $table) {
            $table->id();
            $table->string('main_title');
            $table->text('description');
            $table->json('images')->nullable();
            $table->string('title');
            $table->json('items')->nullable();
            $table->string('cta_button_link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coffee_cultures');
    }
};
