<form name="alta_ddjj" id="alta_ddjj" method="post"  action="index.php">
<input type="hidden" name="opcion" id="opcion" value="admDeclaracionJurada" />
<input type="hidden" name="tarea" id="tarea" value="guardarDeclaracionJurada" /> 
<div class="row-fluid  form">
    <div class="row-fluid " id="revisardeclaracionjurada">
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid form">
                        <div class="span12">
                            <div class="titulonegro" > Nueva Declaración Jurada</div> 
                        </div>
                    </div>  
                </div>
                <div class="k-cuerpo">                   
                    <div class="row-fluid form" >
                        <div class="span12" style="text-align: left;" >
                            <input type="checkbox" name="check_comercializador" id="check_comercializador">En caso de ser comercializador elegir opción
                        </div>
                    </div>
                    <!-- Tabla de Registros para los datos del Productor de la mercancia -->
                    <div class="row-fluid form" style="display:none;" id="div_comercializador">
                        <fieldset>
                            <legend>Datos del Productor de la Mercancía</legend>
                            <div id="tabla_comercializadores" class="fadein" style="width: 100%; font-size: 10px;"></div>
                        </fieldset>
                        <input id="addfilacomercializador" type="button" value="+" class="k-primary" style="width:40" onclick="agregarfilacomercializador();"/> 
                        <input id="elimfilacomercializador" type="button" value="-" class="k-primary" style="width:40" onclick="eliminarfilacomercializador();"/> 
                    </div>
                    <div class="row-fluid form">
                        <div class="span6 " >
                        <input type="text" class="k-textbox" placeholder="Denominación Comercial"  name="denominacion_comercial" id="denominacion_comercial" required validationMessage="Por favor ingrese el apellido paterno" /> 
                        </div>
                        <div class="span6 " >
                        <input type="text" class="k-textbox" placeholder="Caracteristicas"  name="caracteristicas" id="caracteristicas" />    
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="span6 " >
                        <input type="text" class="k-textbox" name="nandina" id="nandina" /> 
                        </div>
                        <div class="span6 " >
                        <input type="text" class="k-textbox" placeholder="Descripcion"  name="descripcion_nandina" id="descripcion_nandina" readonly />    
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="span6 " >
                            <input style="width:100%;" id="unidadmedida" name="unidadmedida">
                        </div>
                        <div class="span6 " >
                            <input type="text" class="k-textbox "  placeholder="Mano de obra,otros costos"  name="mano_obra" id="mano_obra" /> 
                        </div>
                    </div>
                    
                    <!-- Tabla de Registros para LOS INSUMOS NACIONALES -->
                    <div class="row-fluid form" id="div_insumosnacionales">
                        <fieldset>
                            <legend>INSUMOS NACIONALES</legend>
                            <div id="tabla_insumosnacionales" class="fadein"></div>
                        </fieldset>
                        <input id="addfilainsumosnacionales" type="button" value="+" class="k-primary" style="width:40" onclick="agregarfilainsumosnacionales();"/> 
                        <input id="elimfilainsumosnacionales" type="button" value="-" class="k-primary" style="width:40" onclick="eliminarfilainsumosnacionales();"/> 
                    </div>

                    <!-- Tabla de Registros para LOS INSUMOS IMPORTADOS -->
                    <div class="row-fluid form" >
                        <div class="span12" style="text-align: left;" >
                            <input type="checkbox" name="check_insumosimportados" id="check_insumosimportados">En caso de existir insumos importados elegir opción
                        </div>
                    </div>
                    <!-- Tabla de Registros para los datos del Productor de la mercancia -->
                    <div class="row-fluid form" style="display:none;" id="div_insumosimportados">
                        <fieldset>
                            <legend>Insumos Importados</legend>
                            <div id="tabla_insumosimportados" class="fadein" style="width: 100%;"></div>
                        </fieldset>
                        <input id="addfilainsumosimportados" type="button" value="+" class="k-primary" style="width:40" onclick="agregarfilainsumosimportados();"/> 
                        <input id="elimfilainsumosimportados" type="button" value="-" class="k-primary" style="width:40" onclick="eliminarfilainsumosimportados();"/> 
                    </div>

                    <div class="row-fluid  form" >
                        <div class="span12" >
                        <input type="text" class="k-textbox "  placeholder="Descripción del Proceso Productivo"  name="procesoproductivo" id="procesoproductivo" /> 
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="span12" >
                        <input type="text" class="k-textbox "  placeholder="Observaciones"  name="observaciones" id="observaciones" /> 
                        </div>
                    </div>
                    
                    <div class="row-fluid  form" >
                        <div class="span12" style="font-weight: bold;" >ACUERDOS COMERCIALES
                        </div>
                    </div>
                    <div class="row-fluid form" style="text-align: left;" >
                        <div class="span2" >
                        <input type="checkbox" name="check_aladi" id="check_aladi">CAN
                        </div>
                        <div class="span2" >
                        <input type="checkbox" name="check_ace22" id="check_ace22">ACE-22
                        </div>
                        <div class="span2" >
                        <input type="checkbox" name="check_mercosur" id="check_mercosur">MERCOSUR
                        </div>
                        <div class="span2" >
                        <input type="checkbox" name="check_venezuela" id="check_venezuela">VENEZUELA
                        </div>
                        <div class="span2" >
                        <input type="checkbox" name="check_sgt" id="check_sgt">SGT
                        </div>
                    </div>
                    <div class="row-fluid form" style="display:none; text-align: left;" id="div_sgt">
                        <fieldset><legend>ACUERDOS PREFERENCIALES EN SGT</legend>
                        <div class="span3 " >
                        <input type="checkbox" name="sgp_canada" id="sgp_canada">CANADA
                        </div>
                        <div class="span3 " >
                        <input type="checkbox" name="sgp_suiza" id="sgp_suiza">SUIZA
                        </div>
                        <div class="span3 " >
                        <input type="checkbox" name="sgp_noruega" id="sgp_noruega">NORUEGA
                        </div>
                        <div class="span3 " >
                        <input type="checkbox" name="sgp_japon" id="sgp_japon">JAPON
                        </div>
                            
                        <div class="span3 " >
                        <input type="checkbox" name="sgp_zelanda" id="sgp_zelanda">NUEVA ZELANDA
                        </div>
                        <div class="span3 " >
                        <input type="checkbox" name="sgp_rusia" id="sgp_rusia">FEDERACION RUSA
                        </div>
                        <div class="span3 " >
                        <input type="checkbox" name="sgp_turquia" id="sgp_turquia">TURQUÍA
                        </div>
                        <div class="span3 " >
                        <input type="checkbox" name="sgp_bielorrusia" id="sgp_bielorrusia">BIELORRUSIA
                        </div>
                        
                        <div class="span3 " >
                        <input type="checkbox" name="sgp_ue" id="sgp_ue">UNION EUROPEA
                        </div>
                        <div class="span3 " >
                        <input type="checkbox" name="sgp_eeuu" id="sgp_eeuu">ESTADOS UNIDOS
                        </div>
                        <div class="span3 " >
                        <input type="checkbox" name="sgp_tp" id="sgp_tp">TERCEROS PAISES
                        </div>
                        </fieldset>
                    </div>
                    
                    <div class="row-fluid form" style="display:none; text-align: left;" id="div_exwork">
                        <div class="span6 " >
                        <input type="text" class="k-textbox "  placeholder="Valor Mercancía($us)"  name="valor_fob" id="valor_fob" /> 
                        </div>
                        <div class="span6 " >
                        <input type="text" class="k-textbox "  placeholder="Capacidad de Producción Mensual"  name="produccion_mensual" id="produccion_mensual" /> 
                        </div>
                    </div>
                    
                    <div class="row-fluid  form" >
                        <div class="span2">
                            <span style="text-align: right; font-weight: bold;">Total a Pagar:</span>
                        </div>
                        <div class="span2">
                            <span style="width: 100%"><input type="text" readonly id="total_ddjj" name="total_ddjj" value="0"></span>
                        </div>
                        <div class="span2">
                            <span style="text-align: left; font-weight: bold;">Bs.</span>
                        </div>
                    </div>
                    <!-- BOTONES -->
                    <div class="row-fluid form" >
                        <div class="span4" >
                        <input id="pedirasesoramiento" type="button" value="Pedir Asesoramiento" class="k-primary" style="width:100%"/> <br><br>
                        </div>
                        <div class="span4" >
                        <input id="guardarddjj" type="button" value="Guardar" class="k-primary" style="width:100%"/> <br><br>
                        </div>
                        <div class="span4" >
                        <input id="cancelarddjj" type="button"  value="Cancelar" class="k-primary" style="width:100%"/> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>      
