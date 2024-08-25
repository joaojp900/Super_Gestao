<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;
use Symfony\Contracts\Service\Attribute\Required;

class ContatoController extends Controller
{

    public function Contato(Request $request){

         /*$contato = new SiteContato();

        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();*/


        $motivo_contatos = MotivoContato::all();


        return View('Site.contato',['motivo_contatos'  => $motivo_contatos]);
         
        //Forma dois

        /*$contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();
        */
    }

    public function Salvar(Request $request){

        

       $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
       ];
       $feedback = [
            'nome.required' => 'O campo nome precisar ser preenchido',
            'nome.min' => 'O campo Nome precisa de no mínimo 3 caracteres',
            'nome.max' => 'O campo Nome so aceita 40 caracteres',
            'nome.unique' => 'Esse nome ja está vinculado a um usuario',
            'telefone.required' => 'O campo Telefone e obrigatório',
            'email.email' => 'O email informado não é valido',
            'mensagem.max' => 'A mensagem deve ter no mínimo 2000 caracteres',
             
            'required' => 'O campo :attribute deve ser preenchido'
       ];

      
        $request->validate($regras, $feedback);
        
        SiteContato::create($request->all());
        return redirect()->route('Site.index');
    }

    

}
