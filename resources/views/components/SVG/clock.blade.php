@props([
    'stroke' => '2',
])
<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
    stroke-width="{{ $stroke }}" {{ $attributes->merge([]) }} stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock text-warning">
    <circle cx="12" cy="12" r="10"></circle>
    <polyline points="12 6 12 12 16 14"></polyline>
</svg>