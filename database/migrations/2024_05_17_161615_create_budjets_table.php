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
        Schema::create('budjets', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->float('value');
            $table->float('value_dolar');
            $table->float('operation_value');
            $table->string('forma_pago');


            $table->unsignedBigInteger('worder_id');
            $table->foreign('worder_id')->references('id')->on('workorders')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budjets');
    }
};
