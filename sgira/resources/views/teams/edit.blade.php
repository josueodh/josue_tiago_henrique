@extends('layouts.master')
@section('content')
    @component('components.edit')
        @slot('title', 'Editar Turma')
        @slot('url',route('teams.update', $team->id))
        @slot('form')
            @include('teams.form')
        @endslot
    @endcomponent
@endsection
