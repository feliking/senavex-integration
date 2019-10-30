<form name="arancelForm" id="arancelForm" method="post" class="k-block fadein"  action="index.php">
    {if $arancel->id_arancel}<input type="hidden" name="id_arancel" value="{$arancel->id_arancel}"/>{/if}
    <input type="hidden" id="newFile" name="newFile" value="false"/>
    <div class="k-header">
        <div class="row-fluid form">
            <div class="span12">
                <div class="titulonegro" >Arancel</div>
            </div>
        </div>
    </div>
    <div class="k-body">
        <div class="row-fluid form">
            <div class="span2 parametro" >
                Denominación:
            </div>
            <div class="span5" >
                <input  type="text" class="k-textbox " name="arancelDenominacion" id="arancelDenominacion"  required validationMessage="Por favor ingrese el Arancel"
                        value="{$arancel->denominacion}"/>
            </div>
            <div class="span1 parametro" >
                Gestion:
            </div>
            <div class="span2" >
                <input type="text"   name="arancelGestion" id="{$id}arancelGestion"
                       {*value="{$arancel->gestion_publicacion}"*}/>
                <input type="hidden" name="arancelvalidator" data-arancelvalidator="" class="fadein">
            </div>
            <div class="span1 parametro" >
                Arancel Boliviano Actual:
            </div>
            <div class="span1" >
                <input type="checkbox" name="arancelVigente" {if $arancel->vigente}checked{/if}/>
            </div>
        </div>
        <div class="row-fluid form">
            <input type="file" id="arancelFiles" name="arancelFiles" class="inputfile inputfile-1" />
            <label for="arancelFiles"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Escoja un archivo&hellip;</span></label>
        </div>
        <div class="row-fluid form">
            <div id="tabla_partidas" class="fadein"></div>
            <input type="hidden" name="partidasvalidator" data-partidasvalidator="" class="fadein">
        </div>
        <div class="row-fluid  form">
            <div class="span4">
            </div>
            <div class="span2 ">
                <input type="button" value="Cancelar" onclick="remover(tabStrip.select())" class="k-primary k-button form-button">
            </div>
            <div class="span2">
                <input type="button" value="Guardar" onclick="arancelGuardar()" class="k-primary k-button form-button">
            </div>
            <div class="span4">
            </div>
        </div>
    </div>
</form>

