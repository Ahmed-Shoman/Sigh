<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sigh_contents', function (Blueprint $table) {
            $table->id();
            $table->string('main_title');
            $table->text('description');
            $table->json('images')->nullable();
            $table->string('sub_title')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sigh_contents');
    }
};