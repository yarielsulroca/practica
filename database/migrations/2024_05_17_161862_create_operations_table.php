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
        Schema::create('operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->string('name');
            $table->string('about')->nullable();
            $table->date('date_int')->nullable();
            $table->date('date_out')->nullable();

            $table->unsignedBigInteger('worker_id');
            $table->unsignedBigInteger('labour_id');
            $table->unsignedBigInteger('component_id');

            $table->foreign('worker_id')->references('id')->on('workers');
            $table->foreign('labour_id')->references('id')->on('labours');
            $table->foreign('component_id')->references('id')->on('components');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
