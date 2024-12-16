<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(RefreshDatabase::class);

test('product page is accessible', function () {
    $response = $this->get('/admin/products');

    $response->assertStatus(302);
    $response->assertRedirect();
});

