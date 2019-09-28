<div class="row-fluid form" id="revisarCO">
    <div class="row-fluid">
        <div class="span12">
            <div class="k-block fadein">
            <form name="form_revision" id="form_revision" method="post" action="index.php">
                <input type="hidden" id="id_certificado_origen" name="id_certificado_origen" value="{$co->getId_certificado_origen()}">
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
                    {if ($co_aladi->getId_datos_tercer_operador()!='0')}
                    <div class="row-fluid " >
                        <div class="span6 parametro">
                            Exportación realizada con Factura de Tercer Operador:
                        </div>
                        <div class="span2 campo" >
                            N° <strong>{$datos_tercer_operador->getNumero_factura()}</strong>
                            <!-- N° <strong>{$co_aladi->getFactura_tercer_operador()}</strong>-->
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
                    <!-- Verificar que sea facturación por tercer operador -->
                    {if ($co_mercosur->getFactura_tercer_operador()!=0)}
                    <div class="row-fluid " >
                        <div class="span4 parametro">
                            Exportación realizada con Factura de Tercer Operador:
                        </div>     
                        <div class="span2 campo" >
                            N° <strong>{$co_mercosur->getFactura_tercer_operador()}</strong>
                        </div>  
                    </div>
                    {/if}

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
                        <div class="span2 parametro">
                            Para Uso Oficial del Certificador:
                        </div>     
                        <div class="span10" >
                            <textarea class="k-textbox" rows="2" id="usooficialsgp" name="usooficialsgp" placeholder="Uso Oficial"></textarea>
                        </div>
                    </div>
                    <br>
                {/if}
                
            <!-- MOSTRAR LOS DATOS DEL TIPO VENEZUELA -->
                {if ($co->getId_tipo_co()==4)}
                    <!-- Verificar que sea facturación por tercer operador -->
                    {if ($co_venezuela->getFactura_tercer_operador()!=0)}
                    <div class="row-fluid " >
                        <div class="span4 parametro">
                            Exportación realizada con Factura de Tercer Operador:
                        </div>     
                        <div class="span2 campo" >
                            N° <strong>{$co_venezuela->getFactura_tercer_operador()}</strong>
                        </div>  
                    </div>
                    {/if}
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
                    <!-- Verificar que sea facturación por tercer operador -->
                    {if ($co_tp->getFactura_tercer_operador()!=0)}
                    <div class="row-fluid " >
                        <div class="span4 parametro">
                            Exportación realizada con Factura de Tercer Operador:
                        </div>     
                        <div class="span2 campo" >
                            N° <strong>{$co_tp->getFactura_tercer_operador()}</strong>
                        </div>  
                    </div>
                    {/if}
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
                        <div class="span2 parametro">
                            Para Uso Oficial del Certificador:
                        </div>     
                        <div class="span10 campo" >
                            <textarea class="k-textbox" rows="2" id="usooficialtp" name="usooficialtp" placeholder="Para Uso Oficial"></textarea>
                        </div>
                    </div>
                    <br>
                {/if}
                
                <div class="row-fluid " >
                    <div class="span2 parametro">
                        Observaciones Generales:
                    </div>     
                    <div class="span10" >
                        <textarea class="k-textbox" rows="2" id="observacionesgenerales" name="observacionesgenerales" placeholder="Observaciones" required validationMessage="Por favor coloque sus observaciones al Certificado"></textarea>
                    </div>
                </div>
                <br><br>
                <!-- BOTONES -->
                <div class="row-fluid form" >
                    <div class="span1"></div>
                    <div class="span2" >
                        <input id="aceptarco" type="button" value="Aprobar" class="k-primary" style="width:100%"/>
                    </div>
                    
                    <div class="span1"></div>
                    <div class="span2" >
                        <input id="imprimirnumeroco" type="button" value="Imprimir N°" class="k-primary" style="width:100%"/>
                    </div>
                    
                    {if ($co->getRevisado()=='TRUE')}
                    <div class="span1"></div>
                    <div class="span2" >
                        <input id="rechazarco" type="button" value="Rechazar" class="k-primary" style="width:100%"/>
                    </div>
                    {else}
                    <div class="span1"></div>
                    <div class="span2" >
                        <input id="devolvercertificado" type="button" value="Devolver" class="k-primary" style="width:100%"/>
                    </div>
                    {/if}
                    <div class="span1"></div>
                    <div class="span2" >
                        <input id="cerrarco" type="button"  value="Cancelar" class="k-primary" style="width:100%"/> 
                    </div>
                    <div class="span1"></div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="row-fluid fadein"  id="firmaenvioCoAceptar">
       <div class="k-block fadein">
                <div class="k-header">
                    <div class="k-header"><div class="titulo">Confirmación de Revisión del Certificado de Origen</div></div>
                </div>
                <div class="k-cuerpo"> 
                    <div class="row-fluid  form" >
                        <div class="span1" > </div>
                        <div class="span10" >
                            <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico la revisión y la aceptación de emisión
                                de un Certificado de Origen.</p> 
                        </div>  
                        <div class="span1" ></div>
                    </div> 
                    <form name="formfirmaenvioCoAceptar" id="formfirmaenvioCoAceptar" method="post"  action="index.php" >
                        <div class="row-fluid  form" >
                            <div class="span5" ></div>
                            <div class="span2" >
                                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                               class="k-textbox " placeholder="Pin" name="pinfirmaenvioCoAceptar"  id="pinfirmaenvioCoAceptar" maxlength="4" size="4" style="width:50px;"
                               required data-required-msg="Por favor ingrese su Pin." data-firmarenvioCoAceptar /> 
                            </div>  
                            <div class="span5" ></div>
                        </div>  
                        <div class="row-fluid  form" >
                            <div class="span4 hidden-phone" >
                             </div>
                             <div class="span2 " >
                                 <input id="cancelafirmaenvioCoAceptar" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                             </div> 
                             <div class="span2 " >
                                 <input id="firmarenvioCoAceptar" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                             </div> 
                             <div class="span4 hidden-phone" >
                             </div>
                         </div> 
                    </form> 
                </div>   
      </div>              
