<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-medium text-gray-900">Add New Role</h2>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                    <form action="{{ route('admin.roles.store') }}" method="post">
                        @csrf
                        <x-form.input name="name" label="Name" :errors="$errors" />
                    
                        <x-form.select name="permissions" label="Permissions" :options="$permissions" :selected="old('permissions') ?? []" :errors="$errors" />
                        <div class="mb-4">
                            <input type="submit" class="btn btn-primary" value="Add Role">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
