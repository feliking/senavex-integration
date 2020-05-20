<html >
<head>
    {include file="includes/Librerias.tpl"}   
</head>
<body >

    {include file="includes/Cabecera.tpl"}
        <div class="row-fluid" id="formuimp">
            <div class="span10" id="formulario" >
                <form name="importadorempresa" id="importadorempresa" method="post"  action="index.php"  onkeypress="return anular(event)">
                    <input type="hidden" name="opcion" id="opcion" value="admRegistroApi" />
                    <input type="hidden" name="tarea" id="tarea" value="registro_api">
                    <div class="k-block fadein">
                        <div class="k-header"><div class="titulonegro">Registro Único del Importador RUI-SENAVEX</div></div>
                        <div class="k-cuerpo">
			<Center><b><a href="https://drive.google.com/open?id=19XJ2zoH6tZ2maJOg8c-SdZjT_95TdSU7" target="_blank">DESCARGUE AQUI LA GUIA<img src="styles/img/Ico_Terminos.png"></img></a></b></Center>
                            <fieldset >
                                <legend>1. DATOS DE LA EMPRESA</legend>
                                <div class="row-fluid  form"  >
                                    <div class="span6 " >
                                        <input type="text" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Registro de Operador (Aduana)" name="padronimportador" id="padronimportador"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese su registro de operador (Aduana)"/>
                                    </div>
                                    <div class="span6" >
                                        <input type="text" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Nombre o Razón Social"  name="razonsocial" id="razonsocial"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese su Nombre o razón social" />
                                    </div>
                                </div>
                                <div class="row-fluid form" >
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
                                    <div class="span4"  >    
                                        <input type="text" name="testimonioconstitucion" id="testimonioconstitucion" 
                                                class="k-textbox "  
                                                placeholder="Nº de Testimonio Constitución" 
                                                validationMessage="Ingrese su No. de Testimonio Constitución"/>
                                    </div> 
                                    <div class="span4 " >
                                        <input type="text" name="patentemunicipal" id="patentemunicipal"  
                                               class="k-textbox " 
                                               placeholder="Nº Patente Municipal" 
                                               oninput="maxLengthCheck(this)" 
                                               maxlength="30" 
                                               />
                                     </div> 
                                    {/literal}
                                </div>
                                <div class="row-fluid  form"  >
                                    <div class="span6 " >
                                        <input type="text" style="width:100%;" class="k-textbox no-restriccion"  placeholder="Nº de Matricula de Comercio" name="fundempresa" id="fundempresa"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese su Nº de Matricula de Comercio"/>
                                    </div>
                                    <div class="span6" >
                                        <input  style="width:100%;" placeholder="Fecha de Vencimiento de Matricula de Comercio"  name="f_fundempresa" id="f_fundempresa"  onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Fecha de vencimiento de Matricula de Comercio" onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese la fecha de vencimiento de su Matricula de Comercio" />
                                    </div>
                                </div>
                                <div class="row-fluid form" >
                                    <div class="span6 "  >
                                        Es empresa unipersonal
                                        Si <input type="radio" name="empresaunipersonal" value="1" id="sioea" class="radio" >
                                        No <input type="radio" name="empresaunipersonal" value="0" id="nooea" class="radio" checked>
                                    </div> 
                                </div>
                                 
                            </fieldset>
                        </div>  
                        <div class="k-cuerpo"> 
                            <fieldset >
                                <legend>2. LOCALIZACIÓN GEOGRÁFICA</legend>
                                <div class="row-fluid form" >
                                    {include file="admDireccion/Direccion_Edit.tpl" editable=true de_id=1 tipo=2 direccion_id=0}   
                                </div>                             
                            </fieldset>
                        </div> 
{*------------------------esta parte es para los datos del represantante Legal-----------------------------------------------*}
                        <div class="k-cuerpo">
                            <fieldset >
                                <legend>3. INFORMACI0N DEL PROPIETARIO O REPRESENTANTE LEGAL</legend>
                                <div class="row-fluid form" >
                                    <div class="span3 " >
                                        <input style="width:99%;" id="idpais" name="idpais" required validationMessage="Escoja el Pais">
                                    </div>   
                                    <div class="span3" >
                                        <input style="width:100%;" id="tipodocumento" name="tipodocumento" required validationMessage="Escoja el tipo de documento">
                                    </div>
                                    <div class="span4 " >
                                        <input id="customers"  name="customers" style="width: 100%;"  required validationMessage="Por favor Introduzca el numero de documento"/>
                                    </div>  
                                    <div class="span2 " id="div_dpto_exp" name="div_dpto_exp">
                                        <input style="width:100%;" id="dpto_exp" name="dpto_exp" required validationMessage="Expedido(solo Bolivia)">
                                    </div>  
                                </div>
                                <div class="row-fluid form" >                                                                   
                                    <div class="row-fluid form" >
                                        <div class="span4" >
                                            <input type="text" class="k-textbox "  placeholder="Nombres"  name="nombres" id="nombres" onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese el o los nombres" />
                                        </div>
                                        <div class="span4" >
                                            <input type="text" class="k-textbox "  placeholder="Primer Apellido"  name="apellidop" id="apellidop" onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese el apellido paterno" />
                                        </div>
                                        <div class="span4" >
                                            <input type="text" class="k-textbox "  placeholder="Segundo Apellido"  name="apellidom" id="apellidom" onkeyup="javascript:this.value=this.value.toUpperCase();" validationMessage="Ingrese el apellido materno" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid form" >
                                    <div class="span4" >
                                        <input type="email" class="k-textbox "  
                                            placeholder="Correo Electronico del Representante Legal" 
                                            id="emailrp" name="emailrp"  
                                            data-availablerp 
                                            data-availablerp-url="validate/username"         
                                            required data-required-msg="Introduzca un correo electronico valido"/>
                                    </div>  
                                    <div class="span4" >
                                        <input type="text" class="k-textbox "  
                                            placeholder="Nº Testimonio o poder"  
                                            name="poder" id="poder" 
                                            onkeyup="javascript:this.value=this.value.toUpperCase();" 
                                            validationMessage="Ingrese el Número de Testimonio o Poder"  />
                                    </div>
                                    <div class="span4" >
                                        <input  style="width:100%;" placeholder="(*)Fecha de Vencimiento de Carnet de Identidad del Representante "  name="f_ci_rl" id="f_ci_rl" onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Fecha de vencimiento de su Carnet de Identidad" onkeyup="javascript:this.value=this.value.toUpperCase();" required validationMessage="Ingrese la fecha de vencimiento de su Carnet de Identidad" />
                                    </div>

                                </div>
                                <div class="row-fluid form" >
                                    <div class="span4" >
                                        
                                    </div>  
                                    <div class="span4" >
                                        
                                    </div>
                                    <div class="span4" >
                                        <div class="notas" >(*)En caso de ser Indefinido colocar 01/01/2099</div>
                                    </div>

                                </div>
                                <div class="row-fluid form" >
                                    <div class="span4" >
                                        Sexo
                                        Masculino <input type="radio" id="genero" name="genero" value="1" class="radio" data-radio required checked="checked"> Femenino
                                        <input type="radio"   id="genero" name="genero" value="0" class="radio" data-radio required><br/>
                                        <span class="k-invalid-msg" data-for="genero"></span> 
                                    </div>
                                </div>
                                <div id="div_datos_privados" name="div_datos_privados" > 
                                    {include file="admDireccion/Direccion_Edit.tpl" editable=true de_id=2 tipo=3 direccion_id=0}
                                </div>
                            </fieldset >
                        </div> 
{*--------------------------------------------------------------------------------------------*}
{*------------------------esta parte es para los datos del Apoderado-----------------------------------------------*}
                        <div class="k-cuerpo">
                            <fieldset >
                                <legend>4. INFORMACION DEL APODERADO</legend>
                                <div class="row-fluid form" >
                                    <div class="span3 " >
                                        <input style="width:99%;" id="idpaisApoderado" name="idpaisApoderado" required validationMessage="Escoja el Pais">
                                    </div>   
                                    <div class="span3" >
                                    <input style="width:100%;" id="tipodocumentoApoderado" name="tipodocumentoApoderado" validationMessage="Escoja el tipo de documento">
                                    </div>
                                    <div class="span4 " >
                                       <input id="customersApoderado"  name="customersApoderado" style="width: 100%;" validationMessage="Por favor Introduzca el numero de documento"/>
                                    </div>  
                                    <div class="span2 " id="div_dpto_expApoderado" name="div_dpto_expApoderado">
                                        <input style="width:100%;" id="dpto_expApoderado" name="dpto_expApoderado" validationMessage="Expedido(solo Bolivia)">
                                    </div>  
                                </div>
                                <div class="row-fluid form" >                                                                   
                                    <div class="row-fluid form" >
                                        <div class="span4" >
                                        <input type="text" class="k-textbox "  placeholder="Nombres"  name="nombresApoderado" id="nombresApoderado" onkeyup="javascript:this.value=this.value.toUpperCase();" validationMessage="Ingrese el o los nombres" />
                                        </div>
                                        <div class="span4" >
                                        <input type="text" class="k-textbox "  placeholder="Primer Apellido"  name="apellidopApoderado" id="apellidopApoderado" onkeyup="javascript:this.value=this.value.toUpperCase();" validationMessage="Ingrese el primer apellido"/>
                                        </div>
                                        <div class="span4" >
                                        <input type="text" class="k-textbox "  placeholder="Segundo Apellido"  name="apellidomApoderado" id="apellidomApoderado" onkeyup="javascript:this.value=this.value.toUpperCase();" validationMessage="Ingrese el segundo apellido" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid form" >
                                    <div class="span4" >
                                        <input type="email" class="k-textbox "  
                                               placeholder="Correo Electronico del Representante Legal" 
                                               id="emailrpApoderado" name="emailrpApoderado"  
                                               data-availablerp 
                                               data-availablerp-url="validate/username"         
                                                data-required-msg="Introduzca un correo electronico"/>
                                    </div>  
                                    <div class="span4" >
                                        <input type="text" class="k-textbox "  
                                            placeholder="Nº Testimonio o poder"  
                                            name="poderApoderado" id="poderApoderado" 
                                            onkeyup="javascript:this.value=this.value.toUpperCase();" 
                                            validationMessage="Ingrese num. testimonio o poder" />
                                    </div>
                                    
                                </div>
                                <div class="row-fluid form" >
                                    <div class="span4" >
                                        <input  style="width:100%;" placeholder="(*)Fecha de Vencimiento de su Carnet de Identidad"  name="f_ci_ap" id="f_ci_ap" onkeyup="javascript:this.value=this.value.toUpperCase();"  validationMessage="Fecha de vencimiento de su Carnet de Identidad" onkeyup="javascript:this.value=this.value.toUpperCase();"  />
                                    </div>
                                    <div class="span4" >
                                        <input  style="width:100%;" placeholder="Fecha de Vencimiento del Testimonio o Poder"  name="f_tes_fin" id="f_tes_fin" onkeyup="javascript:this.value=this.value.toUpperCase();"  validationMessage="Fecha de vencimiento  Testimonio o Poder" onkeyup="javascript:this.value=this.value.toUpperCase();" />
                                    </div>
                                </div>
                                <div class="row-fluid form" >
                                    <div class="span4" >
                                        <div class="notas" >(*)En caso de ser Indefinido colocar 01/01/2099 </div>
                                        
                                        
                                    </div>
                                    <div class="span4" >
                                    </div>
                                </div>
                                <div class="row-fluid form" >  
                                    <div class="span4">
                                        Sexo
                                        Masculino <input type="radio" id="generoApoderado" name="generoApoderado" value="1" class="radio" data-radio checked="checked"> Femenino
                                        <input type="radio"  id="generoApoderado" name="generoApoderado" value="0" class="radio" data-radio ><br/>
                                        <span class="k-invalid-msg" data-for="genero"></span> 
                                    </div>
                                
                                </div>
                                <div id="div_datos_privadosApoderado" name="div_datos_privadosApoderado" > 
                                    {include file='admDireccion/Direccion_Edit.tpl' editable=true de_id=3 tipo=3 direccion_id=0}
                                </div>
                            </fieldset >
                        </div>
{*--------------------------------------------------------------------------------------------*}
                        <div class="row-fluid form" >
                            <div class="span2 " >
                                <input id="registrar" type="button"  value="Registrar Importador" class="k-primary" style="width:100%"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>               
        </div>
        <div class="row-fluid" id="div_aviso">
            
        </div>
    {include file="includes/Pie.tpl"}