{include file="declaracionJurada/LoadingDeclaracionJurada.tpl" customtitle="Guardando Arancel, esto puede tardar unos minutos" id="arancel_"}
{include file="declaracionJurada/NoticeDeclaracionJurada.tpl" custom_message="Se produjo un error por favor contactese con mantenimiento" acuerdo="true" id="arancel_"}
<script>
$("#{$id}arancelGestion").kendoDatePicker({
    start: "decade",
    depth: "decade",
    format: "yyyy",
    {if $arancel->gestion_publicacion}value: "{$arancel->gestion_publicacion}"{/if}
});
var gestion = $('#{$id}arancelGestion').data('kendoDatePicker');
var validatorGrid =false;
var acuerdoForm = $("#arancelForm").kendoValidator({
    rules:{
        arancelvalidator: function(input) {
            var  validate = input.data('arancelvalidator');
            if(typeof  validate !== 'undefined' )
            {
                return (gestion.value()!= null)
            }
            return true;
        },
        partidasvalidator: function(input) {
            var  validate = input.data('partidasvalidator');
            if(typeof  validate !== 'undefined' )
            {
                var GridDataSource = tabla_partidas.dataSource;
                var numrows = GridDataSource.total();
                return (numrows > 0);
            }
            return true;
        }
    },
    messages:{
        arancelvalidator:'Ingrese la Gestión',
        partidasvalidator:'Suba los datos del arancel'
    }
}).data("kendoValidator");
var partidasSource= new kendo.data.DataSource({
    data: [
        {foreach $partidas as $partida}
        { id_partida:"{$partida->id_partida}",
            partida: "{$partida->partida}",
            denominacion: "{$partida->denominacion}",
            activo:"{$partida->activo}",
            unidad_medida:"{if $partida->unidad_medida}{$partida->unidad_medida}{/if}" ,
            reo:"{if $partida->reo}{$partida->reo}{/if}",
            criterio_valor:{if $partida->criterio_valor}{$partida->criterio_valor}{else}0{/if}
        },
        {/foreach}
    ],
    schema: {
        model: {
            fields: {
                id_partida: "id_partida",
                partida:"partida",
                denominacion: "denominacion",
                unidad_medida: "unidad_medida",
                activo:"activo",
                reo:"reo",
                criterio_valor: {
                    type: "number"
                }
            }
        }
    },
    pageSize:25
});
var partidas=$("#tabla_partidas").kendoGrid({
    editable: true,
    scrollable: false,
    resizable: true,
    sortable: true,
    dataSource: partidasSource,
    pageable:{
        refresh:false,
        pageSize:25,
        buttonCount:5
    },
    filterable: {
        extra: false,
        operators: {
            string: {
                startswith: "Empieza con:",
                eq: "Es igual a:",
                neq: "No es igual a:"
            }
        }
    },
    toolbar: [{ name:"create",text:"Añadir nomenclatura" }],
    columns: [
        { field:"id_partida",hidden:true},
        { field: "partida", title: "Partida"},
        { field: "denominacion", title: "Denominación"},
        { field: "unidad_medida", title: "Unidad de Medida"},
        { field: "reo", title: "REO"},
        { field: "criterio_valor",title:"Valor de Riesgo"},
        { field: "activo", hidden:true},
        { command:[
            { name:"Eliminar",
                click: function(e){  //add a click event listener on the delete button
                    e.preventDefault(); //prevent page scroll reset
                    var tr = $(e.target).closest("tr"); //get the row for deletion
                    var data = this.dataItem(tr); //get the row data so it can be referred later
                    $.ajax({
                        type: 'post',
                        url: 'index.php',
                        data:'opcion=admArancel&tarea=deletePartida&id_partida='+data.id_partida,
                        success: function (data) {
                        }
                    });
                    tabla_partidas.dataSource.remove(data)  //prepare a "destroy" request
                }
            }
        ],width:"90px"
        }
    ]
});
var tabla_partidas= $("#tabla_partidas").data("kendoGrid");

function arancelGuardar() {
    if (acuerdoForm.validate()) {
        cambiar('arancelForm','arancel_loading_ddjj');
        var data='opcion=admArancel&tarea=saveArancel&'+ $("#arancelForm").serialize();
        data += '&partidas='+getTableData(tabla_partidas);
        $.ajax({
            type: 'post',
            url: 'index.php',
            data:data,
            success: function (data) {
                var data = JSON.parse(data);
                if(+data.status) {
                    remover(tabStrip.select());
                    cerraractualizartab('Aranceles','admArancel','aranceles');
                }
                else{
                    $('arancel__notice_ddjj_message').html(data.message);
                    cambiar('arancel_loading_ddjj','{$id}_arancel__notice_ddjj');
                }
            }
        });
    }
}
//---------------------------papaparse :configuracion es una libreria para csv-----------------------------
$("#arancelFiles").change(function(){
    if (!$(this)[0].files.length)
    {
        fadeMessage("Escoja almenos un archivo para subir los aranceles");
        return false;
    }
    $("#newFile").val('true');
    $(this).parse({
        config:{
            header: true,
//            dynamicTyping:true,
            skipEmtyLines: true,
            encoding:'utf-8',
            delimiter:'|',
            complete: function (results) {
                validatorGrid=(results['errors'].length == 0);
                partidasSource.fetch(function(){
                    partidasSource.data(results['data']);
                });
            }
        },
        before: function(file, inputElem)
        {
            console.log('this is the before uploading:',file,inputElem);
        },
        error: function(err, file, inputElem, reason)
        {
            console.log('this is the error');
            console.log(err,file,inputElem,reason);
        },
        complete: function(results)
        {
            console.log('this are the results',results);
        }
    });
});
</script>
<script src="styles/js-personales/jquery.custom-file-input.js"></script>
