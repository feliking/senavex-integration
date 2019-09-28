{assign var="id" value="m"|cat:$empresa->id_empresa}  
<div class="row-fluid "  id="revisarempresatemporal{$id}" >
    <div class="span12" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="row-fluid  form" >
                    <div class="span12" >
                        <div class="titulonegro" > {$empresa->razon_social} - RUEX:{$empresa->ruex} </div>  
                    </div>                                      
                </div>  
            </div>
            <div class="row-fluid ">
                <div class="span2 parametro " >
                    Razon Social:
                </div>     
                <div class="span10 campo {if in_array('1',$modificaciones)}modificacion{/if}" >
                    {$empresa->razon_social} 
                </div>  
            </div>
            <div class="row-fluid " >
                <div class="span2 parametro" >
                    Nombre Comercial:
                </div>     
                <div class="span10 campo {if in_array('2',$modificaciones)}modificacion{/if}" >
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
            {if $empresa->matricula_fundempresa or $empresa->menor_cuantia==1 or $empresa->oea or $empresa->frecuente!=1 or in_array('13',$modificaciones)}
            <div class="row-fluid " >
                {if $empresa->matricula_fundempresa}
                    <div class="span2 parametro" >
                        Nro. FundaEmpresa:
                    </div>     
                    <div class="span2 campo {if in_array('12',$modificaciones)}modificacion{/if}" >
                       {$empresa->matricula_fundempresa}
                    </div> 
                {/if}

                {if $empresa->oea}
                        <div class="span4 {if in_array('6',$modificaciones)}modificacion{/if}" >
                            <b>OPERADOR ECON&Oacute;MICO AUTORIZADO</b>
                        </div>  
                {/if}   
                {if $empresa->menor_cuantia==1}
                        <div class="span4" >
                           <b>Empresa registrada de menor cuantia.</b>
                        </div>  
                {/if}  
                {if $empresa->frecuente!=1}
                        <div class="span4  {if in_array('13',$modificaciones)}modificacion{/if}" >
                            <b>Exportador no habitual.</b>
                         </div> 
                {elseif in_array('13',$modificaciones)}
                     <div class="span4  modificacion" >
                        <b>Exportador habitual.</b>
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
                <div class="span2 {if in_array('3',$modificaciones)}modificacion{/if}" >
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
                    <div class="span2 campo {if in_array('4',$modificaciones)}modificacion{/if}" >
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
                 <div class="span6 campo {if in_array('5',$modificaciones)}modificacion{/if}" >
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
            {if $empresa->pagina_web or $empresa->fax}
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
                <div class="span9 campo {if in_array('8',$modificaciones)}modificacion{/if}" >
                   {$empresa->idrubro_exportaciones}
                </div>  
            </div>
            {if $ico}
                <div class="row-fluid  form" >
                    <div class="span3 parametro" >
                        <b>Numero ICO:</b>
                    </div>     
                    <div class="span9 campo {if in_array('9',$modificaciones)}modificacion{/if}" >
                        {$ico}
                    </div>  
                </div>
            {/if}
            {if $empresa->nim}
                <div class="row-fluid  form" >
                    <div class="span3 parametro" >
                        <b>Número de Identificación Minera:</b>
                    </div>     
                    <div class="span9 campo {if in_array('10',$modificaciones)}modificacion{/if}" >
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
                <div class="row-fluid {if $persona.id_persona==$empresa->id_representante_legal && in_array('11',$modificaciones)}modificacion{/if}" >
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
                    <div class="span2 campo" >
                        {$persona.perfil} 
                    </div>  
                    {if $persona.id_persona==$empresa->id_representante_legal} 
                    <div class="span2" >
                        <b>RESPONSABLE</b>
                    </div>  
                    {/if}
                </div> 
            {/foreach}
            {/if}
            <div class="row-fluid form" >
                <div class="barra" >                                         
                </div> 
            </div> 
            {if $modificacionempresarelevancia->renovacion}
            <div class="row-fluid  form" >
                <div class="span12 parametro"  style="text-align: left;" >
                    <b>La Empresa Solicita la Renovacion de su Ruex.</b>
                </div>  
            </div>    
            {/if}
            <div class="row-fluid form" >
                <div class="barra" >                                         
                </div> 
            </div>     
            <div class="row-fluid  form" >
                    <div class="span12 parametro" style="text-align: left;" >
                       Escriba las Observaciones que tiene para la modificacionde datos de la empresa "{$empresa->razon_social}", las cuales se les notificaran mediante correo.
                    </div> 
            </div>       
            <div class="row-fluid  form" >
                <div class="span12 " > 
                     <textarea id="editorobservaciones{$id}"  >
                    </textarea> 
                </div>
            </div>
            <div class="row-fluid" id="notificacionobservacioncambio{$id}">
                <div class="span4 " >
                </div>
                 <div class="span4 " > 
                     <div  class="k-widget k-tooltip-validation">Por favor Ingrese sus observaciones.</div>
                </div> 
                <div class="span4 " > 
                </div>
            </div>
            <div class="row-fluid  form" >
                <div class="span4" >
                </div>
                <div class="span2" >
                <input id="observarmodif{$id}" type="button" value="Observar" class="k-primary" style="width:100%"/> <br><br>
                </div>
                <div class="span2" >
                <input id="admitirmodif{$id}" type="button"  value="Admitir" class="k-primary" style="width:100%"/> 
                </div>
                <div class="span3" >
                </div>
                <div class="span1 " >
                    <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('ayudaRespuestaModificacion')" style="max-width:35px;" class="ayuda">
                </div>
            </div> 
        </div>
    </div>
</div>   
{include file="avisos/firmaDigital.tpl"}  
<script>
ocultar('notificacionobservacioncambio{$id}');
var editorobservaciones{$id} = $("#editorobservaciones{$id}").kendoEditor({
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
                "fontSize",
                "insertHtml"            
            ],
    insertHtml: [
       {* text: "Estimado/a", value: "<p>Estimado/a,<br /> {$usuario_temporal->nombres}<br /></p>" *}
       { text: "Firma", value: "<p>Atentamente,<br /> {$nombre},<br /><a href='mailto:{$email}'>{$email}</a></p>" },
       { text: "Senavex", value: "<br /> <a href='http://www.senavex.gob.bo'>Servicio Nacional de Verificación de Exportaciones</a> " }
            ]
}).data("kendoEditor");
$("#observarmodif{$id}").kendoButton();
$("#admitirmodif{$id}").kendoButton();
var observarmodif{$id} = $("#observarmodif{$id}").data("kendoButton");
var admitirmodif{$id} = $("#admitirmodif{$id}").data("kendoButton");
observarmodif{$id}.bind("click", function(e){   
    if(editorobservaciones{$id}.value().length<3)
    { mostrar('notificacionobservacioncambio{$id}');
    }
    else
    { 
        cambiar('revisarempresatemporal{$id}','firmadigital{$id}');
        generarPin('{$id_empresa}','{$id_persona}','22');
        cambiarRedaccionFirma{$id}(22,'de Rechazo modificaci&oacute;n de Empresa','rechazo la modificaci&oacute;n la empresa.'); 
    }
}); 
admitirmodif{$id}.bind("click", function(e){   
    cambiar('revisarempresatemporal{$id}','firmadigital{$id}');
    generarPin('{$id_empresa}','{$id_persona}','2');
    cambiarRedaccionFirma{$id}(2,'de modificaci&oacute;n de Empresa','habilito la modificaci&oacute;n la empresa.'); 
}); 
</script>
                        
          
       