<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\PedidosProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::paginate(10);
        return view('app.pedido.index',['pedidos' => $pedidos, 'request'=> $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $clientes = Cliente::all();
        return view('app.pedido.create',['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'cliente_id' => 'exists:clientes,id',
             
        ];
        $feedback = [
            'cliente_id.exists' => 'O cliente informado não existe',
             
        ];

        $request->validate($regras, $feedback);

        $pedido = new Pedido();
        $pedido->cliente_id = $request->get('cliente_id');
        $pedido->save();

        return redirect()->route('pedido.index');


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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

     
    //public function destroy(Pedido $pedido, Produto $produto)
    public function destroy(PedidosProduto $pedidoProduto, $pedido_id )
    {
         //echo $pedido->id. '-'. $produto->id;

        //Convecional
       /* PedidosProduto::where([
            'pedido_id' => $pedido->id,
            'produto_id' => $produto->id
        ])->delete();*/

        //Detach (Delete pelo relacionamento)
       // $pedido->produtos()->detach($produto->id);

       $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id]);


    }
}
