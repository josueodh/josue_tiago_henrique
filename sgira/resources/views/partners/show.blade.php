@extends('layouts.master')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes do Parceiro')
        @slot('content')
            @include('partners.form', ['create'=> false])
            <p> aaaaaaaaaaaaa</p>
        @endslot
        @slot('back')
        @endslot
        @slot('form')
            <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-primary float-right ml-1"><i class="fas fa-pen"></i> Editar</a>
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
@endpush