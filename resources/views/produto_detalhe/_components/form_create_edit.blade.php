@if(isset($produto_detalhe->id))

<form method="POST" action="{{route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id])}}">
@csrf
@method('PUT'); 
    
@else

<form method="POST" action="{{route('produto-detalhe.store')}}">
@csrf

@endif



<div style="width:30%; margin-left:auto; margin-right:auto;">
        <input type="text" name="produto_id" value="{{$produto_detalhe->produto_id ?? old('produto_id')}}" class="borda-preta" placeholder="ID do Produto">
        {{$errors->has('produto_id')? $errors->first('produto_id') : ''}}
        
        <input type="text" name="comprimento" class="borda-preta" value="{{$produto_detalhe->comprimento ?? old('comprimento')}}" placeholder="Comprimento">
        {{$errors->has('Comprimento')? $errors->first('Comprimento') : ''}}

        <input type="text" name="largura" class="borda-preta" value="{{$produto_detalhe->largura ?? old('largura')}}" placeholder="Largura">
        {{$errors->has('largura')? $errors->first('largura') : ''}}

        <input type="text" name="altura" class="borda-preta" value="{{$produto_detalhe->altura ?? old('altura')}}" placeholder="Altura">
        {{$errors->has('altura')? $errors->first('altura') : ''}}

        <select name="unidade_id">
            @foreach ($unidades as $unidade)

            <option>Selecione a Unidade de Medida</option>

            <option value="{{$unidade->id}}" {{$produto_detalhe->unidade_id ??  old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>

            @endforeach
        </select>
        {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
       

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
</div>
</div>

