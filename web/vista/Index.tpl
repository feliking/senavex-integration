<!DOCTYPE html>
<html lang="es-ES">
<head>
{include file="includes/Librerias.tpl"}
</head>
<body> 
<div class="cuerpoinicio" >
    <img id="logo_intro" src="styles/img/logo_intro.png"  >
    <div id="containercaja" >
        <div class="container">
            <div class="row-fluid fadein" id="login">  
                <div class="row-fluid" >
                    <div class="span4 hidden-phone " >                       
                    </div>
                    <div class="span4 contenedorboxloginfecha" >
                        <center>
                        <div id="mensajelogin">  
                            <div  class="boxloginfecha">{$mensajelogin}&nbsp</div> 
                        </div> 
                        </center>
                    </div>
                    <div class="span4 hidden-phone " >                       
                    </div>
                </div>
                <div class="row-fluid" >
                    <div class="span4 hidden-phone" >                  
                    </div>
                    <div class="span4 boxlogin fadein" >
                        <div class="row-fluid" >
                            <div class="span12" >                                        
                                <div class="titulo">Ingresar</div>   
                                <div class="span12">
                                    <center> <span class="letrarelevanteroja" >Exportadores - Importadores</span></center><br>
                                </div>          
                            </div>
                        </div>
                        <form name="iniciarsesion" method="post" id="iniciarsesion" action="index.php" onsubmit="return valida();">
                            <input type="hidden" name="opcion" id="opcion" value="login" />
                            <input type="hidden" name="tarea" id="tarea" value="ingresarSistema" />
                            <input type="hidden" name="fgo" id="fgo" value=0 />
                            <div class="row-fluid " >
                                <div class="span12" >
                                    <input id="usuario" type="text" name="usuario"   placeholder="Usuario" required="true" size="20" maxlength="50" title="Usuario"><br><br>

                                    <input id="clave" type="password" name="clave"  placeholder="Contraseña" required="true" size="20" maxlength="50" title="Contraseña"><br><br>
                                </div>
                            </div>
                            <div class="row-fluid form fadein" >
                                <div class="span6" style="display:none" >
                                    <input id="cancelar" type="button"  value="Cancelar" class="k-primary" style="width:100%"/><br>    
                                </div>
                                <div class="span12" >
                                    <input id="ingresar" type="submit"  value="Ingresar" class="k-primary" style="width:100%"/><br>  
                                </div>
                            </div>
                        </form> 
                        <div class="row-fluid" >
                            <div class="span12" >                                        
                                <center> <span class="letrarelevanteroja" onclick="resetpassword()">Olvid&eacute; mi Contrase&ntilde;a</span></center>      
                            </div>
                        </div>
                    </div>
                    <div class="span4" >                   
                    </div>
                </div>  
            </div>
            <div class="row-fluid fadein" id="resetpassw">
                <div class="row-fluid" >
                    <div class="span4 hidden-phone" >                  
                    </div>
                    <div class="span4 boxlogin fadein" >
                        <div class="row-fluid" >
                            <div class="span12" >                                        
                                <div class="titulo">Solicitar nueva contrase&ntilde;a</div><br>        
                            </div>
                        </div>
                        <form name="formresetpassw" method="post" id="formresetpassw" action="index.php" onsubmit="return valida();">
                            <input type="hidden" name="opcion" id="opcion" value="login" />
                            <input type="hidden" name="tarea" id="tarea" value="resetpass" />
                            <div class="row-fluid " >
                                <div class="span12" >
                                    <input id="passw_email" type="email" name="passw_email"  maxlength="50" placeholder="Correo Electrónico" required  data-required-msg="Ingrese su Carnet de Identidad" ><br><br>
                                    
                                    <input id="passw_ci" type="text" name="passw_ci"  autocomplete=off placeholder="Documento de Identidad"  maxlength="50" required  data-required-msg="Ingrese su Carnet de Identidad"><br><br>

                                </div>
                            </div>
                            <div class="row-fluid form fadein" >
                                <div class="span6" >
                                    <input id="passwcancelar" type="button"  value="Cancelar" class="k-primary" style="width:100%"/><br>    
                                </div>
                                <div class="span6" >
                                    <input id="passwingresar" type="submit"  value="Enviar" class="k-primary" style="width:100%"/><br>  
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="span4" >                   
                    </div>
                    
                </div>  
            </div>
            <div class="row-fluid fadein" id="inicioprincipal">           
                <div class="row-fluid fadein form" style="display:none">
                    <div class="span5 hidden-phone"> 
                    </div>
                    <div class="span2"> 
                        <input id="ingresarp" value="Ingresar"  type="button"  style="width:100%"/>
                    </div>
                    <div class="span5 hidden-phone"> 
                    </div>
                </div>
                <div class="row-fluid form" >
                    <div class="span12 hidden-phone"> 
                    </div>
                </div>
                <div class="row-fluid fadein" id="comentarioregistrate1">
                    <div class="span4 hidden-phone"> 
                    </div>
                    <div class="span4"> 
                        <center><span class="letrarelevante">¿A&uacute;n no esta registrado?</span></center> 
                    </div>
                    <div class="span4 hidden-phone"> 
                    </div>
                </div>
                <div class="row-fluid fadein form" id="comentarioregistrate2">
                    <div class="span4 hidden-phone"> 
                    </div>
                    <div class="span4"> 
                        <center> <span class="letrarelevanteroja" onclick="enviarregistrate()">Registrese aqu&iacute; (SOLO EXPORTADORES)</span></center> 
                    </div>
                    <div class="span4 hidden-phone"> 
                    </div>
                </div>
                <div class="row-fluid fadein form" >
                    <div class="span5 hidden-phone"> 
                    </div>
                    <div class="span2"> 
                        <!--img src="styles/img/ayuda.png" width="100%" onclick="ayuda('registrate')" style="max-width:35px;" class="ayuda" -->
                    </div>
                    <div class="span5 hidden-phone"> 
                    </div>
                </div>
                
            </div>
            <div class="row-fluid fadein" id="registrate">
                <div class="row-fluid" >
                    <div class="span12 fadein" > 
                        <div class="k-block fadein">

                            <div class="k-header"><div class="titulo">Reg&iacute;strate</div></div>
                            <div class="k-cuerpo">   
                            <form name="registrarf" method="post" id="registratef" action="index.php">
                            <input type="hidden" name="opcion" id="opcion" value="login" />
                            <input type="hidden" name="tarea" id="tarea" value="registrarSistemaTemporal" />  
                            <input type="hidden" name="urlexp" id="urlexp" value="{$codigocaptcha}" /> 
                            <div class="row-fluid  form" >
                                <div class="span3" >
                                    <input id="nombre" type="text" name="nombre" placeholder="Nombres"  maxlength="50" required data-required-msg="Ingrese su Nombre" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="span3" >
                                    <input id="apellidop" type="text" name="apellidop"   placeholder="Primer Apellido"  maxlength="50" required data-required-msg="Ingrese su Primer Apellido" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="span3" >
                                   <input id="apellidom" type="text" name="apellidom"   placeholder="Segundo Apellido"   maxlength="50" data-required-msg="Ingrese su Segundo Apellido" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="span3" >
                                   <input id="ci" type="text" name="ci"  value="" autocomplete=off placeholder="Documento de Identidad"  maxlength="50" required  data-required-msg="Ingrese su Carnet de Identidad">
                                </div>
                            </div>
                            <div class="row-fluid  form" >
                                <div class="span3" >
                                   <input id="telf" type="text" name="telf"  value="" placeholder="Numero Telf/Móvil"  maxlength="50" required  data-required-msg="Ingrese su número telefónico fijo o móvil">
                                </div>
                                <div class="span3" >
                                   <input id="email" type="email" name="email"  maxlength="50" placeholder="Correo Electrónico" required  
                                          data-required-msg="Ingrese su Correo Electrónico"
                                          data-available>
                                </div>
                                <div class="span3" >
                                   <div id="fecha" ><span >Fecha de Nacimiento:</span></div>
                                </div>
                                <div class="span3" >
                                   <input id="datepicker" type="date" name="fechanacimiento"   maxlength="50" placeholder="dd/mm/aaaa"  style="width:100%"> <br>
                                   <center><input type="hidden" name="hiddenvalidator" id="hiddenvalidator" data-date data-required-msg="Ingrese su Fecha de Nacimiento" /></center>
                                   
                                </div>
                            </div>
                            <div class="row-fluid  form" >
                                <div class="span4 hidden-phone" >
                                </div>
                                <div class="span2" >
                                   <img src="{$srccaptcha}" id="imgcaptcha" alt="CAPTCHA" style="border-radius:10px;width:100%;">
                                </div>
                                <div class="span2" >
                                    <input id="codigocaptcha" maxlength="10" type="text" class="k-textbox" name="codigocaptcha" placeholder="Ingrese el código" required 
                                           data-captcha
                                           data-required-msg="Por motivos de seguridad ingrese el código" >
                                    
                                <img src="styles/img/refrescar.png" width="100%" onclick="captchaajaxrefrescar()" style="max-width:24px;padding-top:12px;" class="ayuda">
                                
                                </div>
                                <div class="span4 hidden-phone" >
                                </div>
                            </div>
                            <div class="row-fluid  form" >
                                <div class="span4" >
                                </div>
                                <div class="span2" >
                                   <input id="cancelarregistrate" type="button"  value="Cancelar" class="k-primary" style="width:100%"/> 
                                </div>
                                <div class="span2" >
                                   <input id="enviar" type="button"  value="Enviar" class="k-primary" style="width:100%"/> 
                                </div>
                                <div class="span3" >
                                </div>
                                <div class="span1 " >
                                <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('registrate')" style="max-width:35px;" class="ayuda">
                                </div>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid fadein" id="aviso">
                <div class="row-fluid" >
                    <div class="span3 hidden-phone" >             
                    </div>
                    <div class="span6 fadein" > 
                        <div class="k-block fadein"> 
                            <div class="k-header">
                                <div class="row-fluid  form" >
                                    <div class="span12" ><div class="titulo">Aviso</div><br> </div>
                                </div>
                            </div>
                            <div class="k-cuerpo">
                                <div class="row-fluid  form" >
                                    <div class="span1 hidden-phone" ></div>
                                    <div class="span10" >
                                        <p id="p_texto_aviso_correo"> Su <span class="letrarelevante">Usuario</span> y <span class="letrarelevante">Contraseña</span> han sido enviados a su correo electronico 
                                            <span class="letrarelevante" id="correoelectronicor"></span>.

                                      </p> 
                                    </div>  
                                    <div class="span1 hidden-phone" ></div>
                                </div> 
                                <div class="row-fluid  form" >
                                    <div class="span4 hidden-phone" ></div>
                                    
                                    <div class="span4" >
                                        <input id="aceptaraviso" type="submit"  value="Aceptar" class="k-primary" style="width:100%"/> 
                                     </div>
                                    <div class="span4 hidden-phone" ></div>
                                </div> 
                            </div> 
                        </div>
                    </div>
                    <div class="span3 hidden-phone" >             
                    </div>
                </div>
            </div>          
              <div class="row-fluid fadein" id="avisonocorreo">
                <div class="row-fluid" >
                    <div class="span3 hidden-phone" >             
                    </div>
                    <div class="span6 fadein" > 
                        <div class="k-block fadein"> 
                            <div class="k-header">
                                <div class="row-fluid  form" >
                                    <div class="span12" ><div class="titulo">Aviso</div><br> </div>
                                </div>
                            </div>
                            <div class="k-cuerpo">
                                <div class="row-fluid  form" >
                                    <div class="span1 hidden-phone" ></div>
                                    <div class="span10" >
                                        <p> Parece que no se puede enviar a tu correo:<span class="letrarelevante">"<span id="avisoemailt"></span>"</span>, por favor verifica que sea el correcto.
                                      </p> 
                                    </div>  
                                    <div class="span1 hidden-phone" ></div>
                                </div> 
                                <div class="row-fluid  form" >
                                    <div class="span4 hidden-phone" ></div>
                                    
                                    <div class="span4" >
                                        <input id="aceptaravisonocorreo" type="submit"  value="Aceptar" class="k-primary" style="width:100%"/> 
                                     </div>
                                    <div class="span4 hidden-phone" ></div>
                                </div> 
                            </div> 
                        </div>
                    </div>
                    <div class="span3 hidden-phone" >             
                    </div>
                </div>
            </div>           
            <div class="row-fluid fadein" id="barracargando">
                <div class="row-fluid" >
                     <div class="span4"> 
                    </div>
                    <div class="span4" > 
                        <div id="progressBar" style="width:100%;height: 8px;"></div>
                    </div>
                     <div class="span4" > 
                    </div>
                </div>
                <div class="row-fluid" >
                    <div class="span5" > 
                    </div>
                    <div class="span2" > 
                        Espere un momento..
                    </div>
                     <div class="span5" > 
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
</body>
</html>
{*----------------- esto es ara las aytudas-----------------------------------------*}
<div id="ayuda"  style="display:none">
    ayuda Ingreso
