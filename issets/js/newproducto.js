$(document).ready(function(){
    $('#newproducto').click(function(e){
        $.ajax({
            type: "POST",
            url: "./control/newproducto.php",
            data: $('#form-newproducto').serialize(),
            dataType: 'json',
            success: function () {
                //enviar mensaje 
            }
        })
        .done(function(r){
            if (r==1) {
                alert('Se registro un nuevo Producto');
                setTimeout(function() {location = "./index.php";}, 100);
            }
            
        })
        .fail(function(){
            alert('Error Inesperado');
        }); 
    })
})