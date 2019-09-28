<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-05-24 17:00:16
         compiled from "/enex/web1/sitio/web/vista/ProForma/factura_manual.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201317978657ceda70b19a00-32749378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd7719c5841557a0d8891ebeb47ada955053e5b4' => 
    array (
      0 => '/enex/web1/sitio/web/vista/ProForma/factura_manual.tpl',
      1 => 1558731438,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201317978657ceda70b19a00-32749378',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ceda70bb8ea2_50552157',
  'variables' => 
  array (
    'fmsucursalnombre' => 0,
    'fmsucursal' => 0,
    'nombrecompleto' => 0,
    'empresa' => 0,
    'dias_dosificacion' => 0,
    'servicios' => 0,
    'servicio' => 0,
    'listaRegionales' => 0,
    'regional' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ceda70bb8ea2_50552157')) {function content_57ceda70bb8ea2_50552157($_smarty_tpl) {?><div class="row-fluid  form" >
    <div class="row-fluid "  id="mostrarfacturamanual" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" id="titulofactura" name="titulofactura" >Facturar Servicios - <?php echo $_smarty_tpl->tpl_vars['fmsucursalnombre']->value;?>
</div>  
                        </div>                                      
                    </div>  
                </div>
               
                <form name="formfacturamanual" id="formfacturamanual" method="post"  action="index.php"> 
                    <input type="hidden" name="fmsucursal" id="fmsucursal" value="<?php echo $_smarty_tpl->tpl_vars['fmsucursal']->value;?>
" />
                    <input type="hidden" name="opcion" id="opcion" value="admProForma" />
                    <input type="hidden" name="tarea" id="tarea" value="generar_factura_manual" /> 
                    <!input type="hidden" name="tarea" id="tarea" value="prueba" /> 
                   
                    <div id="vortex_gral" name="vortex_gral">
                        <div class="row-fluid  form" >
                            <div class="span1 hidden-phone" ></div>
                            <div class="span2 parametro" >
                                <center><b>Fecha Transacción</b></center>
                            </div>
                            <div class="span6 parametro" >
                                <center><b>Servicio</b></center>
                            </div> 
                            <div class="span1 parametro" >
                                <center><b>SubTotal</b></center>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="span12 fadein" >
                            <input type="hidden" name="hiddenvalidator-servicioselect" id="hiddenvalidator-servicioselect" 
                            data-servicioselect
                            data-required-msg="Seleccione al menos un servicio" />
                        </div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" ></div>
                    </div>
                    <div id="gral" name="gral">
                        <div class="row-fluid  form" >
                            <div class="span1 hidden-phone" ></div>
                            <div class="span4 parametro" >
                                <center><b>Servicio</b></center>
                            </div> 

                            <div class="span3 parametro" >
                                <center><b>Detalle</b></center>
                            </div> 
                            <div class="span3 parametro" >
                                <center><b>SubTotal</b></center>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row-fluid form" >
                        <div class="span10 hidden-phone" ></div>
                        <div class="span1" >
                            <img src="styles/img/add.png" id="cagregar"  onclick="agregar(true)" height="28" width="28">
                        </div>
                    </div>
                    
                    <div class="row-fluid form" >
                        <div class="barra" >
                        </div>
                    </div>
                    <div class="row-fluid  form" id="div_empresa">
                        <input type="hidden" id="empresa_id" name="empresa_id" value="">
                        <div class="span2 hidden-phone"  ></div>
                        <div class="span2" >
                            <b>NIT de la empresa :</b>
                        </div>     
                        
                        <div class="span2" >
                            
                            <input type="text" class="k-textbox" name="nit" id="nit" value="" pattern="[1-9][0-9]{2,}" placeholder="Ingrese NIT/CI"  required validationMessage="Ingrese NIT/CI de la empresa a facturar"/>
                            
                        </div>  
                        <div class="span5 campo" id="empresa_texto">

                        </div>
                    </div>
                    <div class="row-fluid  form" id="div_persona" >
                        <input type="hidden" id="persona_id" name="persona_id" value="0">
                        <div class="span2 hidden-phone" ></div>
                        <div class="span2" >
                            <b>C.I. Persona habilitada :</b>
                        </div>     
                        <div class="span2" >
                            <input type="text" class="k-textbox" name="ci" id="ci" value="" required validationMessage="Seleccione una persona autorizada por la empresa" placeholder="Personal Autorizado" />
                        </div>
                        <div class="span5 campo" id="persona_texto" >
                            
                        </div>  
                    </div>
                    <div class="row-fluid  form" id="div_persona_combo" >
                        <div class="span2 hidden-phone" ></div>
                        <div class="span2" >
                            <b>Persona habilitada :</b>
                        </div>     
                        <div class="span4" >
                            <input style="width:100%;" id="ci_combo" name="ci_combo" required validationMessage="Seleccione una persona autorizada" placeholder="Personal Autorizado"/>
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" >
                        </div>
                    </div>
                    <div class="row-fluid  form" >
                        <div class="span12">
                            <input type="checkbox" name="chx_fmcontingencia" id="chx_fmcontingencia" onchange="contingencia()">Factura Manual en Contingencia
                        </div>
                    </div>
                    <div class="row-fluid  form" id="div_contingencia" >
                        <div class="span2 hidden-phone"></div>
                        <div class="span2 ">
                            <input type="text" class="k-textbox" name="fmc_nro" id="fmc_nro" value=""  validationMessage="Ingrese Nro de Factura" placeholder="Nro de Factura" />
                        </div>
                        <div class="span2 ">
                            <input type="date" class="k-textbox" name="fmc_fecha" id="fmc_fecha" value=""  validationMessage="Ingrese Fecha de la Factura" placeholder="Fecha Emisión" />
                        </div>
                        <div class="span2 ">
                            <input type="date" class="k-textbox" name="fmc_fecha_limite" id="fmc_fecha_limite" value=""  validationMessage="Ingrese Fecha limite de la Factura" placeholder="Fecha Limite" />
                        </div>
                        <div class="span2 ">
                            <input type="number" min="100000000000" class="k-textbox" name="fmc_autorizacion" id="fmc_autorizacion" value=""  validationMessage="Ingrese Nro de Autorización" placeholder="Nro Autorización" />
                        </div>
                    </div> 
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div>   
                    <div class="row-fluid  form" >
                        <div class="span7 hidden-phone"></div>
                        <div class="span2 "  >
                            <b> Total a Facturar</b>
                        </div>     
                        <div class="span2 campo">
                            <input type="hidden" name="total-depositos" id="total-depositos" value="0"  />
                            <input type="hidden" id="total_facturar" name="total_facturar" value="0" /> 
                            <input type="hidden" id="total_facturar_chkbx" name="total_facturar_chkbx" value="0" /> 
                            <center><label name="total" id="total">Bs. 0</label></center>
                        </div> 
                    </div>
                    <div class="row-fluid  form">
                        <!--div class="span12" ><b>FACTURACION EN MANTENIMENTO, AGUARDE UN MOMENTO POR FAVOR</b></div-->
                        <div class="span5 hidden-phone"></div>
                        <div class="span2 hidden-phone" >
                            <input id="cerrar_facturar" type="hidden"  value= "Prueba" class="k-primary" style="width:100%"/>
                        </div> 
                        <div class="span2"> 
                            <input id="ver_depositos" type="button"  value= "Depositos" class="k-primary" style="width:100%"/>
                        </div>
                        <div class="span2">
                            <input id="facturar" type="button"  value= "Facturar" class="k-primary" style="width:100%"/>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
    <div></div>
    <div class="row-fluid fadein"  id="firmarfacturamanual" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="k-header">
                    <div class="titulo">Firma Digital</div>
                </div>
            </div>
            <div class="k-cuerpo"> 
                <div class="row-fluid  form" >
                    <div class="span1" > </div>
                    <div class="span10" >
                        <p> Transacción realizada por: <span class="letrarelevante"><?php echo $_smarty_tpl->tpl_vars['nombrecompleto']->value;?>
</span>, </p>
                        <p>Autorizada por la entidad: <span class="letrarelevante">"<?php echo $_smarty_tpl->tpl_vars['empresa']->value;?>
"</span> </p>
                    </div>
                    <div class="span1" ></div>
                </div>
                <form name="formfirmafacturamanual" id="formfirmafacturamanual" method="post"  action="index.php" >
                    <!--input type="hidden" name="opcion" id="opcion" value="admDeposito" />
                    <input type="hidden" name="tarea" id="tarea" value="registrarDeposito" /-->
                    <div class="row-fluid  form" >
                        <div class="span5" ></div>
                        <div class="span2" >
                            <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                           class="k-textbox " placeholder="Pin" name="pinfirmarfacturamanual"  id="pinfirmarfacturamanual" maxlength="4" size="4" style="width:50px;"
                           required data-required-msg="Por favor ingrese su Pin." data-firmarproforma /> 
                        </div>  
                        <div class="span5" ></div>
                    </div>
                    <div class="row-fluid  form" >
                        <div class="span4 hidden-phone" >
                        </div>
                        <div class="span2 " >
                            <input id="bcancelarfirmafacturamanual" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                        </div>
                        <div class="span2 " >
                            <input id="baceptarfirmafacturamanual" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                        </div> 
                        <div class="span4 hidden-phone" ></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row-fluid fadein" id="formfmsucursal">
        <div class="span12" >
            <div class="row-fluid" >
                <div class="span1 hidden-phone" ></div>
                <div class="span10">
                    <div class="k-block fadein">
                        <div class="k-header">
                            <div class="row-fluid  form" >
                                <div class="span12" >
                                    <div class="titulo" >Identificar EMPRESA</div>
                                </div>
                            </div>
                        </div>
                        <div class="k-cuerpo">
                            <?php if ($_smarty_tpl->tpl_vars['dias_dosificacion']->value<30) {?>
                                <div class="row-fluid  form" >
                                    <div class="span12" >
                                        <?php if ($_smarty_tpl->tpl_vars['dias_dosificacion']->value>0) {?>
                                            <h2><strong>AVISO</strong> la dosificacion tiene <?php echo $_smarty_tpl->tpl_vars['dias_dosificacion']->value;?>
 de vigencia</h2>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['dias_dosificacion']->value==0) {?>
                                            <h2><strong>AVISO</strong> Hoy vence la dosificación</h2>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['dias_dosificacion']->value<0) {?>
                                            <h2><strong>AVISO</strong> Dosificacion vencida, notifique al departamento correspondiente</h2>
                                        <?php }?>
                                     </div>
                                </div>
                            <?php }?>
                            <div class="row-fluid  form" >
                                <div class="span1 hidden-phone" ></div>
                                <div class="span10" >
                                    <h2> Seleccione RUEX </h2>
                                 </div>
                            </div>
                            <div class="row-fluid  form" >
                                <div class="span3 hidden-phone" ></div>
                                <div class="span6" >
                                    <input style="width:100%;" id="ruex_lista" name="ruex_lista" required validationMessage="Seleccione Nro RUEX" <?php if ($_smarty_tpl->tpl_vars['dias_dosificacion']->value<0) {?>disabled<?php }?>/>
                                </div>
                            </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['fmsucursal']->value==11) {?>
                        <div class="k-cuerpo">  
                            <div class="row-fluid  form" >
                                <div class="span1 hidden-phone" ></div>
                                <div class="span10" >
                                    <h2> Seleccione Regional </h2>
                                 </div>
                            </div>
                            <div class="row-fluid  form" >
                                <div class="span4 hidden-phone" ></div>
                                <div class="span4" >
                                    <input style="width:100%;" id="sucursal" name="sucursal" required validationMessage="Seleccione una Regional" <?php if ($_smarty_tpl->tpl_vars['dias_dosificacion']->value<0) {?>disabled<?php }?>/>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <div class="span1 hidden-phone" > </div>
            </div>
        </div>
    </div>
    <div class="row-fluid fadein" id="avisook">
        <div class="span12" >
            <div class="row-fluid" >
                <div class="span1 hidden-phone" >
                </div>
                <div class="span10">

                    <div class="k-block fadein">
                        <div class="k-header">
                            <div class="row-fluid  form" >
                                <div class="span12" >
                                    <div class="titulo" >TRANSACCIÓN REALIZADA CON ÉXITO</div>  
                                </div>                                      
                            </div>  
                        </div>
                        <!--div class="k-header k-headerrojo"><div class="tituloblanco"></div></div-->
                        <div class="k-cuerpo">  
                            <div class="row-fluid  form" >
                                   <div class="span1 hidden-phone" ></div>
                                   <div class="span10" >
                                       <h2> Se ha Generado la Factura con exito </h2>
                                    </div>  
                                   <div class="span1 hidden-phone" ></div>

                            </div>
                            <div class="row-fluid  form" >
                                <div class="span5 hidden-phone"></div>
                                <div class="span2">
                                    <input id="avisoAceptar" type="button" value="Imprimir" class="k-primary" style="width:100%"/> <br> <br>
                                </div>
                            </div>
                        </div>

                    </div> 
                </div>
                <div class="span1 hidden-phone" > </div>
            </div>
        </div>
    </div>
    
</div>
<div id="div_deposito_ventana"></div>
<div id="div_persona_ventana"></div>
<div id="div_empresa_ventana"></div>
<?php echo '<script'; ?>
> 
    var num=0;
    var depo=0;
    var sw_ruex = true;
    var arraytotal = new Array();
    var array_ventas = new Array();
    var array_depositos = new Array();
    var array_cpublico = new Array();
    var empresa_bool = true;
    var persona_bool = true;
    var cadena_depositos='';
    ocultar('firmarfacturamanual');
    ocultar('avisook');
    ocultar('ventanadeposito');
    ocultar('vortex_gral');
    ocultar('div_persona_combo');
    $(document).ready(function(){
        //agregar(false);
    });
   
    ocultar('empresa_texto');
    ocultar('persona_texto');
    ocultar('div_contingencia');
    mostrar('formfmsucursal');
    ocultar('mostrarfacturamanual');
    //if(<?php echo $_smarty_tpl->tpl_vars['fmsucursal']->value;?>
==11){
    //    mostrar('formfmsucursal');
    //    ocultar('mostrarfacturamanual');
    /*}else{
        ocultar('formfmsucursal');
        mostrar('mostrarfacturamanual');
    }*/
    function contingencia(){
        if($('#chx_fmcontingencia')[0].checked){
            mostrar('div_contingencia');
            $('#fmc_nro').attr('required','required');
            $('#fmc_fecha').attr('required','required');
            $('#fmc_fecha_limite').attr('required','required');
            $('#fmc_autorizacion').attr('required','required');
        }else{
            $('#fmc_nro').removeAttr('required');
            $('#fmc_fecha').removeAttr('required');
            $('#fmc_fecha_limite').removeAttr('required');
            $('#fmc_autorizacion').removeAttr('required');
            ocultar('div_contingencia');
        }
        //alert('hola');
    }
    
    $('#nit')
        .focusout(function() {
            if($('#nit').val()!=''){
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: $('empresa_form').serialize()+'&opcion=admProForma&tarea=factura_senavex_empresa&nit='+$('#nit').val(),
                    success: function (data) {
                        //alert(data);
                        if(data!=-1){
                            var dt=eval("("+data+")");
                            $('#empresa_texto').html(dt[0].nombre);
                            $('#empresa_id').val(dt[0].id);
                           // $('#ci').removeAttr('class');

                            mostrar('empresa_texto');

                        }else{
                            ocultar('empresa_texto');
                            create_empresa_ventana();
                            $('#empresa_id').val("");
                            $('#empresa_nit').val($('#nit').val());
                            //$('#empresa_aviso').html('la Empresa con el NIT/CI:  '+$('#nit').val()+' no se encuentra registrada, revise el numero de NIT o CI. ');
                            
                            //empresa_ventana.open();
                        }
                    }
                });  
            }
        });
    
    $('#ci')
        .focusout(function() {
            if($('#ci').val()!=''){
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: $('empresa_form').serialize()+'&opcion=admProForma&tarea=factura_senavex_persona&ci='+$('#ci').val(),
                    success: function (data) {
                        if(data!=-1){
                            var dt=eval("("+data+")");
                            $('#persona_texto').html(dt[0].nombre);
                            $('#persona_id').val(dt[0].id);
                            mostrar('persona_texto');
                        }else{
                            ocultar('persona_texto');
                            create_persona_ventana();
                            $('#persona_id').val("");
                            $('#persona_ci').val($('#ci').val());
                            //persona_ventana.open();
                        }
                    }
                });  
            }
        });
   
    $("#facturar").kendoButton();
    $("#avisoAceptar").kendoButton();
    $("#baceptarfirmafacturamanual").kendoButton();
    $("#bcancelarfirmafacturamanual").kendoButton();
    $("#cerrar_facturar").kendoButton();
    
    $("#ver_depositos").kendoButton();
    
    var facturar = $("#facturar").data("kendoButton");
    var avisoAceptar = $("#avisoAceptar").data("kendoButton");
    var baceptarfirmafacturamanual = $("#baceptarfirmafacturamanual").data("kendoButton");
    var bcancelarfirmafacturamanual = $("#bcancelarfirmafacturamanual").data("kendoButton");
    //var formfacturamanual= $("#formfacturamanual").kendoValidator({});
    //var validator = $("#formfacturamanual").kendoValidator().data("kendoValidator");
    var validator=$("#formfacturamanual").kendoValidator({
        rules:{
            servicioselect: function(input) {
                var validate = input.data('servicioselect');
                if (typeof validate !== 'undefined') 
                {
                    return !( $("#formfacturamanual input:checkbox:checked").length == 0 && arraytotal.length == 0 );
                }
                return true;
            },
        },
        messages:{  //checkpeso
             servicioselect: "Seleccione al menos un servicio",
        }
    }).data("kendoValidator");
    
    var cerrar_facturar = $("#cerrar_facturar").data("kendoButton");
    
    var ver_depositos = $("#ver_depositos").data("kendoButton");
    //facturar.enable(false);
    facturar.bind("click", function(e){
        //$("#formfacturamanual input:checkbox:checked").length > 0
        if(validator.validate()){
            $('#empresa_id').val($("#ruex_lista").val());
            //window.open('index.php?'+ $('#formfacturamanual').serialize()+'&vortex='+vortex+'&persona_id='+$('#persona_id').val()+'&empresa_id='+$('#empresa_id').val()+'&total_facturar='+$('#total_facturar').val()+'&'+cadena_depositos, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
            cambiar('mostrarfacturamanual','avisook');
        }
    });
    cerrar_facturar.bind("click", function(e){
        //$('#ventanadeposito').remove();
       // cerraractualizartab('Facturar','admProForma','prueba&'+$('#formfacturamanual').serialize()+'&persona_id='+$('#persona_id').val()+'&empresa_id='+$('#empresa_id').val()+'&total_facturar='+$('#total_facturar').val()+'&'+cadena_depositos);
        //window.open('index.php?'+ $('#formfacturamanual').serialize()+'&persona_id='+$('#persona_id').val()+'&empresa_id='+$('#empresa_id').val()+'&total_facturar='+$('#total_facturar').val()+'&'+cadena_depositos, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
    });
    avisoAceptar.bind("click", function(e){
        avisoAceptar.enable(false);
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: $('#formfacturamanual').serialize()+'&vortex='+vortex+'&persona_id='+$('#persona_id').val()+'&empresa_id='+$('#empresa_id').val()+'&total_facturar='+$('#total_facturar').val()+'&'+cadena_depositos,
            success: function (data) {
                    var id_factura = data.split(':');
                    if( id_factura.length == 1 ){
                        window.open('index.php?opcion=admProForma&tarea=mostrar_factura_manual&id_factura='+id_factura, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
                        avisoAceptar.enable(true);
                        cerraractualizartab('Facturar','admProForma','factura_manual&fmsucursal='+$('#fmsucursal').val());
                    }else{
                        //facturar.enable(true);
                        //cambiar('avisook','mostrarfacturamanual');
                    }
                    /*if($('#total_facturar').val()==0){
                        window.open('index.php?opcion=admProForma&tarea=mostrar_factura_manual&id_factura='+dato, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
                        $('#ventanadeposito').remove();
                        //$('#persona_ventana').remove();
                        cerraractualizartab('Facturar','admProForma','factura_manual&fmsucursal='+$('#fmsucursal').val());
                    }else{
                        if( data != '-1' )
                        {
                            $.ajax({             
                                type: 'post',
                                url: 'index.php',
                                data: $("#formdepositos").serialize()+'&id_factura='+dato,
                                success: function (data) {
                                        
                                        if( data != '-1' ){
                                            var id_factura = data.split('-');
                                            window.open('index.php?opcion=admProForma&tarea=mostrar_factura_manual&id_factura='+id_factura[1], 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
                                            $('#ventanadeposito').remove();
                                            //$('#persona_ventana').remove();
                                            cerraractualizartab('Facturar','admProForma','factura_manual&fmsucursal='+$('#fmsucursal').val());
                                        }else{
                                            //facturar.enable(true);
                                            cambiar('avisook','mostrarfacturamanual');
                                        }

                                    }
                                });
                        }else{
                            //facturar.enable(true);
                            cambiar('avisook','mostrarfacturamanual');
                        }
                    }*/
                }
            });
        /*window.open('index.php?'+, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        cerraractualizartab('Facturar','admProForma','factura_manual&fmsucursal='+$('#fmsucursal').val());*/
    });
    function consultaAjax(dato){
        var resultado = '-1';
         $.ajax({             
            type: 'post',
            url: 'index.php',
            data: dato,
            success: function (data) {
                    alert(data);
                    resultado=data;
                }
            });
            return data;
    }
    baceptarfirmafacturamanual.bind("click", function(e){
        
    });
    bcancelarfirmafacturamanual.bind("click", function(e){
        
    });
    ver_depositos.bind("click", function(e){
        
        create_deposito_ventana();
    });
    function OnKeyUp(num, venta, tipo){
        if(tipo==2){
             $('#icontrol-'+num+'-'+venta)
                .keyup(function(){
                    tipo2(num,venta);
                })
                .change(function(){
                    tipo2(num,venta);
                });
             $('#fcontrol-'+num+'-'+venta)
                .keyup(function(){
                    tipo2(num,venta);
                })
                .change(function(){
                    tipo2(num,venta);
                });
        }
        if(tipo==3){
            $('#cantidad-'+num)
                    .keyup(function(){
                       tipo3(num);
                    })
                    .change(function(){
                        tipo3(num);
                    });
        }
    }
    function tipo2(num, venta){
        if( $('#icontrol-'+num+'-'+venta).val()!='' && $('#icontrol-'+num+'-'+venta).val()!='' && parseInt( $('#icontrol-'+num+'-'+venta).val() ) <= parseInt( $('#fcontrol-'+num+'-'+venta).val() ) ){
            var icontrol = $('#icontrol-'+num+'-'+venta);
            var fcontrol = $('#fcontrol-'+num+'-'+venta);
            var cantidad = $('#cantidad-tipo_campo-'+num);
            var subcantidad = $('#cantidadventa-'+num+'-'+venta);
            var serviciocosto = $('#serviciocosto-'+num);
            var serviciocostolabel = $('#serviciocostolabel-'+num);
            //alert(cantidad.val() + ' - '+ subcantidad.val());
            cantidad.val( parseInt( cantidad.val() ) - parseInt( subcantidad.val() ) );
            cantidad.val( parseInt( cantidad.val() ) + parseInt( fcontrol.val() ) - parseInt( icontrol.val() ) );
            subcantidad.val( parseInt( fcontrol.val() ) - parseInt( icontrol.val() ));
            //alert( cantidad.val()  +' x ' +serviciocosto.val() );
            var sum= parseInt( cantidad.val() ) * parseInt( serviciocosto.val() );
           
            serviciocostolabel.text('Bs. '+sum+',00');
            total();
        }else{
            //if( parseInt( $('#icontrol-'+num+'-'+venta).val() ) > parseInt( $('#fcontrol-'+num+'-'+venta).val() ))
            //    $('#icontrol-'+num+'-'+venta).val('');
        }
    }
    
    function tipo3(num){
        if($('#cantidad-'+num).val()!=''){
            $('#cantidad-tipo_campo-'+num).val($('#cantidad-'+num).val());
            var sum = parseInt($('#serviciocosto-'+num).val()) * parseInt($('#cantidad-'+num).val());
            $('#serviciocostolabel-'+num).text('Bs. '+sum+',00');
            total();
        }
    }
    function Combobox(num){
        $('#servicio-'+num).kendoComboBox({
            placeholder:"Seleccione un servicio",
            ignoreCase: true,
            dataTextField: "value",
            dataValueField: "Id",
            dataSource: [
            <?php  $_smarty_tpl->tpl_vars['servicio'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['servicio']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['servicios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['servicio']->key => $_smarty_tpl->tpl_vars['servicio']->value) {
$_smarty_tpl->tpl_vars['servicio']->_loop = true;
?> 
                 { value: "<?php echo $_smarty_tpl->tpl_vars['servicio']->value->getCodigo();?>
"+" | "+"<?php echo $_smarty_tpl->tpl_vars['servicio']->value->getDescripcion();?>
", Id: <?php echo $_smarty_tpl->tpl_vars['servicio']->value->getId_servicio();?>
},
            <?php } ?>  
            ],
            change : function (e) {
                //alert(this.value());
                var nombre=this.text();
                var item=this.value();
                definirCampo(num,false);
                if (this.value() && this.selectedIndex == -1) {
                    $('#subtotal-servicio'+num).text('');
                }else{
                    $.ajax({             
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admProForma&tarea=precio_servicio&id_servicio='+this.value(),
                        success: function (data) {                              
                            var serviciocosto = $('#serviciocosto-'+num);
                            var serviciocostolabel = $('#serviciocostolabel-'+num);
                            serviciocosto.val( parseInt(data) );
                            serviciocostolabel.text('Bs. '+serviciocosto.val()+',00' );
                            $('#serviciocostototal-'+num).val(serviciocosto.val());
                            total();
                        }
                    }); 
                }
            }
       });
    }
    function agregar(estado) {
        num++;
        arraytotal.push(num);
        //var campo= '<input type="text">'; 
        var campo=
                '<div class="row-fluid  form" id="campos-'+num+'" name="campos-'+num+'">'+
                    '<div class="span1 hidden-phone" ></div>'+
 
                    '<div class="span4" id="div-servicio'+num+'" name="div-servicio'+num+'">'+
                        '<input style="width:100%;" id="servicio-'+num+'" name="servicio-'+num+'" required validationMessage="Seleccione un Servicio"/>'+
                    '</div>'+
                    
                    '<div id="tipo_campo-'+num+'" class="span4 campo">'+
                        
                    '</div>'+
                    '<div  class="span1 campo">'+
                        '<input type="hidden" id="serviciocosto-'+num+'" name="serviciocosto-'+num+'" value="0"> '+
                        '<center><label id="serviciocostolabel-'+num+'">Bs. 0,00</label></center>'+
                    '</div>'+
                    ((estado)? 
                        '<div class="span1" >'+
                            '<img src="styles/img/del_dark.png" id="celiminar" alt="eliminar servicio" onclick="eliminar(this,'+num+')" height="28" width="28">'+
                        '</div>' : '') +
                '</div>';
        $("#gral").append(campo);
        this.Combobox(num);
        //this.OnKeyUp('servicio'+num);
    }
    function Campos(num,estado,tipo){
        var texto="";
        if(tipo==1){
            texto= 'onclick="agregarEmision('+num+',true)"';
        }
        if(tipo==2){
            texto= 'onclick="agregarVenta('+num+',true)"';
        }
        if(tipo==4){
            texto= 'onclick="agregarCPublico('+num+',true)"';
        }
        var campo=  '<div class="k-cuerpo" id="cuerpo-tipo_campo-'+num+'"  name="cuerpo-tipo_campo-'+num+'">'+
                        //'<input type="hidden" id="cantidad-tipo_campo-'+num+'" name="cantidad-tipo_campo-'+num+'" value="1">'+
                    '</div>'+
                    ((tipo!=3 && tipo!=5 && tipo!=6)? 
                    '<div class="row-fluid form" >'+
                    
                        '<div class="span10 hidden-phone" >'+
                        '</div>'+
                        '<div class="span1" >'+
                       
                            '<img src="styles/img/add.png" id="cagregar" '+texto+' height="28" width="28">'+
                        
                        '</div>'+
                    '</div>':'  ');
        $('#tipo_campo-'+num).append('<input type="hidden" name="cantidad-tipo_campo-'+num+'" id="cantidad-tipo_campo-'+num+'" value="0" />');
        $('#tipo_campo-'+num).append(campo);
 
        if(tipo==1){
            agregarEmision(num,estado);
        }
        if(tipo==2){
            agregarVenta(num,estado);
        }
        if(tipo==3){
            agregarCantidad(num);
        }
        if(tipo==4){
            agregarCPublico(num,estado);
        }
        if(tipo==5){
            agregarReposicion(num,false);
        }
        if(tipo==6){
             $('#cantidad-tipo_campo-'+num).val(parseInt($('#cantidad-tipo_campo-'+num).val())+1);
        }
    }
    function agregarEmision(num,estado){
        venta++;
        var campo=  '<div class="row-fluid form" id="tipo_campo-'+num+'-'+venta+'">'+
                        
                        '<div class="span5" >'+
                            '<input min=1 id="fobemision-'+num+'-'+venta+'" name="fobemision-'+num+'-'+venta+'" type="number" class="k-textbox" placeholder="FOB"  required validationMessage="Ingreser Valor FOB" >'+
                        ' </div>'+
                        '<div class="span5" >'+
                            '<input min=1 id="controlemision-'+num+'-'+venta+'" name="controlemision-'+num+'-'+venta+'" type="number" class="k-textbox" placeholder="Nro Control"  required validationMessage="Ingreser Nro Control" >'+
                        ' </div>'+
                        ((estado)? 
                        '<div class="span1" >'+
                            '<img src="styles/img/del_dark.png" id="celiminar-'+num+'-'+venta+'" alt="eliminar servicio" onclick="eliminarCampo(this,1)" height="28" width="28">'+
                        '</div>' : '') +
                    '</div>';
        $('#cuerpo-tipo_campo-'+num).append(campo);
        $('#cantidad-tipo_campo-'+num).val(parseInt($('#cantidad-tipo_campo-'+num).val())+1);
        //alert($('#cantidad-tipo_campo-'+num).val() + ' - '+$('#serviciocosto-'+num).val());
        var sum= parseInt( $('#cantidad-tipo_campo-'+num).val() ) * parseInt( $('#serviciocosto-'+num).val() );
        $('#serviciocostolabel-'+num).text('Bs. '+sum+',00');
        total();

    }
    var venta=0;
    function agregarVenta(num,estado){
        venta++;
        var campo=  '<div class="row-fluid form" id="tipo_campo-'+num+'">'+
                        '<input type="hidden" id="cantidadventa-'+num+'-'+venta+'" name="cantidadventa-'+num+'-'+venta+'" value="0"> '+
                        '<div class="span5" >'+
                            '<input min=1 id="icontrol-'+num+'-'+venta+'" name="icontrol-'+num+'-'+venta+'" type="number" class="k-textbox" placeholder="Nro Control Inicial"  required validationMessage="Ingreser Nro control Inicial" >'+
                        ' </div>'+
                        '<div class="span5" >'+
                            '<input min=1 id="fcontrol-'+num+'-'+venta+'" name="fcontrol-'+num+'-'+venta+'" type="number" class="k-textbox" placeholder="Nro Control Final"  required validationMessage="Ingreser Nro Control Final" >'+
                        ' </div>'+
                        ((estado)? 
                        '<div class="span1" >'+
                            '<img src="styles/img/del_dark.png" id="celiminar-'+num+'-'+venta+'" alt="eliminar servicio" onclick="eliminarCampo(this,2)" height="28" width="28">'+
                        '</div>' : '') +
                    '</div>';
        $('#cuerpo-tipo_campo-'+num).append(campo);
        $('#cantidad-tipo_campo-'+num).val(parseInt($('#cantidad-tipo_campo-'+num).val())+1);
        
        OnKeyUp(num,venta, 2);
        verificarCertificado(num, venta)
        array_ventas.push(venta);
    }
    function verificarCertificado(num, venta){
        $('#icontrol-'+num+'-'+venta)
            .focusout(function() {
                if($('#icontrol-'+num+'-'+venta).val()!='' && $('#fcontrol-'+num+'-'+venta).val()!='' && parseInt($('#icontrol-'+num+'-'+venta).val()) >  parseInt($('#fcontrol-'+num+'-'+venta).val())){
                    $('#icontrol-'+num+'-'+venta).val('');
                    alert('Nro de control Inicial superior al Nro de control Final ');
                }else{
                    if($('#icontrol-'+num+'-'+venta).val()!=''){
                        $.ajax({
                            type: 'post',
                            url: 'index.php',
                            data: 'opcion=admProForma&tarea=verificar_certificado&certificado='+$('#icontrol-'+num+'-'+venta).val()+'&acuerdo='+$('#servicio-'+num).val(),
                            success: function (data) {
                                dt = eval('('+data+')');
                                if(dt[0].suceso !=0 ){
                                    alert('Nro de control '+$('#icontrol-'+num+'-'+venta).val()+' vendido');
                                    if( $('#fcontrol-'+num+'-'+venta).val() != ''){
                                        $('#icontrol-'+num+'-'+venta).val($('#fcontrol-'+num+'-'+venta).val());
                                    }else{
                                        $('#icontrol-'+num+'-'+venta).val('');
                                    }
                                }
                            }
                        });  
                    }
                }
            }); 
        $('#fcontrol-'+num+'-'+venta)
            .focusout(function() {
                if($('#icontrol-'+num+'-'+venta).val()!='' && $('#fcontrol-'+num+'-'+venta).val()!='' && parseInt($('#icontrol-'+num+'-'+venta).val()) >  parseInt($('#fcontrol-'+num+'-'+venta).val())){
                    $('#fcontrol-'+num+'-'+venta).val('');
                    alert('Nro de control Inicial superior al Nro de control Final ');
                }else{
                    if($('#fcontrol-'+num+'-'+venta).val()!=''){
                        $.ajax({
                            type: 'post',
                            url: 'index.php',
                            data: 'opcion=admProForma&tarea=verificar_certificado&certificado='+$('#fcontrol-'+num+'-'+venta).val()+'&acuerdo='+$('#servicio-'+num).val(),
                            success: function (data) {
                                dt = eval('('+data+')');
                                if(dt[0].suceso !=0 ){
                                    alert('Nro de control '+$('#fcontrol-'+num+'-'+venta).val()+' vendido');
                                    if($('#icontrol-'+num+'-'+venta).val() != ''){
                                        $('#fcontrol-'+num+'-'+venta).val($('#icontrol-'+num+'-'+venta).val());
                                    }else{
                                        $('#fcontrol-'+num+'-'+venta).val('');
                                    }
                                }
                            }
                        });  
                    }
                }
            }); 
    }
    function agregarReposicion(num,estado){
        venta++;
        var campo=  '<div class="row-fluid form" id="tipo_campo-'+num+'">'+
                        '<input type="hidden" id="cantidadventa-'+num+'-'+venta+'" name="cantidadventa-'+num+'-'+venta+'" value="0"> '+
                        '<div class="span5" >'+
                            '<input min=1 id="icontrol-'+num+'-'+venta+'" name="icontrol-'+num+'-'+venta+'" type="number" class="k-textbox" placeholder="N° Control Repuesto"  required validationMessage="Ingrese N° Control Repuesto" >'+
                        ' </div>'+
                        '<div class="span5" >'+
                            '<input min=1 id="fcontrol-'+num+'-'+venta+'" name="fcontrol-'+num+'-'+venta+'" type="number" class="k-textbox" placeholder="N° Control a Reponer"  required validationMessage="Ingrese N° Control Reponer" >'+
                        ' </div>'+
                        ((estado)? 
                        '<div class="span1" >'+
                            '<img src="styles/img/del_dark.png" id="celiminar-'+num+'-'+venta+'" alt="eliminar servicio" onclick="eliminarCampo(this,2)" height="28" width="28">'+
                        '</div>' : '') +
                    '</div>'+
                    '<div class="row-fluid form" >'+ 
                            '<input type="radio" checked name="tipoerror-'+num+'-'+venta+'" value="1">Error Impresión'+
                            '<br><input type="radio" name="tipoerror-'+num+'-'+venta+'" value="2">Error funcionario'+
                    '</div>';
        $('#cuerpo-tipo_campo-'+num).append(campo);
        $('#cantidad-tipo_campo-'+num).val(parseInt($('#cantidad-tipo_campo-'+num).val())+1);
        OnKeyUp(num,venta, 2);
        array_ventas.push(venta);
    }
    function agregarCantidad(num){
        var campo=
                        '<div class="span5" >'+
                            '<input min=1 id="cantidad-'+num+'"  name="cantidad-'+num+'"  type="number" class="k-textbox" placeholder="Cantidad"  required validationMessage="Ingrese una Cantidad" >'+
  
                        '</div><br><br>';
        $('#cuerpo-tipo_campo-'+num).append(campo);
        $('#cantidad-tipo_campo-'+num).val(parseInt($('#cantidad-tipo_campo-'+num).val())+1);
        OnKeyUp(num,0, 3);
        // $('#cantidad-tipo_campo-'+num).val(parseInt($('#cantidad-tipo_campo-'+num+).val())+1);
    }
    function agregarCPublico(num,estado){
        venta++;
        var campo=  '<div class="row-fluid form" id="tipo_campo-'+num+'">'+
                        '<input type="hidden" id="cantidadcp-'+num+'-'+venta+'" name="cantidadcp-'+num+'-'+venta+'" value="1"> '+
                        '<div class="span5" >'+
                            '<input id="hora-'+num+'-'+venta+'" name="hora-'+num+'-'+venta+'" style="width:100%;" placeholder="Nro Control Inicial"  required validationMessage="Ingreser Nro control Inicial" >'+
                        ' </div>'+
                        '<div class="span5" >'+
                            '<input id="minuto-'+num+'-'+venta+'" name="minuto-'+num+'-'+venta+'" style="width:100%;" placeholder="Nro Control Final"  required validationMessage="Ingreser Nro Control Final" >'+
                        ' </div>'+
                        ((estado)? 
                        '<div class="span1" >'+
                            '<img src="styles/img/del_dark.png" id="celiminar-'+num+'-'+venta+'" alt="eliminar servicio" onclick="eliminarCampo(this,4)" height="28" width="28">'+
                        '</div>' : '') +
                    '</div>';
        $('#cuerpo-tipo_campo-'+num).append(campo);
        $('#cantidad-tipo_campo-'+num).val(parseInt($('#cantidad-tipo_campo-'+num).val())+1);
        comboHora(num, venta);
        comboMinuto(num, venta);
        array_cpublico.push(venta);
        totalCPC(num, venta);
        total();
    }
    function tipoCPC(num, venta){
        if($("#hora-"+num+"-"+venta).data("kendoComboBox").value()!='' && $("#minuto-"+num+"-"+venta).data("kendoComboBox").value()!=''){
            //alert($("#minuto-"+num+"-"+venta).data("kendoComboBox").value());
            if($("#hora-"+num+"-"+venta).data("kendoComboBox").value()=='0' && $("#minuto-"+num+"-"+venta).data("kendoComboBox").value()=='-1'){
                 $("#minuto-"+num+"-"+venta).data("kendoComboBox").value('0');
            }
           
                var cantidad = 0;
           
                cantidad = (parseInt($("#hora-"+num+"-"+venta).data("kendoComboBox").value()) * 60) / parseInt($("#serviciocosto-"+num).val());
                cantidad += parseInt($("#minuto-"+num+"-"+venta).data("kendoComboBox").value()) % parseInt($("#serviciocosto-"+num).val()) + 1;
                $('#cantidadcp-'+num+'-'+venta).val(parseInt(cantidad));
                //alert(parseInt($("#minuto-"+num+"-"+venta).data("kendoComboBox").value()) +' ' +parseInt($("#serviciocosto-"+num).val()) );
                totalCPC(num, venta);
                total();
            
        }
    }
    function totalCPC(num, venta){
        //var serviciocosto = $('#serviciocosto-'+num);
        //var serviciocostolabel = $('#serviciocostolabel-'+num);
        
        var res=0;
        var fLen = array_cpublico.length;
        
        for (i = 0; i < fLen; i++) {
            if($('#cantidadcp-'+num+'-'+array_cpublico[i]).length){
                res += parseInt($('#cantidadcp-'+num+'-'+array_cpublico[i]).val());
            }else{
                
                if(i != -1) {
                    array_cpublico.splice(i, 1);
                }
                total();
            }
        }
        $('#cantidad-tipo_campo-'+num).val(res);
        //$('#cantidad-tipo_campo-'+x[1]).val(parseInt($('#cantidad-tipo_campo-'+x[1]).val())- 1);
        var sum = parseInt($('#cantidad-tipo_campo-'+num).val() ) * parseInt( $('#serviciocosto-'+num).val() );
        //alert(parseInt($('#cantidad-tipo_campo-'+num).val() )+ ' * '+ parseInt( $('#serviciocosto-'+num).val() ));
        $('#serviciocostolabel-'+num).text('Bs. '+sum+',00');
    }
    function comboHora(num,venta){
        $("#hora-"+num+"-"+venta).kendoComboBox({
            dataTextField: "text",
            dataValueField: "value",
            dataSource: [
                { text: "0 hrs", value: "0" },
                { text: "1 hrs", value: "1" },
                { text: "2 hrs", value: "2" },
                { text: "3 hrs", value: "3" },
                { text: "4 hrs", value: "4" },
                { text: "5 hrs", value: "5" },
                { text: "6 hrs", value: "6" },
                { text: "7 hrs", value: "7" },
                { text: "8 hrs", value: "8" }
            ],
            filter: "contains",
            suggest: true,
            index: 0,
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) {
                    this.value('');
                }else{
                   tipoCPC(num, venta);
                }
            }
        });
        
    }
    function comboMinuto(num,venta){
        $("#minuto-"+num+"-"+venta).kendoComboBox({
            dataTextField: "text",
            dataValueField: "value",
            dataSource: [
                { text: "0 min", value: "-1" },
                { text: "15 min", value: "0" },
                { text: "30 min", value: "1" },
                { text: "45 min", value: "2" },
                //{ text: "60 min", value: "4" },
            ],
            filter: "contains",
            suggest: true,
            index: 1,
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) {
                    this.value('');
                }else{
                    tipoCPC(num, venta);
                }
            }
        });

    }
    function definirCampo(num,estado){
        var item=$('#servicio-'+num).val();
        $("#tipo_campo-"+num).html('');
        
        if(item>=11 && item <=16){
            Campos(num,estado,2);
        }
        if(item>=22 && item <= 52){
            Campos(num,estado,1);
        }
        if(item>=53 && item <= 58){
            Campos(num,estado,5);
        }
        if(item>=59 && item<=60 || item == 4){
            Campos(num,estado,6);
        }
        if(item>=61 && item <= 72){
            if(item==67){
                Campos(num,estado,4);
            }else{
                Campos(num,estado,3);
            }
        }
    }
    function eliminarCampo(ele,num){
        var x=$(ele).attr('id').split('-');
        if(num==2) {
            $('#cantidad-tipo_campo-'+x[1]).val(parseInt($('#cantidad-tipo_campo-'+x[1]).val())- parseInt( $('#cantidadventa-'+x[1]+'-'+x[2]).val() ));
        }
        if(num==4){
            $('#cantidad-tipo_campo-'+x[1]).val(parseInt($('#cantidad-tipo_campo-'+x[1]).val())- parseInt( $('#cantidadcp-'+x[1]+'-'+x[2]).val() ));
            $('#cantidad-tipo_campo-'+x[1]).val(parseInt($('#cantidad-tipo_campo-'+x[1]).val()) + 1);
            var i = array_cpublico.indexOf(parseInt(x[2]));
            if(i != -1) {
                array_cpublico.splice(i, 1);
            }
        }
        $('#cantidad-tipo_campo-'+x[1]).val(parseInt($('#cantidad-tipo_campo-'+x[1]).val())- 1);
        
        var sum = parseInt($('#cantidad-tipo_campo-'+x[1]).val() ) * parseInt( $('#serviciocosto-'+x[1]).val() );
        
        $('#serviciocostolabel-'+x[1]).text('Bs. '+sum+',00');
        //alert($('#cantidad-tipo_campo-'+x[1]).val());
        $(ele).parent().parent().remove();
        total();
    }
    function eliminar(elem,num){
        var i = arraytotal.indexOf(num);
        if(i != -1) {
            arraytotal.splice(i, 1);
        }
        total();
        $(elem).parent().parent().remove();
    }
    function agregarDepositos(estado){
        depo++;
        
        var campo=
                '<div class="row-fluid  form" id="deposito-'+depo+'" name="deposito-'+depo+'">'+
                    '<!--div class="span1 hidden-phone" ></div-->'+
                    '<div class="span3" >'+
                        '<input min=0 type="number" class="k-textbox" name="numero-deposito-'+depo+'"id="numero-deposito-'+depo+'" value="" placeholder="Número Depósito"  required validationMessage="Ingrese Número Deposito"/>'+
                    '</div>'+
                    '<div class="span3" >'+
                        '<input type="date" class="k-textbox" name="fecha-deposito-'+depo+'" id="fecha-deposito-'+depo+'" value="" placeholder="dd/mm/aaaa"  required validationMessage="Ingrese Fecha Deposito"/>'+
                    '</div>'+
                    '<div class="span3" >'+
                        '<input min=0 type="number" class="k-textbox" name="monto-deposito-'+depo+'" id="monto-deposito-'+depo+'" value="" placeholder="Monto Deposito"  required validationMessage="Ingrese Monto Deposito"/>'+
                    '</div>'+
                    '<div class="span2" ><input type="checkbox" name="chx-'+depo+'" id="chx-'+depo+'" onchange="observarDeposito('+depo+')">Observado</div>'+
                    ((estado)? 
                        '<div class="span1" >'+
                            '<img src="styles/img/del_dark.png" id="deliminar-'+depo+'" alt="eliminar servicio" onclick="eliminardeposito(this,'+depo+')" height="28" width="28">'+
                        '</div>' : '') +
                '</div>'+
                '<div class="row-fluid  form" id="div_deposito_verificacion-'+depo+'">'+
                  
                    '<div class="span1 hidden-phone" ></div>'+
                    '<div class="span3"  >'+
                        '<input min=0 type="hidden" class="k-textbox" name="numero-deposito-'+depo+'-verif"id="numero-deposito-'+depo+'-verif" value="" placeholder="verificar Depósito"  required validationMessage="Verifique el número de deposito"/>'+
                    '</div>'+
                    '<div class="span7" id="div_deposito_observacion-'+depo+'" >'+
                        '<input type="text" class="k-textbox" name="deposito_observacion-'+depo+'" id="deposito_observacion-'+depo+'" value="" placeholder="Observacion del depósito" validationMessage="Ingrese una observación"/>'+
                    '</div>'+
                   
                '</div>';
        
        $("#gral_depositos").append(campo);
        ocultar('numero-deposito-'+depo+'-verif');
        ocultar('deposito_observacion-'+depo);
        actionMonto(depo);
        actionNumero(depo);
        actionVerificacion(depo);
        array_depositos.push(depo);
        verificarDeposito(depo);
    }
    var sw_deposito = false;
    function verificarDeposito(depo){
        $('#numero-deposito-'+depo)
            .focusout(function(){
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admDeposito&tarea=existe_deposito&codigo_deposito='+$('#numero-deposito-'+depo).val(),
                    success: function (data) {
                        var dt=eval("("+data+")");
                        if(dt[0].suceso != 0){
                            alert('El n\u00FAmero de dep\u00F3sito '+$('#numero-deposito-'+depo).val()+' ya fue registrado');
                            $('#numero-deposito-'+depo).val('');
                            sw_deposito = true;
                        }
                    }
                });
            })
    }
    function observarDeposito(nro){
      if($('#chx-'+nro)[0].checked){
            mostrar('deposito_observacion-'+nro);
        }else{
            $('#numero-deposito-'+nro+'-verif').attr('type','hidden');
            ocultar('deposito_observacion-'+nro);
        }
    }
    function actionNumero(nro){
        $('#numero-deposito-'+nro)
                    .focusout(function(){
                        validarNumeroDeposito(nro);
                    /*})
                    .change(function(){
                       validarNumeroDeposito(nro);*/
                    });
    }
    function actionVerificacion(nro){
        $('#numero-deposito-'+nro+'-verif')
            .focusout(function(){
                if( $('#numero-deposito-'+nro).val() != $('#numero-deposito-'+nro+'-verif').val() ){
                    $('#numero-deposito-'+nro+'-verif').val('');
                    //$('#numero-deposito-'+nro+'-verif').attr('required','required');
                }else{
                    $('#numero-deposito-'+nro+'-verif').removeAttr('required');
                    ocultar('numero-deposito-'+nro+'-verif');
                }
            });
    }
    function validarNumeroDeposito(nro){
        
        if($('#numero-deposito-'+nro).val()!=0){
            $('#numero-deposito-'+nro+'-verif').removeAttr('type');
            //$('#numero-deposito-'+nro+'-verif').attr('type','number');
            $('#numero-deposito-'+nro+'-verif').attr('required',"required");
            $('#numero-deposito-'+nro+'-verif').val('');
            mostrar('numero-deposito-'+nro+'-verif');
        }else{
            $('#numero-deposito-'+nro+'-verif').val('0');
            $('#numero-deposito-'+nro+'-verif').removeAttr('required');
            //$('#numero-deposito-'+nro+'-verif').attr('type','hidden');
            ocultar('numero-deposito-'+nro+'-verif');
            
            
        }
    }
    function actionMonto(nro){
      $('#monto-deposito-'+nro)
                    .keyup(function(){
                        totalDepositos();
                    })
                    .change(function(){
                        totalDepositos();
                    });
    }
    function eliminardeposito(ele,nrodepo){
        $('#div_deposito_verificacion-'+nrodepo).remove();
        var i = array_depositos.indexOf(nrodepo);
        if(i != -1) {
            array_depositos.splice(i, 1);
        }
        $(ele).parent().parent().remove()
    }
    function totalDepositos(){
        var res=0;
        var fLen = array_depositos.length;
        for (i = 0; i < fLen; i++) {
            if( $('#monto-deposito-'+array_depositos[i]).val()!=''){
                var montodeposito= $('#monto-deposito-'+array_depositos[i]).val();
                res+= parseInt(montodeposito);
            }
        }
        $('#total-depositos').val(res);
        $('#total-depositoslabel').text('Bs. '+res+',00');
        var x1 = parseInt( $('#total-depositos').val() );
        var x2 = parseInt( $('#total_facturar').val() );
        facturar.enable( x1 >= x2 );
    }
    if (<?php echo $_smarty_tpl->tpl_vars['fmsucursal']->value;?>
==11){
        $('#sucursal').kendoComboBox({
            placeholder:"Seleccione una Regional",
            ignoreCase: true,
            dataTextField: "value",
            dataValueField: "Id",
            dataSource: [
            <?php  $_smarty_tpl->tpl_vars['regional'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['regional']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaRegionales']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['regional']->key => $_smarty_tpl->tpl_vars['regional']->value) {
$_smarty_tpl->tpl_vars['regional']->_loop = true;
?> 
                 { value: "<?php echo $_smarty_tpl->tpl_vars['regional']->value->getCiudad();?>
", Id: <?php echo $_smarty_tpl->tpl_vars['regional']->value->getId_regional();?>
 },
            <?php } ?>  
            ],
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) {
                    this.text('');
                }else{
                    $('#fmsucursal').val(this.value());
                    $('#titulofactura').html('Facturar Servicios - '+this.text());
                     if(this.value()!='' &&  $("#ruex_lista").val()!=''){
                        if($("#ruex_lista").val()!=-1){
                            verServicios($("#ruex_lista").val());
                        }else{
                            $('#ci_combo').removeAttr('required');
                        }
                        cambiar('formfmsucursal','mostrarfacturamanual');
                    }
                    //cambiar('formfmsucursal','mostrarfacturamanual');
                }
            }
        });
        var sucursal = $("#sucursal").data("kendoComboBox");
    }
    //*********************CREA UNA VENTANA PARA EL REGISTRO DE EMPRESAS EN LA FACTURACION******************//
    function create_empresa_ventana(){
        if($('#div_empresa_ventana').html()==''){
            var campo=
                    '<div id="empresa_ventana">'+
                    '<form name="empresa_form" id="empresa_form" method="post" action="index.php">'+
                        '<div class="titulo">Registrar Empresa</div><br>'+
                        '<div class="row-fluid form" id="empresa_aviso"></div>'+
                        '<div class="row-fluid form">'+
                            '<input type="text" class="k-textbox" id="empresa_nit" name="empresa_nit" style="width:100%;" placeholder="NIT/C.I." required validationMessage="Ingrese la ciudad donde se encuentra la Fábrica"><br><br>'+
                            '<input type="text" class="k-textbox" id="empresa_nombre" name="empresa_nombre" style="width:100%;" placeholder="Nombre de la Persona/Empresa" required validationMessage="Nombre de la Persona/Empresa"><br><br>'+
                            '<input type="text" class="k-textbox" id="empresa_ruex" name="empresa_ruex" style="width:100%;" placeholder="N° de RUEX" required validationMessage="Número de RUEX">'+
                        '</div>'+
                        '<div class="row-fluid form">'+
                            '<input id="empresaaceptar" type="button"  value="Aceptar" class="k-primary" style="width:40"/> '+
                            '<input id="empresacancelar" type="button"  value="Cancelar" class="k-primary" style="width:40"/> '+
                        '</div>'+
                    '</form>'+
                '</div>';
            $('#div_empresa_ventana').append(campo);
            ventana('empresa_ventana','350','410');
            $("#empresaaceptar").kendoButton();
            $("#empresacancelar").kendoButton();
            var empresaaceptar = $("#empresaaceptar").data("kendoButton");
            var empresacancelar = $("#empresacancelar").data("kendoButton");

            empresacancelar.bind("click", function(e){
                $('#nit').focus();
                $('#empresa_ventana').data("kendoWindow").close();
                $('#empresa_ventana').remove();
            });

            empresaaceptar.bind("click", function(e){
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: $('#empresa_form').serialize()+'&opcion=admEmpresa&tarea=agregarEmpresa',
                    success: function (data) {
                        var dt=eval("("+data+")");
                        $('#empresa_texto').html(dt[0].nombre);
                        $('#empresa_id').val(dt[0].id);
                        mostrar('empresa_texto');

                    }
                }); 
                $('#empresa_ventana').data("kendoWindow").close();
                $('#empresa_ventana').remove();
                $('#nit').focus();
            });
        }
    }
    //*********************CREA UNA VENTANA PARA LA CREACION DE PERSONAS EN LA FACTURACION******************//
    function create_persona_ventana(){
        if($('#div_persona_ventana').html()==''){
            var campo = 
                '<div id="persona_ventana">'+
                    '<form name="persona_form" id="persona_form" method="post" action="index.php">'+
                        '<div class="titulo">Agregar Persona</div><br>'+
                        '<div class="row-fluid form">'+
                            '<input type="text" class="k-textbox" id="persona_ci" name="persona_ci" style="width:100%;" placeholder="NIT/C.I." required validationMessage="Ingrese la ciudad donde se encuentra la Fábrica"><br><br>'+
                            '<input type="text" class="k-textbox" id="persona_nombre" name="persona_nombre" style="width:100%;" placeholder="Nombres" required validationMessage="Nombres"><br><br>'+
                            '<input type="text" class="k-textbox" id="persona_apaterno" name="persona_apaterno" style="width:100%;" placeholder="Apellido Paterno" required validationMessage="APellido Paterno"><br><br>'+
                            '<input type="text" class="k-textbox" id="persona_amaterno" name="persona_amaterno" style="width:100%;" placeholder="Apellido Materno" required validationMessage="Apellido Materno">'+
                        '</div>'+
                        '<div class="row-fluid form">'+
                            '<input id="personaaceptar" type="button"  value="Aceptar" class="k-primary" style="width:40"/> '+
                            '<input id="personacancelar" type="button"  value="Cancelar" class="k-primary" style="width:40"/> '+
                        '</div>'+
                    '</form>'+
                '</div>';
            $('#div_persona_ventana').append(campo);
            ventana('persona_ventana','350','410');
            $("#personaaceptar").kendoButton();
            $("#personacancelar").kendoButton();
            var personaaceptar = $("#personaaceptar").data("kendoButton");
            var personacancelar = $("#personacancelar").data("kendoButton");

            personacancelar.bind("click", function(e){
                $('#ci').focus();
                $('#persona_ventana').data("kendoWindow").close();
                $('#persona_ventana').remove();
            });

            personaaceptar.bind("click", function(e){
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: $('#persona_form').serialize()+'&opcion=admPersona&tarea=agregarPersona',
                    success: function (data) {
                        var dt=eval("("+data+")");
                        $('#persona_texto').html(dt[0].nombre);
                        $('#persona_id').val(dt[0].id);
                        mostrar('persona_texto');
                    }
                }); 
                $('#ci').focus();
                $('#persona_ventana').data("kendoWindow").close();
                $('#persona_ventana').remove();
                //window.open('index.php?'+$('#persona_form').serialize()+'&opcion=admPersona&tarea=agregarPersona', 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
            });
        }
    }
    //*********************CREA UNA VENTANA EMERGENTE PARA LA ASIGNACION DE DEPOSITOS******************//
    function create_deposito_ventana(){
        array_depositos = new Array();
        var campo ='<div class="row-fluid fadein" id="ventanadeposito">'+
                    '<div class="span12" >'+
                        '<div class="row-fluid" >'+
                            '<div class="k-block fadein">'+
                                '<div class="k-header">'+
                                    '<div class="row-fluid  form" >'+
                                        '<div class="span12" ><div class="titulonegro" >Registrar Depósitos</div></div>'+
                                    '</div>'+
                                '</div>'+
                                '<form name="formdepositos" id="formdepositos" method="post"  action="index.php" >'+
                                    '<div class="k-cuerpo">'+
                                        '<div id="gral_depositos"></div>'+
                                        '<div class="row-fluid form" >'+
                                            '<div class="span3" ><center><label >Monto a Facturar :</label></center></div>'+
                                            '<div class="span2 campo" ><label name="depototal_facturarlabel" id="depototal_facturarlabel"></label></div>'+
                                            '<div class="span3" ><center><label >Total Depósitos :</label></center></div>'+
                                            '<div class="span2 campo" ><label name="total-depositoslabel" id="total-depositoslabel">Bs. 0</label></div>'+
                                            '<div class="span1" ><img src="styles/img/add.png" id="cagregardepositos"  onclick="agregarDepositos(true)" height="28" width="28"></div>'+
                                        '</div>'+
                                        '<div class="row-fluid form" ><div class="barra" ></div></div>'+
                                        '<div class="row-fluid  form" >'+
                                            '<div class="span2 hidden-phone"></div>'+
                                            '<div class="span4"><input id="depositoaceptar" type="button" value="Aceptar" class="k-primary" style="width:100%"/> <br> <br></div>'+
                                            '<div class="span4"><input id="depositocancelar" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br></div>'+
                                        '</div>'+
                                    '</div>'+
                                '</form>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
        
                $('#div_deposito_ventana').append(campo);
                agregarDepositos(false);
                ventana('ventanadeposito','500','700');
                
                $('#depototal_facturarlabel').text($('#total').text());
                $("#depositoaceptar").kendoButton();
                $("#depositocancelar").kendoButton();
                
                var depositocancelar = $("#depositocancelar").data("kendoButton");
                var depositoaceptar = $("#depositoaceptar").data("kendoButton");
                var formdepositos = $("#formdepositos").kendoValidator().data("kendoValidator");
                depositoaceptar.bind("click", function(e){
                    if(formdepositos.validate()){
                        var x1 = parseInt( $('#total-depositos').val() );
                        var x2 = parseInt( $('#total_facturar').val() );
                        //alert(x1==x2 ) ;
                        if( x1 >= x2 ){
                            facturar.enable(true);
                            cadena_depositos = $("#formdepositos").serialize();
                            $('#ventanadeposito').data("kendoWindow").close();
                            $('#ventanadeposito').remove();
                            //deposito_ventana.close();
                        }else{
                            //advertir que no son iguales el total de la factura con el total de los depositos
                        }
                    }
                });
                depositocancelar.bind("click", function(e){
                    $("#ventanadeposito").data("kendoWindow").close();
                    $('#ventanadeposito').remove();

                });
    }
    function ventana(nombre, h, w){
        $("#"+nombre).kendoWindow({
            draggable: false,
            height: h+"px",
            width: w+"px",
            resizable: false,
            modal: true,
            actions: [],
            animation: {
                close: {
                  effects: "fade:out",
                  duration: 1000
                }
            }
        }).data("kendoWindow").center().open();
    }
