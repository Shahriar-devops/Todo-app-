<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('date')->nullable();
            $table->unsignedBigInteger('todo_file')->nullable();
            $table->longtext('description')->nullable();
            $table->unsignedTinyInteger('status')->default(\App\Enums\TodoStatus::PENDING)->comment('pending = 1, processing = 2,complete = 3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
};
