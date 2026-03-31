<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    public function up()
{
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->string('cliente_email');
        $table->string('direccion');
        $table->string('ciudad');
        $table->string('codigo_postal');
        $table->string('pais');
        $table->string('envio');
        $table->string('metodo_pago');
        $table->decimal('total', 10, 2);
        $table->string('estado');
        $table->string('stripe_charge_id')->nullable();
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
