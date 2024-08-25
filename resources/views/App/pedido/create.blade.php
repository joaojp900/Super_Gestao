@extends('App.layouts.basico')

@section('titulo', 'Cliente')
    
@section('conteudo')
 
<div class="titulo-pagina-2">
    
        <p>Adicionar - Pedido</p>
</div>
<br> 
<div class="menu">
    <ul>
        <li><a href="{{route('pedido.index')}}">Voltar</a></li>
        <li><a href="">Consulta</a> </li>
    </ul>
</div>
 

<div class="informacao-pagina">
    <div style="  margin-left:auto; margin-right:auto;">
            @component('app.pedido._components.form_create_edit',['clientes' => $clientes])
                
            @endcomponent
    </div>
</div>

@endsection