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
        Schema::create('prof_mats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProf');
            $table->unsignedBigInteger('idMat');
            $table->foreign('idProf')->references('id')->on('profs')->onDelete('cascade');
            $table->foreign('idMat')->references('id')->on('matieres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prof_mats');
    }
};
