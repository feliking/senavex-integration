
<div class="row-fluid" >
    <div  id="formulario" >
        <form name="formcafe" id="formcafe" method="post"  action="index.php">
            <input type="hidden" name="opcion" id="opcion" value="admCafe" />
            <input type="hidden" name="tarea" id="tarea" value="save_cafe" />    
            <input type="hidden" name="id_cafe" id="id_cafe" value="{$cafeBorrador->getId_cafe_certificado()}"/>
            
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="titulo">Certificado de Origen - Cafe</div>
                </div>
                <div class="k-cuerpo">
                    
                    <div class="row-fluid form" >
                        
                    </div>
                     <div class="span11" >
                        <fieldset class="row-fluid  form">
                            <legend>Datos de la Factura</legend>
                            <div class="row-fluid form" >
                                 <div class="span3 " >
                                    <input type="text" class="k-textbox"  style="width:90%;margin-bottom:5px;"  value="{$cafeBorrador->getNro_factura()}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                                        placeholder="Nro. de Factura"  name="nrofactura" id="nrofactura" required validationMessage="Por favor ingrese el numero de su factura." /><br>
                                </div>
                                <div class="span8 " >
                                    <input style="width:100%;" id="idimportador" name="idimportador" required validationMessage="Seleccione el Importador">    
                                </div>
                                <!--div class="span2" style="text-align: left;" >
                                    <input id="addimportador" type="button" value="Agregar Importador" class="k-primary" style="width:40"/> 
                                </div-->
                            </div>
                            <div class="row-fluid form" >
                                <div class="span3 " >
                                    <input type="text" class="k-textbox"  style="width:90%;" value="{$cafeBorrador->getAutorizacion()}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                                        placeholder="Nro. de Autorización"   name="nroautorizacion" id="nroautorizacion" required validationMessage="Por favor ingrese el numero de su Autorización." /><br>
                                </div>
                                <div class="span8 " >
                                    <input type="text"  class="k-textbox " value="{$cafeBorrador->getDireccion_notificaciones()}" placeholder="direccion para notificaciones" name="dir_notyn" id="dir_notyn"></textarea>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" >
                        </div>
                    </div>
                    <div class="span11" >
                        <fieldset class="row-fluid  form">
                            <legend>INFORMACION DE DESTINO</legend>
                            <div class="row-fluid form" >
                                
                                 <div class="span3 " >
                                    <input style="width:100%;" id="idpaistransbordo" name="idpaistransbordo"  >
                                </div>
                                 <div class="span3 " >
                                     <!--b><label  name="mediotransporte" id="mediotransporte" >Medio de Transporte</label></b-->
                                    <input style="width:100%;" id="idmediotransporte" name="idmediotransporte" required="true" validationMessage="Medio Transporte">
                                </div>
                                <div class="span3 " >
                                    <!--b><label  name="paisdestino" id="paisdestino" >Pais Destino </label></b-->
                                    <input style="width:100%;" id="idpaisdestino" name="idpaisdestino" required="true" validationMessage="Pais Destino">    
                                </div>
                                <div class="span3 " id="puerto">
                                    <!--b><label  name="puerto" id="puerto" >Puerto Embarque </label></b-->
                                    <input style="width:100%;" id="idpuerto" name="idpuerto" required="true" validationMessage="Puerto de Embarque">    
                                </div>

                                
                            </div>
                            <div class="row-fluid form" >
                                
                                <div class="span9">
                                     <input type="text"  class="k-textbox " placeholder="Otras Marcas" value="{$cafeBorrador->getOtras_marcas_oic()}" name="otras_marcas" id="otras_marcas"/>
                                </div>
                                <div class="span3">
                                    <input id="datepicker" type="date" name="fecha_exp" placeholder="dd/mm/aa" value="{$cafeBorrador->getFecha_exportacion()}" style="width:100%"/>   
                                </div> 
                            </div>
                        </fieldset>
                    </div>
                    
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="span2 fadein" >
                            <b><div class="radio">Cargados </div> </b>
                        </div>
                        <div class="span2 fadein" >
                            <div class="radio"><input type="radio" name="cargados" {if $cafeBorrador->getId_tipo_embalaje()==1} checked {/if} value="1" id="cargados" data-radio >En sacos</div> 
                        </div>
                        <div class="span2 fadein" >
                            <div class="radio"><input type="radio" name="cargados" {if $cafeBorrador->getId_tipo_embalaje()==2} checked {/if} value="2" id="cargados" data-radio >A granel</div>  
                        </div>
                        <div class="span3 fadein" >
                            <div class="radio"><input type="radio" name="cargados" {if $cafeBorrador->getId_tipo_embalaje()==3} checked {/if} value="3" id="cargados" data-radio >En contenedores</div>   
                        </div>
                        <div class="span2 fadein" >
                            <div class="radio"><input type="radio" name="cargados" {if $cafeBorrador->getId_tipo_embalaje()==4} checked {/if} value="4" id="cargados" data-radio >Otros</div>  
                        </div>
                    </div>
                    <div class="row-fluid" >
                        <div class="span " ><center>
                            <input type="hidden" name="hiddenvalidator-checkcargados" id="hiddenvalidator-checkcargados" 
                            data-checkcargados
                            data-required-msg="Por Favor Selecciona una opcion" /></center>
                        </div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="span2 fadein" >
                             <b><div class="radio">Unidad de Peso </div> </b>
                        </div>
                        <div class="span1 fadein" >
                            <div class="radio"><input type="radio" name="u_peso" {if $cafeBorrador->getId_unidad_medida()==1} checked {/if} value="1" id="u_peso" data-radio required >Kg</div> 
                        </div>
                        <div class="span1 fadein" >
                            <div class="radio"><input type="radio" name="u_peso" {if $cafeBorrador->getId_unidad_medida()==2} checked {/if} value="2" id="u_peso" data-radio >Lb</div>  
                        </div>
                        <div class="span2 fadein" >
                            <input type="hidden" name="hiddenvalidator-checkpeso" id="hiddenvalidator-checkpeso" 
                            data-checkpeso
                            data-required-msg="Escoja una Unidad de Peso" />
                        </div> 
                        <div class="span2 " >
                            <input type="text" class="k-textbox " placeholder="Peso Neto" name="peso_neto" value="{$cafeBorrador->getPeso_neto()}" id="peso_neto" required validationMessage="ingrese el peso neto, 5 digitos"/>   
                        </div> 
                        <div class="span3 " >
                            <input style="text" id="iddescripcion" name="iddescripcion"  required validationMessage="Tipo Cafe" >
                        </div>
                    </div>
                   
                    <div class="row-fluid form" >
                        <div class="barra" >
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="span7 parametro" >
                            <b><label>15.Método de Elaboración </label></b>
                        </div> 
                    </div> 
                    <div class="row-fluid form" >
                        <div class="span2 fadein" >
                            <b><div class="radio">Decafeinado </div> </b>
                        </div>
                        <div class="span2 fadein" >
                            <div class="radio"><input type="checkbox" name="decafeinado" {if $cafeBorrador->getDescafeinado()==1} checked {/if} value="1" id="decafeinado" >Descafeinado</div> 
                        </div>
                        <div class="span1 hidden-phone" ></div>
                        <div class="span1 fadein" >
                            <b><div class="radio">Organico </div> </b>
                        </div>
                        <div class="span2 fadein" >
                            <div class="radio"><input type="radio" name="organico" {if $cafeBorrador->getOrganico()==3} checked {/if} value="3" id="organico" data-radio required validationMessage="Seleccione una opcion Porfavor">Certificado</div>  
                        </div>
                        <div class="span2 fadein" >
                            <div class="radio"><input type="radio" name="organico" {if $cafeBorrador->getOrganico()==4} checked {/if} value="4" id="organico" data-radio >No Certificado</div>   
                        </div>
                        <div class="span2 fadein" >
                            <input type="hidden" name="hiddenvalidator-checkorganico" id="hiddenvalidator-checkorganico" 
                            data-checkorganico
                            data-required-msg="Escoja una Opcion" />
                        </div> 
                    </div>
                    
                    <div class="row-fluid form" >
                        <div id="cafe_verde">
                            <div class="span2 fadein" >
                                <b><div class="radio">Cafe verde</div> </b>
                            </div>
                            <div class="span2 fadein" >
                                <div class="radio"><input type="radio" name="cafe_v" {if $cafeBorrador->getCafe_verde()==6} checked {/if} value="6" id="cafe_v" data-radio required>Via Seca</div>
                            </div>
                            <div class="span2 fadein" >
                                <div class="radio"><input type="radio" name="cafe_v" {if $cafeBorrador->getCafe_verde()==7} checked {/if} value="7" id="cafe_v" data-radio>Via Humeda</div>
                            </div>
                            <div class="span3 fadein" >
                                <input type="hidden" name="hiddenvalidator-checkcafev" id="hiddenvalidator-checkcafev" 
                                data-checkcafev
                                data-required-msg="Escoja una Opcion" />
                            </div> 
                        </div>
                         
                    </div>
                    <div class="row-fluid form" >
                        <div id="cafe_soluble">
                            <div class="span2 fadein" >
                                <b><div class="radio">Café Soluble</div> </b>
                            </div>
                            <div class="span2 fadein" >
                                <div class="radio"><input type="radio" name="cafe_s" {if $cafeBorrador->getCafe_soluble()==9} checked {/if} value="9" id="cafe_s" data-radio required>Centrifugado</div>
                            </div>
                            <div class="span2 fadein" >
                                <div class="radio"><input type="radio" name="cafe_s" {if $cafeBorrador->getCafe_soluble()==10} checked {/if} value="10" id="cafe_s" data-radio>Liofilizado</div>
                            </div>
                            <div class="span3 fadein" >
                                <input type="hidden" name="hiddenvalidator-checkcafes" id="hiddenvalidator-checkcafes" 
                                data-checkcafes
                                data-required-msg="Escoja una Opcion" />
                            </div> 
                        </div>
                        
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" > </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="span12" >
                            <b><label>Otra información pertinente:ICC Resolución Número 420; Caracteristicas especiales; Código del SA; Valor del Embarque(informacion Voluntaria)</label>   </b>
                        </div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" > </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="span12 campo" >
                            <b><label>a.Normas Optimas de calidad del café verde (ICC Resolución Número 420</label>   </b>
                        </div> 
                    </div> 
                    <div class="row-fluid form" >

                        <div class="span6 fadein" >
                            <b><div class="radio"> </div> </b>
                            <div class="radio"><input type="radio" name="normas" {if $cafeBorrador->getId_norma_calidad()==1} checked {/if} value="1" id="normas" data-radio required>"S":Plena Observancia de las normas optimas sobre defectos y humedad</div>  
                        </div>

                        <div class="span6 fadein" >

                            <div class="radio"><input type="radio" name="normas" {if $cafeBorrador->getId_norma_calidad()==2} checked {/if} value="2" id="normas" data-radio >"XD":El café no responde a las normas óptimas sobre defectos</div>   
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="span6 fadein" >

                            <div class="radio"><input type="radio" name="normas" {if $cafeBorrador->getId_norma_calidad()==3} checked {/if} value="3" id="normas" data-radio >"XM":El Café no responde a las normas óptimas sobre humedad</div>   

                        </div>
                        <div class="span6 fadein" >
                            <div class="radio"><input type="radio" name="normas" {if $cafeBorrador->getId_norma_calidad()==4} checked {/if} value="4" id="normas" data-radio >"XDM":El café no responde a ninguna de las normas óptimas (ni la referente a defectos ni la referente a humedad</div>   

                        </div>
                    </div>
                     <div class="row-fluid form" >
                       
                        <div class="span6 fadein" >
                            <div class="radio"><input type="radio" name="normas" {if $cafeBorrador->getId_norma_calidad()==0} checked {/if} checked value="0" id="normas" data-radio > NINGUNA DE LAS ANTERIORES </div>   
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div> 
                    <div class="row-fluid form" >
                        <div class="span2 hidden-phone" ></div>
                        <div class="span8" >
                            <input style="width:100%;" id="idcespecial" name="idcespecial" required validationMessage="Caracteristica Especial">
                        </div>

                    </div> 
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="span2 hidden-phone" ></div>
                        <div class="span8" >
                            <input style="width:100%;" id="idsistemaarmonizado" name="idsistemaarmonizado" required validationMessage="Sistema Armonizado">
                        </div>
                    </div> 
                    <div class="row-fluid form" >
                        <div class="barra" >
                        </div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="span2 fadein hidden-phone" ></div>
                        <div class="span2 fadein hidden-phone" >
                            <b><div class="radio">Tipo de Moneda</div> </b>
                        </div>
                        <div class="span2 fadein" >
                            <div class="radio"><input type="radio" name="idmoneda" {if $cafeBorrador->getId_moneda()==3} checked {/if} value="3" id="idmoneda" data-radio required>Euros</div>      
                        </div>
                        <div class="span2 fadein" >
                            <div class="radio"><input type="radio" name="idmoneda" {if $cafeBorrador->getId_moneda()==2} checked {/if} checked value="2" id="idmoneda" data-radio required>Dólares EE.UU</div>   
                        </div>
                        <div class="span2 fadein" >
                            <div class="radio"><input type="radio" name="idmoneda" {if $cafeBorrador->getId_moneda()==1} checked {/if} value="1" id="idmoneda" data-radio required>Moneda Nacional</div>
                        </div>
                        
                    </div>
                    
                    <div class="row-fluid form" >
                        <div class="span4 hidden-phone" ></div>
                        <div class="span2 " >
                            <input type="text" class="k-textbox "  placeholder="Valor FOB" value="{$cafeBorrador->getValor_fob()}" name="v_fob"  id="v_fob" required validationMessage="Por favor Ingrese una direccion"/>
                        </div>
                        <div class="span2 " >
                            <input type="text" class="k-textbox "  placeholder="Tipo de Cambio" value="{$cafeBorrador->getTipo_cambio()}" name="t_cambio"  id="t_cambio" required validationMessage="Ingrese el Tipo de Cambio"/>
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div>
                     <div class="row-fluid form" >
                         <div class="span2 hidden-phone" ></div>
                         <div class="span8 " >
                             <textarea rows="3" cols="100" class="k-textbox " placeholder="Informacion Adicional" name="info_adicional" id="info_adicional">{$cafeBorrador->getInformacion_adicional()}</textarea>
                        </div>
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" >
                        </div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="span3 hidden-phone" ></div>
                        <div class="span2 " >
                            <input id="ver_rechazo" name="ver_rechazo" type="button"  value= "Motivo Rechazo" class="k-primary" style="width:100%"/>
                        </div> 
                        <div class="span2 " >

                            <input id="cccancelar" name="cccancelar" type="button"  value= "Cancelar" class="k-primary" style="width:100%"/>
                        </div> 
                        <div class="span2 " >
                            <input id="ccaceptar" name="ccaceptar" type="button"  value= "Aceptar" class="k-primary" style="width:100%"/>
                        </div> 
                    </div>
                </div>
            </div> 
        </form> 
    </div>
</div>
<!--div id="importador">
    <form name="form_importador" id="form_importador" method="post" action="index.php">
        <div class="titulo">Agregar Importador</div><br>
        <div class="row-fluid form">
            <input type="text" class="k-textbox" id="imp" name="imp" style="width:100%;" placeholder="Nombre del Importador" required validationMessage="Ingrese el Nombre del Importador">
            <br><br>
        </div>
        <div class="row-fluid form">
            <input id="agregarimportador" type="button"  value="Enviar" class="k-primary" style="width:40"/> 
            <input id="cancelarimportador" type="button"  value="Cancelar" class="k-primary" style="width:40"/> 
        </div>
    </form>
</div--> 
<div class="row-fluid fadein"  id="firmarCafe" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header">
                <div class="titulo">Firma Digital de Certificado del Cafe</div>
            </div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, en nombre de la empresa: <span class="letrarelevante">"{$empresa}"</span> 
                    <p> doy fe de la veracidad de los datos aqui introducidos y por consiguiente solicito su revision.</p> 

                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmaCafe" id="formfirmaCafe" method="post"  action="index.php" >
                <!--input type="hidden" name="opcion" id="opcion" value="admDeposito" />
                <input type="hidden" name="tarea" id="tarea" value="registrarDeposito" /-->
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                       class="k-textbox " placeholder="Pin" name="pinfirmarcafe"  id="pinfirmarcafe" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmarruex /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                    </div>
                    <div class="span2 " >
                        <input id="bcancelafirmacafe" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                    </div> 
                    <div class="span2 " >
                        <input id="bfirmarcafe" type="button"  value="Firmar OIC" class="k-primary" style="width:100%"/>
                    </div> 
                    <div class="span4 hidden-phone" >

                    </div>

                </div> 
            </form> 
        </div>   
    </div>              
</div>
<div class="row-fluid " id="avisook">
    <div class="span12" >
        <div class="row-fluid" >
            <div class="span1 hidden-phone" >
            </div>
            <div class="span10">

                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" >REGISTRO EXITOSO </div>  
                            </div>                                      
                        </div>  
                    </div>
                    <!--div class="k-header k-headerrojo"><div class="tituloblanco"></div></div-->
                    <div class="k-cuerpo">  
                        <div class="row-fluid  form" >
                               <div class="span1 hidden-phone" ></div>
                               <div class="span10" >
                                   <h2> Se a registrado exitosamente el certificado del Café , porfavor esperar la confirmacion y validacion </h2>
                                   
                                   
                                    <span id="respfact"></span>
                                </div>  
                               <div class="span1 hidden-phone" ></div>
                            
                        </div>
                        <div class="row-fluid  form" >
                            <div class="span2 " >
                                <input id="avisoAceptar" type="button" value="Aceptar" class="k-primary" style="width:100%"/> <br> <br>
                            </div> 
                        </div>
                    </div>
                                    
                </div>
            </div>
            <div class="span1 hidden-phone" > </div>
        </div>
    </div> 
</div>            
<div id="rechazo">
    <div class="titulo">Motivo del Rechazo</div><br>
    <div class="row-fluid form">
        <span>{$cafeBorrador->getNotificacion()}</span>
    </div>
    <div class="row-fluid form"></div>
    <div class="row-fluid form"></div>
    <div class="row-fluid form">
        
        <input id="aceptar_rechazo" type="button"  value="Aceptar" class="k-primary" style="width:40"/> 
    </div>
</div>                             
                
<script>
    ocultar("firmarCafe");
    ocultar("avisook");
    
    //alert({$cafeBorrador->getId_cafe_descripcion()});
    if({$cafeBorrador->getId_cafe_descripcion()} == 4){
        mostrar("cafe_soluble");
        ocultar("cafe_verde");
    }
    if({$cafeBorrador->getId_cafe_descripcion()} == 5){
        mostrar("cafe_verde");
        ocultar("cafe_soluble");
    }
    if({$cafeBorrador->getId_cafe_descripcion()} == 6){
        mostrar("cafe_soluble");
        mostrar("cafe_verde");
    }
    if({$cafeBorrador->getId_cafe_descripcion()}<4){
        ocultar("cafe_soluble");
        ocultar("cafe_verde");
    }
        
   
    //ocultar("puerto");
    $("#datepicker").kendoDatePicker({});
    $("#ccaceptar").kendoButton();
    $("#cccancelar").kendoButton();
   // $("#addimportador").kendoButton();
    $("#agregarimportador").kendoButton();
    $("#cancelarimportador").kendoButton();

    //formcafe= $("#formcafe").kendoValidator({});

    //var agregarimportador = $("#agregarimportador").data("kendoButton");
    //var cancelarimportador = $("#cancelarimportador").data("kendoButton");
    //var addimportador = $("#addimportador").data("kendoButton");
    //var form_importador = $("#form_importador").kendoValidator({}).data("kendoValidator");
    var aceptar = $("#ccaceptar").data("kendoButton");
    var cancelar = $("#cccancelar").data("kendoButton"); 
    
    var formcafe=$("#formcafe").kendoValidator({
        rules:{
            checkcargados: function(input) {
                var validate = input.data('checkcargados');
                if (typeof validate !== 'undefined') 
                {
                    return verifica_cargados();
                }
                return true;
            },
            checkpeso: function(input) {
                var validate = input.data('checkpeso');
                if (typeof validate !== 'undefined') 
                {
                    return verifica_peso();
                }
                return true;
            },
            checkorganico: function(input) {
                var validate = input.data('checkorganico');
                if (typeof validate !== 'undefined') 
                {
                    return verifica_organico();
                }
                return true;//checkcafev
            },
            checkcafev: function(input) {
                var validate = input.data('checkcafev');
                if (typeof validate !== 'undefined' && $("#cafe_verde").css('display') != 'none') 
                {
                    return verifica_cafe_verde();
                }
                return true;//checkcafev
            },
            checkcafes: function(input) {
                //alert($("#cafe_soluble").css('display'));
                    
                var validate = input.data('checkcafes');
                if (typeof validate !== 'undefined' && $("#cafe_soluble").css('display') != 'none') 
                {
                    return verifica_cafe_soluble();
                }
                return true;//checkcafev
            },
        },
        messages:{  //checkpeso
             checkcargados: "Escoja al menos tipo de carga",
             checkpeso:"Escoja una Unidad de Peso",
             checkorganico: "Seleccione una Opcion",
             checkcafev:"Seleccione Un tipo de Cafe Verde",
             checkcafes:"Seleccione Un tipo de Cafe Soluble",
        }
    }).data("kendoValidator");
    
    function verifica_cargados(){
       return $('input[name="cargados"]').is(':checked');
    }
    function verifica_peso(){
        return $('input[name="u_peso"]').is(':checked');
    }
    function verifica_normas(){
        return $('input[name="normas"]').is(':checked');
    }
    function verifica_decafeinado(){
         return $('input[name="decafeinado"]').is(':checked');
    }
    function verifica_organico(){
         return $('input[name="organico"]').is(':checked');
    }
    function verifica_cafe_verde(){
         return $('input[name="cafe_v"]').is(':checked');
    }   
    function verifica_cafe_soluble(){
         return $('input[name="cafe_s"]').is(':checked');
    }
    function verifica_moneda(){
         return $('input[name="idmoneda"]').is(':checked');
    }
      
    /*addimportador.bind("click", function(e){
        importador.open();
    });
    
    var importador = $("#importador").kendoWindow({
          draggable: true,
          height: "220px",                      
          width: "410px",
          resizable: true,
          modal: true,
          actions: [
                    "Close"
                ],
          animation: {
            close: {
              effects: "fade:out",
              duration: 1000
            }
            }
    }).data("kendoWindow");
    importador.center(); 
    
    cancelarimportador.bind("click", function(e){
        $("#form_importador")[0].reset();
        importador.close();
    });
    agregarimportador.bind("click", function(e){
        //alert($("#form_importador").serialize()+"&opcion=admCafe&tarea=guardarImportador");
        /*if(form_importador.validate()){
             
            var datos = $("#form_importador").serialize()+"&opcion=admCafe&tarea=guardarImportador";
            $.ajax({
                type: 'post',
                url: 'index.php',
                data: datos,
                success: function (data) {
                    if(data!=0){
                        var nombre_importador = $("#nuevo_importador").val()
                        importador.close();
                        var combobox = $("#idimportador").data("kendoComboBox");
                        {literal}
                        combobox.dataSource.add({"value": nombre_importador,"id":data});
                        {/literal}
                        combobox.value(data);
                        $("#form_importador")[0].reset();
                    }
                }
            }); 
        }else{
           
        }
    });*/
/******************************************************************************/
    $("#ver_rechazo").kendoButton();
    $("#aceptar_rechazo").kendoButton();


    var ver_rechazo = $("#ver_rechazo").data("kendoButton");
    var aceptar_rechazo = $("#aceptar_rechazo").data("kendoButton");
    var rechazo = $("#ver_rechazo").data("kendoButton");    
    
    ver_rechazo.bind("click", function(e){
        rechazo.open();
    });
    
    var rechazo = $("#rechazo").kendoWindow({
          draggable: true,
          height: "220px",                      
          width: "410px",
          resizable: true,
          modal: true,
          actions: [
                    "Close"
                ],
          animation: {
            close: {
              effects: "fade:out",
              duration: 1000
            }
            }
    }).data("kendoWindow");
    rechazo.center(); 
    
    aceptar_rechazo.bind("click", function(e){
        rechazo.close();
    });

/******************************************************************************/
    $('#iddescripcion').change(function(e){
       //alert(this.value);
       mostrar_cafe(this.value);
    });
    function mostrar_cafe(value){
        //alert(value);
       
        if(value == 4){
            mostrar("cafe_soluble");
            ocultar("cafe_verde");
            exit();
        }
        if(value == 5){
            mostrar("cafe_verde");
            ocultar("cafe_soluble");
            exit();
        }
        if(value == 6){
            mostrar("cafe_soluble");
            mostrar("cafe_verde");
            exit();
        }
        ocultar("cafe_soluble");
        ocultar("cafe_verde");
        
    }
    aceptar.bind("click",function(e){
        if(formcafe.validate()){
            
            cambiar('formulario','firmarCafe');
            generarPin('{$id_empresa}','{$id_persona}','1'); 
        //var datos=$('#formcafe').serialize();
        //cerraractualizartab("mostrar errores",'admCafe','save_cafe&'+datos);
        }
    });

    cancelar.bind("click", function(e){  
        remover(tabStrip.select());
    });

    $("#avisoAceptar").kendoButton();
    var avisoAceptar = $("#avisoAceptar").data("kendoButton");
    avisoAceptar.bind("click", function (e){
        remover(tabStrip.select());
    });
/*****************************************************************************************/

    $("#bcancelafirmacafe").kendoButton();
    $("#bfirmarcafe").kendoButton();
    var bcancelafirmacafe = $("#bcancelafirmacafe").data("kendoButton");
    bcancelafirmacafe.bind("click", function(e){
        ocultar("firmarCafe");
        cambiar('avisook','formulario');
        borrarPin('{$nombre}');
    });

    var bfirmarcafe = $("#bfirmarcafe").data("kendoButton");
    bfirmarcafe.bind("click", function(e){   

        var datos=$('#formcafe').serialize();
        cerraractualizartab("mostrar errores",'admCafe','save_cafe&'+datos);

        //alert(datos);
       /* $.ajax({
            type: 'post',
            url: 'index.php',
            data: datos,
            success: function (data) {
                //alert(data);
                cambiar('firmarCafe','avisook');
                //var respuesta = eval('('+data+')');
               //window.open("index.php?opcion=admCafe&tarea=print_cafe", 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
                //cerraractualizartab("Cafe Certificado",'admCafe','certificadoCafe');
                //
            }
        }); */

    });
/***************************************************************************/
    var swfirmaCafe=2;        
    var firmaCafecache='';
    var formfirmaCafe = $("#firmarCafe").kendoValidator({
       rules:{ 
           formfirmaCafe: function(input) { 
             var validate = input.data('bfirmarcafe');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    if (firmaCafecache !== $("#pinfirmarCafe").val()) 
                     {
                    verificarPinCafe($("#pinfirmarCafe").val());                    
                    return false;
                    }
                    if(swfirmaCafe==1)
                    {
                         return true;
                    }
                    if(swfirmaCafe==0)
                    {  
                        return false;
                    }  
                    return false;
                }
               return true;
           }
       },
       messages:{
            formfirmaCafe: function(input) { 
                if(swfirmaCafe==0)
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
       function verificarPinCafe(pin_insertado)
        {
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
                success: function (data) {    
                    swfirmaCafe=data;
                   firmaCafecache=$("#pinfirmarCafe").val();
                   formfirmaCafe.validateInput($("#pinfirmarCafe"));
                 }
            }); 
        }
//************************************************************************/
//************************************************************************/
//************************************************************************/
//************************************************************************/
//************************************************************************/
//************************************************************************/

    $("#idimportador").kendoComboBox({   
       placeholder:"Seleccione el Importador",
       ignoreCase: true,
       dataTextField: "value",
       dataValueField: "Id",
       dataSource: [
       {foreach $lista_importador as $pais} 
            { value: "{$pais->getNombre()}", Id: {$pais->getId_cafe_importador()}},
       {/foreach}  
       ],
       value:{$cafeBorrador->getCafe_importador()},
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
    var pais = $("#idimportador").data("kendoComboBox");
//************************************************************************/
    $("#idpais").kendoDropDownList({
        optionLabel:"Seleccione Pais",
        placeholder:"Seleccione El pais",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        {foreach $lista_paises_I as $pais} 
            { value: "{$pais->getNombre()}", Id: {$pais->getId_cafe_pais()}},
        {/foreach}  
       ],
       value:{$cafeBorrador->getId_pais()},
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
    var pais = $("#idpais").data("kendoComboBox");
//************************************************************************/
    $("#idpuerto").kendoDropDownList({   
        placeholder:"Puerto de Embarque",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        {foreach $lista_puerto as $value} 
             { value: "{$value->getDescripcion()}", Id: {$value->getId_cafe_puerto()}},
        {/foreach}  
        ],
       value:{$cafeBorrador->getId_puerto()},
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
    var puerto = $("#idpuerto").data("kendoComboBox");
//************************************************************************/
    $("#idpaisproductor").kendoDropDownList({
        optionLabel:"Pais Productor",
        placeholder:"Pais Productor",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        {foreach $lista_paises_I as $value} 
             { value: "{$value->getNombre()}", Id: {$value->getId_cafe_pais()}},
        {/foreach}  
        ],
       value:{$cafeBorrador->getId_pais_productor()},
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
    var paisproductor = $("#idpaisproductor").data("kendoComboBox");
//************************************************************************/
    var puerto;
    $("#idpaisdestino").kendoDropDownList({
        optionLabel:"Pais Destino",
        placeholder:"Pais Destino",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        {foreach $lista_paises_I as $value} 
             { value: "{$value->getNombre()}", Id: {$value->getClave_oic()}},
        {/foreach}  
        ],
        value:{$cafeBorrador->getId_pais_destino()},
        change : function (e) {
            mostrar("puerto");
             $("#idpuerto").val("");
            if (this.value() && this.selectedIndex == -1) { 
             this.text('');             
            }else
            {
                var pais=this.value();
                //alert(pais);
                $("#idpuerto").kendoComboBox({
                    //autoBind: false,
                    //cascadeFrom: "idpaisdestino",
                    optionLabel:"Puerto Destino",
                    dataTextField: "descripcion",
                    dataValueField: "id_cafe_puerto",
                    dataSource: {
                        transport: {
                            read: {
                                dataType: "json",
                                url: "index.php?opcion=admCafe&tarea=cargarPuertos&pais="+pais
                            }
                        }
                    },
                    change : function (e) {
                        if (this.value() && this.selectedIndex === -1) { 
                            this.text('');
                        }else{  }

                    }
                });
                
                //window.open("index.php?opcion=admCafe&tarea=cargarPuertos", 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
                
            }
       }
    });
     /*$("#idpuerto").kendoDropDownList({
        //autoBind: false,
        //cascadeFrom: "idpaisdestino",
        
        optionLabel:"Puerto Destino",
        dataTextField: "descripcion",
        dataValueField: "id_cafe_puerto",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admCafe&tarea=cargarPuertos&pais="+pais
                }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text('');
            }else{  }

        }
    });*/
    var paisdestino = $("#idpaisdestino").data("kendoComboBox");
    /*$("#idpuerto").kendoComboBox({
        autoBind: false,
        cascadeFrom: "idpaisdestino",
        optionLabel:"Puerto Destino",
        dataTextField: "descripcion",
        dataValueField: "id_cafe_puerto",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admCafe&tarea=cargarPuertos"
                }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text('');
            }else{  }

        }
    });*/
//************************************************************************/
    $("#idpaistransbordo").kendoDropDownList({
        optionLabel:"Pais transbordo",
        placeholder:"Pais transbordo",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        {foreach $lista_paises_II as $value} 
             { value: "{$value->getNombre()}", Id: {$value->getId_cafe_pais()}},
        {/foreach}  
        ],
       value:{$cafeBorrador->getId_pais_transbordo()},
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
    var paistransbordo = $("#idpaistransbordo").data("kendoComboBox");
//************************************************************************/

    $("#idmediotransporte").kendoDropDownList({
        optionLabel:"Medio Transporte",
        placeholder:"Medio Transporte",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        {foreach $lista_medio_transporte as $value} 
             { value: "{$value->getDescripcion()}", Id: {$value->getId_cafe_medio_transporte()}},
        {/foreach}  
        ],
        value:{$cafeBorrador->getId_medio_transporte()},
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) { 
             this.text('');             
            }
        }
   });
    var mediotransporte = $("#idmediotransporte").data("kendoComboBox");
//************************************************************************/
    $("#idsistemaarmonizado").kendoDropDownList({
        optionLabel:"Sistema Armonizado",
        placeholder:"Sistema Armonizado",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        {foreach $lista_sistemaarmonizado as $value}
             { value: "{$value->getCodigo()}", Id: {$value->getId_cafe_sistema_armonizado()}},
        {/foreach}  
        ],
       value:{$cafeBorrador->getId_sistema_armonizado()},
       change : function (e) {
           if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
       }
   });
    var sistemaarmonizado = $("#idsistemaarmonizado").data("kendoComboBox");
//************************************************************************/
    $("#idtipoembalaje").kendoDropDownList({
        optionLabel:"Tipo Embalaje",
        placeholder:"Tipo Embalaje",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        {foreach $lista_tipo_embalaje as $value} 
             { value: "{$value->getDescripcion()}", Id: {$value->getId_cafe_tipo_embalaje()}},
        {/foreach}  
        ],
       value:{$cafeBorrador->getId_tipo_embalaje()},
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) { 
                this.text('');             
            }
        }
    });
    var tipoembalaje = $("#idtipoembalaje").data("kendoComboBox");
//************************************************************************/
    $("#iddescripcion").kendoDropDownList({
         optionLabel:"Tipo Cafe",
        placeholder:"Tipo Cafe",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        {foreach $lista_descripcion as $value} 
             { value: "{$value->getDescripcion()}", Id: {$value->getId_cafe_descripcion()}},
        {/foreach}  
        ],
        value:{$cafeBorrador->getId_cafe_descripcion()},
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) { 
             this.text('');             
            }
        }
    });
    var descripcion = $("#iddescripcion").data("kendoComboBox");
