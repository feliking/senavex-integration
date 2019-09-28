<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-06-12 09:54:58
         compiled from "/enex/web1/sitio/web/vista/admEstadoEmpresas/EstadoEmpresa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7991932725d010432b82cd7-87140871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e06469a180fd92ac30aa6058dbea8ed836b9dfd8' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admEstadoEmpresas/EstadoEmpresa.tpl',
      1 => 1493940878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7991932725d010432b82cd7-87140871',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'empresa' => 0,
    'id' => 0,
    'ico' => 0,
    'personal' => 0,
    'persona' => 0,
    'desbloquear' => 0,
    'id_empresa' => 0,
    'id_persona' => 0,
    'nombre' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d010432ca2104_60005843',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d010432ca2104_60005843')) {function content_5d010432ca2104_60005843($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(("em").($_smarty_tpl->tpl_vars['empresa']->value->id_empresa), null, 0);?> 
    <div class="row-fluid "  id="empresarestriccion<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > <?php echo $_smarty_tpl->tpl_vars['empresa']->value->razon_social;?>
</div>  
                        </div>                                      
                    </div>  
                </div>
                <div class="row-fluid ">
                    <div class="span2 parametro" >
                        Razon Social:
                    </div>     
                    <div class="span10 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->razon_social;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        Nombre Comercial:
                    </div>     
                    <div class="span10 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->nombre_comercial;?>
 
                    </div>
                </div>
                <div class="row-fluid " >              
                    <div class="span2 parametro" >
                        Nit:
                    </div>     
                    <div class="span4 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->nit;?>

                    </div> 
                    <div class="span2 parametro" >
                        Codigo Nit:
                    </div>     
                    <div class="span4 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->certificacionnit;?>

                    </div> 
                </div>
                <?php if ($_smarty_tpl->tpl_vars['empresa']->value->matricula_fundempresa||$_smarty_tpl->tpl_vars['empresa']->value->menor_cuantia=="1"||$_smarty_tpl->tpl_vars['empresa']->value->frecuente!='1') {?>
                <div class="row-fluid " >
                     <?php if ($_smarty_tpl->tpl_vars['empresa']->value->matricula_fundempresa) {?>
                        <div class="span2 parametro" >
                            Nro. FundaEmpresa:
                        </div>     
                        <div class="span2 campo" >
                           <?php echo $_smarty_tpl->tpl_vars['empresa']->value->matricula_fundempresa;?>

                        </div> 
                    <?php }?>
                    
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->oea) {?>
                            <div class="span4" >
                                <b>OPERADOR ECON&Oacute;MICO AUTORIZADO</b>
                            </div>  
                    <?php }?>   
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->menor_cuantia=="1") {?>
                            <div class="span4" >
                               <b>Empresa registrada de menor cuantia.</b>
                            </div>  
                    <?php }?>  
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->frecuente!="1") {?>
                            <div class="span4" >
                               <b>Exportador no frecuente.</b>
                            </div>  
                    <?php }?> 
                </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['empresa']->value->ruex) {?>
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                       Ruex:
                    </div>     
                    <div class="span2 campo" >
                         BO<?php echo $_smarty_tpl->tpl_vars['empresa']->value->ruex;?>

                    </div>  
                    <div class="span2 parametro" >
                        Vigencia:
                    </div>     
                    <div class="span2 campo" >
                       <?php echo $_smarty_tpl->tpl_vars['empresa']->value->vigencia;?>
                   
                    </div> 
                    <div class="span2 parametro" >
                        Fecha Vigencia:
                    </div>     
                    <div class="span2 campo" >
                      <?php echo $_smarty_tpl->tpl_vars['empresa']->value->fecha_renovacion_ruex;
if ($_smarty_tpl->tpl_vars['empresa']->value->estado==10) {?> <span class='letrarelevanteroja'>Vencido</span><?php }?> 
                    </div> 
                </div>
                <?php }?>
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                       Categoria:
                    </div>     
                    <div class="span2 campo" >
                         <?php echo $_smarty_tpl->tpl_vars['empresa']->value->idcategoria_empresa;?>

                    </div>                      
                    <div class="span2 parametro" >
                        Actividad Economica:
                    </div>     
                    <div class="span2 campo" >
                      <?php echo $_smarty_tpl->tpl_vars['empresa']->value->idactividad_economica;?>

                    </div> 
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->idtipo_empresa) {?>      
                        <div class="span2 parametro" >
                            Tipo de Empresa:
                        </div>     
                        <div class="span2 campo" >
                           <?php echo $_smarty_tpl->tpl_vars['empresa']->value->idtipo_empresa;?>
                   
                        </div> 
                    <?php }?>
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                        <b>Ciudad:</b>
                    </div>     
                    <div class="span2 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->ciudad;?>

                    </div>
                    <div class="span2 parametro" >
                       <b> Numero de Contacto:</b>
                    </div>     
                    <div class="span2 campo" >
                       <?php echo $_smarty_tpl->tpl_vars['empresa']->value->numero_contacto;?>

                    </div> 
                    <div class="span1 parametro" >
                        <b> Fax:</b>
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->fax;?>

                    </div>                       
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                        <b>Departamento:</b>
                    </div>     
                    <div class="span2 campo" >
                      <?php echo $_smarty_tpl->tpl_vars['empresa']->value->iddepartamento_procedencia;?>

                    </div>
                    <div class="span2 parametro" >
                        <b>Direccion:</b>
                    </div>     
                    <div class="span2 campo" >
                       <?php echo $_smarty_tpl->tpl_vars['empresa']->value->direccion;?>

                    </div>
                    <div class="span1 parametro" >
                        <b>Email:</b>
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->email;?>

                    </div>
                </div>
                
                <?php if ($_smarty_tpl->tpl_vars['empresa']->value->email_secundario||$_smarty_tpl->tpl_vars['empresa']->value->direccionfiscal||$_smarty_tpl->tpl_vars['empresa']->value->pagina_web) {?>
                <div class="row-fluid  form" >
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->email_secundario) {?>
                        <div class="span2 parametro" >
                           <b> Email Secundario:</b>
                        </div>     
                        <div class="span2 campo" >
                           <?php echo $_smarty_tpl->tpl_vars['empresa']->value->email_secundario;?>

                        </div>  
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->direccionfiscal) {?>
                        <div class="span2 parametro" >
                           <b> Domicilio Fiscal:</b>
                        </div>     
                        <div class="span2 campo" >
                           <?php echo $_smarty_tpl->tpl_vars['empresa']->value->direccionfiscal;?>

                        </div> 
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->pagina_web) {?>
                            <div class="span2 parametro" >
                              <b>Pagina:</b>
                            </div>     
                            <div class="span2 campo" >
                                <?php echo $_smarty_tpl->tpl_vars['empresa']->value->pagina_web;?>

                            </div>  
                    <?php }?>     
                </div>
                <?php }?>     
                
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>           
                <div class="row-fluid  form" >
                    <div class="span3 parametro" >
                        <b>Rubro de Exportaciones:</b>
                    </div>     
                    <div class="span9 campo" >
                       <?php echo $_smarty_tpl->tpl_vars['empresa']->value->idrubro_exportaciones;?>

                    </div>  
                </div>
                <?php if ($_smarty_tpl->tpl_vars['ico']->value->ico) {?>
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            <b>Numero ICO:</b>
                        </div>     
                        <div class="span9 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['ico']->value->ico;?>

                        </div>  
                    </div>
                <?php }?>  
                <?php if ($_smarty_tpl->tpl_vars['empresa']->value->nim) {?>
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            <b>Numero de Identificación Minera:</b>
                        </div>     
                        <div class="span9 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['empresa']->value->nim;?>

                        </div>  
                    </div>
                <?php }?>  
                <?php if (count($_smarty_tpl->tpl_vars['personal']->value)!=0) {?>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid" >
                    <div class="span12 parametro" >
                        <center>Personal de la Empresa</center>
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <?php  $_smarty_tpl->tpl_vars['persona'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['persona']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['personal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['persona']->key => $_smarty_tpl->tpl_vars['persona']->value) {
$_smarty_tpl->tpl_vars['persona']->_loop = true;
?>
                    <div class="row-fluid" >
                        <div class="span2 parametro" >
                          Nombre:
                        </div>     
                        <div class="span4 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value['nombres'];?>
 
                        </div>  
                        <div class="span1 parametro" >
                          Documento:
                        </div>     
                        <div class="span2 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value['numero_documento'];?>
 
                        </div>  
                        <div class="span1 parametro" >
                          Perfil:
                        </div>     
                        <div class="span2 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value['perfil'];?>
 
                        </div>  
                    </div> 
                <?php } ?>
                <?php }?>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <form id="solicitudform<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                    <div class="row-fluid form" >
                        <div class="span2" > </div>
                            <div class="span8" >
                                <textarea id="camposmotivo<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="k-textbox " style="width:100%" required placeholder='Ingrese los motivos por los cuales <?php if ($_smarty_tpl->tpl_vars['desbloquear']->value=='1') {?>desbloqueara a la empresa "<?php echo $_smarty_tpl->tpl_vars['empresa']->value->razon_social;?>
"<?php } else { ?>bloqueara de todo acceso a la empresa "<?php echo $_smarty_tpl->tpl_vars['empresa']->value->razon_social;?>
"<?php }?>.'
                                          validationMessage="Ingrese sus motivos."></textarea>
                            </div>  
                        <div class="span2" ></div>
                    </div> 
                </form>                          
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid  form" >
                        <div class="span3" >
                        </div>
                        <div class="span3" >
                        <input id="cancelarrestricion<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="button" value="Cancelar" class="k-primary" style="width:100%"/>
                        </div>
                        <div class="span3" >
                        <input id="restringirempresa<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="button"  value="<?php if ($_smarty_tpl->tpl_vars['desbloquear']->value=='1') {?>Desbloquear<?php } else { ?>Bloquear<?php }?>" class="k-primary" style="width:100%"/> 
                        </div>
                        <div class="span2" >
                        </div>
                        <div class="span1 " >
                            <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('restringirEmpresa')" style="max-width:35px;" class="ayuda">
                        </div>
                </div>
            </div>
        </div>
    </div>                       
  
 <?php echo $_smarty_tpl->getSubTemplate ("avisos/firmaDigital.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<?php echo '<script'; ?>
>           

//------------------------------para los botones------------------------------------
$("#cancelarrestricion<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").kendoButton();
$("#restringirempresa<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").kendoButton();
var cancelarrestricion<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 = $("#cancelarrestricion<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").data("kendoButton");
var restringirempresa<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 = $("#restringirempresa<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").data("kendoButton");
var solicitudform<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 = $("#solicitudform<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").kendoValidator().data("kendoValidator");
cancelarrestricion<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.bind("click", function(e){             
    remover(tabStrip.select());
}); 
restringirempresa<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.bind("click", function(e){   
    if(solicitudform<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.validate())
    {
    /*    cambiar('empresarestriccion','firmarestriccionempresa');
        generarPin('<?php echo $_smarty_tpl->tpl_vars['id_empresa']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['id_persona']->value;?>
','<?php if ($_smarty_tpl->tpl_vars['desbloquear']->value=="1") {?>11<?php } else { ?>10<?php }?>');*/
        
         cambiar('empresarestriccion<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
','firmadigital<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');
        generarPin('<?php echo $_smarty_tpl->tpl_vars['id_empresa']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['id_persona']->value;?>
','<?php if ($_smarty_tpl->tpl_vars['desbloquear']->value=="1") {?>11<?php } else { ?>10<?php }?>');   
        cambiarRedaccionFirma<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
(<?php if ($_smarty_tpl->tpl_vars['desbloquear']->value=="1") {?>11<?php } else { ?>10<?php }?>,'de <?php if ($_smarty_tpl->tpl_vars['desbloquear']->value=="1") {?>Desbloqueo de un Empresa<?php } else { ?>Bloqueo de una Empresa<?php }?>', <?php if ($_smarty_tpl->tpl_vars['desbloquear']->value=="1") {?>
                            'habilito la empresa <span class="letrarelevante">"<?php echo $_smarty_tpl->tpl_vars['empresa']->value->razon_social;?>
"</span>'
                            <?php } else { ?>
                            'restrinjo a la empresa <span class="letrarelevante">"<?php echo $_smarty_tpl->tpl_vars['empresa']->value->razon_social;?>
"</span>'                  
                            <?php }?>); 
    }
}); 


/*
ocultar('firmarestriccionempresa');
//-----------------------------------esto es para la firma del ruex-------------------------------
$("#cancelafirmarres").kendoButton();
$("#firmarres").kendoButton();
var cancelafirmarres = $("#cancelafirmarres").data("kendoButton");
var firmarres = $("#firmarres").data("kendoButton");
cancelafirmarres.bind("click", function(e){  
    cambiar('firmarestriccionempresa','empresarestriccion');
    borrarPin('<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
');
});
firmarres.bind("click", function(e){  
    if(formfirmares.validate())
    { 
       $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admEstadoEmpresas&tarea=<?php if ($_smarty_tpl->tpl_vars['desbloquear']->value=='1') {?>desbloquearEmpresa<?php } else { ?>bloquearEmpresa<?php }?>&id_empresa='+<?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
+'&id_persona='+<?php echo $_smarty_tpl->tpl_vars['id_persona']->value;?>
+'&camposmotivo='+$("#camposmotivo").val(),
            success: function (data) { 
                var respuesta = eval('('+data+')');
                if(respuesta[0].suceso=='1')
                {
                    firmarPin('Empresas','admEstadoEmpresas','estadoEmpresas','<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
',respuesta[0].id_bloqueo);                   
                } 
                else
                {
                    alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                }
             }
        });
   }
}); 
//-----------esto es para la valicdacion del pin****************************************
    var swfirmares=2;        
    var firmarescache='';
    var formfirmares = $("#formfirmares").kendoValidator({
       rules:{ 
           firmarres: function(input) { 
             var validate = input.data('firmarres');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    if (firmarescache !== $("#pinfirmares").val()) 
                     {
                    verificarPinRes($("#pinfirmares").val());                    
                    return false;
                    }
                    if(swfirmares==1)
                    {
                         return true;
                    }
                    if(swfirmares==0)
                    {  
                        return false;
                    }  
                    return false;
                }
               
               return true;
           }
       },
       messages:{
            firmarres: function(input) { 
                if(swfirmares==0)
                {  
                  return 'El Pin no es Correcto';
                }
                else
                {    
                  return 'Revisando..';
                }
             }
       }
       }).data("kendoValidator");
       function verificarPinRes(pin_insertado)
        {
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
                success: function (data) { 
                    swfirmares=data;
                   firmarescache=$("#pinfirmares").val();
                   formfirmares.validateInput($("#pinfirmares"));
                 }
            }); 
        }*/
<?php echo '</script'; ?>
> <?php }} ?>
