<div class="row-fluid fadein"  id="asignacionrui{$id}" >
    <div class="k-block">
        <div class="k-header">
            <div class="titulonegro">Revici&oacute;n de solicitud API</div> 
        </div>   
        <div class="k-cuerpo"> 
            <fieldset >
                <legend>1. DATOS DE LA EMPRESA</legend>
                <div class="row-fluid " >
                    <div class="span3"  >
                        Registro Operador (Aduana):
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRevision->padron_importador}
                    </div> 
                    <div class="span3" >
                        Razon Social:
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRevision->razon_social} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Nº de Identificación Tributaria:
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRevision->nit}
                    </div> 
                    <div class="span3 " >
                        Nº Testimonio de Constitución:
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRevision->testimonio_constitucion} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Nº Licencia de Funcionamiento:
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRevision->patente_municipal}
                    </div> 
                    <div class="span3" >
                        Nº Matricula de Comercio:
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRevision->matricula_fundempresa} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Fecha de Vencimiento de la Matricula de Comercio:
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRevision->vencimiento_fundempresa}
                    </div> 
                    <div class="span3" >
                        La empresa es Unipersonal:
                    </div>     
                    <div class="span3 campo" >
                        {if $unipersonal eq 1}
                            Si Unipersonal
                        {else}
                            No
                        {/if} 
                    </div>  

            </fieldset>

            <fieldset >
                <legend>2. DATOS DE LA SOLICITUD</legend>
                <div class="row-fluid " >
                    <div class="span3"  >
                        Cantidad Total:
                    </div>     
                    <div class="span3 campo" >
                        {$autorizacionPrevia->cantidad_total}
                    </div> 
                    <div class="span3" >
                        Peso Total:
                    </div>     
                    <div class="span3 campo" >
                        {$autorizacionPrevia->peso_total} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Valor total:
                    </div>     
                    <div class="span3 campo" >
                        {$autorizacionPrevia->valor_total}
                    </div> 
                    <div class="span3 " >
                        Origen de los Recursos:
                    </div>     
                    <div class="span3 campo" >
                        {$autorizacionPrevia->origen_recursos} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Entidad Bancaria:
                    </div>     
                    <div class="span3 campo" >
                        {$autorizacionPrevia->entidad_bancaria}
                    </div> 
                    <div class="span3" >
                        Numero Cuenta:
                    </div>     
                    <div class="span3 campo" >
                        {$autorizacionPrevia->numero_cuenta} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Fecha de Registro:
                    </div>     
                    <div class="span3 campo" >
                        {$autorizacionPrevia->fecha_registro|date_format:"%d/%m/%Y"}
                    </div> 
                    <div class="span3" >
                        Tipo de Cuenta:
                    </div>     
                    <div class="span3 campo" >
                        {if $autorizacionPrevia->tipo_cuenta eq 1}
                            M/N
                        {else}
                            M/E
                        {/if} 
                    </div>  

            </fieldset>
            <fieldset >
                <legend>3. DETALLE DE LA SOLICITUD</legend>
                <div class="row-fluid " >
                    <div class="span12"  >
                        <table border="1">
                        <tr><th>Nro</th><th>Subpartida</th><th>DESCRIPCIÓN ARANCELARIA</th><th>DESCRIPCIÓN COMERCIAL</th><th>CANTIDAD</th><th>UNIDAD DE MEDIDA</th><th>PESO BRUTO (KG.)</th><th>PRECIO UNITARIO </th><th>VALOR TOTAL</th><th>PRECIO UNITARIO (DIVISA)</th><th>VALOR TOTAL (DIVISA)</th>    
                        </tr>
                        {$turns = 1}
                        {foreach from=$autorizacionPreviaDetalle item=auto}
                            <tr><td>{$turns}</td>  
                                <td>{$auto->codigo_nandina}</td>    
                                <td>{$auto->descripcion_arancelaria}</td> 
                                <td>{$auto->descripcion_comercial}</td>
                                <td>{$auto->cantidad|string_format:"%.2f"}</td>
                                <td>{$auto->unidad_medida}</td> 
                                <td>{$auto->peso|string_format:"%.2f"}</td> 
                                <td>{$auto->precio_unitario_fob|string_format:"%.2f"}</td> 
                                <td>{$auto->fob|string_format:"%.2f"}</td> 
                                <td>{$auto->valor_fob_total_divisa}</td>
                                <td>{$auto->precio_unitario_fob_divisa}</td>  
                            </tr>
                            {$turns = $turns+1}
                        {/foreach}
                        </table>
                    </div>
                </div>
                <br><br>
                <div class="row-fluid " >
                    <div class="span3"  >
                        (*) SUBIR EL ARCHIVO CON LOS ITEMS LLENADOS:
                    </div>     
                    <div class="span6 campo" >
                        <input id="archivodetalle" type="file" name="archivo" required="required" />Excel
                    </div> 
                    <div class="span3" >
                         <input type="hidden" name="id_autorizacion" id="id_autorizacion" value="{$id_autorizacion}" />
                        <input id="aceptarex" type="button"  value="Subir" class="k-primary" style="width:100%"/>
                    </div>

                </div>
                

            </fieldset>

     
        </div>
        <div class="row-fluid form" >
            <div class="barra" >                                         
            </div> 
        </div>
        <fieldset >
            <legend>REVISION</legend>                           
            <div class="row-fluid  form" >
                <div class="span12 parametro" style="text-align: left;" >

                        <center>OBSERVACIONES</center>
                </div> 
            </div>       
            <!-- <div class="row-fluid  form" >
                <div class="span12 " > 
                    <textarea id="editorr_soporte"  >
                    </textarea> 
                </div>
            </div> -->
            <div class="row-fluid" id="notificacionobservacionr{$id}">
                <div class="span4 " >
                </div>
                 <div class="span4 " > 
                     
                </div> 
                <div class="span4 " > 
                </div>
                <div class="span3" >
                    <input id="cancelarr{$id}" type="{if $revisar=='2'}hidden{else}button{/if}" value="Atras" class="k-primary" style="width:100%"/> <br><br>
                </div>
                <div class="span3" >
                    <input id="rechazarr{$id}" type="{if $revisar=='2'}hidden{else}button{/if}" value="Rechazar" class="k-primary" style="width:100%"/> <br><br>
                </div>
               <!--  <div class="span3" >
                    <input id="asignarr{$id}" type="button"  value="Aprobar" class="k-primary" style="width:100%"/> 
                </div> -->
            </div>
        </fieldset>
    </div>    
