<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//o eloquent iria inserir automaticamente em fornecedors


class Fornecedor extends Model
{
    //
    use SoftDeletes;
    
    protected $table = 'fornecedores';      //direciona o nome da tabela que será inserido pelo eloquent
    protected $fillable = ['nome', 'site', 'uf', 'email']; //autorizando o método create a adicionar arrays no model via método estático

    public function produtos() {
        //return $this->hasMany('App\Produto','fornecedor_id','id');
        return $this->hasMany('App\Produto');
    }
}
