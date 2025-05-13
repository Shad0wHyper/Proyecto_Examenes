<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')
            ->constrained('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            
            $table->foreignId('id_examen')
            ->constrained('examens')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('pregunta');
            $table->string('opcion1');
            $table->string('opcion2');
            $table->string('opcion3');
            $table->string('correcta');
            $table->string('tipoP');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
};
