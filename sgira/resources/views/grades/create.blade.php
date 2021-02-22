@extends('layouts.master')
@section('content')
    @component('components.create')
        @slot('title', 'Criar Nota')
        @slot('back', route('grades.index'))
        @slot('store', route('grades.store'))
        @slot('form')
            @include('grades.form')
        @endslot
    @endcomponent
@endsection
