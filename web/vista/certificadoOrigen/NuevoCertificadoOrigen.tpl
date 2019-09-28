<div class="row-fluid" class="fadein" id="datosgeneralesco" >
    <div class="row-fluid  form" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid form">
                        <div class="span12">
                            <div class="titulonegro" > NUEVA EMISIÓN DE C.O. </div> 
                        </div>
                    </div>  
                </div>
                <div class="k-cuerpo">
                    <form name="form_general" id="form_general" method="post" action="index.php">
                        <input type="hidden" id="tipo_desglose" name="tipo_desglose">
                        <div class="row-fluid form">
                            <div class="span3"></div>
                            <div class="span6">
                                <input id="lista_co"  name="lista_co" style="width: 100%;"  required validationMessage="Por favor escoja el tipo de Certificado"/>
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
                    </form>
                    <hr>
                    
                    <!-- FORMULARIO PARA CERTIFICADOS ALADI -->
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
                                    <input type="checkbox" name="check_factterceroperadoraladi" id="check_factterceroperadoraladi">La Mercadería saldrá con factura de tercer operador?
                                </div>
                                <div class="span3" align="left" id="div_factterceropaladi" style="display: none;">
                                    <input type="text" class="k-textbox" placeholder="Fact. Tercer operador" name="factterceroperadoraladi" id="factterceroperadoraladi">
                                    <input type="hidden" name="hiddenvalidatorftoaladi" id="hiddenvalidatorftoaladi" 
                                     data-ftoaladivalidator
                                     data-required-msg="Llene el numero de la factura" />
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid" id="div_factterceropaladi2" style="display: none;">
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Empresa Tercer operador" name="empresaterceroperadoraladi" id="empresaterceroperadoraladi" required validationMessage="Por favor coloque la Razón Social del Tercer Operador">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Dirección Tercer operador" name="direccionterceroperadoraladi" id="direccionterceroperadoraladi" required validationMessage="Por favor coloque la Dirección del Tercer Operador">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Ciudad Tercer operador" name="ciudadterceroperadoraladi" id="ciudadterceroperadoraladi" required validationMessage="Por favor coloque la Ciudad del Tercer Operador">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="País Tercer operador" name="paisterceroperadoraladi" id="paisterceroperadoraladi" required validationMessage="Por favor coloque el País del Tercer Operador">
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
                                    <textarea class="k-textbox" rows="3" id="observacionesaladi" name="observacionesaladi" placeholder="Observaciones"></textarea>
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
                    
                    <!-- FORMULARIO PARA CERTIFICADOS MERCOSUR -->
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
                    
                    <!-- FORMULARIO PARA CERTIFICADOS VENEZUELA -->
                    <div class="row-fluid form" id="datos_venezuela">
                        <div class="row-fluid">
                            <div class="span3"></div>
                            <div class="span6 titulonegro">
                                VENEZUELA
                            </div>
                            <div class="span3"></div>
                        </div>
                            
                        <form name="form_to_venezuela" id="form_to_venezuela" method="post" action="index.php">
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
                                    <input type="text" class="k-textbox" placeholder="Empresa Tercer operador" name="empresaterceroperadorvenezuela" id="empresaterceroperadorvenezuela" required validationMessage="Por favor coloque la Razón Social del Tercer Operador">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Dirección Tercer operador" name="direccionterceroperadorvenezuela" id="direccionterceroperadorvenezuela" required validationMessage="Por favor coloque la Dirección del Tercer Operador">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Ciudad Tercer operador" name="ciudadterceroperadorvenezuela" id="ciudadterceroperadorvenezuela" required validationMessage="Por favor coloque la Ciudad del Tercer Operador">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="País Tercer operador" name="paisterceroperadorvenezuela" id="paisterceroperadorvenezuela" required validationMessage="Por favor coloque el País del Tercer Operador">
                                </div>
                                <br><br>
                            </div>
                        </form>
                        <br>
                        <form name="form_venezuela" id="form_venezuela" method="post" action="index.php">
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
                    
                    <!-- FORMULARIO PARA CERTIFICADOS SGP -->
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
                    
                    <!-- FORMULARIO PARA CERTIFICADOS TERCEROS PAISES -->
                    <div class="row-fluid form" id="datos_tp">
                        <div class="row-fluid">
                            <div class="span3"></div>
                            <div class="span6 titulonegro">
                                Terceros Países
                            </div>
                            <div class="span3"></div>
                        </div>
                        <form name="form_to_tp" id="form_to_tp" method="post" action="index.php">
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
                                    <input type="text" class="k-textbox" placeholder="Empresa Tercer operador" name="empresaterceroperadortp" id="empresaterceroperadortp" required validationMessage="Por favor coloque la Razón Social del Tercer Operador">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Dirección Tercer operador" name="direccionterceroperadortp" id="direccionterceroperadortp" required validationMessage="Por favor coloque la Dirección del Tercer Operador">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="Ciudad Tercer operador" name="ciudadterceroperadortp" id="ciudadterceroperadortp" required validationMessage="Por favor coloque la Ciudad del Tercer Operador">
                                </div>
                                <div class="span3" align="left">
                                    <input type="text" class="k-textbox" placeholder="País Tercer operador" name="paisterceroperadortp" id="paisterceroperadortp" required validationMessage="Por favor coloque el País del Tercer Operador">
                                </div>
                                <br><br>
                            </div>
                        </form>
                        <br>
                        <form name="form_tp" id="form_tp" method="post" action="index.php">
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

                </div>
            </div>
    </div>
