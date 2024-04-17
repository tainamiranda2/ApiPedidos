<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pedido;
use Illuminate\Testing\Fluent\AssertableJson;

class PedidosControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_pedidos_endpoint_get(): void
    {
//gerando dados
$pedidos=Pedido::factory(3)->Create();
$response = $this->getJson('/api/pedidos');

//dd($response->baseResponse);
//testano ststus code

        $response->assertStatus(200);
    //testando quantidade de dadso na api
        $response->assertJsonCount(3);

        $response->assertJson(function(AssertableJson $json){
            //ver se tem string ou  numero

              $json->whereType('0.id', 'integer');
            $json->whereType('0.nome', 'string');
            $json->whereType('0.descricao', 'string');
            $json->whereType('0.status', 'string');
            $json->whereType('0.cliente_id', 'string');

             //ver se tem todas as colunas

        $json->hasAll(['0.id', '0.nome', '0.descricao','0.status','0.cliente_id']);

//verifica valores

        }
       
    );

        
    }


}
