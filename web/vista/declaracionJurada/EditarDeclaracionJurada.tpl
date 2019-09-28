<form name="editar_ddjj" id="editar_ddjj" method="post"  action="index.php">
<input type="hidden" id="id_declaracion_jurada" name="id_declaracion_jurada" value="{$ddjj->getId_ddjj()}">
<div class="row-fluid  form"  id="revisardeclaracionjurada">
    <div class="row-fluid " >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid form">
                        <div class="span12">
                            <div class="titulonegro"> Editar Declaración Jurada</div> 
                        </div>
                    </div>  
                </div>
                <div class="k-cuerpo">
                    <!-- ACUERDOS COMERCIALES -->
                    <fieldset>
                        <legend align="center"><b>ACUERDOS COMERCIALES</b></legend>
                        <div class="row-fluid">
                        {foreach from=$acuerdos item='ddjjacuerdo'}
                            <strong>{$ddjjacuerdo->acuerdo->getDescripcion()}</strong><br>
                        {/foreach}
                        </div>
                        <br>
                        <div class="row-fluid">
                            {if ($apareceFob==1)}
                            <div class="span4" id="div_fob">
                                Valor FOB: <input type="text" placeholder="Valor FOB($us)" name="valor_fob" id="valor_fob" value="{$fob}" required validationMessage="Introduzca Valor FOB"/> 
                            </div>
                            {/if}
                            {if ($apareceExWork==1)}
                            <div class="span4" id="div_exwork">
                                Valor EXWORK: <input type="text" placeholder="Valor ExWork($us)" name="valor_exwork" value="{$exwork}" id="valor_exwork" required validationMessage="Introduzca Valor EXWORK"/> 
                            </div>
                            {/if}
                        </div>
                    </fieldset>
                        
                    <fieldset>
                        <legend align="center"><b>NANDINA / NALADISA's</b></legend>
                        <div class="row-fluid form">
                            <div class="span2" align="right">Capítulos</div>
                            <div class="span8">
                                <input id="combocapitulos"  name="combocapitulos" style="width: 100%;"  required validationMessage="Por favor Introduzca el Capítulo de la Mercancía"/>
                            </div>
                        </div>
                        <div class="row-fluid form">
                            <div class="span2" align="right">Subpartida Arancelaria a 10 DÍGITOS</div>
                            <div class="span8">
                                <input id="combonandina"  name="combonandina" style="width: 100%;"  required validationMessage="Por favor Introduzca Subpartida Arancelaria o Descripcion del Producto"/>
                            </div>
                            <div class="span2"></div>
                        </div>
                        
                        {foreach from=$acuerdos item='ddjjacuerdo'}
                            <!-- Tratados con NANDINAS y NALADISAS -->
                            {if ($ddjjacuerdo->getId_acuerdo()==2)}
                            <div class="row-fluid" id="div_naladisa93">
                                <div class="span2" align="right">NALADISA 1993</div>
                                <div class="span8">
                                    <input id="naladisa93"  name="naladisa93" style="width: 100%;"/>
                                    <div class="span" ><center>
                                        <input type="hidden" name="hiddenvalidatornaladisa93" id="hiddenvalidatornaladisa93" 
                                        data-naladisa93validator
                                        data-required-msg="Ingrese el valor NALADISA 1993 A 8 DÍGITOS" /></center>
                                    </div> 
                                </div>
                            </div>
                            {/if}
                            {if ($ddjjacuerdo->getId_acuerdo()==3)}
                            <div class="row-fluid" id="div_naladisa96">
                                <div class="span2" align="right">NALADISA 1996</div>
                                <div class="span8">
                                    <input id="naladisa96"  name="naladisa96" style="width: 100%;"/>
                                    <div class="span" ><center>
                                        <input type="hidden" name="hiddenvalidatornaladisa96" id="hiddenvalidatornaladisa96" 
                                        data-naladisa96validator
                                        data-required-msg="Ingrese el valor NALADISA 1996 A 8 DÍGITOS" /></center>
                                    </div> 
                                </div>
                            </div>
                            {/if}
                            {if ($ddjjacuerdo->getId_acuerdo()==4)}
                            <div class="row-fluid" id="div_naladisa2007">
                                <div class="span2" align="right">NALADISA 2007</div>
                                <div class="span8">
                                    <input id="naladisa2007"  name="naladisa2007" style="width: 100%;"/>
                                    <div class="span" ><center>
                                        <input type="hidden" name="hiddenvalidatornaladisa2007" id="hiddenvalidatornaladisa2007" 
                                        data-naladisa2007validator
                                        data-required-msg="Ingrese el valor NALADISA 2007 A 8 DÍGITOS" /></center>
                                    </div> 
                                </div>
                            </div>
                            {/if}
                            {if ($ddjjacuerdo->getId_acuerdo()==7)}
                            <div class="row-fluid" id="div_naladisa91">
                                <div class="span2" align="right">NALADISA 1991</div>
                                <div class="span8">
                                    <input id="naladisa91"  name="naladisa91" style="width: 100%;"/>
                                    <div class="span" ><center>
                                        <input type="hidden" name="hiddenvalidatornaladisa91" id="hiddenvalidatornaladisa91"
                                        data-naladisa91validator
                                        data-required-msg="Ingrese el valor NALADISA 1991 A 8 DÍGITOS" /></center>
                                    </div> 
                                </div>
                            </div>
                            {/if}
                            {if ($ddjjacuerdo->getId_acuerdo()==6)}
                            <div class="row-fluid" id="div_naladi83">
                                <div class="span2" align="right">NALADI 1983</div>
                                <div class="span8" >
                                    <input id="naladi83"  name="naladi83" style="width: 100%;"/>
                                    <div class="span" ><center>
                                        <input type="hidden" name="hiddenvalidatornaladi83" id="hiddenvalidatornaladi83"
                                        data-naladi83validator
                                        data-required-msg="Ingrese el valor NALADI 1983 A 7 DÍGITOS" /></center>
                                    </div> 
                                </div>
                            </div>
                            {/if}
                        {/foreach}
                    </fieldset>

                    <div class="row-fluid form">
                        <div class="barra"></div>
                    </div>
                    <!-- SELECCIONAR LA FABRICA -->
                    <div class="row-fluid">
                        <div class="span8">
                            <input id="combo_fabricas" name="combo_fabricas" style="width: 100%;" />
                        </div>
                        <div class="span2" style="text-align: left;">
                            <input id="addfabrica" type="button" value="Agregar Fábrica" class="k-primary" style="width:40"/> 
                        </div>
                    </div>
                    <div class="row-fluid form">
                        <div class="barra">
                        </div>
                    </div>
                    
                    <!-- TABLA PARA LOS REGISTROS EN CASO DE COMERCIALIZADORES -->
                    <div class="row-fluid form" >
                        <div class="span12" style="text-align: left;" >
                            <input type="checkbox" name="check_comercializador" id="check_comercializador">En caso de ser comercializador elegir opción
                        </div>
                    </div>
                    <!-- Tabla de Registros para los datos del Productor de la mercancia -->
                    <div class="row-fluid form" style="display:none;" id="div_comercializador">
                        <fieldset>
                            <legend align="center"><b>DATOS DEL PRODUCTOR DE LA MERCANCÍA</b></legend>
                            <div id="tabla_comercializadores" class="fadein" style="width: 100%; font-size: 10px;"></div>
                            <br>
                            <input id="addfilacomercializador" type="button" value="+" class="k-primary" style="width:40" onclick="agregarfilacomercializador();"/> 
                            <input id="elimfilacomercializador" type="button" value="-" class="k-primary" style="width:40" onclick="eliminarfilacomercializador();"/> 
                        </fieldset>
                    </div>
                    <div class="row-fluid form">
                        <div class="barra">
                        </div>
                    </div>
                    
                    <!-- CAMPOS PARA LA DECLARACION JURADA CON LOS DATOS DE LA MERCANCÍA -->
                    <fieldset>
                        <legend align="center"><b>DATOS GENERALES</b></legend>

                        <div class="row-fluid " >
                            <div class="span2 parametro">
                                Denominación Comercial:
                            </div>     
                            <div class="span4 campo" >
                                {$ddjj->getDescripcion_comercial()}
                            </div>  
                            <div class="span2 parametro">
                                Nombre Técnico:
                            </div>     
                            <div class="span4 campo" >
                                {$ddjj->getNombre_tecnico()}
                            </div>
                        </div>
                        <div class="row-fluid " >
                            <div class="span2 parametro">
                                Características Técnicas:
                            </div>     
                            <div class="span4 campo" >
                                {$ddjj->getCaracteristicas()}
                            </div>  
                            <div class="span2 parametro">
                                Usos y aplicaciones:
                            </div>     
                            <div class="span4 campo" >
                                {$ddjj->getAplicacion()}
                            </div>
                        </div>
                        <div class="row-fluid form" >
                            <div class="span2 parametro">
                                Unidad de Medida:
                            </div>
                            <div class="span4 " >
                                <input style="width:100%;" id="unidadmedida" name="unidadmedida" required validationMessage="Por favor Escoja Unidad de Medida">
                            </div>
                            <div class="span2 parametro">
                                Capacidad de Producción Mensual:
                            </div>     
                            <div class="span4 ">
                                <input type="text" placeholder="Capacidad de Producción Mensual" id="produccion_mensual" name="produccion_mensual" required validationMessage="Coloque la Cap. de Producción Mensual">
                            </div>
                        </div>
                        <div class="row-fluid  form" >
                            <div class="span12" >
                            <input type="text" class="k-textbox "  placeholder="Descripción del Proceso Productivo"  name="procesoproductivo" id="procesoproductivo" value="{$ddjj->getProceso_Productivo()}" required validationMessage="Por favor Especifique el Proceso Productivo" /> 
                            </div>
                        </div>
                    </fieldset>
                    
                    <!-- Tabla de Registros para LOS INSUMOS NACIONALES -->
                    <div class="row-fluid form" id="div_insumosnacionales">
                        <fieldset>
                            <legend align="center"><b>INSUMOS NACIONALES</b></legend>
                            <div id="tabla_insumosnacionales" class="fadein"></div>
                            <br>
                            <input id="addfilainsumosnacionales" type="button" value="+" class="k-primary" onclick="agregarfilainsumosnacionales();"/> 
                            <input id="elimfilainsumosnacionales" type="button" value="-" class="k-primary" onclick="eliminarfilainsumosnacionales();"/> 
                        </fieldset>
                    </div>

                    <!-- Tabla de Registros para LOS INSUMOS IMPORTADOS -->
                    <div class="row-fluid form" >
                        <div class="span12" style="text-align: left;" >
                            <input type="checkbox" name="check_insumosimportados" id="check_insumosimportados">En caso de existir insumos importados elegir opción
                        </div>
                    </div>
                    <!-- Tabla de Registros para los datos del Productor de la mercancia -->
                    <div class="row-fluid form" style="display:none;" id="div_insumosimportados">
                        <fieldset>
                            <legend align="center"><b>INSUMOS IMPORTADOS</b></legend>
                            <div id="tabla_insumosimportados" class="fadein" style="width: 100%;"></div>
                            <br>
                            <input id="addfilainsumosimportados" type="button" value="+" class="k-primary" onclick="agregarfilainsumosimportados();"/> 
                            <input id="elimfilainsumosimportados" type="button" value="-" class="k-primary" onclick="eliminarfilainsumosimportados();"/> 
                        </fieldset>
                    </div>
                    <div class="row-fluid form">
                        <div class="barra">
                        </div>
                    </div>

                    <div class="row-fluid  form" >
                        <div class="span12" style="font-weight: bold; text-align: left;">Indique si los productos son elaborados en zonas especiales o si se benefician de incentivos territoriales o beneficios tributarios
                        </div>
                    </div>
                    
                    <div class="row-fluid form" style="text-align: left;" >
                        <div class="span2">
                            <input type="checkbox" name="lista_elaboracion[]" id="elaboracion_ninguno" {if $elab_0==1 } checked="true" {/if} value="ninguno">Ninguno
                        </div>
                        <div class="span2" >
                            <input type="checkbox" name="lista_elaboracion[]" id="elaboracion_zonafranca" {if $elab_1==1 } checked="true" {/if} value="zonafranca">Zona Franca
                        </div>
                        <div class="span2" >
                            <input type="checkbox" name="lista_elaboracion[]" id="elaboracion_cedeims" {if $elab_2==1 } checked="true" {/if} value="cedeims">CEDEIMS
                        </div>
                        <div class="span2" >
                            <input type="checkbox" name="lista_elaboracion[]" id="elaboracion_ritex" {if $elab_3==1 } checked="true" {/if} value="ritex">RITEX
                        </div>
                        <div class="span4" style="display: inline;" >
                            {if $elab_4==1 }
                                <input type="checkbox" name="lista_elaboracion[]" id="elaboracion_otros" value="otros" checked="true">Otros
                                <div style="text-align: left;" id="div_elaboraciondetalle">
                                    <input type="text" class="k-textbox"  placeholder="Detallar"  name="elaboracion_detalle" id="elaboracion_detalle" value="{$elab_otro}" /> 
                                </div>
                            {else}
                                <input type="checkbox" name="lista_elaboracion[]" id="elaboracion_otros" value="otros">Otros
                                <div style="display:none; text-align: left;" id="div_elaboraciondetalle">
                                    <input type="text" class="k-textbox"  placeholder="Detallar"  name="elaboracion_detalle" id="elaboracion_detalle" /> 
                                </div>
                            {/if}
                        </div>
                    </div>
                    <div class="row-fluid" >
                            <div class="span" ><center>
                                 <input type="hidden" name="hiddenvalidatorelaboracion" id="hiddenvalidatorelaboracion" 
                         data-elaboracionvalidator
                         data-required-msg="Escoja por lo menos una opción" /></center>
                            </div> 
                    </div>
                    <div class="row-fluid form">
                        <div class="barra">
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="span12" >
                             <input type="hidden" name="hiddenvalidatorgrid" id="hiddenvalidatorgrid" 
                             data-gridvalidator
                             data-required-msg="Por Favor Llene por lo menos un dato de Insumos Nacionales o Importados" />
                        </div> 
                    </div>

                    <!-- BOTONES -->
                    <div class="row-fluid form" >
                        <div class="span4" >
                        <input id="masasesoramiento" type="button" value="Pedir Mas Asesoramiento" class="k-primary" style="width:100%"/> <br><br>
                        </div>
                        <div class="span4" >
                        <input id="guardarddjj" type="button" value="Declarar" class="k-primary" style="width:100%"/> <br><br>
                        </div>
                        <div class="span4" >
                        <input id="cancelarddjj" type="button"  value="Cancelar" class="k-primary" style="width:100%"/> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>      
