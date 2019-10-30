<div class="k-header">
    <div class="row-fluid form">
        <div class="span12">
            <div class="titulonegro">Variables de Riesgo</div>
        </div>
    </div>
</div>
<div class="k-body">
    <div class="row-fluid form">
        <label class="ddjj-section-label">Configuracion de las Variables que pueden ser aceptadas por la formula de analisis de Riesgo</label>
        <strong class="ddjj-section-label">Atención: El uso y Configuración de las variables es uso exclusivo de la Unidad de Certificación de origen para fines de análisis de riesgo.</strong>
        <section class="ddjj-section">
            <h2>Variables del Modulo de Declaraciones Juradas</h2>
            <div id="variables_ddjj" class="fadein"></div>
        </section>
        <section class="ddjj-section">
            <h2>Variables del Modulo de RUEX</h2>
            <div id="variables_ruex" class="fadein"></div>
        </section>
        <section class="ddjj-section">
            <h2>Criterios de Admisión</h2>
            <label class="ddjj-section-label">Si se escoje la casilla requiere verificación previa a la emisión, se creara un verificacion pero esta detendra el flujo de la declaración jurada hasta que esta verificación sea concluida</label>
            <button type="button" class="k-primary k-button" onclick="aumentarAdmision()"><span class="k-icon k-add"></span> Añadir Admisión</button>
            <ul class="verificacion-rango-list">
                {foreach $admisiones as $admision}
                    <li>
                        Nivel: <input type="text" class="k-textbox nivel form-text-md" value="{$admision->nivel}"/>
                        Min:<div class="input-number-container"><input min="0" type="text"  value="{$admision->min}" class="min input-number"/></div>
                        Max:<div class="input-number-container"><input min="0" type="text"  value="{$admision->max}" class="max input-number"/></div>
                        Requiere Verificación: <input type="checkbox" class="verificacion" {if $admision->verificacion}checked{/if}/>
                        Requiere Verificación Previa a la emisión: <input type="checkbox" class="verificacion_estricta" {if $admision->verificacion_estricta}checked{/if}/>
                        <button type="button" class="k-primary k-button" onclick="eliminarAdmision(this)" id-admision="{$admision->id_ver_admision}" >Eliminar</button>
                        <button type="button" class="k-primary k-button" onclick="guardarAdmision(this)" id-admision="{$admision->id_ver_admision}">Guardar</button>
                    </li>
                {/foreach}
            </ul>
        </section>
    </div>
