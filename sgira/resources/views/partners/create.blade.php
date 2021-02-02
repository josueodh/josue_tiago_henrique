@extends('layouts.master')

@section('content')

    @component('components.create')
        @slot('title', 'Criar Parceiro')
        @slot('back', route('partners.index'))
        @slot('store', route('partners.store'))
        @slot('form')
            @include('partners.form')
        @endslot
    @endcomponent
@endsection
