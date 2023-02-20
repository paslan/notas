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

            $table->longText('objeto');
            $table->string('descricao',255);
            $table->foreignId('contrato_id')
                  ->constrained()
                  ->onDelete('CASCADE')
                  ->onUpdate('CASCADE');

            $table->boolean('assinado');
            $table->date('data_assinatura');
            $table->date('inicio_vigencia');
            $table->date('fim_vigencia');
            $table->double('valor', 8, 2);
            $table->tinyInteger('ultimo_ta');

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
