
    <div class="row-fluid ">
        <div class="span12" >
            <div class="row-fluid" >
                <div class="span1 hidden-phone" ></div>
                <div class="span10">
                    <div class="k-block fadein">
                        <div class="k-header">
                            <div class="row-fluid  form" >
                                <div class="span12" >
                                    <div class="titulonegro" > TITULO </div>
                                </div>
                            </div>
                        </div>
                        <div class="k-cuerpo">
                            <div class="row-fluid  form" >
                                   <div class="span1 hidden-phone" ></div>
                                   <div class="span10" >
                                       DESEA QUE EL SISTEMA ASIGNE 
                                    </div>
                                   <div class="span1 hidden-phone" ></div>
                            </div>
                        </div>
                        <div class="k-cuerpo">
                            <div class="row-fluid  form" >
                                   <div class="span4 hidden-phone" ></div>
                                    <div class="span2" >
                                       <input id="rechazarAsignacion" type="button" value="Rechazar" class="k-primary" style="width:100%"/> <br><br>
                                    </div>
                                    <div class="span2" >
                                       <input id="aceptarAsignacion" type="button" value="Aceptar" class="k-primary" style="width:100%"/> <br><br>
                                    </div>
                                   <div class="span1 hidden-phone" ></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span1 hidden-phone" ></div>
            </div>
        </div>
    </div>

<script>
    $("#rechazarAsignacion").kendoButton();
    $("#aceptarAsignacion").kendoButton();
    var rechazarAsignacion = $("#rechazarAsignacion").data("kendoButton");
    var aceptarAsignacion = $("#aceptarAsignacion").data("kendoButton");
    
    rechazarAsignacion.bind("click", function(e){
        cerraractualizartab2('Ver Empresa','admEmpresa','asignacionruex&revisar=0&id_empresa='+{$id_empresa});
    });
    aceptarAsignacion.bind("click", function(e){
        cerraractualizartab2('Revisar Empresa','admEmpresa','asignacionruex&revisar=1&id_empresa='+{$id_empresa});
    });
</script>