{assign var="id" value="v"|cat:$empresa_temporal->id_empresa}

<div class="row-fluid fadein"  id="asignacionruex{$id}" >
    <div class="k-block">
        <div class="k-header">
            <div class="titulonegro">Validaci&oacute;n de RUEX</div> 
        </div>   
        <div class="k-cuerpo">                
                 <div class="row-fluid " >
                    <div class="span2 parametro" >
                        Nombre o Razon Social:
                    </div>     
                    <div class="span5 campo" >
                        {$empresa_temporal->razon_social} 
                    </div>  
                    <div class="span2 parametro" >
                        NIT:
                    </div>     
                    <div class="span2 campo" >
                        {$empresa_temporal->nit}
                    </div> 
                </div>
                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        Nombre Comercial:
                    </div>     
                    <div class="span5 campo" >
                        {$empresa_temporal->nombre_comercial} 
                    </div>
                    <div class="span2 parametro" >
                        Codigo de certif. de NIT:
                    </div>     
                    <div class="span2 campo" >
                        {$empresa_temporal->certificacionnit}
                    </div> 
                </div>
                <div class="row-fluid " >                 
                    <div class="span5 hidden-phone" ></div>
                    {if $empresa_temporal->ico}
                        <div class="span1 parametro" > Nro ICO </div>
                        <div class="span1 campo" > {$empresa_temporal->ico} </div>
                    {else}
                        <div class="span2 hidden-phone" ></div>
                    {/if}
                    {if $empresa_temporal->matricula_fundempresa}
                        <div class="span2 parametro" >
                            Nro. FundEmpresa:
                        </div>     
                        <div class="span2 campo" >
                            {if $empresa_temporal->idtipo_empresa == 10}
                                No Aplica
                            {else}
                                {$empresa_temporal->matricula_fundempresa}
                            {/if}
                        </div> 
                    {/if}
                </div>
                 {if $empresa_temporal->matricula_fundempresa or $empresa_temporal->menor_cuantia=="1" or $empresa_temporal->oea or $empresa_temporal->frecuente!='1'}
                <div class="row-fluid " >
                    
                    <div class="span2 hidden-phone" ></div>
                    {if $empresa_temporal->oea}
                            <div class="span4" >
                                <b>OPERADOR ECON&Oacute;MICO AUTORIZADO {$empresa_temporal->oea}</b>
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
                    <div class="span1 campo" >
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
                     
                     <div class="span1 hidden-phone" ></div>
                    <div class="span3 parametro" >
                       Año de Fundacion:
                    </div>     
                    <div class="span2 campo" >
                         {$empresa_temporal->date_fundacion}
                    </div> 
                    <div class="span2 parametro" >
                       latitud(coordenadas):
                    </div>     
                    <div class="span2 campo" >
                         {$empresa_temporal->coordenada_lat}
                    </div> 
                </div>
                <div class="row-fluid  form" >
                    <div class="span1 hidden-phone" ></div>
                    <div class="span3 parametro" >
                       Año de inicio de Operaciones:
                    </div>     
                    <div class="span2 campo" >
                         {$empresa_temporal->date_inicio_operaciones}
                    </div> 
                    
                    <div class="span2 parametro" >
                       longitud(coordenadas):
                    </div>     
                    <div class="span2 campo" >
                         {$empresa_temporal->coordenada_long}
                    </div> 
                </div> 
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                      Descripcion de la Empresa
                    </div>     
                    <div class="span9 campo" >
                         {$empresa_temporal->descripcion_empresa}
                    </div> 
                </div>   
                <div class="row-fluid form" >
                   <div class="span2 parametro" >
                            Afiliaciones:
                    </div>     
                    <div class="span9" >
                        <input type="hidden" name="afiliaciones_values1" id="afiliaciones_values1" value="{$afiliaciones_val}" />
                        <input style="width:100%;" id="afiliaciones1" name="afiliaciones1">
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >
                    </div>
                </div>
                        
                        <div class="row-fluid form" >
                            <div class="span3 parametro" >
                                Domicilio Fiscal(formato antigüo):
                            </div>   
                            <div class="span8 " >
                                <input type="text" class="k-textbox "  value="{$empresa_temporal->direccionfiscal}" placeholder="Direcci&oacute;n Domicilio Fiscal" id="direccionfiscal" name="direccionfiscal" required validationMessage="Ingrese su dirección"/>
                            </div>
                        </div>
                            <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                            
              <div class="row-fluid  form" >
                    {assign var="ds_id" value=$empresa_temporal->direccion}
                    {include file="admDireccion/Direccion_Show.tpl" }

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
                {*if $empresa_temporal->nim}
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            <b>Numero de Identificación Minera:</b>
                        </div>     
                        <div class="span9 campo" >
                            {$empresa_temporal->nim}
                        </div>  
                    </div>
                {/if*}  
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
                            {$persona.perfil}{if $persona.id_persona==$empresa_temporal->id_representante_legal} RESPONSABLE {/if}
                        </div> 
                        </div>
                        <div class="span1" >
                         {if $persona.id_perfil=='3'}
                             <a href='index.php?opcion=impresionFirmaRuex&tredrt={$persona.id_persona}&sdfercw={$empresa_temporal->id_empresa}' target='_blank'>
                             <input type="button" value="Term.de Uso" class="k-button " style="width:100%;height:20px; font-size: 12px;padding-top:0px;margin-top:0px;"/>
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
                            {if $empresa_temporal->estado!=9}
                                Escriba si tiene observaciones en el registro de la empresa "{$empresa_temporal->razon_social}", las cuales se les notificaran mediante correo.
                            {else} 
                                <center>OBSERVACIONES</center>
                            {/if}
                        </div> 
                </div>       
                <div class="row-fluid  form" >
                    <div class="span12 " > 
                         <textarea id="editorr{$id}"  >
                        </textarea> 
                    </div>
                </div>
                <div class="row-fluid" id="notificacionobservacionr{$id}">
                    <div class="span4 " >
                    </div>
                     <div class="span4 " > 
                         <div  class="k-widget k-tooltip-validation">Por favor Ingrese sus observaciones.</div>
                    </div> 
                    <div class="span4 " > 
                    </div>
                </div>
                
                    {if $vRuex=='0'}
                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div>
                        <div class="row-fluid">
                            <div class="span3 hidden-phone" ></div>
                            <div class="span1" ><input class="span12" type="checkbox" name="chk-vigencia" id="chk-vigencia"></div>
                            <div class="span8 " >
                                <b>EMPRESA REGISTRADA ENTRE JUNIO Y AGOSTO DE 2016 QUE MANTENGA SU VIGENCIA DE UN AÑO, <br>SIEMPRE QUE LOS DATOS SEAN LOS MISMOS</b>
                            </div>
                        </div>
                        <br>
                    {/if}
                     <div class="row-fluid form" >
                        <div class="barra" >
                        </div> 
                    </div>
                
                    <div class="row-fluid  form" >
                        <div class="span1 hidden-phone" >
                        </div>
                        <div class="span3" >
                            <input id="cerrar{$id}" type="hidden" value="Cerrar" class="k-primary" style="width:100%"/> <br><br>
                        </div>
                        {if $empresa_temporal->estado!=9 }
                            <div class="span3" >
                                <input id="rechazarruex{$id}" type="button" value="Rechazar" class="k-primary" style="width:100%"/> <br><br>
                            </div>
                            <div class="span3" >
                                <input id="asignarruex{$id}" type="button"  value="Validar Ruex" class="k-primary" style="width:100%"/> 
                            </div>
                        {else}
                            <div class="span6 hidden-phone" ></div>
                        {/if}
                        <div class="span1 hidden-phone" >
                        </div>
                        <div class="span1 " >
                            <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('validacionRuex')" style="max-width:35px;" class="ayuda">
                        </div>
                    </div>
                
        </div>
    </div>    
