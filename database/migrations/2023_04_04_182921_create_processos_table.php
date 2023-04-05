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
            $table->foreignId('empresa_id')->constrained();
            $table->timestamp('capa_C')->nullable();
            $table->timestamp('capa_I')->nullable();
            $table->timestamp('capa_G')->nullable();
            $table->timestamp('capa_T')->nullable();
            $table->timestamp('capa_P')->nullable();
            $table->timestamp('grafico1')->nullable();
            $table->timestamp('check_list')->nullable();
            $table->timestamp('conrole_interno')->nullable();
            $table->timestamp('contrato')->nullable();
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
