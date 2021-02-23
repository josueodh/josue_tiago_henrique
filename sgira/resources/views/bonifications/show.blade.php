@extends('layouts.master')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes da Bonificação')
        @slot('back', route('bonifications.index'))
        @slot('form')
            @include('bonifications.form')
        @endslot
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
@endpush
