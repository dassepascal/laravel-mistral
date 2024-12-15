<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-medium text-gray-900">Role Information</h2>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                    <x-role.info :role="$role" :rolePermissions="$rolePermissions" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
