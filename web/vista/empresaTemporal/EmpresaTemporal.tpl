<html >
<head>
    <!--link rel="stylesheet" href="//kendo.cdn.telerik.com/2016.2.504/styles/kendo.common-material.min.css" /-->
    {include file="includes/Librerias.tpl"}
    
    
    
</head>
<body onload="document.ruex.razonsocial.focus();">
    <img id="logo_intro" class='hover' src="styles/img/logo_intro.png"  >
    {include file="includes/Cabecera.tpl"}
        <div class="row-fluid" >
            <div class="span1 hidden-phone" >
            </div>
            <div class="span10" id="formulario" >
                <form name="ruex" id="ruex" method="post"  action="index.php"  onkeypress="return anular(event)">
                    <input type="hidden" name="opcion" id="opcion" value="admEmpresaTemporal" />
                    <!input type="hidden" name="tarea" id="tarea" value="prueba">
                    <input type="hidden" name="tarea" id="tarea" value="registra">
                    <input type="hidden" name="rubroexportaciones" id="rubroexportaciones" value="" />
                    <div class="k-block fadein">
                        <div class="k-header"><div class="titulonegro">Registro Único del Exportador - RUEX</div></div>
                        <div class="k-cuerpo">
                            <fieldset >
                                <legend>1. DATOS DE LA EMPRESA</legend>
                                <div class="row-fluid form" >
                                    <div class="span4 fadein" >
                                        <div class="radio"><input type="checkbox" name="chbx_nro_ruex" id="chbx_nro_ruex" onclick='mostrar_ruex(this.checked)' >Poseo un numero RUEX</div> 
                                    </div>
                                    {literal}
                                     <div class="span3" id="div_ruex" >
                                         <input type="hidden" id="nro_ruex" name="nro_ruex">
                                    </div>
                                    {/literal}
                                </div>
                                <div class="row-fluid form" >
                                    <div class="span4 " >
                                        <input style="width:100%;" id="actividad" name="actividad" required validationMessage="Escoja su Actividad Economica">
                                    </div>
                                    <div class="span8 " id="divtipoempresa">
                                        <input style="width:100%;" id="tipoempresa" name="tipoempresa" required validationMessage="Escoja su tipo de Empresa">
                                    </div>
                                </div>
                                <div class="row-fluid  form"  >
                                    <div class="span6" >
                                        <input type="text" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Nombre o Razón Social"  name="razonsocial" id="razonsocial"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese su Nombre o razón social" />
                                    </div>

                                    <div class="span6 " id="div_nombrecomercial" name="div_div_nombrecomercial">
                                        <input type="text" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Nombre Comercial" name="nombrecomercial" id="nombrecomercial"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese su Nombre Comercial"/>
                                    </div>
                                </div>
                                <div class="row-fluid form" >
                                     {literal}
                                    <div class="span4 " id="div_nit" name="div_nit">

                                        <input type="text" name="nit" id="nit"
                                               onkeypress='return validateQty(event);' 
                                               class="k-textbox " 
                                               placeholder="número de identificacion Tributaria(NIT)"   
                                               maxlength="15"
                                               pattern="[0-9]{6,}"
                                               onkeypress="return isNumeric(event)" 
                                               oninput="maxLengthCheck(this)" 
                                               required
                                               data-nit
                                               data-required-msg="Ingrese un número de NIT válido,7 o más dígitos"/> 

                                    </div> 
                                    <div class="span4" id="divfundaempresa" >    

                                        <input type="text" pattern="[0-9]{3,}" name="fundaempresa" id="fundaempresa" 
                                                class="k-textbox "  
                                                placeholder="No. de Matricula FUNDEMPRESA" 

                                                required validationMessage="Ingrese su matricula de FUNDEMPRESA, 4 o más dígitos"/>
                                    </div> 
                                    <div class="span4 " id="div_certificacionnit" name="div_certificacionnit">

                                        <input type="text" name="certificacionnit" id="certificacionnit"  
                                               class="k-textbox " 
                                               placeholder="Codigo de certificaci&oacute;n de NIT" 
                                               pattern="[0-9]{6,}"
                                               onkeypress="return isNumeric(event)" 
                                               oninput="maxLengthCheck(this)" 
                                               maxlength="20" 
                                               required validationMessage="Ingrese su Codigo de certificaci&oacute;n, 7 o más dígitos"/>

                                    </div> 
                                    {/literal}
                                </div> 
                            </fieldset>
                           
                            <fieldset >
                                <legend>2. INFORMACIÓN ADICIONAL</legend>
                                <div class="row-fluid form" >
                                    <div class="span2" >
                                        <input  placeholder="Año de Fundación"  name="fundacion_empresa" id="fundacion_empresa" style="width:100%;" required validationMessage="Ingrese Año de Fundacion" />
                                    </div>
                                    <div class="span2" >
                                        <input  placeholder="Año de Inicio de Operaciones"  name="inicio_empresa" id="inicio_empresa"  style="width:100%;"required validationMessage="Ingrese Año de Inicio de Operaciones" />
                                    </div>
                                    <div class="span2" >
                                        <input type="number" step="0.000001"  name="coordenadas_lat" id="coordenadas_lat" class="k-textbox "style="width:100%;" placeholder="Latitud(Coordenadas)"    required validationMessage="Ingrese la latidud de sus coordenadas(google maps)" />
                                    </div>
                                    <div class="span2" >
                                        <input type="number" step="0.000001"  name="coordenadas_lon" id="coordenadas_lon" class="k-textbox "style="width:100%;" placeholder="Longitud(Coordenadas)"    required validationMessage="Ingrese la longitud de sus coordenadas(google maps)" />
                                    </div>
                                </div> 
                                
                                <div class="row-fluid form" >
                                    <div class="span12 fadein" id="div_descripcion_empresa" name="div_descripcion_empresa">
                                        <input type="text" name="descripcion_empresa" id="descripcion_empresa"  
                                           class="k-textbox "  
                                           placeholder="Descripcion de la Empresa"  
                                           required validationMessage="Ingrese Descripcion de la empresa" />
                                    </div>
                                </div>
                                <div class="row-fluid form" >
                                    <div class="span12 " >
                                        <input type="hidden" name="afifiliaciones_values" id="afiliaciones_values" value="{$afiliaciones_valores}" />
                                        <input style="width:100%;" id="afiliaciones" name="afiliaciones">
                                    </div> 
                                </div>
                            </fieldset>
                            <fieldset >
                                <legend>3. CATEGORIZACIÓN DE EMPRESA</legend>
                                <div class="span2 fadein" >
                                    <div class="radio">Nro. De Trabajadores </div> 
                                    <div class="radio"><input type="radio" name="trabajadores" value="1" id="sifundaempresa"  data-radio required>1-9</div> 
                                    <div class="radio"><input type="radio" name="trabajadores" value="2" id="nofundaempresa" data-radio required>10-19</div>  
                                    <div class="radio"><input type="radio" name="trabajadores" value="3" id="sifundaempresa" data-radio required>20-49</div>   
                                    <div class="radio"><input type="radio" name="trabajadores" value="4" id="nofundaempresa" data-radio required>Más de 49</div>  
                                    <span class="k-invalid-msg" data-for="trabajadores"></span> <br/>
                                </div>
                                <div class="span3 fadein" > 
                                    <div class="radio">Activos productivos en UFV</div> 
                                    <div class="radio"><input type="radio" name="activos" value="1" id="sifundaempresa"  class="radio" data-radio required>1-150.000 </div>
                                    <div class="radio"><input type="radio" name="activos" value="2" id="nofundaempresa" class="radio"  data-radio required>150.001-1.500.000 </div>
                                    <div class="radio"><input type="radio" name="activos" value="3" id="sifundaempresa" class="radio"  data-radio required>1.500.001-6.000.000 </div> 
                                    <div class="radio"><input type="radio" name="activos" value="4" id="nofundaempresa" class="radio"  data-radio required>Más de 6.000.000 </div> 
                                    <span class="k-invalid-msg" data-for="activos"></span> <br/>
                                </div>
                                <div class="span3 fadein" > 
                                    <div class="radio">Ventas Anuales en UFV</div> 
                                    <div class="radio"><input type="radio" name="ventas" value="0" id="nofundaempresa" class="radio" data-radio required>Ninguno </div>
                                    <div class="radio"><input type="radio" name="ventas" value="1" id="sifundaempresa" class="radio" data-radio required>1-600.000 </div>
                                    <div class="radio"><input type="radio" name="ventas" value="2" id="nofundaempresa" class="radio" data-radio required><span>600</span>.001-3.000.00</div>
                                    <div class="radio"><input type="radio" name="ventas" value="3" id="sifundaempresa" class="radio" data-radio required>3.000.001-12.000.000 </div>
                                    <div class="radio"><input type="radio" name="ventas" value="4" id="nofundaempresa" class="radio" data-radio required>Más de 12.000.000 </div>

                                    <span class="k-invalid-msg" data-for="ventas"></span> <br/>
                                </div>
                                <div class="span3 fadein" > 
                                    Exportaciones Anuales en UFV
                                    <div class="radio"><input type="radio" name="exportaciones" value="0" id="nofundaempresa" class="radio" data-radio required>Ninguno</div>
                                    <div class="radio"><input type="radio" name="exportaciones" value="1" id="sifundaempresa" class="radio" data-radio required>1-75.000 </div>
                                    <div class="radio"><input type="radio" name="exportaciones" value="2" id="nofundaempresa" class="radio" data-radio required>75.001-750.000</div>
                                    <div class="radio"><input type="radio" name="exportaciones" value="3" id="sifundaempresa" class="radio" data-radio required>750.001-7.500.000 </div> 
                                    <div class="radio"><input type="radio" name="exportaciones" value="4" id="nofundaempresa" class="radio" data-radio required>Más de 7.500.000 </div>
                                    <span class="k-invalid-msg" data-for="exportaciones"></span> <br/>
                                </div>
                            </fieldset>
                          
                            <div class="row-fluid form" id="respfundaempresa">
                                
                            </div>  
                            <fieldset >
                                <legend>4. DOMICILIO FISCAL DE LA EMPRESA</legend>
                                <div class="row-fluid form" >
                                    {include file="admDireccion/Direccion_Edit.tpl" editable=true de_id=1 tipo=2 direccion_id=0}   
                                </div>
                                <div class="row-fluid form" >   

                                    <div class="span2 parametro" >Correo Electronico de la empresa</div>
                                    <div class="span4" >
                                        <input type="email" class="k-textbox "  
                                               placeholder="Correo Electronico de la empresa" 
                                               id="email" 
                                               name="email"  
                                               required data-required-msg="Introduzca un correo electronico"
                                                        data-available 
                                                        data-available-url="validate/username" 
                                                       />
                                    </div> 
                                </div> 

                                <div class="row-fluid form" >  

                                    <div class="span2 parametro" >Pagina Web</div>   
                                    <div class="span4 " >
                                        <input type="text" class="k-textbox "  placeholder="Página Web" id="paginaweb" name="paginaweb" />
                                    </div>
                                </div>
                               
                            </fieldset>
                                    
                            <div class="row-fluid form" >
                                <div class="barra" >                                         
                                </div> 
                            </div> 
                            <fieldset >
                                <legend>5. OPERADOR ECONOMICO AUTORIZADO</legend>
                                <div class="row-fluid form" >
                                    <div class="span9 radio" >
                                        Es Operador Econ&oacute;mico Autorizado (OEA)?(Si su empresa esta acreditada como OEA)</br>
                                        Si <input type="radio" name="radiooea" value="1" id="sioea" class="radio" onclick="esOEA(1)">
                                        No <input type="radio" name="radiooea" value="0" id="nooea" class="radio" onclick="esOEA(0)" checked>
                                    </div> 
                                    <div class="span3 " id='divoea'>
                                    </div>
                                </div>
                            </fieldset >

                            <div class="row-fluid form " id="tituloco">
                                <div class="span12 radio fadein" >
                                    Que campo desea que aparezca en sus Certificados de Origen?(puede modificarlo cuando desee)</br>
                                    Raz&oacute;n Social <input type="radio" name="titulocof" value="0" id="sirz" class="radio"checked >
                                    Nombre Comercial <input type="radio" name="titulocof" value="1" id="sinc" class="radio" >
                                </div>
                            </div>
                            <div class="row-fluid form" >
                                <div class="barra" >
                                </div>
                            </div>
                            <fieldset >
                                <legend>6. RUBROS PRINCIPALES DE EXPORTACIÓN</legend>
                                <div class="row-fluid" id="borra2">
                                    <div class="span12" >
                                        Escoja uno o mas rubros de exportación.
                                    </div>
                                </div>
                                {foreach from=$rubros_exportaciones item=rubro}
                                <div class="row-fluid" >
                                    <div name="rubro-{$rubro->id_rubro_exportaciones}" id="rubro-{$rubro->id_rubro_exportaciones}">
                                        <div class="checkboxtemporal">
                                            <!--input type="checkbox" name="rubroexportacionesarray[]" 
                                            {if $rubro->id_rubro_exportaciones=='4'}
                                                onclick="mostrarcafe({$rubro->id_rubro_exportaciones},this.checked);"
                                                id="checkboxcafe"
                                            {/if}
                                            {if $rubro->id_rubro_exportaciones=='8'}
                                                onclick="mostrarnim({$rubro->id_rubro_exportaciones},this.checked);"
                                                id="checkboxnim"
                                            {/if}
                                            value="{$rubro->id_rubro_exportaciones}"-->
                                            <input type="checkbox" name="rubroexportacionesarray[]" 
                                            {if $rubro->id_rubro_exportaciones=='4'}
                                                onclick="mostrarcafe({$rubro->id_rubro_exportaciones},this.checked);"
                                                id="checkboxcafe"
                                            {/if}
                                            value="{$rubro->id_rubro_exportaciones}">
                                        </div>
                                        <div class="checkboxcomentario" >
                                            {$rubro->descripcion}
                                        </div>
                                    </div> 
                                </div> 
                                {/foreach}
                            </fieldset >
                            <div class="row-fluid" >
                                <div class="span12" ><center>
                                     <input type="hidden" name="hiddenvalidator" id="hiddenvalidator" 
                             data-checkvalidator
                             data-required-msg="Complete los campos de productos" /></center>
                                </div> 
                            </div>                    
                            <div class="row-fluid" id="borrar">                                
                                <div class="span6 fadein" id="preguntascafe">                                
                                </div>    
                                <div class="span6 fadein" id="divnim">
                                </div> 
                            </div> 
                            <div class="row-fluid form" >
                                <div class="barra" >                                         
                                </div> 
                            </div> 
                            {*------------------------esta parte es para los datos del represantante Legal-----------------------------------------------*}
                            <div class="row-fluid" >
                                <div class="span12" >
                                    <center>7. Datos del Representante Legal</center>
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                <div class="barra" >                                         
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                <div class="span3 " >
                                    <input style="width:100%;" id="idpais" name="idpais" required validationMessage="Escoja el Pais">
                                </div>   
                                <div class="span3" >
                                <input style="width:100%;" id="tipodocumento" name="tipodocumento" required validationMessage="Escoja el tipo de documento">
                                </div>
                                <div class="span4 " >
                                   <input id="customers"  name="customers" style="width: 100%;"  required validationMessage="Por favor Introduzca el numero de documento"/>
                                </div>  
                                <div class="span2 " id="div_dpto_exp" name="div_dpto_exp">
                                    <input style="width:100%;" id="dpto_exp" name="dpto_exp" required validationMessage="Expedido(solo Bolivia)">
                                </div>  
                            </div>
                            <div class="row-fluid form" >                                                                   
                                <div class="row-fluid form" >
                                    <div class="span4" >
                                    <input type="text" class="k-textbox "  placeholder="Nombres"  name="nombres" id="nombres" onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese el o los nombres" />
                                    </div>
                                    <div class="span4" >
                                    <input type="text" class="k-textbox "  placeholder="Primer Apellido"  name="apellidop" id="apellidop" onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese el apellido paterno" />
                                    </div>
                                    <div class="span4" >
                                    <input type="text" class="k-textbox "  placeholder="Segundo Apellido"  name="apellidom" id="apellidom" onkeyup="javascript:this.value=this.value.toUpperCase();" validationMessage="Ingrese el apellido materno" />
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row-fluid form" >
                                
                                <div class="span4" >
                                    <input type="email" class="k-textbox "  
                                           placeholder="Correo Electronico del Representante Legal" 
                                           id="emailrp" name="emailrp"  
                                            data-availablerp 
                                            data-availablerp-url="validate/username"         
                                            required data-required-msg="Introduzca un correo electronico"/>
                                </div>  

                                <div class="span4" >
                                    <input type="text" class="k-textbox "  
                                        placeholder="cargo"  
                                        name="cargo" id="cargo" 
                                        onkeyup="javascript:this.value=this.value.toUpperCase();" 
                                        validationMessage="Ingrese su Cargo" required />
                                </div>
                                <div class="span4" >
                                    Sexo
                                    Masculino <input type="radio" id="genero" name="genero" value="1" class="radio" data-radio required> Femenino
                                    <input type="radio"   id="genero" name="genero" value="0" class="radio" data-radio required><br/>
                                    <span class="k-invalid-msg" data-for="genero"></span> 
                                </div>
                            </div>
                            <div id="div_datos_privados" name="div_datos_privados" > 
                                {include file="admDireccion/Direccion_Edit.tpl" editable=true de_id=2 tipo=3 direccion_id=0}
                            </div>
                            <div class="row-fluid form" >
                                <div class="barra" ></div>
                            </div>
                            {*--------------------------------------------------------------------------------------------*}
                            <div class="row-fluid form" >
                                <div class="span12 " >
                                    <input type="checkbox" id="checkterms" name="check" data-check  required data-required-msg="Aceptar los terminos y condiciones es un requisito">  Acepto los <span class='terminos' onclick="terminosruex()"> Terminos y Condiciones </span>del uso de la plataforma.
                                </div>
                            </div>
                            <div class="row-fluid form" >
                                <div class="barra" >
                                </div>
                            </div>
                            <div class="row-fluid form" >
                                <div class="span3 hidden-phone" ></div>
                                  <div class="span2 hidden-phone" >
                                    <input id="prueba" type="hidden"  value="prueba" class="k-primary" style="width:100%"/>
                                </div>
                                <div class="span2 " >
                                    <input id="registro" type="button"  value="Registro" class="k-primary" style="width:100%"/>
                                </div>
                                <div class="span4 " ></div>
                                <div class="span1 " ></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
                            
            <div id="aviso" class="span10 fadein"  >
                <div class="k-block fadein">
                        <div class="k-header"><div class="titulo">Aviso</div></div>
                        <div class="row-fluid  form" >
                                        <div class="span1 hidden-phone" ></div>
                                        <div class="span10" >
                                            <p> Aseg&uacute;rese de que los datos introducidos son los correctos <span class="letrarelevante">"<span id="avisorazonsociala"></span>"</span> con n&uacute;mero de <span class="letrarelevante">NIT:<span id="avisonita"></span></span>.
                                                <br>Verifique los correos que introdujo:<br>
                                                Correo de la empresa:<span class="letrarelevante">"<span id="avisoemail"></span>"</span>.<br>
                                                Correo del Representante Legal:<span class="letrarelevante">"<span id="avisoemailrp"></span>"</span>.
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
                            
            <div id="avisoError" class="span10 fadein"  >
                <div class="k-block fadein">
                    <div class="k-header"><div class="titulo">Encontramos un problema</div></div>
                    <div class="row-fluid  form" >
                        <div class="span1 hidden-phone" ></div>
                        <div class="span10" >
                            <p> UPS! se ah encontrado un error, por favor vuelve a intentarlo mas tarde </p>
                            <p> disculpe las molestias. </p>
                        </div>  
                        <div class="span1 hidden-phone" ></div>
                    </div> 
                </div>
            </div>
                            
            <div id="terruex" class="span10 fadein"  >
                <div class="k-block fadein">
                        <div class="k-header"> <div class="titulo" >Terminos y Condiciones</div></div>
                        <div class="row-fluid  form" >
                                        <div class="span1 hidden-phone" ></div>
                                        <div class="span10" >
                                            {include file="avisos/terminoscondiciones.tpl"}
                                        </div>  
                                        <div class="span1 hidden-phone" ></div>
                                        
                        </div> 
                        <div class="row-fluid  form" >
                            <div class="span5 hidden-phone" >
                            </div>
                            <div class="span2 " >
                                <input id="terminos" type="button" value="Aceptar" class="k-primary" style="width:100%"/> <br> 
                            </div> 
                            <div class="span5 hidden-phone" >
                            </div>
                        </div> 
                </div>
            </div>
                                        
            <div class="span10" id='conclucion'>
                <div class="k-block fadein">
                    <script src="https://maps.googleapis.com/maps/api/js"></script>
                    <div class="k-header k-headerrojo"><div class="tituloblanco">Atenci&oacute;n</div></div>
                    <div class="k-cuerpo">  
                        <div class="row-fluid" >
                               <div class="span12" >
                                 <p> Felicidades!! Tu registro se lleno satisfactoriamente, se ha enviado el <span class="letrarelevante" >usuario</span> y <span class="letrarelevante" >contraseña</span> del representante legal al email: <span class="letrarelevante" id='emailrlspan'></span><br>
                                     Agradecemos tu colaboración , SENAVEX.
                                 </p>
                               </div>  
                        </div> 
                        <div class="row-fluid " >
                            <div class="span12" >
                                <center>
                                    <div class="cfd" onclick='mostrarContacto("1")'>
                                        <img class="bottom" src="styles/img/deps/santacruz_b.png" style="max-width:60px;" >
                                        <img class="top" src="styles/img/deps/santacruz.png" style="max-width:60px;" >
                                    </div>
                                    <div class="cfd" onclick='mostrarContacto("2")'>
                                        <img class="bottom" src="styles/img/deps/lapaz_b.png" style="max-width:60px;" >
                                        <img class="top" src="styles/img/deps/lapaz.png" style="max-width:60px;" >
                                    </div>
                                    <div class="cfd" onclick='mostrarContacto("3")'>
                                        <img class="bottom" src="styles/img/deps/elalto_b.png" style="max-width:60px;" >
                                        <img class="top" src="styles/img/deps/elalto.png" style="max-width:60px;" >
                                    </div>
                                    <div class="cfd" onclick='mostrarContacto("4")'>
                                        <img class="bottom" src="styles/img/deps/cochabamba_b.png" style="max-width:60px;" >
                                        <img class="top" src="styles/img/deps/cochabamba.png" style="max-width:60px;" >
                                    </div>
                                    <div class="cfd" onclick='mostrarContacto("5")'>
                                        <img class="bottom" src="styles/img/deps/potosi_b.png" style="max-width:60px;" >
                                        <img class="top" src="styles/img/deps/potosi.png" style="max-width:60px;" >
                                    </div>
                                    <div class="cfd" onclick='mostrarContacto("6")'>
                                        <img class="bottom" src="styles/img/deps/oruro_b.png" style="max-width:60px;" >
                                        <img class="top" src="styles/img/deps/oruro.png" style="max-width:60px;" >
                                    </div>
                                    <div class="cfd" onclick='mostrarContacto("7")'>
                                        <img class="bottom" src="styles/img/deps/sucre_b.png" style="max-width:60px;" >
                                        <img class="top" src="styles/img/deps/sucre.png" style="max-width:60px;" >
                                    </div>
                                    <div class="cfd" onclick='mostrarContacto("8")'>
                                        <img class="bottom" src="styles/img/deps/riberalta_b.png" style="max-width:60px;" >
                                        <img class="top" src="styles/img/deps/riberalta.png" style="max-width:60px;" >
                                    </div>
                                    <div class="cfd" onclick='mostrarContacto("9")'>
                                        <img class="bottom" src="styles/img/deps/yacuiba_b.png" style="max-width:60px;" >
                                        <img class="top" src="styles/img/deps/yacuiba.png" style="max-width:60px;" >
                                    </div>
                                    <div class="cfd" onclick='mostrarContacto("10")'>
                                        <img class="bottom" src="styles/img/deps/tarija_b.png" style="max-width:60px;" >
                                        <img class="top" src="styles/img/deps/tarija.png" style="max-width:60px;" >
                                    </div>
                                </center>
                            </div>  
                        </div> 
                        <div class="row-fluid" id="cdiv1">
                            <div class="span12 fadein" >
                                <!--SANTA CRUZ<br>
                                C. René Moreno N° 258 entre c. Nuflo de Chávez y c. Warnes, Edif. Banco Nacional de Bolivia, Piso 4B.<br-->
                                C. Mariano telchi #57, 2do anillo,(detras de Saguapac)<br> 
                                Teléfono: 591 | 2 | 312-2466<br>
                                Fax: 591 | 2 | 312-2466<br><br>
                            </div>  
                        </div> 
                        <div class="row-fluid" id="cdiv2">
                            <div class="span12 fadein" >
                                LA PAZ<br> 
                                Av Camacho esq. Bueno Nº. 1488 | Edif. Viceministerio de Comercio & Exportaciones, 5to. Piso<br> 
                                Teléfono: 591 | 2 | 211-3621<br> 
                                Fax: 591 | 2 | 237-2055<br><br> 
                            </div>  
                        </div> 
                        <div class="row-fluid" id="cdiv3">
                            <div class="span12 fadein" >
                                EL ALTO<br>
                                Av. 6 de marzo entre calles 4 y 5; Edif. La Urbana Nº 1440, 1er. Piso, Of. Nº 23 (cerca al Banco Unión).<br>
                                Teléfono: 591 | 2 | 282-5491<br>
                                Fax: 591 | 2 | 282-5491<br><br>
                            </div>  
                        </div> 
                        <div class="row-fluid" id="cdiv4">
                            <div class="span12 fadein" >
                                COCHABAMBA<br>
                                Av. Killman Nº 1681 Ex – Aeropuerto | "Centro Logístico de Comercio Exterior"<br>
                                Teléfono: 591 | 2 | 411-3156<br>
                                Fax: 591 | 2 | 411-3156<br><br>
                            </div>  
                        </div> 
                        <div class="row-fluid" id="cdiv5">
                            <div class="span12 fadein" >
                                POTOSÍ<br>
                                c. BUSTILLOS Nº 867 (Z. SAN ROQUE), Edif. CORONA REAL - 1er. PISO, Of. Nº 109<br>
                                Teléfono: 591 | 2 | 612-2797<br>
                                Fax: 591 | 2 | 612-2797<br><br>
                            </div>  
                        </div> 
                        <div class="row-fluid" id="cdiv6">
                            <div class="span12" >
                                ORURO<br>
                                C. PDTE. MONTES ESQ. CALLE SUCRE S/N OFICINA Nº 202<br>
                                Teléfono: 591 | 2 | 511-7680<br>
                                Fax: 591 | 2 | 511-7680<br><br>
                            </div>  
                        </div> 
                        <div class="row-fluid" id="cdiv7">
                            <div class="span12 fadein" >
                                SUCRE<br>
                                c. Estudiantes Nº 78, Piso 1 (Zona Central)<br>
                                Teléfono: 591 | 2 | 691-7837<br>
                                Fax: 591 | 2 | 691-7837<br><br>
                            </div>  
                        </div> 
                        <div class="row-fluid" id="cdiv8">
                            <div class="span12 fadein" >
                                RIBERALTA<br>
                                Av. Amazónica s/n Esq. Calle Coco (Frente al complejo de COTERI) Urbanización Santa Teresita.<br>
                                Teléfono: 591 | 2 | 852-2099<br>
                                Fax: 591 | 2 | 852-2099<br><br>
                            </div>  
                        </div> 
                        <div class="row-fluid" id="cdiv9">
                            <div class="span12 fadein" >
                                YACUIBA<br>
                                C. SUCRE ESQ. COMERCIO, GALERIA YULI, 2do. NIVEL, OFICINA Nº 14<br>
                                Teléfono: 591 | 2 | 683-0435<br>
                                Fax: 591 | 2 | 683-0435<br><br>
                            </div>  
                        </div> 
                        <div class="row-fluid" id="cdiv10">
                            <div class="span12 fadein" >
                                TARIJA<br>
                                c. Ingavi N° 156 entre Colón y Suipacha, Edificio "Coronado" 2° piso<br>
                                Teléfono: 591 | 2 | 611-2825<br>
                                Fax: 591 | 2 | 611-2825<br><br>
                            </div>  
                        </div> 
                        <div class="row-fluid  form"  id="mapa">
                            <div class="span12 fadein" >
                               <div id="map-canvas"></div>
                            </div>  
                        </div> 
                    </div>  
                </div>
                <script> 
                {literal}   
                ocultar('mapa');
                ocultar('cdiv1');
                ocultar('cdiv2');
                ocultar('cdiv3');
                ocultar('cdiv4');
                ocultar('cdiv5');
                ocultar('cdiv6');
                ocultar('cdiv7');
                ocultar('cdiv8');
                ocultar('cdiv9');
                ocultar('cdiv10');
                var map;
                var marker;
                function initialize() {
                var mapCanvas = document.getElementById('map-canvas');
                 var myLatlng  = new google.maps.LatLng(-17.786398240342834,-63.181103644180325);
                var mapOptions = {
                  center: myLatlng,
                  zoom: 16,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                 map = new google.maps.Map(mapCanvas, mapOptions);
                 marker = new google.maps.Marker({position:myLatlng, map:map});
                }
                google.maps.event.addDomListener(window, 'load', initialize);
                var cdivant='1';
                function mostrarContacto(num)
                {
                    ocultar('cdiv'+cdivant); 
                    cdivant=num;
                    mostrar('cdiv'+num);
                    mostrar('mapa');

                    switch(num) {
                        case '1':
                            //var latlng  = new google.maps.LatLng(-17.786398240342834,-63.181103644180325); //santacruz
                            var latlng  = new google.maps.LatLng(-17.803342, -63.185519); //santacruj
                            google.maps.event.trigger(map, 'resize');
                            marker.setPosition(latlng);
                            map.setCenter(latlng); 
                            map.setZoom( map.getZoom() );
                            break;
                        case '2':
                            var latlng  = new google.maps.LatLng(-16.500050,-68.132177);// la paz
                            map.setCenter(latlng); 
                            marker.setPosition(latlng);
                            google.maps.event.trigger(map, 'resize');
                            map.setZoom( map.getZoom() );
                            break;
                        case '3':
                            var latlng  = new google.maps.LatLng(-16.50880671,-68.16421207);//el alto
                            map.setCenter(latlng);
                            marker.setPosition(latlng);
                            google.maps.event.trigger(map, 'resize');
                            map.setZoom( map.getZoom() );
                            break;
                        case '4':
                            var latlng  = new google.maps.LatLng(-17.41049532,-66.17257113);//cochabamba
                            map.setCenter(latlng);
                            marker.setPosition(latlng);
                            google.maps.event.trigger(map, 'resize');
                            map.setZoom( map.getZoom() );
                            break;
                        case '5':
                            var latlng  = new google.maps.LatLng(-19.58547661,-65.75434256);// potosi
                            map.setCenter(latlng); 
                            marker.setPosition(latlng);
                            google.maps.event.trigger(map, 'resize');
                            map.setZoom( map.getZoom() );
                            break;
                        case '6':
                            var latlng  = new google.maps.LatLng(-17.97058145,-67.11558103);//oruro
                            map.setCenter(latlng); 
                            marker.setPosition(latlng);
                            google.maps.event.trigger(map, 'resize');
                            map.setZoom( map.getZoom() );
                            break;
                        case '7':
                            var latlng  = new google.maps.LatLng(-19.047342640745597,-65.26133291667173);//sucre
                            map.setCenter(latlng);
                            marker.setPosition(latlng);
                            google.maps.event.trigger(map, 'resize');
                            map.setZoom( map.getZoom() );
                            break;
                        case '8':
                            ocultar('mapa');
                            //var myLatlng  = new google.maps.LatLng();//riberalta no tiene
                            break;
                        case '9':
                            var latlng  = new google.maps.LatLng(-22.01578830,-63.67800933);//yacuiba
                            map.setCenter(latlng); 
                            marker.setPosition(latlng);
                            google.maps.event.trigger(map, 'resize');
                            map.setZoom( map.getZoom() );
                            break;
                        case '10':
                            var latlng  = new google.maps.LatLng(-21.533595,-64.731523);//tarija
                            map.setCenter(latlng); 
                            marker.setPosition(latlng);
                            google.maps.event.trigger(map, 'resize');
                            map.setZoom( map.getZoom() );
                            break;
                        default:
                            break;
                    }    


                }

                {/literal} 
                </script> 
            </div>
                
            <div class="span10" id="barracargando">
                <div class="row-fluid" style="padding-top: 25%;">
                </div>
                <div class="row-fluid fadein" >
                     <div class="span2"> 
                    </div>
                    <div class="span8" > 
                        <div id="progressBar" style="width:100%;height: 8px;"></div>
                    </div>
                     <div class="span2" > 
                    </div>
                </div>
                <div class="row-fluid" >
                    <div class="span4" > 
                    </div>
                    <div class="span4" > 
                        <center>Espere un momento..</center>
                    </div>
                     <div class="span4"> 
                    </div>
                </div>
            </div>
                
            <div class="span1 hidden-phone" >
            </div>
                
        </div>
    </div>
  {if  ($sw_bienvenida_temporal == "0") and ($movil == "0")}  <!--para la bienvenida del usuario temporal --> 

        
            <div id="windowb"  >
                 <div class="titulo">Bienvenido</div><br>
                   <div id="mensajebienvenida">
                       <p>Bienvienido, a nuestra plataforma de servicios, el primer paso es registrar la empresa, para asi obtener su Registro &Uacute;nico de Exportaciónes - RUEX.
                   </p>
                   <input type="checkbox" id="checkboxb"  > No mostrar nuevamente este mensaje.
               </div>
            </div>          
          
             {literal}
            <script>
                
                    bienvenidasw=0;
                    function enviarcheckboxb()
                    {
                        if(bienvenidasw==1)
                        { 
                            var parametros='opcion=login&tarea=checkboxbienvenida&sw='+bienvenidasw;   
                           $.ajax({
                               data:  parametros,
                               url:   'index.php',
                               type:  'post',
                               success:  function () {
                               }
                           });
                        }
                    }
                    $(document).ready(function() {
                    $('#checkboxb').change(function() {
                            if($(this).is(":checked")) {bienvenidasw=1;
                            }
                            else
                            {  bienvenidasw=0;
                            }
                        });
                    });
                    var winb = $("#windowb").kendoWindow({

                          draggable: true,
                          height: "170px",                      
                          width: "350px",
                          resizable: true,
                          actions: [
                                    "Minimize",
                                    "Maximize",
                                    "Close"
                                ],
                          close: function(e) {
                              enviarcheckboxb();
                             },
                          animation: {
                            close: {
                              effects: "fade:out",
                              duration: 1000
                            }
                            }
                    }).data("kendoWindow");

                    winb.center(); 
                
            </script>   
            
           {/literal}
    {/if}       
    {include file="includes/Pie.tpl"}
    <script> 
ocultar('avisoError');

    /*$("#map").kendoMap({
        center: [30.268107, -97.744821],
        zoom: 3,
        layers: [{
            type: "tile",
            urlTemplate: "http://#= subdomain #.tile.openstreetmap.org/#= zoom #/#= x #/#= y #.png",
            subdomains: ["a", "b", "c"],
            attribution: "&copy; <a href='http://osm.org/copyright'>OpenStreetMap contributors</a>"
        }],

    });*/

    function maxLengthCheck(object) {
        if (object.value.length > object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
    }
    
    function isNumeric (evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode (key);
        var regex = /[0-9]|\./;
        if ( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
    function mostrar_ruex(estado){
        if(estado){
           // mostrar('div_ruex');
            $('#nro_ruex').remove();

            var elem='{literal}<input type="text"'+
                'name="nro_ruex" id="nro_ruex" '+
                'onkeypress="return validateQty(event);" '+
                'class="k-textbox "'+
                'placeholder="numero de RUEX"' +
                'maxlength="5"'+
                'pattern="[1-9][0-9]{4}"'+ 
                'onkeypress="return isNumeric(event)"'+
                'oninput="maxLengthCheck(this)"'+
                'required validationMessage="Ingrese un número de RUEX válido"/>{/literal}' ;
                $('#div_ruex').append(elem);
        }else{
            //ocultar('div_ruex');
            $('#nro_ruex').remove();

            var elem='<input type="hidden" '+
                'name="nro_ruex" id="nro_ruex" '+
                'class="k-textbox "/>';
                $('#div_ruex').append(elem);
        }
    }
    function execTipoempresa()
    {
        $("#tipoempresa").kendoComboBox(
            {   placeholder:"Tipo de Empresa",
                dataTextField: "tipoempresa",
                dataValueField: "Id",
                dataSource: [
                {section name=tipoempresa loop=$datostipoempresa}		
                { tipoempresa: "{$datostipoempresa[tipoempresa].descripcion}", Id: {$datostipoempresa[tipoempresa].id_tipo_empresa} },
                {/section} 
                ],
                change : function (e) {
                    if (this.value() && this.selectedIndex == -1) { 
                     this.text('');
                    }
                    else
                    {
                        //alert(this.value());
                        $('#nit').attr("validationMessage", "Ingrese un número de NIT válido");
                        $('#nit').attr("placeholder", "NIT");
                        mostrar('div_nit');
                        mostrar('divfundaempresa');
                        mostrar('div_certificacionnit');
                        $('#coordenadas_lon').attr('required','required');
                        $('#coordenadas_lat').attr('required','required');
                        $('#inicio_empresa').attr('required','required');
                        $('#fundacion_empresa').attr('required','required');
                        $('#fundaempresa').attr('required','required');
                        $('#descripcion_empresa').attr('required','required');
                        $('#descripcion_empresa').attr("placeholder", "Descripcion de la Empresa");
                        if(this.value()>9 && this.value()<=13 || this.value()==15 || this.value()==16){
                            ocultar('divfundaempresa');
                            $('#fundaempresa').removeAttr('required');
                        }
                        if(this.value()==9){
                            $('#fundaempresa').removeAttr('required');
                        }

                        if(this.value()==17){
                            ocultar('divfundaempresa');
                            ocultar('div_certificacionnit');
                            $('#nit').attr("validationMessage", "Ingrese un Documento de Identidad válido");
                            $('#nit').attr("placeholder", "NIT/CI/PASAPORTE");
                            $('#descripcion_empresa').attr("placeholder","Descripcion de la Empresa(opcional)");

                            $('#fundaempresa').removeAttr('required');
                            $('#certificacionnit').removeAttr('required');
                            $('#coordenadas_lon').removeAttr('required');
                            $('#coordenadas_lat').removeAttr('required');
                            $('#inicio_empresa').removeAttr('required');
                            $('#fundacion_empresa').removeAttr('required');
                            $('#descripcion_empresa').removeAttr('required');


                        }
                    }
                }
            });
    }
    execTipoempresa();
    $("#prueba").kendoButton();
    var prueba = $("#prueba").data("kendoButton");
    prueba.bind("click", function(e){
        /*window.open('index.php?opcion=admDireccion&tarea=save_data_direccion&'+$('#form_editar_direccion_1').serialize(), 'mywindow1','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        window.open('index.php?opcion=admDireccion&tarea=save_data_direccion&'+$('#form_editar_direccion_2').serialize(), 'mywindow2','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');*/
        /*$.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admDireccion&tarea=save_data_direccion&'+$('#form_editar_direccion_1 :input').serialize(),
            success: function (data) {
                alert(data);
                if(data!=-1)
                    dir1=data;
           }
        });
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admDireccion&tarea=save_data_direccion&'+$('#form_editar_direccion_2 :input').serialize(),
            success: function (data) {
                alert(data);
               if(data!=-1)
                    dir2=data;
           }
        });*/
      
        
       window.open("index.php?"+$('#ruex').serialize() +'&id_persona='+ swcustomers, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        //window.open("index.php?opcion=admEmpresaTemporal&tarea=pruebas&"+$("#ruex").serialize()+'&id_persona='+ swcustomers+'&afiliaciones='+multiSelect.value(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
    });
    
    $("#afiliaciones").kendoMultiSelect({
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
   
    var multiSelect = $("#afiliaciones").data("kendoMultiSelect"),
            setValue = function(e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.dataSource.filter({}); //clear applied filter before setting value

                    multiSelect.value($("#afiliaciones_values").val().split(","));
                }
            },
            setSearch = function (e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.search($("#word").val());
                }
            };
 
    this.onload(setValue('1'));
    $("#actividad").kendoComboBox(
        {
            placeholder:"Actividad Económica",
            dataTextField: "actividadeconomica",
            dataValueField: "Id",
            dataSource: [
                {section name=actividadeconomica loop=$datosactividadeconomica}
                    { actividadeconomica: "{$datosactividadeconomica[actividadeconomica].descripcion}", Id: {$datosactividadeconomica[actividadeconomica].id_actividad_economica} },
                {/section}
            ],
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) {
                 this.text('');
                }
            }
        });
   ocultar("div_municipio");
   ocultar("div_ciudad");
    $("#municipio_aux").kendoComboBox({
        placeholder:"Municipio, Seleccione un Dpto",
        dataTextField: "descripcion",
        dataValueField: "id_municipio"
    });
    $("#ciudad_aux").kendoComboBox({
        placeholder:"Ciudad, Seleccione una Ciudad",
        dataTextField: "descripcion",
        dataValueField: "id_Ciudad"
    });
    
    $("#departamento").kendoComboBox(
        {   placeholder:"Departamento",
            ignoreCase: true,
            dataTextField: "departamento",
            dataValueField: "Id",
            dataSource: [
            {section name=departamento loop=$datosdepartamento}		
            { departamento: "{$datosdepartamento[departamento].nombre}", Id: {$datosdepartamento[departamento].id_departamento} },
           {/section} 
            ],
            change : function (e) {
                 $("#municipio").val("");
                 var dpto = this.value();
                if (this.value() && this.selectedIndex == -1) { 
                }else
                {
                   
                    ocultar('div_municipio_aux');
                    mostrar("div_municipio");

                    $("#municipio").kendoComboBox({
                    
                        //autoBind: false,
                        //cascadeFrom: "idpaisdestino",
                        placeholder:"Municipio",
                        dataTextField: "descripcion",
                        dataValueField: "id_municipio",
                        dataSource: { 
                            transport: {
                                    read: {
                                        dataType: "json",
                                        url: "index.php?opcion=admEmpresaTemporal&tarea=listarMunicipios&id_departamento="+dpto
                                    }
                            }
                        },
                        change : function (e) {
                            $('#ciudad').val("")
                            var municipio=this.value();
                            if (this.value() && this.selectedIndex === -1) { 
                                this.text('');
                            }else{  
                                ocultar('div_ciudad_aux');
                                mostrar("div_ciudad");
                                $('#new_ciudad').remove();
                                $("#ciudad").kendoComboBox({
                    
                                //autoBind: false,
                                //cascadeFrom: "idpaisdestino",
                                placeholder:"Ciudad",
                                dataTextField: "descripcion",
                                dataValueField: "id_ciudad",
                                dataSource: { 
                                    transport: {
                                            read: {
                                                dataType: "json",
                                                url: "index.php?opcion=admEmpresaTemporal&tarea=listarciudades&id_municipio="+municipio
                                            }
                                    }
                                },
                                change : function (e) {
                                    var ciudad=this.value();
                                    $('#new_ciudad').remove();
                                    if (this.value() && this.selectedIndex === -1) { 
                                        this.text('');
                                    }else{ 
                                        $('#new_ciudad').remove();
                                        if(ciudad==0){
                                            var tag='<input type="text" class="k-textbox "  placeholder="Escriba la Ciudad" id="new_ciudad" name="new_ciudad" required validationMessage="Ingrese su Ciudad"/>';
                                            $('#div_new_ciudad').append(tag);
                                        }
                                    }
                                }
                            });
                            }

                        }
                    });
                 
                }
            }
        });
    $("#dpto_exp").kendoComboBox(
        {   placeholder:"Expedido(solo Bolivia)",
            ignoreCase: true,
            dataTextField: "sigla",
            dataValueField: "Id",
            dataSource: [
            {section name=departamento loop=$datosdepartamento}		
            { sigla: "{$datosdepartamento[departamento].sigla}", Id: {$datosdepartamento[departamento].id_departamento} },
           {/section} 
            ],
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) { 
                    this.text('');
                }
            }
        });
    $("#fundacion_empresa").kendoComboBox({
                    
            //autoBind: false,
            //cascadeFrom: "idpaisdestino",
            placeholder:"Fundacion",
            dataTextField: "year",
            dataValueField: "year",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admEmpresaTemporal&tarea=listarYear"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{  }

            }
        });
    $("#inicio_empresa").kendoComboBox({
                    
            //autoBind: false,
            //cascadeFrom: "idpaisdestino",
            placeholder:"Inicio Operaciones",
            dataTextField: "year",
            dataValueField: "year",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admEmpresaTemporal&tarea=listarYear"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{  }

            }
        });
    function fdepartamento()
    {
        departamento.text('');
    }
    var tipoempresa = $("#tipoempresa").data("kendoComboBox");
    var actividad = $("#actividad").data("kendoComboBox");
    var departamento = $("#departamento").data("kendoComboBox");
  //para el validador kendoo...............................................................................................................................
    var swe=2;
    var emailcache='';
    var swerp=2;
    var swerpr=0;
    var emailrpcache='';
    var validator = $("#ruex").kendoValidator({
       rules:{
            nit: function(input) {
                var validate = input.data('nit');
                if (typeof validate !== 'undefined') 
                {
                    $.ajax({
                        async:false,
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admEmpresa&tarea=VerificarNIT&nit='+$("#nit").val(),
                        success: function (data) {
                            var dt = eval('('+data+')');
                            if(dt[0].suceso==1){
                                alert(dt[0].msg);
                                $("#nit").val('');
                            }
                        }
                    });
                }
                return true;
            },
            telfs1: function(input) {
                var validate = input.data('telfs1');
                if (typeof validate !== 'undefined') 
                {
                    return $('#ed_tcel1').val()!='' && $('#ed_tfijo1').val()!='';
                }
                return true;
            },
            telfs2: function(input) {
                var validate = input.data('telfs2');
                if (typeof validate !== 'undefined') 
                {
                    return $('#ed_tcel2').val()!='' && $('#ed_tfijo2').val()!='';
                }
                return true;
            },
            radio: function(input) { 
                var validate = input.data('radio');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    return $("#ruex").find("[name=" + input.attr("name") + "]").is(":checked");
                }
                return true;
            },
            available: function(input) { 
                var validate = input.data('available');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    //-----------esto es parala parte de doble correo-----------------------------
                    if(!$('#cuantia').is(':checked'))
                    {
                        
                        //if($("#email").val()==$("#emailrp").val()) 
                        //{ 
                        //  swerpr=1; return false //cambiar a swerpr=1 para controlar emails diferentes
                        //} 
                        //else 
                        //{ 
                        swerpr=0;
                        //}
                    }
                    if (emailcache !== $("#email").val()) 
                    {
                        emailajax($("#email").val());                    
                        return false;
                    }
                    if(swe==0)
                    {
                       // swe=2;
                         return true;
                         
                    }
                    if(swe==1)
                    {  
                       
                        return false;
                    }   
                   
                
                }
               
                return true;
            }, 
            availablerp: function(input) { 
                var validate = input.data('availablerp');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                     if (emailrpcache !== $("#emailrp").val()) 
                     {
                    emailrpajax($("#emailrp").val());                    
                    return false;
                    }
                    if(swerp==0)
                    {
                       // swe=2;
                         return true;
                         
                    }
                    if(swerp==1)
                    {  
                       
                        return false;
                    }   
                   
                
                }
               
                return true;
             }, 
            checkvalidator: function(input) { 
                var validate = input.data('checkvalidator');
                if (typeof validate !== 'undefined') 
                {
                    if(verificacheckboxnotificacion())
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                return true;
            }
       },
       messages:{
            telfs1: "Ingrese al menos un teléfono fijo o célular",
            telfs2: "Ingrese al menos un teléfono fijo o célular",
            check: "Aceptar los terminos y condiciones es un requisito.",
            radio: "Seleccione una opción",
            email:"Introduzca un Correo Electronico Valido",
            checkvalidator: 'Escoja al menos un rubro de exportación',
            available: function(input) { 
                if(swerpr==1) return 'Su Correo no puede ser el mismo que el de su Representante legal';
                if(swe==1)
                {  
                  return 'Verifique su Correo';
                }
                else
                {    
                  return 'Revisando..';
                }
             },
            availablerp: function(input) {
                if(swerp==1)
                {  
                  return 'Verifique su Correo';
                }
                else
                {    
                  return 'Revisando..';
                }
             }
           
       }
       }).data("kendoValidator");
 
    function emailajax(mail)
    {        
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admEmpresaTemporal&tarea=verificarDominioCorreo&email='+mail,
            success: function (data) {
               swe=data;
               emailcache=$("#email").val();
               validator.validateInput($("#email"));
             }
        });
    }
    function emailrpajax(mail)
    {        
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admEmpresaTemporal&tarea=verificarDominioCorreo&email='+mail,
            success: function (data) {
               swerp=data;
               emailrpcache=$("#emailrp").val();
               validator.validateInput($("#emailrp"));
             }
        });
    }
    function verificacheckboxnotificacion()
    {
        var sw=1;
        $("input:checkbox[name='rubroexportacionesarray[]']:checked").each(function()
        {
            sw=0;
        });
        if(sw==0)
        {
            return true
        }
        else
        {
            return false
        }
    }
   /*--------------------para los terminos del ruex---------------------´*/
    ocultar('terruex');
        function terminosruex()
        {
            $("#nombres_persona").html($('#nombres').val()+' '+ $('#apellidop').val()+' '+$('#apellidom').val());
            $("#documento_persona").html($("#customers").val());
            $("#nombre_empresa").html($("#razonsocial").val()); 
            $("#nit_empresa").html($("#nit").val()); 
            cambiar('formulario','terruex');
        }
    $("#terminos").kendoButton();
    var terminos = $("#terminos").data("kendoButton");
    terminos.bind("click", function(e){ 
        document.getElementById("checkterms").checked = true;
        cambiar('terruex','formulario');
    }); 
   //para las ventanas........................................................................................................................................................................
   
   var swf=0;
   $("#aceptar").kendoButton();
    $("#cancelar").kendoButton();
   $("#registro").kendoButton();
    var aceptar = $("#aceptar").data("kendoButton");
    var cancelar = $("#cancelar").data("kendoButton");
    var registro = $("#registro").data("kendoButton");
    
   ocultar('aviso');

    registro.bind("click", function(e){   
        $('#afiliaciones').val(multiSelect.value());
        //window.open('index.php?'+$("#ruex").serialize(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
       if(validator.validate())
       { 
           $("#avisonita").html($("#nit").val());
           $("#avisorazonsociala").html($("#razonsocial").val());
           $("#avisoemail").html($("#email").val());
           $("#avisoemailrp").html($("#emailrp").val());
           cambiar('formulario','aviso');
       }
       else
       {
           window.scrollTo(0, 0);
       }
    }); 
    
    aceptar.bind("click", function(e){
        //------cambiamos a al  barra de espera-------------------------------------------
        cambiar('aviso','barracargando');
        swdevueltaajax=0;
        $('#logo_intro').removeClass('hover');
        var pb = $("#progressBar").data("kendoProgressBar");
        pb.value(0);
        var interval = setInterval(function () {
            if (pb.value() < 100) {
           
                if(pb.value()==92)
                {
                    $('#logo_intro').addClass('hover');
                }
                if(pb.value()==99)
                {
                    if(swdevueltaajax==1)
                    {
                        swdevueltaajax=0;
                        pb.value(pb.value() + 1);
                    }
                    if(swdevueltaajax==3)
                    {
                        clearInterval(interval);
                        cambiar('barracargando','avisoError');
                        $('#logo_intro').addClass('hover');
                    }
                }
                else
                {
                    pb.value(pb.value() + 1);
                }
            } 
            else
            {
                clearInterval(interval);
            }
        }, 100); 
        
        var id_empresa_result = -1;
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: $("#ruex").serialize()+'&id_persona='+ swcustomers,
            success: function (data) {
                var dt = eval('('+data+')');
                id_empresa_result = dt[0].id;
                if(dt[0].id==-1)
                {
                    swdevueltaajax=3;
                }
                else
                {
                    swdevueltaajax=1;
                     $.ajax({             
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admCorreo&tarea=empresaAdmitida&id_empresa='+id_empresa_result,
                        success: function (data) {

                       }
                    });
                } 
           }
        });
        //alert('enviando correos');
        /*if(id_empresa_result==-1){
        }else{
        }*/
    });    
    cancelar.bind("click", function(e){
        cambiar('aviso','formulario');
    }); 
  
       
    //para la tecl enter............................................
    function anular(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          return (tecla != 13);
     } 
