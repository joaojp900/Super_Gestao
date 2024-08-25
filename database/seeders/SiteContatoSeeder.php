<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       /* $site = new SiteContato();

        $site->nome = 'JacintoCabeção';
        $site->telefone = '(11)991882559';
        $site->email = 'Contato@gmail.com';
        $site->motivo_contato = 1;
        $site->mensagem = 'Seja bem vindo';
        $site->save();*/

        \App\Models\SiteContato::factory()->count(100)->create();
       
    }
}
