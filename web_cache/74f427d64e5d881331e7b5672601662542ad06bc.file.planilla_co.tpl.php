<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-27 16:21:59
         compiled from "/enex/web1/sitio/web/vista/admPlanilla/planilla_co.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181610575259354cfc4318b0-70458512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74f427d64e5d881331e7b5672601662542ad06bc' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admPlanilla/planilla_co.tpl',
      1 => 1532722820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181610575259354cfc4318b0-70458512',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59354cfc4a2808_57596742',
  'variables' => 
  array (
    'fmsucursal' => 0,
    'v1' => 0,
    'v4' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59354cfc4a2808_57596742')) {function content_59354cfc4a2808_57596742($_smarty_tpl) {?>
<div class="row-fluid  form" id="planilla_registro">
    <div class="row-fluid "   >
        <div class="span12" >
            <div class="k-block fadein">
                
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" id="titulo" > </div>
                        </div>
                    </div>
                </div>
                 <form name="formPlanillaCO" id="formPlanillaCO" method="post"  action="index.php">
                    <input type="hidden" name="fmsucursal" id="fmsucursal" value="<?php echo $_smarty_tpl->tpl_vars['fmsucursal']->value;?>
" />
                    <input type="hidden" name="opcion" id="opcion" value="admPlanilla" />
                    <input type='hidden' name='xx' id='xx' value='0'>
                    <input type='hidden' name='yy' id='yy' value='0'>
                    <input type='hidden' name='xco' id='xco' value='0'>

                    <div class="row-fluid  form" id="cabecera" name="cabecera">    
                    </div>

                    <div class="row-fluid  form" id="cuerpo" name="cuerpo">
                    </div>
                    <div class="row-fluid  form" id="pie" name="pie">
		    <div class="row-fluid  form" id="informa_paso" name="informa_paso">
                    </div>

                    </div>
                 </form>
                    <div class="row-fluid  form" >
                        <div class="span4 hidden-phone"></div>
                        <div class="span2">
                            <input id="CancelarCO" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                        </div>
                        <div class="span2">
                            <input id="guardarCO" type="button" value="Guardar" class="k-primary" style="width:100%"/> <br> <br>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="row-fluid  form" id="planilla_tipo">
    <div class="row-fluid "   >
        <div class="span2 hidden-phone" ></div>
        <div class="span8" >
            <div class="k-block fadein">
                
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > PLANILLAS C.O.</div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid  form" >
                    <div class="span4" hidden-phone></div>
                    <div class="span4" >
                        <input style="width:100%;" id="tipo_planilla" name="tipo_planilla" required validationMessage="Seleccione Tipo planilla">
                    </div>
                </div>
                 <div class="row-fluid  form" >
                    <div class="span4" hidden-phone></div>
                    <div class="span4" >
                        <input id="volver" type="button" value="volver" class="k-primary" style="width:100%"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="div_aviso_ventana"></div>


<div id="div_aviso_ventana"></div>
<div id="planilla_registro_ddjj">
    <?php echo $_smarty_tpl->getSubTemplate ("admPlanilla/planilla_addddjj.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
</div>

<?php echo '<script'; ?>
>
ocultar("planilla_registro_ddjj");
    if(<?php echo $_smarty_tpl->tpl_vars['v1']->value;?>
>0){
        $("#tipo_planilla").val(2);

        ocultar("planilla_tipo");
        mostrar("planilla_registro");
        addHead();
        var nro_folder = <?php echo $_smarty_tpl->tpl_vars['v4']->value;?>
;
        var nro_sucursal = <?php echo $_smarty_tpl->tpl_vars['v1']->value;?>
;
        $("#fmsucursal").val(parseInt(nro_sucursal));
        $("#nro_folder_co").val(parseInt(nro_folder));
        $("#sucursal").val(parseInt(nro_sucursal));
        addFila(true);
        cargarFolderCO(parseInt(nro_folder), $("#tipo_planilla").val(), true, true);
    } else {
        ocultar("planilla_registro");
    }

    var num = 1;
    var ddjj_fila=1;
    $("#guardarCO").kendoButton();
    $("#CancelarCO").kendoButton();
    
    var guardarCO = $("#guardarCO").data("kendoButton");
    var CancelarCO = $("#CancelarCO").data("kendoButton");
    
    var validator = $("#formPlanillaCO").kendoValidator().data("kendoValidator");
    guardarCO.bind("click", function(e){
        if(validator.validate()){
            if($("#tarea").val()=='RegistrarCO'){ 
                $("#informa_paso").empty();
                // var sw = 0;
                // var sw1 = 0;
                // for (i = 1; i < num; i++) {

                //     if($("#nro_control-"+i).val()){
                //         var tipo_ser = $("#tipo-"+i).val();
                //         var nro_ser= $("#nro_control-"+i).val();
                //         var texto = "";
                //         var sw2 =0;
                //         $.ajax({
                //             type: 'post',
                //             url: 'index.php',
                //             data: 'opcion=admProForma&tarea=verificarCO&tipo='+tipo_ser+'&nro_ctrl='+nro_ser,
                //             success: function (data) {
                //                 var dt=eval("("+data+")");
                //                 console.log(dt[0].nro_ctrl);
                //                 if(dt[0].suceso==1){
                //                     if (dt[0].dias > 120){
                //                         texto = "Certificado con n鷐ero de control "+dt[0].nro_ctrl+" Fuera de Plazo - "+dt[0].dias+" d韆s<br>";
                //                         sw = 1;   sw2 = 1;
                //                     }
                                    
                //                 }else{
                //                     texto = "No se encontro ning鷑 certificado con con numero de control:"+dt[0].nro_ctrl+" <br>";
                //                     sw = 1;     sw2 = 1;
                //                 } 
                //                 if (sw2==1){
                //                     if (sw1==0) {
                //                         $("#informa_paso").append("<strong><font face='verdana' color='red'><u>OBSERVACION</u></font></strong><br>");  sw1=1;
                //                     }
                //                     $("#informa_paso").append("<strong><font face='verdana' color='red'>"+texto+"</font></strong>"+i);
                //                     sw2 = 0; 
                //                 }
                //                 console.log("sw: "+sw+" ei; "+i);
                                
                //             }
                //         });
                //     } else {
                //         console.log("refused: "+i);
                //     }
                        

                // }


                ///codigo que reemplazaraaaaa
                guardarCO.enable(false);
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: $("#formPlanillaCO").serialize(),
                    success: function (data) {
                        var dt=eval("("+data+")");
                        var texto = "";
                        var aviso = "";
                        if(dt[0].tipo==5){
                            $("#informa_paso").append("<strong><font face='verdana' color='red'>"+dt[0].mensaje+"</font></strong>");
                        } else {
                            aviso = dt[0].tipo==4? "Este folder ya Fue entregado" : 'Aviso '+ dt[0].aviso;
                            // texto = dt[0].tipo==3? (dt[0].suceso==2? "<p><h2>  </h2></p>":"" ) : "";
                            texto = "<p>N鷐ero de Folder :<strong> " + dt[0].numero_folder + " </strong></p>";
                            texto += "<p> Fecha de Registro : <strong>" + dt[0].fecha + "</strong></p>";
                            texto += "<p> Hora de Registro : <strong>" + dt[0].hora + "</strong></p>";
                            
                            crearVentanaCO(aviso, texto);
                            guardarCO.enable(true);
                        }
                        
                    }
                });
                guardarCO.enable(true);


            } else {
                guardarCO.enable(false);
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: $("#formPlanillaCO").serialize(),
                    success: function (data) {
                        var dt=eval("("+data+")");
                        var texto = "";
                        var aviso = "";
                        aviso = dt[0].tipo==4? "Este folder ya Fue entregado" : 'Aviso '+ dt[0].aviso;
                       // texto = dt[0].tipo==3? (dt[0].suceso==2? "<p><h2>  </h2></p>":"" ) : "";
                        texto = "<p>N鷐ero de Folder :<strong> " + dt[0].numero_folder + " </strong></p>";
                        texto += "<p> Fecha de Registro : <strong>" + dt[0].fecha + "</strong></p>";
                        texto += "<p> Hora de Registro : <strong>" + dt[0].hora + "</strong></p>";
                        
                        crearVentanaCO(aviso, texto);
                        guardarCO.enable(true);
                    }
                });
                guardarCO.enable(true);
            }
            

        }
    });    
   
    CancelarCO.bind("click", function(e){
        cerraractualizartab('Planilla C.O.','admPlanilla','show_planilla_co');
    });
    
    $("#volver").kendoButton();
    var volver = $("#volver").data("kendoButton");
    volver.bind("click", function(e){
        cerraractualizartab('Planillas','admPlanilla','show_planilla');
    });
    
    function crearVentanaCO(title, contenido){
        var campo =
                
                '<div class="row-fluid fadein" id="ventanaaviso">'+
                    '<div class="span12" >'+
                        '<div class="row-fluid  form" >'+
                            '<div class="span12" >'+
                                '<div class="titulo" id="titulo_aviso" >'+title+'</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row-fluid form" ><div class="barra" ></div></div>'+
                        '<div class="row-fluid" >'+
                            '<center>'+contenido+'</center>'+
                        '</div>'+
                        '<br>'+
                        '<div class="row-fluid form" ><div class="barra" ></div></div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span4 hidden-phone"></div>'+
                            '<div class="span4"><input id="avisoaceptar" type="button" value="Aceptar" class="k-primary" style="width:100%"/> </div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
        
        $('#div_aviso_ventana').append(campo);
        ventana('ventanaaviso','280','400');
        $("#avisoaceptar").kendoButton();
        var avisoaceptar = $("#avisoaceptar").data("kendoButton");
        avisoaceptar.bind("click", function(e){
            $("#ventanaaviso").data("kendoWindow").close();
            $("#cabecera").html("");
            $("#cuerpo").html("");
            $("#pie").html("");
            addHead();
            addFila(true);
            $('#ventanaaviso').remove();
            guardarCO.enable(true);
        });
    }
    function ventana(nombre, h, w){
        $("#"+nombre).kendoWindow({
            draggable: false,
            height: h+"px",
            width: w+"px",
            title: "About Alvar Aalto",
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
    
    
    function addHead(){
        var head = '';
        var pie = '';
        if($("#tipo_planilla").val()==1){
            head =
            '<input type="hidden" name="tarea" id="tarea" value="RegistrarCO" /> '+
            '<input type="hidden" id="empresa_co" name="empresa_co" value="">'+
            '<div class="row-fluid  form" >'+
                '<div class="span1 hidden-phone" ></div>'+
                '<div class="span2 parametro" >RUEX</div>'+
                '<div class="span2 ">'+
                    '<input style="width:100%;" id="ruex_co" name="ruex_co" required validationMessage="Ingrese un Nro RUEX">'+
                '</div>'+
               ('<?php echo $_smarty_tpl->tpl_vars['fmsucursal']->value;?>
'=='11'?
                    ('<div class="span6 ">'+
                        '<div class="span2 hidden-phone" ></div>'+
                        '<div class="span7" >'+
                            '<input style="width:100%;" id="sucursal" name="sucursal" required validationMessage="Seleccione una Regional"/>'+
                        '</div>'+
                    '</div>') : "" )+
            '</div>'+
            '<div class="row-fluid  form" >'+
                '<div class="span1 hidden-phone" ></div>'+
                '<div class="span2 parametro" >Razon social</div>'+
                '<div class="span7 "><input type="text" id="razon_social_co" name="razon_social_co" class="k-textbox " ></div>'+
            '</div>'+
            '<br>'+
            '<div class="row-fluid  form" >'+
                '<!--div class="span1 hidden-phone"></div-->'+
                '<div class="span2 parametro" >Nro Control</div>'+
                '<div class="span2 parametro" >Tipo CO</div>'+
                '<div class="span2 parametro" >Acuerdo</div>'+
                '<div class="span4 parametro" >observacion</div>'+
             '</div>';
            
            pie = '<div class="span11 hidden-phone" ></div>'+
                '<div class="span1" >'+
                    '<img src="styles/img/add.png" id="cagregar"  onclick="addFila(false,1)" height="28" width="28">'+
                '</div>';
        
            $("#cabecera").append(head);
            $("#pie").append(pie);
            
            ComboboxRUEX("#ruex_co");
            
            $("#razon_social_co").attr('readonly', true);
            $("#razon_social_co").attr('class','k-textbox k-state-disabled');
            
            if (<?php echo $_smarty_tpl->tpl_vars['fmsucursal']->value;?>
==11){
                $('#sucursal').kendoComboBox({
                    placeholder:"Seleccione una Regional",
                    ignoreCase: true,
                    dataTextField: "descripcion",
                    dataValueField: "id",
                    dataSource: { 
                        transport: {
                                read: {
                                    dataType: "json",
                                    url: "index.php?opcion=admPlanilla&tarea=list_regionales"
                                }
                        }
                    },
                    change : function (e) {
                        if (this.value() && this.selectedIndex == -1) {
                            this.text('');
                        }else{
                            $('#fmsucursal').val(this.value());
                        }
                    }
                });
                var sucursal = $("#sucursal").data("kendoComboBox");
            }
        }
        if($("#tipo_planilla").val()==2 || $("#tipo_planilla").val()==3){
            head =
            '<input type="hidden" name="tarea" id="tarea" value="' + ($("#tipo_planilla").val()==2? 'revisarFolderCO' : 'EntregarFolderCO')+ '" /> '+
            '<div class="row-fluid  form" >'+
                '<div class="span1 hidden-phone" ></div>'+
                '<div class="span2 parametro" >N煤mero de Folder</div>'+
                '<input type="hidden" id="empresa_co" name="empresa_co" value="">'+
                '<div class="span1 "><input type="text" id="nro_folder_co" name="nro_folder_co" class="k-textbox " placeholder="N掳 Folder" ></div>'+
                '<div class="span2 "><input id="cargar_folder" name="cargar_folder" type="button" value="Cargar Folder" class="k-primary" style="width:100%"/></div>'+
                 ('<?php echo $_smarty_tpl->tpl_vars['fmsucursal']->value;?>
'=='11'?
                    ('<div class="span6 ">'+
                        '<div class="span2 hidden-phone" ></div>'+
                        '<div class="span7" id="form_sucursal">'+
                            '<input style="width:100%;" id="sucursal" name="sucursal" required validationMessage="Seleccione una Regional"/>'+
                        '</div>'+
                    '</div>') : "" )+
            '</div>'+
            '<div class="row-fluid  form" >'+
                '<div class="span2 hidden-phone" ></div>'+
                '<div class="span1 parametro" >RUEX</div>'+
                '<div class="span2 "><input type="text" id="ruex_co" name="ruex_co" class="k-textbox "></div>'+
            '</div>' +
            '<div class="row-fluid  form" >'+
                '<div class="span1 hidden-phone" ></div>'+
                '<div class="span2 parametro" >Razon social</div>'+
                '<div class="span6 "><input type="text" id="razon_social_co" name="razon_social_co" class="k-textbox " disabled></div>'+
            '</div>';
            $("#cabecera").append(head);
            $("#cargar_folder").kendoButton();
            var cargar_folder = $("#cargar_folder").data("kendoButton");
            cargar_folder.bind("click", function(e){
               
                if($('#nro_folder_co').val()!='' && $("#fmsucursal").val()!=11 ) {
                    cargarFolderCO($("#nro_folder_co").val(), $("#tipo_planilla").val(), true, true);
                }
            });
            if (<?php echo $_smarty_tpl->tpl_vars['fmsucursal']->value;?>
==11){
                $('#sucursal').kendoComboBox({
                    placeholder:"Seleccione una Regional",
                    ignoreCase: true,
                    dataTextField: "descripcion",
                    dataValueField: "id",
                    dataSource: { 
                        transport: {
                                read: {
                                    dataType: "json",
                                    url: "index.php?opcion=admPlanilla&tarea=list_regionales"
                                }
                        }
                    },
                    change : function (e) {
                        if (this.value() && this.selectedIndex == -1) {
                            this.text('');
                        }else{
                            $('#fmsucursal').val(this.value());
                        }
                    }
                });
                var sucursal = $("#sucursal").data("kendoComboBox");
            }
        }
    }

    function addFila(fila){
        var campo = "";
        if($("#tipo_planilla").val()==1){
            campo = 
            '<div class="row-fluid  form" >'+
                '<!--div class="span1 hidden-phone"></div-->'+
                '<div class="span2 "><input min="1" id="nro_control-'+num+'" name="nro_control-'+num+'" required validationMessage="Ingrese Nro Control" ></div>'+
                '<div class="span3 "><input style="width:100%;" id="tipo-'+num+'" name="tipo-'+num+'" required validationMessage="Seleccione un Tipo de C.O."></div>'+
                '<div class="span2 "><input style="width:100%;" id="acuerdo-'+num+'" name="acuerdo-'+num+'" required validationMessage="Seleccione Acuerdo"></div>'+
                '<div class="span4 "><input type="text" id="observacion-'+num+'" name="observacion-'+num+'" class="k-textbox " ></div>'+
                ((fila)?  "" : '<div class="span1" ><img src="styles/img/del_dark.png" id="celiminar" alt="eliminar servicio" onclick="delFila(this)" height="28" width="28"></div>' ) +
            '</div>';
            $("#cuerpo").append(campo);
            ComboboxTipoCO("#tipo-"+num);
            //ComboboxEstado(num);
            $("#nro_control-"+num).kendoNumericTextBox({
                format: "i",
                decimals: 0
            });
            ComboboxAcuerdos("#acuerdo-"+num,"tipo-"+num);
            num++;
        }
        if($("#tipo_planilla").val()==2){
            
        }
        
    }
/*******************************************************************************/
/**************************REGISTRO DE FOLDERS**********************************/
/*******************************************************************************/
    function ComboboxAcuerdos(texto, cascade){
        $(texto).kendoComboBox({
            cascadeFrom: cascade,
            placeholder:"Acuerdo",
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: {
                type: "json",
                serverFiltering: true,
                transport: {
                        read: {
                            dataType: "json",
                            serverFiltering: true,
                            url: "index.php?opcion=admPlanilla&tarea=list_acuerdo2"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    
                }else{  }

            }
        }).data("kendoComboBox");
    }
    function ComboboxDDJJ(texto, id_empresa, id_tipo_co){
       
        $(texto).kendoComboBox({
            placeholder:"DDJJ",
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            //url: "index.php?opcion=admPlanilla&tarea=cargarCO_DDJJAprobados&id_empresa="+id_empresa
                            url: "index.php?opcion=admPlanilla&tarea=listar_ddjj&id_estado=1&id_empresa="+id_empresa+"&id_tipo_co="+id_tipo_co+'&fmsucursal='+$("#fmsucursal").val()
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    var id = texto.split("-");
                    $("#ddjj_clasificacion-"+id[1]+"-"+id[2]).val("");
                    $("#ddjj_descripcion-"+id[1]+"-"+id[2]).val("");
                }else{ 
                    var id = texto.split("-");
                    $.ajax({
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admPlanilla&tarea=cargar_datos_ddjj&ddjj='+this.value(),
                        success: function (data) {
                            var dt=eval("("+data+")");
                            $("#ddjj_clasificacion-"+id[1]+"-"+id[2]).val(dt[0].codigo);
                            $("#ddjj_descripcion-"+id[1]+"-"+id[2]).val(dt[0].descripcion);
                            $("#ddjj_descripcion_comercial-"+id[1]+"-"+id[2]).val(dt[0].descripcion);  //edilson
                        }
                    });  
                }

            }
        }).data("kendoComboBox");
    }
    function ComboboxDDJJ_ms(texto, id_empresa, id_tipo_co){
       
        $(texto).kendoMultiSelect({
            placeholder:"DDJJ Secundario",
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            //url: "index.php?opcion=admPlanilla&tarea=cargarCO_DDJJAprobados&id_empresa="+id_empresa
                            url: "index.php?opcion=admPlanilla&tarea=listar_ddjj&id_estado=1&id_empresa="+id_empresa+"&id_tipo_co="+id_tipo_co+'&fmsucursal='+$("#fmsucursal").val()
                        }
                }
            }
        }).data("kendoComboBox");
    }
    function ComboboxDDJJCriteriosTodos(texto){
        $(texto).kendoComboBox({
            placeholder:"Criterio",
            dataTextField: "descripcion",
            dataValueField: "id_criterio",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=cargarcriterios"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{  }

            }
        }).data("kendoComboBox");
    }
    function ComboboxDDJJCriterios(texto, cascade){
        $(texto).kendoComboBox({
            autoBind: true,
            cascadeFrom: cascade,
            placeholder: "Criterio",
            dataTextField: "criterio",
            dataValueField: "id_criterio",
            dataSource: { 
                type: "json",
                serverFiltering: true,
                transport: {
                        read: {
                            dataType: "json",
                            serverFiltering: true,
                            url: "index.php?opcion=admPlanilla&tarea=cargarCO_DDJJAprobados_criterios"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 

                }else{  }

            }
        }).data("kendoComboBox");
    }
    
    function ComboboxTipoCO(texto){
        $(texto).kendoComboBox({
            placeholder:"TIPO CO",
            dataTextField: "descripcion",
            dataValueField: "id_tipo",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=listar_tipo_co"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{  }

            }
        }).data("kendoComboBox");
    }
    function ComboboxRUEX(texto){
        $(texto).kendoComboBox({
            placeholder:"RUEX",
            dataTextField: "descripcion",
            dataValueField: "id_tipo",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=listar_ruexs"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{ 
                    //window.open('index.php?'+ 'opcion=admPlanilla&tarea=razon_empresa&ruex='+this.value(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
                    $.ajax({
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admPlanilla&tarea=razon_empresa&ruex='+this.value(),
                        success: function (data) {
                            $("#razon_social_co").val(data);
                            
                            //alert(data);
                        }
                    });  
                }

            }
        }).data("kendoComboBox");
    }
    function ComboboxEstado(texto){
        $(texto).kendoComboBox({
            placeholder:"ESTADO",
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=estado_planilla_co"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{ 
                    var campos =  texto.split("-");
                    if(this.value()==1){
                        $("#parte_2-"+campos[1]).find('input, select').prop("disabled", false);
                        $("#parte_3-"+campos[1]).find('input, select').prop("disabled", false);
                        $("#parte_3-"+campos[1]).find('input, select').prop("disabled", false);
                        $("#parte_4-"+campos[1]).find('input, select').prop("disabled", false);
                        $("#parte_5-"+campos[1]).find('input, select').prop("disabled", true);
                    }else{
                        $("#parte_2-"+campos[1]).find('input, select').prop("disabled", true);
                        $("#parte_3-"+campos[1]).find('input, select').prop("disabled", true);
                        $("#parte_3-"+campos[1]).find('input, select').prop("disabled", true);
                        $("#parte_4-"+campos[1]).find('input, select').prop("disabled", true);
                        $("#parte_5-"+campos[1]).find('input, select').prop("disabled", false);
                    }
                    mostrarDetalleRevision(campos[1]);
                    $("#ver-"+campos[1]).attr("type", "button");
                }
            }
        }).data("kendoComboBox");
    }
    
    function ComboboxTipoEmision(texto){
        $(texto).kendoComboBox({
            placeholder:"Tipo Emisi贸n",
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: { 
                transport: { 
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=tipo_emision&id_planilla_tipo=2"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{ 
                     var id = texto.split("-");
                    if(this.value()==3){
                        var campo = 
                        '<div class="row-fluid form" id="div_reemplazo-'+id[1]+'">'+
                            '<div class="span2"></div>'+
                            '<div class="span7">'+
                                '<fieldset class="row-fluid form" id="reemplazo-'+id[1]+'">'+
                                    '<legend>REEMPLAZO</legend>'+
                                '</fieldset>'+
                            '</div>'+
                        '</div>';
                        $("#parte_3-"+id[1]).append(campo);
                        $("#div_reemplazo-"+id[1]).hide();
                        addReemplazoFila(id[1], true);
                        $("#div_reemplazo-"+id[1]).show(800);
                    }else{
                        $("#parte_3-"+id[1]).html('');
                    }
                }
            }
        }).data("kendoComboBox");
    }
    
    function delFila(elem){
        $(elem).parent().parent().remove();
    }
    
    function paisDestinoCO(campo, placeholder){
        $(campo).kendoComboBox(
        {   placeholder: placeholder,
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=paisDestino"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) { 
                    this.text('');
                }else{

                }
            }
        });
    }
    
    function DDJJ_CO(campo, placeholder){
        $(campo).kendoComboBox(
        {   
            placeholder: placeholder,
            dataTextField: "descripcion",
            dataValueField: "id_empresa",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=ddjj_co&ruex="+$("#ruex_co").val()
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) { 
                    this.text('');
                }else{

                }
            }
        });
    }
    function combobox_UnidadMedidaCO(campo, placeholder){
        $(campo).kendoComboBox(
        {   
            placeholder: placeholder,
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=list_unidades_medidas"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) { 
                    this.text('');
                }else{

                }
            }
        });
    }
    
    $("#tipo_planilla").kendoComboBox({
        placeholder:"Seleccione Tipo Planilla",
        dataTextField: "text",
        dataValueField: "value",
        dataSource: [
                        { text: "Registro de Folder", value: "1" },
                        { text: "Revisi贸n de Folder", value: "2" },
                        { text: "Entrega de Folder ", value: "3" },
                    ],
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) {
                this.text('');
            }else{
                if(this.value()!=0){
                    if(this.value()==1){
                        $("#titulo").html("Ingreso Certificado de Origen");
                    }
                    if(this.value()==2){
                        $("#titulo").html("Revisi贸n Folder C.O.");
                    }
                    if(this.value()==3){
                        $("#titulo").html("Entrega Folder C.O. ");
                    }
                    ocultar("planilla_tipo");
                    mostrar("planilla_registro");
                    addHead();
                    addFila(true);
                }
            }
        }
    });
