
    <div class="row-fluid "  id="revisarempresa" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" >{$empresa->razon_social} {if $empresa->ruex} -RUEX:{$empresa->ruex}{/if}</div>  
                        </div>                                      
                    </div>  
                </div>
               <div class="row-fluid ">
                    <div class="span2 parametro" >
                        Nombre o Razon Social:
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
                        Codigo de certif. de NIT:
                    </div>     
                    <div class="span4 campo" >
                        {$empresa->certificacionnit}
                    </div> 
                </div>
              {if $empresa->matricula_fundempresa or $empresa->menor_cuantia=="1" or $empresa->oea or $empresa->frecuente!='1'}
            <div class="row-fluid " >
                {if $empresa->matricula_fundempresa}
                    <div class="span2 parametro" >
                        Nro. FundEmpresa:
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
                    <!--div class="span4" >
                       <b>Exportador no Habitual.</b>
                    </div-->  
                {/if} 
            </div>
            {/if}
                <div class="row-fluid  form" >
                <div class="span2 parametro" >
                   Ruex:
                </div>     
                <div class="span2 campo" >
                     {$empresa->ruex}
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
            <div class="row-fluid  form" >
                    <div class="span1 hidden-phone" ></div>
                    <div class="span3 parametro" >
                       Año de Fundacion:
                    </div>     
                    <div class="span2 campo" >
                         {$empresa->date_fundacion}
                    </div> 
                    <div class="span2 parametro" >
                       latitud(coordenadas):
                    </div>     
                    <div class="span2 campo" >
                         {$empresa->coordenada_lat}
                    </div> 
                </div> 
                <div class="row-fluid  form" >
                    <div class="span1 hidden-phone" ></div>
                    <div class="span3 parametro" >
                       Año de inicio de Operaciones:
                    </div>     
                    <div class="span2 campo" >
                         {$empresa->date_inicio_operaciones}
                    </div> 
                    
                    <div class="span2 parametro" >
                       longitud(coordenadas):
                    </div>     
                    <div class="span2 campo" >
                         {$empresa->coordenada_long}
                    </div> 
                </div> 
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                      Descripcion de la Empresa
                    </div>     
                    <div class="span9 campo" >
                         {$empresa->descripcion_empresa}
                    </div> 
                </div>   
                <div class="row-fluid form" >
                   <div class="span2 parametro" >
                            Afiliaciones:
                    </div>     
                    <div class="span9" >

                        <input type="hidden" name="afiliaciones_values1" id="afiliaciones_values1" value="{$afiliaciones_val}" />
                        <input style="width:100%;" id="afiliaciones1" name="afiliaciones1">
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <!--div class="row-fluid  form" >
                    <div class="span2 parametro" >
                        <b>Departamento:</b>
                    </div>     
                    <div class="span2 campo" >
                      {$empresa->iddepartamento_procedencia}
                    </div>
                    <div class="span2 parametro" >
                        <b>Municipio:</b>
                    </div>     
                    <div class="span2 campo" >
                        {$municipio}
                    </div>
                    <div class="span2 parametro" >
                        <b>Ciudad:</b>
                    </div>     
                    <div class="span2 campo" >
                        {$ciudad}
                    </div>
                </div-->
                
                <!--div class="row-fluid  form" >
                    
                    
                    <div class="span2 parametro" >
                        <b> Domicilio Fiscal:</b>
                     </div>     
                     <div class="span8 campo" >
                        {$empresa->direccionfiscal}
                     </div> 
                    <div class="span2 parametro" >
                        <b>Domicilio Legal:</b>
                    </div>     
                    <div class="span2 campo" >
                       {$empresa_temporal->direccion}
                    </div>
                </div-->
                {assign var="ds_id" value=$empresa->direccion}
                {include file="admDireccion/Direccion_Show.tpl" }
                <div class="row-fluid  form" >
                    <!--div class="span2 parametro" >
                       <b> Telf/Cel de Contacto:</b>
                    </div>     
                    <div class="span2 campo" >
                       {$empresa->numero_contacto}
                    </div--> 
                                      
               
                    <div class="span2 parametro" >
                        <b>Correo Electronico:</b>
                    </div>     
                    <div class="span5 campo" >
                        {$empresa->email}
                    </div> 
                </div>
                {if $empresa->pagina_web}
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                        <b>Pagina WEB:</b>
                      </div>     
                      <div class="span5 campo" >
                          {$empresa->pagina_web}
                      </div>  
                </div>
                {/if}
                
                <!--div class="row-fluid  form" >    
                {if $empresa->pagina_web or $empresa->fax}
                    {if $empresa->fax}
                    <div class="span2 parametro" >
                        <b> Fax:</b>
                    </div>     
                    <div class="span2 campo" >
                        {$empresa->fax}
                    </div>    
                    {else}
                        <div class="span4 hidden-phone" ></div>
                    {/if}
                    {if $empresa->pagina_web}
                            <div class="span2 parametro" >
                              <b>Pagina:</b>
                            </div>     
                            <div class="span5 campo" >
                                {$empresa->pagina_web}
                            </div>  
                    {else}
                        <div class="span7 parametro" ></div>
                    {/if} 
                     {/if}
                </div-->
               
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
                        <div class="span9 campo">
                            {$empresa->nim}
                        </div>  
                    </div>
                {/if}    
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>
                <div class="row-fluid  form" >
                    <div class="span12" >
                        {if $revision=='0'}
                            <b>el registro se encuentra en revisión</b>
                        {else}
                            {if $mensaje_estado}
                                <b>{$mensaje_estado}</b>
                            {/if}
                        {/if}
                    </div>
                </div>
                <div class="row-fluid form" > 
                    <div class="span12 parametro" > 
                        <center> 
                            <input type="{if $rep_legal==1 && $valido==1 }checkbox{else}hidden{/if}" name="chbx_renovacion" id="chbx_renovacion" > {if $rep_legal==1 && $valido==1 }Quiero Renovar mi RUEX {/if}
                        </center>
                    </div>
                </div>
                <div class="row-fluid  form" >
                    <div class="span5" >
                    </div>  
                    <div class="span2" >
                         <input id="edicionempresa" {if $rep_legal==1 && $revision=='1'} type="button" {else} type="hidden"{/if}  value="Editar" class="k-primary" style="width:100%"/>
                    </div> 
                     <div class="span4" >
                    </div> 
                    <div class="span1 " >
                        {if $imprimir_ruex }
                        <div class="menucf">
                            <a href='index.php?opcion=impresionRuex&tarea=ImpresionRuex&id_empresa={$empresa->id_empresa}' target='_blank'><img src="styles/img/imp_b.png"   class="menubottom ayuda"></a>
                            <a href='index.php?opcion=impresionRuex&tarea=ImpresionRuex&id_empresa={$empresa->id_empresa}' target='_blank'><img src="styles/img/imp.png"    class="menutop ayuda"></a>
                        </div>  
                        {/if}
                    </div>
                </div>
                
            </div>
        </div>
    </div>      
    <div class="row-fluid "  id="editarempresadiv" >
        <div class="span12" >
                <div class="k-block fadein">
                    <div class="k-header">
                        <div class="row-fluid  form" >
                            <div class="span12" >
                                <div class="titulonegro" > Edici&oacute;n Empresa</div>  
                            </div>                                      
                        </div>  
                    </div>
                    <div class="k-cuerpo">
                    <form name="ruex" id="ruex" method="post"  action="index.php"  onkeypress="return anular(event)" enctype="multipart/form-data">
                        <input type="hidden" name="opcion" id="opcion" value="admEmpresa" />
                        <input type="hidden" name="tarea" id="tarea" value="editarEmpresaTodo" />
                        <!input type="hidden" name="tarea" id="tarea" value="prueba" />

                        <div class="row-fluid form" >
                           
                            <div class="span2 parametro" >
                                <div class="radio"><input {if $empresa->ruex} checked="true" {/if} type="checkbox" name="chbx_nro_ruex" id="chbx_nro_ruex" onclick='mostrar_ruex(this.checked)' > Poseo un numero RUEX </div> 
                            </div>
                            {literal}
                            <div class="span1" id="div_ruex" >
                                <input type="hidden" id="nro_ruex" name="nro_ruex">
                            </div>
                            {/literal}
                           
                                <!--div class="span4 hidden-phone" ></div>
                                <div class="span3 parametro" >
                                    <div><input type="{if $valido==1 }checkbox{else}hidden{/if}" name="chbx_renovacion" id="chbx_renovacion" > {if $valido==1 }Quiero Renovar mi RUEX {/if}</div> 
                                </div-->
                            
                        </div>

                        <div class="row-fluid form" >
                            <div class="span2 parametro" >
                                Actividad Economica:
                            </div>  
                            <div class="span3 " >
                                <input style="width:100%;" id="actividad" name="actividad" required validationMessage="Escoja su Actividad Economica">
                            </div>
                            <div id="divtipoempresa">
                                <div class="span2 parametro" >
                                   Tipo de Empresa:
                               </div> 
                               <div class="span5 " >
                                   <input style="width:100%;" id="tipoempresa" name="tipoempresa" required validationMessage="Escoja su tipo de Empresa">
                               </div>
                            </div>
                        </div>
                         
                            
                        <div class="row-fluid form" > 
                            <div class="span2 parametro" >
                                Razon Social:
                            </div>     
                            <div class="span10" >                                
                                <input type="text" class="k-textbox "  placeholder="Razon Social" value="{$empresa->razon_social}"  name="razonsocial" id="razonsocial"  required validationMessage="Por favor ingrese su razón social" />
                            </div>  
                        </div> 
                        <div class="row-fluid form" > 
                            <div class="span2 parametro" >
                                Nombre Comercial:
                            </div>     
                            <div class="span10" >                                
                                <input type="text" class="k-textbox "  placeholder="Nombre Comercial" value="{$empresa->nombre_comercial}" name="nombrecomercial" id="nombrecomercial" required validationMessage="Por favor Ingrese su Nombre Comercial"/>
                            </div>  
                        </div>
                        <div class="row-fluid form" >
                            <div id="div_nit" name="div_nit">
                                <div class="span2 parametro" >
                                    NIT/CI
                                </div> 
                                <div class="span3" >

                                    <input type="text" name="nit" id="nit"
                                           onkeypress='return validateQty(event);' 
                                           class="k-textbox " 
                                           placeholder="número de identificacion Tributaria(NIT)"   
                                           maxlength="15"
                                           {literal}
                                           pattern="[1-9][0-9]{3,}"
                                           {/literal}
                                           value="{$empresa->nit}"
                                           onkeypress="return isNumeric(event)" 
                                           oninput="maxLengthCheck(this)" 
                                           required validationMessage="Ingrese un número de NIT válido,4 o más dígitos"/>   

                                </div> 
                            </div> 
                            <div id="divfundaempresa">
                                <div class="span2 parametro" >
                                    Matricula Fundempresa:
                                </div> 
                                 <div class="span3"  >    

                                     <input type="text" 
                                            {literal}
                                            pattern="[0-9]{3,}" 
                                            {/literal}
                                            name="fundaempresa" 
                                            id="fundaempresa" 
                                            class="k-textbox "  
                                            value="{$empresa->matricula_fundempresa}"
                                            placeholder="No. de Matricula FUNDEMPRESA" 

                                            required validationMessage="Ingrese su matricula de FUNDEMPRESA, 4 o más dígitos"/>
                                </div> 
                            </div> 
                        </div>
                        <div class="row-fluid form" >
                            <div id="div_certificacionnit" name="div_certificacionnit">
                                <div class="span2 parametro" >
                                    Certificacion NIT:
                                </div> 
                                <div class="span3 " >

                                    <input type="text" name="certificacionnit" id="certificacionnit"  
                                           class="k-textbox " 
                                           placeholder="Codigo de certificaci&oacute;n de NIT" 
                                           {literal}
                                           pattern="[1-9][0-9]{4,}"
                                           {/literal}
                                           onkeypress="return isNumeric(event)" 
                                           oninput="maxLengthCheck(this)" 
                                           maxlength="20" 
                                           value="{$empresa->certificacionnit}"
                                           required validationMessage="Ingrese su Codigo de certificaci&oacute;n, 6 o más dígitos"/>

                                </div> 
                            </div> 

                        </div> 
                                       
                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                        <div class="row-fluid form" >
                            <div class="span2 hidden-phone" ></div>
                            <div class="span2 parametro" >
                                A&ntilde;o de Fundaci&oacute;n:
                            </div> 
                             <div class="span2" >
                                 <input  placeholder="Año de Fundación"  
                                         name="fundacion_empresa" 
                                         id="fundacion_empresa" 
                                         style="width:100%;" 
                                         required
                                         value="{$empresa->date_fundacion}"
                                         validationMessage="Ingrese Año de Fundacion" />
                             </div>
                            <div class="span2 parametro" >
                                A&ntilde;o de Inicio de Operaciones:
                            </div>
                             <div class="span2" >
                                 <input  placeholder="Año de Inicio de Operaciones"  
                                         name="inicio_empresa" 
                                         id="inicio_empresa"  
                                         style="width:100%;"
                                         required 
                                         value="{$empresa->date_inicio_operaciones}"
                                         validationMessage="Ingrese Año de Inicio de Operaciones" />
                             </div>
                        </div>
                        <div class="row-fluid form" >
                            <div class="span2 hidden-phone" ></div>
                            <div class="span2 parametro" >
                                Latitud(coordenada):
                            </div>
                             <div class="span2" >
                                 <input type="text" 
                                        
                                        name="coordenadas_lat" 
                                        id="coordenadas_lat" 
                                        class="k-textbox "
                                        style="width:100%;" 
                                        placeholder="Latitud(Coordenadas)" 
                                        required 
                                        value="{$empresa->coordenada_lat}"
                                        validationMessage="Ingrese la latidud de sus coordenadas(google maps)" />
                             </div>
                            <div class="span2 parametro" >
                                Longitud(coordenada):
                            </div>
                             <div class="span2" >
                                 <input type="text" 
                                        
                                        name="coordenadas_lon" 
                                        id="coordenadas_lon" 
                                        class="k-textbox "
                                        style="width:100%;" 
                                        placeholder="Longitud(Coordenadas)"    
                                        required 
                                        value="{$empresa->coordenada_long}"
                                        validationMessage="Ingrese la longitud de sus coordenadas(google maps)" />
                             </div>
                             <!--div class="span2 " id="map" name="map" >
                                 <input type="button" value="ver Mapa" class="k-primary" style="width:100%"/>
                             </div-->
                         </div> 
                                        
                        <div class="row-fluid form" >
                            <div class ="span1 hidden-phone"></div>
                            <div class ="span2 parametro">
                                Descripci&oacute;n de la Empresa
                            </div>
                            <div class="span8 fadein" id="div_descripcion_empresa" name="div_descripcion_empresa">
                                <input type="text" name="descripcion_empresa" id="descripcion_empresa"  
                                   class="k-textbox "  
                                   placeholder="Descripcion de la Empresa"  
                                   value="{$empresa->descripcion_empresa}"
                                   required validationMessage="Ingrese Descripcion de la empresa" />
                            </div>
                        </div>
                        <div class="row-fluid form" >
                            <div class ="span1 hidden-phone"></div>
                            <div class ="span2 parametro">
                                Afiliaciones
                            </div>
                            <div class="span8 " >
                                <input type="hidden" name="afifiliaciones_values" id="afiliaciones_values" value="{$afiliaciones_val}" />
                                <input style="width:100%;" id="afiliaciones" name="afiliaciones">
                            </div> 
                        </div>

                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                        <div class="row-fluid form" >
                            {assign var=array_datos_categoria value=","|explode:$empresa->datos_categoria_empresa} 
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
                        <div class="row-fluid" >
                            <div class="span12" >
                                <center>Datos del Domicilio Fiscal de la Empresa</center>
                            </div> 
                        </div>
                        <div class="row-fluid form" >
                                    <div class="barra" >                                         
                                    </div> 
                        </div> 
                        <!--div class="row-fluid form" >
                            <div class ="span2 parametro">
                                Departamento
                            </div>
                            <div class="span3 " >
                                <input style="width:100%;" id="departamento" name="departamento" required validationMessage="Escoja su departamento"/>
                            </div> 
                            <div class="span2 parametro" >
                                 Telf/Cel de Contacto:
                            </div> 
                            <div class="span2" >
                               <input type="text" class="k-textbox "  value="{$empresa->numero_contacto}"  onkeypress='return validateQty(event);' placeholder="Número de Contacto" maxlength="20" id="numero" name="numero" required validationMessage="Ingrese su numero telefonico"/>
                            </div> 
                        </div>
                        <div class="row-fluid form" >
                            
                            <div class ="span2 parametro">
                                Municipio
                            </div>
                            <div class="span3 " id="div_municipio" name="div_municipio">
                                <input style="width:100%;" id="municipio" name="municipio">
                            </div>
                           
                            <div class="span2 parametro" >
                                Fax:
                            </div>
                            <div class="span3" >
                                <input type="text" class="k-textbox "  value="{$empresa->fax}"  onkeypress='return validateQty(event);' placeholder="Número de Fax"  id="fax" maxlength="11" name="fax" validationMessage="Ingrese un numero de Fax valido"/>
                            </div> 
                        </div>
                        <div class="row-fluid form" >
                            
                            <div class ="span2 parametro">
                                Ciudad
                            </div>
                            <div class="span3 " id="div_ciudad" name="div_ciudad">
                                <input style="width:100%;" id="ciudad" name="ciudad">
                            </div>

                            <div class="span2 " id="div_new_ciudad" name="div_new_ciudad">

                            </div>    
                        </div-->
                        
                        <!--div class="row-fluid form" >
                            <div class="span2 parametro" >
                                Domicilio Fiscal:
                            </div>   
                            <div class="span9 " >
                                <input type="text" class="k-textbox "  value="{$empresa->direccionfiscal}" placeholder="Direcci&oacute;n Domicilio Fiscal" id="direccionfiscal" name="direccionfiscal" required validationMessage="Ingrese su dirección"/>
                            </div>
                        </div-->
                        <div class="row-fluid form" >  
                            {include file="admDireccion/Direccion_Edit.tpl" de_id=$empresa->direccion direccion_id=$empresa->direccion tipo=2}
                            
                        </div> 
                        
                        <div class="row-fluid form" >
                            <div class="span2 parametro" >
                                 P&aacute;gina web:
                            </div> 
                            <div class="span5 " >
                                <input type="text" class="k-textbox "  value="{$empresa->pagina_web}"  placeholder="Página Web" id="paginaweb" name="paginaweb" />
                            </div> 
                        </div>
                         <div class="row-fluid form" >   
                            <div class="span2 parametro" >
                                Email:
                            </div> 
                            <div class="span5" >
                                <input type="email" class="k-textbox " value="{$empresa->email}"   placeholder="Email" id="email" name="email"  
                                    required data-required-msg="Introduzca un correo electronico"
                                    data-available data-available-url="validate/username"/>
                            </div>
                            
                        </div>
                        
                        {if $editable == '0'}
                        
                        <div class="row-fluid form" >
                            <div class="span5 hidden-phone" ></div>
                            <div class="span3 " >
                                <input id="editar_direccion" type="button" value="Editar Dirección" class="k-primary" style="width:100%"/> <br> <br>
                            </div> 
                        </div>
                         {/if}
                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                        <div class="row-fluid form" >
                            <div class="span9 radio " >
                                Es Operador Econ&oacute;mico Autorizado (OEA)?(Si su empresa esta acreditada como OEA)</br>
                                Si <input type="radio" name="radiooea" value="1" id="sioea" class="radio" onclick="esOEA(1)" {if $empresa->oea}checked{/if}>
                                No <input type="radio" name="radiooea" value="0" id="nooea" class="radio" onclick="esOEA(0)" {if !$empresa->oea}checked{/if}>
                            </div> 
                            <div class="span3 " id='divoea'>
                                {if $empresa->oea}
                                    <input type="text" class="k-textbox "  placeholder="N&uacute;mero de registro OEA"  name="oea" id="oea"  value='{$empresa->oea}' required validationMessage="Ingrese su Registro OEA" />
                                {/if}
                            </div> 
                        </div> 
                        <!--div class="row-fluid form" id="divexpfrecuente">
                            <div class="span10 radio" >
                                Es un exportador habitual?(Si su empresa emite facturas dosificadas de exportaci&oacute;n por impuestos)</br>
                                Si <input type="radio" name="radioenf" value="1" id="sioea" class="radio" {if $empresa->frecuente}checked{/if}>
                                No <input type="radio" name="radioenf" value="0" id="nooea" class="radio" {if !$empresa->frecuente}checked{/if}>
                            </div> 
                        </div--> 
                        <div class="row-fluid form" >
                                    <div class="barra" >                                         
                                    </div> 
                        </div> 
                        <div class="row-fluid" id="borra2">
                            <div class="span12" >
                                Escoja uno o mas rubros de exportación.
                            </div> 
                        </div> 
                        {assign var=array_rubro_exportaciones value=","|explode:$empresad->idrubro_exportaciones} 
                        {* esta variable es para separar los rubros de exportacion *}
                        {foreach from=$rubros_exportaciones item=rubro}
                        <div class="row-fluid" >
                            <div>
                                <div class="checkboxtemporal"> 
                                    <input type="checkbox" name="rubroexportacionesarray[]" value="{$rubro->id_rubro_exportaciones}" 
                                    {foreach from=$array_rubro_exportaciones item=idrubro}
                                        {if $idrubro==$rubro->id_rubro_exportaciones} checked {/if}
                                    {/foreach}
                                    {if $rubro->id_rubro_exportaciones=='4'}
                                        onclick="mostrarcafe();"
                                        id="checkboxcafe"
                                    {/if}
                                    {if $rubro->id_rubro_exportaciones=='8'}
                                        
                                        id="checkboxnim"
                                    {/if}
                                    >
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
                        <div class="row-fluid" id="borrar">
                            <div class="span6 fadein" id="preguntascafe">
                                {if $ico->ico}
                                <div class="span5 fadein">Su empresa posee registro ICO?</div><div class="span3 fadein">
                                <input type="radio" class="checked" name="respico" id="siico" value="si" onclick="siIco()" checked>Si
                                <input type="radio" class="checked" name="respico" id="noico" value="no" onclick="noIco()" >No</div>
                                <div class="span4 fadein" id="cajaico">
                                    <input type="text" class="k-textbox "  value="{$ico->ico}" placeholder="ICO"  name="ico" id="ico"  required validationMessage="Ingrese su ICO" />
                                </div>
                                 {/if}
                            </div>
                            <div class="span6 fadein" id="divnim">
                                {if $empresa->nim}
                                    <div class="row-fluid">
                                        <div class="span3 parametro">Nim:</div>
                                        <div class="span9">
                                            <input type="text" class="k-textbox "  value='{$empresa->nim}' placeholder="N&uacute;mero de Identificaci&oacute;n minera"  name="nim" id="nim"  required validationMessage="Ingrese su Nim" />
                                        </div>
                                    </div>
                                {/if}
                            </div> 
                        </div> 
                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                        <div class="row-fluid  form" >
                            <div class="span12 " >
                                Nota: Puede cambiar al responsable de su empresa nominando alguien de su personal,tambien puede registrar  <span class='terminos letrarelevante' onclick="remover(tabStrip.select());anadir('Personal','admPersona','asignarPersonal');">personal nuevo</span>.     
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
                        {if $ver_editor == '1'}
                            <div class="row-fluid  form" >
                                <div class="span12 parametro" style="text-align: left;" > 
                                        <center>OBSERVACIONES</center>
                                </div>
                            </div>
                            <div class="row-fluid  form" >
                                <div class="span12 " >
                                     <textarea id="editorr{$id}"  >
                                    </textarea>
                                </div>
                            </div>
                            <div class="row-fluid form" >
                                <div class="barra" >
                                </div>
                            </div>
                        {/if}
                        <div class="row-fluid  form" >
                            <div class="span4" >
                            </div>
                            <div class="span2 " >
                             <input id="cancelaredicionruex" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                            </div> 
                            <div class="span2" >                             
                             <input id="registroedicion" type="button"  value="Guardar" class="k-primary" style="width:100%"/>
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
    <div id="avisomodif" class="row-fluid">
        <div class="k-block fadein">
            <div class="k-header"> <div class="titulonegro" >Atenci&oacute;n</div></div>
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
                    <input id="aceptarmodif" type="button" value="Aceptar" class="k-primary" style="width:100%"/> <br> 
                </div> 
                <div class="span5 hidden-phone" >
                </div>
            </div> 
        </div>
    </div>
    <div id="avisonomodif" class="row-fluid">
        <div class="k-block fadein">
            <div class="k-header"> <div class="titulonegro" >Atenci&oacute;n</div></div>
            <div class="row-fluid  form" >
                <div class="span1 hidden-phone" ></div>
                <div class="span10" >
                        No a modificado ningun dato.
                </div>  
                <div class="span1 hidden-phone" ></div>
            </div> 
            <div class="row-fluid  form" >
                <div class="span5 hidden-phone" >
                </div>
                <div class="span2 " >
                    <input id="aceptarnomodif" type="button" value="Aceptar" class="k-primary" style="width:100%"/> <br> 
                </div> 
                <div class="span5 hidden-phone" >
                </div>
            </div> 
        </div>
    </div>
    <div id="avisomodifconf" class="row-fluid">
        <div class="k-block fadein">
            <div class="k-header"> <div class="titulonegro" >Atenci&oacute;n</div></div>
            <div class="row-fluid  form" >
                <div class="span1 hidden-phone" ></div>
                <div class="span10" id="avisomodifconf-text" name="avisomodifconf-text" >
                    
                </div>  
                <div class="span1 hidden-phone" ></div>
            </div> 
            
            <div class="row-fluid  form" >
                <div class="span4 hidden-phone" >
                </div>
                <div class="span2 " >
                    <input id="cancelarmodifconf" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> 
                </div> 
                <div class="span2 " >
                    <input id="aceptarmodifconf" type="button" value="Aceptar" class="k-primary" style="width:100%"/> <br> 
                </div> 
                <div class="span4 hidden-phone" >
                </div>
            </div> 
        </div>
    </div>
