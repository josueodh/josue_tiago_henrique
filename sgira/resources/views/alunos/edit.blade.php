@extends('layouts.master')

@section('content')

    @component('components.edit')
        @slot('title', 'Editar Curso')
        @slot('back', route('courses.index'))
        @slot('update', route('courses.update', $course->id))
        @slot('form')
            @include('courses.form')
        @endslot
    @endcomponent
@endsection
