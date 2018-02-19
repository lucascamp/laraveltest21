<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableImoveis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 100)->nullable();
            $table->string('tipo', 15)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('cidade', 40)->nullable();
            $table->string('estado', 30)->nullable();
            $table->string('bairro', 30)->nullable();
            $table->string('endereco', 50)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->decimal('preco_venda', 20, 2)->nullable();
            $table->decimal('preco_locacao', 20, 2)->nullable();
            $table->decimal('preco_temporada', 20, 2)->nullable();
            $table->string('area', 20)->nullable();
            $table->string('dormitorios', 20)->nullable();
            $table->string('suites', 20)->nullable();
            $table->string('banheiros', 20)->nullable();
            $table->string('salas', 20)->nullable();
            $table->string('garagem', 20)->nullable();
            $table->string('img_url', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('imoveis');
    }
}
