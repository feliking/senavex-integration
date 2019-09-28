<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-01-04 07:24:47
         compiled from "/enex/web1/sitio/web/vista/admReportesEstadisticas/Cierres.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19393145457d00759bc4da3-71905874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c5f6ff97bc808198e8b4ad9db864e6572571363' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admReportesEstadisticas/Cierres.tpl',
      1 => 1546601047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19393145457d00759bc4da3-71905874',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57d00759bd8968_50593493',
  'variables' => 
  array (
    'desarrollo' => 0,
    'regional' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57d00759bd8968_50593493')) {function content_57d00759bd8968_50593493($_smarty_tpl) {?>
<div  id="formulario" >
    <div class="row-fluid" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="titulonegro">Reportes/Cierres Varios</div>
            </div>
            <div class="k-cuerpo">
                <form name="formEstadisticas" id="formEstadisticas" method="post"  action="index.php">
                    <div class="span2 hidden-phone"></div>
                    <div class="span8">
                        <fieldset class="row-fluid  form " id="fieldset" >
                            <legend>EXCEL</legend>
                            <div id="tablas_general">
                                 <div class="span5 fadein" >
                                    <div class="radio"><strong>CIERRES FACTURACION</strong></div> 
                                    <div class="radio"><input type="radio" name="tipo_rpte" checked value="1" id="tipo_rpte" data-radio required>Reporte General</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="2" id="tipo_rpte" data-radio required>Reporte Detallado</div>
                                    <div class="radio"><strong>REPORTES FACTURACION</strong></div> 
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="3" id="tipo_rpte" data-radio required>Libro de Ventas</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="4" id="tipo_rpte" data-radio required>Conciliaci&oacute;n</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="5" id="tipo_rpte" data-radio required>Recaudaciones</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="6" id="tipo_rpte" data-radio required>Anulaci&oacute;n de Facturas</div>
                                    <div class="radio"><strong>REPORTES SGC</strong></div> 
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="7" id="tipo_rpte" data-radio required>SGC RUEX</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="11" id="tipo_rpte" data-radio required>SGC DDJJ</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="12" id="tipo_rpte" data-radio required>SGC CO</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="13" id="tipo_rpte" data-radio required>SGC Indicadores Generales</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="15" id="tipo_rpte" data-radio required>Estado de Tr&aacute;mites DDJJ</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="16" id="tipo_rpte" data-radio required>Estado de Tr&aacute;mites CO</div>
                                    <div class="radio"><strong>REPORTES PLANILLAS</strong></div> 
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="8" id="tipo_rpte" data-radio required>Anulaciones de Certificados de Origen</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="10" id="tipo_rpte" data-radio required>Reporte de DDJJ de Origen</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="9" id="tipo_rpte" data-radio required>Reporte de Emisiones de CO</div>
                                    <?php if ($_smarty_tpl->tpl_vars['desarrollo']->value==17||$_smarty_tpl->tpl_vars['desarrollo']->value==12) {?>
                                    <div class="radio"><strong>REPORTES COMPLEMENTARIOS</strong></div> 
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['desarrollo']->value==17) {?>
                                        <!-- <div class="radio"><input type="radio" name="tipo_rpte" value="100" id="tipo_rpte" data-radio required>Registro ddjj</div> -->
					                <div class="radio"><input type="radio" name="tipo_rpte" value="14" id="tipo_rpte" data-radio required>Reporte de Plazo</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="20" id="tipo_rpte" data-radio required>Rubros Exportacion</div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['desarrollo']->value==17||$_smarty_tpl->tpl_vars['desarrollo']->value==12) {?>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="17" id="tipo_rpte" data-radio required>Empresas Nuevas por Rubros de Exportaci&oacute;n</div>
                                    <?php }?>
                                </div>
                                <div class="span4" >
                                     <div class="row-fluid form" >
                                        Inicio:<input type ='date' id="fecha_ini" name="fecha_ini" placeholder="dd/mm/aaaa"/>
                                     </div>
                                    <div class="row-fluid form" >
                                        Fin:   <input type ='date' id="fecha_fin" name="fecha_fin" placeholder="dd/mm/aaaa"/>
                                    </div>
                                </div>
                                <div class="span3" >
                                    <div class="row-fluid form" >
                                    <input  style="width:100%;" id="id_tipo_servicio" name="id_tipo_servicio" placeholder="Tipo de Servicio"  validationMessage="Seleccione un Servicios">
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['regional']->value==11) {?>
                                        <div class="row-fluid form" >
                                        <input  style="width:100%;" id="regional_reporte" name="regional_reporte" placeholder="Regional"  validationMessage="Seleccione una Regional">
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        </fieldset>
                        
                    </div>

                    <div class="row-fluid form" >
                        <div class="span5 hidden-phone" ></div>
                        <div class="span2 " >
                            <input id="aceptar" name="aceptar" type="button"  value= "Generar" class="k-primary" style="width:100%"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>

<?php echo '<script'; ?>
>
  
    $("#aceptar").kendoButton();
  
    $("#fecha_ini").kendoDatePicker({
        value: new Date(),
        start: "month"
    });
    $("#fecha_fin").kendoDatePicker({
        value: new Date(),
        start: "month"
    });
    var validator = $("#formEstadisticas").kendoValidator().data("kendoValidator");
    var aceptar = $("#aceptar").data("kendoButton");
  
    aceptar.bind("click", function(e){
        if(validator.validate()){
            //cerraractualizartab('Cierre','admReportesEstadisticas','prueba');
            window.open('index.php?opcion=admReportesEstadisticas&tarea=Cierres&'+$('#formEstadisticas').serialize(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        }
    })

    $("#id_tipo_servicio").kendoComboBox({
            placeholder:"Tipo Servicio",
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admReportesEstadisticas&tarea=listarTipoServicios"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{  }

            }
    });
    
    if(<?php echo $_smarty_tpl->tpl_vars['regional']->value;?>
 ==11 ){
        $("#regional_reporte").kendoComboBox({
            placeholder:"Regional",
            dataTextField: "ciudad",
            dataValueField: "id_regional",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPersona&tarea=listarRegionales"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{  }

            }
        });
    }
  
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
