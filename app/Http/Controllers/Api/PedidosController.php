<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index(Pedido $pedido){
        //minino para passar no primeiro teste
      /*  return response()->json([
            ['id'=>'1'], ['id'=>'2'], ['id'=>'3']
        ]);*/

        //segundo test
return response()->json($pedido->all());

    }
}
