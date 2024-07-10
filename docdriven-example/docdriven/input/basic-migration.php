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
        Schema::create('todo_items', function (Blueprint $table) {
            $table->id(); // id column
            $table->string('name');
            $table->boolean('is_complete')->default(false);
            $table->timestamp('due_date')->nullable();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // id column
            $table->string('content');
            $table->foreign('todo_item_id')->references('id')->on('todo_items')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('todo_items');
    }
};
