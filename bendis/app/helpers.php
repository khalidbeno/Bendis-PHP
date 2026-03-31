<?php

function imagenProducto($nombre) {
    $imagenes = [
        'Clip' => 'img/Clip.png',
        'Bendis Supreme' => 'img/BendisSupreme.png',
        'Lágrima Adesiva' => 'img/LagrimaAdesiva.png',
        'Tapete' => 'img/Tapete.png'
    ];

    foreach ($imagenes as $clave => $archivo) {
        if (stripos($nombre, $clave) !== false) {
            return $archivo;
        }
    }

    return 'img/default.png'; // Ruta a imagen por defecto
}
