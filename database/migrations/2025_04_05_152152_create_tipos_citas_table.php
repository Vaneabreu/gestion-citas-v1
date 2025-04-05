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
        Schema::create('tipos_citas', function (Blueprint $table) {
            $table->bigIncrements('id_tipos_citas');
            $table->string('descripcion');
            $table->decimal('precio1', 10, 2)->nullable();
            $table->decimal('precio2', 10, 2)->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_citas');
    }
};
