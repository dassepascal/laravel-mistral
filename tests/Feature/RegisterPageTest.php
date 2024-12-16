<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(RefreshDatabase::class);

test('registeer page is accessible', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
    $response->assertViewIs('auth.register');
});
