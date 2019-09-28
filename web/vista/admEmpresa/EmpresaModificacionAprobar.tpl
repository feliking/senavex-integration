{assign var="id" value="mv"|cat:$empresa->id_empresa}  

<div class="row-fluid  form" >
    <div class="row-fluid "  id="revisarempresatemporalaprobaciondatos{$id}" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > {$empresa->razon_social}</div>  
                        </div>                                      
                    </div>  
                </div>
               <div class="row-fluid ">
                    <div class="span2 parametro" >
                        Razon Social:
                    </div>     
                    <div class="span10 campo" >
                        {$empresa->razon_social} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        Nombre Comercial:
                    </div>     
                    <div class="span10 campo" >
                        {$empresa->nombre_comercial} 
                    </div>
                </div>
                <div class="row-fluid " >              
                    <div class="span2 parametro" >
                        Nit:
                    </div>     
                    <div class="span4 campo" >
                        {$empresa->nit}
                    </div> 
                    <div class="span2 parametro" >
                        Codigo Nit:
                    </div>     
                    <div class="span4 campo" >
                        {$empresa->certificacionnit}
                    </div> 
                </div>
                {if $empresa->matricula_fundempresa or $empresa->menor_cuantia=="1" or $empresa->oea or $empresa->frecuente!='1'}
                <div class="row-fluid " >
                    {if $empresa->matricula_fundempresa}
                        <div class="span2 parametro" >
                            Nro. FundaEmpresa:
                        </div>     
                        <div class="span2 campo" >
                           {$empresa->matricula_fundempresa}
                        </div> 
                    {/if}
                    
                    {if $empresa->oea}
                            <div class="span4" >
                                <b>OPERADOR ECON&Oacute;MICO AUTORIZADO</b>
                            </div>  
                    {/if}   
                    {if $empresa->menor_cuantia=="1"}
                            <div class="span4" >
                               <b>Empresa registrada de menor cuantia.</b>
                            </div>  
                    {/if}  
                    {if $empresa->frecuente!="1"}
                            <div class="span4" >
                               <b>Exportador no habitual.</b>
                            </div>  
                    {/if} 
                </div>
                {/if}
                <div class="row-fluid  form" >
                    {if $empresa->renovacion}
                    <div class="span2 parametro" >
                       Ruex:
                    </div>     
                    <div class="span2 campo" >
                        {$empresa->ruex}
                    </div>  
                    <div class="span1 parametro" >
                        Vigencia:
                    </div>     
                    <div class="span1 campo" >
                       {$empresa->vigencia}                   
                    </div> 
                    <div class="span2 parametro" >
                        Fecha Vigencia:
                    </div>     
                    <div class="span1 campo" >
                      {$empresa->fecha_renovacion_ruex}
                    </div> 
                    <div class="span2" >
                        <b>Renovaci&oacute;n de RUEX</b>
                    </div>
                    {else}
                    <div class="span2 parametro" >
                       Ruex:
                    </div>     
                    <div class="span2 campo" >
                        {$empresa->ruex}
                    </div>  
                    <div class="span2 parametro" >
                        Vigencia:
                    </div>     
                    <div class="span2 campo" >
                       {$empresa->vigencia}                   
                    </div> 
                    <div class="span2 parametro" >
                        Fecha Vigencia:
                    </div>     
                    <div class="span2 campo" >
                      {$empresa->fecha_renovacion_ruex}
                    </div> 
                    {/if}
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                       Categoria:
                    </div>     
                    <div class="span2 campo" >
                         {$empresa->idcategoria_empresa}
                    </div>                      
                    <div class="span2 parametro" >
                        Actividad Economica:
                    </div>     
                    <div class="span2 campo" >
                      {$empresa->idactividad_economica}
                    </div> 
                    {if $empresa->idtipo_empresa}      
                        <div class="span2 parametro" >
                            Tipo de Empresa:
                        </div>     
                        <div class="span2 campo" >
                           {$empresa->idtipo_empresa}                   
                        </div> 
                    {/if}
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                        <b>Departamento:</b>
                    </div>     
                    <div class="span2 campo" >
                      {$empresa->iddepartamento_procedencia}
                    </div>
                    <div class="span2 parametro" >
                        <b>Ciudad:</b>
                    </div>     
                    <div class="span2 campo" >
                        {$empresa->ciudad}
                    </div>
                    <div class="span2 parametro" >
                       <b> Numero de Contacto:</b>
                    </div>     
                    <div class="span2 campo" >
                       {$empresa->numero_contacto}
                    </div> 
                                      
                </div>
                <div class="row-fluid  form" >
                    
                    <div class="span2 parametro" >
                        <b> Domicilio Fiscal:</b>
                     </div>     
                     <div class="span6 campo" >
                        {$empresa->direccionfiscal}
                     </div> 
                    {*<div class="span2 parametro" >
                        <b>Domicilio Legal:</b>
                    </div>     
                    <div class="span2 campo" >
                       {$empresa_temporal->direccion}
                    </div>*}
                    <div class="span1 parametro" >
                        <b>Email:</b>
                    </div>     
                    <div class="span3 campo" >
                        {$empresa->email}
                    </div> 
                </div>
                {if $empresa->pagina_web or $empresa_temporal->fax}
                <div class="row-fluid  form" >                    
                    {if $empresa->pagina_web}
                            <div class="span2 parametro" >
                              <b>Pagina:</b>
                            </div>     
                            <div class="span4 campo" >
                                {$empresa->pagina_web}
                            </div>  
                    {/if} 
                    {if $empresa->fax}
                    <div class="span1 parametro" >
                        <b> Fax:</b>
                    </div>     
                    <div class="span3 campo" >
                        {$empresa->fax}
                    </div>    
                    {/if}
                </div>
                {/if}
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>      
                <div class="row-fluid  form" >
                    <div class="span3 parametro" >
                        <b>Rubro de Exportaciones:</b>
                    </div>     
                    <div class="span9 campo" >
                       {$empresa->idrubro_exportaciones}
                    </div>  
                </div>
                {if $ico}
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            <b>Numero ICO:</b>
                        </div>     
                        <div class="span9 campo" >
                            {$ico}
                        </div>  
                    </div>
                {/if}
                {if $empresa->nim}
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            <b>Número de Identificación Minera:</b>
                        </div>     
                        <div class="span9 campo" >
                            {$empresa->nim}
                        </div>  
                    </div>
                {/if}  
                {if $personal|@count!=0}
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid" >
                    <div class="span12 parametro" >
                        <center>Personal de la Empresa</center>
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                {foreach from=$personal item=persona}
                    
                    <div class="row-fluid" {if $persona.id_persona==$empresa->id_representante_legal}style="background-color: #e6e6e6;border-radius: 7px;padding-top: 5px;" {/if}>
                        <div class="span1 parametro" >
                          Nombre:
                        </div>     
                        <div class="span3 campo" >
                            {$persona.nombres} 
                        </div>  
                        <div class="span1 parametro" >
                          Documento:
                        </div>     
                        <div class="span2 campo" >
                            {$persona.numero_documento} 
                        </div>  
                        <div class="span1 parametro" >
                          Perfil:
                        </div>     
                        <div class="span3 campo" >
                            {$persona.perfil}{if $persona.id_persona==$empresa_temporal->id_representante_legal} RESPONSABLE {/if}
                        </div> 
                        <div class="span1" >
                         {if $persona.id_perfil=='3' or $persona.id_perfil=='4' or $persona.id_perfil=='12'}
                             <a href='index.php?opcion=impresionFirmaRuex&tredrt={$persona.id_persona}&sdfercw={$empresa->id_empresa}' target='_blank'>
                             <input type="button" value="Firmar" class="k-button" style="width:100%;height:20px; font-size: 12px;padding-top:0px;margin-top:0px;"/>
                             </a>
                         {/if}
                        </div>
                    </div>                    
                {/foreach}
                {/if}    
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>     
                <div class="row-fluid  form" >
                        <div class="span12 parametro" style="text-align: left;" >
                           Escriba los motivos por los que rechaza a la empresa "{$empresa->razon_social}".
                        </div> 
                </div>       
                <div class="row-fluid  form" >
                    <div class="span12 " > 
                         <textarea id="editorobservacionesr{$id}"  >
                        </textarea> 
                    </div>
                </div>
                <div class="row-fluid" id="notificacionobservacioncambior{$id}">
                    <div class="span4 " >
                    </div>
                     <div class="span4 " > 
                         <div  class="k-widget k-tooltip-validation">Por favor Ingrese sus observaciones.</div>
                    </div> 
                    <div class="span4 " > 
                    </div>
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>   
                <div class="row-fluid  form" >
                    <div class="span4" >
                    </div>
                    <div class="span2" >
                    <input id="rechazardocaprobacion{$id}" type="button" value="Rechazar" class="k-primary" style="width:100%"/> <br><br>
                    </div>
                    <div class="span2" >
                    <input id="validardocvalidacion{$id}" type="button"  value="Validar" class="k-primary" style="width:100%"/> 
                    </div>
                    <div class="span3" >
                    </div>
                    <div class="span1 " >
                    <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('validacionModificacion')" style="max-width:35px;" class="ayuda">
                    </div>
                </div> 
            </div>
        </div>
    </div>             
