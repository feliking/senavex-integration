<input type="hidden" id="anular_factura" name="anular_factura" value="0">
<input type="hidden" id="id_co" name="id_co" value="{$co->getId_certificado_origen()}">
<div class="row-fluid form" id="mostrarCO">
    <div class="row-fluid">
        <div class="span12">
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro">Datos del Certificado de Origen.</div>
                        </div>
                    </div>
                </div>
                <br>
                <fieldset>
                    <legend align="center"><b>DATOS GENERALES</b></legend>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Tipo de Certificado:
                        </div>     
                        <div class="span4 campo" >
                            {$co->tipo_co->getAbreviatura()}
                        </div>  
                        <div class="span2 parametro">
                            Acuerdo:
                        </div>     
                        <div class="span4 campo" >
                            {$co->acuerdo->getSigla()}
                        </div>
                    </div>

                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            País de Destino:
                        </div>     
                        <div class="span4 campo" >
                            {$co->pais->getNombre()}
                        </div>  
                        <div class="span2 parametro">
                            Empresa:
                        </div>     
                        <div class="span4 campo" >
                            {$co->empresa->getRazon_Social()}
                        </div>
                    </div>

                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Fecha de Llenado:
                        </div>     
                        <div class="span4 campo" >
                            {$co->getFecha_llenado()}
                        </div>  
                        <div class="span2 parametro">
                            Valor FOB Total:
                        </div>     
                        <div class="span4 campo" >
                            {$co->getValor_fob_total()}
                        </div>
                    </div>
                </fieldset>
                <br>
            <!-- MOSTRAR LOS DATOS DEL TIPO ALADI -->
                {if ($co->getId_tipo_co()==1)}
                    <!-- Verificar que sea facturación por tercer operador -->
                    {if ($co_aladi->getFactura_tercer_operador()!='0')}
                    <div class="row-fluid " >
                        <div class="span4 parametro">
                            Exportación realizada con Factura de Tercer Operador:
                        </div>     
                        <div class="span2 campo" >
                            N° <strong>{$co_aladi->getFactura_tercer_operador()}</strong>
                        </div>  
                    </div>
                    {/if}
                    
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Observaciones:
                        </div>     
                        <div class="span10 campo" >
                            <!-- <textarea class="k-textbox" rows="3" id="observaciones" name="observaciones" placeholder="Observaciones"></textarea>-->
                            {$co_aladi->getObservaciones()}
                        </div>  
                    </div>

                    <div class="row-fluid" >
                        <br><strong>DATOS DE DECLARACIONES JURADAS Y FACTURAS</strong>
                    </div>
                    <div class="row-fluid " >
                        <table border="1" width="100%" class="k-t">
                            <tr>
                                <td width="10%">N° Orden</td>
                                <td width="15%">DDJJ</td>
                                <td width="20%">Descripcion Mercaderia</td>
                                <td width="20%">Clasificación Arancelaria</td>
                                <td width="15%">Factura</td>
                                <td width="20%">N° Factura</td>
                                <td width="15%">Tipo Factura</td>
                            </tr>
                            {foreach from=$detalle_aladi item='detalle'}
                            <tr>
                                <td>{$detalle["numero_orden"]}</td>
                                <td><a style="cursor: pointer;" onclick="ver_ddjj({$detalle["id_ddjj"]})">Ver DDJJ</a></td>
                                <td>{$detalle["denominacion_mercaderia"]}</td>
                                <td>{$detalle["clasif_arancelaria"]}</td>
                                {if ($detalle["id_tipo_factura"]==1)}
                                    <td><a style="cursor: pointer;" onclick="ver_factura({$detalle["id_factura"]},1)">Ver Factura</a></td>
                                {else}
                                    <td><a style="cursor: pointer;" onclick="ver_factura({$detalle["id_factura"]},0)">Ver Factura</a></td>
                                {/if}
                                <td>{$detalle["numero_factura"]}</td>
                                {if ($detalle["id_tipo_factura"]==1)}
                                    <td>Fact. dosificada</td>
                                {else}
                                    <td>Fact. No Dosificada</td>
                                {/if}
                            </tr>
                            {/foreach}
                        </table>
                    </div>
                    <br><br>
                {/if}
            <!-- MOSTRAR LOS DATOS DEL TIPO MERCOSUR -->
                {if ($co->getId_tipo_co()==2)}
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Importador:
                        </div>     
                        <div class="span4 campo" >
                            {$co_mercosur->getNombre_importador()}
                        </div>
                        <div class="span2 parametro">
                            Dirección Importador:
                        </div>     
                        <div class="span4 campo" >
                            {$co_mercosur->getDireccion_importador()}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            País de Importador:
                        </div>     
                        <div class="span4 campo" >
                            {$co_mercosur->getId_pais_importador()}
                        </div>
                        <div class="span2 parametro">
                            Consignatario:
                        </div>     
                        <div class="span4 campo" >
                            {$co_mercosur->getNombre_consignatario()}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Dirección Consignatario:
                        </div>     
                        <div class="span4 campo" >
                            {$co_mercosur->getDireccion_consignatario()}
                        </div>
                        <div class="span2 parametro">
                            País de Consignatario:
                        </div>     
                        <div class="span4 campo" >
                            {$co_mercosur->getId_pais_consignatario()}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Medio de Transporte:
                        </div>     
                        <div class="span4 campo" >
                            {$co_mercosur->medio_transporte->getDescripcion()}
                        </div>
                        <div class="span2 parametro">
                            Puerto o Lugar de Embarque:
                        </div>     
                        <div class="span4 campo" >
                            {$co_mercosur->getPuerto_lugar_embarque()}
                        </div>
                    </div>
                    
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Observaciones:
                        </div>     
                        <div class="span10 campo" >
                            {$co_mercosur->getObservaciones()}
                        </div>  
                    </div>
                    <!-- Verificar que sea facturación por tercer operador -->
                    {if ($co_mercosur->getId_tercer_operador()!=0)}
                    <div class="row-fluid " >
                        <div class="span4 parametro">
                            Exportación realizada con Factura de Tercer Operador:
                        </div>     
                        <div class="span2 campo" >
                            <a style="cursor: pointer;" onclick="ver_factura({$co_mercosur->getId_tercer_operador()},2)">N° <strong>{$co_mercosur->getId_tercer_operador()}</a>
                        </div>  
                    </div>
                    {/if}

                    <div class="row-fluid" >
                        <br><strong>DATOS DE DECLARACIONES JURADAS Y FACTURAS</strong>
                    </div>
                    <div class="row-fluid " >
                        <table border="1" width="100%" class="k-t">
                            <tr>
                                <td width="10%">N° Orden</td>
                                <td width="15%">DDJJ</td>
                                <td width="20%">Descripcion Mercaderia</td>
                                <td width="20%">Clasificación Arancelaria</td>
                                <td width="15%">Factura</td>
                                <td width="20%">N° Factura</td>
                                <td width="15%">Tipo Factura</td>
                            </tr>
                            {foreach from=$detalle_mercosur item='detalle'}
                            <tr>
                                <td>{$detalle["numero_orden"]}</td>
                                <td><a style="cursor: pointer;" onclick="ver_ddjj({$detalle["id_ddjj"]})">Ver DDJJ</a></td>
                                <td>{$detalle["denominacion_mercaderia"]}</td>
                                <td>{$detalle["clasif_arancelaria"]}</td>
                                {if ($detalle["id_tipo_factura"]==1)}
                                    <td><a style="cursor: pointer;" onclick="ver_factura({$detalle["id_factura"]},1)">Ver Factura</a></td>
                                {else}
                                    <td><a style="cursor: pointer;" onclick="ver_factura({$detalle["id_factura"]},0)">Ver Factura</a></td>
                                {/if}
                                <td>{$detalle["numero_factura"]}</td>
                                {if ($detalle["id_tipo_factura"]==1)}
                                    <td>Fact. dosificada</td>
                                {else}
                                    <td>Fact. No Dosificada</td>
                                {/if}
                            </tr>
                            {/foreach}
                        </table>
                    </div>
                    <br><br>
                {/if}
                
            <!-- MOSTRAR LOS DATOS DEL TIPO SGP -->
                {if ($co->getId_tipo_co()==3)}
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Consignatario:
                        </div>     
                        <div class="span4 campo" >
                            {$co_sgp->getNombre_consignatario()}
                        </div>
                        <div class="span2 parametro">
                            Dirección Consignatario:
                        </div>     
                        <div class="span4 campo" >
                            {$co_sgp->getDireccion_consignatario()}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            País de Consignatario:
                        </div>     
                        <div class="span4 campo" >
                            {$co_sgp->getId_pais_consignatario()}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Medio de Transporte:
                        </div>     
                        <div class="span4 campo" >
                            {$co_sgp->medio_transporte->getDescripcion()}
                        </div>
                        <div class="span2 parametro">
                            Ruta:
                        </div>     
                        <div class="span4 campo" >
                            {$co_sgp->getRuta()}
                        </div>
                    </div>
                    
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Observaciones:
                        </div>     
                        <div class="span10 campo" >
                            {$co_sgp->getObservaciones()}
                        </div>  
                    </div>

                    <div class="row-fluid" >
                        <br><strong>DATOS DE DECLARACIONES JURADAS Y FACTURAS</strong>
                    </div>
                    <div class="row-fluid " >
                        <table border="1" width="100%" class="k-t">
                            <tr>
                                <td width="10%">N° Orden</td>
                                <td width="15%">DDJJ</td>
                                <td width="20%">Descripcion Mercaderia</td>
                                <td width="20%">Clasificación Arancelaria</td>
                                <td width="15%">Factura</td>
                                <td width="20%">N° Factura</td>
                                <td width="15%">Tipo Factura</td>
                            </tr>
                            {foreach from=$detalle_sgp item='detalle'}
                            <tr>
                                <td>{$detalle["numero_orden"]}</td>
                                <td><a style="cursor: pointer;" onclick="ver_ddjj({$detalle["id_ddjj"]})">Ver DDJJ</a></td>
                                <td>{$detalle["denominacion_mercaderia"]}</td>
                                <td>{$detalle["clasif_arancelaria"]}</td>
                                {if ($detalle["id_tipo_factura"]==1)}
                                    <td><a style="cursor: pointer;" onclick="ver_factura({$detalle["id_factura"]},1)">Ver Factura</a></td>
                                {else}
                                    <td><a style="cursor: pointer;" onclick="ver_factura({$detalle["id_factura"]},0)">Ver Factura</a></td>
                                {/if}
                                <td>{$detalle["numero_factura"]}</td>
                                {if ($detalle["id_tipo_factura"]==1)}
                                    <td>Fact. dosificada</td>
                                {else}
                                    <td>Fact. No Dosificada</td>
                                {/if}
                            </tr>
                            {/foreach}
                        </table>
                    </div>
                    <br>
                    <div class="row-fluid">
                        <div class="span3 parametro">
                            Para Uso Oficial:
                        </div>     
                        <div class="span9 campo" >
                            {$co_sgp->getUso_oficial()}
                        </div>
                    </div>
                    <br>
                {/if}
                
            <!-- MOSTRAR LOS DATOS DEL TIPO VENEZUELA -->
                {if ($co->getId_tipo_co()==4)}
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Importador:
                        </div>     
                        <div class="span4 campo" >
                            {$co_venezuela->getNombre_importador()}
                        </div>
                        <div class="span2 parametro">
                            Dirección de Importador:
                        </div>     
                        <div class="span4 campo" >
                            {$co_venezuela->getDireccion_importador()}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            País Importador:
                        </div>     
                        <div class="span4 campo" >
                            {$co_venezuela->getId_pais_importador()}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Medio de Transporte:
                        </div>     
                        <div class="span4 campo" >
                            {$co_venezuela->medio_transporte->getDescripcion()}
                        </div>
                        <div class="span2 parametro">
                            Puerto o lugar de Embarque:
                        </div>     
                        <div class="span4 campo" >
                            {$co_venezuela->getPuerto_lugar_embarque()}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Observaciones:
                        </div>     
                        <div class="span10 campo" >
                            {$co_venezuela->getObservaciones()}
                        </div>  
                    </div>
                    <!-- Verificar que sea facturación por tercer operador -->
                    {if ($co_venezuela->getId_tercer_operador()!=0)}
                    <div class="row-fluid " >
                        <div class="span4 parametro">
                            Exportación realizada con Factura de Tercer Operador:
                        </div>     
                        <div class="span2 campo" >
                            <a style="cursor: pointer;" onclick="ver_factura({$co_venezuela->getId_tercer_operador()},2)">N° <strong>{$co_venezuela->getId_tercer_operador()}</a>
                        </div>  
                    </div>
                    {/if}

                    <div class="row-fluid" >
                        <br><strong>DATOS DE DECLARACIONES JURADAS Y FACTURAS</strong>
                    </div>
                    <div class="row-fluid " >
                        <table border="1" width="100%" class="k-t">
                            <tr>
                                <td width="10%">N° Orden</td>
                                <td width="15%">DDJJ</td>
                                <td width="20%">Descripcion Mercaderia</td>
                                <td width="20%">Clasificación Arancelaria</td>
                                <td width="15%">Factura</td>
                                <td width="20%">N° Factura</td>
                                <td width="15%">Tipo Factura</td>
                            </tr>
                            {foreach from=$detalle_venezuela item='detalle'}
                            <tr>
                                <td>{$detalle["numero_orden"]}</td>
                                <td><a style="cursor: pointer;" onclick="ver_ddjj({$detalle["id_ddjj"]})">Ver DDJJ</a></td>
                                <td>{$detalle["denominacion_mercaderia"]}</td>
                                <td>{$detalle["clasif_arancelaria"]}</td>
                                {if ($detalle["id_tipo_factura"]==1)}
                                    <td><a style="cursor: pointer;" onclick="ver_factura({$detalle["id_factura"]},1)">Ver Factura</a></td>
                                {else}
                                    <td><a style="cursor: pointer;" onclick="ver_factura({$detalle["id_factura"]},0)">Ver Factura</a></td>
                                {/if}
                                <td>{$detalle["numero_factura"]}</td>
                                {if ($detalle["id_tipo_factura"]==1)}
                                    <td>Fact. dosificada</td>
                                {else}
                                    <td>Fact. No Dosificada</td>
                                {/if}
                            </tr>
                            {/foreach}
                        </table>
                    </div>
                    <br><br>
                {/if}
            <!-- MOSTRAR LOS DATOS DEL TIPO TP -->
                {if ($co->getId_tipo_co()==5)}
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Consignatario:
                        </div>     
                        <div class="span4 campo" >
                            {$co_tp->getNombre_consignatario()}
                        </div>
                        <div class="span2 parametro">
                            Dirección Consignatario:
                        </div>     
                        <div class="span4 campo" >
                            {$co_tp->getDireccion_consignatario()}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            País de Consignatario:
                        </div>     
                        <div class="span4 campo" >
                            {$co_tp->getId_pais_consignatario()}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Medio de Transporte:
                        </div>     
                        <div class="span4 campo" >
                            {$co_tp->medio_transporte->getDescripcion()}
                        </div>
                        <div class="span2 parametro">
                            Ruta:
                        </div>     
                        <div class="span4 campo" >
                            {$co_tp->getRuta()}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 parametro">
                            Observaciones:
                        </div>     
                        <div class="span10 campo" >
                            {$co_tp->getObservaciones()}
                        </div>  
                    </div>
                    <!-- Verificar que sea facturación por tercer operador -->
                    {if ($co_tp->getId_tercer_operador()!=0)}
                    <div class="row-fluid " >
                        <div class="span4 parametro">
                            Exportación realizada con Factura de Tercer Operador:
                        </div>     
                        <div class="span2 campo" >
                            <a style="cursor: pointer;" onclick="ver_factura({$co_tp->getId_tercer_operador()},2)">N° <strong>{$co_tp->getId_tercer_operador()}</a>
                        </div>  
                    </div>
                    {/if}

                    <div class="row-fluid" >
                        <br><strong>DATOS DE DECLARACIONES JURADAS Y FACTURAS</strong>
                    </div>
                    <div class="row-fluid " >
                        <table border="1" width="100%" class="k-t">
                            <tr>
                                <td width="10%">N° Orden</td>
                                <td width="15%">DDJJ</td>
                                <td width="20%">Descripcion Mercaderia</td>
                                <td width="20%">Clasificación Arancelaria</td>
                                <td width="15%">Factura</td>
                                <td width="20%">N° Factura</td>
                                <td width="15%">Tipo Factura</td>
                            </tr>
                            {foreach from=$detalle_tp item='detalle'}
                            <tr>
                                <td>{$detalle["numero_orden"]}</td>
                                <td><a style="cursor: pointer;" onclick="ver_ddjj({$detalle["id_ddjj"]})">Ver DDJJ</a></td>
                                <td>{$detalle["denominacion_mercaderia"]}</td>
                                <td>{$detalle["clasif_arancelaria"]}</td>
                                {if ($detalle["id_tipo_factura"]==1)}
                                    <td><a style="cursor: pointer;" onclick="ver_factura({$detalle["id_factura"]},1)">Ver Factura</a></td>
                                {else}
                                    <td><a style="cursor: pointer;" onclick="ver_factura({$detalle["id_factura"]},0)">Ver Factura</a></td>
                                {/if}
                                <td>{$detalle["numero_factura"]}</td>
                                {if ($detalle["id_tipo_factura"]==1)}
                                    <td>Fact. dosificada</td>
                                {else}
                                    <td>Fact. No Dosificada</td>
                                {/if}
                            </tr>
                            {/foreach}
                        </table>
                    </div>
                    <br>
                    <div class="row-fluid">
                        <div class="span3 parametro">
                            Para Uso Oficial:
                        </div>     
                        <div class="span9 campo">
                            {$co_tp->getUso_oficial()}
                        </div>
                    </div>
                    <br>
                {/if}
                
                <div class="row-fluid " >
                    <div class="span3 parametro">
                        Observaciones Generales:
                    </div>     
                    <div class="span9 campo">
                        {if ($co->getObservaciones_certificador()=='')}
                            Sin Observaciones
                        {else}
                            {$co->getObservaciones_certificador()}
                        {/if}
                    </div>
                </div>
                
                <!-- BOTONES PARA ANULAR EL CERTIFICADO -->
                {if ($anular==1)}
                    <form name="form_anular_co" id="form_anular_co" method="post" action="index.php">
                    <div class="row-fluid form" >
                        <div class="span2" align="right">Motivo de Anulación</div>
                        <div class="span6" align="left">
                            <input id="motivo_anulacion" name="motivo_anulacion" style="width: 100%;" required validationMessage="Escoja el Motivo de la anulación"/>
                        </div>
                        <div class="span2"></div>
                    </div>
                    
                    <div class="row-fluid form" >
                        <div class="span2" align="right">Anular las Facturas asociadas al certificado?</div>
                        <div class="span6" align="left"><input type="radio" name="anula" id="noanula" value="0" checked>NO &nbsp;&nbsp;&nbsp;<input type="radio" name="anula" id="sianula" value="1">SI
                        </div>
                        <div class="span2"></div>
                    </div>
                    
                    <br><br>
                    <div class="row-fluid form" >
                        <div class="span2"></div>
                        <div class="span3">
                            <input id="anularco" type="button" value="Anular" class="k-primary" style="width:100%"/>
                        </div>
                        <div class="span2"></div>
                        <div class="span3" >
                            <input id="cancelarco" type="button" value="Cancelar" class="k-primary" style="width:100%"/>
                        </div>
                        <div class="span2"></div>
                    </div>
                    </form>
                {/if}

            </div>
        </div>
    </div>
