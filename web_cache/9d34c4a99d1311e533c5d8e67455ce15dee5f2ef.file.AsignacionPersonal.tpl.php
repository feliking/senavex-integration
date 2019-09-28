<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-05 08:17:42
         compiled from "/enex/web1/sitio/web/vista/admPersona/AsignacionPersonal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106539005357cede45c88110-86830971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d34c4a99d1311e533c5d8e67455ce15dee5f2ef' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admPersona/AsignacionPersonal.tpl',
      1 => 1493940885,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106539005357cede45c88110-86830971',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cede45cfc080_56143115',
  'variables' => 
  array (
    'tipo' => 0,
    'datostipodocumento' => 0,
    'tipodocumento' => 0,
    'datosperfil' => 0,
    'perfil' => 0,
    'datospais' => 0,
    'pais' => 0,
    'datosdepartamento' => 0,
    'departamento' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cede45cfc080_56143115')) {function content_57cede45cfc080_56143115($_smarty_tpl) {?><div class="row-fluid  form" >
    <div class="row-fluid "  id="asignarpersonal" >
        <div class="span12" >
            <form name="personal" id="personal" method="post"  action="index.php"  onkeypress="return anular(event)">
            <input type="hidden" name="opcion" id="opcion" value="admPersona" />
            <input type="hidden" name="tarea" id="tarea" value="guardarPersonaExportador" /> 
                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" > Asignación de Personal</div>  
                            </div>                                      
                        </div>  
                    </div>
                    <div class="k-cuerpo">
                        <div class="row-fluid " >
                            <div class="span2 " >
                                 <img  src="styles/img/usuario.png" class="imgpersonaalta" id="imgpersona" onError='this.onerror=null;imgendefectopersona(this);'/>
                            </div>     
                            <div class="span10 " >
                                 <div class="row-fluid form" >  
                                     <div class="span3 " >
                                    <input style="width:100%;" id="idperfil" name="idperfil" required validationMessage="Por favor escoja el Perfil que le asignara">
                                    </div>
                                    
                                </div>
                                <div class="row-fluid form" >  
                                    <div class="span3 " >
                                        <input style="width:100%;" id="idpais" name="idpais" required validationMessage="Por favor escoja el Pais">
                                    </div>
                                    <div class="span4 " >
                                        Sexo:
                                        Masculino <input type="radio" id="genero" name="genero" value="1" class="radio" data-radio required> 
                                        Femenino <input type="radio"   id="genero" name="genero" value="0" class="radio" data-radio required>
                                        <br/><span class="k-invalid-msg" data-for="genero"></span> 
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['tipo']->value==1) {?>
                                        <div class="span3" name='div_nropoder' id='div_nropoder' >
                                            <input style="width:100%;"  placeholder="Regional" id="apregional" name="apregional" required validationMessage="Seleccione Regional">
                                        </div>
                                    <?php }?>
                                 </div>
                                <div class="row-fluid form" >  
                                    <div class="span3" >
                                        <input style="width:100%;" id="tipodocumento" name="tipodocumento" required validationMessage="Por favor escoja el tipo de documento">
                                    </div>
                                    <div class="span4 " >
                                        <input id="customers"  name="customers" style="width: 100%;"  required validationMessage="Por favor Introduzca el numero de documento"/>
                                    </div>
                                    <div class="span2" >
                                        <input id="expedido"  name="expedido" style="width: 100%;"  required validationMessage="Seleccione un lugar de Emisión"/>
                                    </div>
                                </div>

                                <div class="row-fluid form" >
                                    <div class="span5" >
                                        <input type="text" class="k-textbox "  placeholder="Nombres"  name="nombres" id="nombres" onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Por favor ingrese el o los nombres" />
                                    </div>
                                    <div class="span5" >
                                        <input type="text" class="k-textbox "  placeholder="Primer Apellido"  name="apellidop" id="apellidop" onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Por favor ingrese el apellido paterno" />
                                    </div>
                                </div>
                                <div class="row-fluid form" >
                                    <div class="span5" >
                                        <input type="text" class="k-textbox "  placeholder="Segundo Apellido"  name="apellidom" id="apellidom" onkeyup="javascript:this.value=this.value.toUpperCase();" validationMessage="Por favor ingrese el apellido materno" />
                                    </div>
                                    <div class="span5" >
                                        <input type="text" class="k-textbox "  placeholder="Cargo"  name="cargo" id="cargo" onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Por favor ingrese su Cargo" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row-fluid form" >
                            <div class="barra" ></div> 
                        </div> 
                        <!--div class="row-fluid form" >
                            <div class="span3 " >
                                <input type="text" class="k-textbox "  placeholder="Ciudad"  name="ciudad" id="ciudad" required validationMessage="Por favor ingrese la ciudad" /> 
                            </div>
                             <div class="span6 " >
                                <input type="text" class="k-textbox "  placeholder="Dirección"  name="direccion" id="direccion" required validationMessage="Por favor ingrese la dirección" />    
                            </div>

                            <div class="span4 " >
                                
                               <input type="text" pattern="[1-9][0-9]{6,}" class="k-textbox " onkeypress='return validateQty(event);' placeholder="Telf/Cel de Contacto" maxlength="20" name="numerocontacto" id="numerocontacto" required validationMessage="Ingrese un numero telefonico válido" /> 
                               
                            </div>
                        </div-->
                        <div class="row-fluid form" >
                            <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Edit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('de_id'=>"asign1",'tipo'=>3,'direccion_id'=>0), 0);?>

                            <!--div class="span4 " >
                                
                                <input type="text" pattern="[1-9][0-9]{6,}" class="k-textbox " onkeypress='return validateQty(event);' placeholder="Telf/Cel de Contacto alternativo" maxlength="20" name="numerocontacto2" id="numerocontacto2"  validationMessage="Ingrese un numero telefonico válido" /> 
                                
                            </div-->
                        </div>
                        <div class="row-fluid  form" >

                            <div class="span2 parametro" >Email</div>
                            <div class="span4 " >
                            <input type="email" class="k-textbox "  placeholder="Correo Electronico"  name="email" id="email" 
                                       required data-required-msg="Introduzca un correo electronico"
                                                                data-available 
                                                                data-available-url="validate/username" />    
                            </div>
                        </div>
                        <div class="row-fluid form" >
                            <div class="barra" ></div> 
                        </div> 
                        <div class="row-fluid  form" >
                            <div class="span5 hidden-phone" ></div>
                            <div class="span2" >
                                <input id="asignarpersonalempresa" type="button" value="Asignar" class="k-primary" style="width:100%"/> <br><br>
                            </div>
                            <div class="span4 hidden-phone" ></div>
                            <div class="span1 " >
                                   <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('asignarPersonal')" style="max-width:35px;" class="ayuda">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>   
    <div class="row-fluid "  id="confirmarpersonal" >
        <div class="k-block fadein">
            <div class="k-header">
                    <div class="k-header"><div class="titulo">Aviso</div></div>
            </div>
            <div class="k-cuerpo"> 
                <div class="row-fluid  form" >
                        
                        <div class="span1" > </div>
                        <div class="span10" >
                            <p> Esta seguro de confirmar los privilegios de <span class="letrarelevante" id="iperfil" ></span> al señor/a <span id="inombres" class="letrarelevante"> </span> <span id="ipaterno" class="letrarelevante"> </span> <span class="letrarelevante" id="imaterno" > </span>.
                            </p> 
                        </div>  
                        <div class="span1" ></div>
                </div> 
                <div class="row-fluid  form" >
                        <div class="span4 hidden-phone" >
                         </div>
                         <div class="span2 " >
                             <input id="cancelarpersonal" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                         </div> 
                         <div class="span2 " >
                             <input id="aceptarpersonal" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
                         </div> 
                         <div class="span4 hidden-phone" >
                         </div>
                </div> 
            </div>   
        </div>
    </div>   
     <div class="row-fluid "  id="verificarcorreo" >
        <div class="k-block fadein">
            <div class="k-header">
                    <div class="k-header"><div class="titulo">Aviso</div></div>
            </div>
            <div class="k-cuerpo"> 
                <div class="row-fluid  form" >
                        
                        <div class="span1" > </div>
                        <div class="span10" >
                            <p> Por favor verfique su correo: "<span class="letrarelevante" id="correono" > </span>".
                            </p> 
                        </div>  
                        <div class="span1" ></div>
                </div> 
                <div class="row-fluid  form" >
                        <div class="span5 hidden-phone" >
                            
                         </div>
                         <div class="span2 " >
                             <input id="aceptarverif" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
                         </div> 
                         <div class="span5 hidden-phone" >
                         </div>
                </div> 
            </div>   
        </div>
    </div>   
    <div class="row-fluid "  id="loading" >
        <div class="row-fluid  form" >
            <div class="span12 hidden-phone" >
                <img id="" src="styles/img/logo_intro.png"  >
            </div>
        </div> 
        <div class="row-fluid  form" >
            <div class="span3" > </div>
            <div class="span6" >
                <p> Enviando correo, espere un momento por favor.....
                </p> 
            </div>  
            <div class="span3" ></div>
        </div> 
        <div class="row-fluid  form" >
            <div class="row-fluid" >
                <div class="span3"> 
               </div>
               <div class="span6" > 
                   <div id="progressBarc" style="width:100%;height: 8px;"></div>
               </div>
                <div class="span3" > 
               </div>
           </div>
        </div> 
    </div>   