<script> 
//para la tecl enter............................................
/*function anular(e) {
      tecla = (document.all) ? e.keyCode : e.which;
      return (tecla != 13);
 } */
//hasta aqui para la tecl enter............................................
//

var validator_i = $("#importadorempresa").kendoValidator({
        rules:{
            nit: function(input) {
                var validate = input.data('nit');
                if (typeof validate !== 'undefined') 
                {
                    $.ajax({
                        async:false,
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admRegistroApi&tarea=VerificarNIT&nit='+$("#nit").val(),
                        success: function (data) {
                            var dt = eval('('+data+')');
                            if(dt[0].suceso==1){
                                alert(dt[0].msg);
                                $("#nit").val('');
                            }
                        }
                    });
                }
                return true;
            },
        },

    }).data("kendoValidator");

$("#registrar").kendoButton();
var registrar = $("#registrar").data("kendoButton");

$("#registrar").on("click", function () {

// ocultar("formuimp");
// $("#registrar").data("kendoButton").enable(false);
    if(validator_i.validate()){
        $.ajax({             
                type: 'post',
                url: 'index.php',
                beforeSend: function( xhr ) { 
			$("#registrar").prop('disabled', true);
		},
		data: $("#importadorempresa").serialize()+'&id_persona='+ swcustomers+'&id_apoderado='+ swcustomers2,
                success: function (data) { 
                ocultar('formuimp');
                $("#div_aviso").load('index.php?opcion=admEmpresaImport&tarea=aviso&id_empresa='+ data);
                //window.open('index.php?opcion=admEmpresaImport&tarea=aviso&id_empresa='+ data);
                }
            });
        }

});

