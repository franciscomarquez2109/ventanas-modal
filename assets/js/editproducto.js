$(document).ready(function(){
    $('#modificar').click(function(e){
        $.ajax({
            type: "POST",
            url: "./control/editpoducto.php",
            data: $('#form-edit').serialize(),
            dataType: 'json',
            success: function () {
                //enviar mensaje 
            }
        })
        .done(function(r){
            if (r==1) {
                alert('Se han modificado los datos');
                setTimeout(function() {location = "./index.php";}, 100);
            }
            
        })
        .fail(function(){
            alert('Error Inesperado');
        }); 
    })
})