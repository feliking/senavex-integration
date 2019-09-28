<div class="row-fluid  form" >
    <div class="row-fluid "  id="editarempresa" >
        <div class="span12" >
                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" > Configuración</div>  
                            </div>                                      
                        </div>  
                    </div>
                    <div class="row-fluid " >
                        <div class="span2 " >
                            <img  src="styles/img/empresas/{$id_empresa}.{$formato_imagen}" class="imgpersonaalta" id="imgpersonaconf" onError='this.onerror=null;imgendefectoempresaconf(this);' onclick="$('#fotoupload').click();"/>
                            <form id="fotoform" action="index.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="opcion" id="opcion" value="funcionesGenerales" />
                                    <input type="hidden" name="tarea" id="tarea" value="subirimagen" />
                                    <input type="file" name="fotoupload" id="fotoupload"  style="display: none;" accept="image/*"/>
                            </form>
                            <script type="text/javascript"> 
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                     var reader = new FileReader();
                                    reader.onload = function (e) {
                                        swfoto='1';// avisamos al formulario que se a cambiado de foto;
                                        $('#imgpersonaconf').attr('src', e.target.result);
                                    }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                                $("#fotoupload").change(function(){
                                    readURL(this);
                            });
                            </script> 
                        </div>     
                        <div class="span10 " >
                             <div class="row-fluid form" >  
                                <div class="span4" >
                                    <form id="usuarioform"> 
                                        <input type="text" class="k-textbox "  placeholder="Usuario"  name="usuarioconf" id="usuarioconf" value="{$usuario}" 
                                        required  data-required-msg="Por favor introduzca un usuario"  
                                        data-availableusuario />
                                    </form>    
                                </div>
                                <div class="span8 parametro" >
                                    <center>{$perfil}</center>
                                </div>
                            </div>
                            <div class="row-fluid form" >
                                <div class="span4" >
                                <input type="password" class="k-textbox "  placeholder="Contraseña"  name="contrasenaconf" id="contrasenaconf"/>
                                </div>
                                <div class="span8 parametro fadein" id="mensajecontrasena">
                                    <center>Introducir su contraseña para cambiarla.</center>
                                </div>
                                <div class="span8 parametro fadein" id="contrasenaincorrecta">
                                    <center>Contraseña Incorrecta, por favor intente de nuevo.</center>
                                </div>
                                <div class="span8" id="nuevacontrasena"> 
                                    <form id="contrasenaform">
                                    <div class="span6 fadein" >
                                    <input type="password" class="k-textbox "  pattern=".{literal}{8,}{/literal}" placeholder="Nueva contraseña"  name="contrasenanuevaconf" id="contrasenanuevaconf"
                                           validationMessage="Ingrese al menos 8 digitos"
                                           required data-required-msg="Ingrese su contraseña."/>
                                    </div>
                                    <div class="span6 fadein" >
                                    <input type="password" class="k-textbox "  placeholder="Repetir nueva contraseña"  name="contrasenanuevareptconf" id="contrasenanuevareptconf"
                                     required data-required-msg="Confirmar su contraseña."
                                      data-matches="#contrasenanuevaconf" data-matches-msg="Las Contraseñas no Coinciden"  />
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="k-cuerpo">    
                    <form name="ruex" id="ruex" method="post"  action="index.php"  onkeypress="return anular(event)" enctype="multipart/form-data">
                        <div class="row-fluid form" >
                                    <div class="barra" >                                         
                                    </div> 
                        </div> 
                        <div class="row-fluid form" >
                                    <div class="span3 " >
                                        <input style="width:100%;" id="departamento" name="departamento" required validationMessage="Por favor escoja su departamento"/>
                                    </div> 
                                    <div class="span3 " >
                                        <input type="text" class="k-textbox "  placeholder="Ciudad"  id="ciudad" name="ciudad" value="{$datosempresa->ciudad}" required validationMessage="Por favor ingrese la ciudad"/>
                                    </div>    
                                    <div class="span3 " >
                                        <input type="text" class="k-textbox "  onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{$datosempresa->numero_contacto}" placeholder="Numero de Contacto" maxlength="20" id="numero" name="numero" required validationMessage="Por favor ingrese su numero telefonico"/>
                                    </div> 
                                    <div class="span3 " >
                                        <input type="text" class="k-textbox "  onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Fax"  id="fax" maxlength="11" name="fax" value="{$datosempresa->fax}" validationMessage="Por favor un numero de Fax valido"/>
                                    </div> 
                        </div>
                        <div class="row-fluid form" >                                    
                                    <div class="span6 " >
                                        <input type="text" class="k-textbox "  placeholder="Direcci&oacute;n Domicilio Legal" id="direccion" name="direccion" value="{$datosempresa->direccion}" required validationMessage="Por favor ingrese su dirección"/>
                                    </div>    
                                    <div class="span6 " >
                                        <input type="text" class="k-textbox "  placeholder="Direcci&oacute;n Domicilio Fiscal" id="direccionfiscal" name="direccionfiscal" value="{$datosempresa->direccionfiscal}" required validationMessage="Por favor ingrese su dirección"/>
                                    </div>   
                        </div>
                        <div class="row-fluid form" >
                                    <div class="span6 " >
                                        <input type="text" class="k-textbox "  placeholder="Pagina Web" id="paginaweb" name="paginaweb" value="{$datosempresa->pagina_web}" />
                                    </div>    
                                    <div class="span3 " >
                                        <input type="email" class="k-textbox "  placeholder="Email" id="email" name="email" value="{$datosempresa->email}"  
                                               required data-required-msg="Introduzca un correo electronico"
                                                        data-available 
                                                        data-available-url="validate/username" 
                                                       />
                                    </div> 
                                    <div class="span3 " >
                                        <input type="email" class="k-textbox "  placeholder="Email Secundario" id="email2" name="email2" value="{$datosempresa->email_secundario}" validationMessage="Por favor ingrese un correo electronico valido"/>
                                    </div> 
                        </div> 
                        <div class="row-fluid form" >
                                    <div class="barra" >                                         
                                    </div> 
                        </div> 
                    </form>  
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
                                <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('configuracionEmpresa')" style="max-width:35px;" class="ayuda">
                             </div> 
                        </div> 
                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                        <div class="row-fluid form" > 
                            {if $solicitudmodificacion=='0'}
                            <div class="span8" >
                                Para modificar los siguientes datos o <span class='letrarelevante'>renovar su Ruex</span> ,se debe enviar una solicitud al Senavex.
                            </div>  
                            <div class="span2" >
                                <input id="solicitarmodificaciones" type="button"  value="Solicitar" class="k-primary" style="width:100%"/>
                            </div>
                            {else}
                            <div class="span10" >
                                Su empresa ya envio una solicitud de modificación.
                            </div> 
                            {/if}
                            <div class="span2" ></div>
                        </div>
                        <div class="row-fluid " >
                            <div class="span2 parametro" >
                                Razon Social:
                            </div>     
                            <div class="span10 campo" >
                                {$datosempresa->razon_social} 
                            </div>  
                        </div>
                        <div class="row-fluid " >
                            <div class="span2 parametro" >
                                Nombre Comercial:
                            </div>     
                            <div class="span7 campo" >
                                {$datosempresa->nombre_comercial} 
                            </div>
                            <div class="span1 parametro" >
                                Nit:
                            </div>     
                            <div class="span2 campo" >
                                {$datosempresa->nit}
                            </div> 
                        </div>
                        {if $datosempresa->matricula_fundempresa or $datosempresa->menor_cuantia=="1"}
                        <div class="row-fluid " >
                            {if $datosempresa->matricula_fundempresa}
                                <div class="span2 parametro" >
                                    Nro. FundaEmpresa:
                                </div>     
                                <div class="span4 campo" >
                                   {$datosempresa->matricula_fundempresa}
                                </div> 
                            {/if}
                            {if $datosempresa->menor_cuantia=="1"}
                                    <div class="span6" >
                                       Empresa registrada de Menor cuantia.
                                    </div>  
                            {/if}   
                        </div>
                        {/if}
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
                                {$datosempresa->vigencia}
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
                                Categoria Empresa:
                            </div>     
                            <div class="span2 campo" >
                                {$datosempresa->idcategoria_empresa} 
                            </div> 
                            <div class="span2 parametro" >
                                Tipo de Empresa:
                            </div>     
                            <div class="span2 campo" >
                                {$datosempresa->idtipo_empresa}
                            </div> 
                            <div class="span2 parametro" >
                                Actividad:
                            </div>     
                            <div class="span2 campo" >
                                {$datosempresa->idactividad_economica}
                            </div> 
                        </div> 
                        <div class="row-fluid  form" >
                            <div class="span2 parametro" >
                                <b>Rubro de Exportaciones:</b>
                            </div>     
                            <div class="span10 campo" >
                               {$datosempresa->idrubro_exportaciones}
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
                        {if $datosempresa->nim}
                            <div class="row-fluid  form" >
                                <div class="span2 parametro" >
                                    <b>N&uacute;mero de Identificación Minera:</b>
                                </div>     
                                <div class="span10 campo" >
                                    {$datosempresa->nim}
                                </div>  
                            </div>
                        {/if}   
                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                        <div class="row-fluid  form" >
                            <div class="span12 parametro" >
                                <center>Datos Representante Legal(Apoderado)</center>
                            </div>  
                        </div>
                        <div class="row-fluid  form" >
                            <div class="span2 parametro" >
                                <b>Nombre:</b>
                            </div>     
                            <div class="span5 campo" >
                                {$persona->nombres} {$persona->paterno} {$persona->materno}
                            </div>   
                            <div class="span2 parametro" >
                                <b>{$persona->id_tipo_documento}:</b>
                            </div>     
                            <div class="span3 campo" >
                                {$persona->numero_documento}
                            </div>  
                        </div>
                    </div>
                </div>
        </div>
    </div>  
    <div class="row-fluid "  id="confirmaredicion" >
        <div class="k-block fadein">
            <div class="k-header">
                    <div class="k-header"><div class="titulo">Aviso</div></div>
            </div>
            <div class="k-cuerpo"> 
                <div class="row-fluid  form" >
                        <div class="span1" > </div>
                        <div class="span10" >
                            <p> <span id="mensajeconfirmacionedicion"> Sus datos se cambiaron correctamente.</span> 
                            </p> 
                        </div>  
                        <div class="span1" ></div>
                </div> 
                <div class="row-fluid  form" >
                        <div class="span5 hidden-phone" >
                         </div>
                         <div class="span2 " >
                             <input id="aceptaredicion" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
                         </div> 
                         <div class="span5 hidden-phone" >
                         </div>
                </div> 
            </div>   
        </div>
    </div>   
     <div class="row-fluid "  id="confirmarsolicitud" >
        <div class="k-block fadein">
            <div class="k-header">
                    <div class="k-header"><div class="titulo">Aviso</div></div>
            </div>
            <div class="k-cuerpo"> 
                <div class="row-fluid  form" >
                    <div class="span2" > </div>
                    <div class="span8" >
                        <p> Debido a que los datos son de relavancia en la emisión de Certificados de Origen,el cambio tiene un costo.<br>
                            <span class="letrarelevante">Nota:</span> No se puede cambiar el numero de <span class="letrarelevante">RUEX, NIT{if $datosempresa->matricula_fundempresa}, Matricula FUNDAEMPRESA{/if}.</span>
                        </p> 
                    </div>  
                    <div class="span2" ></div>
                </div> 
                <div class="row-fluid  form" >
                    <div class="span2" > </div>
                    <div class="span8" >
                         <input type="checkbox"  id="checkrenovacion">Enviar solicitud con Renovaci&oacute;n de RUEX
                    </div>  
                    <div class="span2" ></div>
                </div> 
                <form id="solicitudform">
                    <div class="row-fluid  form" >
                        <div class="span2" > </div>
                        <div class="span8" >
                            <textarea id="camposolicitud" class="k-textbox " style="width:100%" required placeholder="Ingrese los motivos para la modificacion de sus datos."
                                      validationMessage="Ingrese el motivo por el cual solicita la modificación"></textarea>
                        </div>  
                        <div class="span2" ></div>
                    </div> 
                    <div class="row-fluid form" >  
                        <div class="span12 " >
                            <input type="checkbox" name="check" data-check  required data-required-msg="Aceptar los terminos y condiciones es un requisito">  Acepto los <span class='terminos' onclick="terminosmodificacion()"> Terminos y Condiciones </span>  para la modificación de los datos de mi empresa.
                        </div>  
                    </div> 
                    <div class="row-fluid  form" >
                        <div class="span4 hidden-phone" >
                        </div>
                        <div class="span2 " >
                            <input id="cancelarsolicitud" type="button" value="Cancelar" class="k-primary" style="width:100%"/>
                        </div> 
                        <div class="span2" >                             
                            <input id="aceptarsolicitud" type="button"  value="Enviar" class="k-primary" style="width:100%"/>
                        </div>
                        <div class="span3 hidden-phone" >
                        </div>
                        <div class="span1 " >
                            <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('ayudaMotivosModificacion')" style="max-width:35px;" class="ayuda">
                        </div>
                    </div> 
                </form> 
            </div>   
        </div>
    </div>  
    <div class="row-fluid "  id="termodificacion" >
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

                                    Donec mattis nisl nisi, nec ullamcorper mi luctus nec. Donec facilisis nibh ac venenatis euismod. Suspendisse potenti. Integer non rutrum urna. Nulla ut erat a metus luctus aliquam. Nulla urna lacus, tempor vel nunc sed, efficitur elementum nulla. Sed eu leo et libero sodales finibus nec ac est. Morbi rutrum lorem lorem, vel ullamcorper ipsum imperdiet sed. Integer facilisis, risus vel finibus faucibus, erat nisl euismod augue, eu vehicula arcu augue at turpis. Nam vestibulum nulla sed porta congue. Ut volutpat diam vel lobortis iaculis. In tincidunt nunc vel interdum lacinia. Mauris sollicitudin mi nunc, vitae molestie nulla bibendum id. Aliquam erat volutpat. Mauris eu eros tortor. Praesent id dui ut sapien molestie euismod sit amet cursus dui.

                                    Aenean ac dui dui. Duis vulputate elit at ante congue ullamcorper. Cras molestie efficitur mauris, quis tincidunt justo finibus at. Donec rutrum ultrices tincidunt. Cras at pharetra diam. Suspendisse vestibulum ut tortor eu varius. Sed convallis ut augue nec mollis. Praesent eu nunc ligula. Aliquam vestibulum nibh vitae faucibus mattis. Cras in scelerisque ligula, in congue nunc. Nunc in ullamcorper magna. Fusce sapien nisl, feugiat eu metus vitae, luctus aliquet tellus.

                                    Etiam non faucibus ipsum. Maecenas molestie sem a justo tempor, eu interdum ante iaculis. Phasellus consectetur eros ac sem ultricies laoreet non quis ante. Sed congue neque id suscipit pretium. Ut eleifend, velit sed malesuada scelerisque, nisi augue cursus tellus, eget molestie massa quam eget ligula. Quisque eu urna et metus bibendum commodo. Nulla mollis blandit enim, et dapibus leo vestibulum ac. Aliquam efficitur urna risus, in commodo lectus commodo eget. Proin ante erat, sagittis nec dignissim a, suscipit ut nisi.

                                    Suspendisse malesuada lacus vestibulum velit faucibus iaculis. Sed tincidunt, ligula ac molestie dignissim, libero diam pellentesque sem, ac auctor libero mi porta mi. Suspendisse augue augue, cursus id aliquet sit amet, dignissim non nisl. Curabitur non leo non sapien convallis fringilla. Aliquam sem purus, mollis sit amet ipsum a, volutpat lacinia eros. Fusce suscipit mi ex, sed luctus diam varius et. Cras condimentum felis nec posuere vestibulum. Integer venenatis neque nulla, eget consectetur magna elementum at. Nulla fringilla nulla nisl, sit amet ullamcorper erat auctor sit amet. Morbi vitae purus pellentesque, pellentesque dui nec, consectetur erat. Suspendisse potenti.

                                    In mi dui, blandit non felis sit amet, pharetra convallis libero. Curabitur hendrerit porttitor mauris fermentum gravida. Duis pulvinar maximus dolor, eget congue ligula egestas sed. Suspendisse potenti. Ut faucibus lorem eu nulla accumsan molestie. Morbi eget eros sit amet velit sagittis auctor non nec libero. Sed venenatis leo eget nunc finibus egestas. Maecenas iaculis pellentesque neque. Vivamus lectus est, accumsan a bibendum vel, condimentum non orci. Nullam quis justo eu mi ullamcorper faucibus. Cras id tincidunt arcu, in placerat elit.

                                    Donec eleifend augue sit amet massa porta pretium. Etiam fermentum nibh neque, eu ornare lectus mollis ut. Curabitur faucibus eros nec ipsum semper rhoncus. Sed semper tellus nibh, vitae rutrum arcu porta ac. In condimentum, orci vel elementum feugiat, metus ipsum blandit nulla, vitae viverra purus dolor ac augue. Suspendisse potenti. Mauris convallis augue odio, eu ultricies tortor tincidunt ut. Duis nec gravida arcu, ac mattis turpis. Praesent pulvinar odio massa, a posuere dolor ultrices ac. Donec ac augue sed ligula lobortis feugiat.

                                    Pellentesque et tellus velit. Curabitur non dolor ac sapien ornare ullamcorper. In hac habitasse platea dictumst. Cras tortor sem, lacinia pulvinar velit tempor, tincidunt congue felis. Praesent mauris urna, efficitur vel convallis sed, volutpat eu sem. Mauris tristique mollis facilisis. Donec efficitur finibus condimentum.

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
                    <input id="termodificacionbutton" type="button" value="Acpetar" class="k-primary" style="width:100%"/> <br> 
                </div> 
                <div class="span5 hidden-phone" >
                </div>
            </div> 
        </div>
    </div>
