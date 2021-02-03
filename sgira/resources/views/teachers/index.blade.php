@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Professores')
        @slot('create', route('teachers.create'))
        @slot('header')
        <tr>
            <th>Nome</th>
            <th>SIAPE</th>
            <th>Ações</th>
        </tr>
        @endslot
        @slot('body')
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->registration }}</td>
                    <td class="button-index">
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form class="form-delete" action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
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
