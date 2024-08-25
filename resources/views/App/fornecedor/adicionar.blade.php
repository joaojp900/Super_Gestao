@extends('App.layouts.basico')

@section('titulo', 'Fornecedor')
    
@section('conteudo')
 
<div class="titulo-pagina-2">
    <p>Fornecedor - Adicionar</p>
</div>

<div class="menu">
    <ul>
        <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
        <li><a href="{{route('app.fornecedor')}}">Consulta</a> </li>
    </ul>
</div>

<div class="informacao-pagina">
    {{$msg ?? ''}}
    <div style="width:30%; margin-left:auto; margin-right:auto;">
         <form action="{{route('app.fornecedor.adicionar')}}" method="POST">
            <input type="hidden" name="id" value="{{$fornecedor->id ?? ''}}">
            @csrf
            <input type="text" name="nome" value="{{ $fornecedor->nome ?? old('nome')}}" class="borda-preta" placeholder="Nome">
            {{$errors->has('nome')? $errors->first('nome') : ''}}
            <input type="text" name="site" class="borda-preta" value="{{ $fornecedor->site ?? old('site')}}" placeholder="Site">
            {{$errors->has('site')? $errors->first('site') : ''}}
            <input type="text" name="uf" class="borda-preta" value="{{ $fornecedor->uf ?? old('uf')}}" placeholder="UF">
            {{$errors->has('uf')? $errors->first('uf') : ''}}
            <input type="text" name="email" class="borda-preta" value="{{ $fornecedor->email ?? old('email')}}" placeholder="E-mail">
            {{$errors->has('email')? $errors->first('email') : ''}}
            <button type="submit" class="borda-preta">Cadastrar</button>
        </form>
    </div>
</div>

@endsection