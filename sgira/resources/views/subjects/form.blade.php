<div class="row">
    <div class="form-group col-sm-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" required autofocus class="form-control @error('name') is-invalid @enderror" required value="{{ old('name',$subject->name) }}">
        @error('name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 col-md-6 form-group">
        <label for="code" class="required">Código</label>
        <div class="input-group mb-3">
            <input type="text" required class="form-control  @error('code') is-invalid @enderror" required value="{{ old('code', $subject->code ) }}" name="code"  id="code">
        </div>
        @error('code')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 col-md-6 form-group">
        <label for="credits" class="required">Creditos</label>
        <select name="credits"  required value="{{old('credits',$subject->credits ) }}" class="form-control select2 @error('credits') is-invalid @enderror multiple" id="credits">
            <option></option>
            <option>4</option>
            <option>2</option>
        </select>
        @error('credits')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 form-group">
        <label for="code" class="required">Curso</label>
        <select name="course_id[]" required multiple value="{{ json_encode(old('course_id',$subject->courses->pluck('id'))) }}" class="form-control select2 @error('course_id') is-invalid @enderror multiple" id="course_id">
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
        @error('code')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 form-group">
        <label for="code" class="required">Professor</label>
        <select name="teacher_id"  required value="{{ old('teacher_id',$subject->teacher_id ) }}" class="form-control select2 @error('teacher_id') is-invalid @enderror multiple" id="teacher_id">
            <option></option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>
        @error('code')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
</div>
