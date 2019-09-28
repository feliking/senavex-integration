<div class="row-fluid  form" >
    <div class="row-fluid "  id="planillaDDJJ" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" id="tituloddjj"></div>
                        </div>
                    </div>
                </div>
               
                <form name="formPlanillaDDJJ_add" id="formPlanillaDDJJ_add" method="post"  action="index.php"> 
                    
                    <input type="hidden" name="opcion" id="opcion" value="admPlanilla" />
                    
                    
                    <div class="row-fluid  form" id="ddjj_cabecera" name="ddjj_cabecera">    
                        
                    </div>

                    <div class="row-fluid  form" id="ddjj_cuerpo" name="ddjj_cuerpo">
                        
                    </div>
                    
                    <div class="row-fluid  form" id="ddjj_pie" name="ddjj_pie">

                    </div>
                    
                 </form>
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone"></div>
                    <div class="span2">
                        <input id="CancelarDDJJ" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                    </div>
                    <div class="span2">
                        <input id="guardarDDJJ" type="button" value="Aceptar" class="k-primary" style="width:100%"/> <br> <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="div_aviso_ventana_ddjj"></div>
<script>

    var numddjj = 1;
    var u = 1;
    var array_acuerdos = [];
    mostrar("planillaDDJJ");
    addHeadDDJJ()
    $("#tituloddjj").html("Registro Declaración Jurada de Origen");
    var validator_add = $("#formPlanillaDDJJ_add").kendoValidator().data("kendoValidator");
    $("#CancelarDDJJ").kendoButton();
    $("#guardarDDJJ").kendoButton();
    var CancelarDDJJ = $("#CancelarDDJJ").data("kendoButton");
    var guardarDDJJ = $("#guardarDDJJ").data("kendoButton");
    
    CancelarDDJJ.bind("click", function(e){
        ocultar("planilla_registro_ddjj");
        mostrar("planilla_registro");
    });

   
    guardarDDJJ.bind("click", function(e){
       /* if(validator_add.validate()){
           // window.open('index.php?opcion=admPlanilla&tarea=cargarFolderDDJJ&folder=1', 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
            window.open('index.php?'+$("#formPlanillaDDJJ_add").serialize(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        }*/ 

        
        if(validator_add.validate()){
            guardarDDJJ.enable(false);
            $.ajax({
                async: false,
                type: 'post',
                url: 'index.php',
                data: $("#formPlanillaDDJJ_add").serialize(),
                success: function (data) {
                
                    var dt=eval("("+data+")");
                    var texto = "";
                    var aviso = "";
                    aviso = dt[0].tipo==4? "Este folder ya Fue entregado" : 'Aviso '+ dt[0].aviso;
                   // texto = dt[0].tipo==3? (dt[0].suceso==2? "<p><h2>  </h2></p>":"" ) : "";
                    texto = "<p>Número de Folder :<strong> " + dt[0].numero_folder + " </strong></p>";
                    texto += "<p> Fecha de Registro : <strong>" + dt[0].fecha + "</strong></p>";
                    texto += "<p> Hora de Registro : <strong>" + dt[0].hora + "</strong></p>";
                    
                    var region = $('#sucursal').val();
                    var ruex = $('#ruex_ddjj').val();
                    var razon_social = $('#razon_social_ddjj').val();
                    var folder = $('#folder').val();
                    x1 = $('#xx').val();
                    y1 = $('#yy').val();
                    xco = $('#xco').val();
                    empresa_co = $('#empresa_co').val();
                    var combo1 = '#ddjj-'+x1+'-'+y1;
                    //multiselect comentado temporalmente
                    // var combo1_ms = '#ddjj_ms-'+x1+'-'+y1;
                    // var combo1div_ms = '#divddjj_ms-'+x1+'-'+y1;
                    // $(combo1_ms).data('kendoMultiSelect').destroy();
                    // $(combo1div_ms).empty();
                    // $(combo1div_ms).append('<input style="width:100%;" id="ddjj_ms-'+x1+'-'+y1+'" name="ddjj_ms-'+x1+'-'+y1+'" placeholder="DDJJs Adicionales "/>')
                    ocultar("planilla_registro_ddjj");
                    $(combo1).kendoComboBox({
                        placeholder:"DDJJ",
                        ignoreCase: true,
                        dataTextField: "descripcion",
                        dataValueField: "id",
                        dataSource: { 
                            transport: {
                                    read: {
                                        dataType: "json",
                                        url: "index.php?opcion=admPlanilla&tarea=listar_ddjj&id_estado=1&id_empresa="+empresa_co+"&id_tipo_co="+xco
                                    }
                            }
                        },
                        change : function (e) {
                            if (this.value() && this.selectedIndex === -1) { 
                                var id = texto.split("-");
                                $("#ddjj_clasificacion-"+x1+"-"+y1).val("");
                                $("#ddjj_descripcion-"+x1+"-"+y1).val("");
                            }else{ 
                                var id = texto.split("-");
                                $.ajax({
                                    type: 'post',
                                    url: 'index.php',
                                    data: 'opcion=admPlanilla&tarea=cargar_datos_ddjj&ddjj='+this.value(),
                                    success: function (data) {
                                        var dt=eval("("+data+")");
                                        $("#ddjj_clasificacion-"+x1+"-"+y1).val(dt[0].codigo);
                                        $("#ddjj_descripcion-"+x1+"-"+y1).val(dt[0].descripcion);
                                        $("#ddjj_descripcion_comercial-"+x1+"-"+y1).val(dt[0].descripcion);
                                        ComboboxDDJJCriterios("#ddjj_criterio-"+x1+'-'+y1, 'ddjj-'+x1+'-'+y1);
                                    }
                                });  
                            }
                        }
                    });
                    // $(combo1_ms).kendoMultiSelect({
                    //     placeholder:"DDJJ",
                    //     ignoreCase: true,
                    //     dataTextField: "descripcion",
                    //     dataValueField: "id",
                    //     dataSource: { 
                    //         transport: {
                    //                 read: {
                    //                     dataType: "json",
                    //                     url: "index.php?opcion=admPlanilla&tarea=listar_ddjj&id_estado=1&id_empresa="+empresa_co
                    //                 }
                    //         }
                    //     }
                    // });
                    var sucursal = $("#sucursal").data("kendoComboBox");
                    mostrar("planilla_registro");
                    
                    //cerraractualizartab('Planilla C.O.','admPlanilla','show_planilla_co&v1='+region+'&v2='+ruex+'&v3='+razon_social+'&v4='+folder);  //aumentar
                }
            });
            guardarDDJJ.enable(true);
            /*alert ("entra");
                    mostrar("planilla_registro");
                    ocultar("planilla_registro_ddjj");*/
        }
    });

    function ComboboxAcuerdoDDJJ_ddjj(texto, cascade){  //change ed
        $(texto).kendoComboBox({
            cascadeFrom: cascade,
            placeholder:"Acuerdo",
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: { 
                type: "json",
                serverFiltering: true,
                transport: {
                        read: {
                            dataType: "json",
                            serverFiltering: true,
                            url: "index.php?opcion=admPlanilla&tarea=list_acuerdo3"
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
    
    function ComboboxRUEX(texto){
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
                var valor = this.value();
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{ 
                    $.ajax({
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admPlanilla&tarea=razon_empresa&ruex='+this.value(),
                        success: function (data) {
                            /*$("#ddjj_cuerpo").html("");
                            $("#ddjj_pie").html("");
                            addFilaDDJJ(true);*/
                            $("#razon_social_ddjj").val(data);
                            //alert(data);
                            //alert(valor);
                            guardarDDJJ.enable(true);
                        }
                    });  
                }

            }
        }).data("kendoComboBox");
    }
    function ComboboxTipoEmision(texto){
        $(texto).kendoComboBox({
            placeholder:"Tipo Emisión",
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=tipo_emision&id_planilla_tipo=1"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{ 
                    
                }

            }
        }).data("kendoComboBox");
    }
    
    function addHeadDDJJ(){
        var fmsuc = $('#fmsucursal').val();
        var headDDJJ = '';
        var pieDDJJ = '';
            headDDJJ = 
                '<input type="hidden" name="tarea" id="tarea" value="RegistrarDDJJ_ADD" /> '+
                '<input type="hidden" name="folder" id="folder" value="{$ie_folder}" /> '+
                '<input type="hidden" id="ruex_ddjj" name="ruex_ddjj" required validationMessage="Ingrese un Nro RUEX">'+
                '<div class="row-fluid  form" >'+
                    '<div class="span1 hidden-phone" ></div>'+
                    '<div class="span2 parametro" >Razon social</div>'+
                    '<div class="span7 "><input type="text" id="razon_social_ddjj1" name="razon_social_ddjj1" class="k-textbox" disabled ></div>'+
                '</div>';
            $('#ddjj_cabecera').append(headDDJJ);
           
            addFilaDDJJ();       
    }

    function addFilaDDJJ(){
        var cuerpoDDJJ = '';
        var num = 1;
        var tipo=1;
            cuerpoDDJJ = 
                '<div class="row-fluid form">'+
                    '<div class="span3 hidden-phone"></div>'+
                   '<div class="span2" id="div_tipo_ddjj">'+
                        '<input type="hidden" style="width:100%;" id="ddjj_tipo-'+numddjj+'" name="ddjj_tipo-'+numddjj+'" >'+
                    '</div>'+
                   
                    '<div class="span2" id="ddjj_tipo_span-'+numddjj+'" name="ddjj_tipo_span-'+numddjj+'">'+
                        '<input type="hidden" id="ddjj_cantidad-'+numddjj+'" name="ddjj_cantidad-'+numddjj+'" value="1" readonly class="k-textbox" placeholder="Cantidad formularios" required validationMessage="Ingrese Cantidad 1" >'+
                    '</div>'+
                    '<div class="span2"  id="div_ddjj_tipo_ddjj-'+numddjj+'" name="div_ddjj_tipo_ddjj-'+numddjj+'">'+
                            '<input style="width:100%;" id="ddjj_tipo_ddjj-'+numddjj+'" name="ddjj_tipo_ddjj-'+numddjj+'" required validationMessage="Seleccione un Tipo de DDJJ">'+
                    '</div>'+
                '</div>'+
                '<div class="k-block campo" >'+
                    '<br>'+
                    '<div id="parte_ddjj1-'+num+'">'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div>'+
                            '<div class="span1 parametro">'+num+'</div>'+
                            '<input type="hidden"  id="ddjj_id-'+num+'" name="ddjj_id-'+num+'" value="" >'+
                            '<div class="span1"><input type="text" class="k-textbox"  id="ddjj_correlativo-'+num+'" name="ddjj_correlativo-'+num+'" placeholder="N° DDJJ" value="" validationMessage="ingrese N° DDJJ"></div>'+
                            '<div class="span4"><input type="text" class="k-textbox no-restriccion"  id="ddjj_descripcion_ddjj-'+num+'" name="ddjj_descripcion_ddjj-'+num+'" placeholder="DESCRIPCION" value="" onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese Descripcion"></div>'+    
                            '<div class="span2"><input type="text"  class="k-textbox"  id="ddjj_estado-'+num+'" name="ddjj_estado-'+num+'" style="width:100%" placeholder="Estado" value="APROBADO" required validationMessage="Seleccione Estado" disabled></div>' +        
                            //'<div class="span1 "><input id="ver_ddjj-'+num+'" name="ver_ddjj-'+num+'" '+ ( tipo==2? 'type="button"': 'type="hidden"') + 'value="Mostrar" onclick="cambiarDDJJDetalleRevision('+num+')" class="k-primary" style="width:100%"/></div>'+
                        '</div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div>'+
                            '<div class="span7"><input type="text" id="ddjj_nandina-'+num+'" name="ddjj_nandina-'+num+'" placeholder="NANDINA" style="width:100%" value="" required validationMessage="Ingrese y seleccione Arancel"></div>'+
                        '</div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div>'+
                            '<div class="span2 parametro"> Fecha de Aprobación </div><div class="span2"><input type="date" id="ddjj_fecha_registro_ddjj-'+num+'" name="ddjj_fecha_registro_ddjj-'+num+'" placeholder="Fecha Registro" value="" style="width:100%"  validationMessage="Ingrese Fecha de Registro" ></div>'+
                            '<div class="span2 parametro"> Fecha de Vencimiento </div>'+
                            '<div class="span2"><input type="date" id="ddjj_fecha_vencimiento_ddjj-'+num+'" name="ddjj_fecha_vencimiento_ddjj-'+num+'" placeholder="Fecha Vencimiento" value="" style="width:100%"  validationMessage="Ingrese Fecha de vencimiento"></div>'+
                        '</div><input type="hidden" id="ddjj_dias_vigencia-'+num+'" name="ddjj_dias_vigencia-'+num+'">'+
                       
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div>'+
                            '<div class="span7"><input type="text" class="k-textbox"  id="ddjj_observacion_ddjj-'+num+'" name="ddjj_observacion_ddjj-'+num+'" placeholder="OBSERVACION" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" validationMessage="Ingrese la razón del Rechazo"></div>'+
                            '<!--div class="span2 parametro" id="div_actualizacion-'+num+'"><input type="checkbox" id="ddjj_actualizacion-'+num+'" name="ddjj_actualizacion-'+num+'"/> Actualización</div-->'+
                        '</div>'+
                    '</div>'+
                            '<div class="row-fluid form" id="parte_ddjj2-'+num+'"></div>'+
                    '<div class="row-fluid form" id="parte_ddjj3-'+num+'">'+
                '</div>'+
            '</div>';

            $('#ddjj_cuerpo').append(cuerpoDDJJ);
            ocultar("div_tipo_ddjj");
            var ddjjtipo = "#ddjj_tipo_ddjj-"+numddjj;
            ComboboxDDJJTipoCO_ddjj("#ddjj_tipo_ddjj-"+numddjj);
            cargarDDJJCriteriosFila_ddjj(false, num, 1, 0);
            //ComboboxTipoEmision(ddjjtipo);
            ComboboxArancelDDJJ_ddjj("#ddjj_nandina-"+num,"NANDINA", 1, 1);
            $("#ddjj_fecha_registro_ddjj-"+num).kendoDatePicker({
                value: new Date(),
                start: "month"
            });
            $("#ddjj_fecha_vencimiento_ddjj-"+num).kendoDatePicker({
                value: new Date(),
                start: "month"
            });
            //cargarFolderDDJJ();
    }
    function ComboboxDDJJTipoCO_ddjj(texto){
        $(texto).kendoComboBox({
            placeholder:"TIPO DDJJ",
            dataTextField: "abreviacion",
            dataValueField: "id_tipo",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=listar_tipo_co_ddjj"
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
    function DDJJ_ddjj(campo, placeholder){
        $(campo).kendoComboBox(
        {   
            placeholder: placeholder,
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=listar_ddjj_actualizacion&id_empresa="+$("#ruex_ddjj").val()+"&id_estado=1" 
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) { 
                    this.text('');
                }else{

                }
            }
        });
    }
    function delDDJJCriterioFila_ddjj(elem){
        var id = $(elem).attr("id").split("-");
        var index = array_acuerdos.indexOf(id[1] + "-" + id[2]);
        array_acuerdos.splice(index, 1);
        $(elem).parent().parent().parent().remove();
    }    
    function cargarFolderDDJJ(){
         var num = 1;
         var tipo=1;
        $("#ddjj_cuerpo").html('');
                        $("#ddjj_cuerpo").append(cuerpo);
    }
    
    
    function accion(texto){
        $(texto).keyup(function() {
           //alert(' 123 ');
        });
    }
    
    function cargarDDJJCriteriosFila_ddjj(estado, num, acuerdos, estado_tramite){
        var aux = "["+acuerdos+"]";
        var au = acuerdos!=false? eval("("+aux+")") : false;
        var cantidad = au==false? 1: au.length;
        //alert(estado_tramite);
        for(var i=0; i<cantidad ; i++){
            addDDJJCriteriosFila_ddjj(estado, num, au!=false? au[i]:false, estado_tramite);
        }
        
    }
    function addDDJJCriteriosFila_ddjj(estado, num, acuerdo, estado_tramite){
       num = 1;
        array_acuerdos.push(num+'-'+u);
        var campo2 ='<div class="fadein">'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone" ></div>'+
                            '<div class="span8" >'+
                                '<div class="row-fluid form" ><div class="barra" ></div></div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div>'+
                            '<div class="span2"><input type="text" id="ddjj_acuerdo_ddjj-'+num+'-'+u+'" name="ddjj_acuerdo_ddjj-'+num+'-'+u+'" placeholder="Acuerdo" style="width:100%" required validationMessage="Seleccione un acuerdo"></div>'+
                            '<div class="span4">'+
                                '<input type="text" id="ddjj_criterio_ddjj-'+num+'-'+u+'" name="ddjj_criterio_ddjj-'+num+'-'+u+'" placeholder="CRITERIO" style="width:100%"  validationMessage="Seleccione Criterio">'+
                            '</div>'+
                            '<div class="span2"><input type="text" id="ddjj_complemento_ddjj-'+num+'-'+u+'" name="ddjj_complemento_ddjj-'+num+'-'+u+'" placeholder="COMPLEMENTO" value="" title="Colocar Complemento" class="k-textbox no-restriccion" ></div>'+
                        '</div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div>'+
                            '<input type="hidden" id="ddjj_acuerdo_ddjj_id-'+num+'-'+u+'" name="ddjj_acuerdo_ddjj_id-'+num+'-'+u+'" >'+
                            '<div class="span2"><input type="text" id="ddjj_naladisa_ddjj-'+num+'-'+u+'" name="ddjj_naladisa_ddjj-'+num+'-'+u+'" style="width:100%" required validationMessage="Seleccione un Arancel" ></div>'+
                            '<div class="span6"><input type="text" id="ddjj_nro_naladisa_ddjj-'+num+'-'+u+'" name="ddjj_nro_naladisa_ddjj-'+num+'-'+u+'" style="width:100%" validationMessage="Ingrese Partida Arancelaria"></div>'+
                        '</div>'+
                        
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div>'+
                            '<div class="span7"><input type="text" id="ddjj_observacion_ddjj-'+num+'-'+u+'" name="ddjj_observacion_ddjj-'+num+'-'+u+'" class="k-textbox" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="OBSERVACION"  ></div>'+
                            (acuerdo==false || estado_tramite==0? (estado? '<div class="span2" ><img src="styles/img/del_dark.png" id="celiminar-'+num+'-'+u+'" alt="eliminar servicio" onclick="delDDJJCriterioFila_ddjj(this)" height="28" width="28"></div>':'<div class="span2" ><img src="styles/img/add.png" id="cagregar"  onclick="addDDJJCriteriosFila_ddjj(true, '+num+', false)" height="28" width="28"></div>') : "")+
                        '</div>'+
                    '</div>';
        $('#parte_ddjj2-'+num).append(campo2);
        
        ComboboxAcuerdoDDJJ_ddjj('#ddjj_acuerdo_ddjj-'+num+'-'+u,'ddjj_tipo_ddjj-'+numddjj);  //change ed
        ComboboxCriterioOrigen_ddjj('#ddjj_criterio_ddjj-'+num+'-'+u, 'ddjj_acuerdo_ddjj-'+num+'-'+u);
        ComboboxArancelTipoDDJJ_ddjj('#ddjj_naladisa_ddjj-'+num+'-'+u, 'ddjj_acuerdo_ddjj-'+num+'-'+u);
        ComboboxArancelDDJJ_ddjj('#ddjj_nro_naladisa_ddjj-'+num+'-'+u, "Partida", 0, 1);
        
        var combo =  '#ddjj_naladisa_ddjj-'+num+'-'+u;
        var combo2 = '#ddjj_nro_naladisa_ddjj-'+num+'-'+u;
        $(combo).change(function(){
           
            var valor_combo1 = $(combo).val();
            $(combo2).data("kendoComboBox").destroy();
            ComboboxArancelDDJJ_ddjj($(combo2), "Partida", valor_combo1, 1);
        });
        
        if(acuerdo!=false){
           //alert(acuerdo.id_criterio);
            $("#ddjj_complemento_ddjj-"+num+"-"+u).val(decodeURIComponent(acuerdo.complemento));
            /*$("#ddjj_criterio-"+num+"-"+x).val(acuerdo.id_criterio);*/
        }
        $('#ddjj_criterio_ddjj-'+num+'-'+u).data("kendoComboBox").enable( true );
        if(estado_tramite!=0 && acuerdo!=false){
           
            $('#ddjj_complemento_ddjj-'+num+'-'+u).attr('readonly',true);
            $('#ddjj_complemento_ddjj-'+num+'-'+u).attr('class','k-textbox k-state-disabled');
            
            $('#ddjj_observacion_ddjj'+num+'-'+u).attr('readonly',true);
            $('#ddjj_observacion_ddjj-'+num+'-'+u).attr('class','k-textbox k-state-disabled');
            
            $('#ddjj_naladisa_ddjj-'+num+'-'+u).data("kendoComboBox").enable( false );
            $('#ddjj_nro_naladisa_ddjj-'+num+'-'+u).data("kendoComboBox").enable( false );
            $('#ddjj_acuerdo_ddjj-'+num+'-'+u).data("kendoComboBox").enable( false );
            $('#ddjj_acuerdo_ddjj-'+num+'-'+u).removeAttr("required");
            $('#ddjj_criterio_ddjj-'+num+'-'+u).data("kendoComboBox").enable( false );
            $('#ddjj_criterio_ddjj-'+num+'-'+u).removeAttr("required");
        }
        
        u++;
    }
    
    
    function ComboboxCriterioOrigen_ddjj(texto, cascade){
        $(texto).kendoComboBox({
            autoBind: true,
            cascadeFrom: cascade,
            placeholder:"Criterio",
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: { 
                type: "json",
                serverFiltering: true,
                transport: {
                        read: {
                            dataType: "json",
                            serverFiltering: true,
                            url: "index.php?opcion=admPlanilla&tarea=listar_criterios"
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
    
    function ComboboxArancelTipoDDJJ_ddjj(texto, cascade){
        $(texto).kendoComboBox({
            cascadeFrom: cascade,
            placeholder:"Tipo Arancel",
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: {
                type: "json",
                serverFiltering: true,
                transport: {
                        read: {
                            dataType: "json",
                            serverFiltering: true,
                            url: "index.php?opcion=admPlanilla&tarea=list_tipo_arancel"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{ 
                    var ids = texto.split("-");
                    if(this.value()==0){
                        
                        $("#ddjj_nro_naladisa_ddjj-"+ids[1]+'-'+ids[2]).removeAttr("required");
                        $("#ddjj_acuerdo_ddjj-"+ids[1]+'-'+ids[2]).removeAttr("required");
                        $("#ddjj_criterio_ddjj-"+ids[1]+'-'+ids[2]).removeAttr("required");
                       
                    }else{
                        $("#ddjj_nro_naladisa_ddjj-"+ids[1]+'-'+ids[2]).attr("required","required");
                        $("#ddjj_acuerdo_ddjj-"+ids[1]+'-'+ids[2]).attr("required","required");
                        $("#ddjj_criterio_ddjj-"+ids[1]+'-'+ids[2]).attr("required","required");
                    }
                     validator_add.validateInput($("#ddjj_nro_naladisa_ddjj-"+ids[1]+'-'+ids[2]));
                     validator_add.validateInput($("#ddjj_acuerdo_ddjj-"+ids[1]+'-'+ids[2]));
                     validator_add.validateInput($("#ddjj_criterio_ddjj-"+ids[1]+'-'+ids[2]));
                }

            }
        }).data("kendoComboBox");
    }
    
    function ComboboxEstadoDDJJ(texto, indice){
        $(texto).kendoComboBox({
            placeholder:"ESTADO",
            dataTextField: "descripcion",
            dataValueField: "id",
            value: indice==0? "": indice,
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=estado_planilla_co"
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
    
    function ComboboxArancelDDJJ_ddjj(texto, placeholder, arancel, detallado){
        $(texto).kendoComboBox({
            placeholder: placeholder,
            dataTextField: "descripcion",
            dataValueField: "id",
            filter: "contains",
            autoBind: false,
            minLength: 3,
            dataSource: { 
                type: "json",
                serverFiltering: true,
                transport: {
                    read: {
                        dataType: "json",
                        serverFiltering: true,
                        url: "index.php?opcion=admPlanilla&tarea=list_arancel&arancel="+arancel+"&detallado="+detallado
                    }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text("");
                }else{ 

                }
            }
        }).data("kendoComboBox");
    }
    function mostrarDDJJDetalleRevision(num){
        $("#parte_ddjj2-"+num).show(800);
        $("#parte_ddjj3-"+num).show(860);
        $("#ver_ddjj-"+num).attr("value", "Ocultar");
    }

    function ocultarDDJJDetalleRevision(num){
        $("#parte_ddjj2-"+num).hide(800);
        $("#parte_ddjj3-"+num).hide(860);
        $("#ver_ddjj-"+num).attr("value", "Mostrar");
    }

    function cambiarDDJJDetalleRevision(num){
        if($("#parte_ddjj2-"+num).is(":visible"))
            ocultarDDJJDetalleRevision(num);
        else
            mostrarDDJJDetalleRevision(num);
    }

    
    
</script>