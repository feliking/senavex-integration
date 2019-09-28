<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-04 19:42:02
         compiled from "/enex/web1/sitio/web/vista/admAdmGeneral/EnvioBloque.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1179549883590bbc4a1ac3f8-08788760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fffb0627228c8bf191a141a0f29b0fc1afbc64fc' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admAdmGeneral/EnvioBloque.tpl',
      1 => 1493940870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1179549883590bbc4a1ac3f8-08788760',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_590bbc4a1bccc8_95147538',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590bbc4a1bccc8_95147538')) {function content_590bbc4a1bccc8_95147538($_smarty_tpl) {?><html >
<head>
    <!--link rel="stylesheet" href="//kendo.cdn.telerik.com/2016.2.504/styles/kendo.common-material.min.css" /-->
    <?php echo $_smarty_tpl->getSubTemplate ("includes/Librerias.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<div class="row-fluid "  id="registrofactura" >
    <div class="span12" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="row-fluid  form" >
                    <div class="span12" >
                        <div class="titulonegro" >ADMINISTRACI&Oacute;N GENERAL</div>  
                    </div>                                      
                </div>  
            </div>                
                <div class="row-fluid form" >
                    <div class="span8" >
                        Actualización en bloque de todas las empresas registradas en el VORTEX
                    </div> 
                    <div class="span4" >
                        <input id="registrarfactura" type="button" value="ENVIAR EN BLOQUE" class="k-primary" style="width:50%"/> <br>
                    </div> 
                </div>
                        
        </div>
    </div>
</div>  

<?php echo '<script'; ?>
>  
$("#registrarfactura").kendoButton();
var addinsumofactura = $("#registrarfactura").data("kendoButton");
addinsumofactura.bind("click", function(e){             
   
   $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=admAdmGeneral&tarea=envia_bloque',
                success: function (data)
                {
                    alert("¡La tarea termino con exito!");
                }
                });
   
});

<?php echo '</script'; ?>
>  
<?php }} ?>
