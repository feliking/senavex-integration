<form name="revision_ddjj" id="revision_ddjj" method="post"  action="index.php">
    <input type="hidden" id="id_declaracion_jurada" name="id_declaracion_jurada" value="{$ddjj->getId_ddjj()}">
    <input type="hidden" name="opcion" id="opcion" value="admDeclaracionJurada" />
    <input type="hidden" name="tarea" id="tarea" value="aceptarDeclaracionJurada" /> 
<div class="row-fluid  form" >
    <div class="row-fluid "  id="revisarDdjj" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro">Revisión de DDJJ.</div>
                        </div>
                    </div>
                </div>

                <fieldset>
                    <legend align="center"><b>NANDINA / NALADISA's</b></legend>
                    {if ($detalle_arancel->getCodigo()==0)}
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Subpartida arancelaria:
                        </div>     
                        <div class="span10 campo" >
                            --------
                        </div>  
                    </div>
                    {else}
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Subpartida arancelaria:
                        </div>     
                        <div class="span10 campo" >
                            {$detalle_arancel->getCodigo()} - {$detalle_arancel->getDescripcion()}
                        </div>
                    </div>
                    {/if}
                    
                    {foreach from=$acuerdos item='ddjjacuerdo'}
                        {if ($ddjjacuerdo->getId_acuerdo()==2)}
                        <div class="row-fluid form" >
                            <div class="span2 parametro">
                                NALADISA 1993:
                            </div>     
                            <div class="span10 campo">
                                <b>{$naladisa93}</b>
                            </div>
                        </div>
                        {/if}
                        {if ($ddjjacuerdo->getId_acuerdo()==3)}
                        <div class="row-fluid form">
                            <div class="span2 parametro">
                                NALADISA 1996:
                            </div>     
                            <div class="span10 campo" >
                                <b>{$naladisa96}</b>
                            </div>
                        </div>
                        {/if}
                        {if (($ddjjacuerdo->getId_acuerdo()==4)||($ddjjacuerdo->getId_acuerdo()==19))}
                        <div class="row-fluid form">
                            <div class="span2 parametro">
                                NALADISA 2007:
                            </div>     
                            <div class="span10 campo" >
                                <b>{$naladisa2007}</b>
                            </div>
                        </div>
                        {/if}
                        {if ($ddjjacuerdo->getId_acuerdo()==7)}
                        <div class="row-fluid form">
                            <div class="span2 parametro">
                                NALADISA 1991:
                            </div>     
                            <div class="span10 campo" >
                                <b>{$naladisa91}</b>
                            </div>
                        </div>
                        {/if}
                        {if ($ddjjacuerdo->getId_acuerdo()==6)}
                        <div class="row-fluid form">
                            <div class="span2 parametro">
                                NALADI 1983:
                            </div>     
                            <div class="span10 campo" >
                                <b>{$naladi83}</b>
                            </div>
                        </div>
                        {/if}
                    {/foreach}
                </fieldset>
                <br>
                <fieldset>
                    <legend align="center"><b>DATOS GENERALES</b></legend>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Denominación Comercial:
                        </div>     
                        <div class="span4 campo" >
                            {$ddjj->getDescripcion_comercial()}
                        </div>  
                        <div class="span2 parametro">
                            Nombre Técnico:
                        </div>     
                        <div class="span4 campo" >
                            {$ddjj->getNombre_tecnico()}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Características Técnicas:
                        </div>     
                        <div class="span4 campo" >
                            {$ddjj->getCaracteristicas()}
                        </div>  
                        <div class="span2 parametro">
                            Usos y aplicaciones:
                        </div>     
                        <div class="span4 campo" >
                            {$ddjj->getAplicacion()}
                        </div>
                    </div>

                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Estado DDJJ:
                        </div>     
                        <div class="span4 campo" >
                            <b>{$ddjj->estado_ddjj->getDescripcion()}</b>
                        </div>
                        <div class="span2 parametro" >
                            Unidad de Medida:
                        </div>     
                        <div class="span4 campo" >
                            {$unidad_medida->getDescripcion()}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 parametro" >
                            Capacidad de Producción Mensual
                        </div>     
                        <div class="span4 campo" >
                            {$ddjj->getProduccion_mensual()}
                        </div>  
                        <div class="span2 parametro" >
                            Proceso Productivo:
                        </div>     
                        <div class="span4 campo" >
                            {$ddjj->getProceso_productivo()}
                        </div>
                    </div>
                </fieldset>
                <br>
                {if ($insnac==0)}
                    <br><strong>NO TIENE AÚN INSUMOS NACIONALES </strong><br>
                {else}
                <fieldset>
                    <legend align="center"><b>INSUMOS NACIONALES</b></legend>
                    <div class="row-fluid " >
                        <table border="1" width="100%" class="k-t">
                            <tr>
                                <td width="30%">Descripcion</td>
                                <td width="30%">Datos del Fabricante</td>
                                <td width="10%">Valor $us</td>
                                {if ($fob!=0)}
                                    <td width="10%">% sobre valor FOB</td>
                                {/if}
                                {if ($exwork!=0)}
                                    <td width="10%">% sobre valor EXWORK</td>
                                {/if}
                            </tr>
                            {foreach from=$insumosnacionales item='insumos'}
                            <tr>
                                <td>{$insumos->getDescripcion()}</td>
                                <td>{$insumos->getNombre_Fabricante()} - {$insumos->getTelefono_Fabricante()}</td>
                                <td>{$insumos->getValor()}</td>
                                {if ($fob!=0)}
                                    <td width="10%">{math equation="((x*100)/y)" x=$insumos->getValor() y=$fob format="%.2f"}%</td>
                                {/if}
                                {if ($exwork!=0)}
                                    <td width="10%">{math equation="((x*100)/y)" x=$insumos->getValor() y=$exwork format="%.2f"}%</td>
                                {/if}
                            </tr>
                            {/foreach}
                        </table>
                    </div>
                </fieldset>
                {/if}
                <br>
                {if ($insimp==0)}
                    <br><strong>NO TIENE INSUMOS IMPORTADOS</strong><br>
                {else}
                <fieldset>
                    <legend align="center"><b>INSUMOS IMPORTADOS</b></legend>
                    <div class="row-fluid " >
                        <table border="1" width="100%" class="k-t">
                            <tr>
                                <td width="20%">Descripcion</td>
                                <td width="10%">Código NANDINA</td>
                                <td width="10%">País de Origen</td>
                                <td width="15%">Productor (Razón Social)</td>
                                <td width="10%">Cuenta con Certificado de Origen</td>
                                <td width="10%">Acuerdo Comercial</td>
                                <td width="5%">Cantidad</td>
                                <td width="10%">U.Medida</td>
                                <td width="10%">Valor en $us</td>
                                {if ($fob!=0)}
                                    <td width="10%">% sobre valor FOB</td>
                                {/if}
                                {if ($exwork!=0)}
                                    <td width="10%">% sobre valor EXWORK</td>
                                {/if}
                            </tr>
                            {foreach from=$insumosimportados item='insumosimp'}
                            <tr>
                                <td>{$insumosimp->getDescripcion()}</td>
                                <td>{$insumosimp->getId_detalle_arancel()}</td>
                                <td>{$insumosimp->pais->getNombre()}</td>
                                <td>{$insumosimp->getRazon_Social_Productor()}</td>
                                <td>
                                    {if ($insumosimp->getTiene_Certificado_Origen()==1)}
                                        SI
                                    {else}
                                        NO
                                    {/if}
                                </td>
                                <td>{$insumosimp->acuerdo->getDescripcion()}</td>
                                <td>{$insumosimp->getCantidad()}</td>
                                <td>{$insumosimp->unidad_medida->getDescripcion()}</td>
                                <td>{$insumosimp->getValor()}</td>
                                {if ($fob!=0)}
                                    <td width="10%">{math equation="((x*100)/y)" x=$insumosimp->getValor() y=$fob format="%.2f"}%</td>
                                {/if}
                                {if ($exwork!=0)}
                                    <td width="10%">{math equation="((x*100)/y)" x=$insumosimp->getValor() y=$exwork format="%.2f"}%</td>
                                {/if}
                            </tr>
                            {/foreach}
                        </table>
                    </div>
                </fieldset>
                {/if}
                <br>
                {if ($comerc==0)}
                {else}
                <fieldset>
                    <legend align="center"><b>DATOS PRODUCTOR MERCANCIA</b></legend>
                    <div class="row-fluid " >
                        <table border="1" width="100%" class="k-t">
                            <tr>
                                <td width="10%">Razón Social</td>
                                <td width="10%">CI o NIT</td>
                                <td width="20%">Domicilio Legal</td>
                                <td width="10%">Representante Legal</td>
                                <td width="10%">Dirección de Fábrica</td>
                                <td width="10%">Teléfono</td>
                                <td width="10%">Precio Venta al Exportador($us)</td>
                                <td width="10%">Unidad de Medida</td>
                                <td width="10%">Capacidad de Producción Mensual</td>
                            </tr>
                            {foreach from=$comercializador item='com'}
                            <tr>
                                <td width="10%">{$com->getRazon_social()}</td>
                                <td width="10%">{$com->getCi_nit()}</td>
                                <td width="20%">{$com->getDomicilio_legal()}</td>
                                <td width="10%">{$com->getRepresentante_legal()}</td>
                                <td width="10%">{$com->getDireccion_fabrica()}</td>
                                <td width="10%">{$com->getTelefono()}</td>
                                <td width="10%">{$com->getPrecio_venta()}</td>
                                <td width="10%">{$com->unidad_medida->getDescripcion()}</td>
                                <td width="10%">{$com->getProduccion_mensual()}</td>
                            </tr>
                            {/foreach}
                        </table>
                    </div>
                </fieldset>
                {/if}
                <br>
                
                <fieldset>
                    <legend align="center"><b>ACUERDOS COMERCIALES</b></legend>
                    <div class="row-fluid " >
                        <table border="0" width="100%">
                            <tr>
                                <td width="20%"><strong>Acuerdo</strong></td>
                                <td width="10%"><strong>Valor($us)</strong></td>
                                <td width="10%"><strong>Se Beneficia?</strong></td>
                                <td width="10%"><strong>Cumple Origen?</strong></td>
                                <td width="20%"><strong>Criterio de Origen</strong></td>
                                <td width="30%"><strong>Observaciones</strong></td>
                            </tr>
                            {foreach from=$acuerdos item='ddjjacuerdo'}
                            <tr>
                                <td>{$ddjjacuerdo->acuerdo->getDescripcion()}
                                </td>
                                <td>{$ddjjacuerdo->getValor_Mercancia()}</td>
                                <td><input type="radio" name="beneficio_{$ddjjacuerdo->getId_acuerdo()}" id="beneficio_{$ddjjacuerdo->getId_acuerdo()}" value="1">SI
                                    <input type="radio" name="beneficio_{$ddjjacuerdo->getId_acuerdo()}" id="beneficio_{$ddjjacuerdo->getId_acuerdo()}" value="0" checked>NO
                                </td>
                                <td><input type="radio" name="cumple_{$ddjjacuerdo->getId_acuerdo()}" id="cumple_{$ddjjacuerdo->getId_acuerdo()}" value="1">SI
                                    <input type="radio" name="cumple_{$ddjjacuerdo->getId_acuerdo()}" id="cumple_{$ddjjacuerdo->getId_acuerdo()}" value="0" checked>NO
                                </td>
                                <td>
                                    {if ($ddjjacuerdo->getId_Criterio_Origen()==0)}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==1)}
                                                <input style="width:100%;" id="co_can" name="co_can" required validationMessage="Por favor Escoja El Criterio de Origen" >
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==2)}
                                                <input style="width:100%;" id="co_mercosur" name="co_mercosur" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==3)}
                                                <input style="width:100%;" id="co_ace22" name="co_ace22" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==4)}
                                                <input style="width:100%;" id="co_ace47" name="co_ace47" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==5)}
                                                <input style="width:100%;" id="co_venezuela" name="co_venezuela" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==6)}
                                                <input style="width:100%;" id="co_arpar4" name="co_arpar4" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==7)}
                                                <input style="width:100%;" id="co_aapag" name="co_aapag" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==8)}
                                                <input style="width:100%;" id="co_sgpcanada" name="co_sgpcanada" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==9)}
                                                <input style="width:100%;" id="co_sgpsuiza" name="co_sgpsuiza" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==10)}
                                                <input style="width:100%;" id="co_sgpnoruega" name="co_sgpnoruega" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==11)}
                                                <input style="width:100%;" id="co_sgpjapon" name="co_sgpjapon" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==12)}
                                                <input style="width:100%;" id="co_sgpzelanda" name="co_sgpzelanda" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==13)}
                                                <input style="width:100%;" id="co_sgprusia" name="co_sgprusia" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==14)}
                                                <input style="width:100%;" id="co_sgpturquia" name="co_sgpturquia" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==15)}
                                                <input style="width:100%;" id="co_sgpbielorrusia" name="co_sgpbielorrusia" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==16)}
                                                <input style="width:100%;" id="co_sgpue" name="co_sgpue" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==17)}
                                                <input style="width:100%;" id="co_sgpeeuu" name="co_sgpeeuu" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==18)}
                                                <input style="width:100%;" id="co_sgptp" name="co_sgptp" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==19)}
                                                <input style="width:100%;" id="co_arampanama" name="co_arampanama" required validationMessage="Por favor Escoja El Criterio de Origen">
                                        {/if}
                                    {else}
                                        {$ddjjacuerdo->criterio_origen->getDescripcion()}
                                    {/if}
                                </td>
                                <td><input type="text" class="k-textbox" width="100%" name="observ_{$ddjjacuerdo->getId_acuerdo()}" id="observ_{$ddjjacuerdo->getId_acuerdo()}"></td>
                            </tr>
                            {/foreach}
                        </table>
                    </div>
                </fieldset>
                <hr>
                
                {if ($ddjj->getRevisado()=='TRUE')}
                <div class="row-fluid form">
                    <fieldset>
                        <legend align="center"><b>HISTORIAL DE OBSERVACIONES PARA CORRECCIÓN</b></legend>
                        <table width="90%" border="1">
                            <tr>
                                <td width="15%"><strong>Usuario<strong></td>
                                <td width="15%"><strong>Fecha Observación<strong></td>
                                <td width="70%"><strong>Detalle de la Observación<strong></td>
                            </tr>
                        {foreach from=$observaciones_ddjj item='obs_ddjj'}
                            <tr>
                                <td>{if ($obs_ddjj->getId_tipo_usuario()==1)}
                                        Certificador
                                    {else}
                                        Exportador
                                    {/if}
                                </td>
                                <td>{$obs_ddjj->getFecha_observacion()}</td>
                                <td align="justify">{$obs_ddjj->getObservaciones_generales()}</td>
                            </tr>
                        {/foreach}
                        </table>
                    </fieldset>
                </div>
                {/if}

                <div class="row-fluid " >
                    <div class="span2 parametro">
                        Observaciones para Devolución:
                    </div>     
                    <div class="span10 campo" >
                        <textarea class="k-textbox" rows="2" id="observacion_general" name="observacion_general" placeholder="Observaciones para Devolucion"></textarea>
                        <div class="span" ><center>
                            <input type="hidden" name="hiddenvalidatorobsgeneral" id="hiddenvalidatorobsgeneral" 
                            data-obsgeneralvalidator
                            data-required-msg="Ingrese la Observación para Devolucion" /></center>
                        </div> 
                    </div>
                </div>
                <br><br>
                
                <!-- BOTONES -->
                <div class="row-fluid form" >
                    <div class="span1"></div>
                    <div class="span2" >
                        <input id="aceptartodaddjj" type="button" value="Enviar" class="k-primary" style="width:100%"/>
                    </div>
                    <div class="span1"></div>
                    <div class="span2" >
                        <input id="devolverddjj" type="button" value="Devolver" class="k-primary" style="width:100%"/>
                    </div>
                    <div class="span1"></div>
                    <div class="span2" >
                        <input id="rechazartodaddjj" type="button" value="Rechazar" class="k-primary" style="width:100%"/>
                    </div>
                    <div class="span1"></div>
                    <div class="span2" >
                        <input id="cerrarddjj" type="button"  value="Cancelar" class="k-primary" style="width:100%"/> 
                    </div>
                    <div class="span1"></div>
                </div>

            </div>
        </div>
    </div>
