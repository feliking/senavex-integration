{assign var="id" value="np"}  
<div class="row-fluid  form" id="registroausencia">
    <div class="k-block fadein">
        <div class="k-header">
            <div class="row-fluid  form" >
                 <div class="span12"  >
                    <div class="titulonegro" > Asignación de Permiso o Licencia</div>  
                </div>                                      
            </div>  
        </div>
        <div class="k-cuerpo">
            <form name="ausenciaform"  id="ausenciaform" >
            <input type="hidden" name="opcion" id="opcion" value="admAdministrativa" />
            <input type="hidden" name="tarea" id="tarea" value="registroAusencia" />
                <div class="row-fluid form" >  
                     <div class="span2" > 
                    </div>      
                    <div class="span4 " >
                        <input id="funcionarioslicencia"  name="funcionarioslicencia" style="width: 100%;"  required validationMessage="Por favor Introduzca el numero de documento"/>
                    </div>
                    <div class="span4 " >
                         <input style="width:100%;" id="idausencia" name="idausencia" required validationMessage="Escoja el tipo de permiso">
                    </div>
                     <div class="span2" > 
                    </div>      
                </div> 
                <div class="row-fluid form" >  
                     <div class="span2" > 
                    </div>      
                    <div class="span1" > 
                        Desde: 
                     </div>
                     <div class="span3" > 
                         <input id="fechadesde" type="date" name="fechadesde" style="width:100%"> <br>
                         <center><input type="hidden" name="hiddenfechadesde" id="hiddenfechadesde" data-datedesde data-required-msg="Ingrese le fecha desde" /></center>
                     </div>
                    <div class="span1 " >
                       Hasta:
                    </div>
                    <div class="span3" > 
                        <input id="fechahasta" type="date" name="fechahasta" style="width:100%"> <br>
                        <center><input type="hidden" name="hiddenfechahasta" id="hiddenfechahasta" data-datehasta data-required-msg="Ingrese le fecha hasta" /></center>
                    </div>
                     <div class="span2" > 
                    </div>      
                </div> 
                <div class="row-fluid form" > 
                     <div class="span2" > 
                    </div> 
                    <div class="span8" > 
                        <textarea id="motivolicencia" name="motivolicencia" class="k-textbox "  style="width:100%" required placeholder="Ingrese el motivo de la licencia."
                                  validationMessage="Ingrese el motivo de la licencia"></textarea>
                    </div>
                     <div class="span2" > 
                    </div> 
                </div>
            </form>
            <div class="row-fluid form" > 
                 <div class="span4" > 
                </div> 
                <div class="span2" > 
                    <input id="cancelarlicencia" type="button"  value="Cancelar" class="k-primary" style="width:100%"/> 
                </div>                
                <div class="span2" > 
                    <input id="aceptarlicencia" type="button"  value="Aceptar" class="k-primary" style="width:100%"/> 
                </div>
                 <div class="span4" > 
                </div>                 
            </div>
        </div>
    </div> 
</div>
 {include file="avisos/firmaDigital.tpl"} 
{*<div class="row-fluid fadein"  id="firmaausencia" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header"><div class="titulo">Firma Digital de Asignaci&oacute;n de Permisos</div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, apruebo el permiso/licencia del funcionario/a <span id="nombrefuncionariopermiso" class="letrarelevante"></span>.</p> 

                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmaaucencia" id="formfirmaaucencia" method="post"  action="index.php" >
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                       class="k-textbox " placeholder="Pin" name="pinfirmaaucencia"  id="pinfirmaaucencia" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmaraucencia /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="cancelafirmaaucencia" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="firmaraucencia" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                     </div> 
                     <div class="span3 hidden-phone" >
                     </div>
                    <div class="span1 " >
                        <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('firmaDigital')" style="max-width:35px;" class="ayuda">
                    </div>
                 </div> 
            </form> 
        </div>   
     </div>              
</div*}
<script> 
{literal}    
$("#funcionarioslicencia").kendoComboBox({
     placeholder:"Escoja un Funcionario",
    filter:"startswith",
    dataTextField: "nombres",
    dataValueField: "id_persona",
    headerTemplate: '<div class="dropdown-header">' +
            '<span class="k-widget k-header">Foto</span>' +
            '<span class="k-widget k-header">Personal</span>' +
        '</div>',
    template: "<span class='k-state-default'><img src='styles/img/personal/"+
                "#: data.id_persona #"+"."+"#: data.formato_imagen #'"+
                " onError='this.onerror=null;imgendefectopersona(this);'/></span>" +
                "<span class='k-state-default'>#: data.nombres #<p>#: data.numero_documento #</p></span>",
    dataSource: {
        transport: {
            read: {
                dataType: "json",
                url: "index.php?opcion=admPersona&tarea=funcionariosSenavex"
            }
        }
    },
    change : function (e) {
        if (this.value() && this.selectedIndex == -1)
        { 
            funcionarioslicencia.text(''); 
        }
    }
});
var funcionarioslicencia = $("#funcionarioslicencia").data("kendoComboBox");
{/literal}
//--------------combo--------------------------
$("#idausencia").kendoComboBox(
    {   placeholder:"Escoja el tipo de permiso",
        dataTextField: "tipoausencia",
        dataValueField: "Id",
        dataSource: [
        {foreach $ausencias as $ausencia} 
        { tipoausencia: "{$ausencia->descripcion}", Id: {$ausencia->id_tipo_ausencia}},
        {/foreach}
        ],
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) {                     
               this.text('');
            }
        }
});
//-----------------para las fechas-------------------}
var today = kendo.date.today();
var start = $("#fechadesde").kendoDateTimePicker({
    value: today,
    change: startChange,
   // parseFormats: ["dd/MM/yyyy"],
    format: "dd/MM/yyyy HH:mm",
    timeFormat: "HH:mm" 
}).data("kendoDateTimePicker");

