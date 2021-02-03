<div class="row">
    <div class="form-group col-12">
        <label for="name" class="required">Nome</label>
        <input type="text" autofocus required class="form-control" name="name" id="name" value="{{ old('name', $team->name) }}">
        @error('name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-12">
        <label for="student_id" class="required">Alunos</label>
        <select name="student_id[]" class="form-control select2 @error('student_id') is-invalid @enderror multiple" id="student_id" multiple="multiple" required value="{{ json_encode(old('student_id',$team->students->pluck('id'))) }}">
            @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
        @error('student_id')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 form-group">
        <label for="teacher_id" class="required">Professor</label>
        <select name="teacher_id"  required value="{{ old('teacher_id',$team->teacher_id ) }}" class="form-control select2 @error('teacher_id') is-invalid @enderror" id="teacher_id">
            <option></option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>
        @error('teacher_id')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 form-group">
        <label for="subject_id" class="required">Matéria</label>
        <select name="subject_id"  required value="{{ old('subject_id',$team->subject_id ) }}" class="form-control select2 @error('subject_id') is-invalid @enderror" id="subject_id">
            <option></option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
        @error('subject_id')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-md-6 col-sm-12">
        <label for="year" class="required">Ano </label>
        <input type="number" min="2020" required class="form-control" name="year" id="year" value="{{ old('year', $team->year) }}" >
        @error('year')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-md-6 col-sm-12">
        <label for="semester" class="required">Semestre </label>
        <select name="semester" class="form-control select2" id="semester"  required>
            <option value="1">Primeiro</option>
            <option value="2">Segundo</option>
        </select>
        @error('semester')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    </div>
</div>
