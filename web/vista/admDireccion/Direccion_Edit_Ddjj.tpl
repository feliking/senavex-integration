
<div class="edit_dir_{$de_id}"  id="edit_dir_{$de_id}" name="edit_dir_{$de_id}" >
    <div name="form_editar_direccion_{$de_id}" id="form_editar_direccion_{$de_id}" method="post"  action="index.php" >
        <input type="hidden" name="direcciontipo_{$de_id}" id="direcciontipo_{$de_id}" value="{$tipo}">
        <input type="hidden" name="de_id_{$de_id}" id="de_id_{$de_id}" value="{$de_id}">
        <div class="k-cuerpo">
            <div name="cobro_direccion_{$de_id}" id="cobro_direccion_{$de_id}">
                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        {*<span class="tooltip" title="Seleccione tipo de via.">?</span>*}(*) Calle/Av./Plaza/Otro
                    </div>
                    <div class="span2 " >
                        <input style="width:100%;" id="ed_tc_{$de_id}" name="ed_tc_{$de_id}" placeholder="Calle/Av/Plaza/Otro" required validationMessage="Seleccione un Tipo">
                    </div>
                    <div class="span3 parametro" >
                        {*<span class="tooltip" title="direccion descriptiva.">?</span>*}(*) Nombre Calle/Av./Plaza/Otro
                    </div>
                    <div class="span4 " >
                        <input type="text" required class="k-textbox " name="ed_ntc_{$de_id}" id="ed_ntc_{$de_id}" placeholder="Nombre Calle/Av./Plaza/Otro" required validationMessage="Nombre de la Calle/Av/Otro">
                    </div>
                </div>

                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        {*<span class="tooltip" title="direccion descriptiva.">?</span>*}Núm. de Domicilio
                    </div>
                    <div class="span1" >
                        <input type="text" class="k-textbox " placeholder="S/N" {literal} pattern="[1-9][0-9]{0,}"{/literal} id="ed_numero_domicilio_{$de_id}" name="ed_numero_domicilio_{$de_id}" placeholder="Núm de Domicilio" validationMessage="Ingrese un numero de Domicílio válido">
                    </div>
                    <div class="span4 parametro" >
                        {*<span class="tooltip" title="direccion descriptiva.">?</span>*}Nombre del Edificio
                    </div>
                    <div class="span3 " >
                        <input type="text" class="k-textbox "  id="ed_nombre_edificio_{$de_id}" placeholder="Nombre del Edificio" name="ed_nombre_edificio_{$de_id}" >
                    </div>
                    <div class="span1 parametro" id="text_ed_piso_{$de_id}" name="text_ed_piso_{$de_id}">
                        {*<span class="tooltip" title="direccion descriptiva.">?</span>*}Piso
                    </div>
                    <div class="span1 " >
                        <input type="text"  class="k-textbox " {literal} pattern="/^[0-9a-zA-Z]+$/"{/literal} id="ed_piso_{$de_id}" name="ed_piso_{$de_id}" placeholder="# Piso" validationMessage="Ingrese Número de Piso">
                    </div> 
                </div>

                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        {*<span class="tooltip" title="direccion descriptiva.">?</span>*}Dpto/Oficina/Local
                    </div>
                    <div class="span2 " >
                        <input style="width:100%;" name="ed_td_{$de_id}" id="ed_td_{$de_id}">
                    </div>
                    <div class="span3 parametro" id="text_ed_ntd_{$de_id}" name="text_ed_ntd_{$de_id}">
                        {*<span class="tooltip" title="direccion descriptiva.">?</span>*}Núm. Dpto/Oficina/Local
                    </div>
                    <div class="span2 " >
                        <input type="text"  class="k-textbox " id="ed_ntd_{$de_id}" name="ed_ntd_{$de_id}"  placeholder="Núm DPTO" validationMessage="Ingrese Número de Dpto/Oficina/Local">
                    </div>
                </div>

                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        {*<span class="tooltip" title="direccion descriptiva.">?</span>*}(*) Zona/Barrio/Otro
                    </div>
                    <div class="span2 " >
                        <input  style="width:100%;" name="ed_tz_{$de_id}" id="ed_tz_{$de_id}" placeholder="Zona/Barrio/Otro" required validationMessage="seleccione una Opción">
                    </div>
                    <div class="span3 parametro" >
                        {*<span class="tooltip" title="direccion descriptiva.">?</span>*}(*) Nombre Zona/Barrio/Otro
                    </div>
                    <div class="span3 " >
                        <input type="text"  class="k-textbox "  id="ed_ntz_{$de_id}" name="ed_ntz_{$de_id}" required placeholder="Nombre de Zona/Barrio/Otro" validationMessage="Ingrese Nombre de Zona/Barrio/Otro">
                    </div>
                </div>

                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        {*<span class="tooltip" title="direccion descriptiva.">?</span>*}(*) Departamento
                    </div>
                    <div class="span2 " >
                        <input style="width:100%;" required name="ed_dpto_{$de_id}" id="ed_dpto_{$de_id}" placeholder="Departamento" required validationMessage="Seleccione Departamento">
                    </div>
                    <div class="span2 parametro" >
                        {*<span class="tooltip" title="direccion descriptiva.">?</span>*}(*) Municipio
                    </div>
                    <div class="span3 " id="div_ed_municipio_{$de_id}" >
                        <input style="width:100%;" required name="ed_municipio_{$de_id}" required id="ed_municipio_{$de_id}" placeholder="Municipio" required validationMessage="Seleccione Municipio">
                    </div> 
                </div>
            </div>
            <div name="libre_direccion_{$de_id}" id="libre_direccion_{$de_id}">    
                <div class="row-fluid " >
                    <div class="span2 parametro" >
                       {*<span class="tooltip" title="direccion descriptiva.">?</span>*}(*) Teléfono Fijo
                    </div>
                    <div class="span2 " >
                        <input type="text"  class="k-textbox " maxlength="15" {literal} pattern="[1-9][0-9]{0,}"{/literal} id="ed_tfijo_{$de_id}" name="ed_tfijo_{$de_id}" placeholder="Teléfono Fijo" validationMessage="Ingrese un numero de telefono válido">
                    </div> 
                    <div class="span2 parametro" >
                        {*<span class="tooltip" title="direccion descriptiva.">?</span>*}Teléfono Celular
                    </div>
                    <div class="span2 " >
                        <input type="text"  class="k-textbox " maxlength="15" {literal} pattern="[1-9][0-9]{0,}"{/literal} id="ed_tcel_{$de_id}" name="ed_tcel_{$de_id}" placeholder="Teléfono Celular" validationMessage="Ingrese un numero de telefono válido">
                    </div> 
                    <div class="span2 parametro" >
                        {*<span class="tooltip" title="direccion descriptiva.">?</span>*}Teléfono Fax
                    </div>
                    <div class="span2 " >
                        <input type="text"  class="k-textbox " maxlength="15" {literal} pattern="[1-9][0-9]{0,}"{/literal} id="ed_tfax_{$de_id}" name="ed_tfax_{$de_id}" placeholder="Numero de FAX" validationMessage="Ingrese un numero de FAX válido">
                    </div> 
                </div>

                <div class="row-fluid" >
                    <div class="span9" ><center>
                        <input type="hidden" name="hiddenvalidator-telfs_{$de_id}" id="hiddenvalidator-telfs_{$de_id}" 
                        data-telfs_{$de_id}
                        data-required-msg="Por Favor Selecciona una opcion" /></center>
                    </div> 
                </div>

                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        {*<span class="tooltip" title="direccion descriptiva.">?</span>*}Dirección Descriptiva
                    </div>  
                    <div class="span9 " >
                        <input type="text"  class="k-textbox "  id="ed_dir_desc_{$de_id}" name="ed_dir_desc_{$de_id}" placeholder="Direccion Descriptiva. Ej: Edificio de color beige, frente al supermercado...">
                    </div>
                </div>
                <div class="row-fluid " >
                    <div class="span2 parametro" >
                       (*) Persona de Contacto:
                    </div>
                    <div class="span9 " >
                        <input type="text"  class="k-textbox "  id="ed_contacto_{$de_id}" name="ed_contacto_{$de_id}" placeholder="Persona de contacto"  required validationMessage="Ingrese la persona de contacto"/>
                    </div>
                </div>
            </div>
            <!--div class="row-fluid  form" >
                <div class="span5 hidden-phone" ></div>
                <div class="span2" >
                    <input id="guardardireccion" type="button" value="guardar" class="k-primary" style="width:100%"/> <br><br>
                </div>
            </div-->
        </div>
    </div> 
