@extends('layouts.master')

@section('content')

    @component('components.create')
        @slot('title', 'Criar aluno')
        @slot('back', route('alunos.index'))
        @slot('store', route('alunos.store'))
        @slot('form')
            @include('alunos.form')
        @endslot
    @endcomponent
@endsection
