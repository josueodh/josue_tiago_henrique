<div class="row">
<div class="form-group col-sm-12">
        <label for="student_id" class="required">Alunos</label>
        <select name="student_id[]" class="form-control select2" id="student_id" multiple="multiple" required value="{{ json_encode(old('student_id',$team->students->pluck('id'))) }}">
            @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-12">
        <label for="date" class="required">Período </label>
        <input type="text" required class="form-control" name="date" id="date" value="{{ old('date', $team->date) }}" placeholder="XXXX.X">
    </div>
</div>


@push('scripts')
    <script>
     $(document).ready(function() {
    $('.select2').select2();
});
    </script>
@endpush