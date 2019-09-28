{assign var="id" value="em"|cat:$empresa->id_empresa} 
    <div class="row-fluid "  id="empresarestriccion{$id}" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > {$empresa->razon_social}</div>  
                        </div>                                      
                    </div>  
                </div>
                <div class="row-fluid ">
                    <div class="span2 parametro" >
                        Razon Social:
                    </div>     
                    <div class="span10 campo" >
                        {$empresa->razon_social} 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        Nombre Comercial:
                    </div>     
                    <div class="span10 campo" >
                        {$empresa->nombre_comercial} 
                    </div>
                </div>
                <div class="row-fluid " >              
                    <div class="span2 parametro" >
                        Nit:
                    </div>     
                    <div class="span4 campo" >
                        {$empresa->nit}
                    </div> 
                    <div class="span2 parametro" >
                        Codigo Nit:
                    </div>     
                    <div class="span4 campo" >
                        {$empresa->certificacionnit}
                    </div> 
                </div>
                {if $empresa->matricula_fundempresa or $empresa->menor_cuantia=="1" or $empresa->frecuente!='1'}
                <div class="row-fluid " >
                     {if $empresa->matricula_fundempresa}
                        <div class="span2 parametro" >
                            Nro. FundaEmpresa:
                        </div>     
                        <div class="span2 campo" >
                           {$empresa->matricula_fundempresa}
                        </div> 
                    {/if}
                    
                    {if $empresa->oea}
                            <div class="span4" >
                                <b>OPERADOR ECON&Oacute;MICO AUTORIZADO</b>
                            </div>  
                    {/if}   
                    {if $empresa->menor_cuantia=="1"}
                            <div class="span4" >
                               <b>Empresa registrada de menor cuantia.</b>
                            </div>  
                    {/if}  
                    {if $empresa->frecuente!="1"}
                            <div class="span4" >
                               <b>Exportador no frecuente.</b>
                            </div>  
                    {/if} 
                </div>
                {/if}
                {if $empresa->ruex}
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                       Ruex:
                    </div>     
                    <div class="span2 campo" >
                         BO{$empresa->ruex}
                    </div>  
                    <div class="span2 parametro" >
                        Vigencia:
                    </div>     
                    <div class="span2 campo" >
                       {$empresa->vigencia}                   
                    </div> 
                    <div class="span2 parametro" >
                        Fecha Vigencia:
                    </div>     
                    <div class="span2 campo" >
                      {$empresa->fecha_renovacion_ruex}{if $empresa->estado==10} <span class='letrarelevanteroja'>Vencido</span>{/if} 
                    </div> 
                </div>
                {/if}
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                       Categoria:
                    </div>     
                    <div class="span2 campo" >
                         {$empresa->idcategoria_empresa}
                    </div>                      
                    <div class="span2 parametro" >
                        Actividad Economica:
                    </div>     
                    <div class="span2 campo" >
                      {$empresa->idactividad_economica}
                    </div> 
                    {if $empresa->idtipo_empresa}      
                        <div class="span2 parametro" >
                            Tipo de Empresa:
                        </div>     
                        <div class="span2 campo" >
                           {$empresa->idtipo_empresa}                   
                        </div> 
                    {/if}
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
                        {$empresa->ciudad}
                    </div>
                    <div class="span2 parametro" >
                       <b> Numero de Contacto:</b>
                    </div>     
                    <div class="span2 campo" >
                       {$empresa->numero_contacto}
                    </div> 
                    <div class="span1 parametro" >
                        <b> Fax:</b>
                    </div>     
                    <div class="span3 campo" >
                        {$empresa->fax}
                    </div>                       
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                        <b>Departamento:</b>
                    </div>     
                    <div class="span2 campo" >
                      {$empresa->iddepartamento_procedencia}
                    </div>
                    <div class="span2 parametro" >
                        <b>Direccion:</b>
                    </div>     
                    <div class="span2 campo" >
                       {$empresa->direccion}
                    </div>
                    <div class="span1 parametro" >
                        <b>Email:</b>
                    </div>     
                    <div class="span3 campo" >
                        {$empresa->email}
                    </div>
                </div>
                
                {if $empresa->email_secundario or $empresa->direccionfiscal or $empresa->pagina_web}
                <div class="row-fluid  form" >
                    {if $empresa->email_secundario}
                        <div class="span2 parametro" >
                           <b> Email Secundario:</b>
                        </div>     
                        <div class="span2 campo" >
                           {$empresa->email_secundario}
                        </div>  
                    {/if}
                    {if $empresa->direccionfiscal}
                        <div class="span2 parametro" >
                           <b> Domicilio Fiscal:</b>
                        </div>     
                        <div class="span2 campo" >
                           {$empresa->direccionfiscal}
                        </div> 
                    {/if}
                    {if $empresa->pagina_web}
                            <div class="span2 parametro" >
                              <b>Pagina:</b>
                            </div>     
                            <div class="span2 campo" >
                                {$empresa->pagina_web}
                            </div>  
                    {/if}     
                </div>
                {/if}     
                
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>           
                <div class="row-fluid  form" >
                    <div class="span3 parametro" >
                        <b>Rubro de Exportaciones:</b>
                    </div>     
                    <div class="span9 campo" >
                       {$empresa->idrubro_exportaciones}
                    </div>  
                </div>
                {if $ico->ico}
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            <b>Numero ICO:</b>
                        </div>     
                        <div class="span9 campo" >
                            {$ico->ico}
                        </div>  
                    </div>
                {/if}  
                {if $empresa->nim}
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            <b>Numero de Identificación Minera:</b>
                        </div>     
                        <div class="span9 campo" >
                            {$empresa->nim}
                        </div>  
                    </div>
                {/if}  
                {if $personal|@count!=0}
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
                {foreach from=$personal item=persona}
                    <div class="row-fluid" >
                        <div class="span2 parametro" >
                          Nombre:
                        </div>     
                        <div class="span4 campo" >
                            {$persona.nombres} 
                        </div>  
                        <div class="span1 parametro" >
                          Documento:
                        </div>     
                        <div class="span2 campo" >
                            {$persona.numero_documento} 
                        </div>  
                        <div class="span1 parametro" >
                          Perfil:
                        </div>     
                        <div class="span2 campo" >
                            {$persona.perfil} 
                        </div>  
                    </div> 
                {/foreach}
                {/if}
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <form id="solicitudform{$id}">
                    <div class="row-fluid form" >
                        <div class="span2" > </div>
                            <div class="span8" >
                                <textarea id="camposmotivo{$id}" class="k-textbox " style="width:100%" required placeholder='Ingrese los motivos por los cuales {if $desbloquear=='1'}desbloqueara a la empresa "{$empresa->razon_social}"{else}bloqueara de todo acceso a la empresa "{$empresa->razon_social}"{/if}.'
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
                        <input id="cancelarrestricion{$id}" type="button" value="Cancelar" class="k-primary" style="width:100%"/>
                        </div>
                        <div class="span3" >
                        <input id="restringirempresa{$id}" type="button"  value="{if $desbloquear=='1'}Desbloquear{else }Bloquear{/if}" class="k-primary" style="width:100%"/> 
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
  {*  <div class="row-fluid fadein"  id="firmarestriccionempresa" >
       <div class="k-block fadein">
                <div class="k-header">
                    <div class="k-header"><div class="titulo">Firma Digital de {if $desbloquear=="1"}Desbloqueo de un Empresa{else}Bloqueo de una Empresa{/if}</div></div>
                </div>
                <div class="k-cuerpo"> 
                    <div class="row-fluid  form" >
                        <div class="span1" > </div>
                        <div class="span10" >
                            {if $desbloquear=="1"}
                            <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, habilito a la empresa <span class="letrarelevante">"{$empresa->razon_social}"</span> 
                                con <span class="letrarelevante">RUEX: BO{$empresa->ruex}</span>, para que esta tenga acceso completo a la platafoma virtual del SENAVEX.</p>   
                            {else}
                            <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, restringo a la empresa <span class="letrarelevante">"{$empresa->razon_social}"</span> 
                                con <span class="letrarelevante">RUEX: BO{$empresa->ruex}</span> por motivos registrados anteriormente.</p>                             
                            {/if}
                        </div>  
                        <div class="span1" ></div>
                    </div> 
                    <form name="formfirmares" id="formfirmares" method="post"  action="index.php" >
                    <input type="hidden" name="opcion" id="opcion" value="admEmpresa" />
                    <input type="hidden" name="tarea" id="tarea" value="ruexfirmado" />
                        <div class="row-fluid  form" >
                            <div class="span5" ></div>
                            <div class="span2" >
                                <input type="text" onkeypress='return validateQty(event);'
                               class="k-textbox " placeholder="Pin" name="pinfirmares"  id="pinfirmares" maxlength="4" size="4" style="width:50px;"
                               required data-required-msg="Por favor ingrese su Pin." data-firmarres /> 
                            </div>  
                            <div class="span5" ></div>
                        </div>  
                        <div class="row-fluid  form" >
                            <div class="span4" ></div>
                            <div class="span4" >
                                
                            </div>  
                            <div class="span4" ></div>
                        </div>                        
                        <div class="row-fluid  form" >
                            <div class="span4 hidden-phone" >
                             </div>
                             <div class="span2 " >
                                 <input id="cancelafirmarres" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                             </div> 
                             <div class="span2 " >
                                 <input id="firmarres" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                             </div> 
                             <div class="span3 hidden-phone" >
                             </div>
                            <div class="span1 " >
                                <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('firmaDigital')" style="max-width:35px;" class="ayuda">
                            </div>
                         </div> 
                    </form> 
                </div>   
      </div>              
</div>*}
 {include file="avisos/firmaDigital.tpl"} 
