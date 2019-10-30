<form name="acuerdoForm" id="acuerdoForm" method="post" class="k-block fadein"  action="index.php">
    {if $acuerdo->id_acuerdo}  <input type="hidden" value="{$acuerdo->id_acuerdo}" name="id_acuerdo"/> {/if}
    <div class="k-header">
        <div class="row-fluid form">
            <div class="span12">
                <div class="titulonegro" >Acuerdo</div>
            </div>
        </div>
    </div>
    <div class="k-body">
        <div class="row-fluid form">
            <div class="span2 parametro" >
                Denominación:
            </div>
            <div class="span4" >
                <input value="{$acuerdo->descripcion}" type="text" class="k-textbox " name="acuerdoDescripcion" id="acuerdoDescripcion"  required validationMessage="Por favor ingrese el nombre del acuerdo" maxlength="200"/>
            </div>
            <div class="span2 parametro" >
                Sigla:
            </div>
            <div class="span4" >
                <input type="text" value="{$acuerdo->sigla}" class="k-textbox " name="acuerdoSigla" id="acuerdoSigla"  required validationMessage="Por favor ingrese la Sigla" maxlength="200"/>
            </div>

        </div>
        <div class="row-fluid form">
            <div class="span2 parametro" >
                Valor Internacional:
            </div>
            <div class="span4" >
                <input type="text" class="k-input form-select" name="acuerdoValorInternacional" id="acuerdoValorInternacional"  required validationMessage="Por favor escoja el Valor Internacional"/>
            </div>
            <div class="span2 parametro" >
                Vigencia DDJJ en dias:
            </div>
            <div class="span4">
                <input type="number" value="{$acuerdo->vigencia_ddjj}" min="0" class="" name="acuerdoVigenciaDdjj" id="acuerdoVigenciaDdjj"/>
                <input type="hidden" name="hiddenvalidator" id="hiddenvalidator" data-number data-required-msg="Por favor ingrese la vigencia para DDJJ" />
            </div>

        </div>
        <div class="row-fluid form">
            <div class="span2 parametro" >
                Tipo Acuerdo:
            </div>
            <div class="span4" >
                <input type="text" class="k-input form-select" name="acuerdoTipo" id="acuerdoTipo"  required validationMessage="Por favor escoja el tipo de acuerdo" maxlength="200"/>
            </div>
            <div class="span2 parametro" >
                Arancel:
            </div>
            <div class="span4" >
                <select id="acuerdoArancel" name="acuerdoArancel"></select>
                <input type="hidden" name="vacuerdoarancel" data-vacuerdoarancel="true" class="fadein"/>
            </div>
        </div>
        <div class="row-fluid form">
            <div class="span2 parametro" >
                Tipo de certificado:
            </div>
            <div class="span4" >
                <input type="text" class="k-input form-select" name="tipoco" id="tipoco"  required validationMessage="Por favor escoja el Valor Internacional"/>
            </div>
        </div>
        <div class="row-fluid form">
            <div id="tabla_criterioorigen" class="fadein"></div>
            <input type="hidden" name="vcriterioorigen" data-vcriterioorigen="" class="fadein">
        </div>
        <div class="row-fluid  form">
            <div class="span4">
            </div>
            <div class="span2 ">
                <input type="button" value="Cancelar" id="acuerdoCancel" class="k-primary k-button form-button">
            </div>
            <div class="span2">
                <input type="button" value="Guardar" id="acuerdoSave" class="k-primary k-button form-button">
            </div>
            <div class="span4">
            </div>
        </div>
    </div>
</form>
{include file="declaracionJurada/LoadingDeclaracionJurada.tpl" customtitle="Guardando Declaración Jurada de Origen"}
{include file="declaracionJurada/NoticeDeclaracionJurada.tpl"
custom_message="Se produjo un error por favor contactese con mantenimiento"
acuerdo="true" id=$id}
<script>
var acuerdoForm = $("#acuerdoForm").kendoValidator({
    rules:{
        number: function(input) {
            var  datanumber = input.data('number');
            if(typeof  datanumber !== 'undefined' )
            {
                if($("#acuerdoVigenciaDdjj").val()) return true;
                else return false;
            }
            return true
        },
        vcriterioorigen: function(input) {
            var  validate = input.data('vcriterioorigen');
            if (typeof validate !== 'undefined') return checkGrid(tabla_criterioorigen);
            return true;
        },
        vacuerdoarancel: function(input){
            if (typeof input.data('vacuerdoarancel') !== 'undefined'){
                return $("#acuerdoArancel").data('kendoMultiSelect').value().length!==0;
            }
            return true;
        }
    },
    messages:{
        number:'Por favor ingrese la vigencia de DDJJ',
        vcriterioorigen:'Ingrese al menos un criterio de origen.',
        vacuerdoarancel:"Debe ingresar al menos un Arancel por acuerdo"
    }
}).data("kendoValidator");
$('#acuerdoVigenciaDdjj').kendoNumericTextBox();
$("#acuerdoValorInternacional").kendoComboBox({
    placeholder:"Tipo de Valor",
    dataTextField: "tipoValorInternacional",
    dataValueField: "id",
    {if $acuerdo}value:{$acuerdo->id_tipo_valor_internacional},{/if}
    dataSource: [
        {foreach $valores as $valor}
        { tipoValorInternacional: "{$valor->abreviatura}", id: {$valor->id_tipo_valor_internacional} },
        {/foreach}
    ],
    index:0,
    change : function (e) {
        if (this.value() && this.selectedIndex == -1) {
            this.text('');
        }
    }
});
$("#acuerdoTipo").kendoComboBox({
    placeholder:"Tipo de Acuerdo",
    dataTextField: "tipoAcuerdo",
    dataValueField: "id",
    {if $acuerdo}value:{$acuerdo->id_tipo_acuerdo},{/if}
    dataSource: [
        {foreach $tipoAcuerdos as $tipoacuerdo}
        { tipoAcuerdo: "{$tipoacuerdo->descripcion}", id: {$tipoacuerdo->id_tipo_acuerdo}},
        {/foreach}
    ],
    index:0,
    change : function (e) {
        if (this.value() && this.selectedIndex == -1) {
            this.text('');
        }
    }
});
$("#tipoco").kendoComboBox({
    placeholder:"Tipo de Certificado de Origen",
    dataTextField: "tipoCo",
    dataValueField: "id",
    {if $acuerdo && $acuerdo->id_tipo_co}value:{$acuerdo->id_tipo_co},{/if}
    dataSource: [
        {foreach $tipoCertificadosOrigen as $tipoCertificadoOrigen}
        { tipoCo: "{$tipoCertificadoOrigen->descripcion}", id: {$tipoCertificadoOrigen->id_tipo_co}},
        {/foreach}
    ],
    index:0,
    change : function (e) {
        if (this.value() && this.selectedIndex == -1) {
            this.text('');
        }
    }
});