<script>           
ocultar('editarempresadiv');
ocultar('avisomodif');
ocultar('avisonomodif');
ocultar('avisomodifconf');
var renovacion = 0;
var direccion_old=$('#cobro_direccion_{$empresa->direccion} :input').serialize();

var rep_old = '{$persona->id_persona}';

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
    
    /*setDisable_direccion{$empresa->direccion}('{$editable}'=='0');
    var habilitado=false;
    if('{$editable}'=='0'){
        $("#editar_direccion").kendoButton();
        var editar_direccion = $("#editar_direccion").data("kendoButton");
            editar_direccion.bind("click", function(e){
            //disable_direccion = false;
             setDisable_direccion{$empresa->direccion}(false);
            direccion_old = $('#cobro_direccion_{$empresa->direccion} :input').serialize();
            ruex_new = $('#ruex').serialize();
            habilitado=true;
        });
    }*/
    disable_direccion = '{$editable}'=='0';
    setDisable_direccion{$empresa->direccion}(disable_direccion);
    var habilitado=false;
    
    if('{$editable}'=='0'){
        $("#editar_direccion").kendoButton();
        var editar_direccion = $("#editar_direccion").data("kendoButton");
        editar_direccion.bind("click", function(e){
            disable_direccion = false;
            setDisable_direccion{$empresa->direccion}(disable_direccion);
            direccion_old = $('#cobro_direccion_{$empresa->direccion} :input').serialize();
            ruex_new = $('#ruex').serialize();
            habilitado=true;
        });
    }
