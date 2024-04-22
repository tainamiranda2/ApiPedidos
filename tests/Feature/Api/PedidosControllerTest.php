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
    public function test_get_pedidos_endpoint(): void
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
    
    public function test_get_single_pedidos_endpoint(): void
    {
        //gerando dados
        $pedido=Pedido::factory(1)->CreateOne();
        $response = $this->getJson('/api/pedidos/' .$pedido->id);

        //dd($response->baseResponse);
        //testano ststus code

        $response->assertStatus(200);
    //testando quantidade de dadso na api
       // $response->assertJsonCount(3);

        $response->assertJson(function(AssertableJson $json){
            //ver se tem string ou  numero
            $json->whereAllType([
            'id'=>'integer',
            'nome'=>'string',
            'descricao'=>'string',
            'status'=>'string',
            'cliente_id'=>'string',
            ]);
           
             //ver se tem todas as colunas e aceita até mesmo as colunas nao informadas
        $json->hasAll(['id', 'nome', 'descricao','status','cliente_id'])->etc();

//verifica valores

        }
       
    );

        
    }


   
    public function test_post_pedido_endpoint(){
        $pedido = Pedido::factory(1)->makeOne()->toArray();

        $response=$this->postJson('/api/pedidos', $pedido);
       
        $response->assertStatus(201);

        $response->assertJson(function(AssertableJson $json) use($pedido){
            //ver se tem string ou  numero
            $json->whereAll([
    
            'nome'=>$pedido['nome'] ,
            'descricao'=>$pedido[ 'descricao'],
            'status'=>$pedido['status'] , 
            'cliente_id'=>$pedido['cliente_id'], 
            ])->etc();
        });
    
    }
    


   
       public function test_put_pedido_endpoint(){
    
        Pedido::factory(1)->CreateOne();

     $pedido=[
        'nome'=>'Atualizando pedido',
        'descricao'=>'Atualizando descrição',
        'status'=>'Atualizando status',
        'cliente_id'=>'17'
     ];
        $response=$this->putJson('/api/pedidos/1', $pedido);
       
        $response->assertStatus(200);

        $response->assertJson(function(AssertableJson $json) use($pedido){
            //ver se tem string ou numero
            $json->whereAll([
    
            'nome'=>$pedido['nome'] ,
            'descricao'=>$pedido[ 'descricao'],
            'status'=>$pedido['status'] , 
            'cliente_id'=>$pedido['cliente_id']
            ])->etc();
        });
    
    }
    
       
    public function test_patch_pedido_endpoint(){
    
        Pedido::factory(1)->CreateOne();

     $pedido=[
        'nome'=>'Atualizando só pedido mesmo',
     ];
        $response=$this->patchJson('/api/pedidos/2', $pedido);
       
        $response->assertStatus(200);

        $response->assertJson(function(AssertableJson $json) use($pedido){
            //ver se tem string ou numero
            $json->where('nome', $pedido['nome'])->etc();
        });
    
    }

   
       public function test_delete_pedido_endpoint(){
    
        Pedido::factory(1)->Create();

        $response=$this->deleteJson('/api/pedidos/3' );
       
        $response->assertStatus(204);

    }
    
}