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
        // para colocar novas colunas numa tabela q ja esta em Produção tem
        // q abrir  um nova Migration e trazer a Função que esta abaixo e 
        // troca create por table e deixa o resto igual
        Schema::table('fornecedors', function (Blueprint $table) {
            $table->string('uf', 2);
            $table->string('email', 150);
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //para remover colunas 
        Schema::table('fornecedors', function (Blueprint $table) {
        //$table->dropColumn('uf'); tira as colunas individual
        $table->dropColumn (['uf', 'email']);// tira as colunas usando array
        

        //(UP) php artisan migrate / mais antiga para a mais atual 
        //(DOWN) php artisan migrate:rollback / da mais atual para a mais antiga
        //php artisan migrate:rollback --step=(e o numero de vzs q vc quer q volte no rollback)

        });
    }
};
