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
        <label for="numeroSIAPE" class="required">SIAPE</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control " required value="" name="numeroSIAPE"  id="numeroSIAPE">
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">numeroSIAPE</span>
            </div>
        </div>
        @error('numeroSIAPE')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
</div>
