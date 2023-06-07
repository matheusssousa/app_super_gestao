<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
        });

        // ADICIONAR O RELACIONAMENTO COM A TABELA DE PRODUTOS
        Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            // CHAVE ESTRENAGEIRA
            $table->foreign('unidade_id')->references('id')->on('unidades');        
        });

        // ADICIONAR O RELACIONAMENTO COM A TABELA PRODUTO_DETALHES
        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            // CHAVE ESTRENAGEIRA
            $table->foreign('unidade_id')->references('id')->on('unidades');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // REMOVER O RELACIONAMENTO COM A TABELA DE PRODUTOS
        Schema::table('produtos', function(Blueprint $table){
            // REMOVER FOREIGN
            $table->dropForeign('produtos_unidade_id_foreign');
            // REMOVER COLUNA
            $table->dropColumn('unidade_id');
        });
        // REMOVER O RELACIONAMENTO COM A TABELA PRODUTO_DETALHES
        Schema::table('produto_detalhes', function(Blueprint $table){
            // REMOVER FOREIGN
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            // REMOVER COLUNA
            $table->dropColumn('unidade_id');
        });
        // REMOVER TABELA
        Schema::dropIfExists('unidades');
    }
}
