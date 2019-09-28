<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-02 19:29:22
         compiled from "/enex/web1/sitio/web/vista/includes/Cabecera.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71017495957ceda55ab00e9-13035317%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5f033a62d819d5d70ac4b0b530598cd6e4171a9' => 
    array (
      0 => '/enex/web1/sitio/web/vista/includes/Cabecera.tpl',
      1 => 1567196420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71017495957ceda55ab00e9-13035317',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ceda55b7ff24_28741956',
  'variables' => 
  array (
    'id_perfil' => 0,
    'empresa' => 0,
    'ruex' => 0,
    'nombrecompleto' => 0,
    'tipo_usuario' => 0,
    'perfil' => 0,
    'rol' => 0,
    'estado_usuario_temp' => 0,
    'dias' => 0,
    'nombre' => 0,
    'id_empresa_persona' => 0,
    'variosperfiles' => 0,
    'opciones_persona' => 0,
    'opcion' => 0,
    'registroempresas' => 0,
    'admisiones' => 0,
    'ddjjporrevisar' => 0,
    'registromodificacion' => 0,
    'id_empresa' => 0,
    'formato_imagen' => 0,
    'id_persona' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ceda55b7ff24_28741956')) {function content_57ceda55b7ff24_28741956($_smarty_tpl) {?> <div class="cuerpo" >	   
    <div class="container-fluid" >
        <div class="row-fluid " >
                    <div class="span12 hidden-phone" ></div> 
        </div>
        <div class="row-fluid header">
            <div class="span2">
                <center><img class="hidden-phone" src="styles/img/g1tICO.png" width="100%" style="max-width:110px;" >
                <img class="visible-phone" src="styles/img/g1tICO.png" width="70%" style="max-width:110px;" ></center>
            </div>
            <div class="span7  hidden-phone fadein" >
                <span class="rojo" id="empresavista"><?php if ($_smarty_tpl->tpl_vars['id_perfil']->value!=23) {
if ($_smarty_tpl->tpl_vars['empresa']->value) {
echo $_smarty_tpl->tpl_vars['empresa']->value;
if ($_smarty_tpl->tpl_vars['ruex']->value) {?> - RUEX:<?php echo $_smarty_tpl->tpl_vars['ruex']->value;
}
}
}?></span><br>
                <span class="rojo" id="nombresvista"><?php echo $_smarty_tpl->tpl_vars['nombrecompleto']->value;
if ($_smarty_tpl->tpl_vars['tipo_usuario']->value=='3'&&$_smarty_tpl->tpl_vars['ruex']->value) {?> - RUEX:<?php echo $_smarty_tpl->tpl_vars['ruex']->value;
}?></span><br>
                <span class="rojo" id="perfilvista"><?php echo $_smarty_tpl->tpl_vars['perfil']->value;?>
</span>
                <?php if ($_smarty_tpl->tpl_vars['rol']->value=='temporal') {?><!--es para alertarle al usuariotemporal el tiempo que le queda para hacer su registro-->
                    <?php if ($_smarty_tpl->tpl_vars['estado_usuario_temp']->value!=2) {?>
                        <?php if ($_smarty_tpl->tpl_vars['dias']->value=='1') {?>
                            <span class="rojo">Hola <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
 tienes 1 dia para registrar tu empresa.</span>
                        <?php } else { ?>
                            <span class="rojo">Hola <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
 tienes <?php echo $_smarty_tpl->tpl_vars['dias']->value;?>
 dias para registrar tu empresa.</span>
                        <?php }?>                   
                    <?php }?>
                <?php }?>
            </div>
             <div class="span2" style="height:100%;" > 
                 <div id="containerEx1" >                    
                    <?php if ($_smarty_tpl->tpl_vars['rol']->value=='root'&&isset($_smarty_tpl->tpl_vars['id_empresa_persona']->value)&&$_smarty_tpl->tpl_vars['id_empresa_persona']->value!='x') {?><!--si es un usuario normal -->
                        <!--si tiene un perfil mostramos el menus segun las opciones que tenga--> 
                        <?php if (isset($_smarty_tpl->tpl_vars['variosperfiles']->value)) {?>
                            <div class="cf" >
                                <a href="index.php?opcion=admPanelPrincipal&tarea=salioempresa"><img class="bottom" src="styles/img/homeB.png"  /> </a>
                                <a href="index.php?opcion=admPanelPrincipal&tarea=salioempresa"><img class="top" src="styles/img/homeA.png" /> </a>
                            </div>
                        <?php } else { ?>
                            <div class="cf" ></div>
                        <?php }?>
                        <div class="cf" id="iconomenu">
                            <a href="" onclick="return false;"><img class="bottom" src="styles/img/menuB.png"  /> </a>
                            <a href="" onclick="menu();return false;" ><img class="top" src="styles/img/menuA.png"/> </a>
                            <div id="flecha" class="flecha fadein"></div>
                            <div id="menu" class="menu fadein" ><!--este es el menu -->  
                                <?php  $_smarty_tpl->tpl_vars['opcion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['opcion']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['opciones_persona']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['opcion']->key => $_smarty_tpl->tpl_vars['opcion']->value) {
$_smarty_tpl->tpl_vars['opcion']->_loop = true;
?><!--empezamos a mostrar las opciones--> 
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='a') {?>
                                        <!--div id="a"  class="widget menucf"onclick="anadir('Registro de Empresas','admEmpresa','revisarempresatemporal')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_Registro_B.png"  /></a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_Registro.png" /> </a>
                                            <span>Registro de Empresas</span>
                                            <?php if ($_smarty_tpl->tpl_vars['registroempresas']->value!="0") {?><em class="cajaterminosavisomenu"><div class='terminosavisomenu' id="notificacionregistros"><?php echo $_smarty_tpl->tpl_vars['registroempresas']->value;?>
</div></em><?php } else { ?>
                                                <em class="cajaterminosavisomenu"><div class='terminosavisomenu' id="notificacionregistros"><?php echo $_smarty_tpl->tpl_vars['registroempresas']->value;?>
</div></em><?php echo '<script'; ?>
>ocultar("notificacionregistros");<?php echo '</script'; ?>
><?php }?>
                                        </div-->
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='b') {?>
                                        <div id="b" class="widget menucf" onclick="anadir('Admisión','admEmpresa','empresasadmitidas')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_EmpAdm_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_EmpAdm.png" /> </a>
                                            <span>Empresas Registradas</span>
                                            <?php if ($_smarty_tpl->tpl_vars['admisiones']->value!="0") {?><em class="cajaterminosavisomenu"><div class='terminosavisomenup' id="notificacionadmisiones"><?php echo $_smarty_tpl->tpl_vars['admisiones']->value;?>
</div></em><?php } else { ?>
                                                <em class="cajaterminosavisomenu"><div class='terminosavisomenup' id="notificacionadmisiones"></div></em><?php echo '<script'; ?>
>ocultar("notificacionadmisiones");<?php echo '</script'; ?>
><?php }?>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='c') {?>
                                        <div id="c" class="widget menucf" onclick="anadir('RUEX','admEmpresa','empresasruex')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_EmpRuex_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_EmpRuex.png" /> </a>
                                            <span>Empresas con RUEX</span>
                                        </div>
                                        <div id="c2" class="widget menucf" onclick="anadir('Verificar C.O.','admProForma','VerificadorCO')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_EmpRuex_B.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_EmpRuex.png" /> </a>
                                            <span>Verificar C.O.</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='d') {?>
                                        <div id="d" class="widget menucf" onclick="anadir('Mis Facturas','admFactura','verFacturas')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                            <span>Mis Facturas</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='e') {?>
                                        <div id="e" class="widget menucf" onclick="anadir('Mi RUEX','admEmpresa','miRuex')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_EmpRuex_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_EmpRuex.png" /> </a>
                                            <span>Mi RUEX</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='f') {?>
                                        <div id="f" class="widget menucf" onclick="anadir('Personal','admPersona','asignarPersonal')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_Personal_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_Personal.png" /> </a>
                                            <span>Asignar Personal</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='g') {?>
                                        <div id="g" class="widget menucf" onclick="anadir('Declaración Jurada','admDeclaracionJurada','')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_ddjj_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_ddjj.png" /> </a>
                                            <span>Declaración Jurada</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='h') {?>
                                        <div id="h" class="widget menucf" onclick="anadir('Mi Personal','admPersona','listarPersonasPorEmpresa')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_MPerson_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_MPerson.png" /> </a>
                                            <span>Mi Personal</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='i') {?>
                                        <div id="i" class="widget menucf" onclick="anadir('Inventario','admInventario','')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_Invent_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_Invent.png" /> </a>
                                            <span>Inventario</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='j') {?>
                                        <div id="j" class="widget menucf" onclick="anadir('Factura','admFactura','crearFactura')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_factura_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_factura.png" /> </a>
                                            <span>Factura</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='k') {?>
                                        <div id="k" class="widget menucf" onclick="anadir('Declaraciones Juradas','admDeclaracionJurada','listarRevisionDeclaracionJurada')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_ddjj_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_ddjj.png" /> </a>
                                            <span>Declaraciones Juradas <?php echo $_smarty_tpl->tpl_vars['ddjjporrevisar']->value;?>
</span>
                                            <?php if ($_smarty_tpl->tpl_vars['ddjjporrevisar']->value!="0") {?><em class="cajaterminosavisomenu"><div class='terminosavisomenu' id="ddjjporrevisar"><?php echo $_smarty_tpl->tpl_vars['ddjjporrevisar']->value;?>
</div></em><?php } else { ?>
                                                <em class="cajaterminosavisomenu"><div class='terminosavisomenu' id="ddjjporrevisar"><?php echo $_smarty_tpl->tpl_vars['ddjjporrevisar']->value;?>
</div></em><?php echo '<script'; ?>
>ocultar("ddjjporrevisar");<?php echo '</script'; ?>
><?php }?>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='l') {?>
                                        <div id="l" class="widget menucf" onclick="anadir('Solicitudes de Modificación','admEmpresa','mostrarSolicitudesModificacion')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_solicitudcambio_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_solicitudcambio.png" /> </a>
                                            <span>Modificaciones de Empresa</span>
                                            <?php if ($_smarty_tpl->tpl_vars['registromodificacion']->value!="0") {?><em class="cajaterminosavisomenu"><div class='terminosavisomenu' id="notificacionmodificacion"><?php echo $_smarty_tpl->tpl_vars['registromodificacion']->value;?>
</div></em><?php } else { ?>
                                                <em class="cajaterminosavisomenu"><div class='terminosavisomenu' id="notificacionmodificacion"><?php echo $_smarty_tpl->tpl_vars['registromodificacion']->value;?>
</div></em><?php echo '<script'; ?>
>ocultar("notificacionmodificacion");<?php echo '</script'; ?>
><?php }?>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='m') {?>
                                        <div id="m" class="widget menucf" onclick="anadir('Certificados de Origen','admCertificado','')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_CerOrig_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_CerOrig.png" /> </a>
                                            <span>Certificado de Origen</span>
                                        </div>
                                    <?php }?>
                                   
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='n') {?>
                                        <div id="n" class="widget menucf" onclick="anadir('Certificados de Origen','admCertificado','listarRevisionCertificadosOrigen')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_CerOrig_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_CerOrig.png" /> </a>
                                            <span>Certificado de Origen</span>
                                        </div>
                                    <?php }?>
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='o') {?>
                                        <div id="o" class="widget menucf" 
                                             <?php if ($_smarty_tpl->tpl_vars['tipo_usuario']->value=="3") {?>
                                             onclick="anadir('Configuración','admEmpresa','configuracionEmpresa')"
                                             <?php } else { ?>
                                              onclick="anadir('Configuración','admPersona','configuracion')"
                                             <?php }?>
                                             >
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_config_B.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_config.png" /> </a>
                                            <span>Configuración</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='p') {?>
                                        <div id="p" class="widget menucf" onclick="anadir('Empresas','admEstadoEmpresas','estadoEmpresas')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_bloqueo_emp_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_bloqueo_emp.png" /> </a>
                                            <span>Empresas</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='q') {?>
                                        <div id="q" class="widget menucf">
                                            <a href="" onclick="terminos();return false;"><img class="menubottom" src="styles/img/Ico_Terminos_B.png"  /> </a>
                                            <a href=""onclick="terminos();return false;"><img class="menutop" src="styles/img/Ico_Terminos.png" /> </a>
                                            <span>Terminos y Condiciones</span>
                                        </div>
                                    <?php }?>                                    
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='r') {?>
                                        <div id="r" class="widget menucf" onclick="anadir('Permisos y Licencias','admAdministrativa','permisos')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_permisos_licencias_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_permisos_licencias.png" /> </a>
                                            <span>Permisos y Licencias</span>
                                        </div>
                                    <?php }?> 
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='s') {?>
                                        <div id="s" class="widget menucf" onclick="anadir('Editar Menu','admPerfil','opcionesestados')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_permisos_licencias_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_permisos_licencias.png" /> </a>
                                            <span>Editar Menu</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='t') {?>
                                       <!--div id="t" class="widget menucf" onclick="anadir('REPORTES','admReportesEstadisticas','estadisticas')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_CerOrig_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_CerOrig.png" /> </a>
                                            <span>Reportes</span>
                                        </div-->
                                        <div id="t" class="widget menucf" onclick="anadir('CIERRES','admReportesEstadisticas','ver_cierres')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                            <span>Cierres</span>
                                         </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='u') {?>
                                         <div id="t" class="widget menucf" onclick="anadir('Administracion General','admAdmGeneral','ver_operaciones')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                            <span>Administracion General</span>
                                         </div>             
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='v') {?>
                                       
                                    <?php }?>
                                    <!--div>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='w') {?>
                                        <div id="y" class="widget menucf" onclick="anadir('Registro OIC','admCafe','do_cafe')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_oic_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_oic.png" /> </a>
                                            <span>Registro OIC</span>
                                        </div>
                                    <?php }?>
                                    </div-->
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='x') {?>
                                        <div id="z" class="widget menucf" onclick="anadir('Revisar OIC','admCafe','listar_cafe')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_oic_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_oic.png" /> </a>
                                            <span>Revisar OIC</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='y') {?>
                                        <!--div id="y" class="widget menucf" onclick="anadir('Revisión Depositos','admDeposito','revisarDeposito')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                            <span>Revisar Depositos</span>
                                        </div-->
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='z') {?>
                                        <?php if ($_smarty_tpl->tpl_vars['tipo_usuario']->value=="1") {?>
                                            <div id="z" class="widget menucf" onclick="anadir('Listar Facturar','admProForma','listar_facturas')">
                                                <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                                <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                                <span>Listar Facturas</span>
                                            </div>
                                            <div id="z" class="widget menucf" onclick="anadir('Facturar','admProForma','factura_manual')">
                                               <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                               <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                               <span>Facturacion</span>
                                            </div>
                                             <div id="z" class="widget menucf" onclick="anadir('Planillas','admPlanilla','show_planilla')">
                                               <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                               <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                               <span>Planillas</span>
                                            </div>
                                            <!--div id="z" class="widget menucf" onclick="anadir('Registrar CO','admProForma','registrarLotes')">
                                               <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                               <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                               <span>Lotes C.O.</span>
                                            </div-->
                                            <!--div id="z" class="widget menucf" onclick="anadir('Facturar 2','admProForma','factura_manual_1')">
                                               <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                               <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                               <span>Facturar</span>
                                            </div-->
                                        <?php } else { ?>
                                            <!--div id="z" class="widget menucf" onclick="anadir('Facturar','admProForma','Proforma_deuda')">
                                               <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                               <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                               <span>Facturar Servicios</span>
                                            </div-->
                                        <?php }?>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='K') {?>
                                        <div id="t" class="widget menucf" onclick="anadir('Facturar Importaciones','admProForma','factura_manual_importaciones')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                            <span>Facturacion CBP - BPP </span>
                                         </div>  
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='M') {?>
                                        <div id="i" class="widget menucf" onclick="anadir('Revision API','admRegistroApi','revisionApi')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_EmpAdm_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_EmpAdm.png" /> </a>
                                            <span>REVISION API</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='N') {?>
                                        <div id="i" class="widget menucf" onclick="anadir('Mi RUI','admRegistroApi','mostrarrui')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_EmpAdm_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_EmpAdm.png" /> </a>
                                            <span>Mi RUI</span>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['opcion']->value=='O') {?>
                                        <div id="i" class="widget menucf" onclick="anadir('API','admAutorizacionPrevia','ListarColaApiEmpresa')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_EmpAdm_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_EmpAdm.png" /> </a>
                                            <span>API</span>
                                        </div>
                                    <?php }?>
                                <?php } ?>
                                <?php echo '<script'; ?>
