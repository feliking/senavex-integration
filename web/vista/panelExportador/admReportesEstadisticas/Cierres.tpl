
<div  id="formulario" >
    <div class="row-fluid" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="titulonegro">Reportes de Facturación</div>
            </div>
            <div class="k-cuerpo">
                <form name="formEstadisticas" id="formEstadisticas" method="post"  action="index.php">
                    <div class="span2 hidden-phone"></div>
                    <div class="span8">
                        <fieldset class="row-fluid  form " id="fieldset" >
                            <legend>EXCEL</legend>
                            <div id="tablas_general">
                                 <div class="span3 fadein" >
                                    <div class="radio">CIERRES </div> 
                                    <div class="radio"><input type="radio" name="tipo_rpte" checked value="1" id="tipo_rpte" data-radio required>Reporte General</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="2" id="tipo_rpte" data-radio required>Reporte Detallado</div>
                                    <div class="radio">REPORTES</div> 
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="3" id="tipo_rpte" data-radio required>Libro Ventas</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="4" id="tipo_rpte" data-radio required>Conciliacion</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="5" id="tipo_rpte" data-radio required>Recaudaciones</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="6" id="tipo_rpte" data-radio required>Anulaciones</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="7" id="tipo_rpte" data-radio required>SGC RUEX</div>
                                    {if $desarrollo == 17}
                                        <div class="radio"><input type="radio" name="tipo_rpte" value="8" id="tipo_rpte" data-radio required>prueba correo</div>
                                    {/if}
                                </div>
                                <div class="span3" >
                                    Inicio:<input type ='date' id="fecha_ini" name="fecha_ini" placeholder="dd/mm/aaaa"/>
                                    Fin:   <input type ='date' id="fecha_fin" name="fecha_fin" placeholder="dd/mm/aaaa"/>
                                </div>
                                {if $regional==11}
                                 <div class="span3" >
                                     <input  style="width:100%;" id="regional_reporte" name="regional_reporte" placeholder="Regional"  validationMessage="Seleccione una Regional">
                                 </div>
                                {/if}
                            </div>
                        </fieldset>
                        {if $desarrollo == 17}
                            <div class='row-fluid form'>
                                <div class='span3'>
                                    <input type="button" value="Enviar Correos" id="sendMail" class="k-primary" style="width:100%"/> 
                                </div>
                                <div class="span3">
                                    <input type="text" id="nitEmpresa" name="nitEmpresa" placeholder="NIT" class="k-textbox " />
                                </div>
                            </div>
                        {/if}
                    

                    <div class="row-fluid form" >
                        <div class="span5 hidden-phone" ></div>
                        <div class="span2 " >
                            <input id="aceptar" name="aceptar" type="button"  value= "Generar" class="k-primary" style="width:100%"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>

<script>
  
    $("#aceptar").kendoButton();
    
    $("#fecha_ini").kendoDatePicker({
        value: new Date(),
        start: "month"
    });
    $("#fecha_fin").kendoDatePicker({
        value: new Date(),
        start: "month"
    });
    var validator = $("#formEstadisticas").kendoValidator().data("kendoValidator");
    var aceptar = $("#aceptar").data("kendoButton");
  
    aceptar.bind("click", function(e){
        if(validator.validate()){
            //cerraractualizartab('Cierre','admReportesEstadisticas','prueba');
            window.open('index.php?opcion=admReportesEstadisticas&tarea=Cierres&'+$('#formEstadisticas').serialize(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        }
    })
    if ({$desarrollo} == 17){
        $("#sendMail").kendoButton();
        var sendMail = $("#sendMail").data("kendoButton");
        sendMail.bind("click", function(e){
            window.open('index.php?opcion=admCorreo&tarea=empresaAdmitida2&nit='+$("#nitEmpresa").val(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
            $("#nitEmpresa").val("");
        })
    }
    if({$regional} ==11 ){
        $("#regional_reporte").kendoComboBox({
            placeholder:"Regional",
            dataTextField: "ciudad",
            dataValueField: "id_regional",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPersona&tarea=listarRegionales"
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
</body>
</html>