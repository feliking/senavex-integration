 <span class="titulofactura" >NIT: {$nit}</span><br>
<input type="text" class="k-textbox"  style="width:90%;" onkeypress='return validateQty(event);'
        placeholder="Nro. de Autorización"  name="nroautorizacion" id="nroautorizacion" required validationMessage="Por favor ingrese el numero de su Autorización." /><br>
<br>
<input type="text" class="k-textbox"  style="width:90%;margin-bottom:5px;"  onkeypress='return validateQty(event);'
        placeholder="Nro. de Factura"  name="nrofactura" id="nrofactura"
        required data-required-msg="Por favor ingrese el numero de su factura."
        data-verificanum
        data-verificanum-url="validate/username" />
<script>
$("#nroautorizacion").kendoMaskedTextBox({
    change: function() {
         facturaform.validateInput($("#nrofactura"));
    }
});
</script>