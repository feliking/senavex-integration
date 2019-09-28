<div class="row-fluid "  >    
    <div class="span12 form" >
        </div>
    </div>
    <div class="row-fluid fadein"  >  
        <div class="span12 form" >
           Por favor, elija el acuerdo para la factura.
        </div>
    </div> 
    <form id="acuerdoedicionform">
        <input type='hidden' name="id_factura" value="{$id_factura}">    
        <div class="row-fluid form fadein" >
            <div class="span4 form" >     
            </div>
            <div class="span4 form" >
                 <input style="width:100%;" id="acuerdo{$id_factura}" name="acuerdo{$id_factura}" required validationMessage="Escoja su Acuerdo">        
            </div>
            <div class="span4 form" >      
            </div>
        </div>
    </form>
    <div class="row-fluid  form" >
        <div class="span4 hidden-phone" >
        </div>
        <div class="span2 " >
            <input id="cancelaracuerdoedicion" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
        </div> 
        <div class="span2 " >
            <input id="aceptaracuerdoedicion" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
        </div> 
        <div class="span4 hidden-phone" >
        </div>
    </div> 
</div>   
<script> 
    //--------------esto es para el acuerdo-----------------
$("#acuerdo{$id_factura}").kendoComboBox(
{   placeholder:"Escoja el tipo de Acuerdo",
    dataTextField: "acuerdo",
    dataValueField: "Id",
    dataSource: [
    {foreach $acuerdos as $acuerdo} 
        { acuerdo: " {$acuerdo[1]}", Id: {$acuerdo[0]}},
   {/foreach}
    ]
});
var acuerdo = $("#acuerdo{$id_factura}").data("kendoComboBox");
//-------esto es para los botones ----------------------
$("#cancelaracuerdoedicion").kendoButton();
var cancelaracuerdoedicion = $("#cancelaracuerdoedicion").data("kendoButton");
cancelaracuerdoedicion.bind("click", function(e){
     remover(tabStrip.select()); 
     anadir('Mis Facturas','admFactura','verFacturas');
});
$("#aceptaracuerdoedicion").kendoButton();
var aceptaracuerdoedicion = $("#aceptaracuerdoedicion").data("kendoButton");
aceptaracuerdoedicion.bind("click", function(e){  
    //aqui se validan los formualrios
    if(acuerdoedicionform.validate())
    {
        cerraractualizartab('Editar Factura','admFactura','editarFacturaVista&acuerdore='+acuerdo.value()+'&tipo_factura='+'{$tipo_factura}'+'&id_factura='+'{$id_factura}');
    }
});

//-------para el validador---------------------------
var acuerdoedicionform = $("#acuerdoedicionform").kendoValidator().data("kendoValidator");   
</script> 