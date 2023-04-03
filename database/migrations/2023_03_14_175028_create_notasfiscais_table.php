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
        Schema::create('notasfiscais', function (Blueprint $table) {
            $table->id();
            $table->foreignid('empresa_id')->constrained();
            $table->foreignid('contrato_id')->constrained();
            $table->integer('nronf');
            $table->date('data_emissao');
            $table->date('data_vencto');
            $table->tinyInteger('mes_competencia');
            $table->tinyInteger('ano_competencia');
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
        Schema::dropIfExists('notasfiscais');
    }
};