</div>
</form>

<script>
    $("#pedirasesoramiento").kendoButton();
    $("#guardarddjj").kendoButton();
    $("#cancelarddjj").kendoButton();
    var pedirasesoramiento = $("#pedirasesoramiento").data("kendoButton");
    var guardarddjj = $("#guardarddjj").data("kendoButton");
    var cancelarddjj = $("#cancelarddjj").data("kendoButton");
    
    
    
    
    
    guardarddjj.bind("click", function(e){
        
        
        
        //almacenar todos los insumos nacionales
        var grid_nac = $("#tabla_insumosnacionales").data("kendoGrid");
        var data_nac = grid_nac.dataSource;
        var numfilas_nac = data_nac.total();
        var valores_nac = data_nac.data();

        var arr_nac = [];
        for (var i = 0; i < numfilas_nac; i++) {
            var valores="["+valores_nac[i].descripcion+","+valores_nac[i].fabricante+","+valores_nac[i].valor+"]";
            arr_nac.push(valores);
        }

        //capturar los datos del formulario y los insumos nacionales
        var datos = $("#alta_ddjj").serialize()+"&tabla_nac="+arr_nac;
        
        //Verificar si hay Comercializadores
        var check_comerc = $('#check_comercializador').prop('checked');
        if(check_comerc){
            var grid_comerc = $("#tabla_comercializadores").data("kendoGrid");
            var data_comerc = grid_comerc.dataSource;
            var numfilas_comerc = data_comerc.total();
            var valores_comerc = data_comerc.data();

            var arr_comerc = [];
            for (var i = 0; i < numfilas_comerc; i++) {
                var valores="["+valores_comerc[i].razon_social+","+valores_comerc[i].ci_nit+","+valores_comerc[i].domicilio+","+valores_comerc[i].representante_legal+","+valores_comerc[i].direccion_fabrica+","+valores_comerc[i].telefono+","+valores_comerc[i].precio_venta+","+valores_comerc[i].unidad_medida+","+valores_comerc[i].produccion_mensual+"]";
                arr_comerc.push(valores);
            }
            datos=datos+"&tabla_comerc="+arr_comerc;
        }

        //Verificar si hay Insumos Importados
        var check_import = $('#check_insumosimportados').prop('checked');
        if(check_import){
            var grid_import = $("#tabla_insumosimportados").data("kendoGrid");
            var data_import = grid_import.dataSource;
            var numfilas_import = data_import.total();
            var valores_import = data_import.data();

            var arr_import = [];
            for (var i = 0; i < numfilas_import; i++) {
                var valores="["+valores_import[i].descripcion+","+valores_import[i].nandina+","+valores_import[i].pais+","+valores_import[i].productor+","+valores_import[i].cuenta_co+","+valores_import[i].acuerdo+","+valores_import[i].valor+"]";
                arr_import.push(valores);
            }
            datos=datos+"&tabla_import="+arr_import;
        }
        
        alert(datos);
        //Guardar los datos mediante ajax enviando al controlador
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: datos,
            success: function (data) {
              //var respuesta = eval('('+data+')');
            }
        });

    });
    
    cancelarddjj.bind("click", function(e){  
        remover(tabStrip.select());
    });
    
    $(document).ready(function(){
        
        $("#nandina").kendoAutoComplete({
            minLength:6,
            dataTextField:"codigo",
            placeholder: "Introduce Codigo NANDINA...",
            filter: "contains",
            dataSource: new kendo.data.DataSource({
                transport: {
                    read: {
                        url: "index.php?opcion=admAcuerdo&tarea=listarArancelBoliviano",
                        data: {
                            q: function(){
                                return $("#nandina").data("kendoAutoComplete").value();
                            },
                            maxRows: 10,
                            username: "codigo"
                        }
                    }
                },
                schema: {
                     data:"codigo"
                }
            }),
            change: function(){
                 this.dataSource.read();
            }
        });
        
        //$('#check_comercializador').on('change', function(){
        $('#check_comercializador').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                $('#div_comercializador').fadeIn(1000);
            } else {
                $('#div_comercializador').fadeOut(1000);
            }  
        });

        $('#check_insumosimportados').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                $('#div_insumosimportados').fadeIn(1000);
            } else {  
                $('#div_insumosimportados').fadeOut(1000);
            }  
        });
        
        $('#check_sgt').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                $('#div_sgt').fadeIn(1000);
            } else {  
                $('#div_sgt').fadeOut(1000);
                var marcado_canada = $("#sgp_canada").prop('checked');
                if(marcado_canada){
                    var total=$('#total_ddjj').val();
                    var restar=parseFloat(total)-60;
                    $('#total_ddjj').val(restar);
                }
                
                var marcado_suiza = $("#sgp_suiza").prop('checked');
                if(marcado_suiza){
                    var total=$('#total_ddjj').val();
                    var restar=parseFloat(total)-60;
                    $('#total_ddjj').val(restar);
                }
            
                var marcado_noruega = $("#sgp_noruega").prop('checked');
                if(marcado_noruega){
                    var total=$('#total_ddjj').val();
                    var restar=parseFloat(total)-60;
                    $('#total_ddjj').val(restar);
                }
                var marcado_japon= $("#sgp_japon").prop('checked');
                if(marcado_japon){
                    var total=$('#total_ddjj').val();
                    var restar=parseFloat(total)-60;
                    $('#total_ddjj').val(restar);
                }
                var marcado_zelanda = $("#sgp_zelanda").prop('checked');
                if(marcado_zelanda){
                    var total=$('#total_ddjj').val();
                    var restar=parseFloat(total)-60;
                    $('#total_ddjj').val(restar);
                }
                var marcado_rusia = $("#sgp_rusia").prop('checked');
                if(marcado_rusia){
                    var total=$('#total_ddjj').val();
                    var restar=parseFloat(total)-60;
                    $('#total_ddjj').val(restar);
                }
                var marcado_turquia= $("#sgp_turquia").prop('checked');
                if(marcado_turquia){
                    var total=$('#total_ddjj').val();
                    var restar=parseFloat(total)-60;
                    $('#total_ddjj').val(restar);
                }
                var marcado_bielorrusia = $("#sgp_bielorrusia").prop('checked');
                if(marcado_bielorrusia){
                    var total=$('#total_ddjj').val();
                    var restar=parseFloat(total)-60;
                    $('#total_ddjj').val(restar);
                }
                var marcado_ue = $("#sgp_ue").prop('checked');
                if(marcado_ue){
                    var total=$('#total_ddjj').val();
                    var restar=parseFloat(total)-60;
                    $('#total_ddjj').val(restar);
                }
                var marcado_eeuu = $("#sgp_eeuu").prop('checked');
                if(marcado_eeuu){
                    var total=$('#total_ddjj').val();
                    var restar=parseFloat(total)-60;
                    $('#total_ddjj').val(restar);
                }
                var marcado_tp = $("#sgp_tp").prop('checked');
                if(marcado_tp){
                    var total=$('#total_ddjj').val();
                    var restar=parseFloat(total)-60;
                    $('#total_ddjj').val(restar);
                }
                
                $('#sgp_japon').prop('checked','');
                $('#sgp_zelanda').prop('checked','');
                $('#sgp_rusia').prop('checked','');
                $('#sgp_turquia').prop('checked','');
                $('#sgp_bielorrusia').prop('checked','');
                $('#sgp_ue').prop('checked','');
                $('#sgp_eeuu').prop('checked','');
                $('#sgp_tp').prop('checked','');
                $('#sgp_canada').prop('checked','');
                $('#sgp_suiza').prop('checked','');
                $('#sgp_noruega').prop('checked','');
            }  
        });
        
        /*calcular los valores para pagar del SGP*/
        $('#check_aladi').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        $('#check_ace22').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        $('#check_mercosur').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        $('#check_venezuela').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });

        $('#sgp_canada').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        
        $('#sgp_suiza').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        
        $('#sgp_noruega').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        
        $('#sgp_japon').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        
        $('#sgp_zelanda').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        
        $('#sgp_rusia').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        
        $('#sgp_turquia').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        
        $('#sgp_bielorrusia').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        
        $('#sgp_ue').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        
        $('#sgp_eeuu').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        
        $('#sgp_tp').change(function(){
            var marcado = $(this).prop('checked');
            if(marcado){
                var total=$('#total_ddjj').val();
                var sumar=parseFloat(total)+60;
                $('#total_ddjj').val(sumar);
            } else {  
                var total=$('#total_ddjj').val();
                var restar=parseFloat(total)-60;
                $('#total_ddjj').val(restar);
            }  
        });
        
        
        $("#unidadmedida").kendoComboBox(
            {   placeholder:"Unidad de Medida",
                dataTextField: "descripcion",
                dataValueField: "id_unidad_medida",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admUnidadMedida&tarea=listarUnidadMedida"
                        }
                    }
                }
        });
        
        $("#tabla_comercializadores").kendoGrid({
            editable: true,
            scrollable: false,
            resizable: true,
            selectable: "simple",
            columns: [
                { field: "razon_social", title: "Nombre o Razón social"},
                { field: "ci_nit", title: "CI o NIT"},
                { field: "domicilio", title: "Domicilio Legal"},
                { field: "representante_legal", title: "Repr. Legal"},
                { field: "direccion_fabrica", title: "Dirección de Fábrica"},
                { field: "telefono", title: "Teléfono"},
                { field: "precio_venta", title: "Precio Venta a Exportador"},
                { field: "unidad_medida", title: "Unidad de medida"},
                { field: "produccion_mensual", title: "Cap. Producción Mensual"}
            ]
        });
        
        $("#tabla_insumosnacionales").kendoGrid({
            editable: true,
            scrollable: false,
            resizable: true,
            selectable: "simple",
            columns: [
                { field: "descripcion", title: "Descripción"},
                { field: "fabricante", title: "Datos del Fabricante del Insumo"},
                { field: "valor", title: "Valor en $us"}
            ]
        });
        
        $("#tabla_insumosimportados").kendoGrid({
            editable: true,
            scrollable: false,
            resizable: true,
            selectable: "simple",
            navigatable: true,
            columns: [
                { field: "descripcion", title: "Descripción"},
                { field: "nandinda", title: "Código NANDINA"},
                { field: "pais", title: "País de Origen"},
                { field: "productor", title: "Productor (Razón Social)"},
                { field: "cuenta_co", title: "Cuenta C.O.", template: "<div style='position:relative'>"+
                    "<input type='radio' name='co' value='S' />Si "+
                    "<input type='radio' name='co' value='N' />No"+
                    "</div>"
                },
                { field: "acuerdo", title: "Acuerdo Comercial"},
                { field: "valor", title: "Valor en $us"}
            ]
        });



    });  

    function agregarfilacomercializador(){
        var tabla_comercializadores = $("#tabla_comercializadores").data("kendoGrid");
        tabla_comercializadores.addRow();
    }

    function agregarfilainsumosnacionales(){
        var tabla_insumosnacionales = $("#tabla_insumosnacionales").data("kendoGrid");
        tabla_insumosnacionales.addRow();
    }
    
    function agregarfilainsumosimportados(){
        var tabla_insumosimportados = $("#tabla_insumosimportados").data("kendoGrid");
        tabla_insumosimportados.addRow();
    }
    
    function eliminarfilacomercializador(){
        var tabla_comercializadores = $("#tabla_comercializadores").data("kendoGrid");
        var currentDataItem = tabla_comercializadores.dataItem(tabla_comercializadores.select());
        var dataRow = tabla_comercializadores.dataSource.getByUid(currentDataItem.uid);
        tabla_comercializadores.dataSource.remove(dataRow);
    }
    
    function eliminarfilainsumosnacionales(){
        var tabla_insumosnacionales = $("#tabla_insumosnacionales").data("kendoGrid");
        var currentDataItem = tabla_insumosnacionales.dataItem(tabla_insumosnacionales.select());
        var dataRow = tabla_insumosnacionales.dataSource.getByUid(currentDataItem.uid);
        tabla_insumosnacionales.dataSource.remove(dataRow);
    }
    
    function eliminarfilainsumosimportados(){
        var tabla_insumosimportados = $("#tabla_insumosimportados").data("kendoGrid");
        var currentDataItem = tabla_insumosimportados.dataItem(tabla_insumosimportados.select());
        var dataRow = tabla_insumosimportados.dataSource.getByUid(currentDataItem.uid);
        tabla_insumosimportados.dataSource.remove(dataRow);
    }

</script>
       