$('#f_fundempresa').kendoDatePicker({
   start: "month"
}); 
$('#f_ci_rl').kendoDatePicker({
   start: "month"
}); 

$('#f_tes_fin').kendoDatePicker({
   start: "month"
}); 

$('#f_ci_ap').kendoDatePicker({
   start: "month"
}); 


// definimos campos
$("#registrar").kendoButton();
var registrar = $("#registrar").data("kendoButton");
setDisable_direccion3(true);

//Datos del Representante legal 
//Definimos datos PAIS//

                        
$("#idpais").kendoComboBox({   placeholder:"País de Origen",
    dataTextField: "pais",
    dataValueField: "Id",
    index: 27,
    dataSource: [
        {foreach $datospais as $pais} 
        { pais: "{$pais->nombre}", Id: {$pais->id_pais}},
        {/foreach}
    ],
    change : function (e) {
        var pais=this.value();
        if (this.value() && this.selectedIndex == -1) { 
         this.text('');
        }else{
            if(pais!=1){
                $('#dpto_exp').removeAttr('required');
            }else{
                $('#dpto_exp').attr('required','required');
               // $('#dpto_exp').enable();
            }
        }
    },
    open: function(e) {
        var $item =$('#idpais-list');
        setTimeout(function () {
            if($item.length && $item.css('display')=='none'){
                $item.css('display','block');
            }
        var $container = $item.closest('.k-animation-container');
        if($container.length && $container.css('display')=='none'){
            $container.css({
                "display":"block",
                "overflow":"visible"});
        }
    },1000);
}
});
var idpais = $("#idpais").data("kendoComboBox");
//------------------------------------esto es para los combobox del representante legal---------------------------

