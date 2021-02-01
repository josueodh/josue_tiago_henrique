@extends('layouts.master')

@section('content')

    @component('components.create')
        @slot('title', 'Criar Curso')
        @slot('back', route('subjects.index'))
        @slot('store', route('subjects.store'))
        @slot('form')
            @include('subjects.form')
        @endslot
    @endcomponent
@endsection
