<div id="fabricas">
    {include file="admDireccion/Direccion_Edit_Ddjj.tpl" editable=true}
    <div class="row-fluid form">
        <ul class="ul-buttons">
            <li>
                <input id="agregarfabrica" type="button" value="Agregar" class="k-button" onclick="agregarFabrica()"/>
            </li>
            <li>
                <input id="cancelarfabrica" type="button" value="Cancelar" class="k-button reset"
                       onclick="cancelarFabrica()"/>
            </li>
        </ul>
    </div>
</div>


<script>
    {*******************************Important to remove dom****************}
    $("#fabricas").parents('.k-window').remove();
        {********************************FABRICA********************************}
    var fabricas;
    function setPopup() {
        fabricas = $("#fabricas").kendoWindow({
            draggable: true,
            width: "900px",
            resizable: true,
            modal: true,
            actions: [
                "Close"
            ],
            animation: {
                close: {
                    effects: "fade:out",
                    duration: 500
                }
            }
        }).data("kendoWindow");
        fabricas.center();
    }
    setPopup();

    function addFabrica() {
        if(!$("#fabricas").length) {
            setPopup();
        }
        fabricas.open();
    }

    function agregarFabrica() {
        if(form_editar_direccion_{$de_id}.validate()){
            $.ajax({
                type: 'post',
                url: 'index.php',
                data: 'opcion=admDireccion&tarea=save_data_direccion_new&'+$('#form_editar_direccion_{$de_id} :input').serialize(),
                success: function (data) {
                    if(data!=0){
                        var fabrica = $('#ed_ntz_{$de_id}').val();
                        fabricas.close();
                        var combobox = $("#combo_fabricas").data("kendoComboBox");
                        combobox.dataSource.add({ "id_direccion": data,"direccion":fabrica });
                        combobox.value(data);
                        $('#form_fabricas').find('input.k-textbox').val('');
                        fabrica_object={
                            direccion:$('#ed_ntc_{$de_id}').val(),
                            ciudad:$("#ed_dpto_{$de_id}").data("kendoComboBox").text(),
                            contacto:$('#ed_contacto_{$de_id}').val(),
                            telefono:$('#ed_tfijo_{$ed_id}').val()
                        };
                    }
                }
            });
        }
    }
    function cancelarFabrica() {
        fabricas.close();
        // fabricas.destroy();
    }
</script>