var acuerdoArancel=$("#acuerdoArancel").kendoMultiSelect({
    dataTextField: "denominacion",
    dataValueField: "id",
    value:[{foreach $acuerdo->acuerdo_arancel as $arancel}{if $arancel->activo}{$arancel->id_arancel}{if not $arancel@last}, {/if}{/if}{/foreach}],
    dataSource: [
        {foreach $aranceles as $arancel}
        { denominacion: "{$arancel->denominacion}", id: "{$arancel->id_arancel}"},
        {/foreach}
    ]
});
$("#acuerdoCancel").kendoButton({
    click: function () {
        remover(tabStrip.select());
    }
});
$("#acuerdoSave").kendoButton({
    click: function () {
        if (acuerdoForm.validate()) {
            cambiar('acuerdoForm','{$id}loading_ddjj');
            var data='opcion=admAcuerdo&tarea=saveAcuerdo&'+ $("#acuerdoForm").serialize()+'&acuerdoArancelArray='
                    +acuerdoArancel.val();
            data += '&criterioOrigenData='+getTableData(tabla_criterioorigen);
            $.ajax({
                type: 'post',
                url: 'index.php',
                data:data,
                success: function (data) {
                    var data = JSON.parse(data);
                    if(+data.status) {
                        remover(tabStrip.select());
                        cerraractualizartab('Acuerdos','admAcuerdo','acuerdos');
                    }
                    else{
                        $('{$id}_notice_ddjj_message').html(data.message);
                        cambiar('{$id}loading_ddjj','{$id}_notice_ddjj');
                    }
                }
            });
        }
    }
});
var criterios=$("#tabla_criterioorigen").kendoGrid({
    editable: true,
    scrollable: false,
    resizable: true,
    selectable: "simple",
    dataSource: {
        schema: {
            model: {
                id: "id_criterio_origen",
                fields: {
                    id_criterio_origen: { editable: false, nullable: true },
                    descripcion: { validation: { required: true } },
                    parrafo: { validation: { required: true } },
                    orden:{
                        type: "number",
                        validation: {
                            defaultValue: '',
                            max:9999999999,
                            min:0,
                            required:false}
                    }
                }
            }
        },
        transport: {
            read: {
                dataType: "json",
                {if $acuerdo->id_acuerdo}url: "index.php?opcion=admAcuerdo&tarea=listarCriterioOrigen&id_acuerdo={$acuerdo->id_acuerdo}"{/if}
            }
        }
    },
    toolbar: [{ name:"create",text:"Añadir criterio de origen" }],
    columns: [
        { field: "id_criterio_origen", title: "id",hidden:true},
        { field: "descripcion", title: "Denominación"},
        { field: "parrafo", title: "Descripción"},
        { field: "orden", title: "Orden"},
        { command:[
            { name:"Eliminar",
                click: function(e){  //add a click event listener on the delete button
                    e.preventDefault(); //prevent page scroll reset
                    var tr = $(e.target).closest("tr"); //get the row for deletion
                    var data = this.dataItem(tr); //get the row data so it can be referred later
                    $.ajax({
                        type: 'post',
                        url: 'index.php',
                        data:'opcion=admAcuerdo&tarea=deleteCriterioOrigen&id_criterio_origen='+data.id_criterio_origen,
                        success: function (data) {
                        }
                    });
                    tabla_criterioorigen.dataSource.remove(data)  //prepare a "destroy" request
                }
            }
          ],width:"90px"
        }
    ]
});
var tabla_criterioorigen= $("#tabla_criterioorigen").data("kendoGrid");
</script>

