<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Auth\Access\AuthorizationException;

uses(RefreshDatabase::class);

beforeEach(function () {
    Artisan::call('permission:cache-reset');
});

test('admin page is accessible to admin users', function () {
    $role = Role::firstOrCreate(['name' => 'admin']);
    
    $user = User::factory()->create();
    $user->assignRole($role);

    $response = $this->actingAs($user)->get('/admin');

    $response->assertStatus(200);
    $response->assertViewIs('admin.index');
});

test('admin page is not accessible to non-admin users', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/admin');

    $response->assertStatus(403);
});

    