$("#chbx_renovacion").change(function(){
    if($("#chbx_renovacion").is(':checked')){
        renovacion = 1;
        setValue($('#afiliaciones_values').val());
        ruex_old = $('#ruex').serialize();
        cambiar('revisarempresa','editarempresadiv');
    }else{
        renovacion = 0;
    }
});

$("#edicionempresa").kendoButton();
var edicionempresa = $("#edicionempresa").data("kendoButton");
edicionempresa.bind("click", function(e){
    setValue($('#afiliaciones_values').val()); 
    ruex_old = $('#ruex').serialize();
    cambiar('revisarempresa','editarempresadiv');
});

$("#aceptarmodif").kendoButton();
var aceptarmodif = $("#aceptarmodif").data("kendoButton");
aceptarmodif.bind("click", function(e){
     remover(tabStrip.select());
});
$("#aceptarnomodif").kendoButton();
var aceptarnomodif = $("#aceptarnomodif").data("kendoButton");
aceptarnomodif.bind("click", function(e){
     cambiar('avisonomodif','editarempresadiv');
});
$("#aceptarmodifconf").kendoButton();
var aceptarmodifconf = $("#aceptarmodifconf").data("kendoButton");
aceptarmodifconf.bind("click", function(e){
    //window.open("index.php?"+$('#ruex').serialize()+'&habilitado='+habilitado+'&actualizacion='+actualizacion+'&editable={$editable}'+'&cobrar={$cobrar}'+'&afiliaciones='+multiSelect.value()+'&chbx_renovacion='+renovacion, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
    aceptarmodifconf.enable(false);
    $.ajax({             
        type: 'post',
        url: 'index.php',
        data:$('#ruex').serialize()+'&habilitado='+habilitado+'&actualizacion='+actualizacion+'&editable={$editable}'+'&cobrar={$cobrar}'+'&afiliaciones='+multiSelect.value()+'&chbx_renovacion='+renovacion,
        success: function (data) { 
            var respuesta = eval('('+data+')');
            if(respuesta[0].suceso=='0')
            {
                cambiar('avisomodifconf','avisomodif');
                $('#mavisoconfiguracionempresa').html('');
            }
            else
            {   
                alert('Tiene problemas de conexion por favor intente mas tarde.');
            }
        }
    });
});
$("#cancelarmodifconf").kendoButton();
var cancelarmodifconf = $("#cancelarmodifconf").data("kendoButton");
cancelarmodifconf.bind("click", function(e){
     cambiar('avisomodifconf','editarempresadiv');
});


