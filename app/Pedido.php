<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos() {
        return $this->belongstoMany('App\Produto', 'pedido_produtos')->withPivot('created_at');
    }
}
