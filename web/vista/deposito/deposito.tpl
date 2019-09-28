<div class="row-fluid " id="ingresarDepositos">
    <div class="span12" >
        <div class="row-fluid" >
            <div class="span1 hidden-phone" ></div>
            <div class="span10">
                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" > Registrar Depósitos </div>  
                            </div>                                      
                        </div>  
                    </div>
                    
                    <div class="row-fluid  form" id="divDepositos" >
                        <form name="formdeposito" id="formdeposito" method="post"  action="index.php" >
                            <input type="hidden" name="opcion" id="opcion" value="admDeposito" />
                            <input type="hidden" name="tarea" id="tarea" value="registrarDeposito" />
                            <input type="hidden" name="id_proforma" id="id_proforma" value="{$id_proforma}" />
                            <div class="row-fluid  form" >
                                <div class="span2 hidden-phone" ></div>
                                <div class="span8" >
                                    <fieldset class="row-fluid  form">
                                        <legend>Adicionar Depositos</legend>
                                        <div id="tabla_depositos" class="fadein"></div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row-fluid  form" >
                                <div class="span2 hidden-phone" ></div>
                                <div class="span8" >
                                    <input id="addfiladepositos" type="button" value="+" class="k-primary" style="width:40" onclick="agregarfiladepositos();"/> 
                                    <input id="elimfiladepositos" type="button" value="-" class="k-primary" style="width:40" onclick="eliminarfiladepositos();"/> 
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="row-fluid fadein" >
                        <div class="span2"></div>
                        <div class="span2"></div>
                        <div class="span2" >
                           <input id="cancelar" type="button" value="Cancelar" class="k-primary" style="width:100%"/>
                        </div>
                        <div class="span2" >
                            <input id="registrar" type="button"  value="Registrar" class="k-primary" style="width:100%">
                        </div>
                    </div>
                    
                    <!--div class="k-header k-headerrojo"><div class="tituloblanco"></div></div-->
                    <!--div class="k-cuerpo">  

                        <form id="formdeposito" method="post" action="index.php">
                            <input type="hidden" name="opcion" id="opcion" value="admDeposito" />
                            <input type="hidden" name="tarea" id="tarea" value="registrarDeposito" />

                            <input type="hidden" name="id_proforma" id="id_proforma" value="{$id_proforma}" />
                            <div id="campos">
                                <div class="row-fluid " name="campo[]">
                                     <div class="span1"></div>
                                    <div class="span3" >
                                        <input  class="k-textbox " id="fecha_deposito" type="date" name="fecha_deposito[]"   placeholder="fecha deposito 1" required="true" size="40" maxlength="70" title="fecha_deposito">
                                    </div>
                                    <div class="span3" >
                                        <input  class="k-textbox " id="monto_deposito" type="text" name="monto_deposito[]"   placeholder="monto deposito 1" required="true" size="40" maxlength="70" title="monto_deposito"><br><br>
                                    </div>
                                    <div class="span3" >
                                        <input  class="k-textbox "id="codigo_deposito" type="text" name="codigo_deposito[]"   placeholder="codigo deposito 1" required="true" size="40" maxlength="70" title="codigo_deposito"><br><br>
                                    </div>
                                     <div class="span1" >
                                        <img src="styles/img/add.ico" id="cagregar" alt="adicionar otro deposito" onclick="agregar(this.id)" height="28" width="28">
                                    </div>


                                </div>

                            </div>

                            <div class="row-fluid fadein" >
                                <div class="span2"></div>
                                <div class="span2" ></div>
                                <div class="span2" >
                                   <input id="cancelar" type="button" value="Cancelar" class="k-primary" style="width:100%"/>
                                </div>
                                <div class="span2" >
                                    <input id="registrar" type="button"  value="Registrar" class="k-primary" style="width:100%">
                                </div>

                            </div>
                        </form> 
                    </div-->   
                </div>
            </div>
        </div>
    </div> 
</div>      


