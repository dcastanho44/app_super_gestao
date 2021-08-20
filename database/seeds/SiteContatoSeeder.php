<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //inserindo apenas 1 dado
        
        /*$contato = new SiteContato();
        $contato->nome= 'Sistema SG';
        $contato->telefone='(77)7777-7777';
        $contato->email='contato@sg.com.br';
        $contato->motivo_contato='1';
        $contato->mensagem='Testando o sistema';
        $contato->save();*/

        //inserindo 100 dados com as factories

        factory(SiteContato::class, 100)->create();
    }
}