//--------------esto es para la matricula funda empresa--------------------

$('#cuantia').click(function(){
    if($('#cuantia').is(':checked'))
    {
        ocultar('divfundaempresa');
        $("#divfundaempresa").html('');
        $("#divtipoempresa").html('');
        $("#divexpfrecuente").html('');
    }
    else
    {
       $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=admEmpresaTemporal&tarea=tipoempresadivedicion',
        success: function (data) {
                dataarray=data.split("&&");
                $("#divtipoempresa").html(dataarray[0]);
                execTipoempresamodif();
                 $("#divexpfrecuente").html(dataarray[1]);
                
            }
        });
    }       
}); 
//----------para los combos


function execTipoempresamodif()
{
    $("#tipoempresa").kendoComboBox(
        {   placeholder:"Tipo de Empresa",
            dataTextField: "tipoempresa",
            dataValueField: "Id",
            dataSource: [
            {section name=tipoempresa loop=$datostipoempresa}		
            { tipoempresa: "{$datostipoempresa[tipoempresa].descripcion}", Id: {$datostipoempresa[tipoempresa].id_tipo_empresa} },
            {/section} 
            ],
            value:"{$empresa->idtipo_empresa}",
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) { 
                 this.text('');
                }
                else
                {
                    //alert(this.value());
                    $('#nit').attr("validationMessage", "Ingrese un número de NIT válido");
                    $('#nit').attr("placeholder", "NIT");
                    mostrar('div_nit');
                    mostrar('divfundaempresa');
                    mostrar('div_certificacionnit');
                    $('#coordenadas_lon').attr('required','required');
                    $('#coordenadas_lat').attr('required','required');
                    $('#inicio_empresa').attr('required','required');
                    $('#fundacion_empresa').attr('required','required');
                    $('#fundaempresa').attr('required','required');
                    $('#descripcion_empresa').attr('required','required');
                    $('#descripcion_empresa').attr("placeholder", "Descripcion de la Empresa");
                    if(this.value()>9 && this.value()<=13 || this.value()==15 || this.value()==16){
                        ocultar('divfundaempresa');
                        
                        $('#fundaempresa').removeAttr('required');
                    }
                    if(this.value()==9){
                        $('#fundaempresa').removeAttr('required');
                    }
                    if(this.value()==17){
                        ocultar('divfundaempresa');
                        ocultar('div_certificacionnit');
                        $('#nit').attr("validationMessage", "Ingrese un Documento de Identidad válido");
                        $('#nit').attr("placeholder", "NIT/CI/PASAPORTE");
                        $('#descripcion_empresa').attr("placeholder","Descripcion de la Empresa(opcional)");
                        
                        $('#fundaempresa').removeAttr('required');
                        $('#certificacionnit').removeAttr('required');
                        $('#coordenadas_lon').removeAttr('required');
                        $('#coordenadas_lat').removeAttr('required');
                        $('#inicio_empresa').removeAttr('required');
                        $('#fundacion_empresa').removeAttr('required');
                        $('#descripcion_empresa').removeAttr('required');
                        
                        
                    }

                    if(8==this.value())
                    {
                        mostrar('tituloco');
                    }
                    else
                    {
                        ocultar('tituloco');
                        $("#sirz").prop("checked", true);
                    }
                }
            }
        });
}
execTipoempresamodif();
if(($("#tipoempresa").val()>=9 && $("#tipoempresa").val()<=13) || $("#tipoempresa").val()>=15 && $("#tipoempresa").val()<=17){
    $('#fundaempresa').removeAttr('required');
}
   
