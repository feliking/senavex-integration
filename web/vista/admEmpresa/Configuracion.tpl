<div class="row-fluid  form" >
    <div class="row-fluid "  id="mensajeadvertenciaedicion" >
        <div class="span12" >
                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulo" > Aviso</div>  
                            </div>                                      
                        </div>  
                    </div>
                    <div class="k-cuerpo">
                        <div class="row-fluid form" >
                            <div class="span2 " ></div>
                            <div class="span8 " >
                                Su solicitud de modificación ha sido aprobada, le informamos que solo tiene una oportunidad para modificar sus datos de relevancia, asegúrese de introducir correctamente los nuevos datos.
                            </div>
                            <div class="span2 " ></div>
                        </div>
                         <div class="row-fluid form" >
                            <div class="span4 " ></div>
                            <div class="span2" >                             
                             <input id="cancelaradvertenciamodif" type="button"  value="Cancelar" class="k-primary" style="width:100%"/>
                            </div>
                            <div class="span2" >                             
                             <input id="aceptaradvertenciamodif" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
                            </div>
                            <div class="span4" ></div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="row-fluid "  id="editardatosrelevantes" >
        <div class="span12" >
                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" > Configuración</div>  
                            </div>                                      
                        </div>  
                    </div>
                    <div class="k-cuerpo">
                    <form name="ruex" id="ruex" method="post"  action="index.php"  onkeypress="return anular(event)" enctype="multipart/form-data">
                    <input type="hidden" name="opcion" id="opcion" value="admEmpresa" />
                    <input type="hidden" name="tarea" id="tarea" value="editarEmpresaDatosRelevantes" />     
                        <div class="row-fluid form" > 
                            <div class="span2 parametro" >
                                Razon Social:
                            </div>     
                            <div class="span10" >                                
                                <input type="text" class="k-textbox "  placeholder="Razon Social" value="{$datosempresa->razon_social}"  name="razonsocial" id="razonsocial"  required validationMessage="Por favor ingrese su razón social" />
                            </div>  
                        </div> 
                        <div class="row-fluid form" > 
                            <div class="span2 parametro" >
                                Nombre Comercial:
                            </div>     
                            <div class="span10" >                                
                                <input type="text" class="k-textbox "  placeholder="Nombre Comercial" value="{$datosempresa->nombre_comercial}" name="nombrecomercial" id="nombrecomercial" required validationMessage="Por favor Ingrese su Nombre Comercial"/>
                            </div>  
                        </div>
                        <div class="row-fluid form" >
                            <div class="span2 parametro" >
                                Ruex:
                            </div>     
                            <div class="span2 campo" >
                                BO{$datosempresa->ruex}
                            </div>  
                            <div class="span2 parametro" >
                                 Vigencia:
                            </div>     
                            <div class="span2 campo" >
                                {if $renovacion}
                                    En Tramite
                                {else}
                                    {$datosempresa->vigencia}   
                                {/if}
                            </div> 
                            <div class="span2 parametro" >
                                 Fecha Vigencia:
                            </div>     
                            <div class="span2 campo" >
                               {$datosempresa->fecha_renovacion_ruex}
                            </div> 
                        </div>  
                        <div class="row-fluid form" >
                            <div class="span2 parametro" >
                                Nit:
                            </div>     
                            <div class="span2 campo" >
                                {$datosempresa->nit}
                            </div> 
                            {if $datosempresa->matricula_fundempresa}
                                <div class="span3 parametro" >
                                    Matricula Fundaempresa:
                                </div>     
                                <div class="span5 campo">                                
                                    {$datosempresa->matricula_fundempresa}
                                </div> 
                            {/if}
                        </div>  
                        <div class="row-fluid form" >                            
                            <div class="span2 parametro" >
                                Tipo de Empresa:
                            </div>     
                            <div class="span3" >                                
                                <input style="width:100%;" id="tipoempresa" name="tipoempresa" required validationMessage="Por favor escoja su tipo de Empresa">
                            </div> 
                            <div class="span2 parametro" >
                                Actividad:
                            </div>     
                            <div class="span3" >                                
                                <input style="width:100%;" id="actividad" name="actividad" required validationMessage="Por favor escoja su Actividad Economica">
                            </div> 
                            <div class="span2 " >
                                 <input type="checkbox" id="cuantia" name="cuantia" {if $datosempresa->menor_cuantia}checked{/if}> <span class="letraploma"> Menor Cuantia</span>
                            </div>    
                        </div> 
                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                        <div class="row-fluid form" >
                            {assign var=array_datos_categoria value=","|explode:$datosempresa->datos_categoria_empresa} 
                            <div class="span3 fadein" >
                                <div class="radio">Nro. De Trabajadores </div> 
                                <div class="radio"><input type="radio" name="trabajadores" value="1" id="sifundaempresa" {if $array_datos_categoria[0]==1}checked{/if} data-radio required>1-9</div> 
                                <div class="radio"><input type="radio" name="trabajadores" value="2" id="nofundaempresa" {if $array_datos_categoria[0]==2}checked{/if} data-radio required>10-19</div>  
                                <div class="radio"><input type="radio" name="trabajadores" value="3" id="sifundaempresa" {if $array_datos_categoria[0]==3}checked{/if} data-radio required>20-49</div>   
                                <div class="radio"><input type="radio" name="trabajadores" value="4" id="nofundaempresa" {if $array_datos_categoria[0]==4}checked{/if} data-radio required>Más de 50</div>  
                                <span class="k-invalid-msg" data-for="trabajadores"></span> <br/>
                            </div>
                            <div class="span3 fadein" > 
                                <div class="radio">Activos productiovs en UFV</div> 
                                <div class="radio"><input type="radio" name="activos" value="1" id="sifundaempresa" class="radio" {if $array_datos_categoria[1]==1}checked{/if}  data-radio required>1-150.000 </div>
                                <div class="radio"><input type="radio" name="activos" value="2" id="nofundaempresa" class="radio" {if $array_datos_categoria[1]==2}checked{/if} data-radio required>150.000-1.500.000 </div>
                                <div class="radio"><input type="radio" name="activos" value="3" id="sifundaempresa" class="radio" {if $array_datos_categoria[1]==3}checked{/if} data-radio required>1.500.001-6.000.000 </div> 
                                <div class="radio"><input type="radio" name="activos" value="4" id="nofundaempresa" class="radio" {if $array_datos_categoria[1]==4}checked{/if} data-radio required>Más de 6.000.001 </div> 
                                <span class="k-invalid-msg" data-for="activos"></span> <br/>
                            </div>
                            <div class="span3 fadein" > 
                                <div class="radio">Ventas Anuales en UFV</div> 
                                <div class="radio"><input type="radio" name="ventas" value="1" id="sifundaempresa" class="radio" {if $array_datos_categoria[2]==1}checked{/if} data-radio required>1-600.000 </div>
                                <div class="radio"><input type="radio" name="ventas" value="2" id="nofundaempresa" class="radio" {if $array_datos_categoria[2]==2}checked{/if} data-radio required><span>600</span>.001-3.000.00</div>
                                <div class="radio"><input type="radio" name="ventas" value="3" id="sifundaempresa" class="radio" {if $array_datos_categoria[2]==3}checked{/if} data-radio required>3.000.001-12.000.000 </div>
                                <div class="radio"><input type="radio" name="ventas" value="4" id="nofundaempresa" class="radio" {if $array_datos_categoria[2]==4}checked{/if} data-radio required>Más de 12.000.001 </div>
                                <div class="radio"><input type="radio" name="ventas" value="0" id="nofundaempresa" class="radio" {if $array_datos_categoria[2]==0}checked{/if} data-radio required>Ninguno</div>
                                <span class="k-invalid-msg" data-for="ventas"></span> <br/>
                            </div>
                            <div class="span3 fadein" > 
                                Exportaciones Anuales en UFV
                                <div class="radio"><input type="radio" name="exportaciones" value="1" id="sifundaempresa" class="radio" {if $array_datos_categoria[3]==1}checked{/if} data-radio required>1-75.000 </div>
                                <div class="radio"><input type="radio" name="exportaciones" value="2" id="nofundaempresa" class="radio" {if $array_datos_categoria[3]==2}checked{/if} data-radio required>75.001-750.000</div>
                                <div class="radio"><input type="radio" name="exportaciones" value="3" id="sifundaempresa" class="radio" {if $array_datos_categoria[3]==3}checked{/if} data-radio required>750.001-7.500.000 </div> 
                                <div class="radio"><input type="radio" name="exportaciones" value="4" id="nofundaempresa" class="radio" {if $array_datos_categoria[3]==4}checked{/if} data-radio required>Más de 7.500.001 </div>
                                <div class="radio"><input type="radio" name="exportaciones" value="0" id="nofundaempresa" class="radio" {if $array_datos_categoria[3]==0}checked{/if} data-radio required>Ninguno </div>
                                <span class="k-invalid-msg" data-for="exportaciones"></span> <br/>
                            </div>
                        </div>    
                        <div class="row-fluid form" >
                                    <div class="barra" >                                         
                                    </div> 
                        </div> 
                        <div class="row-fluid" id="borra2">
                            <div class="span12" >
                                Escoja uno o mas rubros de exportación.
                            </div> 
                        </div> 
                        {assign var=array_rubro_exportaciones value=","|explode:$datosempresa->idrubro_exportaciones} 
                        {* esta variable es para separar los rubros de exportacion *}
                        {foreach from=$rubros_exportaciones item=rubro}
                        <div class="row-fluid" >
                            <div>
                                <div class="checkboxtemporal"> 
                                    <input type="checkbox" name="rubroexportacionesarray[]" value="{$rubro->id_rubro_exportaciones}" 
                                    {foreach from=$array_rubro_exportaciones item=idrubro}
                                        {if $idrubro==$rubro->id_rubro_exportaciones} checked {/if}
                                    {/foreach}>
                                </div>
                                <div class="checkboxcomentario">{$rubro->descripcion}</div>
                            </div> 
                        </div>                             
                        {/foreach}
                        <div class="row-fluid" >
                            <div class="span" ><center>
                                 <input type="hidden" name="hiddenvalidator" id="hiddenvalidator" 
                         data-checkvalidator
                         data-required-msg="Por Favor Complete los campos de productos" /></center>
                            </div> 
                        </div> 
                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                        {if $ico->ico}
                            <div class="row-fluid  form" >
                                <div class="span2 parametro" >
                                    <b>Numero ICO:</b>
                                </div>     
                                <div class="span10 campo" >
                                    {$ico->ico}
                                </div>  
                            </div>
                        {/if}                                                 
                        <div class="row-fluid" id="borrar">                                
                            <div class="span6 fadein" id="preguntascafe">                                
                            </div>    
                            <div class="span6 fadein" id="divnim">
                            </div> 
                        </div> 
                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                        <div class="row-fluid  form" >
                            <div class="span12 " >
                                Nota: Puede cambiar al responsable de su empresa nominando alguien de su personal,tambien puede registrar  <span class='terminos letrarelevante' onclick="remover(tabStrip.select());anadir('Personal','admPersona','asignarPersona');">personal nuevo</span>.     
                            </div>  
                        </div>
                        <div class="row-fluid  form" >
                            <div class="span2 parametro" >
                                Representate Legal (Apoderado):
                            </div>  
                            <div class="span10 " >
                                <input style="width:100%;" id="representante" name="representante" required validationMessage="Escoja su representante legal">
                             </div>    
                        </div>
                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                        <div class="row-fluid form" >  
                            <div class="span12 " >
                                <input type="checkbox" name="check" data-check  required data-required-msg="Aceptar los terminos y condiciones es un requisito">  Acepto los <span class='terminos' onclick="terminosruex()"> Terminos y Condiciones </span>del registro único del exportador
                            </div>  
                        </div> 
                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                        <div class="row-fluid  form" >
                            <div class="span4" >
                            </div>
                            <div class="span2 " >
                             <input id="cancelaredicion" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                            </div> 
                            <div class="span2" >                             
                             <input id="registro" type="button"  value="Editar" class="k-primary" style="width:100%"/>
                            </div>
                            <div class="span3" >
                            </div>
                            <div class="span1 " >
                            <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('configuracionRelevantes')" style="max-width:35px;" class="ayuda">
                            </div>
                        </div> 
                    </form>
                    </div>
                </div>
        </div>
    </div>  
    <div id="terruex" class="span12 fadein"  >
        <div class="k-block fadein">
            <div class="k-header"> <div class="titulo" >Registro Unico del Exportador</div></div>
            <div class="row-fluid  form" >
                <div class="span1 hidden-phone" ></div>
                <div class="span10" ><br>

                                    <p>AVISO LEGAL:<br><br>

                                    Nunc volutpat ac nunc malesuada congue. Duis porta sodales neque nec suscipit. Nam semper velit sodales tortor mattis, sit amet gravida mauris fringilla. Vivamus a sollicitudin risus, sed tincidunt risus. Maecenas metus tortor, elementum dictum elit nec, sollicitudin faucibus risus. Etiam malesuada vulputate sollicitudin. Aliquam eu magna ut lacus posuere viverra vitae a dui. Vivamus libero mi, imperdiet pharetra felis sed, pulvinar volutpat diam. Vivamus pharetra mauris non tellus lobortis, vitae rutrum ipsum lobortis. Morbi et lorem accumsan lectus fringilla gravida. Morbi accumsan mattis condimentum. Sed aliquam hendrerit elit. Ut faucibus arcu id justo sollicitudin fringilla. Donec mattis tincidunt ipsum in cursus.

                                    Integer ullamcorper orci massa, id semper neque dignissim ac. Etiam condimentum arcu vel nisi varius sagittis. Praesent faucibus lorem ac lorem faucibus, vel accumsan est interdum. Vestibulum tincidunt sem lorem, in efficitur velit maximus a. Donec posuere eget massa vel tincidunt. Vivamus lorem odio, condimentum in hendrerit quis, luctus vitae ipsum. In euismod sem ex. Praesent finibus leo a velit cursus suscipit eget sit amet nulla. Integer vel lectus odio. Integer nisl tellus, facilisis et interdum ut, lobortis pretium mauris.

                                    Nulla consequat lobortis diam ac blandit. Cras ultricies tellus sed enim aliquet laoreet. Mauris vehicula ultricies sapien. Proin sodales commodo lacinia. Suspendisse et arcu iaculis turpis pellentesque bibendum quis sagittis sapien. Nam fermentum magna nec justo tristique varius. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam in risus nibh. Aenean eget lectus sit amet ex condimentum convallis. Etiam a metus eget metus sodales dictum id luctus ex. Proin eu luctus lectus. Cras interdum eros ac ex tempor, ut vestibulum odio scelerisque. Maecenas pretium augue sapien, ut ornare ex cursus eget. Donec fermentum risus id laoreet ullamcorper. Vestibulum nulla ex, lacinia sit amet libero in, convallis elementum ipsum.

                                    Vestibulum consequat ante tempus ligula tristique, id consectetur enim convallis. Morbi vehicula rhoncus imperdiet. Curabitur et odio a risus pellentesque iaculis. Morbi ac mi pretium, porttitor eros eu, posuere nibh. Proin magna ante, congue non tincidunt eget, tempor sed erat. Morbi molestie, elit sit amet commodo dictum, augue ipsum iaculis mi, non condimentum purus neque sit amet ligula. Fusce at vulputate risus. Proin quis bibendum arcu. Duis laoreet viverra mi eget blandit. Duis ultrices lorem vitae leo luctus sollicitudin. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse sollicitudin, erat in venenatis suscipit, nulla nulla sollicitudin elit, eget tincidunt ligula magna non elit. Vestibulum velit nunc, tincidunt a nulla commodo, maximus fermentum leo. Praesent in ante lorem. Cras dolor ante, ornare eu scelerisque vel, suscipit nec magna.
                                    Curabitur tristique arcu sed est sodales, ut porta tortor accumsan. Vestibulum turpis neque, varius et augue non, dapibus aliquam purus. In purus dolor, tincidunt ut massa vel, rhoncus viverra leo. Quisque fringilla nunc eget neque ornare, vel euismod massa pharetra. Nam velit odio, finibus eget ligula ut, dapibus suscipit nunc. Vivamus vel ante a massa malesuada aliquam at congue purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed interdum aliquam consequat. Mauris ut nulla consectetur, blandit odio nec, ultrices mauris. Fusce consectetur eleifend lectus, et pellentesque libero consequat sed. Suspendisse non eros sit amet elit pretium sagittis. Praesent efficitur libero sodales nunc pulvinar, eu mattis mauris dapibus. Donec at volutpat mi.
                                    <br><br>
                                    Ultima revision: 25 de Septiembre del 2014 
                  </p> 
                </div>  
                <div class="span1 hidden-phone" ></div>
            </div> 
            <div class="row-fluid  form" >
                <div class="span5 hidden-phone" >
                </div>
                <div class="span2 " >
                    <input id="terminos" type="button" value="Acpetar" class="k-primary" style="width:100%"/> <br> 
                </div> 
                <div class="span5 hidden-phone" >
                </div>
            </div> 
        </div>
    </div>
    <div id="avisonomodif" class="row-fluid fadein"  >
        <div class="k-block fadein">
            <div class="k-header"> <div class="titulonegro" >Aviso</div></div>
            <div class="row-fluid  form" >
                <div class="span1 hidden-phone" ></div>
                <div class="span10" >
                        Usted no modifico ningun dato.
                </div>  
                <div class="span1 hidden-phone" ></div>
            </div> 
            <div class="row-fluid  form" >
                <div class="span5 hidden-phone" >
                </div>
                <div class="span2 " >
                    <input id="aceptarnomodif" type="button" value="Acpetar" class="k-primary" style="width:100%"/> <br> 
                </div> 
                <div class="span5 hidden-phone" >
                </div>
            </div> 
        </div>
    </div>
    <div id="avisoseguro" class="row-fluid " >
        <div class="k-block fadein">
                <div class="k-header"><div class="titulo">Aviso</div></div>
                <div class="row-fluid  form" >
                                <div class="span1 hidden-phone" ></div>
                                <div class="span10" >
                                    Usted ya no podra modificar los datos de la Empresa <span class="letrarelevante">"{$datosempresa->razon_social}"</span>  
                                    , esta seguro de la información que ingreso.
                                </div>  
                                <div class="span1 hidden-phone" ></div>
                </div> 
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                    </div>
                    <div class="span2 " >
                        <input id="cancelarseguro" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                    </div> 
                    <div class="span2 " >
                        <input id="aceptarseguro" type="button"  value="Editar" class="k-primary" style="width:100%"/>
                    </div> 
                    <div class="span4 hidden-phone" >
                    </div>
                </div> 
        </div>
    </div>
    <div id="avisomodifok" class="row-fluid">
        <div class="k-block fadein">
            <div class="k-header"> <div class="titulonegro" >Atención</div></div>
            <div class="row-fluid  form" >
                <div class="span1 hidden-phone" ></div>
                <div class="span10" >
                        Sus datos se modificaron Correctamente.
                </div>  
                <div class="span1 hidden-phone" ></div>
            </div> 
            <div class="row-fluid  form" >
                <div class="span5 hidden-phone" >
                </div>
                <div class="span2 " >
                    <input id="aceptarmodifok" type="button" value="Acpetar" class="k-primary" style="width:100%"/> <br> 
                </div> 
                <div class="span5 hidden-phone" >
                </div>
            </div> 
        </div>
    </div>
