<?php

namespace Modules\Banco\Models;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model{

    protected $fillable = [
        'user_id',
        'agencia',
        'dg_agencia',
        'conta',
        'dg_conta',
        'variacao',
        'tipo',
        'saldo',
    ];

    public function movimentacoes(){
        return $this->hasMany(Movimentacao::class, 'conta_id');
    }

}
