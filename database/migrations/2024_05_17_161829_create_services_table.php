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
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('install')->nullable();   //instalacion de la bomba de agua en el lugar
            $table->boolean('unistall')->nullable(); //retiro de la bomba del lugar donde esta
            $table->string('condition'); //(iniciado/terminado/detenido/cancelado)

            $table->unsignedBigInteger('torder_id');
            $table->foreign('torder_id')->references('id')->on('typeorders');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
