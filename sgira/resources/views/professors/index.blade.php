@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Professores')
        @slot('create', route('professors.create'))
        @slot('header')
        <tr>
            <th>Nome</th>
            <th>SIAPE</th>
            <th></th>
        </tr>
        @endslot
        @slot('body')
            @foreach($professors as $professor)
                <tr>
                    <td>{{ $professor->name }}</td>
                    <td>{{ $professor->numeroSIAPE }}</td>
                    <td class="button-index">
                        <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form class="form-delete" action="{{ route('professors.destroy', $professor->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/delete.js') }}"></script>
@endpush
