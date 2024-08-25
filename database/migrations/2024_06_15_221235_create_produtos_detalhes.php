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
        Schema::create('produtos_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id' ); //chave estrangeira
            $table->float('comprimento',8 ,2 );
            $table->float('altura',8 ,2 );
            $table->float('largura',8 ,2 );
            $table->timestamps();

                //Constraint
    //     Coluna da atual tabela    de onde vai pegar    de qual tabela vai pegar o ID
            $table->foreign('produto_id')->references('id')->on('produtos');
            //deixa o metodo 1 - 1 EX: passar uma vez e n ficar fazendo 1 - n
            $table->unique('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos_detalhes');
    }
};
