@props([
    'stroke' => '2',
])


<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
    stroke-width="{{ $stroke }}" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash"
    {{ $attributes->merge([]) }}>
    <circle cx="12" cy="12" r="10"></circle>
    <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
</svg>
