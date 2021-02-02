@extends('layouts.master')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes da Turma')
        @slot('content')
            @include('partners.form', ['create'=> false])
        @endslot
        @slot('back')
            <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-primary float-right ml-1"><i class="fas fa-pen"></i> Editar</a>
            <a href="{{ route('teams.index') }}" class="btn btn-dark float-right"><i class="fas fa-undo-alt"></i> Voltar</a>
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
@endpush