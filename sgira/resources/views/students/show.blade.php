@extends('layouts.master')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes do Aluno')
        @slot('back', route('students.index'))
        @slot('form')
            @include('students.form')
        @endslot
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
@endpush
