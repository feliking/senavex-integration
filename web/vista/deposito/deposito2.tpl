<div class="row-fluid fadein"  id="asignacionruex" >
    <div class="k-block">
        <div class="k-header">
            <div class="titulonegro">Asignaci&oacute;n de RUEX</div> 
        </div>   
        <div class="k-cuerpo">                
                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        Razon Social:
                    </div>     
                    <div class="span4 campo" >
                        {$empresa_temporal->razon_social} 
                    </div>  
                    <div class="span2 parametro" >
                        Nombre Comercial:
                    </div>     
                    <div class="span4 campo" >
                        {$empresa_temporal->nombre_comercial} 
                    </div>
                </div>
                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        Nit:
                    </div>     
                    <div class="span4 campo" >
                        {$empresa_temporal->nit}
                    </div> 
                    <div class="span2 parametro" >
                        Nro. FundaEmpresa:
                    </div>     
                    <div class="span4 campo" >
                       {$empresa_temporal->matricula_fundempresa}
                    </div> 
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                       Ruex:
                    </div>     
                    <div class="span2 campo" >
                        BO{$empresa_temporal->ruex}
                    </div>  
                    <div class="span2 parametro" >
                        Vigencia:
                    </div>     
                    <div class="span2 campo" >
                       {$empresa_temporal->vigencia}                   
                    </div> 
                    <div class="span2 parametro" >
                        Fecha Vigencia:
                    </div>     
                    <div class="span2 campo" >
                      {$empresa_temporal->fecha_renovacion_ruex}
                    </div> 
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                       Categoria:
                    </div>     
                    <div class="span2 campo" >
                         {$empresa_temporal->idcategoria_empresa}
                    </div>  
                    <div class="span2 parametro" >
                        Tipo de Empresa:
                    </div>     
                    <div class="span2 campo" >
                       {$empresa_temporal->idtipo_empresa}                   
                    </div> 
                    <div class="span2 parametro" >
                        Actividad Economica:
                    </div>     
                    <div class="span2 campo" >
                      {$empresa_temporal->idactividad_economica}
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                        <b>Ciudad:</b>
                    </div>     
                    <div class="span2 campo" >
                        {$empresa_temporal->ciudad}
                    </div>
                    <div class="span2 parametro" >
                       <b> Numero de Contacto:</b>
                    </div>     
                    <div class="span2 campo" >
                       {$empresa_temporal->numero_contacto}
                    </div> 
                    <div class="span2 parametro" >
                        <b> Fax:</b>
                    </div>     
                    <div class="span2 campo" >
                        {$empresa_temporal->fax}
                    </div>                       
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                        <b>Departamento:</b>
                    </div>     
                    <div class="span4 campo" >
                      {$empresa_temporal->iddepartamento_procedencia}
                    </div>
                    <div class="span2 parametro" >
                        <b>Direccion:</b>
                    </div>     
                    <div class="span4 campo" >
                       {$empresa_temporal->direccion}
                    </div>
                     
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                        <b>Email:</b>
                    </div>     
                    <div class="span4 campo" >
                        {$empresa_temporal->email}
                    </div>  
                    {if $empresa_temporal->email_secundario}
                        <div class="span2 parametro" >
                           <b> Email Secundario:</b>
                        </div>     
                        <div class="span4 campo" >
                           {$empresa_temporal->email_secundario}
                        </div>  
                    {/if}
                </div>
                {if $empresa_temporal->pagina_web}
                    <div class="row-fluid  form" >
                        <div class="span2 parametro" >
                          <b>Pagina:</b>
                        </div>     
                        <div class="span10 campo" >
                            {$empresa_temporal->pagina_web}
                        </div>  
                    </div>
                {/if}                
                
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>                                 
                {if $empresa_temporal->norma_creacion_empresa_publica}
                <div class="row-fluid  form" >
                    <div class="span3 parametro" >
                        <b>Norma de creación de Empresa Publica:</b>
                    </div>     
                    <div class="span9 campo" >
                        {$empresa_temporal->norma_creacion_empresa_publica}
                    </div>  
                </div>
                {/if}                          
                {if $empresa_temporal->testimonio_constitucion}
                <div class="row-fluid  form" >
                    <div class="span3 parametro " >
                        <b>Testimonio de Constitución:</b>
                    </div>     
                    <div class="span9 campo" >
                        {$empresa_temporal->testimonio_constitucion}
                    </div>  
                </div>
                {/if}                
                <div class="row-fluid  form" >
                    <div class="span3 parametro" >
                        <b>Rubro de Exportaciones:</b>
                    </div>     
                    <div class="span9 campo" >
                       {$empresa_temporal->idrubro_exportaciones}
                    </div>  
                </div>
                {if $empresa_temporal->nim}
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            <b>Numero de Identificación Minera:</b>
                        </div>     
                        <div class="span9 campo" >
                            {$empresa_temporal->nim}
                        </div>  
                    </div>
                {/if}  
                {if $empresa_temporal->menor_cuantia=="1"}
                    <div class="row-fluid  form" >
                        <div class="span12" >
                           Empresa registrada de Menor cuantia.
                        </div>  
                    </div>
                {/if}
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>   
                <div class="row-fluid  form" >
                        <div class="span3" >
                        </div>
                        <div class="span3" >
                        <input id="rechazarruex" type="button" value="Rechazar" class="k-primary" style="width:100%"/> <br><br>
                        </div>
                        <div class="span3" >
                        <input id="asignarruex" type="button"  value="Validar Ruex" class="k-primary" style="width:100%"/> 
                        </div>
                        <div class="span3" >
                        </div>
                </div>
        </div>
    </div>    
