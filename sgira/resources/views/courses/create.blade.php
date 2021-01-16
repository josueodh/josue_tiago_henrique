@extends('layouts.master')

@section('content')

    @component('components.create')
        @slot('title', 'Criar Curso')
        @slot('back', route('courses.index'))
        @slot('store', route('courses.store'))
        @slot('form')
            @include('courses.form')
        @endslot
    @endcomponent
@endsection
