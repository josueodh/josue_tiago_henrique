@extends('layouts.master')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes da Nota')
        @slot('back', route('grades.index'))
        @slot('form')
            @include('grades.form')
        @endslot
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
@endpush
