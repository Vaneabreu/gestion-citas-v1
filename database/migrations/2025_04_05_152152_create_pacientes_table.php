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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id_pacientes');
            $table->string('nombre');
            $table->string('documento');
            $table->enum('sexo', ['M', 'F']);
            $table->string('whatsapp')->nullable();
            $table->string('direccion')->nullable();
            $table->unsignedBigInteger('id_aseguradoras')->nullable();
            $table->string('no_seguro')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        
            $table->foreign('id_aseguradoras')->references('id_aseguradoras')->on('aseguradoras')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
