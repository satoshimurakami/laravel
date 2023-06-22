@extends('layout.site')

@section('titulo','Contato')

@section('conteudo')

    <h3>View Contato Index</h3>

    @foreach ($contatos as $contato)
        <p>{{$contato->nome}}</p>
        <p>{{$contato->tel}}</p>
        
    @endforeach

@endsection

