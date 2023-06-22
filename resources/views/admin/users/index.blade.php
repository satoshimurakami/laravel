@extends('layout.site')
@section('titulo','Usuários')
@section('conteudo')
<div class="container">
    <h3 class="center">Lista de Usuários</h3>
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-Mail</th>
                </tr>

            </thead>
            <tbody>
                @foreach($registros as $registro)
                <tr>
                    <td>{{$registro->id}}</td>
                    <td>{{$registro->name}}</td>
                    <td>{{$registro->email}}</td>
                    <td>
                        <a class="btn deep-orange" href="{{route('admin.users.editar',$registro->id)}}">Editar</a>
                    </td>
                    <td>
                        <a class="btn deep-orange" href="{{route('admin.users.deletar',$registro->id)}}">Deletar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a class="btn blue" href="{{route('admin.users.adicionar')}}">Adicionar</a>
    </div>
</div>
@endsection