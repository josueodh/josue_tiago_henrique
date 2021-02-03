@extends('layouts.master')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes da Turma')
        @slot('content')
            @include('teams.form', ['create'=> false])
        @endslot
        @slot('back')
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
@endpush