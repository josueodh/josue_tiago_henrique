@extends('layouts.master')

@section('content')

    @component('components.create')
        @slot('title', 'Criar aluno')
        @slot('back', route('students.index'))
        @slot('store', route('students.store'))
        @slot('form')
            @include('students.createform')
        @endslot
    @endcomponent
@endsection
