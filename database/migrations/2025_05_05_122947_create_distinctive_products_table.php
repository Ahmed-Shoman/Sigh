<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('distinctive_products', function (Blueprint $table) {
            $table->id();
            $table->string('main_title');
            $table->text('description');
            $table->json('products')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distinctive_products');
    }
};
