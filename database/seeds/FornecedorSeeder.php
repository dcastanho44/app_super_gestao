<?php

use Illuminate\Database\Seeder;
use App\Fornecedor; //usa o namespace do model para aplicar no BD

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //por instância
        $fornecedor = new Fornecedor();
        $fornecedor->nome= 'Fornecedor 100';
        $fornecedor->site= '100.com.br';
        $fornecedor->uf= 'CE';
        $fornecedor->email= 'contato@100.com.br';
        $fornecedor->save();

        //por array - outra maneira (atenção para o atributo fillable lá na classe)
        Fornecedor::create([
            'nome' => 'Fornecedor200',
            'site' => '200.com.br',
            'uf' => 'RS',
            'email' => 'contato@200.com.br'
         ]);

         /*outra maneira, fora do eloquent
         DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor300',
            'site' => '300.com.br',
            'uf' => 'MT',
            'email' => 'contato@300.com.br'
         ]);*/
    }
}
