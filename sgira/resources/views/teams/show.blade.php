@extends('layouts.master')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes da Turma')
        @slot('content')
            @include('teams.form', ['create'=> false])
        @endslot
        @slot('back')
        @slot('form')
        <div class="form-group col-12">
            <label for="name" class="required">Nome </label>
            <input type="text"  required class="form-control" name="name" id="name" value="{{ old('name', $team->name) }}" >
        </div>
        <div class="form-group col-12">
            <label for="year" class="required">Ano </label>
            <input type="number" min="2020" required class="form-control" name="year" id="year" value="{{ old('year', $team->year) }}" >
        </div>
        <div class="form-group col-12">
            <label for="semester" class="required">Periodo </label>
            <input type="number" min="2020" required class="form-control" name="semester" id="semester" value="{{ old('semester', $team->semester) }}" >
        </div>
        @endslot
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
@endpush