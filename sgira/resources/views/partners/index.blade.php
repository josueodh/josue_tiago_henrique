@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Parceiros')
        @can('create', App\Partner::class)
            @slot('create', route('partners.create'))
        @endcan
        @slot('header')
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        @endslot
        @slot('body')
            @foreach($partners as $partner)
                <tr>
                    <td>{{ $partner->name }}</td>
                    <td class="button-index">
                        @can('update',  $partner)
                        <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        @endcan
                        <a href="{{ route('partners.show', $partner->id) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                        @can('delete',  $partner)
                        <form class="form-delete" action="{{ route('partners.destroy', $partner->id) }}" method="post">
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
