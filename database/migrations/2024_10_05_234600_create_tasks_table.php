<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->enum('status', ['pending', 'in progress', 'completed'])->default('pending');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
