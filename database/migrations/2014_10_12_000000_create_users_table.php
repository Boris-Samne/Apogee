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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('appogee')->nullable();
            $table->string('nomEtu')->nullable();
            $table->string('prenomEtu')->nullable();
            $table->string('adrEtu')->nullable(); 
            $table->integer('filiere')->nullable();
            $table->date('dateNaissEtu')->nullable();
            $table->string('telEtu')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
