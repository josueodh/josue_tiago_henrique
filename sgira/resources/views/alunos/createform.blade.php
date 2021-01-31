<div class="row">
    <div class="form-group col-sm-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" autofocus class="form-control @error('name') is-invalid @enderror" required value="">
        @error('name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-12 form-group">
        <label for="numeroMatricula" class="required">Matrícula</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control " required value="" name="numeroMatricula"  id="numeroMatricula">
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">numeroMatricula</span>
            </div>
        </div>
        @error('numeroMatricula')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-12 form-group">
        <label for="ira" class="required">IRA</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control @error('ira') is-invalid @enderror" required value="" name="ira"  id="ira">
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">IRA:</span>
            </div>
        </div>
        @error('ira')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
</div>