</div>
<div class="row-fluid fadein"  id="firmaasistenteruex" >
       <div class="k-block fadein">
                <div class="k-header">
                    <div class="k-header"><div class="titulo">Firma Digital de Asignación de RUEX</div></div>
                </div>
                <div class="k-cuerpo"> 
                    <div class="row-fluid  form" >
                        <div class="span1" > </div>
                        <div class="span10" >
                            <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico que la empresa <span class="letrarelevante">"{$empresa_temporal->razon_social}"</span> 
                                con <span class="letrarelevante">RUEX: BO{$empresa_temporal->ruex}</span> cumple con los requisitos impuestos por el SENAVEX.</p> 
                            <p> Por consiguiente doy consentimiento para la ratificación de su Registro Unico de Exportación.</p> 
                            
                        </div>  
                        <div class="span1" ></div>
                    </div> 
                    <form name="formfirmaruex" id="formfirmaruex" method="post"  action="index.php" >
                        <input type="hidden" name="opcion" id="opcion" value="admEmpresa" />
                        <input type="hidden" name="tarea" id="tarea" value="ruexfirmado" />
                        <div class="row-fluid  form" >
                            <div class="span5" ></div>
                            <div class="span2" >
                                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                               class="k-textbox " placeholder="Pin" name="pinfirmaruex"  id="pinfirmaruex" maxlength="4" size="4" style="width:50px;"
                               required data-required-msg="Por favor ingrese su Pin." data-firmarruex /> 
                            </div>  
                            <div class="span5" ></div>
                        </div>  
                        <div class="row-fluid  form" >
                            <div class="span4 hidden-phone" >
                             </div>
                             <div class="span2 " >
                                 <input id="cancelafirmaruex" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                             </div> 
                             <div class="span2 " >
                                 <input id="firmarruex" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                             </div> 
                             <div class="span4 hidden-phone" >
                             </div>
                         </div> 
                    </form> 
                </div>   
      </div>              
</div>
<script>    
    ocultar('firmaasistenteruex');
    $("#rechazarruex").kendoButton();
    $("#asignarruex").kendoButton();
    var rechazarruex = $("#rechazarruex").data("kendoButton");
    var asignarruex = $("#asignarruex").data("kendoButton");
    rechazarruex.bind("click", function(e){             
        cerraractualizartab('Admisión','admEmpresa','empresasadmitidas');
    }); 
    asignarruex .bind("click", function(e){   
        cambiar('asignacionruex','firmaasistenteruex');
        $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=admEmpresa&tarea=asignarRuexEmpresa&'+$('#formfirmaruex').serialize() ,
                success: function (data) {
                   cerraractualizartab('PRUEBA','admDeposito','prueba');
                        
                   
                 }
            });
        //generarPin('{$id_empresa}','{$id_persona}','1');   
    });     
    $("#cancelafirmaruex").kendoButton();
    $("#firmarruex").kendoButton();
    var cancelarfirmaruex = $("#cancelafirmaruex").data("kendoButton");
    var firmarruex = $("#firmarruex").data("kendoButton");
    cancelarfirmaruex.bind("click", function(e){             
        cambiar('firmaasistenteruex','asignacionruex');
        borrarPin('{$nombre}');
    });
    firmarruex.bind("click", function(e){  
        if(formfirmaruex.validate())
       { 
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=admEmpresa&tarea=asignarRuexEmpresa' ,
                success: function (data) {
                    var respuesta = eval('('+data+')');
                    if(respuesta[0].suceso=='1')
                    {
                        //firmarPin('Admisión','admEmpresa','empresasadmitidas','{$nombre}');
                        //activar las notificaciones y el anuncio
                        mostrar('notificacionadmisiones');
                        if(respuesta[0].admisiones=='0')
                        {
                            ocultar('notificacionadmisiones');
                        }
                        else
                        {
                            $("#notificacionadmisiones").html(respuesta[0].admisiones);
                        }
                    } 
                    else
                    {
                        alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                    }
                 }
            });
           
       }
    });    
    /*-----------esto es para la valicdacion del pin*****************************************/
    var swfirmaruex=2;        
    var firmaruexcache='';
    var formfirmaruex = $("#formfirmaruex").kendoValidator({
       rules:{ 
           firmarruex: function(input) { 
             var validate = input.data('firmarruex');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    if (firmaruexcache !== $("#pinfirmaruex").val()) 
                     {
                    verificarPinRuex($("#pinfirmaruex").val());                    
                    return false;
                    }
                    if(swfirmaruex==1)
                    {
                         return true;
                    }
                    if(swfirmaruex==0)
                    {  
                        return false;
                    }  
                    return false;
                }
               
               return true;
           }
       },
       messages:{
            firmarruex: function(input) { 
                if(swfirmaruex==0)
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
       function verificarPinRuex(pin_insertado)
        {
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
                success: function (data) {    
                    swfirmaruex=data;
                   firmaruexcache=$("#pinfirmaruex").val();
                   formfirmaruex.validateInput($("#pinfirmaruex"));
                 }
            }); 
        }
</script>