<script>           

//------------------------------para los botones------------------------------------
$("#cancelarrestricion{$id}").kendoButton();
$("#restringirempresa{$id}").kendoButton();
var cancelarrestricion{$id} = $("#cancelarrestricion{$id}").data("kendoButton");
var restringirempresa{$id} = $("#restringirempresa{$id}").data("kendoButton");
var solicitudform{$id} = $("#solicitudform{$id}").kendoValidator().data("kendoValidator");
cancelarrestricion{$id}.bind("click", function(e){             
    remover(tabStrip.select());
}); 
restringirempresa{$id}.bind("click", function(e){   
    if(solicitudform{$id}.validate())
    {
    /*    cambiar('empresarestriccion','firmarestriccionempresa');
        generarPin('{$id_empresa}','{$id_persona}','{if $desbloquear=="1"}11{else}10{/if}');*/
        
         cambiar('empresarestriccion{$id}','firmadigital{$id}');
        generarPin('{$id_empresa}','{$id_persona}','{if $desbloquear=="1"}11{else}10{/if}');   
        cambiarRedaccionFirma{$id}({if $desbloquear=="1"}11{else}10{/if},'de {if $desbloquear=="1"}Desbloqueo de un Empresa{else}Bloqueo de una Empresa{/if}', {if $desbloquear=="1"}
                            'habilito la empresa <span class="letrarelevante">"{$empresa->razon_social}"</span>'
                            {else}
                            'restrinjo a la empresa <span class="letrarelevante">"{$empresa->razon_social}"</span>'                  
                            {/if}); 
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
    borrarPin('{$nombre}');
});
firmarres.bind("click", function(e){  
    if(formfirmares.validate())
    { 
       $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admEstadoEmpresas&tarea={if $desbloquear=='1'}desbloquearEmpresa{else}bloquearEmpresa{/if}&id_empresa='+{$empresa->id_empresa}+'&id_persona='+{$id_persona}+'&camposmotivo='+$("#camposmotivo").val(),
            success: function (data) { 
                var respuesta = eval('('+data+')');
                if(respuesta[0].suceso=='1')
                {
                    firmarPin('Empresas','admEstadoEmpresas','estadoEmpresas','{$nombre}',respuesta[0].id_bloqueo);                   
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
</script> 