</div>
</form>

<div class="row-fluid fadein"  id="firmaRevisarDJ" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header"><div class="titulo">Firma Digital de Revisión de la Declaración Jurada</div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico la revisión
                        de la Declaración Jurada.</p> 
                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmaRevisarDJ" id="formfirmaRevisarDJ" method="post"  action="index.php" >
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                       class="k-textbox " placeholder="Pin" name="pinfirmaRevisarDJ"  id="pinfirmaRevisarDJ" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmarenvioCoAceptar /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="cancelafirmaRevisarDJ" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="firmarRevisarDJ" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                     </div> 
                     <div class="span4 hidden-phone" >
                     </div>
                 </div> 
            </form> 
        </div>
    </div>
</div>

<div class="row-fluid fadein"  id="firmaRevisarDJRechazar" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header"><div class="titulo">Firma Digital del Rechazo de la Declaración Jurada</div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico el RECHAZO
                        de la Declaración Jurada.</p> 
                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmaRevisarDJRechazar" id="formfirmaRevisarDJRechazar" method="post"  action="index.php" >
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                       class="k-textbox " placeholder="Pin" name="pinfirmaRevisarDJRechazar"  id="pinfirmaRevisarDJRechazar" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmarenvioCoRechazar /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="cancelafirmaRevisarDJRechazar" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="firmarRevisarDJRechazar" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                     </div> 
                     <div class="span4 hidden-phone" >
                     </div>
                 </div> 
            </form> 
        </div>
    </div>