</div>
<!--
<div id="anularFacturas">
    <div class="titulo">Anular Facturas</div><br>
    <div class="row-fluid form">
        <p>¿Desea tambien Anular las facturas asociadas al Certificado de Origen?</p>
        <br>
    </div>
    <div class="row-fluid form">
        <input id="siAnular" type="button"  value="SI" class="k-button" style="width:30"/> 
        <input id="noAnular" type="button"  value="NO" class="k-button" style="width:30"/> 
    </div>
</div> 
    -->            
<div class="row-fluid fadein"  id="firmaAnularCo" >
       <div class="k-block fadein">
                <div class="k-header">
                    <div class="k-header"><div class="titulo">Confirmación de Anulación del Certificado de Origen</div></div>
                </div>
                <div class="k-cuerpo"> 
                    <div class="row-fluid  form" >
                        <div class="span1" > </div>
                        <div class="span10" >
                            <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico la anulación
                                del Certificado de Origen.</p> 
                        </div>  
                        <div class="span1" ></div>
                    </div> 
                    <form name="formfirmaAnularCo" id="formfirmaAnularCo" method="post"  action="index.php" >
                        <div class="row-fluid  form" >
                            <div class="span5" ></div>
                            <div class="span2" >
                                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                               class="k-textbox " placeholder="Pin" name="pinfirmaAnularCo"  id="pinfirmaAnularCo" maxlength="4" size="4" style="width:50px;"
                               required data-required-msg="Por favor ingrese su Pin." data-firmarenvioAnularCo /> 
                            </div>  
                            <div class="span5" ></div>
                        </div>  
                        <div class="row-fluid  form" >
                            <div class="span4 hidden-phone" >
                             </div>
                             <div class="span2 " >
                                 <input id="cancelafirmaAnularCo" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                             </div> 
                             <div class="span2 " >
                                 <input id="firmarAnularCo" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                             </div> 
                             <div class="span4 hidden-phone" >
                             </div>
                         </div> 
                    </form> 
                </div>
      </div>
