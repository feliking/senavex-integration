<div class="row-fluid " id="ingresarCafe">
    <div class="span12" >
        <div class="row-fluid" >
            <div class="span1 hidden-phone" >
            </div>
            <div class="span10">

                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" > Revisar Certificado del Cafe </div>  
                            </div>                                      
                        </div>  
                    </div>
                    <form name="formCafe" id="formCafe" method="post"  action="index.php" >
                        <input type="hidden" name="opcion" id="opcion" value="admCafe" />
                        <input type="hidden" name="tarea" id="tarea" value="validate_cafe" />
                        <input type="hidden" name="id_cafe" id="id_cafe" value="{$id_cafe}" />
                        <div class="k-cuerpo">  
                            <div class="row-fluid form" >
                                <div class="span2 parametro" >
                                    Importador :
                                </div>
                                <div class="span8 campo" >
                                    {$oic[0]}
                                </div>
                            </div>
                            <div class="row-fluid form" >
                                <div class="span3 parametro" >
                                    Direccion para notificaciones
                                </div>
                                <div class="span8 campo" >
                                     {$oic[1]}
                                </div>
                            </div>
                            <div class="row-fluid form" >
                                <div class="barra" >                                         
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                <div class="span2 parametro" >
                                    Pais :
                                </div>
                                <div class="span3 campo" >
                                    {$oic[2]}
                                </div>
                                <div class="span3 parametro" >
                                    Puerto de embarque :
                                </div>
                                <div class="span2 campo" >
                                    {$oic[3]}
                                </div>
                            </div>
                            <div class="row-fluid form" >
                                <div class="barra" >                                         
                                </div> 
                            </div> 
                            <div class="row-fluid form" >
                                 <div class="span2 parametro" >
                                    Pais Productor :
                                </div>
                                <div class="span3 campo" >
                                   {$oic[4]}
                                </div>

                                <div class="span3 parametro" >
                                    Fecha de Exportación :
                                </div> 
                                <div class="span2 campo" >
                                    {$oic[5]}
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                 <div class="span2 parametro" >
                                    Pais Destino :
                                </div>
                                <div class="span3 campo" >
                                    {$oic[6]}
                                </div>

                                <div class="span3 parametro" >
                                    Pais Transbordo :
                                </div> 
                                <div class="span2 campo" >
                                    {$oic[7]}
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                 <div class="span2 parametro" >
                                    Medio de Transporte :
                                </div>
                                <div class="span3 campo" >
                                    {$oic[8]}
                                </div>

                                <div class="span3 parametro" >
                                    Marcas :
                                </div> 
                                <div class="span2 campo" >
                                    {$oic[9]}
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                 <div class="span2 parametro" >
                                    Otras Marcas :
                                </div>
                                <div class="span4 campo" >
                                    {$oic[10]}
                                </div>

                                <div class="span2 parametro" >
                                    Embalaje :
                                </div> 
                                <div class="span2 campo" >
                                    {$oic[11]}
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                 <div class="span2 parametro" >
                                    Peso Neto :
                                </div>
                                <div class="span3 campo" >
                                    {$oic[12]}
                                </div>

                                <div class="span3 parametro" >
                                    Unidad de Peso :
                                </div> 
                                <div class="span2 campo" >
                                   {$oic[13]}
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                <div class="barra" >                                         
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                 <div class="span3 parametro" >
                                    Descripcion del Cafe :
                                </div>
                                <div class="span3 campo" >
                                    {$oic[14]}
                                </div>
                            </div>
                            <div class="row-fluid form" >
                                <div class="barra" >                                         
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                <div class="span7 parametro" >
                                    Metodo de elaboracion
                                </div> 
                            </div>

                            <div class="row-fluid form" >
                                <div class="span3 parametro" >
                                    Descafeinado :
                                </div> 
                                <div class="span1 campo" >
                                    {$oic[15]}
                                </div> 
                                <div class="span3 parametro" >
                                    Organico :
                                </div> 
                                <div class="span2 campo" >
                                    {$oic[16]}
                                </div>
                            </div>
                            <div class="row-fluid form" >
                                <div class="span3 parametro" >
                                    Cafe Verde :
                                </div> 
                                <div class="span2 campo" >
                                    {$oic[17]}
                                </div>
                                <div class="span2 parametro" >
                                    Cafe Soluble :
                                </div> 
                                <div class="span2 campo" >
                                    {$oic[18]}
                                </div>
                            </div>
                            <div class="row-fluid form" >
                                <div class="barra" >                                         
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                <div class="span4 parametro" >
                                    Norma Optima de calidad del cafe verde :
                                </div> 
                                <div class="span8 campo" >
                                     {$oic[19]}
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                <div class="barra" >                                         
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                <div class="span4 parametro" >
                                    Caracteristicas Especiales :
                                </div> 
                                <div class="span4 campo" >
                                    {$oic[20]}
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                <div class="span4 parametro" >
                                    Codigo Armonizado :
                                </div> 
                                <div class="span5 campo" >
                                    {$oic[21]}
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                <div class="span4 parametro" >
                                    Valor FOB del embarque :
                                </div> 
                                <div class="span2 campo" >
                                    {$oic[22]}
                                </div> 
                                <div class="span2 parametro" >
                                    Moneda :
                                </div> 
                                <div class="span2 campo" >
                                     {$oic[23]}
                                </div> 
                            </div>
                             <div class="row-fluid form" >
                                <div class="span4 parametro" >
                                    tipo de Cambio :
                                </div> 
                                <div class="span2 campo" >
                                     {$oic[25]}
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                <div class="barra" >                                         
                                </div> 
                            </div>
                            <div class="row-fluid form" >
                                <div class="span2 parametro" >
                                    Informacion Adicional:
                                </div> 
                                <div class="span9 campo" >
                                    {$oic[24]}
                                </div> 
                            </div>
                                
                            {if $revision==0}
                            <!--div class="row-fluid form" >
                                <div class="span7 parametro" >
                                    Observaciones(no obligatorio)
                                </div> 

                            </div>
                            <div class="row-fluid form" >
                               <textarea rows="3" cols="50" class="k-textbox " placeholder="Observaciones del rechazo, u otros observaciones para el exportador" name="dir_notyn" id="dir_notyn"></textarea>
                            </div-->
                            {/if}
                            
                            <div class="row-fluid fadein" >
                                <div class="span3"></div>
                                <div class="span2" >
                                   <input id="cancelar" {if $revision == 1 } type="hidden" {else} type="button"{/if} value="Cancelar" class="k-primary" style="width:100%"/>
                                </div>
                                <div class="span2" >
                                   <input id="rechazar" {if $revision == 1 } type="hidden" {else} type="button"{/if}value="Rechazar" class="k-primary" style="width:100%"/>
                                </div>
                                <div class="span2" >
                                    <input id="registrar" {if $revision == 1 } type="hidden" {else} type="button"{/if} value="Validar" class="k-primary" style="width:100%">
                                </div>
                                <div class="span2" >
                                    <input id="imprimir" {if $imprimir == 0 } type="hidden" {else} type="button"{/if} value="Imprimir" class="k-primary" style="width:100%">
                                </div>
                            </div>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>      
