<form name="revision_ddjj" id="revision_ddjj" method="post"  action="index.php">
    <input type="hidden" id="id_declaracion_jurada" name="id_declaracion_jurada" value="{$ddjj->getId_ddjj()}">
    <input type="hidden" name="opcion" id="opcion" value="admDeclaracionJurada" />
    <input type="hidden" name="tarea" id="tarea" value="aceptarDeclaracionJurada" />
<div class="row-fluid  form" >
    <div class="row-fluid "  id="revisarempresatemporal" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro">Revisión de DDJJ con Asesoramiento</div>
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
                                <td>{$ddjjacuerdo->acuerdo->getDescripcion()}</td>
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
                                                <input style="width:100%;" id="co_can" name="co_can">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==2)}
                                                <input style="width:100%;" id="co_mercosur" name="co_mercosur">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==3)}
                                                <input style="width:100%;" id="co_ace22" name="co_ace22">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==4)}
                                                <input style="width:100%;" id="co_ace47" name="co_ace47">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==5)}
                                                <input style="width:100%;" id="co_venezuela" name="co_venezuela">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==6)}
                                                <input style="width:100%;" id="co_arpar4" name="co_arpar4">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==7)}
                                                <input style="width:100%;" id="co_aapag" name="co_aapag">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==8)}
                                                <input style="width:100%;" id="co_sgpcanada" name="co_sgpcanada">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==9)}
                                                <input style="width:100%;" id="co_sgpsuiza" name="co_sgpsuiza">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==10)}
                                                <input style="width:100%;" id="co_sgpnoruega" name="co_sgpnoruega">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==11)}
                                                <input style="width:100%;" id="co_sgpjapon" name="co_sgpjapon">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==12)}
                                                <input style="width:100%;" id="co_sgpzelanda" name="co_sgpzelanda">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==13)}
                                                <input style="width:100%;" id="co_sgprusia" name="co_sgprusia">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==14)}
                                                <input style="width:100%;" id="co_sgpturquia" name="co_sgpturquia">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==15)}
                                                <input style="width:100%;" id="co_sgpbielorrusia" name="co_sgpbielorrusia">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==16)}
                                                <input style="width:100%;" id="co_sgpue" name="co_sgpue">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==17)}
                                                <input style="width:100%;" id="co_sgpeeuu" name="co_sgpeeuu">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==18)}
                                                <input style="width:100%;" id="co_sgptp" name="co_sgptp">
                                        {/if}
                                        {if ($ddjjacuerdo->getId_Acuerdo()==19)}
                                                <input style="width:100%;" id="co_arampanama" name="co_arampanama">
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
                
                <br><br>
                
                <!-- BOTONES -->
                <div class="row-fluid form" >
                    <div class="span3" >
                        <input id="verhistorial" type="button"  value="Ver Historial" class="k-primary" style="width:100%"/> 
                    </div>
                    <div class="span1"></div>
                    <div class="span3" >
                        <input id="aceptartodaddjj" type="button" value="Terminar Revisión" class="k-primary" style="width:100%"/>
                    </div>
                    <div class="span1"></div>
                    <div class="span3" >
                        <input id="cerrarddjj" type="button"  value="Cancelar" class="k-primary" style="width:100%"/> 
                    </div>
                    <div class="span1"></div>
                </div>

            </div>
        </div>
    </div>
</div>
</form>
                    
<div id="ventana_enviar">
    <div class="titulo">Enviar Datos</div><br>
    <div align="center">
        Esta seguro en enviar los datos de la declaración jurada con asesoramiento?
        <br><br>
        <input id="enviarrevision" type="button"  value="Enviar" width="100" /> 
        <input id="cancelarrevision" type="button"  value="Cancelar" width="100"/> 
   </div>
</div>

<div id="historial_asesoramiento">
    <div align="center"><strong>HISTORIAL DE ASESORAMIENTO<strong></div><br>
    <div>
        {foreach from=$historico_asesoramiento item='ha'}
            <div class="pregunta">Pregunta: {$ha->getObservaciones_Exportador()}</div>
            {if ($ha->getRespuesta_Asistente()!='')}
            <div class="respuesta">Respuesta: {$ha->getRespuesta_Asistente()}</div>
            {/if}
        {/foreach}
        <br>
       <p>Realiza una observación al Exportador.</p>
       <textarea  class="k-textbox" rows="5" cols="47" id="observ_asesoramiento" name="observ_asesoramiento"></textarea><br>
        <input id="enviarobserv" type="button"  value="Enviar" width="100" /> 
        <input id="cancelarobserv" type="button"  value="Cancelar" width="100"/> 
   </div>
</div>
      
