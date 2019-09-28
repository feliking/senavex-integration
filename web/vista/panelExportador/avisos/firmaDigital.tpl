
<div class="row-fluid fadein"  id="firmadigital{$id}" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header"><div class="titulo">Confirmación <span id='titulofirmadigital{$id}'></span></div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, <span id='contenidofirmadigital{$id}'></span>

                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmar" id="formfirmar{$id}" method="post"  action="index.php" >
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return validateQty(event);'
                       class="k-textbox " placeholder="Pin" name="pinfirmar"  id="pinfirmar{$id}" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmar /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="cancelafirmar{$id}" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="firmar{$id}" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
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
</div>
<div class="row-fluid "  id="firmaloading{$id}" >
    <div class="row-fluid  form" >
        <div class="span12 hidden-phone" >
            <img id="" src="styles/img/logo_intro.png"  >
        </div>
    </div> 
    <div class="row-fluid  form" >
        <div class="span3" > </div>
        <div class="span6" >
            <p> Espere un momento por favor.....
            </p> 
        </div>  
        <div class="span3" ></div>
    </div> 
    <div class="row-fluid  form" >
        <div class="row-fluid" >
            <div class="span3"> 
           </div>
           <div class="span6" > 
               <div id="progressBarf{$id}" style="width:100%;height: 8px;"></div>
           </div>
            <div class="span3" > 
           </div>
       </div>
    </div> 
</div> 
<div class="row-fluid "  id="firmaerror{$id}" >
    <div class="k-block fadein">
        <div class="k-header">
                <div class="k-header"><div class="titulo">Aviso</div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >

                    <div class="span1" > </div>
                    <div class="span10" >
                        <p> No se pudo completar la acci&oacute;n.
                        </p> 
                    </div>  
                    <div class="span1" ></div>
            </div> 
            <div class="row-fluid  form" >
                    <div class="span5 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="aceptarerror{$id}" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
                     </div> 
                     <div class="span5 hidden-phone" >
                     </div>
            </div> 
        </div>   
    </div>
</div>   
<script>  
ocultar('firmadigital{$id}');
ocultar('firmaloading{$id}');
ocultar('firmaerror{$id}');
 //------para la firma---------------------------
$("#cancelafirmar{$id}").kendoButton();
$("#firmar{$id}").kendoButton();
var cancelarfirmar{$id}= $("#cancelafirmar{$id}").data("kendoButton");
var firmar{$id} = $("#firmar{$id}").data("kendoButton");
cancelarfirmar{$id}.bind("click", function(e){        
    switch(swfirma) {
        case 13:
            cambiar('firmadigital{$id}','eliminarausenciaasistenteview{$id}');
        break;
        case 12:
            cambiar('firmadigital{$id}','registroausencia');
        break;
        case 11:
            cambiar('firmadigital{$id}','empresarestriccion{$id}');
        break;
        case 10:
            cambiar('firmadigital{$id}','empresarestriccion{$id}');
        break;
        case 26:
            cambiar('firmadigital{$id}','registrofacturaed{$id}');
        break;
        case 25:
            cambiar('firmadigital{$id}','registrofacturaend{$id}');
        break;
        case 24:
            cambiar('firmadigital{$id}','registrofactura');
        break;
        case 19:
            cambiar('firmadigital{$id}','registrofacturaend{$id}');
        break;
        case 6:
            cambiar('firmadigital{$id}','registrofactura');
        break;
        case 1:  
            cambiar('firmadigital{$id}','asignacionruex{$id}');
           break;
       case 20:
            cambiar('firmadigital{$id}','asignacionruex{$id}');
           break;
        case 17:  
             cambiar('firmadigital{$id}','revisarempresatemporal{$id}');
            break;
        case 21:  
             cambiar('firmadigital{$id}','revisarempresatemporal{$id}');
            break;
        case 22:
            cambiar('firmadigital{$id}','revisarempresatemporal{$id}');
        break;
        case 2:
             cambiar('firmadigital{$id}','revisarempresatemporal{$id}');
        break;
        case 23:
             cambiar('firmadigital{$id}','revisarempresatemporalaprobaciondatos{$id}');
        break;
        case 3:
              cambiar('firmadigital{$id}','revisarempresatemporalaprobaciondatos{$id}');
        break;
        default:
            break;
    }
    borrarPin('{$nombre}');
});

