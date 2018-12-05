    function verproducto(id) {
        var id = id;
        $.ajax({
            type: "POST",
            url: "./control/verproducto.php",
            data: {id:id},
            dataType: 'json',
            success: function () {
                //enviar mensaje 
            }
        })
        .done(function(r){
            $('#idproductover').val(r[0]);
            $('#productover').val(r[1]);
            $('#stockver').val(r[2]);
            $('#preciover').val(r[3]);
        })
        .fail(function(){
            alert('Error Inesperado');
        }); 
    }

    function editproducto(id) {
        var id = id;
        $.ajax({
            type: "POST",
            url: "./control/verproducto.php",
            data: {id:id},
            dataType: 'json',
            success: function () {
                //enviar mensaje 
            }
        })
        .done(function(r){
            $('#idproductoedit').val(r[0]);
            $('#productoedit').val(r[1]);
            $('#stockedit').val(r[2]);
            $('#precioedit').val(r[3]);
        })
        .fail(function(){
            alert('Error Inesperado');
        }); 
    }





