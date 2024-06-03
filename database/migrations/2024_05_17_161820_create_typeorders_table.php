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
        Schema::create('typeorders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('worder_id');

            $table->text('problems');
            $table->date('date_init');
            $table->date('date_end')->nullable();
            $table->string('condition'); // Iniciado/Terminado/Detenido/Cancelado}
            
            $table->foreign('worder_id')->references('id')->on('workorders');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typeorders');
    }
};
