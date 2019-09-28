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
            {if $empresa->estado==4}
            <div class="row-fluid ">
                <div class="span12 parametro" >
                    EMPRESA CON SOLICITUD DE MODIFICACIÓN DE DATOS RUEX, REPRESENTANTE LEGAL O DIRECCIÓN 
                </div>     
                
            </div>
            {/if}
            <div class="row-fluid ">
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
                    Codigo de certif. de NIT:
                </div>     
                <div class="span2 campo" >
                    {$empresa->certificacionnit}
                </div> 
            </div>
            <div class="row-fluid " >
                
                {if $empresa->ico}
                    <div class="span5 hidden-phone" ></div>
                    <div class="span1 parametro" > Nro ICO </div>
                    <div class="span1 campo" > {$empresa->ico} </div>
                {else}
                    <div class="span7 hidden-phone" ></div>
                {/if}
                {if $empresa->matricula_fundempresa or $empresa->menor_cuantia=="1" or $empresa->oea or $empresa->frecuente!='1'}
                   
                    {if $empresa->matricula_fundempresa}
                        <div class="span2 parametro" >
                            Nro. FundEmpresa:
                        </div>     
                        <div class="span2 campo" >
                           {$empresa->matricula_fundempresa}
                        </div> 
                    {/if}
                {/if}
                
            </div>
            <div class="row-fluid form" >
                
            </div>  
            {if $empresa->matricula_fundempresa or $empresa->menor_cuantia=="1" or $empresa->oea or $empresa->frecuente!='1'}
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
            <div class="row-fluid form" >
                <!--div class="span2 parametro" >
                   Ruex:
                </div>     
                <div class="span2 campo" >
                     {$empresa->ruex}
                </div-->  
            </div>
            <div class="row-fluid  form" >
                                 
                <div class="span2 parametro" >
                    Actividad Economica:
                </div>     
                <div class="span3 campo" >
                  {$empresa->idactividad_economica}
                </div> 
                <div class="span2 parametro" >
                    Vigencia:
                </div>     
                <div class="span2 campo" >
                   {$empresa->vigencia}                   
                </div> 
                <div class="span1 parametro" >
                   Categoria:
                </div>     
                <div class="span1 campo" >
                     {$empresa->idcategoria_empresa}
                </div>
            </div> 
            <div class="row-fluid  form" >
                {if $empresa->idtipo_empresa}      
                    <div class="span2 parametro" >
                        Tipo de Empresa:
                    </div>     
                    <div class="span3 campo" >
                       {$empresa->idtipo_empresa}                   
                    </div> 
                {/if}
                <div class="span2 parametro" >
                    Fecha Vigencia:
                </div>     
                <div class="span2 campo" >
                  {$empresa->fecha_renovacion_ruex}
                </div> 
            </div>
            <div class="row-fluid form" >
                <div class="barra" >                                         
                </div> 
            </div> 
            <!--div class="row-fluid  form" >
                <div class="span2 parametro" >
                    <b>Departamento:</b>
                </div>     
                <div class="span2 campo" >
                  {$empresa->iddepartamento_procedencia}
                </div>
                <div class="span1 parametro" >
                    <b>Municipio:</b>
                </div>     
                <div class="span2 campo" >
                    {$municipio}
                </div>
                <div class="span1 parametro" >
                    <b>Ciudad:</b>
                </div>     
                <div class="span2 campo" >
                    {$ciudad}
                </div>         
            </div-->
            <div class="row-fluid  form" >

                <div class="span2 parametro" >
                    <b> Domicilio Fiscal(Antigüo):</b>
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
                <div class="row-fluid form" >
                <div class="barra" >                                         
                </div> 
            </div> 
                <div class="row-fluid  form" >
                    {assign var="ds_id" value=$empresa->direccion}
                    {include file="admDireccion/Direccion_Show.tpl" }

                </div>
            <div class="row-fluid  form" >
                <!--div class="span2 parametro" >
                    <b> Telf/Cel Contacto:</b>
                </div>     
                <div class="span2 campo" >
                    {$empresa->numero_contacto}
                </div--> 
                <div class="span2 parametro" >
                    <b>Correo Electronico:</b>
                </div>     
                <div class="span8 campo" >
                    {$empresa->email}
                </div> 
            </div>
            
            <div class="row-fluid  form" > 
                
                    <div class="span2 parametro" >
                      <b>Pagina:</b>
                    </div>     
                    <div class="span8 campo" >
                        {$empresa->pagina_web}
                    </div>  
               
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
                <div class="span3 parametro" >
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
                
                <div class="span3 parametro" >
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
                        <div class="span5 campo" >
                            {$ico->ico}
                        </div>  
                    </div>
                {/if}  
                {if $empresa->nim}
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            <b>Numero de Identificación Minera:</b>
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
                    <div class="row-fluid selectpersona" onclick="anadir('{$persona.perfil}','admPersona','verPersona&id_persona={$persona.id_persona}')" {*if $persona.id_persona==$empresa_temporal->id_representante_legal}style="background-color: #e6e6e6;border-radius: 7px;padding-top: 5px;" {/if*}>
                        <div class="selectpersona">  
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
                            {$persona.perfil}{if $persona.id_persona==$empresa->id_representante_legal} RESPONSABLE {/if}
                        </div> 
                        </div>
                        <div class="span1" >
                         {if $persona.id_perfil=='3' or $persona.id_perfil=='2'}
                             <a href='index.php?opcion=impresionFirmaRuex&tredrt={$persona.id_persona}&sdfercw={$empresa->id_empresa}' target='_blank'>
                             <input type="button" value="Firmar" class="k-button " style="width:100%;height:20px; font-size: 12px;padding-top:0px;margin-top:0px;"/>
                             </a>
                         {/if}
                        </div>
                    </div>                    
                {/foreach}
                {/if}
                <div class="row-fluid " >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid" >
                    <div class="span11 " >
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
        placeholder:"Sin Afiliaciones",
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