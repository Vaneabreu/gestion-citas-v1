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
        Schema::create('citas', function (Blueprint $table) {
            $table->bigIncrements('id_citas');
            $table->unsignedBigInteger('id_doctores');
            $table->dateTime('fechacita');
            $table->unsignedBigInteger('id_pacientes');
            $table->unsignedBigInteger('id_aseguradoras')->nullable(); 
            $table->string('seguro')->nullable(); 
            $table->unsignedBigInteger('id_tipos_citas');
            $table->time('hora_reserva')->nullable();
            $table->time('hora_entrada')->nullable();
            $table->time('hora_salida')->nullable();
            $table->text('honorarios')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        
            $table->foreign('id_doctores')->references('id_doctores')->on('doctores')->onDelete('cascade');
            $table->foreign('id_pacientes')->references('id_pacientes')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_tipos_citas')->references('id_tipos_citas')->on('tipos_citas')->onDelete('cascade');
            $table->foreign('id_aseguradoras')->references('id_aseguradoras')->on('aseguradoras')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