</div>

<script>

ocultar('firmaRevisarDJ');
//FUNCIONES PARA LA FIRMA DEL CERTIFICADOR ACEPTANDO LA DDJJ.
$("#cancelafirmaRevisarDJ").kendoButton();
$("#firmarRevisarDJ").kendoButton();
var cancelafirmaRevisarDJ = $("#cancelafirmaRevisarDJ").data("kendoButton");
var firmarRevisarDJ = $("#firmarRevisarDJ").data("kendoButton");

cancelafirmaRevisarDJ.bind("click", function(e){             
    cambiar('firmaRevisarDJ','revisarDdjj');
    borrarPin('{$nombre}');
});

firmarRevisarDJ.bind("click", function(e){
    var datos = $("#revision_ddjj").serialize();
    //Guardar los datos mediante ajax enviando al controlador
    $.ajax({             
        type: 'post',
        url: 'index.php',
        data: datos,
        success: function(data) {
            cerraractualizartab('Revisiones DDJJ','admDeclaracionJurada','listarRevisionDeclaracionJurada')
        }
    });
});

//************ VALIDACIÓN DEL PIN ******************************
var swfirma=2;        
var firmacache='';
var formfirmaRevisarDJ = $("#formfirmaRevisarDJ").kendoValidator({
    rules:{ 
        firmarRevisarDJ: function(input) { 
            var validate = input.data('firmarRevisarDJ');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmacache !== $("#pinfirmaRevisarDJ").val()) 
                {
                    verificarPinCoAceptar($("#pinfirmaRevisarDJ").val());                    
                    return false;
                }
                if(swfirma==1)
                {
                     return true;
                }
                if(swfirma==0)
                {  
                    return false;
                }  
                return false;
            }
            return true;
        }
    },
    messages:{
        firmarRevisarDJ: function(input) { 
            if(swfirma==0)
            {  
                return 'El Pin no es Correcto';
            }
            else
            {    
                return 'Revisando..';
            }
        }
   }
}).data("kendoValidator");