</div>
<div id="aviso_repl" name="aviso_repl" ></div>
<?php echo '<script'; ?>
> 
    //estos son los combos
    //ocultar('div_nropoder');
    $("#asignarpersonalempresa").kendoButton();
    $("#cancelarpersonal").kendoButton();
    $("#aceptarpersonal").kendoButton();
   // alert(<?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
);
    var asignarpersonalempresa = $("#asignarpersonalempresa").data("kendoButton");
    var cancelarpersonal = $("#cancelarpersonal").data("kendoButton");
    var aceptarpersonal = $("#aceptarpersonal").data("kendoButton"); 
 
    //estos son los textbox
    $("#nombres").kendoMaskedTextBox();
    $("#apellidop").kendoMaskedTextBox();
    $("#apellidom").kendoMaskedTextBox();
    $("#numerocontacto").kendoMaskedTextBox();
    $("#numerocontacto2").kendoMaskedTextBox();
    $("#cargo").kendoMaskedTextBox();
    //$("#expedido").kendoMaskedTextBox();
    $("#email").kendoMaskedTextBox();
    $("#direccion").kendoMaskedTextBox();
    $("#ciudad").kendoMaskedTextBox();
    $("#nropoder").kendoMaskedTextBox();
    
    var nombres = $("#nombres").data("kendoMaskedTextBox");
    var apellidop = $("#apellidop").data("kendoMaskedTextBox");
    var apellidom = $("#apellidom").data("kendoMaskedTextBox");
    var numerocontacto = $("#numerocontacto").data("kendoMaskedTextBox");
    var numerocontacto2 = $("#numerocontacto2").data("kendoMaskedTextBox");
    var cargo = $("#cargo").data("kendoMaskedTextBox");
    //var expedido = $("#expedido").data("kendoMaskedTextBox");
    var email = $("#email").data("kendoMaskedTextBox");
    var direccion = $("#direccion").data("kendoMaskedTextBox");
    var ciudad = $("#ciudad").data("kendoMaskedTextBox");
    //var nropoder = $("#nropoder").data("kendoMaskedTextBox");
    
    // para los terminos y condiciones del personal
  
    ocultar('confirmarpersonal');
    asignarpersonalempresa.bind("click", function(e){ 
        //kcbexpedido.value(1);
        //window.open("index.php?"+$( "#personal" ).serialize()+'&sw_repl='+sw_repl, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        if(validatorpersonal.validate())
       { 
           cambiar('asignarpersonal','confirmarpersonal');
           $("#iperfil").html(idperfil.text());
           $("#inombres").html(nombres.value());
           $("#ipaterno").html(apellidop.value());
           $("#imaterno").html(apellidom.value());
       }
    }); 
    cancelarpersonal.bind("click", function(e){   
       cambiar('confirmarpersonal','asignarpersonal'); 
    }); 
    
    aceptarpersonal.bind("click", function(e){ 
        cambiar('confirmarpersonal','loading');
        swdevueltaajax=0;
        var pb = $("#progressBarc").data("kendoProgressBar");
        pb.value(0);
        var interval = setInterval(function () {
            if (pb.value() < 100) {
                if(swdevueltaajax==1)
                {
                    swdevueltaajax=0;
                     pb.value(pb.value() + 1);
                      clearInterval(interval);
                }
                if(swdevueltaajax==3)
                {
                    swdevueltaajax=0;
                    clearInterval(interval);
                    cambiar('loading','verificarcorreo');
                    $('#correono').html($('#email').val())
                }
                if(pb.value()==99)
                {
                    if(swdevueltaajax==1)
                    {
                        swdevueltaajax=0;
                         pb.value(pb.value() + 1);
                    }
                    if(swdevueltaajax==3)
                    {
                        clearInterval(interval);
                        cambiar('loading','verificarcorreo');
                        $('#correono').html($('#email').val())
                    }
                }
                else
                {
                    pb.value(pb.value() + 1);
                }
            } 
            else
            {
                clearInterval(interval);
            }
        }, 80); 
       if(swcustomers=='0')
       {
           //aqui ser crea una persona y un perfil
           
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: $( "#personal" ).serialize()+'&sw_repl='+sw_repl,
                success: function (data) {
                        var respuesta = eval('('+data+')');
                        if(respuesta[0].suceso=='0')
                        {
                            swdevueltaajax=1;
                            cerraractualizartab('Mi Personal','admPersona','listarPersonasPorEmpresa');
                        }
                        else
                        {
                            swdevueltaajax=3;
                            //salert(respuesta[0].msg+' Verifique su conexion a internet eh intente nuevamente.');
                        }
                    }
                });
       }
       else
       {
           //window.open("index.php?"+'opcion=admPerfil&tarea=asignarPerfilPersona&id_persona='+swcustomers+'&id_perfil='+idperfil.value()+'&nombres='+nombres.value()+'&email='+email.value()+'&sw_repl='+sw_repl, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
           //swcustomers se encuentra el id de la presona qu se quiere asignar un nuevo perfil
            $.ajax({
                type: 'post',
                url: 'index.php',
                data:'opcion=admPerfil&tarea=asignarPerfilPersona&id_persona='+swcustomers+'&id_perfil='+idperfil.value()+'&nombres='+nombres.value()+'&email='+email.value()+'&sw_repl='+sw_repl,
                success: function (data) { 
                   // alert(data);
                    var respuesta = eval('('+data+')');
                    if(respuesta[0].suceso=='0')
                    {
                         swdevueltaajax=1;
                        cerraractualizartab('Mi Personal','admPersona','listarPersonasPorEmpresa');
                    }
                    else
                    {
                        swdevueltaajax=3;
                        //alert(respuesta[0].msg+' Verifique su conexion a internet eh intente nuevamente.');
                    }
                 }
            });
        }
    }); 
    
    $("#tipodocumento").kendoComboBox(
        {   placeholder:"Tipo de Documento",
            dataTextField: "tipodocumento",
            dataValueField: "Id",
            dataSource: [
            <?php  $_smarty_tpl->tpl_vars['tipodocumento'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tipodocumento']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datostipodocumento']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tipodocumento']->key => $_smarty_tpl->tpl_vars['tipodocumento']->value) {
$_smarty_tpl->tpl_vars['tipodocumento']->_loop = true;
?> 
            { tipodocumento: "<?php echo $_smarty_tpl->tpl_vars['tipodocumento']->value->descripcion;?>
", Id: <?php echo $_smarty_tpl->tpl_vars['tipodocumento']->value->id_tipo_documentoidentidad;?>
},
            <?php } ?>
            ],
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) {                     
                 ftipodocumento()
                 
                }
            },
           // index:0
    });
    var tipodocumento = $("#tipodocumento").data("kendoComboBox");
    function ftipodocumento()
    {
        tipodocumento.text('');
    }
    
    $("#idperfil").kendoComboBox(
        {   placeholder:"Perfil de Personal",
            dataTextField: "tipodocumento",
            dataValueField: "Id",
            dataSource: [
            <?php  $_smarty_tpl->tpl_vars['perfil'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['perfil']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datosperfil']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['perfil']->key => $_smarty_tpl->tpl_vars['perfil']->value) {
$_smarty_tpl->tpl_vars['perfil']->_loop = true;
?> 
            { tipodocumento: "<?php echo $_smarty_tpl->tpl_vars['perfil']->value->descripcion;?>
", Id: <?php echo $_smarty_tpl->tpl_vars['perfil']->value->id_perfil;?>
},
            <?php } ?>
            ],
            change : function (e) {
                //ocultar('div_nropoder');
                if(this.value()==3 || this.value()==2){
                    create_persona_ventana();
                    //mostrar('div_nropoder');
                    //var elem='<input type="text" class="k-textbox " placeholder="Nro de Poder" name="nropoder" id="nropoder" required validationMessage="Por favor Introduzca el numero del poder"/>';
                    //$('#div_nropoder').append(elem);
                }else{
                    sw_repl = false;
                    //$('#nropoder').remove();
                }
                   
                
                if (this.value() && this.selectedIndex == -1) { 
                 fidperfil()
                 
                }
            }
    });
    var idperfil = $("#idperfil").data("kendoComboBox");
    
    function create_persona_ventana(){
    
        if($('#aviso_repl').html()==''){
            var campo=
                    '<div id="aviso_ventana">'+
                        '<div class="titulo">AVISO</div><br>'+
                        '<div class="row-fluid form">'+
                            '<p> Al asignar un Representante legal, cambiarás el Representante Legal actual, por lo cual se procederá a un cobro por actualización</p>'+
                        '</div>'+
                        '<div class="row-fluid form">'+
                            '<input id="avisoacancelar" type="button"  value="Cancelar" class="k-primary" style="width:40"/> '+
                            '<input id="avisoaceptar" type="button"  value="Aceptar" class="k-primary" style="width:40"/> '+
                        '</div>'+
                    '</div>';
            $('#aviso_repl').append(campo);
            ventana('aviso_ventana','250','410');
            $("#avisoaceptar").kendoButton();
            $("#avisoacancelar").kendoButton();
            var avisoaceptar = $("#avisoaceptar").data("kendoButton");
            var avisoacancelar = $("#avisoacancelar").data("kendoButton");

            avisoacancelar.bind("click", function(e){
                $('#idperfil').data("kendoComboBox").value(-1);
                $('#idperfil').data("kendoComboBox").text('');
                $('#aviso_ventana').data("kendoWindow").close();
                $('#aviso_ventana').remove();
            });

            avisoaceptar.bind("click", function(e){
                sw_repl = true;
                /*$.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: $('#empresa_form').serialize()+'&opcion=admEmpresa&tarea=agregarEmpresa',
                    success: function (data) {
                        var dt=eval("("+data+")");
                        $('#empresa_texto').html(dt[0].nombre);
                        $('#empresa_id').val(dt[0].id);
                        mostrar('empresa_texto');

                    }
                }); */
                $('#aviso_ventana').data("kendoWindow").close();
                $('#aviso_ventana').remove();
                
            });
        }
    }
    var sw_repl = false;
    function ventana(nombre, h, w){
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
    function fidperfil()
    {
        idperfil.text('');
    }
    
    $("#idpais").kendoComboBox(
        {   placeholder:"País de origen",
            dataTextField: "pais",
            dataValueField: "Id",
            dataSource: [
            <?php  $_smarty_tpl->tpl_vars['pais'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pais']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datospais']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pais']->key => $_smarty_tpl->tpl_vars['pais']->value) {
$_smarty_tpl->tpl_vars['pais']->_loop = true;
?> 
            { pais: "<?php echo $_smarty_tpl->tpl_vars['pais']->value->nombre;?>
", Id: <?php echo $_smarty_tpl->tpl_vars['pais']->value->id_pais;?>
},
            <?php } ?>
            ],
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) { 
                 fidpais()
                 
                }
            }
    });
    var idpais = $("#idpais").data("kendoComboBox");
    function fidpais()
    {
        idpais.text('');
    }
     /*---------------------------para el validator-----------------------------------------------------------------*/
    var swe=2;
    var emailcache='';
    var validatorpersonal = $("#personal").kendoValidator({
       rules:{           
            available: function(input) { 
                var validate = input.data('available');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                     if (emailcache !== $("#email").val()) 
                     {
                    emailajax($("#email").val());                    
                    return false;
                    }
                    if(swe==0)
                    {
                       // swe=2;
                         return true;
                    }
                    if(swe==1)
                    {  
                        return false;
                    }   
                }
                return true;
            },
        radio: function(input) { 
                var validate = input.data('radio');
               if (typeof validate !== 'undefined' && validate !== false) 
               {
                   return $("#personal").find("[name=" + input.attr("name") + "]").is(":checked");
               }
               return true;
            }
       },
       messages:{
            email:"Introduzca un Correo Electronico Valido",
            radio: "Seleccione una opción",
            available: function(input) { 
                if(swe==1)
                {  
                  return 'Verifique su correo';
                }
                else
                {    
                  return 'Revisando..';
                }
             }
       }
       }).data("kendoValidator");
   function emailajax(mail)
   {
      $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=admPersona&tarea=verificarDominioCorreo&email='+mail,
                success: function (data) {
                   swe=data;
                   emailcache=$("#email").val();
                   validatorpersonal.validateInput($("#email"));
                 }
                });
   }
   
  
   $("#expedido").kendoComboBox({   
        placeholder:"Expedido(solo Bolivia)",
        dataTextField: "sigla",
        dataValueField: "Id",
        dataSource: [
        <?php  $_smarty_tpl->tpl_vars['departamento'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['departamento']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datosdepartamento']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['departamento']->key => $_smarty_tpl->tpl_vars['departamento']->value) {
$_smarty_tpl->tpl_vars['departamento']->_loop = true;
?>
            { sigla: "<?php echo $_smarty_tpl->tpl_vars['departamento']->value['sigla'];?>
", Id: <?php echo $_smarty_tpl->tpl_vars['departamento']->value['id_departamento'];?>
 },
        <?php } ?> 
        ],
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) {
                this.text('');
            }
        }
    });
    var expedido = $("#expedido").data("kendoComboBox");
 

