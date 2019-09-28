<div class="row-fluid " id="ingresarDepositos">
    <div class="span12" >
        <div class="row-fluid" >
            <div class="span1 hidden-phone" >
            </div>
            <div class="span10">

                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" > Buscar Certificado del Cafe</div>  
                            </div>                                      
                        </div>  
                    </div>
                    <!--div class="k-header k-headerrojo"><div class="tituloblanco"></div></div-->
                    <div class="k-cuerpo">  

                        <form id="formdeposito" method="post" action="index.php">
                            <input type="hidden" name="opcion" id="opcion" value="admCafe" />
                            <input type="hidden" name="tarea" id="tarea" value="print_cafe" />
                            <div id="campos">
                                <div class="row-fluid " name="campo[]">
                                    <div class="span4" ></div>
                                    <div class="span2" >
                                        <input type="text" class="k-textbox "  placeholder="Ingrese el RUEX de la empresa" name="id_empresa" id="id_empresa" required validationMessage="Por favor Ingrese el Numero de RUEX"/>
                                        <!--input style="width:100%;" id="idEmpresa" name="idEmpresa" required="true" validationMessage="Por favor escoja la Empresa"-->
                                    </div>
                                    
                                    <div class="span2" >
                                        <input id="registrar" type="button"  value="Buscar" class="k-primary" style="width:100%">
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
    var dato='';
   
    $("#registrar").kendoButton();
    $("#cancelar").kendoButton();
    var num = 1;
    var registrar = $("#registrar").data("kendoButton");
    var cancelar = $("#cancelar").data("kendoButton"); 
    
    cancelar.bind("click", function(e){  
        remover(tabStrip.select());
    });
    registrar.bind("click", function(e){  
        dato=$("#id_empresa").val();
        window.open("index.php?opcion=admCafe&tarea=print_cafe&id_empresa="+dato, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        //cerraractualizartab('Imprimir Cafe','admCafe','print_cafe&id_empresa='+dato);
    });
    
/*****************************************************************************************/
   
/*********************************************************************************************************************/

</script>  