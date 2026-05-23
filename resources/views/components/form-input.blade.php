@props(['type' => 'text', 'name', 'placeholder' => '', 'message' => ''])
<input type="{{ $type ?? 'text' }}" name="{{ $name }}" placeholder="{{ $placeholder ?? '' }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" {{ $attributes }} />
<div class="text-red-500 text-sm mt-1">
    @error($name)
        {{ $message }}
    @enderror
</div>