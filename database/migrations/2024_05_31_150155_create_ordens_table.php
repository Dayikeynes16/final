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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('total');
            $table->string('status')->default('activo');
            $table->foreignId('usuario_id')->constrained('users','id');
            $table->foreignId('carrito_id')->nullable()->constrained('carritos','id');
        
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('ordenes');
    }
};
