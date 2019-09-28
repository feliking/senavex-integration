<input type="hidden" id="id_declaracion_jurada" name="id_declaracion_jurada" value="{$ddjj->getId_ddjj()}">
<div class="row-fluid  form" >
    <div class="row-fluid "  id="apruebaddjj" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro">Datos de la DDJJ.</div>
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
                                <td>{if ($ddjjacuerdo->getBeneficio()==0)} NO
                                    {else} SI
                                    {/if}
                                </td>
                                <td>{if ($ddjjacuerdo->getCumple()==0)} NO
                                    {else} SI
                                    {/if}
                                </td>
                                <td>
                                    {$ddjjacuerdo->criterio_origen->getDescripcion()}
                                </td>
                                <td>{$ddjjacuerdo->getObservaciones()}</td>
                            </tr>
                            {/foreach}
                        </table>
                    </div>
                </fieldset>
                {if ($ddjj->getObservacion_general()!='')}
                <br><br>
                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        Observaciones Por Rechazo:
                    </div>     
                    <div class="span10 campo" >
                        {$ddjj->getObservacion_general()}<br>
                    </div>  
                </div>
                {/if}
                <br><br>
                
                <!-- BOTONES-->
                <div class="row-fluid form" >
                    <div class="span1"></div>
                    <div class="span3" >
                        <input id="aprobarddjj_" type="button" value="Aprobar" class="k-primary" style="width:100%"/>
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

                    
<div class="row-fluid fadein"  id="firmaenvioddjjcompleta" >
       <div class="k-block fadein">
                <div class="k-header">
                    <div class="k-header"><div class="titulo">Confirmación de Envío de DD.JJ.</div></div>
                </div>
                <div class="k-cuerpo"> 
                    <div class="row-fluid  form" >
                        <div class="span1" > </div>
                        <div class="span10" >
                            <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, declaro que todo el contenido de la declaración jurada del producto es fidedigna.</p> 
                        </div>  
                        <div class="span1" ></div>
                    </div> 
                    <form name="formfirmaenvioddjjcompleta" id="formfirmaenvioddjjcompleta" method="post"  action="index.php" >
                        <div class="row-fluid form">
                            <div class="span5" ></div>
                            <div class="span2" >
                                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                               class="k-textbox " placeholder="Pin" name="pinfirmaenvioddjjcompleta"  id="pinfirmaenvioddjjcompleta" maxlength="4" size="4" style="width:50px;"
                               required data-required-msg="Por favor ingrese su Pin." data-firmarenvioddjjcompleta /> 
                            </div>  
                            <div class="span5" ></div>
                        </div>  
                        <div class="row-fluid  form">
                            <div class="span4 hidden-phone" >
                             </div>
                             <div class="span2 " >
                                 <input id="cancelafirmaenvioddjjcompleta" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                             </div> 
                             <div class="span2 " >
                                 <input id="firmarenvioddjjcompleta" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                             </div> 
                             <div class="span4 hidden-phone" >
                             </div>
                         </div> 
                    </form> 
                </div>   
      </div>              
</div>

<script>
    ocultar('firmaenvioddjjcompleta');
    
    $("#aprobarddjj_").kendoButton();
    $("#cerrarddjj").kendoButton();
    
    var aprobarddjj = $("#aprobarddjj_").data("kendoButton");
    var cerrarddjj = $("#cerrarddjj").data("kendoButton");

    //FUNCIONES PARA LA FIRMA DEL EXPORTADOR ENVIANDO LA DDJJ COMPLETA
    $("#cancelafirmaenvioddjjcompleta").kendoButton();
    $("#firmarenvioddjjcompleta").kendoButton();
    var cancelafirmaenvioddjjcompleta = $("#cancelafirmaenvioddjjcompleta").data("kendoButton");
    var firmarenvioddjjcompleta = $("#firmarenvioddjjcompleta").data("kendoButton");

    cancelafirmaenvioddjjcompleta.bind("click", function(e){             
        cambiar('firmaenvioddjjcompleta','apruebaddjj');
        borrarPin('{$nombre}');
    });
    
    firmarenvioddjjcompleta.bind("click", function(e){
        if(formfirmaenvioddjjcompleta.validate())
        {
            var datos = "opcion=admDeclaracionJurada&tarea=aprobarDdjj&id_ddjj="+{$ddjj->getId_ddjj()}
            
            $.ajax({
                type: 'post',
                url: 'index.php',
                data: datos,
                success: function(data) {
                    firmarPin('Declaración Jurada','admDeclaracionJurada','','{$nombre}');
                    //alert("La Declaración Jurada fue Enviada.");
                    //cerraractualizartab(titulo,"admDeclaracioJurada",tarea)
                    remover(tabStrip.select());
                }
            });
        }
    });

    /*-----------esto es para la validacion del pin*****************************************/
    var swfirma=2;        
    var firmacache='';
    var formfirmaenvioddjjcompleta = $("#formfirmaenvioddjjcompleta").kendoValidator({
        rules:{ 
            firmarenvioddjjcompleta: function(input) { 
                var validate = input.data('firmarenvioddjjcompleta');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    if (firmacache !== $("#pinfirmaenvioddjjcompleta").val()) 
                    {
                        verificarPinDDJJ($("#pinfirmaenvioddjjcompleta").val());                    
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
            firmarenvioddjjcompleta: function(input) { 
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
    
    function verificarPinDDJJ(pin_insertado)
    {
        $.ajax({
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
                success: function (data) {    
                    swfirma=data;
                    firmacache=$("#pinfirmaenvioddjjcompleta").val();
                    formfirmaenvioddjjcompleta.validateInput($("#pinfirmaenvioddjjcompleta"));
                }
            }); 
    }

    aprobarddjj.bind("click", function(e){
        cambiar('apruebaddjj','firmaenvioddjjcompleta');
        generarPin('{$id_empresa}','{$id_persona}','4');
    });
    
    cerrarddjj.bind("click", function(e){  
        remover(tabStrip.select());
    });
</script>
    