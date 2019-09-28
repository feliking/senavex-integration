<div class="row-fluid  form" >
    <div class="row-fluid "  id="planilla" >
        <div class="span12" >
            <div class="k-block fadein">
                
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > PLANILLA ANULACIONES C.O </div>
                        </div>
                    </div>
                </div>
                
               <form name="formPlanillaAnulacionCO" id="formPlanillaAnulacionCO" method="post"  action="index.php"> 
                    <input type="hidden" name="opcion" id="opcion" value="admPlanilla" />
                    <input type="hidden" name="tarea" id="tarea" value="save_planilla_anulacion_co">
                    
                    <!--div class="row-fluid  form" id="cabecera" name="cabecera">
                        
                            <div class="span1 parametro" > Nro Control </div>
                            <div class="span2 parametro" > Tipo C.O. </div>
                            <div class="span1 parametro" > RUEX </div>
                            <div class="span2 parametro" > Razón social </div>
                            <div class="span2 parametro" > Anulación </div>
                            <div class="span2 parametro" > Observación </div>
                      
                    </div-->

                    <div class="row-fluid  form" id="cuerpo" name="cuerpo">
                        
                    </div>
                    <div class="row-fluid  form" id="pie" name="pie"></div>
                </form>
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone"></div>
                    <div class="span2">
                        <input id="CancelarAnulacionCO" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                    </div>
                    <div class="span2">
                        <input id="AceptarAnulacionCO" type="button" value="Guardar" class="k-primary" style="width:100%"/> <br> <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="div_aviso_ventana"></div>
