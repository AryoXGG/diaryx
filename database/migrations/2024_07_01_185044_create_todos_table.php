<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id('todo_id'); // Primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key
            $table->string('task');
            $table->date('due_date');
            $table->enum('status', ['Belum Mulai', 'Sedang Proses', 'Selesai']);
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
}

