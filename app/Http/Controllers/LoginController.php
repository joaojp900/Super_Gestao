<?php

namespace App\Http\Controllers;
use App\Http\Middleware\AutenticacaoMiddleware;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request ){
        $erro = '';

        if($request->get('erro') == 1 ){
            $erro = 'O Usuario ou a senha não existem';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessario realizar login para ter acesso a página ';
        }
       

        return View('Site.login', ['titulo' => 'Login', 'erro' => $erro ]);
    }

    public function Autenticacao(Request $request){
    
        //Regras de validação

        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // as mensagens de feedback de validação/ Mostra oq n pode fazer no formulario
        $feedback = [
            'usuario.email' => 'O campo usuario (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];
        //Se n passar pelo validate

        $request->validate($regras, $feedback);
        //Recuperamos os Parametros do formulario
        $email = $request->get('usuario');
        $password = $request->get('senha');

     

        //Iniciar o Model User
        $user = new User();

        $usuario = $user->where('email', $email)->where('password',$password)
        ->get()->first();
        
       
        if(isset($usuario->name)){
            
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
             
            return redirect()->route('app.home');

        }else{

        return redirect()->route('site.login',['erro' => 1]);
        
       }
       //Arrumar a parte para passar pro app sem login esta passando direto

    }

    public function sair(){
        session_destroy();
       return redirect()->route('Site.index');
    }












}
