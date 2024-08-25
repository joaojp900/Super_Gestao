<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
      //aqui e tipo o index pra rodar as seeders e factorys
      //$this->call(FornecedorSeeder::class);  
      //$this->call(SiteContatoSeeder::class);
      $this->call(MotivoContatoSeeder::class);
    }
}
