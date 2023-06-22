<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class ContatoController extends Controller
{
    public function index()
    {
        $contatos = [
            (object)['nome' => 'Maria', 'tel' => '123456789'],
            (object)['nome' => 'Joao', 'tel' => '987654321']
        ];

        $contato = new Contato();

        dd($contato->lista());


        return view('contato.index', compact('contatos'));
        //return view('contato.index',["contatos"=>$contatos]);
        //return view('contato.index',['contatos'=>'zzzzzzzzzzzzzzz']);
    }

    public function criar(Request $req)
    {
        dd($req->all());
        return "Este é o CRIAR de dentro do controller ContatoController";
    }

    public function editar()
    {
        return "Este é o EDITAR de dentro do controller ContatoController";
    }
}