</div>

<div id="fabricas">
    <form name="form_fabricas" id="form_fabricas" method="post" action="index.php">
        <div class="titulo">Agregar Fábrica</div><br>
        
        <div class="row-fluid form">
            <input type="text" class="k-textbox" id="ciudad_fabrica" name="ciudad_fabrica" style="width:100%;" placeholder="Ciudad donde está la fábrica" required validationMessage="Ingrese la ciudad donde se encuentra la Fábrica">
            <br><br>
            <input type="text" class="k-textbox" id="direccion_fabrica" name="direccion_fabrica" style="width:100%;" placeholder="Dirección de la Fábrica" required validationMessage="Ingrese la dirección donde se encuentra la Fábrica">
            <br><br>
            <input type="text" class="k-textbox" id="telefono_fabrica" name="telefono_fabrica" style="width:100%;" placeholder="Número de Teléfono de contacto o celular" required validationMessage="Ingrese el Número de Teléfono de contacto o Celular">
            <br><br>
            <input type="text" class="k-textbox" id="persona_contacto" name="persona_contacto" style="width:100%;" placeholder="Persona de Contacto" required validationMessage="Ingrese el Número de Teléfono de contacto o Celular">
            <br>
        </div>
        <div class="row-fluid form">
            <input id="agregarfabrica" type="button"  value="Enviar" class="k-primary" style="width:40"/> 
            <input id="cancelarfabrica" type="button"  value="Cancelar" class="k-primary" style="width:40"/> 
        </div>
    </form>
