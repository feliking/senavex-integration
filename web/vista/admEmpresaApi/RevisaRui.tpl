<div class="row-fluid fadein"  id="asignacionrui{$id}" >
    <div class="k-block">
        <div class="k-header">
            <div class="titulonegro">Revisión de RUI</div> 
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
                        {$unipersonal} 
                    </div>  

            </fieldset>
            <fieldset >
                <legend>2. UBICACIÓN GEOGRÁFICA</legend>
                <div class="row-fluid " >
                    {assign var="direccionRevision" value=$direccionRevision}
                    {assign var="ds_id" value=$empresaRevision->id_direccion}
                    {include file="admDireccion/Direccion_Show.tpl" }
                </div>   
            </fieldset>
            <fieldset >
                <legend>3. INFORMACIÓN DEL PROPIETARIO O REPRESENTANTE LEGAL</legend>
                
                <div class="row-fluid " >
                    <div class="span3 " >
                        Pais
                    </div>     
                    <div class="span3 campo" >
                        {$paisr->nombre}
                    </div> 
                    <div class="span3" >
                        Tipo de Documento de Identidad
                    </div>     
                    <div class="span3 campo" >
                        {$tipodocr->descripcion} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Numero de Documento de Identidad
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRRLL->numero_documento}
                    </div> 
                    <div class="span3" >
                        Expedido
                    </div>     
                    <div class="span3 campo" >
                        {$expedidor->sigla} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Nombres
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRRLL->nombres}
                    </div> 
                    <div class="span3" >
                        Primer Apellido
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRRLL->paterno} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Segundo Apellido
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRRLL->materno}
                    </div> 
                    <div class="span3" >
                        Correo Electronico
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRRLL->email} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Testimonio o Poder
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRevision->testimonio_poder_representante}
                    </div> 
                    <div class="span3" >
                        Fecha de Vecimiento de su Carnet de Identidad
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRRLL->vencimiento_documento} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Sexo
                    </div>     
                    <div class="span3 campo" >
                        {$generor}
                    </div> 
                      
                </div>
                <div class="row-fluid " >
                    {assign var="direccionRRLL" value=$empresaRRLL}
                    {assign var="ds_id" value=$empresaRRLL->direccion}
                    {include file="admDireccion/Direccion_Show.tpl" }
                </div>  
            </fieldset>
            <fieldset >
                <legend>4. INFORMACION DEL APODERADO</legend>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Pais
                    </div>     
                    <div class="span3 campo" >
                        {$paisa->nombre}
                    </div> 
                    <div class="span3" >
                        Tipo de Documento de Identidad
                    </div>     
                    <div class="span3 campo" >
                        {$tipodoca->descripcion} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Numero de Documento de Identidad
                    </div>     
                    <div class="span3 campo" >
                        {$empresaApoderado->numero_documento}
                    </div> 
                    <div class="span3" >
                        Expedido
                    </div>     
                    <div class="span3 campo" >
                        {$expedidoa->sigla}  
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Nombres
                    </div>     
                    <div class="span3 campo" >
                        {$empresaApoderado->nombres}
                    </div> 
                    <div class="span3" >
                        Primer Apellido
                    </div>     
                    <div class="span3 campo" >
                        {$empresaApoderado->paterno} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Segundo Apellido
                    </div>     
                    <div class="span3 campo" >
                        {$empresaApoderado->materno}
                    </div> 
                    <div class="span3" >
                        Correo Electronico
                    </div>     
                    <div class="span3 campo" >
                        {$empresaApoderado->email} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Testimonio o Poder
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRevision->testimonio_poder_apoderado}
                    </div> 
                    <div class="span3" >
                        Fecha de Vecimiento de su Carnet de Identidad
                    </div>     
                    <div class="span3 campo" >
                        {$empresaApoderado->vencimiento_documento} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Sexo
                    </div>     
                    <div class="span3 campo" >
                        {$generoa}
                    </div> 
                    <div class="span3" >
                        Fecha de Vecimiento de su Testimonio o Poder
                    </div>     
                    <div class="span3 campo" >
                        {$empresaRevision->vencimiento_poder_apoderado} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    {assign var="direccionApoderado" value=$empresaApoderado}
                    {assign var="ds_id" value=$empresaApoderado->direccion}
                    {include file="admDireccion/Direccion_Show.tpl" }
                </div>
                <div class="row-fluid " >
                    <div class="span2 " >
                    </div>
                    <div class="span4 " > 
                        <div class="span1 " >
                            <div class="menucf">RUI
                                <a href='index.php?opcion=ImpresionCertificadoRui&tarea=ImpresionCertificadoRui&id_empresa={$empresaRevision->id_empresa_importador}' target='_blank'><img src="styles/img/imp_b.png"   class="menubottom ayuda"></a>
                                <a href='index.php?opcion=ImpresionCertificadoRui&tarea=ImpresionCertificadoRui&id_empresa={$empresaRevision->id_empresa_importador}' target='_blank'><img src="styles/img/imp.png"    class="menutop ayuda"></a>
                            </div>
                        </div>
                    </div>
                    <div class="span2 " >
                    </div>
                    <div class="span3" >
                        <input id="cancelarrui{$id}" type="{if $revisar=='2'}hidden{else}button{/if}" value="Volver" class="k-primary" style="width:100%"/> <br><br>
                    </div>


                </div>    
            </fieldset>    
        </div>
        <div class="row-fluid form" >
            <div class="barra" >                                         
            </div> 
        </div>
    </div>    
</div>
<script>
    var editorr = $("#editorr_soporte").kendoEditor({
        tools: []
        }).data("kendoEditor"); 
    $("#cancelarrui").kendoButton();
    var cancelar = $("#cancelarrui").data("kendoButton");
 
    cancelar.bind("click", function(e){    
           cerraractualizartab('Revisión API','admRegistroApi','revisionApi');
           
        }); 
</script>
