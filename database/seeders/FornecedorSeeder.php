<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $fornecedor =  new Fornecedor();  // Primeira forma de subir os dados para a tabela

        $fornecedor->nome = 'João Pedro Gabriel';
        $fornecedor->site= 'Joao@gmail.com';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'jooajpwa@gmail.com';
        $fornecedor->save();


        Fornecedor::create([    //Segunda Forma

            'nome' => 'sla',
            'site' => 'sla.com.br',
            'uf' => 'SP',
            'email' => 'joaojpaw@gmail.com'

        ]);

    }
}