</div>

<div id="ventana_masasesoramiento">
     <div class="titulo">Más Asesoramiento</div><br>
       <div id="mensajeasesoramiento">
            {foreach from=$historico_asesoramiento item='ha'}
                <div class="pregunta">Pregunta: {$ha->getObservaciones_Exportador()}</div>
                {if ($ha->getRespuesta_Asistente()!='')}
                <div class="respuesta">Respuesta: {$ha->getRespuesta_Asistente()}</div>
                {/if}
            {/foreach}
       </div>
       <br>
       <p>Realiza otra Consulta</p>
       <textarea  class="k-textbox" rows="5" cols="47" id="masobservaciones" name="masobservaciones"></textarea><br>
       <input id="masasesoramientoddjj" type="button"  value="Enviar" class="k-primary" /> 
       <input id="cancelarasesoramiento" type="button"  value="Cancelar" class="k-primary" /> 
   </div>
</div> 

</form>

<div class="row-fluid fadein"  id="firmaenvioddjjcompleta" >
       <div class="k-block fadein">
                <div class="k-header">
                    <div class="k-header"><div class="titulo">Confirmación de Envío de DD.JJ.</div></div>
                </div>
                <div class="k-cuerpo"> 
                    <div class="row-fluid  form" >
                        <div class="span1"> </div>
                        <div class="span10">
                            <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico el envío para revisión
                                de una declaración jurada.</p> 
                        </div>
                        <div class="span1" ></div>
                    </div> 
                    <form name="formfirmaenvioddjjcompleta" id="formfirmaenvioddjjcompleta" method="post"  action="index.php" >
                        <div class="row-fluid  form" >
                            <div class="span5" ></div>
                            <div class="span2" >
                                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                               class="k-textbox " placeholder="Pin" name="pinfirmaenvioddjjcompleta"  id="pinfirmaenvioddjjcompleta" maxlength="4" size="4" style="width:50px;"
                               required data-required-msg="Por favor ingrese su Pin." data-firmarenvioddjjcompleta /> 
                            </div>  
                            <div class="span5" ></div>
                        </div>  
                        <div class="row-fluid  form" >
                            <div class="span4 hidden-phone" >
                             </div>
                             <div class="span2 " >
                                 <input id="cancelafirmaenvioddjjcompleta" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                             </div> 
                             <div class="span2 " >
                                 <input id="firmarenvioddjjcompleta" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                             </div> 
                             <div class="span4 hidden-phone" >
                             </div>
                         </div> 
                    </form> 
                </div>   
      </div>              
