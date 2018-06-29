function calculo(){
	//tasa de impuesto
  var tasa = 70;

  //monto a calcular el impuesto
  var precio_bruto = $("input[name=precio_bruto]").val();

  //calsulo del impuesto
  var ganancia = (precio_bruto * tasa)/100;

  //se carga el iva en el campo correspondien te
  $("input[name=ganancia]").val(ganancia);

  //se carga el total en el campo correspondiente
  $("input[name=precio_estimado]").val(parseInt(precio_bruto)+parseInt(ganancia));
}
