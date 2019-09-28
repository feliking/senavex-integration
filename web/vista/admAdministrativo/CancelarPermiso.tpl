{assign var="id" value="cp"|cat:$ausenciaasistente->id_ausencia_asistente}  
<div class="row-fluid " id="eliminarausenciaasistenteview{$id}">
    <div class="span12" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="row-fluid  form" >
                    <div class="span12" >
                        <div class="titulonegro" > {$ausenciaasistente->tipoausencia->descripcion}</div>  
                    </div>                                      
                </div>  
            </div>
            <div class="row-fluid " >
                <div class="span2" >
                </div> 
                <div class="span2 parametro" >
                    Funcionario:
                </div>     
                <div class="span6 campo" >
                    {$ausenciaasistente->persona->nombres} {$ausenciaasistente->persona->paterno} {$ausenciaasistente->persona->materno}
                </div>  
                <div class="span2" >
                </div> 
            </div>    
            <div class="row-fluid " >
                <div class="span2" >
                </div> 
                <div class="span2 parametro" >
                    Desde:
                </div>     
                <div class="span2 campo" >
                    {$ausenciaasistente->fecha_desde} 
                </div>  
                <div class="span2 parametro" >
                    Hasta:
                </div>     
                <div class="span2 campo" >
                    {$ausenciaasistente->fecha_hasta} 
                </div>  
                <div class="span2" >
                </div> 
            </div>    
            <div class="row-fluid " >
                <div class="span2" >
                </div> 
                <div class="span2 parametro" >
                    Motivo:
                </div>     
                <div class="span6 campo" >
                    {$ausenciaasistente->motivo} 
                </div>  
                <div class="span2" >
                </div> 
            </div>  
            <div class="row-fluid form" > 
                 <div class="span4" > 
                </div> 
                <div class="span2" > 
                    <input id="cancelareliminarlic{$id}" type="button"  value="Cancelar" class="k-primary" style="width:100%"/> 
                </div>                
                <div class="span2" > 
                    <input id="eliminarlic{$id}" type="button"  value="Eliminar" class="k-primary" style="width:100%"/> 
                </div>
                 <div class="span4" > 
                </div>                 
            </div>
        </div>
    </div>
</div>   
{*<div class="row-fluid fadein"  id="firmaeliminarausenciaasistenteview" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header"><div class="titulo">Firma Digital de Eliminación de Permisos</div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, apruebo el permiso/licencia del funcionario/a <span id="nombrefuncionariopermiso" class="letrarelevante"></span>.</p> 

                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmaeliminarlic" id="formfirmaeliminarlic" method="post"  action="index.php" >
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                       class="k-textbox " placeholder="Pin" name="pinfirmaeliminarlic"  id="pinfirmaeliminarlic" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmareliminarlic /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="cancelafirmaeliminarlic" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="firmareliminarlic" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                     </div> 
                     <div class="span3 hidden-phone" >
                     </div>
                    <div class="span1 " >
                        <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('firmaDigital')" style="max-width:35px;" class="ayuda">
                    </div>
                 </div> 
            </form> 
        </div>   
     </div>              
</div>*}
{include file="avisos/firmaDigital.tpl"} 
<script> 
  
//---------------------------------para los botones----------------------------------
$("#cancelareliminarlic{$id}").kendoButton();
var cancelareliminarlic{$id} = $("#cancelareliminarlic{$id}").data("kendoButton");
cancelareliminarlic{$id}.bind("click", function(e){ 
    remover(tabStrip.select());
}); 
$("#eliminarlic{$id}").kendoButton();
var eliminarlic{$id} = $("#eliminarlic{$id}").data("kendoButton");
eliminarlic{$id}.bind("click", function(e){  
    /*cambiar('eliminarausenciaasistenteview','firmaeliminarausenciaasistenteview');
    generarPin('{$id_empresa}','{$id_persona}','13');   */
    
    cambiar('eliminarausenciaasistenteview{$id}','firmadigital{$id}');
    generarPin('{$id_empresa}','{$id_persona}','13');   
    cambiarRedaccionFirma{$id}(13,'de Eliminaci&oacute;n de Permisos','elimino el permiso/licencia del funcionario/a  {$ausenciaasistente->persona->nombres} {$ausenciaasistente->persona->paterno} {$ausenciaasistente->persona->materno}'); 
 
}); 

//---------------para la firma----------------------------------------------
/*
  ocultar('firmaeliminarausenciaasistenteview');
$("#cancelafirmaeliminarlic").kendoButton();
$("#firmareliminarlic").kendoButton();
var cancelarfirmaeliminarlic = $("#cancelafirmaeliminarlic").data("kendoButton");
var firmareliminarlic = $("#firmareliminarlic").data("kendoButton");
cancelarfirmaeliminarlic.bind("click", function(e){  
    cambiar('firmaeliminarausenciaasistenteview','eliminarausenciaasistenteview');
    borrarPin('{$nombre}');
});
firmareliminarlic.bind("click", function(e){  
    if(formfirmaeliminarlic.validate())
    {
        $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=admAdministrativa&tarea=eliminarPermiso&idausenciaasistente={$ausenciaasistente->id_ausencia_asistente}',
        success: function (data) {
                var respuesta = eval('('+data+')');
                if(respuesta[0].suceso=='0')
                {
                    firmarPin('Permisos y Licencias','admAdministrativa','permisos','{$nombre}',respuesta[0].id_ausencia);
                } 
                else
                {
                    alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                }
            }
        });
    }   
});     
//----------esto es para la valicdacion del pin*****************************************
var swfirmareliminarlic=2;        
var firmaeliminarliccache='';
var formfirmaeliminarlic = $("#formfirmaeliminarlic").kendoValidator({
   rules:{ 
       firmareliminarlic: function(input) { 
         var validate = input.data('firmareliminarlic');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmaeliminarliccache !== $("#pinfirmaeliminarlic").val()) 
                {
                    verificarPinEliminarlic($("#pinfirmaeliminarlic").val());                    
                    return false;
                }
                if(swfirmaeliminarlic==1)
                {
                    return true;
                }
                if(swfirmaeliminarlic==0)
                {  
                    return false;
                }  
                return false;
            }

           return true;
       }
   },
   messages:{
        firmareliminarlic: function(input) { 
            if(swfirmaeliminarlic==0)
            {  
              return 'El Pin no es Correcto';
            }
            else
            {    
              return 'Revisando..';
            }
         }
   }
   }).data("kendoValidator");
   function verificarPinEliminarlic(pin_insertado)
    {
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
            success: function (data) {    
                swfirmaeliminarlic=data;
               firmaeliminarliccache=$("#pinfirmaeliminarlic").val();
               formfirmaeliminarlic.validateInput($("#pinfirmaeliminarlic"));
             }
        }); 
    }*/
</script>
        
                
       