</div>
<script>
var varayuda='';
var ayudawindow= $("#ayuda");
function ayuda(controlador)
{
    if(varayuda!=controlador && controlador!='registrate')
    {
       //aqui vario la ayuda de login uy de registrate
    }
    
    if (!$("#ayuda").data("kendoWindow")) { 
        ayudawindow.kendoWindow({
            draggable: true,
            height: "400px",                      
            width: "400px",
            resizable: true,
            actions: [ "Minimize", "Close"],
            animation: {
              close: {
                effects: "fade:out",
                duration: 1000
              },
               open: {
                  effects: "fade:in",
                   duration: 1000
                }
              }
        }).data("kendoWindow");
        ayudawindow.data("kendoWindow").open();
        ayudawindow.data("kendoWindow").center();
    }
    else
    {
        ayudawindow.data("kendoWindow").open();
        ayudawindow.data("kendoWindow").center();
    }
    varayuda=controlador;
}
</script>
{*--------------------------------------------------esto es para el login------------------------------------*}
<script>
//ocultar('login');
$("#ingresarp").kendoButton();
var ingresarp = $("#ingresarp").data("kendoButton");
ingresarp.bind("click", function(e){ 
    $('#logo_intro').addClass('hover');
    $('#containercaja').addClass('hover');
    cambiar('inicioprincipal','login');
}); 