//---------------esto es para el multiselect en este caso del rubroe de exportaciones-----------
   
    var rubroexportaciones='';
    function frubro(rubrocodigo)//  aca se asigna a la variable hidden el valor del rubro de exportaciones
    {
        if(rubroexportaciones=='')
        {
            rubroexportaciones=rubrocodigo;
        }
        else
        {
            rubroexportaciones=rubroexportaciones+','+rubrocodigo;
        }
        //asignar ala variable el rubro de exportaciones
        $('input#rubroexportaciones').val(rubroexportaciones);
    }
//------------------------------------esto es para el checkbox del cafe-----------------------
ocultar('preguntascafe');
function mostrarcafe(id,estado)
{
    if(estado){
        var elem=   '<div id="mostrarcafe" name="mostrarcafe">'+
                        '<div class="row-fluid form" id="campo1" name="campo1" >'+
                            '<div class="span4 fadein">'+
                                'Su empresa se dedica a la exportaci&oacute;n de cafe?'+
                            '</div>'+
                            '<div class="span2 fadein">'+
                                '<input type="radio"  class="checked" name="respcafe" id="respcafe" onclick="siCafe(true)">Si&nbsp;&nbsp;&nbsp;&nbsp;'+
                                '<input type="radio"  class="checked" name="respcafe" id="respcafe" onclick="siCafe(false)" checked>No'+
                            '</div>'+
                        '</div>'+
                        '<div class="row-fluid form span8" id="campo2" name="campo2"></div>'+
                    '</div>';
        $('#rubro-'+id).append(elem);
    }else{
        $("#mostrarcafe").remove();
    }
}

