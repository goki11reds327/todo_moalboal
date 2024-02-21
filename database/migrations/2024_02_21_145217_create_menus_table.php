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
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('checkbox');
            $table->string('ingredients');
            $table->integer('amount');
            $table->string('place');
            $table->foreignId('user_id')->constrained();
            $table->text('item_image');
            $table->string('contents');
            $table->string('post_image');
            $table->foreignId('todo_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