{*------------------------------------------------esto es para el login------------------------------*}
$("#ingresar").kendoButton();
var aceptar = $("#aceptar").data("kendoButton");
$("#usuario").kendoMaskedTextBox({});
$("#clave").kendoMaskedTextBox({});  
var  swiniciarsesion=0;
function valida() /*funcion que valida el usuario antres de enviar*/
{   
    if(swiniciarsesion=='0')
    {   
        if($("#fgo").val()<15)
        {
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=login&tarea=verificarUsuario&usuario='+$("#usuario").val()+'&clave='+$("#clave").val(),
                success: function (data)
                {

                   if(data=='0')
                   {
                      swiniciarsesion=1;
                       $("#iniciarsesion").submit();
                   }
                   else
                   {
                       $("#mensajelogin").html(data);
                       suma=$("#fgo").val() + 1;
                       $("#fgo").val(suma);
                   }
                }
                });
        }
        else { $("#mensajelogin").html('<div class=" inicial fadein">Por favor intente mas tarde</div>');}
            
        return false;
    }
    else
    {   
        swiniciarsesion=0;
        return true;
    }
}
$("#cancelar").kendoButton();
var cancelar = $("#cancelar").data("kendoButton");
cancelar.bind("click", function(e){ 
    $('#containercaja').removeClass('hover'); 
    $('#logo_intro').removeClass('hover');
    cambiar('login','inicioprincipal');
}); 
{*---------------------------------------------esto es para el validator del registrate-----------------------*}
var swe=2;
var emailcache='';
var swcaptcha=2;
var swfecha=0;//0 no es una fecha ,1 no es mayor
var validator = $("#registratef").kendoValidator({
    rules:{  
        captcha: function(input) {
            var captcha = input.data('captcha');
            if(typeof captcha !== 'undefined' && captcha !== false)
            {
                if(swcaptcha==2)
                {
                    captchaajax($("#urlexp").val());
                    return false
                }
                if(swcaptcha==0)
                {
                    return false
                }
                if(swcaptcha==1)
                {
                    //swcaptcha=2;

                    return true

                }
            }
        return true
        },
        date: function(input) {
            var date = input.data('date');
            if(typeof date !== 'undefined' && date !== false)
            {

                 if(isDate($("#datepicker").val()))
                 {   
                     //-------------------------esta parte es para la validacion mayor de 18---------------------------------------------------
                     var record=$("#datepicker").val().trim();
                     var currentdate=new Date();  
                     var day1 = currentdate.getDate();                                          
                     var month1 = currentdate.getMonth();
                     month1++;     
                     var year11 = currentdate.getFullYear()-18;    
                     var record_day1=record.split("/");
                     var sum=record_day1[1]+'/'+record_day1[0]+'/'+record_day1[2]; 
                     var current= month1+'/'+day1+'/'+year11;
                     var d1=new Date(current)
                     var record1 = new Date(sum); 
                     if(record1 > d1)
                     {
                         swfecha=1;
                         return false;
                     }
                     //---------------------------------------------------------------------------------
                     return true
                 }
                 else
                 {
                     return false
                 }
            }
            return true
        },
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
         } 
    },
   messages:{
       email:"Introduzca un Correo Electronico Valido",
       captcha: function(input) { 
            if(swcaptcha==0)
            {
                swcaptcha=2;
               return 'Codigo Incorrecto intente nuevamente.';

            }
            else
            {
                return 'Revisando..';
            }
        },
       date: function(input) {
           if(swfecha==1)
           {
               return 'El registro requiere que usted sea mayor de edad';
           }
           else
           {
               return 'Ingrese una fecha valida';
           }
           swfecha=0;
       },
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
            data: 'opcion=login&tarea=verificarDominioCorreo&email='+mail,
            success: function (data) {
               swe=data;
               emailcache=$("#email").val();
               validator.validateInput($("#email"));
             }
            });
}  
function captchaajax(valor)
{

   $.ajax({             
       type: 'post',
       url: 'index.php',
       data: 'opcion=login&tarea=codigoCaptcha&codigo='+$("#codigocaptcha").val()+'&id_persona='+valor,
       success: function (data) {
          var respuesta = eval('('+data+')');
           if(respuesta[0].suceso=='1')
           {
               swcaptcha=1;

               //swcaptcha=respuesta[0].suceso;
                validator.validateInput($("#codigocaptcha"));
           }
           else
           {  
               swcaptcha=respuesta[0].suceso;
               $("#urlexp").val(respuesta[1].code);
               $('#imgcaptcha').attr('src', respuesta[2].src);
               validator.validateInput($("#codigocaptcha"));
           }

       }
   });
}    
function captchaajaxrefrescar()
{

   $.ajax({             
       type: 'post',
       url: 'index.php',
       data: 'opcion=login&tarea=codigoCaptchaRefrescar',
       success: function (data) {
          var respuesta = eval('('+data+')');
           if(respuesta[0].suceso=='0')
           {
               $("#urlexp").val(respuesta[1].code);
               $('#imgcaptcha').attr('src', respuesta[2].src);
           }
       }
   });
}    
{*---------------to es ara e registrate------------------------------*}

