<!DOCTYPE html>
<html >
<head>
{include file="includes/Librerias.tpl"}
</head>
<body> 
{include file="includes/Cabecera.tpl"}
    <div class="row-fluid " >
        {if $id_empresa_persona=='x'} 
        <div class='mis-empresas'>    
        
        </div>
        <div class="swiper-container fadein">
            <div class="swiper-wrapper"> 
                {$turns = 1} 
                {$c = 1}
                {foreach $empresas as $empresa} 
                    {if $turns=='1'}
                <div class="swiper-slide" >
                    <div class="slideempresas" >
                    {/if}
                        <div class="slideempresa" >
                            <a  href='index.php?opcion=admPanelPrincipal&tarea=entroEmpresa&empresa={$empresa->id_persona}&id_empresa={$empresa->id_empresa}&id_perfil={$empresa->id_perfil}&id_empresa_persona={$empresa->id_empresa_persona}'/>
                                <img  src="styles/img/empresas/{$empresa->id_empresa}.{$empresa->fecha_vinculacion}"  onError='this.onerror=null;imgendefectoempresa(this);' />
                                <p class="plomaparrafo" >{$empresa->id_persona}</p>
                            </a>
                        </div>
                    {if $turns=='8' || $c==$empresas|@count}
                    </div>
                </div>
                    {$turns = 1}
                    {else}    
                    {$turns = $turns+1} 
                    {/if}
                    {$c = $c+1}
                {/foreach}              
                     
            </div>  
                
            {if $empresas|@count>'8'}
            <div class="pagination"></div>
            {/if}
        </div>
        <script languaje="JavaScript">
            var mySwiper = new Swiper('.swiper-container',{
                pagination: '.pagination',
                paginationClickable: true,
                speed:400,
                moveStartThreshold: 100
            })
        </script>           
        {else}   
       <div class="span12" id="tabstripprincipal" >
      
            <div id="tabstrip">
                <ul>
                    <li>
                       Inicio
                    </li>
                </ul>
                <div>
                    <div class="row-fluid  hidden-phone" >
                        <div class="span12" >
                        </div> 
                    </div>
                    <div class="row-fluid fadein" >
                            
                            <div class="span1 hidden-phone" >
                            </div> 
                            <div class="span10" >
                                {if $tipo_usuario=="1"}
                                    <p> <span class='azulparrafo'> {$mensajebienvenida} <span id="nombrevista">{$nombre}</span>, bienvenido/a a nuestra plataforma.<br>
                                        <span id="mensajebienvenidacatualizar"> 
                                            <!--div>{if $id_perfil=="6" OR $id_perfil=="9"}
                                                {if $registroempresas=="0"}                                                    
                                                {elseif $registroempresas=="1"}
                                                     Tienes<em class="cajaterminosaviso"><span class='terminosaviso' onclick="anadir('Registro de Empresas','admEmpresa','revisarempresatemporal')">1</span></em>registro de empresa por revisar.<br>
                                                {else}
                                                     Tienes<em class="cajaterminosaviso"><span class='terminosaviso' onclick="anadir('Registro de Empresas','admEmpresa','revisarempresatemporal')">{$registroempresas}</span></em>registros de empresas por revisar.<br>
                                                {/if}
                                                <span id="registrosmodificacioncomentario">
                                                {if $registromodificacion=="0"}
                                                {elseif $registromodificacion=="1"}
                                                     Tienes<em class="cajaterminosaviso"><span class='terminosaviso' id="registrosmodificacioncomentarionumero" onclick="anadir('Solicitudes de Modificación','admEmpresa','mostrarSolicitudesModificacion')">1</span></em> solicitud de modificación de empresa.<br>
                                                {else}
                                                     Tienes<em class="cajaterminosaviso"><span class='terminosaviso' id="registrosmodificacioncomentarionumero" onclick="anadir('Solicitudes de Modificación','admEmpresa','mostrarSolicitudesModificacion')">{$registromodificacion}</span></em> solicitudes de modificacion de empresa.<br>
                                                {/if}
                                                </span>
                                            {/if}
                                            
                                            {if $id_perfil=="7" OR $id_perfil=="9"}
                                                {if $ddjjporrevisar=="0"}
                                                {elseif $ddjjporrevisar=="1"}
                                                     Tienes<em class="cajaterminosaviso"><span class='terminosaviso' id="registrosmodificacioncomentarionumero" onclick="anadir('Declaraciones Juradas','admDeclaracionJurada','listarRevisionDeclaracionJurada')">1</span></em> Declaración Jurada para revisar.<br>
                                                {else}
                                                     Tienes<em class="cajaterminosaviso"><span class='terminosaviso' id="registrosmodificacioncomentarionumero" onclick="anadir('Declaraciones Juradas','admDeclaracionJurada','listarRevisionDeclaracionJurada')">{$ddjjporrevisar}</span></em> Declaraciones Juradas para revisar.<br>
                                                {/if}
                                            {/if}
                                            </div-->
                                        </span>      
                                    </span>
                                </p> 
                                {/if}
                                {if $tipo_usuario=="2"}
                                 <p> <span class='azulparrafo'> {$mensajebienvenida} {$nombre}, te damos la bienvenida a nuestra plataforma.<br>
                                      
                                    </span>
                                </p> 
                                    {if $firma=='1'}
                                        <span class='terminos letrarelevante' id='guardarfirmaspan' onclick="anadir('Guardar Firma','admPersona','guardarFirma')" >
                                            Guardar mi firma.
                                        </span>
                                        <script>
                                            var box1 = document.getElementById('guardarfirmaspan')
                                             box1.addEventListener('touchend', function(e){
                                                anadir('Guardar Firma','admPersona','guardarFirma')
                                            }, false)
                                        </script>     
                                    {/if}
                                    {if $estadomodificacion=="0"}                                                    
                                        <span id="mavisoconfiguracionempresa"> Su empresa ha sido observada por favor verifique sus datos en <span class='terminos letrarelevante' onclick="anadir('Mi RUEX','admEmpresa','miRuex')">edición de datos.</span><br></span>
                                        {/if}
                                        {if $estado_empresa=='10'}
                                        La vigencia de su RUEX a vencido por favor ingrese a <span class='terminos letrarelevante' onclick="anadir('Mi RUEX','admEmpresa','miRuex')"> edición y solicite su renovación.</span><br>
                                        {/if}
                                {/if}
                                {if $tipo_usuario=="3"}
                                <p> <span class='azulparrafo'> 
                                        {$mensajebienvenida}, te damos la bienvenida a nuestra plataforma.<br>
                                        Para la Obtención de Certificados de Origen es necesario asignar 
                                        <span class='terminos letrarelevante' onclick="anadir('Personal','admPersona','asignarPersona')">personal encargado</span> de este.<br>
                                  
                                        {if $estadomodificacion=="0"}                                                    
                                        <span id="mavisoconfiguracionempresa"> Su empresa ha sido observada por favor verifique sus datos en <span class='terminos letrarelevante' onclick="anadir('Mi RUEX','admEmpresa','miRuex')">edición de datos.</span><br></span>
                                        {/if}
                                        {if $estado_empresa=='10'}
                                        La vigencia de su RUEX a vencido por favor ingrese a <span class='terminos letrarelevante' onclick="anadir('Mi RUEX','admEmpresa','miRuex')"> edición y solicite su renovación.</span><br>
                                        {/if}
                                    </span>
                                </p> 
                                {/if}
                            </div>
                            <div class="span1 hidden-phone" >
                            </div>
                    </div>
                </div>	                
             </div>
            <script>
                var tabStrip = $("#tabstrip").kendoTabStrip({
                animation:false}).data("kendoTabStrip");
                tabStrip.select(0);
                    
                $("#tabstrip ul.k-tabstrip-items").kendoSortable({
                    filter: "li.k-item",
                    axis: "x",
                    container: "ul.k-tabstrip-items",
                    hint: function(element) {
                        return $("<div id='hint' class='k-widget k-header k-tabstrip'><ul class='k-tabstrip-items k-reset'><li class='k-item k-state-active k-tab-on-top'>" + element.html() + "</li></ul></div>");
                    },
                    start: function(e) {
                        tabStrip.activateTab(e.item);
                    },
                    change: function(e) {
                        var tabStrip = $("#tabstrip").data("kendoTabStrip"),
                            reference = tabStrip.tabGroup.children().eq(e.newIndex);

                        if (e.oldIndex < e.newIndex) {
                            tabStrip.insertAfter(e.item, reference);
                        } else {
                            tabStrip.insertBefore(e.item, reference);
                        }
                    }
                }); 
                
                //-----------------enviamos correos------------------
                /*$.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=admCorreo&tarea=empresaAdmitidaModificacion&id_empresa=455&modificaciones=1,2,4,5,8,10,9,3,13',
                success: function (data) { alert(data);
                    } 
                });*/
            </script>
            </div> 
            <div class="row-fluid fadein" id="menuprincipal" >
            </div> 
            <script>ocultar('menuprincipal');</script>
        {/if}
    </div>    
{include file="includes/Pie.tpl"}
</body>
</html>
{*-------------------------esto es para el modulo de pendientes
si tu empresa esta con alun pendiente no te va a dejar ahcer nada------------------*}
{if ($tipo_usuario=="2" ||  $tipo_usuario=="3") && $estado_empresa=="3"} 
<div id="bloqueo"  style="display:none">
    <div class="row-fluid " >
        <div class="span12" >
           <div class="titulo" >Aviso</div>
        </div>
    </div>
    <div class="row-fluid form" >
        <div class="span12" > Usted tiene los siguientes temas pendientes por regularizar:
        </div>
    </div>
    <div class="row-fluid " >
        <div class="span12" > 
        </div>
    </div>
    <div class="row-fluid " >
        <div class="span4" > 
        </div>
        <div class="span4" > 
            <input id="aceptarbloqueo" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
        </div>
        <div class="span4" > 
        </div>
    </div>
</div>
<script>
var bloqueo = $("#bloqueo");
bloqueo.kendoWindow({
    draggable: true,
    height: "200px",                      
    width: "400px",
    modal:true,
    resizable: true,
    animation: {
       open: {
          effects: "fade:in",
           duration: 2000
        }
      }
}).data("kendoWindow");
bloqueo.data("kendoWindow").open();
bloqueo.data("kendoWindow").center();
bloqueo.parent().find(".k-window-action").css("visibility", "hidden");
$("#aceptarbloqueo").kendoButton();
var aceptarbloqueo = $("#aceptarbloqueo").data("kendoButton");
aceptarbloqueo.bind("click", function(e){    
    {if $variosperfiles==1}
    location.href='index.php?opcion=admPanelAdministrativo&tarea=salioempresa';
    {else}
    location.href='index.php?opcion=admSalir';
    {/if}
}); 

</script>
{/if}
