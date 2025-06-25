@props(['href', 'icon'])

<a href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'group flex items-center px-4 py-2 text-sm font-medium rounded-lg
                    hover:bg-red-100 hover:text-red-600 transition'
    ]) }}>
    <i class="fas {{ $icon }} w-5"></i>
    <span class="ml-3">{{ $slot }}</span>
</a>
