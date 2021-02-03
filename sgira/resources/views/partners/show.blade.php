@extends('layouts.master')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes do Parceiro')
        @slot('back', route('partners.index'))
        @slot('form')
            @include('partners.form')
        @endslot
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
@endpush
