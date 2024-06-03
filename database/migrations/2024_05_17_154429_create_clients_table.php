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
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('contacto');
            $table->string('social')->nullable();
            $table->string('direccion');
            $table->string('ciudad')->nullable();
            $table->string('nombre_cliente')->nullable();
            $table->string('cuit')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono_cliente')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->boolean('allow')->default(true)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
