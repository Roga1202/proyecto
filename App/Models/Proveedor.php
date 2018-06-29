<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model{

  const CREATED_AT = 'PRV_inicio';
  const UPDATED_AT = 'PRV_actualizacion';

  protected $table= 'proveedor';
  protected $fillable = ['PRV_RM', 'PRV_producto','PRV_telefono','PRV_correo','PRV_primernombre','PRV_otronombre','PRV_primerapellido','PRV_segundoapellido','AD_ID',];

}

 ?>
