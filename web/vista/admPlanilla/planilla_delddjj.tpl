<div class="row-fluid  form" id="planilla_tipoddjj">
    <div class="row-fluid "   >
        <div class="span2 hidden-phone" ></div>
        <div class="span8" >
            <div class="k-block fadein">
                
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" id="tituloddjj_baja" > BAJA DDJJ </div>
                        </div>
                    </div>
                </div>
                
                <div id="header" name="header">
                    <div class="row-fluid  form" >
                        <div class="span2">
                            <input  id="ruex_ddjj_baja" name="ruex_ddjj_baja" required validationMessage="Ingrese un Nro RUEX">
                        </div>    
                        <div class="row-fluid  form" >
                            <div class="span1 hidden-phone" ></div>
                            <div class="span2 parametro" >Razon social</div>
                            <div class="span7 "><input type="text" id="razon_social_ddjj_baja" name="razon_social_ddjj_baja" class="k-textbox " ></div>
                        </div>
                    </div>
                    <div class="row-fluid  form" >
                        <div class="span2"  id="div_ddjj_tipo_ddjj_baja" name="div_ddjj_tipo_ddjj_baja">
                            <input style="width:100%;" id="ddjj_tipo_ddjj_baja" name="ddjj_tipo_ddjj_baja" required validationMessage="Seleccione un Tipo Emision" required>
                        </div>
                        <div class="span2"  id="div_ddjj_num_ddjj_baja" name="div_ddjj_num_ddjj_baja">
                            <input style="width:100%;" id="ddjj_num_ddjj_baja" name="ddjj_num_ddjj_baja" required validationMessage="Seleccione un Tipo Emision">
                        </div>
                                            
                    </div>
                    <div class="row-fluid  form" >
                        <div class="span4" >
                            <input id="volver" type="button" value="Volver" class="k-primary" style="width:100%"/>
                        </div>
                        <div class="span4" >
                            <input id="continuar" type="button" value="Continuar" class="k-primary" style="width:100%"/>
                        </div>
                    </div>
                </div>
                <form name="formPlanillaDDJJ" id="formPlanillaDDJJ" method="post"  action="index.php">                     
                    <input type="hidden" name="opcion" id="opcion" value="admPlanilla" />
                    <input type="hidden" name="tarea" id="tarea" value="RegistrarBajaDDJJ" /> 
                    <div id="ddjj_cuerpo_del" name="ddjj_cuerpo_del"></div>
                </form>
                <div id="botones" name="botones">
                <div class="span4" ><input id="volver_baja" type="button" value="Volver" class="k-primary" style="width:100%"/></div>
                <div class="span4" ><input id="continuar_baja" type="button" value="Dar de Baja" class="k-primary" style="width:100%"/></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    ComboboxRUEXbaja('#ruex_ddjj_baja');
    ComboboxDDJJTipoCO_ddjj_baja("#ddjj_tipo_ddjj_baja");
    
    $("#ddjj_num_ddjj_baja").kendoComboBox({
            placeholder:"DDJJ",
            dataTextField: "descripcion",
            dataValueField: "id"
        }).data("kendoComboBox");
    $("#volver").kendoButton();
    var volver = $("#volver").data("kendoButton");
    volver.bind("click", function(e){
        cerraractualizartab('Planilla DDJJ','admPlanilla','show_planilla_ddjj');
    });
    $("#continuar").kendoButton();
    var cargar_ddjj = $("#continuar").data("kendoButton");
    cargar_ddjj.bind("click", function(e){
        
         $("#tituloddjj_baja").html("Baja Declaración Jurada de Origen");
         ocultar("header");
         cargarDDJJdel($("#ddjj_num_ddjj_baja").val());
        
        
        if($('#cargar_folder_ddjj').val()!=''){
            var $tipo_del = $('#ddjj_del_ddjj_baja').val();
            var $razon_social_del = $('#ddjj_del_ddjj_baja').val();
            var $id_empresa = $('#ddjj_del_ddjj_baja').val();
            
        }
    });
    
    $("#volver_baja").kendoButton();
    var volver_baja = $("#volver_baja").data("kendoButton");
    volver_baja.bind("click", function(e){
        cerraractualizartab('Planillas','admPlanilla','show_planilla');
    }); 
    $("#continuar_baja").kendoButton();
    var continuar_baja = $("#continuar_baja").data("kendoButton");
    continuar_baja.bind("click", function(e){
            continuar_baja.enable(false);
            $.ajax({
                async: false,
                type: 'post',
                url: 'index.php',
                data: $("#formPlanillaDDJJ").serialize(),
                success: function (data) {
                alert("termino con exito");
                    /*aviso =     "Atención!!! ";
                   // texto = dt[0].tipo==3? (dt[0].suceso==2? "<p><h2>  </h2></p>":"" ) : "";
                    texto = "<p>La declaracion fue dada de baja</p>";
                    crearVentanaDDJJ(aviso, texto);*/
                   cerraractualizartab('Planilla DDJJ','admPlanilla','show_planilla_ddjj'); 
                }
            });
            guardarDDJJ.enable(true);
        
        
    });

    ocultar("botones");
    
    function ComboboxRUEXbaja(texto){
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
                            $("#razon_social_ddjj_baja").val(data);
                            guardarDDJJ.enable(true);
                        }
                    });  
                }

            }
        }).data("kendoComboBox");
    }
    function ComboboxDDJJTipoCO_ddjj_baja(texto){
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
                    $('#ddjj_num_ddjj_baja').kendoComboBox({
                        placeholder:"DDJJ",
                        dataTextField: "descripcion",
                        dataValueField: "id",
                        dataSource: { 
                            transport: {
                                    read: {
                                        dataType: "json",
                                        url: "index.php?opcion=admPlanilla&tarea=listar_ddjj_baja&id_estado=1&id_tipo_co="+this.value()+"&id_empresa="+$("#ruex_ddjj_baja").val()
                                    }
                            }
                        }
                    }).data("kendoComboBox");
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{  
                    
                }

            }
        }).data("kendoComboBox");
    }  
    function cargarDDJJdel(id_ddjj_del){
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admPlanilla&tarea=cargarDDJJ_del&id_ddjj='+id_ddjj_del,
            success: function (data) {
                var dt=eval("("+data+")");
                if(dt.length>0){
                    var cuerpo = '';
                    var num=0;
                    $("#empresa_ddjj").val(dt[0].id_empresa);
                    $("#ruex_ddjj").val(dt[0].ruex);
                    $("#razon_social_ddjj").val(dt[0].razon_social)
                    for(var i=1; i<dt.length ; i++){
                        num = i;
                        $("#ddjj_cuerpo_del").html(''); 
                        //cuerpo_del = '<div class="span2 parametro" >RUEX</div>';
                        //$("#ddjj_cuerpo_del").append(cuerpo_del);  
                        tipo=1;
                        
                        cuerpo_del = 
                                '<input type="hidden" name="tarea" id="tarea" value="RegistrarBajaDDJJ" />'+
                            '<div class="k-block campo" >'+
                            '<br>'+
                                '<div id="parte_ddjj1-'+num+'">'+
                                        '<div class="row-fluid form" >'+
                                            '<div class="span2 parametro" >Razon social</div>'+
                                            '<div class="span7 "><input type="text" class="k-textbox no-restriccion"  id="razon_social_ddjj" name="razon_social_ddjj"  value="'+dt[0].razon_social+'" readonly  ></div>'+
                                            '<div class="span4"><input type="hidden"  id="empresa_ddjj" name="empresa_ddjj" value="'+dt[0].id_empresa+'"  ></div>'+
                                            '<div class="span4"><input type="hidden"  id="ruex_ddjj" name="ruex_ddjj"  value="'+dt[0].ruex+'"></div>'+
                                        '</div>'+
                                        '<div class="row-fluid form" >'+
                                            '<div class="span1 parametro">'+num+' '+dt[i].formulario+' </div>'+
                                            '<input type="hidden"  id="ddjj_id-'+num+'" name="ddjj_id-'+num+'" value="'+dt[i].id+'" readonly >'+
                                            '<div class="span1"><input type="number" class="k-textbox"  id="ddjj_correlativo-'+num+'" name="ddjj_correlativo-'+num+'" placeholder="N° DDJJ" value="'+dt[i].numero_ddjj+'" validationMessage="ingrese N° DDJJ" readonly ></div>'+
                                            '<div class="span4"><input type="text" class="k-textbox no-restriccion"  id="ddjj_descripcion-'+num+'" name="ddjj_descripcion-'+num+'" placeholder="DESCRIPCION" value="'+dt[i].descripcion+'" onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese Descripcion" readonly ></div>'+
                                            '<div class="span1 "><input id="ver_ddjj-'+num+'" name="ver_ddjj-'+num+'" '+ ( tipo==2? 'type="button"': 'type="hidden"') + 'value="Mostrar" onclick="cambiarDDJJDetalleRevision('+num+')" class="k-primary" style="width:100%" readonly/></div>'+
                                            '<div class="span2"  id="div_ddjj_del_ddjj_baja" name="div_ddjj_del_ddjj_baja">'+
                                            '<input style="width:100%;" id="ddjj_del_ddjj_baja" name="ddjj_del_ddjj_baja" required validationMessage="Seleccione un Tipo Baja">'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="row-fluid form" >'+
                                           '<div class="span2 hidden-phone"></div>'+
                                            '<div class="span7"><input type="text" id="ddjj_nandina-'+num+'" name="ddjj_nandina-'+num+'" class="k-textbox no-restriccion" placeholder="NANDINA" style="width:100%" value="' + (dt[i].nandina!= "" ? dt[i].nandina + ' - '+ dt[i].nandina_descripcion : "" ) + '" required validationMessage="Ingrese y seleccione Arancel" readonly></div>'+
                                        '</div>'+
                                        '<div class="row-fluid form" >'+
                                            '<div class="span2 hidden-phone"></div>'+
                                            (dt[i].estado!=0? '<div class="span2 parametro"> fecha Registro </div><div class="span2"><input type="text" id="ddjj_fecha_registro-'+num+'" name="ddjj_fecha_registro-'+num+'" placeholder="Fecha Registro" value="'+dt[i].fecha_registro+'" style="width:100%"  validationMessage="Ingrese Fecha de Registro" readonly></div>'+
                                            '<div class="span2 parametro">Fecha de Vencimiento </div>'+
                                            '<div class="span2"><input type="text" id="ddjj_fecha_vencimiento-'+num+'" name="ddjj_fecha_vencimiento-'+num+'" placeholder="Fecha Vencimiento" value="'+dt[i].fecha_vencimiento+'" style="width:100%"  validationMessage="Ingrese Fecha de vencimiento" readonly></div>':
                                            (dt[i].estado!=2? '<div class="span2 parametro">Fecha de Vencimiento </div><div class="span2"><input type="text" id="ddjj_dias_vigencia-'+num+'" name="ddjj_dias_vigencia-'+num+'" placeholder="Vencimiento" style="width:100%" required validationMessage="Ingrese fecha de Vencimiento"></div>':"" ))+
                                        '</div>'+
                                        
                                        '<div class="row-fluid form" >'+
                                            '<div class="span2 hidden-phone"></div>'+
                                            '<div class="span7"><input type="text" class="k-textbox"  id="ddjj_observacion-'+num+'" name="ddjj_observacion-'+num+'" placeholder="OBSERVACION" value="'+dt[i].observacion+'"  onkeyup="javascript:this.value=this.value.toUpperCase();" validationMessage="Ingrese la razón del Rechazo" readonly></div>'+
                                            '<!--div class="span2 parametro" id="div_actualizacion-'+num+'"><input type="checkbox" id="ddjj_actualizacion-'+num+'" name="ddjj_actualizacion-'+num+'"/> Actualización</div-->'+
                                        '</div>'+
                                        '<div class="row-fluid form" >'+
                                            '<div class="span2 hidden-phone"></div>'+
                                            '<div class="span7"><input type="text" class="k-textbox"  id="ddjj_motivo_baja-'+num+'" name="ddjj_motivo_baja-'+num+'" placeholder="MOTIVO DE BAJA" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" validationMessage="Ingrese motivo de baja"></div>'+
                                            '<div class="span2"><input type="text" id="ddjj_fecha_baja-'+num+'" name="ddjj_fecha_baja-'+num+'" placeholder="Fecha de Baja" value="" style="width:100%"  validationMessage="Ingrese Fecha de baja" ></div>'+
                                        '</div>'+
                                        '<div class="row-fluid form" id="parte_ddjj2-'+num+'"></div>'+
                                        '<div class="row-fluid form" id="parte_ddjj3-'+num+'"></div>'+
                                        
                                '</div>'+
                                '<br>'+
                                '<br>'+
                    '</div>';
                        $('#razon_social_ddjj').attr('readonly',true);
            $('#razon_social_ddjj').attr('class','k-textbox k-state-disabled');
                        $("#ddjj_cuerpo_del").append(cuerpo_del); 
                        ocultar("botones");
                        $("#ddjj_del_ddjj_baja").kendoComboBox({
                            placeholder:"Seleccione Tipo Baja",
                            dataTextField: "text",
                            dataValueField: "value",
                            index: 0,
                            dataSource: [
                                            { text: "Baja de DDJJ", value: "1" },
                                            /*{ text: "Baja acuerdo de DDJJ", value: "2" },*/
                                        ],
                            change : function (e) {
                                
                                if (this.value() == 1) { 
                                 ocultar("parte_ddjj2-1");
                                 mostrar("botones");
                                }else{
                                 mostrar("botones");   
                                    if (this.value() == 2){
                                      mostrar("parte_ddjj2-1");  
                                    }else{
                                    ocultar("parte_ddjj2-1");
                                    }
                                }
                            }
                                        
                        });
                        
                        $('#ddjj_fecha_baja-'+num).kendoDatePicker({
                            start: "month"
                        });
                        cargarDDJJCriteriosFila(false, num, dt[i].acuerdos, dt[i].estado, dt[i].id_tipo_planilla);
                        ocultar("parte_ddjj2-1");
                        
                        mostrar("botones");
                        
                    } //FIN DEL FOR RRECORRRIDO
                }else{
                    alert("no se encontro registro");
                }
                
            }
            
                    
        });  
    }


    function cargarDDJJCriteriosFila(estado, num, acuerdos, estado_tramite, tipo_planilla){
        var aux = "["+acuerdos+"]";
        var au = acuerdos!=false? eval("("+aux+")") : false;
        var cantidad = au==false? 1: au.length;
        //alert(estado_tramite);
        for(var i=0; i<cantidad ; i++){
           addDDJJCriteriosFila(estado, num, au!=false? au[i]:false, estado_tramite, tipo_planilla);
        }
        
    }
    function addDDJJCriteriosFila(estado, num, acuerdo, estado_tramite, tipo_planilla)
    {
        array_acuerdos.push(num+'-'+x);
        var campo2 ='<div class="fadein">'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone" ></div>'+
                            '<div class="span8" >'+
                                '<div class="row-fluid form" ><div class="barra" ></div></div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div><input type="hidden" id="id_ddjj_acuerdo-'+num+'-'+x+'" name="id_ddjj_acuerdo-'+num+'-'+x+'" class="k-textbox" >'+
                            '<div class="span2"><input type="text" id="ddjj_acuerdo-'+num+'-'+x+'" name="ddjj_acuerdo-'+num+'-'+x+'" placeholder="Acuerdo" '+(acuerdo!=false? ('value="'+acuerdo.id_acuerdo+'"') : "" )+' style="width:100%" required validationMessage="Seleccione un acuerdo"></div>'+
                            '<div class="span4">'+
                                '<input type="text" id="ddjj_criterio-'+num+'-'+x+'" name="ddjj_criterio-'+num+'-'+x+'" placeholder="CRITERIO" style="width:100%" '+(acuerdo!=false? ('value="'+acuerdo.id_criterio+'"') : "" )+' validationMessage="Seleccione Criterio">'+
                            '</div>'+
                            '<div class="span2"><input type="text" id="ddjj_complemento-'+num+'-'+x+'" name="ddjj_complemento-'+num+'-'+x+'" class="k-textbox no-restriccion" placeholder="COMPLEMENTO" ></div>'+
                            
                        '</div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div>'+
                            '<input type="hidden" id="ddjj_acuerdo_id-'+num+'-'+x+'" name="ddjj_acuerdo_id-'+num+'-'+x+'" '+(acuerdo!=false? ('value="'+acuerdo.id_acuerdo+'"') : "" )+' >'+
                            '<div class="span2"><input type="text" id="ddjj_naladisa-'+num+'-'+x+'" name="ddjj_naladisa-'+num+'-'+x+'" style="width:100%" required validationMessage="Seleccione un Arancel" '+(acuerdo!=false? ' value="'+acuerdo.tipo_arancel+'"':'')+'></div>'+
                            '<div class="span6"><input type="text" id="ddjj_nro_naladisa-'+num+'-'+x+'" name="ddjj_nro_naladisa-'+num+'-'+x+'" '+(acuerdo!=false? ('value="'+acuerdo.codigo_arancel+'"') : "" )+' style="width:100%" validationMessage="Ingrese Partida Arancelaria"></div>'+
                        '</div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div>'+
                            '<div class="span7"><input type="text" id="ddjj_observacion-'+num+'-'+x+'" name="ddjj_observacion-'+num+'-'+x+'" class="k-textbox" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="OBSERVACION" value="'+acuerdo.observacion+'" readonly="true"></div>'+
                        '</div>'+
                        '<div class="row-fluid form" >'+
                        '<div class="span2 hidden-phone"></div>'+
                            '<div class="span7"><input type="text" name="chbx_delete-'+num+'-'+x+'" id="chbx_delete-'+num+'-'+x+'"  >Eliminar Acuerdo</div> '+
                        '</div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span2 hidden-phone"></div>'+
                        '</div>'+
                    '</div>';
        $('#parte_ddjj2-'+num).append(campo2);
        ComboboxAcuerdoBaja('#chbx_delete-'+num+'-'+x);
        ComboboxAcuerdoDDJJ('#ddjj_acuerdo-'+num+'-'+x, tipo_planilla);
        ComboboxCriterioOrigen('#ddjj_criterio-'+num+'-'+x, 'ddjj_acuerdo-'+num+'-'+x);
        ComboboxArancelTipoDDJJ('#ddjj_naladisa-'+num+'-'+x, 'ddjj_acuerdo-'+num+'-'+x);
        ComboboxArancelDDJJ('#ddjj_nro_naladisa-'+num+'-'+x, "Partida", 0, 1);
        var combo =  '#ddjj_naladisa-'+num+'-'+x;
        var combo2 = '#ddjj_nro_naladisa-'+num+'-'+x;
        $(combo).change(function(){
           
            var valor_combo1 = $(combo).val();
            $(combo2).data("kendoComboBox").destroy();
            ComboboxArancelDDJJ($(combo2), "Partida", valor_combo1, 1);
        });
        
        $('#ddjj_complemento-'+num+'-'+x).attr('readonly',true);
            $('#ddjj_complemento-'+num+'-'+x).attr('class','k-textbox k-state-disabled');
            
            $('#ddjj_observacion'+num+'-'+x).attr('readonly',true);
            $('#ddjj_observacion-'+num+'-'+x).attr('class','k-textbox k-state-disabled');
            
            $('#ddjj_naladisa-'+num+'-'+x).data("kendoComboBox").enable( false );
            $('#ddjj_nro_naladisa-'+num+'-'+x).data("kendoComboBox").enable( false );
            $('#ddjj_acuerdo-'+num+'-'+x).data("kendoComboBox").enable( false );
            $('#ddjj_acuerdo-'+num+'-'+x).removeAttr("required");
            $('#ddjj_criterio-'+num+'-'+x).data("kendoComboBox").enable( false );
            $('#ddjj_criterio-'+num+'-'+x).removeAttr("required");
        
      //  if(acuerdo!=false){
           //alert(acuerdo.id_criterio);
        //    $("#ddjj_complemento-"+num+"-"+x).val(decodeURIComponent(acuerdo.complemento));
          //  $("#id_ddjj_acuerdo-"+num+"-"+x).val(decodeURIComponent(acuerdo.id_planilla_ddjj_acuerdo));
            //$("#ddjj_observacion-"+num+"-"+x).val(decodeURIComponent(acuerdo.observacion));
            /*$("#ddjj_criterio-"+num+"-"+x).val(acuerdo.id_criterio);*/
        //}
        $('#ddjj_criterio-'+num+'-'+x).data("kendoComboBox").enable( true );
       /* if(estado_tramite!=0 && acuerdo!=false){
           
            $('#ddjj_complemento-'+num+'-'+x).attr('readonly',true);
            $('#ddjj_complemento-'+num+'-'+x).attr('class','k-textbox k-state-disabled');
            
            $('#ddjj_observacion'+num+'-'+x).attr('readonly',true);
            $('#ddjj_observacion-'+num+'-'+x).attr('class','k-textbox k-state-disabled');
            
            $('#ddjj_naladisa-'+num+'-'+x).data("kendoComboBox").enable( false );
            $('#ddjj_nro_naladisa-'+num+'-'+x).data("kendoComboBox").enable( false );
            $('#ddjj_acuerdo-'+num+'-'+x).data("kendoComboBox").enable( false );
            $('#ddjj_acuerdo-'+num+'-'+x).removeAttr("required");
            $('#ddjj_criterio-'+num+'-'+x).data("kendoComboBox").enable( false );
            $('#ddjj_criterio-'+num+'-'+x).removeAttr("required");
        }*/
        
        x++;
    }
    
    function ComboboxAcuerdoBaja(combo){
    $(combo).kendoComboBox({
            placeholder:"Seleccione Tipo Baja",
            dataTextField: "text",
            dataValueField: "value",
            dataSource: [
                            { text: "NO", value: "NO" },
                            { text: "SI", value: "SI" },
                        ],
            index: 0
        });
    }                    
    function crearVentanaDDJJ(title, contenido){
        var campo =
                '<div class="row-fluid fadein" id="ventanaaviso_ddjj">'+
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
                            '<div class="span4"><input id="avisoaceptar_ddjj" type="button" value="Aceptar" class="k-primary" style="width:100%"/> </div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
        
        $('#div_aviso_ventana_ddjj').append(campo);
        ventana('ventanaaviso_ddjj','285','400');
        $("#avisoaceptar_ddjj").kendoButton();
        var avisoaceptar_ddjj = $("#avisoaceptar_ddjj").data("kendoButton");
        avisoaceptar_ddjj.bind("click", function(e){
            cerraractualizartab('Planilla DDJJ','admPlanilla','show_planilla_ddjj'); 
        });
    }
</script>