$("#tipodocumento").kendoComboBox({   
    placeholder:"Seleccione Tipo Documento de Identidad",
    dataTextField: "tipodocumento",
    dataValueField: "Id",
    dataSource: [
        {foreach $datostipodocumento as $tipodocumento} 
        { tipodocumento: "{$tipodocumento->descripcion}", Id: {$tipodocumento->id_tipo_documentoidentidad}},
        {/foreach}
    ],
    change : function (e) {
        if (this.value() && this.selectedIndex == -1) {                     
         this.text('');
        }
    }
});
var tipodocumento = $("#tipodocumento").data("kendoComboBox"); 

//-----------------------------esto es para los customers*-----------------------------------------------------------
$("#customers").kendoComboBox({
     placeholder:"Numero de Documento",
    filter:"startswith",
    dataTextField: "numero_documento",
    dataValueField: "id_persona",
    headerTemplate: '<div class="dropdown-header">' +
            '<span class="k-widget k-header">Foto</span>' +
            '<span class="k-widget k-header">Personal</span>' +
        '</div>',
    template: 
                "<span class='k-state-default'>#: data.nombres #<p>#: data.numero_documento #</p></span>",
    dataSource: {
        transport: {
            read: {
                dataType: "json",
                url: "index.php?opcion=admPersona&tarea=exportadores"
            }
        }
    },
    change : function (e) {
        if (this.value() && this.selectedIndex !== -1) { 
            fcustomers(this.value());
        }
        else
        {
            if(isNaN(this.value()))
            {
               customers.text(''); 
            }
            else
            {
            fcustomersnoes();   
            }
        }
    }
});
var customers = $("#customers").data("kendoComboBox");
$("#dpto_exp").kendoComboBox({   
    placeholder:"Expedido(solo Bolivia)",
    ignoreCase: true,
    dataTextField: "sigla",
    dataValueField: "Id",
    dataSource: [
        {section name=departamento loop=$datosdepartamento}		
        { sigla: "{$datosdepartamento[departamento].sigla}", Id: {$datosdepartamento[departamento].id_departamento} },
    {/section} 
     ],
    change : function (e) {
        if (this.value() && this.selectedIndex == -1) { 
            this.text('');
        }
    }
});
//Datos del apoderado//
$("#idpaisApoderado").kendoComboBox({   placeholder:"País de Origen",
    dataTextField: "pais",
    dataValueField: "Id",
    index: 27,
    dataSource: [
        {foreach $datospais as $pais} 
            { pais: "{$pais->nombre}", Id: {$pais->id_pais}},
        {/foreach}
    ],
    change : function (e) {
    var paisApoderado=this.value();
    if (this.value() && this.selectedIndex == -1) { 
     this.text('');
    }else{
        if(pais!=1){
            $('#dpto_expApoderado').removeAttr('required');
            }else{
            $('#dpto_expApoderado').attr('required','required');
           // $('#dpto_exp').enable();
            }
        }
    },
    open: function(e) {
    var $item =$('#idpaisApoderado-list');
    setTimeout(function () {
        if($item.length && $item.css('display')=='none'){
            $item.css('display','block');
        }
        var $container = $item.closest('.k-animation-container');
        if($container.length && $container.css('display')=='none'){
            $container.css({
                "display":"block",
                "overflow":"visible"});
        }
    },1000);
    }
});
var idpaisApoderado = $("#idpaisApoderado").data("kendoComboBox");
//------------------------------------esto es para los combobox del representante legal---------------------------
$("#tipodocumentoApoderado").kendoComboBox({   
        placeholder:"Seleccione Tipo Documento de Identidad",
        dataTextField: "tipodocumento",
        dataValueField: "Id",
        dataSource: [
        {foreach $datostipodocumento as $tipodocumento} 
        { tipodocumento: "{$tipodocumento->descripcion}", Id: {$tipodocumento->id_tipo_documentoidentidad}},
        {/foreach}
        ],
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) {                     
             this.text('');
            }
        }
});
var tipodocumentoApoderado = $("#tipodocumentoApoderado").data("kendoComboBox");
 //-----------------------------esto es para los customers*-----------------------------------------------------------