firmar{$id}.bind("click", function(e){  
    
    if(formfirmar{$id}.validate())
    { 
        firmar{$id}.enable(false);
        cambiar('firmadigital{$id}','firmaloading{$id}');
        var swdevueltaajaxf=2;
        var pbf = $("#progressBarf{$id}").data("kendoProgressBar");
        pbf.value(0);
        var intervalf = setInterval(function () {
            if (pbf.value() < 100) {
                if(swdevueltaajaxf==1)
                {
                    swdevueltaajaxf=2;
                    pbf.value(pbf.value() + 1);
                     clearInterval(intervalf);
                }
                if(swdevueltaajax==0)
                {
                    clearInterval(intervalf);
                    cambiar('loading{$id}','firmaerror{$id}');
                }
                if(pbf.value()==99)
                {
                    if(swdevueltaajaxf==1)//devolvio ajax ok
                    {
                        swdevueltaajaxf=2;
                         pbf.value(pbf.value() + 1);
                    }
                    if(swdevueltaajaxf==0)//devolvio ajax mal
                    {
                        clearInterval(intervalf);
                        cambiar('loading{$id}','firmaerror{$id}');
                    }
                }
                else
                {
                    pbf.value(pbf.value() + 1);
                }
            } 
            else
            {
                clearInterval(intervalf);
            }
        }, 80); 
        
        switch(swfirma) {
            {if $ausenciaasistente->id_ausencia_asistente}
            case 13://eliminar permisos
                $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=admAdministrativa&tarea=eliminarPermiso&idausenciaasistente={$ausenciaasistente->id_ausencia_asistente}',
                success: function (data) {
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                            firmarPin('Permisos y Licencias','admAdministrativa','permisos','{$nombre}',respuesta[0].id_ausencia);
                        } 
                        else
                        {
                            swdevueltaajax=0;
                            alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                        }
                    }
                });
            break;
            {/if}
            case 12://permisos funcionario
                 $.ajax({             
                type: 'post',
                url: 'index.php',
                data: $('#ausenciaform').serialize()+'&idpersonafirma={$id_persona}',
                success: function (data) {
                //alert(data);
                    var respuesta = eval('('+data+')');
                    if(respuesta[0].suceso=='0')
                    {
                        swdevueltaajax=1;
                        firmarPin('Permisos y Licencias','admAdministrativa','permisos','{$nombre}',respuesta[0].id_ausencia);
                    } 
                    else
                    {
                         swdevueltaajax=0;
                        alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                    }
                }
                });
            break;
            {if isset($empresa->id_empresa)}
            case 10://bloquear una empresa
                $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEstadoEmpresas&tarea=bloquearEmpresa&id_empresa='+{$empresa->id_empresa}+'&id_persona='+{$id_persona}+'&camposmotivo='+$("#camposmotivo{$id}").val(),
                    success: function (data) { 
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='1')
                        {
                            swdevueltaajax=1;
                            firmarPin('Empresas','admEstadoEmpresas','estadoEmpresas','{$nombre}',respuesta[0].id_bloqueo);                   
                        } 
                        else
                        {
                            swdevueltaajax=0;
                            alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                        }
                     }
                });
            break;
            case 11://desbloquear una empresa
                $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEstadoEmpresas&tarea=desbloquearEmpresa&id_empresa='+{$empresa->id_empresa}+'&id_persona='+{$id_persona}+'&camposmotivo='+$("#camposmotivo{$id}").val(),
                    success: function (data) { 
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='1')
                        {
                            swdevueltaajax=1;
                            firmarPin('Empresas','admEstadoEmpresas','estadoEmpresas','{$nombre}',respuesta[0].id_bloqueo);                   
                        } 
                        else
                        {
                            swdevueltaajax=0;
                            alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                        }
                     }
                });
            break;
            {/if}
            {if isset($factura->id_factura)}
            case 26://editar facturas dosificas
                guardainsumosed{$id}();//en datosinsumosfactura
                $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admFactura&tarea=editarFacturaDosificada&'+$("#facturaformed{$id}").serialize()+'&'+datosinsumosfacturaed{$id}+'&totalproductos='+totalproductosed{$id}+'&totalincoterm='+totalincotermed{$id}, 
                    success: function (data) {
                       // alert(data);
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                            firmarPin('Mis Facturas','admFactura','verFacturas','{$nombre}','d{$factura->id_factura}');
                             if(verificarsiexiste('Inventario'))
                            {
                                $("#inventario").data('kendoGrid').dataSource.read();
                                $("#inventario").data('kendoGrid').refresh();
                            }
                            if(verificarsiexiste('Mis Facturas'))
                            {
                                $("#misfacturas").data('kendoGrid').dataSource.read();
                                $("#misfacturas").data('kendoGrid').refresh();
                            }
                        }
                        else
                        { 
                            swdevueltaajax=0;
                           alert('No se guardo correctamente, verifique su conexión a internet');
                        }
                    }
                });
            break;
            {/if}
            {if isset($factura->id_factura_no_dosificada)}
            case 25://editar facturas no dosificadas
                guardainsumosend{$id}();//en datosinsumosfactura
                $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admFactura&tarea=editarFacturaNoDosificada&'+$("#facturaformend{$id}").serialize()+'&'+datosinsumosfacturaend{$id}+'&totalproductosend='+totalproductosend{$id}+'&facturasRelacionadas='+getFacturaAdmitidaend{$id}(), 
                    success: function (data) {
                       // alert(data);
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                            firmarPin('Mis Facturas','admFactura','verFacturas','{$nombre}','d{$factura->id_factura_no_dosificada}');
                            if(verificarsiexiste('Inventario'))
                            {
                                $("#inventario").data('kendoGrid').dataSource.read();
                                $("#inventario").data('kendoGrid').refresh();
                            }
                            if(verificarsiexiste('Mis Facturas'))
                            {
                                $("#misfacturas").data('kendoGrid').dataSource.read();
                                $("#misfacturas").data('kendoGrid').refresh();
                            }

                        }
                        else
                        { 
                            swdevueltaajax=0;
                           alert('No se guardo correctamente, verifique su conexión a internet');
                        }
                    }
                });
            break;
            {/if}
    
            case 24:// guardar facturas
                        //aquise manda toda la informacion al servidor para guardar
               guardainsumos();//en datosinsumosfactura
               $.ajax({             
                   type: 'post',
                   url: 'index.php',
                   data: 'opcion=admFactura&tarea=guardarFactura&'+$("#facturaform").serialize()+'&totalproductos='+totalproductos+'&totalincoterm='+totalincoterm+'&'+datosinsumosfactura+'&facturasRelacionadas='+getFacturaAdmitida(),
                   success: function (data) {
                       var respuesta = eval('('+data+')');
                       if(respuesta[0].suceso=='0')
                       {
                           swdevueltaajax=1;
                           firmarPin('Mis Facturas','admFactura','verFacturas','{$nombre}',respuesta[0].id_factura);
                           if(verificarsiexiste('Inventario'))
                           {
                               $("#inventario").data('kendoGrid').dataSource.read();
                               $("#inventario").data('kendoGrid').refresh();
                           }
                           if(verificarsiexiste('Mis Facturas'))
                           {
                               $("#misfacturas").data('kendoGrid').dataSource.read();
                               $("#misfacturas").data('kendoGrid').refresh();
                           }
                       }
                       else
                       { 
                           swdevueltaajax=0;
                          alert('No se guardo correctamente, verifique su conexión a internet');
                       }
                   }
               });
            break;
            {if isset($factura->id_factura_no_dosificada)}
            case 19://editar facura dosificada de menor cuantia
                guardainsumosend{$id}();//en datosinsumosfactura
                $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admFactura&tarea=editarFacturaNoDosificadaMenorcuantia&'+$("#facturaformend{$id}").serialize()+'&'+datosinsumosfacturaend{$id}+'&totalproductosend='+totalproductosend{$id}, 
                    success: function (data) {
                       // alert(data);
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                            firmarPin('Mis Facturas','admFactura','verFacturas','{$nombre}','d{$factura->id_factura_no_dosificada}');
                            if(verificarsiexiste('Inventario'))
                            {
                                $("#inventario").data('kendoGrid').dataSource.read();
                                $("#inventario").data('kendoGrid').refresh();
                            }
                            if(verificarsiexiste('Mis Facturas'))
                            {
                                $("#misfacturas").data('kendoGrid').dataSource.read();
                                $("#misfacturas").data('kendoGrid').refresh();
                            }

                        }
                        else
                        { 
                            swdevueltaajax=0;
                           alert('No se guardo correctamente, verifique su conexión a internet');
                        }
                    }
                });
            break;
            {/if}
            case 6://guardar factura no dosificada de menor cuantia
            guardainsumos();//en datosinsumosfactura
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=admFactura&tarea=guardarFactura&'+$("#facturaform").serialize()+'&total='+total+'&totalproductos='+totalproductos+'&totalincoterm='+totalincoterm+'&'+datosinsumosfactura,
                success: function (data) {
                    var respuesta = eval('('+data+')');
                    if(respuesta[0].suceso=='0')
                    {
                        swdevueltaajax=1;
                        firmarPin('Mis Facturas','admFactura','verFacturas','{$nombre}',respuesta[0].id_factura);
                    }
                    else
                    { swdevueltaajax=0;
                        alert('No se guardo correctamente, verifique su conexión a internet');
                    }
                }
            });
            break;
            {if $empresa_temporal->id_empresa} 
            case 1://validar ruex
                //alert({$empresa_temporal->id_empresa});
               
                $.ajax({             
                  type: 'post',
                  url: 'index.php',
                  data: 'opcion=admEmpresa&tarea=asignarRuexEmpresa&id_empresa='+{$empresa_temporal->id_empresa}+'&fecha_ini={$fecha_ini}'+'&chk-vigencia='+chk_vigencia ,
                  success: function (data) { //alert(data);
                      var respuesta = eval('('+data+')');
                      if(respuesta[0].suceso=='1')
                      {
                          swdevueltaajax=1;
                          firmarPin('Admisión','admEmpresa','empresasadmitidas','{$nombre}',respuesta[0].id_empresa_relevancia);
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
                          //-----------------enviamos correos------------------

                          $.ajax({             
                          type: 'post',
                          url: 'index.php',
                          data: 'opcion=admCorreo&tarea=empresaRuex&id_empresa='+ {$empresa_temporal->id_empresa},
                          success: function (data) { 
                              } 
                          });
                      } 
                      else
                      {
                         swdevueltaajax=0;
                          alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                      }
                   }
              });
            break;     
            case 20://erchazar validacion
                  $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEmpresa&tarea=observacionesValidacion&observacion='+encodeURIComponent(editorr{$id}.value())+'&id_empresa='+{$empresa_temporal->id_empresa}+'&fecha_ini={$fecha_ini}',
                    success: function (data) {
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                            //activar las notificaciones y el anuncio
                            firmarPin('Admisión','admEmpresa','empresasadmitidas','{$nombre}',respuesta[0].id_empresa_relevancia);
                            mostrar('notificacionregistros');
                            mostrar('notificacionadmisiones');
                            if(respuesta[0].registros=='0')
                            {
                                ocultar('notificacionregistros');
                                $("#mensajebienvenidacatualizar").html('No tienes registros de empresa por revisar.');
                            }
                            else
                            {
                                $("#notificacionregistros").html(respuesta[0].registros);
                                if(respuesta[0].registros=='1') $("#mensajebienvenidacatualizar").html('Tienes<em class="cajaterminosaviso"><span class="terminosaviso">1</span></em>registro de empresa por revisar.');
                                else  $("#mensajebienvenidacatualizar").html('Tienes<em class="cajaterminosaviso"><span class="terminosaviso">'+respuesta[0].registros+'</span></em>registro de empresa por revisar.');
                            }
                            if(respuesta[0].admisiones=='0') ocultar('notificacionadmisiones');
                            else $("#notificacionadmisiones").html(respuesta[0].admisiones);                  
                        }
                        else swdevueltaajax=0;
                          //-----------------enviamos correos------------------
                            $.ajax({             
                            type: 'post',
                            url: 'index.php',
                            data: 'opcion=admCorreo&tarea=empresaAdmitidaRechazada&id_empresa='+ {$empresa_temporal->id_empresa},
                            success: function (data) { 

                                } 
                            });
                    }
                });  
            break;
            {/if}
            {if $empresa_temporal->id_empresa}
            case 17://admitir empresas
                $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEmpresa&tarea=admision&id_empresa='+ {$empresa_temporal->id_empresa},
                    success: function (data) {  
                        //alert(data);
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                            firmarPin('Registro de Empresas','admEmpresa','revisarempresatemporal','{$nombre}',respuesta[0].idserv);
                            //activar las notificaciones y el anuncio
                            mostrar('notificacionregistros');
                            mostrar('notificacionadmisiones');
                            if(respuesta[0].registros=='0')
                            {
                                ocultar('notificacionregistros');
                                $("#mensajebienvenidacatualizar").html('No tienes registros de empresa por revisar.');
                            }
                            else
                            {
                                $("#notificacionregistros").html(respuesta[0].registros);
                                if(respuesta[0].registros=='1') $("#mensajebienvenidacatualizar").html('Tienes<em class="cajaterminosaviso"><span class="terminosaviso">1</span></em>registro de empresa por revisar.');
                                else  $("#mensajebienvenidacatualizar").html('Tienes<em class="cajaterminosaviso"><span class="terminosaviso">'+respuesta[0].registros+'</span></em>registro de empresa por revisar.');
                            }
                            if(respuesta[0].admisiones=='0') ocultar('notificacionadmisiones');
                            else $("#notificacionadmisiones").html(respuesta[0].admisiones);                  
                        }
                        else swdevueltaajax=0;
                      
                        //-----------------enviamos correos------------------
                        $.ajax({             
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admCorreo&tarea=empresaAdmitida&id_empresa='+ {$empresa_temporal->id_empresa},
                        success: function (data) { 
                            //alert(data);
                            } 
                        });
                    }   
                });
            break;
            case 21://observar admision
                $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEmpresa&tarea=observaciones&observacion='+editor{$id}.value()+'&id_empresa='+{$empresa_temporal->id_empresa},
                    success: function (data) {
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                             swdevueltaajax=1;
                            //activar las notificaciones y el anuncio
                            firmarPin('Registro de Empresas','admEmpresa','revisarempresatemporal','{$nombre}',respuesta[0].idserv);
                            mostrar('notificacionregistros');
                            mostrar('notificacionadmisiones');
                            if(respuesta[0].registros=='0')
                            {
                                ocultar('notificacionregistros');
                                $("#mensajebienvenidacatualizar").html('No tienes registros de empresa por revisar.');
                            }
                            else
                            {
                                $("#notificacionregistros").html(respuesta[0].registros);
                                if(respuesta[0].registros=='1') $("#mensajebienvenidacatualizar").html('Tienes<em class="cajaterminosaviso"><span class="terminosaviso">1</span></em>registro de empresa por revisar.');
                                else  $("#mensajebienvenidacatualizar").html('Tienes<em class="cajaterminosaviso"><span class="terminosaviso">'+respuesta[0].registros+'</span></em>registro de empresa por revisar.');
                            }
                            if(respuesta[0].admisiones=='0') ocultar('notificacionadmisiones');
                            else $("#notificacionadmisiones").html(respuesta[0].admisiones);                  
                        }
                         else swdevueltaajax=0;
                          //-----------------enviamos correos------------------
                            $.ajax({             
                            type: 'post',
                            url: 'index.php',
                            data: 'opcion=admCorreo&tarea=empresaRegistroObservada&observacion='+editor{$id}.value()+'&id_empresa='+ {$empresa_temporal->id_empresa},
                            success: function (data) { 
                                   // alert(data);
                                } 
                            });
                    }
                });
            break;   
            {/if}
            {if $modificacionempresarelevancia->id_modificacion_empresa_relevancia and $empresa->id_empresa}
            case 22://rechazar admision  modificacion
               $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEmpresa&tarea=observacionModificacion&observacion='+editorobservaciones{$id}.value()+'&id_modificacion_empresa_relevancia='+{$modificacionempresarelevancia->id_modificacion_empresa_relevancia},
                    success: function (data) {
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                             firmarPin('Solicitudes de Modificación','admEmpresa','mostrarSolicitudesModificacion','{$nombre}',respuesta[0].id_empresa_relevancia);
                            mostrar('registrosmodificacioncomentario');
                            if(respuesta[0].modificaciones=='0')
                            {
                                ocultar('notificacionmodificacion');
                                ocultar('registrosmodificacioncomentario');
                            }
                            else
                            {
                                $("#notificacionmodificacion").html(respuesta[0].modificaciones);
                                $("#registrosmodificacioncomentarionumero").html(respuesta[0].modificaciones);
                            }
                        } 
                        else
                        {
                            swdevueltaajax=0;
                            alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                        }
                        //-----------------enviamos correos------------------
                        $.ajax({             
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admCorreo&tarea=empresaModificacionObservada&observacion='+editorobservaciones{$id}.value()+'&id_empresa='+ {$empresa->id_empresa},
                        success: function (data) { 
                            } 
                        });
                    }
                });
            break;
            {if $modificaciones}
            case 2://admision de modificacion
                 $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEmpresa&tarea=admitirModificacionEmpresa&id_empresa='+'{$empresa->id_empresa}'+'&id_modificacion_empresa_relevancia='+'{$modificacionempresarelevancia->id_modificacion_empresa_relevancia}',
                    success: function (data) { 
                            //alert(data);
                            var respuesta = eval('('+data+')');
                            if(respuesta[0].suceso=='0')
                            {
                                swdevueltaajax=1;
                                firmarPin('Solicitudes de Modificación','admEmpresa','mostrarSolicitudesModificacion','{$nombre}',respuesta[0].id_empresa_relevancia);
                                //activar las notificaciones y el anuncio
                                mostrar('notificacionmodificacion');
                                mostrar('registrosmodificacioncomentario');
                                if(respuesta[0].modificaciones=='0')
                                {
                                    ocultar('notificacionmodificacion');
                                    ocultar('registrosmodificacioncomentario');
                                }
                                else
                                {
                                    $("#notificacionmodificacion").html(respuesta[0].modificaciones);
                                    if(respuesta[0].modificaciones=='1')
                                    {
                                        $("#registrosmodificacioncomentarionumero").html(respuesta[0].modificaciones);
                                    }
                                    else
                                    {
                                        $("#registrosmodificacioncomentarionumero").html(respuesta[0].modificaciones);
                                    }
                                }
                                if(respuesta[0].admisiones=='0') ocultar('notificacionadmisiones');
                                    else $("#notificacionadmisiones").html(respuesta[0].admisiones);   
                            } 
                            else
                            {
                                swdevueltaajax=0;
                                alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                            }
                            //-----------------enviamos correos------------------
                            $.ajax({             
                            type: 'post',
                            url: 'index.php',
                            data: 'opcion=admCorreo&tarea=empresaAdmitidaModificacion&id_empresa='+ {$empresa->id_empresa}+'&modificaciones='+'{','|implode:$modificaciones}',
                            success: function (data) { /* alert(data);*/
                                } 
                            });
                        }
                    });
            break;
            {/if}
            {/if}
            {if $modificacionempresarelevancia->id_modificacion_empresa_relevancia and $empresa->id_empresa}
            case 23://rechazar validacion modificacion
                 $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEmpresa&tarea=rechazarModificacionRuex&observacion='+editorobservacionesr{$id}.value()+'&id_modificacion_empresa_relevancia='+{$modificacionempresarelevancia->id_modificacion_empresa_relevancia},
                    success: function (data) {
                        //alert(data);
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                             swdevueltaajax=1;
                            firmarPin('Admisión','admEmpresa','empresasadmitidas','{$nombre}',respuesta[0].id_empresa_relevancia);
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
                             swdevueltaajax=0;
                            alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                        }
                        //-----------------enviamos correos------------------
                        $.ajax({             
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admCorreo&tarea=empresaModificacionRechazada&id_empresa='+ {$empresa->id_empresa},
                        success: function (data) { 
                            } 
                        });
                    }
                });
            break;
            case 3:
             $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=admEmpresa&tarea=validarModificacionEmpresa&id_modificacion_empresa_relevancia='+{$modificacionempresarelevancia->id_modificacion_empresa_relevancia},
                success: function (data) { 
                        // aqui se tiene que actualizar los eestados de los logos
                      // alert(data);
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
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
                            firmarPin('Admisión','admEmpresa','empresasadmitidas','{$nombre}','{$modificacionempresarelevancia->id_modificacion_empresa_relevancia}');
                        } 
                        else
                        {  swdevueltaajax=0;
                            alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                        }
                         //-----------------enviamos correos------------------
                        $.ajax({             
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admCorreo&tarea=empresaModificacionExitosa&id_empresa='+ {$empresa->id_empresa},
                        success: function (data) { 
                          //  alert(data)
                            } 
                        });
                    }
                });
            break;
            {/if}    
            default:
                break;
        }
    }
});    
//-----------esto es para la valicdacion del pin-------------------------------------
var swfirmar{$id}=2;        
var firmarcache{$id}='';
var formfirmar{$id}= $("#formfirmar{$id}").kendoValidator({
   rules:{ 
       firmar: function(input) { 
         var validate = input.data('firmar');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmarcache{$id} !== $("#pinfirmar{$id}").val()) 
                 {
                verificarPin{$id}($("#pinfirmar{$id}").val());                    
                return false;
                }
                if(swfirmar{$id}==1)
                {
                     return true;
                }
                if(swfirmar{$id}==0)
                {  
                    return false;
                }  
                return false;
            }

           return true;
       }
   },
   messages:{
        firmar: function(input) { 
            if(swfirmar{$id}==0)
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
function verificarPin{$id}(pin_insertado)
{
    $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
        success: function (data) {    
           swfirmar{$id}=data;
           firmarcache{$id}=$("#pinfirmar{$id}").val();
           formfirmar{$id}.validateInput($("#pinfirmar{$id}"));
        }
    }); 
}
$("#progressBarf{$id}").kendoProgressBar({
    showStatus: false,
    animation: false,
    min: 0,
    max: 100,
    type: "percent",
    complete: function(e) {
      }
});
//-----pal error---------------
$("#aceptarerror{$id}").kendoButton();
var aceptarerror{$id}= $("#aceptarerror{$id}").data("kendoButton");
aceptarerror{$id}.bind("click", function(e){  
    cambiar('firmaerror{$id}','firmadigital{$id}');
});
///-----para la firma-------
function cambiarRedaccionFirma{$id}(tipo,titulo,contenido)
{
    swfirma=tipo;
    if($("#titulofirmadigital{$id}").length != 0) 
    {
        $('#titulofirmadigital{$id}').html(titulo);
        $('#contenidofirmadigital{$id}').html(contenido);
    } 
}  
</script>  