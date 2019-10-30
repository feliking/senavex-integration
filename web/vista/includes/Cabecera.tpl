 <div class="cuerpo" >
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
                <span class="rojo" id="empresavista">{if $id_perfil<>23}{if $empresa}{$empresa}{if $ruex} - RUEX:{$ruex}{/if}{/if}{/if}</span><br>
                <span class="rojo" id="nombresvista">{$nombrecompleto}{if $tipo_usuario=='3' && $ruex} - RUEX:{$ruex}{/if}</span><br>
                <span class="rojo" id="perfilvista">{$perfil}</span>
                {if $rol == 'temporal'}<!--es para alertarle al usuariotemporal el tiempo que le queda para hacer su registro-->
                    {if $estado_usuario_temp!=2}
                        {if $dias=='1'}
                            <span class="rojo">Hola {$nombre} tienes 1 dia para registrar tu empresa.</span>
                        {else}
                            <span class="rojo">Hola {$nombre} tienes {$dias} dias para registrar tu empresa.</span>
                        {/if}                   
                    {/if}
                {/if}
            </div>
             <div class="span2" style="height:100%;" > 
                 <div id="containerEx1" >                    
                    {if $rol == 'root' and isset($id_empresa_persona) and $id_empresa_persona!='x'}<!--si es un usuario normal -->
                        <!--si tiene un perfil mostramos el menus segun las opciones que tenga--> 
                        {if  isset($variosperfiles)}
                            <div class="cf" >
                                <a href="index.php?opcion=admPanelPrincipal&tarea=salioempresa"><img class="bottom" src="styles/img/homeB.png"  /> </a>
                                <a href="index.php?opcion=admPanelPrincipal&tarea=salioempresa"><img class="top" src="styles/img/homeA.png" /> </a>
                            </div>
                        {else}
                            <div class="cf" ></div>
                        {/if}
                        <div class="cf" id="iconomenu">
                            <a href="" onclick="return false;"><img class="bottom" src="styles/img/menuB.png"  /> </a>
                            <a href="" onclick="menu();return false;" ><img class="top" src="styles/img/menuA.png"/> </a>
                            <div id="flecha" class="flecha fadein"></div>
                            <div id="menu" class="menu fadein" ><!--este es el menu -->
                                {foreach from=$opciones_persona item=opcion}<!--empezamos a mostrar las opciones-->
                                    {if $opcion=='a'}
                                        <!--div id="a"  class="widget menucf"onclick="anadir('Registro de Empresas','admEmpresa','revisarempresatemporal')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_Registro_B.png"  /></a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_Registro.png" /> </a>
                                            <span>Registro de Empresas</span>
                                            {if $registroempresas != "0"}<em class="cajaterminosavisomenu"><div class='terminosavisomenu' id="notificacionregistros">{$registroempresas}</div></em>{else}
                                                <em class="cajaterminosavisomenu"><div class='terminosavisomenu' id="notificacionregistros">{$registroempresas}</div></em><script>ocultar("notificacionregistros");</script>{/if}
                                        </div-->
                                    {/if}
                                    {if $opcion=='b'}
                                        <div id="b" class="widget menucf" onclick="anadir('Admisión','admEmpresa','empresasadmitidas')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_EmpAdm_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_EmpAdm.png" /> </a>
                                            <span>Empresas Registradas</span>
                                            {if $admisiones != "0"}<em class="cajaterminosavisomenu"><div class='terminosavisomenup' id="notificacionadmisiones">{$admisiones}</div></em>{else}
                                                <em class="cajaterminosavisomenu"><div class='terminosavisomenup' id="notificacionadmisiones"></div></em><script>ocultar("notificacionadmisiones");</script>{/if}
                                        </div>
                                    {/if}
                                    {if $opcion=='c'}
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
                                    {/if}
                                    {if $opcion=='d'}
                                        <div id="d" class="widget menucf" onclick="anadir('Mis Facturas','admFactura','verFacturas')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                            <span>Mis Facturas</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='e'}
                                        <div id="e" class="widget menucf" onclick="anadir('Mi RUEX','admEmpresa','miRuex')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_EmpRuex_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_EmpRuex.png" /> </a>
                                            <span>Mi RUEX</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='f'}
                                        <div id="f" class="widget menucf" onclick="anadir('Personal','admPersona','asignarPersonal')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_Personal_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_Personal.png" /> </a>
                                            <span>Asignar Personal</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='g'}
                                        <div id="g" class="widget menucf" onclick="anadir('Declaración Jurada','admDeclaracionJurada','declaracionesJuradas')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_ddjj_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_ddjj.png" /> </a>
                                            <span>Declaración Jurada</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='h'}
                                        <div id="h" class="widget menucf" onclick="anadir('Mi Personal','admPersona','listarPersonasPorEmpresa')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_MPerson_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_MPerson.png" /> </a>
                                            <span>Mi Personal</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='i'}
                                        <div id="i" class="widget menucf" onclick="anadir('Inventario','admInventario','')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_Invent_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_Invent.png" /> </a>
                                            <span>Inventario</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='j'}
                                        <div id="j" class="widget menucf" onclick="anadir('Factura','admFactura','crearFactura')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_factura_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_factura.png" /> </a>
                                            <span>Factura</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='k'}
                                        <div id="k" class="widget menucf" onclick="anadir('Declaraciones Juradas','admDeclaracionJurada','listarRevisionDeclaracionJurada')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_ddjj_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_ddjj.png" /> </a>
                                            <span>Declaraciones Juradas {$ddjjporrevisar}</span>
                                            {if $ddjjporrevisar != "0"}<em class="cajaterminosavisomenu"><div class='terminosavisomenu' id="ddjjporrevisar">{$ddjjporrevisar}</div></em>{else}
                                                <em class="cajaterminosavisomenu"><div class='terminosavisomenu' id="ddjjporrevisar">{$ddjjporrevisar}</div></em><script>ocultar("ddjjporrevisar");</script>{/if}
                                        </div>
                                    {/if}
                                    {if $opcion=='l'}
                                        <div id="l" class="widget menucf" onclick="anadir('Solicitudes de Modificación','admEmpresa','mostrarSolicitudesModificacion')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_solicitudcambio_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_solicitudcambio.png" /> </a>
                                            <span>Modificaciones de Empresa</span>
                                            {if $registromodificacion != "0"}<em class="cajaterminosavisomenu"><div class='terminosavisomenu' id="notificacionmodificacion">{$registromodificacion}</div></em>{else}
                                                <em class="cajaterminosavisomenu"><div class='terminosavisomenu' id="notificacionmodificacion">{$registromodificacion}</div></em><script>ocultar("notificacionmodificacion");</script>{/if}
                                        </div>
                                    {/if}
                                    {if $opcion=='m'}
                                        <div id="m" class="widget menucf" onclick="anadir('Certificados de Origen','admCertificado','')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_CerOrig_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_CerOrig.png" /> </a>
                                            <span>Certificado de Origen</span>
                                        </div>
                                    {/if}
                                   
                                    {if $opcion=='n'}
                                        <div id="n" class="widget menucf" onclick="anadir('Certificados de Origen','admCertificado','listarRevisionCertificadosOrigen')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_CerOrig_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_CerOrig.png" /> </a>
                                            <span>Certificado de Origen</span>
                                        </div>
                                    {/if}
                                    
                                    {if $opcion=='o'}
                                        <div id="o" class="widget menucf" 
                                             {if $tipo_usuario == "3"}
                                             onclick="anadir('Configuración','admEmpresa','configuracionEmpresa')"
                                             {else}
                                              onclick="anadir('Configuración','admPersona','configuracion')"
                                             {/if}
                                             >
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_config_B.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_config.png" /> </a>
                                            <span>Configuración</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='p'}
                                        <div id="p" class="widget menucf" onclick="anadir('Empresas','admEstadoEmpresas','estadoEmpresas')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_bloqueo_emp_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_bloqueo_emp.png" /> </a>
                                            <span>Empresas</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='q'}
                                        <div id="q" class="widget menucf">
                                            <a href="" onclick="terminos();return false;"><img class="menubottom" src="styles/img/Ico_Terminos_B.png"  /> </a>
                                            <a href=""onclick="terminos();return false;"><img class="menutop" src="styles/img/Ico_Terminos.png" /> </a>
                                            <span>Terminos y Condiciones</span>
                                        </div>
                                    {/if}                                    
                                    {if $opcion=='r'}
                                        <div id="r" class="widget menucf" onclick="anadir('Permisos y Licencias','admAdministrativa','permisos')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_permisos_licencias_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_permisos_licencias.png" /> </a>
                                            <span>Permisos y Licencias</span>
                                        </div>
                                    {/if} 
                                    {if $opcion=='s'}
                                        <div id="s" class="widget menucf" onclick="anadir('Editar Menu','admPerfil','opcionesestados')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_permisos_licencias_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_permisos_licencias.png" /> </a>
                                            <span>Editar Menu</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='t'}
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
                                    {/if}
                                    {if $opcion=='u'}
                                         <div id="t" class="widget menucf" onclick="anadir('Administracion General','admAdmGeneral','ver_operaciones')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                            <span>Administracion General</span>
                                         </div>             
                                    {/if}
                                    {if $opcion=='v'}
                                       
                                    {/if}
                                    <!--div>
                                    {if $opcion=='w'}
                                        <div id="y" class="widget menucf" onclick="anadir('Registro OIC','admCafe','do_cafe')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_oic_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_oic.png" /> </a>
                                            <span>Registro OIC</span>
                                        </div>
                                    {/if}
                                    </div-->
                                    {if $opcion=='x'}
                                        <div id="z" class="widget menucf" onclick="anadir('Revisar OIC','admCafe','listar_cafe')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_oic_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_oic.png" /> </a>
                                            <span>Revisar OIC</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='y'}
                                        <!--div id="y" class="widget menucf" onclick="anadir('Revisión Depositos','admDeposito','revisarDeposito')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                            <span>Revisar Depositos</span>
                                        </div-->
                                    {/if}
                                    {if $opcion=='z'}
                                        {if $tipo_usuario == "1"}
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
                                        {else}
                                            <!--div id="z" class="widget menucf" onclick="anadir('Facturar','admProForma','Proforma_deuda')">
                                               <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                               <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                               <span>Facturar Servicios</span>
                                            </div-->
                                        {/if}
                                    {/if}
                                    {if $opcion=='K'}
                                        <div id="t" class="widget menucf" onclick="anadir('Facturar Importaciones','admProForma','factura_manual_importaciones')">
                                            <a href="" onclick="return false;"><img class="menubottom" src="styles/img/Ico_ver_fact_b.png"  /> </a>
                                            <a href="" onclick="return false;"><img class="menutop" src="styles/img/Ico_ver_fact.png" /> </a>
                                            <span>Facturacion CBP - BPP </span>
                                         </div>  
                                    {/if}
                                    {if $opcion=='M'}
                                        <div id="i" class="widget menucf" onclick="anadir('Revision RUI','admRegistroApi','revisionApi')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_EmpAdm_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_EmpAdm.png" /> </a>
                                            <span>REVISION RUI</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='N'}
                                        <div id="i" class="widget menucf" onclick="anadir('Mi RUI','admRegistroApi','mostrarrui')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_EmpAdm_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_EmpAdm.png" /> </a>
                                            <span>Mi RUI</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='O'}
                                        <div id="i" class="widget menucf" onclick="anadir('SOLICITUDES AP','admAutorizacionPrevia','ListarColaApiEmpresa')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_EmpAdm_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_EmpAdm.png" /> </a>
                                            <span>SOLICITUDES AP</span>
                                        </div>
                                    {/if}
                                    {if $opcion=='P'}
                                        <div id="i" class="widget menucf" onclick="anadir('listas API','admRegistroApi','listaApis')" >
                                            <a href="" onclick="return false;"><img  class="menubottom" src="styles/img/Ico_EmpAdm_B.png"  /> </a>
                                            <a href=""onclick="return false;"><img  class="menutop" src="styles/img/Ico_EmpAdm.png" /> </a>
                                            <span>LISTAS API</span>
                                        </div>
                                    {/if}
                                {if $opcion=='A'}
                                    <div class="widget menucf" onclick="anadir('Acuerdos','admAcuerdo','acuerdos')">
                                        <div><img class="menubottom" src="styles/img/Ico_Registro_B.png"/></div>
                                        <div><img class="menutop" src="styles/img/Ico_Registro.png"/></div>
                                        <span>Acuerdos</span>
                                    </div>
                                {/if}
                                {if $opcion=='B'}
                                    <div class="widget menucf" onclick="anadir('Aranceles','admArancel','aranceles')">
                                        <div><img class="menubottom" src="styles/img/Ico_Registro_B.png"/></div>
                                        <div><img class="menutop" src="styles/img/Ico_Registro.png"/></div>
                                        <span>Aranceles</span>
                                    </div>
                                {/if}
                                {if $opcion=='E'}
                                    <div class="widget menucf" onclick="anadir('Análisis de Riesgo','admAnalisisRiesgo','analisisContenido')">
                                        <div><img class="menubottom" src="styles/img/Ico_Invent_B.png"/></div>
                                        <div><img class="menutop" src="styles/img/Ico_Invent.png"/></div>
                                        <span>Análisis de Riesgo</span>
                                    </div>
                                {/if}
                                {if $opcion=='F'}
                                    <div class="widget menucf" onclick="anadir('Verificaciones','admVerificaciones','verificaciones')">
                                        <div><img class="menubottom" src="styles/img/Ico_MPerson_B.png"/></div>
                                        <div><img class="menutop" src="styles/img/Ico_MPerson.png"/></div>
                                        <span>Verificaciones</span>
                                    </div>
                                {/if}
                                {if $opcion=='G'}
                                    {*preguntamos si es la unidad legal o no*}
                                    <div class="widget menucf"
                                         onclick="{if $veSanciones}anadir('Registro Infracciones','admSancion','sanciones')
                                                      {else}infracciones.listarInfracciones(){/if}">
                                        <div><img class="menubottom" src="styles/img/Ico_ddjj_B.png"/></div>
                                        <div><img class="menutop" src="styles/img/Ico_ddjj.png"/></div>
                                        <span>Registro Infracciones</span>
                                    </div>
                                {/if}
                                {/foreach}
                                <script>
                                    {literal}
                                    var opciones_persona={/literal}"{foreach from=$opciones_persona item=opcion}{$opcion}{/foreach}"{literal};
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
                                    {/literal}
                                </script>    
                            </div>
                        </div>
                        <!--del perfil -->
                        
                    {else}<!--del root --si es un usuario normal -->
                        <div class="cf" >
                        </div>
                        <div class="cf" >
                        </div>
                    {/if}<!--del root --si es un usuario normal -->
                    <div class="cf" >
                        <a href="index.php?opcion=admSalir"><img class="bottom" src="styles/img/salirB.png"  /> </a>
                        <a href="index.php?opcion=admSalir"><img class="top" src="styles/img/salirA.png" /> </a>
                    </div> 
                    
                </div>
            </div>
            <div class="span1 hidden-phone" > 
                {if $tipo_usuario == "3"}
                    <div class="user" id="userem"> 
                       <a style="position:relative;" > 
                        <img  id="imagenempresacabecera" src="styles/img/empresas/{$id_empresa}.{$formato_imagen}" onError='this.onerror=null;imgendefectoempresa(this);' />
                       </a> 
                    </div> 
                {else}
                    <div class="user" id="userem"> 
                       <a style="position:relative;" > 
                        <em><span id="pinvista">Hola, {$nombre}</span></em>
                        <img  id="imagenpersonacabecera" src="styles/img/personal/{$id_persona}.{$formato_imagen}" onError='this.onerror=null;imgendefectopersona(this);' />
                       </a> 
                    </div> 
                {/if}
            </div>
        </div>
        
<script> 
    
        {literal}
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
         
        
         
     
        {/literal}
   
</script>