>
                                    
                                    var opciones_persona="<?php  $_smarty_tpl->tpl_vars['opcion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['opcion']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['opciones_persona']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['opcion']->key => $_smarty_tpl->tpl_vars['opcion']->value) {
$_smarty_tpl->tpl_vars['opcion']->_loop = true;
echo $_smarty_tpl->tpl_vars['opcion']->value;
} ?>";
                                    var sortable =$("#menu").kendoSortable({
                                            filter: ">div",
                                            /*placeholder: placeholder,
                                            hint: hint,
                                            end: onend,
                                            change:onchange*/
                                    }).data("kendoSortable");
                                    /*function placeholder(element) {
                                        return element.clone().addClass("placeholder");

                                    }*/
                                   /* function hint(element) {
                                        return element.clone().addClass("hint")
                                                    .height(element.height())
                                                    .width(element.width());
                                    }*/
                                   /* var viejo=-1;
                                    var nuevo=-1;                                    
                                    function onchange(e) {                                     
                                        viejo=e.oldIndex;
                                        nuevo=e.newIndex;
                                        opciones_persona=opciones_persona.replaceAt(viejo,nuevo);
                                       // alert(opciones_persona);
                                    }                                   
                                    function onend() {                                      
                                       swtouch=1;
                                    }*/
                                    
                                <?php echo '</script'; ?>
