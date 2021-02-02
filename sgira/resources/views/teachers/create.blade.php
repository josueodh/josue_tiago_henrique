@extends('layouts.master')

@section('content')

    @component('components.create')
        @slot('title', 'Criar professor')
        @slot('back', route('teachers.index'))
        @slot('store', route('teachers.store'))
        @slot('form')
            @include('teachers.form')
        @endslot
    @endcomponent
@endsection
