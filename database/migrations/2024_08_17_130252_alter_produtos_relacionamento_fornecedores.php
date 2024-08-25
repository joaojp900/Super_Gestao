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
        //Criando a coluna em produtos que vai receber a FK de fornecedores

        Schema::table('produtos', function(Blueprint $table){


          //Insere um registro de fornecedor para estabelecer o relacionamento
        /* $fornecedor_id = DB::table('fornecedors')->insertGetId([
            'nome' =>'Latim ',
            'site' =>'Latimsla.com.br',
            'uf' =>'SP',
            'email' =>'latim@gmail.com',
          ]);*/
          
            $table->unsignedBigInteger('fornecedor_id')->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function(Blueprint $table){
        $table->dropForeign('produtos_fornecedor_id_foreign');
        $table->dropColumn('fornecedor_id');
        });
    }
};