>    
                            </div>
                        </div>
                        <!--del perfil -->
                        
                    <?php } else { ?><!--del root --si es un usuario normal -->
                        <div class="cf" >
                        </div>
                        <div class="cf" >
                        </div>
                    <?php }?><!--del root --si es un usuario normal -->
                    <div class="cf" >
                        <a href="index.php?opcion=admSalir"><img class="bottom" src="styles/img/salirB.png"  /> </a>
                        <a href="index.php?opcion=admSalir"><img class="top" src="styles/img/salirA.png" /> </a>
                    </div> 
                    
                </div>
            </div>
            <div class="span1 hidden-phone" > 
                <?php if ($_smarty_tpl->tpl_vars['tipo_usuario']->value=="3") {?>
                    <div class="user" id="userem"> 
                       <a style="position:relative;" > 
                        <img  id="imagenempresacabecera" src="styles/img/empresas/<?php echo $_smarty_tpl->tpl_vars['id_empresa']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['formato_imagen']->value;?>
" onError='this.onerror=null;imgendefectoempresa(this);' />
                       </a> 
                    </div> 
                <?php } else { ?>
                    <div class="user" id="userem"> 
                       <a style="position:relative;" > 
                        <em><span id="pinvista">Hola, <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
</span></em>
                        <img  id="imagenpersonacabecera" src="styles/img/personal/<?php echo $_smarty_tpl->tpl_vars['id_persona']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['formato_imagen']->value;?>
" onError='this.onerror=null;imgendefectopersona(this);' />
                       </a> 
                    </div> 
                <?php }?>
            </div>
        </div>
        
