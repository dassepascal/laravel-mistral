@props(['name', 'label', 'options', 'selected' => [], 'errors' => []])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" class="form-select mt-1 block w-full @error($name) border-red-500 @enderror" multiple>
        @foreach($options as $option)
            <option value="{{ $option->id }}" {{ in_array($option->id, $selected) ? 'selected' : '' }}>
                {{ $option->name }}
            </option>
        @endforeach
    </select>
    @error($name)
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