$("#customersApoderado").kendoComboBox({
     placeholder:"Numero de Documento",
    filter:"startswith",
    dataTextField: "numero_documento",
    dataValueField: "id_persona",
    headerTemplate: '<div class="dropdown-header">' +
            '<span class="k-widget k-header">Foto</span>' +
            '<span class="k-widget k-header">Personal</span>' +
        '</div>',
    template: 
                "<span class='k-state-default'>#: data.nombres #<p>#: data.numero_documento #</p></span>",
    dataSource: {
        transport: {
            read: {
                dataType: "json",
                url: "index.php?opcion=admPersona&tarea=exportadores"
            }
        }
    },
    change : function (e) {
        if (this.value() && this.selectedIndex !== -1) { 

            fcustomersApoderado(this.value());
        }
        else
        {
            if(this.value())
            {

                fcustomersnoesApoderado(); 

            }
            else
            {

               customersApoderado.text(''); 
               setDisable_direccion3(true);

                $('#tipodocumentoApoderado').removeAttr('required');
                $('#dpto_expApoderado').removeAttr('required');
                $('#nombresApoderado').removeAttr('required');
                $('#apellidopApoderado').removeAttr('required');
                $('#emailrpApoderado').removeAttr('required');
                $('#poderApoderado').removeAttr('required');
                $('#f_ci_ap').removeAttr('required');
                $('#generoApoderado').removeAttr('required');
            }
        }
    }
});
var customersApoderado = $("#customersApoderado").data("kendoComboBox");
$("#dpto_expApoderado").kendoComboBox(
    {   placeholder:"Expedido(solo Bolivia)",
        ignoreCase: true,
        dataTextField: "sigla",
        dataValueField: "Id",
        dataSource: [
        {section name=departamento loop=$datosdepartamento}		
        { sigla: "{$datosdepartamento[departamento].sigla}", Id: {$datosdepartamento[departamento].id_departamento} },
       {/section} 
        ],
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) { 
                this.text('');
            }
        }
    });
