<script>

    {if $ddjj}
    var comercializadores_edition = [
        {foreach $ddjj->comercializadores as $comercializador}
        { razon_social:"{$comercializador->razon_social}",
            ci_nit:"{$comercializador->ci_nit}",
            domicilio:"{$comercializador->domicilio_legal}",
            representante_legal:"{$comercializador->representante_legal}",
            direccion_fabrica:"{$comercializador->direccion_fabrica}",
            telefono:"{$comercializador->telefono}",
            precio_venta:{$comercializador->precio_venta},
            unidad_medida:{$comercializador->id_unidad_medida},
            produccion_mensual:{$comercializador->produccion_mensual} },
        {/foreach}
    ];
    var insumos_nacionales_edition= [
        {foreach $ddjj->insumosnacionales as $insumo}
        {
            descripcion:"{$insumo->descripcion}",
            nombre_tecnico:"{$insumo->nombre_tecnico}",
            subpartida:"{$insumo->subpartida}",
            fabricante:"{$insumo->nombre_fabricante}",
            ci:"{$insumo->ci}",
            telefono:"{$insumo->telefono_fabricante}",
            unidad_medida:{$insumo->unidad_medida},
            cantidad:{if $insumo->cantidad}{$insumo->cantidad}{else}0{/if},
            valor:{$insumo->valor},
            sobrevalor:{$insumo->sobrevalor}
        },
        {/foreach}
    ];
    var insumos_importados_edition= [
        {foreach $ddjj->insumosimportados as $insumo}
        {
            descripcion:"{$insumo->descripcion}",
            nombre_tecnico:"{$insumo->nombre_tecnico}",
            nandina:"{$insumo->id_detalle_arancel}",
            pais:{$insumo->id_pais},
            productor:"{$insumo->razon_social_productor}",
            cuenta_co:{if $insumo->tiene_certificado_origen}"SI"{else}"NO"{/if},
            acuerdo:{$insumo->id_acuerdo},
            unidad_medida:{$insumo->id_unidad_medida},
            cantidad:{if $insumo->cantidad}{$insumo->cantidad}{else}0{/if},
            valor:{$insumo->valor},
            sobrevalor:{$insumo->sobrevalor}
        },
        {/foreach}
    ];

    {/if}
    {***********************************to uppercase***************************}
    $('#alta_ddjj .k-textbox').on('input', function(evt) {
        $(this).val(function (_, val) {
            return val.toUpperCase();
        });
    });

    $('.k-grid .k-input').on('input', function(evt) {
        $(this).val(function (_, val) {
            return val.toUpperCase();
        });
    });
    {*************************************comercializadores*****************************}
    var unidadmedida = [
        {foreach $unidadmedida as $um}
        {
            "id_unidad_medida": "{$um->getId_unidad_medida()}",
            "descripcion": "{$um->getDescripcion()}"
        },
        {/foreach}
    ];

    var pais = [
        {foreach $pais as $pa}
        {
            "id_pais": "{$pa->getId_pais()}",
            "nombre": "{$pa->getNombre()}"
        },
        {/foreach}
    ];
    var acuerdo = [
        {foreach $acuerdos as $acuerdo}
        {
            "id_acuerdo": "{$acuerdo->getId_Acuerdo()}",
            "descripcion": "{$acuerdo->getDescripcion()}"
        },
        {/foreach}
    ];

    var dataComercializadores = new kendo.data.DataSource({
        {if $ddjj}data:comercializadores_edition,{/if}
        schema: {
            model: {
                id: "id_comercializador",
                fields: {
                    razon_social: {
                        defaultValue:"",
                        validation: {
                            razon_socialvalidation: function (input) {
                                input.attr("data-razon_socialvalidation-msg", "Debe ingresar una Razón Social");
                                if (input.is("[name='razon_social']") && input.val() == "") {
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },
                    ci_nit: {
                        type: "string",
                        validation: {
                            required: true,
                            ci_nitvalidation: function (input) {
                                input.attr("data-ci_nitvalidation-msg", "Debe ingresar un CI o NIT");
                                if (input.is("[name='ci_nit']") && input.val() == "") {
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },
                    domicilio: {
                        type: "string",
                        validation: {
                            domiciliovalidation: function (input) {
                                input.attr("data-domiciliovalidation-msg", "Debe ingresar una Dirección");
                                if (input.is("[name='domicilio']") && input.val() == "") {
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },
                    representante_legal: {
                        type: "string",
                        validation: {
                            representante_legalvalidation: function (input) {
                                input.attr("data-representante_legalvalidation-msg", "Debe ingresar el Representante Legal");
                                if (input.is("[name='representante_legal']") && input.val() == "") {
                                    return /^[A-Z]/.test(input.val());
                                }

                                return true;
                            }
                        }
                    },
                    direccion_fabrica: {
                        type: "string",
                        validation: {
                            direccion_fabricavalidation: function (input) {
                                input.attr("data-direccion_fabricavalidation-msg", "Debe ingresar la Dirección");
                                if (input.is("[name='direccion_fabrica']") && input.val() == "") {
                                    return /^[A-Z]/.test(input.val());
                                }

                                return true;
                            }
                        }
                    },
                    telefono: {
                        type: "string",
                        validation: {
                            required: true,
                            telefonovalidation: function (input) {
                                if (input.is("[name='telefono']") && input.val() == "") {
                                    input.attr("data-telefonovalidation-msg", "Debe ingresar un Número de Contacto");
                                    return /^[A-Z]/.test(input.val());
                                }

                                return true;
                            }
                        }
                    },
                    precio_venta: {
                        type: "number",
                        defaultValue: '',
                        validation: {
                            max:9999999999,
                            min:0,
                            required: true,
                            precio_ventavalidation: function (input) {
                                if (input.is("[name='precio_venta']") && input.val() == "0") {
                                    input.attr("data-precio_ventavalidation-msg", "Debe ingresar el Precio de Venta al Comercializador");
                                    return /^[A-Z]/.test(input.val());
                                }

                                return true;
                            }
                        }
                    },
                    unidad_medida: {
                        type:"number",
                        defaultValue:{$unidadmedida[0]->id_unidad_medida},
                        validation: {
                            dropdownlistValidation:function(input) {
                                if (input.is("[name='unidad_medida']")) {
                                    var isValid = true;
                                    input.attr("data-dropdownlistValidation-msg", "Escoja una unidad de medida");
                                    if(input.val()=='')  isValid=false;
                                    return isValid;
                                }
                                return true;
                            }
                        }
                    },
                    produccion_mensual: {
                        type: "number",
                        max:9999999999,
                        defaultValue: '',
                        min:0,
                        validation: {
                            max:9999999999,
                            required: true,
                            produccion_mensualvalidation: function (input) {
                                if (input.is("[name='produccion_mensual']") && input.val() == "0") {
                                    input.attr("data-produccion_mensualvalidation-msg", "Ingrese su Capacidad de Producción Mensual");
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    }
                }
            }
        }
    });
    var dsumedida = new kendo.data.DataSource({ data: unidadmedida });
    function UMedidaDropDownEditor(container, options) {
        $('<input id="unidad_medida_dropdown" data-text-field="descripcion"  name="'+options.field+'" data-bind="value:' + options.field+ '"/>')
            .appendTo(container)
            .kendoDropDownList({
                dataTextField: "descripcion",
                dataValueField: "id_unidad_medida",
                autoBind: false,
                dataSource: dsumedida,
                select: onSelectunidadmedida,
                open: solveDropdowns
            });
        $("<span class='k-invalid-msg' data-for='" + options.field + "'></span>").appendTo(container);
    };

    function ValorNumeric (container, options) {
        $('<input data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoNumericTextBox({
                decimals: 4
            });
    }
    function onSelectunidadmedida(e) {
        var dataItem = this.dataItem(e.item.index());
    };
    var grid_comercializadores=$("#alta_ddjj #tabla_comercializadores").kendoGrid({
        dataSource: dataComercializadores,
        editable: true,
        scrollable: false,
        resizable: true,
        selectable: "simple",
        columns: [
            { field: "razon_social", title: "2.1 Nombre o Razón Social"},
            { field: "domicilio", title: "2.2 Domicilio Fiscal"},
            { field: "representante_legal", title: "2.3 Repr. Legal"},
            { field: "ci_nit", title: "2.4 CI o NIT"},
            { field: "telefono", title: "2.5 Teléfono y/o N° de celular"},
            { field: "precio_venta", title: "2.6 Precio Venta al Exportador en $us"},
            { field: "unidad_medida", title: "2.7 Unidad de Medida",template:"#=getDescripcionUnidadMedida(unidad_medida)#",editor: UMedidaDropDownEditor},
            { field: "produccion_mensual", title: "2.8 Cap. Producción Mensual"},
            { field: "direccion_fabrica", title: "2.9 Dirección de Fábrica"}
        ]
    });

    function getDescripcionUnidadMedida(unidad_medida)
    {
        for(var i=0, length = unidadmedida.length; i< length;i++)
        {
            if(unidadmedida[i].id_unidad_medida==unidad_medida)
            {
                return unidadmedida[i].descripcion;
            }
        }
    }

    var tabla_comercializadores = $("#alta_ddjj #tabla_comercializadores").data("kendoGrid");
    tabOnKendoGrid(tabla_comercializadores);
    function agregarfilacomercializador(){
        addKendoGridRow(tabla_comercializadores);
    }
    function eliminarfilacomercializador(){
        deleteKendoGridRow(tabla_comercializadores);
    }
    {**********************************Buscador auto complete******************************}
    var arancelOpcionales='';

    function setArancel(id_arancel,text,value){
        var arancel = (id_arancel ? id_arancel+'_ddjj_arancel' : 'ddjj_arancel');
        id_arancel=id_arancel ||'{$arancel_vigente->id_arancel}';
        function setUnidades(term){
            var dataItem;
            if(arancelOpcionales.length){
                dataItem= arancelOpcionales.filter(function(item){
                    return item.partida == term;
                });
                dataItem = dataItem[0];
            }
            if(dataItem){
                if(id_arancel == '{$arancel_vigente->id_arancel}'){
                    $('#alta_ddjj #descripcion_arancel').html(dataItem.denominacion);
                    $('#alta_ddjj #unidadmedida').html(dataItem.unidad_medida);
                }else{
                    $('#alta_ddjj #descripcion_arancel_'+id_arancel).html(dataItem.denominacion);
                    $('#alta_ddjj #ddjj_reo').html(dataItem.reo);
                }
                $("#"+arancel).attr('id_partida',dataItem.id_partida);
            }else{
                if(id_arancel == '{$arancel_vigente->id_arancel}'){
                    $('#alta_ddjj #descripcion_arancel').html('');
                    $('#alta_ddjj #unidadmedida').html('');
                }else{
                    $('#alta_ddjj #descripcion_arancel_'+id_arancel).html('');
                    $('#alta_ddjj #ddjj_reo').html('');
                }
                $("#"+arancel).attr('id_partida','');

            }
        }
        $("#"+arancel).autoComplete({
            minChars: 3,
            source: function(term, suggest){
                term = term.toLowerCase();
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data:{
                        opcion:'admArancel',
                        tarea:'searchPartida',
                        id_arancel:id_arancel,
                        term:term
                    },
                    success: function(data) {
                        arancelOpcionales=data=JSON.parse(data);
                        var suggestions = [];
                        for (i=0;i<data.length;i++)
                            suggestions.push(data[i].partida);
                        suggest(suggestions);
                    }
                });

            },
            onSelect:function(event, term, item) {
                setUnidades(term);
            }
        }).change(function() { setUnidades($( this ).val()) });
        if(text) $("#"+arancel).val(text);
        if(value) $("#"+arancel).attr('id_partida',value);
    }
    setTimeout(function () {
        {if $ddjj && $ddjj->partida->id_partida} setArancel(false,'{$ddjj->partida->partida}','{$ddjj->partida->id_partida}');
        {else} setArancel(false,'','');{/if}
    },1000);
    {***********************************criterios multiselect****************************}
    {if $ddjj}ddjj_id_acuerdo={$ddjj->id_acuerdo};{/if}
    {*function setMultiselect() {*}
    {*$("#criterio_origen").kendoMultiSelect({*}
    {*dataTextField: 'descripcion',*}
    {*dataValueField: 'id_criterio_origen',*}
    {*{if $ddjj}value:[{$ddjj->id_criterios}],{/if}*}
    {*dataSource: {*}
    {*transport: {*}
    {*read: {*}
    {*dataType: "json",*}
    {*url: 'index.php?opcion=admAcuerdo&tarea=normas&id_acuerdo='+ddjj_id_acuerdo,*}
    {*cache: false*}
    {*}*}
    {*}*}
    {*},*}
    {*open: function(e) {*}
    {*var $criterio =$('#criterio_origen-list');*}
    {*solveDropdowns($criterio);*}
    {*}*}
    {*});*}
    {*}*}

    {*setMultiselect();*}
    {*var multiselect = $("#criterio_origen").data("kendoMultiSelect");*}

    {*********************************acuerdos*****************************}

    var ddjj_id_acuerdo=0;
    $('input:radio[name="acuerdo"]').change(function(){
        if ($(this).is(':checked')) {

            var aranceles=$(this).attr('data-arancel').split(",");
            $('[id^="ddjj_arancel_"]').hide();
            aranceles.forEach(function(id) { if(id!=''){
                $('#ddjj_arancel_'+id).show();
                setArancel(id,'',0);
            } });
            $('#ddjj_acuerdo_copy').html($(this).attr('data-acuerdo-descripcion'));

            $('.total-valor-label').html("Total % Sobrevalor "+$(this).attr('data-valor-descripcion')+':');
            ddjj_id_acuerdo=$(this).attr('value');
            refreshNormas(ddjj_id_acuerdo);

            $('#ddjj_acuerdo_copy').html($(this).attr('data-acuerdo-descripcion'));
        }
        console.log($(this));
        if($(this).attr('data-idtipo-acuerdo') === '2') {
            $('#nota_aclaratoria_sgp').removeClass('hidden');
        } else {
            $('#nota_aclaratoria_sgp').addClass('hidden');
        }
    });

    function refreshNormas(id_acuerdo) {
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admAcuerdo&tarea=normas&id_acuerdo='+id_acuerdo,
            success: function(data) {
                data=JSON.parse(data);
                $("#ddjj_normas").html('');
                $.each(data, function( index, value ) {
                    $("#ddjj_normas").append("<tr><td class='cell-120'>"+value['descripcion']+"</td><td>"+value['parrafo']+"</td></tr>");
                });
            }
        });
    }
    {********************************instancia de campos*********************************}
    $('input:radio[name="esComercializador"]').change(function () {
        if ($(this).is(':checked')) {
            if ($(this).val()==="true")
            {
                $('.tabla_comercializadores_container').show();
                $('.tabla_fabrica_comer').hide();
                $('.tabla_comercializadores_datos_produccion').hide();
                $('#produccion_mensual_mercancia').removeAttr("required");

            }
            else
            {
                $('.tabla_comercializadores_container').hide();
                $('.tabla_fabrica_comer').show();
                $('.tabla_comercializadores_datos_produccion').show();
                $('#produccion_mensual_mercancia').attr("required","required");
            }
        }
    });
    $('#alta_ddjj #produccion_mensual_mercancia').kendoNumericTextBox({ format:"n" });
    $('#alta_ddjj #totalValorMO').kendoNumericTextBox({ format:"n4",
        min:0,
        decimals: 4,
        change: function() {
            genericUpdate();
        }
    });
    $('#alta_ddjj #costoFrontera').kendoNumericTextBox({ format:"n",
        min:0,
        decimals: 4,
        change: function() {
            genericUpdate();
        }
    });
    $("#alta_ddjj #procesoproductivo").keypress(function (event) {
        if((event.keyCode ? event.keyCode : event.which)==13){
            event.preventDefault();
            var s=$(this).val();
            $(this).val(s+'\n');
        }
    });
    {*********************************combo fabricas*********************}
    var fabrica_object={
        direccion:'',
        ciudad:'',
        contacto:'',
        telefono:''
    };
    $("#combo_fabricas").kendoComboBox({
        dataTextField: "direccion",
        dataValueField: "id_direccion",
        filter: "contains",
        {if $ddjj && $ddjj->id_direccion}value:{$ddjj->id_direccion},{/if}
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admEmpresa&tarea=listarDirecciones"
                }
            }
        },
        valueTemplate: '<span class="selected-value">#: data.direccion #</span>-<span>#: data.contacto #</span>-<span>#: data.telefono #</span>',
        template: '<span >#: data.direccion # - #: data.contacto # - #: data.telefono #</span>',
        height: 400,
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) {
                this.text('');
            }else{

                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admDireccion&tarea=get_data_direccion&id_direccion='+this.value(),
                    success: function(data) {
                        data=JSON.parse(data);
                        fabrica_object={
                            direccion:data[0].nombre_tipo_zona,
                            ciudad:data[0].dpto,
                            contacto:data[0].contacto,
                            telefono:data[0].tfijo
                        }
                    }
                });
            }
        },
        open: solveDropdowns,
        dataBound:removeSugegstions
    });
    {********************************leer solamente**************************}
    var readonlyEditor = function (container, options) {
        tabla_insumosnacionales.closeCell();
        tabla_insumosimportados.closeCell();
    };
    {*******************************insumos nacionales******************************}
    var dataInsumosNacionales = new kendo.data.DataSource({
        {if $ddjj}data:insumos_nacionales_edition,{/if}
        schema: {
            model: {
                id: "id_insumos_nacionales",
                fields: {
                    descripcion: {
                        defaultValue:"",
                        validation: {
                            descripcionvalidation: function (input) {
                                input.attr("data-descripcionvalidation-msg", "Debe ingresar la Descripción");
                                if (input.is("[name='descripcion']") && input.val() == "") {
                                    return /^[a-zA-Z0-9_, \b]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },
                    /*nombre_tecnico: {
                        defaultValue:"",
                        validation: {
                            nombre_tecnicovalidation: function (input) {
                                input.attr("data-nombre_tecnicovalidation-msg", "Debe ingresar el nombre técnico");
                                if (input.is("[name='nombre_tecnico']") && input.val() == "") {
                                    return /^[a-zA-Z0-9_, \b]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },*/
                    /*subpartida: {
                        defaultValue:"",
                        validation: {
                            required: true,
                            min:0,
                            subpartidavalidation: function (input) {
                                input.attr("data-subpartidavalidation-msg", "Debe ingresar la subpartida arnacelaria");
                                if (input.is("[name='subpartida']") && input.val() == "") {
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },*/
                    fabricante: {
                        defaultValue:"",
                        validation: {
                            fabricantevalidation: function (input) {
                                input.attr("data-fabricantevalidation-msg", "Debe ingresar el Fabricante del Insumo");
                                if (input.is("[name='fabricante']") && input.val() == "") {
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },
                    ci: {
                        defaultValue:"",
//                    validation: {
//                        civalidation: function (input) {
//                            input.attr("data-civalidation-msg", "Debe ingresar el CI o NIT");
//                            if (input.is("[name='ci']") && input.val() == "") {
//                                return /^[A-Z]/.test(input.val());
//                            }
//                            return true;
//                        }
//                    }
                    },
                    telefono: {
                        type: "string",
                        defaultValue:"",
                        validation: {
                            required: true,
                            telefonovalidation: function (input) {
                                input.attr("data-telefonovalidation-msg", "Debe ingresar un Número de Contacto");
                                if (input.is("[name='telefono']") && input.val() == "") {
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },
                    unidad_medida: {
                        type:"number",
                        defaultValue:{$unidadmedida[0]->id_unidad_medida},
                        validation: {
                            dropdownlistValidation:function(input) {
                                if (input.is("[name='unidad_medida']")) {
                                    var isValid = true;
                                    input.attr("data-dropdownlistValidation-msg", "Escoja una unidad de medida");
                                    if(input.val()=='')  isValid=false;
                                    return isValid;
                                }
                                return true;
                            }
                        }
                    },
                    cantidad: {
                        type:"number",
                        format:"{literal}{0:n3}{/literal}",decimals: 4,
                        step    : 0.001,
                        defaultValue:'',
                        validation: {
                            cantidadvalidation: function (input) {
                                input.attr("data-cantidadvalidation-msg", "Debe ingresar la cantidad");
                                if (input.is("[name='cantidad']") && input.val() == 0) {
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },
                    valor: {
                        type: "number",
                        format:"{literal}{0:0.0000}{/literal}",decimals: 4,
                        defaultValue:"",
                        validation: {
                            required: true,
                            max:9999999999,
                            min: 0,
                            valorfobvalidation: function (input) {
                                input.attr("data-valorfobvalidation-msg", "Debe ingresar el Valor");
                                if (input.is("[name='valor']") && input.val() == 0) {
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },
                    sobrevalor: {
                        type: "number",
                        defaultValue:""
                    }
                }
            }
        }
    });
    $("#tabla_insumosnacionales").kendoGrid({
        dataSource: dataInsumosNacionales,
        editable: true,
        scrollable: false,
        resizable: true,
        selectable: "simple",
        columns: [
            { field: "descripcion", title: "Nombre Comercial"},
            //{ field: "nombre_tecnico", title: "Nombre Técnico"},
            //{ field: "subpartida", title: "Codigo Nandina"},
            { field: "fabricante", title: "Nombre o Razón Social"},
            { field: "ci", title: "CI o NIT"},
            { field: "telefono", title: "No. Telf. Fabricante"},
            { field: "unidad_medida", title: "Unidad de Medida",template:"#=getDescripcionUnidadMedida(unidad_medida)#",editor: UMedidaDropDownEditor},
            { field: "cantidad", title: "Cantidad",editor:ValorNumeric},
            { field: "valor",title:"Valor($us)",editor:ValorNumeric},
            { field: "sobrevalor", title: "% Sobrevalor",editor: readonlyEditor,format:"{literal}{0:#.## \\'%'}{/literal}"}
        ],
        save: function (data) {
            setTimeout(function () {
                genericUpdate();

            },100);
        }
    }).data("kendoGrid");


    var tabla_insumosnacionales = $("#alta_ddjj #tabla_insumosnacionales").data("kendoGrid");
    tabOnKendoGrid(tabla_insumosnacionales);
    function agregarfilainsumosnacionales() {
        addKendoGridRow(tabla_insumosnacionales);
    }
    function eliminarfilainsumosnacionales() {
        deleteKendoGridRow(tabla_insumosnacionales);
        $('#totalValorIN').html(kendo.toString(refreshingTotal(tabla_insumosnacionales,'valor'), "n"));
        $('#totalSobrevalorIN').html(refreshingTotal(tabla_insumosnacionales,'sobrevalor'));
    }
    {*******************************insumos importados******************************}
    var dataInsumosImportados = new kendo.data.DataSource({
        {if $ddjj}data:insumos_importados_edition,{/if}
        schema: {
            model: {
                id: "id_insumos_importados",
                fields: {
                    descripcion: {
                        defaultValue:"",
                        validation: {
                            descripcionvalidation: function (input) {
                                input.attr("data-descripcionvalidation-msg", "Debe ingresar la Descripción");
                                if (input.is("[name='descripcion']") && input.val() == "") {
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },
                    nombre_tecnico: {
                        defaultValue:"",
                        validation: {
                            nombre_tecnicovalidation: function (input) {
                                input.attr("data-nombre_tecnicovalidation-msg", "Debe ingresar el nombre tecnico");
                                if (input.is("[name='nombre_tecnico']") && input.val() == "") {
                                    return /^[A-Z]/.test(input.val());
                                }


                                return true;
                            }
                        }
                    },
                    nandina: {
                        //defaultValue:"",
                        defaultValue:"",
                        validation: {
                            nandinavalidation: function (input) {
                                input.attr("data-nandinavalidation-msg", "Debe ingresar el Codigo Nandina ");
                                if (input.is("[name='nandina']") && input.val() == "") {
                                    return /^[A-Z]/.test(input.val());
                                }


                                return true;
                            }
                        }
                    },
                    pais: {
                        type:"number",
                        validation: {
                            dropdownlistValidation:function(input) {
                                if (input.is("[name='pais']")) {
                                    var isValid = true;
                                    input.attr("data-dropdownlistValidation-msg", "Escoja un país");
//                                if(input.val()=='')  isValid=false;
                                    return isValid;
                                }
                                return true;
                            }
                        }
                    },
                    productor: {
                        default: "",
                        validation: {
                            productorvalidation: function (input) {
                                input.attr("data-productorvalidation-msg", "Debe ingresar un productor");
                                if (input.is("[name='productor']") && input.val() == "") {
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },
                    cuenta_co: {
                        defaultValue:"NO",
                        type: "string"
                    },
                    acuerdo: {
                        type:"number",
                        validation: {
                            acuerdodropdownlistValidation:function(input) {
                                if (input.is("[name='acuerdo']")) {
                                    var isValid = true;
                                    input.attr("data-acuerdodropdownlistValidation-msg", "Escoja un acuerdo");
//                                if(input.val()=='')  isValid=false;
                                    return isValid;
                                }
                                return true;
                            }
                        }
                    },
                    unidad_medida: {
                        type:"number",
                        defaultValue:{$unidadmedida[0]->id_unidad_medida},
                        validation: {
                            dropdownlistValidation:function(input) {
                                if (input.is("[name='unidad_medida']")) {
                                    var isValid = true;
                                    input.attr("data-dropdownlistValidation-msg", "Escoja una unidad de medida");
                                    if(input.val()=='')  isValid=false;
                                    return isValid;
                                }
                                return true;
                            }
                        }
                    },
                    cantidad: {
                        type:"number",
                        defaultValue:'',
                        validation: {
                            cantidadvalidation: function (input) {
                                input.attr("data-cantidadvalidation-msg", "Debe ingresar la cantidad");
                                if (input.is("[name='cantidad']") && input.val() == 0) {
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },
                    valor: {
                        type: "number",
                        defaultValue:"",
                        validation: {
                            max:999999999999,
                            min:0,
                            valorvalidation: function (input) {
                                if (input.is("[name='valor']") && input.val() == "0") {
                                    input.attr("data-valorvalidation-msg", "Debe ingresar el Valor");
                                    return /^[A-Z]/.test(input.val());
                                }
                                return true;
                            }
                        }
                    },
                    sobrevalor: {
                        type: "number",
                        defaultVaule:""
                    }
                }
            }
        }
    });
    $("#tabla_insumosimportados").kendoGrid({
        dataSource: dataInsumosImportados,
        editable: true,
        scrollable: false,
        resizable: true,
        selectable: "simple",
        columns: [
            { field: "descripcion", title: "Descripción"},
            { field: "nombre_tecnico", title: "Nombre Técnico"},
            { field: "nandina", title: "Código Arancelario", editor: NandinaDropDownEditor},
            //{ field: "nandina", title: "Código Arancelario"},
            { field: "pais", title: "País de Origen",template:"#=getPaisNombre(pais)#", editor: PaisDropDownEditor},
            { field: "productor", title: "Nombre o Razón Social"},
            { field: "cuenta_co", title: "Cuenta C.O.", editor: TienecoDropDownEditor},
            { field: "acuerdo", title: "Acuerdo Comercial",template:"#=getAcuerdoSigla(acuerdo)#", editor: AcuerdoDropDownEditor},
            { field: "unidad_medida", title: "Unidad de Medida",template:"#=getDescripcionUnidadMedida(unidad_medida)#",editor: UMedidaDropDownEditor},
            { field: "cantidad", title: "Cantidad",editor:ValorNumeric },
            { field: "valor", title: "Valor($us)",editor:ValorNumeric },
            { field: "sobrevalor", title: "% Sobrevalor ",editor: readonlyEditor,format:"{literal}{0:#.## \\'%'}{/literal}"}
        ],
        save: function (data) {
            setTimeout(function () {
                genericUpdate();
            },100);
        }
    });

    var tabla_insumosimportados = $("#alta_ddjj #tabla_insumosimportados").data("kendoGrid");
    tabOnKendoGrid(tabla_insumosimportados);
    function agregarfilainsumosimportados() {
        addKendoGridRow(tabla_insumosimportados);
    }
    function eliminarfilainsumosimportados() {
        deleteKendoGridRow(tabla_insumosimportados);
        $('#totalValorII').html(kendo.toString(refreshingTotal(tabla_insumosimportados,'valor'), "n"));
        $('#totalSobrevalorII').html(refreshingTotal(tabla_insumosimportados,'sobrevalor'));
    }
    {**************************pais******************************}
    var dspais = new kendo.data.DataSource({ data: pais });
    function getPaisNombre(id_pais)
    {
        if(id_pais==0) return 'DESCONOCIDO';
        for(var i=0, length = pais.length; i< length;i++)
        {
            if(pais[i].id_pais==id_pais)
            {
                return pais[i].nombre;
            }
        }
    }

    function NandinaDropDownEditor(container, options) {
        id_arancel='{$arancel_vigente->id_arancel}';
        var input = $("<input/>");
        input.attr("name", options.field);
        // append it to the container
        input.appendTo(container);
        input.autoComplete({
            minChars: 3,
            source: function(term, suggest){
                term = term.toLowerCase();
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data:{
                        opcion:'admArancel',
                        tarea:'searchPartida',
                        id_arancel:id_arancel,
                        term:term
                    },
                    success: function(data) {
                        arancelOpcionales=data=JSON.parse(data);
                        var suggestions = [];
                        for (i=0;i<data.length;i++)
                            suggestions.push(data[i].partida)
                        suggest(suggestions);
                    }
                });

            }
        })
    };
    function PaisDropDownEditor(container, options) {

        $('<input id="pais_dropdown" data-text-field="nombre" data-value-field="id_pais" name="'+options.field+'" data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoDropDownList({
                autoBind: false,
                dataSource: dspais,
                dataTextField: "nombre",
                dataValueField: "id_pais",
                optionLabel: {
                    nombre: "DESCONOCIDO",
                    id_pais: "0"
                },
                open: solveDropdowns
            });
        $("<span class='k-invalid-msg' data-for='" + options.field + "'></span>").appendTo(container);
    };
    {**************************Co************************************}
    var tieneco = [
        { "valor": "0", "descripcion": "NO" },
        { "valor": "1", "descripcion": "SI" },
    ];
    var dstieneco = new kendo.data.DataSource({ data: tieneco });
    function TienecoDropDownEditor(container, options) {
        $('<input data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoDropDownList({
                autoBind: true,
                dataTextField: "descripcion",
                dataValueField: "descripcion",
                dataSource: dstieneco,
                open: solveDropdowns
            });
    };
    {**************************Acuerdo*********************************}
    function getAcuerdoSigla(id_acuerdo)
    {
        if(id_acuerdo==0) return 'NINGUNO';
        for(var i=0, length = acuerdo.length; i< length;i++)
        {
            if(acuerdo[i].id_acuerdo==id_acuerdo)
            {
                return acuerdo[i].descripcion;
            }
        }
    }
    var dsacuerdo = new kendo.data.DataSource({ data: acuerdo });
    function AcuerdoDropDownEditor(container, options) {
        $('<input id="acuerdo_dropdown" data-text-field="descripcion" data-value-field="id_acuerdo" name="'+options.field+'" data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoDropDownList({
                autoBind: false,
                dataSource: dsacuerdo,
                autoBind: false,
                dataTextField: "descripcion",
                dataValueField: "id_acuerdo",
                optionLabel: {
                    descripcion: "NINGUNO",
                    id_acuerdo: "0"
                },
                open: solveDropdowns
            });
        $("<span class='k-invalid-msg' data-for='" + options.field + "'></span>").appendTo(container);
    };
    {********************************Beneficios zonas especiales***************************************************}
    $('#alta_ddjj .zonas_especiales').change(function(){
        if($('#alta_ddjj .zonas_especiales.otros').prop('checked'))
        {
            $('#alta_ddjj #div_elaboraciondetalle').show();
        } else {
            $('#alta_ddjj #div_elaboraciondetalle').hide();
            $('#alta_ddjj #elaboracion_detalle').val('');
        }
    });
    {*******************************Validacion de todo el formulario********************************************************}
    var alta_ddjj = $("#alta_ddjj").kendoValidator({
        rules:{
            checkvalidator: function(input) {
                var validate = input.data('checkvalidator');
                if (typeof validate !== 'undefined')  return ($("#alta_ddjj input[name=acuerdo][type=radio]:checked").length > 0);
                return true;
            },
            escomercializador: function(input) {
                var validate = input.data('escomercializador');
                if (typeof validate !== 'undefined')  return ($("#alta_ddjj input[name=esComercializador][type=radio]:checked").length > 0);

                return true;
            },
            productor: function (input) {
                var validate = input.data('productor');
                var validate_productor = input.data('productor');
                if (typeof validate !== 'undefined' && $('#alta_ddjj input[name=esComercializador]:checked').val()=='true')  return checkGrid(tabla_comercializadores);
                return true;
            },/*
        produccionmensual: function (input) {
            var validate = input.data('produccionmensual');
            if (typeof validate !== 'undefined' && ($('#alta_ddjj #produccion_mensual_mercancia').val().trim() == '' || $('#alta_ddjj #produccion_mensual_mercancia').val() == 0)) return false;
            return true;
        },*/
            descripcionproceso: function (input) {
                var validate = input.data('descripcionproceso');
                if (typeof validate !== 'undefined' && $('#alta_ddjj #procesoproductivo').val().trim() == '') return false;
                return true;
            },
            insumosnacionales: function (input) {
                var validate = input.data('insumosnacionales');
                if (typeof validate !== 'undefined') return (checkGrid(tabla_insumosimportados) || checkGrid(tabla_insumosnacionales));
                return true;
            },
            insumosimportados: function (input) {
                var validate = input.data('insumosimportados');
                if (typeof validate !== 'undefined') return (checkGrid(tabla_insumosimportados) || checkGrid(tabla_insumosnacionales));
                return true;
            },
            checkzonas: function(input) {
                var validate = input.data('checkzonas');
                if (typeof validate !== 'undefined')  return ($("#alta_ddjj .zonas_especiales[type=radio]:checked").length > 0);
                return true;
            },
            criterioorigen:function(input) {
                var validate = input.data('criteriorigen');
                if (typeof validate !== 'undefined'){
                    return $('#criterio_origen').data("kendoMultiSelect").value().length!=0;
                }
                return true;
            },
            ddjjarancel: function (input) {
                var validate = input.data('ddjjarancel');
                if (typeof validate !== 'undefined'){
                    return ($('#descripcion_arancel').html().trim() != '');
                }
                return true;
            },
            arancelesacorp: function (input) {
                var validate = input.data('arancelesacorp');
                if (typeof validate !== 'undefined'){
                    var acuerdoradio=$('input:radio[name="acuerdo"]:checked');
                    var arancelesvalidationflag=true;
                    if(acuerdoradio.length) {
                        $.each(acuerdoradio.attr('data-arancel').split(","), function (index, value) {
                            if ($('#descripcion_arancel_' + value).length && $('#descripcion_arancel_' + value).html().trim()=='') arancelesvalidationflag = false;
                        });
                        return arancelesvalidationflag;

                    }else{
                        return false;
                    }
                }
                return true;
            }
        },
        messages:{
            checkvalidator: "Escoja al menos un acuerdo ó regimen preferencial",
            escomercializador: "Escoja al menos una opción",
            productor:"Ingrese al menos un productor",
            elaboracionvalidator: "Escoja al menos una opción",
            descripcionproceso:"Por favor ingrese la descripción",
            insumosnacionales:"Por favor ingrese al menos un insumo nacional o importado",
            insumosimportados:"Por favor ingrese al menos un insumo nacional o importado",
            checkzonas:"Debe selecionar si la mercancia se produce o no en Zona Franca",
            //produccionmensual:"Coloque la Cap. de Producción Mensual",
            criterioorigen:"Escoja un criterio de origen",
            ddjjarancel:"Ingrese la subpartida arancelaria",
            arancelesacorp:"Ingrese la clasificacion de los aranceles"
        }
    }).data("kendoValidator");
    {**************************************Vista de la mercancia****************************************}
    ocultar('view_ddjj');
    function previewDdjj() {
        $('#general_ddjj_warning').addClass('hidden');
        if(alta_ddjj.validate()){
            fillForm();
            cambiar('alta_ddjj_container','view_ddjj');
            if($('#observaciones_ddjj').length) $('#observaciones_ddjj').hide();
        } else {
            $('#general_ddjj_warning').removeClass('hidden');
        }

    }

    {*********************************************tooltips ayudas*********************************************}
    var tooltip = $("#alta_ddjj").kendoTooltip({
        filter: ".tooltip",
        width: 400,
        position: "top"
    }).data("kendoTooltip");

    grid_comercializadores.find('.k-grid-header').kendoTooltip({
        filter: "th",
        width: 400,
        position:"top",
        content: function (e) {
            var target = e.target; // element for which the tooltip is shown
            var message;
            switch ($(target).attr('data-field')){
                case 'razon_social':
                    message = 'En caso que la unidad productora cuente con NIT, indicar la Razón Social de la unidad productora.';
                    break;
                case 'domicilio':
                    message = 'En caso que la unidad productora cuente con NIT, indicar el domicilio fiscal que se encuentra registrado en el NIT.';
                    break;
                case 'representante_legal':
                    message = 'Indicar el nombre del Representante Legal de la unidad productora o nombre del contacto de la persona a cargo de la fábrica.';
                    break;
                case 'ci_nit':
                    message = 'En caso de existir, indicar el Número de Identificación Tributaria (NIT) emitido por el Servicio de Impuestos Nacionales, de la unidad productora.';
                    break;
                case 'razon_social':
                    message = 'En caso que la unidad productora cuente con NIT, indicar la Razón Social de la unidad productora.';
                    break;
                case 'telefono':
                    message = 'Indicar el número telefónico del Representante Legal o contacto de la unidad productora.';
                    break;
                case 'precio_venta':
                    message = 'Indicar el precio de transacción (precio de venta de la unidad productora al exportador) en dólares estadounidenses.';
                    break;
                case 'unidad_medida':
                    message = 'Indicar la unidad de medida de la mercancía de transacción entre el productor y el exportador.';
                    break;
                case 'produccion_mensual':
                    message = 'Indicar la capacidad de producción mensual de la mercancía registrada.';
                    break;
                case 'direccion_fabrica':
                    message = 'Indicar la dirección de la fábrica o unidad productora.';
                    break;
                default:
                    message=$(target).text();
            }

            return message;
        }
    });
    $("#tabla_insumosnacionales").find('.k-grid-header').kendoTooltip({
        filter: "th",
        width: 400,
        position:"top",
        content: function (e) {
            var target = e.target; // element for which the tooltip is shown
            var message;
            switch ($(target).attr('data-field')){
                case 'descripcion':
                    message = 'Indicar el nombre comercial del insumo utilizado. Por ejemplo: Tela   ';
                    break;
                case 'nombre_tecnico':
                    message = 'Indicar el nombre técnico del insumo, en relación al Sistema Armonizado de Designación y Codificación de Mercancías. Por ejemplo: Tela de punto, 60% algodón y 40% poliéster, para confección de prendas de vestir.';
                    break;
                case 'subpartida':
                    message = 'Indicar la sub partida arancelaria NANDINA, del insumo a 10 dígitos. Por ejemplo: 5210.29.00.00';
                    break;
                case 'fabricante':
                    message = 'Indicar el Nombre y Apellido o la Razón Social del productor del insumo.';
                    break;
                case 'ci':
                    message = 'Indicar el número de la cédula de identidad o el NIT del productor del insumo.';
                    break;
                case 'unidad_medida':
                    message = 'Indicar la unidad de medida del insumo';
                    break;
                case 'cantidad':
                    message = 'Indicar la cantidad utilizada del insumo para la elaboración o producción de una unidad de la mercancía.';
                    break;
                case 'telefono':
                    message = 'Indicar el número telefónico del productor del insumo.';
                    break;
                case 'valor':
                    message = 'Indicar la cantidad utilizada del insumo para la elaboración o producción de una unidad de la mercancía.';
                    break;
                case 'sobrevalor':
                    message = 'Indicar el valor que representa en el valor de exportación total de la mercancía a del insumo para la elaboración o producción de una unidad de la mercancía ';
                    break;
                default:
                    message=$(target).text();
            }

            return message;
        }
    });
    $("#tabla_insumosimportados").find('.k-grid-header').kendoTooltip({
        filter: "th",
        width: 400,
        position:"top",
        content: function (e) {
            var target = e.target; //elemento que esta siendo mostrado
            var message;
            switch ($(target).attr('data-field')){
                case 'descripcion':
                    message = 'Indicar el nombre comercial del insumo utilizado. Por ejemplo: Tela   ';
                    break;
                case 'nombre_tecnico':
                    message = 'Indicar el nombre técnico del insumo, en relación al Sistema Armonizado de Designación y Codificación de Mercancías. Por ejemplo: Tela de punto, 60% algodón y 40% poliéster, para confección de prendas de vestir.';
                    break;
                case 'subpartida':
                    message = 'Indicar la sub partida arancelaria NANDINA, del insumo a 10 dígitos. Por ejemplo: 5210.29.00.00';
                    break;
                case 'fabricante':
                    message = 'Indicar el Nombre y Apellido o la Razón Social del productor del insumo.';
                    break;
                case 'ci':
                    message = 'Indicar el número de la cédula de identidad o el NIT del productor del insumo.';
                    break;
                case 'unidad_medida':
                    message = 'Indicar la unidad de medida del insumo';
                    break;
                case 'cantidad':
                    message = 'Indicar la cantidad utilizada del insumo para la elaboración o producción de una unidad de la mercancía.';
                    break;
                case 'telefono':
                    message = 'Indicar el número telefónico del productor del insumo.';
                    break;
                case 'valor':
                    message = 'Indicar la cantidad utilizada del insumo para la elaboración o producción de una unidad de la mercancía.';
                    break;
                case 'sobrevalor':
                    message = 'Indicar el valor que representa en el valor de exportación total de la mercancía a del insumo para la elaboración o producción de una unidad de la mercancía ';
                    break;
                default:
                    message=$(target).text();
            }

            return message;
        }
    });
    {**********************************************total porcentaje********************************}
    function totalPercentage() {
        var total=0;
        total+= +refreshingTotal(tabla_insumosnacionales,'valor');
        total+= +refreshingTotal(tabla_insumosimportados,'valor');
        total+= +$('#totalValorMO').data("kendoNumericTextBox").value();
        total+= +$('#costoFrontera').data("kendoNumericTextBox").value();
        return total;

    }
    function genericUpdate() {
        var total=+totalPercentage(),
            totalIN=+(refreshingTotal(tabla_insumosnacionales,'valor') || 0),
            totalII=+(refreshingTotal(tabla_insumosimportados,'valor') || 0),
            manoObra=+($('#alta_ddjj #totalValorMO').data("kendoNumericTextBox").value()|| 0),
            frontera=+($('#alta_ddjj #costoFrontera').data("kendoNumericTextBox").value()|| 0),
            exw=manoObra+totalII+totalIN,
            fob=exw+frontera;

//    console.log('total',total);
//    console.log('totalIN',totalIN);
//    console.log('totalII',totalII);
//    console.log('namoObra',manoObra);
//    console.log('frontera',frontera);
//    console.log('exw',exw);
//    console.log('fob',fob);

        updateSobrevalor(tabla_insumosnacionales,total);
        updateSobrevalor(tabla_insumosimportados,total);

        $('#totalValorIN').html(kendo.toString(totalIN, "n").split('.').join(""));
        $('#totalSobrevalorIN').html(kendo.toString(getPercentage(total,totalIN), "n").split('.').join(""));
        $('#totalValorII').html(kendo.toString(totalII, "n").split('.').join(""));
        $('#totalSobrevalorII').html(kendo.toString(getPercentage(total,totalII), "n").split('.').join(""));

        $('#totalSobrevalorMO').html(getPercentage(total,manoObra));
        $('#totalEnFabrica').html(kendo.toString(exw, "n").split('.').join(""));
        $('#totalEnFabricaPercentage').html(getPercentage(total,exw));

        $('#costoFronterePercentage').html(getPercentage(total,frontera));
        $('#fobPercentage').html(getPercentage(total,fob));
        $('#fob').html(kendo.toString(fob, "n").split('.').join(""));

        return {
            total:total,
            totalIN:totalIN,
            totalINPercentage:kendo.toString(getPercentage(total,totalIN), "n").split('.').join(""),
            totalII:totalII,
            totalIIPercentage:kendo.toString(getPercentage(total,totalII), "n").split('.').join(""),
            manoObra:manoObra,
            manoObraPercentage:getPercentage(total,manoObra),
            frontera:frontera,
            fronteraPercentage:getPercentage(total,frontera),
            exw:exw,
            exwPercentage:getPercentage(total,exw),
            fob:fob,
            fobPercentage:getPercentage(total,fob)
        };
    }



    {**********************************************solo si tiene ddjj (edicion)************************************}
    {if $ddjj}

    var radio_acuerdo_checked=$('input:radio[name="acuerdo"]:checked');
    var aranceles=radio_acuerdo_checked.attr('data-arancel').split(",");
    $('[id^="ddjj_arancel_"]').hide();
    refreshNormas(radio_acuerdo_checked.attr('value'));
    aranceles.forEach(function(id) { if(id!=''){
        var arancel=$('#'+id+'_ddjj_arancel');
        setArancel(id,arancel.attr('data-text'),arancel.attr('data-value'));
    } });

    aranceles.forEach(function(id) { if(id!='') $('#ddjj_arancel_'+id).show(); });

    genericUpdate();
    {if $ddjj->id_direccion}
    $.ajax({
        type: 'post',
        url: 'index.php',
        data: 'opcion=admDireccion&tarea=get_data_direccion&id_direccion='+{$ddjj->id_direccion},
        success: function(data) {
            data=JSON.parse(data);
            fabrica_object={
                direccion:data[0].nombre_tipo_zona,
                ciudad:data[0].dpto,
                contacto:data[0].contacto,
                telefono:data[0].tfijo
            }
        }
    });
    {/if}
    {/if}

</script>