</div>
<div id="avisorevision"></div>
{include file="avisos/firmaDigital.tpl"}   
<script>  
    var chk_vigencia;
    $("#cerrar{$id}").kendoButton();
    var cerrar{$id} = $("#cerrar{$id}").data("kendoButton");
    if ({$empresa_temporal->estado}!=9 ){
        $("#rechazarruex{$id}").kendoButton();
        $("#asignarruex{$id}").kendoButton();
        var rechazarruex{$id} = $("#rechazarruex{$id}").data("kendoButton");
        var asignarruex{$id} = $("#asignarruex{$id}").data("kendoButton");
        rechazarruex{$id}.bind("click", function(e){
            if(editorr{$id}.value().length<3)
            { 
                mostrar('notificacionobservacionr{$id}');
            }
            else
            {
                cambiar('asignacionruex{$id}','firmadigital{$id}');
                generarPin('{$empresa_temporal->id_empresa}','{$id_persona}','20');
                cambiarRedaccionFirma{$id}(20,'de Rechazo de RUEX','rechazo a la empresa.');
            }
        });
        asignarruex{$id}.bind("click", function(e){
            chk_vigencia = $('#chk-vigencia').prop('checked');
            cambiar('asignacionruex{$id}','firmadigital{$id}');
            generarPin('{$empresa_temporal->id_empresa}','{$id_persona}','1');
            cambiarRedaccionFirma{$id}(1,'de Validaci&oacute;n de RUEX','valido el RUEX de la empresa.');
        });
    }
    cerrar{$id}.bind("click", function(e){
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'id_empresa={$empresa_temporal->id_empresa}&fecha_ini={$fecha_ini}&opcion=admEmpresa&tarea=cerrarAsignacionRuex',
            success: function (data) {
                var dt=eval("("+data+")");
                if(dt[0].suceso==0){}
                remover(tabStrip.select());
            }
        }); 
        
    });
