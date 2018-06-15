$(document).ready(function(){
   $("#clientela").change(function () {
           $("#clientela option:selected").each(function () {
            elegido=$(this).val();
            $.post("/assets/php/categoria.php", { elegido: elegido }, function(data){
            $("#categoria").html(data);
            });
        });
   })
});
