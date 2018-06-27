$(document).ready(function(){
   $("#clientela").change(function () {
           $("#clientela option:selected").each(function () {
            elegido=$(this).val();
            $.post("/assets/php/categoria2.php", { elegido: elegido }, function(data){
            $("#categoria").html(data);
            });
        });
   })
});