<div class="row-fluid fadein"  id="firmarDepositos" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header">
                <div class="titulo">Firma Digital de Depositos</div>
            </div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico que la empresa <span class="letrarelevante">"{$empresa_temporal->razon_social}"</span> 
                        con <span class="letrarelevante">RUEX: BO{$empresa_temporal->ruex}</span>.</p> 
                    <p> Por consiguiente doy fe que los depositos son correctos.</p> 

                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmaDepositos" id="formfirmaDepositos" method="post"  action="index.php" >
                <!--input type="hidden" name="opcion" id="opcion" value="admDeposito" />
                <input type="hidden" name="tarea" id="tarea" value="registrarDeposito" /-->
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                       class="k-textbox " placeholder="Pin" name="pinfirmardepositos"  id="pinfirmardepositos" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmarruex /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="bcancelafirmadepositos" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="bfirmardepositos" type="button"  value="Firmar Depositos" class="k-primary" style="width:100%"/>
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
                                   <h2> Se a realizado exitosamente el registro de su(s) Deposito(s), porfavor esperar la confirmacion y validacion </h2>
                                   <!--h3>Datos de su(s) Deposito(s) </h3-->
                                    <!--p> Empresa :{$empresa}</p-->
                                    <span id="respfact"></span>
                                </div>  
                               <div class="span1 hidden-phone" ></div>
                        </div> 
                    </div>   
                </div>
            </div>
            <div class="span1 hidden-phone" >

            </div>
        </div>
    </div> 
</div>            
                            
                            
          
