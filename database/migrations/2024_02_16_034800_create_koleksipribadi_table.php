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
        Schema::create('koleksipribadi', function (Blueprint $table) {
                $table->id('koleksiID');
                $table->unsignedBigInteger('id');
                $table->unsignedBigInteger('bukuID');
                $table->timestamps();

                $table->foreign('id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('bukuID')->references('bukuID')->on('bukus')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koleksipribadi');
    }
};
