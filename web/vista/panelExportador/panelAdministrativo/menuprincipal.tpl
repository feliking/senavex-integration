
<div class="swiper-container fadein">
    <div class="swiper-wrapper"> 
        {$turns = 1} 
        {$c = 1}
        {section name=opcion loop=$opciones}	
                    {if $turns=='1'}
                <div class="swiper-slide" >
                    <div class="slideempresas" >
                    {/if} 
                    {if $opciones[opcion]=='a'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img  onclick="mostrarmenu();anadir('Registro de Empresas','admEmpresa','revisarempresatemporal');" src="styles/img/ICO_RegEmpresa_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Registro de Empresas','admEmpresa','revisarempresatemporal');" >Registro de Empresas</p>
                </a>
            </div>
            {/if}    
            {if $opciones[opcion]=='b'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img  onclick="mostrarmenu();anadir('Admisión','admEmpresa','empresasadmitidas');" src="styles/img/ICO_EmpAdmit_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Admisión','admEmpresa','empresasadmitidas');" >Empresas Admitidas</p>
                </a>
            </div>
            {/if} 
            {if $opciones[opcion]=='c'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img  onclick="mostrarmenu();anadir('RUEX','admEmpresa','empresasruex');" src="styles/img/ICO_EmprRuex_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('RUEX','admEmpresa','empresasruex');" >Empresas Con Ruex</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='d'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img  onclick="mostrarmenu();anadir('Mis Facturas','admFactura','verFacturas');" src="styles/img/ICO_ver_fact_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Mis Facturas','admFactura','verFacturas');" >Mis Facturas</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='e'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img  onclick="mostrarmenu();anadir('Mi RUEX','admEmpresa','miRuex');" src="styles/img/ICO_EmprRuex_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Mi RUEX','admEmpresa','miRuex');" >Mi RUEX</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='f'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img  onclick="mostrarmenu();anadir('Personal','admPersona','asignarPersonal');" src="styles/img/ICO_AsigPersonal_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Personal','admPersona','asignarPersonal');">Asignar Personal</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='g'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img  onclick="mostrarmenu();anadir('Declaración Jurada','admDeclaracionJurada','');" src="styles/img/ICO_DeclaJurada_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Declaración Jurada','admDeclaracionJurada','');">Declaración Jurada</p>
                </a>
            </div>
            {/if}    
            {if $opciones[opcion]=='h'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Mi Personal','admPersona','listarPersonasPorEmpresa');" src="styles/img/ICO_MiPersonal_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Mi Personal','admPersona','listarPersonasPorEmpresa');">Mi Personal</p>
                </a>
            </div>
            {/if}  
            {if $opciones[opcion]=='i'}
            <div class="slideopcion">
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Inventario','admInventario','');" src="styles/img/ICO_Inventarios_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Inventario','admInventario','');">Inventario</p>
                </a>
            </div>
            {/if} 
            
            {if $opciones[opcion]=='j'}
            <div class="slideopcion">
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Factura','admFactura','crearFactura')" src="styles/img/ICO_Factura_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Factura','admFactura','crearFactura');">Factura</p>
                </a>
            </div>
            {/if} 
            {if $opciones[opcion]=='k'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Declaraciones Juradas','admDeclaracionJurada','revisarDeclaracionJurada')" src="styles/img/ICO_Factura_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Declaraciones Juradas','admDeclaracionJurada','listarRevisionDeclaracionJurada');">Declaraciones Juradas</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='l'}
            <div class="slideopcion">
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Solicitudes de Modificación','admEmpresa','mostrarSolicitudesModificacion')" src="styles/img/Ico_solicitudcambio_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Solicitudes de Modificación','admEmpresa','mostrarSolicitudesModificacion');">Modificaciones de Empresa</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='m'}
            <div class="slideopcion">
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Certificados de Origen','admCertificado','')" src="styles/img/ICO_CertOrigen_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Certificados de Origen','admCertificado','');">Certificado de Origen</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='n'}
            <div class="slideopcion">
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Certificados de Origen','admCertificado','listarRevisionCertificadosOrigen')" src="styles/img/ICO_CertOrigen_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Certificados de Origen','admCertificado','listarRevisionCertificadosOrigen');">Certificado de Origen</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='o'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    {if $tipo_usuario == "3"}
                    <img onclick="mostrarmenu();anadir('Configuración','admEmpresa','configuracionEmpresa');" src="styles/img/ICO_Config_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Configuración','admEmpresa','configuracionEmpresa');">Configuración</p>
                    {else}
                    <img onclick="mostrarmenu();anadir('Configuración','admPersona','configuracion');" src="styles/img/ICO_Config_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Configuración','admPersona','configuracion');">Configuración</p>
                    {/if} 
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='p'}
            <div class="slideopcion">
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Empresas','admEstadoEmpresas','estadoEmpresas')" src="styles/img/ICO_bloqueo_emp_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Empresas','admEstadoEmpresas','estadoEmpresas')">Empresas</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='q'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img  onclick="terminos();" src="styles/img/ICO_TermiCondicion_g.png"  />
                    <p class="plomaparrafo" onclick="terminos();">Terminos y Condiciones</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='r'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Permisos y Licencias','admAdministrativa','permisos');" src="styles/img/Ico_permisos_licencias_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Permisos y Licencias','admAdministrativa','permisos');">Permisos y Licencias</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='w'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Registro OIC','admCafe','do_cafe');" src="styles/img/ICO_Deposito_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Registro OIC','admCafe','do_cafe');">Registro OIC</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='x'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Revisar OIC','admCafe','check_cafe');" src="styles/img/Ico_oic_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Revisar OIC','admCafe','check_cafe');">Revisar OIC</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='y'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Revisión Depositos','admDeposito','validarDeposito');" src="styles/img/ICO_Deposito_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Revisión Depositos','admDeposito','validarDeposito');">Revisar Depositos</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='z'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Servicios Revisados','admProForma','Proforma_deuda');" src="styles/img/ICO_Deposito_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Servicios Revisados','admProForma','Proforma_deuda');">Servicios Revisados</p>
                </a>
            </div>
            {/if}
            {if $opciones[opcion]=='u'}
            <div class="slideopcion" >
                <a  href="" onclick="return false;"/>
                    <img onclick="mostrarmenu();anadir('Administracion General','admAdmGeneral','ver_operaciones');" src="styles/img/ICO_Deposito_g.png"  />
                    <p class="plomaparrafo" onclick="mostrarmenu();anadir('Administracion General','admAdmGeneral','ver_operaciones');">ADMINISTRACION GENERAL</p>
                </a>
            </div>
            {/if}
            {if $turns=='8' || $c==$opciones|@count}
                    </div>
                </div>
                    {$turns = 1}
                    {else}    
                    {$turns = $turns+1} 
                    {/if}
                    {$c = $c+1}
                {/section} 
        
    </div>
    {if $opciones|@count>'8'}
            <div class="pagination"></div>
   {/if}
</div>
<script languaje="JavaScript">
            var mySwiper = new Swiper('.swiper-container',{
					pagination: '.pagination',
					paginationClickable: true,
					speed:400,
					moveStartThreshold: 100
				  })
</script> 

