<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            //FAZER A TABELA FILIAIS
            Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
            });


            //FAZER A TABELA PRODUTO FILIAIS
            Schema::create('produto_filiais', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id'); // ID filiais
            $table->unsignedBigInteger('produto_id'); //ID Produtos
            $table->decimal('preco_venda', 8 , 2);
            $table->integer('estoque_maximo');
            $table->integer('estoque_minimo');
            $table->timestamps();
            
            //Foreign key (Constraints) FAZENDO AS CHAVES ESTRANGEIRAS
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
             });

            //Removendo Colunas da tabela produtos    
            Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn(['preco_venda','estoque_minimo','estoque_maximo']);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
            Schema::table('produtos', function(Blueprint $table){
            $table->decimal('preco_venda', 8 , 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
             });
    
            Schema::dropIfExists('produto_filiais');
            
            Schema::dropDatabaseIfExists('filiais');
    }
};
