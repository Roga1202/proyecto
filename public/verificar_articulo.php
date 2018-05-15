<?php
	$ref=$_POST['ref'];
	$nom_art=$_POST['nom_art'];
	$sucursal=$_POST['sucursal'];
	$user=$_POST['user'];
	$cat=$_POST['cat'];
	$precio=$_POST['precio'];
	class Articulo{
		public $ref;
		public $nom_art;
		public $sucursal= array();
		public $cat;
		public $precio;

		public function __construct($ref,$nom_art,$sucursal,$user,$cat,$precio){
			$this->ref=$ref;
			$this->nom_art=$nom_art;
			$this->sucursal=$sucursal;
			$this->user=$user;
			$this->cat=$cat;
			$this->precio=$precio;
		}
		public function verificar(){
			echo "<h2 align=center>Verificacion de Registro de Articulo<h2>";

			echo "<p>Referencia: ". $this->ref . ".</p><br>";

			echo "<p>Nombre: ". $this->nom_art . ".</p><br>";

				if(count($this->sucursal)>0){
					echo "<p>Sucursal: ";
					for( $cont=0; $cont<count($this->sucursal);$cont++){
						echo $this->sucursal[$cont];
						if(!count($this->sucursal)-1){
							echo ".</p><br>";
						}
						else{
							echo ".</p>";
						}	
					}
				}
			echo "<p>Clientela: " . $this->user . ".</p><br>";
			echo "<p>Categoria: " . $this->cat . ".</p><br>";
			echo "<p>Precio: " . $this->precio . " Bsf.</p><br>";
		}
	}
	$articulo= new Articulo($ref,$nom_art,$sucursal,$user,$cat,$precio);
	$articulo->verificar();
	?>