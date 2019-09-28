<html >
<head>
    <!--link rel="stylesheet" href="//kendo.cdn.telerik.com/2016.2.504/styles/kendo.common-material.min.css" /-->
    {include file="includes/Librerias.tpl"}
</head>
<div class="row-fluid "  id="registrofactura" >
    <div class="span12" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="row-fluid  form" >
                    <div class="span12" >
                        <div class="titulonegro" >ADMINISTRACI&Oacute;N GENERAL</div>  
                    </div>                                      
                </div>  
            </div>                
                <div class="row-fluid form" >
                    <div class="span8" >
                        Actualización en bloque de todas las empresas registradas en el VORTEX
                    </div> 
                    <div class="span4" >
                        <input id="registrarfactura" type="button" value="ENVIAR EN BLOQUE" class="k-primary" style="width:50%"/> <br>
                    </div> 
                </div>
                        
        </div>
    </div>
</div>  

<script>  
$("#registrarfactura").kendoButton();
var addinsumofactura = $("#registrarfactura").data("kendoButton");
addinsumofactura.bind("click", function(e){             
   
   $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=admAdmGeneral&tarea=envia_bloque',
                success: function (data)
                {
                    alert("¡La tarea termino con exito!");
                }
                });
   
});

</script>  
