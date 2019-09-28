
<div class="row-fluid" >
    <div  id="formulario" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="titulo">ESTADISTICAS</div>
            </div>
            <div class="k-cuerpo">
                <form name="formEstadisticas" id="formEstadisticas" method="post"  action="index.php">
                    
                    <div class="span11" >
                        <fieldset class="row-fluid  form">
                            <legend>TABLAS</legend>
                                <div class="span3 " >
                                    <input style="width:100%;" id="idtabla" name="idtabla">
                                </div>
                                <div class="span5" id="propiedades">
                                    <div id="contenido"></div>
                                </div>
                        </fieldset>
                    </div>


                    <div class="row-fluid form" >
                        <div class="span4 hidden-phone" ></div>
                        <div class="span2 " >
                            <input id="cancelar" name="cancelar" type="button"  value= "Cancelar" class="k-primary" style="width:100%"/>
                        </div> 
                        <div class="span2 " >
                            <input id="aceptar" name="aceptar" type="button"  value= "Aceptar" class="k-primary" style="width:100%"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>

<script>
   
    $("#aceptar").kendoButton();
    $("#cancelar").kendoButton();
    
    var aceptar = $("#aceptar").data("kendoButton");
    var cancelar = $("#cancelar").data("kendoButton");
    
    aceptar.bind("click", function(e){
       
        cerraractualizartab('tabla','admReportesEstadisticas','cargarCombo&value=regional');
    });
    cancelar.bind("click", function(e){
      // alert('cancelar');
    });
    
    $("#idtabla").kendoDropDownList({ 
        optionLabel:"TABLA",
        placeholder:"TABLA",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        {foreach $tablas as $key => $value} 
             { value: "{$value}", Id: "{$key}"},
        {/foreach}  
        ],
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) { 
                this.text('');
            }else{
                var value=this.value();
             
                $("#contenido").remove();
                $("#propiedades").append('<div id="contenido"></div>');
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admReportesEstadisticas&tarea=cargarTabla&idtabla='+value,
                    success: function (data) {
                        
                        var dt=eval("("+data+")");
                        alert(data);
                        check='<div fadein">';
                        for(var i = 0; i < dt.length; i++) {
                            var obj = dt[i];
                            check=check+'<div  id="campo-'+obj.relacion+'" >'+
                                                '<div class="span7">'+
                                                    '<input type="checkbox" name="prop-'+obj.relacion+'[]" onclick="relacion(this.checked,\''+obj.relacion+'\')" value="'+obj.relacion+'" >'+obj.relacion+'</input>'+
                                                '</div>'+
                                            '</div>';
                        }
                        check=check+'</div>';
                        $("#contenido").append(check);
                       
                    }
                }); 
                
                
                $("#tipos"+value).remove();
                //*************************************************************************//
                $input='<input style="width:100%;" id="tipo" name="tipo">'
                
                $("#propiedades").append('<div id="tipos'+value+'">'+$input+'</div>');
                $("#tipos"+value).kendoDropDownList({
                    //optionLabel:value,
                    dataTextField: "descripcion",
                    dataValueField: "id",
                    dataSource: {
                        transport: {
                                read: {
                                    dataType: "json",
                                    url: "index.php?opcion=admReportesEstadisticas&tarea=cargarTipo&value="+value
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
        }
    });
    function tagRelaciones(array,clase){
    
    }
    function tagCampos(array, clase){
    }
    function relacion(estado,val){
  
        if(estado==true){
            var textbox='<div class="span4" id="textbox-field-'+val+'">'+
                        '<input style="width:100%;" id="textbox'+val+'" name="textbox'+val+'">'+
                        '</div>';
            $("#campo-"+val).append(textbox);
            
            $("#textbox"+val).kendoDropDownList({
                    optionLabel:val,
                    dataTextField: "descripcion",
                    dataValueField: "id",
                    dataSource: {
                        transport: {
                                read: {
                                    dataType: "json",
                                    url: "index.php?opcion=admReportesEstadisticas&tarea=cargarCombo&value="+val
                                }
                        }
                    },
                    change : function (e) {
                        if (this.value() && this.selectedIndex === -1) { 
                            this.text('');
                        }else{  }

                    }
                });
        }else{
            $("#textbox-field-"+val).remove();
        }
    }
    function propiedad(val){
    
    }
   
       
       
   
   
</script>
</body>
</html>