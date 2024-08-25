<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Http\Request;

class SobreController extends Controller
{

  
    
    public function Sobre(){
         return view('Site.sobre');
    }

    
}
