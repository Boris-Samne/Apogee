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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProf');
            $table->unsignedBigInteger('idMat');
            $table->unsignedBigInteger('idFil');
            $table->unsignedBigInteger('idSem');
            $table->unsignedBigInteger('idEtu');
            $table->decimal('coef');
            $table->decimal('note'); // Adapté selon la précision nécessaire pour les notes décimales
            $table->timestamps();

            $table->foreign('idProf')->references('id')->on('profs')->onDelete('cascade');
            $table->foreign('idMat')->references('id')->on('matieres')->onDelete('cascade');
            $table->foreign('idFil')->references('id')->on('filieres')->onDelete('cascade');
            $table->foreign('idSem')->references('id')->on('semestres')->onDelete('cascade');
            $table->foreign('idEtu')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};