$("#customers").kendoComboBox({
     placeholder:"Numero de Documento",
    filter:"startswith",
    dataTextField: "numero_documento",
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
                url: "index.php?opcion=admPersona&tarea=exportadores"
            }
        }
    },
    change : function (e) {
        if (this.value() && this.selectedIndex !== -1) { 
            fcustomers(this.value());
        }
        else
        {
            if(isNaN(this.value()))
            {
               customers.text(''); 
            }
            else
            {
                
                //funciones Direccion_Edit.tpl
                loadDireccion('-1');
                disable_direccion = false;
                setDisable_direccion();
                fcustomersnoes();
            }
        }
    }
});
<?php if ($_smarty_tpl->tpl_vars['tipo']->value==1) {?>
    $("#apregional").kendoComboBox({
        placeholder:"Regional",
        dataTextField: "ciudad",
        dataValueField: "id_regional",
        dataSource: { 
            transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admPersona&tarea=listarRegionales"
                    }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text('');
            }else{  }

        }
    });
<?php }?>
var apregional = $("#apregional").data("kendoComboBox");

var customers = $("#customers").data("kendoComboBox");
var swcustomers='0';//esta vrialble es para ver si la persona es nueva o no
function fcustomers(id_persona)
{
    swcustomers=id_persona;//decimos que es una persona ya registrada
    $.ajax({             
    type: 'post',
    url: 'index.php',
    data: 'opcion=admPersona&tarea=getPersonaId&id_persona='+id_persona,
    success: function (data) {
        //alert(data);
        var persona = eval('('+data+')');
        //remplazamos los valores en las variables
        expedido.value(persona[0].expedido);
        tipodocumento.value(persona[0].id_tipo_documento);
        $('#nombres').val(persona[0].nombres);
        $('#apellidop').val(persona[0].paterno);
        $('#apellidom').val(persona[0].materno);
        $('#numerocontacto').val(persona[0].numero_contacto);
        $('#numerocontacto2').val(persona[0].numero_contacto2);
        $('#cargo').val(persona[0].cargo);
        $('#email').val(persona[0].email);
        //$('#direccion').val(persona[0].direccion);
        idpais.value(persona[0].id_pais_origen);
        $('#ciudad').val(persona[0].ciudad);
        $('input[name=genero]').val([persona[0].genero]);
        loadDireccion(persona[0].direccion);
        disable_direccion = true;
        setDisable_direccion();
        //esto es para cambiar la imagen       
        document.getElementById("imgpersona").src='styles/img/personal/'+persona[0].id_persona+'.'+persona[0].formato_imagen+'';
        //esta parte es para deshabilitar la validadcion de email
        emailcache=$("#email").val();
        swe=0;
        // para validar nuevamente el formulario
        validatorpersonal.validate();

        //deshabilitlamos los campos para que no pueda cambiarlos
        tipodocumento.enable(false);
        idpais.enable(false);
        nombres.enable(false);
        apellidop.enable(false);
        apellidom.enable(false);
        numerocontacto.enable(false);
        email.enable(false);
        kcbexpedido.enable(false);
        //direccion.enable(false);
        //ciudad.enable(false);
            var radios = document.personal.genero;
            for (var i=0, iLen=radios.length; i<iLen; i++) {
              radios[i].disabled = true;
            } 
        }
    });
}
function fcustomersnoes()
{
    swcustomers='0';//decioms que es un personanueva

        $('#nombres').val('');
        $('#apellidop').val('');
        $('#apellidom').val('');
        $('#numerocontacto').val('');
        $('#numerocontacto2').val('');
        $('#cargo').val('');
        $('#expedido').val('');
        $('#email').val('');
        $('#direccion').val('');
        idpais.text('');
        //$('#ciudad').val('');
        //deshabilitlamos los campos para que no pueda cambiarlos
        tipodocumento.enable();
        idpais.enable();
        nombres.enable();
        apellidop.enable();
        apellidom.enable();
        numerocontacto.enable();
        numerocontacto2.enable();
        cargo.enable();
        expedido.enable();
        email.enable();
        
       // direccion.enable();
       // ciudad.enable();
         var radios = document.personal.genero;
        for (var i=0, iLen=radios.length; i<iLen; i++) {
          radios[i].disabled = false;
        } 
        // para validar nuevamente el formulario
}
//-------------progresss bar---------------------------
ocultar('loading');
$("#progressBarc").kendoProgressBar({
    showStatus: false,
    animation: false,
    min: 0,
    max: 100,
    type: "percent",
    complete: function(e) {
      }
});
ocultar('verificarcorreo');
$("#aceptarverif").kendoButton();
var aceptarverif = $("#aceptarverif").data("kendoButton");
aceptarverif.bind("click", function(e){ 
 cambiar('verificarcorreo','asignarpersonal');
});               


<?php echo '</script'; ?>
>
       <?php }} ?>