</div>

<div class="row-fluid fadein"  id="firmaenvioCoRechazar" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header"><div class="titulo">Confirmación de Revisión del Certificado de Origen</div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico el rechazo 
                        de un Certificado de Origen.</p> 
                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmaenvioCoRechazar" id="formfirmaenvioCoRechazar" method="post"  action="index.php" >
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                       class="k-textbox " placeholder="Pin" name="pinfirmaenvioCoRechazar"  id="pinfirmaenvioCoRechazar" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmarenvioCoRechazar /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="cancelafirmaenvioCoRechazar" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="firmarenvioCoRechazar" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                     </div> 
                     <div class="span4 hidden-phone" >
                     </div>
                 </div> 
            </form> 
        </div>   
    </div>              
</div>

<div class="row-fluid fadein"  id="firmaenvioCoDevolver" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header"><div class="titulo">Confirmación de Devolución del Certificado de Origen</div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico la devolución para corrección 
                        de un Certificado de Origen.</p> 
                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmaenvioCoDevolver" id="formfirmaenvioCoDevolver" method="post"  action="index.php" >
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                       class="k-textbox " placeholder="Pin" name="pinfirmaenvioCoDevolver"  id="pinfirmaenvioCoDevolver" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmarenvioCoDevolver /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="cancelafirmaenvioCoDevolver" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="firmarenvioCoDevolver" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                     </div> 
                     <div class="span4 hidden-phone" >
                     </div>
                 </div> 
            </form> 
        </div>   
    </div>              
</div>

