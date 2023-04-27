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
        Schema::create('propostas', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('tipo')->default(1);

            $table->longText('objeto');
            $table->string('descricao',255);
            $table->foreignId('contrato_id')->constrained();
            $table->foreignId('empresa_id')->constrained();

            $table->boolean('assinado')->nullable();
            $table->date('data_assinatura')->nullable();
            $table->date('inicio_vigencia');
            $table->date('fim_vigencia');
            $table->double('valor', 8, 2)->nullable();
            $table->tinyInteger('ultimo_ta')->nullable();

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
        Schema::table('propostas', function (Blueprint $table) {
            Schema::dropIfExists('propostas');
        });
    }
};
