<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [



        'subtotal',
        'iva',
        'total',
        'fechapedido',
        'estado',
        'user_id'



    ];

    public function detalles()
    {
        return $this->hasMany(Detalle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    
}