</div>
<script>
    var editorr = $("#editorr_soporte").kendoEditor({
        tools: []
        }).data("kendoEditor"); 
    // $("#asignarr").kendoButton();
    $("#rechazarr").kendoButton();
    $("#cancelarr").kendoButton();
    $("#aceptarex").kendoButton();
    // var aprobarr = $("#asignarr").data("kendoButton");
    var aceptarex = $("#aceptarex").data("kendoButton");
    var rechazarr = $("#rechazarr").data("kendoButton");
    var cancelarr = $("#cancelarr").data("kendoButton");
    // aprobarr.bind("click", function(e){    
            
    //     $.ajax({
    //         type: 'post',
    //         url: 'index.php',
    //         data: 'id_empresa_importador={$empresaRevision->id_empresa_importador}&opcion=admRegistroApi&tarea=asignarRuiEmpresa',
    //         success: function (data) {
    //                 cerraractualizartab('Revisión API','admRegistroApi','revisionApi');
    //         }
    //     }); 
    // });
    rechazarr.bind("click", function(e){ 
         cerraractualizartab('SOLICITUDES API','admAutorizacionPrevia','ListarApiPendientes');
    });
    cancelarr.bind("click", function(e){    
        cerraractualizartab('SOLICITUDES API','admAutorizacionPrevia','ListarApiPendientes');       
    });

    aceptarex.bind("click", function(e){  

     $("#aceptarex").data("kendoButton").enable(false);
     $("#rechazarr").data("kendoButton").enable(false);
     $("#cancelarr").data("kendoButton").enable(false);
        var file_data = $("#archivodetalle").prop("files")[0];
        
        // var paisp = $("#pais_proc").data("kendoDropDownList");
        // var tipoc = $("#tipo_cuenta").data("kendoDropDownList");
        // var persa = $("#pers_autorizada").data("kendoDropDownList");
        var form_data = new FormData();
        form_data.append('id_autorizacion', $("#id_autorizacion").val());
        form_data.append("file", file_data);

            $.ajax({             
                   type: 'post',
                   url: 'index.php?opcion=admAutorizacionPrevia&tarea=guardaDeatallex',
                    contentType: false,
                    processData: false,
                   data: form_data,
                   success: function (data) {
                   
                     if(data == 2)
                     {
                        alert("Formato de documento invalido, o no se subio la plantilla Excel");
                        $("#aceptar").data("kendoButton").enable(true);
                     } else {
                        $("#aceptarex").data("kendoButton").enable(true);
                        $("#rechazarr").data("kendoButton").enable(true);
                        $("#cancelarr").data("kendoButton").enable(true);
                        cerraractualizartab('10'+$("#id_autorizacion").val(),'admAutorizacionPrevia','revisa&id_autorizacion='+$("#id_autorizacion").val());
                     }
                     

                   }
               });
    });

</script>
