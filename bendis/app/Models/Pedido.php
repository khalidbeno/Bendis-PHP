<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'cliente_email',
        'direccion',
        'ciudad',
        'codigo_postal',
        'pais',
        'envio',
        'metodo_pago',
        'total',
        'estado',
        'stripe_charge_id',
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }
}
