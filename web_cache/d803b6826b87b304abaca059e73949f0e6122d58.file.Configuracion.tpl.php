<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-23 18:41:51
         compiled from "/enex/web1/sitio/web/vista/admPersona/Configuracion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54575129757cedf093f1cd7-26626932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd803b6826b87b304abaca059e73949f0e6122d58' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admPersona/Configuracion.tpl',
      1 => 1498255257,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54575129757cedf093f1cd7-26626932',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cedf094644f2_12316991',
  'variables' => 
  array (
    'id_persona' => 0,
    'formato_imagen' => 0,
    'usuario' => 0,
    'perfil' => 0,
    'nombre' => 0,
    'paterno' => 0,
    'materno' => 0,
    'genero' => 0,
    'numero_documento' => 0,
    'email' => 0,
    'numero_contacto' => 0,
    'cargo' => 0,
    'direccion' => 0,
    'direccion_antigua' => 0,
    'datostipodocumento' => 0,
    'tipodocumento' => 0,
    'id_tipo_documento' => 0,
    'datospais' => 0,
    'pais' => 0,
    'id_pais_origen' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cedf094644f2_12316991')) {function content_57cedf094644f2_12316991($_smarty_tpl) {?><div class="row-fluid  form" >
    <div class="row-fluid "  id="editarpersona" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > Configuración</div>  
                        </div>                                      
                    </div>  
                </div>
                <div class="k-cuerpo">
                    <div class="row-fluid " >
                        <div class="span1 " >
                            <img  src="styles/img/personal/<?php echo $_smarty_tpl->tpl_vars['id_persona']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['formato_imagen']->value;?>
" class="imgpersonaalta" id="imgpersonaconf" onError='this.onerror=null;imgendefectopersonaconf(this);' onclick="$('#fotoupload').click();"/>
                            <form id="fotoform" action="index.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="opcion" id="opcion" value="funcionesGenerales" />
                                <input type="hidden" name="tarea" id="tarea" value="subirimagen" />
                                <input type="file" name="fotoupload" id="fotoupload"  style="display: none;" accept="image/*"/>
                            </form>
                            <?php echo '<script'; ?>
 type="text/javascript"> 
                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                            swfoto='1';// avisamos al formulario que se a cambiado de foto;
                                            $('#imgpersonaconf').attr('src', e.target.result);
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                                $("#fotoupload").change(function(){
                                       readURL(this);
                                });
                            <?php echo '</script'; ?>
> 
                        </div>     
                        <div class="span11 " >
                             <div class="row-fluid form" > 
                                 <div class="span2 parametro" >
                                    Usuario:  
                                </div>
                                <div class="span2" >
                                    <form id="usuarioform"> 
                                        <input type="text" class="k-textbox "  placeholder="Usuario"  name="usuarioconf" id="usuarioconf" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
" 
                                        required  data-required-msg="Por favor introduzca un usuario"  
                                        data-availableusuario />
                                    </form>    
                                </div>
                                <div class="span8 parametro" >
                                    <center><?php echo $_smarty_tpl->tpl_vars['perfil']->value;?>
</center>
                                </div>
                            </div>
                            <form id="contrasenaform">
                            <div class="row-fluid form" >
                                <div class="span2 parametro" >
                                Contraseña:
                                </div>
                                <div class="span2" >
                                <input type="password" class="k-textbox "  placeholder="Contraseña"  name="contrasenaconf" id="contrasenaconf"
                                     data-required-msg="Ingrese su Contraseña"
                                    data-contrasenia/>
                                </div>
                                <div class="span2 parametro" >
                                Nueva Contraseña:
                                </div>
                                <div class="span2" >
                                <input type="password" class="k-textbox "  pattern=".{8,}" placeholder="Nueva contraseña"  name="contrasenanuevaconf" id="contrasenanuevaconf"
                                       validationMessage="Ingrese al menos 8 digitos"
                                        data-required-msg="Ingrese su contraseña."/>
                                </div>
                                <div class="span2 parametro" >
                                Repetir Contraseña:
                                </div>
                                <div class="span2 fadein" >
                                <input type="password" class="k-textbox "  placeholder="Repetir contraseña"  name="contrasenanuevareptconf" id="contrasenanuevareptconf"
                                  data-required-msg="Confirmar su contraseña."
                                  data-matches="#contrasenanuevaconf" data-matches-msg="Las Contraseñas no Coinciden"  />
                                </div>
                                    
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" ></div> 
                    </div> 
                    <form name="configuracionform" id="configuracionform" method="post"  action="index.php"  onkeypress="return anular(event)">
                        <div class="row-fluid form" >
                            <div class="span3" >
                                <input type="text" class="k-textbox "  placeholder="Nombre"  name="nombresconf" id="nombresconf" value="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
" required validationMessage="Por favor ingrese su o sus nombres" />
                            </div>
                          <div class="span3" >
                                <input type="text" class="k-textbox "  placeholder="Primer Apellido"  name="apellidopconf" id="apellidopconf" value="<?php echo $_smarty_tpl->tpl_vars['paterno']->value;?>
" required validationMessage="Por favor ingrese su apellido paterno" />
                            </div>
                            <div class="span3" >
                                <input type="text" class="k-textbox "  placeholder="Segundo Apellido"  name="apellidomconf" id="apellidomconf" value="<?php echo $_smarty_tpl->tpl_vars['materno']->value;?>
" validationMessage="Por favor ingrese su apellido materno" />
                            </div>
                            <div class="span3" > 
                                 Sexo Masculino <input type="radio" id="generop" name="generop" value="1" <?php if ($_smarty_tpl->tpl_vars['genero']->value=='1') {?>checked="checked"<?php }?>class="radio" data-radio required> Femenino
                                    <input type="radio"   id="generop" name="generop" value="0" <?php if ($_smarty_tpl->tpl_vars['genero']->value!='1') {?>checked="checked"<?php }?> class="radio" data-radio required><br/>
                                    
                            </div>
                        </div>
                        <div class="row-fluid form" >
                            <div class="span3" >
                                <input style="width:100%;" id="tipodocumentoconf" name="tipodocumentoconf" required validationMessage="Por favor escoja el tipo de documento">
                            </div>
                            <div class="span3 " >
                                <input type="text" class="k-textbox "  onkeypress='return validateQty(event);' placeholder="Numero de documento"  name="numerodocumentoconf" disabled id="numerodocumentoconf" value="<?php echo $_smarty_tpl->tpl_vars['numero_documento']->value;?>
" 
                                       required validationMessage="Por favor ingrese su de documento" />
                            </div>
                            <div class="span3 " >
                               <input type="email" class="k-textbox "  placeholder="Correo Electronico"  name="emailconf" id="emailconf" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
"
                                    required data-required-msg="Introduzca un correo electronico"
                                    data-availableconf />    
                            </div>
                            <!--div class="span3 " >
                               <input type="text" class="k-textbox " onkeypress='return validateQty(event);' placeholder="Numero de Contacto" maxlength="20" name="numerocontactoconf" id="numerocontactoconf" 
                                      value="<?php echo $_smarty_tpl->tpl_vars['numero_contacto']->value;?>
" required validationMessage="Por favor ingrese el numero de telefonico" /> 
                            </div-->
                        </div>
                        <div class="row-fluid form" >
                            <div class="span3 " >
                                <input style="width:100%;" id="idpaisconf" name="idpaisconf" required validationMessage="Por favor escoja el Pais">
                            </div>
                            <div class="span3 " >
                                <input type="text" class="k-textbox "  placeholder="Cargo/Puesto/Titulo"  name="cargoconf" id="cargoconf" value="<?php echo $_smarty_tpl->tpl_vars['cargo']->value;?>
" required validationMessage="Por favor ingrese su Cargo" /> 
                            </div>
                            <!--div class="span6 " >
                                <input type="text" class="k-textbox "  placeholder="Dirección"  name="direccionconf" id="direccionconf" value="<?php echo $_smarty_tpl->tpl_vars['direccion']->value;?>
" required validationMessage="Por favor ingrese la dirección" />    
                            </div-->
                        </div>
                        <div class="row-fluid " >
                            <input type="hidden"  name="direccionconf" id="direccionconf" value="<?php echo $_smarty_tpl->tpl_vars['direccion']->value;?>
"  />    
                            
                            <?php if ($_smarty_tpl->tpl_vars['direccion_antigua']->value==1) {?>
                                <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Edit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tipo'=>3,'de_id'=>1,'direccion_id'=>0), 0);?>

                            <?php } else { ?>
                                <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Edit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tipo'=>3,'de_id'=>1,'direccion_id'=>$_smarty_tpl->tpl_vars['direccion']->value), 0);?>

                            <?php }?>
                        </div>
                    </form>  
                    <div class="row-fluid form" >
                      <div class="barra" ></div> 
                    </div>                   
                    <div class="row-fluid  form" >
                        <div class="span4" >
                        </div>
                        <div class="span2 " >
                         <input id="cancelaredicion" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                        </div> 
                        <div class="span2" >
                        <input id="editarconf" type="button" value="Guardar" class="k-primary" style="width:100%"/> <br><br>
                        </div>
                        <div class="span3" >
                        </div>
                        <div class="span1 " >
                        <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('configuracionPersona')" style="max-width:35px;" class="ayuda">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <div class="row-fluid "  id="confirmaredicion" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="k-header"><div class="titulo">Aviso</div></div>
            </div>
            <div class="k-cuerpo"> 
                <div class="row-fluid  form" >
                    <div class="span1" > </div>
                    <div class="span10" >
                        <p> Sus datos se cambiaron correctamente.
                        </p> 
                    </div>  
                    <div class="span1" ></div>
                </div> 
                <div class="row-fluid  form" >
                    <div class="span5 hidden-phone" >
                    </div>
                    <div class="span2 " >
                        <input id="aceptaredicion" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
                    </div> 
                    <div class="span5 hidden-phone" >
                    </div>
                </div> 
            </div>   
        </div>
    </div> 
    <div class="row-fluid "  id="confirmaredicionno" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="k-header"><div class="titulo">Aviso</div></div>
            </div>
            <div class="k-cuerpo"> 
                <div class="row-fluid  form" >
                    <div class="span1" > </div>
                    <div class="span10" >
                        <p> No ha modificado ningun dato.
                        </p>
                    </div>
                    <div class="span1" ></div>
                </div> 
                <div class="row-fluid  form" >
                    <div class="span5 hidden-phone" > </div>
                    <div class="span2 " >
                        <input id="aceptaredicionno" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
                    </div> 
                    <div class="span5 hidden-phone" > </div>
                </div> 
            </div>   
        </div>
    </div>  
</div>
<?php echo '<script'; ?>
> 

var swfoto='0';
var swusuario='0';
var swcontrasena='0';
var swpersona='0';
var swpersonanombres='0';
ocultar('confirmaredicion');
ocultar('confirmaredicionno');
//$("#numerodocumentoconf").readonly();
//------------------para los botones-----------------------------------------------------
$("#aceptaredicion").kendoButton();
var aceptaredicion = $("#aceptaredicion").data("kendoButton");
aceptaredicion.bind("click", function(e){
    remover(tabStrip.select()); 
});
$("#aceptaredicionno").kendoButton();
var aceptaredicionno = $("#aceptaredicionno").data("kendoButton");
aceptaredicionno.bind("click", function(e){
    cambiar('confirmaredicionno','editarpersona');
});

$("#cancelaredicion").kendoButton();
var cancelaredicion = $("#cancelaredicion").data("kendoButton");
cancelaredicion.bind("click", function(e){   
    remover(tabStrip.select());  
}); 
$("#editarconf").kendoButton();
var editarconf = $("#editarconf").data("kendoButton");
editarconf.bind("click", function(e){ 
    if(validatorpersonalconf.validate()){
        if(swfoto=='1')
        {
            $( "#fotoform" ).submit();
        }    
        var pasar='0';
        verificaredicionpersona();
        if((swusuario=='1' && validatorusuarioform.validate()) || (swcontrasena=='1' && validatorcontrasenaform.validate())
             || (swpersona=='1' && validatorpersonalconf.validate()))
        {
           pasar='1';
        }
        if(pasar=='1')
        {
        var parametros='';
        if(swusuario=='1')
        {
            parametros='&nuevousuario='+$("#usuarioconf").val();
        }
        if(swcontrasena=='1')
        {
            parametros=parametros+'&nuevacontrasena='+$("#contrasenanuevaconf").val();
        }
        if(swpersona=='1')
        {
            parametros=parametros+'&'+$( "#configuracionform" ).serialize();
        }
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data:'opcion=admPersona&tarea=editarPersona'+parametros,
            success: function (data) { 
               // alert(data);
                var respuesta = eval('('+data+')');
                if(respuesta[0].suceso=='0')
                {
                    if(swpersonanombres=='1')
                    {
                        $("#pinvista").html($("#nombresconf").val());
                        $("#nombrevista").html($("#nombresconf").val());
                        $("#nombresvista").html($("#nombresconf").val()+' '+$("#apellidopconf").val()+' '+$("#apellidomconf").val());
                    }
                    cambiar('editarpersona','confirmaredicion');
                }
                else
                {   
                    alert('Tiene problemas de conexion por favor intente mas tarde.');
                }
                
            }
        });
    }
    }
});
//-----------------para la foto ----------------------------------------
//form de la foto
$( "#fotoform" ).submit( function( e ) {
    e.preventDefault();
    $.ajax( {
        url: 'index.php',
        type: 'post',
        data: new FormData( this ),
        processData: false,
        contentType: false,
        success: function (data) { 
            var respuesta = eval('('+data+')');
            if(respuesta[0].suceso=='0')
            {
                d = new Date();
                document.getElementById("imagenpersonacabecera").src='styles/img/personal/'+respuesta[0].id_persona+'.'+respuesta[0].formato_imagen+'?'+d.getTime();
                cambiar('editarpersona','confirmaredicion');
            }
            else
            {
                alert(respuesta[1].suceso);
            }
        }
    });
});
//-------------usuario----------------------------
var usuarioconf = $("#usuarioconf").data("kendoMaskedTextBox");
$("#usuarioconf").kendoMaskedTextBox({
    change: function () { 
        if(this.value()!="<?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
")  swusuario='1';// para avisra que el usuairo se a mofdificado
        else swusuario='0';
    }
 });
//-----para la edicion de usuario
var sweusuario=2;
var usuariocache='';
var validatorusuarioform = $("#usuarioform").kendoValidator({
    rules:{ 
        availableusuario: function(input) { 
            var validate = input.data('availableusuario');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (usuariocache !== $("#usuarioconf").val()) 
                {
                    if($("#usuarioconf").val()=="<?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
")
                    { 
                        return true;
                    }
                    else
                    {
                        usuarioajaxconf($("#usuarioconf").val());                    
                        return false;
                    }
                }
                if(sweusuario==0)
                {
                    return true;
                }
                if(sweusuario==1)
                {  
                    return false;
                }  
            }
            return true;
        } 
    },
    messages:{
        availableusuario: function(input) { 
                if(sweusuario==1)
                {  
                  return 'El usuario esta siendo utilizado';
                }
                else
                {    
                  return 'Revisando..';
                }
        }
           
    }
}).data("kendoValidator");
function usuarioajaxconf(usuario)
{
    $.ajax({             
    type: 'post',
    url: 'index.php',
    data: 'opcion=admUsuario&tarea=verificarUsuario&nuevousuario='+usuario,
    success: function (data) { 
        sweusuario=data;
        usuariocache=$("#usuarioconf").val();
        validatorusuarioform.validateInput($("#usuarioconf"));
    }
    });
}
//--------------pa l cntraseña-------------------------------------------
var validatorcontrasenaform = $("#contrasenaform").kendoValidator({
    rules: {
        contrasenia: function(input) {
            var contrasenia = input.data('contrasenia');
            if (typeof contrasenia !== 'undefined' && contrasenia !== false) 
            {
                if (cocache !== $("#contrasenaconf").val()) 
                {
                verficarcontrasenia($("#contrasenaconf").val());                    
                return false;
                }
                
                if(swco==1)
                {
                   // swe=2;
                     return true;

                }
                if(swco==0)
                {  

                    return false;
                }   


            }

            return true;
        },
        matches: function(input) {
            var matches = input.data('matches');
            if (matches) 
            {
                var match = $(matches);
                if ( $.trim(input.val()) === $.trim(match.val()) )  {
                    return true;
                } else {
                    return false;
                }
            }
            return true;
        }
    },
    messages: {
        matches: function(input) {
            return input.data("matchesMsg");
        },
        contrasenia: function(input) { 
        if(swco==0)
        {  
          return 'Su contrasena no es correcta';
        }
        else
        {    
          return 'Revisando..';
        }
     }
    }
}).data("kendoValidator");
var contrasenaconf = $("#contrasenaconf").data("kendoMaskedTextBox");
 $("#contrasenaconf").kendoMaskedTextBox({
    change: function () {
       if(this.value()=='') 
        {
            swcontrasena='0';
             validatorcontrasenaform.hideMessages();
        }
       else swcontrasena='1';
    }
 });
 var swco=2;
var cocache='';
 function verficarcontrasenia(con)
 {
      $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admUsuario&tarea=verificarContrasena&contrasena='+con,
            success: function (data) {
                var respuesta = eval('('+data+')');
                
                    swco=respuesta[0].suceso;
                    cocache=$("#contrasenaconf").val();
                    validatorcontrasenaform.validateInput($("#contrasenaconf"));
            }
        });
 }
