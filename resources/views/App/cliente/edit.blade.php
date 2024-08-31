@extends('App.layouts.basico')

@section('titulo', 'cliente')
    
@section('conteudo')
 
<div class="titulo-pagina-2">
    <p>Editar - Cliente</p>
</div>

<div class="menu">
    <ul>
        <li><a href="{{route('cliente.index')}}">Voltar</a></li>
        <li><a href="{{route('cliente.index')}}">Consulta</a> </li>
    </ul>
</div>

<div class="informacao-pagina">
    
    <div style="margin-left:auto; margin-right:auto;">
        @component('app.cliente._components.form_create_edit', ['cliente' => $cliente])
                
        @endcomponent
    </div>
</div>

@endsection