@extends('layouts.master')

@section('content')

    @component('components.create')
        @slot('title', 'Criar Bonificação')
        @slot('back', route('bonifications.index'))
        @slot('store', route('bonifications.store'))
        @slot('form')
            @include('bonifications.form')
        @endslot
    @endcomponent
@endsection