</div> 
<script> 
ocultar('confirmaredicion');
ocultar('nuevacontrasena');
ocultar('contrasenaincorrecta');
ocultar('confirmarsolicitud');
ocultar('termodificacion');
var swcontrasena='0';
var swusuario='0';
var swempresa='0';
var swpasar='0';//esta variable es general me indica si todos los campos en general esan validados
var swfoto='0';
//--------------------------esta parte es para la confirmacion de modificacion-----------------------

var solicitudform = $("#solicitudform").kendoValidator().data("kendoValidator");
$("#aceptarsolicitud").kendoButton();
var aceptarsolicitud = $("#aceptarsolicitud").data("kendoButton");
aceptarsolicitud.bind("click", function(e){
    var renovacion='0';
    if($("#checkrenovacion").prop("checked"))//esto es para ver si envia con renovacion
    {
        renovacion='1';
    }
    if(solicitudform.validate())
    {
        //$("#camposolicitud").val()
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data:'opcion=admEmpresa&tarea=solicitudModificacion&modificacion='+$("#camposolicitud").val()+'&renovacion='+renovacion,
            success: function (data) { 
                var respuesta = eval('('+data+')');
                if(respuesta[0].suceso=='0')
                {
                    $("#mensajeconfirmacionedicion").html('Su solicitud a sido enviada correctamente');
                    cambiar('confirmarsolicitud','confirmaredicion');
                }
                else if(respuesta[0].suceso=='1')
                {   
                    $("#mensajeconfirmacionedicion").html('Su empresa ya realizo una petición para la modificación de sus datos');
                    cambiar('confirmarsolicitud','confirmaredicion');
                }
                else
                {
                     alert('Tiene problemas de conexion por favor intente mas tarde.');
                }
            }
        });
    }
});
$("#cancelarsolicitud").kendoButton();
var cancelarsolicitud = $("#cancelarsolicitud").data("kendoButton");
cancelarsolicitud.bind("click", function(e){
    cambiar('confirmarsolicitud','editarempresa');
});
function terminosmodificacion()
{
    cambiar('confirmarsolicitud','termodificacion');
}
$("#termodificacionbutton").kendoButton();
var termodificacionbutton = $("#termodificacionbutton").data("kendoButton");
termodificacionbutton.bind("click", function(e){
    cambiar('termodificacion','confirmarsolicitud');
});
//----------------------para las fotos-------------------------------
//form de la foto
$( "#fotoform" ).submit( function( e ) {
    e.preventDefault();
    $.ajax( {
        url: 'index.php',
        type: 'post',
        data: new FormData( this ),
        processData: false,
        contentType: false,
        success: function (data) { 
            var respuesta = eval('('+data+')');
            if(respuesta[0].suceso=='0')
            {
                d = new Date();
                document.getElementById("imagenempresacabecera").src='styles/img/empresas/'+respuesta[0].id_empresa+'.'+respuesta[0].formato_imagen+'?'+d.getTime();
                cambiar('editarempresa','confirmaredicion');
            }
            else
            {
                alert(respuesta[1].suceso);
            }
        }
    });
});
//-------------------------------para las contraseñas------------------------------------
var usuarioconf = $("#usuarioconf").data("kendoMaskedTextBox");
$("#usuarioconf").kendoMaskedTextBox({
    change: function () { 
        if(this.value()!="{$usuario}")//es para preguntar si el usuario es distinto del inicial
        {
            swusuario='1';// para avisra que el usuairo se a mofdificado
        }
        else
        {
            swusuario='0';
        }
    }
 });
 $("#contrasenanuevareptconf").kendoMaskedTextBox({
    change: function () { 
        swcontrasena='1';
    }
 });
 $("#contrasenanuevaconf").kendoMaskedTextBox({
    change: function () { 
        swcontrasena='1';
    }
 });
