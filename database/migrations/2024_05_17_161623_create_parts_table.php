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
        Schema::create('parts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('categorie')->nullable();
            $table->string('code')->nullable();
            $table->string('mark')->nullable();
            $table->string('price');
            $table->string('features')->nullable();
            $table->string('provider')->nullable();
            $table->date('date_init')->nullable();
            $table->date('date_out')->nullable();
            $table->string('quantity');
            $table->float('costunit')->nullable();
            $table->float('saleprice');
            $table->float('tax')->nullable();
            $table->float('gain')->nullable();
            $table->float('inflation')->nullable();
            $table->string('typepurchase');

            $table->unsignedBigInteger('budjet_id');
            $table->foreign('budjet_id')->references('id')->on('budjets');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parts');
    }
};
