<html >
<head>
{include file="includes/Librerias.tpl"}
<link href="styles/css-personales/k-window-bienvenida.css" rel="stylesheet">
</head>
<body>
{include file="includes/Cabecera.tpl"}
<div class="row-fluid" id="formurimp">
    <div class="span10" id="formulario" >
        <form name="reimprimeForm" id="reimprimeForm" method="post"  action="index.php" onkeypress="return anular(event)">
            <input type="hidden" name="opcion" id="opcion" value="admRegistroApi" />
            <input type="hidden" name="tarea" id="tarea" value="reimRue">
        <div class="k-block fadein">
            <div class="k-header"><div class="titulonegro">REIMPRIMIR FORMULARIO <small> (Si ya se registró)</small> </div> </div>
            <div class="k-cuerpo">

                <div class="row-fluid  form"  >
                    {literal}
                        <div class="span4 " id="div_nit" name="div_nit">
                            <input type="text" name="nit" id="nit"
                                   onkeypress='return validateQty(event);'
                                   class="k-textbox "
                                   placeholder="Número de identificación Tributaria(NITs)"
                                   maxlength="15"
                                   pattern="[0-9]{6,}"
                                   onkeypress="return isNumeric(event)"
                                   oninput="maxLengthCheck(this)"
                                   required
                                   data-nit
                                   data-required-msg="Ingrese un número de NIT válido,7 o más dígitos"/>
                        </div>
                    {/literal}
                    <div class="span6 " >
                        <input type="text" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Nº de Matricula de Comercio" name="fundempresa" id="fundempresa"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese su Nº de Matricula de Comercio"/>
                    </div>
                </div>


                <div class="row-fluid form" >
                    <div class="span2 " >
                        <input id="reimpbutton" type="button"  value="Imprimir" class="k-primary" style="width:100%"/>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
     {include file="includes/Pie.tpl"}
<script>

    $("#reimpbutton").kendoButton();
    var registrar = $("#reimpbutton").data("kendoButton");

    $("#reimpbutton").on("click", function () {

            $.ajax({
                type: 'post',
                url: 'index.php',
                beforeSend: function( xhr ) {
                    $("#registrar").prop('disabled', true);
                },
                data: $("#reimprimeForm").serialize(),
                success: function (data) {
                    if (data == 0){
                        alert("NO SE ENCONTRARON LOS DATOS EN EL SISTEMA O YA TIENE NUMERO DE RUI");
                    } else {
                        location.href = 'index.php?opcion=impresionRui&tarea=impresionRui&id_empresa=' + data;
                    }
                }
            });


    });
</script>
    </body>
</html>
