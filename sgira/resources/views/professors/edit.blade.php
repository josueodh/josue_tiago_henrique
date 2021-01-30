@extends('layouts.master')

@section('content')

    @component('components.edit')
        @slot('title', 'Editar professor')
        @slot('back', route('professors.index'))
        @slot('update', route('professors.update', $professor->id))
        @slot('form')
            @include('professors.form')
        @endslot
    @endcomponent
@endsection