//******************************PARA LISTAR LOS RUEX*******************************//
//
    //*********************CARGA UNA COMBOBOX CON LA LISTA DE LOS RUEX VIGENTES******************//
    $("#ruex_lista").kendoComboBox({
        placeholder:"Seleccione Empresa o digite el Nro RUEX",
        dataTextField: "descripcion",
        dataValueField: "id_empresa",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admProForma&tarea=listar_ruexs"
                }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) {
                    this.text('');
            }else{
                vortex = ($('#ruex_lista').val()==-1)? 0:1;
                $('#titulofactura').html('Facturar Servicios - '+this.text());
                if(this.value()!='' &&  $("#sucursal").val()!=''){
                    if(this.value()!=-1){
                        verServicios(this.value());
                    }else{
                        $('#ci_combo').removeAttr('required');
                    }
                    cambiar('formfmsucursal','mostrarfacturamanual');
                }
            }
        }
    }).data("kendoComboBox");

    var vortex = 0;
    //*********************ENVIA UNA LISTA DE SERVICIOS JSON PARA LA VISTA******************//
    function verServicios(id_empresa){
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admProForma&tarea=verServicios&id_empresa='+id_empresa,
            success: function (data) {
                cargarServicios(data);
            }
        }); 
    }
    
    //*********************CALCULA EL TOTAL DE LA FACTURACION******************//
    function total(){
        var res=0;
        var fLen = arraytotal.length;
        //res=parseInt($('#total_facturar').val()) + parseInt($('#total_facturar_chkbx').val());
        for (i = 0; i < fLen; i++) {
            var serviciocosto = $('#serviciocosto-'+arraytotal[i]).val();
            var cantidad = $('#cantidad-tipo_campo-'+arraytotal[i]).val();
            //alert(parseInt(serviciocosto));
            if(!isNaN(parseInt(cantidad))){
                res+= parseInt(serviciocosto) * parseInt(cantidad);
            }
        }
        var sum = res + parseInt($('#total_facturar_chkbx').val());
        $('#total_facturar').val(sum);
        $('#total').text('Bs. '+sum+',00');
        var x1 = parseInt( $('#total-depositos').val() );
        var x2 = parseInt( $('#total_facturar').val() );
        facturar.enable( x1 >= x2 );
        //ver_depositos.enable(parseInt($('#total_facturar').val())>0);
        //return suma;
    }
    
    //*********************CALCULA EL TOTAL DE LOS SERVICIOS TICKEADOS ******************//
    function calcularTotal_chkbx(id,checked){
        if(checked){
            $('#total_facturar_chkbx').val(parseInt($('#total_facturar_chkbx').val()) + parseInt( $('#chkmonto-'+id).val() ));
        }else{
            $('#total_facturar_chkbx').val(parseInt($('#total_facturar_chkbx').val()) - parseInt( $('#chkmonto-'+id).val() ));
        }
        total();
    }
    //*********************CARGA UNA LISTA DE CHECKBOXS CON LOS SERVICIOS PENDIENTES******************//
    function cargarServicios(data){
        mostrar('vortex_gral');
        ocultar('div_empresa');
        ocultar('div_persona');
        mostrar('div_persona_combo');
        var campo ='';
        var dt=eval("("+data+")");
        var fLen = dt.length;
        for (i = 0; i < fLen; i++) {
            $('#titulofactura').html('Facturar Servicios - '+ dt[i].razon_social);
            campo += '<div class="row-fluid form" >'+
                        '<div class="span1 hidden-phone" ></div>'+
                        '<div class="span2 campo" >'+dt[i].fecha_servexp+'</div>'+
                        '<div class="span6 campo" >'+ dt[i].nombre_servicio+'</div>'+
                        '<div class="span1 campo" >Bs. '+dt[i].costo_actual+'</div>'+
                        '<input type="hidden" id="chkmonto-'+dt[i].id_servicio_exportador+'" name="chkmonto-'+dt[i].id_servicio_exportador+'" value="'+dt[i].costo_actual+'"> '+
                        '<div class="span1" >'+
                           '<input class="span3" type="checkbox" name="serexp-'+dt[i].id_servicio_exportador+'" id="serexp-'+dt[i].id_servicio_exportador+'" value="'+dt[i].id_servicio_exportador+'" onclick="calcularTotal_chkbx('+dt[i].id_servicio_exportador+',this.checked)" >'+
                        '</div>'+
                    '</div>';
        }
        //campo += '<div class="row-fluid form" ><div class="barra" ></div></div>';
        $("#vortex_gral").append(campo);

        $('#ci').removeAttr('required');
        $('#nit').removeAttr('required');

        $("#ci_combo").kendoComboBox({
            placeholder:"Persona Habilitada",
            dataTextField: "descripcion",
            dataValueField: "id_empresa_persona",
            dataSource: {
                transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admEmpresa&tarea=listarPersonalHabilitado&id_empresa="+$("#ruex_lista").val()
                    }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) {
                        this.text('');
                }else{

                }
            }
        }).data("kendoComboBox");
       
    }
    
    $('#fmc_nro').focusout(function() {
        if($('#fmc_nro').val()!=''){
            $.ajax({
                type: 'post',
                url: 'index.php',
                data: 'opcion=admProForma&tarea=verificar_factura_contingencia&numero_factura='+$('#fmc_nro').val()+'&id_regional='+$('#sucursal').val(),
                success: function (data) {
                    var dt = eval('('+data+')');
                    if(dt[0].suceso !=0){
                        alert('Numero de factura ya Utilizado');
                        $('#fmc_nro').val('');
                    }else{

                    }
                }
            });  
        }
    });
<?php echo '</script'; ?>
><?php }} ?>
