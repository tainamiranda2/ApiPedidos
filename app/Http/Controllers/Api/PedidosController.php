<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function __construct(private Pedido $pedido){

    }
    public function index(Pedido $pedido){
        //minino para passar no primeiro teste
      /*  return response()->json([
            ['id'=>'1'], ['id'=>'2'], ['id'=>'3']
        ]);*/

        //segundo test
        return response()->json($this->pedido->all());

    }

    public function show($id){

    $pedido=$this->pedido->find($id);

    return response()->json($pedido);
//por padrão já tme status 201
    }

    public function store(Request $resquest){

        $pedido=$this->pedido->create($resquest->all());
    
        return response()->json($pedido, 201);

        }
        public function update($id, Request $resquest){

            $pedido=$this->pedido->find($id);
        
            $pedido->update($resquest->all());

            return response()->json($pedido, 200);
    
            }
            public function destroy($id){

                $pedido=$this->pedido->find($id);
            
                $pedido->delete();
    
                return response()->json([], 204);
        
                }
}
