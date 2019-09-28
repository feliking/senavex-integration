<input type="hidden" id="anular_factura" name="anular_factura" value="0">
<input type="hidden" id="id_co" name="id_co" value="{$co->getId_certificado_origen()}">
<div class="row-fluid form" id="mostrarCO">
    <div class="row-fluid">
        <div class="span12">
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro">Datos del Certificado de Origen.</div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row-fluid " >
                    <div class="span2 parametro">
                        Tipo de Certificado:
                    </div>     
                    <div class="span4 campo" >
                        {$co->tipo_co->getAbreviatura()}
                    </div>  
                    <div class="span2 parametro">
                        Acuerdo:
                    </div>     
                    <div class="span4 campo" >
                        {$co->acuerdo->getSigla()}
                    </div>
                </div>
                
                <div class="row-fluid " >
                    <div class="span2 parametro">
                        Número de Certificado:
                    </div>     
                    <div class="span4 campo" >
                        {if $co->getId_tipo_co()==1} 
                        1 
                        {elseif $co->getId_tipo_co()==2}
                        3
                        {elseif $co->getId_tipo_co()==3}
                        3
                        {elseif $co->getId_tipo_co()==4}
                        2
                        {elseif $co->getId_tipo_co()==5}
                        3
                        {/if}
                    </div>
                    <div class="span2 parametro">
                        País de Destino:
                    </div>     
                    <div class="span4 campo" >
                        {$co->pais->getNombre()}
                    </div>  
                </div>
                    
                <div class="row-fluid " >
                    <div class="span2 parametro">
                        Empresa:
                    </div>     
                    <div class="span4 campo" >
                        {$co->empresa->getRazon_Social()}
                    </div>  
                    <div class="span2 parametro">
                        Valor FOB Total:
                    </div>     
                    <div class="span4 campo" >
                        {$co->getValor_fob_total()}
                    </div>
                </div>

                <div class="row-fluid " >
                    <div class="span2 parametro">
                        Fecha de Llenado:
                    </div>     
                    <div class="span4 campo" >
                        {$co->getFecha_llenado()|date_format:"%d/%m/%Y"}
                    </div>  
                    <div class="span2 parametro">
                        Fecha de Emisión:
                    </div>     
                    <div class="span4 campo" >
                        {$co->getFecha_emision()|date_format:"%d/%m/%Y"}
                    </div>
                </div>
                    
                {if $personal|@count!=0}
                <div class="row-fluid form">
                    <div class="barra">
                    </div>
                </div>
                <div class="row-fluid" >
                    <div class="span12 parametro" >
                        <center>PERSONAL DE LA EMPRESA</center>
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                {foreach from=$personal item=persona}
                    <div class="row-fluid" {if $persona.id_persona==$empresa_temporal->id_representante_legal}style="background-color: #e6e6e6;border-radius: 7px;padding-top: 5px;" {/if}>
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
                {/foreach}
                {/if}
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>   

                <div class="row-fluid form" >
                    <div class="span2"></div>
                    <div class="span3" >
                        <input id="entregarco" type="button" value="Entregar" class="k-primary" style="width:100%"/>
                    </div>
                    <div class="span2"></div>
                    <div class="span3" >
                        <input id="cancelarco" type="button" value="Cancelar" class="k-primary" style="width:100%"/>
                    </div>
                    <div class="span2"></div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row-fluid fadein"  id="firmaAnularCo" >
       <div class="k-block fadein">
                <div class="k-header">
                    <div class="k-header"><div class="titulo">Confirmación de Entrega del Certificado de Origen</div></div>
                </div>
                <div class="k-cuerpo"> 
                    <div class="row-fluid  form" >
                        <div class="span1" > </div>
                        <div class="span10" >
                            <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, realizo la entrega
                                del Certificado de Origen.</p> 
                        </div>  
                        <div class="span1" ></div>
                    </div> 
                    <form name="formfirmaAnularCo" id="formfirmaAnularCo" method="post"  action="index.php" >
                        <div class="row-fluid  form" >
                            <div class="span5" ></div>
                            <div class="span2" >
                                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                               class="k-textbox " placeholder="Pin" name="pinfirmaAnularCo"  id="pinfirmaAnularCo" maxlength="4" size="4" style="width:50px;"
                               required data-required-msg="Por favor ingrese su Pin." data-firmarenvioAnularCo /> 
                            </div>  
                            <div class="span5" ></div>
                        </div>  
                        <div class="row-fluid  form" >
                            <div class="span4 hidden-phone" >
                             </div>
                             <div class="span2 " >
                                 <input id="cancelafirmaAnularCo" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                             </div> 
                             <div class="span2 " >
                                 <input id="firmarAnularCo" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                             </div> 
                             <div class="span4 hidden-phone" >
                             </div>
                         </div> 
                    </form> 
                </div>
      </div>
</div>
                
<script>

ocultar('firmaAnularCo');
//FUNCIONES PARA LA FIRMA DEL CERTIFICADOR ACEPTANDO EL C.O.
$("#cancelafirmaAnularCo").kendoButton();
$("#firmarAnularCo").kendoButton();
var cancelafirmaAnularCo = $("#cancelafirmaAnularCo").data("kendoButton");
var firmarAnularCo = $("#firmarAnularCo").data("kendoButton");

cancelafirmaAnularCo.bind("click", function(e){             
    cambiar('firmaAnularCo','mostrarCO');
    borrarPin('{$nombre}');
    $('#pinfirmaAnularCo').val('');
});

firmarAnularCo.bind("click", function(e){
    /*
    var co = $("#id_co").val();
    var anular = $("#anular_factura").val();
    var datos = "opcion=admCertificado&tarea=anularCertificadoOrigen&id_certificado_origen="+co+"&anular="+anular;

    $.ajax({
        type: 'post',
        url: 'index.php',
        data: datos,
        success: function(data) {
            firmarPin('Certificados de Origen','admCertificado','','{$nombre}');
        }
    });
    */
});

/************ VALIDACIÓN DEL PIN ******************************/
var swfirma=2;        
var firmacache='';
var formfirmaAnularCo = $("#formfirmaAnularCo").kendoValidator({
    rules:{ 
        firmarAnularCo: function(input) { 
            var validate = input.data('firmarAnularCo');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmacache !== $("#pinfirmaAnularCo").val()) 
                {
                    verificarPinCoAceptar($("#pinfirmaAnularCo").val());                    
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
        firmarAnularCo: function(input) { 
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

function verificarPinCoAceptar(pin_insertado)
{
    $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
            success: function (data) {    
                swfirma=data;
                firmacache=$("#pinfirmaAnularCo").val();
                formfirmaAnularCo.validateInput($("#pinfirmaAnularCo"));
            }
        }); 
}

$("#entregarco").kendoButton();
$("#cancelarco").kendoButton();
var entregarco = $("#entregarco").data("kendoButton");
var cancelarco = $("#cancelarco").data("kendoButton");

cancelarco.bind("click", function(e){  
    remover(tabStrip.select());
});

entregarco.bind("click", function(e){
    
});

</script>
    