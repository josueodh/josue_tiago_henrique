<div class="row">
    <div class="form-group col-12">
        <label for="name" class="required">Nota</label>
        <input type="number" autofocus required class="form-control" name="grade" id="grade" value="{{ old('grade', $grade->grade) }}">
        @error('name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 form-group">
        <label for="student_id" class="required">Aluno</label>
        <select name="student_id"  required value="{{ old('student_id',$grade->student_id ) }}" class="form-control select2 @error('student_id') is-invalid @enderror" id="student_id">
            <option></option>
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
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
        <select name="subject_id"  required value="{{ old('subject_id',$grade->subject_id ) }}" class="form-control select2 @error('subject_id') is-invalid @enderror" id="subject_id">
            <option></option>
            @foreach($subjects as $subject)
                @if($subject->id == $subjectselected->id)
                    <option value="{{ $subject->id}}">{{ $subject->name }}</option>
                @endif
            @endforeach
        </select>
        @error('subject_id')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
</div>