//************************************************************************/
    var i=0;
    var selected=0;
    var bol=false;
    $("#idcespecial").kendoDropDownList(
    {   
        optionLabel:"Caracteristica del Café",
        placeholder:"Caracteristica del Café",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        {foreach $lista_cespeciales as $value} 
            { value: "{$value->getDescripcion()}", Id: {$value->getId_cafe_cespecial()}},
        {/foreach}  
        ],
        value:{$cafeBorrador->getId_caracteristica_especial()},
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) { 
            this.text('');             
           }
        }
    });
    var descripcion = $("#idcespecial").data("kendoComboBox");
//************************************************************************/
    var swfirmaCafe=2;        
    var firmaCafecache='';
    var formfirmaCafe = $("#formfirmaCafe").kendoValidator({
       rules:{ 
           formfirmaCafe: function(input) { 
             var validate = input.data('bfirmarCafe');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    if (firmaCafecache !== $("#pinfirmarCafe").val()) 
                     {
                    verificarPinCafe($("#pinfirmarCafe").val());                    
                    return false;
                    }
                    if(swfirmaCafe==1)
                    {
                         return true;
                    }
                    if(swfirmaCafe==0)
                    {  
                        return false;
                    }  
                    return false;
                }
               
               return true;
           }
       },
       messages:{
            formfirmaCafe: function(input) { 
                if(swfirmaCafe==0)
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
       function verificarPinCafe(pin_insertado)
        {
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
                success: function (data) {    
                   swfirmaCafe=data;
                   firmaCafecache=$("#pinfirmarCafe").val();
                   formfirmaCafe.validateInput($("#pinfirmarCafe"));
                 }
            }); 
        }
</script>
</body>
</html>