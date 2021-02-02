@extends('layouts.master')
@section('content')
    @component('components.create')
        @slot('title', 'Criar Turma')
        @slot('back', route('teams.index'))
        @slot('store', route('teams.store'))
        @slot('form')
            @include('teams.form')
        @endslot
    @endcomponent
@endsection
