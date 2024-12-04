@props([
    'stroke' => '2',
])

<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
    stroke-width="{{ $stroke }}" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle" {{ $attributes->merge([]) }}>
    <circle cx="12" cy="12" r="10"></circle>
    <line x1="15" y1="9" x2="9" y2="15"></line>
    <line x1="9" y1="9" x2="15" y2="15"></line>
</svg>