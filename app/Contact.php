<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //Se registra un arrreglo de los campos que se pueden guardar dentro de la tabla para evitar confictos
    protected $fillable = ['nombre','ape_pat','ape_mat','fecha_nacimiento'];
}
