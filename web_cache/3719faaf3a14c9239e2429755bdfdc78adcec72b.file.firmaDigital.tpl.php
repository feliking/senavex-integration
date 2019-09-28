<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-05 10:36:34
         compiled from "/enex/web1/sitio/web/vista/avisos/firmaDigital.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16024780157cedb28bddb73-51892409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3719faaf3a14c9239e2429755bdfdc78adcec72b' => 
    array (
      0 => '/enex/web1/sitio/web/vista/avisos/firmaDigital.tpl',
      1 => 1493940889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16024780157cedb28bddb73-51892409',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cedb28d7f407_96188741',
  'variables' => 
  array (
    'id' => 0,
    'nombrecompleto' => 0,
    'nombre' => 0,
    'ausenciaasistente' => 0,
    'id_persona' => 0,
    'empresa' => 0,
    'factura' => 0,
    'empresa_temporal' => 0,
    'fecha_ini' => 0,
    'modificacionempresarelevancia' => 0,
    'modificaciones' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cedb28d7f407_96188741')) {function content_57cedb28d7f407_96188741($_smarty_tpl) {?>
<div class="row-fluid fadein"  id="firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header"><div class="titulo">Confirmación <span id='titulofirmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'></span></div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante"><?php echo $_smarty_tpl->tpl_vars['nombrecompleto']->value;?>
</span>, <span id='contenidofirmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'></span>

                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmar" id="formfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post"  action="index.php" >
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return validateQty(event);'
                       class="k-textbox " placeholder="Pin" name="pinfirmar"  id="pinfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmar /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="cancelafirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="firmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
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
<div class="row-fluid "  id="firmaloading<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" >
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
               <div id="progressBarf<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" style="width:100%;height: 8px;"></div>
           </div>
            <div class="span3" > 
           </div>
       </div>
    </div> 
</div> 
<div class="row-fluid "  id="firmaerror<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" >
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
                         <input id="aceptarerror<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
                     </div> 
                     <div class="span5 hidden-phone" >
                     </div>
            </div> 
        </div>   
    </div>
</div>   
<?php echo '<script'; ?>
>  
ocultar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
ocultar('firmaloading<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
ocultar('firmaerror<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
 //------para la firma---------------------------
$("#cancelafirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").kendoButton();
$("#firmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").kendoButton();
var cancelarfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
= $("#cancelafirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").data("kendoButton");
var firmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 = $("#firmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").data("kendoButton");
cancelarfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.bind("click", function(e){        
    switch(swfirma) {
        case 13:
            cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','eliminarausenciaasistenteview<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
        break;
        case 12:
            cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','registroausencia');
        break;
        case 11:
            cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','empresarestriccion<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
        break;
        case 10:
            cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','empresarestriccion<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
        break;
        case 26:
            cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','registrofacturaed<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
        break;
        case 25:
            cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','registrofacturaend<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
        break;
        case 24:
            cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','registrofactura');
        break;
        case 19:
            cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','registrofacturaend<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
        break;
        case 6:
            cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','registrofactura');
        break;
        case 1:  
            cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','asignacionruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
           break;
       case 20:
            cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','asignacionruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
           break;
        case 17:  
             cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','revisarempresatemporal<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
            break;
        case 21:  
             cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','revisarempresatemporal<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
            break;
        case 22:
            cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','revisarempresatemporal<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
        break;
        case 2:
             cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','revisarempresatemporal<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
        break;
        case 23:
             cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','revisarempresatemporalaprobaciondatos<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
        break;
        case 3:
              cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','revisarempresatemporalaprobaciondatos<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
        break;
        default:
            break;
    }
    borrarPin('<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
');
});

firmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.bind("click", function(e){  
    
    if(formfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.validate())
    { 
        firmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.enable(false);
        cambiar('firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','firmaloading<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
        var swdevueltaajaxf=2;
        var pbf = $("#progressBarf<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").data("kendoProgressBar");
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
                    cambiar('loading<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','firmaerror<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
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
                        cambiar('loading<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','firmaerror<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
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
            <?php if ($_smarty_tpl->tpl_vars['ausenciaasistente']->value->id_ausencia_asistente) {?>
            case 13://eliminar permisos
                $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=admAdministrativa&tarea=eliminarPermiso&idausenciaasistente=<?php echo $_smarty_tpl->tpl_vars['ausenciaasistente']->value->id_ausencia_asistente;?>
',
                success: function (data) {
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                            firmarPin('Permisos y Licencias','admAdministrativa','permisos','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].id_ausencia);
                        } 
                        else
                        {
                            swdevueltaajax=0;
                            alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                        }
                    }
                });
            break;
            <?php }?>
            case 12://permisos funcionario
                 $.ajax({             
                type: 'post',
                url: 'index.php',
                data: $('#ausenciaform').serialize()+'&idpersonafirma=<?php echo $_smarty_tpl->tpl_vars['id_persona']->value;?>
',
                success: function (data) {
                //alert(data);
                    var respuesta = eval('('+data+')');
                    if(respuesta[0].suceso=='0')
                    {
                        swdevueltaajax=1;
                        firmarPin('Permisos y Licencias','admAdministrativa','permisos','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].id_ausencia);
                    } 
                    else
                    {
                         swdevueltaajax=0;
                        alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                    }
                }
                });
            break;
            <?php if (isset($_smarty_tpl->tpl_vars['empresa']->value->id_empresa)) {?>
            case 10://bloquear una empresa
                $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEstadoEmpresas&tarea=bloquearEmpresa&id_empresa='+<?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
+'&id_persona='+<?php echo $_smarty_tpl->tpl_vars['id_persona']->value;?>
+'&camposmotivo='+$("#camposmotivo<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(),
                    success: function (data) { 
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='1')
                        {
                            swdevueltaajax=1;
                            firmarPin('Empresas','admEstadoEmpresas','estadoEmpresas','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].id_bloqueo);                   
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
                    data: 'opcion=admEstadoEmpresas&tarea=desbloquearEmpresa&id_empresa='+<?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
+'&id_persona='+<?php echo $_smarty_tpl->tpl_vars['id_persona']->value;?>
+'&camposmotivo='+$("#camposmotivo<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(),
                    success: function (data) { 
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='1')
                        {
                            swdevueltaajax=1;
                            firmarPin('Empresas','admEstadoEmpresas','estadoEmpresas','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].id_bloqueo);                   
                        } 
                        else
                        {
                            swdevueltaajax=0;
                            alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                        }
                     }
                });
            break;
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['factura']->value->id_factura)) {?>
            case 26://editar facturas dosificas
                guardainsumosed<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
();//en datosinsumosfactura
                $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admFactura&tarea=editarFacturaDosificada&'+$("#facturaformed<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").serialize()+'&'+datosinsumosfacturaed<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
+'&totalproductos='+totalproductosed<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
+'&totalincoterm='+totalincotermed<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, 
                    success: function (data) {
                       // alert(data);
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                            firmarPin('Mis Facturas','admFactura','verFacturas','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
','d<?php echo $_smarty_tpl->tpl_vars['factura']->value->id_factura;?>
');
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
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['factura']->value->id_factura_no_dosificada)) {?>
            case 25://editar facturas no dosificadas
                guardainsumosend<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
();//en datosinsumosfactura
                $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admFactura&tarea=editarFacturaNoDosificada&'+$("#facturaformend<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").serialize()+'&'+datosinsumosfacturaend<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
+'&totalproductosend='+totalproductosend<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
+'&facturasRelacionadas='+getFacturaAdmitidaend<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
(), 
                    success: function (data) {
                       // alert(data);
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                            firmarPin('Mis Facturas','admFactura','verFacturas','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
','d<?php echo $_smarty_tpl->tpl_vars['factura']->value->id_factura_no_dosificada;?>
');
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
            <?php }?>
    
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
                           firmarPin('Mis Facturas','admFactura','verFacturas','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].id_factura);
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
            <?php if (isset($_smarty_tpl->tpl_vars['factura']->value->id_factura_no_dosificada)) {?>
            case 19://editar facura dosificada de menor cuantia
                guardainsumosend<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
();//en datosinsumosfactura
                $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admFactura&tarea=editarFacturaNoDosificadaMenorcuantia&'+$("#facturaformend<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").serialize()+'&'+datosinsumosfacturaend<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
+'&totalproductosend='+totalproductosend<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, 
                    success: function (data) {
                       // alert(data);
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                            firmarPin('Mis Facturas','admFactura','verFacturas','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
','d<?php echo $_smarty_tpl->tpl_vars['factura']->value->id_factura_no_dosificada;?>
');
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
            <?php }?>
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
                        firmarPin('Mis Facturas','admFactura','verFacturas','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].id_factura);
                    }
                    else
                    { swdevueltaajax=0;
                        alert('No se guardo correctamente, verifique su conexión a internet');
                    }
                }
            });
            break;
            <?php if ($_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa) {?> 
            case 1://validar ruex
                //alert(<?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa;?>
);
               
                $.ajax({             
                  type: 'post',
                  url: 'index.php',
                  data: 'opcion=admEmpresa&tarea=asignarRuexEmpresa&id_empresa='+<?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa;?>
+'&fecha_ini=<?php echo $_smarty_tpl->tpl_vars['fecha_ini']->value;?>
'+'&chk-vigencia='+chk_vigencia ,
                  success: function (data) { //alert(data);
                      var respuesta = eval('('+data+')');
                      if(respuesta[0].suceso=='1')
                      {
                          swdevueltaajax=1;
                          firmarPin('Admisión','admEmpresa','empresasadmitidas','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].id_empresa_relevancia);
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
                          data: 'opcion=admCorreo&tarea=empresaRuex&id_empresa='+ <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa;?>
,
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
                    data: 'opcion=admEmpresa&tarea=observacionesValidacion&observacion='+encodeURIComponent(editorr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.value())+'&id_empresa='+<?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa;?>
+'&fecha_ini=<?php echo $_smarty_tpl->tpl_vars['fecha_ini']->value;?>
',
                    success: function (data) {
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                            //activar las notificaciones y el anuncio
                            firmarPin('Admisión','admEmpresa','empresasadmitidas','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].id_empresa_relevancia);
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
                            data: 'opcion=admCorreo&tarea=empresaAdmitidaRechazada&id_empresa='+ <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa;?>
,
                            success: function (data) { 

                                } 
                            });
                    }
                });  
            break;
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa) {?>
            case 17://admitir empresas
                $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEmpresa&tarea=admision&id_empresa='+ <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa;?>
,
                    success: function (data) {  
                        //alert(data);
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                            firmarPin('Registro de Empresas','admEmpresa','revisarempresatemporal','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].idserv);
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
                        data: 'opcion=admCorreo&tarea=empresaAdmitida&id_empresa='+ <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa;?>
,
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
                    data: 'opcion=admEmpresa&tarea=observaciones&observacion='+editor<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.value()+'&id_empresa='+<?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa;?>
,
                    success: function (data) {
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                             swdevueltaajax=1;
                            //activar las notificaciones y el anuncio
                            firmarPin('Registro de Empresas','admEmpresa','revisarempresatemporal','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].idserv);
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
                            data: 'opcion=admCorreo&tarea=empresaRegistroObservada&observacion='+editor<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.value()+'&id_empresa='+ <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa;?>
,
                            success: function (data) { 
                                   // alert(data);
                                } 
                            });
                    }
                });
            break;   
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['modificacionempresarelevancia']->value->id_modificacion_empresa_relevancia&&$_smarty_tpl->tpl_vars['empresa']->value->id_empresa) {?>
            case 22://rechazar admision  modificacion
               $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEmpresa&tarea=observacionModificacion&observacion='+editorobservaciones<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.value()+'&id_modificacion_empresa_relevancia='+<?php echo $_smarty_tpl->tpl_vars['modificacionempresarelevancia']->value->id_modificacion_empresa_relevancia;?>
,
                    success: function (data) {
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                             firmarPin('Solicitudes de Modificación','admEmpresa','mostrarSolicitudesModificacion','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].id_empresa_relevancia);
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
                        data: 'opcion=admCorreo&tarea=empresaModificacionObservada&observacion='+editorobservaciones<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.value()+'&id_empresa='+ <?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
,
                        success: function (data) { 
                            } 
                        });
                    }
                });
            break;
            <?php if ($_smarty_tpl->tpl_vars['modificaciones']->value) {?>
            case 2://admision de modificacion
                 $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEmpresa&tarea=admitirModificacionEmpresa&id_empresa='+'<?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
'+'&id_modificacion_empresa_relevancia='+'<?php echo $_smarty_tpl->tpl_vars['modificacionempresarelevancia']->value->id_modificacion_empresa_relevancia;?>
',
                    success: function (data) { 
                            //alert(data);
                            var respuesta = eval('('+data+')');
                            if(respuesta[0].suceso=='0')
                            {
                                swdevueltaajax=1;
                                firmarPin('Solicitudes de Modificación','admEmpresa','mostrarSolicitudesModificacion','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].id_empresa_relevancia);
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
                            data: 'opcion=admCorreo&tarea=empresaAdmitidaModificacion&id_empresa='+ <?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
+'&modificaciones='+'<?php echo implode(',',$_smarty_tpl->tpl_vars['modificaciones']->value);?>
',
                            success: function (data) { /* alert(data);*/
                                } 
                            });
                        }
                    });
            break;
            <?php }?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['modificacionempresarelevancia']->value->id_modificacion_empresa_relevancia&&$_smarty_tpl->tpl_vars['empresa']->value->id_empresa) {?>
            case 23://rechazar validacion modificacion
                 $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEmpresa&tarea=rechazarModificacionRuex&observacion='+editorobservacionesr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.value()+'&id_modificacion_empresa_relevancia='+<?php echo $_smarty_tpl->tpl_vars['modificacionempresarelevancia']->value->id_modificacion_empresa_relevancia;?>
,
                    success: function (data) {
                        //alert(data);
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                             swdevueltaajax=1;
                            firmarPin('Admisión','admEmpresa','empresasadmitidas','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].id_empresa_relevancia);
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
                        data: 'opcion=admCorreo&tarea=empresaModificacionRechazada&id_empresa='+ <?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
,
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
                data: 'opcion=admEmpresa&tarea=validarModificacionEmpresa&id_modificacion_empresa_relevancia='+<?php echo $_smarty_tpl->tpl_vars['modificacionempresarelevancia']->value->id_modificacion_empresa_relevancia;?>
,
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
                            firmarPin('Admisión','admEmpresa','empresasadmitidas','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['modificacionempresarelevancia']->value->id_modificacion_empresa_relevancia;?>
');
                        } 
                        else
                        {  swdevueltaajax=0;
                            alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                        }
                         //-----------------enviamos correos------------------
                        $.ajax({             
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admCorreo&tarea=empresaModificacionExitosa&id_empresa='+ <?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
,
                        success: function (data) { 
                          //  alert(data)
                            } 
                        });
                    }
                });
            break;
            <?php }?>    
            default:
                break;
        }
    }
});    
//-----------esto es para la valicdacion del pin-------------------------------------
var swfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
=2;        
var firmarcache<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
='';
var formfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
= $("#formfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").kendoValidator({
   rules:{ 
       firmar: function(input) { 
         var validate = input.data('firmar');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmarcache<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 !== $("#pinfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val()) 
                 {
                verificarPin<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
($("#pinfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val());                    
                return false;
                }
                if(swfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
==1)
                {
                     return true;
                }
                if(swfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
==0)
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
            if(swfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
==0)
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
function verificarPin<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
(pin_insertado)
{
    $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
        success: function (data) {    
           swfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
=data;
           firmarcache<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
=$("#pinfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val();
           formfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.validateInput($("#pinfirmar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"));
        }
    }); 
}
$("#progressBarf<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").kendoProgressBar({
    showStatus: false,
    animation: false,
    min: 0,
    max: 100,
    type: "percent",
    complete: function(e) {
      }
});
//-----pal error---------------
$("#aceptarerror<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").kendoButton();
var aceptarerror<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
= $("#aceptarerror<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").data("kendoButton");
aceptarerror<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.bind("click", function(e){  
    cambiar('firmaerror<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
});
///-----para la firma-------
function cambiarRedaccionFirma<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
(tipo,titulo,contenido)
{
    swfirma=tipo;
    if($("#titulofirmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").length != 0) 
    {
        $('#titulofirmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').html(titulo);
        $('#contenidofirmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').html(contenido);
    } 
}  
<?php echo '</script'; ?>
>  <?php }} ?>
