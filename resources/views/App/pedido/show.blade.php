@extends('App.layouts.basico')

@section('titulo', 'Produto')
    
@section('conteudo')
 
<div class="titulo-pagina-2">
    <p> Pedidos - Visualizar </p>
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
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Produto</th>
                    <th>Data de Inclusão no Pedido</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
       
                @foreach ($pedido->produtos as $produto)
                <tr>
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->pivot->created_at->format('d/m/y')}}</td>
                    <td>
                        <form id="form_{{$produto->pivot->id}}" method="POST" action="{{route('pedido-produto.destroy',['pedidoProduto' => $produto->pivot->id, 'pedido_id' => $pedido->id])}}"> 
                            @method('DELETE')
                            @csrf
                            <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>  
                         </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
         </table>
        </table>

    </div>
     
</div>

@endsection