<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-08-27 17:51:07
         compiled from "/enex/web1/sitio/web/vista/admEmpresaApi/AsignacionRui.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2395877685d658315b4fd97-27487188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d8338bf0ec27f8df30cf920340db2eac303aa13' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admEmpresaApi/AsignacionRui.tpl',
      1 => 1566939354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2395877685d658315b4fd97-27487188',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d658315d371c1_78007084',
  'variables' => 
  array (
    'id' => 0,
    'empresaRevision' => 0,
    'unipersonal' => 0,
    'direccionRevision' => 0,
    'paisr' => 0,
    'tipodocr' => 0,
    'empresaRRLL' => 0,
    'expedidor' => 0,
    'generor' => 0,
    'paisa' => 0,
    'tipodoca' => 0,
    'empresaApoderado' => 0,
    'expedidoa' => 0,
    'generoa' => 0,
    'revisar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d658315d371c1_78007084')) {function content_5d658315d371c1_78007084($_smarty_tpl) {?><div class="row-fluid fadein"  id="asignacionrui<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" >
    <div class="k-block">
        <div class="k-header">
            <div class="titulonegro">Validaci&oacute;n de RUI</div> 
        </div>   
        <div class="k-cuerpo"> 
            <fieldset >
                <legend>1. DATOS DE LA EMPRESA</legend>
                <div class="row-fluid " >
                    <div class="span3"  >
                        Registro Operador (Aduana):
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->padron_importador;?>

                    </div> 
                    <div class="span3" >
                        Razon Social:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->razon_social;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Nº de Identificación Tributaria:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->nit;?>

                    </div> 
                    <div class="span3 " >
                        Nº Testimonio de Constitución:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->testimonio_constitucion;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Nº Licencia de Funcionamiento:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->patente_municipal;?>

                    </div> 
                    <div class="span3" >
                        Nº Matricula de Comercio:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->matricula_fundempresa;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Fecha de Vencimiento de la Matricula de Comercio:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->vencimiento_fundempresa;?>

                    </div> 
                    <div class="span3" >
                        La empresa es Unipersonal:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['unipersonal']->value;?>
 
                    </div>  

            </fieldset>
            <fieldset >
                <legend>2. UBICACIÓN GEOGRÁFICA</legend>
                <div class="row-fluid " >
                    <?php $_smarty_tpl->tpl_vars["direccionRevision"] = new Smarty_variable($_smarty_tpl->tpl_vars['direccionRevision']->value, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["ds_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresaRevision']->value->id_direccion, null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Show.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>   
            </fieldset>
            <fieldset >
                <legend>3. INFORMACIÓN DEL PROPIETARIO O REPRESENTANTE LEGAL</legend>
                
                <div class="row-fluid " >
                    <div class="span3 " >
                        Pais
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['paisr']->value->nombre;?>

                    </div> 
                    <div class="span3" >
                        Tipo de Documento de Identidad
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['tipodocr']->value->descripcion;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Numero de Documento de Identidad
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->numero_documento;?>

                    </div> 
                    <div class="span3" >
                        Expedido
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['expedidor']->value->sigla;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Nombres
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->nombres;?>

                    </div> 
                    <div class="span3" >
                        Primer Apellido
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->paterno;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Segundo Apellido
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->materno;?>

                    </div> 
                    <div class="span3" >
                        Correo Electronico
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->email;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Testimonio o Poder
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->testimonio_poder_representante;?>

                    </div> 
                    <div class="span3" >
                        Fecha de Vecimiento de su Carnet de Identidad
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->vencimiento_documento;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Sexo
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['generor']->value;?>

                    </div> 
                      
                </div>
                <div class="row-fluid " >
                    <?php $_smarty_tpl->tpl_vars["direccionRRLL"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresaRRLL']->value, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["ds_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresaRRLL']->value->direccion, null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Show.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>  
            </fieldset>
            <fieldset >
                <legend>4. INFORMACION DEL APODERADO</legend>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Pais
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['paisa']->value->nombre;?>

                    </div> 
                    <div class="span3" >
                        Tipo de Documento de Identidad
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['tipodoca']->value->descripcion;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Numero de Documento de Identidad
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaApoderado']->value->numero_documento;?>

                    </div> 
                    <div class="span3" >
                        Expedido
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['expedidoa']->value->sigla;?>
  
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Nombres
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaApoderado']->value->nombres;?>

                    </div> 
                    <div class="span3" >
                        Primer Apellido
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaApoderado']->value->paterno;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Segundo Apellido
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaApoderado']->value->materno;?>

                    </div> 
                    <div class="span3" >
                        Correo Electronico
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaApoderado']->value->email;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Testimonio o Poder
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->testimonio_poder_apoderado;?>

                    </div> 
                    <div class="span3" >
                        Fecha de Vecimiento de su Carnet de Identidad
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaApoderado']->value->vencimiento_documento;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Sexo
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['generoa']->value;?>

                    </div> 
                    <div class="span3" >
                        Fecha de Vecimiento de su Testimonio o Poder
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->vencimiento_poder_apoderado;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <?php $_smarty_tpl->tpl_vars["direccionApoderado"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresaApoderado']->value, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["ds_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresaApoderado']->value->direccion, null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Show.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>    
            </fieldset>    
        </div>
        <div class="row-fluid form" >
            <div class="barra" >                                         
            </div> 
        </div>
        <fieldset >
            <legend>REVISION</legend>                           
            <div class="row-fluid  form" >
                <div class="span12 parametro" style="text-align: left;" >

                        <center>OBSERVACIONES</center>
                </div> 
            </div>       
            <div class="row-fluid  form" >
                <div class="span12 " > 
                    <textarea id="editorr_soporte"  >
                    </textarea> 
                </div>
            </div>
            <div class="row-fluid" id="notificacionobservacionr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                <div class="span4 " >
                </div>
                 <div class="span4 " > 
                     
                </div> 
                <div class="span4 " > 
                </div>
                <div class="span3" >
                    <input id="cancelarrui<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="<?php if ($_smarty_tpl->tpl_vars['revisar']->value=='2') {?>hidden<?php } else { ?>button<?php }?>" value="Cancelar" class="k-primary" style="width:100%"/> <br><br>
                </div>
                <div class="span3" >
                    <input id="rechazarrui<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="<?php if ($_smarty_tpl->tpl_vars['revisar']->value=='2') {?>hidden<?php } else { ?>button<?php }?>" value="Rechazar" class="k-primary" style="width:100%"/> <br><br>
                </div>
                <div class="span3" >
                    <input id="asignarrui<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="button"  value="Validar RUI" class="k-primary" style="width:100%"/> 
                </div>
            </div>
        </fieldset>
    </div>    
</div>
<?php echo '<script'; ?>
>
    var editorr = $("#editorr_soporte").kendoEditor({
        tools: []
        }).data("kendoEditor"); 
    $("#asignarrui").kendoButton();
    $("#rechazarrui").kendoButton();
    $("#cancelarrui").kendoButton();
    var aprobar = $("#asignarrui").data("kendoButton");
    var rechazar = $("#rechazarrui").data("kendoButton");
    var cancelar = $("#cancelarrui").data("kendoButton");
    aprobar.bind("click", function(e){    
            
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'id_empresa_importador=<?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->id_empresa_importador;?>
&opcion=admRegistroApi&tarea=asignarRuiEmpresa',
            success: function (data) {
                    cerraractualizartab('Revisión API','admRegistroApi','revisionApi');
            }
        }); 
        });
    rechazar.bind("click", function(e){ 
            // Grabar formulario
            $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'id_empresa_importador=<?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->id_empresa_importador;?>
&motivo='+$("#editorr_soporte").val()+'=&opcion=admRegistroApi&tarea=RechazarRuiEmpresa',
            success: function (data) {
                cerraractualizartab('Revisión API','admRegistroApi','revisionApi');
            }
        }); 
        });
    cancelar.bind("click", function(e){    
           cerraractualizartab('Revisión API','admRegistroApi','revisionApi');
           
        }); 
<?php echo '</script'; ?>
>
<?php }} ?>
