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
        Schema::table('duvidas', function (Blueprint $table) {
           $table->foreignId('user_id')->constrained('users');
           $table->foreignId('categoria_id')->constrained('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('duvidas', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
        });
    }
};
