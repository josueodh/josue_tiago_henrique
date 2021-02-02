@extends('layouts.master')

@section('content')

    @component('components.edit')
        @slot('title', 'Editar aluno')
        @slot('back', route('students.index'))
        @slot('update', route('students.update', $student->id))
        @slot('form')
            @include('students.form')
        @endslot
    @endcomponent
@endsection