<div class="row-fluid fadein"  id="firmaenvioCoImprimirNumero" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header"><div class="titulo">Confirmación de Impresión de Número del Certificado de Origen</div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico la Impresión del Número de Certificado de Origen y la Fecha de Emisión.</p> 
                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmaenvioCoImprimirNumero" id="formfirmaenvioCoImprimirNumero" method="post"  action="index.php" >
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                       class="k-textbox " placeholder="Pin" name="pinfirmaenvioCoImprimirNumero"  id="pinfirmaenvioCoImprimirNumero" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmarenvioCoDevolver /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="cancelafirmaenvioCoImprimirNumero" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="firmarenvioCoImprimirNumero" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                     </div> 
                     <div class="span4 hidden-phone" >
                     </div>
                 </div> 
            </form> 
        </div>   
    </div>              
</div>

<script>

ocultar('firmaenvioCoAceptar');
//FUNCIONES PARA LA FIRMA DEL CERTIFICADOR ACEPTANDO EL C.O.
$("#cancelafirmaenvioCoAceptar").kendoButton();
$("#firmarenvioCoAceptar").kendoButton();
var cancelafirmaenvioCoAceptar = $("#cancelafirmaenvioCoAceptar").data("kendoButton");
var firmarenvioCoAceptar = $("#firmarenvioCoAceptar").data("kendoButton");

cancelafirmaenvioCoAceptar.bind("click", function(e){             
    cambiar('firmaenvioCoAceptar','revisarCO');
    borrarPin('{$nombre}');
});

firmarenvioCoAceptar.bind("click", function(e){
    if(formfirmaenvioCoAceptar.validate())
    {
        var datos = $("#form_revision").serialize()+"&opcion=admCertificado&tarea=aprobarCertificadoOrigen";
        
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: datos,
            success: function(data) {
                window.open('index.php?opcion=imprimirCertificado&tarea=imprimirCertificadoOrigen&id_certificado_origen='+{$co->getId_certificado_origen()}," ", "directories=no, location=no, menubar=no, scrollbars=no, statusbar=no, tittlebar=no, width=1024, height=768");
                firmarPin('Certificados de Origen','admCertificado','listarRevisionCertificadosOrigen','{$nombre}');
            }
        });
        
    }
});

/*-----------esto es para la validacion del pin*****************************************/
var swfirma=2;        
var firmacache='';
var formfirmaenvioCoAceptar = $("#formfirmaenvioCoAceptar").kendoValidator({
    rules:{ 
        firmarenvioCoAceptar: function(input) { 
            var validate = input.data('firmarenvioCoAceptar');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmacache !== $("#pinfirmaenvioCoAceptar").val()) 
                {
                    verificarPinCoAceptar($("#pinfirmaenvioCoAceptar").val());                    
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
        firmarenvioCoAceptar: function(input) { 
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
                firmacache=$("#pinfirmaenvioCoAceptar").val();
                formfirmaenvioCoAceptar.validateInput($("#pinfirmaenvioCoAceptar"));
            }
        }); 
}

//FUNCIONES PARA LA FIRMA DEL CERTIFICADOR RECHAZANDO EL C.O.
ocultar('firmaenvioCoRechazar');

$("#cancelafirmaenvioCoRechazar").kendoButton();
$("#firmarenvioCoRechazar").kendoButton();
var cancelafirmaenvioCoRechazar = $("#cancelafirmaenvioCoRechazar").data("kendoButton");
var firmarenvioCoRechazar = $("#firmarenvioCoRechazar").data("kendoButton");

cancelafirmaenvioCoRechazar.bind("click", function(e){             
    cambiar('firmaenvioCoRechazar','revisarCO');
    borrarPin('{$nombre}');
});

firmarenvioCoRechazar.bind("click", function(e){
    if(formfirmaenvioCoRechazar.validate())
    {
        var datos = $("#form_revision").serialize()+"&opcion=admCertificado&tarea=rechazarCertificadoOrigen";
        
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: datos,
            success: function(data) {
                firmarPin('Certificados de Origen','admCertificado','listarRevisionCertificadosOrigen','{$nombre}');
            }
        });
    }
});

