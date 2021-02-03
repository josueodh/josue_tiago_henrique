@extends('layouts.master')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes da Turma')
        @slot('back', route('teams.index'))
        @slot('form')
            @include('teams.form')
        @endslot
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
@endpush
