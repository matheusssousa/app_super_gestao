<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Database\Factories\SiteContatoFactory;
use Illuminate\Database\Seeder;


class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SiteContato::factory()->count(100)->create();
        
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '(11) 9999999999';
        // $contato->email = 'contato@sg.com.br';
        // $contato->motivo_contato = '1';
        // $contato->mensagem = 'Bem-vindo';
        // $contato->save();
    }
}
