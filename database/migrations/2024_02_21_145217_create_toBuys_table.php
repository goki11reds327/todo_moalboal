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
        Schema::create('toBuys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('checkbox');
            $table->string('ingredient');
            $table->text('amount');
            $table->string('place');
            $table->foreignId('user_id')->constrained;
            $table->text('item_image');
            $table->foreignId('toBuy_id')->constrained;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toBuys');
    }
};
