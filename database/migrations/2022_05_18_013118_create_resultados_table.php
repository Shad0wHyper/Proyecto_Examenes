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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAlumno');
            $table->string('alumno');
            $table->unsignedBigInteger('idDocente');
            $table->unsignedBigInteger('idExamen');
            $table->string('tituloExamen');
            $table->integer('intentos');
            $table->integer('promedio');

            // Relaciones de los campos
            $table->foreign('idAlumno')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idDocente')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idExamen')->references('id')->on('examens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados');
    }
};
