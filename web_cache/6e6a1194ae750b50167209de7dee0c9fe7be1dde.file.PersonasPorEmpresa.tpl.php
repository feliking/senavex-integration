<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-05 16:19:41
         compiled from "/enex/web1/sitio/web/vista/admPersona/PersonasPorEmpresa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57362548957cede43601f36-89852446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e6a1194ae750b50167209de7dee0c9fe7be1dde' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admPersona/PersonasPorEmpresa.tpl',
      1 => 1496693719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57362548957cede43601f36-89852446',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cede4362e4c6_40238088',
  'variables' => 
  array (
    'rep_legales' => 0,
    'datosperfil' => 0,
    'perfil' => 0,
    'datosempresapersona' => 0,
    'empresapersona' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cede4362e4c6_40238088')) {function content_57cede4362e4c6_40238088($_smarty_tpl) {?><div class="row-fluid  form" id="reportesempresapersona">
     <div id="personasempresagrid" class="fadein"></div>
</div>   
<div class="row-fluid "  id="aviso_rep_legal" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header"><div class="titulo">Aviso</div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >

                <div class="span1" > </div>
                <div class="span10" >
                    <p> No puede Eliminar a <span id="nombreeliminar"> </span>, La empresa debe tener al menos un Representante Legal </span>
                    </p> 
                </div>  
                <div class="span1" ></div>
            </div> 
            <div class="row-fluid  form" >
                <div class="span3 hidden-phone"></div>
                <div class="span2 hidden-phone"></div>
                <div class="span2 " >
                    <input id="aceptar_aviso" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
                </div> 
                <div class="span4 hidden-phone" ></div>
            </div> 
        </div>   
    </div>
</div>
<div class="row-fluid "  id="confirmacioneliminacion" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="k-header"><div class="titulo">Aviso</div></div>
                </div>
                <div class="k-cuerpo"> 
                    <div class="row-fluid  form" >
                        
                        <div class="span1" > </div>
                        <div class="span10" >
                            <p> Esta seguro de eliminar a <span id="nombreeliminar"> </span> de su empresa.
                            </p> 
                        </div>  
                        <div class="span1" ></div>
                    </div> 
                    <div class="row-fluid  form" >
                        <div class="span4 hidden-phone">
                         </div>
                         <div class="span2 " >
                             <input id="cancelareliminacion" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                         </div> 
                         <div class="span2 " >
                             <input id="aceptareliminacion" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
                         </div> 
                         <div class="span4 hidden-phone" >
                         </div>
                     </div> 
                </div>   
            </div>
    </div>     
<?php echo '<script'; ?>
>  
ocultar('confirmacioneliminacion');
ocultar('aviso_rep_legal');
$("#aceptareliminacion").kendoButton();
$("#cancelareliminacion").kendoButton();
$("#aceptar_aviso").kendoButton();
var aceptaraliminacion = $("#aceptareliminacion").data("kendoButton");
var cancelareliminacion = $("#cancelareliminacion").data("kendoButton");
var aceptar_aviso = $("#aceptar_aviso").data("kendoButton");

cancelareliminacion.bind("click", function(e){    
    cambiar('confirmacioneliminacion','reportesempresapersona');
}); 
aceptar_aviso.bind("click", function(e){    
    cambiar('aviso_rep_legal','reportesempresapersona');
}); 
var idempresapersonaeliminar='x';
var rep_legales = <?php echo $_smarty_tpl->tpl_vars['rep_legales']->value;?>
;
aceptaraliminacion.bind("click", function(e){    
    
    $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=admPerfil&tarea=eliminar&id_empresa_persona='+idempresapersonaeliminar,
        success: function (data)
        { 
           // alert(data);
            var respuesta = eval('('+data+')');
            if(respuesta[0].suceso=='0')
            {
               cerraractualizartab('Mi Personal','admPersona','listarPersonasPorEmpresa');
            }else{
                alert(respuesta[0].msg+' Verifique su conexion a internet eh intente nuevamente.');
            }
            idempresapersonaeliminar='x';
        }
    });
   
}); 
//------------ esta parte es para el grid-------------
var perfiles = [
<?php  $_smarty_tpl->tpl_vars['perfil'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['perfil']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datosperfil']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['perfil']->key => $_smarty_tpl->tpl_vars['perfil']->value) {
$_smarty_tpl->tpl_vars['perfil']->_loop = true;
?> 
{
    "id_perfil": "<?php echo $_smarty_tpl->tpl_vars['perfil']->value->id_perfil;?>
",
    "descripcion": "<?php echo $_smarty_tpl->tpl_vars['perfil']->value->descripcion;?>
"
},
<?php } ?> 
];
var personas = [
<?php  $_smarty_tpl->tpl_vars['empresapersona'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['empresapersona']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datosempresapersona']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['empresapersona']->key => $_smarty_tpl->tpl_vars['empresapersona']->value) {
$_smarty_tpl->tpl_vars['empresapersona']->_loop = true;
?> 
{
    "id_persona": <?php echo $_smarty_tpl->tpl_vars['empresapersona']->value['id_persona'];?>
,
    "id_empresa_persona": <?php echo $_smarty_tpl->tpl_vars['empresapersona']->value['id_empresa_persona'];?>
,
    "nombre": "<?php echo $_smarty_tpl->tpl_vars['empresapersona']->value['nombres'];?>
",
    "documento":"<?php echo $_smarty_tpl->tpl_vars['empresapersona']->value['numero_documento'];?>
",
    "perfil": {
        "id_perfil": "<?php echo $_smarty_tpl->tpl_vars['empresapersona']->value['id_perfil'];?>
",
        "descripcion": "<?php echo $_smarty_tpl->tpl_vars['empresapersona']->value['perfil'];?>
"
    }
},
<?php } ?> 
];

  
var dataPersonas = new kendo.data.DataSource({
	data: personas,
	schema: {
		model: {
			id: "id_persona",
			fields: {
				id_persona: { editable: false, nullable: true },
                                id_empresa_persona: { editable: false, nullable: true },
                                documento: {editable: false},
				nombre: {editable: false},
				perfil: { defaultValue: { id_perfil: "2", "descripcion": "b" } },
			}
		}
	}
});
var dsperfiles = new kendo.data.DataSource({
	data: perfiles
});