</div>
<script> 
ocultar('editardatosrelevantes');
ocultar('terruex');
ocultar('avisonomodif');
ocultar('avisoseguro');
ocultar('avisomodifok');
var swempresa='0';
//*----------------------esto es para lo0s botones----------------------
$("#cancelaradvertenciamodif").kendoButton();
$("#aceptaradvertenciamodif").kendoButton();
var cancelaradvertenciamodif = $("#cancelaradvertenciamodif").data("kendoButton");
var aceptaradvertenciamodif = $("#aceptaradvertenciamodif").data("kendoButton");
cancelaradvertenciamodif.bind("click", function(e){   
    remover(tabStrip.select());  
}); 
aceptaradvertenciamodif.bind("click", function(e){   
    cambiar('mensajeadvertenciaedicion','editardatosrelevantes');
}); 
//--------------------------------esto es para los combos-------------------------------------
$("#tipoempresa").kendoComboBox(
{   placeholder:"Tipo de Empresa",
    dataTextField: "tipoempresa",
    dataValueField: "Id",
    dataSource: [
    {section name=tipoempresa loop=$datostipoempresa}		
    { tipoempresa: "{$datostipoempresa[tipoempresa].abreviatura}", Id: {$datostipoempresa[tipoempresa].id_tipo_empresa} },
   {/section} 
    ],
    value:"{$datosempresa->idtipo_empresa}",
    change : function (e) {
        if (this.value() && this.selectedIndex == -1) { 
         this.text('');
        }
    }
});
$("#actividad").kendoComboBox(
{   placeholder:"Actividad Economica",
    dataTextField: "actividadeconomica",
    dataValueField: "Id",
    value:"{$datosempresa->idactividad_economica}",
    dataSource: [
    {section name=actividadeconomica loop=$datosactividadeconomica}		
    { actividadeconomica: "{$datosactividadeconomica[actividadeconomica].descripcion}", Id: {$datosactividadeconomica[actividadeconomica].id_actividad_economica} },
   {/section} 
    ],
    change : function (e) {
        if (this.value() && this.selectedIndex == -1) { 
            this.text('');
        }
    }
});
//------------------------almaceno la data del form ruex-----------------------------
var ruexformserialize=$('#ruex').serialize();
//para los radios...................................................
$(document).ready(function(){
    $('#privada').click(function(){

         $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=admEmpresaTemporal&tarea=radio&sw=1',
        success: function (data) {
           $("#radio").html(data);
            }
        });
    }); 
    $('#publica').click(function(){
        $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=admEmpresaTemporal&tarea=radio&sw=0',
        success: function (data) {
           $("#radio").html(data);
            }
        });
    });
});
//--------------------para los terminos del ruex-----------------------------------------
function terminosruex()
{
    cambiar('editardatosrelevantes','terruex');
}
$("#terminos").kendoButton();
var terminos = $("#terminos").data("kendoButton");
terminos.bind("click", function(e){   
    cambiar('terruex','editardatosrelevantes');
});
//-------------------------para el validador----------------------
var validator = $("#ruex").kendoValidator({
    rules:{
         radio: function(input) { 
              var validate = input.data('radio');
             if (typeof validate !== 'undefined' && validate !== false) 
             {
                 return $("#ruex").find("[name=" + input.attr("name") + "]").is(":checked");
             }
             return true;
         }, 
         checkvalidator: function(input) { 
             var validate = input.data('checkvalidator');
             if (typeof validate !== 'undefined') 
             {
                 if(verificacheckboxnotificacion())
                 {
                     return true;
                 }
                 else
                 {
                     return false;
                 }
             }
             return true;
         }
    },
    messages:{
         check: "Aceptar los terminos y condiciones es un requisito.",
         radio: "Seleccione una opción",
         checkvalidator: 'Escoja al menos un rubro de exportación',
    }
}).data("kendoValidator");
function verificacheckboxnotificacion()
{
   var sw=1;
   $("input:checkbox[name='rubroexportacionesarray[]']:checked").each(function()
    {
        sw=0;
    });
   if(sw==0)
   {
       return true
   }
   else
   {
       return false
   }
}
//------------------------para los botones del formulario de dedicion----------------------
/*---------------------------butttons--------------------------------------*/
$("#cancelaredicion").kendoButton();
var cancelaredicion = $("#cancelaredicion").data("kendoButton");
cancelaredicion.bind("click", function(e){   
    remover(tabStrip.select());  
}); 
$("#registro").kendoButton();
var registro = $("#registro").data("kendoButton");
registro.bind("click", function(e){  
    //---- esta parte es para todots los datos de la empresa
    if(validator.validate())
    {
        verificaredicionempresa();
        if(swempresa=='1')
        {
            cambiar('editardatosrelevantes','avisoseguro');
        }
        else
        {
            cambiar('editardatosrelevantes','avisonomodif');
        }
    }
}); 
function verificaredicionempresa()// aqui verfico si se a tocado el formulario de la empresa
{
    var ruexformserializenuevo=$('#ruex').serialize();
    cadena=ruexformserializenuevo.slice(0,ruexformserializenuevo.length-9);
    if(cadena!=ruexformserialize){
        swempresa='1';
    }
}
//--------------para el cambio cuando no avisa nada-----------------------
$("#aceptarnomodif").kendoButton();
var aceptarnomodif = $("#aceptarnomodif").data("kendoButton");
aceptarnomodif.bind("click", function(e){   
    cambiar('avisonomodif','editardatosrelevantes');
}); 
//------------------esto es para los botones de aceptar la modificacion de datos-----------
$("#cancelarseguro").kendoButton();
var cancelarseguro = $("#cancelarseguro").data("kendoButton");
cancelarseguro.bind("click", function(e){   
    cambiar('avisoseguro','editardatosrelevantes');
});
$("#aceptarseguro").kendoButton();
var aceptarseguro = $("#aceptarseguro").data("kendoButton");
aceptarseguro.bind("click", function(e){   
    {if $renovacion}
        var dato=$('#ruex').serialize()+'&renovacion=1'
    {else}
        var dato=$('#ruex').serialize();
    {/if}
    $.ajax({             
        type: 'post',
        url: 'index.php',
        data:dato,
        success: function (data) { 
            var respuesta = eval('('+data+')');
            if(respuesta[0].suceso=='0')
            {
                ocultar('mavisoconfiguracionempresa');
                $("#nombresvista").html(respuesta[0].nombrecomercial);
                cambiar('avisoseguro','avisomodifok');
            }
            else
            {   
                alert('Tiene problemas de conexion por favor intente mas tarde.');
            }
        }
    });
});
//----------------------------para el aviso de modificación con exito--------------
$("#aceptarmodifok").kendoButton();
var aceptarmodifok = $("#aceptarmodifok").data("kendoButton");
aceptarmodifok.bind("click", function(e){   
   remover(tabStrip.select());
});
//-----------------------------------------para el representante legal-------------------------------
$("#representante").kendoComboBox(
{   placeholder:"Representante Legal (Apoderado)",
    dataTextField: "nombres",
    dataValueField: "id_persona",
    dataSource: [
    {foreach from=$personal item=personaf}    
            { nombres: "{$personaf.nombres} - {$personaf.numero_documento}", id_persona: '{$personaf.id_persona}' },
    {/foreach}
    ],
    value:"{$persona->id_persona}",
    change : function (e) {
        if (this.value() && this.selectedIndex == -1) { 
         this.text('');
        }
    }
});
//--------------------------------modificacion fundaempresa------------------
</script> 