<?php echo '<script'; ?>
> 
    
        
         ocultar('menu');
         ocultar('flecha');
        swmenu=0; 
        function menu() {
            /*if ($('#menu').is(':visible')) 
            {
                alert('no visible');
                ocultar('menu');
                ocultar('flecha');
                cambiar('tabstripprincipal','menuprincipal');
                if(swmenu==0)
                {
                    $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admPanelPrincipal&tarea=menuprincipal&opciones='+opciones_persona,
                    success: function (data) {
                       $("#menuprincipal").html(data);
                       swmenu=1; 
                        }
                    });  
                    ocultar('iconomenu');
                }
            } 
            else
            {   */
                //alert('visible');
                mostrar('menu');
                mostrar('flecha');
                //cambiar('tabstripprincipal','menuprincipal');
           // }
         }
        function mostrarmenu()
        {
            cambiar('menuprincipal','tabstripprincipal');
            mostrar('iconomenu');
        }
        var swtouch=0;
        $(document).mouseup(function (e)//para desk
        {
            var container = $("#menu");
            var iconomenu = $("#iconomenu");
            if (!container.is(e.target)&& container.has(e.target).length === 0 && swtouch==0 && !iconomenu.is(e.target)&& iconomenu.has(e.target).length === 0 )
            {
                document.getElementById('menu').style.display = "none";
                document.getElementById('flecha').style.display = "none";
                
            }
        });
        document.addEventListener('touchend', function(e) {
            e.preventDefault();
             var container = $("#menu");       
            if ((!container.is(e.target)&& container.has(e.target).length === 0 && swtouch==0) )
            {
                document.getElementById('menu').style.display = "none";
                document.getElementById('flecha').style.display = "none";
                swmenu=0;
            }
            swtouch=0;
            if($("#menu").is(e.target))
            {
                menu();
            }
        }, false);      
         
        
         
     
        
   
<?php echo '</script'; ?>
><?php }} ?>
