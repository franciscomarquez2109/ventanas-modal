$(document).ready(function(){
    $('#destino').bootstrapToggle({
        on: 'Ventas',
        off: 'Almacen',
        onstyle: 'primary',
        offstyle: 'warning',
        size: 'small'
       });
      
       $('#destino').change(function(){
        if($(this).prop('checked'))
        {
         $('#hidden_destino').val('VENTAS');
         
        }
        else
        {
         $('#hidden_destino').val('ALMACEN');
        }
       });
})