//hasta aqui datos del apoderado//

    function maxLengthCheck(object) {
        if (object.value.length > object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
    }
    
    function isNumeric (evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode (key);
        var regex = /[0-9]|\./;
        if ( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }  


    $("#departamento").kendoComboBox(
        {   placeholder:"Departamento",
            ignoreCase: true,
            dataTextField: "departamento",
            dataValueField: "Id",
            dataSource: [
            {section name=departamento loop=$datosdepartamento}		
            { departamento: "{$datosdepartamento[departamento].nombre}", Id: {$datosdepartamento[departamento].id_departamento} },
           {/section} 
            ],
            change : function (e) {
                 $("#municipio").val("");
                 var dpto = this.value();
                if (this.value() && this.selectedIndex == -1) { 
                }else
                {
                   
                    ocultar('div_municipio_aux');
                    mostrar("div_municipio");

                    $("#municipio").kendoComboBox({
                    
                        //autoBind: false,
                        //cascadeFrom: "idpaisdestino",
                        placeholder:"Municipio",
                        dataTextField: "descripcion",
                        dataValueField: "id_municipio",
                        dataSource: { 
                            transport: {
                                    read: {
                                        dataType: "json",
                                        url: "index.php?opcion=admEmpresaTemporal&tarea=listarMunicipios&id_departamento="+dpto
                                    }
                            }
                        },
                        change : function (e) {
                            $('#ciudad').val("")
                            var municipio=this.value();
                            if (this.value() && this.selectedIndex === -1) { 
                                this.text('');
                            }else{  
                                ocultar('div_ciudad_aux');
                                mostrar("div_ciudad");
                                $('#new_ciudad').remove();
                                $("#ciudad").kendoComboBox({
                    
                                //autoBind: false,
                                //cascadeFrom: "idpaisdestino",
                                placeholder:"Ciudad",
                                dataTextField: "descripcion",
                                dataValueField: "id_ciudad",
                                dataSource: { 
                                    transport: {
                                            read: {
                                                dataType: "json",
                                                url: "index.php?opcion=admEmpresaTemporal&tarea=listarciudades&id_municipio="+municipio
                                            }
                                    }
                                },
                                change : function (e) {
                                    var ciudad=this.value();
                                    $('#new_ciudad').remove();
                                    if (this.value() && this.selectedIndex === -1) { 
                                        this.text('');
                                    }else{ 
                                        $('#new_ciudad').remove();
                                        if(ciudad==0){
                                            var tag='<input type="text" class="k-textbox "  placeholder="Escriba la Ciudad" id="new_ciudad" name="new_ciudad" required validationMessage="Ingrese su Ciudad"/>';
                                            $('#div_new_ciudad').append(tag);
                                        }
                                    }
                                }
                            });
                            }

                        }
                    });
                 
                }
            }
        });
    $("#dpto_exp").kendoComboBox(
        {   placeholder:"Expedido(solo Bolivia)",
            ignoreCase: true,
            dataTextField: "sigla",
            dataValueField: "Id",
            dataSource: [
            {section name=departamento loop=$datosdepartamento}		
            { sigla: "{$datosdepartamento[departamento].sigla}", Id: {$datosdepartamento[departamento].id_departamento} },
           {/section} 
            ],
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) { 
                    this.text('');
                }
            }
        });
    $("#fundacion_empresa").kendoComboBox({
                    
            //autoBind: false,
            //cascadeFrom: "idpaisdestino",
            placeholder:"Fundacion",
            dataTextField: "year",
            dataValueField: "year",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admEmpresaTemporal&tarea=listarYear"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{  }

            }
        });
    $("#inicio_empresa").kendoComboBox({
                    
            //autoBind: false,
            //cascadeFrom: "idpaisdestino",
            placeholder:"Inicio Operaciones",
            dataTextField: "year",
            dataValueField: "year",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admEmpresaTemporal&tarea=listarYear"
                        }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{  }

            }
        });
    function fdepartamento()
    {
        departamento.text('');
    }
    var tipoempresa = $("#tipoempresa").data("kendoComboBox");
    var actividad = $("#actividad").data("kendoComboBox");
    var departamento = $("#departamento").data("kendoComboBox");
  //para el validador kendoo...............................................................................................................................
    var swe=2;
    var emailcache='';
    var swerp=2;
    var swerpr=0;
    var emailrpcache='';
    function emailajax(mail)
    {        
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admEmpresaTemporal&tarea=verificarDominioCorreo&email='+mail,
            success: function (data) {
               swe=data;
               emailcache=$("#email").val();
               validator.validateInput($("#email"));
             }
        });
    }
    function emailrpajax(mail)
    {        
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admEmpresaTemporal&tarea=verificarDominioCorreo&email='+mail,
            success: function (data) {
               swerp=data;
               emailrpcache=$("#emailrp").val();
               validator.validateInput($("#emailrp"));
             }
        });
    }

   var swf=0;
   $("#registrar").kendoButton();
    
    var registrar = $("#registrar").data("kendoButton");
   
