<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-05 08:26:17
         compiled from "/enex/web1/sitio/web/vista/ProForma/verificadorCO.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177889861758f8b3cfb029a5-57837531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9b309e1b522703aa8b9c5ac318370b988f63325' => 
    array (
      0 => '/enex/web1/sitio/web/vista/ProForma/verificadorCO.tpl',
      1 => 1493940914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177889861758f8b3cfb029a5-57837531',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58f8b3cfb34598_44527977',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f8b3cfb34598_44527977')) {function content_58f8b3cfb34598_44527977($_smarty_tpl) {?><div class="row-fluid " id="verificarCO">
    <div class="span12" >
        <div class="row-fluid" >
            <div class="span1 hidden-phone" >
            </div>
            <div class="span10">
                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" > Buscar C.O.</div>  
                            </div>                                      
                        </div>  
                    </div>
                    <div class="k-cuerpo">  
                        <form id="formBuscarCO" method="post" action="index.php">
                            <input type="hidden" name="opcion" id="opcion" value="admProForma" />
                            <input type="hidden" name="tarea" id="tarea" value="verificarCO" /> 
                            <div id="campos">
                                <div class="row-fluid ">
                                    <div class="span2 hidden-phone" ></div>
                                    <div class="span4">
                                        <input style="width:100%;" id="tipo" name="tipo" required validationMessage="Seleccione un Tipo de C.O.">
                                    </div>
                                    <div class="span2" >
                                        <input type="text" class="k-textbox " placeholder="N° Control" name="nro_ctrl" id="nro_ctrl" required validationMessage="Por favor Ingrese el Numero de Control"/>
                                        <!--input style="width:100%;" id="idEmpresa" name="idEmpresa" required="true" validationMessage="Por favor escoja la Empresa"-->
                                    </div>
                                
                                
                                    <!--div class="span2" >
                                        <input id="cancelar" type="button" value="Cancelar" class="k-primary" style="width:100%"/>
                                    </div-->
                                    <div class="span2" >
                                        <input id="buscar" type="button"  value="Buscar" class="k-primary" style="width:100%">
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
<div id="verificador_co"></div>
<?php echo '<script'; ?>
> 
    $("#buscar").kendoButton();
    var formBuscarCO = $("#formBuscarCO").kendoValidator().data("kendoValidator");
    var buscar = $("#buscar").data("kendoButton");
    
    buscar.bind("click", function(e){  
        
        //window.open('index.php?'+$("#formBuscarCO").serialize(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        if(formBuscarCO.validate()){
            $.ajax({
                type: 'post',
                url: 'index.php',
                data: $("#formBuscarCO").serialize(),
                success: function (data) {
                    var dt=eval("("+data+")");
                    var texto = "";
                    var titulo = "";
                    var subtitle = "";
                    if(dt[0].suceso==1){
                        titulo = "Busqueda C.O.";
                        subtitle = dt[0].dias <= 120? ("Dentro de Plazo - "+dt[0].dias+" días"):("Fuera de Plazo - "+dt[0].dias+" días");
                        texto = "<p> Empresa: <strong>" + dt[0].empresa + "</strong></p>" + 
                                 "<p> RUEX : <strong> " + dt[0].ruex +" </strong></p>"+
                                 "<p> NIT : <strong> " + dt[0].nit +" </strong></p>"+
                                 "<p> Factura : <strong> " + dt[0].factura +" </strong></p>"+
                                 "<p> Fecha : <strong> " + dt[0].fecha +" </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hora : <strong> " + dt[0].hora + "</strong></p>"+
                                 "<p> Cantidad Vendido : <strong> " + dt[0].cantidad +" </strong></p>"+
                                 "<p> Rango Vendido : <strong> " + dt[0].rango1 + " - " + dt[0].rango2 + " </strong></p>"+
                                 "<p> Tipo C.O. : <strong> " + dt[0].tipo +" </strong></p>";
                    }else{
                        titulo = "Inexistente";
                        subtitle = " Nro de Control Inexistente ";
                        texto = "<br><br><br><br><br><br>No se encontro ningún certificado con esos parámetros<br><br><br><br><br><br><br>";
                    }        
                    crearVentanaDDJJ(titulo, subtitle, texto);
                }
            });
            //crearVentanaDDJJ("probando", "probandfo"); 
        }
    });
    
    ComboboxTipoCO("#tipo");
    function ComboboxTipoCO(texto){
        $(texto).kendoComboBox({
            placeholder:"TIPO CO",
            dataTextField: "descripcion",
            dataValueField: "id_tipo",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admProForma&tarea=listar_tipo_co"
                        }
                }
            },
            change : function (e) {
                
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{ 

                }

            }
        }).data("kendoComboBox");
    }
    
    function crearVentanaDDJJ(title, subtitle, contenido){
        var campo =
                '<div class="row-fluid fadein" id="ventana_busquedaco">'+
                    '<div class="span12" >'+
                        '<div class="row-fluid  form" >'+
                            '<div class="span12" >'+
                                '<div class="titulo" id="titulo_aviso" >'+subtitle+'</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row-fluid form" ><div class="barra" ></div></div>'+
                        '<div class="row-fluid" >'+
                            ''+contenido+''+
                        '</div>'+
                        '<br>'+
                        '<div class="row-fluid form" ><div class="barra" ></div></div>'+
                        '<div class="row-fluid form" >'+
                            '<div class="span4 hidden-phone"></div>'+
                            '<div class="span4"><input id="avisoaceptar_co" type="button" value="Aceptar" class="k-primary" style="width:100%"/> </div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
        
        $('#verificador_co').append(campo);
        ventana('ventana_busquedaco','400','450', title);
        $("#avisoaceptar_co").kendoButton();
        
        var avisoaceptar_co = $("#avisoaceptar_co").data("kendoButton");
        avisoaceptar_co.bind("click", function(e){
            $("#ventana_busquedaco").data("kendoWindow").close();
            $('#ventana_busquedaco').remove();
        });
    }
    function ventana(nombre, h, w, title){
        $("#"+nombre).kendoWindow({
            title : title,
            draggable: false,
            height: h+"px",
            width: w+"px",
            resizable: false,
            modal: true,
            actions: [],
            animation: {
                close: {
                  effects: "fade:out",
                  duration: 1000
                }
            }
        }).data("kendoWindow").center().open();
    }
<?php echo '</script'; ?>
>  <?php }} ?>
