@extends('App.layouts.basico')

@section('titulo', 'Clientes')
    
@section('conteudo')
 
<div class="titulo-pagina-2">
    <p>Listagem de Clientes</p>
</div>

<div class="menu">
    <ul>
        <li><a href="{{route('cliente.create')}}">Adicionar Clientes</a></li>
        <li><a href="">Consulta</a> </li>
    </ul>
</div>
<br><br><br>
<div class="informacao-pagina">
    <div style="width: 90%; margin-left:auto; margin-right:auto;">
         
        <table border="1" width='100%'> 
            <thead>
                <tr>
                    <th>Nome</th>
                     <th></th>
                     <th></th>
                </tr>
            </thead>

            <tbody> 

             @foreach ($clientes as $cliente)

             <tr>
                <td>{{$cliente->nome}}</td>
             
                <td><a href="{{route('cliente.show', ['cliente' => $cliente->id])}}">Visualizar</a></td>
                
                <td><a href="{{route('cliente.edit', ['cliente' => $cliente->id])}}">Editar</a></td>
             </tr>
            
             @endforeach

            </tbody>
        </table>
        <br><br><br>
        {{$clientes->appends($request)->links()}}

        <br>
        <!--Exibindo {{$clientes->count()}} Fornecedores de {{$clientes->total()}} (de) {{$clientes->firstItem()}} a {{$clientes->lastItem()}}-->
        
        <!--Recupera as paginas e mostra as coisas de passar pagina-->
          
    </div>
</div>

@endsection