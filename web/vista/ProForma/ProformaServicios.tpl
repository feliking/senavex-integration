

<div class="row-fluid  form" id="mostrarProforma" >
    <div class="row-fluid "  >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > SERVICIOS A FACTURAR </div>  
                        </div>                                      
                    </div>  
                </div>
                <div class="row-fluid  form" >
                    
                    <div class="span2 parametro" >
                        <center><b>FECHA SOLICITUD</b></center>
                    </div> 
                    <!--div class="span2 parametro" >
                        <center><b>ESTADO</b></center>
                    </div-->     
                    <div class="span3 parametro" >
                        <center><b>TIPO</b></center>
                    </div> 
                    <div class="span2 parametro" >
                        <center><b>DESCRIPCION</b></center>
                    </div>     
                    <div class="span2 parametro" >
                        <center><b>ACUERDOS</b></center>
                    </div>  
                    <div class="span1 parametro" >
                        <center><b>COSTO Bs</b></center>
                    </div>  
                    
                </div>
                <form name="formSelectServicios" id="formSelectServicios" method="post"  action="index.php" >
                    <input type="hidden" name="opcion" id="opcion" value="admProForma" />
                    <!--input type="hidden" name="tarea" id="tarea" value="generarProforma" /-->
                    <input type="hidden" name="tarea" id="tarea" value="facturar" />
                    <input type="hidden" name="id_empresa" id="id_empresa" value="{$id_empresa}" />
                    <input type="hidden" name="id_persona" id="id_persona" value="{$id_persona}" />
                    <input type="hidden" name="id_proforma" id="id_proforma" value="{$id_proforma}" />
                    {foreach from=$listaServicios item=array}
                    <div class="row-fluid  form" >
                        
                        <div class="span2 campo" >
                           <center>{$array[3]}</center>
                        </div> 
                        <!--div class="span2 campo" >
                            <center>
                            {if $array[2]==false}
                             Aprobado
                            {else}
                             Rechazado
                            {/if}
                            </center>
                        </div-->     
                        <div class="span3 campo" >
                           <center>{$array[4]}</center>
                        </div> 
                        <div class="span2 campo" >
                            <center>{$array[6]}</center>
                        </div>
                        <div class="span2 campo" >
                            <center>{if ($array[5]|@count) >0 }
                                {assign var="acuerdos" value=$array[5]}
                                {section name=value loop=$acuerdos}
                                    
                                    {$acuerdos[value]} &nbsp;
                                {/section}
                                    
                                {else} --------- {/if} </center>
                        </div>  
                        <div class="span1 parametro" >
                            <center>{$array[1]}</center>

                        </div>
                            <div class="span1 parametro">
                                <center><input class='servicios' type="checkbox" name="servicios[{$array[0]}]" value="{$array[0]}" onclick='total({$array[1]},this.checked)'></center>
                            </div>
                    </div>
                    {/foreach} 
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div>   
                    <div class="row-fluid  form" >
                        <div class="span1 parametro" >

                        </div> 
                        <div class="span2 parametro" >

                        </div>     
                        <div class="span3 parametro" >

                        </div> 
                        <div class="span2 parametro" >
                            <center><b>TOTAL Bs: </b></center>
                        </div>     
                        <div class="span1 parametro" >
                            <center><div id="total" >0</div></center>
                        </div>  

                    </div>
                    <div class="row-fluid  form" >
                        <div class="span4 hidden-phone" >
                        </div>
                        <div class="span4 hidden-phone" >
                        </div>
                        <div class="span2 " >
                            <input id="facturar" class="Facturar" type="button"  value= "Facturar" class="k-primary" style="width:100%"/>
                        </div> 
                    </div> 
                </form>
                
            </div>
        </div>                     
    </div>
