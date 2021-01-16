@extends('layouts.master')

@section('title','Notificação')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-default">
                        <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped dataTable">
                                <thead>
                                    <th>Categoria</th>
                                    <th>Texto</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    @forelse($notifications as $notification)
                                        <tr>
                                            <td>{{ $notification->data['title']}}</td>
                                            <td>{{ $notification->data['text'] }}</td>
                                            <td>{{ $notification->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ $notification->data['route'] }}" class="btn btn-secondary"><i class="fas fa-search"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Nenhum notificação foi encontrada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </section>
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/delete.js') }}"></script>
@endpush