</div>

<script>
    /*$("#guardardireccion").kendoButton();
    var guardardireccion = $("#guardardireccion").data("kendoButton");

    guardardireccion.bind("click", function(e){
        window.open('index.php?opcion=admDireccion&tarea=save_data_direccion&'+$('#form_editar_direccion_{$de_id} :input').serialize(), 'mywindow2','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admDireccion&tarea=save_data_direccion&'+$('#form_editar_direccion_{$de_id} :input').serialize(),
            success: function (data) {
                alert(data);
            }
        });
    });*/
    //validador del div form_editar_direccion_{$de_id}
    var form_editar_direccion_{$de_id} = $("#form_editar_direccion_{$de_id}").kendoValidator({
        rules:{
            telfs_{$de_id}: function(input) {
                var validate = input.data('telfs_{$de_id}');
                if (typeof validate !== 'undefined')
                {
                    return $('#ed_tcel_{$de_id}').val()!='' || $('#ed_tfijo_{$de_id}').val()!='';
                }
                return true;
            },
        },
        messages:{  //checkpeso
             telfs_{$de_id}: "Ingrese al menos un teléfono fijo o célular",
        }
    }).data("kendoValidator");

    // combobox tipo calle/avenida/plaza/otro
    $("#ed_tc_{$de_id}").kendoComboBox({
        placeholder:"Calle/Avenida/Plaza/Otro",
        dataTextField: "descripcion",
        dataValueField: "id",
        value:'',
        dataSource: {
            transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admDireccion&tarea=list_direccion_tipo_calle"
                    }
            }
        },
        change : function (e) {

            if (this.value() && this.selectedIndex === -1) {
                this.text('');
            }else{
                //form_editar_direccion_{$de_id}.validateInput($("#ed_ntc_{$de_id}"));
            }
        }
    });

    //combobox tipo Dpto/Oficina/Local
    $("#ed_td_{$de_id}").kendoComboBox({
        placeholder:"Dpto/Oficina/Local",
        dataTextField: "descripcion",
        dataValueField: "id",
        dataSource: {
            transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admDireccion&tarea=list_direccion_ubicacion_edificio"
                    }
            }
        },
        change : function (e) {
            $("#ed_ntd_{$de_id}").removeAttr('required');
            $("#text_ed_ntd_{$de_id}").html('Número Dpto/Oficina/Local');
            if (this.value() && this.selectedIndex === -1) {
                this.text('');

            }else{
                if(this.value()!='-1'){
                    $("#ed_ntd_{$de_id}").attr('required','required');
                    $("#text_ed_ntd_{$de_id}").html('(*) Número Dpto/Oficina/Local');
                }
            }
            //form_editar_direccion_{$de_id}.validateInput($("#ed_ntd_{$de_id}"));
        }
    });

    //combobox tipo zona/barrio/otro
    $("#ed_tz_{$de_id}").kendoComboBox({
        placeholder:"Zona/Barrio/Otro",
        dataTextField: "descripcion",
        dataValueField: "id",
        dataSource: {
            transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admDireccion&tarea=list_direccion_tipo_zona"
                    }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) {
                this.text('');
            }else{
                //form_editar_direccion_{$de_id}.validateInput($("#ed_ntz_{$de_id}"));
            }
        }
    });

    //combobox municipio
    $("#ed_municipio_{$de_id}").kendoComboBox({
        placeholder:"Municipio",
        dataTextField: "descripcion",
        dataValueField: "id_municipio",
        dataSource: {
            transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admDireccion&tarea=listarMunicipios&id_departamento="+1
                    }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) {
                this.text('');
            }else{

            }
        }
    });

    //combobox departamento
    $("#ed_dpto_{$de_id}").kendoComboBox({
        placeholder:"Departamento",
        dataTextField: "descripcion",
        dataValueField: "id",
        dataSource: {
            transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admDireccion&tarea=list_departamentos"
                    }
            }
        },
        change : function (e) {
            var dpto= this.value();
            if (this.value() && this.selectedIndex == -1) {
            }else
            {
                $("#div_ed_municipio_{$de_id}").html('');
                $("#div_ed_municipio_{$de_id}").append('<input style="width:100%;" required name="ed_municipio_{$de_id}" required id="ed_municipio_{$de_id}" required validationMessage="Seleccione Municipio">');
                $("#ed_municipio_{$de_id}").kendoComboBox({
                    placeholder:"Municipio",
                    dataTextField: "descripcion",
                    dataValueField: "id_municipio",
                    dataSource: {
                        transport: {
                                read: {
                                    dataType: "json",
                                    url: "index.php?opcion=admDireccion&tarea=listarMunicipios&id_departamento="+dpto
                                }
                        }
                    },
                    change : function (e) {
                        if (this.value() && this.selectedIndex === -1) {
                            this.text('');
                        }else{
                            //form_editar_direccion_{$de_id}.validateInput($("#ed_municipio_{$de_id}" ));
                        }
                    }
                });
            }
        }
    });

    //evento focusout para el textbox del nombre del edificio,
    //si existe un nombre, se debe ingresar un numero de departamento u oficina
    $('#nombre_edificio_{$de_id}').focusout(
        function(){
            if($('#nombre_edificio_{$de_id}').val()!=''){
                $('#text_ed_piso_{$de_id}').html('(*) Piso');
                $('#ed_piso_{$de_id}').attr('required','required');
            }else{
                $('#text_ed_piso_{$de_id}').html('Piso');
                $("#ed_piso_{$de_id}").removeAttr('required');
            }
            //form_editar_direccion_{$de_id}.validateInput($("#ed_piso_{$de_id}"));
        }
    );

    var disable_direccion = !'{$editable}';
    // se carga los imputs si se encuentra algun registro en la tabla direccion segun el id=de_id
    {if $de_id}loadDireccion({$de_id});{/if}
    function loadDireccion(id_direccion){
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admDireccion&tarea=get_data_direccion&id_direccion='+id_direccion,
            success: function (data) {
                if(data!='-1'){
                    var dt=eval("("+data+")");
                    $('#ed_tc_{$de_id}').data("kendoComboBox").value(dt[0].tipo_calle);
                    $('#ed_ntc_{$de_id}').val(dt[0].nombre_tipo_calle);
                    $('#ed_numero_domicilio_{$de_id}').val(dt[0].numero_domicilio);
                    $('#ed_nombre_edificio_{$de_id}').val(dt[0].nombre_edificio);
                    $('#ed_piso_{$de_id}').val(dt[0].piso);
                    $('#ed_td_{$de_id}').data("kendoComboBox").value(dt[0].tipo_dpto);
                    $('#ed_ntd_{$de_id}').val(dt[0].numero_tipo_dpto);
                    $('#ed_tz_{$de_id}').data("kendoComboBox").value(dt[0].tipo_zona);
                    $('#ed_ntz_{$de_id}').val(dt[0].nombre_tipo_zona);
                    $('#ed_dpto_{$de_id}').data("kendoComboBox").value(dt[0].dpto);
                    $("#div_ed_municipio_{$de_id}").html('');
                    $("#div_ed_municipio_{$de_id}").append('<input style="width:100%;" required name="ed_municipio_{$de_id}" required id="ed_municipio_{$de_id}" required validationMessage="Seleccione Municipio">');
                    $("#ed_municipio_{$de_id}").kendoComboBox({
                        placeholder:"Municipio",
                        dataTextField: "descripcion",
                        dataValueField: "id_municipio",
                        dataSource: {
                            transport: {
                                    read: {
                                        dataType: "json",
                                        url: "index.php?opcion=admDireccion&tarea=listarMunicipios&id_departamento="+dt[0].id_dpto
                                    }
                            }
                        },
                        change : function (e) {
                            if (this.value() && this.selectedIndex === -1) {
                                this.text('');
                            }else{
                                //form_editar_direccion_{$de_id}.validateInput($("#ed_municipio_{$de_id}" ));
                            }
                        }
                    });
                    $('#ed_municipio_{$de_id}').data("kendoComboBox").value(dt[0].municipio);
                    $('#ed_tfijo_{$de_id}').val(dt[0].tfijo);
                    $('#ed_tcel_{$de_id}').val(dt[0].tcel);
                    $('#ed_tfax_{$de_id}').val(dt[0].tfax);
                    $('#ed_dir_desc_{$de_id}').val(dt[0].dir_descript);
                    setDisable_direccion();
                    form_editar_direccion_{$de_id}.hideMessages();
                }else{
                    $('#ed_tc_{$de_id}').data("kendoComboBox").value('');
                    $('#ed_ntc_{$de_id}').val('');
                    $('#ed_numero_domicilio_{$de_id}').val('');
                    $('#ed_nombre_edificio_{$de_id}').val('');
                    $('#ed_piso_{$de_id}').val('');
                    $('#ed_td_{$de_id}').data("kendoComboBox").value('');
                    $('#ed_ntd_{$de_id}').val('');
                    $('#ed_tz_{$de_id}').data("kendoComboBox").value('');
                    $('#ed_ntz_{$de_id}').val('');
                    $('#ed_dpto_{$de_id}').data("kendoComboBox").value('');
                    $('#ed_municipio_{$de_id}').data("kendoComboBox").value('');
                    $('#ed_tfijo_{$de_id}').val('');
                    $('#ed_tcel_{$de_id}').val('');
                    $('#ed_tfax_{$de_id}').val('');
                    $('#ed_dir_desc_{$de_id}').val('');
                }
                form_editar_direccion_{$de_id}.hideMessages();
           }
        });
{*        alert('salida loadDireccion');*}
    }
    setDisable_direccion();
    function setDisable_direccion(){
        $('#ed_tc_{$de_id}').data("kendoComboBox").enable( !disable_direccion );
        $('#ed_tc_{$de_id}').removeAttr("class");
        $('#ed_tc_{$de_id}').attr('class',disable_direccion? 'k-textbox k-state-disabled':'k-textbox' );

        if(disable_direccion)$('#ed_ntc_{$de_id}').attr('readonly',disable_direccion); else $('#ed_ntc_{$de_id}').removeAttr('readonly');
        $('#ed_ntc_{$de_id}').removeAttr("class");
        $('#ed_ntc_{$de_id}').attr('class',disable_direccion? 'k-textbox k-state-disabled':'k-textbox' );

        if(disable_direccion)$('#ed_numero_domicilio_{$de_id}').attr('readonly', disable_direccion); else $('#ed_numero_domicilio_{$de_id}').removeAttr('readonly');
        $('#ed_numero_domicilio_{$de_id}').removeAttr("class");
        $('#ed_numero_domicilio_{$de_id}').attr('class',disable_direccion? 'k-textbox k-state-disabled':'k-textbox' );

        if(disable_direccion)$('#ed_nombre_edificio_{$de_id}').attr('readonly',disable_direccion); else $('#ed_nombre_edificio_{$de_id}').removeAttr('readonly');
        $('#ed_nombre_edificio_{$de_id}').removeAttr("class");
        $('#ed_nombre_edificio_{$de_id}').attr('class',disable_direccion? 'k-textbox k-state-disabled':'k-textbox' );

        if(disable_direccion) $('#ed_piso_{$de_id}').attr('readonly', disable_direccion); else $('#ed_piso_{$de_id}').removeAttr('readonly');
        $('#ed_piso_{$de_id}').removeAttr("class");
        $('#ed_piso_{$de_id}').attr('class',disable_direccion? 'k-textbox k-state-disabled':'k-textbox' );

        $('#ed_td_{$de_id}').data("kendoComboBox").enable( !disable_direccion );
        $('#ed_td_{$de_id}').removeAttr("class");
        $('#ed_td_{$de_id}').attr('class',disable_direccion? 'k-textbox k-state-disabled':'k-textbox' );


        if(disable_direccion) $('#ed_ntd_{$de_id}').attr('readonly',disable_direccion); else $('#ed_ntd_{$de_id}').removeAttr('readonly');
        $('#ed_ntd_{$de_id}').removeAttr("class");
        $('#ed_ntd_{$de_id}').attr('class',disable_direccion? 'k-textbox k-state-disabled':'k-textbox' );

        $('#ed_tz_{$de_id}').data("kendoComboBox").enable( !disable_direccion );

        if(disable_direccion)$('#ed_ntz_{$de_id}').attr('readonly',disable_direccion); else $('#ed_ntz_{$de_id}').removeAttr('readonly');
        $('#ed_ntz_{$de_id}').removeAttr("class");
        $('#ed_ntz_{$de_id}').attr('class',disable_direccion? 'k-textbox k-state-disabled':'k-textbox' );

        $('#ed_dpto_{$de_id}').data("kendoComboBox").enable( !disable_direccion );
        $('#ed_dpto_{$de_id}').removeAttr("class");
        $('#ed_dpto_{$de_id}').attr('class',disable_direccion? 'k-textbox k-state-disabled':'k-textbox' );

        $('#ed_municipio_{$de_id}').data("kendoComboBox").enable( !disable_direccion );
        $('#ed_municipio_{$de_id}').removeAttr("class");
        $('#ed_municipio_{$de_id}').attr('class',disable_direccion? 'k-textbox k-state-disabled':'k-textbox' );

        /*$('#ed_tfijo_{$de_id}').attr('disabled','disabled');
        $('#ed_tfijo_{$de_id}').removeAttr("class");
        $('#ed_tfijo_{$de_id}').attr('class','k-textbox k-state-disabled');

        $('#ed_tcel_{$de_id}').attr('disabled','disabled');
        $('#ed_tcel_{$de_id}').removeAttr("class");
        $('#ed_tcel_{$de_id}').attr('class','k-textbox k-state-disabled');

        $('#ed_tfax_{$de_id}').attr('disabled','disabled');
        $('#ed_tfax_{$de_id}').removeAttr("class");
        $('#ed_tfax_{$de_id}').attr('class','k-textbox k-state-disabled');

        $('#ed_dir_desc_{$de_id}').attr('disabled','disabled');
        $('#ed_dir_desc_{$de_id}').removeAttr("class");
        $('#ed_dir_desc_{$de_id}').attr('class','k-textbox k-state-disabled');*/
{*        alert('salida setDisableDireccion');*}
    }
</script>