<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotacaoFretesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_fretes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transportadora_id');
            $table->string('uf');
            $table->decimal('percentual_cotacao', 10, 2);
            $table->decimal('valor_extra', 10, 2);
            $table->foreign('transportadora_id')->references('id')->on('transportadoras');
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
        Schema::dropIfExists('cotacao_fretes');
    }
}
