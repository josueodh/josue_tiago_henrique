@extends('layouts.master')

@section('content')

    @component('components.create')
        @slot('title', 'Criar professor')
        @slot('back', route('professors.index'))
        @slot('store', route('professors.store'))
        @slot('form')
            @include('professors.createform')
        @endslot
    @endcomponent
@endsection
