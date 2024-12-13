<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(RefreshDatabase::class);

test('home page is accessible', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertViewIs('home');
});
