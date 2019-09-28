<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-06 16:25:28
         compiled from "/enex/web1/sitio/web/vista/admPlanilla/planilla.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214012851559354cfa427542-24579067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '116f751d5ff2cd0eabb3fae65aa573be0cea6d2d' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admPlanilla/planilla.tpl',
      1 => 1499372377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214012851559354cfa427542-24579067',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59354cfa434821_98548272',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59354cfa434821_98548272')) {function content_59354cfa434821_98548272($_smarty_tpl) {?><div class="row-fluid  form" >
    <div class="row-fluid "  id="planilla" >
        <div class="span12" >
            <div class="k-block fadein">
                
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > PLANILLAS </div>
                        </div>
                    </div>
                </div>
                
                <div class="row-fluid  form" >
                    <div class="span4" hidden-phone></div>
                    <div class="span4" >
                        <input style="width:100%;" id="tipo" name="tipo" required validationMessage="SELECCIONE TIPO DE PLANILLA">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
    $("#tipo").kendoComboBox({
        placeholder:"SELECCIONE TIPO DE PLANILLA",
        dataTextField: "text",
        dataValueField: "value",
        dataSource: [
                        { text: "CERTIFICADO DE ORIGEN", value: "1", isDeleted: false},
                        { text: "DECLARACION JURADA DE ORIGEN", value: "2", isDeleted: false },
                        { text: "ANULACION DE C.O.", value: "3" }
                    ],
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text('');

            }else{

                if(this.value()==1){
                    cerraractualizartab('Planilla C.O.','admPlanilla','show_planilla_co');
                }
                if(this.value()==2){
                    cerraractualizartab('Planilla DDJJ','admPlanilla','show_planilla_ddjj');
                }
                if(this.value()==3){
                    cerraractualizartab('Planilla Anulacion C.O.','admPlanilla','show_anulacion_co');
                }

            }
        }
    });
    //$("#tipo").kendoComboBox().dataSource.get(2).set("isDeleted", true);
        
    
<?php echo '</script'; ?>
>
<?php }} ?>
