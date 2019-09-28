<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-01 16:31:30
         compiled from "/enex/web1/sitio/web/vista/ruex/AsignacionRuex.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135876805857cedb28ae9230-78513984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35ace58e311121d41b5569e6b80d07b3b7db2505' => 
    array (
      0 => '/enex/web1/sitio/web/vista/ruex/AsignacionRuex.tpl',
      1 => 1496348399,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135876805857cedb28ae9230-78513984',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cedb28bd86a3_05106797',
  'variables' => 
  array (
    'empresa_temporal' => 0,
    'id' => 0,
    'empresaRevision' => 0,
    'idactividad_economica' => 0,
    'idtipo_empresa' => 0,
    'afiliaciones_val' => 0,
    'direccionRevision' => 0,
    'idrubro_exportaciones' => 0,
    'ico' => 0,
    'personal' => 0,
    'persona' => 0,
    'vRuex' => 0,
    'revisar' => 0,
    'id_persona' => 0,
    'fecha_ini' => 0,
    'observacion' => 0,
    'asignado' => 0,
    'regional' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cedb28bd86a3_05106797')) {function content_57cedb28bd86a3_05106797($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(("v").($_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa), null, 0);?>

<div class="row-fluid fadein"  id="asignacionruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" >
    <div class="k-block">
        <div class="k-header">
            <div class="titulonegro">Validaci&oacute;n de RUEX</div> 
        </div>   
        <div class="k-cuerpo">                
                 <div class="row-fluid " >
                    <div class="span2 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->razon_social!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->razon_social) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                        Nombre o Razon Social:
                    </div>     
                    <div class="span5 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->razon_social;?>
 
                    </div>  
                    <div class="span2 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->nit!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->nit) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                        NIT:
                    </div>     
                    <div class="span2 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->nit;?>

                    </div> 
                </div>
                <div class="row-fluid " >
                    <div class="span2 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->nombre_comercial!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->nombre_comercial) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                        Nombre Comercial:
                    </div>     
                    <div class="span5 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->nombre_comercial;?>
 
                    </div>
                    <div class="span2 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->certificacionnit!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->certificacionnit) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                        Codigo de certif. de NIT:
                    </div>     
                    <div class="span2 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->certificacionnit;?>

                    </div> 
                </div>
                <div class="row-fluid " >                 
                    <div class="span5 hidden-phone" ></div>
                    <?php if ($_smarty_tpl->tpl_vars['empresa_temporal']->value->ico) {?>
                        <div class="span1 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->ico!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->ico) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" > Nro ICO </div>
                        <div class="span1 campo" > <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->ico;?>
 </div>
                    <?php } else { ?>
                        <div class="span2 hidden-phone" ></div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['empresa_temporal']->value->matricula_fundempresa) {?>
                        <div class="span2 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->matricula_fundempresa!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->matricula_fundempresa) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                            Nro. FundEmpresa:
                        </div>     
                        <div class="span2 campo" >
                            <?php if ($_smarty_tpl->tpl_vars['empresa_temporal']->value->idtipo_empresa==10) {?>
                                No Aplica
                            <?php } else { ?>
                                <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->matricula_fundempresa;?>

                            <?php }?>
                        </div> 
                    <?php }?>
                </div>
                 <?php if ($_smarty_tpl->tpl_vars['empresa_temporal']->value->matricula_fundempresa||$_smarty_tpl->tpl_vars['empresa_temporal']->value->menor_cuantia=="1"||$_smarty_tpl->tpl_vars['empresa_temporal']->value->oea||$_smarty_tpl->tpl_vars['empresa_temporal']->value->frecuente!='1') {?>
                <div class="row-fluid " >
                    
                    <div class="span2 hidden-phone" ></div>
                    <?php if ($_smarty_tpl->tpl_vars['empresa_temporal']->value->oea) {?>
                            <div class="span4  <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->oea!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->oea) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                                <b>OPERADOR ECON&Oacute;MICO AUTORIZADO <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->oea;?>
</b>
                            </div>  
                    <?php }?>   
                   <?php if ($_smarty_tpl->tpl_vars['empresa_temporal']->value->menor_cuantia=="1") {?>
                             <!--div class="span4 " >
                               <b>Empresa registrada de menor cuantia.</b>
                            </div--> 
                    <?php }?>  
                    <?php if ($_smarty_tpl->tpl_vars['empresa_temporal']->value->frecuente!="1") {?>
                            <!--div class="span4" >
                               <b>Exportador no habitual.</b>
                            </div-->  
                    <?php }?> 
                </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['empresa_temporal']->value->ruex) {?>
                <div class="row-fluid  form" >
                    <div class="span2 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->ruex!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->ruex) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                       Ruex:
                    </div>     
                    <div class="span2 campo" >
                         <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->ruex;?>

                    </div>  
                    <div class="span2 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->vigencia!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->vigencia) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                        Vigencia:
                    </div>     
                    <div class="span2 campo" >
                       <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->vigencia;?>

                    </div> 
                    <div class="span2 parametro" >
                        Fecha Vigencia:
                    </div>     
                    <div class="span2 campo" > 
                      <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->fecha_renovacion_ruex;?>

                    </div> 
                </div>
                <?php }?>
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                       Categoria:
                    </div>     
                    <div class="span1 campo" >
                         <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->idcategoria_empresa;?>

                    </div> 
                    <div class="span2 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->idactividad_economica!=$_smarty_tpl->tpl_vars['idactividad_economica']->value) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                        Actividad Economica:
                    </div>     
                    <div class="span2 campo" >
                      <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->idactividad_economica;?>

                    </div> 
                    <?php if ($_smarty_tpl->tpl_vars['empresa_temporal']->value->idtipo_empresa) {?>      
                        <div class="span2 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->idtipo_empresa!=$_smarty_tpl->tpl_vars['idtipo_empresa']->value) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                            Tipo de Empresa:
                        </div>     
                        <div class="span2 campo" >
                           <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->idtipo_empresa;?>
                   
                        </div> 
                    <?php }?>
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                 <div class="row-fluid  form" >
                     
                     <div class="span1 hidden-phone" ></div>
                    <div class="span3 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->date_fundacion!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->date_fundacion) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                       Año de Fundacion:
                    </div>     
                    <div class="span2 campo" >
                         <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->date_fundacion;?>

                    </div> 
                    <div class="span2 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->coordenada_lat!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->coordenada_lat) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                       latitud(coordenadas):
                    </div>     
                    <div class="span2 campo" >
                         <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->coordenada_lat;?>

                    </div> 
                </div>
                <div class="row-fluid  form" >
                    <div class="span1 hidden-phone" ></div>
                    <div class="span3 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->date_inicio_operaciones!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->date_inicio_operaciones) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                       Año de inicio de Operaciones:
                    </div>     
                    <div class="span2 campo" >
                         <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->date_inicio_operaciones;?>

                    </div> 
                    
                    <div class="span2 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->coordenada_long!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->coordenada_long) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                       longitud(coordenadas):
                    </div>     
                    <div class="span2 campo" >
                         <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->coordenada_long;?>

                    </div> 
                </div> 
                <div class="row-fluid  form" >
                    <div class="span2 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->descripcion_empresa!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->descripcion_empresa) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                      Descripcion de la Empresa
                    </div>     
                    <div class="span9 campo" >
                         <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->descripcion_empresa;?>

                    </div> 
                </div>   
                <div class="row-fluid form" >
                   <div class="span2 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->afiliaciones!=$_smarty_tpl->tpl_vars['afiliaciones_val']->value) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                            Afiliaciones:
                    </div>     
                    <div class="span9" >
                        <input type="hidden" name="afiliaciones_values1" id="afiliaciones_values1" value="<?php echo $_smarty_tpl->tpl_vars['afiliaciones_val']->value;?>
" />
                        <input style="width:100%;" id="afiliaciones1" name="afiliaciones1">
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >
                    </div>
                </div>
                        
                        <div class="row-fluid form" >
                            <div class="span3 parametro" >
                                Domicilio Fiscal(formato antigüo):
                            </div>   
                            <div class="span8 " >
                                <input type="text" class="k-textbox "  value="<?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->direccionfiscal;?>
" placeholder="Direcci&oacute;n Domicilio Fiscal" id="direccionfiscal" name="direccionfiscal" required validationMessage="Ingrese su dirección"/>
                            </div>
                        </div>
                            <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                            
              <div class="row-fluid  form" >
                    <?php $_smarty_tpl->tpl_vars["direccionRevision"] = new Smarty_variable($_smarty_tpl->tpl_vars['direccionRevision']->value, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["ds_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresa_temporal']->value->direccion, null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Show.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


                </div>
                
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>                   
                <div class="row-fluid  form" >
                    <div class="span3 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->idrubro_exportaciones!=$_smarty_tpl->tpl_vars['idrubro_exportaciones']->value) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                        <b>Rubro de Exportaciones:</b>
                    </div>     
                    <div class="span9 campo" >
                       <?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->idrubro_exportaciones;?>

                    </div>  
                </div>
                <?php if ($_smarty_tpl->tpl_vars['ico']->value->ico) {?>
                    <div class="row-fluid  form" >
                        <div class="span3 <?php if ($_smarty_tpl->tpl_vars['empresaRevision']->value!=null&&$_smarty_tpl->tpl_vars['empresaRevision']->value->ico!=$_smarty_tpl->tpl_vars['empresa_temporal']->value->ico) {?>parametro-modificado<?php } else { ?>parametro<?php }?>" >
                            <b>Numero ICO:</b>
                        </div>     
                        <div class="span9 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['ico']->value->ico;?>

                        </div>  
                    </div>
                <?php }?>  
                  
                <?php if (count($_smarty_tpl->tpl_vars['personal']->value)!=0) {?>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid" >
                    <div class="span12 parametro" >
                        <center>Personal de la Empresa</center>
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <?php  $_smarty_tpl->tpl_vars['persona'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['persona']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['personal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['persona']->key => $_smarty_tpl->tpl_vars['persona']->value) {
$_smarty_tpl->tpl_vars['persona']->_loop = true;
?>
                    <div class="row-fluid selectpersona" onclick="anadir('<?php echo $_smarty_tpl->tpl_vars['persona']->value['perfil'];?>
','admPersona','verPersona&id_persona=<?php echo $_smarty_tpl->tpl_vars['persona']->value['id_persona'];?>
')" >
                        <div class="selectpersona">  
                        <div class="span1 parametro" >
                          Nombre:
                        </div>     
                        <div class="span3 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value['nombres'];?>
 
                        </div>  
                        <div class="span1 parametro" >
                          Documento:
                        </div>     
                        <div class="span2 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value['numero_documento'];?>
 
                        </div>  
                        <div class="span1 parametro" >
                          Perfil:
                        </div>     
                        <div class="span3 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value['perfil'];
if ($_smarty_tpl->tpl_vars['persona']->value['id_persona']==$_smarty_tpl->tpl_vars['empresa_temporal']->value->id_representante_legal) {?> RESPONSABLE <?php }?>
                        </div> 
                        </div>
                        <div class="span1" >
                         <?php if ($_smarty_tpl->tpl_vars['persona']->value['id_perfil']=='3') {?>
                             <a href='index.php?opcion=impresionFirmaRuex&tredrt=<?php echo $_smarty_tpl->tpl_vars['persona']->value['id_persona'];?>
&sdfercw=<?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa;?>
' target='_blank'>
                             <input type="button" value="Term.de Uso" class="k-button " style="width:100%;height:20px; font-size: 12px;padding-top:0px;margin-top:0px;"/>
                             </a>
                         <?php }?>
                        </div>
                    </div>                    
                <?php } ?>
                <?php }?>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>   
                <div class="row-fluid  form" >
                        <div class="span12 parametro" style="text-align: left;" >
                            <?php if ($_smarty_tpl->tpl_vars['empresa_temporal']->value->estado!=9) {?>
                                Escriba si tiene observaciones en el registro de la empresa "<?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->razon_social;?>
", se le notificará al exportador que su RUEX tiene Observaciones.
                            <?php } else { ?> 
                                <center>OBSERVACIONES</center>
                            <?php }?>
                        </div> 
                </div>       
                <div class="row-fluid  form" >
                    <div class="span12 " > 
                         <textarea id="editorr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"  >
                        </textarea> 
                    </div>
                </div>
                <div class="row-fluid" id="notificacionobservacionr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                    <div class="span4 " >
                    </div>
                     <div class="span4 " > 
                         <div  class="k-widget k-tooltip-validation">Por favor Ingrese sus observaciones.</div>
                    </div> 
                    <div class="span4 " > 
                    </div>
                </div>
                
                    <?php if ($_smarty_tpl->tpl_vars['vRuex']->value=='0') {?>
                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div>
                        <div class="row-fluid">
                            <div class="span3 hidden-phone" ></div>
                            <div class="span1" ><input class="span12" type="checkbox" name="chk-vigencia" id="chk-vigencia"></div>
                            <div class="span8 " >
                                <b>EMPRESA REGISTRADA ENTRE JUNIO Y AGOSTO DE 2016 QUE MANTENGA SU VIGENCIA DE UN AÑO, <br>SIEMPRE QUE LOS DATOS SEAN LOS MISMOS</b>
                            </div>
                        </div>
                        <br>
                    <?php }?>
                     <div class="row-fluid form" >
                        <div class="barra" >
                        </div> 
                    </div>
                
                    <div class="row-fluid  form" >
                        <div class="span1 hidden-phone" >
                        </div>
                        <div class="span2" >
                            <input id="cerrar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="hidden" value="Cerrar" class="k-primary" style="width:100%"/> <br><br>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['revisar']->value=='1'||$_smarty_tpl->tpl_vars['revisar']->value=='2') {?>
                            <div class="span3" >
                                <input id="rechazarruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="<?php if ($_smarty_tpl->tpl_vars['revisar']->value=='2') {?>hidden<?php } else { ?>button<?php }?>" value="Rechazar" class="k-primary" style="width:100%"/> <br><br>
                            </div>
                            <div class="span3" >
                                <input id="asignarruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="button"  value="Validar Ruex" class="k-primary" style="width:100%"/> 
                            </div>
                        <?php } else { ?>
                            <div class="span6 hidden-phone" ></div>
                        <?php }?>
                        <div class="span1 hidden-phone" >
                        </div>
                        <div class="span1 " >
                            <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('validacionRuex')" style="max-width:35px;" class="ayuda">
                        </div>
                    </div>
                
        </div>
    </div>    
</div>
<div id="avisorevision"></div>
<?php echo $_smarty_tpl->getSubTemplate ("avisos/firmaDigital.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
   
<?php echo '<script'; ?>
>  
    var chk_vigencia;
    $("#cerrar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").kendoButton();
    var cerrar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 = $("#cerrar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").data("kendoButton");
    if ('<?php echo $_smarty_tpl->tpl_vars['revisar']->value;?>
'=='1' || '<?php echo $_smarty_tpl->tpl_vars['revisar']->value;?>
'=='2'){
        $("#rechazarruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").kendoButton();
        $("#asignarruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").kendoButton();
        var rechazarruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 = $("#rechazarruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").data("kendoButton");
        var asignarruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 = $("#asignarruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").data("kendoButton");
        rechazarruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.bind("click", function(e){
            if(editorr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.value().length<3)
            { 
                mostrar('notificacionobservacionr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
            }
            else
            {
                cambiar('asignacionruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
                generarPin('<?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa;?>
','<?php echo $_smarty_tpl->tpl_vars['id_persona']->value;?>
','20');
                cambiarRedaccionFirma<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
(20,'de Rechazo de RUEX','rechazo a la empresa.');
            }
        });
        asignarruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.bind("click", function(e){
            chk_vigencia = $('#chk-vigencia').prop('checked');
            cambiar('asignacionruex<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
            generarPin('<?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa;?>
','<?php echo $_smarty_tpl->tpl_vars['id_persona']->value;?>
','1');
            cambiarRedaccionFirma<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
(1,'de Validaci&oacute;n de RUEX','valido el RUEX de la empresa.');
        });
    }
    cerrar<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.bind("click", function(e){
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'id_empresa=<?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->id_empresa;?>
&fecha_ini=<?php echo $_smarty_tpl->tpl_vars['fecha_ini']->value;?>
&opcion=admEmpresa&tarea=cerrarAsignacionRuex',
            success: function (data) {
                var dt=eval("("+data+")");
                if(dt[0].suceso==0){}
                remover(tabStrip.select());
            }
        }); 
        
    });
//------------para el campor de observaciones--------------------------------
ocultar('notificacionobservacionr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
   
var editorr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 = $("#editorr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").kendoEditor({
    tools: [
        "bold",
        "italic",
        "underline",
        "justifyLeft",
        "justifyCenter",
        "justifyRight",
        "justifyFull",
        "insertUnorderedList",
        "insertOrderedList",
        "formatting",
        "fontName",
        "fontSize"     
    ]
}).data("kendoEditor"); 
        
if(<?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->estado;?>
 == 9 ){
    editorr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.value('<?php echo $_smarty_tpl->tpl_vars['observacion']->value;?>
');
    $(editorr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.body).attr('contenteditable', false);
}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
   
    $("#afiliaciones1").kendoMultiSelect({
        placeholder:"Afiliaciones",
        dataTextField: "descripcion",
        dataValueField: "id_empresa_afiliacion",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admEmpresaTemporal&tarea=listarAfiliaciones"
                }
            }
        },
    });
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
    if('<?php echo $_smarty_tpl->tpl_vars['revisar']->value;?>
'=='1'){
        createVentana();
    }
    function createVentana(){
        var campo = 
                '<div id="aviso_ventana">'+
                    
                        '<div class="titulo" id="tituloventana">Aviso Cambio de Estado</div><br>'+
                        '<div class="row-fluid form">'+
                            '<label id="cambio_texto">Se le asigno la Empresa <b id="bold_numfact"><?php echo $_smarty_tpl->tpl_vars['empresa_temporal']->value->razon_social;?>
</b> al usuario  <b id="bold_estado"><?php echo $_smarty_tpl->tpl_vars['asignado']->value;?>
</b>, perteneciente a la RRCO <b id="bold_estado"><?php echo $_smarty_tpl->tpl_vars['regional']->value;?>
</b>, en Fecha y Hora: <?php echo $_smarty_tpl->tpl_vars['fecha_ini']->value;?>
, posee hasta 4 horas, para emitir u observar esta registro. </label><br><br>'+
                        '</div>'+
                        '<div class="row-fluid form">'+
                            '<input id="ventanaaceptar" type="button"  value="Aceptar" class="k-primary" style="width:40"/> '+
                        '</div>'+
                    
                '</div>';
        $('#avisorevision').append(campo);
         ventana('aviso_ventana','280','410');
        $("#ventanaaceptar").kendoButton();
        
        var ventanaaceptar = $("#ventanaaceptar").data("kendoButton");
        
        ventanaaceptar.bind("click", function(e){
            $("#aviso_ventana").data("kendoWindow").close();
            $('#aviso_ventana').remove();
        });
        
    }
    var multiSelect = $("#afiliaciones1").data("kendoMultiSelect"),
            setValue = function(e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.dataSource.filter({}); //clear applied filter before setting value

                    multiSelect.value($("#afiliaciones_values1").val().split(","));
                }
            },
            setSearch = function (e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.search($("#word").val());
                }
            };
    multiSelect.enable(false);
    this.onload(setValue($('#afiliaciones_values1').val()));
    
<?php echo '</script'; ?>
>    <?php }} ?>
