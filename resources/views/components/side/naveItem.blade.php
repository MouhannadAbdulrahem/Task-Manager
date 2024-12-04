@props([
    'name' => 'No Name',
    'data_fether' => 'file-text',
    'permission' => '',
])


    <li class="nav-item"><a class="d-flex align-items-center"><i data-feather="{{ $data_fether }}"></i><span
                class="menu-title text-truncate" data-i18n="{{ $name }}">{{ ($name) }}</span></a>
        <ul class="menu-content">
            {{ $slot }}
        </ul>
    </li>