@extends('App.layouts.basico')

@section('titulo', 'Produto')
    
@section('conteudo')
 
<div class="titulo-pagina-2">
    <p>Listagem de Produtos</p>
</div>

<div class="menu">
    <ul>
        <li><a href="{{route('produto.create')}}">Adicionar Produtos</a></li>
        <li><a href="">Consulta</a> </li>
    </ul>
</div>
<br><br><br>
<div class="informacao-pagina">
    <div style="width: 90%; margin-left:auto; margin-right:auto; flex-wrap:wrap;">
         
        <table border="1" width='100%'> 
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Nome do Fornecedor</th>
                    <th>Site Fornecedor</th>
                    <th>Peso</th>
                    <th>Unidade ID</th>
                    <th>Comprimento</th>
                    <th>Altura</th>
                    <th>Largura</th>
                </tr>
            </thead>

            <tbody> 

         @foreach ($produtos as $produto)

             <tr>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->descricao}}</td>
                <td>{{$produto->fornecedor->nome}}</td>
                <td>{{$produto->fornecedor->site}}</td>
                <td>{{$produto->peso}}</td>
                <td>{{$produto->unidade_id}}</td>
                <td>{{$produto->itemDetalhe->comprimento ?? ''}}</td>
                <td>{{$produto->itemDetalhe->altura ?? ''}}</td>
                <td>{{$produto->itemDetalhe->largura ?? ''}}</td>
                <td><a href="{{route('produto.show', ['produto' => $produto->id])}}">Visualizar</a></td>
                

                <td>
                    <form id="form_{{$produto->id}}" method="post" action="{{route('produto.destroy', ['produto' => $produto->id])}}"> 
                        @method('DELETE')
                        @csrf
                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                    </form>
                </td>
                <td><a href="{{route('produto.edit', ['produto' => $produto->id])}}">Editar</a></td>
             </tr>
                <tr>
                    <td colspan="12" style="text-align: center">
                        @foreach ($produto->pedidos as $pedido)
                        <a href="{{route('pedido-produto.create',['pedido' => $pedido->id])}}">
                        Pedido: {{$pedido->id}},
                        </a>   
                        @endforeach
                    </td>
                </tr>
               
            
        @endforeach

            </tbody>
        </table>
        <br><br><br>
        <br><br><br>
        {{$produtos->appends($request)->links()}}

        <br>
        <!--Exibindo {{$produtos->count()}} Fornecedores de {{$produtos->total()}} (de) {{$produtos->firstItem()}} a {{$produtos->lastItem()}}-->
        
        <!--Recupera as paginas e mostra as coisas de passar pagina-->
          
         
          
    </div>
</div>

@endsection