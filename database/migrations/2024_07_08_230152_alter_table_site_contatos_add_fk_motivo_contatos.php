<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
               //Adicionando a coluna motivo_contatos_id
               Schema::table('site_contatos', function (Blueprint $table){
               $table->unsignedBigInteger('motivo_contatos_id');
               });

              //Atribuindo motivo_contato para a nova coluna motivo_contato_id
              DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');


             //Criando a Fk e Remover a coluna motivo_contato

              Schema::table('site_contatos', function (Blueprint $table){
              $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
              $table->dropColumn('motivo_contato');
              });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Criar a coluna contato e Remover a FK
        Schema::table('site_contatos', function (Blueprint $table){
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
             
        });
        //Reverter a de cima
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        //Remover a coluna motivo_contato
        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropColumn('motivo_contato_id');
        });
    }
};