<div id="rechazo">
    <form name="form_rechazo" id="form_rechazo" method="post" action="index.php">
        <div class="titulo">Motivo del Rechazo</div><br>
        <div class="row-fluid form">
            <textarea rows="2" cols="30" class="k-textbox " placeholder="Motivo del Rechazo" name="motivo_rechazo" id="motivo_rechazo"></textarea>
            <br><br>
        </div>
        <div class="row-fluid form">
            <input id="agregarrechazo" type="button"  value="Enviar" class="k-primary" style="width:40"/> 
            <input id="cancelarrechazo" type="button"  value="Cancelar" class="k-primary" style="width:40"/> 
        </div>
    </form>
</div> 

<div class="row-fluid fadein"  id="firmarCafe" >
       <div class="k-block fadein">
                <div class="k-header">
                    <div class="k-header">
                        <div class="titulo">Firma Digital del Cafe</div>
                    </div>
                </div>
                <div class="k-cuerpo"> 
                    <div class="row-fluid  form" >
                        <div class="span1" > </div>
                        <div class="span10" >
                                <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico que el certificado del CAFE </span> 
                                no presenta ninguna observacion</p> 
                        </div>  
                        <div class="span1" ></div>
                    </div> 
                    <form name="formfirmaCafe" id="formfirmaCafe" method="post"  action="index.php" >
                        <div class="row-fluid  form" >
                            <div class="span5" ></div>
                            <div class="span2" >
                                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                               class="k-textbox " placeholder="Pin" name="pinfirmarcafe"  id="pinfirmarcafe" maxlength="4" size="4" style="width:50px;"
                               required data-required-msg="Por favor ingrese su Pin." data-firmarruex /> 
                            </div>  
                            <div class="span5" ></div>
                        </div>  
                        <div class="row-fluid  form" >
                            <div class="span4 hidden-phone" >
                             </div>
                             <div class="span2 " >
                                 <input id="bcancelafirmacafe" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                             </div> 
                             <div class="span2 " >
                                 <input id="bfirmarcafe" type="button"  value="Firmar Cafe" class="k-primary" style="width:100%"/>
                             </div> 
                             <div class="span4 hidden-phone" >
                                 
                             </div>
                            
                         </div> 
                    </form> 
                </div>   
      </div>              
