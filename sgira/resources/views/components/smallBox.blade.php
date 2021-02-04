
<div class="small-box bg-{{ $color ?? null }} ">
    <div class="inner">
        <h3>{{ $value ?? null }}</h3>
        <p>{{ $title ?? null }}</p>
    </div>
    <div class="icon">
        <i class="{{ $icon ?? null }}"></i>
    </div>
    @if(isset($route))
        <a href="{{ $route }}" class="small-box-footer">Saiba Mais <i class="fas fa-arrow-circle-right"></i></a>
    @endif
</div>
