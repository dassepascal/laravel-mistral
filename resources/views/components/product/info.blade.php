@props(['product'])

<div class="mb-4">
    <label for="title" class="block text-gray-700"><strong>Nom:</strong></label>
    <div class="mt-1">
        {{ $product->name }}
    </div>
</div>

<div class="mb-4">
    <label for="description" class="block text-gray-700"><strong>Description:</strong></label>
    <div class="mt-1">
        {{ $product->description }}
    </div>
</div>
<div class="mb-4 ">
    <label for="price" class="block text-gray-700"><strong>Prix:</strong></label>
    <div class="mt-1 w-3/4">
        {{ $product->price }} €
    </div>
</div>



