<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Middleware\AutenticacaoMiddleware;
use App\Models\ProdutoDetalhe;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return 'Ola, Vai dar certo';
});*/

//Principal
Route::get('/', [\App\Http\Controllers\PrincipalController::class,'principal'])
->name('Site.index');

//Sobre
Route::get('/sobre', [\App\Http\Controllers\SobreController::class,'Sobre'])->name('Site.sobre');
     
 
//Contato
Route::get('/contato', [\App\Http\Controllers\ContatoController::class,'Contato'])->name('Site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class,'Salvar'])->name('Site.contato');

//Login
Route::get('/login/{error?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'Autenticacao'])->name('site.login');


// ESSE GROUP ESPERA POR PARAMETRO UMA FUNÇÃO  DE CALLBACK, ONDE SERA DEFINIDA AS ROTAS AGRUPADAS
Route::middleware(AutenticacaoMiddleware::class)->prefix('/app')->group(function(){
              
                      //Função de Callback
//Home
 Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('app.home');       
//Sair
Route::get('/sair', [App\Http\Controllers\LoginController::class,'sair'])->name('app.sair');  
 //Clientes
 

//Fornecedores
Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class,'index'])->name('app.fornecedor');
Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class,'listar'])->name('app.fornecedor.listar');
Route::get('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class,'listar'])->name('app.fornecedor.listar');
Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class,'adicionar'])->name('app.fornecedor.adicionar');
Route::post('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class,'adicionar'])->name('app.fornecedor.adicionar');
Route::get('/fornecedor/editar/{id}/{msg?}', [App\Http\Controllers\FornecedorController::class,'editar'])->name('app.fornecedor.editar');
Route::get('/fornecedor/excluir/{id}', [\App\Http\Controllers\FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');


//Produtos
Route::get('/produto', [App\Http\Controllers\ProdutoController::class,'index'])->name('app.produto');
Route::resource('/produto', ProdutoController::class);

//Produtos detalhes 
Route::resource('produto-detalhe', ProdutoDetalheController::class);

// cliente
Route::resource('cliente', ClienteController::class);
//Pedido
Route::resource('pedido', PedidoController::class);
//Route::resource('pedido-produto', ClienteController::class);
Route::get('pedido-produto/create/{pedido}', [App\Http\Controllers\PedidoProdutoController::class,'create'])->name('pedido-produto.create');
Route::post('pedido-produto/store/{pedido}', [App\Http\Controllers\PedidoProdutoController::class,'store'])->name('pedido-produto.store');
//Route::delete('pedido-produto.destroy/{pedido}/{produto}', [App\Http\Controllers\PedidoController::class,'destroy'])->name('pedido-produto.destroy');
Route::delete('pedido-produto.destroy/{pedidoProduto}/{pedido_id}', [App\Http\Controllers\PedidoController::class,'destroy'])->name('pedido-produto.destroy');




});

Route::fallback(function(){
        echo 'Essa Pagina n existe';
});

//Encaminhado parâmetros da rota para o controlador
//Route::get('/teste/{p1}/{p2}', [App\Http\Controllers\TesteController::class,'Teste']);
 



 