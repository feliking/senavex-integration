<div class="row-fluid" >
    <div class="span1 hidden-phone" ></div>
    <div class="span10" id="formulario" >
        <form name="formcafe" id="formcafe" method="post"  action="index.php">
            <input type="hidden" name="opcion" id="opcion" value="admCafe" />
            <input type="hidden" name="tarea" id="tarea" value="certificadoCafe" />    

            <div class="k-block fadein">
                <div class="k-header"><div class="titulo">Certificado de Origen - Cafe</div></div>
                <div class="k-cuerpo"> 

                    <div class="row-fluid form" >
                        <div class="span8 " >
                            <input style="width:100%;" id="idimportador" name="idimportador" required="true" validationMessage="Seleccione el Importador"/>    
                        </div>
                    </div>
                    <div class="row-fluid form" >
                         <div class="span5 " >
                             <textarea rows="3" cols="50" class="k-textbox " placeholder="direccion para notificaciones" name="dir_notyn" id="dir_notyn"></textarea>
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="span3 " >
                            <input style="width:100%;" id="idpais" name="idpais" required="true" validationMessage="Por favor escoja el pais">    
                        </div>
                        <div class="span3 " >
                            <input style="width:100%;" id="idpuerto" name="idpuerto" required="true" validationMessage="Puerto de Embarque">    
                        </div>
                        <div class="span3 " >
                            <input style="width:100%;" id="idpaisproductor" name="idpaisproductor" required="true" validationMessage="Pais Productor">    
                        </div>
                        <div class="span3 " >
                            <input style="width:100%;" id="idpaisdestino" name="idpaisdestino" required="true" validationMessage="Pais Destino">    
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div> 

                    <div class="row-fluid form" >
                        <div class="span2 " >
                            <label  name="fecha_texto" id="fecha_texto" >Fecha de Exportación </label>   
                        </div> 
                        <div class="span3 " >
                            <input type="date"  class="k-textbox " placeholder="7.fecha Exportacion" name="fecha_exp" id="fecha_exp" required validationMessage="ingrese fecha de exportacion"/>   
                        </div> 
                        <div class="span3 " >
                            <input style="width:100%;" id="idpaistransbordo" name="idpaistransbordo" required="true" validationMessage="Pais Transbordo">
                        </div>
                        <div class="span4 " >
                            <input style="width:100%;" id="idmediotransporte" name="idmediotransporte" required="true" validationMessage="Medio Transporte">
                        </div>


                    </div>
                    <div class="row-fluid form" >
                         <div class="span5 " >
                             <textarea rows="3" cols="50" class="k-textbox " placeholder="Otras Marcas" name="otras_marcas" id="otras_marcas"></textarea>
                        </div>
                         <!--div class="span4 " >
                            <input style="width:100%;" id="idtipoembalaje" name="idtipoembalaje" required validationMessage="Tipo Embalaje">
                        </div-->

                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" ></div> 
                    </div> 
                    <div class="row-fluid form" >
                        <div class="span3 fadein" >
                            <b><div class="radio">11.Cargados </div> </b>
                            <div class="radio"><input type="radio" name="cargados" value="1" id="cargados" data-radio required validationMessage="Seleccione una opcion Porfavor">En sacos</div> 
                            <div class="radio"><input type="radio" name="cargados" value="2" id="cargados" data-radio >A granel</div>  
                            <div class="radio"><input type="radio" name="cargados" value="3" id="cargados" data-radio >En contenedores</div>   
                            <div class="radio"><input type="radio" name="cargados" value="4" id="cargados" data-radio >Otros</div>  

                        </div>
                        <div class="span2 " >
                            <input type="text" class="k-textbox " placeholder="12. Peso Neto" name="peso_neto" id="peso_neto"   required validationMessage="ingrese el peso neto, 5 digitos"/>   
                        </div> 

                         <div class="span3 fadein" >
                             <b><div class="radio">13.Unidad de Peso </div> </b>
                            <div class="radio"><input type="radio" name="u_peso" value="1" id="u_peso" data-radio required >Kg</div> 
                            <div class="radio"><input type="radio" name="u_peso" value="2" id="u_peso" data-radio >Lb</div>  
                        </div>
                        <div class="span3 " >
                            <input style="text" id="iddescripcion" name="iddescripcion" required validationMessage="Tipo Cafe">
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" ></div> 
                    </div> 
                    <div class="row-fluid form" >
                        <div class="span7 parametro" >
                            <b><label>15.Método de Elaboración </label>   </b>
                        </div> 
                    </div> 
                    <div class="row-fluid form" >
                        <div class="span3 fadein" >
                            <b><div class="radio">Decafeinado </div> </b>
                            <div class="radio"><input type="checkbox" name="decafeinado" value="1" id="decafeinado" >Descafeinado</div> 
                        </div>

                        <div class="span3 fadein" >
                            <b><div class="radio">Organico </div> </b>
                            <div class="radio"><input type="radio" name="organico" value="3" id="organico" data-radio required validationMessage="Seleccione una opcion Porfavor">Certificado</div>  
                            <div class="radio"><input type="radio" name="organico" value="4" id="organico" data-radio >No Certificado</div>   
                        </div>

                        <div class="span3 fadein" >
                            <b><div class="radio">Cafe verde</div> </b>
                            <div class="radio"><input type="radio" name="cafe_v" value="6" id="cafe_v" data-radio >Via Seca</div>
                            <div class="radio"><input type="radio" name="cafe_v" value="7" id="cafe_v" data-radio >Via Humeda</div>
                        </div>

                        <div class="span3 fadein" >
                            <b><div class="radio">Café Soluble</div> </b>
                            <div class="radio"><input type="radio" name="cafe_s" value="9" id="cafe_s" data-radio >Centrifugado</div>
                            <div class="radio"><input type="radio" name="cafe_s" value="10" id="cafe_s" data-radio >Liofilizado</div>
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" > </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="span12" >
                            <b><label>Otra información pertinente:ICC Resolución Número 420; Caracteristicas especiales; Código del SA; Valor del Embarque(informacion Voluntaria)</label>   </b>
                        </div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" > </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="span12 campo" >
                            <b><label>a.Normas Optimas de calidad del café verde (ICC Resolución Número 420</label>   </b>
                        </div> 
                    </div> 
                    <div class="row-fluid form" >

                        <div class="span6 fadein" >
                            <b><div class="radio"> </div> </b>
                            <div class="radio"><input type="radio" name="normas" value="1" id="normas" data-radio required>"S":Plena Observancia de las normas optimas sobre defectos y humedad</div>  
                        </div>

                        <div class="span6 fadein" >

                            <div class="radio"><input type="radio" name="normas" value="2" id="normas" data-radio >"XD":El café no responde a las normas óptimas sobre defectos</div>   
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="span6 fadein" >

                            <div class="radio"><input type="radio" name="normas" value="3" id="normas" data-radio >"XM":El Café no responde a las normas óptimas sobre humedad</div>   

                        </div>
                        <div class="span6 fadein" >

                            <div class="radio"><input type="radio" name="normas" value="4" id="normas" data-radio >"XDM":El café no responde a ninguna de las normas óptimas (ni la referente a defectos ni la referente a humedad</div>   

                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" ></div> 
                    </div> 
                    <div class="row-fluid form" >
                        <div class="span5" >
                            <b><label>b.Caracteristicas especiales nombre o codigo</label></b>
                        </div>
                        <div class="span6 " >
                            <input style="width:100%;" id="idcespecial" name="idcespecial" required validationMessage="Caracteristica Especial">
                        </div>

                    </div> 
                    <div class="row-fluid form" >
                        <div class="barra" ></div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="span4" >
                            <b><label>c.Codigo del Sistema Armonizado</label>   </b>
                        </div>
                        <div class="span8 " >
                            <input style="width:100%;" id="idsistemaarmonizado" name="idsistemaarmonizado" required validationMessage="Sistema Armonizado">
                        </div>
                    </div> 
                    <div class="row-fluid form" >
                        <div class="span3 fadein" >
                            <b><div class="radio">Tipo de Moneda</div> </b>
                            <div class="radio"><input type="radio" name="idmoneda" value="2" id="idmoneda" data-radio required>Euros</div>      
                            <div class="radio"><input type="radio" name="idmoneda" value="1" id="idmoneda" data-radio required>Dólares EE.UU</div>   
                            <div class="radio"><input type="radio" name="idmoneda" value="0" id="idmoneda" data-radio required>Moneda Nacional</div>

                        </div>
                         <div class="span4" >
                            <b><label>d.Valor FOB del Embarque</label>   </b>
                        </div>

                        <div class="span3 " >
                            <input type="text" class="k-textbox "  placeholder="Valor FOB" name="v_fob" id="v_fob" required validationMessage="Por favor Ingrese una direccion"/>
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" ></div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="span5 " >
                             <textarea rows="3" cols="100" class="k-textbox " placeholder="Informacion Adicional" name="info_adicional" id="info_adicional"></textarea>
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="span3 hidden-phone" ></div>
                        <div class="span3 hidden-phone" ></div>
                        <div class="span2 " >

                            <input id="cccancelar" name="cccancelar" type="button"  value= "Cancelar" class="k-primary" style="width:100%"/>
                        </div> 
                        <div class="span2 " >
                            <input id="ccaceptar" name="ccaceptar" type="button"  value= "Aceptar" class="k-primary" style="width:100%"/>
                            <!--a target="_blank" href="index.php?opcion=admCafe&tarea=certificadoPDF" class="k-button link">Aceptar</a-->
                        </div> 
                    </div>
                </div>
            </div> 
        </form> 
    </div>

</div>
<div class="row-fluid fadein"  id="firmarCafe" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header">
                <div class="titulo">Firma Digital de Depositos</div>
            </div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico que la empresa <span class="letrarelevante">"{$empresa_temporal->razon_social}"</span> 
                        con <span class="letrarelevante">RUEX: BO{$empresa_temporal->ruex}</span>.</p> 
                    <p> Por consiguiente doy fe que los depositos son correctos.</p> 

                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmaCafe" id="formfirmaCafe" method="post"  action="index.php" >
                <!--input type="hidden" name="opcion" id="opcion" value="admDeposito" />
                <input type="hidden" name="tarea" id="tarea" value="registrarDeposito" /-->
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                       class="k-textbox " placeholder="Pin" name="pinfirmarcafe"  id="pinfirmarcafe" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmarruex /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="bcancelafirmacafe" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="bfirmarcafe" type="button"  value="Firmar OIC" class="k-primary" style="width:100%"/>
                     </div> 
                     <div class="span4 hidden-phone" >

                     </div>

                 </div> 
            </form> 
        </div>   
    </div>              
</div>
<div class="row-fluid " id="avisook">
    <div class="span12" >
        <div class="row-fluid" >
            <div class="span1 hidden-phone" >
            </div>
            <div class="span10">

                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" >REGISTRO EXITOSO </div>  
                            </div>                                      
                        </div>  
                    </div>
                    <!--div class="k-header k-headerrojo"><div class="tituloblanco"></div></div-->
                    <div class="k-cuerpo">  
                        <div class="row-fluid  form" >
                               <div class="span1 hidden-phone" ></div>
                               <div class="span10" >
                                   <h2> Se a realizado exitosamente el registro de su(s) Deposito(s), porfavor esperar la confirmacion y validacion </h2>
                                   <h3>Datos de su(s) Deposito(s) </h3>
                                    <p> Empresa :{$empresa}</p>
                                    <span id="respfact"></span>
                                </div>  
                               <div class="span1 hidden-phone" ></div>
                        </div> 
                    </div>   
                </div>
            </div>
            <div class="span1 hidden-phone" > </div>
        </div>
    </div> 
</div>  
<script>
ocultar("firmarCafe");
ocultar("avisook");

$("#ccaceptar").kendoButton();
$("#cccancelar").kendoButton();

formcafe= $("#formcafe").kendoValidator({});
var aceptar = $("#ccaceptar").data("kendoButton");
var cancelar = $("#cccancelar").data("kendoButton"); 

aceptar.bind("click",function(e){
    $("#formcafe").validate({
        rules: {
            idpais: { required: true},
           
        },
        messages: {
            idpais: "Debe introducir su nombre.",
        },
        submitHandler: function(form){
            var dataString = "?opcion=admCafe&tarea=prueba";
            $.ajax({
                type:"POST",
                url:"index.php",
                data: dataString,
                success: function(data){
                    alert(data);
                }
            });
        }
    });
    cambiar('formulario','firmarCafe');
    generarPin('{$id_empresa}','{$id_persona}','1');  
});

cancelar.bind("click", function(e){  
    remover(tabStrip.select());
});
/*****************************************************************************************/

$("#bcancelafirmacafe").kendoButton();
$("#bfirmarcafe").kendoButton();
var bcancelafirmacafe = $("#bcancelafirmacafe").data("kendoButton");
bcancelafirmacafe.bind("click", function(e){
    //ocultar("firmarCafe");
    cambiar('avisook','formulario');
    borrarPin('{$nombre}');
});

var bfirmarcafe = $("#bfirmarcafe").data("kendoButton");
bfirmarcafe.bind("click", function(e){   
    cambiar('firmarCafe','avisook');
    var datos=$('#formcafe').serialize();
    //alert(datos);
    $.ajax({
        type: 'post',
        url: 'index.php',
        data: datos,
        success: function (data) {
            //var respuesta = eval('('+data+')');
            window.open("index.php?opcion=admCafe&tarea=certificadoPDF", 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
            
            //cerraractualizartab("Cafe Certificado",'admCafe','certificadoCafe');
        }
    }); 
  
});
/***************************************************************************/
    var swfirmaCafe=2;        
    var firmaCafecache='';
    var formfirmaCafe = $("#firmarCafe").kendoValidator({
       rules:{ 
           formfirmaCafe: function(input) { 
             var validate = input.data('bfirmarcafe');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    if (firmaCafecache !== $("#pinfirmarCafe").val()) 
                     {
                    verificarPinCafe($("#pinfirmarCafe").val());                    
                    return false;
                    }
                    if(swfirmaCafe==1)
                    {
                         return true;
                    }
                    if(swfirmaCafe==0)
                    {  
                        return false;
                    }  
                    return false;
                }
               
               return true;
           }
       },
       messages:{
            formfirmaCafe: function(input) { 
                if(swfirmaCafe==0)
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
       function verificarPinCafe(pin_insertado)
        {
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
                success: function (data) {    
                    swfirmaCafe=data;
                   firmaCafecache=$("#pinfirmarCafe").val();
                   formfirmaCafe.validateInput($("#pinfirmarCafe"));
                 }
            }); 
        }
//************************************************************************/
//************************************************************************/
//************************************************************************/
//************************************************************************/
//************************************************************************/
//************************************************************************/

$("#idimportador").kendoComboBox(
   {   placeholder:"Seleccione el Importador",
       ignoreCase: true,
       dataTextField: "value",
       dataValueField: "Id",
       dataSource: [
       {foreach $lista_importador as $pais} 
            { value: "{$pais->getNombre()}", Id: {$pais->getId_cafe_importador()}},
       {/foreach}  
       ],
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
var pais = $("#idimportador").data("kendoComboBox");
//************************************************************************/
$("#idpais").kendoComboBox(
   {   placeholder:"Seleccione El pais",
       ignoreCase: true,
       dataTextField: "value",
       dataValueField: "Id",
       dataSource: [
       {foreach $lista_paises_I as $pais} 
            { value: "{$pais->getNombre()}", Id: {$pais->getId_cafe_pais()}},
       {/foreach}  
       ],
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
var pais = $("#idpais").data("kendoComboBox");
//************************************************************************/
$("#idpuerto").kendoComboBox(
   {   placeholder:"Puerto de Embarque",
       ignoreCase: true,
       dataTextField: "value",
       dataValueField: "Id",
       dataSource: [
       {foreach $lista_puerto as $value} 
            { value: "{$value->getDescripcion()}", Id: {$value->getId_cafe_puerto()}},
       {/foreach}  
       ],
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
var puerto = $("#idpuerto").data("kendoComboBox");
//************************************************************************/
$("#idpaisproductor").kendoComboBox(
   {   placeholder:"Pais Productor",
       ignoreCase: true,
       dataTextField: "value",
       dataValueField: "Id",
       dataSource: [
       {foreach $lista_paises_I as $value} 
            { value: "{$value->getNombre()}", Id: {$value->getId_cafe_pais()}},
       {/foreach}  
       ],
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
var paisproductor = $("#idpaisproductor").data("kendoComboBox");
//************************************************************************/
$("#idpaisdestino").kendoComboBox(
   {   placeholder:"Pais Destino",
       ignoreCase: true,
       dataTextField: "value",
       dataValueField: "Id",
       dataSource: [
       {foreach $lista_paises_III as $value} 
            { value: "{$value->getDescripcion()}", Id: {$value->getId_cafe_pais_destino_transbordo()}},
       {/foreach}  
       ],
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
var paisdestino = $("#idpaisdestino").data("kendoComboBox");
//************************************************************************/
$("#idpaistransbordo").kendoComboBox(
   {   placeholder:"Pais Transbordo",
       ignoreCase: true,
       dataTextField: "value",
       dataValueField: "Id",
       dataSource: [
       {foreach $lista_paises_III as $value} 
            { value: "{$value->getDescripcion()}", Id: {$value->getId_cafe_pais_destino_transbordo()}},
       {/foreach}  
       ],
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
var paistransbordo = $("#idpaistransbordo").data("kendoComboBox");
//************************************************************************/

$("#idmediotransporte").kendoComboBox(
   {   placeholder:"Medio Transporte",
       ignoreCase: true,
       dataTextField: "value",
       dataValueField: "Id",
       dataSource: [
       {foreach $lista_medio_transporte as $value} 
            { value: "{$value->getDescripcion()}", Id: {$value->getId_cafe_medio_transporte()}},
       {/foreach}  
       ],
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
var mediotransporte = $("#idmediotransporte").data("kendoComboBox");
//************************************************************************/
$("#idsistemaarmonizado").kendoComboBox(
   {   placeholder:"Sistema Armonizado",
       ignoreCase: true,
       dataTextField: "value",
       dataValueField: "Id",
       dataSource: [
       {foreach $lista_sistemaarmonizado as $value}
            { value: "{$value->getDescripcion()}", Id: {$value->getId_cafe_sistema_armonizado()}},
       {/foreach}  
       ],
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
var sistemaarmonizado = $("#idsistemaarmonizado").data("kendoComboBox");
//************************************************************************/
$("#idtipoembalaje").kendoComboBox(
   {   placeholder:"Tipo Embalaje",
       ignoreCase: true,
       dataTextField: "value",
       dataValueField: "Id",
       dataSource: [
       {foreach $lista_tipo_embalaje as $value} 
            { value: "{$value->getDescripcion()}", Id: {$value->getId_cafe_tipo_embalaje()}},
       {/foreach}  
       ],
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
var tipoembalaje = $("#idtipoembalaje").data("kendoComboBox");
//************************************************************************/
$("#iddescripcion").kendoComboBox(
   {   placeholder:"Tipo Cafe",
       ignoreCase: true,
       dataTextField: "value",
       dataValueField: "Id",
       dataSource: [
       {foreach $lista_descripcion as $value} 
            { value: "{$value->getDescripcion()}", Id: {$value->getId_cafe_descripcion()}},
       {/foreach}  
       ],
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
var descripcion = $("#iddescripcion").data("kendoComboBox");
//************************************************************************/
$("#idcespecial").kendoComboBox(
   {   placeholder:"Caracteristica del Café",
       ignoreCase: true,
       dataTextField: "value",
       dataValueField: "Id",
       dataSource: [
       {foreach $lista_cespeciales as $value} 
            { value: "{$value->getDescripcion()}", Id: {$value->getId_cafe_cespecial()}},
       {/foreach}  
       ],
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
var descripcion = $("#idcespecial").data("kendoComboBox");
//************************************************************************/
    var swfirmaCafe=2;        
    var firmaCafecache='';
    var formfirmaCafe = $("#formfirmaCafe").kendoValidator({
       rules:{ 
           formfirmaCafe: function(input) { 
             var validate = input.data('bfirmarCafe');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    if (firmaCafecache !== $("#pinfirmarCafe").val()) 
                     {
                    verificarPinCafe($("#pinfirmarCafe").val());                    
                    return false;
                    }
                    if(swfirmaCafe==1)
                    {
                         return true;
                    }
                    if(swfirmaCafe==0)
                    {  
                        return false;
                    }  
                    return false;
                }
               
               return true;
           }
       },
       messages:{
            formfirmaCafe: function(input) { 
                if(swfirmaCafe==0)
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
       function verificarPinCafe(pin_insertado)
        {
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
                success: function (data) {    
                   swfirmaCafe=data;
                   firmaCafecache=$("#pinfirmarCafe").val();
                   formfirmaCafe.validateInput($("#pinfirmarCafe"));
                 }
            }); 
        }
</script>
