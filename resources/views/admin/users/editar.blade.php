@extends('layout.site')

@section('titulo','Usuários')

@section('conteudo')
<div class="container">
    <h3 class="center">Editar Usuário</h3>
    <div class="row">
        <form class="" action="{{route('admin.users.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            @include('admin.users._form')
            <button class="btn deep-orange">Atualizar</button>
        </form>        
    </div>    
</div>

@endsection