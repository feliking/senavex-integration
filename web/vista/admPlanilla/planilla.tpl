<div class="row-fluid  form" >
    <div class="row-fluid "  id="planilla" >
        <div class="span12" >
            <div class="k-block fadein">
                
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > PLANILLAS </div>
                        </div>
                    </div>
                </div>
                
                <div class="row-fluid  form" >
                    <div class="span4" hidden-phone></div>
                    <div class="span4" >
                        <input style="width:100%;" id="tipo" name="tipo" required validationMessage="SELECCIONE TIPO DE PLANILLA">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#tipo").kendoComboBox({
        placeholder:"SELECCIONE TIPO DE PLANILLA",
        dataTextField: "text",
        dataValueField: "value",
        dataSource: [
                        { text: "CERTIFICADO DE ORIGEN", value: "1", isDeleted: false},
                        { text: "DECLARACION JURADA DE ORIGEN", value: "2", isDeleted: false },
                        { text: "ANULACION DE C.O.", value: "3" }
                    ],
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text('');

            }else{

                if(this.value()==1){
                    cerraractualizartab('Planilla C.O.','admPlanilla','show_planilla_co');
                }
                if(this.value()==2){
                    cerraractualizartab('Planilla DDJJ','admPlanilla','show_planilla_ddjj');
                }
                if(this.value()==3){
                    cerraractualizartab('Planilla Anulacion C.O.','admPlanilla','show_anulacion_co');
                }

            }
        }
    });
    //$("#tipo").kendoComboBox().dataSource.get(2).set("isDeleted", true);
        
    
</script>
