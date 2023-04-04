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
        Schema::create('processos', function (Blueprint $table) {
            $table->id();
            $table->foreignid('notasfiscais_id')->constrained();
            $table->boolean('capa_C')->nullable();
            $table->boolean('capa_I')->nullable();
            $table->boolean('capa_G')->nullable();
            $table->boolean('capa_T')->nullable();
            $table->boolean('capa_P')->nullable();
            $table->boolean('grafico1')->nullable();
            $table->boolean('check_list')->nullable();
            $table->boolean('conrole_interno')->nullable();
            $table->boolean('contrato')->nullable();
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
        Schema::dropIfExists('processos');
    }
};