var contrasenaconf = $("#contrasenaconf").data("kendoMaskedTextBox");
 $("#contrasenaconf").kendoMaskedTextBox({
    change: function () {
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admUsuario&tarea=verificarContrasena&contrasena='+this.value(),
            success: function (data) {
                var respuesta = eval('('+data+')');
                if(respuesta[0].suceso=='1')
                {
                    ocultar('contrasenaincorrecta');
                    cambiar('mensajecontrasena','nuevacontrasena');
                }
                else
                {   ocultar('nuevacontrasena');
                    cambiar('mensajecontrasena','contrasenaincorrecta');
                }
            }
        });
    }
 });
/*---------------------------butttons--------------------------------------*/
$("#cancelaredicion").kendoButton();
var cancelaredicion = $("#cancelaredicion").data("kendoButton");
cancelaredicion.bind("click", function(e){   
    remover(tabStrip.select());  
}); 

$("#aceptaredicion").kendoButton();
var aceptaredicion = $("#aceptaredicion").data("kendoButton");
aceptaredicion.bind("click", function(e){
    remover(tabStrip.select()); 
});
{if $solicitudmodificacion=='0'}
$("#solicitarmodificaciones").kendoButton();
var solicitarmodificaciones = $("#solicitarmodificaciones").data("kendoButton");
solicitarmodificaciones.bind("click", function(e){
    cambiar('editarempresa','confirmarsolicitud');
});
{/if}
////--------------------estoe es para los combos---------------------------
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
        if (this.value() && this.selectedIndex == -1) { 
         fdepartamento()

        }
    }
});
var comboboxdepartamento = $("#departamento").data("kendoComboBox");
comboboxdepartamento.value("{$datosempresa->iddepartamento_procedencia}"); 
function fdepartamento()
{
    departamento.text('');
}
var departamento = $("#departamento").data("kendoComboBox");
//-------------------------para el validador----------------------
var swe=2;
var emailcache='';
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
        available: function(input) { 
            var validate = input.data('available');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                 if (emailcache !== $("#email").val()) 
                 {
                emailajax($("#email").val());                    
                return false;
                }
                if(swe==0)
                {
                   // swe=2;
                     return true;
                }
                if(swe==1)
                {  
                    return false;
                }   
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
        email:"Introduzca un Correo Electronico Valido",
        checkvalidator: 'Escoja al menos un rubro de exportación',
        available: function(input) { 
            if(swe==1)
            {  
              return 'El correo electronico esta siendo utilizado';
            }
            else
            {    
              return 'Revisando..';
            }
         }

   }
   }).data("kendoValidator");
