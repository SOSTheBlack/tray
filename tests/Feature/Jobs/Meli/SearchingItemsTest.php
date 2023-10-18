<?php

namespace Tests\Feature\Jobs\MercadoLivre;

use Tests\TestCase;

class SearchingItemsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
