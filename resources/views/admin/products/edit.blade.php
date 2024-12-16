<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-medium text-gray-900">Edit Product</h2>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                    <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Image Upload -->
                        <x-form.image-upload name="image" label="Image" :imageUrl="old('image')" :errors="$errors" />

                        <x-form.input name="name" label="Name" :value="$product->name" :errors="$errors" />

                        <x-form.input name="slug" label="Slug" :value="$product->slug" :errors="$errors" />

                        <x-form.input name="description" label="Description" :value="$product->description" :errors="$errors" />

                        <x-form.input name="price" label="Price" :value="$product->price" :errors="$errors" />

                        <!-- SEO -->
                        <hr>

                        <x-form.input name="seo_title" label="SEO Title" :value="$product->seo_title" :errors="$errors" />
                        <x-form.input name="meta_description" label="META Description" :value="$product->meta_description" :errors="$errors" />
                        <x-form.input name="meta_keywords" label="META Keywords" :value="$product->meta_keywords" :errors="$errors" />

                        <div class="mb-4">
                            <label class="form-checked-label col-md-4 text-md-end text-start" for="sold">Vendu</label>
                            <div class="form-check form-switch col-md-6">
                                <input type="hidden" name="sold" value="0" class="">
                                <input @checked($product->sold)
                                       class="form-check-input @error('sold') is-invalid @enderror" role="switch"
                                       type="checkbox" name="sold" id="sold" value="1">
                            </div>
                        </div>

                        <div class="mb-4">
                            <input type="submit" class="btn btn-primary" value="Update Product">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const nameInput = document.querySelector('input[name="name"]');
            const slugInput = document.querySelector('input[name="slug"]');
            const productId = {{ $product->id }};

            nameInput.addEventListener('input', function () {
                const nameValue = nameInput.value;
                fetch(`/admin/products/${productId}/update-slug`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ name: nameValue })
                })
                .then(response => response.json())
                .then(data => {
                    slugInput.value = data.slug;
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
</x-app-layout>
