 <div class="span4 fadein" >
    <input type="text" class="k-textbox"  placeholder='Puerto de embarque' name="puertoembarque" id="puertoembarque" 
           required validationMessage="Ingrese el puerto de embarque." />
</div> 
<div class="span4 fadein" >
    <input placeholder='Pais de Destino' style="width:100%;" name="destinofactura" id="destinofactura" 
           required validationMessage="Ingrese el destino." />
</div>                     
<div class="span1 parametro" >
    Fecha:
</div>     
<div class="span3" >
   <input id="datepicker" type="date" name="fechafactura"   placeholder="dd/mm/aa"  style="width:100%"> <br>
   <center><input type="hidden" name="hiddenvalidatordate" id="hiddenvalidatordate" data-date data-required-msg="Ingrese la Fecha de expedición" /></center>
</div> 
<script>
$("#datepicker").kendoDatePicker({
 value: new Date()
});
$("#destinofactura").kendoComboBox(
    {   placeholder:"País de Destino",
        dataTextField: "pais",
        dataValueField: "Id",
        dataSource: [
        {foreach $paises as $pais} 
        { pais: "{$pais->nombre}", Id: {$pais->id_pais}},
        {/foreach}
        ],
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) { 
             this.text('');
            }
        }
});
var destinofactura = $("#destinofactura").data("kendoComboBox");
</script>
