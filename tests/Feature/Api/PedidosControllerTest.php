<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PedidosControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_pedidoos_endpoint_get(): void
    {
        $response = $this->getJson('/api/pedidos');

        $response->assertStatus(200);

        $response->assertJsonCount(3);
    }
}
