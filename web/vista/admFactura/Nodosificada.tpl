<div class="row-fluid fadein">
    <div class="span12 form">
        escoja una o mas facturas Dosificadas relacionadas
        <select id="facturasadmitidas" style="width:95%;margin-left:7px;" name="facturaadmitidarelacionada" required validationMessage="Escuja sus facturas."></select>
    </div>
</div>
<div class="row-fluid fadein">
    <div class="span12">
        <input type="text" class="k-textbox fadein"  style="width:95%;margin-bottom:5px;" 
        placeholder="Nro. de Factura"  name="nrofactura" id="nrofactura" required validationMessage="Ingrese el numero de su factura." /><br>
        Factura no Dosificada
    </div>
</div>
{*-----------------------esto es para el multiselect--------------------*}
<script>
$("#facturasadmitidas").kendoMultiSelect({
    dataTextField: "numero_factura",
    dataValueField: "id_factura",
    dataSource: {
        transport: {
            read: {
                dataType: "json",
                url: "index.php?opcion=admFactura&tarea=facturasDispuestas"
            }
        }
    },
    change : function (e) {
        actualizaGridNoDosificada(this.value());
    }
    
});
</script>
