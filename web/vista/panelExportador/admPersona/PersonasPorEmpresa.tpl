<div class="row-fluid  form" id="reportesempresapersona">
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
<script>  
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
var rep_legales = {$rep_legales};
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
{foreach $datosperfil as $perfil} 
{
    "id_perfil": "{$perfil->id_perfil}",
    "descripcion": "{$perfil->descripcion}"
},
{/foreach} 
];
var personas = [
{foreach $datosempresapersona as $empresapersona} 
{
    "id_persona": {$empresapersona.id_persona},
    "id_empresa_persona": {$empresapersona.id_empresa_persona},
    "nombre": "{$empresapersona.nombres}",
    "documento":"{$empresapersona.numero_documento}",
    "perfil": {
        "id_perfil": "{$empresapersona.id_perfil}",
        "descripcion": "{$empresapersona.perfil}"
    }
},
{/foreach} 
];

{literal}  
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
});
{/literal}
</script>	   