<style>
    .pregunta{
        font-size: 10px;
        color: red;
        font-weight: bold;
    }

    .respuesta{
        font-size: 10px;
        color: black;
        font-weight: bold;
    }
</style>

<script>
    $("#aceptartodaddjj").kendoButton();
    $("#cerrarddjj").kendoButton();
    $("#enviarrevision").kendoButton();
    $("#cancelarrevision").kendoButton();
    $("#verhistorial").kendoButton();
    $("#enviarobserv").kendoButton();
    $("#cancelarobserv").kendoButton();
    
    var aceptartodaddjj = $("#aceptartodaddjj").data("kendoButton");
    var cerrarddjj = $("#cerrarddjj").data("kendoButton");
    var enviarrevision = $("#enviarrevision").data("kendoButton");
    var cancelarrevision = $("#cancelarrevision").data("kendoButton");
    var verhistorial = $("#verhistorial").data("kendoButton");
    var enviarobserv = $("#enviarobserv").data("kendoButton");
    var cancelarobserv = $("#cancelarobserv").data("kendoButton");
    
    var historial_asesoramiento = $("#historial_asesoramiento").kendoWindow({
        draggable: true,
        height: "400px",
        width: "400px",
        resizable: true,
        actions: [
                    "Close"
            ],
        animation: {
            close: {
              effects: "fade:out",
              duration: 1000
            }
        }
    }).data("kendoWindow");
    //historial_asesoramiento.center();
    $('#historial_asesoramiento').closest(".k-window").css({
       position: 'fixed',
       margin: 'auto',
       right: '0'
    });
    
    var ventana_enviar = $("#ventana_enviar").kendoWindow({
        draggable: true,
        height: "200px",
        width: "400px",
        resizable: true,
        actions: [
                    "Close"
            ],
        animation: {
            close: {
              effects: "fade:out",
              duration: 1000
            }
        }
    }).data("kendoWindow");
    ventana_enviar.center();
    
    cerrarddjj.bind("click", function(e){  
        remover(tabStrip.select());
    });

    verhistorial.bind("click", function(e){
        historial_asesoramiento.open();
    });

    aceptartodaddjj.bind("click", function(e){
        ventana_enviar.open();
    });

    enviarobserv.bind("click", function(e){
        //historial_asesoramiento.close();
        var observ = $("#observ_asesoramiento").val();
        if(observ==''){
            alert("Debe colocar una respuesta para el Exportador");
            return;
        }
        
        var datos = "opcion=admDeclaracionJurada&tarea=enviarRespuestaAsesoramiento&id_declaracion_jurada="+{$ddjj->getId_ddjj()}+"&observ="+observ;
        //alert(datos); return;
        //Guardar los datos mediante ajax enviando al controlador
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: datos,
            success: function(data) {
                //remover(tabStrip.select());
                historial_asesoramiento.close();
                cerraractualizartab('Revisiones DDJJ','admDeclaracionJurada','listarRevisionDeclaracionJurada');
                $("#observ_asesoramiento").val('');
            }
        });
        
    });
    
    cancelarobserv.bind("click", function(e){
        historial_asesoramiento.close();
        $("#observ_asesoramiento").val('');
    });
    
    cancelarrevision.bind("click", function(e){
        ventana_enviar.close();
    });
    
    enviarrevision.bind("click", function(e){
        var co_can = document.getElementById("co_can");
        var co_mercosur = document.getElementById("co_mercosur");
        var co_ace22 = document.getElementById("co_ace22");
        var co_ace47 = document.getElementById("co_ace47");
        var co_venezuela = document.getElementById("co_venezuela");
        var co_arpar4 = document.getElementById("co_arpar4");
        var co_aapag = document.getElementById("co_aapag");
        var co_sgpcanada = document.getElementById("co_sgpcanada");
        var co_sgpsuiza = document.getElementById("co_sgpsuiza");
        var co_sgpnoruega = document.getElementById("co_sgpnoruega");
        var co_sgpjapon = document.getElementById("co_sgpjapon");
        var co_sgpzelanda = document.getElementById("co_sgpzelanda");
        var co_sgprusia = document.getElementById("co_sgprusia");
        var co_sgpturquia = document.getElementById("co_sgpturquia");
        var co_sgpbielorrusia = document.getElementById("co_sgpbielorrusia");
        var co_sgpue = document.getElementById("co_sgpue");
        var co_sgpeeuu = document.getElementById("co_sgpeeuu");
        var co_sgptp = document.getElementById("co_sgptp");
        var co_arampanama = document.getElementById("co_arampanama");
        
        if(co_can){
            if(co_can.value==''){
                alert("Colocar Criterio del Acuerdo con la CAN");
                ventana_enviar.close();
                $("#co_can").focus();
                return;
            }
        }
        if(co_mercosur){
            if(co_mercosur.value==''){
                alert("Colocar Criterio del Acuerdo con el Mercosur");
                ventana_enviar.close();
                $("#co_mercosur").focus();
                return;
            }
        }
        if(co_ace22){
            if(co_ace22.value==''){
                alert("Colocar Criterio del Acuerdo con Chile");
                ventana_enviar.close();
                $("#co_ace22").focus();
                return;
            }
        }
        if(co_ace47){
            if(co_ace47.value==''){
                alert("Colocar Criterio del Acuerdo con Cuba");
                ventana_enviar.close();
                $("#co_ace47").focus();
                return;
            }
        }
        if(co_venezuela){
            if(co_venezuela.value==''){
                alert("Colocar Criterio del Acuerdo con Venezuela");
                ventana_enviar.close();
                $("#co_venezuela").focus();
                return;
            }
        }
        if(co_arpar4){
            if(co_arpar4.value==''){
                alert("Colocar Criterio del Acuerdo de Semillas AR PAR 4");
                ventana_enviar.close();
                $("#co_arpar4").focus();
                return;
            }
        }
        if(co_aapag){
            if(co_aapag.value==''){
                alert("Colocar Criterio del Acuerdo de Semillas AAP.AG N°2");
                ventana_enviar.close();
                $("#co_aapag").focus();
                return;
            }
        }
        if(co_sgpcanada){
            if(co_sgpcanada.value==''){
                alert("Colocar Criterio del SGP CANADA");
                ventana_enviar.close();
                $("#co_sgpcanada").focus();
                return;
            }
        }
        if(co_sgpsuiza){
            if(co_sgpsuiza.value==''){
                alert("Colocar Criterio del SGP SUIZA");
                ventana_enviar.close();
                $("#co_sgpsuiza").focus();
                return;
            }
        }
        if(co_sgpnoruega){
            if(co_sgpnoruega.value==''){
                alert("Colocar Criterio del SGP NORUEGA");
                ventana_enviar.close();
                $("#co_sgpnoruega").focus();
                return;
            }
        }
        if(co_sgpjapon){
            if(co_sgpjapon.value==''){
                alert("Colocar Criterio del SGP JAPÓN");
                ventana_enviar.close();
                $("#co_sgpjapon").focus();
                return;
            }
        }
        if(co_sgpzelanda){
            if(co_sgpzelanda.value==''){
                alert("Colocar Criterio del SGP NUEVA ZELANDA");
                ventana_enviar.close();
                $("#co_sgpzelanda").focus();
                return;
            }
        }
        if(co_sgprusia){
            if(co_sgprusia.value==''){
                alert("Colocar Criterio del SGP FEDERACIÓN RUSA");
                ventana_enviar.close();
                $("#co_sgprusia").focus();
                return;
            }
        }
        if(co_sgpturquia){
            if(co_sgpturquia.value==''){
                alert("Colocar Criterio del SGP TURQUÍA");
                ventana_enviar.close();
                $("#co_sgpturquia").focus();
                return;
            }
        }
        if(co_sgpbielorrusia){
            if(co_sgpbielorrusia.value==''){
                alert("Colocar Criterio del SGP BIELORRUSIA");
                ventana_enviar.close();
                $("#co_sgpbielorrusia").focus();
                return;
            }
        }
        if(co_sgpue){
            if(co_sgpue.value==''){
                alert("Colocar Criterio del SGP UNIÓN EUROPEA");
                ventana_enviar.close();
                $("#co_sgpue").focus();
                return;
            }
        }
        if(co_sgpeeuu){
            if(co_sgpeeuu.value==''){
                alert("Colocar Criterio del SGP ESTADOS UNIDOS");
                ventana_enviar.close();
                $("#co_sgpeeuu").focus();
                return;
            }
        }
        if(co_sgptp){
            if(co_sgptp.value==''){
                alert("Colocar Criterio del SGP TERCEROS PAÍSES");
                ventana_enviar.close();
                $("#co_sgptp").focus();
                return;
            }
        }
        if(co_arampanama){
            if(co_arampanama.value==''){
                alert("Colocar Criterio de ARAM PANAMÁ");
                ventana_enviar.close();
                $("#co_arampanama").focus();
                return;
            }
        }
        
        var datos = $("#revision_ddjj").serialize();
        //alert(datos);
        
        //Guardar los datos mediante ajax enviando al controlador
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: datos,
            success: function(data) {
                //remover(tabStrip.select());
                ventana_enviar.close();
                cerraractualizartab('Revisiones DDJJ','admDeclaracionJurada','listarRevisionDeclaracionJurada')
            }
        });

        
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
    