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
        Schema::create('buys', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('checkbox')->default(false);
            $table->string('ingredient');
            $table->string('amount');
            $table->string('place');
            $table->string('who_buy');
            $table->string('date');
            $table->foreignId('user_id')->constrained;
            $table->text('item_image')->nullable();
            $table->foreignId('menu_id')->constrained;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buys');
    }
};
