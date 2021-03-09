@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Cursos')
        @can('create', App\Course::class)
            @slot('create', route('courses.create'))
        @endcan
        @slot('header')
        <tr>
            <th>Nome</th>
            <th>Duração</th>
            <th>Ações</th>
        </tr>
        @endslot
        @slot('body')
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }}</td>
                    <td class="button-index">
                        <a href="{{ route('courses.dashboard', $course->id) }}" class="btn btn-success"><i class="fas fa-chart-line"></i></a>
                        @can('update', $course)
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can('delete', $course)
                            <form class="form-delete" action="{{ route('courses.destroy', $course->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        @endcan
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