//---------------esto es para el multiselect en este caso del rubroe de exportaciones-----------

var swcustomers='0';//esta vrialble es para ver si la persona es nueva o no
var swcustomers2='0';
function fcustomers(id_persona)
{
    swcustomers=id_persona;//decimos que es una persona ya registrada
   
    $.ajax({             
    type: 'post',
    url: 'index.php',
    data: 'opcion=admPersona&tarea=getPersonaId&id_persona='+id_persona,
    success: function (data) {
        var persona = eval('('+data+')');
        tipodocumento.value(persona[0].id_tipo_documento);
        idpais.value(persona[0].id_pais_origen);
        $('#nombres').val(persona[0].nombres);
        $('#apellidop').val(persona[0].paterno);
        $('#apellidom').val(persona[0].materno);
        
        $('#dpto_exp').removeAttr('required');
        
        ocultar('div_datos_privados');
        setDisable_direccion2(true);
        
        ocultar('div_dpto_exp');
        
        $('#emailrp').val(persona[0].email);
        $('input[name=genero]').val([persona[0].genero]);
        // para validar nuevamente el formulario
        validator.validate();
        
        //deshabilitlamos los campos para que no pueda cambiarlos
        tipodocumento.enable(false);
        idpais.enable(false);
        
        nombres.enable(false);
        apellidop.enable(false);
        apellidom.enable(false);
        //numerocontacto.enable(false);
        //expedido.enable(false);
        emailrp.enable(false);
        document.getElementById("genero").disabled = true;
        var radios = genero;
        for (var i=0, iLen=radios.length; i<iLen; i++) {
          radios[i].disabled = true;
        } 

        }
    });
}
function fcustomersApoderado(id_persona)
{
    swcustomers2=id_persona;//decimos que es una persona ya registrada
    $.ajax({             
    type: 'post',
    url: 'index.php',
    data: 'opcion=admPersona&tarea=getPersonaId&id_persona='+id_persona,
    success: function (data) {
        var persona = eval('('+data+')');
        tipodocumentoApoderado.value(persona[0].id_tipo_documento);
        idpaisApoderado.value(persona[0].id_pais_origen);
        $('#nombresApoderado').val(persona[0].nombres);
        $('#apellidopApoderado').val(persona[0].paterno);
        $('#apellidomApoderado').val(persona[0].materno);
        $('#emailrpApoderado').val(persona[0].email);
        $('input[name=generoApoderado]').val([persona[0].genero]);
        $('#dpto_expApoderado').removeAttr('required');
        ocultar('div_datos_privadosApoderado');
        setDisable_direccion3(true);
        ocultar('div_dpto_expApoderado');
        validator.validate();        
        //deshabilitlamos los campos para que no pueda cambiarlos
        tipodocumentoApoderado.enable(false);
        idpaisApoderado.enable(false);
        nombresApoderado.enable(false);
        apellidopApoderado.enable(false);
        apellidomApoderado.enable(false);
        emailrpApoderado.enable(false);
        document.getElementById("generoApoderado").disabled = true;
        var radios = generoApoderado;
        for (var i=0, iLen=radios.length; i<iLen; i++) {
          radios[i].disabled = true;
        } 

        }
    });
}
function fcustomersnoes()
{
    swcustomers='0';//decioms que es un personanueva
        mostrar('div_dpto_exp');
        mostrar('div_datos_privados');
        $('#dpto_exp').attr('required','required');
        
        $('#nombres').val('');
        $('#apellidop').val('');
        $('#apellidom').val('');
        $('#poder').val('');
        $('#emailrp').val('');
        idpais.text('');
        //deshabilitlamos los campos para que no pueda cambiarlos
        setDisable_direccion2(false);
        tipodocumento.enable();
        idpais.enable();
        nombres.enable();
        apellidop.enable();
        apellidom.enable();
        poder.enable();
        emailrp.enable();
        genero.enable();
        document.getElementById("genero").enable = true;
        var radios = genero;
        for (var i=0, iLen=radios.length; i<iLen; i++) {
          radios[i].disabled = false;
        } 
}

