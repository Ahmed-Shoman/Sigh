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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('logo');
            $table->text('meta_title');
            $table->text('meta_description');
            $table->string('name_brand');
            $table->string('mobile');
            $table->string('whatsapp');
            $table->text('location');
            $table->text('email');
            $table->text('time_work');
             $table->longText('privacy');
            $table->longText('terms_and_condition');
            $table->float('price_delivery');
            $table->float('price_fast_delivery');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
