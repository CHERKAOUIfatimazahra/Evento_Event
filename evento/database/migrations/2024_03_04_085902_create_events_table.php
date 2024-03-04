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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->enum('type', ["Physical", "Online"])->default('Physical');
            $table->float('price');
            $table->integer('tickets_available');
            $table->string('image')->nullable();
            
            $table->boolean('is_published')->default(false);
            $table->string('status')->default('pending');

            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