</div>  
{include file="avisos/firmaDigital.tpl"}  
<script>
ocultar('notificacionobservacioncambior{$id}');
var editorobservacionesr{$id} = $("#editorobservacionesr{$id}").kendoEditor({
    tools: [
                "bold",
                "italic",
                "underline",
                "justifyLeft",
                "justifyCenter",
                "justifyRight",
                "justifyFull",
                "insertUnorderedList",
                "insertOrderedList",
                "formatting",
                "fontName",
                "fontSize"          
            ]
}).data("kendoEditor");
// esto e3s para los botones------------
$("#rechazardocaprobacion{$id}").kendoButton();
$("#validardocvalidacion{$id}").kendoButton();
var rechazardocaprobacion{$id}= $("#rechazardocaprobacion{$id}").data("kendoButton");
var validardocvalidacion{$id} = $("#validardocvalidacion{$id}").data("kendoButton");
rechazardocaprobacion{$id}.bind("click", function(e){   
    if(editorobservacionesr{$id}.value().length<3)
    { mostrar('notificacionobservacioncambior{$id}');
    }
    else
    { 
        cambiar('revisarempresatemporalaprobaciondatos{$id}','firmadigital{$id}');
        generarPin('{$id_empresa}','{$id_persona}','23');
        cambiarRedaccionFirma{$id}(23,'de Rechazo modificaci&oacute;n de Empresa','rechazo la modificaci&oacute;n la empresa.'); 
    }
});
validardocvalidacion{$id}.bind("click", function(e){  
    
     cambiar('revisarempresatemporalaprobaciondatos{$id}','firmadigital{$id}');
    generarPin('{$id_empresa}','{$id_persona}','3');
    cambiarRedaccionFirma{$id}(3,'de modificaci&oacute;n de Empresa','habilito la modificaci&oacute;n la empresa.'); 
});



</script>
           
       