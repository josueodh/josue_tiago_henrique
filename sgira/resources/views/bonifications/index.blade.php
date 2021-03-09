@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Bonificações')
        @can('bonification', App\Bonification::class)
        @slot('create', route('bonifications.create'))
        @endcan
        @slot('header')
        <tr>
            <th>Nome do Aluno</th>
            <th>Descrição</th>
            <th>Validade</th>
            <th>Parceiro</th>
            <th>Ações</th>
        </tr>
        @endslot
        @slot('body')
            @foreach($bonifications as $bonification)
                @can('view', $bonification)
                    <tr>
                        <td>{{ $bonification->student->name }}</td>
                        <td>{{ $bonification->description }}</td>
                        <td>{{ date('d/m/Y', strtotime($bonification->expirationDate)) }}</td>
                        <td>{{ $bonification->partner->name }}</td>
                        <td class="button-index">
                            @can('update', $bonification)
                            <a href="{{ route('bonifications.edit', $bonification->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            @endcan
                            <a href="{{ route('bonifications.show', $bonification->id) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                            @can('delete', $bonification)
                            <form class="form-delete" action="{{ route('bonifications.destroy', $bonification->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @endcan
            @endforeach
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/delete.js') }}"></script>
@endpush