//------------para el campor de observaciones--------------------------------
ocultar('notificacionobservacionr{$id}');
   
var editorr{$id} = $("#editorr{$id}").kendoEditor({
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
        
if({$empresa_temporal->estado} == 9 ){
    editorr{$id}.value('{$observacion}');
    $(editorr{$id}.body).attr('contenteditable', false);
}
</script>
<script>
   
    $("#afiliaciones1").kendoMultiSelect({
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
   function ventana(nombre, h, w){
        $("#"+nombre).kendoWindow({
            draggable: false,
            height: h+"px",
            width: w+"px",
            resizable: false,
            modal: true,
            actions: [],
            animation: {
                close: {
                  effects: "fade:out",
                  duration: 1000
                }
            }
        }).data("kendoWindow").center().open();
    }
    if('{$revisar}'=='1'){
        createVentana();
    }
    function createVentana(){
        var campo = 
                '<div id="aviso_ventana">'+
                    
                        '<div class="titulo" id="tituloventana">Aviso Cambio de Estado</div><br>'+
                        '<div class="row-fluid form">'+
                            '<label id="cambio_texto">Se le asigno la Empresa <b id="bold_numfact">{$empresa_temporal->razon_social}</b> al usuario  <b id="bold_estado">{$asignado}</b>, perteneciente a la RRCO <b id="bold_estado">{$regional}</b>, en Fecha y Hora: {$fecha_ini}, posee hasta 4 horas, para emitir u observar esta registro. </label><br><br>'+
                        '</div>'+
                        '<div class="row-fluid form">'+
                            '<input id="ventanaaceptar" type="button"  value="Aceptar" class="k-primary" style="width:40"/> '+
                        '</div>'+
                    
                '</div>';
        $('#avisorevision').append(campo);
         ventana('aviso_ventana','280','410');
        $("#ventanaaceptar").kendoButton();
        
        var ventanaaceptar = $("#ventanaaceptar").data("kendoButton");
        
        ventanaaceptar.bind("click", function(e){
            $("#aviso_ventana").data("kendoWindow").close();
            $('#aviso_ventana').remove();
        });
        
    }
    var multiSelect = $("#afiliaciones1").data("kendoMultiSelect"),
            setValue = function(e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.dataSource.filter({}); //clear applied filter before setting value

                    multiSelect.value($("#afiliaciones_values1").val().split(","));
                }
            },
            setSearch = function (e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.search($("#word").val());
                }
            };
    multiSelect.enable(false);
    this.onload(setValue($('#afiliaciones_values1').val()));
    
</script>    