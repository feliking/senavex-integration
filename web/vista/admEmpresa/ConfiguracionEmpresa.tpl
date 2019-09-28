<div class="row-fluid  form" >
    <div class="row-fluid "  id="editarempresa" >
        <div class="span12" >
                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" > Configuración</div>  
                            </div>                                      
                        </div>  
                    </div>
                    <div class="row-fluid " >
                        <div class="span3 " ></div>
                        <div class="span1 " >
                            <img  src="styles/img/empresas/{$id_empresa}.{$formato_imagen}" class="imgpersonaalta" id="imgpersonaconf" onError='this.onerror=null;imgendefectoempresaconf(this);' onclick="$('#fotoupload').click();"/>
                            <form id="fotoform" action="index.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="opcion" id="opcion" value="funcionesGenerales" />
                                    <input type="hidden" name="tarea" id="tarea" value="subirimagen" />
                                    <input type="file" name="fotoupload" id="fotoupload"  style="display: none;" accept="image/*"/>
                            </form>
                            <script type="text/javascript"> 
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
                            </script> 
                        </div>     
                        <div class="span8 " >
                            <div class="row-fluid form" >  
                                <div class="span3 parametro" >
                                    Usuario:
                                </div>
                                <div class="span3" >
                                    <form id="usuarioform"> 
                                        <input type="text" class="k-textbox "  placeholder="Usuario"  name="usuarioconf" id="usuarioconf" value="{$usuario}" 
                                        required  data-required-msg="Por favor introduzca un usuario"  
                                        data-availableusuario />
                                    </form>    
                                </div>
                            </div>
                            <form id="contrasenaform">
                            <div class="row-fluid form" > 
                                <div class="span3 parametro" >
                                    Contraseña:
                                </div>
                                <div class="span3" >
                                <input type="password" class="k-textbox "  placeholder="Contraseña"  name="contrasenaconf" id="contrasenaconf"
                                       required data-required-msg="Ingrese su Contraseña"
                                          data-contrasenia/>
                                </div>                                 
                            </div>  
                            
                             <div class="row-fluid form"> 
                                <div class="span3 parametro" >
                                Nueva contraseña:
                                </div>
                                <div class="span3 fadein" >
                                <input type="password" class="k-textbox "  pattern=".{literal}{8,}{/literal}" placeholder="Nueva contraseña"  name="contrasenanuevaconf" id="contrasenanuevaconf"
                                       validationMessage="Ingrese al menos 8 digitos"
                                       required data-required-msg="Ingrese su contraseña."/>
                                </div>                                    
                            </div> 
                             <div class="row-fluid form"> 
                                <div class="span3 parametro" >
                                Repetir nueva contraseña:
                                </div>
                                <div class="span3 fadein" >
                                <input type="password" class="k-textbox "  placeholder="Repetir contraseña"  name="contrasenanuevareptconf" id="contrasenanuevareptconf"
                                 required data-required-msg="Confirmar su contraseña."
                                  data-matches="#contrasenanuevaconf" data-matches-msg="Las Contraseñas no Coinciden"  />
                                </div>
                            </div> 
                            </form>                    
                        </div>
                    </div>    
                    <div class="row-fluid  form" >
                        <div class="span4" >
                        </div>
                        <div class="span2 " >
                         <input id="cancelaredicion" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                        </div> 
                        <div class="span2" >                             
                         <input id="edicionconf" type="button"  value="Editar" class="k-primary" style="width:100%"/>
                        </div>
                        <div class="span3" >
                        </div>
                        <div class="span1 " >
                            <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('configuracionEmpresa')" style="max-width:35px;" class="ayuda">
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
                            <p> <span id="mensajeconfirmacionedicion"> Sus datos se cambiaron correctamente.</span> 
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
</div> 
<script> 
ocultar('confirmaredicion');
var swcontrasena='0';
var swusuario='0';
var swfoto='0';

$("#aceptaredicion").kendoButton();
var aceptaredicion = $("#aceptaredicion").data("kendoButton");
aceptaredicion.bind("click", function(e){
    remover(tabStrip.select()); 
});
//---------------para la contraseña-----------------------------
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
 //----------------------para las fotos-------------------------------
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
                document.getElementById("imagenempresacabecera").src='styles/img/empresas/'+respuesta[0].id_empresa+'.'+respuesta[0].formato_imagen+'?'+d.getTime();
                cambiar('editarempresa','confirmaredicion');
            }
            else
            {
                alert(respuesta[1].suceso);
            }
        }
    });
});
//---------------- 
$("#contrasenanuevareptconf").kendoMaskedTextBox({
    change: function () { 
        swcontrasena='1';
    }
 });
 $("#contrasenanuevaconf").kendoMaskedTextBox({
    change: function () { 
        swcontrasena='1';
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

 //-----------//-------------------------estos son los validadores para el usuairo y la contrasenia joj jojoj
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
//--------------------------------buttosn---------------------
$("#cancelaredicion").kendoButton();
var cancelaredicion = $("#cancelaredicion").data("kendoButton");
cancelaredicion.bind("click", function(e){   
    remover(tabStrip.select());  
}); 
$("#edicionconf").kendoButton();
var edicionconf = $("#edicionconf").data("kendoButton");

//--------------------para verificar el usuario----------------------
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
                    if($("#usuarioconf").val()=="{$usuario}")
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
//---------para el registro-------------------
edicionconf.bind("click", function(e){  
    //---- esta parte es para todots los datos de la empresa y o usuario
    if((swusuario=='1' && validatorusuarioform.validate()) || (swcontrasena=='1' && validatorcontrasenaform.validate())
        || swfoto=='1')
    {
        
        if(swfoto=='1')
        {
            $( "#fotoform" ).submit();
        }   
        var parametros=''; 
        if(swusuario=='1')
        {
            parametros='&nuevousuario='+$("#usuarioconf").val();
        }
        if(swcontrasena=='1')
        {
            parametros=parametros+'&nuevacontrasena='+$("#contrasenanuevaconf").val();
        }
        if(swusuario=='1' || swcontrasena=='1' )//preguntamos si la foto es la unica que se cambio
        {
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data:'opcion=admEmpresa&tarea=editarUsuarioEmpresa'+parametros,
                success: function (data) { 
                    var respuesta = eval('('+data+')');
                    if(respuesta[0].suceso=='0')
                    {
                        cambiar('editarempresa','confirmaredicion');
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
//----------------------------------
var usuarioconf = $("#usuarioconf").data("kendoMaskedTextBox");
$("#usuarioconf").kendoMaskedTextBox({
    change: function () { 
        if(this.value()!="{$usuario}")//es para preguntar si el usuario es distinto del inicial
        {
            swusuario='1';// para avisra que el usuairo se a mofdificado
        }
        else
        {
            swusuario='0';
        }
    }
 });
</script> 