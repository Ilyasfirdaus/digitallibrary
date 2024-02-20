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
        Schema::create('kategoribuku_relasi', function (Blueprint $table) {
           
                $table->id('kategoribukuID');
                $table->unsignedBigInteger('bukuID');
                $table->unsignedBigInteger('kategoriID');
                $table->timestamps();

                $table->foreign('kategoriID')->references('kategoriID')->on('kategoribuku')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('bukuID')->references('bukuID')->on('bukus')->onDelete('cascade')->onUpdate('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoribuku_relasi');
    }
};
