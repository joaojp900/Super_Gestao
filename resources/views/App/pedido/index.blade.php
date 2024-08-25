@extends('App.layouts.basico')

@section('titulo', 'Pedidos')
    
@section('conteudo')
 
<div class="titulo-pagina-2">
    <p>Listagem de Pedidos</p>
</div>

<div class="menu">
    <ul>
        <li><a href="{{route('pedido.create')}}">Adicionar Pedidos</a></li>
        <li><a href="">Consulta</a> </li>
    </ul>
</div>
<br><br><br>
<div class="informacao-pagina">
    <div style="width: 90%; margin-left:auto; margin-right:auto;">
         
        <table border="1" width='100%'> 
            <thead>
                <tr>
                    <th>ID do Pedido</th>
                     <th>Cliente</th>
                     <th></th>
                     <th></th>
                </tr>
            </thead>

            <tbody> 

             @foreach ($pedidos as $pedido)

             <tr>
                 
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->cliente_id}}</td>
                <td><a href="{{route('pedido-produto.create',['pedido'=> $pedido->id])}}">Adicionar Produtos</a> </td>
                <td><a href="{{route('pedido.show', ['pedido' => $pedido->id])}}">Visualizar</a></td>
                

                <td>
                    <form id="form_{{$pedido->id}}" method="post" action="{{route('pedido.destroy', ['pedido' => $pedido->id])}}"> 
                        @method('DELETE')
                        @csrf
                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                    </form>
                </td>
                <td><a href="{{route('pedido.edit', ['pedido' => $pedido->id])}}">Editar</a></td>
             </tr>
            
             @endforeach

            </tbody>
        </table>
        <br><br><br>
        {{$pedidos->appends($request)->links()}}

        <br>
        <!--Exibindo {{$pedidos->count()}} Fornecedores de {{$pedidos->total()}} (de) {{$pedidos->firstItem()}} a {{$pedidos->lastItem()}}-->
        
        <!--Recupera as paginas e mostra as coisas de passar pagina-->
          
    </div>
</div>

@endsection