</div>
       
<style>
    .pregunta{
        font-size: 10px;
        color: red;
        font-weight: bold;
    }

    .respuesta{
        font-size: 10px;
        color: black;
        font-weight: bold;
    }
</style>
       
<script>
    ocultar('firmaenvioddjjcompleta');
    $("#masasesoramiento").kendoButton();
    $("#guardarddjj").kendoButton();
    $("#cancelarddjj").kendoButton();
    
    $("#masasesoramientoddjj").kendoButton();
    $("#cancelarasesoramiento").kendoButton();
    $("#addfilainsumosimportados").kendoButton();
    $("#elimfilainsumosimportados").kendoButton();
    $("#addfilainsumosnacionales").kendoButton();
    $("#elimfilainsumosnacionales").kendoButton();
    $("#addfilacomercializador").kendoButton();
    $("#elimfilacomercializador").kendoButton();
    $("#addfabrica").kendoButton();
    $("#agregarfabrica").kendoButton();
    $("#cancelarfabrica").kendoButton();
    
    var masasesoramiento = $("#masasesoramiento").data("kendoButton");
    var guardarddjj = $("#guardarddjj").data("kendoButton");
    var cancelarddjj = $("#cancelarddjj").data("kendoButton");
    var masasesoramientoddjj = $("#masasesoramientoddjj").data("kendoButton");
    var cancelarasesoramiento = $("#cancelarasesoramiento").data("kendoButton");
    var addfabrica = $("#addfabrica").data("kendoButton");
    var agregarfabrica = $("#agregarfabrica").data("kendoButton");
    var cancelarfabrica = $("#cancelarfabrica").data("kendoButton");
    
    var ventana_masasesoramiento = $("#ventana_masasesoramiento").kendoWindow({
          draggable: true,
          height: "450px",
          width: "450px",
          resizable: true,
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
    ventana_masasesoramiento.center(); 

    var fabricas = $("#fabricas").kendoWindow({
          draggable: true,
          height: "420px",                      
          width: "410px",
          resizable: true,
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
    fabricas.center(); 

    ///FUNCIONES PARA LA VENTANA DE FÁBRICA
    addfabrica.bind("click", function(e){
        fabricas.open();
    });
    
    agregarfabrica.bind("click", function(e){
        if(form_fabricas.validate()){
            var datos = $("#form_fabricas").serialize()+"&opcion=admEmpresa&tarea=guardarFabrica";
            $.ajax({
                type: 'post',
                url: 'index.php',
                data: datos,
                success: function (data) {
                    if(data!=0){
                        var fabrica = $("#ciudad_fabrica").val()+' - '+$("#direccion_fabrica").val() 
                        fabricas.close();
                        var combobox = $("#combo_fabricas").data("kendoComboBox");
                        {literal}
                        combobox.dataSource.add({"fabricas": fabrica,"id_fabrica":data});
                        {/literal}
                        combobox.value(data);
                        $("#form_fabricas")[0].reset();
                    }
                }
            }); 
        }
    });
    
    cancelarfabrica.bind("click", function(e){
        //$("#form_fabricas")[0].reset();
        fabricas.close();
    });
    
    var form_fabricas = $("#form_fabricas").kendoValidator({
    }).data("kendoValidator");

    //FUNCIONES PARA LA FIRMA DEL EXPORTADOR ENVIANDO LA DDJJ COMPLETA
    $("#cancelafirmaenvioddjjcompleta").kendoButton();
    $("#firmarenvioddjjcompleta").kendoButton();
    var cancelafirmaenvioddjjcompleta = $("#cancelafirmaenvioddjjcompleta").data("kendoButton");
    var firmarenvioddjjcompleta = $("#firmarenvioddjjcompleta").data("kendoButton");
    var datos;

    cancelafirmaenvioddjjcompleta.bind("click", function(e){             
        cambiar('firmaenvioddjjcompleta','revisardeclaracionjurada');
        borrarPin('{$nombre}');
    });
    
    firmarenvioddjjcompleta.bind("click", function(e){
        if(formfirmaenvioddjjcompleta.validate())
        {

            //Capturar los datos del formulario y los insumos nacionales, enviar controlador y tarea
            //almacenar todos los insumos nacionales
            var grid_nac = $("#tabla_insumosnacionales").data("kendoGrid");
            var data_nac = grid_nac.dataSource;
            var numfilas_nac = data_nac.total();
            var valores_nac = data_nac.data();

            var arr_nac = [];
            for (var i = 0; i < numfilas_nac; i++) {
                var valores=valores_nac[i].descripcion+";"+valores_nac[i].fabricante+";"+valores_nac[i].telefono+";"+valores_nac[i].valor;
                arr_nac.push(valores);
            }
        
            var datos = $("#editar_ddjj").serialize()+"&opcion=admDeclaracionJurada&tarea=actualizarDeclaracionJurada&tabla_nac="+arr_nac;

            //Verificar si hay Comercializadores
            var check_comerc = $('#check_comercializador').prop('checked');
            if(check_comerc){
                var grid_comerc = $("#tabla_comercializadores").data("kendoGrid");
                var data_comerc = grid_comerc.dataSource;
                var numfilas_comerc = data_comerc.total();
                var valores_comerc = data_comerc.data();

                var arr_comerc = [];
                for (var i = 0; i < numfilas_comerc; i++) {
                    var valores=valores_comerc[i].razon_social+";"+valores_comerc[i].ci_nit+";"+valores_comerc[i].domicilio+";"+valores_comerc[i].representante_legal+";"+valores_comerc[i].direccion_fabrica+";"+valores_comerc[i].telefono+";"+valores_comerc[i].precio_venta+";"+valores_comerc[i].unidad_medida+";"+valores_comerc[i].produccion_mensual;
                    arr_comerc.push(valores);
                }
                datos=datos+"&tabla_comerc="+arr_comerc;
            }

            //Verificar si hay Insumos Importados
            var check_import = $('#check_insumosimportados').prop('checked');
            if(check_import){
                var grid_import = $("#tabla_insumosimportados").data("kendoGrid");
                var data_import = grid_import.dataSource;
                var numfilas_import = data_import.total();
                var valores_import = data_import.data();

                var arr_import = [];
                for (var i = 0; i < numfilas_import; i++) {
                    var valores=valores_import[i].descripcion+";"+valores_import[i].nandina+";"+valores_import[i].pais+";"+valores_import[i].productor+";"+valores_import[i].cuenta_co+";"+valores_import[i].acuerdo+";"+valores_import[i].valor;
                    arr_import.push(valores);
                }
                datos=datos+"&tabla_import="+arr_import;
            }
            
            $.ajax({
                type: 'post',
                url: 'index.php',
                data: datos,
                success: function(data) {
                    firmarPin('Declaración Jurada','admDeclaracionJurada','','{$nombre}');
                    //alert("La Declaración Jurada fue Enviada.");
                    remover(tabStrip.select());
                }
            });
        }
    });

    /*-----------esto es para la validacion del pin*****************************************/
    var swfirma=2;        
    var firmacache='';
    var formfirmaenvioddjjcompleta = $("#formfirmaenvioddjjcompleta").kendoValidator({
        rules:{ 
            firmarenvioddjjcompleta: function(input) { 
                var validate = input.data('firmarenvioddjjcompleta');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    if (firmacache !== $("#pinfirmaenvioddjjcompleta").val()) 
                    {
                        verificarPinDDJJ($("#pinfirmaenvioddjjcompleta").val());                    
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
            firmarenvioddjjcompleta: function(input) { 
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
    
    function verificarPinDDJJ(pin_insertado)
    {
        $.ajax({
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
                success: function (data) {    
                    swfirma=data;
                    firmacache=$("#pinfirmaenvioddjjcompleta").val();
                    formfirmaenvioddjjcompleta.validateInput($("#pinfirmaenvioddjjcompleta"));
                }
            }); 
    }

    var alta_ddjj = $("#editar_ddjj").kendoValidator({
        rules:{
            /*
            checkvalidator: function(input) { 
                var validate = input.data('checkvalidator');
                if (typeof validate !== 'undefined') 
                {
                    if(verificalistaacuerdos())
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                return true;
            },
            */
            elaboracionvalidator: function(input) { 
                var validate = input.data('elaboracionvalidator');
                if (typeof validate !== 'undefined') 
                {
                    if(verificalistaelaboracion())
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                return true;
            },
            gridvalidator: function(input) {
                var validate = input.data('gridvalidator');
                if (typeof validate !== 'undefined') 
                {
                    //---aqui cuentas los productos y verificas si no estan vacíos
                    swp=verificagridinsumosnacionales();
                    if(swp==0)
                    {
                        return false;
                    }else if(swp==1)
                    {
                        return false;
                    }else if(swp==2)
                    {
                        return true
                    }else if(swp==3)
                    {
                        return false
                    }else if(swp==4)
                    {
                        return false
                    }else if(swp==5)
                    {
                        return false
                    }else if(swp==6)
                    {
                        return false
                    }
                }
                return true;
            }
            /*
            fobvalidator: function(input) { 
                var validate = input.data('fobvalidator');
                if (typeof validate !== 'undefined') 
                {
                    //Verificar los Check de Acuerdos para Valor FOB
                    var check_can = $('#check_can').prop('checked');
                    var check_ace22 = $('#check_ace22').prop('checked');
                    var check_ace47 = $('#check_ace47').prop('checked');
                    var check_arpar4 = $('#check_arpar4').prop('checked');
                    var check_aapag = $('#check_aapag').prop('checked');
                    var check_mercosur = $('#check_mercosur').prop('checked');
                    var check_venezuela = $('#check_venezuela').prop('checked');

                    if((check_can)||(check_ace22)||(check_ace47)||(check_arpar4)||(check_aapag)||(check_mercosur)||(check_venezuela)){
                        var valor_fob = $('#valor_fob').val();
                        if(valor_fob==''){
                            return false;
                        }else{
                            return true;
                        }
                    }
                }
                return true;
            },
            exworkvalidator: function(input) { 
                var validate = input.data('exworkvalidator');
                if (typeof validate !== 'undefined') 
                {
                    //Verificar los Check de Acuerdos para Valor EX-WORK
                    var sgp_canada = $('#sgp_canada').prop('checked');
                    var sgp_suiza = $('#sgp_suiza').prop('checked');
                    var sgp_noruega = $('#sgp_noruega').prop('checked');
                    var sgp_japon = $('#sgp_japon').prop('checked');
                    var sgp_zelanda = $('#sgp_zelanda').prop('checked');
                    var sgp_rusia = $('#sgp_rusia').prop('checked');
                    var sgp_turquia = $('#sgp_turquia').prop('checked');
                    var sgp_bielorrusia = $('#sgp_bielorrusia').prop('checked');
                    var sgp_ue = $('#sgp_ue').prop('checked');
                    var sgp_eeuu = $('#sgp_eeuu').prop('checked');
                    var sgp_tp = $('#sgp_tp').prop('checked');

                    if((sgp_canada)||(sgp_suiza)||(sgp_noruega)||(sgp_japon)||(sgp_zelanda)||(sgp_rusia)||(sgp_turquia)||(sgp_bielorrusia)||(sgp_ue)||(sgp_eeuu)||(sgp_tp)){
                        var valor_exwork = $('#valor_exwork').val();
                        if(valor_exwork==''){
                            return false;
                        }else{
                            return true;
                        }
                    }
                }
                return true;
            },
            */
        },
        messages:{
            //checkvalidator: "Escoja al menos uno de los acuerdos",
            elaboracionvalidator: "Escoja al menos una opción",
            gridvalidator: function(input) { 
                if(swp==0)
                {  
                  return 'Ingrese al menos un Insumo Nacional o Importado';
                }
                else if(swp==1)
                {    
                  return 'Por favor Complete los datos';
                }else if(swp==3)
                {    
                  return 'Primero debe colocar el valor FOB de la mercancía';
                }else if(swp==4)
                {    
                  return 'Primero debe colocar el valor EXWORK de la mercancía';
                }else if(swp==5)
                {    
                  return 'El valor puesto en los insumos sobrepasa el valor FOB';
                }else if(swp==6)
                {    
                  return 'El valor puesto en los insumos sobrepasa el valor EXWORK';
                }else if(swp==7)
                {  
                  return 'Ingrese al menos un Insumo Importado o borre la fila';
                }
                
            },
            //fobvalidator: "Ingrese el Valor FOB de la Mercancía",
        }
    }).data("kendoValidator");

    function verificalistaacuerdos(){
        var sw=1;
        $("input:checkbox[name='lista_acuerdos[]']:checked").each(function(){
             sw=0;
        });
        if(sw==0){
            return true
        }else{
            return false
        }
    }
    
    function verificalistaelaboracion(){
        var sw=1;
        $("input:checkbox[name='lista_elaboracion[]']:checked").each(function(){
             sw=0;
        });
        if(sw==0){
            return true
        }else{
            return false
        }
    }
    
    function verificagridinsumosnacionales()
    {
        var total_nacionales = 0;
        var total_importados = 0;
        var existe_fob=0;
        var existe_exwork=0;
        //Verificar los Check de Acuerdos para Valor FOB
        var check_can = $('#check_can').prop('checked');
        var check_ace22 = $('#check_ace22').prop('checked');
        var check_ace47 = $('#check_ace47').prop('checked');
        var check_arpar4 = $('#check_arpar4').prop('checked');
        var check_aapag = $('#check_aapag').prop('checked');
        var check_mercosur = $('#check_mercosur').prop('checked');
        var check_venezuela = $('#check_venezuela').prop('checked');
        if((check_can)||(check_ace22)||(check_ace47)||(check_arpar4)||(check_aapag)||(check_mercosur)||(check_venezuela)){
            if($('#valor_fob').val()==''){
                return 3;
            }else{
                existe_fob=1;
                var valor_fob = parseFloat($('#valor_fob').val());
            }
        }
        //Verificar los Check de Acuerdos para Valor EX-WORK
        var sgp_canada = $('#sgp_canada').prop('checked');
        var sgp_suiza = $('#sgp_suiza').prop('checked');
        var sgp_noruega = $('#sgp_noruega').prop('checked');
        var sgp_japon = $('#sgp_japon').prop('checked');
        var sgp_zelanda = $('#sgp_zelanda').prop('checked');
        var sgp_rusia = $('#sgp_rusia').prop('checked');
        var sgp_turquia = $('#sgp_turquia').prop('checked');
        var sgp_bielorrusia = $('#sgp_bielorrusia').prop('checked');
        var sgp_ue = $('#sgp_ue').prop('checked');
        var sgp_eeuu = $('#sgp_eeuu').prop('checked');
        var sgp_tp = $('#sgp_tp').prop('checked');
        if((sgp_canada)||(sgp_suiza)||(sgp_noruega)||(sgp_japon)||(sgp_zelanda)||(sgp_rusia)||(sgp_turquia)||(sgp_bielorrusia)||(sgp_ue)||(sgp_eeuu)||(sgp_tp)){
            if($('#valor_exwork').val()==''){
                return 4;
            }else{
                existe_exwork=1;
                var valor_exwork = parseFloat($('#valor_exwork').val());
            }
        }

        var grid_nac = $("#tabla_insumosnacionales").data("kendoGrid");
        var data_nac = grid_nac.dataSource;
        var numfilas_nac = data_nac.total();
        if(numfilas_nac==0){
            return 0;
        }else{
            var valores_nac = data_nac.data();
            var arr_nac = [];
            for (var i = 0; i < numfilas_nac; i++) {
                total_nacionales = total_nacionales + valores_nac[i].valor;
                if(!valores_nac[i].descripcion.trim() || !valores_nac[i].fabricante.trim() || valores_nac[i].telefono=='0' || valores_nac[i].valor=='0')
                {
                    return 1;
                }              
            }
            if(existe_fob==1){
                if(total_nacionales > valor_fob){
                    return 5;
                }
            }
            if((existe_exwork==1)&&(total_nacionales>parseFloat(valor_exwork))){
                return 6;
            }  
            return 2;
        }
        var importados = $('#check_insumosimportados').prop('checked');
        if(importados){
            var grid_imp = $("#tabla_insumosimportados").data("kendoGrid");
            var data_imp = grid_nac.dataSource;
            var numfilas_imp = data_imp.total();
            if(numfilas_imp!=0){
                var valores_imp = data_imp.data();
                var arr_imp = [];
                for (var i = 0; i < numfilas_imp; i++) {
                    total_importados = total_importados + valores_imp[i].valor;
                }
                if(existe_fob==1){
                    if(total_nacionales > valor_fob){
                        return 5;
                    }
                }
                if((existe_exwork==1)&&(total_importados>parseFloat(valor_exwork))){
                    return 6;
                }  
                return 2;
            }
        }
    }
    
    guardarddjj.bind("click", function(e){
        if(alta_ddjj.validate()){
            cambiar('revisardeclaracionjurada','firmaenvioddjjcompleta');
            generarPin('{$id_empresa}','{$id_persona}','4');
        }
    });
    
    cancelarddjj.bind("click", function(e){  
        remover(tabStrip.select());
    });

/*
    guardarddjj.bind("click", function(e){
        //almacenar todos los insumos nacionales
        var grid_nac = $("#tabla_insumosnacionales").data("kendoGrid");
        var data_nac = grid_nac.dataSource;
        var numfilas_nac = data_nac.total();
        if(numfilas_nac==0){
            alert("Debe colocar al menos un Insumo Nacional");
            return;
        }else{
            var valores_nac = data_nac.data();

            var arr_nac = [];
            for (var i = 0; i < numfilas_nac; i++) {
                var valores=valores_nac[i].descripcion+";"+valores_nac[i].fabricante+";"+valores_nac[i].telefono+";"+valores_nac[i].valor;
                arr_nac.push(valores);
            }
        }
        //capturar los datos del formulario y los insumos nacionales, enviar controlador y tarea
        var datos = $("#editar_ddjj").serialize()+"&opcion=admDeclaracionJurada&tarea=guardarDeclaracionJurada&tabla_nac="+arr_nac;
        
        //Verificar si hay Comercializadores
        var check_comerc = $('#check_comercializador').prop('checked');
        if(check_comerc){
            var grid_comerc = $("#tabla_comercializadores").data("kendoGrid");
            var data_comerc = grid_comerc.dataSource;
            var numfilas_comerc = data_comerc.total();
            var valores_comerc = data_comerc.data();

            var arr_comerc = [];
            for (var i = 0; i < numfilas_comerc; i++) {
                var valores=valores_comerc[i].razon_social+";"+valores_comerc[i].ci_nit+";"+valores_comerc[i].domicilio+";"+valores_comerc[i].representante_legal+";"+valores_comerc[i].direccion_fabrica+";"+valores_comerc[i].telefono+";"+valores_comerc[i].precio_venta+";"+valores_comerc[i].unidad_medida+";"+valores_comerc[i].produccion_mensual;
                arr_comerc.push(valores);
            }
            datos=datos+"&tabla_comerc="+arr_comerc;
        }

        //Verificar si hay Insumos Importados
        var check_import = $('#check_insumosimportados').prop('checked');
        if(check_import){
            var grid_import = $("#tabla_insumosimportados").data("kendoGrid");
            var data_import = grid_import.dataSource;
            var numfilas_import = data_import.total();
            var valores_import = data_import.data();

            var arr_import = [];
            for (var i = 0; i < numfilas_import; i++) {
                var valores=valores_import[i].descripcion+";"+valores_import[i].nandina+";"+valores_import[i].pais+";"+valores_import[i].productor+";"+valores_import[i].cuenta_co+";"+valores_import[i].acuerdo+";"+valores_import[i].valor;
                arr_import.push(valores);
            }
            datos=datos+"&tabla_import="+arr_import;
        }
                
        //Guardar los datos mediante ajax enviando al controlador
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: datos,
            success: function(data) {
                //alert("La Declaración Jurada fue Enviada.");
                remover(tabStrip.select());
            }
        });

    });
    
    cancelarddjj.bind("click", function(e){  
        remover(tabStrip.select());
    });
    */
    masasesoramiento.bind("click", function(e){
        ventana_masasesoramiento.open();
    });

    cancelarasesoramiento.bind("click", function(e){
        $('#observaciones').val('');
        ventana_masasesoramiento.close();
    });
    
    masasesoramientoddjj.bind("click", function(e){
        var masobservaciones = $('#masobservaciones').val();
        if(masobservaciones==''){
            alert("Debe colocar una Pregunta");
            return;
        }
        
        var datos = $("#editar_ddjj").serialize()+"&opcion=admDeclaracionJurada&tarea=enviarPreguntaAsesoramiento&id_declaracion_jurada="+{$ddjj->getId_ddjj()}+"&masobservaciones="+masobservaciones;
        //alert(datos);return;
        
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: datos,
            success: function(data) {
                //alert("El Pedido de Asesoramiento fue enviado");
                ventana_masasesoramiento.close();
                remover(tabStrip.select());
                $("#masobservaciones").val('');
            }
        });
        
    });
    
    $(document).ready(function(){
        //$('#check_comercializador').on('change', function(){
        $('#check_comercializador').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                $('#div_comercializador').fadeIn(1000);
            } else {
                $('#div_comercializador').fadeOut(1000);
            }  
        });

        $('#check_insumosimportados').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                $('#div_insumosimportados').fadeIn(1000);
            } else {  
                $('#div_insumosimportados').fadeOut(1000);
            }  
        });        
        
        $("#unidadmedida").kendoComboBox(
            {   placeholder:"Unidad de Medida",
                dataTextField: "descripcion",
                dataValueField: "id_unidad_medida",
                index: {$ddjj->getId_Unidad_Medida()-1},
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admUnidadMedida&tarea=listarUnidadMedida"
                        }
                    }
                }
        });

        $("#combocapitulos").kendoDropDownList({
            optionLabel:"Escoge el Capítulo",
            dataTextField: "descripcion_total",
            dataValueField: "id_capitulo",
            index: {$detalle_arancel->getId_capitulo()},
            dataSource: {
                transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admArancel&tarea=listarCapitulos"
                    }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }
            }
        }).data("kendoDropDownList");
        $("#combonandina").kendoDropDownList({
            cascadeFrom: "combocapitulos",
            optionLabel:"Clasificación Arancelaria - Descripción del Producto",
            dataTextField: "descripcion_total",
            dataValueField: "id_detalle_arancel",
            index: {$detalle_arancel->getId_Detalle_Arancel()},
            dataSource: {
                transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admArancel&tarea=listarArancelBoliviano"
                    }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }
            }
        }).data("kendoDropDownList");
        
        /*********** Tablas de la DDJJ ******/
        $("#tabla_comercializadores").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                       url: "index.php?opcion=admInsumos&tarea=listarComercializadores&id_declaracion_jurada="+{$ddjj->getId_ddjj()},
                       dataType: "json"
                    }
                },
                pageSize: 10
            },
            editable: true,
            scrollable: false,
            resizable: true,
            selectable: "simple",
            columns: [
                { field: "razon_social", title: "Nombre o Razón social"},
                { field: "ci_nit", title: "CI o NIT"},
                { field: "domicilio", title: "Domicilio Legal"},
                { field: "representante_legal", title: "Repr. Legal"},
                { field: "direccion_fabrica", title: "Dirección de Fábrica"},
                { field: "telefono", title: "Teléfono"},
                { field: "precio_venta", title: "Precio Venta a Exportador"},
                { field: "unidad_medida", title: "Unidad de medida"},
                { field: "produccion_mensual", title: "Cap. Producción Mensual"}
            ]
        });
        
        $("#tabla_insumosnacionales").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                       url: "index.php?opcion=admInsumos&tarea=listarInsumosNacionales&id_declaracion_jurada="+{$ddjj->getId_ddjj()},
                       dataType: "json"
                    }
                },
                pageSize: 10
            },

            editable: true,
            scrollable: false,
            resizable: true,
            selectable: "simple",
            columns: [
                { field: "descripcion", title: "Descripción"},
                { field: "fabricante", title: "Datos del Fabricante del Insumo"},
                { field: "telefono", title: "Teléfono del Fabricante"},
                { field: "valor", title: "Valor en $us"}
            ]
        });
        
        $("#tabla_insumosimportados").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                       url: "index.php?opcion=admInsumos&tarea=listarInsumosImportados&id_declaracion_jurada="+{$ddjj->getId_ddjj()},
                       dataType: "json"
                    }
                },
                pageSize: 10
            },
            editable: true,
            scrollable: false,
            resizable: true,
            selectable: "simple",
            columns: [
                { field: "descripcion", title: "Descripción"},
                { field: "nandina", title: "Código NANDINA"},
                { field: "pais", title: "País de Origen"},
                { field: "productor", title: "Productor (Razón Social)"},
                { field: "cuenta_co", title: "Cuenta C.O.", template: "<div style='position:relative'>"+
                    "<input type='radio' name='co' value='TRUE' />Si "+
                    "<input type='radio' name='co' value='FALSE' />No"+
                    "</div>"
                },
                { field: "acuerdo",/*
                    editor: function(container, options) {
                        $('<input name="' + options.field + '"/>').appendTo(container).kendoComboBox({
                            dataSource: {
                                type: "json",
                                transport: {
                                    read: 'index.php?opcion=admAcuerdo&tarea=listarAcuerdos'
                                }
                            },
                            
                            dataValueField: "id_acuerdo",
                            dataTextField: "sigla",
                            autobind: false
                        });
                    },*/
                    title: "Acuerdo Comercial"},
                { field: "valor", title: "Valor en $us"}
            ]
        });

        $("#combo_fabricas").kendoComboBox({
            placeholder:"Seleccione la Fábrica donde se elabora la mercancía",
            dataTextField: "fabricas",
            dataValueField: "id_fabrica",
            index: {$ddjj->getId_Fabrica()-1},
            filter: "contains",
            dataSource: {
                transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admEmpresa&tarea=listarFabricas"
                    }
                }
            }
        });
        
        //Combos para NALADISAS
        $("#naladisa93").kendoDropDownList({
            autoBind: false,
            cascadeFrom: "combocapitulos",
            optionLabel:"Escoger NALADISA 93",
            dataTextField: "descripcion_total",
            dataValueField: "id_detalle_arancel",
            dataSource: {
                transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admArancel&tarea=listarNaladisa&id_arancel=2"
                    }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }
            }
        });

        $("#naladisa96").kendoDropDownList({
            autoBind: false,
            cascadeFrom: "combocapitulos",
            optionLabel:"ESCOGER NALADISA 96",
            dataTextField: "descripcion_total",
            dataValueField: "id_detalle_arancel",
            dataSource: {
                transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admArancel&tarea=listarNaladisa&id_arancel=3"
                    }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }
            }
        });

        $("#naladisa2007").kendoDropDownList({
            autoBind: false,
            cascadeFrom: "combocapitulos",
            optionLabel:"Escoger NALADISA 2007",
            dataTextField: "descripcion_total",
            dataValueField: "id_detalle_arancel",
            dataSource: {
                transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admArancel&tarea=listarNaladisa&id_arancel=4"
                    }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }
            }
        });

        $("#naladisa91").kendoDropDownList({
            autoBind: false,
            cascadeFrom: "combocapitulos",
            optionLabel:"Escoger NALADISA 91",
            dataTextField: "descripcion_total",
            dataValueField: "id_detalle_arancel",
            dataSource: {
                transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admArancel&tarea=listarNaladisa&id_arancel=5"
                    }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }
            }
        });

        $("#naladi83").kendoDropDownList({
            autoBind: false,
            cascadeFrom: "combocapitulos",
            optionLabel:"ESCOGER NALADI 83",
            dataTextField: "descripcion_total",
            dataValueField: "id_detalle_arancel",
            dataSource: {
                transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admArancel&tarea=listarNaladisa&id_arancel=6"
                    }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }
            }
        });
        
    });  

    function agregarfilacomercializador(){
        var tabla_comercializadores = $("#tabla_comercializadores").data("kendoGrid");
        tabla_comercializadores.addRow();
    }

    function agregarfilainsumosnacionales(){
        var tabla_insumosnacionales = $("#tabla_insumosnacionales").data("kendoGrid");
        tabla_insumosnacionales.addRow();
    }
    
    function agregarfilainsumosimportados(){
        var tabla_insumosimportados = $("#tabla_insumosimportados").data("kendoGrid");
        tabla_insumosimportados.addRow();
    }
    
    function eliminarfilacomercializador(){
        var tabla_comercializadores = $("#tabla_comercializadores").data("kendoGrid");
        var currentDataItem = tabla_comercializadores.dataItem(tabla_comercializadores.select());
        var dataRow = tabla_comercializadores.dataSource.getByUid(currentDataItem.uid);
        tabla_comercializadores.dataSource.remove(dataRow);
    }
    
    function eliminarfilainsumosnacionales(){
        var tabla_insumosnacionales = $("#tabla_insumosnacionales").data("kendoGrid");
        var currentDataItem = tabla_insumosnacionales.dataItem(tabla_insumosnacionales.select());
        var dataRow = tabla_insumosnacionales.dataSource.getByUid(currentDataItem.uid);
        tabla_insumosnacionales.dataSource.remove(dataRow);
    }
    
    function eliminarfilainsumosimportados(){
        var tabla_insumosimportados = $("#tabla_insumosimportados").data("kendoGrid");
        var currentDataItem = tabla_insumosimportados.dataItem(tabla_insumosimportados.select());
        var dataRow = tabla_insumosimportados.dataSource.getByUid(currentDataItem.uid);
        tabla_insumosimportados.dataSource.remove(dataRow);
    }


    
var combonandina = $("#combonandina").data("kendoComboBox");

$("#otros_costos").kendoNumericTextBox({
    min:0
});
$("#valor_fob").kendoNumericTextBox({
    min:0,
    value:{$fob}
});
$("#valor_exwork").kendoNumericTextBox({
    min:0,
    value:{$exwork}
});
$("#produccion_mensual").kendoNumericTextBox({
    min:0,
    value:{$ddjj->getProduccion_mensual()}
});





</script>
       