@extends('layouts.master')

@section('content')

    @component('components.edit')
        @slot('title', 'Editar aluno')
        @slot('back', route('alunos.index'))
        @slot('update', route('alunos.update', $aluno->id))
        @slot('form')
            @include('alunos.form')
        @endslot
    @endcomponent
@endsection
