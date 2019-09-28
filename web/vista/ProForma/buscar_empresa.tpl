<div class="row-fluid " id="ingresarRUEX">
    <div class="span12" >
        <div class="row-fluid" >
            <div class="span1 hidden-phone" >
            </div>
            <div class="span10">
                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" > Buscar Empresa</div>  
                            </div>                                      
                        </div>  
                    </div>
                    <div class="k-cuerpo">  
                        <form id="formRUEX" method="post" action="index.php">
                            <div id="campos">
                                <div class="row-fluid ">
                                    <div class="span3" ></div>
                                    <div class="span2" >
                                        <input type="text" class="k-textbox " placeholder="N° RUEX" name="ruex" id="ruex" required validationMessage="Por favor Ingrese el Numero de RUEX"/>
                                        <!--input style="width:100%;" id="idEmpresa" name="idEmpresa" required="true" validationMessage="Por favor escoja la Empresa"-->
                                    </div>
                                    <div class="span2" >
                                        <input id="buscar" type="button"  value="Buscar" class="k-primary" style="width:100%">
                                    </div>
                                    <div class="span2" >
                                        <input id="cancelar" type="button" value="Cancelar" class="k-primary" style="width:100%"/>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
       
<script> 
    $("#buscar").kendoButton();
    $("#cancelar").kendoButton();
    var buscar = $("#buscar").data("kendoButton");
    var cancelar = $("#cancelar").data("kendoButton");
    buscar.bind("click", function(e){  
        var dato=$("#formRUEX").serialize();
       // var ruex=$("#ruex").val();
        //alert(ruex);
        cerraractualizartab('Facturar','admProForma','Proforma_deuda&'+dato);
        /*$.ajax({             
            type: 'post',
            url: 'index.php',
            data: dato,
            success: function (data) {
              var ruex=$("#ruex").val();  //alert('ruex='+$("#ruex").val());
               //alert(ruex);
               anadir('Facturar','admProForma','Proforma_deuda&ruex='+ruex);
            }
        });*/
        
    });
    cancelar.bind("click", function(e){ 
        remover(tabStrip.select());
        
    });
     
</script>  
                        