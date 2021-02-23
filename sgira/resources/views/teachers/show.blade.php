@extends('layouts.master')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes do Professor')
        @slot('back', route('teachers.index'))
        @slot('form')
            @include('teachers.form')
        @endslot
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
@endpush
