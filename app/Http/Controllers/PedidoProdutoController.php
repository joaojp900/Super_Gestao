<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidosProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

//Pedido_Produto

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {

        $produtos = Produto::all();
        $pedido->produtos; //eager loading
        return view('app.pedido_produto.create',['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
             'quantidade' => 'required'
        ];
        $feedback = [
            'produto_id.exists' => 'O produto informado não existe',
            'required' => 'O campo ::attribute deve possuir um valor válido'
        ];

        $request->validate($regras, $feedback);
  
        /* //Jeito 1 de Fazr 
        $pedidoProduto = new PedidosProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->quantidade = $request->get('quantidade');
        $pedidoProduto->save();
        */
             //Jeito 2 de Fazr 
        //$pedido->produtos //Os registros do Relacionamento
       /* $pedido->produtos()->attach(
            $request->get('produto_id'),
            ['quantidade' => $request->get('quantidade')]
             /* 'coluna_2'=> '' */ //Se houvesse outras colunas era so colocar a virgula e fazer igual a primeira
         //objeto

         // Jeito 3 de Fazer
         $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')] //Pra fazer dnv e CTRL + C e CTRL + V
         ]);

        


        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        return view('app.pedido.show', ['pedido' => $pedido]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
         
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