<script> 
    var dato='';
    ocultar("firmarDepositos");
    ocultar("avisook");
    $("#registrar").kendoButton();
    $("#cancelar").kendoButton();
    
    $(document).ready(function(){
        $("#tabla_depositos").kendoGrid({
            dataSource: dataDepositos,
            editable: true,
            scrollable: false,
            resizable: true,
            selectable: "simple",
            columns: [
                { field: "ndeposito", title: "Nro Depósito"},
                { field: "fdeposito", title: "Fecha del Depósito"},
                { field: "mtdeposito", title: "Monto del Depósito"}
               
            ]
        }).data("kendoGrid");
    });
    var dataDepositos = new kendo.data.DataSource({
        schema: {
            model: {
                id: "id_deposito",
                fields: {
                    ndeposito: {
                        type: "number",
                        validation: {
                            required: true,
                            min: 0,
                            ndepositovalidation: function (input) {
                                if (input.is("[name='ndeposito']") && input.val() == "0") {
                                    input.attr("data-ndepositovalidation-msg", "Debe ingresar un Número del Depósito");
                                    return /^[a-zA-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },
                    {literal}
                    fdeposito: {
                        type: "string",
                        defaultValue:"",
                        
                        validation: {
                            required: true,
                            fdepositovalidation: function (input) {
                               //validatePass(input);
                                if (input.is("[name='fdeposito']") && input.val() == "") {
                                    input.attr("data-dfdepositovalidation-msg", "Debe ingresar la Fecha del Depósito");
                                    return /^\d{1,2}\/\d{1,2}\/\d{2,4}/.test(input.val());
                                }
                                /*if(input.val()!=="^\d{2}\/\d{2}\/\d{4}$"){
                                    input.attr("data-fdepositovalidation-msg", "Debe ingresar en el formato dd/mm/AAAA");
                                    return /^\d{1,2}\/\d{1,2}\/\d{2,4}/.test(input.val());
                                }*/
                                return true;
                            }
                        }
                    },
                   
                    {/literal}
                    motdeposito: {
                        type: "number",
                        validation: {
                            required: true,
                            min: 0,
                            motdepositovalidation: function (input) {
                                if (input.is("[name='motdeposito']") && input.val() == "0") {
                                    input.attr("data-motdepositovalidation-msg", "Debe ingresar el Monto del Depósito");
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    }
                }
            }
        }
    });
    //ocultar("divDepositos");
    $("#addfiladepositos").kendoButton();
    $("#elimfiladepositos").kendoButton();
    
    
    function agregarfiladepositos(){
        var tabla_depositos = $("#tabla_depositos").data("kendoGrid");
        tabla_depositos.addRow();
    }
    function eliminarfiladepositos(){
        var tabla_depositos = $("#tabla_depositos").data("kendoGrid");
        var currentDataItem = tabla_depositos.dataItem(tabla_depositos.select());
        var dataRow = tabla_depositos.dataSource.getByUid(currentDataItem.uid);
        tabla_depositos.dataSource.remove(dataRow);
    }    
//***************************************************************************************//
    var num = 1;
    var registrar = $("#registrar").data("kendoButton");
    var cancelar = $("#cancelar").data("kendoButton"); 
    
    cancelar.bind("click", function(e){  
       cerraractualizartab('Facturar','admProForma','Proforma_deuda');
        //cerraractualizartab('Facturar','admProForma','buscar_empresa&id_empresa='+$("#id_empresa").val());
    });
    registrar.bind("click", function(e){  
        
        //dato=$("#formdeposito").serialize();
       // cerraractualizartab('pruebas Depositos','admDeposito','prueba&'+$("#formdeposito").serialize()+datos);
        cambiar('ingresarDepositos','firmarDepositos');
        generarPin({$id_empresa},{$id_persona},'1');   
    });
    
/*****************************************************************************************/
    $("#bcancelafirmadepositos").kendoButton();
    $("#bfirmardepositos").kendoButton();
    var bcancelafirmadepositos = $("#bcancelafirmadepositos").data("kendoButton");
    var bfirmardepositos = $("#bfirmardepositos").data("kendoButton");
    
    bcancelafirmadepositos.bind("click", function(e){   
        cambiar('firmarDepositos','ingresarDepositos');
        borrarPin('{$nombre}');
    });
    bfirmardepositos.bind("click", function(e){  
         //var datos="&fechas="+fechas+"&montos="+montos+"&codigos="+codigos;
         //cerraractualizartab('pruebas Depositos','admDeposito','prueba&'+$("#formdeposito").serialize());
        var grid_import = $("#tabla_depositos").data("kendoGrid");
        var data_import = grid_import.dataSource;
        var numfilas_import = data_import.total();
        var valores_import = data_import.data();

        var arr_import = [];
        for (var i = 0; i < numfilas_import; i++) {
            var valores='&codigo_deposito['+[i]+']='+valores_import[i].ndeposito+
                        '&fecha_deposito['+[i]+']='+valores_import[i].fdeposito+
                        '&monto_deposito['+[i]+']='+valores_import[i].mtdeposito;
            arr_import.push(valores);
        }
        var datos=$('#formdeposito').serialize()+arr_import;
        //alert($("#formdeposito").serialize()+'$'+datos);
        
        $.ajax({
             type: 'post',
             url: 'index.php',
             data: datos,
             success: function (data) {
                 //alert(data);
                    
                    //
                    //cerraractualizartab('Revision Depositos','admDeposito','registrarDeposito');
                    cambiar('firmarDepositos','avisook');
                   // window.open("index.php?tarea=admDeposito&tarea=certificadoPDF&id_empresa="+{$id_empresa}+"&id_proforma="+id_proforma+'&id_factura='+data,'factura','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=no,resizable=yes');
                    $("#respfact").html(data);
             }
         });  
    });
    
    function agregar() {
       num++;
        campo = '<div class="row-fluid " name="campo[]">'+
                    '<div class="span1"></div>'+
                     
                    ' <div class="span3" >'+
                        '<input class="k-textbox " id="fecha_deposito" type="date" name="fecha_deposito[]"   placeholder="fecha deposito '+num+'" required="true"  title="fecha_deposito">'+
                    '</div>'+
                    '<div class="span3" >'+
                        '<input class="k-textbox " id="monto_deposito" type="text" name="monto_deposito[]"   placeholder="monto deposito '+num+'" required="true" title="monto_deposito"><br><br>'+
                    '</div>'+
                    '<div class="span3" >'+
                         '<input class="k-textbox " id="codigo_deposito" type="text" name="codigo_deposito[]"   placeholder="codigo deposito '+num+'" required="true"  title="codigo_deposito"><br><br>'+
                    '</div>'+
                    '<div class="span1" >'+
                        '<img src="styles/img/delete.ico" id="celiminar" alt="eliminar campos de deposito" style="cursor: pointer;" onclick="eliminar(this)" height="28" width="28">'+
                    '</div>'+
                 '</div>';
         
        $("#campos").append(campo);
            
    }
    function eliminar(elem){
        
        $(elem).parent().parent().remove()
    }
/*********************************************************************************************************************/
    /*-----------esto es para la valicdacion del pin*****************************************/
    var swfirmaDepositos=2;        
    var firmaDepositoscache='';
    var formfirmaDepositos = $("#formfirmaDepositos").kendoValidator({
       rules:{ 
           formfirmadepositos: function(input) { 
             var validate = input.data('bfirmardepositos');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    if (firmaDepositoscache !== $("#pinfirmardepositos").val()) 
                     {
                    verificarPinDepositos($("#pinfirmardepositos").val());                    
                    return false;
                    }
                    if(swfirmaDepositos==1)
                    {
                         return true;
                    }
                    if(swfirmaDepositos==0)
                    {  
                        return false;
                    }  
                    return false;
                }
               
               return true;
           }
       },
       messages:{
            formfirmadepositos: function(input) { 
                if(swfirmaDepositos==0)
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
       function verificarPinDepositos(pin_insertado)
        {
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
                success: function (data) {    
                    swfirmaDepositos=data;
                   firmaDepositoscache=$("#pinfirmardepositos").val();
                   formfirmaDepositos.validateInput($("#pinfirmardepositos"));
                 }
            }); 
        }
</script>  