<div class="row">
    <div class="form-group col-12">
        <label for="name" class="required">Nome </label>
        <input type="text" required autofocus class="form-control" name="name" id="name" value="{{ old('name', $partner->name) }}">
    </div>
    <label for="img_1" class="required">Imagem do Parceiro</label>
        <div class="mb-2">
            @if($create == false)
                @if($show == true)
                    <div>
                        <img class="img-responsive" width="300" height="300" src="{{ URL('storage/img/shop/'. $partner->imglink) }}" alt="Primeira imagem do produto {{ $partner->name }}" />
                    </div>
                @else
                    <input type="file" name="imglink" id="imglink" accept="image/*" lang="pt-br" value="{{ old('imglink', $partner->imglink) }}">
                @endif
            @else
                <input type="file" name="imglink" id="imglink" accept="image/*" lang="pt-br" value="{{ old('imglink', $partner->imglink) }}" required>
            @endif
        </div>
</div>