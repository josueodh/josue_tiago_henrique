@extends('layouts.master')

@section('content')

    @component('components.edit')
        @slot('title', 'Editar Nota')
        @slot('back', route('grades.index',$team->id))
        @slot('update', route('grades.update', $grade->id))
        @slot('form')
            @include('grades.form')
        @endslot
    @endcomponent
@endsection
