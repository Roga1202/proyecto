<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model{

  const CREATED_AT = 'PD_inicio';
  const UPDATED_AT = 'PD_actualizacion';

  protected $table= 'pedido';
  protected $fillable = ['PRV_ID', 'AD_ID','PD_nombre','PD_talla','PD_marca','PD_material','PD_cantidad'];

}

 ?>
