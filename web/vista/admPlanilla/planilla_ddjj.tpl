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
               
                <form name="formPlanillaDDJJ" id="formPlanillaDDJJ" method="post"  action="index.php"> 
                    <input type="hidden" name="fmsucursal" id="fmsucursal" value="{$fmsucursal}" />
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

<div class="row-fluid  form" id="planilla_tipoddjj">
    <div class="row-fluid "   >
        <div class="span2 hidden-phone" ></div>
        <div class="span8" >
            <div class="k-block fadein">
                
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > PLANILLAS DDJJ </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid  form" >
                    <div class="span4" hidden-phone></div>
                    <div class="span4" >
                        <input style="width:100%;" id="tipo_planilladdjj" name="tipo_planilladdjj" required validationMessage="Seleccione Tipo planilla">
                    </div>
                </div>
                <div class="row-fluid  form" >
                    <div class="span4" hidden-phone></div>
                    <div class="span4" >
                        <input id="volver" type="button" value="volver" class="k-primary" style="width:100%"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="div_aviso_ventana_ddjj"></div>
<script>
    var array_acuerdos = [];
    ocultar("planillaDDJJ");
    var numddjj = 1;
    var validator = $("#formPlanillaDDJJ").kendoValidator().data("kendoValidator");
    $("#CancelarDDJJ").kendoButton();
    $("#guardarDDJJ").kendoButton();
    var CancelarDDJJ = $("#CancelarDDJJ").data("kendoButton");
    var guardarDDJJ = $("#guardarDDJJ").data("kendoButton");
    
    CancelarDDJJ.bind("click", function(e){
        cerraractualizartab('Planilla DDJJ','admPlanilla','show_planilla_ddjj');
    });
    
    guardarDDJJ.bind("click", function(e){
       /* if(validator.validate()){
           // window.open('index.php?opcion=admPlanilla&tarea=cargarFolderDDJJ&folder=1', 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
            window.open('index.php?'+$("#formPlanillaDDJJ").serialize(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        }*/ 
        
        if(validator.validate()){
            guardarDDJJ.enable(false);
            $.ajax({
                async: false,
                type: 'post',
                url: 'index.php',
                data: $("#formPlanillaDDJJ").serialize(),
                success: function (data) {
                
                    var dt=eval("("+data+")");
                    var texto = "";
                    var aviso = "";
                    aviso = dt[0].tipo==4? "Este folder ya Fue entregado" : 'Aviso '+ dt[0].aviso;
                   // texto = dt[0].tipo==3? (dt[0].suceso==2? "<p><h2>  </h2></p>":"" ) : "";
                    texto = "<p>Número de Folder :<strong> " + dt[0].numero_folder + " </strong></p>";
                    texto += "<p> Fecha de Registro : <strong>" + dt[0].fecha + "</strong></p>";
                    texto += "<p> Hora de Registro : <strong>" + dt[0].hora + "</strong></p>";
                    
                    crearVentanaDDJJ(aviso, texto);
                    guardarDDJJ.enable(true);
                }
            });
            guardarDDJJ.enable(true);
        }
    });
    
    $("#volver").kendoButton();
    var volver = $("#volver").data("kendoButton");
    volver.bind("click", function(e){
        cerraractualizartab('Planillas','admPlanilla','show_planilla');
    });
    $("#tipo_planilladdjj").kendoComboBox({
        placeholder:"Seleccione Tipo Planilla",
        dataTextField: "text",
        dataValueField: "value",
        dataSource: [
                        { text: "Registro DDJJ", value: "1" },
                        { text: "Revisión DDJJ", value: "2" },
                        { text: "Entrega DDJJ ", value: "3" },
                        { text: "Baja DDJJ ", value: "4" },
			{ text: "DDJJ Vigente por Empresa ", value: "5" },
                    ],
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) {
                this.text('');
            }else{
                if(this.value()!=0){
                    if(this.value()==1){
                        $("#tituloddjj").html("Registro Declaración Jurada de Origen");
                    }
                    if(this.value()==2){
                        $("#tituloddjj").html("Revisión Declaración Jurada de Origen");
                    }
                    if(this.value()==3){
                        $("#tituloddjj").html("Entrega Declaración Jurada de Origen");
                    }
                    if(this.value()==4){
                        cerraractualizartab('Eliminar DDJJ','admPlanilla','vistadelddjj');           
                        $("#tituloddjj").html("Baja Declaración Jurada de Origen");
                    }
		    if(this.value()==5){
                        cerraractualizartab('DDJJ Vigente por Empresa','admPlanilla','ddjj_vigente');           
                        $("#tituloddjj").html("Declaraciones Juradas Vigentes");
                    }
                    ocultar("planilla_tipoddjj");
                    mostrar("planillaDDJJ");
                    addHeadDDJJ();
                    addFilaDDJJ(true);
                }
            }
        }
    });
    
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
        var headDDJJ = '';
        var pieDDJJ = '';
        if($("#tipo_planilladdjj").val()==1){
            headDDJJ = 
                '<input type="hidden" name="tarea" id="tarea" value="RegistrarDDJJ" /> '+
                '<div class="row-fluid  form" >'+
                    '<div class="span1 hidden-phone" ></div>'+
                    '<div class="span2 parametro" >RUEX</div>'+
                    '<div class="span2 ">'+
                        '<input style="width:100%;" id="ruex_ddjj" name="ruex_ddjj" required validationMessage="Ingrese un Nro RUEX">'+
                    '</div>'+
                    ('{$fmsucursal}'=='11'?
                    ('<div class="span5 ">'+
                        '<div class="span2 hidden-phone" ></div>'+
                        '<div class="span7" >'+
                            '<input style="width:100%;" id="sucursal" name="sucursal" required validationMessage="Seleccione una Regional"/>'+
                        '</div>'+
                    '</div>') : "" )+
                '</div>'+
                '<div class="row-fluid  form" >'+
                    '<div class="span1 hidden-phone" ></div>'+
                    '<div class="span2 parametro" >Razon social</div>'+
                    '<div class="span7 "><input type="text" id="razon_social_ddjj" name="razon_social_ddjj" class="k-textbox " ></div>'+
                '</div>';
            $('#ddjj_cabecera').append(headDDJJ);
            ComboboxRUEX('#ruex_ddjj');
            
            pieDDJJ = '<div class="span9 hidden-phone" ></div>'+
                '<div class="span1" >'+
                    '<img src="styles/img/add.png" id="cagregar"  onclick="addFilaDDJJ(false)" height="28" width="28">'+
                '</div>';
        
            $("#ddjj_pie").append(pieDDJJ);
        }else{
            //if($("#tipo_planilladdjj").val()==2 || $("#tipo_planilladdjj").val()==3)
            headDDJJ = 
            '<input type="hidden" name="tarea" id="tarea" value="' + ($("#tipo_planilladdjj").val()==2? 'RevisarDDJJ' : 'EntregarDDJJ') + '" /> '+
            '<div class="row-fluid  form" >'+
                '<div class="span2 hidden-phone" ></div>'+
                '<div class="span2 parametro" >Número de Folder</div>'+
                '<div class="span1 "><input type="text" id="nro_folder" name="nro_folder" class="k-textbox " placeholder="N° Folder" ></div>'+
                '<div class="span2 "><input id="cargar_folder_ddjj" name="cargar_folder_ddjj" type="button" value="Cargar Folder" class="k-primary" style="width:100%"/></div>'+
                ('{$fmsucursal}'=='11'?
                    ('<div class="span5 ">'+
                        '<div class="span2 hidden-phone" ></div>'+
                        '<div class="span7" >'+
                            '<input style="width:100%;" id="sucursal" name="sucursal" required validationMessage="Seleccione una Regional"/>'+
                        '</div>'+
                    '</div>') : "" )+
            '</div>'+
            '<div class="row-fluid  form" >'+
                '<input type="hidden" id="empresa_ddjj" name="empresa_ddjj" value="-1">'+
                '<div class="span2 hidden-phone" ></div>'+
                '<div class="span1 parametro" >RUEX</div>'+
                '<div class="span2 "><input type="text" id="ruex_ddjj" name="ruex_ddjj" class="k-textbox "></div>'+
            '</div>'+
            '<div class="row-fluid  form" >'+
                '<div class="span1 hidden-phone" ></div>'+
                '<div class="span2 parametro" >Razon social</div>'+
                '<div class="span6 "><input type="text" id="razon_social_ddjj" name="razon_social_ddjj" class="k-textbox " ></div>'+
            '</div>';
            $("#ddjj_cabecera").append(headDDJJ);
            $("#cargar_folder_ddjj").kendoButton();
            var cargar_folder_ddjj = $("#cargar_folder_ddjj").data("kendoButton");
            cargar_folder_ddjj.bind("click", function(e){
                if($('#cargar_folder_ddjj').val()!=''){
                    //alert($('#nro_folder').val());
                    cargarFolderDDJJ($('#nro_folder').val(), $("#tipo_planilladdjj").val());
                }
            });
        }
        
        if ({$fmsucursal}==11){
            $('#sucursal').kendoComboBox({
                placeholder:"Seleccione una Regional",
                ignoreCase: true,
                dataTextField: "descripcion",
                dataValueField: "id",
                dataSource: { 
                    transport: {
                            read: {
                                dataType: "json",
                                url: "index.php?opcion=admPlanilla&tarea=list_regionales"
                            }
                    }
                },
                change : function (e) {
                    if (this.value() && this.selectedIndex == -1) {
                        this.text('');
                    }else{
                        
                        $('#fmsucursal').val(this.value());

                    }
                }
            });
        }
    }

    function addFilaDDJJ(fila){
        var cuerpoDDJJ = '';
        
        if($("#tipo_planilladdjj").val()==1){
            cuerpoDDJJ = 
                '<div class="row-fluid form">'+
                    '<div class="span3 hidden-phone"></div>'+
                    '<div class="span2">'+
                        '<input style="width:100%;" id="ddjj_tipo-'+numddjj+'" name="ddjj_tipo-'+numddjj+'" required validationMessage="Seleccione un Tipo Emision">'+
                    '</div>'+
                   
                    '<div class="span2" id="ddjj_tipo_span-'+numddjj+'" name="ddjj_tipo_span-'+numddjj+'">'+
                        '<input type="text" id="ddjj_cantidad-'+numddjj+'" name="ddjj_cantidad-'+numddjj+'" class="k-textbox" placeholder="Cantidad formularios" required validationMessage="Ingrese Cantidad 1" >'+
                    '</div>'+
                     '<div class="span2"  id="div_ddjj_tipo_ddjj-'+numddjj+'" name="div_ddjj_tipo_ddjj-'+numddjj+'">'+
                        '<input style="width:100%;" id="ddjj_tipo_ddjj-'+numddjj+'" name="ddjj_tipo_ddjj-'+numddjj+'" required validationMessage="Seleccione un Tipo Emision">'+
                    '</div>'+
                    ((fila)?  "" : '<div class="span1" ><img src="styles/img/del_dark.png" id="celiminar" alt="eliminar servicio" onclick="delFila(this)" height="28" width="28"></div>' ) +
                '</div>';
            $('#ddjj_cuerpo').append(cuerpoDDJJ);
            var ddjjtipo = "#ddjj_tipo-"+numddjj;
           
            ComboboxTipoEmision(ddjjtipo);
            ComboboxDDJJTipoCO("#ddjj_tipo_ddjj-"+numddjj);
            $(ddjjtipo).change(function(){
                var res = $(ddjjtipo).attr('id').split("-");
                //alert( $(ddjjtipo).val());
                $("#ddjj_tipo_span-"+res[1]).html("");
                if($(ddjjtipo).val()==4){
                    $("#ddjj_tipo_span-"+res[1]).append('<input type="text" id="ddjj_cantidad-'+res[1]+'" name="ddjj_cantidad-'+res[1]+'" style="width:100%" placeholder="Nro DDJJ" required validationMessage="Seleccione DDJJ" >');
                    DDJJ_ddjj("#ddjj_cantidad-"+res[1], "Seleccione DDJJ");
                    
                    $("#ddjj_tipo_ddjj-"+res[1]).removeAttr("required");
                    ocultar('div_ddjj_tipo_ddjj-'+res[1]);
                }
                if($(ddjjtipo).val()==5){
                    $("#ddjj_tipo_span-"+res[1]).append('<input type="text" id="ddjj_cantidad-'+res[1]+'" name="ddjj_cantidad-'+res[1]+'" class="k-textbox" placeholder="Cantidad" required validationMessage="Ingrese Cantidad" >');
                    
                    mostrar('div_ddjj_tipo_ddjj-'+res[1]);
                    $("#ddjj_tipo_ddjj-"+res[1]).attr("required", "required");
                }
            });
            numddjj++;
        }
    }
    function ComboboxDDJJTipoCO(texto){
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
    function delFila(elem){
        $(elem).parent().parent().remove();
    }
    function delDDJJCriterioFila(elem){
        var id = $(elem).attr("id").split("-");
        var index = array_acuerdos.indexOf(id[1] + "-" + id[2]);
        array_acuerdos.splice(index, 1);
        $(elem).parent().parent().parent().remove();
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
            $("#ventanaaviso_ddjj").data("kendoWindow").close();
            $("#ddjj_cabecera").html("");
            $("#ddjj_cuerpo").html("");
            $("#ddjj_pie").html("");
            addHeadDDJJ();
            addFilaDDJJ(true);
            $('#ventanaaviso_ddjj').remove();
        });
    }
    function ventana(nombre, h, w){
        $("#"+nombre).kendoWindow({
            draggable: false,
            height: h+"px",
            width: w+"px",
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
    
    function cargarFolderDDJJ(numero_folder, tipo){
        $("#ddjj_cuerpo").html('');
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admPlanilla&tarea=cargarFolderDDJJ&folder='+numero_folder+'&fmsucursal='+$("#fmsucursal").val(),
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
                        cuerpo = 
                            '<div class="k-block campo" >'+
                            '<br>'+
                            '<div id="parte_ddjj1-'+num+'">'+
                                '<div class="row-fluid form" >'+
                                    '<div class="span1 parametro"> ' + (dt[i].id_tipo==4? 'Actualización' : '') + ' </div>'+
                                    '<div class="span1 parametro">'+num+' '+dt[i].formulario+' </div>'+
                                    '<input type="hidden"  id="ddjj_id-'+num+'" name="ddjj_id-'+num+'" value="'+dt[i].id+'" >'+
                                    '<div class="span1"><input type="number" class="k-textbox"  id="ddjj_correlativo-'+num+'" name="ddjj_correlativo-'+num+'" placeholder="N° DDJJ" value="'+dt[i].numero_ddjj+'" validationMessage="ingrese N° DDJJ"></div>'+
                                    '<div class="span4"><input type="text" class="k-textbox no-restriccion"  id="ddjj_descripcion-'+num+'" name="ddjj_descripcion-'+num+'" placeholder="DESCRIPCION" value="'+dt[i].descripcion+'" onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese Descripcion"></div>'+
                                    (tipo!=3? 
                                        ('<div class="span2">'+
                                            '<input type="text"  id="ddjj_estado-'+num+'" name="ddjj_estado-'+num+'" style="width:100%" placeholder="Estado" required validationMessage="Seleccione Estado">'+
                                        '</div>' ) : ( '<div class="span2 parametro"> ' + (dt[i].estado==1? "APROBADO" : ( dt[i].estado==2? "RECHAZADO": "PENDIENTE") ) + ' </div>' )
                                    ) +
                                    '<div class="span1 "><input id="ver_ddjj-'+num+'" name="ver_ddjj-'+num+'" '+ ( tipo==2? 'type="button"': 'type="hidden"') + 'value="Mostrar" onclick="cambiarDDJJDetalleRevision('+num+')" class="k-primary" style="width:100%"/></div>'+
                                '</div>'+
                                '<div class="row-fluid form" >'+
                                   '<div class="span2 hidden-phone"></div>'+
                                    '<div class="span7"><input type="text" id="ddjj_nandina-'+num+'" name="ddjj_nandina-'+num+'" placeholder="NANDINA" style="width:100%" value="' + (dt[i].nandina!= "" ? dt[i].nandina + ' - '+ dt[i].nandina_descripcion : "" ) + '" required validationMessage="Ingrese y seleccione Arancel"></div>'+
                                '</div>'+
                                '<div class="row-fluid form" >'+
                                    '<div class="span2 hidden-phone"></div>'+
                                    (dt[i].estado!=0? '<div class="span2 parametro"> fecha Registro </div><div class="span2"><input type="text" id="ddjj_fecha_registro-'+num+'" name="ddjj_fecha_registro-'+num+'" placeholder="Fecha Registro" value="'+dt[i].fecha_registro+'" style="width:100%"  validationMessage="Ingrese Fecha de Registro" disabled></div>'+
                                    '<div class="span2 parametro">Fecha de Vencimiento </div>'+
                                    '<div class="span2"><input type="text" id="ddjj_fecha_vencimiento-'+num+'" name="ddjj_fecha_vencimiento-'+num+'" placeholder="Fecha Vencimiento" value="'+dt[i].fecha_vencimiento+'" style="width:100%"  validationMessage="Ingrese Fecha de vencimiento" disabled></div>':
                                    (dt[i].estado!=2? '<div class="span2 parametro">Fecha de Vencimiento </div><div class="span2"><input type="text" id="ddjj_dias_vigencia-'+num+'" name="ddjj_dias_vigencia-'+num+'" placeholder="Vencimiento" style="width:100%" required validationMessage="Ingrese fecha de Vencimiento"></div>':"" ))+
                                '</div>'+
                                '<div class="row-fluid form" >'+
                                    '<div class="span2 hidden-phone"></div>'+
                                    '<div class="span7"><input type="text" class="k-textbox"  id="ddjj_observacion-'+num+'" name="ddjj_observacion-'+num+'" placeholder="OBSERVACION" value="'+dt[i].observacion+'"  onkeyup="javascript:this.value=this.value.toUpperCase();" validationMessage="Ingrese la razón del Rechazo"></div>'+
                                    '<!--div class="span2 parametro" id="div_actualizacion-'+num+'"><input type="checkbox" id="ddjj_actualizacion-'+num+'" name="ddjj_actualizacion-'+num+'"/> Actualización</div-->'+
                                '</div>'+
                            '</div>'+
                            '<div class="row-fluid form" id="parte_ddjj2-'+num+'">'+
                            '</div>'+
                            '<div class="row-fluid form" id="parte_ddjj3-'+num+'">'+
                            '</div>';
                        $("#ddjj_cuerpo").append(cuerpo);
                        if(tipo==2)
                            cargarDDJJCriteriosFila(false, num, dt[i].acuerdos, dt[i].estado, dt[i].id_tipo_planilla);
                        //addDDJJCriteriosFila(false, num, dt[i].acuerdos);
                        var aux = dt[i].descripcion==''? -1: dt[i].nandina;
                        ComboboxArancelDDJJ("#ddjj_nandina-"+num,"NANDINA", 1, 1);
                        accion('#ddjj_nandina-'+num);
                        ComboboxEstadoDDJJ('#ddjj_estado-'+num, dt[i].estado);

                        $("#ver_ddjj-"+num).kendoButton();
                        $("#parte_ddjj2-"+num).hide();
                        $("#parte_ddjj3-"+num).hide();
                        $('#ddjj_fecha_vencimiento-'+num).kendoDatePicker({
                            start: "month"
                        });
                        $('#ddjj_dias_vigencia-'+num).kendoDatePicker({
                            start: "month"
                        });
                        $('#ddjj_fecha_registro-'+num).kendoDatePicker({
                            start: "month"
                        });
                   
                        $('#ddjj_estado-'+num).change(function() {
                            var id = $(this).attr('id').split("-");
                            if($(this).val()==1){ //Emitido
                                {*$("#ddjj_correlativo-"+id[1]).attr('readonly',false);
                                $("#ddjj_correlativo-"+id[1]).attr('required', 'required');
                                $("#ddjj_correlativo-"+id[1]).attr('class','k-textbox');*}
                                
                                $("#ddjj_dias_vigencia-"+id[1]).attr('readonly',false);
                                $("#ddjj_dias_vigencia-"+id[1]).attr('required', 'required');
                                $("#ddjj_dias_vigencia-"+id[1]).attr('class','k-textbox');
                                
                                $('#ddjj_nandina-'+id[1]).attr("required", "required");
                                $('#ddjj_nandina-'+id[1]).data("kendoComboBox").enable( true );

                                $('#ddjj_observacion-'+id[1]).removeAttr("required");
                                
                            }else{  //Rechazado
                               {* $("#ddjj_correlativo-"+id[1]).attr('readonly',true);
                                $("#ddjj_correlativo-"+id[1]).removeAttr('required');
                                $("#ddjj_correlativo-"+id[1]).attr('class','k-textbox k-state-disabled');*}
                                
                                $("#ddjj_dias_vigencia-"+id[1]).attr('readonly',false);
                                $("#ddjj_dias_vigencia-"+id[1]).removeAttr('required');
                                $("#ddjj_dias_vigencia-"+id[1]).attr('class','k-textbox k-state-disabled');
                                
                                $('#ddjj_nandina-'+id[1]).data("kendoComboBox").enable( false );
                                $('#ddjj_nandina-'+id[1]).removeAttr("required");
                                
                                $("#ddjj_observacion-"+id[1]).attr('required', 'required');
                            }
                            
                            for(i=0; i<array_acuerdos.length; i++){
                                var indices = (array_acuerdos[i]).split("-");
                                if(indices[0]==id[1]){
                                    
                                    if($(this).val()==1){ //Emitido

                                        $( '#ddjj_naladisa-' + indices[0] + "-" + indices[1] ).data("kendoComboBox").enable( true );
                                        $( '#ddjj_naladisa-' + indices[0] + "-" + indices[1] ).attr("required", "required");
                                        var unop=$( '#ddjj_naladisa-' + indices[0] + "-" + indices[1] ).val();
                                        if(unop == 0){
                                            // $( '#ddjj_nro_naladisa-' + indices[0] + "-" + indices[1] ).data("kendoComboBox").enable( false );
                                            $( '#ddjj_nro_naladisa-' + indices[0] + "-" + indices[1] ).removeAttr("required");

                                        } else {
                                            $( '#ddjj_nro_naladisa-' + indices[0] + "-" + indices[1] ).data("kendoComboBox").enable( true );
                                            $( '#ddjj_nro_naladisa-' + indices[0] + "-" + indices[1] ).attr("required", "required");
                                        }
                                        
                                        
                                        $( '#ddjj_acuerdo-' + indices[0] + "-" + indices[1] ).data("kendoComboBox").enable( true );
                                        $( '#ddjj_acuerdo-' + indices[0] + "-" + indices[1] ).attr("required", "required");
                                        
                                        $( '#ddjj_criterio-' + indices[0] + "-" + indices[1] ).data("kendoComboBox").enable( true );
                                        $( '#ddjj_criterio-' + indices[0] + "-" + indices[1] ).attr("required", "required");
                                        
                                    }else { //Rechazado

                                        $( '#ddjj_naladisa-' + indices[0] + "-" + indices[1] ).data("kendoComboBox").enable( false );
                                        $( '#ddjj_naladisa-' + indices[0] + "-" + indices[1] ).removeAttr("required");
                                        
                                        $( '#ddjj_nro_naladisa-' + indices[0] + "-" + indices[1] ).data("kendoComboBox").enable( false );
                                        $( '#ddjj_nro_naladisa-' + indices[0] + "-" + indices[1] ).removeAttr("required");
                                        
                                        $( '#ddjj_acuerdo-' + indices[0] + "-" + indices[1] ).data("kendoComboBox").enable( false );
                                        $( '#ddjj_acuerdo-' + indices[0] + "-" + indices[1] ).removeAttr("required");
                                        
                                        $( '#ddjj_criterio-' + indices[0] + "-" + indices[1] ).data("kendoComboBox").enable( false );
                                        $( '#ddjj_criterio-' + indices[0] + "-" + indices[1] ).removeAttr("required");
                                        
                                    }
                                    
                                    validator.validateInput( $( '#ddjj_naladisa-' + indices[0] + "-" + indices[1] ) );
                                    validator.validateInput( $( '#ddjj_nro_naladisa-' + indices[0] + "-" + indices[1] ) );
                                    validator.validateInput( $( '#ddjj_acuerdo-' + indices[0] + "-" + indices[1] ) );
                                    validator.validateInput( $( '#ddjj_criterio-' + indices[0] + "-" + indices[1] ) );
                                    //validator.validateInput( $( 'ddjj_correlativo-' + indices[0] + "-" + indices[1] ) );
                                }
                            }
                            //validator.validateInput($("#ddjj_correlativo-"+id[1]));
                            //validator.validateInput($("#ddjj_fecha_vencimiento-"+id[1]));
                            validator.validateInput($("#ddjj_nandina-"+id[1]));
                            validator.validateInput($("#ddjj_observacion-"+id[1]));
                            validator.validateInput($("#ddjj_correlativo-"+id[1]));
                        });
                        
                        if(dt[i].estado!=0 || tipo==3){
                            
                            $("#ddjj_correlativo-"+num).attr('readonly',true);
                            $("#ddjj_correlativo-"+num).attr('class','k-textbox k-state-disabled');
                            $('#ddjj_descripcion-'+num).attr('readonly',true);
                            $('#ddjj_descripcion-'+num).attr('class','k-textbox k-state-disabled');
                            $('#ddjj_nandina-'+num).data("kendoComboBox").enable( false );
                            if(tipo!=3)
                                $('#ddjj_estado-'+num).data("kendoComboBox").enable( false );
                            
                            $('#ddjj_observacion-'+num).attr('readonly',true);
                            $('#ddjj_observacion-'+num).attr('class','k-textbox k-state-disabled');
                            
                            /*$('#ddjj_fecha_registro-'+num).data("kendoDatePicker").enable( false );
                            $('#ddjj_fecha_vencimiento-'+num).data("kendoDatePicker").enable( false );*/
                            ocultar("div_actualizacion-"+num);
                            
                            $('#ddjj_fecha_registro-'+num).attr('readonly', true);
                            $('#ddjj_fecha_registro-'+num).removeAttr("required");
                            $('#ddjj_fecha_registro-'+num).attr('class','k-textbox k-state-disabled');
                            
                            $("#ddjj_fecha_vencimiento-"+num).attr('readonly', true);
                            $("#ddjj_fecha_vencimiento-"+num).removeAttr("required");
                            $("#ddjj_fecha_vencimiento-"+num).attr('class','k-textbox k-state-disabled');
                           
                        }
                        if(tipo==2 && dt[i].estado!=0  ){
                            $('#guardarDDJJ').attr('type', 'hidden');
                            $('#CancelarDDJJ').val('salir');
                        }

                    } //FIN DEL FOR RRECORRRIDO
                }else{
                    alert("numero de folder inexistente");
                }
            }
        });  
        
        
    }
    
    function accion(texto){
        $(texto).keyup(function() {
           //alert(' 123 ');
        });
    }
    var x = 1;
    function cargarDDJJCriteriosFila(estado, num, acuerdos, estado_tramite, tipo_planilla){
        var aux = "["+acuerdos+"]";
        var au = acuerdos!=false? eval("("+aux+")") : false;
        var cantidad = au==false? 1: au.length;
        //alert(estado_tramite);
        for(var i=0; i<cantidad ; i++){
            addDDJJCriteriosFila(estado, num, au!=false? au[i]:false, estado_tramite, tipo_planilla);
        }
        
    }
    function addDDJJCriteriosFila(estado, num, acuerdo, estado_tramite, tipo_planilla){
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
                            '<div class="span7"><input type="text" id="ddjj_observacion-'+num+'-'+x+'" name="ddjj_observacion-'+num+'-'+x+'" class="k-textbox" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="OBSERVACION" '+(acuerdo!=false? ('value="'+acuerdo.observacion+'"') : "" )+' ></div>'+
                            (acuerdo==false || estado_tramite==0? (estado? '<div class="span2" ><img src="styles/img/del_dark.png" id="celiminar-'+num+'-'+x+'" alt="eliminar servicio" onclick="delDDJJCriterioFila(this)" height="28" width="28"></div>':'<div class="span2" ><img src="styles/img/add.png" id="cagregar"  onclick="addDDJJCriteriosFila(true, '+num+', false,false,'+tipo_planilla+')" height="28" width="28"></div>') : "")+
                        '</div>'+
                    '</div>';
        $('#parte_ddjj2-'+num).append(campo2);
        
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
        
        if(acuerdo!=false){
           //alert(acuerdo.id_criterio);
            $("#ddjj_complemento-"+num+"-"+x).val(decodeURIComponent(acuerdo.complemento));
            $("#id_ddjj_acuerdo-"+num+"-"+x).val(decodeURIComponent(acuerdo.id_planilla_ddjj_acuerdo));
            $("#ddjj_observacion-"+num+"-"+x).val(decodeURIComponent(acuerdo.observacion));
            /*$("#ddjj_criterio-"+num+"-"+x).val(acuerdo.id_criterio);*/
        }
        $('#ddjj_criterio-'+num+'-'+x).data("kendoComboBox").enable( true );
        if(estado_tramite!=0 && acuerdo!=false){
           
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
        }
        
        x++;
    }
    function ComboboxAcuerdoDDJJ(texto, tipo_planilla){  //change ed
        $(texto).kendoComboBox({
            placeholder:"Acuerdo",
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=list_acuerdo1&tipo_planilla="+tipo_planilla
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
    
    function ComboboxCriterioOrigen(texto, cascade){
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
    //Iniciando cambios para las relaciones
    function ComboboxArancelTipoDDJJ(texto, cascade){
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
                        
                        $("#ddjj_nro_naladisa-"+ids[1]+'-'+ids[2]).removeAttr("required");
                        $("#ddjj_acuerdo-"+ids[1]+'-'+ids[2]).removeAttr("required");
                        $("#ddjj_criterio-"+ids[1]+'-'+ids[2]).removeAttr("required");
                       
                    }else{
                        $("#ddjj_nro_naladisa-"+ids[1]+'-'+ids[2]).attr("required","required");
                        $("#ddjj_acuerdo-"+ids[1]+'-'+ids[2]).attr("required","required");
                        $("#ddjj_criterio-"+ids[1]+'-'+ids[2]).attr("required","required");
                    }
                     validator.validateInput($("#ddjj_nro_naladisa-"+ids[1]+'-'+ids[2]));
                     validator.validateInput($("#ddjj_acuerdo-"+ids[1]+'-'+ids[2]));
                     validator.validateInput($("#ddjj_criterio-"+ids[1]+'-'+ids[2]));
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
    
    function ComboboxArancelDDJJ(texto, placeholder, arancel, detallado){
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