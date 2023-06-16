<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function produto_detalhe(){
        return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id');
    }

    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class); 
    }

    public function pedidos(){
        return $this->belongsToMany(Pedido::class, 'pedido_produtos','produto_id', 'pedido_id');
    }
}
