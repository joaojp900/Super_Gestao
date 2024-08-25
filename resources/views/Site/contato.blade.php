@extends('site.layouts.basico')

     @section('titulo', 'Contato')

    <body>
        @section('conteudo')

        <div class="topo">
            <div class="logo">
                <img src="{{ asset ('img/logo.png')}}">
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('Site.index') }}">Principal</a></li>
                    <li><a href="{{ route('Site.sobre') }}">Sobre Nós</a></li>
                    <li><a href="{{ route('Site.contato') }}">Contato</a></li>
                    <li><a href="{{route('site.login')}}">Login</a></li>
                </ul>
            </div>
        </div>

        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Entre em contato conosco</h1>
            </div>

            <div class="informacao-pagina">
                <div class="contato-principal">
                     
                  @component('site.layouts._compo.form', ['motivo_contatos' => $motivo_contatos])
<!--Para oq foi digitado abaixo aparecer na view tem q chamar o $slot no arquivo do component-->
                  <p>A nossa equipe analisará a sua mensagem e retornaremos o mais breve</p>
                  <p>Nosso tempo médio de resposta é de 48 horas</p>
                  @endcomponent
                </div>
            </div>  
        </div>
      

        <div class="rodape">
            <div class="redes-sociais">
                <h2>Redes sociais</h2>
                <img src="img/facebook.png">
                <img src="img/linkedin.png">
                <img src="img/youtube.png">
            </div>
            <div class="area-contato">
                <h2>Contato</h2>
                <span>(11) 3333-4444</span>
                <br>
                <span>supergestao@dominio.com.br</span>
            </div>
            <div class="localizacao">
                <h2>Localização</h2>
                <img src="{{ asset ('img/mapa.png')}}">
            </div>
        </div>
        @endsection
    </body>
</html>