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
  Schema::create('waranties', function (Blueprint $table) {
    $table->increments('id');
    $table->text('description_items');
    $table->integer('client_id'); // Asegúrate de que este sea el tipo correcto
    $table->string('derechos');
    $table->date('date_end');
    $table->text('vias_reclamacion')->nullable();
    $table->unsignedBigInteger('worder_id'); // Cambiado a unsignedBigInteger para coincidir con workorders.id
    $table->foreign('worder_id')->references('id')->on('workorders')->onDelete('cascade');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waranties');
    }
};