//---------------------------to es para la persona-----------------------------------------------
$("#tipodocumentoconf").kendoComboBox(
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
            this.text('');
                 
        }
    }
  ,value: "<?php echo $_smarty_tpl->tpl_vars['id_tipo_documento']->value;?>
"
});
var tipodocumentoconf = $("#tipodocumentoconf").data("kendoComboBox");
$("#idpaisconf").kendoComboBox(
{   placeholder:"Nacionalidad",
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
            this.text('');
        }
    }
    ,value: "<?php echo $_smarty_tpl->tpl_vars['id_pais_origen']->value;?>
"
});
var idpaisconf = $("#idpaisconf").data("kendoComboBox");

var swe=2;
var emailcache='';
var validatorpersonalconf = $("#configuracionform").kendoValidator({
   rules:{  
        availableconf: function(input) { 
            var validate = input.data('availableconf');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (emailcache !== $("#emailconf").val()) 
                {
                    if($("#emailconf").val()=="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
")// estto es por si pone su correo nuevamente
                    {
                        return true;
                    }
                    else
                    {
                        emailajaxconf($("#emailconf").val());                    
                        return false;
                    }
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
        } 
   },
   messages:{
        email:"Introduzca un Correo Electronico Valido",
        availableconf: function(input) { 
            if(swe==1)
            {  
              return 'El correo electronico esta siendo utilizado';
            }
            else
            {    
              return 'Revisando..';
            }
         }
   }
   }).data("kendoValidator");
function  emailajaxconf(mail)
{
  $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admEmpresaTemporal&tarea=verificarDominioCorreo&email='+mail,
            success: function (data) {
               swe=data;
               emailcache=$("#emailconf").val();
               validatorpersonalconf.validateInput($("#emailconf"));
             }
            });
}
var formantiguopersona= $('#configuracionform').serialize();
function verificaredicionpersona()
{
    if($('#configuracionform').serialize()==formantiguopersona) swpersona='0';
    else swpersona='1';
    
     if($("#nombresconf").val()!= "<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
" || $("#apellidopconf").val()!= "<?php echo $_smarty_tpl->tpl_vars['paterno']->value;?>
" || $("#apellidomconf").val()!= "<?php echo $_smarty_tpl->tpl_vars['materno']->value;?>
")
    {
       swpersonanombres='1';
    }
    else swpersonanombres='0';
       
}


<?php echo '</script'; ?>
> <?php }} ?>
