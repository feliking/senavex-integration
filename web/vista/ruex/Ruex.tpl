<div class="row-fluid  form" >
    <div class="row-fluid "  id="revisarempresatemporal" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > {$empresa->razon_social} - RUEX:{$empresa->ruex}</div>  
                        </div>                                      
                    </div>  
                </div>
               <div class="row-fluid " >
                    <div class="span2 parametro" >
                        Nombre o Razon Social:
                    </div>     
                    <div class="span5 campo" >
                        {$empresa->razon_social} 
                    </div>  
                    <div class="span2 parametro" >
                        NIT:
                    </div>     
                    <div class="span2 campo" >
                        {$empresa->nit}
                    </div> 
                </div>
                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        Nombre Comercial:
                    </div>     
                    <div class="span5 campo" >
                        {$empresa->nombre_comercial} 
                    </div>
                    <div class="span2 parametro" >
                        Codigo de certif. de NIT
                    </div>     
                    <div class="span2 campo" >
                        {$empresa->certificacionnit}
                    </div> 
                </div>
                <div class="row-fluid " >
                    <div class="span7 hidden-phone" ></div>
                    {if $empresa->matricula_fundempresa}
                        <div class="span2 parametro" >
                            Nro. FundEmpresa:
                        </div>     
                        <div class="span2 campo" >
                           {$empresa->matricula_fundempresa}
                        </div> 
                    {/if}
                    
                </div>
              {if $empresa->matricula_fundempresa or $empresa->menor_cuantia==1 or $empresa->oea or $empresa->frecuente!=1}
                <div class="row-fluid " >
                    <div class="span2 hidden-phone" ></div>
                    {if $empresa->oea}
                        <div class="span3" >
                            <b>OPERADOR ECON&Oacute;MICO AUTORIZADO {$empresa->oea}</b>
                        </div>
                    {/if}
                    {if $empresa->menor_cuantia=="1"}
                        <div class="span3" >
                            <b>Empresa registrada de menor cuantia.</b>
                        </div>
                    {/if}
                    {if $empresa->frecuente!="1"}  
                        <!--div class="span3" >
                            <b>Exportador no habitual.</b>
                        </div-->  
                    {/if} 
                </div>
                {/if}
                {if $empresa->ruex}
                <div class="row-fluid  form " >
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
                      {$empresa->fecha_renovacion_ruex} {if $empresa->estado==10}<span class='letrarelevanteroja'>Vencido</span>{/if} 
                    </div> 
                </div>
                {/if}   
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
                    <div class="span1 hidden-phone" ></div>
                    <div class="span3 parametro" >
                       Año de Fundacion:
                    </div>     
                    <div class="span2 campo" >
                         {$empresa->date_fundacion}
                    </div> 
                    <div class="span2 parametro" >
                       latitud(coordenadas):
                    </div>     
                    <div class="span2 campo" >
                         {$empresa->coordenada_lat}
                    </div> 
                </div> 
                <div class="row-fluid  form" >
                    <div class="span1 hidden-phone" ></div>
                    <div class="span3 parametro" >
                       Año de inicio de Operaciones:
                    </div>     
                    <div class="span2 campo" >
                         {$empresa->date_inicio_operaciones}
                    </div> 
                    
                    <div class="span2 parametro" >
                       longitud(coordenadas):
                    </div>     
                    <div class="span2 campo" >
                         {$empresa->coordenada_long}
                    </div> 
                </div> 
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                      Descripcion de la Empresa
                    </div>     
                    <div class="span9 campo" >
                         {$empresa->descripcion_empresa}
                    </div> 
                </div>   
                <div class="row-fluid form" >
                   <div class="span2 parametro" >
                            Afiliaciones:
                    </div>     
                    <div class="span9" >
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
                      {$empresa->iddepartamento_procedencia}
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
                     <div class="span8 campo" >
                        {$empresa->direccionfiscal}
                     </div> 
                    {*<div class="span2 parametro" >
                        <b>Domicilio Legal:</b>
                    </div>     
                    <div class="span2 campo" >
                       {$empresa_temporal->direccion}
                    </div>*}
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                       <b> Telf/Cel de Contacto:</b>
                    </div>     
                    <div class="span2 campo" >
                       {$empresa->numero_contacto}
                    </div> 
                                      
               
                    <div class="span2 parametro" >
                        <b>Correo Electronico:</b>
                    </div>     
                    <div class="span5 campo" >
                        {$empresa->email}
                    </div> 
                </div>
                {if $empresa->pagina_web or $empresa->fax}
                <div class="row-fluid  form" >    
                    {if $empresa->fax}
                    <div class="span2 parametro" >
                        <b> Fax:</b>
                    </div>     
                    <div class="span2 campo" >
                        {$empresa->fax}
                    </div>    
                    {/if}
                    {if $empresa->pagina_web}
                            <div class="span2 parametro" >
                              <b>Pagina:</b>
                            </div>     
                            <div class="span5 campo" >
                                {$empresa->pagina_web}
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
                {*if $empresa->nim}
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            <b>Numero de Identificación Minera:</b>
                        </div>     
                        <div class="span9 campo">
                            {$empresa->nim}
                        </div>  
                    </div>
                {/if*}    
                <div class="row-fluid  form" >
                    <div class="span4" >
                    </div>  
                    <div class="span4" >
                        {if $empresa->estado=='0'}
                            <b>Empresa en estado de revisión</b>
                        {/if}
                        {if $empresa->estado=='1'}
                            <b>Aproximese a cualquiera de nuestras oficinas con su documentación para completar su registro.</b>
                        {/if}
                        {if $empresa->estado=='4'}
                            <b>En revisi&oacute;n para modificaci&oacute;n de datos.</b>
                        {/if}
                        {if $empresa->estado=='6'}
                            <b>En revisi&oacute;n para renovasi&oacute;n de RUEX.</b>
                        {/if}
                    </div>  
                    <div class="span3" >
                    </div>  
                    <div class="span1 " >
                        {if $empresa->estado=='2' or $empresa->estado=='4' or $empresa->estado=='6' or $empresa->estado=='9'}
                        <div class="menucf">
                            <a href='index.php?opcion=impresionRuex&tarea=ImpresionRuex&id_empresa={$empresa->id_empresa}' target='_blank'><img src="styles/img/imp_b.png"   class="menubottom ayuda"></a>
                            <a href='index.php?opcion=impresionRuex&tarea=ImpresionRuex&id_empresa={$empresa->id_empresa}' target='_blank'><img src="styles/img/imp.png"    class="menutop ayuda"></a>
                        </div>  
                        {/if}
                    </div>
                </div>
                
            </div>
        </div>
    </div>                       
</div>  

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