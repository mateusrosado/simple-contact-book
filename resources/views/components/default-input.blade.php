@if ($labelText)
    <label for="{{ $id }}">{{ $labelText }}</label>
@endif

<input id="{{ $id }}" name="{{ $id }}" type="{{ $type }}" {{ $attributes->merge(['class' => 'input']) }}>