function verificarPinCoAceptar(pin_insertado)
{
    $.ajax({
        type: 'post',
        url: 'index.php',
        data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
        success: function (data) {    
            swfirma=data;
            firmacache=$("#pinfirmaRevisarDJ").val();
            formfirmaRevisarDJ.validateInput($("#pinfirmaRevisarDJ"));
        }
    }); 
}
    
ocultar('firmaRevisarDJRechazar');
//FUNCIONES PARA LA FIRMA DEL CERTIFICADOR RECHAZANDO LA DDJJ.
$("#rechazartodaddjj").kendoButton();
$("#cancelafirmaRevisarDJRechazar").kendoButton();
$("#firmarRevisarDJRechazar").kendoButton();
var rechazartodaddjj = $("#rechazartodaddjj").data("kendoButton");
var cancelafirmaRevisarDJRechazar = $("#cancelafirmaRevisarDJRechazar").data("kendoButton");
var firmarRevisarDJRechazar = $("#firmarRevisarDJRechazar").data("kendoButton");

cancelafirmaRevisarDJRechazar.bind("click", function(e){             
    cambiar('firmaRevisarDJRechazar','revisarDdjj');
    borrarPin('{$nombre}');
});

firmarRevisarDJRechazar.bind("click", function(e){
    var obs_general=$("#observacion_general").val();
    var datos = "opcion=admDeclaracionJurada&tarea=rechazarDdjj&observacion_general="+obs_general+"&id_ddjj="+{$ddjj->getId_ddjj()};
    //Guardar los datos mediante ajax enviando al controlador
    $.ajax({             
        type: 'post',
        url: 'index.php',
        data: datos,
        success: function(data) {
            cerraractualizartab('Revisiones DDJJ','admDeclaracionJurada','listarRevisionDeclaracionJurada')
        }
    });
});

