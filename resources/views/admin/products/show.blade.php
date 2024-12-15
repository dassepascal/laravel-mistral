<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-medium text-gray-900">Product Information</h2>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                    @if ($product->image)
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700">Image</label>
                            <div class="mt-1">
                                <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}" class="img-thumbnail">
                            </div>
                        </div>
                    @endif
                    <x-product.info :product="$product" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
