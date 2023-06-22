<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        //return "Ola aqui é o index do controller User";
        $registros = User::all();

        return view('admin.users.index',compact("registros"));
    }

    public function adicionar(){
        //return "controller usuario adicionar";
        return view('admin.users.adicionar');
    }

    public function salvar(Request $req){
        $dados = $req->all();
        //validar dados recebidos
        User::create($dados);

        //return "controller usuario salvar";

        return redirect()->route('admin.users');
    }

    public function editar($id){
        $registro = User::find($id);
        //return "controller usuario editar";
        return view('admin.users.editar',compact("registro"));
    }

    public function atualizar(Request $req, $id){
        $dados = $req->all();

        User::find($id)->update($dados);

        //return "controller usuario atualizar";
        return redirect()->route('admin.users');
    }

    public function deletar($id){
        User::destroy($id);

        //return "controller usuario deletar";
        return redirect()->route('admin.users');
    }

}
