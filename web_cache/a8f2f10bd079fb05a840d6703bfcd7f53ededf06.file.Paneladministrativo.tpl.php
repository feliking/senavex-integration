<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-08-21 16:26:27
         compiled from "/enex/web1/sitio/web/vista/panelAdministrativo/Paneladministrativo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19569267657cedab458a431-35000301%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8f2f10bd079fb05a840d6703bfcd7f53ededf06' => 
    array (
      0 => '/enex/web1/sitio/web/vista/panelAdministrativo/Paneladministrativo.tpl',
      1 => 1566415055,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19569267657cedab458a431-35000301',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cedab46287d6_99132277',
  'variables' => 
  array (
    'id_empresa_persona' => 0,
    'empresas' => 0,
    'turns' => 0,
    'empresa' => 0,
    'c' => 0,
    'tipo_usuario' => 0,
    'mensajebienvenida' => 0,
    'nombre' => 0,
    'id_perfil' => 0,
    'registroempresas' => 0,
    'registromodificacion' => 0,
    'ddjjporrevisar' => 0,
    'firma' => 0,
    'estadomodificacion' => 0,
    'estado_empresa' => 0,
    'id_empresa' => 0,
    'variosperfiles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cedab46287d6_99132277')) {function content_57cedab46287d6_99132277($_smarty_tpl) {?><!DOCTYPE html>
<html >
<head>
<?php echo $_smarty_tpl->getSubTemplate ("includes/Librerias.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body> 
<?php echo $_smarty_tpl->getSubTemplate ("includes/Cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="row-fluid " >
        <?php if ($_smarty_tpl->tpl_vars['id_empresa_persona']->value=='x') {?> 
        <div class='mis-empresas'>    
        
        </div>
        <div class="swiper-container fadein">
            <div class="swiper-wrapper"> 
                <?php $_smarty_tpl->tpl_vars['turns'] = new Smarty_variable(1, null, 0);?> 
                <?php $_smarty_tpl->tpl_vars['c'] = new Smarty_variable(1, null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['empresa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['empresa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['empresas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->key => $_smarty_tpl->tpl_vars['empresa']->value) {
$_smarty_tpl->tpl_vars['empresa']->_loop = true;
?> 
                    <?php if ($_smarty_tpl->tpl_vars['turns']->value=='1') {?>
                <div class="swiper-slide" >
                    <div class="slideempresas" >
                    <?php }?>
                        <div class="slideempresa" >
                            <a  href='index.php?opcion=admPanelPrincipal&tarea=entroEmpresa&empresa=<?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_persona;?>
&id_empresa=<?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
&id_perfil=<?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_perfil;?>
&id_empresa_persona=<?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa_persona;?>
'/>
                                <img  src="styles/img/empresas/<?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
.<?php echo $_smarty_tpl->tpl_vars['empresa']->value->fecha_vinculacion;?>
"  onError='this.onerror=null;imgendefectoempresa(this);' />
                                <p class="plomaparrafo" ><?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_persona;?>
</p>
                            </a>
                        </div>
                    <?php if ($_smarty_tpl->tpl_vars['turns']->value=='8'||$_smarty_tpl->tpl_vars['c']->value==count($_smarty_tpl->tpl_vars['empresas']->value)) {?>
                    </div>
                </div>
                    <?php $_smarty_tpl->tpl_vars['turns'] = new Smarty_variable(1, null, 0);?>
                    <?php } else { ?>    
                    <?php $_smarty_tpl->tpl_vars['turns'] = new Smarty_variable($_smarty_tpl->tpl_vars['turns']->value+1, null, 0);?> 
                    <?php }?>
                    <?php $_smarty_tpl->tpl_vars['c'] = new Smarty_variable($_smarty_tpl->tpl_vars['c']->value+1, null, 0);?>
                <?php } ?>              
                     
            </div>  
                
            <?php if (count($_smarty_tpl->tpl_vars['empresas']->value)>'8') {?>
            <div class="pagination"></div>
            <?php }?>
        </div>
        <?php echo '<script'; ?>
 languaje="JavaScript">
            var mySwiper = new Swiper('.swiper-container',{
                pagination: '.pagination',
                paginationClickable: true,
                speed:400,
                moveStartThreshold: 100
            })
        <?php echo '</script'; ?>
>           
        <?php } else { ?>   
       <div class="span12" id="tabstripprincipal" >
      
            <div id="tabstrip">
                <ul>
                    <li>
                       Inicio
                    </li>
                </ul>
                <div>
                    <div class="row-fluid  hidden-phone" >
                        <div class="span12" >
                        </div> 
                    </div>
                    <div class="row-fluid fadein" >
                            
                            <div class="span1 hidden-phone" >
                            </div> 
                            <div class="span10" >
                                <?php if ($_smarty_tpl->tpl_vars['tipo_usuario']->value=="1") {?>
                                    <p> <span class='azulparrafo'> <?php echo $_smarty_tpl->tpl_vars['mensajebienvenida']->value;?>
 <span id="nombrevista"><?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
</span>, bienvenido/a a nuestra plataforma.<br>
                                        <span id="mensajebienvenidacatualizar"> 
                                            <!--div><?php if ($_smarty_tpl->tpl_vars['id_perfil']->value=="6"||$_smarty_tpl->tpl_vars['id_perfil']->value=="9") {?>
                                                <?php if ($_smarty_tpl->tpl_vars['registroempresas']->value=="0") {?>                                                    
                                                <?php } elseif ($_smarty_tpl->tpl_vars['registroempresas']->value=="1") {?>
                                                     Tienes<em class="cajaterminosaviso"><span class='terminosaviso' onclick="anadir('Registro de Empresas','admEmpresa','revisarempresatemporal')">1</span></em>registro de empresa por revisar.<br>
                                                <?php } else { ?>
                                                     Tienes<em class="cajaterminosaviso"><span class='terminosaviso' onclick="anadir('Registro de Empresas','admEmpresa','revisarempresatemporal')"><?php echo $_smarty_tpl->tpl_vars['registroempresas']->value;?>
</span></em>registros de empresas por revisar.<br>
                                                <?php }?>
                                                <span id="registrosmodificacioncomentario">
                                                <?php if ($_smarty_tpl->tpl_vars['registromodificacion']->value=="0") {?>
                                                <?php } elseif ($_smarty_tpl->tpl_vars['registromodificacion']->value=="1") {?>
                                                     Tienes<em class="cajaterminosaviso"><span class='terminosaviso' id="registrosmodificacioncomentarionumero" onclick="anadir('Solicitudes de Modificación','admEmpresa','mostrarSolicitudesModificacion')">1</span></em> solicitud de modificación de empresa.<br>
                                                <?php } else { ?>
                                                     Tienes<em class="cajaterminosaviso"><span class='terminosaviso' id="registrosmodificacioncomentarionumero" onclick="anadir('Solicitudes de Modificación','admEmpresa','mostrarSolicitudesModificacion')"><?php echo $_smarty_tpl->tpl_vars['registromodificacion']->value;?>
</span></em> solicitudes de modificacion de empresa.<br>
                                                <?php }?>
                                                </span>
                                            <?php }?>
                                            
                                            <?php if ($_smarty_tpl->tpl_vars['id_perfil']->value=="7"||$_smarty_tpl->tpl_vars['id_perfil']->value=="9") {?>
                                                <?php if ($_smarty_tpl->tpl_vars['ddjjporrevisar']->value=="0") {?>
                                                <?php } elseif ($_smarty_tpl->tpl_vars['ddjjporrevisar']->value=="1") {?>
                                                     Tienes<em class="cajaterminosaviso"><span class='terminosaviso' id="registrosmodificacioncomentarionumero" onclick="anadir('Declaraciones Juradas','admDeclaracionJurada','listarRevisionDeclaracionJurada')">1</span></em> Declaración Jurada para revisar.<br>
                                                <?php } else { ?>
                                                     Tienes<em class="cajaterminosaviso"><span class='terminosaviso' id="registrosmodificacioncomentarionumero" onclick="anadir('Declaraciones Juradas','admDeclaracionJurada','listarRevisionDeclaracionJurada')"><?php echo $_smarty_tpl->tpl_vars['ddjjporrevisar']->value;?>
</span></em> Declaraciones Juradas para revisar.<br>
                                                <?php }?>
                                            <?php }?>
                                            </div-->
                                        </span>      
                                    </span>
                                </p> 
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['tipo_usuario']->value=="2") {?>
                                 <p> <span class='azulparrafo'> <?php echo $_smarty_tpl->tpl_vars['mensajebienvenida']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
, te damos la bienvenida a nuestra plataforma.<br>
                                      
                                    </span>
                                </p> 
                                    <?php if ($_smarty_tpl->tpl_vars['firma']->value=='1') {?>
                                        <?php if ($_smarty_tpl->tpl_vars['id_perfil']->value!='23') {?>
                                        <span class='terminos letrarelevante' id='guardarfirmaspan' onclick="anadir('Guardar Firma','admPersona','guardarFirma')" >
                                            Guardar mi firma. <?php echo $_smarty_tpl->tpl_vars['id_perfil']->value;?>

                                        </span>
                                        <?php echo '<script'; ?>
>
                                            var box1 = document.getElementById('guardarfirmaspan')
                                             box1.addEventListener('touchend', function(e){
                                                anadir('Guardar Firma','admPersona','guardarFirma')
                                            }, false)
                                        <?php echo '</script'; ?>
>   
                                        <?php }?>  
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['estadomodificacion']->value=="0") {?>                                                    
                                        <span id="mavisoconfiguracionempresa"> Su empresa ha sido observada por favor verifique sus datos en <span class='terminos letrarelevante' onclick="anadir('Mi RUEX','admEmpresa','miRuex')">edición de datos.</span><br></span>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['estado_empresa']->value=='10') {?>
                                        La vigencia de su RUEX a vencido por favor ingrese a <span class='terminos letrarelevante' onclick="anadir('Mi RUEX','admEmpresa','miRuex')"> edición y solicite su renovación.</span><br>
                                        <?php }?>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['tipo_usuario']->value=="3") {?>
                                <p> <span class='azulparrafo'> 
                                        <?php echo $_smarty_tpl->tpl_vars['mensajebienvenida']->value;?>
, te damos la bienvenida a nuestra plataforma.<br>
                                        Para la Obtención de Certificados de Origen es necesario asignar 
                                        <span class='terminos letrarelevante' onclick="anadir('Personal','admPersona','asignarPersona')">personal encargado</span> de este.<br>
                                  
                                        <?php if ($_smarty_tpl->tpl_vars['estadomodificacion']->value=="0") {?>                                                    
                                        <span id="mavisoconfiguracionempresa"> Su empresa ha sido observada por favor verifique sus datos en <span class='terminos letrarelevante' onclick="anadir('Mi RUEX','admEmpresa','miRuex')">edición de datos.</span><br></span>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['estado_empresa']->value=='10') {?>
                                        La vigencia de su RUEX a vencido por favor ingrese a <span class='terminos letrarelevante' onclick="anadir('Mi RUEX','admEmpresa','miRuex')"> edición y solicite su renovación.</span><br>
                                        <?php }?>
                                    </span>
                                </p> 
                                <?php }?>
                            </div>
                            <div class="span1 hidden-phone" >
                            </div>
                    </div>
                </div>	                
             </div>
                <div id="window"> 
                    <div><p>Con el objetivo de mantener actualizado el Directorio de Exportadores y el Catálogo de Oferta Exportable, su empresa debe efectuar el llenado de la información requerida en el formulario, la cual contempla: Datos generales, Datos del representante legal, Personal ocupado, Oferta exportable de productos, Capacidad productiva, Distribución y logística, Certificaciones.</p></div>
                    <!--input id="ir_encuesta" type="button"  value="IR A LA ENCUESTA" class="k-primary" /-->
                    <div><p>Ingrese al siguiente link:</p></div>
                    <div class="titulo"><p><a href='http://vcie.produccion.gob.bo/siexco/web/app.php/encuesta/<?php echo sha1($_smarty_tpl->tpl_vars['id_empresa']->value);?>
' target="_blank">IR A LA ENCUESTA</a></p></div>
                </div>
            <?php echo '<script'; ?>
>
                print 
                var tabStrip = $("#tabstrip").kendoTabStrip({
                animation:false}).data("kendoTabStrip");
                tabStrip.select(0);
                    
                $("#tabstrip ul.k-tabstrip-items").kendoSortable({
                    filter: "li.k-item",
                    axis: "x",
                    container: "ul.k-tabstrip-items",
                    hint: function(element) {
                        return $("<div id='hint' class='k-widget k-header k-tabstrip'><ul class='k-tabstrip-items k-reset'><li class='k-item k-state-active k-tab-on-top'>" + element.html() + "</li></ul></div>");
                    },
                    start: function(e) {
                        tabStrip.activateTab(e.item);
                    },
                    change: function(e) {
                        var tabStrip = $("#tabstrip").data("kendoTabStrip"),
                            reference = tabStrip.tabGroup.children().eq(e.newIndex);

                        if (e.oldIndex < e.newIndex) {
                            tabStrip.insertAfter(e.item, reference);
                        } else {
                            tabStrip.insertBefore(e.item, reference);
                        }
                    }
                }); 
                $(document).ready(function() {
                    var myWindow = $("#window"),
                        undo = $("#undo");

                $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=admAdmGeneral&tarea=encuesta_activa',
                success: function (data)
                    {
                        if (data=='1')
                        {
                           
                            myWindow.kendoWindow({
                                width: "600px",
                                title: "ACTUALIZACIÓN DEL DIRECTORIO DE EXPORTADORES Y EL CATÁLOGO DE OFERTA EXPORTABLE",
                                visible: false,
                                actions: [
                                    "Pin",
                                    "Minimize",
                                    "Maximize",
                                    "Close"
                                ],
                                close: onClose
                            }).data("kendoWindow").center().open();
                        }
                        else
                        {
                            myWindow.kendoWindow({
                                width: "600px",
                                title: "ACTUALIZACIÓN DEL DIRECTORIO DE EXPORTADORES Y EL CATÁLOGO DE OFERTA EXPORTABLE",
                                visible: false,
                                actions: [
                                    "Pin",
                                    "Minimize",
                                    "Maximize",
                                    "Close"
                                ],
                                close: onClose
                            }).data("kendoWindow").center().close();     
                        }   
                    }
                });


                    undo.click(function() {
                        myWindow.data("kendoWindow").open();
                        undo.fadeOut();
                    });

                    function onClose() {
                        undo.fadeIn();
                    }

                    
                });
                //-----------------enviamos correos------------------
                /*$.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=admCorreo&tarea=empresaAdmitidaModificacion&id_empresa=455&modificaciones=1,2,4,5,8,10,9,3,13',
                success: function (data) { alert(data);
                    } 
                });*/
            <?php echo '</script'; ?>
>
            </div> 
            <div class="row-fluid fadein" id="menuprincipal" >
            </div> 
            <?php echo '<script'; ?>
>ocultar('menuprincipal');<?php echo '</script'; ?>
>
        <?php }?>
    </div>    
<?php echo $_smarty_tpl->getSubTemplate ("includes/Pie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>

<?php if (($_smarty_tpl->tpl_vars['tipo_usuario']->value=="2"||$_smarty_tpl->tpl_vars['tipo_usuario']->value=="3")&&$_smarty_tpl->tpl_vars['estado_empresa']->value=="3") {?> 
<div id="bloqueo"  style="display:none">
    <div class="row-fluid " >
        <div class="span12" >
           <div class="titulo" >Aviso</div>
        </div>
    </div>
    <div class="row-fluid form" >
        <div class="span12" > Usted tiene los siguientes temas pendientes por regularizar:
        </div>
    </div>
    <div class="row-fluid " >
        <div class="span12" > 
        </div>
    </div>
    <div class="row-fluid " >
        <div class="span4" > 
        </div>
        <div class="span4" > 
            <input id="aceptarbloqueo" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
        </div>
        <div class="span4" > 
        </div>
    </div>
</div>
<?php echo '<script'; ?>
>
var bloqueo = $("#bloqueo");
bloqueo.kendoWindow({
    draggable: true,
    height: "200px",                      
    width: "400px",
    modal:true,
    resizable: true,
    animation: {
       open: {
          effects: "fade:in",
           duration: 2000
        }
      }
}).data("kendoWindow");
bloqueo.data("kendoWindow").open();
bloqueo.data("kendoWindow").center();
bloqueo.parent().find(".k-window-action").css("visibility", "hidden");
$("#aceptarbloqueo").kendoButton();
var aceptarbloqueo = $("#aceptarbloqueo").data("kendoButton");
aceptarbloqueo.bind("click", function(e){    
    <?php if ($_smarty_tpl->tpl_vars['variosperfiles']->value==1) {?>
    location.href='index.php?opcion=admPanelAdministrativo&tarea=salioempresa';
    <?php } else { ?>
    location.href='index.php?opcion=admSalir';
    <?php }?>
}); 

<?php echo '</script'; ?>
>
<?php }?>
<?php }} ?>
