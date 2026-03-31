<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')
                  ->constrained('pedidos')
                  ->onDelete('cascade');
            $table->string('metodo')->default('stripe');      // stripe, tarjeta, etc
            $table->decimal('importe', 10, 2);
            $table->string('moneda', 3)->default('EUR');
            $table->string('estado')->default('pendiente');   // pendiente, pagado, fallido
            $table->string('referencia_pasarela')->nullable(); // id de Stripe u otra
            $table->timestamp('pagado_en')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
