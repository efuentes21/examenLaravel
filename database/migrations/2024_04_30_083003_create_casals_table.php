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
        Schema::create('casals', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamp('data_inici')->nullable();
            $table->timestamp('data_final')->nullable();
            $table->integer('n_places');
            $table->foreignId('ciutat_id')->constrained('ciutats');

            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casals');
    }
};
