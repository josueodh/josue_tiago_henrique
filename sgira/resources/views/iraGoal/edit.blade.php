@extends('layouts.master')

@section('content')

    @component('components.edit')
        @slot('title', 'Editar Meta de IRA')
        @slot('back', route('iraGoal.index'))
        @slot('update', route('iraGoal.update'))
        @slot('form')
            @include('iraGoal.form')
        @endslot
    @endcomponent
@endsection
