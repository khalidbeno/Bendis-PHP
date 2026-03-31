<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = ['nombre', 'email', 'password'];

    protected $hidden = ['password'];
}


/*
HE DEJADO ARREGALDNO EL ERROR DE LA TERMINAL
ESTOY HACIENDO QUE FUNCIONE SOLO CON EL MODELO USUARIO, NO NECESITO 2 modleos
UNA VEZ ARREGLADO CREAR USUARIO ADMIN Y VER QUE APAREZCA INTERFAZ ADMIN
*/