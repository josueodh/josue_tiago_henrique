@extends('layouts.master')

@section('content')

    @component('components.edit')
        @slot('title', 'Editar professor')
        @slot('back', route('teachers.index'))
        @slot('update', route('teachers.update', $teacher->id))
        @slot('form')
            @include('teachers.form')
        @endslot
    @endcomponent
@endsection
