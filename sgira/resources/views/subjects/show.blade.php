@extends('layouts.master')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes da Matéria')
        @slot('back', route('subjects.index'))
        @slot('form')
            @include('subjects.form')
        @endslot
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
@endpush
