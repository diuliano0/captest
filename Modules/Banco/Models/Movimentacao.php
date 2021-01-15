<?php

namespace Modules\Banco\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movimentacao extends Model
{


    protected $table = "movimentacoes";

    protected $fillable = [
        'valor',
        'tipo',
        'conta_id',
    ];


}
