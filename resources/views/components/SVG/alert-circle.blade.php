@props([
    'stroke' => '2',
    'description' => '',
])
<span title="{{ ($description) }}">
    <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;height: 1rem" width="24" height="24"
        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="{{ $stroke }}" stroke-linecap="round"
        stroke-linejoin="round" {{ $attributes->merge([]) }} class="feather feather-alert-circle">
        <circle cx="12" cy="12" r="10"></circle>
        <line x1="12" y1="8" x2="12" y2="12"></line>
        <line x1="12" y1="16" x2="12.01" y2="16"></line>
    </svg>
</span>
