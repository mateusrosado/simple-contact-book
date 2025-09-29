

<a href="{{Route::has($linkto) ? route($linkto) : ''}}">
    <button {{ $attributes->merge(['class' => 'button ' . $color]) }}>
        {{$slot}}
    </button>
</a>    