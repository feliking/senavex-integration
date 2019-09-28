<div class="row-fluid " id="body_contingencia">
    <div class="span12" >
        <div class="row-fluid" >
            <div class="span1 hidden-phone" >
            </div>
            <div class="span10">

                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" >Registrar Bloque Factura de Contingencia</div>  
                            </div>                                      
                        </div>  
                    </div>
                   
                    <div class="k-cuerpo">  
                        <form id="formcontingencia" method="post" action="index.php">
                            <input type="hidden" name="opcion" id="opcion" value="admProForma" />
                            <input type="hidden" name="tarea" id="tarea" value="registrarContingencia" />
                            
                            {if $nacional == 1 }
                             <div class="row-fluid " >
                                <div class="span2 parametro" >
                                    Categoria: 
                                </div> 
                                <div class="span3 " >
                                    <input style="width:100%;" id="regional_contingencia" name="regional_contingencia" required validationMessage="Seleccione Regional">
                                </div>
                            </div>
                            {/if}
                            
                            <br>
                            
                            <div class="row-fluid " >
                                <div class="span2 parametro" >
                                    Autorizacion : 
                                </div> 
                                <div class="span3 " >
                                    <input type="text" class="k-textbox "  placeholder="Numero Autorizacion"   name="num_autorizacion" id="num_autorizacion"  required validationMessage="Número de Autorización" />
                                </div>
                           
                                <div class="span2 parametro" >
                                    Fecha Limite de Emisión : 
                                </div> 
                                <div class="span2 " >
                                    <input type="text" placeholder="dd/mm/YYYY"   name="datepicker_limite" id="datepicker_limite"  required validationMessage="Seleccione una fecha" />
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid form" >
                               <div class="barra" >
                               </div>
                            </div>
                            <div class="row-fluid " >
                                <div class="span1 hidden-phone" ></div>
                                <div class="span5 parametro" >
                                    Rango Block de facturas: 
                                </div> 
                            </div>
                            <div class="row-fluid " >
                                <div class="span1 hidden-phone" ></div>
                                <div class="span2 parametro" >
                                    Número Inicial : 
                                </div> 
                                <div class="span2 " >
                                    <input type="number" class="k-textbox "  placeholder="numero inicial" name="irango" id="irango"  required validationMessage="Número Inicial del bloque" />
                                </div>
                                <div class="span2 parametro" >
                                    Número Final: 
                                </div> 
                                <div class="span2 " >
                                    <input type="number" class="k-textbox "  placeholder="numero final" name="frango" id="frango"  required validationMessage="Número Final del bloque" />
                                </div>
                            </div>
                            
                           <br>
                           <div class="row-fluid form" >
                               <div class="barra" >
                               </div>
                            </div>
                            <div class="row-fluid " >
                                <div class="span4 hidden-phone" ></div>
                                <div class="span2" >
                                    <input id="cancelar" type="button" value="Cancelar" class="k-primary" style="width:100%"/>
                                </div>
                                <div class="span2" >
                                    <input id="aceptar" type="button"  value="Aceptar" class="k-primary" style="width:100%">
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
    $("#cancelar").kendoButton();
    $("#aceptar").kendoButton();
    var cancelar = $("#cancelar").data("kendoButton");
    var aceptar = $("#aceptar").data("kendoButton");
    var formcontingencia = $("#formcontingencia").kendoValidator().data("kendoValidator");
    cancelar.bind("click", function(e){    
        remover(tabStrip.select());
    }); 
    aceptar.bind("click", function(e){    
        window.open('index.php?'+ $('#formcontingencia').serialize(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
    });
    $("#datepicker_limite").kendoDatePicker({
     start: "century"
    });

    $('#irango')
        .focusout(function() {
            if( $('#irango').val() !== '' && $('#frango').val() !== '' && ( parseInt($('#frango').val()) < parseInt($('#irango').val()) ) ){
                $('#irango').val('');
            }
        });
    $('#frango')
        .focusout(function() {
            if( $('#irango').val() !== '' && $('#frango').val() !== '' && ( parseInt($('#frango').val()) < parseInt($('#irango').val()) ) ){
                $('#frango').val('');
            }
        });
        
    if({$nacional}==1){
        $("#regional_contingencia").kendoComboBox({
            placeholder:"REGIONAL",
            dataTextField: "descripcion",
            dataValueField: "id_regional",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admProForma&tarea=list_regional"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{  }

            }
        });
    }

</script>  