function siCafe(value)
{   
    if(value){
        var elem=   
                    '<div id="sicafe" name="sicafe">'+
                        '<div class="span4 fadein">'+
                            'Su empresa posee registro ICO?'+
                        '</div>'+
                        '<div class="span2 fadein">'+
                            '<input type="radio" class="checked" name="respico" id="siico" onclick="siIco(true)">Si&nbsp;&nbsp;&nbsp;&nbsp;'+
                            '<input type="radio" class="checked" name="respico" id="siico" onclick="siIco(false)" checked>No'+
                        '</div>'+
                        '<div class="span2 fadein" id="cajaico"></div>'+
                    '</div>';
        $('#campo2').append(elem);
    }else{
        $("#sicafe").remove();
    }

}
function siIco(value)
{
    if(value){
        var elem =  '{literal}<div id="div-ico" name="div-ico">'+
                                '<input type="text"'+
                                'class="k-textbox "'+
                                'pattern="[0-9]{4}"'+
                                'placeholder="ICO"'+
                                'name="ico"'+
                                'id="ico"'+
                                'maxlength="4" '+
                                'onkeypress="return isNumeric(event)" '+
                                'oninput="maxLengthCheck(this)" '+
                                'required validationMessage="Ingrese su ICO, 4 digitos" />'+
                            '</div>{/literal}';
            
            $('#cajaico').append(elem);
    }else{
        $("#div-ico").remove();
    }
}
//------------------------------------esto es para los combobox del representante legal---------------------------
$("#tipodocumento").kendoComboBox(
    {   placeholder:"Documento de Identidad",
        dataTextField: "tipodocumento",
        dataValueField: "Id",
        dataSource: [
        {foreach $datostipodocumento as $tipodocumento} 
        { tipodocumento: "{$tipodocumento->descripcion}", Id: {$tipodocumento->id_tipo_documentoidentidad}},
        {/foreach}
        ],
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) {                     
             this.text('');
            }
        }
       // index:0
});
var tipodocumento = $("#tipodocumento").data("kendoComboBox");
$("#idpais").kendoComboBox(
    {   placeholder:"País de Origen",
        dataTextField: "pais",
        dataValueField: "Id",
        dataSource: [
        {foreach $datospais as $pais} 
        { pais: "{$pais->nombre}", Id: {$pais->id_pais}},
        {/foreach}
        ],
        change : function (e) {
            var pais=this.value();
            if (this.value() && this.selectedIndex == -1) { 
             this.text('');
            }else{
                if(pais!=1){
                    $('#dpto_exp').removeAttr('required');
                }else{
                    $('#dpto_exp').attr('required','required');
                   // $('#dpto_exp').enable();
                }
            }
        }
});
var idpais = $("#idpais").data("kendoComboBox");
//------------------------esto es para el nim------------------------
ocultar('divnim');
function mostrarnim(id,estado)
{
   if(estado){
        var elem='{literal}<div id="div_nim" name="div_nim"> <input class="span3 k-textbox" type="text" \n\
                placeholder="N&uacute;mero de Identificaci&oacute;n minera"  \n\
                name="nim" id="nim"  \n\
                pattern="[0-9]{2}-[0-9]{4}-[0-9]{2}"\n\
                required validationMessage="Ingrese su Nim, formato: ## - #### - ##" /></div>{/literal}';
         $('#rubro-'+id).append(elem);    
   }else{
       $('#nim').html('');
        $("#div_nim").remove();
   }
    /*if($('#checkboxnim').is(':checked'))
    {
        $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=admEmpresaTemporal&tarea=nim',
        success: function (data) {
            mostrar('divnim');
            $("#divnim").html(data);
            }
        });
    }
    else
    {
        ocultar('divnim');
        $("#divnim").html('');
    }*/
}
//--------------esto es para la matricula funda empresa--------------------
//ocultar('divfundaempresa');
$('#cuantia').click(function(){
    if($('#cuantia').is(':checked'))
    {
        ocultar('divfundaempresa');
        $("#divfundaempresa").html('');
        $("#divtipoempresa").html('');
        $("#divexpfrecuente").html('');
    }
    else
    {       
        $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=admEmpresaTemporal&tarea=tipoempresadiv',
        success: function (data) {
                dataarray=data.split("&");
                $("#divtipoempresa").html(dataarray[0]);
                execTipoempresa();
                 $("#divexpfrecuente").html(dataarray[1]);
                
            }
        });
    }
    //--------------esto es para validar el correo----------------------
        if($("#email").val()!='' && $("#emailrp").val()!='' )   validator.validateInput($("#email"));  
}); 
//---------------------------------------esto es para la conclucion del sistema-----------------------
ocultar('conclucion');
//--------------esto es para ocultar la barraprogersiva
ocultar('barracargando');
$("#progressBar").kendoProgressBar({
    showStatus: false,
    animation: false,
    min: 0,
    max: 100,
    type: "percent",
    complete: function(e) {
        $("#correoelectronicor").html($('#email').val());
        $("#emailspan").html($('#email').val());
        $("#emailrlspan").html($('#emailrp').val());
        cambiar('barracargando','conclucion');
      }
});
 $('#logo_intro').addClass('hover');
 
 //-----------------------------esto es para los customers*-----------------------------------------------------------
               
