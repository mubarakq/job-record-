{{-- resources/views/components/icon.blade.php --}}

@props([
    'name',
    'class' => 'w-5 h-5'
])

<i data-lucide="{{ $name }}" {{ $attributes->merge([
    'class' => $class
]) }}></i>