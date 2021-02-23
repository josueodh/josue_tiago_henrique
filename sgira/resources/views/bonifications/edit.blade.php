@extends('layouts.master')

@section('content')

    @component('components.edit')
        @slot('title', 'Editar Bonificação')
        @slot('back', route('bonifications.index'))
        @slot('update', route('bonifications.update', $bonification->id))
        @slot('form')
            @include('bonifications.form')
        @endslot
    @endcomponent
@endsection