$("#customers").kendoComboBox({
     placeholder:"Numero de Documento",
    filter:"startswith",
    dataTextField: "numero_documento",
    dataValueField: "id_persona",
    headerTemplate: '<div class="dropdown-header">' +
            '<span class="k-widget k-header">Foto</span>' +
            '<span class="k-widget k-header">Personal</span>' +
        '</div>',
    template: "<span class='k-state-default'><img src='styles/img/personal/"+
                "#: data.id_persona #"+"."+"#: data.formato_imagen #'"+
                " onError='this.onerror=null;imgendefectopersona(this);'/></span>" +
                "<span class='k-state-default'>#: data.nombres #<p>#: data.numero_documento #</p></span>",
    dataSource: {
        transport: {
            read: {
                dataType: "json",
                url: "index.php?opcion=admPersona&tarea=exportadores"
            }
        }
    },
    change : function (e) {
        if (this.value() && this.selectedIndex !== -1) { 
            fcustomers(this.value());
        }
        else
        {
            if(isNaN(this.value()))
            {
               customers.text(''); 
            }
            else
            {
            fcustomersnoes();   
            }
        }
    }
});

var customers = $("#customers").data("kendoComboBox");
var swcustomers='0';//esta vrialble es para ver si la persona es nueva o no
function fcustomers(id_persona)
{
    swcustomers=id_persona;//decimos que es una persona ya registrada
   
    $.ajax({             
    type: 'post',
    url: 'index.php',
    data: 'opcion=admPersona&tarea=getPersonaId&id_persona='+id_persona,
    success: function (data) {
        var persona = eval('('+data+')');
        //remplazamos los valores en las variables
        tipodocumento.value(persona[0].id_tipo_documento);
        idpais.value(persona[0].id_pais_origen);
        $('#nombres').val(persona[0].nombres);
        $('#apellidop').val(persona[0].paterno);
        $('#apellidom').val(persona[0].materno);
        
        //$('#numerocontacto').removeAttr('required');
        $('#dpto_exp').removeAttr('required');
        //$('#emailrp').removeAttr('required');
        //$('#genero').removeAttr('required');
        
        ocultar('div_datos_privados');
        setDisable_direccion2(true);
        
        ocultar('div_dpto_exp');
        
        $('#numerocontacto').val(persona[0].numero_contacto);
        $('#numerocontacto2').val(persona[0].numero_contacto2);
        //$('#cargo').val(persona[0].cargo);
        $('#emailrp').val(persona[0].email);
        $('input[name=genero]').val([persona[0].genero]);
        // para validar nuevamente el formulario
        validator.validate();
        
        //deshabilitlamos los campos para que no pueda cambiarlos
        tipodocumento.enable(false);
        idpais.enable(false);
        
        nombres.enable(false);
        apellidop.enable(false);
        apellidom.enable(false);
        numerocontacto.enable(false);
        //expedido.enable(false);
        emailrp.enable(false);
        document.getElementById("genero").disabled = true;
        var radios = document.ruex.genero;
        for (var i=0, iLen=radios.length; i<iLen; i++) {
          radios[i].disabled = true;
        } 

        }
    });
}
function fcustomersnoes()
{
    swcustomers='0';//decioms que es un personanueva
        mostrar('div_dpto_exp');
        mostrar('div_datos_privados');
        $('#dpto_exp').attr('required','required');
        
        $('#nombres').val('');
        $('#apellidop').val('');
        $('#apellidom').val('');
        $('#numerocontacto').val('');
        $('#numerocontacto2').val('');
        $('#cargo').val('');
 
        $('#emailrp').val('');
        idpais.text('');
        //tipodocumento.text('');
        //deshabilitlamos los campos para que no pueda cambiarlos
        setDisable_direccion2(false);
        tipodocumento.enable();
        idpais.enable();
        nombres.enable();
        apellidop.enable();
        apellidom.enable();
        numerocontacto.enable();
        numerocontacto2.enable();
        cargo.enable();
        emailrp.enable();
        document.getElementById("genero").disabled = true;
        var radios = document.ruex.genero;
        for (var i=0, iLen=radios.length; i<iLen; i++) {
          radios[i].disabled = false;
        } 
        // para validar nuevamente el formulario
}
$("#nombres").kendoMaskedTextBox();
$("#apellidop").kendoMaskedTextBox();
$("#apellidom").kendoMaskedTextBox();
$("#numerocontacto").kendoMaskedTextBox();
$("#numerocontacto2").kendoMaskedTextBox();
$("#cargo").kendoMaskedTextBox();
//$("#dpto_exp").kendoMaskedTextBox();
$("#emailrp").kendoMaskedTextBox({ 
    change: function() {
        if($("#email").val()!='' && !$('#cuantia').is(':checked'))   validator.validateInput($("#email")); 
    }
});

var nombres = $("#nombres").data("kendoMaskedTextBox");
var apellidop = $("#apellidop").data("kendoMaskedTextBox");
var apellidom = $("#apellidom").data("kendoMaskedTextBox");
var numerocontacto = $("#numerocontacto").data("kendoMaskedTextBox");
var numerocontacto2 = $("#numerocontacto2").data("kendoMaskedTextBox");
var cargo = $("#cargo").data("kendoMaskedTextBox");
//var expedido = $("#dpto_exp").data("kendoMaskedTextBox");
var emailrp = $("#emailrp").data("kendoMaskedTextBox");
//---------------------------para el OEA-----------------------------------------------
function esOEA(sw)
{
    if(sw)
    {
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admEmpresaTemporal&tarea=registroOEA',
            success: function (data) {
                $("#divoea").html(data);
                }
            });
    }
    else  $("#divoea").html('');   
}
//-----ocultar estado razoin social*----------------------------------------/
ocultar('tituloco');
</script>
</body>
</html>