</div>
<script>
    function kendoBody(module) {
        return {
            dataSource: {
                transport: {
                    read: {
                        url: "index.php?opcion=admAnalisisRiesgo&tarea=listarVariables&modulo_dep="+module,
                        dataType: "json"
                    }
                },
                pageSize: 10,
                schema: {
                    model: {
                        id: "id_ver_variable",
                        fields: {
                            id_ver_variable: { editable: false, nullable: true},
                            variable: { editable: false},
                            descripcion: { editable: true, nullable: true},
                            ayuda: { editable: true},
                            estado: { editable: true},
                            opciones: { editable: false}
                        }
                    }
                },
                sort: { field: "variable", dir: "asc"}
            },
            pageable: {
                refresh: true,
                pageSizes: true,
                buttonCount: 5
            },
            sortable: true,
            scrollable: false,
            selectable: "simple",
            reorderable: true,
            resizable: true,
            editable: true,
            columns: [
                { field: "id_ver_variable", hidden: true},
                { field: "variable", title: "Variable", width: 50},
                { field: "descripcion", title: "Descripción"},
                { field: "ayuda", title: "Ayuda"},
                {
                    field: "estado",
                    title: "Estado",
                    editor: EstadoDropDownEditor,
                    width: 100
                },
                {
                    field: 'opciones', title: "Opciones", width: 200, filterable: false,
                    template: '<div onclick="guardarVariable(#= id_ver_variable #,\''+module+'\')" class="k-button link">Guardar</div>#if(id_ver_variable!=1){ # <div onclick="editarValor(#= id_ver_variable #)" class="k-button link">Editar Valores</div># } #'
                },
            ]
        };
    }
    $("#variables_ddjj").kendoGrid(kendoBody('ddjj'));
    $("#variables_ruex").kendoGrid(kendoBody('ruex'));
    var var_estado_data=[
        { "estado":  "Inactivo" },
        { "estado":  "Activo" }
    ];
    var ver_estado = new kendo.data.DataSource({ data: var_estado_data});
    function EstadoDropDownEditor(container, options) {
        $('<input data-text-field="estado" data-value-field="estado" name="'+options.field+'" data-bind="value:' + options.field + '"/>')
                .appendTo(container)
                .kendoDropDownList({
                    autoBind: true,
                    dataTextField: "estado",
                    dataValueField: "estado",
                    dataSource: ver_estado,
                    value:options.model.estado
                 });
    };
    function editarValor(id_ver_variable){
        var contenedor_analisis=$('#verificacion-variables');
        getContenido('admAnalisisRiesgo','editarValores&id_ver_variable='+id_ver_variable, function (data) {
            contenedor_analisis.removeClass('loading-block').html(data);
        });
    }
    function guardarVariable(id_ver_variable,module){
        var variable=$("#variables_"+module).data("kendoGrid").dataSource.get(id_ver_variable);
        $('#verificacion-variables').addClass('loading-block');
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admAnalisisRiesgo&tarea=guardarVariable&id_ver_variable='+variable.id_ver_variable+'&variable='+variable.variable+'&descripcion='+variable.descripcion+'&ayuda='+variable.ayuda+'&estado='+variable.estado,
            success: function(data) {
                $('#verificacion-variables').removeClass('loading-block');
                var data = JSON.parse(data);
                if(!+data.status) alert('ocurrio un error: '+data.message);
                cerraractualizartab('Variables de Riesgo','admAnalisisRiesgo','analisisContenido&tab=variables')
            }
        });

    }

    var count=0;
    $('.verificacion-rango-list .input-number').kendoNumericTextBox({ format:"0",decimals: 0 });
    function aumentarAdmision(){
        var nuevaAdmision= '<li id="new_'+count+'">' +
                'Nivel:<input type="text" class="k-textbox nivel form-text-md"> ' +
                'Min:<div class="input-number-container"><input min="0" type="text"  value="0" class="min input-number"/></div> ' +
                'Max:<div class="input-number-container"><input min="0" type="text"  value="0" class="max input-number"/></div> ' +
                'Requiere Verificación: <input type="checkbox" class="verificacion"/>'+
                'Requiere Verificación Estricta: <input type="checkbox" class="verificacion_estricta"/>'+
                ' <button class="k-primary k-button" onclick="eliminarAdmision(this)">Eliminar</button> '+
                ' <button class="k-primary k-button" onclick="guardarAdmision(this)">Guardar</button> </li> ';

        $('.verificacion-rango-list').append(nuevaAdmision);
        $('#new_'+count).find('.input-number').kendoNumericTextBox({ format:"0",decimals: 0 });
        count++;
    }
    function guardarAdmision(button){
        $('.verificacion-container').addClass('loading-block');
        var $li=$(button).parent();
        var datos='';
        if(button.hasAttribute('id-admision')) datos+='&id_ver_admision='+$(button).attr('id-admision');
        datos+='&min='+($li.find('.min')[1].value?$li.find('.min')[1].value:0);
        datos+='&max='+($li.find('.max')[1].value?$li.find('.max')[1].value:0);
        datos+='&nivel='+($li.find('.nivel').val());
        datos+='&verificacion='+$li.find('.verificacion:checkbox:checked').length;
        datos+='&verificacion_estricta='+$li.find('.verificacion_estricta:checkbox:checked').length;

        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admAnalisisRiesgo&tarea=guardarAdmision' +datos,
            success: function (data) {
                $('.verificacion-container').removeClass('loading-block');
                var data = JSON.parse(data);
                if (!+data.status) alert('ocurrio un error: ' + data.message);
                else{
                    $li.find('button').attr('id-admision',data.id_admision);
                    fadeMessage('Se guardo correctamente');
                }
            }
        });
    }

    function eliminarAdmision(button){
        var $li=$(button).parent();
        if(button.hasAttribute('id-admision')){
            $('.verificacion-container').addClass('loading-block');
            $.ajax({
                type: 'post',
                url: 'index.php',
                data: 'opcion=admAnalisisRiesgo&tarea=eliminarAdmision&id_ver_admision='+$(button).attr('id-admision'),
                success: function (data) {
                    $('.verificacion-container').removeClass('loading-block');
                    var data = JSON.parse(data);
                    if (!+data.status) alert('ocurrio un error: ' + data.message);
                    $li.remove();
                }
            });
        }
        else $li.remove();
    }
</script>



