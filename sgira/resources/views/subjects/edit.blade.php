@extends('layouts.master')

@section('content')

    @component('components.edit')
        @slot('title', 'Editar Matéria')
        @slot('back', route('subjects.index'))
        @slot('update', route('subjects.update', $subject->id))
        @slot('form')
            @include('subjects.form')
        @endslot
    @endcomponent
@endsection
