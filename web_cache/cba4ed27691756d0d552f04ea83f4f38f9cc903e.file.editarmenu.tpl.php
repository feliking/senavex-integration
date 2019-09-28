<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-09 11:29:32
         compiled from "/enex/web1/sitio/web/vista/admPerfil/editarmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21838255457d009bedce204-03225186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cba4ed27691756d0d552f04ea83f4f38f9cc903e' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admPerfil/editarmenu.tpl',
      1 => 1493940884,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21838255457d009bedce204-03225186',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57d009bee13425_32339186',
  'variables' => 
  array (
    'lista_opciones' => 0,
    'lopciones' => 0,
    'lista_menu' => 0,
    'smenu' => 0,
    'lista_usuario' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57d009bee13425_32339186')) {function content_57d009bee13425_32339186($_smarty_tpl) {?><div class="row-fluid " id="ingresarDepositos">
    <div class="span12" >
        <div class="row-fluid" >
            <div class="span1 hidden-phone" ></div>
            <div class="span10">
                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" > Modificar Menu </div>  
                            </div>                                      
                        </div>  
                    </div>
                    
                    <div class="row-fluid  form" id="divDepositos" >
                        <form name="formeditarmenu" id="formeditarmenu" method="post"  action="index.php" >
                            <input type="hidden" name="opcion" id="opcion" value="admPerfil" />
                            <input type="hidden" name="tarea" id="tarea" value="guardar_perfilopciones" />
                            <div class="row-fluid  form" >
                                <div class="span1 hidden-phone" ></div>
                                <div class="span1" >
                                    <input class="span5" type="checkbox" id="checkbox-perfil" name="checkbox-perfil" /> 
                                </div>
                                <div class="span3" >
                                    <input style="width:100%;" id="opciones" name="opciones" required validationMessage="Seleccione una opcion"/>
                                </div>
                                <div class="span3" id="gral_opciones">
                                    <?php  $_smarty_tpl->tpl_vars['lopciones'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lopciones']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_opciones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lopciones']->key => $_smarty_tpl->tpl_vars['lopciones']->value) {
$_smarty_tpl->tpl_vars['lopciones']->_loop = true;
?>
                                        <div class="row-fluid campo form" >
                                            <div class="span8" ><?php echo $_smarty_tpl->tpl_vars['lopciones']->value->descripcion;?>
</div>
                                            <div class="span3" ><input class="span4" type="checkbox" id="check-<?php echo $_smarty_tpl->tpl_vars['lopciones']->value->opcion;?>
" name="check-<?php echo $_smarty_tpl->tpl_vars['lopciones']->value->opcion;?>
" value="<?php echo $_smarty_tpl->tpl_vars['lopciones']->value->opcion;?>
"></div>
                                        </div >
                                    <?php } ?>
                                </div>
                                <div class="span3" id="gral_opciones">
                                    <input style="width:100%;" id="tipo_perfil" name="tipo_perfil" required validationMessage="Seleccione una opcion"/>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="row-fluid fadein" >
                        <div class="span2"></div>
                        <div class="span2"></div>
                        <div class="span2" >
                           <input id="cancelar" type="button" value="Cancelar" class="k-primary" style="width:100%"/>
                        </div>
                        <div class="span2" >
                            <input id="registrar" type="button"  value="Aceptar" class="k-primary" style="width:100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>      
<div id="div_cambio_ventana_menu"></div>
           
          
<?php echo '<script'; ?>
> 
    ocultar('gral_opciones');
    ocultar('checkbox-perfil');
    $("#registrar").kendoButton();
    $("#cancelar").kendoButton();
    var aux_opciones='';