//************ VALIDACIÓN DEL PIN ******************************
var swfirmaRechazar=2;        
var firmacacheRechazar='';
var formfirmaRevisarDJRechazar = $("#formfirmaRevisarDJRechazar").kendoValidator({
    rules:{ 
        firmarRevisarDJRechazar: function(input) { 
            var validate = input.data('firmarRevisarDJRechazar');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmacacheRechazar !== $("#pinfirmaRevisarDJRechazar").val()) 
                {
                    verificarPinDDJJRechazar($("#pinfirmaRevisarDJRechazar").val());                    
                    return false;
                }
                if(swfirmaRechazar==1)
                {
                     return true;
                }
                if(swfirmaRechazar==0)
                {  
                    return false;
                }  
                return false;
            }
            return true;
        }
    },
    messages:{
        firmarRevisarDJRechazar: function(input) { 
            if(swfirmaRechazar==0)
            {  
                return 'El Pin no es Correcto';
            }
            else
            {    
                return 'Revisando..';
            }
        }
   }
}).data("kendoValidator");

function verificarPinDDJJRechazar(pin_insertado)
{
    $.ajax({
        type: 'post',
        url: 'index.php',
        data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
        success: function (data) {    
            swfirmaRechazar=data;
            firmacacheRechazar=$("#pinfirmaRevisarDJRechazar").val();
            formfirmaRevisarDJRechazar.validateInput($("#pinfirmaRevisarDJRechazar"));
        }
    }); 
}


