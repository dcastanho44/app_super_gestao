<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function produtoDetalhe () {
        return $this->hasOne('App\ProdutoDetalhe');

        //Produto TEM UM produtoDetalhe
        //1 registro relacionado em produto_detalhes com base na foreign key (produto_id)
    }

    public function fornecedor(){
        return $this->belongsTo('App\Fornecedor');
    }

    public function pedidos(){
        return $this->belongsToMany('App\Pedido', 'pedido_produtos');
    }
}