</div>
<div class="row-fluid " id="avisook">
    <div class="span12" >
        <div class="row-fluid" >
            <div class="span1 hidden-phone" >
            </div>
            <div class="span10">

                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" >REGISTRO EXITOSO </div>  
                            </div>                                      
                        </div>  
                    </div>
                    <!--div class="k-header k-headerrojo"><div class="tituloblanco"></div></div-->
                    <div class="k-cuerpo">  
                        <div class="row-fluid  form" >
                               <div class="span1 hidden-phone" ></div>
                               <div class="span10" >
                                   <h2> Se a realizado exitosamente la revision del Certificado del Cafe </h2>
                                </div>  
                        </div> 
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
<script> 
    var dato='';
    ocultar("firmarCafe");
    ocultar("avisook");
    $("#registrar").kendoButton();
    $("#cancelar").kendoButton();
    $("#rechazar").kendoButton();
    $("#imprimir").kendoButton();
    var num = 1;
    var validar = $("#registrar").data("kendoButton");
    var rechazar = $("#rechazar").data("kendoButton");
    var cancelar = $("#cancelar").data("kendoButton"); 
    var imprimir = $("#imprimir").data("kendoButton"); 
    validar.bind("click",function(e){
        cambiar('ingresarCafe','firmarCafe');
        dato=$("#formCafe").serialize()+"&validado=1";
        //cerraractualizartab("Revision OIC",'admCafe','validate_cafe&'+dato);
        generarPin('{$id_empresa}','{$id_persona}','1');
    });
    rechazar.bind("click",function(e){
        rechazo.open();
       /*cambiar('ingresarCafe','firmarCafe');
       dato=$("#formCafe").serialize()+"&validado=0";
       generarPin('{$id_empresa}','{$id_persona}','1');*/
       //cerraractualizartab("Revision OIC",'admCafe','validate_cafe&'+dato);
    });
    cancelar.bind("click",function(e){
         remover(tabStrip.select());
    });
    imprimir.bind("click",function(e){
         window.open("index.php?opcion=admCafe&tarea=print_cafe&id_cafe="+$("#id_cafe").val(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
    });
    /*cancelar.bind("click", function(e){  
        //Scerraractualizartab('Facturar','admProForma','Proforma_deuda');
    });
    validar.bind("click", function(e){  
        dato=$("#formCafe").serialize()+"&validado=1";
        cerraractualizartab('Revision OIC','admCafe','validarCafe&'+dato);
        //cambiar('ingresarCafe','firmarCafe');
        //generarPin('{$id_empresa}','{$id_persona}','1');   
    });
    rechazar.bind("click", function(e){  
        dato=$("#formCafe").serialize()+"&validado=0";
        cerraractualizartab('Revision OIC','admCafe','validarCafe&'+dato);
        /*cambiar('ingresarCafe','firmarCafe');
        generarPin('{$id_empresa}','{$id_persona}','1');   
    });*/
/*****************************************************************************************/
    //$("#addimportador").kendoButton();
    $("#agregarrechazo").kendoButton();
    $("#cancelarrechazo").kendoButton();
    
    var agregarrechazo = $("#agregarrechazo").data("kendoButton");
    var cancelarrechazo = $("#cancelarrechazo").data("kendoButton");
    //var addimportador = $("#addimportador").data("kendoButton");
    var form_rechazo = $("#form_rechazo").kendoValidator({}).data("kendoValidator");
 
   /* addimportador.bind("click", function(e){
        importador.open();
    });*/
    
    var rechazo = $("#rechazo").kendoWindow({
          draggable: true,
          height: "220px",                      
          width: "410px",
          resizable: true,
          modal: true,
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
    rechazo.center(); 
    
    cancelarrechazo.bind("click", function(e){
        $("#form_rechazo")[0].reset();
        rechazo.close();
    });
    agregarrechazo.bind("click", function(e){
        cambiar('ingresarCafe','firmarCafe');
        dato=$("#formCafe").serialize()+"&validado=0&"+$("#form_rechazo").serialize();
       //alert(dato);
        generarPin('{$id_empresa}','{$id_persona}','1');
        rechazo.close();
    });
/*****************************************************************************************/

    $("#bcancelafirmacafe").kendoButton();
    $("#bfirmarcafe").kendoButton();
    var bcancelafirmacafe = $("#bcancelafirmacafe").data("kendoButton");
    var bfirmarcafe = $("#bfirmarcafe").data("kendoButton");
    
    bcancelafirmacafe.bind("click", function(e){   
        cambiar('firmarCafe','ingresarCafe');
        borrarPin('{$nombre}');
    });
    bfirmarcafe.bind("click", function(e){  
         //var datos="&fechas="+fechas+"&montos="+montos+"&codigos="+codigos;

       $.ajax({
            type: 'post',
            url: 'index.php',
            data: dato,
            success: function (data) {
                   //cerraractualizartab('Revision Depositos','admDeposito','registrarDeposito');
                   cambiar('firmarCafe','avisook');
                   $("#respfact").html(data);
                    }
            });  
    });
/********************************************************************************************/
    /*-----------esto es para la valicdacion del pin*****************************************/
    var swfirmaCafe=2;        
    var firmaCafecache='';
    var formfirmaCafe = $("#formfirmaCafe").kendoValidator({
       rules:{ 
           formfirmacafe: function(input) { 
             var validate = input.data('bfirmarcafe');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    if (firmaCafecache !== $("#pinfirmarcafe").val()) 
                     {
                    verificarPinCafe($("#pinfirmarcafe").val());                    
                    return false;
                    }
                    if(swfirmaCafe==1)
                    {
                         return true;
                    }
                    if(swfirmaCafe==0)
                    {  
                        return false;
                    }  
                    return false;
                }
               
               return true;
           }
       },
       messages:{
            formfirmacafe: function(input) { 
                if(swfirmaCafe==0)
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
       function verificarPinCafe(pin_insertado)
        {
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
                success: function (data) {    
                    swfirmaCafe=data;
                   firmaCafecache=$("#pinfirmarcafe").val();
                   formfirmaCafe.validateInput($("#pinfirmarcafe"));
                 }
            }); 
        }
</script> 