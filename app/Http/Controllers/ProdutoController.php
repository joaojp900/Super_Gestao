<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Unidade;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\ProdutosDetalhe;
use PhpParser\Node\Stmt\Foreach_;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
                                //Pode passar ate 3 parametros 
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(10); 

        
        return View('app.produto.index', ['produtos' => $produtos, 'request'=> $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return View('app.produto.create', ['unidades' => $unidades, 'fornecedores'=> $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $regras = [

            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:5|max:100',
            'peso' => 'required|integer',
            'unidade_id'=> 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedors,id'      // exists:<tabela>,<coluna>
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 2 caracteres',
            'descricao.min' => 'O campo descrição deve ter no mínimo 5 caracteres',
            'peso.integer' => 'O campo peso deve ser um numero inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id' => 'O fornecedor informado não existe'
             
        ];

        $request->validate($regras, $feedback);


        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {

        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
       return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades,'fornecedores'=> $fornecedores]);
       //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [

            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:5|max:100',
            'peso' => 'required|integer',
            'unidade_id'=> 'exists:unidades,id',   
            'fornecedor_id'=> 'exists:fornecedors,id'   // exists:<tabela>,<coluna>
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 2 caracteres',
            'descricao.min' => 'O campo descrição deve ter no mínimo 5 caracteres',
            'peso.integer' => 'O campo peso deve ser um numero inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id' => 'O fornecedor informado não existe'
             
        ];

        $request->validate($regras, $feedback);


        $request->all(); //Payload
        $produto->update($request->all());  //instancia do Objeto
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         //Produto::find($id)->delete();

         Produto::find($id)->forceDelete();

         return redirect()->route('produto.index');
    }
}
