<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model{

  const CREATED_AT = 'CLWEB_inicio';
  const UPDATED_AT = 'CLWEB_actualizacion';

  protected $table= 'clienteweb';
  // protected $fillable = ['CLWEB_CI', 'CLWEB_correo','CLWEB_contrasena','CLWEB_direccion','CLWEB_telefono','CLWEB_primernombre','CLWEB_primerapellido','CLWEB_pregunta','CLWEB_respuesta',];

}

 ?>
