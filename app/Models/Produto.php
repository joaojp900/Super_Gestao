<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 

class Produto extends Model
{
    use HasFactory;

protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

public function ProdutoDetalhe(){
     
    return $this->hasOne(ProdutosDetalhe::class);

    //PRODUTO TEM 1 PRODUTODETALHE

    // 1 Registro relacionado em Produtos_detalhes (fk) -> produto_id
    // produtos (pk) -> id
}



    
}