//FUNCIONES PARA DEVOLVER LA DDJJ PARA SU CORRECCION.
$("#devolverddjj").kendoButton();
var devolverddjj = $("#devolverddjj").data("kendoButton");

devolverddjj.bind("click", function(e){
    var obs_general=$("#observacion_general").val();
    var datos = "opcion=admDeclaracionJurada&tarea=rechazarDdjj&observacion_general="+obs_general+"&devolver=1&id_ddjj="+{$ddjj->getId_ddjj()};
    //Guardar los datos mediante ajax enviando al controlador
    $.ajax({             
        type: 'post',
        url: 'index.php',
        data: datos,
        success: function(data) {
            cerraractualizartab('Revisiones DDJJ','admDeclaracionJurada','listarRevisionDeclaracionJurada')
        }
    });
});





//////////////// Funciones para Revisar las DDJJ ///////////////////////////////
    $("#aceptartodaddjj").kendoButton();
    //$("#rechazartodaddjj").kendoButton();
    $("#cerrarddjj").kendoButton();
    var aceptartodaddjj = $("#aceptartodaddjj").data("kendoButton");
    //var rechazartodaddjj = $("#rechazartodaddjj").data("kendoButton");
    var cerrarddjj = $("#cerrarddjj").data("kendoButton");
    
    var revision_ddjj = $("#revision_ddjj").kendoValidator({
    }).data("kendoValidator");
    
    cerrarddjj.bind("click", function(e){  
        remover(tabStrip.select());
    });

    aceptartodaddjj.bind("click", function(e){
        if(revision_ddjj.validate()){
            cambiar('revisarDdjj','firmaRevisarDJ');
            generarPin('{$id_empresa}','{$id_persona}','4');
        }
    });