var end = $("#fechahasta").kendoDateTimePicker({
    change: endChange,
   // parseFormats: ["dd/MM/yyyy"],
    format: "dd/MM/yyyy HH:mm",
    timeFormat: "HH:mm"
}).data("kendoDateTimePicker");

start.max(end.value());
end.min(start.value());
function startChange() {
    var startDate = start.value(),
    endDate = end.value();

    if (startDate) {
        startDate = new Date(startDate);
        startDate.setDate(startDate.getDate());
        end.min(startDate);
    } else if (endDate) {
        start.max(new Date(endDate));
    } else {
        endDate = new Date();
        start.max(endDate);
        end.min(endDate);
    }
}

function endChange() {
    var endDate = end.value(),
    startDate = start.value();

    if (endDate) {
        endDate = new Date(endDate);
        endDate.setDate(endDate.getDate());
        start.max(endDate);
    } else if (startDate) {
        end.min(new Date(startDate));
    } else {
        endDate = new Date();
        start.max(endDate);
        end.min(endDate);
    }
}
//---------------------------------para los botones----------------------------------
$("#cancelarlicencia").kendoButton();
var cancelarlicencia = $("#cancelarlicencia").data("kendoButton");
cancelarlicencia.bind("click", function(e){ 
    remover(tabStrip.select());
}); 
$("#aceptarlicencia").kendoButton();
var aceptarlicencia = $("#aceptarlicencia").data("kendoButton");
aceptarlicencia.bind("click", function(e){ 
    if(ausenciavalidator.validate())
    {      
        /*$("#nombrefuncionariopermiso").html(funcionarioslicencia.text());
        cambiar('registroausencia','firmaausencia');
        generarPin('{$id_empresa}','{$id_persona}','12');  */
        
        cambiar('registroausencia','firmadigital{$id}');
        generarPin('{$id_empresa}','{$id_persona}','12');   
        cambiarRedaccionFirma{$id}(12,'de Asignaci&oacute;n de Permisos',' apruebo el permiso/licencia del funcionario/a '+funcionarioslicencia.text()); 

    }
}); 
//---------------------------para el validador----------------------------------------
var ausenciavalidator = $("#ausenciaform").kendoValidator({
    rules:{  
        datedesde: function(input) {
            var date = input.data('datedesde');
            if(typeof date !== 'undefined' && date !== false)
            {
                if(start.value())
                 {   
                     
                     return true
                 }
                 else
                 { 
                     return false
                 }
            }
            return true
        },
        datehasta: function(input) {
            var date = input.data('datehasta');
            if(typeof date !== 'undefined' && date !== false)
            {
                if(end.value())
                 {   
                     
                     return true
                 }
                 else
                 { 
                     return false
                 }
            }
            return true
        }
       
    },
   messages:{
       datedesde: 'Ingrese una fecha',
       datehasta: 'Ingrese una fecha'
    }
}).data("kendoValidator");
//---------------para la firma----------------------------------------------
/*
ocultar('firmaausencia');
$("#cancelafirmaaucencia").kendoButton();
$("#firmaraucencia").kendoButton();
var cancelarfirmaaucencia = $("#cancelafirmaaucencia").data("kendoButton");
var firmaraucencia = $("#firmaraucencia").data("kendoButton");
cancelarfirmaaucencia.bind("click", function(e){  
    cambiar('firmaausencia','registroausencia');
    borrarPin('{$nombre}');
});
firmaraucencia.bind("click", function(e){  
    if(formfirmaaucencia.validate())
    {
        $.ajax({             
        type: 'post',
        url: 'index.php',
        data: $('#ausenciaform').serialize()+'&idpersonafirma={$id_persona}',
        success: function (data) {
	//alert(data);
            var respuesta = eval('('+data+')');
            if(respuesta[0].suceso=='0')
            {
                firmarPin('Permisos y Licencias','admAdministrativa','permisos','{$nombre}',respuesta[0].id_ausencia);
            } 
            else
            {
                alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
            }
        }
        });
    }
});     
//-----------esto es para la valicdacion del pin****************************************
var swfirmaraucencia=2;        
var firmaaucenciacache='';
var formfirmaaucencia = $("#formfirmaaucencia").kendoValidator({
   rules:{ 
       firmaraucencia: function(input) { 
         var validate = input.data('firmaraucencia');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmaaucenciacache !== $("#pinfirmaaucencia").val()) 
                {
                    verificarPinAucencia($("#pinfirmaaucencia").val());                    
                    return false;
                }
                if(swfirmaaucencia==1)
                {
                    return true;
                }
                if(swfirmaaucencia==0)
                {  
                    return false;
                }  
                return false;
            }

           return true;
       }
   },
   messages:{
        firmaraucencia: function(input) { 
            if(swfirmaaucencia==0)
            {  
              return 'El Pin no es Correcto';
            }
            else
            {    
              return 'Revisando..';
            }
         }
   }
   }).data("kendoValidator");
   function verificarPinAucencia(pin_insertado)
    {
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
            success: function (data) {    
                swfirmaaucencia=data;
               firmaaucenciacache=$("#pinfirmaaucencia").val();
               formfirmaaucencia.validateInput($("#pinfirmaaucencia"));
             }
        }); 
    }*/
</script>
       