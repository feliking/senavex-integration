<div class="row-fluid "  >    
     <div class="span12 form" >
    </div>
</div>
<div class="row-fluid fadein"  >  
    <div class="span12 form" >
       Por favor, escoja el acuerdo para la factura.
    </div>
</div> 
<div class="row-fluid form fadein" >
    <div class="span4 form" >     
    </div>
    <div class="span4 form" >
         <input style="width:100%;" id="acuerdo" name="acuerdo" required validationMessage="Escoja Incoterm">        
    </div>
    <div class="span4 form" >      
    </div>
</div> 
 </div>   
<script> 
$("#acuerdo").kendoComboBox(
{   placeholder:"Escoja el tipo de Acuerdo",
    dataTextField: "acuerdo",
    dataValueField: "Id",
    dataSource: [
    {foreach $acuerdos as $acuerdo} 
        { acuerdo: " {$acuerdo[1]}", Id: {$acuerdo[0]}},
   {/foreach}
    ],
    change : function (e) {
        if (this.value() && this.selectedIndex == -1) { 
         this.text('');             
        }
        else
        {
           cerraractualizartab('Factura','admFactura','crearFactura&acuerdor='+this.value())
        }
    }
});
var acuerdo = $("#acuerdo").data("kendoComboBox");
</script> 