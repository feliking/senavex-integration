<div class="row-fluid "  id="editarpersona" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="row-fluid  form" >
                <div class="span12" >
                    <div class="titulonegro" > Datos de la Persona</div>  
                </div>                                      
            </div>  
        </div>
        <div class="k-cuerpo" id="divpersona{$persona->id_persona}">
            <div class="row-fluid " >
                <div class="span1 " >
                    <img  src="styles/img/personal/{$persona->id_persona}.{$persona->formato_imagen}" class="imgpersonaalta" id="imgpersonaconf" onError='this.onerror=null;imgendefectopersona(this);'/>
                </div>
                <div class="span11" > 
                    <div class="row-fluid " >
                        <div class="span2 parametro" >
                            Nombre:
                        </div> 
                        <div class="span5 campo" >
                            {$persona->nombres} {$persona->paterno} {$persona->materno}
                        </div> 
                        <div class="span2 parametro" >
                            {$persona->id_tipo_documento}:
                        </div> 
                        <div class="span3 campo" >
                            {$persona->numero_documento}  {$expedido}
                        </div> 
                    </div>          
                    <div class="row-fluid " >
                        <div class="span2 parametro" >
                            Nacionalidad:
                        </div> 
                        <div class="span2 campo" >
                            {$nacionalidad} 
                        </div> 
                        <!--div class="span1 parametro" >
                            Ciudad:
                        </div> 
                        <div class="span2 campo" >
                            {$persona->ciudad} 
                        </div> 
                        <div class="span1 parametro" >
                           Direcci&oacute;n:
                        </div> 
                        <div class="span4 campo" >
                             {$persona->direccion}
                        </div-->
                    </div>   
                    <div class="row-fluid " >
                        <div class="span2 parametro" >
                            Correo Electr&oacute;nico:
                        </div> 
                        <div class="span3 campo" >
                            {$persona->email} 
                        </div> 
                        <!--div class="span2 parametro" >
                            Numero de Contacto:
                        </div> 
                        <div class="span2 campo" >
                            {$persona->numero_contacto} 
                        </div--> 
                         <div class="span1 parametro" >
                           Genero:
                        </div> 
                        <div class="span2 campo" >
                             {if $persona->genero==1}Masculino{else}Femenino{/if} 
                        </div>
                    </div>
                    <div class="row-fluid " >
                        {assign var="ds_id" value=$persona->direccion}
                        {include file="admDireccion/Direccion_Show.tpl" }
                    </div>
                </div>                
            </div>
        {if $firmas}
            <div class="row-fluid form" >
                <div class="barra" ></div> 
            </div> 
            <div class="row-fluid form" >
                <div class="span12 " >
                    {foreach $firmas as $firma} 
                        <div class="contentfirma" id="fotofirma{$firma->id_firma}">
                            <img  src="styles/img/firmas/{$firma->id_firma}.png"  class="imgfirma "/>
                            <span class="firmamodal" onclick="eliminarFirma('{$firma->id_firma}');">
                                <span class="firmaeliminar">
                                    Eliminar
                                </span>
                            </span>
                            <span class="firmafecha">
                                FIRMA: {$firma->fecha}
                            </span>
                        </div>
                    {/foreach} 
                </div> 
            </div> 
        {else}
            <div class="row-fluid form" >
                <div class="barra" ></div> 
            </div> 
            <div class="row-fluid form" >
                <div class="span12 " >
                    <center>
                        <span class='terminos letrarelevante' id='guardarfirmaspan' onclick="cerraractualizartab('Guardar Firma','admPersona','guardarFirma&id_persona={$persona->id_persona}')" >
                            Guardar firma.
                        </span>
                        <script>
                            var box1 = document.getElementById('guardarfirmaspan')
                             box1.addEventListener('touchend', function(e){
                                anadir('Guardar Firma','admPersona','guardarFirma&id_persona={$persona->id_persona}')
                            }, false)
                        </script>   
                    </center>
                </div> 
            </div> 
           
        {/if} 
        
        {if $persona->firma==1 && $solicitarfirma}
            <div class="row-fluid fadein" id="divsolicitarfirma{$persona->id_persona}">
                <div class="span5" ></div>
                <div class="span2" >
                    <input id="solicitarfirma{$persona->id_persona}" type="button"  value="Solicitar Firma" class="k-primary" style="width:100%"/>
                </div>
                <div class="span5" ></div>
            </div> 
        {/if}
        </div>
        <div class="k-cuerpo" id="divconfirmacion{$persona->id_persona}">
            <div class="row-fluid " >
                <div class="span12 form" >
                    Esta seguro de eliminar la firma de "{$persona->nombres} {$persona->paterno} {$persona->materno}". Si el usuario se queda sin firmas la plataforma le solcitara una.
                </div>                
            </div>
            <div class="row-fluid fadein" >
                <div class="span4" ></div>
                <div class="span2" >
                    <input id="cancelarelimfirma{$persona->id_persona}" type="button"  value="Cancelar" class="k-primary" style="width:100%"/>
                </div>
                <div class="span2" >
                    <input id="eliminarfirma{$persona->id_persona}" type="button"  value="Eliminar" class="k-primary" style="width:100%"/>
                </div>
                <div class="span4" ></div>
            </div> 
        </div>
        <div class="k-cuerpo" id="divaceptareliminacion{$persona->id_persona}">
            <div class="row-fluid " >
                <div class="span12 form" >
                    <span id="respfirma{$persona->id_persona}"></span>
                </div>                
            </div>
            <div class="row-fluid fadein" >
                <div class="span5" ></div>
                <div class="span2" >
                    <input id="aceptremsig{$persona->id_persona}" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
                </div>
                <div class="span5" ></div>
            </div> 
        </div>
    </div>    
