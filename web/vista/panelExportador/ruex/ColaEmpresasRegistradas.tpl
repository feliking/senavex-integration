{assign var="id" value=$empresa_temporal->id_empresa}  
<div class="row-fluid "  id="revisarempresatemporal{$id}" >
    <div class="span12" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="row-fluid  form" >
                    <div class="span12" >
                        <div class="titulonegro" > {$empresa_temporal->razon_social}</div>  
                    </div>                                      
                </div>  
            </div>
            <div class="row-fluid ">
                <div class="span2 parametro" >
                    Nombre o Razon Social:
                </div>     
                <div class="span10 campo" >
                    {$empresa_temporal->razon_social} 
                </div>  
            </div>
            <div class="row-fluid " >
                <div class="span2 parametro" >
                    Nombre Comercial:
                </div>     
                <div class="span10 campo" >
                    {$empresa_temporal->nombre_comercial} 
                </div>
            </div>
            <div class="row-fluid " >              
                <div class="span2 parametro" >
                    NIT:
                </div>     
                <div class="span4 campo" >
                    {$empresa_temporal->nit}
                </div> 
                <div class="span2 parametro" >
                    Codigo NIT:
                </div>     
                <div class="span4 campo" >
                    {$empresa_temporal->certificacionnit}
                </div> 
            </div>
            {if $empresa_temporal->matricula_fundempresa or $empresa_temporal->menor_cuantia=="1" or $empresa_temporal->oea or $empresa_temporal->frecuente!='1'}
            <div class="row-fluid " >
                {if $empresa_temporal->matricula_fundempresa}
                    <div class="span2 parametro" >
                        Nro. FundEmpresa:
                    </div>     
                    <div class="span2 campo" >
                       {$empresa_temporal->matricula_fundempresa}
                    </div> 
                {/if}

                {if $empresa_temporal->oea}
                        <div class="span4" >
                            <b>OPERADOR ECON&Oacute;MICO AUTORIZADO</b>
                        </div>  
                {/if}   
                {if $empresa_temporal->menor_cuantia=="1"}
                        <div class="span4" >
                           <b>Empresa registrada de menor cuantia.</b>
                        </div>  
                {/if}  
                {if $empresa_temporal->frecuente!="1"}
                            <!--div class="span4" >
                               <b>Exportador no habitual.</b>
                            </div-->  
                {/if} 
            </div>
            {/if}
            {if $empresa_temporal->ruex}
            <div class="row-fluid  form" >
                <div class="span2 parametro" >
                   Ruex:
                </div>     
                <div class="span2 campo" >
                     {$empresa_temporal->ruex}
                </div>  
                <div class="span2 parametro" >
                    Vigencia:
                </div>     
                <div class="span2 campo" >
                   {$empresa_temporal->vigencia}                   
                </div> 
                <div class="span2 parametro" >
                    Fecha Vigencia:
                </div>     
                <div class="span2 campo" >
                  {$empresa_temporal->fecha_renovacion_ruex}
                </div> 
            </div>
            {/if}
            <div class="row-fluid  form" >
                <div class="span2 parametro" >
                   Categoria:
                </div>     
                <div class="span2 campo" >
                     {$empresa_temporal->idcategoria_empresa}
                </div>   
                <div class="span2 parametro" >
                    Actividad Economica:
                </div>     
                <div class="span2 campo" >
                  {$empresa_temporal->idactividad_economica}
                </div> 
                 {if $empresa_temporal->idtipo_empresa}      
                    <div class="span2 parametro" >
                        Tipo de Empresa:
                    </div>     
                    <div class="span2 campo" >
                       {$empresa_temporal->idtipo_empresa}                   
                    </div> 
                {/if}
            </div>
            <div class="row-fluid form" >
                <div class="barra" >                                         
                </div> 
            </div>
            <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                       Año de Fundacion:
                    </div>     
                    <div class="span1 campo" >
                         {$empresa_temporal->date_fundacion}
                    </div> 
                    <div class="span2 parametro" >
                       Año de inicio de Operaciones:
                    </div>     
                    <div class="span1 campo" >
                         {$empresa_temporal->date_inicio_operaciones}
                    </div> 
                    <div class="span2 parametro" >
                       longitud(coordenadas):
                    </div>     
                    <div class="span1 campo" >
                         {$empresa_temporal->coordenada_long}
                    </div> 
                    <div class="span2 parametro" >
                       longitud(coordenadas):
                    </div>     
                    <div class="span1 campo" >
                         {$empresa_temporal->coordenada_long}
                    </div> 
                </div> 
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                      Descripcion de la Empresa
                    </div>     
                    <div class="span10 campo" >
                         {$empresa_temporal->descripcion_empresa}
                    </div> 
                </div>   
            <div class="row-fluid form" >
                   <div class="span2 parametro" >
                            Afiliaciones:
                    </div>     
                    <div class="span10" >
                        <input type="hidden" name="afiliaciones_values" id="afiliaciones_values" value="{$afiliaciones_val}" />
                        <input style="width:100%;" id="afiliaciones" name="afiliaciones">
                    </div> 
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
                  {$empresa_temporal->iddepartamento_procedencia}
                </div>
               
                <div class="span2 parametro" >
                    <b>Municipio:</b>
                </div>     
                <div class="span2 campo" >
                    {$municipio}
                </div>
                 <div class="span2 parametro" >
                    <b>Ciudad:</b>
                </div>     
                <div class="span2 campo" >
                    {$ciudad}
                </div>
            </div>
            <div class="row-fluid  form" >

                <div class="span2 parametro" >
                    <b> Domicilio Fiscal:</b>
                 </div>     
                 <div class="span6 campo" >
                    {$empresa_temporal->direccionfiscal}
                 </div> 
                {*<div class="span2 parametro" >
                    <b>Domicilio Legal:</b>
                </div>     
                <div class="span2 campo" >
                   {$empresa_temporal->direccion}
                </div>*}
                <div class="span1 parametro" >
                    <b>correo Electronico:</b>
                </div>     
                <div class="span3 campo" >
                    {$empresa_temporal->email}
                </div> 
            </div>
            {if $empresa_temporal->pagina_web or $empresa_temporal->fax}
            <div class="row-fluid  form" >                    
                {if $empresa_temporal->pagina_web}
                        <div class="span2 parametro" >
                          <b>Pagina:</b>
                        </div>     
                        <div class="span4 campo" >
                            {$empresa_temporal->pagina_web}
                        </div>  
                {/if} 
                {if $empresa_temporal->fax}
                <div class="span1 parametro" >
                    <b> Fax:</b>
                </div>     
                <div class="span3 campo" >
                    {$empresa_temporal->fax}
                </div>    
                <div class="span2 parametro" >
                   <b> Numero de Contacto:</b>
                </div>     
                <div class="span2 campo" >
                   {$empresa_temporal->numero_contacto}
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
                   {$empresa_temporal->idrubro_exportaciones}
                </div>  
            </div>
            {if $ico->ico}
                <div class="row-fluid  form" >
                    <div class="span3 parametro" >
                        <b>Numero ICO:</b>
                    </div>     
                    <div class="span9 campo" >
                        {$ico->ico}
                    </div>  
                </div>
            {/if}  
            {if $empresa_temporal->nim}
                <div class="row-fluid  form" >
                    <div class="span3 parametro" >
                        <b>Numero de Identificación Minera:</b>
                    </div>     
                    <div class="span9 campo" >
                        {$empresa_temporal->nim}
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
                <div class="row-fluid" >
                    <div class="span2 parametro" >
                      Nombre:
                    </div>     
                    <div class="span4 campo" >
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
                </div> 
            {/foreach}
            {/if}
            <div class="row-fluid form" >
                <div class="barra" >                                         
                </div> 
            </div>   
            <div class="row-fluid  form" >
                    <div class="span12 parametro" style="text-align: left;" >
                       Escriba las Observaciones que tiene al registro de la empresa "{$empresa_temporal->razon_social}", las cuales se les notificaran mediante correo.
                    </div> 
            </div>       
                <div class="row-fluid  form" >
                    <div class="span12 " > 
                         <textarea id="editor{$id}"  >
                        </textarea> 
                    </div>
                </div>
                <div class="row-fluid" id="notificacionobservacion{$id}">
                    <div class="span4 " >
                    </div>
                     <div class="span4 " > 
                         <div  class="k-widget k-tooltip-validation">Por favor Ingrese sus observaciones.</div>
                    </div> 
                    <div class="span4 " > 
                    </div>
                </div>
                <div class="row-fluid  form" >
                    <div class="span3" >
                    </div>
                    <div class="span3" >
                    <input id="observar{$id}" type="button" value="Observar" class="k-primary" style="width:100%"/> <br><br>
                    </div>
                    <div class="span3" >
                    <input id="admitir{$id}" type="button"  value="Admitir" class="k-primary" style="width:100%"/> 
                    </div>
                    <div class="span2" >
                    </div>
                    <div class="span1 " >
                            <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('revisarRegistroEmpresa')" style="max-width:35px;" class="ayuda">
                     </div>
                </div>
        </div>
    </div>
