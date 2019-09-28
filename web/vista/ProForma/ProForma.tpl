<div class="row-fluid  form" >
    <div class="row-fluid "  id="mostrarProforma" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > FACTURA PROFORMA  </div>  
                        </div>                                      
                    </div>  
                </div>
                <div class="row-fluid  form" >
                    <div class="titulonegro" >  
                              DETALLE 
                    </div>
                </div>
                   {foreach from=$array_proforma[3] item=array}
                        <div class="row-fluid  form" >
                            <div class="span1" ></div>
                            <div class="span4 campo" >
                               {$array[0]}
                            </div>
                            <div class="span2 campo" >
                                {$array[1]}&nbsp;
                            </div> 
                            <div class="span2 campo" >
                                {if ($array[2]|@count) >0 }
                                {assign var="acuerdos" value=$array[2]}
                                {section name=value loop=$acuerdos}
                                    
                                    {$acuerdos[value]} &nbsp;
                                {/section}
                                    
                               {else} &nbsp; {/if}
                            </div>
                                
                            <div class="span2 campo" >
                               {$array[3]} Bs
                               
                            </div>
                            
                        </div>
                    {/foreach} 
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>         
                <div class="row-fluid  form" >
                    
                    <div class="span2 parametro" >
                        <b>Fecha de Servicio :</b>
                    </div>     
                    <div class="span3 campo" >
                        {$array_proforma[2]}
                    </div>  
                    
                    <div class="span2 parametro"  >
                        <b> Total a Facturar</b>
                    </div>     
                    <div class="span2 campo">
                        {$array_proforma[1]}
                    </div>  
                 
                </div>
               
                   <form name="formIngresarDeposito" id="formIngresarDeposito" method="post"  action="index.php" >
                       <input type="hidden" name="id_proforma" id="id_proforma" value="{$id_proforma}" />
                        <div class="row-fluid  form" >
                            <div class="span4 hidden-phone" >
                             </div>
                             <div class="span4 hidden-phone" >
                             </div>
                             <div class="span2 " >
                                 <input id="facturar" type="button"  value= "facturar" class="k-primary" style="width:100%"/>
                             </div> 
                             
                         </div> 
                    </form> 
            </div>
           
        </div>
    </div>                       
</div>   
       
<script> 
    $("#facturar").kendoButton();

    var facturar = $("#facturar").data("kendoButton");
 
    facturar.bind("click", function(e){  
        var dato="&opcion=admDeposito&tarea=depositoIngresar&id_proforma="+$('#id_proforma').val();
        //alert(dato);
        cerraractualizartab("Deposito",'admDeposito','depositoIngresar&id_proforma='+$('#id_proforma').val())
        /*$.ajax({             
            type: 'post',
            url: 'index.php',
            data: dato,
            success: function (data) {
                //alert(data);
                cerraractualizartab("Deposito",'admDeposito','depositoIngresar');
            }
        });*/
    });
     //cerraractualizartab("deposito",'admDeposito','registrar');
     
</script>  
                        