</div>
                
<script>

ocultar('firmaAnularCo');
//FUNCIONES PARA LA FIRMA DEL CERTIFICADOR ACEPTANDO EL C.O.
$("#cancelafirmaAnularCo").kendoButton();
$("#firmarAnularCo").kendoButton();
var cancelafirmaAnularCo = $("#cancelafirmaAnularCo").data("kendoButton");
var firmarAnularCo = $("#firmarAnularCo").data("kendoButton");

cancelafirmaAnularCo.bind("click", function(e){             
    cambiar('firmaAnularCo','mostrarCO');
    borrarPin('{$nombre}');
    $('#pinfirmaAnularCo').val('');
});

firmarAnularCo.bind("click", function(e){
    var co = $("#id_co").val();
    var anular = $("#sianula").is(":checked");
    if(anular){
        {if ($co->getId_tipo_co()==1)}
            {foreach from=$detalle_aladi item='detalle'}
                var link = "opcion=admFactura&tarea=eliminarFactura&id_factura="+{$detalle["id_factura"]}+"&tipo_factura="+{$detalle["id_tipo_factura"]};
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: link,
                    success: function(data) {
                    }
                });
            {/foreach}
        {/if}
        {if ($co->getId_tipo_co()==2)}
            {foreach from=$detalle_mercosur item='detalle'}
                var link = "opcion=admFactura&tarea=eliminarFactura&id_factura="+{$detalle["id_factura"]}+"&tipo_factura="+{$detalle["id_tipo_factura"]};
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: link,
                    success: function(data) {
                    }
                });
            {/foreach}
        {/if}
        {if ($co->getId_tipo_co()==3)}
            {foreach from=$detalle_sgp item='detalle'}
                var link = "opcion=admFactura&tarea=eliminarFactura&id_factura="+{$detalle["id_factura"]}+"&tipo_factura="+{$detalle["id_tipo_factura"]};
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: link,
                    success: function(data) {
                    }
                });
            {/foreach}
        {/if}
        {if ($co->getId_tipo_co()==4)}
            {foreach from=$detalle_venezuela item='detalle'}
                var link = "opcion=admFactura&tarea=eliminarFactura&id_factura="+{$detalle["id_factura"]}+"&tipo_factura="+{$detalle["id_tipo_factura"]};
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: link,
                    success: function(data) {
                    }
                });
            {/foreach}
        {/if}
        {if ($co->getId_tipo_co()==5)}
            {foreach from=$detalle_tp item='detalle'}
                var link = "opcion=admFactura&tarea=eliminarFactura&id_factura="+{$detalle["id_factura"]}+"&tipo_factura="+{$detalle["id_tipo_factura"]};
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: link,
                    success: function(data) {
                    }
                });
            {/foreach}
        {/if}
    }
    
    var motivo_anulacion = $("#motivo_anulacion").val();
    
    var datos = "opcion=admCertificado&tarea=anularCertificadoOrigen&id_certificado_origen="+co+"&motivo_anulacion="+motivo_anulacion;
    $.ajax({
        type: 'post',
        url: 'index.php',
        data: datos,
        success: function(data) {
            firmarPin('Certificados de Origen','admCertificado','','{$nombre}');
        }
    });
});

