<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $clientes = Cliente::paginate(10);
        return View('app.cliente.index', ['clientes' => $clientes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome'=> 'required|min:3|max:40'
        ];
        $feedback = [
            'required'=> 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome de ter no mínimo 3 caracteres',
            'nome.max'=> 'O campo nome deve ter no máximo 40 caracteres'
        ];

        $request->validate($regras, $feedback);

        $cliente = new Cliente();
        $cliente->nome  = $request->get('nome');
        $cliente->save();

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('app.cliente.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
         
        return view('app.cliente.edit',['cliente' => $cliente]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $regras = [
            'nome' => 'required|min:3|max:50'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 50 caracteres'
        ];

        $request->validate($regras, $feedback);

        $request->all(); //Payload
        $cliente->update($request->all());//instancia do Objeto
        return redirect()->route('cliente.show', ['cliente' => $cliente->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cliente $cliente)
    {
        
        $cliente->delete();

        return redirect()->route('cliente.index');
    }
}