</div>
{include file="certificadoOrigen/NuevoCertificadoAladi.tpl"}
{include file="certificadoOrigen/NuevoCertificadoSgp.tpl"}
{include file="certificadoOrigen/NuevoCertificadoTp.tpl"}
{include file="certificadoOrigen/NuevoCertificadoMercosur.tpl"}
{include file="certificadoOrigen/NuevoCertificadoVenezuela.tpl"}
<script>

ocultar('datos_aladi');
ocultar('datos_mercosur');
ocultar('datos_venezuela');
ocultar('datos_sgp');
ocultar('datos_tp');

var form_general = $("#form_general").kendoValidator({
}).data("kendoValidator");

$(document).ready(function (){
    //var acuerdo = $("#lista_co").kendoDropDownList({
    $("#lista_co").kendoDropDownList({
        optionLabel: "Escoge un Tipo de Certificado de Origen",
        dataTextField: "descripcion_total",
        dataValueField: "id_acuerdo",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admAcuerdo&tarea=listarAcuerdosConTipoCertificado"
                }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text('');
            }else{
                var acuerdo = this.value();
                var datos='opcion=admAcuerdo&tarea=listarDatosAcuerdo&id_acuerdo='+acuerdo;
                
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: datos,
                    success: function(data) {
                        var data = eval('('+data+')');
                        var tipo_co = data[0].id_tipo_co;

                        switch(tipo_co){
                            case '1':
                                //alert("entra a 1");
                                mostrar('datos_aladi');
                                ocultar('datos_mercosur');
                                ocultar('datos_venezuela');
                                ocultar('datos_sgp');
                                ocultar('datos_tp');
                                //$("#form_sgp")[0].reset();
                               break;
                            case '2':
                                //alert("entra a 2");
                                ocultar('datos_aladi');
                                mostrar('datos_mercosur');
                                ocultar('datos_venezuela');
                                ocultar('datos_sgp');
                                ocultar('datos_tp');
                               break;
                            case '4':
                                //alert("entra a 3");
                                ocultar('datos_aladi');
                                ocultar('datos_mercosur');
                                mostrar('datos_venezuela');
                                ocultar('datos_sgp');
                                ocultar('datos_tp');
                               break;
                            case '3':
                                //alert("entra a 4");
                                ocultar('datos_aladi');
                                ocultar('datos_mercosur');
                                ocultar('datos_venezuela');
                                mostrar('datos_sgp');
                                ocultar('datos_tp');
                               break;
                            case '5':
                                //alert("entra a 5");
                                ocultar('datos_aladi');
                                ocultar('datos_mercosur');
                                ocultar('datos_venezuela');
                                ocultar('datos_sgp');
                                mostrar('datos_tp');
                               break;
                        }
                    }
                });
                
            }
        }
    }).data("kendoDropDownList");
    
    $("#combopais").kendoDropDownList({
        autoBind: false,
        cascadeFrom: "lista_co",
        optionLabel: "Seleccionar País de Destino...",
        dataTextField: "pais",
        dataValueField: "id_pais",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admAcuerdo&tarea=listarPaisesConAcuerdo"
                }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text('');
            }
        }
    }).data("kendoDropDownList");

    $("#comboregional").kendoDropDownList({
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
    value: new Date()
});

</script>