/*******************************************************************************/
/**************************REVISION DE FOLDERS**********************************/
/*******************************************************************************/

function cargarFolderCO(numero_folder, tipo, fila, agregar){

    $("#cuerpo").html('');
    var campo = '';
    $.ajax({
        type: 'post',
        url: 'index.php',
        data: 'opcion=admPlanilla&tarea=cargarFolderCO&folder='+numero_folder+'&fmsucursal='+$("#fmsucursal").val(),
        success: function (data) {
            var dt=eval("("+data+")");
            if(dt.length>0){
                $("#empresa_co").val(dt[0].id_empresa);
                $("#ruex_co").val(dt[0].ruex);


                $("#razon_social_co").val(dt[0].razon_social);  
                $("#razon_social_ddjj").val(dt[0].razon_social);
                $("#ruex_ddjj").val(dt[0].id_empresa);
                for(var num=1; num<dt.length ; num++){
                    if(dt[num].estado==0)
                    {
                        campo = 
                        '<div class="k-block campo" >'+
                            '<br>'+

                            '<div class="row-fluid form" id="parte_1-'+num+'">'+
                                '<div class="span1 hidden-phone"></div>'+
                                '<div class="span1 parametro">'+num+' '+dt[num].acuerdo+'</div>'+
                                '<input type="hidden" id="id_planilla_co-'+num+'" name="id_planilla_co-'+num+'" value="'+dt[num].id_planilla_co+'">'+
                                '<div class="span2 ">'+
                                    '<div class="input-box" >'+
                                        '<input class="k-textbox"  type="number" id="nro_control-'+num+'" name="nro_control-'+num+'" value="'+dt[num].numero_control+'" placeholder="N掳 Control" required validationMessage="Ingrese Nro de Control">'+
                                        '<span  >' + dt[num].abrev_co + '</span>'+
                                    '</div>'+
                                '</div>'+

                                '<div class="span2 ">'+
                                    '<div class="input-box" >'+
                                        '<input  class="k-textbox " type="text" id="nro_emision-'+num+'" name="nro_emision-'+num+'" value="'+dt[num].nro_emision+'" placeholder="N掳 Emisi贸n"  validationMessage="Nro Emisi贸n">'+
                                        '<span  >' + dt[num].abrev_regional + '</span>'+
                                    '</div>'+
                                '</div>'+
                                //'<div class="span2 "><input type="text" id="estado-'+num+'" name="estado-'+num+'" value="'+ ( dt[num].estado!=0? dt[num].estado: "" ) +'" onchange="mostrarDetalleRevision('+num+')" placeholder="Estado" style="width:100%"></div>'+
                                (tipo!=3? 
                                    ('<div class="span2 ">'+
                                        '<input type="text" id="estado-'+num+'" name="estado-'+num+'" value="'+ ( dt[num].estado!=0? dt[num].estado: "" ) +'" placeholder="Estado" style="width:100%" required validationMessage="Seleccione un Estado">'+
                                    '</div>') : ( '<div class="span2 parametro"> ' + (dt[num].estado==1? "APROBADO" : ( dt[num].estado==2? "RECHAZADO": "PENDIENTE") ) + ' </div>' )
                                ) +
                                '<div class="span1 "><input id="ver-'+num+'" name="ver-'+num+'" type="' + (tipo==3? 'hidden':'button' ) + '" value="Mostrar" onclick="cambiarDetalleRevision('+num+')" class="k-primary" style="width:100%"/></div>'+

                            '</div>'+

                            '<div class="row-fluid form" id="parte_2-'+num+'">'+
                                '<div class="span2 hidden-phone"></div>'+
                                '<div class="span2 "><input id="fecha_sellado-'+num+'" name="fecha_sellado-'+num+'" type="date" value="'+dt[num].fecha_sellado+'" placeholder="dd/mm/aaaa(Sellado)"  style="width:100%" required validationMessage="Ingrese Fecha de Sellado" ></div>'+
                                '<div class="span2 "><input type="text" id="pais-'+num+'" name="pais-'+num+'" value="'+dt[num].pais+'" required placeholder="Pais Destino" required validationMessage="Seleccione Pais de Destino"></div>'+
                              
                                '<div class="span2 "><input type="text" id="tipo-'+num+'" name="tipo-'+num+'"  value="'+dt[num].tipo_emision+'" placeholder="Tipo Emision" style="width:100%" required validationMessage="Seleccione el Tipo de Emisi贸n" ></div>'+
                            '</div>'+

                            '<div class="row-fluid form" id="parte_3-'+num+'">'+
                                
                            '</div>'+

                            '<div class="row-fluid form" >'+
                                '<div class="span12" id="parte_4-'+num+'"></div>'+
                            '</div>'+

                            '<div class="row-fluid form" id="parte_5-'+num+'">'+
                                '<div class="span1 hidden-phone"></div>'+
                                '<div class="span1 parametro">Observaci贸n: </div>'+
                                '<div class="span8 "><input type="text" id="observacion-'+num+'" name="observacion-'+num+'" value="" class="k-textbox " placeholder="Observacion" validationMessage="Ingrese Raz贸n de la Observaci贸n"></div>'+
                            '</div>'+
                        '</div><br><br>';
                        $("#cuerpo").append(campo); 
                        $("#parte_2-"+num).hide();
                        $("#parte_3-"+num).hide();
                        $("#parte_4-"+num).hide();
                        $("#parte_5-"+num).hide();

                        $('#fecha_sellado-'+num).kendoDatePicker({
                            start: "month"
                        });
                        if(dt[num].estado==0){
                            $("#ver-"+num).attr("type", "hidden");
                        }
                        $("#ver-"+num).kendoButton(); 





                        
                        paisDestinoCO("#pais-"+num);
                        ComboboxEstado('#estado-'+num);
                        ComboboxTipoEmision('#tipo-'+num);
                        
                        addDDJJFila(num, true, true, null, null, null, $("#empresa_co").val(),dt[num].id_tipo_ddjj);
                    }else{
                  
                        var dt_reemplazos = eval("(["+dt[num].reemplazos+"])");
                        var dt_ddjjs = eval("(["+dt[num].ddjjs+"])");
                        
                        campo = 
                        '<div class="k-block campo" >'+
                            '<br>'+

                            '<div class="row-fluid form" id="parte_1-'+num+'">'+
                                '<div class="span1 parametro">'+num+'</div>'+
                                '<input type="hidden" id="id_planilla_co-'+num+'" name="id_planilla_co-'+num+'" value="'+dt[num].id_planilla_co+'">'+
                                '<div class="span1 parametro">Nro Control</div>'+
                                '<div class="span2 campo">' + dt[num].abrev_co + " " + dt[num].numero_control + '</div>'+
                                (dt[num].nro_emision!=''?
                                    '<div class="span1 parametro">Nro Emisi贸n</div><div class="span2 campo">'+  dt[num].abrev_regional + " " + dt[num].nro_emision + '</div>' : 
                                    '<div class="span2 ">'+
                                        '<div class="input-box" >'+
                                            '<input  class="k-textbox " type="text" id="nro_emision-'+num+'" name="nro_emision-'+num+'" value="'+dt[num].nro_emision+'" placeholder="N掳 Emisi贸n" validationMessage="Nro Emisi贸n">'+
                                            '<span  >' + dt[num].abrev_regional + '</span>'+
                                        '</div>'+
                                    '</div>'
                                )+
                                '<div class="span1 parametro">Estado</div>'+
                                '<div class="span2 campo">'+  dt[num].estado_descripcion + '</div>'+
                                
                                '<div class="span1 "><input id="ver-'+num+'" name="ver-'+num+'" type="' + (tipo==3? 'hidden':'button' ) + '" value="Mostrar" onclick="cambiarDetalleRevision('+num+')" class="k-primary" style="width:100%"/></div>'+

                            '</div>'+

                            '<div  id="parte_2-'+num+'">'+
                                '<div class="row-fluid form">' +
                                    '<div class="span1 hidden-phone"></div>'+
                                    '<div class="span2 parametro">Fecha Sellado</div>'+
                                    '<div class="span2 campo">' + dt[num].fecha_sellado + '</div>'+
                                    '<div class="span2 parametro">Pais Destino </div>'+
                                    '<div class="span2 campo"> ' + dt[num].pais_descripcion + '</div>'+
                                   
                                '</div>'+
                                '<div class="row-fluid form">' +
                                    '<div class="span1 hidden-phone"></div>'+
                                    
                                    '<div class="span2 parametro">Tipo Emisi贸n</div>'+
                                    '<div class="span2 campo">' + dt[num].tipo_emision_descripcion + '</div>'+
                                    
                                    '<div class="span2 parametro">Acuerdo</div>'+
                                    '<div class="span2 campo">'+ dt[num].acuerdo+'</div>'+
                                    
                                '</div>'+
                            '</div>'+
                            '<div class="row-fluid form" >'+
                                '<div class="span2 hidden-phone"></div>'+
                                '<div class="span7" id="parte_3-'+num+'">';
                                    
                                    if(dt[num].reemplazos!=false && dt_reemplazos.length>0){
                                        campo += '<fieldset class="row-fluid form">'+
                                            '<legend>REEMPLAZA A:</legend>';
                                            for(var index=0; index <= dt_reemplazos.length-1  ; index++){
                                                campo += 
                                                    '<div class="row-fluid form" >'+
                                                        '<div class="span1 hidden-phone" ></div>'+
                                                        '<div class="span2 parametro" >Nro Control </div>'+
                                                        '<div class="span3 campo">'+ dt[num].abrev_co + " " + dt_reemplazos[index].control + '</div>'+ 
                                                        '<div class="span2 parametro" >Nro Emisi贸n </div>'+
                                                        '<div class="span3 campo">'+ dt[num].abrev_regional + " " +  dt_reemplazos[index].emision + '</div>'+
                                                    '</div>';
                                            }
                                        campo +='</fieldset>';
                                    }
                                campo +=
                                '</div>'+
                            '</div>'+
                            
                            '<div class="row-fluid form" id="parte_4-'+num+'">'+
                                '<div class="span12" ></div>';
                                 '<div class="row-fluid form" >'+
                                    '<div class="barra" >'+
                                    '</div>'+
                                '</div>';
                               
                                if(dt_ddjjs.length>0){
                                   
                                    for(var index=0; index <= dt_ddjjs.length-1 ; index++){
                                        campo += 
                                            '<div class="row-fluid form">'+
                                                '<div class="span1 hidden-phone"></div>'+
                                                '<div class="span2 parametro">Descripcion Comercial en C.O.</div>'+
                                                '<div class="span8 campo">' + dt_ddjjs[index].descripcion_comercial + '</div>'+
                                            '</div>' + 
                                            
                                            '<div class="row-fluid form">'+
                                                '<div class="span2 hidden-phone"></div>'+
                                                '<div class="span1 parametro">Nro DDJJ</div>'+
                                                '<div class="span1 campo">' + dt_ddjjs[index].ddjj + '</div>'+
                                                
                                                '<div class="span1 parametro">Clasificacion</div>'+
                                                '<div class="span6 campo">' + dt_ddjjs[index].arancel + '</div>'+
                                            '</div>' + 
                                            
                                            '<div class="row-fluid form">'+
                                                '<div class="span2 hidden-phone"></div>'+
                                                '<div class="span1 parametro">Factura(s)</div>'+
                                                '<div class="span1 campo">' + dt_ddjjs[index].factura + '</div>'+
                                                
                                                '<div class="span1 parametro">criterio</div>'+
                                                '<div class="span6 campo">' + dt_ddjjs[index].criterio + '</div>'+
                                            '</div>'+
                                             
                                            '<div class="row-fluid form">'+
                                                '<div class="span2 hidden-phone"></div>'+
                                                '<div class="span1 parametro">FOB</div>'+
                                                '<div class="span2 campo">' + dt_ddjjs[index].fob + '</div>'+
                                                
                                                '<div class="span1 parametro">Peso Neto</div>'+
                                                '<div class="span2 campo">' + dt_ddjjs[index].pneto + '</div>'+
                                                
                                                '<div class="span1 parametro">Unidad Medida</div>'+
                                                '<div class="span1 campo">' + dt_ddjjs[index].unidadm + '</div>'+
                                            '</div>' +
                                            '<div class="row-fluid form">'+
                                                '<div class="span1 hidden-phone"></div>'+
                                                '<div class="span2 parametro">Observaci贸n</div>'+
                                                '<div class="span8 campo">' + dt_ddjjs[index].observacion + '</div>'+
                                            '</div>';
                                    }
                                }
                            campo += 
                                '</div>'+

                            '<div class="row-fluid form" id="parte_5-'+num+'">'+
                            
                            '</div>'+
                        '</div><br><br>';
                        $("#cuerpo").append(campo);
                        /*$("#parte_2-"+num).hide();
                        $("#parte_3-"+num).hide();
                        $("#parte_4-"+num).hide();
                        $("#parte_5-"+num).hide();*/
                        $("#ver-"+num).kendoButton();
                    }
                }
            }else{
                alert("numero de folder inexistente");
            }
        }
    });
}