<script>
    var contador = 0;
    $("#CancelarAnulacionCO").kendoButton();
    $("#AceptarAnulacionCO").kendoButton();
    var CancelarAnulacionCO = $("#CancelarAnulacionCO").data("kendoButton");
    var AceptarAnulacionCO = $("#AceptarAnulacionCO").data("kendoButton");
    var validator = $("#formPlanillaAnulacionCO").kendoValidator().data("kendoValidator");
    
    AceptarAnulacionCO.bind("click", function(e){
        if(validator.validate()){
            AceptarAnulacionCO.enable(false);
            //window.open('index.php?'+$("#formPlanillaAnulacionCO").serialize(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
            $.ajax({
                type: 'post',
                url: 'index.php',
                data: $("#formPlanillaAnulacionCO").serialize(),
                success: function (data) {
                     
                    var dt=eval("("+data+")");
                    var texto = "";
                    var aviso = "";
                    aviso = dt[0].aviso;
                    texto += "<p> Fecha de Registro : <strong>" + dt[0].fecha + "</strong></p>";
                    texto += "<p> Hora de Registro : <strong>" + dt[0].hora + "</strong></p>";
                    
                    crearVentanaAnulacionCO(aviso, texto);
                }
            });
        }
    });
    CancelarAnulacionCO.bind("click", function(e){
       cerraractualizartab('Planillas','admPlanilla','show_planilla');
    });
    
    addAnulacionCO(true);
    function crearVentanaAnulacionCO(title, contenido){
        var campo =
                
                '<div class="row-fluid fadein" id="ventanaaviso">'+
                    '<div class="span12" >'+
                        '<div class="row-fluid  form" >'+
                            '<div class="span12" >'+
                                '<div class="titulo" id="titulo_aviso" >'+title+'</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row-fluid form" ><div class="barra" ></div></div>'+
                        '<div class="row-fluid" >'+
                            '<center>'+contenido+'</center>'+
                        '</div>'+
                        '<br>'+
                        '<div class="row-fluid form" ><div class="barra" ></div></div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span4 hidden-phone"></div>'+
                            '<div class="span4"><input id="avisoaceptar" type="button" value="Aceptar" class="k-primary" style="width:100%"/> </div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
        
        $('#div_aviso_ventana').append(campo);
        ventana('ventanaaviso','280','400');
        $("#avisoaceptar").kendoButton();
        var avisoaceptar = $("#avisoaceptar").data("kendoButton");
        avisoaceptar.bind("click", function(e){
            $('#cuerpo').html("");
            addAnulacionCO(true);
            $("#ventanaaviso").data("kendoWindow").close();
            $('#ventanaaviso').remove();
        });
    }
    
    function ventana(nombre, h, w){
        $("#"+nombre).kendoWindow({
            draggable: false,
            height: h+"px",
            width: w+"px",
            title: "", 
            resizable: false,
            modal: true,
            actions: [],
            animation: {
                close: {
                  effects: "fade:out",
                  duration: 1000
                }
            }
        }).data("kendoWindow").center().open();
    }
    
    function addAnulacionCO(estado){
        contador++;
        var campo = 
            '<div class="k-block campo" >'+
                '<br>'+
                '<div id="div_anulacion-'+contador+'" >'+
                    '<div class="row-fluid form">'+
                        '<div class="span1 hidden-phone" ></div>'+
                        '<div class="span1 " > <input type="number" id="anulacion_co-'+contador+'" name="anulacion_co-'+contador+'" class="k-textbox " placeholder="NºControl" required validationMessage="ingrese Nro Control"> </div>'+
                        '<div class="span3 " > <input style="width:100%;" id="anulacion_tipo_co-'+contador+'" name="anulacion_tipo_co-'+contador+'" required validationMessage="Seleccione un Tipo de C.O."> </div>'+
                        '<div class="span2 " > <input style="width:100%;" id="anulacion_ruex-'+contador+'" name="anulacion_ruex-'+contador+'" required validationMessage="Nro RUEX"> </div>'+
                        '<div class="span4 " > <input type="text" id="anulacion_razon_social_co-'+contador+'" name="anulacion_razon_social_co-'+contador+'" class="k-textbox " placeholder="Razon Social" > </div>'+
                        '<div class="span1 " >' +
                            ( estado?  '<img src="styles/img/add.png" id="addAnulacion" onclick="addAnulacionCO(false)" height="28" width="28">' : '<img src="styles/img/del_dark.png" id="celiminar" alt="eliminar servicio" onclick="delFila(this)" height="28" width="28">')+
                        '</div>' +
                    '</div>'+
                    '<div class="row-fluid form">'+
                        '<div class="span1 hidden-phone" ></div>'+
                        '<div class="span2" ><input type="text" name="anulacion_fecha-'+contador+'" id="anulacion_fecha-'+contador+'" required placeholder="dd/mm/AAAA"></div>'+
                        '<div class="span2 " > <input style="width:100%;" id="anulacion_tipo_anulacion-'+contador+'" name="anulacion_tipo_anulacion-'+contador+'" required validationMessage="Nro RUEX"> </div>'+
                        '<div class="span6 " > <input type="text" id="anulacion_descripcion-'+contador+'" name="anulacion_descripcion-'+contador+'" required class="k-textbox " placeholder="Observacion" validationMessage="Descripcion"> </div>'+
                    
                    '</div>' +
                '</div>'+
            '</div>';
        $("#cuerpo").append(campo);
        /*$('#anulacion_fecha-'+contador).kendoDatePicker({
            start: "month"
        });*/
        $('#anulacion_fecha-'+contador).kendoMaskedTextBox({
          mask: "00/00/0000"
        });

        $('#anulacion_fecha-'+contador).kendoDatePicker({
            start: "month",
            format: "dd/MM/yyyy"
        });
        
        $('#anulacion_fecha-'+contador).closest(".k-datepicker")
        .add($('#anulacion_fecha-'+contador))
        .removeClass("k-textbox");
        ComboboxTipoAnulacion_CO('#anulacion_tipo_co-'+contador); 
        ComboboxAnulacion_RUEX('#anulacion_ruex-'+contador);
        ComboboxAnulacion_TipoAnulacion('#anulacion_tipo_anulacion-'+contador);
    }
    
    function delFila(elem){
        $(elem).parent().parent().parent().parent().remove();
    }
    
    function ComboboxTipoAnulacion_CO(texto){
        $(texto).kendoComboBox({
            placeholder:"TIPO CO",
            dataTextField: "descripcion",
            dataValueField: "id_tipo",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=listar_tipo_co"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{  }

            }
        }).data("kendoComboBox");
    }
    
    function ComboboxAnulacion_RUEX(texto){
        var id = texto.split("-");
        $(texto).kendoComboBox({
            placeholder:"RUEX",
            dataTextField: "descripcion",
            dataValueField: "id_tipo",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=listar_ruexs"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{ 
                    //window.open('index.php?'+ 'opcion=admPlanilla&tarea=razon_empresa&ruex='+this.value(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
                    $.ajax({
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admPlanilla&tarea=razon_empresa&ruex='+this.value(),
                        success: function (data) {
                            $("#anulacion_razon_social_co-"+id[1]).val(data);
                            //alert(data);
                        }
                    });  
                }

            }
        }).data("kendoComboBox");
    }
    
    function ComboboxAnulacion_TipoAnulacion(texto){
        $(texto).kendoComboBox({
            placeholder:"TIPO ANULACION",
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=listar_tipo_anulacion_co"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{  }

            }
        }).data("kendoComboBox");
    }
</script>