/*-----------esto es para la validacion del pin*****************************************/
var swfirma=2;        
var firmacache='';
var formfirmaenvioCoRechazar = $("#formfirmaenvioCoRechazar").kendoValidator({
    rules:{ 
        firmarenvioCoRechazar: function(input) { 
            var validate = input.data('firmarenvioCoRechazar');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmacache !== $("#pinfirmaenvioCoRechazar").val()) 
                {
                    verificarPinCoRechazar($("#pinfirmaenvioCoRechazar").val());                    
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
        firmarenvioCoRechazar: function(input) { 
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

function verificarPinCoRechazar(pin_insertado)
{
    $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
            success: function (data) {    
                swfirma=data;
                firmacache=$("#pinfirmaenvioCoRechazar").val();
                formfirmaenvioCoRechazar.validateInput($("#pinfirmaenvioCoRechazar"));
            }
        }); 
}

//FUNCIONES PARA LA FIRMA DEL CERTIFICADOR DEVOLVIENDO EL C.O.
ocultar('firmaenvioCoDevolver');

$("#cancelafirmaenvioCoDevolver").kendoButton();
$("#firmarenvioCoDevolver").kendoButton();
var cancelafirmaenvioCoDevolver = $("#cancelafirmaenvioCoDevolver").data("kendoButton");
var firmarenvioCoDevolver = $("#firmarenvioCoDevolver").data("kendoButton");

cancelafirmaenvioCoDevolver.bind("click", function(e){             
    cambiar('firmaenvioCoDevolver','revisarCO');
    borrarPin('{$nombre}');
});

firmarenvioCoDevolver.bind("click", function(e){
    if(formfirmaenvioCoDevolver.validate())
    {
        var datos = $("#form_revision").serialize()+"&opcion=admCertificado&tarea=devolverCertificadoOrigen";
        
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: datos,
            success: function(data) {
                firmarPin('Certificados de Origen','admCertificado','listarRevisionCertificadosOrigen','{$nombre}');
            }
        });
    }
});

var formfirmaenvioCoDevolver = $("#formfirmaenvioCoDevolver").kendoValidator({
    rules:{ 
        firmarenvioCoDevolver: function(input) { 
            var validate = input.data('firmarenvioCoDevolver');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmacache !== $("#pinfirmaenvioCoDevolver").val()) 
                {
                    verificarPinCoDevolver($("#pinfirmaenvioCoDevolver").val());                    
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
        firmarenvioCoDevolver: function(input) { 
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

function verificarPinCoDevolver(pin_insertado)
{
    $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
            success: function (data) {    
                swfirma=data;
                firmacache=$("#pinfirmaenvioCoDevolver").val();
                formfirmaenvioCoDevolver.validateInput($("#pinfirmaenvioCoDevolver"));
            }
        }); 
}

//////////////// Funciones para Poner el Numero y FechaEmision del Certificado de Origen/////////////////////////////////////

ocultar('firmaenvioCoImprimirNumero');

//FUNCIONES PARA LA FIRMA DEL CERTIFICADOR ACEPTANDO EL C.O.
$("#cancelafirmaenvioCoImprimirNumero").kendoButton();
$("#firmarenvioCoImprimirNumero").kendoButton();
var cancelafirmaenvioCoImprimirNumero = $("#cancelafirmaenvioCoImprimirNumero").data("kendoButton");
var firmarenvioCoImprimirNumero = $("#firmarenvioCoImprimirNumero").data("kendoButton");

cancelafirmaenvioCoImprimirNumero.bind("click", function(e){             
    cambiar('firmaenvioCoImprimirNumero','revisarCO');
    borrarPin('{$nombre}');
});

firmarenvioCoImprimirNumero.bind("click", function(e){
    if(formfirmaenvioCoImprimirNumero.validate())
    {
        var datos = $("#form_revision").serialize()+"&opcion=admCertificado&tarea=asignarNumeroCertificadoOrigen"+"&id_certificado_origen="+{$co->getId_certificado_origen()};
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: datos,
            success: function(data) {
                window.open('index.php?opcion=imprimirCertificado&tarea=imprimirCertificadoOrigenNumero&id_certificado_origen='+{$co->getId_certificado_origen()}," ", "directories=no, location=no, menubar=no, scrollbars=no, statusbar=no, tittlebar=no, width=1024, height=768");
                firmarPin('Certificados de Origen','admCertificado','listarRevisionCertificadosOrigen','{$nombre}');
            }
        });
        
    }
});

// esto es para la validacion del pin//////////////////////////////
var swfirma=2;
var firmacache='';
var formfirmaenvioCoImprimirNumero = $("#formfirmaenvioCoImprimirNumero").kendoValidator({
    rules:{ 
        firmarenvioCoImprimirNumero: function(input) { 
            var validate = input.data('firmarenvioCoImprimirNumero');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmacache !== $("#pinfirmaenvioCoImprimirNumero").val()) 
                {
                    verificarPinCoImprimirNumero($("#pinfirmaenvioCoImprimirNumero").val());                    
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
        firmarenvioCoImprimirNumero: function(input) { 
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

function verificarPinCoImprimirNumero(pin_insertado)
{
    $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
            success: function (data) {    
                swfirma=data;
                firmacache=$("#pinfirmaenvioCoImprimirNumero").val();
                formfirmaenvioCoAceptar.validateInput($("#pinfirmaenvioCoImprimirNumero"));
            }
        }); 
}


//////////////// Funciones para Revisar el Certificado de Origen/////////////////////////////////////
$("#aceptarco").kendoButton();
$("#imprimirnumeroco").kendoButton();
$("#rechazarco").kendoButton();
$("#devolvercertificado").kendoButton();
$("#cerrarco").kendoButton();
var aceptarco = $("#aceptarco").data("kendoButton");
var imprimirnumeroco = $("#imprimirnumeroco").data("kendoButton");
var rechazarco = $("#rechazarco").data("kendoButton");
var devolvercertificado = $("#devolvercertificado").data("kendoButton");
var cerrarco = $("#cerrarco").data("kendoButton");

var form_revision = $("#form_revision").kendoValidator({
}).data("kendoValidator");

cerrarco.bind("click", function(e){  
    remover(tabStrip.select());
});

aceptarco.bind("click", function(e){
    cambiar('revisarCO','firmaenvioCoAceptar');
    generarPin('{$id_empresa}','{$id_persona}','16');
});

imprimirnumeroco.bind("click", function(e){
    //window.open('index.php?opcion=imprimirCertificado&tarea=imprimirCertificadoOrigenNumero&id_certificado_origen='+{$co->getId_certificado_origen()}," ", "directories=no, location=no, menubar=no, scrollbars=no, statusbar=no, tittlebar=no, width=1024, height=768");
    cambiar('revisarCO','firmaenvioCoImprimirNumero');
    generarPin('{$id_empresa}','{$id_persona}','16');
});

devolvercertificado.bind("click", function(e){
    if(form_revision.validate()){
        cambiar('revisarCO','firmaenvioCoDevolver');
        generarPin('{$id_empresa}','{$id_persona}','15');
    }
});

rechazarco.bind("click", function(e){
    if(form_revision.validate()){
        cambiar('revisarCO','firmaenvioCoRechazar');
        generarPin('{$id_empresa}','{$id_persona}','15');
    }
});

/////// FUNCIONES PARA VER DDJJ Y FACTURAS ///////

function ver_ddjj(id_ddjj){
    anadir("DDJJ",'admDeclaracionJurada','mostrardeclaracion&id_declaracion_jurada='+id_ddjj);
}

function ver_factura(id_factura,tipo_factura){
    anadir("Factura",'admInventario','mostrarfactura&tipo_factura='+tipo_factura+'&id_factura='+id_factura);
}
</script>
    