//alert("{$persona->id_persona}");
//-----------------------------------------para el representante legal-------------------------------
$("#representante").kendoComboBox(
{   placeholder:"Representante Legal",
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

//------------------------------para la oea--------------------
function esOEA(sw)
{
    if(sw)
    {
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admEmpresaTemporal&tarea=registroOEA',
            success: function (data) {
                $("#divoea").html(data);
                }
            });
    }
    else  $("#divoea").html('');   
}
//--------------pal cafe--------------------------

function mostrarcafe()
{
    if($('#checkboxcafe').is(':checked'))
    {
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admEmpresaTemporal&tarea=registroCafe&sw=0',
            success: function (data) {
                $("#preguntascafe").html(data);
                }
            });
        mostrar('preguntascafe');
    }
    else
    {
        ocultar('preguntascafe');
        $("#preguntascafe").html('');
    }
}
function siCafe()
{
    $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admEmpresaTemporal&tarea=registroCafe&sw=1',
            success: function (data) {
                $("#preguntascafe").html(data);
                }
            });
}
function siIco()
{
    $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admEmpresaTemporal&tarea=registroCafe&sw=2',
            success: function (data) {
                $("#cajaico").html(data);
                }
            });
}
function noIco()
{
    $("#cajaico").html('');
}
//-------------------------------pal nim-----------------------------------------------------------------
//------------------------esto es para el nim------------------------

