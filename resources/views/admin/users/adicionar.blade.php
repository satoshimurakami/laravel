@extends('layout.site')

@section('titulo','Usuários')

@section('conteudo')
<div class="container">
    <h3 class="center">Adicionar Usuário</h3>
    <div class="row">
        <form class="" action="{{route('admin.users.salvar')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('admin.users._form')
            <button class="btn deep-orange">Salvar</button>
        </form>        
    </div>    
</div>

@endsection