function fcustomersnoesApoderado()
{
    swcustomers2='0';//decioms que es un personanueva
        mostrar('div_dpto_expApoderado');
        mostrar('div_datos_privadosApoderado');

        $('#dpto_expApoderado').attr('required','required');
        $('#nombresApoderado').val('');
        $('#apellidopApoderado').val('');
        $('#apellidomApoderado').val('');
        $('#poderApoderado').val('');
        $('#emailrpApoderado').val('');
        
        //tipodocumento.text('');
        //deshabilitlamos los campos para que no pueda cambiarlos
        setDisable_direccion3(false);
        tipodocumento.enable();
        idpaisApoderado.enable();
        nombresApoderado.enable();
        apellidopApoderado.enable();
        apellidomApoderado.enable();
        poderApoderado.enable();
        emailrpApoderado.enable();
        document.getElementById("generoApoderado").disabled = true;
        var radios = generoApoderado;

        $('#tipodocumentoApoderado').attr('required','required');
        $('#dpto_expApoderado').attr('required','required');
        $('#nombresApoderado').attr('required','required');
        $('#apellidopApoderado').attr('required','required');
        $('#emailrpApoderado').attr('required','required');
        $('#poderApoderado').attr('required','required');
        $('#f_ci_ap').attr('required','required');
        $('#generoApoderado').attr('required','required');

        for (var i=0, iLen=radios.length; i<iLen; i++) {
          radios[i].disabled = false;
        } 
        // para validar nuevamente el formulario
}



  
$("#nombres").kendoMaskedTextBox();
$("#apellidop").kendoMaskedTextBox();
$("#apellidom").kendoMaskedTextBox();
//$("#numerocontacto").kendoMaskedTextBox();
//$("#numerocontacto2").kendoMaskedTextBox();
$("#poder").kendoMaskedTextBox();
$("#emailrp").kendoMaskedTextBox({ 
    change: function() {
        if($("#email").val()!='' && !$('#cuantia').is(':checked'))   validator.validateInput($("#email")); 
    }
});
$("#nombresApoderado").kendoMaskedTextBox();
$("#apellidopApoderado").kendoMaskedTextBox();
$("#apellidomApoderado").kendoMaskedTextBox();
//$("#numerocontactoApoderado").kendoMaskedTextBox();
//$("#numerocontacto2Apoderado").kendoMaskedTextBox();
$("#poderApoderado").kendoMaskedTextBox();
$("#emailrpApoderado").kendoMaskedTextBox({ 
    change: function() {
        if($("#email").val()!='' && !$('#cuantia').is(':checked'))   validator.validateInput($("#email")); 
    }
});

var nombres = $("#nombres").data("kendoMaskedTextBox");
var apellidop = $("#apellidop").data("kendoMaskedTextBox");
var apellidom = $("#apellidom").data("kendoMaskedTextBox");
//var numerocontacto = $("#numerocontacto").data("kendoMaskedTextBox");
//var numerocontacto2 = $("#numerocontacto2").data("kendoMaskedTextBox");
var poder = $("#poder").data("kendoMaskedTextBox");
//var expedido = $("#dpto_exp").data("kendoMaskedTextBox");
var emailrp = $("#emailrp").data("kendoMaskedTextBox");
var nombresApoderado = $("#nombresApoderado").data("kendoMaskedTextBox");
var apellidopApoderado = $("#apellidopApoderado").data("kendoMaskedTextBox");
var apellidomApoderado = $("#apellidomApoderado").data("kendoMaskedTextBox");
//var numerocontactoApoderado = $("#numerocontactoApoderado").data("kendoMaskedTextBox");
//var numerocontacto2Apoderado = $("#numerocontacto2Apoderado").data("kendoMaskedTextBox");
var poderApoderado = $("#poderApoderado").data("kendoMaskedTextBox");
//var expedidoApoderado = $("#dpto_expApoderado").data("kendoMaskedTextBox");
var emailrpApoderado = $("#emailrpApoderado").data("kendoMaskedTextBox");

</script>
</body>
</html>
