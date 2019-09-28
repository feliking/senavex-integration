<div class="span4 parametro fadein" >
    Gastos de Flete y Seguro:
</div> 
<div class="span2 fadein" >
    <input type="number"   placeholder='Total $us' name="costoflete" id="costoflete"  />
    <input type="hidden" name="costofletevalidator" id="costofletevalidator" 
     data-costofletevalidator
     data-required-msg="Ingrese el monto" />
</div> 
<div class="span2 fadein" >
    <input style="width:100%;" id="incoterm" name="incoterm" required validationMessage="Escoja Incoterm">
</div> 
<div class="span1 fadein" >
    <img src="styles/img/ayuda.png" width="100%" onclick="ayudaIcoterm()" style="max-width:30px;" class="ayuda">
</div>
<script >
 $("#costoflete").kendoNumericTextBox({
     min: 0
 }); 
 $("#incoterm").kendoComboBox(
    {   placeholder:"Icnoterm",
        ignoreCase: true,
        dataTextField: "sigla",
        dataValueField: "Id",
        dataSource: [
        {foreach $incoterms as $incoterm} 
             { sigla: "{$incoterm->sigla}", Id: {$incoterm->id_incoterm}},
        {/foreach}  
        ],
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) { 
             this.text('');             
            }
            else
            {
                cambiar('ayudaicoterm'+incotermlast,'ayudaicoterm'+String(this.value()));
                incotermlast=String(this.value());
            }
        }
    });
var incoterm = $("#incoterm").data("kendoComboBox");
var incotermlast='0'; 

 </script >