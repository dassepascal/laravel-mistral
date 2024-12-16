@props(['name', 'label', 'imageUrl' => null, 'errors' => []])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700">{{ $label }}</label>
    <input type="file" name="{{ $name }}" id="{{ $name }}" class="form-input mt-1 block w-full @error($name) border-red-500 @enderror" accept="image/*">
    @error($name)
        <span class="text-red-500">{{ $message }}</span>
    @enderror
    @if ($imageUrl)
        <img src="{{ $imageUrl }}" alt="Preview" class="mt-2 max-w-full h-auto">
    @endif
</div>
