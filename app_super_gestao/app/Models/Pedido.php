<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function produtos(){
        // return $this->belongsToMany(Produto::class, 'pedido_produtos');
        return $this->belongsToMany(Item::class, 'pedido_produtos', 'pedido_id','produto_id')->withPivot('created_at', 'id');

        // PARAMETROS
        // 1 - Nome do modelo que é usado
        // 2 - tabela que vai ser usada como referencia
        // 3 - Nome da chave estrangeira na tabela que vai ser usada como referencia
        // 4 - Nome da chabe estrangeira no modelo que é usado
    }
}
