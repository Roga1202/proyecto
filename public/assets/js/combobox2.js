$(document).ready(function(){
   $("#categoria").change(function () {
           $("#categoria option:selected").each(function () {
            elegido=$(this).val();
            $.post("/assets/php/talla.php", { elegido: elegido }, function(data){
            $("#talla").html(data);
            });
        });
   })
});
