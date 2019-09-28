<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-10 20:35:22
         compiled from "/enex/web1/sitio/web/vista/admEmpresaApi/SolicitudApi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6131002805d6e7b674f8248-45475015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b47f373994e06128fb0c8a7b2bf055291c78f25e' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admEmpresaApi/SolicitudApi.tpl',
      1 => 1568162016,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6131002805d6e7b674f8248-45475015',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d6e7b6757e180_89498924',
  'variables' => 
  array (
    'empresaRevision' => 0,
    'direccionRevision' => 0,
    'empresaRRLL' => 0,
    'paisr' => 0,
    'paises_valores' => 0,
    'paises_valores1' => 0,
    'depto_valores' => 0,
    'id' => 0,
    'revisar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6e7b6757e180_89498924')) {function content_5d6e7b6757e180_89498924($_smarty_tpl) {?><div class="row-fluid fadein"  id="formularioapi" >
    <div class="k-block">
        
        <div class="k-header">
            <div class="titulonegro">FORMULARIO DE SOLICITUD PARA LA</div> 
        </div>
        <div class="k-cuerpo">
            <div class="titulo">EMISIÓN DE UNA AUTORIZACIÓN PREVIA DE IMPORTACIÓN</div> 
        </div>        
        <form id="solicitudApi" enctype="multipart/form-data">
        <div class="k-cuerpo"> 
            <fieldset >
                <legend>I. DATOS DEL IMPORTADOR</legend>
                <div class="row-fluid " >
                    
                    <div class="span3" >
                        Nombre Completo o Razón Social:
                    </div>     
                    <div class="span6 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->razon_social;?>
 
                    </div>  
                </div>
                <legend>Dirección Fiscal:</legend>
                <fieldset >
                    <div class="row-fluid " >
                        <?php $_smarty_tpl->tpl_vars["direccionRevision"] = new Smarty_variable($_smarty_tpl->tpl_vars['direccionRevision']->value, null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["ds_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresaRevision']->value->id_direccion, null, 0);?>
                        <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Show.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </div> 
                </fieldset >
                <div class="row-fluid " ><br></div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        
                        Nombre Completo del Representante Legal
                    </div>     
                    <div class="span6 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->nombres;?>
 <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->paterno;?>
 <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->materno;?>

                    </div> 
                </div>    
                <div class="row-fluid " >
                    <div class="span3 " >
                        Nacionalidad
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['paisr']->value->nombre;?>

                    </div>   
                </div>    
                <legend>Domicilio:</legend>
                <fieldset >
                    <div class="row-fluid " >
                        <?php $_smarty_tpl->tpl_vars["direccionRRLL"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresaRRLL']->value, null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["ds_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresaRRLL']->value->direccion, null, 0);?>
                        <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Show.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </div> 
                </fieldset >
                <div class="row-fluid " ><br></div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Nº de Identificación Tributaria (NIT):
                    </div>     
                    <div class="span6 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->nit;?>

                    </div> 
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Nº Licencia de Funcionamiento:
                    </div>     
                    <div class="span6 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->patente_municipal;?>

                    </div> 

                </div>
                <div class="row-fluid " >
                    <div class="span3"  >
                        Registro Operador (Aduana):
                    </div>     
                    <div class="span6 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->padron_importador;?>

                    </div> 
            </fieldset>

            <fieldset >
                <legend>II. DATOS DEL PRODUCTO</legend>

                <div class="row-fluid " >

                    <div class="span10 notas" >
                        <b>DESCARGUE EL FORMULARIO EXCEL PARA LLENAR LOS ITEMS PARA IMPORTAR<a href="styles/documentos/formato_formulario.xlsx"> AQUI <img src="styles/img/Ico_Terminos.png"></img></a></b>                        <br>
                    </div>
                </div>
                <div class="row-fluid " >
                    <div class="span10" >
                        <b>(*) SUBIR EL ARCHIVO CON LOS ITEMS LLENADOS:</b>
                        <input id="archivoex" type="file" name="archivo" required="required" />Excel

                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        <input type="number" min="0" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Cantidad Total"  name="cantidad" id="cantidad" required validationMessage="Ingrese cantidad" />
                    </div>  
                    <div class="span3" >
                        <input type="number" min="0" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Peso Bruto Total Kg"  name="peso_bruto" id="peso_bruto" required validationMessage="Ingrese descripción Arancelaria" />
                    </div> 
                    <div class="span3" >
                        <input type="number" min="0" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Valor FOB total (valor en $us)"  name=fob" id="fob" required validationMessage="Ingrese descripción Comercial" />

                      <!--   <input type="text" onkeypress="return isNumeric(event)"  style="width:100%;" class="k-textbox no-restriccion"  placeholder="Cantidad Total"  name="cantidad" id="cantidad"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese cantidad" />
                    </div>  
                    <div class="span3" >
                        <input type="text" onkeypress="return isNumeric(event)" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Peso Bruto Total Kg"  name="peso_bruto" id="peso_bruto"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese descripción Arancelaria" />
                    </div> 
                    <div class="span3" >
                        <input type="text" onkeypress="return isNumeric(event)" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Valor FOB total (valor en $us)"  name=fob" id="fob"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese descripción Comercial" /> -->

                    </div>     
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        <br>
                    </div>  
                </div> 
                <div class="row-fluid form" >
                    <div class="span12 " >
                        <input type="hidden" name="paises_values" id="paises_values" value="<?php echo $_smarty_tpl->tpl_vars['paises_valores']->value;?>
" />
                        <input style="width:100%;" id="paises" name="paises">
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="span3 " >
                        <input type="hidden" name="paises_values1" id="paises_values1" value="<?php echo $_smarty_tpl->tpl_vars['paises_valores1']->value;?>
" />
                        <input style="width:100%;" id="pais_proc" name="pais_proc">
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="span12 " >
                        <input type="hidden" name="depto_valores" id="depto_valores" value="<?php echo $_smarty_tpl->tpl_vars['depto_valores']->value;?>
" />
                        <input style="width:100%;" id="depto" name="depto">
                    </div> 
                </div>
                    <div class="row-fluid " >
                </div>  

            </fieldset>    
        </div>
        <fieldset >
            <legend>III. DATOS FINANCIEROS</legend>                           
            <div class="row-fluid " >
                <div class="span3 " >
                    <input type="text" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Origen de los recursos para la adquisición de divisas"  name="orig_divisas" id="orig_divisas"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese Origen de los recursos para la adquisición de divisas" />
                </div>     
                <div class="span3 " >
                    <input type="text" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Entidad Bancaria para la adquisición de divisas"  name="ent_bancaria" id="ent_bancaria"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese Entidad Bancaria para la adquisición de divisas" />
                </div> 
                <div class="span3" >
                    <input type="text" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Número de Cuenta Bancaria para la adquisición de divisas"  name="num_cuenta" id="num_cuenta"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese el Número de Cuenta Bancaria" />
                </div>     
                <div class="span3 " >
                    <input type="text" style="width:100%;"  placeholder="Tipo de Cuenta:"  name="tipo_cuenta" id="tipo_cuenta"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese el tipo de Cuenta" />
                </div>  
            </div>
            <div class="row-fluid " >
                <div class="span3 " >
                    <input type="number" min="0" value="6.96" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Tipo de cambio empleado"  name="cambio_empleado" id="cambio_empleado"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese el tipo de cambio empleado" />
                </div>     
            </div>
        </fieldset>
                
        <fieldset >
            <legend>IV. DATOS DE AUTORIZACION</legend>                           
            <div class="row-fluid " >
                <div class="span9 " >
                    <input type="text" style="width:100%;" placeholder="Persona Autorizada el trámite y recojo de la Autorización Previa"  name="pers_autorizada" id="pers_autorizada"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese Persona Autorizada el trámite y recojo de la Autorización Previa" />
                </div>     
            </div>
        </fieldset>
        <div class="row-fluid form" >
            <div class="barra" >                                         
            </div> 
        </div>
        <div class="row-fluid  form" >
            <div id="detalle" class="fadein">
            </div>
        </div>
                                   
        <fieldset >                       
            <div class="row-fluid" id="notificacionobservacionr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                <div class="span4 " >
                </div>
                 <div class="span4 " > 
                     
                </div> 
                <div class="span4 " > 
                </div>
                <div class="span3" >
                    <input id="cancelarrui" type="<?php if ($_smarty_tpl->tpl_vars['revisar']->value=='2') {?>hidden<?php } else { ?>button<?php }?>" value="Cancelar" class="k-primary" style="width:100%"/> <br><br>
                </div>
                <div class="span3" >
                    <input id="guardarsolicitud" type="button"  value="Enviar" class="k-primary" style="width:100%"/> 
                </div>
            </div>
        </fieldset>
        
    </form>        
    </div>    
</div>

<div id="aviso1" class="span10 fadein"  >
                <div class="k-block fadein">
                        <div class="k-header"><div class="titulo">Aviso</div></div>
                        <div class="row-fluid  form" >
                                        <div class="span1 hidden-phone" ></div>
                                        <div class="span10" >
                                            <p> Aseg&uacute;rese de que los datos introducidos son los correctos ya que no se podra volver a editar cuando la solicitud se guarde
                                                <br>Si desea volver al formulario para verificar los datos presione<span class="letrarelevante"> Cancelar</span><br>
						<br>Si presiona Registrar se guardan los registros y lo podra imprimir en el listado de Solicitudes que se mostrar� a continuaci�n<br>
                                                
                                          </p> 
                                        </div>  
                                        <div class="span1 hidden-phone" ></div>
                        </div> 
                        <div class="row-fluid  form" >
                            <div class="span4 hidden-phone" >
                            </div>
                            <div class="span2 " >
                                <input id="cancelar" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                            </div> 
                            <div class="span2 " >
                                <input id="aceptar" type="button"  value="Registrar" class="k-primary" style="width:100%"/>
                            </div> 
                            <div class="span4 hidden-phone" >
                            </div>
                        </div> 
                </div>
               
            </div>
                        
<?php echo '<script'; ?>
>
 ocultar('aviso1');
// $("#detalle").kendoGrid({
//     editable: true,
//     scrollable: false,
//     resizable: true,
//     selectable: "simple",
//     columns: [
//             { field: "arancel", title: "Posicion Arancelaria Nandina"},
//             { field: "gestion_publicacion", title: "Descripción Arancelaria" },
//             { field: "desc_com", title: "Descripción Comercial" },
//             { field: "cant", title: "Cantidad" ,editor:ValorNumeric },
//             { field: "unidad_medida", title: "Unidad de Medida",editor: UMedidaDropDownEditor},
//             { field: "peso_bruto", title: "Peso Bruto (Kg)",editor:ValorNumeric  },
//             { field: "precio_unit", title: "Precio Unitario (Sus)",editor:ValorNumeric },
//             { field: "total", title: "Valor Total ($us)" ,editor:ValorNumeric },
//             { field: "precio_unit_divisa", title: "Precio Unitario divisa correspondiente (opcional)",editor:ValorNumeric },
//             { field: "total_fob_divisa", title: "Valor Total divisa correspondiente (opcional)" ,editor:ValorNumeric }
//         ],
//     save: function (data) {
//         setTimeout(function () {
//             genericUpdate();

//         },100);
//     }
// }).data("kendoGrid");
//     var dsumedida = [
//         { d_unidad_medida: 1, descripcion: "u" },
//         { d_unidad_medida: 2, descripcion: "2u" }
//     ];
    
function getDescripcionUnidadMedida(unidad_medida)
{
    for(var i=0, length = unidadmedida.length; i< length;i++)
    {
        if(unidadmedida[i].id_unidad_medida==unidad_medida)
        {
            return unidadmedida[i].descripcion;
        }
    }
}


function UMedidaDropDownEditor(container, options) {
    $('<input data-text-field="descripcion"  name="'+options.field+'" data-bind="value:' + options.field+ '"/>')
            .appendTo(container)
            .kendoDropDownList({
                dataTextField: "descripcion",
                dataValueField: "id_unidad_medida",
                autoBind: false,
                dataSource: dsumedida,
                select: onSelectunidadmedida
            });
    $("<span class='k-invalid-msg' data-for='" + options.field + "'></span>").appendTo(container);
};
function onSelectunidadmedida(e) {
    var dataItem = this.dataItem(e.item.index());
};

function getDescripcionUnidadMedida(unidad_medida)
{
    for(var i=0, length = unidades.length; i< length;i++)
    {
        if(unidadmedida[i].id_unidad_medida==unidad_medida)
        {
            return unidadmedida[i].descripcion;
        }
    }
}
    var editorr = $("#editorr_soporte").kendoEditor({
        tools: []
        }).data("kendoEditor"); 

    $("#cancelarrui").kendoButton();
    $("#aceptar").kendoButton();
    $("#cancelar").kendoButton();
    $("#guardarsolicitud").kendoButton();
    var aceptar = $("#aceptar").data("kendoButton");
    var cancelar = $("#cancelar").data("kendoButton");
    var aprobar = $("#guardarsolicitud").data("kendoButton");
var cancelarrui = $("#cancelarrui").data("kendoButton");



aprobar.bind("click", function(e){   
        $('#paises').val(multiSelect.value());
       $('#depto').val(multiSelect3.value());
       // if(validator.validate())
       // { 
           
           cambiar('formularioapi','aviso1');
       // }
       // else
       // {
       //     window.scrollTo(0, 0);
       // }
    }); 

cancelar.bind("click", function(e){
        cambiar('aviso1','formularioapi');
    }); 


    aceptar.bind("click", function(e){  

	 $("#aceptar").data("kendoButton").enable(false);
        var file_data = $("#archivoex").prop("files")[0];   
        var paisp = $("#pais_proc").data("kendoDropDownList");
        var tipoc = $("#tipo_cuenta").data("kendoDropDownList");
        var persa = $("#pers_autorizada").data("kendoDropDownList");
        var form_data = new FormData();
        form_data.append("file", file_data);

        form_data.append('paises', $("#paises").val());
        form_data.append('pais_proc', paisp.value());
        form_data.append('depto', $("#depto").val());
        form_data.append('cantidad', $("#cantidad").val());
        form_data.append('peso_bruto', $("#peso_bruto").val());
        form_data.append('fob', $("#fob").val());
        form_data.append('orig_divisas', $("#orig_divisas").val());
        form_data.append('ent_bancaria', $("#ent_bancaria").val());
        form_data.append('num_cuenta', $("#num_cuenta").val());
        form_data.append('tipo_cuenta', tipoc.value());
        form_data.append('cambio_empleado', $("#cambio_empleado").val());
        form_data.append('pers_autorizada', persa.value());

            $.ajax({             
                   type: 'post',
                   url: 'index.php?opcion=admAutorizacionPrevia&tarea=guardaSolicitud',
                    contentType: false,
                    processData: false,
                   data: form_data,
                   success: function (data) {
                   
                     if(data == 2)
                     {
                        alert("Formato de documento invalido, o no se subio la plantilla Excel");
			$("#aceptar").data("kendoButton").enable(true);
                     } else {
                        cerraractualizartab('Autorizaciones Previas','admAutorizacionPrevia','ListarColaApiEmpresa');
                     }
                     

                   }
               });
    });

    cancelarrui.bind("click", function(e){    
           cerraractualizartab('Autorizaciones Previas','admAutorizacionPrevia','ListarColaApiEmpresa');
           
    }); 
        function agregarfiladetalle(){
        var detalle = $("#detalle").data("kendoGrid");
        detalle.addRow();
        }
        function eliminarfiladetalle(){
        var detalle = $("#detalle").data("kendoGrid");
        var currentDataItem = detalle.dataItem(detalle.select());
        var dataRow = detalle.dataSource.getByUid(currentDataItem.uid);
        detalle.dataSource.remove(dataRow);
        }
    //-----------------------para la elecion de paises de origen-----------------------------------
    $("#paises").kendoMultiSelect({
        placeholder:"Pais de Origen",
        dataTextField: "nombre",
        dataValueField: "id_pais",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admRegistroApi&tarea=listar_pais"
                }
            }
        },
    });
   
    var multiSelect = $("#paises").data("kendoMultiSelect"),
            setValue = function(e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.dataSource.filter({}); //clear applied filter before setting value

                    multiSelect.value($("#paises_values").val().split(","));
                }
            },
            setSearch = function (e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.search($("#word").val());
                }
            };
              //this.onload(setValue('1'));

    //-----------------------para la elecion de paises de proc-----------------------------------
    $("#pais_proc").kendoDropDownList({
    
        optionLabel:"Seleccione El pais de Procedencia",
        ignoreCase: false,
        dataTextField: "nombre",
        dataValueField: "id_pais",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admRegistroApi&tarea=listar_pais"
                }
            } 
       },

   });
    var paisp = $("#pais_proc").data("kendoDropDownList");


    $("#pers_autorizada").kendoDropDownList({
    
        optionLabel: "Persona Autorizada en el trámite y recojo de la Autorización Previa",
        ignoreCase: true,
        dataTextField: "nombre",
        dataValueField: "id_persona",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admAutorizacionPrevia&tarea=listar_personas"
                }
            } 
       },

   });

    //-----------------------para la elecion de departamentos destino-----------------------------------
    $("#depto").kendoMultiSelect({
        placeholder:"Departamentos Destino",
        dataTextField: "nombre",
        dataValueField: "id_departamento",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admRegistroApi&tarea=listar_depto"
                }
            }
        },
    });


    var data = [
                    { text: "M/N", value: "1" },
                    { text: "M/E", value: "2" }
                ];

    $("#tipo_cuenta").kendoDropDownList({
                        optionLabel: "Seleccione Tipo de Cuenta",
                        dataTextField: "text",
                        dataValueField: "value",
                        dataSource: data
    });

    
   
    var multiSelect3 = $("#depto").data("kendoMultiSelect"),
            setValue = function(e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.dataSource.filter({}); //clear applied filter before setting value

                    multiSelect.value($("#depto_valores").val().split(","));
                }
            },
            setSearch = function (e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.search($("#word").val());
                }
            };

    function ValorNumeric (container, options) {
        $('<input data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoNumericTextBox({
              decimals: 4
        });
    }    
    this.onload(setValue('1'));    
    // function isNumeric (evt) {
    //     var theEvent = evt || window.event;
    //     var key = theEvent.keyCode || theEvent.which;
    //     key = String.fromCharCode (key);
    //     var regex = /[0-9]|\./;
    //     if ( !regex.test(key) ) {
    //         theEvent.returnValue = false;
    //         if(theEvent.preventDefault) theEvent.preventDefault();
    //     }
    // }
<?php echo '</script'; ?>
>
<?php }} ?>
