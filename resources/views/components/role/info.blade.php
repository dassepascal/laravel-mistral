@props(['role', 'rolePermissions'])

<div class="mb-4">
    <label for="name" class="block text-gray-700"><strong>Name:</strong></label>
    <div class="mt-1">
        {{ $role->name }}
    </div>
</div>

<div class="mb-4">
    <label for="permissions" class="block text-gray-700"><strong>Permissions:</strong></label>
    <div class="mt-1">
        @if ($role->name == 'Super Admin')
            <span class="badge bg-primary">All</span>
        @else
            @forelse ($rolePermissions as $permission)
                <span class="badge bg-primary">{{ $permission->name }}</span>
            @empty
                <span class="text-gray-500">No permissions</span>
            @endforelse
        @endif
    </div>
</div>