</div> 
{include file="avisos/firmaDigital.tpl"}
<script>    
    ocultar('notificacionobservacion{$id}');
    var validator{$id} = $("#observaciones{$id}").kendoValidator({}).data("kendoValidator");
   
        var editor{$id} = $("#editor{$id}").kendoEditor({
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
        
   
    $("#observar{$id}").kendoButton();
    $("#admitir{$id}").kendoButton();
    var observar{$id} = $("#observar{$id}").data("kendoButton");
    var admitir{$id} = $("#admitir{$id}").data("kendoButton");
    
    observar{$id}.bind("click", function(e){   
        if(editor{$id}.value().length<3)
        { mostrar('notificacionobservacion{$id}');
        }
        else
        { 
            cambiar('revisarempresatemporal{$id}','firmadigital{$id}'); 
            generarPin('{$id_empresa}','{$id_persona}','21'); 
            cambiarRedaccionFirma{$id}(21,'de Observaci&oacute;n de Empresa','inhabilito a la empresa para admisi&oacute;n');  
        }
    }); 
    admitir{$id}.bind("click", function(e){   
        cambiar('revisarempresatemporal{$id}','firmadigital{$id}'); 
        generarPin('{$id_empresa}','{$id_persona}','17');  
        cambiarRedaccionFirma{$id}(17,'de Admisi&oacute;n de Empresa','habilito a la empresa para admisi&oacute;n'); 
    });       
 
</script>
<script>
   
    $("#afiliaciones").kendoMultiSelect({
        placeholder:"Afiliaciones",
        dataTextField: "descripcion",
        dataValueField: "id_empresa_afiliacion",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admEmpresaTemporal&tarea=listarAfiliaciones"
                }
            }
        },
    });
   
    var multiSelect = $("#afiliaciones").data("kendoMultiSelect"),
            setValue = function(e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.dataSource.filter({}); //clear applied filter before setting value

                    multiSelect.value($("#afiliaciones_values").val().split(","));
                }
            },
            setSearch = function (e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.search($("#word").val());
                }
            };
    multiSelect.enable(false);
    this.onload(setValue($('#afiliaciones_values').val()));
    
</script>    