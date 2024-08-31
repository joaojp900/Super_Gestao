<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDetalhe;
use App\Models\ProdutosDetalhe;
use App\Models\Unidade;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\ItemDetalhe;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();

        return View('produto-detalhe.create',['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProdutosDetalhe::create($request->all());
        echo 'Cadastro Realizado com Sucesso ';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produtoDetalhe = ItemDetalhe::with(['item'])->find($id);

        $unidades = Unidade::all();
         return view('produto_detalhe.edit', ['produto_detalhe' => $produtoDetalhe, 'unidades'=> $unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdutosDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->all());
        echo 'Atualização feita com sucesso';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
