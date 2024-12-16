@props(['name', 'label', 'type' => 'text', 'value' => '', 'errors' => []])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-input mt-1 block w-full @error($name) border-red-500 @enderror" value="{{ old($name, $value) }}" oninput="updateSlug(this.value)">
    @error($name)
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
