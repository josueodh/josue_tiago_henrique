@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Notas')
        @slot('header')
        <tr>
            <th>Nome do Aluno</th>
            <th>Nota</th>
            <th>Disciplina</th>
            <th>Ações</th>
        </tr>
        @endslot
        @slot('body')
            @foreach($grades as $grade)
                <tr>
                    @foreach($students as $student)
                        @if($student->id == $grade->student_id)
                            <td>{{$student->name}}</td>
                        @endif
                    @endforeach
                    <td>{{ $grade->grade}}</td>
                    @foreach($subjects as $subject)
                        @if($subject->id == $grade->subject_id)
                            <td>{{$subject->name}}</td>
                        @endif
                    @endforeach
                    <td class="button-index">
                        <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('grades.show', $grade->id) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                        <form class="form-delete" action="{{ route('grades.destroy', $grade->id) }}" method="post">
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
