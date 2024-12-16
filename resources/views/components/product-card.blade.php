@props(['product'])

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="bg-violet-500 w-full h-48 object-cover border border-gray-300 rounded-lg shadow-lg">
    @else
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
            <span class="text-gray-500">Pas d'image</span>
        </div>
    @endif

    <div class="p-4">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
        <p class="text-gray-600 mb-4 h-20 overflow-hidden">{{ Str::limit($product->description, 100) }}</p>
        <div class="flex justify-between items-center">
            <span class="text-2xl font-bold text-indigo-600">{{ number_format($product->price / 100, 2, ',', ' ') }} €</span>
            @if($product->active)
                <span class="bg-green-500 text-white px-2 py-1 rounded-full text-sm">Disponible</span>
            @else
                <span class="bg-red-500 text-white px-2 py-1 rounded-full text-sm">Indisponible</span>
            @endif
        </div>

        <a href="{{ route('products.show', ['slug' => $product->slug, 'product' => $product->id]) }}" class="mt-4 block w-full text-center bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition duration-300">
            Voir le détail
        </a>
    </div>
</div>
