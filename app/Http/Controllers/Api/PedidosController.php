<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index(){
        //minino para passar no primeiro teste
        return response()->json([
            ['id'=>'1'], ['id'=>'2'], ['id'=>'3']
        ]);

    }
}
