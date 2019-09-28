<div class="row-fluid  form" >
    <div class="row-fluid "  id="mostrarfacturamanual_imp" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" id="titulofactura_imp" name="titulofactura_imp" >Facturar Servicios Importacion- {$fmsucursalnombre_imp}</div>  
                        </div>                                      
                    </div>  
                </div>
                <div class="row-fluid  form" >
                    <div class="span1 hidden-phone" ></div>
                    <div class="span4 parametro" >
                        <center><b>Servicio</b></center>
                    </div> 
                    
                    <div class="span3 parametro" >
                        <center><b>Detalle</b></center>
                    </div> 
                    <div class="span3 parametro" >
                        <center><b>SubTotal</b></center>
                    </div>
                </div>
                
                <form name="formfacturamanual_imp" id="formfacturamanual_imp" method="post"  action="index.php"> 
                    
                    <input type="hidden" name="fmsucursal_imp" id="fmsucursal_imp" value="{$fmsucursal_imp}" />
                    <input type="hidden" name="opcion" id="opcion" value="admProForma" />
                    <!input type="hidden" name="tarea" id="tarea" value="peba" />
                    <input type="hidden" name="tarea" id="tarea" value="generar_factura_manual_import" /> 
                   
                    
                    <div id="gral_imp" name="gral_imp">
                      
                    </div>
                    <div class="row-fluid form" >
                        <div class="span10 hidden-phone" ></div>
                        <div class="span1" >
                            <img src="styles/img/add.png" id="cagregar_imp"  onclick="agregar_imp(true)" height="28" width="28">
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div>         
                    <div class="row-fluid  form" >
                        <input type="hidden" id="empresa_id_imp" name="empresa_id_imp" value="">
                        <div class="span2 hidden-phone"  ></div>
                        <div class="span2" >
                            <b>NIT de la empresa :</b>
                        </div>     
                        
                        <div class="span2" >
                            {literal}
                            <input type="text" class="k-textbox" name="nit_imp" id="nit_imp" value="" pattern="[1-9][0-9]{2,}" placeholder="Ingrese NIT/CI"  required validationMessage="Ingrese NIT/CI de la empresa a facturar"/>
                            {/literal}
                        </div>  
                        <div class="span5 campo" id="empresa_texto_imp">

                        </div>
                    </div>
                    
                    <!--div class="row-fluid  form" >
                        <div class="span2 hidden-phone"  ></div>
                        <div class="span2" >
                            <b>Empresa/Persona:</b>
                        </div>     
                        
                    </div-->   
                    <div class="row-fluid  form" >
                        <input type="hidden" id="persona_id_imp" name="persona_id_imp" value="0">
                        <div class="span2 hidden-phone" ></div>
                        <div class="span2" >
                            <b>C.I. Persona de Recojo :</b>
                        </div>     
                        <div class="span2" >
                            <input type="text" class="k-textbox" name="ci_imp" id="ci_imp" value="" required validationMessage="Seleccione una persona autorizada por la empresa" placeholder="Personal Autorizado" />
                        </div>
                        <div class="span5 campo" id="persona_texto_imp" >
                            
                        </div>  
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div>   
                    <div class="row-fluid  form" >
                        
                        <div class="span12">
                            <input type="checkbox" name="chx_fmcontingencia_imp" id="chx_fmcontingencia_imp" onchange="contingencia_imp()">Factura Manual en Contingencia
                        </div>  
                    </div> 
                    <div class="row-fluid  form" id="div_contingencia_imp" >
                        
                        <div class="span2 hidden-phone"></div>
                        <div class="span2 ">
                            <input type="text" class="k-textbox" name="fmc_nro_imp" id="fmc_nro_imp" value=""  validationMessage="Ingrese Nro de Factura" placeholder="Nro de Factura" />
                        </div>
                        <div class="span2 ">
                            <input type="date" class="k-textbox" name="fmc_fecha_imp" id="fmc_fecha_imp" value=""  validationMessage="Ingrese Fecha de la Factura" placeholder="Fecha Emisión" />
                        </div>
                        <div class="span2 ">
                            <input type="date" class="k-textbox" name="fmc_fecha_limite_imp" id="fmc_fecha_limite_imp" value=""  validationMessage="Ingrese Fecha limite de la Factura" placeholder="Fecha Limite" />
                        </div>
                        <div class="span2 ">
                            <input type="number" min="100000000000" class="k-textbox" name="fmc_autorizacion_imp" id="fmc_autorizacion_imp" value=""  validationMessage="Ingrese Nro de Autorización" placeholder="Nro Autorización" />
                        </div>
                    </div> 
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div>   
                    <div class="row-fluid  form" >
                        <div class="span7 hidden-phone"></div>
                        <div class="span2 "  >
                            <b> Total a Facturar</b>
                        </div>     
                        <div class="span2 campo">
                            <input type="hidden" name="total-depositos" id="total-depositos" value="0"  />
                            <input type="hidden" id="total_facturar" name="total_facturar" value="0"> 
                            <center><label name="total_imp" id="total_imp">Bs. 0</label></center>
                        </div> 
                    </div>
                    <div class="row-fluid  form">
                        <div class="span5 hidden-phone"></div>
                         <div class="span2 hidden-phone" >
                            <input id="cerrar_facturar_imp" type="hidden"  value= "Prueba" class="k-primary" style="width:100%"/>
                        </div> 
                        <div class="span2"> 
                            <input id="ver_depositos_imp" type="button"  value= "Depositos" class="k-primary" style="width:100%"/>
                        </div>
                        <div class="span2">
                            <input id="facturar_imp" type="button"  value= "Facturar" class="k-primary" style="width:100%"/>
                        </div>
                       
                    </div
                    
                </form> 
            </div>
        </div>
    </div>
    <div></div>
    <div class="row-fluid fadein"  id="firmarfacturamanual_imp" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="k-header">
                    <div class="titulo">Firma Digital</div>
                </div>
            </div>
            <div class="k-cuerpo"> 
                <div class="row-fluid  form" >
                    <div class="span1" > </div>
                    <div class="span10" >
                        <p> Transacción realizada por: <span class="letrarelevante">{$nombrecompleto}</span>, </p>
                        <p>Autorizada por la entidad: <span class="letrarelevante">"{$empresa}"</span> </p> 

                    </div>  
                    <div class="span1" ></div>
                </div> 
                <form name="formfirmafacturamanual_imp" id="formfirmafacturamanual_imp" method="post"  action="index.php" >
                    <!--input type="hidden" name="opcion" id="opcion" value="admDeposito" />
                    <input type="hidden" name="tarea" id="tarea" value="registrarDeposito" /-->
                    <div class="row-fluid  form" >
                        <div class="span5" ></div>
                        <div class="span2" >
                            <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                           class="k-textbox " placeholder="Pin" name="pinfirmarfacturamanual_imp"  id="pinfirmarfacturamanual_imp," maxlength="4" size="4" style="width:50px;"
                           required data-required-msg="Por favor ingrese su Pin." data-firmarproforma /> 
                        </div>  
                        <div class="span5" ></div>
                    </div>  
                    <div class="row-fluid  form" >
                        <div class="span4 hidden-phone" >
                        </div>
                        <div class="span2 " >
                            <input id="bcancelarfirmafacturamanual_imp" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                        </div> 
                        <div class="span2 " >
                            <input id="baceptarfirmafacturamanual_imp" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                        </div> 
                        <div class="span4 hidden-phone" >

                        </div>

                    </div> 
                </form> 
            </div>   
        </div>              
    </div>
    <div class="row-fluid fadein" id="formfmsucursal_imp">
        <div class="span12" >
            <div class="row-fluid" >
                <div class="span1 hidden-phone" ></div>
                <div class="span10">

                    <div class="k-block fadein">
                        <div class="k-header">
                            <div class="row-fluid  form" >
                                <div class="span12" >
                                    <div class="titulo" >Regional</div>  
                                </div>                                      
                            </div>  
                        </div>
                        
                        <div class="k-cuerpo">  
                            <div class="row-fluid  form" >
                                <div class="span1 hidden-phone" ></div>
                                <div class="span10" >
                                    <h2> Seleccione Regional </h2>
                                 </div>
                            </div>
                            <div class="row-fluid  form" >
                                <div class="span4 hidden-phone" ></div>
                                <div class="span4" >
                                    <input style="width:100%;" id="sucursal_imp" name="sucursal_imp" required validationMessage="Seleccione una Regional"/>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="span1 hidden-phone" > </div>
            </div>
        </div>
    </div>
    <div class="row-fluid fadein" id="avisook_imp">
        <div class="span12" >
            <div class="row-fluid" >
                <div class="span1 hidden-phone" >
                </div>
                <div class="span10">

                    <div class="k-block fadein">
                        <div class="k-header">
                            <div class="row-fluid  form" >
                                <div class="span12" >
                                    <div class="titulo" >TRANSACCIÓN REALIZADA CON ÉXITO</div>  
                                </div>                                      
                            </div>  
                        </div>
                        <!--div class="k-header k-headerrojo"><div class="tituloblanco"></div></div-->
                        <div class="k-cuerpo">  
                            <div class="row-fluid  form" >
                                   <div class="span1 hidden-phone" ></div>
                                   <div class="span10" >
                                       <h2> Se ha Generado la Factura con exito </h2>
                                    </div>  
                                   <div class="span1 hidden-phone" ></div>

                            </div>
                            <div class="row-fluid  form" >
                                <div class="span5 hidden-phone"></div>
                                <div class="span2">
                                    <input id="avisoAceptar_imp" type="button" value="Imprimir" class="k-primary" style="width:100%"/> <br> <br>
                                </div>
                            </div>
                        </div>

                    </div> 
                </div>
                <div class="span1 hidden-phone" > </div>
            </div>
        </div>
    </div>
    
