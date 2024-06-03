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
       Schema::create('workorders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id');
            $table->text('about')->nullable();
            $table->string('problems');
            $table->date('date_init');
            $table->date('date_end')->nullable();
            $table->unsignedBigInteger('client_id'); // Asegúrate de que este sea el tipo correcto si es una clave foránea
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workorder');
    }
};
