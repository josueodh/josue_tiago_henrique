@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Matérias')
        @slot('create', route('subjects.create'))
        @slot('header')
        <tr>
            <th>Nome</th>
            <th>Código</th>
            <th>Creditos</th>
            <th>Ações</th>
        </tr>
        @endslot
        @slot('body')
            @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->credits_hours }}</td>
                    <td class="button-index">
                    <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('grades.create', $subject->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form class="form-delete" action="{{ route('subjects.destroy', $subject->id) }}" method="post">
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