/************ VALIDACIÓN DEL PIN ******************************/
var swfirma=2;        
var firmacache='';
var formfirmaAnularCo = $("#formfirmaAnularCo").kendoValidator({
    rules:{ 
        firmarAnularCo: function(input) { 
            var validate = input.data('firmarAnularCo');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmacache !== $("#pinfirmaAnularCo").val()) 
                {
                    verificarPinCoAceptar($("#pinfirmaAnularCo").val());                    
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
        firmarAnularCo: function(input) { 
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
                firmacache=$("#pinfirmaAnularCo").val();
                formfirmaAnularCo.validateInput($("#pinfirmaAnularCo"));
            }
        }); 
}

//////////////// Funciones para Revisar las DDJJ y las Facturas ///////////////////////////////
function ver_ddjj(id_ddjj){
    anadir("DDJJ",'admDeclaracionJurada','mostrardeclaracion&id_declaracion_jurada='+id_ddjj);
}
function ver_factura(id_factura,tipo_factura){
    anadir("Factura",'admInventario','mostrarfactura&tipo_factura='+tipo_factura+'&id_factura='+id_factura);
}

////////////// Funaciones para anular el C.O.
/*
var anularFacturas = $("#anularFacturas").kendoWindow({
      draggable: true,
      height: "230px",                      
      width: "400px",
      resizable: true,
      modal: true,
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
anularFacturas.center();
*/
var form_anular_co = $("#form_anular_co").kendoValidator({
}).data("kendoValidator");

$("#anularco").kendoButton();
$("#cancelarco").kendoButton();
$("#siAnular").kendoButton();
$("#noAnular").kendoButton();
var anularco = $("#anularco").data("kendoButton");
var cancelarco = $("#cancelarco").data("kendoButton");
var siAnular = $("#siAnular").data("kendoButton");
var noAnular = $("#noAnular").data("kendoButton");

cancelarco.bind("click", function(e){  
    remover(tabStrip.select());
});

anularco.bind("click", function(e){
    if(form_anular_co.validate()){
        //anularFacturas.open();
        cambiar('mostrarCO','firmaAnularCo');
        generarPin('{$id_empresa}','{$id_persona}','18');        
    }
});
/*
siAnular.bind("click", function(e){
    /*anularFacturas.close();
    $("#anular_factura").val(1);
    cambiar('mostrarCO','firmaAnularCo');
    generarPin('{$id_empresa}','{$id_persona}','18');
    
});

noAnular.bind("click", function(e){  
    anularFacturas.close();
    $("#anular_factura").val(0);
    cambiar('mostrarCO','firmaAnularCo');
    generarPin('{$id_empresa}','{$id_persona}','18');
});
*/


$(document).ready(function (){
    $("#motivo_anulacion").kendoDropDownList({
        optionLabel:"Escoge el Motivo de la anulación",
        dataTextField: "descripcion",
        dataValueField: "id_motivo_anulacion",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=funcionesGenerales&tarea=listarMotivoAnulacion"
                }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text('');
            }
        }
    }).data("kendoDropDownList");
});
</script>
    