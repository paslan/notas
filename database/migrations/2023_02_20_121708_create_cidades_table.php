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
        Schema::create('cidades', function (Blueprint $table) {
            $table->id();

            //$table->bigIncrements('estado_id');
            $table->string('nome', 50);

            $table->foreignId('estado_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cidades', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            Schema::dropIfExists('cidades');
            Schema::enableForeignKeyConstraints();
        });
    }
};
