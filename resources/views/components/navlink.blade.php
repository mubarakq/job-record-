@props(['active'=> false])

<a  {{ $attributes->merge(['class' => 'block px-3 py-2 rounded-md text-base font-medium ' . ($active ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white')]) }}>
    {{ $slot }}
</a>