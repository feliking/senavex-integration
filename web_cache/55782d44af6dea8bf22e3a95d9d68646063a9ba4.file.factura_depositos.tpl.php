<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-05 10:18:58
         compiled from "/enex/web1/sitio/web/vista/ProForma/factura_depositos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10301734755852f3535f8026-08079096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55782d44af6dea8bf22e3a95d9d68646063a9ba4' => 
    array (
      0 => '/enex/web1/sitio/web/vista/ProForma/factura_depositos.tpl',
      1 => 1493940911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10301734755852f3535f8026-08079096',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5852f3536070d7_84583321',
  'variables' => 
  array (
    'id_fact' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5852f3536070d7_84583321')) {function content_5852f3536070d7_84583321($_smarty_tpl) {?><div class="row-fluid" id="factura_depositos<?php echo $_smarty_tpl->tpl_vars['id_fact']->value;?>
" name="factura_depositos<?php echo $_smarty_tpl->tpl_vars['id_fact']->value;?>
" >
    <div class="titulo" > DEPOSITOS </div>
    <div class="k-block fadein">
        <div class="k-cuerpo" id="contenido<?php echo $_smarty_tpl->tpl_vars['id_fact']->value;?>
" name="contenido<?php echo $_smarty_tpl->tpl_vars['id_fact']->value;?>
">

        </div>
    </div>
</div>
        
<?php echo '<script'; ?>
>
    $.ajax({
        type: 'post',
        url: 'index.php',
        data: 'opcion=admDeposito&tarea=verDepositosPorFactura&id_factura=<?php echo $_smarty_tpl->tpl_vars['id_fact']->value;?>
',
        success: function (data) {
            var campo = '';
            var dt=eval("("+data+")");
            for(var i=0; i<dt.length; i++){
                campo += '<div class="row-fluid form ">'+ 
                            '<div class="span2 parametro" >Fecha Depósito</div>'+
                            '<div class="span1 campo">'+dt[i].fecha+'</div>'+
                            '<div class="span1 parametro" >Código Depósito</div>'+
                            '<div class="span1 campo" >'+dt[i].codigo+'</div>'+
                            '<div class="span1 parametro" >Monto Depósito</div>'+
                            '<div class="span1 campo">'+dt[i].monto+'</div> '+
                            '<div class="span1 parametro" >Observación</div>'+
                            '<div class="span4 campo">'+dt[i].descripcion+'</div>'+
                        '</div>';
            }
            $('#contenido<?php echo $_smarty_tpl->tpl_vars['id_fact']->value;?>
').append(campo);
        }
    });
<?php echo '</script'; ?>
><?php }} ?>
