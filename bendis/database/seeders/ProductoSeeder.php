<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'Producto de prueba 1',
            'descripcion' => 'Descripción del producto 1',
            'precio' => 10.99,
            'stock' => 50
        ]);
    
        Producto::create([
            'nombre' => 'Producto de prueba 2',
            'descripcion' => 'Descripción del producto 2',
            'precio' => 15.49,
            'stock' => 30
        ]);
    }
}
