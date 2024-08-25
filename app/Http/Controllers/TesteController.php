<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function Teste( int $p1, int $p2){
       // echo "A Soma de $p1 + $p2 é: " .($p1+ $p2);
       
        // return view('Site.teste',['X' => $p1, 'Y' => $p2]); ARRAY ASSOCIATIVO

       // return view('site.teste', compact('p1','p2')); // Compact

       //return view('Site.teste')->with('sla', $p1); //With
    }
}
