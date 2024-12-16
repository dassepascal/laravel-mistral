<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Découvrez nos Tambours Chamaniques</h1>
    
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="flex justify-center">
                    <x-product-card :product="$product" />
                </div>
            @endforeach
        </div>
    
        <div class="mt-12 text-center">
            <a href="{{ route('admin.products.index') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700 transition duration-300">
                Voir tous nos tambours
            </a>
        </div>
    </div>
</x-app-layout>
