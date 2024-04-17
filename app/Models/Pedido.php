<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    //deu erro 500
protected $fillable=['nome',
 'descricao', 'status', 
 'cliente_id'];

}
