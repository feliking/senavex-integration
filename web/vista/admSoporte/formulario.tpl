<div class="row-fluid " id="formSoporte">
    <div class="span12" >
        <div class="row-fluid" >
            <div class="span1 hidden-phone" >
            </div>
            <div class="span10">

                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" >SOPORTE TECNICO</div>  
                            </div>                                      
                        </div>  
                    </div>
                   
                    <div class="k-cuerpo">  
                        <form id="formdeposito" method="post" action="index.php">
                            <input type="hidden" name="opcion" id="opcion" value="admSoporte" />
                            <input type="hidden" name="tarea" id="tarea" value="solicitud" />
                            
                             <div class="row-fluid " >
                                <div class="span2 parametro" >
                                    ASUNTO : 
                                </div> 
                                <div class="span3 " >
                                    <input type="text" class="k-textbox "  placeholder="Asunto"   name="titulo" id="titulo"  required validationMessage="Por favor ingrese el asunto de la solicitud" />
                                </div>
                            </div>
                            
                            <div class="row-fluid " >
                                <div class="span2 parametro" >
                                    Categoria: 
                                </div> 
                                <div class="span3 " >
                                    <input style="width:100%;" id="categoria_soporte" name="categoria_soporte" required validationMessage="Por favor escoja una categoria">
                                </div>
                            </div>
                            
                           
                            <div class="row-fluid" >
                                <div class="spa12" > 
                                    <textarea id="editorr_soporte"  >
                                    </textarea> 
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
    cancelar.bind("click", function(e){    
        
    }); 
    aceptar.bind("click", function(e){    
        
    });
    var editorr_soporte = $("#editorr_soporte").kendoEditor({
        tools: [

        ]
    }).data("kendoEditor"); 

    $("#categoria_soporte").kendoComboBox({
        placeholder:"Categoria",
        dataTextField: "descripcion",
        dataValueField: "id_incidencia_categoria",
        dataSource: { 
            transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admSoporte&tarea=list_categorias"
                    }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text('');
            }else{  }

        }
    });

</script>  