ocultar('registrate'); 
ocultar('aviso');
$("#enviar").kendoButton();
$("#cancelar").kendoButton();

$("#avisob").kendoButton();

var cancelar = $("#cancelar").data("kendoButton");
var enviar = $("#enviar").data("kendoButton");
var avisob = $("#avisob").data("kendoButton");

$("#nombre").kendoMaskedTextBox({});
$("#apellidop").kendoMaskedTextBox({});
$("#apellidom").kendoMaskedTextBox({});
$("#ci").kendoMaskedTextBox({});
$("#telf").kendoMaskedTextBox({});
$("#email").kendoMaskedTextBox({});

 $("#codigocaptcha").kendoMaskedTextBox({
     change: function() {
        swcaptcha = 2;
    }
 });
$("#datepicker").kendoDatePicker({
start: "century"
});
   
$("#cancelarregistrate").kendoButton();
var cancelarregistrate = $("#cancelarregistrate").data("kendoButton");
cancelarregistrate.bind("click", function(e){ 
    mostrar('login');
    $('#containercaja').removeClass('hover'); 
    $('#logo_intro').removeClass('hoveri');
    cambiar('registrate','inicioprincipal');
}); 

function enviarregistrate()
{
    ocultar('login');
    $('#logo_intro').addClass('hoveri');
    $('#containercaja').addClass('hover');
    cambiar('inicioprincipal','registrate');
}
//--------------esto es para ocultar la barraprogersiva
ocultar('barracargando');
$("#progressBar").kendoProgressBar({
                showStatus: false,
                animation: false,
                min: 0,
                max: 100,
                type: "percent",
                complete: function(e) {
                    $("#correoelectronicor").html($('#email').val());
                    cambiar('barracargando','aviso');
                  }
            });

