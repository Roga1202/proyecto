<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {
  protected $table= 'producto';
  protected $fillable = ['PR_referencia', 'PR_nombre','PR_clientela','PR_categoria','PR_talla','PR_color','PR_marca','PR_material','PR_descripcion','PR_cantidad','PR_precio','PR_foto','AD_ID'];
}


 ?>
