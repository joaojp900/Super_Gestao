<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'produtos';

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id','fornecedor_id'];

    public function itemDetalhe(){
     
    return $this->hasOne(ItemDetalhe::class, 'produto_id' , 'id');

    }

 public function fornecedor(){
    return $this->belongsTo(fornecedor::class);
 }

   public function pedidos(){
      return $this->belongsToMany(Pedido::class, 'pedidos_produtos', 'produto_id', 'pedido_id');
   }
   /*
   3 - Representa o nome da FK da tabela mapeada pelo model na tabela de relacionamento
   4 - Representa o nome da Fk da tabela mapeada pelo model no relacionamento que estamos implementando
   */





}