function mostrarnim()
{
   
    if($('#checkboxnim').is(':checked'))
    {
        $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=admEmpresaTemporal&tarea=nim',
        success: function (data) {
            mostrar('divnim');
            $("#divnim").html(data);
            }
        });
    }
    else
    {
        ocultar('divnim');
        $("#divnim").html('');
    }
}
//----------------para los botones--------------------------------
$("#cancelaredicionruex").kendoButton();
var cancelaredicionruex = $("#cancelaredicionruex").data("kendoButton");
cancelaredicionruex.bind("click", function(e){
    cambiar('editarempresadiv','revisarempresa');
});
var actualizacion = false;
$("#registroedicion").kendoButton();
var registroedicion = $("#registroedicion").data("kendoButton");
registroedicion.bind("click", function(e){
    //window.open("index.php?"+$('#ruex').serialize()+'&habilitado='+habilitado+'&actualizacion='+actualizacion+'&editable={$editable}', 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
    if(validator.validate())
    {   
        var ruex_new = $('#ruex').serialize()+'&afiliaciones='+multiSelect.value();
        if(ruex_old !== ruex_new){
            $("#avisomodifconf-text").html('');
            
            if($('#chbx_renovacion').is(':checked')){
                $("#avisomodifconf-text").append('<p>Usted ha seleccionado la Opción, "Quiero Renovar mi RUEX", sus datos seran enviados nuevamente para revisión.</p>');
                
                $("#avisomodifconf-text").append('<p>Deberá Presentar todos los documentos(en original o fotocopia legalizada y fotocopias simples)</p>');
                $("#avisomodifconf-text").append('<p>los cuales sufrieron modificaciones o perdieron vigencia.</p>');
                $("#avisomodifconf-text").append('<p><strong>La Renovación tiene costo</strong></p>');
            
            }else{
                $("#avisomodifconf-text").append('<p>Asegurese que los datos ingresados son los correctos, seran enviados nuevamente para revisi&oacute;n.</p>');
                if('{$editable}'=='0' && '{$cobrar}'=='0'){
                    $("#avisomodifconf-text").append('<p> los siguientes cambios fueron realizados:  </p>');
                    if(rep_old != $('#representante').val()){
                        $("#avisomodifconf-text").append('<p> Actualización Representante Legal  </p>');
                        actualizacion = true;
                    }

                    if(habilitado && direccion_old != $('#cobro_direccion_{$empresa->direccion} :input').serialize()){
                        $("#avisomodifconf-text").append('Actualización Direccion Fiscal</p>');
                        actualizacion = true;
                    }

                    if(actualizacion) $("#avisomodifconf-text").append('AVISO: estos cambios tienen un costo por actualiación del RUEX</p>');
                }
            }
            cambiar('editarempresadiv','avisomodifconf');
        }
        else
        {
            cambiar('editarempresadiv','avisonomodif');
        }
    }
});
//-----------validator-------------------------
//para el validador kendoo...............................................................................................................................
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
        radio: "Seleccione una opción",
        email:"Introduzca un Correo Electronico Valido",
        available: function(input) { 
            if(swe==1)
            {  
              return 'Verifique su Correo';
            }
            else
            {    
              return 'Revisando..';
            }
         },
        checkvalidator: 'Escoja al menos un rubro de exportación',
   }
}).data("kendoValidator");

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
    //var ruexformserialize=$('#ruex').serialize();
    function verificaredicionempresa()// aqui verfico si se a tocado el formulario de la empresa
    {
       
        
        /*var ruexformserializenuevo=$('#ruex').serialize()+'&afiliaciones='+multiSelect.value();
       // cadena=ruexformserializenuevo.slice(0,ruexformserializenuevo.length-9);
        if(ruexformserializenuevo!=ruexformserialize) return true;
        else return false;*/
    }
    
    $("#departamento").kendoComboBox(
      {   placeholder:"Departamento",
          ignoreCase: true,
          dataTextField: "departamento",
          dataValueField: "Id",
           value:"{$empresa->iddepartamento_procedencia}",
          dataSource: [
          {section name=departamento loop=$datosdepartamento}		
          { departamento: "{$datosdepartamento[departamento].nombre}", Id: {$datosdepartamento[departamento].id_departamento} },
         {/section} 
          ],
          change : function (e) {
              if (this.value() && this.selectedIndex == -1) { 
               this.text('');

              }
          }
      }); 
    $("#municipio").kendoComboBox({
        
        placeholder:"Municipio",
        dataTextField: "descripcion",
        dataValueField: "id_municipio",
        value:"{$empresa->municipio}",
        dataSource: { 
            transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admEmpresaTemporal&tarea=listarMunicipios&id_departamento="+$('#departamento').val()
                    }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text('');
            }else{  
            }
        }
    });
    $("#ciudad").kendoComboBox({
        //autoBind: false,
        //cascadeFrom: "idpaisdestino",
        placeholder:"Ciudad",
        dataTextField: "descripcion",
        dataValueField: "id_ciudad",
        value:"{$empresa->ciudad}",
        dataSource: { 
            transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admEmpresaTemporal&tarea=listarciudades&id_municipio={$empresa->municipio}"
                    }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text('');
            }else{ 

            }
        }
    });
    var departamento = $("#departamento").data("kendoComboBox");
    var ciudad = $("#ciudad").data("kendoComboBox");
    var municipio = $("#municipio").data("kendoComboBox");
    {if $empresa->ruex} mostrar_ruex(true); $("#nro_ruex").val({$empresa->ruex}); {/if}
    function mostrar_ruex(estado){
        if(estado){
            $('#nro_ruex').remove();

            var elem='{literal}<input type="text"'+
            'name="nro_ruex" id="nro_ruex" '+
            'onkeypress="return validateQty(event);" '+
            'class="k-textbox "'+
            'placeholder="numero de RUEX"' +
            'maxlength="5"'+
            'pattern="[1-9][0-9]{4}"'+ 
            'onkeypress="return isNumeric(event)"'+
            'oninput="maxLengthCheck(this)"'+
            'required validationMessage="Ingrese un número de RUEX válido"/>{/literal}' ;
            $('#div_ruex').append(elem);
        }else{
            $('#nro_ruex').remove();

            var elem='<input type="hidden" '+
            'name="nro_ruex" id="nro_ruex" '+
            'class="k-textbox "/>';
            $('#div_ruex').append(elem);
        }
    }
    
    $("#actividad").kendoComboBox(
    {
        placeholder:"Actividad Económica",
        dataTextField: "actividadeconomica",
        dataValueField: "Id",
        dataSource: [
            {section name=actividadeconomica loop=$datosactividadeconomica}
                { actividadeconomica: "{$datosactividadeconomica[actividadeconomica].descripcion}", Id: {$datosactividadeconomica[actividadeconomica].id_actividad_economica} },
            {/section}
        ],
        value:"{$empresa->idactividad_economica}",
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
    $("#afiliaciones1").kendoMultiSelect({
        placeholder:"Afiliaciones",
        dataTextField: "descripcion",
        dataValueField: "id_empresa_afiliacion",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admEmpresaTemporal&tarea=listarAfiliaciones"
                }
            }
        },
    });
    $("#afiliaciones").kendoMultiSelect({
        placeholder:"Afiliaciones",
        dataTextField: "descripcion",
        dataValueField: "id_empresa_afiliacion",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admEmpresaTemporal&tarea=listarAfiliaciones"
                }
            }
        },
    });
    if('{$ver_editor}'=='1'){
        var editorr = $("#editorr").kendoEditor({
            tools: [
           
            ]
        }).data("kendoEditor"); 

        editorr.value('{$observacion}');
        $(editorr.body).attr('contenteditable', false);
    }
    
    if('{$editable}'== '0'){
        $('#chbx_nro_ruex').attr('disabled',true);
        $('#nro_ruex').attr('readonly',true);
        $('#nro_ruex').addClass('k-state-disabled');
        $('#razonsocial').attr('readonly',true);
        $('#razonsocial').addClass('k-state-disabled');
        
        $('#nit').attr('readonly',true);
        $('#nit').addClass('k-state-disabled');
        $('#fundaempresa').attr('readonly',true);
        $('#fundaempresa').addClass('k-state-disabled');
        if('{$renovacion_editar}'!=1){
            $('#nombrecomercial').attr('readonly',true);
            $('#nombrecomercial').addClass('k-state-disabled');
        }
        
    }
    
    var multiSelect = $("#afiliaciones").data("kendoMultiSelect"),
        setValue = function(e) {
            if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                multiSelect.dataSource.filter({});
                multiSelect.value($("#afiliaciones_values").val().split(","));
            }
        };
    
    var multiSelect1 = $("#afiliaciones1").data("kendoMultiSelect"),
        setValue1 = function(e) {
            if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                multiSelect1.dataSource.filter({}); 
                multiSelect1.value($("#afiliaciones_values1").val().split(","));
            }
        }
    multiSelect1.enable(false);
    var ruex_old=$('#ruex').serialize()+'&afiliaciones='+multiSelect.value();
    //$('#email').removeAttr('readonly');
//------------------para cuando es una menor cuantia---------------------
{if $empresa->menor_cuantia}
$("#divtipoempresa").html('');
$("#divexpfrecuente").html('');
{/if}
   this.onload(setValue1($('#afiliaciones_values1').val()));
</script> 
       