function disabledproducto(id) {
    var op = confirm('¿Desea Desactivar este producto?');
    if (op == true) {
        $.ajax({
            type: "POST",
            url: "./control/disabledproducto.php",
            data: {id:id},
            dataType: 'json',
            success: function () {
                //enviar mensaje 
            }
        })
        .done(function(r){
            if (r==1) {
                alert('Producto Desactivado');
                setTimeout(function() {location = "./index.php";}, 100);
            }
            
        })
        .fail(function(){
            alert('Error Inesperado');
        }); 
    } else{
        return false;
    }
}