</div>  
<script> 
ocultar('divconfirmacion{$persona->id_persona}');
var firmaeliminar;
function eliminarFirma(id_firma)
{
   cambiar('divpersona{$persona->id_persona}','divconfirmacion{$persona->id_persona}');  
   firmaeliminar=id_firma;
}
$("#cancelarelimfirma{$persona->id_persona}").kendoButton();
var cancelarelimfirma{$persona->id_persona} = $("#cancelarelimfirma{$persona->id_persona}").data("kendoButton");
cancelarelimfirma{$persona->id_persona}.bind("click", function(e){
    cambiar('divconfirmacion{$persona->id_persona}','divpersona{$persona->id_persona}');
});
$("#eliminarfirma{$persona->id_persona}").kendoButton();
var eliminarfirma{$persona->id_persona} = $("#eliminarfirma{$persona->id_persona}").data("kendoButton");
eliminarfirma{$persona->id_persona}.bind("click", function(e){
    $.ajax( {
        url: 'index.php',
        type: 'post',
        data:'opcion=admPersona&tarea=eliminarFirma&id_firma='+firmaeliminar,
        success: function (data) { 
            var respuesta = eval('('+data+')');
            if(respuesta[0].suceso=='0') ocultar('fotofirma'+firmaeliminar);
            else  firmaeliminar=null;
            $('#respfirma{$persona->id_persona}').html(respuesta[0].msg);
            cambiar('divconfirmacion{$persona->id_persona}','divaceptareliminacion{$persona->id_persona}');
        }
    });
});
//---------------for accept elimination-------------------------------
ocultar('divaceptareliminacion{$persona->id_persona}');
$("#aceptremsig{$persona->id_persona}").kendoButton();
var aceptremsig{$persona->id_persona} = $("#aceptremsig{$persona->id_persona}").data("kendoButton");
aceptremsig{$persona->id_persona}.bind("click", function(e){
    if (firmaeliminar==null)
    {
        remover(tabStrip.select());
    }
    else
    {
        cambiar('divaceptareliminacion{$persona->id_persona}','divpersona{$persona->id_persona}');
    }
    
});
{if $persona->firma==1}
//--------------para solicitar firma---------------
$("#solicitarfirma{$persona->id_persona}").kendoButton();
var solicitarfirma{$persona->id_persona} = $("#solicitarfirma{$persona->id_persona}").data("kendoButton");
solicitarfirma{$persona->id_persona}.bind("click", function(e){
    firmaeliminar=0
    $('#respfirma{$persona->id_persona}').html('Se Envio una solicitud para que el exportador/a "{$persona->nombres} {$persona->paterno} {$persona->materno}" registre una nueva firma.');
    cambiar('divpersona{$persona->id_persona}','divaceptareliminacion{$persona->id_persona}');
    ocultar('divsolicitarfirma{$persona->id_persona}');
    $.ajax( {
        url: 'index.php',
        type: 'post',
        data:'opcion=admPersona&tarea=solicitarFirma&id_persona={$persona->id_persona}',
        success: function (data) {   
        }
    });
});
{/if}
</script> 