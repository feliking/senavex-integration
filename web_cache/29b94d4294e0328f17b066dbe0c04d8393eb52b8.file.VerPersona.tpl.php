<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-01-16 16:14:12
         compiled from "/enex/web1/sitio/web/vista/admPersona/VerPersona.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131693588257cedb0888bb91-70820721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29b94d4294e0328f17b066dbe0c04d8393eb52b8' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admPersona/VerPersona.tpl',
      1 => 1547669590,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131693588257cedb0888bb91-70820721',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cedb08936a58_27002111',
  'variables' => 
  array (
    'persona' => 0,
    'expedido' => 0,
    'nacionalidad' => 0,
    'firmas' => 0,
    'firma' => 0,
    'solicitarfirma' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cedb08936a58_27002111')) {function content_57cedb08936a58_27002111($_smarty_tpl) {?><div class="row-fluid "  id="editarpersona" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="row-fluid  form" >
                <div class="span12" >
                    <div class="titulonegro" > Datos de la Persona</div>  
                </div>                                      
            </div>  
        </div>
        <div class="k-cuerpo" id="divpersona<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
">
            <div class="row-fluid " >
                <div class="span1 " >
                    <img  src="styles/img/personal/<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
.<?php echo $_smarty_tpl->tpl_vars['persona']->value->formato_imagen;?>
" class="imgpersonaalta" id="imgpersonaconf" onError='this.onerror=null;imgendefectopersona(this);'/>
                </div>
                <div class="span11" > 
                    <div class="row-fluid " >
                        <div class="span2 parametro" >
                            Nombre:
                        </div> 
                        <div class="span5 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value->nombres;?>
 <?php echo $_smarty_tpl->tpl_vars['persona']->value->paterno;?>
 <?php echo $_smarty_tpl->tpl_vars['persona']->value->materno;?>

                        </div> 
                        <div class="span2 parametro" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value->id_tipo_documento;?>
:
                        </div> 
                        <div class="span3 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value->numero_documento;?>
  <?php echo $_smarty_tpl->tpl_vars['expedido']->value;?>

                        </div> 
                    </div>          
                    <div class="row-fluid " >
                        <div class="span2 parametro" >
                            Nacionalidad:
                        </div> 
                        <div class="span2 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['nacionalidad']->value;?>
 
                        </div> 
                        <!--div class="span1 parametro" >
                            Ciudad:
                        </div> 
                        <div class="span2 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value->ciudad;?>
 
                        </div> 
                        <div class="span1 parametro" >
                           Direcci&oacute;n:
                        </div> 
                        <div class="span4 campo" >
                             <?php echo $_smarty_tpl->tpl_vars['persona']->value->direccion;?>

                        </div-->
                    </div>   
                    <div class="row-fluid " >
                        <div class="span2 parametro" >
                            Correo Electr&oacute;nico:
                        </div> 
                        <div class="span3 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value->email;?>
 
                        </div> 
                        <!--div class="span2 parametro" >
                            Numero de Contacto:
                        </div> 
                        <div class="span2 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value->numero_contacto;?>
 
                        </div--> 
                         <div class="span1 parametro" >
                           Genero:
                        </div> 
                        <div class="span2 campo" >
                             <?php if ($_smarty_tpl->tpl_vars['persona']->value->genero==1) {?>Masculino<?php } else { ?>Femenino<?php }?> 
                        </div>
                    </div>
                    <div class="row-fluid " >
                        <?php $_smarty_tpl->tpl_vars["ds_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['persona']->value->direccion, null, 0);?>
                        <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Show.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </div>
                </div>                
            </div>
        <?php if ($_smarty_tpl->tpl_vars['firmas']->value) {?>
            <div class="row-fluid form" >
                <div class="barra" ></div> 
            </div> 
            <div class="row-fluid form" >
                <div class="span12 " >
                    <?php  $_smarty_tpl->tpl_vars['firma'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['firma']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['firmas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['firma']->key => $_smarty_tpl->tpl_vars['firma']->value) {
$_smarty_tpl->tpl_vars['firma']->_loop = true;
?> 
                        <div class="contentfirma" id="fotofirma<?php echo $_smarty_tpl->tpl_vars['firma']->value->id_firma;?>
">
                            <img  src="styles/img/firmas/<?php echo $_smarty_tpl->tpl_vars['firma']->value->id_firma;?>
.png"  class="imgfirma "/>
                            <span class="firmamodal" onclick="eliminarFirma('<?php echo $_smarty_tpl->tpl_vars['firma']->value->id_firma;?>
');">
                                <span class="firmaeliminar">
                                    Eliminar
                                </span>
                            </span>
                            <span class="firmafecha">
                                FIRMA: <?php echo $_smarty_tpl->tpl_vars['firma']->value->fecha;?>

                            </span>
                        </div>
                    <?php } ?> 
                </div> 
            </div> 
        <?php } else { ?>
            <div class="row-fluid form" >
                <div class="barra" ></div> 
            </div> 
            <div class="row-fluid form" >
                <div class="span12 " >
                    <center>
                        <span class='terminos letrarelevante' id='guardarfirmaspan' onclick="cerraractualizartab('Guardar Firma','admPersona','guardarFirma&id_persona=<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
')" >
                            Guardar firma.
                        </span>
                        <?php echo '<script'; ?>
>
                            var box1 = document.getElementById('guardarfirmaspan')
                             box1.addEventListener('touchend', function(e){
                                anadir('Guardar Firma','admPersona','guardarFirma&id_persona=<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
')
                            }, false)
                        <?php echo '</script'; ?>
>   
                    </center>
                </div> 
            </div> 
           
        <?php }?> 
        
        <?php if ($_smarty_tpl->tpl_vars['persona']->value->firma==1&&$_smarty_tpl->tpl_vars['solicitarfirma']->value) {?>
            <div class="row-fluid fadein" id="divsolicitarfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
">
                <div class="span5" ></div>
                <div class="span2" >
                    <input id="solicitarfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
" type="button"  value="Solicitar Firma" class="k-primary" style="width:100%"/>
                </div>
                <div class="span5" ></div>
            </div> 
        <?php }?>
        </div>
        <div class="k-cuerpo" id="divconfirmacion<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
">
            <div class="row-fluid " >
                <div class="span12 form" >
                    Esta seguro de eliminar la firma de "<?php echo $_smarty_tpl->tpl_vars['persona']->value->nombres;?>
 <?php echo $_smarty_tpl->tpl_vars['persona']->value->paterno;?>
 <?php echo $_smarty_tpl->tpl_vars['persona']->value->materno;?>
". Si el usuario se queda sin firmas la plataforma le solcitara una.
                </div>                
            </div>
            <div class="row-fluid fadein" >
                <div class="span4" ></div>
                <div class="span2" >
                    <input id="cancelarelimfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
" type="button"  value="Cancelar" class="k-primary" style="width:100%"/>
                </div>
                <div class="span2" >
                    <input id="eliminarfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
" type="button"  value="Eliminar" class="k-primary" style="width:100%"/>
                </div>
                <div class="span4" ></div>
            </div> 
        </div>
        <div class="k-cuerpo" id="divaceptareliminacion<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
">
            <div class="row-fluid " >
                <div class="span12 form" >
                    <span id="respfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
"></span>
                </div>                
            </div>
            <div class="row-fluid fadein" >
                <div class="span5" ></div>
                <div class="span2" >
                    <input id="aceptremsig<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
                </div>
                <div class="span5" ></div>
            </div> 
        </div>
    </div>    
</div>  
<?php echo '<script'; ?>
> 
ocultar('divconfirmacion<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
');
var firmaeliminar;
function eliminarFirma(id_firma)
{
   cambiar('divpersona<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
','divconfirmacion<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
');  
   firmaeliminar=id_firma;
}
$("#cancelarelimfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
").kendoButton();
var cancelarelimfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
 = $("#cancelarelimfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
").data("kendoButton");
cancelarelimfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
.bind("click", function(e){
    cambiar('divconfirmacion<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
','divpersona<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
');
});
$("#eliminarfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
").kendoButton();
var eliminarfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
 = $("#eliminarfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
").data("kendoButton");
eliminarfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
.bind("click", function(e){
    $.ajax( {
        url: 'index.php',
        type: 'post',
        data:'opcion=admPersona&tarea=eliminarFirma&id_firma='+firmaeliminar,
        success: function (data) { 
            var respuesta = eval('('+data+')');
            if(respuesta[0].suceso=='0') ocultar('fotofirma'+firmaeliminar);
            else  firmaeliminar=null;
            $('#respfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
').html(respuesta[0].msg);
            cambiar('divconfirmacion<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
','divaceptareliminacion<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
');
        }
    });
});
//---------------for accept elimination-------------------------------
ocultar('divaceptareliminacion<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
');
$("#aceptremsig<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
").kendoButton();
var aceptremsig<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
 = $("#aceptremsig<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
").data("kendoButton");
aceptremsig<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
.bind("click", function(e){
    if (firmaeliminar==null)
    {
        remover(tabStrip.select());
    }
    else
    {
        cambiar('divaceptareliminacion<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
','divpersona<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
');
    }
    
});
<?php if ($_smarty_tpl->tpl_vars['persona']->value->firma==1) {?>
//--------------para solicitar firma---------------
$("#solicitarfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
").kendoButton();
var solicitarfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
 = $("#solicitarfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
").data("kendoButton");
solicitarfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
.bind("click", function(e){
    firmaeliminar=0
    $('#respfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
').html('Se Envio una solicitud para que el exportador/a "<?php echo $_smarty_tpl->tpl_vars['persona']->value->nombres;?>
 <?php echo $_smarty_tpl->tpl_vars['persona']->value->paterno;?>
 <?php echo $_smarty_tpl->tpl_vars['persona']->value->materno;?>
" registre una nueva firma.');
    cambiar('divpersona<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
','divaceptareliminacion<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
');
    ocultar('divsolicitarfirma<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
');
    $.ajax( {
        url: 'index.php',
        type: 'post',
        data:'opcion=admPersona&tarea=solicitarFirma&id_persona=<?php echo $_smarty_tpl->tpl_vars['persona']->value->id_persona;?>
',
        success: function (data) {   
        }
    });
});
<?php }?>
<?php echo '</script'; ?>
> <?php }} ?>
