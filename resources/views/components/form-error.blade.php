<div>
    @props(['name', 'message' => ''])
    @error($name)
        <div class="text-red-500 text-sm mt-1">
            {{ $message }}
        </div>
    @enderror
</div>