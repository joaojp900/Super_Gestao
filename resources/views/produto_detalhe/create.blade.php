@extends('App.layouts.basico')

@section('titulo', 'Detalhes do Produto')
    
@section('conteudo')
 
<div class="titulo-pagina-2">
    
        <p>Adicionar Produtos Detalhes</p>
</div>

<div class="menu">
    <ul>
        <li><a href="">Voltar</a></li>
         
    </ul>
</div>

<div class="informacao-pagina">
    <div style="  margin-left:auto; margin-right:auto;">
            @component('produto_detalhe._components.form_create_edit',['unidades' => $unidades])
                
            @endcomponent
    </div>
</div>

@endsection