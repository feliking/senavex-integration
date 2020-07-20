<style type="text/css">
    .griderror {
        border-color: red;
    }
</style>
<div class="row-fluid fadein"  id="formularioapi" >
    <div class="k-block">

        <div class="k-header">
            <div class="titulonegro">FORMULARIO DE SOLICITUD PARA LA</div>
        </div>
        <div class="k-cuerpo">
            <div class="titulo">EMISIÓN DE UNA AUTORIZACIÓN PREVIA DE IMPORTACIÓN</div>
        </div>
        <form id="solicitudApi" enctype="multipart/form-data">
            <div class="k-cuerpo">
                <fieldset >
                    <legend>I. DATOS DEL IMPORTADOR</legend>
                    <div class="row-fluid " >

                        <div class="span3" >
                            Nombre Completo o Razón Social:
                        </div>
                        <div class="span6 campo" >
                            {$empresaRevision->razon_social}
                        </div>
                    </div>
                    <legend>Dirección Fiscal:</legend>
                    <fieldset >
                        <div class="row-fluid " >
                            {assign var="direccionRevision" value=$direccionRevision}
                            {assign var="ds_id" value=$empresaRevision->id_direccion}
                            {include file="admDireccion/Direccion_Show.tpl" }
                        </div>
                    </fieldset >
                    <div class="row-fluid " ><br></div>
                    <div class="row-fluid " >
                        <div class="span3 " >

                            Nombre Completo del Representante Legal
                        </div>
                        <div class="span6 campo" >
                            {$empresaRRLL->nombres} {$empresaRRLL->paterno} {$empresaRRLL->materno}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span3 " >
                            Nacionalidad
                        </div>
                        <div class="span3 campo" >
                            {$paisr->nombre}
                        </div>
                    </div>
                    <legend>Domicilio:</legend>
                    <fieldset >
                        <div class="row-fluid " >
                            {assign var="direccionRRLL" value=$empresaRRLL}
                            {assign var="ds_id" value=$empresaRRLL->direccion}
                            {include file="admDireccion/Direccion_Show.tpl" }
                        </div>
                    </fieldset >
                    <div class="row-fluid " ><br></div>
                    <div class="row-fluid " >
                        <div class="span3" >
                            Nº de Identificación Tributaria (NIT):
                        </div>
                        <div class="span6 campo" >
                            {$empresaRevision->nit}
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span3" >
                            Nº Licencia de Funcionamiento:
                        </div>
                        <div class="span6 campo" >
                            {$empresaRevision->patente_municipal}
                        </div>

                    </div>
                    <div class="row-fluid " >
                        <div class="span3"  >
                            Registro Operador (Aduana):
                        </div>
                        <div class="span6 campo" >
                            {$empresaRevision->padron_importador}
                        </div>
                </fieldset>

                <fieldset >
                    <legend>II. DATOS DEL PRODUCTO</legend>

                    <div class="row-fluid " >

                        <div class="span10 notas" >
                            <b>DESCARGUE EL FORMULARIO EXCEL PARA LLENAR LOS ITEMS PARA IMPORTAR<a href="styles/documentos/formato_formulario.xlsx"> AQUI <img src="styles/img/Ico_Terminos.png"></img></a></b>                        <br>
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span12" >
                            <b>(*) SUBIR EL ARCHIVO CON LOS ITEMS LLENADOS:</b>
                            <input id="archivoex" type="file" name="archivo" />Excel
                            <span>
                            <span id="loadinggif" style="display: none;"> <img style="margin-left: 0%; " width="20%" src="styles/img/cargando.gif"> </span>
                            <button type="button" class="k-primary k-button" id="loadexcel" style="float: right;"><i class="fas fa-tasks"></i> <i class="fas fa-file-excel"></i> Importar Excel</button>
                        </span>
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span12" >
                            <div id="resumen"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <table id="myTable" class=" table order-list">
                                <thead>
                                <tr>
                                    <td>Nº</td>
                                    <td>SUBPARTIDA NANDINA</td>
                                    <td>DESCRIPCIÓN ARANCELARIA</td>
                                    <td>DESCRIPCIÓN COMERCIAL</td>
                                    <td>PAÍS ORIGEN</td>
                                    <td>CANTIDAD</td>
                                    <td>UNIDAD DE MEDIDA</td>
                                    <td>PESO BRUTO (KG.)</td>
                                    <td>PRECIO UNITARIO ($us)</td>
                                    <td>VALOR FOB TOTAL ($us)</td>
                                    <td>PRECIO UNITARIO (En divisa correspondiente)</td>
                                    <td>VALOR FOB TOTAL (En divisa correspondiente)</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="col-sm-1">
                                        <span name="num">1</span>
                                    </td>
                                    <td class="col-sm-2">
                                        <select id="subpartida1" class="select2" name="1" onchange="changedesc(this)" style="width: 100%; height:30px;">
                                            <option value=""></option>
                                            {foreach  key=key item=item from=$nandina}
                                                <option value="{$item}">{$key}</option>
                                            {/foreach}
                                        </select>
                                    </td>
                                    <td class="col-sm-2">
                                        <div id="desc_arancelaria1" name="desc_arancelaria" class="span12 campo">
                                        </div>
                                    </td>
                                    <td class="col-sm-1">
                                        <input type="text" name="desc_comercial" size="90" class="k-textbox no-restriccion-all"/>
                                    </td>
                                    <td class="col-sm-1">
                                        <select id="pais_origen_grid" name="pais_origen_grid" class="select2" style="width: 100%; height:30px;">
                                            {foreach  key=key item=item from=$paises_array}
                                                {if $key != 1 } {*hidden bolivia*}
                                                    <option value="{$key}">{$item}</option>
                                                {/if}
                                            {/foreach}
                                        </select>
                                    </td>
                                    <td class="col-sm-1">
                                        <input type="text" name="cantidadgrid" onkeypress="validate(event, this)" onkeyup="sumagrid('cantidad'); sumarow(this);" class="k-textbox"/>
                                    </td>
                                    <td class="col-sm-1">
                                        <select id="unidad_medida" name="unidad_medida" class="select2" style="width: 100%; height:30px;">
                                            <option value=""></option>
                                            {foreach  key=key item=item from=$umedida}
                                                <option value="{$key}">{$item}</option>
                                            {/foreach}
                                        </select>
                                    </td>
                                    <td class="col-sm-1">
                                        <input type="text" name="peso_bruto"  onkeypress="validate(event, this)" class="k-textbox" onkeyup="sumagrid('peso_bruto')"/>
                                    </td>
                                    <td class="col-sm-1">
                                        <input type="text" name="precio_unitario_sus"  onkeypress="validate(event, this)" onkeyup="sumarow(this);" class="k-textbox"/>
                                    </td>
                                    <td class="col-sm-1">
                                        <input type="text" name="valor_total_sus"  class="k-textbox" onkeypress="validate(event, this)" onkeyup="sumagrid('valor_total_sus')" readonly/>
                                    </td>
                                    <td class="col-sm-1">
                                        <input type="text" name="precio_unitario_div"  onkeyup="sumarow1(this);" onkeypress="validate(event, this)" class="k-textbox"/>
                                    </td>
                                    <td class="col-sm-1">
                                        <input type="text" name="valor_total_div"  onkeypress="validate(event, this)" class="k-textbox"/>
                                    </td>
                                    <td class="col-sm-1"><a class="deleteRow"></a>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align: left;">
                                        <button type="button" class="k-primary k-button" id="addrow" ><i class="fas fa-plus-square"></i> Añadir fila</button>
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span3">
                            <label>Cantidad Total</label>
                            <input type="number" min="0" style="width:100%;" class="k-textbox no-restriccion"  readonly  name="cantidad" id="cantidad" required validationMessage="Ingrese cantidad" />
                        </div>
                        <div class="span3" >
                            <label>Peso Bruto Total Kg</label>
                            <input type="number" min="0" style="width:100%;" class="k-textbox no-restriccion"  readonly  name="peso_bruto" id="peso_bruto" required validationMessage="Ingrese descripción Arancelaria" />
                        </div>
                        <div class="span3" >
                            <label>Valor FOB total (valor en $us)</label>
                            <input type="number" min="0" style="width:100%;" class="k-textbox no-restriccion"  readonly  name="fob" id="fob" required validationMessage="Ingrese descripción Comercial" />

                            <!--   <input type="text" onkeypress="return isNumeric(event)"  style="width:100%;" class="k-textbox no-restriccion"  placeholder="Cantidad Total"  name="cantidad" id="cantidad"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese cantidad" />
                          </div>
                          <div class="span3" >
                              <input type="text" onkeypress="return isNumeric(event)" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Peso Bruto Total Kg"  name="peso_bruto" id="peso_bruto"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese descripción Arancelaria" />
                          </div>
                          <div class="span3" >
                              <input type="text" onkeypress="return isNumeric(event)" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Valor FOB total (valor en $us)"  name=fob" id="fob"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese descripción Comercial" /> -->

                        </div>
                    </div>
                    <div class="row-fluid " >
                        <div class="span3" >
                            <br>
                        </div>
                    </div>
                    {*                <div class="row-fluid form" >*}
                    {*                    <div class="span12 " >*}
                    {*                        <input type="hidden" name="paises_values" id="paises_values" value="{$paises_valores}" />*}
                    {*                        <input style="width:100%;" id="paises" name=" ">*}
                    {*                    </div>*}
                    {*                </div>*}
                    <div class="row-fluid form" style="display:none;">
                        <div class="span12">
                            <select id="paises" class="s2_multi_paises_s2" name="paises" style="width: 100%" multiple="multiple">
                                {foreach  key=key item=item from=$paises}
                                    <option value="{$item->id_pais}">{$item->nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    {*                <div class="row-fluid form" >*}
                    {*                    <div class="span3 " >*}
                    {*                        <input type="hidden" name="paises_values1" id="paises_values1" value="{$paises_valores1}" />*}
                    {*                        <input style="width:100%;" id="pais_proc" name="pais_proc">*}
                    {*                    </div>*}
                    {*                </div>*}
                    <div class="row-fluid form" >
                        <div class="span3" >
                            <select id="pais_proc" class="select2" name="pais_proc" style="width: 100%" >
                                <option value="">Seleccione El pais de Procedencia</option>
                                {foreach  key=key item=item from=$paises}
                                    <option value="{$item->id_pais}">{$item->nombre}</option>
                                {/foreach}
                            </select>
                            <span id="pais_proc_error" style="color: red; display: none;">Campo requerido</span>
                        </div>
                    </div>
                    {*                <div class="row-fluid form" >*}
                    {*                    <div class="span12 " >*}
                    {*                        <input type="hidden" name="depto_valores" id="depto_valores" value="{$depto_valores}" />*}
                    {*                        <input style="width:100%;" id="depto" name="depto">*}
                    {*                    </div> *}
                    {*                </div>*}
                    <div class="row-fluid form" >
                        <div class="span12 " >
                            <select id="depto" class="s2_multi_deptos_s2" name="depto" style="width: 100%" multiple="multiple">
                                {foreach  key=key item=item from=$deptos2}
                                    <option value="{$item->id_departamento}">{$item->nombre}</option>
                                {/foreach}
                            </select>
                            <span id="depto_error" style="color: red; display: none;">Campo requerido</span>
                        </div>
                    </div>
                    <div class="row-fluid " >
                    </div>

                </fieldset>
            </div>
            <fieldset >
                <legend>III. DATOS FINANCIEROS</legend>
                <div class="row-fluid " >
                    <div class="span3 " >
                        <input type="text" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Origen de los recursos para la adquisición de divisas"  name="orig_divisas" id="orig_divisas"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese Origen de los recursos para la adquisición de divisas" />
                        <span id="orig_divisas_error" style="color: red; display: none;">Campo requerido</span>
                    </div>
                    <div class="span3 " >
                        <input type="text" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Entidad Bancaria para la adquisición de divisas"  name="ent_bancaria" id="ent_bancaria"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese Entidad Bancaria para la adquisición de divisas" />
                        <span id="ent_bancaria_error" style="color: red; display: none;">Campo requerido</span>
                    </div>
                    <div class="span3" >
                        <input type="text" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Número de Cuenta Bancaria para la adquisición de divisas"  name="num_cuenta" id="num_cuenta"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese el Número de Cuenta Bancaria" />
                        <span id="num_cuenta_error" style="color: red; display: none;">Campo requerido</span>
                    </div>
                    <div class="span3 " >
                        {*                    <input type="text" style="width:100%;"  placeholder="Tipo de Cuenta:"  name="tipo_cuenta" id="tipo_cuenta"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese el tipo de Cuenta" />*}
                        <select id="tipo_cuenta" class="select2" name="tipo_cuenta" style="width: 100%">
                            <option value="">Seleccione Tipo de Cuenta</option>
                            {foreach  key=key item=item from=$tipo_cuentas2}
                                <option value="{$key}">{$item}</option>
                            {/foreach}
                        </select>
                        <span id="tipo_cuenta_error" style="color: red; display: none;">Campo requerido</span>
                    </div>
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        <input type="number" min="0" value="6.96" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Tipo de cambio empleado"  onkeypress="validate(event,this)" name="cambio_empleado" id="cambio_empleado"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese el tipo de cambio empleado" />
                    </div>
                </div>
            </fieldset>

            <fieldset >
                <legend>IV. DATOS DE AUTORIZACION</legend>
                <div class="row-fluid " >
                    <div class="span9 " >
                        {*                    <input type="text" style="width:100%;" placeholder="Persona Autorizada el trámite y recojo de la Autorización Previa"  name="pers_autorizada" id="pers_autorizada"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese Persona Autorizada el trámite y recojo de la Autorización Previa" />*}
                        <select id="pers_autorizada" class="select2" name="pers_autorizada" style="width: 100%">
                            <option value="">Seleccione Tipo de Cuenta</option>
                            {foreach  key=key item=item from=$personas2}
                                <option value="{$item['id_persona']}">{$item['nombres']}</option>
                            {/foreach}
                        </select>
                        <span id="pers_autorizada_error" style="color: red; display: none;">Campo requerido</span>
                    </div>
                </div>
            </fieldset>
            <div class="row-fluid form" >
                <div class="barra" >
                </div>
            </div>
            <div class="row-fluid  form" >
                <div id="detalle" class="fadein">
                </div>
            </div>

            <fieldset >
                <div class="row-fluid" id="notificacionobservacionr{$id}">
                    <div class="span4 " >
                    </div>
                    <div class="span4 " >

                    </div>
                    <div class="span4 " >
                    </div>
                    <div class="span3" >
                        <input id="cancelarrui" type="{if $revisar=='2'}hidden{else}button{/if}" value="Cancelar" class="k-primary" style="width:100%"/> <br><br>
                    </div>
                    <div class="span3" >
                        <input id="guardarsolicitud" type="button"  value="Enviar" class="k-primary" style="width:100%"/>
                    </div>
                </div>
            </fieldset>

        </form>
    </div>
</div>

<div id="aviso1" class="span10 fadein"  >
    <div class="k-block fadein">
        <div class="k-header"><div class="titulo">Aviso</div></div>
        <div class="row-fluid  form" >
            <div class="span1 hidden-phone" ></div>
            <div class="span10" >
                <p> Aseg&uacute;rese de que los datos introducidos son los correctos ya que no se podra volver a editar cuando la solicitud se guarde
                    <br>Si desea volver al formulario para verificar los datos presione<span class="letrarelevante"> Cancelar</span><br>
                    <br>Si presiona Registrar se guardan los registros y lo podra imprimir en el listado de Solicitudes que se mostrar� a continuaci�n<br>

                </p>
            </div>
            <div class="span1 hidden-phone" ></div>
        </div>
        <div class="row-fluid  form" >
            <div class="span4 hidden-phone" >
            </div>
            <div class="span2 " >
                <input id="cancelar" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
            </div>
            <div class="span2 " >
                <input id="aceptar" type="button"  value="Registrar" class="k-primary" style="width:100%"/>
            </div>
            <div class="span4 hidden-phone" >
            </div>
        </div>
    </div>

</div>

<script>
    var counter = 2;
    var counterrow = 2;

    $('#pais_proc').select2({
        width: 'resolve' // need to override the changed default
    });
    $('#depto').select2({
        width: 'resolve' // need to override the changed default
    });
    $('#tipo_cuenta').select2({
        width: 'resolve' // need to override the changed default
    });
    // $('.select2').select2({
    //     width: 'resolve' // need to override the changed default
    // });
    $('#pers_autorizada').select2({
        placeholder: "Persona Autorizada en el trámite y recojo de la Autorización Previa",
        allowClear: true,
        width: 'resolve' // need to override the changed default
    });
    $('.s2_multi_paises_s2').select2({
        placeholder: "País de Origen",
        allowClear: true,
        width: 'resolve' // need to override the changed default
    });

    $('.s2_multi_deptos_s2').select2({
        placeholder: "Departamentos Destino",
        allowClear: true,
        width: 'resolve' // need to override the changed default
    });

    $('#archivoex').on("change", function(){
        $("#loadexcel").show();
        $('#resumen').html('');
    });
    function importExcel() {
        var file_data = $("#archivoex").prop("files")[0];
        if (file_data == undefined) {
            return false;
        }
        var form_data = new FormData();
        form_data.append("file", file_data);

        $.ajax({
            type: 'post',
            url: 'index.php?opcion=admAutorizacionPrevia&tarea=loadExcel',
            contentType: false,
            processData: false,
            dataType: "json",
            data: form_data,
            beforeSend: function() {
                //mostrar GIF
                $('#loadinggif').show();
                $("#loadexcel").hide();
                $('#response').html("<img src='styles/img/cargando.gif' />");
            },
            success: function (data) {
                // $('#mySelect2').append(newOption).trigger('change');
                var success = data['success']['rows'];
                var sucess_count = data['success']['count'];
                var error = data['error']['rows'];
                var error_count = data['error']['count'];
                var total_grid = data['total'];
                // $("#loadexcel").hide();
                $('#loadinggif').hide();
                var divs = "";
                divs += '<div class="span12 campo" id="resumengenerated" style="text-align: left;"><span style="color: #006400;" >  Correctos: <b>'+sucess_count+'</b> </span></br><span style="color: #FF0000;">  Errores: <b>'+error_count+'</b> Fila(s): '+error+'</span></div>';
                $('#resumen').html(divs);
                $.each(data, function( index, value ) {
                    if(index == 1) {
                        var $tblrows = $("#myTable tbody tr");
                        var count = 1;
                        $tblrows.each(function (index) {
                            if (index > 0) {
                                $(this).closest("tr").remove();
                            }
                            else {
                                var $tblrow = $(this);
                                var snum = $tblrow.find("[name=num]");
                                snum[0].innerText = value['num'];
                                var sda = $tblrow.find("[name=desc_arancelaria]");
                                sda[0].innerText = value['desc_arancelaria'];
                                $tblrow.find("[name=desc_comercial]").val(value['desc_comercial']);
                                var idp = '';
                                $tblrow.find('[name=pais_origen_grid] > option').each(function() {
                                    if (value['pais_origen_grid'].substr(0,2) == $(this).text().substr(0,2)) idp = $(this).val();
                                });
                                $tblrow.find("[name=pais_origen_grid]").val(idp);
                                $tblrow.find("[name=cantidadgrid]").val(value['cantidadgrid']);
                                $tblrow.find("[name=peso_bruto]").val(value['peso_bruto']);
                                $tblrow.find("[name=precio_unitario_sus]").val(value['precio_unitario_sus']);
                                $tblrow.find("[name=valor_total_sus]").val(value['valor_total_sus']);
                                $tblrow.find("[name=precio_unitario_div]").val(value['precio_unitario_div']);
                                $tblrow.find("[name=valor_total_div]").val(value['valor_total_div']);
                                $tblrow.find("[name="+value['num']+"]").val(value['desc_arancelaria']);
                                $tblrow.find("[name=unidad_medida] option:contains("+value['unidad_medida']+")").attr('selected', 'selected');
                                var arr = {$nandina|@json_encode};
                                $('#'+'subpartida1').empty();
                                $('#'+'subpartida1').append($('<option></option>').val('').html(''));
                                $.each(arr, function(i, p) {
                                    var da = '';
                                    if (value['subpartida'] == i) da = 'selected';
                                    $('#'+'subpartida1').append($('<option '+da+'></option>').val(p).html(i));
                                });
                            }
                        });
                    }
                    else {
                        if(index != 'success' && index != 'error' && index != 'total') {
                            var index = value['num'];
                            var newRow = $("<tr>");
                            var cols = "";
                            var arr = {$nandina|@json_encode};
                            var arrum = {$umedida|@json_encode};
                            var paises_array = {$paises_array|@json_encode};
                            cols += '<td><span name="num">' + index + '</span></td>';
                            cols += '<td><select id="subpartida' + index + '" class="select2" name="'+index+'" onchange="changedesc(this)" style="width: 100%; height:30px;"></td>';
                            cols += '<td><div id="desc_arancelaria' + index + '" name="desc_arancelaria" class="span12 campo" > ' + value['desc_arancelaria'] + ' </div></td>';
                            cols += '<td><input type="text" class="k-textbox no-restriccion-all" name="desc_comercial" size="90" value="' + value['desc_comercial'] + '"/></td>';
                            cols += '<td><select id="pais_origen_grid' + index + '" name="pais_origen_grid" class="select2" style="width: 100%; height:30px;"></select></td>';
                            cols += '<td><input type="text" class="k-textbox" name="cantidadgrid" onkeypress="validate(event, this)" onkeyup="sumagrid(\'cantidad\'); sumarow(this);" value="' + value['cantidadgrid'] + '" /></td>';
                            cols += '<td><select id="unidad_medida' + index + '" name="unidad_medida" class="select2" style="width: 100%; height:30px;"></select></td>';
                            cols += '<td><input type="text" class="k-textbox" name="peso_bruto" onkeypress="validate(event, this)" onkeyup="sumagrid(\'peso_bruto\')" value="' + value['peso_bruto'] + '"/></td>';
                            cols += '<td><input type="text" class="k-textbox" name="precio_unitario_sus" onkeypress="validate(event, this)" value="' + value['precio_unitario_sus'] + '" onkeyup="sumarow(this);"/></td>';
                            cols += '<td><input type="text" class="k-textbox" name="valor_total_sus" onkeypress="validate(event, this)" onkeyup="sumagrid(\'valor_total_sus\')" value="' + value['valor_total_sus'] + '" readonly/></td>';
                            cols += '<td><input type="text" class="k-textbox" name="precio_unitario_div" onkeyup="sumarow1(this);" onkeypress="validate(event)" value="' + value['precio_unitario_div'] + '"/></td>';
                            cols += '<td><input type="text" class="k-textbox" name="valor_total_div" onkeypress="validate(event, this)" value="' + value['valor_total_div'] + '"/></td>';

                            cols += '<td> <span class="ibtnDel" style="color: #ff0000;"> <i class="fa fa-trash"></i> </span></td>';
                            newRow.append(cols);
                            $("table.order-list").append(newRow);
                            $('#'+'subpartida'+index).empty();
                            $('#'+'subpartida'+index).append($('<option></option>').val('').html(''));
                            $.each(arr, function(i, p) {
                                var da = '';
                                if (value['subpartida'] == i) da = 'selected';
                                $('#'+'subpartida'+index).append($('<option '+da+'></option>').val(p).html(i));
                            });
                            $('#'+'unidad_medida'+index).empty();
                            $('#'+'unidad_medida'+index).append($('<option></option>').val('').html(''));
                            $.each(arrum, function(i, p) {
                                var um = '';
                                if (value['unidad_medida'] == p) um = 'selected';
                                $('#'+'unidad_medida'+index).append($('<option '+um+'></option>').val(i).html(p));
                            });
                            $('#'+'pais_origen_grid'+index).empty();
                            $('#'+'pais_origen_grid'+index).append($('<option></option>').val('').html(''));
                            $.each(paises_array, function(i, p) {
                                var um = '';
                                if (value['pais_origen_grid'].substr(0,2) == p.substr(0,2)) um = 'selected';
                                if (i != 1)
                                    $('#'+'pais_origen_grid'+index).append($('<option '+um+'></option>').val(i).html(p));
                            });
                        }
                    }
                });
                sumagrid('cantidad');
                sumagrid('peso_bruto');
                sumagrid('valor_total_sus');
            }
        });
    }

    $("#loadexcel").on("click", function () {
        importExcel();
    });

    $("#addrow").on("click", function () {
        var $tblrows = $("#myTable tbody tr");
        var count = 1;
        var eachrow = 0;
        var array_paises = [];
        var subpartida = '';
        var subpartidaname = '';
        $tblrows.each(function (index) {
            eachrow++;
            var $tblrow = $(this);
            subpartida = $tblrow.find("[id^='subpartida']");
        });
        counter = subpartida[0].name + 1;
        counterrow = eachrow + 1;
        var newRow = $("<tr>");
        var cols = "";
        var arr = {$nandina|@json_encode};
        var arrum = {$umedida|@json_encode};
        var paises_array = {$paises_array|json_encode};
        cols += '<td><span name="num">' + counterrow + '</span></td>';
        cols += '<td><select id="subpartida' + counter + '" class="select2" name="'+counter+'" onchange="changedesc(this)" style="width: 100%; height:30px;"></td>';
        cols += '<td><div id="desc_arancelaria' + counter + '" name="desc_arancelaria" class="span12 campo"></div></td>';
        cols += '<td><input type="text" class="k-textbox no-restriccion-all" name="desc_comercial" size="90"/></td>';
        cols += '<td><select id="pais_origen_grid' + counter + '" name="pais_origen_grid" class="select2" style="width: 100%; height:30px;"></select></td>';
        cols += '<td><input type="text" class="k-textbox" name="cantidadgrid" onkeypress="validate(event, this)" onkeyup="sumagrid(\'cantidad\'); sumarow(this);"/></td>';
        cols += '<td><select id="unidad_medida' + counter + '" name="unidad_medida" class="select2" style="width: 100%; height:30px;"></select></td>';
        cols += '<td><input type="text" class="k-textbox" name="peso_bruto" onkeypress="validate(event, this)" onkeyup="sumagrid(\'peso_bruto\')"/></td>';
        cols += '<td><input type="text" class="k-textbox" name="precio_unitario_sus" onkeypress="validate(event, this)" onkeyup="sumarow(this);"/></td>';
        cols += '<td><input type="text" class="k-textbox" name="valor_total_sus" onkeypress="validate(event, this)" onkeyup="sumagrid(\'valor_total_sus\')" readonly/></td>';
        cols += '<td><input type="text" class="k-textbox" name="precio_unitario_div" onkeypress="validate(event, this)"  onkeyup="sumarow1(this);"/></td>';
        cols += '<td><input type="text" class="k-textbox" name="valor_total_div" onkeypress="validate(event, this)" readonly/></td>';

        cols += '<td> <span class="ibtnDel" style="color: #FF0000;"> <i class="fa fa-trash"></i> </span></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        $('#'+'subpartida'+counter).empty();
        $('#'+'subpartida'+counter).append($('<option></option>').val('').html(''));
        $.each(arr, function(i, p) {
            $('#'+'subpartida'+counter).append($('<option></option>').val(p).html(i));
        });
        $('#'+'unidad_medida'+counter).empty();
        $('#'+'unidad_medida'+counter).append($('<option></option>').val('').html(''));
        $.each(arrum, function(i, p) {
            $('#'+'unidad_medida'+counter).append($('<option></option>').val(i).html(p));
        });
        $('#'+'pais_origen_grid'+counter).empty();
        $('#'+'pais_origen_grid'+counter).append($('<option></option>').val('').html(''));
        $.each(paises_array, function(i, p) {
            if (i != 1)
                $('#'+'pais_origen_grid'+counter).append($('<option></option>').val(i).html(p));
        });
        counter++;
        counterrow++;
    });

    function reordernum() {
        var $tblrows = $("#myTable tbody tr");
        var count = 1;
        $tblrows.each(function (index) {
            var $tblrow = $(this);
            var span = $tblrow.find("[name=num]");
            span[0].innerText = count;
            count = parseInt(count) + 1;
        });
        counterrow = count;
    }

    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        reordernum();
        sumagrid('cantidad');
        sumagrid('peso_bruto');
        sumagrid('valor_total_sus');
        //counter -= 1
    });
    function changedesc(selectObject) {
        var value = selectObject.value;
        var count = selectObject.name;
        $('#desc_arancelaria'+count).text(value);
        // $('#desc_arancelaria'+count).val(value);
    }
    function sumarow(row) {
        var cantidad =$(row).parent().parent().find('input[name=\'cantidadgrid\']').val();
        var precio = $(row).parent().parent().find('input[name=\'precio_unitario_sus\']').val();
        if (cantidad.length > 0 && precio.length > 0) {
            let multi = cantidad * precio;
            $(row).parent().parent().find('input[name=\'valor_total_sus\']').val(multi);
        }
        else {
            $(row).parent().parent().find('input[name=\'valor_total_sus\']').val('');
        }
        sumagrid('valor_total_sus');
    }
    function sumarow1(row) {
        var cantidad =$(row).parent().parent().find('input[name=\'cantidadgrid\']').val();
        var precio = $(row).parent().parent().find('input[name=\'precio_unitario_div\']').val();
        if (cantidad.length > 0 && precio.length > 0) {
            let multi = cantidad * precio;
            $(row).parent().parent().find('input[name=\'valor_total_div\']').val(multi);
        }
        else {
            $(row).parent().parent().find('input[name=\'valor_total_div\']').val('');
        }
        // sumagrid('valor_total_sus');
    }
    function validate(evt, selectObject) {
        var value = selectObject.value;
        // var edValue = document.getElementById("edValue");
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if ( value.includes(".") && key == ".") {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }

        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

    function sumagrid(field) {
        var qty = 0;
        var $tblrows = $("#myTable tbody tr");
        $tblrows.each(function (index) {
            var $tblrow = $(this);
            if (field == 'cantidad')
                var num =  $tblrow.find("[name=cantidadgrid]").val();
            if (field == 'peso_bruto')
                var num =  $tblrow.find("[name=peso_bruto]").val();
            if (field == 'valor_total_sus')
                var num =  $tblrow.find("[name=valor_total_sus]").val();
            if (num != '')
                qty = parseFloat(qty) + parseFloat(num);
        });
        if (field == 'cantidad')
            $('#cantidad').val(qty.toFixed(2));
        if (field == 'peso_bruto')
            $('#peso_bruto').val(qty.toFixed(2));
        if (field == 'valor_total_sus')
            $('#fob').val(qty.toFixed(2));
    }
    ocultar('aviso1');
    // $("#detalle").kendoGrid({
    //     editable: true,
    //     scrollable: false,
    //     resizable: true,
    //     selectable: "simple",
    //     columns: [
    //             { field: "arancel", title: "Posicion Arancelaria Nandina"},
    //             { field: "gestion_publicacion", title: "Descripción Arancelaria" },
    //             { field: "desc_com", title: "Descripción Comercial" },
    //             { field: "cant", title: "Cantidad" ,editor:ValorNumeric },
    //             { field: "unidad_medida", title: "Unidad de Medida",editor: UMedidaDropDownEditor},
    //             { field: "peso_bruto", title: "Peso Bruto (Kg)",editor:ValorNumeric  },
    //             { field: "precio_unit", title: "Precio Unitario (Sus)",editor:ValorNumeric },
    //             { field: "total", title: "Valor Total ($us)" ,editor:ValorNumeric },
    //             { field: "precio_unit_divisa", title: "Precio Unitario divisa correspondiente (opcional)",editor:ValorNumeric },
    //             { field: "total_fob_divisa", title: "Valor Total divisa correspondiente (opcional)" ,editor:ValorNumeric }
    //         ],
    //     save: function (data) {
    //         setTimeout(function () {
    //             genericUpdate();

    //         },100);
    //     }
    // }).data("kendoGrid");
    //     var dsumedida = [
    //         { d_unidad_medida: 1, descripcion: "u" },
    //         { d_unidad_medida: 2, descripcion: "2u" }
    //     ];

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


    function UMedidaDropDownEditor(container, options) {
        $('<input data-text-field="descripcion"  name="'+options.field+'" data-bind="value:' + options.field+ '"/>')
            .appendTo(container)
            .kendoDropDownList({
                dataTextField: "descripcion",
                dataValueField: "id_unidad_medida",
                autoBind: false,
                dataSource: dsumedida,
                select: onSelectunidadmedida
            });
        $("<span class='k-invalid-msg' data-for='" + options.field + "'></span>").appendTo(container);
    };
    function onSelectunidadmedida(e) {
        var dataItem = this.dataItem(e.item.index());
    };

    function getDescripcionUnidadMedida(unidad_medida)
    {
        for(var i=0, length = unidades.length; i< length;i++)
        {
            if(unidadmedida[i].id_unidad_medida==unidad_medida)
            {
                return unidadmedida[i].descripcion;
            }
        }
    }
    var editorr = $("#editorr_soporte").kendoEditor({
        tools: []
    }).data("kendoEditor");

    $("#cancelarrui").kendoButton();
    $("#aceptar").kendoButton();
    $("#cancelar").kendoButton();
    $("#guardarsolicitud").kendoButton();
    var aceptar = $("#aceptar").data("kendoButton");
    var cancelar = $("#cancelar").data("kendoButton");
    var aprobar = $("#guardarsolicitud").data("kendoButton");
    var cancelarrui = $("#cancelarrui").data("kendoButton");



    aprobar.bind("click", function(e){
        let valid = true;
        if ($('#pais_proc').val() == '') {
            $('#pais_proc_error').show();
            valid = false;
        }
        else {
            $('#pais_proc_error').hide();
        }

        if ($('#depto').val() == null) {
            $('#depto_error').show();
            valid = false;
        }
        else {
            $('#depto_error').hide();
        }

        if ($('#tipo_cuenta').val() == '') {
            $('#tipo_cuenta_error').show();
            valid = false;
        }
        else {
            $('#tipo_cuenta_error').hide();
        }

        if ($('#pers_autorizada').val() == '') {
            $('#pers_autorizada_error').show();
            valid = false;
        }
        else {
            $('#pers_autorizada_error').hide();
        }

        if ($('#num_cuenta').val() == '') {
            $('#num_cuenta_error').show();
            valid = false;
        }
        else {
            $('#num_cuenta_error').hide();
        }
        if ($('#ent_bancaria').val() == '') {
            $('#ent_bancaria_error').show();
            valid = false;
        }
        else {
            $('#ent_bancaria_error').hide();
        }
        if ($('#orig_divisas').val() == '') {
            $('#orig_divisas_error').show();
            valid = false;
        }
        else {
            $('#orig_divisas_error').hide();
        }

        //valid grid if excel not loaded
        if($('#archivoex').val() == '') {
            var $tblrows = $("#myTable tbody tr");
            $tblrows.each(function (index) {
                var $tblrow = $(this);
                var sub = $tblrow.find("[id^='subpartida']");
                var desc_comercial = $tblrow.find("[name=desc_comercial]");
                var pais_origen_grid = $tblrow.find("[name=pais_origen_grid]");
                var cantidadgrid = $tblrow.find("[name=cantidadgrid]");
                var unidad_medida = $tblrow.find("[name=unidad_medida]");
                var peso_bruto = $tblrow.find("[name=peso_bruto]");
                var precio_unitario_sus = $tblrow.find("[name=precio_unitario_sus]");
                var precio_unitario_div = $tblrow.find("[name=precio_unitario_div]");
                if (cantidadgrid.val() == '') {
                        cantidadgrid.addClass('griderror');
                        valid = false;
                }
                else {
                    cantidadgrid.removeClass('griderror');
                }
                if (desc_comercial.val() == '') {
                    desc_comercial.addClass('griderror');
                    valid = false;
                }
                else {
                    desc_comercial.removeClass('griderror');
                }
                if (pais_origen_grid.val() == '') {
                    pais_origen_grid.addClass('griderror');
                    valid = false;
                }
                else {
                    pais_origen_grid.removeClass('griderror');
                }
                if (unidad_medida.val() == '') {
                    unidad_medida.addClass('griderror');
                    valid = false;
                }
                else {
                    unidad_medida.removeClass('griderror');
                }
                if (peso_bruto.val() == '') {
                    peso_bruto.addClass('griderror');
                    valid = false;
                }
                else {
                    peso_bruto.removeClass('griderror');
                }
                if (precio_unitario_sus.val() == '') {
                    precio_unitario_sus.addClass('griderror');
                    valid = false;
                }
                else {
                    precio_unitario_sus.removeClass('griderror');
                }
                if (precio_unitario_div.val() == '') {
                    precio_unitario_div.addClass('griderror');
                    valid = false;
                }
                else {
                    precio_unitario_div.removeClass('griderror');
                }
                if (sub.val() == '') {
                    sub.addClass('griderror');
                    valid = false;
                }
                else {
                    sub.removeClass('griderror');
                }
             });

        }
        else {
            //clearing
            var $tblrows = $("#myTable tbody tr");
            $tblrows.each(function (index) {
                var $tblrow = $(this);
                var sub = $tblrow.find("[id^='subpartida']");
                var desc_comercial = $tblrow.find("[name=desc_comercial]");
                var pais_origen_grid = $tblrow.find("[name=pais_origen_grid]");
                var cantidadgrid = $tblrow.find("[name=cantidadgrid]");
                var unidad_medida = $tblrow.find("[name=unidad_medida]");
                var peso_bruto = $tblrow.find("[name=peso_bruto]");
                var precio_unitario_sus = $tblrow.find("[name=precio_unitario_sus]");
                var precio_unitario_div = $tblrow.find("[name=precio_unitario_div]");

                    cantidadgrid.removeClass('griderror');

                    desc_comercial.removeClass('griderror');

                    pais_origen_grid.removeClass('griderror');

                    unidad_medida.removeClass('griderror');

                    peso_bruto.removeClass('griderror');

                    precio_unitario_sus.removeClass('griderror');

                    precio_unitario_div.removeClass('griderror');

                    sub.removeClass('griderror');
            });
        }




        //$('#depto').val(multiSelect3.value());
        if(valid)
        {
            cambiar('formularioapi','aviso1');
        }
        else
        {
            window.scrollTo(0, 0);
        }
    });

    cancelar.bind("click", function(e){
        cambiar('aviso1','formularioapi');
    });


    aceptar.bind("click", function(e){

        $("#aceptar").data("kendoButton").enable(false);
        var file_data = $("#archivoex").prop("files")[0];
        // var paisp = $("#pais_proc").data("kendoDropDownList");
        var tipoc = $("#tipo_cuenta").data("kendoDropDownList");
        var persa = $("#pers_autorizada").data("kendoDropDownList");

        var $tblrows = $("#myTable tbody tr");
        var count = 1;

        var array_paises = [];
        $tblrows.each(function (index) {
            var $tblrow = $(this);
            $tblrow.find('[name=pais_origen_grid] > option:selected').each(function() {
                array_paises.push($(this).val());
            });
        });
        var newpaises = array_paises.filter(function(elem, index, self) {
            return index === self.indexOf(elem);
        });
        $("#paises").val(newpaises);
        var form_data = new FormData();
        form_data.append("file", file_data);

        form_data.append('paises', $("#paises").val());
        form_data.append('pais_proc', $("#pais_proc").val());
        form_data.append('depto', $("#depto").val());
        form_data.append('cantidad', $("#cantidad").val());
        form_data.append('peso_bruto', $("#peso_bruto").val());
        form_data.append('fob', $("#fob").val());
        form_data.append('orig_divisas', $("#orig_divisas").val());
        form_data.append('ent_bancaria', $("#ent_bancaria").val());
        form_data.append('num_cuenta', $("#num_cuenta").val());
        form_data.append('tipo_cuenta', tipoc.value());
        form_data.append('cambio_empleado', $("#cambio_empleado").val());
        form_data.append('pers_autorizada', persa.value());

        var tabledata = [];
        var $tblrows = $("#myTable tbody tr");
        var count = 1;
        var arrayvalue = [];
        $tblrows.each(function (index, value) {
            var $tblrow = $(this);
            var subpartida = $tblrow.find("select[id^='subpartida'] option:selected");
            var desc_arancelaria = $tblrow.find("[name=desc_arancelaria]");
            var desc_comercial = $tblrow.find("[name=desc_comercial]").val();
            var pais_origen_grid = $tblrow.find("[name=pais_origen_grid] option:selected");
            var unidad_medida = $tblrow.find("[name=unidad_medida] option:selected");
            var cantidadgrid = $tblrow.find("[name=cantidadgrid]").val();
            var peso_bruto = $tblrow.find("[name=peso_bruto]").val();
            var precio_unitario_sus = $tblrow.find("[name=precio_unitario_sus]").val();
            var valor_total_sus = $tblrow.find("[name=valor_total_sus]").val();
            var precio_unitario_div = $tblrow.find("[name=precio_unitario_div]").val();
            var valor_total_div = $tblrow.find("[name=valor_total_div]").val();
            arrayvalue.push({
                'subpartida': subpartida.text(),
                'desc_arancelaria':desc_arancelaria.text(),
                'desc_comercial': desc_comercial,
                'pais_origen_grid': pais_origen_grid.val(),
                'unidad_medida': unidad_medida.val(),
                'cantidadgrid': cantidadgrid,
                'peso_bruto': peso_bruto,
                'precio_unitario_sus': precio_unitario_sus,
                'valor_total_sus': valor_total_sus,
                'precio_unitario_div':precio_unitario_div,
                'valor_total_div': valor_total_div
            });
        });
        var tabledata = JSON.stringify(arrayvalue);
        form_data.append('arrayvalue', tabledata);
        $.ajax({
            type: 'post',
            url: 'index.php?opcion=admAutorizacionPrevia&tarea=guardaSolicitud',
            contentType: false,
            processData: false,
            data: form_data,
            success: function (data) {
                if(data == 2)
                {
                    alert("Formato de documento invalido, o no se subio la plantilla Excel");
                    $("#aceptar").data("kendoButton").enable(true);
                } else {
                    cerraractualizartab('Autorizaciones Previas','admAutorizacionPrevia','ListarColaApiEmpresa');
                }
            }
        });
    });

    cancelarrui.bind("click", function(e){
        cerraractualizartab('Autorizaciones Previas','admAutorizacionPrevia','ListarColaApiEmpresa');

    });
    function agregarfiladetalle(){
        var detalle = $("#detalle").data("kendoGrid");
        detalle.addRow();
    }
    function eliminarfiladetalle(){
        var detalle = $("#detalle").data("kendoGrid");
        var currentDataItem = detalle.dataItem(detalle.select());
        var dataRow = detalle.dataSource.getByUid(currentDataItem.uid);
        detalle.dataSource.remove(dataRow);
    }
    //-----------------------para la elecion de paises de origen-----------------------------------
    // $("#paises").kendoMultiSelect({
    //     placeholder:"Pais de Origen",
    //     dataTextField: "nombre",
    //     dataValueField: "id_pais",
    //     dataSource: {
    //         transport: {
    //             read: {
    //                 dataType: "json",
    //                 url: "index.php?opcion=admRegistroApi&tarea=listar_pais"
    //             }
    //         }
    //     },
    // });

    {*var multiSelect = $("#paises").data("kendoMultiSelect"),*}
    {*        setValue = function(e) {*}
    {*            if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {*}
    {*                multiSelect.dataSource.filter({}); //clear applied filter before setting value*}

    {*                multiSelect.value($("#paises_values").val().split(","));*}
    {*            }*}
    {*        },*}
    {*        setSearch = function (e) {*}
    {*            if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {*}
    {*                multiSelect.search($("#word").val());*}
    {*            }*}
    {*        };*}
    //this.onload(setValue('1'));

    //-----------------------para la elecion de paises de proc-----------------------------------
    $("#pais_proc").kendoDropDownList({

        optionLabel:"Seleccione El pais de Procedencia",
        ignoreCase: false,
        dataTextField: "nombre",
        dataValueField: "id_pais",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admRegistroApi&tarea=listar_pais"
                }
            }
        },

    });
    var paisp = $("#pais_proc").data("kendoDropDownList");


    $("#pers_autorizada").kendoDropDownList({

        optionLabel: "Persona Autorizada en el trámite y recojo de la Autorización Previa",
        ignoreCase: true,
        dataTextField: "nombre",
        dataValueField: "id_persona",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admAutorizacionPrevia&tarea=listar_personas"
                }
            }
        },

    });

    //-----------------------para la elecion de departamentos destino-----------------------------------
    $("#depto").kendoMultiSelect({
        placeholder:"Departamentos Destino",
        dataTextField: "nombre",
        dataValueField: "id_departamento",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admRegistroApi&tarea=listar_depto"
                }
            }
        },
    });


    var data = [
        { text: "M/N", value: "1" },
        { text: "M/E", value: "2" }
    ];

    $("#tipo_cuenta").kendoDropDownList({
        optionLabel: "Seleccione Tipo de Cuenta",
        dataTextField: "text",
        dataValueField: "value",
        dataSource: data
    });



    {*var multiSelect3 = $("#depto").data("kendoMultiSelect"),*}
    {*        setValue = function(e) {*}
    {*            if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {*}
    {*                multiSelect.dataSource.filter({}); //clear applied filter before setting value*}

    {*                multiSelect.value($("#depto_valores").val().split(","));*}
    {*            }*}
    {*        },*}
    {*        setSearch = function (e) {*}
    {*            if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {*}
    {*                multiSelect.search($("#word").val());*}
    {*            }*}
    {*        };*}

    function ValorNumeric (container, options) {
        $('<input data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoNumericTextBox({
                decimals: 4
            });
    }
    // this.onload(setValue('1'));
    // function isNumeric (evt) {
    //     var theEvent = evt || window.event;
    //     var key = theEvent.keyCode || theEvent.which;
    //     key = String.fromCharCode (key);
    //     var regex = /[0-9]|\./;
    //     if ( !regex.test(key) ) {
    //         theEvent.returnValue = false;
    //         if(theEvent.preventDefault) theEvent.preventDefault();
    //     }
    // }
</script>