</div>
<div id="div_deposito_ventana_imp"></div>
<div id="div_persona_ventana_imp"></div>
<div id="div_empresa_ventana_imp"></div>
<script> 
    var numimport=0;
    var depoimport=0;
    var arraytotal_imp = new Array();
    var array_ventas_imp = new Array();
    var array_depositos_imp = new Array();
    var array_cpublico_imp = new Array();
    var empresa_bool_imp = true;
    var persona_bool_imp = true;
    var cadena_depositos_imp='';
    ocultar('firmarfacturamanual_imp');
    ocultar('avisook_imp');
    ocultar('ventanadeposito_imp');
    
    $(document).ready(function(){
         agregar_imp(false);
    });
   
    ocultar('empresa_texto_imp');
    ocultar('persona_texto_imp');
    ocultar('div_contingencia_imp');
    if({$fmsucursal_imp}==11){
        mostrar('formfmsucursal_imp');
        ocultar('mostrarfacturamanual_imp');
    }else{
        ocultar('formfmsucursal_imp');
        mostrar('mostrarfacturamanual_imp');
    }
    function contingencia_imp(){
        if($('#chx_fmcontingencia_imp')[0].checked){
            mostrar('div_contingencia_imp');
            $('#fmc_nro_imp').attr('required','required');
            $('#fmc_fecha_imp').attr('required','required');
            $('#fmc_fecha_limite_imp').attr('required','required');
            $('#fmc_autorizacion_imp').attr('required','required');
        }else{
            $('#fmc_nro_imp').removeAttr('required');
            $('#fmc_fecha_imp').removeAttr('required');
            $('#fmc_fecha_limite_imp').removeAttr('required');
            $('#fmc_autorizacion_imp').removeAttr('required');
            ocultar('div_contingencia_imp');
        }
        //alert('hola');
    }
    
    $('#nit_imp')
        .focusout(function() {
            if($('#nit_imp').val()!=''){
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: $('empresa_form_imp').serialize()+'&opcion=admProForma&tarea=factura_senavex_empresa_import&nit_imp='+$('#nit_imp').val(),
                    success: function (data) {
                        if(data!=-1){
                            var dt=eval("("+data+")");
                            $('#empresa_texto_imp').html(dt[0].nombre);
                            $('#empresa_id_imp').val(dt[0].id);
                           // $('#ci').removeAttr('class');

                            mostrar('empresa_texto_imp');

                        }else{
                            ocultar('empresa_texto_imp');
                            create_empresa_ventana_imp();
                            $('#empresa_id_imp').val("");
                            $('#empresa_nit').val($('#nit_imp').val());
                            //$('#empresa_aviso').html('la Empresa con el NIT/CI:  '+$('#nit').val()+' no se encuentra registrada, revise el numimportero de NIT o CI. ');
                            
                            //empresa_ventana.open();
                        }
                    }
                });  
            }
        });
    $('#ci_imp')
        .focusout(function() {
            if($('#ci_imp').val()!=''){
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: $('empresa_form_imp').serialize()+'&opcion=admProForma&tarea=factura_senavex_persona_import&ci_imp='+$('#ci_imp').val(),
                    success: function (data) {
                        if(data!=-1){
                            var dt=eval("("+data+")");
                            $('#persona_texto_imp').html(dt[0].nombre);
                            $('#persona_id_imp').val(dt[0].id);
                            mostrar('persona_texto_imp');
                        }else{
                            ocultar('persona_texto_imp');
                            create_persona_ventana_imp();
                            $('#persona_id_imp').val("");
                            $('#persona_ci').val($('#ci_imp').val());
                            //persona_ventana.open();
                        }
                    }
                });  
            }
        });
    $("#facturar_imp").kendoButton();
    $("#avisoAceptar_imp").kendoButton();
    $("#baceptarfirmafacturamanual_imp").kendoButton();
    $("#bcancelarfirmafacturamanual_imp").kendoButton();
    $("#cerrar_facturar_imp").kendoButton();
    
    $("#ver_depositos_imp").kendoButton();
    
    var facturar_imp = $("#facturar_imp").data("kendoButton");
    var avisoAceptar_imp = $("#avisoAceptar_imp").data("kendoButton");
    var baceptarfirmafacturamanual_imp = $("#baceptarfirmafacturamanual_imp").data("kendoButton");
    var bcancelarfirmafacturamanual_imp = $("#bcancelarfirmafacturamanual_imp").data("kendoButton");
    var formfacturamanual_imp= $("#formfacturamanual_imp").kendoValidator({});
    var validator_imp = $("#formfacturamanual_imp").kendoValidator().data("kendoValidator");
    
    var cerrar_facturar_imp = $("#cerrar_facturar_imp").data("kendoButton");
    
    var ver_depositos_imp = $("#ver_depositos_imp").data("kendoButton");
    //facturar.enable(false);
    facturar_imp.bind("click", function(e){
        if(validator_imp.validate()){
            cambiar('mostrarfacturamanual_imp','avisook_imp');
        }
    });
    cerrar_facturar_imp.bind("click", function(e){
        //$('#ventanadeposito').remove();
       // cerraractualizartab('Facturar','admProForma','prueba&'+$('#formfacturamanual').serialize()+'&persona_id='+$('#persona_id').val()+'&empresa_id='+$('#empresa_id').val()+'&total_facturar='+$('#total_facturar').val()+'&'+cadena_depositos);
        //window.open('index.php?'+ $('#formfacturamanual').serialize()+'&persona_id='+$('#persona_id').val()+'&empresa_id='+$('#empresa_id').val()+'&total_facturar='+$('#total_facturar').val()+'&'+cadena_depositos, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
    });
    avisoAceptar_imp.bind("click", function(e){
        avisoAceptar_imp.enable(false);
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: $('#formfacturamanual_imp').serialize()+'&persona_id_imp='+$('#persona_id_imp').val()+'&empresa_id_imp='+$('#empresa_id_imp').val()+'&total_facturar='+$('#total_facturar').val()+'&'+cadena_depositos_imp,
            success: function (data) {
                    var id_factura = data.split(':');
                    if( id_factura.length == 1 ){
                        window.open('index.php?opcion=admProForma&tarea=mostrar_factura_manual&id_factura='+id_factura, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
                        cerraractualizartab('Facturar Importaciones','admProForma','factura_manual_importaciones&fmsucursal_imp='+$('#fmsucursal_imp').val());
                    }else{
                        //facturar.enable(true);
                        //cambiar('avisook','mostrarfacturamanual');
                    }
                    /*if($('#total_facturar').val()==0){
                        window.open('index.php?opcion=admProForma&tarea=mostrar_factura_manual&id_factura='+dato, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
                        $('#ventanadeposito').remove();
                        //$('#persona_ventana').remove();
                        cerraractualizartab('Facturar','admProForma','factura_manual&fmsucursal='+$('#fmsucursal').val());
                    }else{
                        if( data != '-1' )
                        {
                            $.ajax({             
                                type: 'post',
                                url: 'index.php',
                                data: $("#formdepositos").serialize()+'&id_factura='+dato,
                                success: function (data) {
                                        
                                        if( data != '-1' ){
                                            var id_factura = data.split('-');
                                            window.open('index.php?opcion=admProForma&tarea=mostrar_factura_manual&id_factura='+id_factura[1], 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
                                            $('#ventanadeposito').remove();
                                            //$('#persona_ventana').remove();
                                            cerraractualizartab('Facturar','admProForma','factura_manual&fmsucursal='+$('#fmsucursal').val());
                                        }else{
                                            //facturar.enable(true);
                                            cambiar('avisook','mostrarfacturamanual');
                                        }

                                    }
                                });
                        }else{
                            //facturar.enable(true);
                            cambiar('avisook','mostrarfacturamanual');
                        }
                    }*/
                }
            });
        /*window.open('index.php?'+, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        cerraractualizartab('Facturar','admProForma','factura_manual&fmsucursal='+$('#fmsucursal').val());*/
    });
    function consultaAjax_imp(dato){
        var resultado = '-1';
         $.ajax({             
            type: 'post',
            url: 'index.php',
            data: dato,
            success: function (data) {
                    alert(data);
                    resultado=data;
                }
            });
            return data;
    }
    baceptarfirmafacturamanual_imp.bind("click", function(e){
        
    });
    bcancelarfirmafacturamanual_imp.bind("click", function(e){
        
    });
    
    ver_depositos_imp.bind("click", function(e){
        
        create_deposito_ventana_imp();
    });
   
    function OnKeyUp(numimport, ventaimport, tipo){
        if(tipo==2){
             $('#icontrol-'+numimport+'-'+ventaimport)
                .keyup(function(){
                    tipo2_imp(numimport,ventaimport);
                })
                .change(function(){
                    tipo2_imp(numimport,ventaimport);
                });
             $('#fcontrol-'+numimport+'-'+ventaimport)
                .keyup(function(){
                    tipo2_imp(numimport,ventaimport);
                })
                .change(function(){
                    tipo2_imp(numimport,ventaimport);
                });
        }
        if(tipo==3){
            $('#cantidad-'+numimport)
                    .keyup(function(){
                       tipo3_imp(numimport);
                    })
                    .change(function(){
                        tipo3_imp(numimport);
                    });
        }
    }
    function tipo2_imp(numimport, ventaimport){
        if( $('#icontrol-'+numimport+'-'+ventaimport).val()!='' && $('#icontrol-'+numimport+'-'+ventaimport).val()!='' && parseInt( $('#icontrol-'+numimport+'-'+ventaimport).val() ) <= parseInt( $('#fcontrol-'+numimport+'-'+ventaimport).val() ) ){
            var icontrol = $('#icontrol-'+numimport+'-'+ventaimport);
            var fcontrol = $('#fcontrol-'+numimport+'-'+ventaimport);
            var cantidad = $('#imp_cantidad-tipo_campo-'+numimport);
            var subcantidad = $('#cantidadventa-'+numimport+'-'+ventaimport);
            var serviciocosto = $('#serviciocosto-'+numimport);
            var imp_serviciocostolabel = $('#imp_serviciocostolabel-'+numimport);
            //alert(cantidad.val() + ' - '+ subcantidad.val());
            cantidad.val( parseInt( cantidad.val() ) - parseInt( subcantidad.val() ) );
            cantidad.val( parseInt( cantidad.val() ) + parseInt( fcontrol.val() ) - parseInt( icontrol.val() ) );
            subcantidad.val( parseInt( fcontrol.val() ) - parseInt( icontrol.val() ));
            //alert( cantidad.val()  +' x ' +serviciocosto.val() );
            var sum= parseInt( cantidad.val() ) * parseInt( serviciocosto.val() );
           
            imp_serviciocostolabel.text('Bs. '+sum+',00');
            total_imp();
        }else{
            //if( parseInt( $('#icontrol-'+num+'-'+venta).val() ) > parseInt( $('#fcontrol-'+num+'-'+venta).val() ))
            //    $('#icontrol-'+num+'-'+venta).val('');
        }
    }
    function total_imp(){
        var res=0;
        var fLen = arraytotal_imp.length;
        for (i = 0; i < fLen; i++) {
            var serviciocosto = $('#serviciocosto-'+arraytotal_imp[i]).val();
            var cantidad = $('#imp_cantidad-tipo_campo-'+arraytotal_imp[i]).val();
            res+= parseInt(serviciocosto) * parseInt(cantidad);
        }
        
       
        $('#total_facturar').val(res);
        $('#total_imp').text('Bs. '+res+',00');
        var x1 = parseInt( $('#total-depositos').val() );
        var x2 = parseInt( $('#total_facturar').val() );
        facturar_imp.enable( x1 >= x2 );
        ver_depositos_imp.enable(parseInt($('#total_facturar').val())>0);
        //return suma;
    }
    function tipo3_imp(numimport){
        if($('#cantidad-'+numimport).val()!=''){
            $('#imp_cantidad-tipo_campo-'+numimport).val($('#cantidad-'+numimport).val());
            var sum = parseInt($('#serviciocosto-'+numimport).val()) * parseInt($('#cantidad-'+numimport).val());
            $('#imp_serviciocostolabel-'+numimport).text('Bs. '+sum+',00');
            total_imp();
        }
    }
    function Combobox_imp(numimport){
        $('#servicio-'+numimport).kendoComboBox({
            placeholder:"Seleccione un servicio",
            ignoreCase: true,
            dataTextField: "value",
            dataValueField: "Id",
            dataSource: [
            {foreach $servicios_imp as $servicio} 
                 { value: "{$servicio->getCodigo()}"+" | "+"{$servicio->getDescripcion()}", Id: {$servicio->getId_servicio()}},
            {/foreach}  
            ],
            change : function (e) {
                //alert(this.value());
                var nombre=this.text();
                var item=this.value();
                definirCampo_imp(numimport,false);
                if (this.value() && this.selectedIndex == -1) {
                    $('#subtotal-servicio'+numimport).text('');
                }else{
                    $.ajax({             
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admProForma&tarea=precio_servicio&id_servicio='+this.value(),
                        success: function (data) {                              
                            var serviciocosto = $('#serviciocosto-'+numimport);
                            var imp_serviciocostolabel = $('#imp_serviciocostolabel-'+numimport);
                            serviciocosto.val( parseInt(data) );
                            imp_serviciocostolabel.text('Bs. '+serviciocosto.val()+',00' );
                            $('#serviciocostototal-'+numimport).val(serviciocosto.val());
                            total_imp();
                        }
                    }); 
                }
            }
       });
    }
    function agregar_imp(estado) {
        numimport++;
        arraytotal_imp.push(numimport);
        //var campo= '<input type="text">'; 
        var campo=
                '<div class="row-fluid  form" id="imp_campos-'+numimport+'" name="imp_campos-'+numimport+'">'+
                    '<div class="span1 hidden-phone" ></div>'+
 
                    '<div class="span4" id="imp_div-servicio'+numimport+'" name="imp_div-servicio'+numimport+'">'+
                        '<input style="width:100%;" id="servicio-'+numimport+'" name="servicio-'+numimport+'" required validationMessage="Seleccione un Servicio"/>'+
                    '</div>'+
                    
                    '<div id="imp_tipo_campo-'+numimport+'" class="span4 campo">'+
                        
                    '</div>'+
                    '<div  class="span1 campo">'+
                        '<input type="hidden" id="serviciocosto-'+numimport+'" name="serviciocosto-'+numimport+'" value="0"> '+
                        '<center><label id="imp_serviciocostolabel-'+numimport+'">Bs. 0,00</label></center>'+
                    '</div>'+
                    ((estado)? 
                        '<div class="span1" >'+
                            '<img src="styles/img/del_dark.png" id="celiminar_imp" alt="eliminar servicio" onclick="eliminar_imp(this,'+numimport+')" height="28" width="28">'+
                        '</div>' : '') +
                '</div>';
        $("#gral_imp").append(campo);
        this.Combobox_imp(numimport);
        //this.OnKeyUp('servicio'+num);
    }
    function Campos_imp(numimport,estado,tipo){
        var texto="";
        if(tipo==1){
            texto= 'onclick="agregarEmision_imp('+numimport+',true)"';
        }
        if(tipo==2){
            texto= 'onclick="agregarVenta_imp('+numimport+',true)"';
        }
        if(tipo==4){
            texto= 'onclick="agregarCPublico_imp('+numimport+',true)"';
        }
        var campo=  '<div class="k-cuerpo" id="imp_cuerpo-tipo_campo-'+numimport+'"  name="imp_cuerpo-tipo_campo-'+numimport+'">'+
                        //'<input type="hidden" id="cantidad-tipo_campo-'+num+'" name="cantidad-tipo_campo-'+num+'" value="1">'+
                    '</div>'+
                    ((tipo!=3 && tipo!=5 && tipo!=6)? 
                    '<div class="row-fluid form" >'+
                    
                        '<div class="span10 hidden-phone" >'+
                        '</div>'+
                        '<div class="span1" >'+
                       
                            '<img src="styles/img/add.png" id="cagregar_imp" '+texto+' height="28" width="28">'+
                        
                        '</div>'+
                    '</div>':'  ');
        $('#imp_tipo_campo-'+numimport).append('<input type="hidden" name="imp_cantidad-tipo_campo-'+numimport+'" id="imp_cantidad-tipo_campo-'+numimport+'" value="0" />');
        $('#imp_tipo_campo-'+numimport).append(campo);

        if(tipo==1){
            agregarEmision_imp(numimport,estado);
        }
        if(tipo==2){
            agregarVenta_imp(numimport,estado);
        }
        if(tipo==3){
            agregarCantidad_imp(numimport);
        }
        if(tipo==4){
            agregarCPublico_imp(numimport,estado);
        }
        if(tipo==5){
            agregarReposicion_imp(numimport,false);
        }
        if(tipo==6){
             $('#imp_cantidad-tipo_campo-'+numimport).val(parseInt($('#imp_cantidad-tipo_campo-'+numimport).val())+1);
        }
    }
    function agregarEmision_imp(numimport,estado){
        ventaimport++;
        var campo=  '<div class="row-fluid form" id="imp_tipo_campo-'+numimport+'-'+ventaimport+'">'+
                        
                        '<div class="span5" >'+
                            '<input min=1 id="fobemision-'+numimport+'-'+ventaimport+'" name="fobemision-'+numimport+'-'+ventaimport+'" type="number" class="k-textbox" placeholder="FOB"  required validationMessage="Ingreser Valor FOB" >'+
                        ' </div>'+
                        '<div class="span5" >'+
                            '<input min=1 id="controlemision-'+numimport+'-'+ventaimport+'" name="controlemision-'+numimport+'-'+ventaimport+'" type="number" class="k-textbox" placeholder="Nro Control"  required validationMessage="Ingreser Nro Control" >'+
                        ' </div>'+
                        ((estado)? 
                        '<div class="span1" >'+
                            '<img src="styles/img/del_dark.png" id="imp_celiminar-'+numimport+'-'+ventaimport+'" alt="eliminar servicio" onclick="eliminarCampo_imp(this,1)" height="28" width="28">'+
                        '</div>' : '') +
                    '</div>';
        $('#imp_cuerpo-tipo_campo-'+numimport).append(campo);
        $('#imp_cantidad-tipo_campo-'+numimport).val(parseInt($('#imp_cantidad-tipo_campo-'+numimport).val())+1);
        //alert($('#cantidad-tipo_campo-'+num).val() + ' - '+$('#serviciocosto-'+num).val());
        var sum= parseInt( $('#imp_cantidad-tipo_campo-'+numimport).val() ) * parseInt( $('#serviciocosto-'+numimport).val() );
        $('#imp_serviciocostolabel-'+numimport).text('Bs. '+sum+',00');
        total_imp();

    }
    var ventaimport=0;
    function agregarVenta_imp(numimport,estado){
        ventaimport++;
        var campo=  '<div class="row-fluid form" id="imp_tipo_campo-'+numimport+'">'+
                        '<input type="hidden" id="cantidadventa-'+numimport+'-'+ventaimport+'" name="cantidadventa-'+numimport+'-'+ventaimport+'" value="0"> '+
                        '<div class="span5" >'+
                            '<input min=1 id="icontrol-'+numimport+'-'+ventaimport+'" name="icontrol-'+numimport+'-'+ventaimport+'" type="number" class="k-textbox" placeholder="Nro Certificado Inicial"  required validationMessage="Ingreser Nro Certificado Inicial" >'+
                        ' </div>'+
                        '<div class="span5" >'+
                            '<input min=1 id="fcontrol-'+numimport+'-'+ventaimport+'" name="fcontrol-'+numimport+'-'+ventaimport+'" type="number" class="k-textbox" placeholder="Nro Certificado Final"  required validationMessage="Ingreser Nro Certificado Final" >'+
                        ' </div>'+
                        ((estado)? 
                        '<div class="span1" >'+
                            '<img src="styles/img/del_dark.png" id="imp_celiminar-'+numimport+'-'+ventaimport+'" alt="eliminar servicio" onclick="eliminarCampo_imp(this,2)" height="28" width="28">'+
                        '</div>' : '') +
                    '</div>';
        $('#imp_cuerpo-tipo_campo-'+numimport).append(campo);
        $('#imp_cantidad-tipo_campo-'+numimport).val(parseInt($('#imp_cantidad-tipo_campo-'+numimport).val())+1);
        OnKeyUp(numimport,ventaimport, 2);
        array_ventas_imp.push(ventaimport);
    }
    function agregarReposicion_imp(numimport,estado){
        ventaimport++;
        var campo=  '<div class="row-fluid form" id="imp_tipo_campo-'+numimport+'">'+
                        '<input type="hidden" id="cantidadventa-'+numimport+'-'+ventaimport+'" name="cantidadventa-'+numimport+'-'+ventaimport+'" value="0"> '+
                        '<div class="span5" >'+
                            '<input min=1 id="icontrol-'+numimport+'-'+ventaimport+'" name="icontrol-'+numimport+'-'+ventaimport+'" type="number" class="k-textbox" placeholder="N° Control Repuesto"  required validationMessage="Ingrese N° Control Repuesto" >'+
                        ' </div>'+
                        '<div class="span5" >'+
                            '<input min=1 id="fcontrol-'+numimport+'-'+ventaimport+'" name="fcontrol-'+numimport+'-'+ventaimport+'" type="number" class="k-textbox" placeholder="N° Control a Reponer"  required validationMessage="Ingrese N° Control Reponer" >'+
                        ' </div>'+
                        ((estado)? 
                        '<div class="span1" >'+
                            '<img src="styles/img/del_dark.png" id="imp_celiminar-'+numimport+'-'+ventaimport+'" alt="eliminar servicio" onclick="eliminarCampo_imp(this,2)" height="28" width="28">'+
                        '</div>' : '') +
                    '</div>'+
                    '<div class="row-fluid form" >'+ 
                            '<input type="radio" checked name="tipoerror-'+numimport+'-'+ventaimport+'" value="1">Error Impresión'+
                            '<br><input type="radio" name="tipoerror-'+numimport+'-'+ventaimport+'" value="2">Error funcionario'+
                    '</div>';
        $('#imp_cuerpo-tipo_campo-'+numimport).append(campo);
        $('#imp_cantidad-tipo_campo-'+numimport).val(parseInt($('#imp_cantidad-tipo_campo-'+numimport).val())+1);
        OnKeyUp(numimport,ventaimport, 2);
        array_ventas_imp.push(ventaimport);
    }
    function agregarCantidad_imp(numimport){
        var campo=
                        '<div class="span5" >'+
                            '<input min=1 id="cantidad-'+numimport+'"  name="cantidad-'+numimport+'"  type="number" class="k-textbox" placeholder="Cantidad"  required validationMessage="Ingrese una Cantidad" >'+
  
                        '</div><br><br>';
        $('#imp_cuerpo-tipo_campo-'+numimport).append(campo);
        $('#imp_cantidad-tipo_campo-'+numimport).val(parseInt($('#imp_cantidad-tipo_campo-'+numimport).val())+1);
        OnKeyUp(numimport,0, 3);
        // $('#cantidad-tipo_campo-'+num).val(parseInt($('#cantidad-tipo_campo-'+num+).val())+1);
    }
    function agregarCPublico_imp(numimport,estado){
        ventaimport++;
        var campo=  '<div class="row-fluid form" id="imp_tipo_campo-'+numimport+'">'+
                        '<input type="hidden" id="cantidadcp-'+numimport+'-'+ventaimport+'" name="cantidadcp-'+numimport+'-'+ventaimport+'" value="1"> '+
                        '<div class="span5" >'+
                            '<input id="hora-'+numimport+'-'+ventaimport+'" name="hora-'+numimport+'-'+ventaimport+'" style="width:100%;" placeholder="Nro Control Inicial"  required validationMessage="Ingreser Nro control Inicial" >'+
                        ' </div>'+
                        '<div class="span5" >'+
                            '<input id="minuto-'+numimport+'-'+ventaimport+'" name="minuto-'+numimport+'-'+ventaimport+'" style="width:100%;" placeholder="Nro Control Final"  required validationMessage="Ingreser Nro Control Final" >'+
                        ' </div>'+
                        ((estado)? 
                        '<div class="span1" >'+
                            '<img src="styles/img/del_dark.png" id="imp_celiminar-'+numimport+'-'+ventaimport+'" alt="eliminar servicio" onclick="eliminarCampo_imp(this,4)" height="28" width="28">'+
                        '</div>' : '') +
                    '</div>';
        $('#imp_cuerpo-tipo_campo-'+numimport).append(campo);
        $('#imp_cantidad-tipo_campo-'+numimport).val(parseInt($('#imp_cantidad-tipo_campo-'+numimport).val())+1);
        comboHora_imp(numimport, ventaimport);
        comboMinuto_imp(numimport, ventaimport);
        array_cpublico_imp.push(ventaimport);
        totalCPC_imp(numimport, ventaimport);
        total_imp();
    }
    function tipoCPC_imp(numimport, ventaimport){
        if($("#hora-"+numimport+"-"+ventaimport).data("kendoComboBox").value()!='' && $("#minuto-"+numimport+"-"+ventaimport).data("kendoComboBox").value()!=''){
            //alert($("#minuto-"+num+"-"+venta).data("kendoComboBox").value());
            if($("#hora-"+numimport+"-"+ventaimport).data("kendoComboBox").value()=='0' && $("#minuto-"+numimport+"-"+ventaimport).data("kendoComboBox").value()=='-1'){
                 $("#minuto-"+numimport+"-"+ventaimport).data("kendoComboBox").value('0');
            }
           
                var cantidad = 0;
           
                cantidad = (parseInt($("#hora-"+numimport+"-"+ventaimport).data("kendoComboBox").value()) * 60) / parseInt($("#serviciocosto-"+numimport).val());
                cantidad += parseInt($("#minuto-"+numimport+"-"+ventaimport).data("kendoComboBox").value()) % parseInt($("#serviciocosto-"+numimport).val()) + 1;
                $('#cantidadcp-'+numimport+'-'+ventaimport).val(parseInt(cantidad));
                //alert(parseInt($("#minuto-"+num+"-"+venta).data("kendoComboBox").value()) +' ' +parseInt($("#serviciocosto-"+num).val()) );
                totalCPC_imp(numimport, ventaimport);
                total_imp();
            
        }
    }
    function totalCPC_imp(numimport, ventaimport){
        
        var res=0;
        var fLen = array_cpublico_imp.length;
        
        for (i = 0; i < fLen; i++) {
            if($('#cantidadcp-'+numimport+'-'+array_cpublico_imp[i]).length){
                res += parseInt($('#cantidadcp-'+numimport+'-'+array_cpublico_imp[i]).val());
            }else{
                
                if(i != -1) {
                    array_cpublico_imp.splice(i, 1);
                }
                total_imp();
            }
        }
        $('#imp_cantidad-tipo_campo-'+numimport).val(res);
        //$('#cantidad-tipo_campo-'+x[1]).val(parseInt($('#cantidad-tipo_campo-'+x[1]).val())- 1);
        var sum = parseInt($('#imp_cantidad-tipo_campo-'+numimport).val() ) * parseInt( $('#serviciocosto-'+numimport).val() );
        //alert(parseInt($('#cantidad-tipo_campo-'+num).val() )+ ' * '+ parseInt( $('#serviciocosto-'+num).val() ));
        $('#imp_serviciocostolabel-'+numimport).text('Bs. '+sum+',00');
    }
    function comboHora_imp(numimport,ventaimport){
        $("#hora-"+numimport+"-"+ventaimport).kendoComboBox({
            dataTextField: "text",
            dataValueField: "value",
            dataSource: [
                { text: "0 hrs", value: "0" },
                { text: "1 hrs", value: "1" },
                { text: "2 hrs", value: "2" },
                { text: "3 hrs", value: "3" },
                { text: "4 hrs", value: "4" },
                { text: "5 hrs", value: "5" },
                { text: "6 hrs", value: "6" },
                { text: "7 hrs", value: "7" },
                { text: "8 hrs", value: "8" }
            ],
            filter: "contains",
            suggest: true,
            index: 0,
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) {
                    this.value('');
                }else{
                   tipoCPC_imp(numimport, ventaimport);
                }
            }
        });
        
    }
    function comboMinuto_imp(numimport,ventaimport){
        $("#minuto-"+numimport+"-"+ventaimport).kendoComboBox({
            dataTextField: "text",
            dataValueField: "value",
            dataSource: [
                { text: "0 min", value: "-1" },
                { text: "15 min", value: "0" },
                { text: "30 min", value: "1" },
                { text: "45 min", value: "2" },
                //{ text: "60 min", value: "4" },
            ],
            filter: "contains",
            suggest: true,
            index: 1,
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) {
                    this.value('');
                }else{
                    tipoCPC_imp(numimport, ventaimport);
                }
            }
        });

    }
    function definirCampo_imp(numimport,estado){
        var item=$('#servicio-'+numimport).val();
        $("#imp_tipo_campo-"+numimport).html('');
        
        if(item>=11 && item <=16){
            Campos_imp(numimport,estado,2);
        }
        if(item>=22 && item <= 52){
            Campos_imp(numimport,estado,1);
        }
        if(item>=53 && item <= 58){
            Campos_imp(numimport,estado,5);
        }
        if(item>=59 && item<=60){
            Campos_imp(numimport,estado,6);
        }
        if(item>=75 && item<=91){
            Campos_imp(numimport,estado,2);  //3
        }
        if((item>=61 && item <= 72 )){
            if(item==67){
                Campos_imp(numimport,estado,4);
            }else{
                Campos_imp(numimport,estado,3);
            }
        }
    }
    function eliminarCampo_imp(ele,numimport){
        var x=$(ele).attr('id').split('-');
        if(numimport==2) {
            $('#imp_cantidad-tipo_campo-'+x[1]).val(parseInt($('#imp_cantidad-tipo_campo-'+x[1]).val())- parseInt( $('#cantidadventa-'+x[1]+'-'+x[2]).val() ));
        }
        if(numimport==4){
            $('#imp_cantidad-tipo_campo-'+x[1]).val(parseInt($('#imp_cantidad-tipo_campo-'+x[1]).val())- parseInt( $('#cantidadcp-'+x[1]+'-'+x[2]).val() ));
            $('#imp_cantidad-tipo_campo-'+x[1]).val(parseInt($('#imp_cantidad-tipo_campo-'+x[1]).val()) + 1);
            var i = array_cpublico_imp.indexOf(parseInt(x[2]));
            if(i != -1) {
                array_cpublico_imp.splice(i, 1);
            }
        }
        $('#imp_cantidad-tipo_campo-'+x[1]).val(parseInt($('#imp_cantidad-tipo_campo-'+x[1]).val())- 1);
        
        var sum = parseInt($('#imp_cantidad-tipo_campo-'+x[1]).val() ) * parseInt( $('#serviciocosto-'+x[1]).val() );
        
        $('#imp_serviciocostolabel-'+x[1]).text('Bs. '+sum+',00');
        //alert($('#imp_cantidad-tipo_campo-'+x[1]).val());
        $(ele).parent().parent().remove();
        total_imp();
    }
    function eliminar_imp(elem,numimport){
        var i = arraytotal_imp.indexOf(numimport);
        if(i != -1) {
            arraytotal_imp.splice(i, 1);
        }
        total_imp();
        $(elem).parent().parent().remove();
    }
   
    function agregarDepositos_imp(estado){
        depoimport++;
        
        var campo=
                '<div class="row-fluid  form" id="imp_deposito-'+depoimport+'" name="imp_deposito-'+depoimport+'">'+
                    '<!--div class="span1 hidden-phone" ></div-->'+
                    '<div class="span3" >'+
                        '<input min=0 type="number" class="k-textbox" name="numero-deposito-'+depoimport+'"id="numero-deposito-'+depoimport+'" value="" placeholder="Número Depósito"  required validationMessage="Ingrese Número Deposito"/>'+
                    '</div>'+
                    '<div class="span3" >'+
                        '<input type="date" class="k-textbox" name="fecha-deposito-'+depoimport+'" id="fecha-deposito-'+depoimport+'" value="" placeholder="Fecha Deposito"  required validationMessage="Ingrese Fecha Deposito"/>'+
                    '</div>'+
                    '<div class="span3" >'+
                        '<input min=0 type="number" class="k-textbox" name="monto-deposito-'+depoimport+'" id="monto-deposito-'+depoimport+'" value="" placeholder="Monto Deposito"  required validationMessage="Ingrese Monto Deposito"/>'+
                    '</div>'+
                    '<div class="span2" ><input type="checkbox" name="chx-'+depoimport+'" id="chx-'+depoimport+'" onchange="observarDeposito_imp('+depoimport+')">Observado</div>'+
                    ((estado)? 
                        '<div class="span1" >'+
                            '<img src="styles/img/del_dark.png" id="imp_deliminar-'+depoimport+'" alt="eliminar servicio" onclick="eliminardeposito_imp(this,'+depoimport+')" height="28" width="28">'+
                        '</div>' : '') +
                '</div>'+
                '<div class="row-fluid  form" id="imp_div_deposito_verificacion-'+depoimport+'">'+
                  
                    '<div class="span1 hidden-phone" ></div>'+
                    '<div class="span3"  >'+
                        '<input min=0 type="hidden" class="k-textbox" name="numero-deposito-'+depoimport+'-verif"id="numero-deposito-'+depoimport+'-verif" value="" placeholder="verificar Depósito"  required validationMessage="Verifique el número de deposito"/>'+
                    '</div>'+
                    '<div class="span7" id="div_deposito_observacion-'+depoimport+'" >'+
                        '<input type="text" class="k-textbox" name="imp_div_deposito_observacion-'+depoimport+'" id="deposito_observacion-'+depoimport+'" value="" placeholder="Observacion del depósito" validationMessage="Ingrese una observación"/>'+
                    '</div>'+
                   
                '</div>';
        
        $("#gral_depositos_imp").append(campo);
        ocultar('numero-deposito-'+depoimport+'-verif');
        ocultar('deposito_observacion-'+depoimport);
        actionMonto_imp(depoimport);
        actionNumero_imp(depoimport);
        actionVerificacion_imp(depoimport);
        array_depositos_imp.push(depoimport);
verificarDeposito_imp(depoimport);
    }
    var sw_deposito_imp = false;
    function verificarDeposito_imp(depoimport){
        $('#numero-deposito-'+depoimport)
            .focusout(function(){
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admDeposito&tarea=existe_deposito&codigo_deposito='+$('#numero-deposito-'+depoimport).val(),
                    success: function (data) {
                        var dt=eval("("+data+")");
                        if(dt[0].suceso != 0){
                            alert('El n\u00FAmero de dep\u00F3sito '+$('#numero-deposito-'+depoimport).val()+' ya fue registrado');
                            $('#numero-deposito-'+depoimport).val('');
                            sw_deposito_imp = true;
                        }
                    }
                });
            })
    }
    function observarDeposito_imp(nro){
      if($('#chx-'+nro)[0].checked){
            mostrar('deposito_observacion-'+nro);
        }else{
            $('#numero-deposito-'+nro+'-verif').attr('type','hidden');
            ocultar('deposito_observacion-'+nro);
        }
    }
    function actionNumero_imp(nro){
        $('#numero-deposito-'+nro)
                    .focusout(function(){
                        validarNumeroDeposito_imp(nro);
                    /*})
                    .change(function(){
                       validarNumeroDeposito(nro);*/
                    });
    }
    function actionVerificacion_imp(nro){
        $('#numero-deposito-'+nro+'-verif')
            .focusout(function(){
                if( $('#numero-deposito-'+nro).val() != $('#numero-deposito-'+nro+'-verif').val() ){
                    $('#numero-deposito-'+nro+'-verif').val('');
                    //$('#numero-deposito-'+nro+'-verif').attr('required','required');
                }else{
                    $('#numero-deposito-'+nro+'-verif').removeAttr('required');
                    ocultar('numero-deposito-'+nro+'-verif');
                }
            });
    }
    function validarNumeroDeposito_imp(nro){
        
        if($('#numero-deposito-'+nro).val()!=0){
            $('#numero-deposito-'+nro+'-verif').removeAttr('type');
            //$('#numero-deposito-'+nro+'-verif').attr('type','number');
            $('#numero-deposito-'+nro+'-verif').attr('required',"required");
            $('#numero-deposito-'+nro+'-verif').val('');
            mostrar('numero-deposito-'+nro+'-verif');
        }else{
            $('#numero-deposito-'+nro+'-verif').val('0');
            $('#numero-deposito-'+nro+'-verif').removeAttr('required');
            //$('#numero-deposito-'+nro+'-verif').attr('type','hidden');
            ocultar('numero-deposito-'+nro+'-verif');
            
            
        }
    }
    function actionMonto_imp(nro){
      $('#monto-deposito-'+nro)
                    .keyup(function(){
                        totalDepositos_imp();
                    })
                    .change(function(){
                        totalDepositos_imp();
                    });
    }
    function eliminardeposito_imp(ele,nrodepo){
        $('#imp_div_deposito_verificacion-'+nrodepo).remove();
        var i = array_depositos_imp.indexOf(nrodepo);
        if(i != -1) {
            array_depositos_imp.splice(i, 1);
        }
        $(ele).parent().parent().remove()
    }
    function totalDepositos_imp(){
        var res=0;
        var fLen = array_depositos_imp.length;
        for (i = 0; i < fLen; i++) {
            if( $('#monto-deposito-'+array_depositos_imp[i]).val()!=''){
                var montodeposito= $('#monto-deposito-'+array_depositos_imp[i]).val();
                res+= parseInt(montodeposito);
            }
        }
        $('#total-depositos').val(res);
        $('#total-depositoslabel_imp').text('Bs. '+res+',00');
        var x1 = parseInt( $('#total-depositos').val() );
        var x2 = parseInt( $('#total_facturar').val() );
        facturar_imp.enable( x1 >= x2 );
    }
    $('#sucursal_imp').kendoComboBox({
        placeholder:"Seleccione una Regional",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        {foreach $listaRegionales as $regional} 
             { value: "{$regional->getCiudad()}", Id: {$regional->getId_regional()} },
        {/foreach}  
        ],
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) {
            }else{
                $('#fmsucursal_imp').val(this.value());
                $('#titulofactura_imp').html('Facturar Servicios - '+this.text());
                cambiar('formfmsucursal_imp','mostrarfacturamanual_imp');
            }
        }
    });
    var sucursal_imp = $("#sucursal_imp").data("kendoComboBox");
    function create_empresa_ventana_imp(){
        if($('#div_empresa_ventana_imp').html()==''){
            var campo=
                    '<div id="empresa_ventana_imp">'+
                    '<form name="empresa_form_imp" id="empresa_form_imp" method="post" action="index.php">'+
                        '<div class="titulo">Registrar Empresa / Importación </div><br>'+
                        '<div class="row-fluid form" id="empresa_aviso_imp"></div>'+
                        '<div class="row-fluid form">'+
                            '<input type="text" class="k-textbox" id="empresa_nit" name="empresa_nit" style="width:100%;" placeholder="NIT/C.I." required validationMessage="Ingrese el nit de la empresa"><br><br>'+
                            '<input type="text" class="k-textbox" id="empresa_nombre" name="empresa_nombre" style="width:100%;" placeholder="Nombre de la Persona/Empresa" required validationMessage="Nombre de la Persona/Empresa" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br>'+
                            '<input type="text" id="empresa_categoria" name="empresa_categoria" style="width:100%;" placeholder="Categoria" required validationMessage="Categoria de la Empresa"><br><br>'+
                            '<input type="text" id="empresa_depto" name="empresa_depto" style="width:100%;" placeholder="Departamento" required validationMessage="Departamento de la Persona/Empresa"><br><br>'+
                        '</div>'+
                        '<div class="row-fluid form">'+
                            '<input id="empresaaceptar_imp" type="button"  value="Aceptar" class="k-primary" style="width:40"/> '+
                            '<input id="empresacancelar_imp" type="button"  value="Cancelar" class="k-primary" style="width:40"/> '+
                        '</div>'+
                    '</form>'+
                '</div>';
            $('#div_empresa_ventana_imp').append(campo);
            ventana_imp('empresa_ventana_imp','420','410');
            $("#empresaaceptar_imp").kendoButton();
            $("#empresacancelar_imp").kendoButton();
            var empresaaceptar_imp = $("#empresaaceptar_imp").data("kendoButton");
            var empresacancelar_imp = $("#empresacancelar_imp").data("kendoButton");

            empresacancelar_imp.bind("click", function(e){
                $('#nit_imp').focus();
                $('#empresa_ventana_imp').data("kendoWindow").close();
                $('#empresa_ventana_imp').remove();
            });
            $('#empresa_categoria').kendoComboBox({
                placeholder:"Seleccione una Categoria",
                ignoreCase: true,
                dataTextField: "value",
                dataValueField: "Id",
                dataSource: [
                {foreach $listaCategorias as $cate} 
                     { value: "{$cate->getDescripcion()}", Id: {$cate->getId_categoria_empresa()} },
                {/foreach}  
                ],
            });
            var sucursal_imp = $("#empresa_categoria").data("kendoComboBox");
            $('#empresa_depto').kendoComboBox({
                placeholder:"Seleccione un Departamento",
                ignoreCase: true,
                dataTextField: "value",
                dataValueField: "Id",
                dataSource: [
                {foreach $listaDepartamento as $regional} 
                     { value: "{$regional->getNombre()}", Id: {$regional->getId_departamento()} },
                {/foreach}  
                ],
            });
            var sucursal_imp = $("#empresa_depto").data("kendoComboBox");

            empresaaceptar_imp.bind("click", function(e){
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: $('#empresa_form_imp').serialize()+'&opcion=admEmpresaImport&tarea=agregarEmpresa_Import',
                    success: function (data) {
                        var dt=eval("("+data+")");
                        $('#empresa_texto_imp').html(dt[0].nombre);
                        $('#empresa_id_imp').val(dt[0].id);
                        mostrar('empresa_texto_imp');

                    }
                }); 
                $('#empresa_ventana_imp').data("kendoWindow").close();
                $('#empresa_ventana_imp').remove();
                $('#nit_imp').focus();
            });
        }
    }
    function create_persona_ventana_imp(){
        if($('#div_persona_ventana_imp').html()==''){
            var campo = 
                '<div id="persona_ventana_imp">'+
                    '<form name="persona_form" id="persona_form" method="post" action="index.php">'+
                        '<div class="titulo">Agregar Persona de recojo</div><br>'+
                        '<div class="row-fluid form">'+
                            '<input type="text" class="k-textbox" id="persona_ci" name="persona_ci" style="width:100%;" placeholder="NIT/C.I." required validationMessage="Ingrese la ciudad donde se encuentra la Fábrica"><br><br>'+
                            '<input type="text" class="k-textbox" id="persona_nombre" name="persona_nombre" style="width:100%;" placeholder="Nombres" required validationMessage="Nombres" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br>'+
                            '<input type="text" class="k-textbox" id="persona_apaterno" name="persona_apaterno" style="width:100%;" placeholder="Apellido Paterno" required validationMessage="APellido Paterno" onkeyup="javascript:this.value=this.value.toUpperCase();"><br><br>'+
                            '<input type="text" class="k-textbox" id="persona_amaterno" name="persona_amaterno" style="width:100%;" placeholder="Apellido Materno" required validationMessage="Apellido Materno" onkeyup="javascript:this.value=this.value.toUpperCase();">'+
                        '</div>'+
                        '<div class="row-fluid form">'+
                            '<input id="personaaceptar_imp" type="button"  value="Aceptar" class="k-primary" style="width:40"/> '+
                            '<input id="personacancelar_imp" type="button"  value="Cancelar" class="k-primary" style="width:40"/> '+
                        '</div>'+
                    '</form>'+
                '</div>';
            $('#div_persona_ventana_imp').append(campo);
            ventana_imp('persona_ventana_imp','350','410');
            $("#personaaceptar_imp").kendoButton();
            $("#personacancelar_imp").kendoButton();
            var personaaceptar_imp = $("#personaaceptar_imp").data("kendoButton");
            var personacancelar_imp = $("#personacancelar_imp").data("kendoButton");

            personacancelar_imp.bind("click", function(e){
                $('#ci_imp').focus();
                $('#persona_ventana_imp').data("kendoWindow").close();
                $('#persona_ventana_imp').remove();
            });

            personaaceptar_imp.bind("click", function(e){
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: $('#persona_form').serialize()+'&opcion=admPersonaImport&tarea=agregarPersonaImport',
                    success: function (data) {
                        var dt=eval("("+data+")");
                        $('#persona_texto_imp').html(dt[0].nombre);
                        $('#persona_id_imp').val(dt[0].id);
                        mostrar('persona_texto_imp');
                    }
                }); 
                $('#ci_imp').focus();
                $('#persona_ventana_imp').data("kendoWindow").close();
                $('#persona_ventana_imp').remove();
                //window.open('index.php?'+$('#persona_form').serialize()+'&opcion=admPersona&tarea=agregarPersona', 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
            });
        }
    }
    function create_deposito_ventana_imp(){
        array_depositos_imp = new Array();
        var campo ='<div class="row-fluid fadein" id="ventanadeposito_imp">'+
                    '<div class="span12" >'+
                        '<div class="row-fluid" >'+
                            '<div class="k-block fadein">'+
                                '<div class="k-header">'+
                                    '<div class="row-fluid  form" >'+
                                        '<div class="span12" ><div class="titulonegro" >Registrar Depósitos</div></div>'+
                                    '</div>'+
                                '</div>'+
                                '<form name="formdepositos_imp" id="formdepositos_imp" method="post"  action="index.php" >'+
                                    '<div class="k-cuerpo">'+
                                        '<div id="gral_depositos_imp"></div>'+
                                        '<div class="row-fluid form" >'+
                                            '<div class="span3" ><center><label >Monto a Facturar :</label></center></div>'+
                                            '<div class="span2 campo" ><label name="depototal_facturarlabel_imp" id="depototal_facturarlabel_imp"></label></div>'+
                                            '<div class="span3" ><center><label >Total Depósitos :</label></center></div>'+
                                            '<div class="span2 campo" ><label name="total-depositoslabel_imp" id="total-depositoslabel_imp">Bs. 0</label></div>'+
                                            '<div class="span1" ><img src="styles/img/add.png" id="cagregardepositos_imp"  onclick="agregarDepositos_imp(true)" height="28" width="28"></div>'+
                                        '</div>'+
                                        '<div class="row-fluid form" ><div class="barra" ></div></div>'+
                                        '<div class="row-fluid  form" >'+
                                            '<div class="span2 hidden-phone"></div>'+
                                            '<div class="span4"><input id="depositoaceptar_imp" type="button" value="Aceptar" class="k-primary" style="width:100%"/> <br> <br></div>'+
                                            '<div class="span4"><input id="depositocancelar_imp" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br></div>'+
                                        '</div>'+
                                    '</div>'+
                                '</form>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
        
                $('#div_deposito_ventana_imp').append(campo);
                agregarDepositos_imp(false);
                ventana_imp('ventanadeposito_imp','500','700');
                
                $('#depototal_facturarlabel_imp').text($('#total_imp').text());
                $("#depositoaceptar_imp").kendoButton();
                $("#depositocancelar_imp").kendoButton();
                
                var depositocancelar_imp = $("#depositocancelar_imp").data("kendoButton");
                var depositoaceptar_imp = $("#depositoaceptar_imp").data("kendoButton");
                var formdepositos_imp = $("#formdepositos_imp").kendoValidator().data("kendoValidator");
                depositoaceptar_imp.bind("click", function(e){
                    if(formdepositos_imp.validate()){
                        var x1 = parseInt( $('#total-depositos').val() );
                        var x2 = parseInt( $('#total_facturar').val() );
                        //alert(x1==x2 ) ;
                        if( x1 >= x2 ){
                            facturar_imp.enable(true);
                            cadena_depositos_imp = $("#formdepositos_imp").serialize();
                            $('#ventanadeposito_imp').data("kendoWindow").close();
                            $('#ventanadeposito_imp').remove();
                            //deposito_ventana.close();
                        }else{
                            //advertir que no son iguales el total de la factura con el total de los depositos
                        }
                    }
                });
                depositocancelar_imp.bind("click", function(e){
                    $("#ventanadeposito_imp").data("kendoWindow").close();
                    $('#ventanadeposito_imp').remove();

                });
    }
    function ventana_imp(nombre, h, w){
        $("#"+nombre).kendoWindow({
            draggable: false,
            height: h+"px",
            width: w+"px",
            resizable: false,
            modal: true,
            actions: [],
            animation: {
                close: {
                  effects: "fade:out",
                  duration: 1000
                }
            }
        }).data("kendoWindow").center().open();
    }
    
    
</script>  
                        