@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Professores')
        @can('create', App\User::class)
            @slot('create', route('teachers.create'))
        @endcan
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
                        @can('update', $teacher)
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        @endcan
                        <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                        @can('delete', $teacher)
                        <form class="form-delete" action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        @endcan
                        <a href="{{ route('teachers.email', $teacher->id) }}" class="btn btn-success"><i class="far fa-envelope"></i></a>
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