function perfilDropDownEditor(container, options) {
	$('<input required data-text-field="descripcion" data-value-field="id_perfil" data-bind="value:' + options.field + '"/>')
		.appendTo(container)
		.kendoDropDownList({
			autoBind: false,
			dataSource: dsperfiles,
                        select: onSelectperfil,
		});
}

function onSelectperfil(e) {
    var dataItem = this.dataItem(e.item.index());
    var gridpersonasempresa = $("#personasempresagrid").data("kendoGrid");
    var row = gridpersonasempresa.select();
    var data = gridpersonasempresa.dataItem(row);
    var sw = true;
    if(data.perfil.id_perfil != dataItem.id_perfil)
    {
        if(data.perfil.id_perfil == 3 || data.perfil.id_perfil == 2){
            if(rep_legales == 1){
                alert('No puede cambiar el perfil de este usuario, La empresa debe tener al menos un Representante Legal');
                $('<input required data-text-field="descripcion" data-value-field="id_perfil" data-bind="value:' + options.field + '"/>')
		.kendoDropDownList({
                        select: e.item.index(),
		});
                sw = false;
            }else{
                rep_legales = rep_legales - 1;
            }
        }
        if(dataItem.id_perfil == 3 || data.perfil.id_perfil == 2){
            rep_legales = rep_legales + 1;
        }
       // alert(rep_legales);
        if(sw)
        {
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=admPersona&tarea=editarPerfilPersonaEmpresa&id_persona='+data.id_persona+'&id_perfil='+dataItem.id_perfil+'&perfil='+ dataItem.descripcion+'&id_empresa_persona='+ data.id_empresa_persona,
                success: function (data) {
                    var respuesta = eval('('+data+')');
                    if(respuesta[0].suceso=='0')
                    {
                        cerraractualizartab('Mi Personal','admPersona','listarPersonasPorEmpresa');
                    }
                    else
                    {
                        alert(respuesta[0].msg+' Verifique su conexion a internet eh intente nuevamente.');
                        cerraractualizartab('Mi Personal','admPersona','listarPersonasPorEmpresa');
                    }
                }
            });
        }
    }
};

$(document).ready(function () {
    $("#personasempresagrid").kendoGrid({
	dataSource: dataPersonas,
        sortable: true,
        scrollable: false,
        selectable: "simple",
        reorderable: true,
        resizable: true,
        change: cambiarceldasmodificacionEP,
	columns: [
            { field: "nombre", title: "Nombre" },            
            { field: "documento", title: "Numero Documento" },
            { field: "perfil",title: "Perfil",width: "200px",editor: perfilDropDownEditor, template: "#=perfil.descripcion#"},
            { title: "Eliminar", width: "120px",command: [
                {
                 name: "Eliminar",
                 imageClass: "k-icon k-i-close",
                 click: function(e) {
                    
                        e.preventDefault();
                        var personasempresagrid = $("#personasempresagrid").data("kendoGrid");
                        var row = personasempresagrid.select();
                        var data = personasempresagrid.dataItem(row);
                        $("#nombreeliminar").html(data.nombre);
//                        alert(data.perfil.id_perfil);
                    if(rep_legales - 1 == 0 && (data.perfil.id_perfil==2 || data.perfil.id_perfil==3)){
                        cambiar('reportesempresapersona','aviso_rep_legal');
                        //alert('es rep legal');
                    }else{
                        idempresapersonaeliminar=data.id_empresa_persona;
                        cambiar('reportesempresapersona','confirmacioneliminacion');
                        //alert('no es rep legal ');
                        
                        //alert("debe existir al menos un representante legal");
                    }
                    
                 },
                 confirmation: false
                }
              ]}
        ],
	editable: true
    });
    function cambiarceldasmodificacionEP()
    {  
       
        var gridruex = $("#personasempresagrid").data("kendoGrid");
        var row = gridruex.select();
        var data = gridruex.dataItem(row);
        //alert(data.id_persona);
        anadir('Informacion Personal','admPersona','verPersona&id_persona='+data.id_persona);
        /*if(registromodificacion==data.id_empresa)
        {              
           anadir('Modificación "'+data.razonsocial+'"','admEmpresa','revisionModificacionEmpresa&id_empresa='+data.id_empresa+'&id_modificacion_empresa_relevancia='+data.id_modificacion_empresa_relevancia);
        }
        else
        {
            registromodificacion=data.id_empresa;
        }*/
    }
});

<?php echo '</script'; ?>
>	   <?php }} ?>