/*
    var validar_rechazo = $("#revision_ddjj").kendoValidator({
        rules:{
            obsgeneralvalidator: function(input) { 
                var validate = input.data('obsgeneralvalidator');
                if (typeof validate !== 'undefined') 
                {
                    var observacion_general = $('#observacion_general').val();
                    if(observacion_general==''){
                        return false;
                    }else{
                        return true;
                    }
                }
                return true;
            }
        },
        messages:{
            obsgeneralvalidator: "Debe colocar una observación para Rechazar la DDJJ",
        }
    }).data("kendoValidator");
    */
    rechazartodaddjj.bind("click", function(e){
        //if(validar_rechazo.validate())
        //{
            cambiar('revisarDdjj','firmaRevisarDJRechazar');
            generarPin('{$id_empresa}','{$id_persona}','4');
        //}
    });
    
    $(document).ready(function(){
        /****** COMBOS PARA CRITERIOS DE ORIGEN ******/
        $("#co_can").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=1"
                        }
                    }
                }
        });
        $("#co_mercosur").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=2"
                        }
                    }
                }
        });
        $("#co_ace22").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=3"
                        }
                    }
                }
        });
        $("#co_ace47").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=4"
                        }
                    }
                }
        });
        $("#co_venezuela").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=5"
                        }
                    }
                }
        });
        $("#co_arpar4").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=6"
                        }
                    }
                }
        });
        $("#co_aapag").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=7"
                        }
                    }
                }
        });
        $("#co_sgpcanada").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=8"
                        }
                    }
                }
        });
        $("#co_sgpsuiza").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=9"
                        }
                    }
                }
        });
        $("#co_sgpnoruega").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=10"
                        }
                    }
                }
        });
        $("#co_sgpjapon").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=11"
                        }
                    }
                }
        });
        $("#co_sgpzelanda").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=12"
                        }
                    }
                }
        });
        $("#co_sgprusia").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=13"
                        }
                    }
                }
        });
        $("#co_sgpturquia").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=14"
                        }
                    }
                }
        });
        $("#co_sgpbielorrusia").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=15"
                        }
                    }
                }
        });
        $("#co_sgpue").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=16"
                        }
                    }
                }
        });
        $("#co_sgpeeuu").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=17"
                        }
                    }
                }
        });
        $("#co_sgptp").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=18"
                        }
                    }
                }
        });
        $("#co_arampanama").kendoComboBox(
            {   placeholder:"Criterio de Origen",
                dataTextField: "descripcion",
                dataValueField: "id_criterio_origen",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo=19"
                        }
                    }
                }
        });
    });
</script>
    