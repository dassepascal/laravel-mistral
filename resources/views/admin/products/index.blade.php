<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @can('create-product')
                        <x-nav-link href="{{ route('admin.products.create') }}" class="btn btn-sm btn-success">
                            <i class="bi bi-plus-circle"></i> Add New Product
                        </x-nav-link>
                    @endcan

                    <div class="mt-4">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        S#</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="width: 300px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <th scope="row"
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $loop->iteration }}</th>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $product->name }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center space-x-2">
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <x-nav-link href="{{ route('admin.products.show', $product->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="bi bi-eye"></i> Show
                                                    </x-nav-link>

                                                    @if ($product->name != 'Super Admin')
                                                        @can('edit-product')
                                                            <x-nav-link href="{{ route('admin.products.edit', $product->id) }}"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="bi bi-pencil-square"></i> Edit
                                                            </x-nav-link>
                                                        @endcan

                                                        @can('delete-product')
                                                            
                                                            <x-danger-button type="submit" class="btn btn-sm btn-danger mt-1"
                                                                onclick="return confirm('Do you want to delete this product?');">
                                                                <i class="bi bi-trash"></i> Delete
                                                            </x-danger-button>
                                                          
                                                           
                                                        @endcan
                                                    @endif

                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="3" class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span class="text-danger">
                                            <strong>No product Found!</strong>
                                        </span>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $products->links() }}

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

