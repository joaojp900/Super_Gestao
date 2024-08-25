
{{$slot}}
<form action="{{route('Site.contato')}}" method="post">
    @csrf
     <input type="text" name="nome" value='{{old('nome')}}' placeholder="Nome" class="borda-preta">
     @if($errors->has('nome'))
          {{$errors->first('nome')}}
     @endif
     <br>
     <input type="text" name="telefone" value='{{old('telefone')}}' placeholder="Telefone" class="borda-preta">
     {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
     <br>
     <input type="text" name="email" value='{{old('email')}}' placeholder="E-mail" class="borda-preta">
     {{$errors->has('email') ? $errors->first('email') : ''}}
     <br>
     <select name="motivo_contatos_id" class="borda-preta">
         <option value="">Qual o motivo do contato?</option>
            @foreach ($motivo_contatos as $key => $motivo_contato)
  <option value="{{$motivo_contato->id}}" {{old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
            @endforeach
         </select>
         {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}
     <br>
     <input type="text"name="mensagem" class="borda-preta" placeholder="Preencha aqui a sua mensagem">
     {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
     <br>
     <button type="submit" class="borda-preta">ENVIAR</button>
 </form>
@if ($errors->any())
 <div style="position:absolute; top:0px; left:0px; width:100%; background-color:red;">
 
    @foreach($errors->all() as $erro)
    {{$erro}}
    <br>
    @endforeach
</div>
@endif

  