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
        Schema::create('classement', function (Blueprint $table) {
            $table->id();
            
            // Clés étrangères
            $table->unsignedBigInteger('idEtu');
            $table->unsignedBigInteger('idFil');
            $table->unsignedBigInteger('idSem');
            
            $table->foreign('idEtu')->references('id')->on('users');
            $table->foreign('idFil')->references('id')->on('filieres');
            $table->foreign('idSem')->references('id')->on('semestres');
            
            // Valeur moyenne
            $table->float('moy');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classement');
    }
};
