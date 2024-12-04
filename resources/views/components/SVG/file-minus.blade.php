@props([
    'stroke' => '2',
])


<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
    stroke-width="{{ $stroke }}" stroke-linecap="round" stroke-linejoin="round" {{ $attributes->merge([]) }} class="feather feather-file-minus">
    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
    <polyline points="14 2 14 8 20 8"></polyline>
    <line x1="9" y1="15" x2="15" y2="15"></line>
</svg>
