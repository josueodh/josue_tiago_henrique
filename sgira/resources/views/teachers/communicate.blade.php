@extends('layouts.master')

@section('title', 'Comunicado')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <form action="{{ route('teachers.sendCommunicate') }}" method="post" id="send-email">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="to">Turma</label>
                        <select name="to" required value="{{ old('to') }}" class="form-control select2 @error('to') is-invalid @enderror" id="to">
                            <option></option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Assunto</label>
                        <input class="form-control" name="subject" required value="{{ old('subject') }}" id="subject">
                    </div>
                    <div class="form-group">
                        <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">
                            {{ old('message')}}
                        </textarea>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <div class="float-right">
                        <button type="submit" form="send-email" class="btn btn-primary"><i class="far fa-envelope"></i> Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('textarea').summernote({
            tabsize: 2,
            height: 500,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol','dl', 'paragraph']],
                ['view', ['fullscreen']]
            ]
        });
    });
</script>
@endpush
