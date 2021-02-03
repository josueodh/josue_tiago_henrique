<div class="row">
    <div class="form-group col-12">
        <label for="name" class="required">Nome </label>
        <input type="text" required autofocus class="form-control" name="name" id="name" value="{{ old('name', $partner->name) }}">
    </div>
    @if(Route::currentRouteName() !='partners.show')
    <div class="form-group col-12">
        <label for="img_1" class="required">Imagem do Parceiro</label>
        <div class="mb-2">
            <input type="file" name="imglink" id="imglink" accept="image/*" lang="pt-br" value="{{ old('imglink', $partner->imglink) }}">
        </div>
    </div>
    @endif
    @if(Route::currentRouteName() == 'partners.edit' || Route::currentRouteName() == 'partners.show')
    <div class="form-group col-12">
            <div class="d-flex justify-content-center">
                <img loading="lazy" class="img-responsive" width="200" height="200" src="{{ asset('/storage/'.$partner->imglink) }}" alt="Imagem do parceiro {{ $partner->name }}" />
            </div>
        </div>
    @endif
</div>