var reemplazo = 0;
function addReemplazoFila(num_co, estado){
    reemplazo++;
      var campo = 
                '<div class="row-fluid form" >'+
                    '<div class="span3 hidden-phone" ></div>'+
                    '<div class="span3 " >'+
                        '<input type="text" class="k-textbox" placeholder="Reemplaza N掳 Control"  name="reemplazo1-'+num_co+'-'+reemplazo+'" id="reemplazo1-'+num_co+'-'+reemplazo+'" required validationMessage=" N掳 Control" /><br>'+
                    '</div>'+
                    '<div class="span3 " >'+
                         '<input type="text" class="k-textbox" placeholder="Reemplaza N掳 Emision"  name="reemplazo2-'+num_co+'-'+reemplazo+'" id="reemplazo2-'+num_co+'-'+reemplazo+'" required validationMessage="N掳 Emisi贸n" /><br>'+
                    '</div>'+
                    (estado?  
                        '<div class="span1" ><img src="styles/img/add.png" id="cagregar"  onclick="addReemplazoFila('+num_co+','+false+')" height="28" width="28"></div>' 
                        : '<div class="span1" ><img src="styles/img/del_dark.png" id="cddjjeliminar" alt="eliminar servicio" onclick="delReemplazoFila(this)" height="28" width="28"></div>')+
                '</div>';
           
    $("#reemplazo-"+num_co).append(campo);

}
function delReemplazoFila(elem){
    $(elem).parent().parent().remove();
}
function addDDJJFila(num_co, agregar, fila, id_ddjj, ddjj, criterio, id_empresa,id_tipo_co){  
    ddjj_fila++;
    var campo = 
        '<div id="div_ddjj_fila-'+num_co+'-'+ddjj_fila+'">'+
            '<div class="row-fluid form" >'+
                '<div class="barra" >'+
                '</div>'+
            '</div>'+
            '<div class="row-fluid form">'+
                '<div class="span2 hidden-phone" ></div>'+
                '<div class="span8 "><input type="text" class="k-textbox no-restriccion" id="ddjj_descripcion_comercial-'+num_co+'-'+ddjj_fila+'" name="ddjj_descripcion_comercial-'+num_co+'-'+ddjj_fila+'"  placeholder="Descripcion comercial en el C.O."></div>'+
            '</div>'+
            '<div class="row-fluid form">'+
                '<div class="span1 hidden-phone" ></div>'+

                '<div class="span2 "><input style="width:100%;" id="ddjj-'+num_co+'-'+ddjj_fila+'" name="ddjj-'+num_co+'-'+ddjj_fila+'" placeholder="DDJJs "  required validationMessage="Seleccione DDJJ"></div>'+
                //aqui vamos a poner el boton de agregar declaracion jurada
                '<div class="span1" ><img src="styles/img/add.png" id="cagregar"  onclick="addDDJJnewPest('+num_co+','+ddjj_fila+','+id_tipo_co+')" height="28" width="28"></div>' +
                        '<div id="div_crear_ddjj"></div>'+
                '<div class="span3 "><input readonly class="k-textbox" type="text" id="ddjj_clasificacion-'+num_co+'-'+ddjj_fila+'" name="ddjj_clasificacion-'+num_co+'-'+ddjj_fila+'"  placeholder="Clasificaci贸n Arancelaria"></div>'+
                '<div class="span4 "><input readonly type="text" class="k-textbox" id="ddjj_descripcion-'+num_co+'-'+ddjj_fila+'" name="ddjj_descripcion-'+num_co+'-'+ddjj_fila+'"  placeholder="Descripcion de la Mercader铆a"></div>'+
                (agregar? 
                    (fila?  
                        '<div class="span1" ><img src="styles/img/add.png" id="cagregar"  onclick="addDDJJFila('+num_co+','+ agregar+','+ false + ',' +id_ddjj+','+ ddjj+','+ criterio+','+ id_empresa+','+ id_tipo_co+')" height="28" width="28"></div>' 
                        : '<div class="span1" ><img src="styles/img/del_dark.png" id="cddjjeliminar" alt="eliminar servicio" onclick="delDDJJFila(this)" height="28" width="28"></div>'
                    ) : "" 
                ) +
            '</div>'+
            // '<div class="span2" id="divddjj_ms-'+num_co+'-'+ddjj_fila+'" name="divddjj_ms-'+num_co+'-'+ddjj_fila+'"><input style="width:100%;" id="ddjj_ms-'+num_co+'-'+ddjj_fila+'" name="ddjj_ms-'+num_co+'-'+ddjj_fila+'" placeholder="DDJJs "  validationMessage="Seleccione DDJJ"></div>'+
            '<div class="row-fluid form">'+
                '<div class="span1 hidden-phone" ></div>'+
                '<div class="span3 "><input style="width:100%;" id="ddjj_criterio-'+num_co+'-'+ddjj_fila+'" name="ddjj_criterio-'+num_co+'-'+ddjj_fila+'"  placeholder="Criterio" required validationMessage="Criterio"></div>'+
                '<div class="span2 "><input type="text" class="k-textbox" id="ddjj_facturas-'+num_co+'-'+ddjj_fila+'" name="ddjj_facturas-'+num_co+'-'+ddjj_fila+'"  placeholder="Factura" required validationMessage="Faturas"></div>'+
                '<div class="span2 "><input min="1" type="text" id="ddjj_fob-'+num_co+'-'+ddjj_fila+'" name="ddjj_fob-'+num_co+'-'+ddjj_fila+'"  placeholder="FOB" required validationMessage="Fob"></div>'+
                '<div class="span2 "><input min="1" type="text" id="ddjj_pneto-'+num_co+'-'+ddjj_fila+'" name="ddjj_pneto-'+num_co+'-'+ddjj_fila+'"  placeholder="Peso Neto" required validationMessage="Peso Neto"></div>'+
                '<div class="span2 "><input style="width:100%;" id="ddjj_unidadm-'+num_co+'-'+ddjj_fila+'" name="ddjj_unidadm-'+num_co+'-'+ddjj_fila+'"  placeholder="Unidad Medida" required validationMessage="Unidad de Medida"></div>'+
            '</div>'+
            '<div class="row-fluid form">'+
                '<div class="span2 hidden-phone" ></div>'+
                '<div class="span8 "><input type="text" class="k-textbox" id="ddjj_observacion_ddjj-'+num_co+'-'+ddjj_fila+'" name="ddjj_observacion_ddjj-'+num_co+'-'+ddjj_fila+'"  placeholder="Observacion"></div>'+
            '</div>'+
        '</div>';
    $('#parte_4-'+num_co).append(campo);
    if(id_ddjj!=null){
        $('#ddjj-'+num_co+'-'+ddjj_fila).val(ddjj);
        $('#ddjj_criterio-'+num_co+'-'+ddjj_fila).val(criterio);
    }
    $('#ddjj_fob-'+num_co+'-'+ddjj_fila).kendoNumericTextBox({

    });
    $('#ddjj_pneto-'+num_co+'-'+ddjj_fila).kendoNumericTextBox({
  
    });
    ComboboxDDJJ('#ddjj-'+num_co+'-'+ddjj_fila, id_empresa,id_tipo_co);
    ComboboxDDJJ_ms('#ddjj_ms-'+num_co+'-'+ddjj_fila, id_empresa,id_tipo_co);


    ComboboxDDJJCriterios("#ddjj_criterio-"+num_co+'-'+ddjj_fila, 'ddjj-'+num_co+'-'+ddjj_fila);
    //ComboboxArancelDDJJ('#ddjj_clasificacion-'+num_co+'-'+ddjj_fila, "Clasificacion Arancelaria", 1, 0);
    combobox_UnidadMedidaCO("#ddjj_unidadm-"+num_co+'-'+ddjj_fila);
}

