@extends('layouts.master')

@section('content')

    @component('components.edit')
        @slot('title', 'Editar Parceiro')
        @slot('back', route('partners.index'))
        @slot('update', route('partners.update', $partner->id))
        @slot('form')
            @include('partners.form')
        @endslot
    @endcomponent
@endsection