//***************************************************************************************//
    var validator = $("#formeditarmenu").kendoValidator().data("kendoValidator");
    var registrar = $("#registrar").data("kendoButton");
    var cancelar = $("#cancelar").data("kendoButton"); 
    
    cancelar.bind("click", function(e){  
        cerraractualizartab('prueba','admPerfil','lista_Perfil&id_perfil=1'); 
    });
    registrar.bind("click", function(e){
        
        if(validator.validate()){
            //window.open('index.php?'+$('#formeditarmenu').serialize(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
          $.ajax({
                type: 'post',
                url: 'index.php',
                data: $('#formeditarmenu').serialize(),
                success: function (data) {
                    create_ventana_menu(data=='1');
                }
            });
        }
    });
    function create_ventana_menu(estado){
        
        var campo = 
                '<div id="cambio_ventana_menu">'+
                    '<div class="titulo" id="tituloventana">'+(estado? 'Aviso de Registro':'ERROR EN REGISTRO')+'</div><br>'+
                    '<div class="row-fluid form">'+
                    (estado? 
                        '<label id="cambio_texto"><b id="bold_numfact">Se ha realizado el cambio con exito</b></label><br><br>' :
                        '<label id="cambio_texto"><b id="bold_numfact">No se pudo realizar el cambio de registro, porfavor intentelo mas tarde</b></label><br><br>' )+
                        
                    '</div>'+
                    '<div class="row-fluid form">'+
                        '<input id="cambioaceptar" type="button"  value="Aceptar" class="k-primary" style="width:40"/> '+
                    '</div>'+
                '</div>';
        $('#div_cambio_ventana_menu').append(campo);
        
        $("#cambioaceptar").kendoButton();
      
        var cambioaceptar = $("#cambioaceptar").data("kendoButton");
       
       
        cambioaceptar.bind("click", function(e){
            $("#cambio_ventana_menu").data("kendoWindow").close();
            $('#cambio_ventana_menu').remove();
        });
        
        $("#cambio_ventana_menu").kendoWindow({
            draggable: false,
            height: "200px",
            width: estado? "300px": "370px",
            resizable: false,
            modal: false,
            actions: [],
            animation: {
                close: {
                  effects: "fade:out",
                  duration: 1000
                }
            }
        }).data("kendoWindow").center().open();
        
    }
/*****************************************************************************************/
    $("#opciones").kendoComboBox(
    {   placeholder:"SubMenu",
        dataTextField: "descripcion",
        dataValueField: "Id",
        dataSource: [
        <?php  $_smarty_tpl->tpl_vars['smenu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['smenu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['smenu']->key => $_smarty_tpl->tpl_vars['smenu']->value) {
$_smarty_tpl->tpl_vars['smenu']->_loop = true;
?> 
            { descripcion: "<?php echo $_smarty_tpl->tpl_vars['smenu']->value->descripcion;?>
", Id: <?php echo $_smarty_tpl->tpl_vars['smenu']->value->id_perfil;?>
},
        <?php } ?>
        ],
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) { 
                this.text('');
            }else{
                
                mostrar('gral_opciones');
                mostrar('checkbox-perfil');
               
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admPerfil&tarea=perfil_opciones&id_perfil='+this.value(),
                    success: function (data) {     
                        if(data != '-1'){
                            $("#gral_opciones").children().children().children().prop('disabled',true);
                            
                            var dt=eval("("+data+")");
                            $("#gral_opciones").children().children().each(function( index ) {
                                if(index % 2 == 1){
                                   $( this ).children().prop('checked', false);

                                }
                            });
                            
                            for(var i = 0; i < dt[0].opciones.length ; i++){
                                $('#check-'+dt[0].opciones[i]).prop('checked', true);
                            }  
                            
                            if(dt[0].estado == 1){
                                $('#checkbox-perfil').prop('checked',true);
                                //alert('entro');
                            }else{
                               
                                $('#checkbox-perfil').prop('checked',false);
                               // alert('no entro');
                            }
                           // alert(data);
                            tipo_perfil.value(dt[0].tipo);
                            
                            $("#gral_opciones").children().children().children().prop('disabled',false);
                        }else{
                            
                        }
                    }
                });
            }
        }
    });
    var opciones = $("#opciones").data("kendoComboBox");
    
    $("#tipo_perfil").kendoDropDownList({   
        placeholder:"tipo Usuario",
        dataTextField: "descripcion",
        dataValueField: "Id",
        dataSource: [
        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_usuario']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?> 
            { descripcion: "<?php echo $_smarty_tpl->tpl_vars['value']->value->descripcion;?>
", Id: <?php echo $_smarty_tpl->tpl_vars['value']->value->id_tipo_usuario;?>
},
        <?php } ?>
        ],
        change : function (e) {
           
        }
    });
    var tipo_perfil = $("#tipo_perfil").data("kendoDropDownList");

<?php echo '</script'; ?>
>  <?php }} ?>
