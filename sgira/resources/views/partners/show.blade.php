@extends('layouts.master')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes do Parceiro')
        @slot('content')
            @include('partners.form', ['create'=> false])
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