<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model{

  const CREATED_AT = 'AD_inicio';
  const UPDATED_AT = 'AD_actualizacion';

  protected $table= 'administrador';
  protected $fillable = ['AD_primernombre', 'AD_otronombre','AD_primeapellido','AD_segundoapellido','AD_correo','AD_contrasena','AD_pregunta','AD_respuesta'];

}

 ?>
