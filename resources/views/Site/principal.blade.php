@extends('site.layouts.basico')

 

        @section('titulo', 'Home')

    <body>

        @section('conteudo')
        <div class="topo">

            <div class="logo">
                <img src="{{ asset('img/logo.png')}}">
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

        <div class="conteudo-destaque">
        
            <div class="esquerda">
                <div class="informacoes">
                    <h1>Sistema Super Gestão</h1>
                    <p>Software para gestão empresarial ideal para sua empresa.<p>
                    <div class="chamada">
                        <img src="{{ asset("img/check.png")}}">
                        <span class="texto-branco">Gestão completa e descomplicada</span>
                    </div>
                    <div class="chamada">
                        <img src="img/check.png">
                        <span class="texto-branco">Sua empresa na nuvem</span>
                    </div>
                </div>

                <div class="video">
                    <img src={{ asset ('img/player_video.jpg')}}>
                </div>
            </div>

            <div class="direita">
                <div class="contato">
                    <h1>Contato</h1>
                    <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.<p>
                   @component('site.layouts._compo.form', ['motivo_contatos' => $motivo_contatos])
                   @endcomponent
                </div>
            </div>
        </div>
        @endsection
    