//------------esto es para enviar el registro
$("#enviar").kendoButton();
var enviar = $("#enviar").data("kendoButton");
enviar.bind("click", function(e){
   if(validator.validate())
   {  
       swdevueltaajax=0;
       cambiar('registrate','barracargando');
        var pb = $("#progressBar").data("kendoProgressBar");
            pb.value(0);
            $('#logo_intro').removeClass('hoveri');
            var interval = setInterval(function () {
                
                if (pb.value() < 100) {
                    if(pb.value()==92)
                    {
                        $('#logo_intro').addClass('hoveri');
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
                            $('#logo_intro').addClass('hoveri');
                            $('#avisoemailt').html($('#email').val());
                            cambiar('barracargando','avisonocorreo');
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
            }, 30);            
        //enviamos el ajax de registro
        $.ajax({             
           type: 'post',
           url: 'index.php',
           data: $("#registratef").serialize(),
           success: function (data)
           { 
               if(data==0)
               {
                   
                    swdevueltaajax=1;
               }
               else
               {
                  
                   swdevueltaajax=3;
               }              
           }
        });
   }
}); 
$("#aceptaraviso").kendoButton();
var aceptaraviso = $("#aceptaraviso").data("kendoButton");
aceptaraviso.bind("click", function(e){ 
    $('#containercaja').removeClass('hover'); 
    $('#logo_intro').removeClass('hover');
    cambiar('aviso','inicioprincipal');
    ocultar('comentarioregistrate1');
    ocultar('comentarioregistrate2');
}); 
ocultar('avisonocorreo');
$("#aceptaravisonocorreo").kendoButton();
var aceptaravisonocorreo = $("#aceptaravisonocorreo").data("kendoButton");
aceptaravisonocorreo.bind("click", function(e){ 
    cambiar('avisonocorreo','registrate');
}); 
{*--------------------------------------------para la fecha----------------------------------------*}
{literal}
function isDate(txtDate)
{
  var currVal = txtDate;
  if(currVal == '')
    return false;
  //Declare Regex 
  var rxDatePattern = /^(\d{1,2})(\/|)(\d{1,2})(\/|)(\d{4})$/;
  var dtArray = currVal.match(rxDatePattern); // is format OK?
  if (dtArray == null)
     return false;
  //Checks for mm/dd/yyyy format. 
    dtDay = dtArray[1];
    dtMonth= dtArray[3];
    dtYear = dtArray[5]; 
  if (dtMonth < 1 || dtMonth > 12)
      return false;
  else if (dtDay < 1 || dtDay> 31)
      return false;
  else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31)
      return false;
  else if (dtMonth == 2)
  {
     var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
     if (dtDay> 29 || (dtDay ==29 && !isleap))
          return false;
  }
  return true;
}

  {/literal}
   $("#passw_email").kendoMaskedTextBox({});
    $("#passw_ci").kendoMaskedTextBox({});
    $("#passwcancelar").kendoButton();
    var passwcancelar = $("#passwcancelar").data("kendoButton");
    passwcancelar.bind("click", function(e){ 
        cambiar('resetpassw','login');
    });
    ocultar('resetpassw');
    $("#passwingresar").kendoButton();
    var passwingresar = $("#passwingresar").data("kendoButton");
    passwingresar.bind("click", function(e){ 
        if(validator_resetpassw.validate()){
            
            $.ajax({
                type: 'post',
                url: 'index.php',
                data: $('#formresetpassw').serialize(),
                success: function (data)
                {
                    //alert(data);
                    var dt=eval("("+data+")");
                    //alert(dt[0].causa);
                    if(dt[0].suceso=='0')
                    {
                        //cambiar('avisonocorreo','resetpassw');
                        cambiar('resetpassw','aviso');
                        $('#p_texto_aviso_correo').html(dt[0].causa);
                    }
                    else
                    {
                        cambiar('resetpassw','aviso');
                        $('#p_texto_aviso_correo').html(dt[0].causa);
                    }
                }
                });
        }
    });
    function resetpassword()
    {
        cambiar('login','resetpassw');
    }
    var validator_resetpassw = $("#formresetpassw").kendoValidator({}).data("kendoValidator");
</script>
<style>
    #fecha
    { 
       padding-top: 3%;
    }               
</style>