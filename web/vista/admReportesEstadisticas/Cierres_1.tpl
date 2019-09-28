
<div  id="formulario" >
    <div class="row-fluid" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="titulonegro">Reportes/Cierres Varios</div>
            </div>
            <div class="k-cuerpo">
                <form name="formEstadisticas" id="formEstadisticas" method="post"  action="index.php">
                    <div class="span2 hidden-phone"></div>
                    <div class="span8">
                        <fieldset class="row-fluid  form " id="fieldset" >
                            <legend>EXCEL</legend>
                            <div id="tablas_general">
                                 <div class="span5 fadein" >
                                    <div class="radio"><strong>CIERRES FACTURACION</strong></div> 
                                    <div class="radio"><input type="radio" name="tipo_rpte" checked value="1" id="tipo_rpte" data-radio required>Reporte General</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="2" id="tipo_rpte" data-radio required>Reporte Detallado</div>
                                    <div class="radio"><strong>REPORTES FACTURACION</strong></div> 
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="3" id="tipo_rpte" data-radio required>Libro Ventas</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="4" id="tipo_rpte" data-radio required>Conciliacion</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="5" id="tipo_rpte" data-radio required>Recaudaciones</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="6" id="tipo_rpte" data-radio required>Anulaciones Facturas</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="7" id="tipo_rpte" data-radio required>SGC RUEX</div>
                                    <div class="radio"><strong>REPORTES PLANILLAS</strong></div> 
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="8" id="tipo_rpte" data-radio required>Anulaciones Certificados de Origen</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="9" id="tipo_rpte" data-radio required>Reporte Emisiones CO</div>
                                    <div class="radio"><input type="radio" name="tipo_rpte" value="10" id="tipo_rpte" data-radio required>Reporte DDJJ Origen</div>
                                    {if $desarrollo==17}
                                        <div class="radio"><input type="radio" name="tipo_rpte" value="100" id="tipo_rpte" data-radio required>registro ddjj</div>
                                    {/if}
                                </div>
                                <div class="span4" >
                                     <div class="row-fluid form" >
                                        Inicio:<input type ='date' id="fecha_ini" name="fecha_ini" placeholder="dd/mm/aaaa"/>
                                     </div>
                                    <div class="row-fluid form" >
                                        Fin:   <input type ='date' id="fecha_fin" name="fecha_fin" placeholder="dd/mm/aaaa"/>
                                    </div>
                                </div>
                                {if $regional==11}
                                 <div class="span3" >
                                     <input  style="width:100%;" id="regional_reporte" name="regional_reporte" placeholder="Regional"  validationMessage="Seleccione una Regional">
                                 </div>
                                {/if}
                            </div>
                        </fieldset>
                        
                    </div>

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