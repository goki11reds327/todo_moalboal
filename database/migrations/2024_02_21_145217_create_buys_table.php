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
            $table->increments('id')->nullable();
            $table->boolean('checkbox')->nullable()->default(false);
            $table->string('ingredient')->nullable();
            $table->string('amount')->nullable();
            $table->string('place')->nullable();
            $table->string('who_buy')->nullable();
            $table->string('date')->nullable();
            $table->foreignId('user_id')->nullable()->constrained;
            $table->text('item_image')->nullable();
            $table->foreignId('menu_id')->nullable()->constrained;
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