</div>
    <div class="row-fluid " id="aviso">
        <div class="span12" >
            <div class="row-fluid" >
                <div class="span1 hidden-phone" >
                </div>
                <div class="span10">

                    <div class="k-block fadein">
                        <div class="k-header">
                            <div class="row-fluid  form" >
                                <div class="span12" >
                                    <div class="titulonegro" > FACTURA  </div>  
                                </div>                                      
                            </div>  
                        </div>

                        <div class="k-cuerpo">  
                            <div class="row-fluid  form" >
                                <div class="span1 hidden-phone" ></div>
                                <div class="span10" >
                                    Sr Exportador, Usted debe realizar un deposito de Bs <span id="respProf"></span>, a la cuenta 1-0000003433658 del Banco Union 
                                 </div>  
                                <div class="span1 hidden-phone" ></div>
                            </div> 
                            <form id="formaviso" method="post" action="index.php">

                                <div class="row-fluid  form" >
                                    <input type="button" id="cerrar_aviso" value="Aceptar">
                                      <input type="button" id="deposito" value="Ingresar Deposito">
                                </div>
                            </form>
                        </div>   
                    </div>
                </div>
                <div class="span1 hidden-phone" >

                </div>
            </div>
        </div> 
    </div>        
    <div class="row-fluid fadein"  id="firmarProforma" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="k-header">
                    <div class="titulo">Firma Digital Proforma</div>
                </div>
            </div>
            <div class="k-cuerpo"> 
                <div class="row-fluid  form" >
                    <div class="span1" > </div>
                    <div class="span10" >
                        <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, deseo realizar la facturacion de los servicios listados</p>
                        <p>por consiguiente doy fe y deseo seguir con la transaccion</p>
                    </div>
                    <div class="span1" ></div>
                </div>
                <form name="formfirmaProforma" id="formfirmaProforma" method="post"  action="index.php" >
                    <!--input type="hidden" name="opcion" id="opcion" value="admDeposito" />
                    <input type="hidden" name="tarea" id="tarea" value="registrarDeposito" /-->
                    <div class="row-fluid  form" >
                        <div class="span5" ></div>
                        <div class="span2" >
                            <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                            class="k-textbox " placeholder="Pin" name="pinfirmarProforma"  id="pinfirmarProforma" maxlength="4" size="4" style="width:50px;"
                            required data-required-msg="Por favor ingrese su Pin." data-firmarruex />
                        </div>
                        <div class="span5" ></div>
                    </div>
                    <div class="row-fluid  form" >
                        <div class="span4 hidden-phone" >
                        </div>
                        <div class="span2 " >
                            <input id="bcancelafirmaProforma" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                        </div>
                        <div class="span2 " >
                            <input id="bfirmarProforma" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                        </div>
                        <div class="span4 hidden-phone" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script> 
/***************************************************************************/
    
 /***************************************************************************/
    $("#facturar").kendoButton();
    $("#cerrar_aviso").kendoButton();
    $("#deposito").kendoButton();
    
    ocultar('aviso');
    ocultar('firmarProforma');
    
    var facturar = $("#facturar").data("kendoButton");
    var cerrar_aviso = $("#cerrar_aviso").data("kendoButton");
    var deposito = $("#deposito").data("kendoButton");
    
    
    
    facturar.bind("click", function(e){ 
       
        if(parseFloat($("#total").text()) > 0.0){
            generarPin('{$id_empresa}','{$id_persona}','1');   
            cambiar('mostrarProforma','firmarProforma');
            //mostrar('divDepositos');
        }else{
            alert("Seleccione al menos Un servicio para facturar");
        }
       
    });
    cerrar_aviso.bind("click", function(e){ 
        remover(tabStrip.select());
        
    });
    
    deposito.bind("click", function(e){ 
        //alert($('#formSelectServicios').serialize());
        cerraractualizartab('Ingresar Depositos','admDeposito','depositoIngresar&id_persona='+{$id_persona}+'&id_proforma='+$('#id_proforma').val());
    });
     //cerraractualizartab("deposito",'admDeposito','registrar');

    function total(monto,estado){
        var total=(estado? 1.0: -1.0)*parseFloat(monto)+(parseFloat($("#total").text()));
        $("#total").text(total.toFixed(2));
        $("#respProf").text(total.toFixed(2));
    }
 
 /*****************************************************************************************/
    $("#bcancelafirmaProforma").kendoButton();
    $("#bfirmarProforma").kendoButton();
    var bcancelafirmaProforma = $("#bcancelafirmaProforma").data("kendoButton");
    var bfirmarProforma = $("#bfirmarProforma").data("kendoButton");
    
    bcancelafirmaProforma.bind("click", function(e){   
        cambiar('firmarProforma','mostrarProforma');
        borrarPin('{$nombre}');
    });
    bfirmarProforma.bind("click", function(e){  
        var dato=$("#formSelectServicios").serialize()+"&total="+$("#total").text();
        //cerraractualizartab('Ingresar Depositos','admProforma','facturar&'+dato);
        //cambiar('firmarProforma','aviso');
        
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: dato,
            success: function (data) {
                
                $('#id_proforma').val(data);
                cambiar('firmarProforma','aviso');
                //$("#respProf").html(respuesta[0].total);
            }
        });
    });
    
 /***************************************************************************/
    var swfirmaProforma=2;        
    var firmaProformacache='';
    var formfirmaProforma = $("#formfirmaProforma").kendoValidator({
       rules:{ 
           formfirmaProforma: function(input) { 
             var validate = input.data('bfirmarProforma');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    if (firmaProformacache !== $("#pinfirmarProforma").val()) 
                     {
                    verificarPinDepositos($("#pinfirmarProforma").val());                    
                    return false;
                    }
                    if(swfirmaProforma==1)
                    {
                         return true;
                    }
                    if(swfirmaProforma==0)
                    {  
                        return false;
                    }  
                    return false;
                }
               
               return true;
           }
       },
       messages:{
            formfirmaProforma: function(input) { 
                if(swfirmaProforma==0)
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
       function verificarPinProforma(pin_insertado)
        {
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
                success: function (data) {    
                    swfirmaProforma=data;
                   firmaProformacache=$("#pinfirmarProforma").val();
                   formfirmaProforma.validateInput($("#pinfirmarProforma"));
                 }
            }); 
        }
 
</script>  