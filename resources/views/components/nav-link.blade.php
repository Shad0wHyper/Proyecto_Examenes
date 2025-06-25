@props(['href', 'icon'])

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-200']) }}>
    <i class="fa-solid {{ $icon }} w-5"></i>
    <span class="ml-2">{{ $slot }}</span>
</a>
