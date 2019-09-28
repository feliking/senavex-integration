<div class="row-fluid fadein"  id="verificardeposito" >
    <div class="k-block">
        <div class="k-header">
            <div class="titulonegro">Revisión Depósitos</div> 
        </div>   
        <div class="k-cuerpo">                
                <div class="row-fluid " >
                    <div class="span2 hidden-phone" >
                        
                    </div>     
                  
                </div>
            <div class="row-fluid " >
                
                <div class="span2 parametro" >
                    C&oacute;digo del Dep&oacute;sito
                </div>
                <div class="span1 hidden-phone" ></div>
                <div class="span2 parametro" >
                    Fecha del Dep&oacute;sito 
                </div>
                <div class="span1 hidden-phone" ></div>
                <div class="span2 parametro" >
                    Monto del Dep&oacute;sito 
                </div>
                <div class="span1 hidden-phone" ></div>
                <div class="span1 parametro" >
                    Válidar
                </div>
                <div class="span1 parametro" >
                    Rechazar
                </div>
            </div>
            <div class="row-fluid form" >
                <div class="barra" >                                         
                </div> 
            </div> 
            <form name="formvalidardeposito" id="formvalidardeposito" method="post"  action="index.php" >
                {foreach from=$depositos item=array}
                    <div class="row-fluid " >
                    
                        <div class="span1 hidden-phone" ></div>
                        <div class="span2 " >
                           {$array[1]}
                        </div> 

                        <div class="span1 hidden-phone" ></div>
                        <div class="span2 " >
                           {$array[2]}
                        </div> 

                        <div class="span1 hidden-phone" ></div>
                        <div class="span2 " >
                           {$array[3]}
                        </div> 

                        <div class="span1">
                            <center><input id='validados[{$array[0]}]' type="radio" name="validados[{$array[0]}]" value="{$array[0]}" onchange="cambio('rechazados[{$array[0]}]')"></center>
                        </div>
                        <div class="span1">
                            <center><input id='rechazados[{$array[0]}]' type="radio" name="rechazados[{$array[0]}]" value="{$array[0]}" onchange="cambio('validados[{$array[0]}]')"></center>
                        </div>
                    </div>
               
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div> 
                {/foreach}
            </form>
            <div class="span2 fadein" >
                <input type="hidden" name="hiddenvalidator-checkvalidado" id="hiddenvalidator-checkvalidado" 
                data-checkvalidado
                data-required-msg="Tiene que Aprobar o Rechazar todos los depositos" />
            </div> 
            <div class="row-fluid  form" >
                <div class="span3" >
                </div>
                <div class="span3" >
                <input id="rechazardeposito" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br><br>
                </div>
                <div class="span3" >
                <input id="validardeposito" type="button"  value="Aceptar" class="k-primary" style="width:100%"/> 
                </div>
                <div class="span3" >
                </div>
            </div>
        </div>
    </div>    
</div>
<div class="row-fluid fadein"  id="firmaasistentedeposito" >
       <div class="k-block fadein">
            <div class="k-header">
                <div class="k-header"><div class="titulo">Firma Digital de Revisión de Depósitos</div></div>
            </div>
            <div class="k-cuerpo"> 
                <div class="row-fluid  form" >

                    <div class="span1" > </div>
                    <div class="span10" >
                        <p> Yo {$nombre}, certifico que el/los depósito(s) cumple(n) con los Requisitos necesarios para su validación.</p> 
                        <p> Por consiguiente doy consentimiento para la Aprobacion o Rechazo de este Deposito.</p> 

                    </div>  
                    <div class="span1" ></div>
                </div> 
                <!--form name="formvalidardeposito" id="formValidarDeposito" method="post"  action="index.php" -->
                    
                 
                    
                    <div class="row-fluid  form" >
                        <div class="span5" ></div>
                        <div class="span2" >
                            <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                           class="k-textbox " placeholder="Pin" name="pinfirmadposito"  id="pinfirmaruex" maxlength="4" size="4" style="width:50px;"
                           required data-required-msg="Por favor ingrese su Pin." data-firmarruex /> 
                        </div>  
                        <div class="span5" ></div>
                    </div>  
                    <div class="row-fluid  form" >
                        <div class="span4 hidden-phone" >
                         </div>
                         <div class="span2 " >
                             <input id="cancelarvalidardeposito" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                         </div> 
                         <div class="span2 " >
                             <input id="firmarvalidardeposito" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                         </div> 
                         <div class="span4 hidden-phone" >
                         </div>
                     </div> 
                <!--/form--> 
            </div>   
      </div>              
</div>
<script>    
    var contador=0;
    var dato='';//------------------------Tienes que declara afuera la variable dato--------------------------*}
    ocultar('firmaasistentedeposito');
    $("#rechazardeposito").kendoButton();
    $("#validardeposito").kendoButton();
    var rechazardeposito = $("#rechazardeposito").data("kendoButton");
    var validardeposito = $("#validardeposito").data("kendoButton");
    
    var formvalidardeposito=$("#formvalidardeposito").kendoValidator({
        rules:{
            checkvalidado: function(input) {
                var validate = input.data('checkvalidado');
                if (typeof validate !== 'undefined') 
                {
                    return verifica_validados();
                }
                return true;
            },
        },
        messages:{  //checkpeso
             checkvalidado: "Tiene que Aprobar o Rechazar todos los depositos",
        }
    }).data("kendoValidator");
    
    
    
    function verifica_validados(){
        return {$cantidad}==contador;
    }
    rechazardeposito.bind("click", function(e){
        
        remover(tabStrip.select());
        /*dato=$("#formValidarDeposito").serialize()+"&validado=0"; //enviar datos del formulario y una variable VALIDADO = 0
       
        cambiar('verificardeposito','firmaasistentedeposito');
        generarPin('{$id_empresa}','{$id_persona}','1');  
        //cerraractualizartab('Revision Depositos','admDeposito','revisarDeposito');*/
    }); 
    validardeposito.bind("click", function(e){
        
        if({$cantidad}==contador){
            
        
            //dato=$("#formvalidardeposito").serialize()+"&validado=1";  //enviar datos del formulario y una variable VALIDADO = 1
            //alert($("#formvalidardeposito").serialize());
            cambiar('verificardeposito','firmaasistentedeposito');
            generarPin('{$id_empresa}','{$id_persona}','1');
        }
        else{
            alert("debe aprobar o rechazar todos los depositos");
        }
    });     
    
    $("#cancelarvalidardeposito").kendoButton();
    $("#firmarvalidardeposito").kendoButton();
    var cancelarvalidardeposito = $("#cancelarvalidardeposito").data("kendoButton");
    var firmarvalidardeposito = $("#firmarvalidardeposito").data("kendoButton");
    cancelarvalidardeposito.bind("click", function(e){   
        cambiar('firmaasistentedeposito','verificardeposito');
        borrarPin('{$nombre}');
    });
    firmarvalidardeposito.bind("click", function(e){  
        
	//cerraractualizartab('Revision Depositos','admDeposito','validarDeposito&'+dato);
       $.ajax({             
            type: 'post',
            url: 'index.php',
            data: dato,
            success: function (data) {
                //alert(dato);
                    //cerraractualizartab('Revision Depositos','admDeposito','revisarDeposito');
                    cerraractualizartab('Revision Depositos','admDeposito','validarDeposito&'+$("#formvalidardeposito").serialize());
            }
        });
    });
    
    
    function cambio(check2){
        var ele=document.getElementById(check2);
        contador=contador+1;
        if(ele.checked){
            ele.checked=false;
            contador=contador-1;
        }
        //alert(contador);
    }
</script>