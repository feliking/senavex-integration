<div class="row-fluid" class="fadein" id="datosgeneralesco" >
    <div class="row-fluid  form" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid form">
                        <div class="span12">
                            <div class="titulonegro" > EDICIÓN DEL CERTIFICADO DE ORIGEN {$co->getId_certificado_origen()}</div> 
                        </div>
                    </div>  
                </div>
                <div class="k-cuerpo">
                    <form name="form_general" id="form_general" method="post" action="index.php">
                        <input type="hidden" id="id_certificado_origen" name="id_certificado_origen" value="{$co->getId_certificado_origen()}">
                        <input type="hidden" id="tipo_desglose" name="tipo_desglose">
                        <div class="row-fluid form">
                            <div class="span3"></div>
                            <div class="span6">
                                <strong>Certificado {$co->tipo_co->getAbreviatura()} - Acuerdo {$co->acuerdo->getSigla()}</strong>
                            </div>
                            <div class="span3"></div>
                        </div>
                        <div class="row-fluid form">
                            <div class="span3"></div>
                            <div class="span6">
                                <input id="combopais" name="combopais" style="width: 100%" required validationMessage="Por favor escoja el País de Destino"/>
                            </div>
                            <div class="span3"></div>
                        </div>
                        <div class="row-fluid form">
                            <div class="span3"></div>
                            <div class="span6">
                                <input id="comboregional" name="comboregional" style="width: 100%" required validationMessage="Por favor escoja La Regional donde recogerá el certificado"/>
                            </div>
                            <div class="span3"></div>
                        </div>
                        {if ($co->getFecha_exportacion()!='')}
                            <div class="row-fluid form" >
                                <div class="span3"></div>
                                <div class="span3" style="text-align: left;">
                                    <input type="checkbox" name="check_fechaexportacion" id="check_fechaexportacion" checked>La mercadería ya fue exportada?
                                </div>
                                <div class="span3" id="div_fechaexportacion">
                                    Fecha de Exportación <input id="fechaexportacion" type="date" name="fechaexportacion" placeholder="dd/mm/aa"  style="width:100%" value="{$co->getFecha_exportacion()|date_format:" %d/%m/%Y"}">
                                </div>
                                <div class="span3"></div>
                            </div>
                        {else}
                            <div class="row-fluid form" >
                                <div class="span3"></div>
                                <div class="span3" style="text-align: left;">
                                    <input type="checkbox" name="check_fechaexportacion" id="check_fechaexportacion">La mercadería ya fue exportada?
                                </div>
                                <div class="span3" id="div_fechaexportacion" style="display: none;">
                                    Fecha de Exportación <input id="fechaexportacion" type="date" name="fechaexportacion" placeholder="dd/mm/aa"  style="width:100%">
                                </div>
                                <div class="span3"></div>
                            </div>
                        {/if}
                    </form>
                    <hr>
                    
                    <!-- FORMULARIO PARA CERTIFICADOS ALADI -->
                    {if $co->getId_tipo_co()==1}
                        {include file="certificadoOrigen/EditarCertificadoAladi.tpl"}
                        <script> mostrar('datos_aladi');</script>
                    <div class="row-fluid form" id="datos_aladi">
                        <div class="row-fluid">
                            <div class="span3"></div>
                            <div class="span6 titulonegro">
                                ALADI
                            </div>
                            <div class="span3"></div>
                        </div>
                        
                        <form name="form_to_aladi" id="form_to_aladi" method="post" action="index.php">
                            <div class="row-fluid">
                                <div class="span6" align="right">
                                    <input type="checkbox" name="check_factterceroperadoraladi" id="check_factterceroperadoraladi" {if ($co_aladi->getId_datos_tercer_operador()!=0)} checked {/if}>La Mercadería saldrá con factura de tercer operador?
                                </div>
                                <div class="span3" align="left" id="div_factterceropaladi" {if ($co_aladi->getId_datos_tercer_operador()==0)} style="display: none;" {/if}>
                                    <input type="text" class="k-textbox" placeholder="Fact. Tercer operador" name="factterceroperadoraladi" id="factterceroperadoraladi" {if ($co_aladi->getId_datos_tercer_operador()!=0)} value="{$dto->getNumero_factura()}" {/if}>
                                    <input type="hidden" name="hiddenvalidatorftoaladi" id="hiddenvalidatorftoaladi" 
                                     data-ftoaladivalidator
                                     data-required-msg="Llene el numero de la factura" />
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid" id="div_factterceropaladi2" {if ($co_aladi->getId_datos_tercer_operador()==0)} style="display: none;" {/if}>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Empresa Tercer operador" name="empresaterceroperadoraladi" id="empresaterceroperadoraladi" {if ($co_aladi->getId_datos_tercer_operador()!=0)} value="{$dto->getNombre()}" {/if}>
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Dirección Tercer operador" name="direccionterceroperadoraladi" id="direccionterceroperadoraladi" {if ($co_aladi->getId_datos_tercer_operador()!=0)} value="{$dto->getDireccion()}" {/if}>
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Ciudad Tercer operador" name="ciudadterceroperadoraladi" id="ciudadterceroperadoraladi" {if ($co_aladi->getId_datos_tercer_operador()!=0)} value="{$dto->getCiudad()}" {/if}>
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="País Tercer operador" name="paisterceroperadoraladi" id="paisterceroperadoraladi" {if ($co_aladi->getId_datos_tercer_operador()!=0)} value="{$dto->getPais()}" {/if}>
                                </div>
                                <br><br>
                            </div>
                        </form>
                        <br>
                        <form name="form_aladi" id="form_aladi" method="post" action="index.php">
                            <fieldset>
                                <legend>DATOS PARA EL CERTIFICADO DE ORIGEN</legend>
                                <div id="tabla_aladi" class="fadein"></div>
                            </fieldset>
                            <div class="span12">
                                 <input type="hidden" name="hiddenvalidatorgridaladi" id="hiddenvalidatorgridaladi" 
                                 data-gridvalidatoraladi
                                 data-required-msg="Por Favor Llene por lo menos un dato para el Certificado" />
                            </div> 
                            <input id="addfiladdjj_aladi" type="button" value="Añadir" class="k-primary" style="width:40"/> 
                            <input id="elimfiladdjj_aladi" type="button" value="Quitar" class="k-primary" style="width:40" onclick="eliminarfilaaladi();"/> 
                            <br><br>
                            <div class="row-fluid">
                                <div class="span12">
                                    <textarea class="k-textbox" rows="3" id="observacionesaladi" name="observacionesaladi" placeholder="Observaciones">{$co_aladi->getObservaciones()}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid"> 
                                <div class="span12">
                                    <input id="enviar_aladi" type="button" value="Enviar Datos" class="k-primary" style="width:120"/> 
                                    <input id="cancelar_aladi" type="button" value="Cancelar" class="k-primary" style="width:120"/> 
                                </div>
                            </div>
                        </form>
                    </div>
                    {/if}
                    
                    <!-- FORMULARIO PARA CERTIFICADOS MERCOSUR 
                    {if $co->getId_tipo_co()==2}
                        {include file="certificadoOrigen/EditarCertificadoMercosur.tpl"}
                        <script> mostrar('datos_mercosur');</script>
                    <div class="row-fluid form" id="datos_mercosur">
                        <div class="row-fluid">
                            <div class="span3"></div>
                            <div class="span6 titulonegro">
                                MERCOSUR
                            </div>
                            <div class="span3"></div>
                        </div>
                        
                        <form name="form_to_mercosur" id="form_to_mercosur" method="post" action="index.php">
                            <div class="row-fluid">
                                <div class="span6" align="right">
                                    <input type="checkbox" name="check_factterceroperadormercosur" id="check_factterceroperadormercosur">La Mercadería saldrá con factura de tercer operador?
                                </div>
                                <div class="span4" align="left" id="div_factterceropmercosur" style="display: none;">
                                    <input type="text" class="k-textbox" placeholder="Fact. Tercer operador" name="factterceroperadormercosur" id="factterceroperadormercosur">
                                    <input type="hidden" name="hiddenvalidatorftomercosur" id="hiddenvalidatorftomercosur" 
                                     data-ftomercosurvalidator
                                     data-required-msg="Llene el numero de la factura" />
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid" id="div_factterceropmercosur2" style="display: none;">
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Empresa Tercer operador" name="empresaterceroperadormercosur" id="empresaterceroperadormercosur" required validationMessage="Por favor coloque la Razón Social del Tercer Operador">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Dirección Tercer operador" name="direccionterceroperadormercosur" id="direccionterceroperadormercosur" required validationMessage="Por favor coloque la Dirección del Tercer Operador">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Ciudad Tercer operador" name="ciudadterceroperadormercosur" id="ciudadterceroperadormercosur" required validationMessage="Por favor coloque la Ciudad del Tercer Operador">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="País Tercer operador" name="paisterceroperadormercosur" id="paisterceroperadormercosur" required validationMessage="Por favor coloque el País del Tercer Operador">
                                </div>
                                <br><br>
                            </div>
                        </form>
                        <br>
                        <form name="form_mercosur" id="form_mercosur" method="post" action="index.php">
                            <fieldset>
                                <legend align="center"><b>DATOS PARA EL CERTIFICADO DE ORIGEN</b></legend>
                                <div id="tabla_mercosur" class="fadein"></div>
                            </fieldset>
                            <div class="span12">
                                 <input type="hidden" name="hiddenvalidatorgridmercosur" id="hiddenvalidatorgridmercosur" 
                                 data-gridvalidatormercosur
                                 data-required-msg="Por Favor Llene por lo menos un dato para el Certificado" />
                            </div>
                            <div class="row-fluid" id="botones_mercosur">
                                <input id="addfiladdjj_mercosur" type="button" value="Añadir" class="k-primary" style="width:40"/>
                                <input id="elimfiladdjj_mercosur" type="button" value="Quitar" class="k-primary" style="width:40" onclick="eliminarfilamercosur();"/>
                            </div>
                            <br><br>
                            <div class="span12">
                                <input type="checkbox" name="check_importadormercosur" id="check_importadormercosur">Si los datos del IMPORTADOR no son correctos, elegir opción para cambiar
                            </div>
                            <div class="row-fluid">
                                <div class="span4">Nombre del Importador</div>
                                <div class="span4">Dirección del Importador</div>
                                <div class="span4">País del Importador</div>
                            </div>
                            <div class="row-fluid" >
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="Nombre del Importador" id="nombreimportadormercosur" name="nombreimportadormercosur" style="width: 100%" required validationMessage="Por favor coloque el nombre del Importador"/>
                                </div>
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="Dirección del Importador" id="direccionimportadormercosur" name="direccionimportadormercosur" style="width: 100%" required validationMessage="Por favor coloque la dirección del Importador"/>
                                </div>
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="País del Importador" id="paisimportadormercosur" name="paisimportadormercosur" style="width: 100%" required validationMessage="Por favor escoja el país del Importador"/>
                                </div>
                            </div>
                            <br>

                            <div class="span12">
                                <input type="checkbox" name="check_consignatariomercosur" id="check_consignatariomercosur">Si los datos del CONSIGNATARIO no son correctos, elegir opción para cambiar
                            </div>
                            
                            <div class="row-fluid">
                                <div class="span4">Nombre del Consignatario</div>
                                <div class="span4">Dirección del Consignatario</div>
                                <div class="span4">País del Consignatario</div>
                            </div>
                            <div class="row-fluid" >
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="Nombre del Consignatario" id="nombreconsignatariomercosur" name="nombreconsignatariomercosur" style="width: 100%" required validationMessage="Por favor coloque el nombre del consignatario"/>
                                </div>
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="Dirección del Consignatario" id="direccionconsignatariomercosur" name="direccionconsignatariomercosur" style="width: 100%" required validationMessage="Por favor coloque la dirección del consignatario"/>
                                </div>
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="País del Consignatario" id="paisconsignatariomercosur" name="paisconsignatariomercosur" style="width: 100%" required validationMessage="Por favor escoja el país del consignatario"/>
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid">
                                <div class="span4">
                                    <input id="combomediotransportemercosur" name="combomediotransportemercosur" style="width: 100%" required validationMessage="Por favor escoja el medio de tranpsorte"/>
                                </div>
                                <div class="span6">
                                    <input type="text" class="k-textbox" placeholder="Puerto o Lugar de Embarque" name="embarquemercosur" id="embarquemercosur" required validationMessage="Por favor Indique El Puerto o Lugar de Embarque">
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid">
                                <div class="span12">
                                    <textarea class="k-textbox" rows="3" id="observacionesmercosur" name="observacionesmercosur" placeholder="Observaciones"></textarea>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="row-fluid"> 
                            <div class="span12">
                                <input id="enviar_mercosur" type="button" value="Enviar Datos" class="k-primary" style="width:120"/> 
                                <input id="cancelar_mercosur" type="button" value="Cancelar" class="k-primary" style="width:120"/> 
                            </div>
                        </div>
                    </div>
                    {/if}
                    -->
                    
                    <!-- FORMULARIO PARA CERTIFICADOS SGP 
                    {if $co->getId_tipo_co()==3}
                        {include file="certificadoOrigen/EditarCertificadoSgp.tpl"}
                        <script> mostrar('datos_sgp');</script>
                    <div class="row-fluid form" id="datos_sgp">
                        <form name="form_sgp" id="form_sgp" method="post" action="index.php">
                            <div class="row-fluid">
                                <div class="span3"></div>
                                <div class="span6 titulonegro">
                                    SGP
                                </div>
                                <div class="span3"></div>
                            </div>
                            
                            <fieldset>
                                <legend>DATOS PARA EL CERTIFICADO DE ORIGEN</legend>
                                <div id="tabla_sgp" class="fadein"></div>
                            </fieldset>
                            <div class="span12">
                                 <input type="hidden" name="hiddenvalidatorgridsgp" id="hiddenvalidatorgridsgp" 
                                 data-gridvalidatorsgp
                                 data-required-msg="Por Favor Llene por lo menos un dato para el Certificado" />
                            </div> 
                            <input id="addfiladdjj_sgp" type="button" value="Añadir" class="k-primary" style="width:40"/>
                            <input id="elimfiladdjj_sgp" type="button" value="Quitar" class="k-primary" style="width:40" onclick="eliminarfilasgp();"/>
                            <br><br>

                            <div class="span12">
                                <input type="checkbox" name="check_consignatariosgp" id="check_consignatariosgp">Si los datos del consignatario no son correctos, elegir opción para cambiar
                            </div>
                            
                            <div class="row-fluid">
                                <div class="span4">Nombre del Consignatario</div>
                                <div class="span4">Dirección del Consignatario</div>
                                <div class="span4">País del Consignatario</div>
                            </div>
                            <div class="row-fluid" >
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="Nombre del Consignatario" id="nombreconsignatariosgp" name="nombreconsignatariosgp" style="width: 100%" required validationMessage="Por favor coloque el nombre del consignatario"/>
                                </div>
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="Dirección del Consignatario" id="direccionconsignatariosgp" name="direccionconsignatariosgp" style="width: 100%" required validationMessage="Por favor coloque la dirección del consignatario"/>
                                </div>
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="País del Consignatario" id="paisconsignatariosgp" name="paisconsignatariosgp" style="width: 100%" required validationMessage="Por favor escoja el país del consignatario"/>
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid">
                                <div class="span3">
                                    <input id="combomediotransportesgp" name="combomediotransportesgp" style="width: 100%" required validationMessage="Por favor escoja el medio de tranpsorte"/>
                                </div>
                                <div class="span4">
                                    <input type="text" class="k-textbox" placeholder="Ruta" name="rutasgp" id="rutasgp" required validationMessage="Por favor Indique la Ruta">
                                </div>
                                <div class="span5">Pais Productor
                                    <select id="combopaisproductorsgp" name="combopaisproductorsgp" class="k-textbox" required validationMessage="Por favor Indique la Ruta">
                                    {foreach from=$pais item='pa'}
                                        {if ($pa->getNombre()=='BOLIVIA') }
                                            <option value="{$pa->getId_pais()}" selected>{$pa->getNombre()}</option>
                                        {else}
                                            <option value="{$pa->getId_pais()}">{$pa->getNombre()}</option>
                                        {/if}
                                    {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <textarea class="k-textbox" rows="3" id="observacionessgp" name="observacionessgp" placeholder="Observaciones"></textarea>
                                </div>
                            </div>
                            
                            <br>
                            <div class="row-fluid"> 
                                <div class="span12">
                                    <input id="enviar_sgp" type="button" value="Enviar Datos" class="k-primary" style="width:120"/> 
                                    <input id="cancelar_sgp" type="button" value="Cancelar" class="k-primary" style="width:120"/> 
                                </div>
                            </div>

                        </form>
                    </div>
                    {/if}
                    -->
                    
                    <!-- FORMULARIO PARA CERTIFICADOS VENEZUELA 
                    {if $co->getId_tipo_co()==4}
                        {include file="certificadoOrigen/EditarCertificadoVenezuela.tpl"}
                        <script> mostrar('datos_venezuela');</script>
                    <div class="row-fluid form" id="datos_venezuela">
                        <form name="form_venezuela" id="form_venezuela" method="post" action="index.php">
                            <div class="row-fluid">
                                <div class="span3"></div>
                                <div class="span6 titulonegro">
                                    VENEZUELA
                                </div>
                                <div class="span3"></div>
                            </div>
                            
                            <fieldset>
                                <legend>DATOS PARA EL CERTIFICADO DE ORIGEN</legend>
                                <div id="tabla_venezuela" class="fadein"></div>
                            </fieldset>
                            <div class="span12">
                                 <input type="hidden" name="hiddenvalidatorgridvenezuela" id="hiddenvalidatorgridvenezuela" 
                                 data-gridvalidatorvenezuela
                                 data-required-msg="Por Favor Llene por lo menos un dato para el Certificado" />
                            </div> 
                            <input id="addfiladdjj_venezuela" type="button" value="Añadir" class="k-primary" style="width:40"/> 
                            <input id="elimfiladdjj_venezuela" type="button" value="Quitar" class="k-primary" style="width:40" onclick="eliminarfilavenezuela();"/> 
                            <br><br>

                            <div class="span12">
                                <input type="checkbox" name="check_importadorvenezuela" id="check_importadorvenezuela">Si los datos del IMPORTADOR no son correctos, elegir opción para cambiar
                            </div>
                            <div class="row-fluid">
                                <div class="span4">Nombre del Importador</div>
                                <div class="span4">Dirección del Importador</div>
                                <div class="span4">País del Importador</div>
                            </div>
                            <div class="row-fluid" >
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="Nombre del Importador" id="nombreimportadorvenezuela" name="nombreimportadorvenezuela" style="width: 100%" required validationMessage="Por favor coloque el nombre del Importador"/>
                                </div>
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="Dirección del Importador" id="direccionimportadorvenezuela" name="direccionimportadorvenezuela" style="width: 100%" required validationMessage="Por favor coloque la dirección del Importador"/>
                                </div>
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="País del Importador" id="paisimportadorvenezuela" name="paisimportadorvenezuela" style="width: 100%" required validationMessage="Por favor escoja el país del Importador"/>
                                </div>
                            </div>
                            <br>

                            <div class="row-fluid">
                                <div class="span4">
                                    <input id="combomediotransportevenezuela" name="combomediotransportevenezuela" style="width: 100%" required validationMessage="Por favor escoja el medio de tranpsorte"/>
                                </div>
                                <div class="span6">
                                    <input type="text" class="k-textbox" placeholder="Puerto o Lugar de Embarque" name="embarquevenezuela" id="embarquevenezuela" required validationMessage="Por favor Indique El Puerto o Lugar de Embarque">
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid" >
                                <div class="span4" style="text-align: left;">
                                    <input type="checkbox" name="check_factterceroperadorvenezuela" id="check_factterceroperadorvenezuela">Si Utiliza Factura de Tercer operador, elegir opción
                                </div>
                                <div class="span3" align="left" id="div_factterceropvenezuela" style="display: none;">
                                    <input type="text" class="k-textbox" placeholder="Fact. Tercer operador" name="factterceroperadorvenezuela" id="factterceroperadorvenezuela">
                                    <input type="hidden" name="hiddenvalidatorftovenezuela" id="hiddenvalidatorftovenezuela"
                                     data-ftovenezuelavalidator
                                     data-required-msg="Llene el numero de la factura" />
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid" id="div_factterceropvenezuela2" style="display: none;">
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Empresa Tercer operador" name="empresaterceroperadorvenezuela" id="empresaterceroperadorvenezuela">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Dirección Tercer operador" name="direccionterceroperadorvenezuela" id="direccionterceroperadorvenezuela">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Ciudad Tercer operador" name="ciudadterceroperadorvenezuela" id="ciudadterceroperadorvenezuela">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="País Tercer operador" name="paisterceroperadorvenezuela" id="paisterceroperadorvenezuela">
                                </div>
                                <br><br>
                            </div>
                            <br>
                            <!--
                            <div class="row-fluid">
                                <div class="span12">
                                    <textarea class="k-textbox" rows="3" id="observacionesvenezuela" name="observacionesvenezuela" placeholder="Observaciones"></textarea>
                                </div>
                            </div>
                            
                            <br>
                            <div class="row-fluid"> 
                                <div class="span12">
                                    <input id="enviar_venezuela" type="button" value="Enviar Datos" class="k-primary" style="width:120"/> 
                                    <input id="cancelar_venezuela" type="button" value="Cancelar" class="k-primary" style="width:120"/> 
                                </div>
                            </div>
                        </form>
                    </div>
                    {/if}
                    -->
                    
                    <!-- FORMULARIO PARA CERTIFICADOS TERCEROS PAISES 
                    {if $co->getId_tipo_co()==5}
                        {include file="certificadoOrigen/EditarCertificadoTp.tpl"}
                        <script> mostrar('datos_tp');</script>
                    <div class="row-fluid form" id="datos_tp">
                        <form name="form_tp" id="form_tp" method="post" action="index.php">
                            <div class="row-fluid">
                                <div class="span3"></div>
                                <div class="span6 titulonegro">
                                    Terceros Países
                                </div>
                                <div class="span3"></div>
                            </div>
                            
                            <fieldset>
                                <legend>DATOS PARA EL CERTIFICADO DE ORIGEN</legend>
                                <div id="tabla_tp" class="fadein"></div>
                            </fieldset>
                            <div class="span12">
                                 <input type="hidden" name="hiddenvalidatorgridtp" id="hiddenvalidatorgridtp" 
                                 data-gridvalidatortp
                                 data-required-msg="Por Favor Llene por lo menos un dato para el Certificado" />
                            </div> 
                            <input id="addfiladdjj_tp" type="button" value="Añadir" class="k-primary" style="width:40"/> 
                            <input id="elimfiladdjj_tp" type="button" value="Quitar" class="k-primary" style="width:40" onclick="eliminarfilatp();"/> 
                            <br><br>

                            <div class="span12">
                                <input type="checkbox" name="check_consignatariotp" id="check_consignatariotp">Si los datos del consignatario no son correctos, elegir opción para cambiar
                            </div>
                            
                            <div class="row-fluid">
                                <div class="span4">Nombre del Consignatario</div>
                                <div class="span4">Dirección del Consignatario</div>
                                <div class="span4">País del Consignatario</div>
                            </div>
                            <div class="row-fluid" >
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="Nombre del Consignatario" id="nombreconsignatariotp" name="nombreconsignatariotp" style="width: 100%" required validationMessage="Por favor coloque el nombre del consignatario"/>
                                </div>
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="Dirección del Consignatario" id="direccionconsignatariotp" name="direccionconsignatariotp" style="width: 100%" required validationMessage="Por favor coloque la dirección del consignatario"/>
                                </div>
                                <div class="span4">
                                    <input type="text" disabled class="k-textbox" placeholder="País del Consignatario" id="paisconsignatariotp" name="paisconsignatariotp" style="width: 100%" required validationMessage="Por favor escoja el país del consignatario"/>
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid">
                                <div class="span4">
                                    <input id="combomediotransportetp" name="combomediotransportetp" style="width: 100%" required validationMessage="Por favor escoja el medio de tranpsorte"/>
                                </div>
                                <div class="span6">
                                    <input type="text" class="k-textbox" placeholder="Ruta" name="rutatp" id="rutatp" required validationMessage="Por favor Indique la Ruta">
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid" >
                                <div class="span4">
                                    <input type="checkbox" name="check_factterceroperadortp" id="check_factterceroperadortp">Si Utiliza Factura de Tercer operador, elegir opción
                                </div>
                                <div class="span3" align="left" id="div_factterceroptp" style="display: none;">
                                    <input type="text" class="k-textbox" placeholder="Fact. Tercer operador" name="factterceroperadortp" id="factterceroperadortp">
                                    <input type="hidden" name="hiddenvalidatorftotp" id="hiddenvalidatorftotp"
                                     data-ftotpvalidator
                                     data-required-msg="Llene el numero de la factura" />
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid" id="div_factterceroptp2" style="display: none;">
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Empresa Tercer operador" name="empresaterceroperadortp" id="empresaterceroperadortp">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Dirección Tercer operador" name="direccionterceroperadortp" id="direccionterceroperadortp">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Ciudad Tercer operador" name="ciudadterceroperadortp" id="ciudadterceroperadortp">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="País Tercer operador" name="paisterceroperadortp" id="paisterceroperadortp">
                                </div>
                                <br><br>
                            </div>

                            <div class="row-fluid">
                                <div class="span12">
                                    <textarea class="k-textbox" rows="3" id="observacionestp" name="observacionestp" placeholder="Observaciones"></textarea>
                                </div>
                            </div>
                            
                            <br>
                            <div class="row-fluid"> 
                                <div class="span12">
                                    <input id="enviar_tp" type="button" value="Enviar Datos" class="k-primary" style="width:120"/> 
                                    <input id="cancelar_tp" type="button" value="Cancelar" class="k-primary" style="width:120"/> 
                                </div>
                            </div>
                        </form>
                    </div>
                    {/if}
                    -->
                </div>
            </div>
    </div>
</div>

<script>

var form_general = $("#form_general").kendoValidator({
}).data("kendoValidator");

$(document).ready(function (){
    var combo_pais=$("#combopais").kendoDropDownList({
        autoBind: false,
        optionLabel: "Seleccionar País de Destino...",
        dataTextField: "pais",
        dataValueField: "id_pais",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admAcuerdo&tarea=listarPaisesPorAcuerdo&id_acuerdo={$co->getId_acuerdo()}"
                }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text('');
            }
        }
    }).data("kendoDropDownList");
    combo_pais.value({$co->getId_pais()});

    var combo_regional=$("#comboregional").kendoDropDownList({
        autoBind: false,
        optionLabel: "Seleccionar ciudad de Recojo del Certificado...",
        dataTextField: "ciudad",
        dataValueField: "id_regional",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admRegional&tarea=listarRegionales"
                }
            }
        }
    }).data("kendoDropDownList");
    combo_regional.value({$co->getId_regional()});
    
    $('#check_fechaexportacion').change(function(){
        var marcado = $(this).prop('checked');
        if(marcado){
            $('#div_fechaexportacion').fadeIn(1000);
        }else{
            $('#div_fechaexportacion').fadeOut(1000);
        }  
    });
});

$("#fechaexportacion").kendoDatePicker({
    {if ($co->getFecha_exportacion()=='')}
        value: new Date()
        {/if}
    });
</script>
