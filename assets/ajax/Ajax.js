//Esta funcion ajax ayuda a refrescar la pagina para la carga
//instantanea de datos.

function miFuncion() {
    $(document).ready(function(){
        $("#btnguardar").click(function(){
            var datos = $('frmajax').serialize();
            $.ajax({
                type:"POST",
                url:"../Modelo/insertar.php", //Aqui tiene que ir la Url por donde pasan los datos.
                data:datos,
                succes: function(r){
                    if(r!=1)
                        alert('Ingreso de datos correcto');
                    else
                        alert('Fallo el Ingreso de Datos');
                }    
            })
        })
    })
}