
@if (Route::has($linkto))
    <a href="{{route($linkto)}}">
@endif
    <button {{ $attributes->merge(['class' => 'button ' . $color]) }}>
        {{$slot}}
    </button>
@if (Route::has($linkto))
    </a>
@endif 