function delDDJJFila(elem){
    $(elem).parent().parent().parent().remove();
}


function addDDJJnewPest(x, y, id_tipo_co){

    $('#xx').val(x);
    $('#yy').val(y);
    $('#xco').val(id_tipo_co);
    var region = $('#sucursal').val();
    var ruex = $('#ruex_co').val();
    var razon_social = $('#razon_social_co').val();
    var folder = $('#nro_folder_co').val();
    var e_empresa = $('#empresa_co').val();
    //laurex
    //cerraractualizartab('Planilla DDJJ','admPlanilla','show_planilla_add_ddjj&v1='+region+'&v2='+ruex+'&v3='+razon_social+'&v4='+folder);
    //ocultar("planilla_registro");
    // $('#variable_id').val(num_co+'-'+ddjj_fila);
    mostrar("planilla_registro_ddjj");

    $('#formPlanillaDDJJ_add')[0].reset();
    $('#razon_social_ddjj1').val(razon_social);
    ocultar("planilla_registro");
}

function addDDJJnew(){
    crearVentanaAviso("REGISTRO DE DECLARACION JURADA");
}
function crearVentanaAviso(title){
    var num_ddjj=0;
    var campo =
        '<div class="row-fluid fadein" id="ventanaaviso_empresa">'+
            '<div class="k-header">'+
                '<div class="row-fluid  form" >'+
                    '<div class="row-fluid "  id="planillaDDJJ" >'+
                        '<div class="span12" >'+
                            '<div class="k-block fadein">'+
                                '<div class="k-header">'+
                                    '<div class="row-fluid  form" >'+
                                        '<div class="span12" >'+
                                            '<div class="titulonegro" id="tituloddjj"></div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<form name="formPlanillaDDJJ" id="formPlanillaDDJJ" method="post"  action="index.php"> '+
                                                '<input type="hidden" name="fmsucursalddjj" id="fmsucursalddjj" value="<?php echo $_smarty_tpl->tpl_vars['fmsucursal']->value;?>
" />'+
                                                '<input type="hidden" name="opcionddjj" id="opcionddjj" value="admPlanilladdjj" />'+
                                                '<input type="hidden" name="tarea" id="tarea" value="RegistrarDDJJ" /> '+
                                                        '<div class="row-fluid  form" >'+
                                                            '<div class="span1 hidden-phone" ></div>'+
                                                            '<div class="span2 parametro" >RUEX</div>'+
                                                            '<div class="span2 ">'+
                                                                '<input style="width:100%;" id="ruex_ddjj" name="ruex_ddjj" required validationMessage="Ingrese un Nro RUEX">'+
                                                            '</div>'+
                                                            ('<?php echo $_smarty_tpl->tpl_vars['fmsucursal']->value;?>
'=='11'?
                                                            ('<div class="span5 ">'+
                                                                '<div class="span2 hidden-phone" ></div>'+
                                                                '<div class="span7" >'+
                                                                    '<input style="width:100%;" id="fsucursalddjj" name="fsucursalddjj" required validationMessage="Seleccione una Regional"/>'+
                                                                '</div>'+
                                                            '</div>') : "" )+
                                                        '</div>'+
                                                        '<div class="row-fluid  form" >'+
                                                            '<div class="span1 hidden-phone" ></div>'+
                                                            '<div class="span2 parametro" >Razon social</div>'+
                                                            '<div class="span7 "><input type="text" id="razon_social_ddjj" name="razon_social_ddjj" class="k-textbox " ></div>'+
                                                        '</div>'+
                                                        '<div class="row-fluid  form" >'+
                                                            '<div class="span2 parametro"><input type="text" class="k-textbox"  id="ddjj_correlativo_add" name="ddjj_correlativo_add" placeholder="N掳 DDJJ" value="" ></div>'+
                                                            '<div class="span2 parametro"><input type="text" class="k-textbox"  id="ddjj_descripcion_add" name="ddjj_descripcion_add" placeholder="DESCRIPCION" value="" ></div>'+
                                                            '<div class="span2 parametro"><input type="text" class="k-textbox"  id="ddjj_estado_add" name="ddjj_estado_add" placeholder="ESTADO" value="" ></div>'+
                                                            '<div class="row-fluid form" >'+
                                                            '<div class="span2 hidden-phone"></div>'+
                                                                '<div class="span7"><input type="text" id="ddjj_nandina_add" name="ddjj_nandina_add" placeholder="NANDINA" style="width:100%" value="" required validationMessage="Ingrese y seleccione Arancel"></div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="row-fluid form" >'+
                                                            '<div class="span2 parametro"> fecha Registro </div><div class="span2"><input type="text" id="ddjj_fecha_registro_add" name="ddjj_fecha_registro_add" placeholder="Fecha Registro" value="" style="width:100%"  validationMessage="Ingrese Fecha de Registro" disabled></div>'+
                                                            '<div class="span2 parametro"> fecha Vencimiento </div>'+
                                                            '<div class="span2"><input type="text" id="ddjj_fecha_vencimiento_add" name="ddjj_fecha_vencimiento_add" placeholder="Fecha Vencimiento" value="" style="width:100%"  validationMessage="Ingrese Fecha de vencimiento" disabled></div>'+
                                                            '<div class="span2 parametro">D铆as de Vigencia </div><div class="span1"><input type="number" id="ddjj_dias_vigencia_add" name="ddjj_dias_vigencia_add" class="k-textbox" placeholder="Vence en" style="width:100%" required validationMessage="Ingrese Vigencia en D铆as"></div>' +
                                                        '</div>'+
                                                        '<div class="row-fluid form" >'+
                                                            '<div class="span2 hidden-phone"></div>'+
                                                            '<div class="span7"><input type="text" class="k-textbox"  id="ddjj_observacion_add" name="ddjj_observacion_add" placeholder="OBSERVACION" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" validationMessage="Ingrese la raz贸n del Rechazo"></div>'+
                                                            '<!--div class="span2 parametro" id="div_actualizacion_add"><input type="checkbox" id="ddjj_actualizacion_add" name="ddjj_actualizacion_add"/> Actualizaci贸n</div-->'+
                                                        '</div>'+
                                                
                                                
                                                '<div class="row-fluid form" >'+
                                                    '<div class="span8" >'+
                                                        '<div class="row-fluid form" ><div class="barra" ></div></div>'+
                                                    '</div>'+
                                                '</div>'+
                                                
 
                                                        
                                                '</div>'+
                                                '<div class="row-fluid  form" id="ddjj_pie" name="ddjj_pie">'+
                                                '</div>   '+
                                            '</form>'+
                                            '<div class="row-fluid  form" >'+
                                                '<div class="span4 hidden-phone"></div>'+
                                                '<div class="span2">'+
                                                    '<input id="CancelarDDJJ_123" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>'+
                                                '</div>'+
                                                '<div class="span2">'+
                                                    '<input id="guardarDDJJ_123" type="button" value="Aceptar" class="k-primary" style="width:100%"/> <br> <br>'+
                                                '</div>'+

                                                
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '</div>'+   
                            '</div>';

    
                    $('#div_crear_ddjj').append(campo);
                    $("#tituloddjj").html("Registro DD JJ");
                    ventana('ventanaaviso_empresa','500','800');   
                    ComboboxArancelDDJJ("#ddjj_nandina_add","NANDINA", 1, 1);
                    
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



 var x = 1;
    function cargarDDJJCriteriosFila(estado, num, acuerdos, estado_tramite){
        var aux = "["+acuerdos+"]";
        var au = acuerdos!=false? eval("("+aux+")") : false;
        var cantidad = au==false? 1: au.length;
        //alert(estado_tramite);
        for(var i=0; i<cantidad ; i++){
            addDDJJCriteriosFila(estado, num, au!=false? au[i]:false, estado_tramite);
        }
        
    }




function addDDJJCriteriosFila(estado, acuerdo, estado_tramite){
        array_acuerdos.push(num+'-'+x);
        var campo2 ='<div class="fadein">'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone" ></div>'+
                            '<div class="span8" >'+
                                '<div class="row-fluid form" ><div class="barra" ></div></div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div>'+
                            '<input type="hidden" id="ddjj_acuerdo_id-'+num+'-'+x+'" name="ddjj_acuerdo_id-'+num+'-'+x+'" '+(acuerdo!=false? ('value="'+acuerdo.id_acuerdo+'"') : "" )+' >'+
                            '<div class="span2"><input type="text" id="ddjj_naladisa-'+num+'-'+x+'" name="ddjj_naladisa-'+num+'-'+x+'" style="width:100%" required validationMessage="Seleccione un Arancel" '+(acuerdo!=false? ' value="'+acuerdo.tipo_arancel+'"':'')+'></div>'+
                            '<div class="span6"><input type="text" id="ddjj_nro_naladisa-'+num+'-'+x+'" name="ddjj_nro_naladisa-'+num+'-'+x+'" '+(acuerdo!=false? ('value="'+acuerdo.codigo_arancel+'"') : "" )+' style="width:100%" validationMessage="Ingrese Partida Arancelaria"></div>'+
                        '</div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div>'+
                            '<div class="span2"><input type="text" id="ddjj_acuerdo-'+num+'-'+x+'" name="ddjj_acuerdo-'+num+'-'+x+'" placeholder="Acuerdo" '+(acuerdo!=false? ('value="'+acuerdo.id_acuerdo+'"') : "" )+' style="width:100%" required validationMessage="Seleccione un acuerdo"></div>'+
                            '<div class="span4">'+
                                '<input type="text" id="ddjj_criterio-'+num+'-'+x+'" name="ddjj_criterio-'+num+'-'+x+'" placeholder="CRITERIO" style="width:100%" '+(acuerdo!=false? ('value="'+acuerdo.criterio+'"') : "" )+' validationMessage="Seleccione Criterio">'+
                            '</div>'+
                            '<div class="span2"><input type="text" id="ddjj_complemento-'+num+'-'+x+'" name="ddjj_complemento-'+num+'-'+x+'" class="k-textbox" placeholder="COMPLEMENTO" ></div>'+
                        '</div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div>'+
                            '<div class="span7"><input type="text" id="ddjj_observacion-'+num+'-'+x+'" name="ddjj_observacion-'+num+'-'+x+'" class="k-textbox" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="OBSERVACION" '+(acuerdo!=false? ('value="'+acuerdo.observacion+'"') : "" )+' ></div>'+
                            (acuerdo==false || estado_tramite==0? (estado? '<div class="span2" ><img src="styles/img/del_dark.png" id="celiminar-'+num+'-'+x+'" alt="eliminar servicio" onclick="delDDJJCriterioFila(this)" height="28" width="28"></div>':'<div class="span2" ><img src="styles/img/add.png" id="cagregar"  onclick="addDDJJCriteriosFila(true, '+num+', false)" height="28" width="28"></div>') : "")+
                        '</div>'+
                    '</div>';
        $('#parte_ddjj2-'+num).append(campo2);
        
        ComboboxAcuerdoDDJJ('#ddjj_acuerdo-'+num+'-'+x);
        ComboboxCriterioOrigen('#ddjj_criterio-'+num+'-'+x, 'ddjj_acuerdo-'+num+'-'+x);
        ComboboxArancelTipoDDJJ('#ddjj_naladisa-'+num+'-'+x);
        ComboboxArancelDDJJ('#ddjj_nro_naladisa-'+num+'-'+x, "Partida", 0, 1);
        
        var combo =  '#ddjj_naladisa-'+num+'-'+x;
        var combo2 = '#ddjj_nro_naladisa-'+num+'-'+x;
        $(combo).change(function(){
           
            var valor_combo1 = $(combo).val();
            $(combo2).data("kendoComboBox").destroy();
            ComboboxArancelDDJJ($(combo2), "Partida", valor_combo1, 1);
        });
        
        if(acuerdo!=false){
           //alert(acuerdo.id_criterio);
            $("#ddjj_complemento-"+num+"-"+x).val(decodeURIComponent(acuerdo.complemento));
            /*$("#ddjj_criterio-"+num+"-"+x).val(acuerdo.id_criterio);*/
        }
        $('#ddjj_criterio-'+num+'-'+x).data("kendoComboBox").enable( true );
        if(estado_tramite!=0 && acuerdo!=false){
           
            $('#ddjj_complemento_add-'+x).attr('readonly',true);
            $('#ddjj_complemento_add-'+x).attr('class','k-textbox k-state-disabled');
            
            $('#ddjj_observacion_add-'+x).attr('readonly',true);
            $('#ddjj_observacion_add-'+x).attr('class','k-textbox k-state-disabled');
            
            $('#ddjj_naladisa_add-'+x).data("kendoComboBox").enable( false );
            $('#ddjj_nro_naladisa_add-'+x).data("kendoComboBox").enable( false );
            $('#ddjj_acuerdo_add-'+x).data("kendoComboBox").enable( false );
            $('#ddjj_acuerdo_add-'+x).removeAttr("required");
            $('#ddjj_criterio_add-'+x).data("kendoComboBox").enable( false );
            $('#ddjj_criterio_add-'+x).removeAttr("required");
        }
        
        x++;
    }





function ComboboxArancelDDJJ(texto, placeholder, arancel, detallado){
    $(texto).kendoComboBox({
        placeholder: placeholder,
        dataTextField: "descripcion",
        dataValueField: "id",
        filter: "contains",
        autoBind: false,
        minLength: 3,
        dataSource: { 
            type: "json",
            serverFiltering: true,
            transport: {
                read: {
                    dataType: "json",
                    serverFiltering: true,
                    url: "index.php?opcion=admPlanilla&tarea=list_arancel&arancel="+arancel+"&detallado="+detallado
                }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text("");
            }else{ 

            }
        }
    }).data("kendoComboBox");
}
function cargarCO_DDJJAprobados(id_empresa){
    $.ajax({
        type: 'post',
        url: 'index.php',
        data: 'opcion=admPlanilla&tarea=cargarCO_DDJJAprobados&id_empresa='+id_empresa,
        success: function (data) {
           //alert(data);
        }
    });
}
function mostrarDetalleRevision(num){
    if($('#estado-'+num).val()==1){
        $("#parte_2-"+num).show(800);
        $("#parte_3-"+num).show(860);
        $("#parte_4-"+num).show(920);
        $("#parte_5-"+num).hide(980);
    }
    
    if($('#estado-'+num).val()==2){
        $("#parte_2-"+num).hide(800);
        $("#parte_3-"+num).hide(860);
        $("#parte_4-"+num).hide(920);
        $("#parte_5-"+num).show(980);
    }
    
    $("#ver-"+num).attr("value", "Ocultar");
}

function ocultarDetalleRevision(num){
    $("#parte_2-"+num).hide(800);
    $("#parte_3-"+num).hide(860);
    $("#parte_4-"+num).hide(920);
    $("#parte_5-"+num).hide(980);
    $("#ver-"+num).attr("value", "Mostrar");
}

function cambiarDetalleRevision(num){
    if($("#ver-"+num).attr("value") != "Mostrar")
        ocultarDetalleRevision(num);
    else
        mostrarDetalleRevision(num);
}
/*******************************************************************************/
/**************************REVISION DE FOLDERS**********************************/
/*******************************************************************************/

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
<?php echo '</script'; ?>
>
<?php }} ?>
