@extends('App.layouts.basico')

@section('titulo', 'Produto')
    
@section('conteudo')
 
<div class="titulo-pagina-2">
    <p> Visualizar - Cliente </p>
</div>

<div class="menu">
    <ul>
        <li><a href="{{route('produto.index')}}">Voltar</a></li>
        <li><a href="">Consulta</a> </li>
    </ul>
</div>

<div class="informacao-pagina">

    <div style="width: 30%; margin-left:auto; margin-right:auto;">
        <table border="1" style="text-align:left">

            <!--TUDO RODANDO AQUI-->
            
            <tr>
                <td>ID</td>
                <td>{{$cliente->id}}</td>
            </tr>
            <tr>
                <td>Nome</td>
                <td>{{$cliente->nome}}</td>
            </tr>
             
        </table>

    </div>
     
</div>

@endsection