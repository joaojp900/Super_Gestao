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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidadade', 5);
            $table->string("descricao", 30);
            $table->timestamps();
        });

            //Adicionar o relacionamento com a tabela produtos
 
            Schema::table('produtos', function(Blueprint $table){
                $table->unsignedBigInteger('unidade_id');
                $table->foreign('unidade_id')->references('id')->on('unidades');
                //Para colocar que o relacionamento vai ser de N - 1 n precisa colocar unique
                //e assim q faz N - 1 


            });


            //adicionar o relacionamento com a tabela produtos_detalhes

            Schema::table('produtos_detalhes', function(Blueprint $table){
                $table->unsignedBigInteger('unidade_id');
                $table->foreign('unidade_id')->references('id')->on('unidades');

            });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         //Remover o relacionamento com a tabela produtos


         Schema::table('produtos', function(Blueprint $table){
            //REMOVER O FK
            $table->dropForeign('produtos_unidade_id_foreign');

            // Remover a coluna unidade_id

             $table->dropColumn('unidade_id');

        });


         //Remover o relacionamento com a tabela produtos_detalhes

            
         Schema::table('produtos_detalhes', function(Blueprint $table){
            //REMOVER O FK
            $table->dropForeign('produtos_detalhes_unidade_id_foreign');

            // Remover a coluna unidade_id

             $table->dropColumn('unidade_id');

        });



        Schema::dropIfExists('unidades');
    }
};