function emailajax(mail)
{
   $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admEmpresaTemporal&tarea=verificarCorreoInstitucional&email='+mail,
            success: function (data) {
               swe=data;
               emailcache=$("#email").val();
               validator.validateInput($("#email"));
             }
            });
}
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
//-----para los botones y el aviso
var swf=0;
    $("#registro").kendoButton();
    var registro = $("#registro").data("kendoButton");
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
    //para la tecl enter............................................
    function anular(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          return (tecla != 13);
     } 
//-------------------------estos son los validadores para el usuairo y la contrasenia joj jojoj
var validatorcontrasenaform = $("#contrasenaform").kendoValidator({
    rules: {
        matches: function(input) {
            var matches = input.data('matches');
            if (matches) 
            {
                var match = $(matches);
                if ( $.trim(input.val()) === $.trim(match.val()) )  {
                    return true;
                } else {
                    return false;
                }
            }
            return true;
        }
    },
    messages: {
        matches: function(input) {
            return input.data("matchesMsg");
        }
    }
}).data("kendoValidator");
//-----para la edicion de usuario
var sweusuario=2;
var usuariocache='';
var validatorusuarioform = $("#usuarioform").kendoValidator({
    rules:{ 
        availableusuario: function(input) { 
            var validate = input.data('availableusuario');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (usuariocache !== $("#usuarioconf").val()) 
                {
                    if($("#usuarioconf").val()=="{$usuario}")
                    { 
                        return true;
                    }
                    else
                    {
                        usuarioajaxconf($("#usuarioconf").val());                    
                        return false;
                    }
                }
                if(sweusuario==0)
                {
                    return true;
                }
                if(sweusuario==1)
                {  
                    return false;
                }  
            }
            return true;
        } 
    },
    messages:{
        availableusuario: function(input) { 
                if(sweusuario==1)
                {  
                  return 'El usuario esta siendo utilizado';
                }
                else
                {    
                  return 'Revisando..';
                }
        }
           
    }
}).data("kendoValidator");
function usuarioajaxconf(usuario)
{
    $.ajax({             
    type: 'post',
    url: 'index.php',
    data: 'opcion=admUsuario&tarea=verificarUsuario&nuevousuario='+usuario,
    success: function (data) { 
        sweusuario=data;
        usuariocache=$("#usuarioconf").val();
        validatorusuarioform.validateInput($("#usuarioconf"));
    }
    });
}
//--------------------poton de registro-------------------------------
function verificaredicionempresadatos()// aqui verfico si se a tocado el formulario de la empresa
{
    if(comboboxdepartamento.text()!= "{$datosempresa->iddepartamento_procedencia}" || $("#direccion").val().trim()!= "{$datosempresa->direccion}" 
        || $("#ciudad").val().trim()!= "{$datosempresa->ciudad}"
        || $("#numero").val().trim()!= "{$datosempresa->numero_contacto}" 
        || $("#direccionfiscal").val().trim()!= "{$datosempresa->direccionfiscal}" 
        || $("#email").val().trim()!= "{$datosempresa->email}" || $("#fax").val().trim()!= "{$datosempresa->fax}" 
        || $("#paginaweb").val().trim()!= "{$datosempresa->pagina_web}" || $("#email2").val().trim()!= "{$datosempresa->email_secundario}")
    {
        swempresa='1';
    }
}
registro.bind("click", function(e){  
    //---- esta parte es para todots los datos de la empresa y o usuario
    verificaredicionempresadatos();
    if((swusuario=='1' && validatorusuarioform.validate()) || (swcontrasena=='1' && validatorcontrasenaform.validate())
            || (swempresa=='1' && validator.validate()) || swfoto=='1')
    {
        
        if(swfoto=='1')
        {
            $( "#fotoform" ).submit();
        }   
        var parametros=''; 
        if(swusuario=='1')
        {
            parametros='&nuevousuario='+$("#usuarioconf").val();
        }
        if(swcontrasena=='1')
        {
            parametros=parametros+'&nuevacontrasena='+$("#contrasenanuevaconf").val();
        }
        if(swempresa=='1')
        {
            parametros=parametros+'&swempresa=1&'+$( "#ruex" ).serialize();
        }
        if(swusuario=='1' || swcontrasena=='1' || swempresa=='1')//preguntamos si la foto es la unica que se cambio
        {
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data:'opcion=admEmpresa&tarea=editarEmpresa'+parametros,
                success: function (data) { 
                    var respuesta = eval('('+data+')');
                    if(respuesta[0].suceso=='0')
                    {
                        cambiar('editarempresa','confirmaredicion');
                    }
                    else
                    {   
                        alert('Tiene problemas de conexion por favor intente mas tarde.');
                    }
                }
            });
        }
    }
}); 
</script> 