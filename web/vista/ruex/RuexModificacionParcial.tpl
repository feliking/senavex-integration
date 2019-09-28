<div class="row-fluid "  id="revisarempresa" >
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
                            <b>OPERADOR ECON&Oacute;MICO AUTORIZADO {$empresa->oea}</b>
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
            <div class="row-fluid form" >
                <div class="barra" >                                         
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
                    <b>Ciudad:</b>
                </div>     
                <div class="span2 campo" >
                    {$ciudad}
                </div>
                <div class="span2 parametro" >
                   <b> Numero de Contacto:</b>
                </div>     
                <div class="span2 campo" >
                   {$empresa->numero_contacto}
                </div> 

            </div>
            <div class="row-fluid  form" >

                <div class="span2 parametro" >
                    <b> Domicilio Fiscal:</b>
                 </div>     
                 <div class="span6 campo" >
                    {$empresa->direccionfiscal}
                 </div> 
                {*<div class="span2 parametro" >
                    <b>Domicilio Legal:</b>
                </div>     
                <div class="span2 campo" >
                   {$empresa_temporal->direccion}
                </div>*}
                <div class="span1 parametro" >
                    <b>Correo Electronico:</b>
                </div>     
                <div class="span3 campo" >
                    {$empresa->email}
                </div> 
            </div>
            {if $empresa->pagina_web or $empresa->fax}
            <div class="row-fluid  form" >                    
                {if $empresa->pagina_web}
                        <div class="span2 parametro" >
                          <b>Pagina:</b>
                        </div>     
                        <div class="span4 campo" >
                            {$empresa->pagina_web}
                        </div>  
                {/if} 
                {if $empresa->fax}
                <div class="span1 parametro" >
                    <b> Fax:</b>
                </div>     
                <div class="span3 campo" >
                    {$empresa->fax}
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
                    <div class="span5 campo" >
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
                <div class="span5" >
                </div>  
                <div class="span2" >
                     <input id="edicionempresa" type="hidden"  value="Editar" class="k-primary" style="width:100%"/>
                </div> 
                 <div class="span4" >
                </div> 
                <div class="span1 " >
                    {if $empresa->estado=='2' or $empresa->estado=='4' or $empresa->estado=='6' or $empresa->estado=='9'}
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
                <input type="hidden" name="tarea" id="tarea" value="editarEmpresaParcial" />     
                    <div class="row-fluid" > 
                        <div class="span12" >
                            <b>AVISO: Los campos con *, seran revisados por el SENAVEX antes de ser modificados.</b>
                        </div>  
                    </div> 
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div> 
                    <div class="row-fluid form" > 
                        <div class="span2 parametro" >
                            * Razon Social:
                        </div>     
                        <div class="span10" >                                
                            <input type="text" class="k-textbox "  placeholder="Razon Social" value="{$empresa->razon_social}"  name="razonsocial" id="razonsocial"  required validationMessage="Por favor ingrese su razón social" />
                        </div>  
                    </div> 
                    <div class="row-fluid form" > 
                        <div class="span2 parametro" >
                            * Nombre Comercial:
                        </div>     
                        <div class="span10" >                                
                            <input type="text" class="k-textbox "  placeholder="Nombre Comercial" value="{$empresa->nombre_comercial}" name="nombrecomercial" id="nombrecomercial" required validationMessage="Por favor Ingrese su Nombre Comercial"/>
                        </div>  
                    </div>                    
                    <div class="row-fluid form" >
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
                    <div class="row-fluid form" >
                        <div class="span2 parametro" >
                            Ruex:
                        </div> 
                        <div class="span2 campo" >
                           {$empresa->ruex}
                        </div>  
                        <div class="span1 parametro" >
                            Vigencia:
                        </div> 
                        <div class="span1 campo" >
                           {$empresa->vigencia}
                        </div>  
                        <div class="span1 parametro" >
                            Fecha:
                        </div> 
                        <div class="span2 campo" >
                           {$empresa->fecha_renovacion_ruex}
                        </div>  
                        <div class="span3" >
                           * Quiero renovar mi RUEX <input type="checkbox" name="renovacion" id="renovacion" value="1">  
                        </div> 
                    </div> 
                    <div class="row-fluid form"  id="divfundaempresa" style='padding-bottom: 10px;'> 
                        {if $empresa->matricula_fundempresa}
                        <div class="span2 parametro" >
                            Fundaempresa:
                        </div>     
                        <div class="span10 campo">                                
                            {$empresa->matricula_fundempresa}
                        </div> 
                        {/if}
                    </div> 
                    <div class="row-fluid form" >  </div> 
                    <div class="row-fluid form" >  
                        {if !$empresa->menor_cuantia}
                        <div class="span2 parametro" >
                            * Tipo de Empresa:
                        </div>     
                        <div class="span4" >                                
                            <input style="width:100%;" id="tipoempresa" name="tipoempresa" required validationMessage="Por favor escoja su tipo de Empresa">
                        </div> 
                        {/if}
                        <div class="span2 parametro" >
                            Actividad:
                        </div>     
                        <div class="span4" >                                
                            <input style="width:100%;" id="actividad" name="actividad" required validationMessage="Por favor escoja su Actividad Economica">
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
                    <div class="row-fluid form" >
                        <div class="span2 parametro" >
                            Departamento:
                        </div>    
                        <div class="span4 " >
                            <input style="width:100%;" id="departamento" name="departamento" required validationMessage="Escoja su departamento"/>
                        </div> 
                        <div class="span2 parametro" >
                            Ciudad:
                        </div> 
                        <div class="span4 " >
                            <input type="text" class="k-textbox " value="{$empresa->ciudad}" placeholder="Ciudad"  id="ciudad" name="ciudad" required validationMessage="Ingrese la ciudad"/>
                        </div>   
                    </div>
                    <div class="row-fluid form" >                           
                        <div class="span2 parametro" >
                            * Domicilio Fiscal:
                        </div>   
                        <div class="span4 " >
                            <input type="text" class="k-textbox "  value="{$empresa->direccionfiscal}" placeholder="Direcci&oacute;n Domicilio Fiscal" id="direccionfiscal" name="direccionfiscal" required validationMessage="Ingrese su dirección"/>
                        </div> 
                        <div class="span2 parametro" >
                            Fax:
                        </div> 
                        <div class="span4 " >
                            <input type="text" class="k-textbox "  value="{$empresa->fax}"  onkeypress='return validateQty(event);' placeholder="Número de Fax"  id="fax" maxlength="11" name="fax" validationMessage="Ingrese un numero de Fax valido"/>
                        </div> 
                    </div>
                    <div class="row-fluid form" >   
                         <div class="span2 parametro" >
                             N&uacute;mero de Contacto:
                        </div> 
                        <div class="span2" >
                           <input type="text" class="k-textbox "  value="{$empresa->numero_contacto}"  onkeypress='return validateQty(event);' placeholder="Número de Contacto" maxlength="20" id="numero" name="numero" required validationMessage="Ingrese su numero telefonico"/>
                        </div>  
                         <div class="span1 parametro" >
                             P&aacute;gina web:
                        </div> 
                        <div class="span3 " >
                            <input type="text" class="k-textbox "  value="{$empresa->pagina_web}"  placeholder="Página Web" id="paginaweb" name="paginaweb" />
                        </div> 
                         <div class="span1 parametro" >
                            Email:
                        </div> 
                        <div class="span3" >
                            <input type="email" class="k-textbox " value="{$empresa->email}"  placeholder="Email" id="email" name="email"  
                                required data-required-msg="Introduzca un correo electronico"
                                data-available data-available-url="validate/username"/>
                        </div> 
                    </div>
                    <div id="tituloco">
                        <div class="row-fluid form" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                        <div class="row-fluid form " >
                            <div class="span12 radio fadein" >
                                Que campo desea que aparezca en sus Certificados de Origen?(puede modificarlo cuando desee)</br>
                                Raz&oacute;n Social <input type="radio" name="titulocof" value="0" id="sirz" class="radio" {if !$empresa->tituloco}checked {/if}>
                                Nombre Comercial <input type="radio" name="titulocof" value="1" id="sinc" class="radio" {if $empresa->tituloco}checked {/if}>
                            </div> 
                        </div>   
                    </div> 
                    {if !$empresa->menor_cuantia}
                    <div class="row-fluid form" >
                        <div class="barra" >                                         
                        </div> 
                    </div> 
                    <div class="row-fluid form" >
                        <div class="span6 radio" >
                            * Es Operador Econ&oacute;mico Autorizado (OEA)?</br>
                            Si <input type="radio" name="radiooea" value="1" id="sioea" class="radio" onclick="esOEA(1)" {if $empresa->oea}checked{/if}>
                            No <input type="radio" name="radiooea" value="0" id="nooea" class="radio" onclick="esOEA(0)" {if !$empresa->oea}checked{/if}>
                        </div> 
                        <div class="span6 " id='divoea'>
                            {if $empresa->oea}
                                <input type="text" class="k-textbox "  placeholder="N&uacute;mero de registro OEA"  name="oea" id="oea"  value='{$empresa->oea}' required validationMessage="Ingrese su Registro OEA" />
                            {/if}
                        </div> 
                    </div> 
                        {if $empresa->frecuente}
                            <div class="row-fluid form" id="divexpfrecuente">
                                <div class="span10 radio" >
                                    * Es un exportador habitual?(Si su empresa emite facturas dosificadas de exportaci&oacute;n por impuestos)</br>
                                    Si <input type="radio" name="radioenf" value="1" id="sioea" class="radio" {if $empresa->frecuente}checked{/if}>
                                    No <input type="radio" name="radioenf" value="0" id="nooea" class="radio" {if !$empresa->frecuente}checked{/if}>
                                </div> 
                            </div>   
                        {/if}
                    {/if}            
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
                                    onclick="mostrarnim();"
                                    id="checkboxnim"
                                {/if}
                                >
                            </div>
                            <div class="checkboxcomentario">{if $rubro->id_rubro_exportaciones=='8'}*{/if}{$rubro->descripcion}</div>
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
                                <div class="row-fluid">
                                    <div class="span4">
                                        *ICO:
                                    </div>
                                    <div class="span8">
                                        <input type="text" class="k-textbox "  value="{$ico->ico}" placeholder="ICO"  name="ico" id="ico"  required validationMessage="Ingrese su ICO" />
                                    </div>
                                </div>
                            </div>
                             {/if}    
                        </div>    
                        <div class="span6 fadein" id="divnim">
                            {if $empresa->nim}
                                <div class="row-fluid">
                                    <div class="span3 parametro">*Nim:</div>
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
                            Nota: Puede cambiar al responsable de su empresa nominando alguien de su personal,tambien puede registrar  <span class='terminos letrarelevante' onclick="remover(tabStrip.select());anadir('Personal','admPersona','asignarPersona');">personal nuevo</span>.     
                        </div>  
                    </div>
                    <div class="row-fluid  form" >
                        <div class="span2 parametro" >
                           * Representate Legal (Apoderado):
                        </div>  
                        <div class="span10 " >
                            <input style="width:100%;" id="representante" name="representante" required validationMessage="Escoja su representante legal">
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
                         <input id="cancelaredicionruex" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                        </div> 
                        <div class="span2" >                             
                         <input id="registroedicion" type="button"  value="Editar" class="k-primary" style="width:100%"/>
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
        <div class="row-fluid " >
            <div class="span1 hidden-phone" ></div>
            <div class="span10" >
                  <center>  Sus datos se modificaron Correctamente.</center>
            </div>  
            <div class="span1 hidden-phone" ></div>
        </div> 
        <div class="row-fluid  form" id="correoconf_div">
            <div class="span1 hidden-phone" ></div>
            <div class="span10" >
                    Se le enviara un correo cuando termine la revisión de sus campos
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
        <div class="row-fluid  " >
            <div class="span1 hidden-phone" ></div>
            <div class="span10" >
                <center> Esta seguro de Modificar los datos de su Empresa.</center>
            </div>  
            <div class="span1 hidden-phone" ></div>
        </div> 
        <div class="row-fluid  form" id="confdatorelediv">
            <div class="span1 hidden-phone" ></div>
            <div class="span10" >
               <div class="row-fluid">
                   <div class="span12" >
                        Los siguientes campos entraran a una etapa de revisi&oacute;n por parte del SENAVEX, antes de ser modificados.
                   </div>
               </div>  
                <div class="row-fluid" id="razon_social_div">
                    <div class="span3 parametro" >
                        Raz&oacute;n Social:
                    </div>
                   <div class="span6 campo" id="razon_social_campo">
                   </div>
               </div> 
                <div class="row-fluid" id="nombre_comercial_div">
                    <div class="span3 parametro" >
                        Nombre Comercial:
                    </div>
                   <div class="span6 campo" id="nombre_comercial_campo">
                   </div>
               </div> 
                {if !$empresa->matricula_fundempresa}
                <div class="row-fluid" id="fundaempresa_div">
                    <div class="span3 parametro" >
                        Fundaempresa:
                    </div>
                   <div class="span6 campo" id="fundaempresa_campo">

                   </div>
               </div> 
               {/if} 
               <div class="row-fluid" id="tipoempresa_div">
                    <div class="span3 parametro" >
                        Tipo de Empresa:
                    </div>
                   <div class="span6 campo" id="tipoempresa_campo">
                   </div>
               </div> 
               <div class="row-fluid" id="oea_div">
                    <div class="span3 parametro" >
                        OEA:
                    </div>
                   <div class="span6 campo" id="oea_campo">
                   </div>
               </div> 
                <div class="row-fluid" id="oeae_div">
                    <div class="span12" >
                        Se eliminara su registro OEA.
                   </div>
               </div>
               <div class="row-fluid" id="enf_div">
                    <div class="span12" >
                        Se cambiara su frecuencia de exporatción
                   </div>
               </div>
               <div class="row-fluid" id="direccionfiscal_div">
                    <div class="span3 parametro" >
                        Domicilio Fiscal:
                    </div>
                   <div class="span6 campo" id="direccionfiscal_campo">
                   </div>
               </div> 
               <div class="row-fluid" id="remin_div">
                    <div class="span3 parametro" >
                        Rubro de Exportaci&oacute;n:
                    </div>
                   <div class="span6 campo" >
                       Productos minerales.
                   </div>
               </div> 
               <div class="row-fluid" id="nim_div">
                    <div class="span3 parametro" >
                        Nim:
                    </div>
                   <div class="span6 campo" id="nim_campo">
                   </div>
               </div> 
               <div class="row-fluid" id="nime_div">
                    <div class="span12" >
                      Se eliminara su n&uacute;mero de identificacion minera.
                   </div>
               </div> 
                <div class="row-fluid" id="ico_div">
                    <div class="span3 parametro" >
                        Ico:
                    </div>
                   <div class="span6 campo" id="ico_campo">
                   </div>
               </div> 
                <div class="row-fluid" id="icom_div">
                    <div class="span12" >
                        Se le asignara un registro ICO.
                   </div>
               </div>
               <div class="row-fluid" id="icoe_div">
                    <div class="span12" >
                        Se eliminara su registro ICO.
                   </div>
               </div>
               <div class="row-fluid" id="rl_div">
                    <div class="span3 parametro" >
                        Representante Legal:
                    </div>
                   <div class="span6 campo" id="rl_campo">
                   </div>
               </div> 
               <div class="row-fluid" id="renovacion_div">
                    <div class="span12" >
                        Se renovara la vigencia de su RUEX.
                   </div>
               </div>
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
$("#edicionempresa").kendoButton();
var edicionempresa = $("#edicionempresa").data("kendoButton");
edicionempresa.bind("click", function(e){
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
    $.ajax({             
        type: 'post',
        url: 'index.php',
        data:$('#ruex').serialize(),
        success: function (data) {
            //alert(data);
           var respuesta = eval('('+data+')');
            if(respuesta[0].suceso=='0')
            {
                $('#nombresvista').html(respuesta[0].nombrecomercial);
                cambiar('avisomodifconf','avisomodif');
                //$('#mavisoconfiguracionempresa').html('');
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
     razon_social_m=0;nombre_comercial_m=0;{if !$empresa->matricula_fundempresa} fundaempresa_m=0;{/if}tipo_empresa_m=0;oea_m=0;direccionfiscal_m=0;rubro_minerales_m=0;nim_m=0;ico_m=0;rl_m=0; renovar_m=0;enf_m=0;
     //--------------los avisos-------------
    ocultar('confdatorelediv');
    ocultar('razon_social_div');
    ocultar('nombre_comercial_div');
    {if !$empresa->matricula_fundempresa}ocultar('fundaempresa_div');{/if}
    ocultar('tipoempresa_div');
    ocultar('oea_div');
    ocultar('direccionfiscal_div');
    ocultar('remin_div');
    ocultar('nim_div');
    ocultar('nime_div');
    ocultar('ico_div');
    ocultar('icom_div');
    ocultar('icoe_div');
    ocultar('rl_div');
    ocultar('renovacion_div');
    ocultar('oeae_div');
    ocultar('enf_div');
     
     cambiar('avisomodifconf','editarempresadiv');
});
//----------para los combos
$("#tipoempresa").kendoComboBox(
{   placeholder:"Tipo de Empresa",
    dataTextField: "tipoempresa",
    dataValueField: "Id",
    dataSource: [
    {section name=tipoempresa loop=$datostipoempresa}		
    { tipoempresa: "{$datostipoempresa[tipoempresa].abreviatura}", Id: {$datostipoempresa[tipoempresa].id_tipo_empresa} },
   {/section} 
    ],
    value:'{$empresad->idtipo_empresa}',
    change : function (e) {
        if (this.value() && this.selectedIndex == -1) { 
         this.text('');
        }
        else
        {
            {if !$empresa->matricula_fundempresa}
            if(0<this.value() && this.value()<9)
            {
                if($('#divfundaempresa').css('display')=='none')
                {
                    $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: 'opcion=admEmpresaTemporal&tarea=fundaempresaEdicionParcial',
                    success: function (data) {
                        mostrar('divfundaempresa');
                        $("#divfundaempresa").html(data);
                        }
                    });
                }       
            }
            else
            {
                ocultar('divfundaempresa');
                $("#divfundaempresa").html('');
            }
            {/if}
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
var tipoempresa = $("#tipoempresa").data("kendoComboBox");
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
   var departamento = $("#departamento").data("kendoComboBox");
$("#actividad").kendoComboBox(
{   placeholder:"Actividad Economica",
    dataTextField: "actividadeconomica",
    dataValueField: "Id",
    value:"{$empresa->idactividad_economica}",
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
var representante = $("#representante").data("kendoComboBox");
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
            data: 'opcion=admEmpresaTemporal&tarea=registroCafeEdicion&sw=2',
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
        data: 'opcion=admEmpresaTemporal&tarea=nimEdicion',
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
$("#registroedicion").kendoButton();
var registroedicion = $("#registroedicion").data("kendoButton");
registroedicion.bind("click", function(e){   
    if(validator.validate())
    {
        if(verificaredicionempresa())
        {
            verificarRelevantes();
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
var ruexformserialize=$('#ruex').serialize();
function verificaredicionempresa()// aqui verfico si se a tocado el formulario de la empresa
{ 
    var ruexformserializenuevo=$('#ruex').serialize();
   // cadena=ruexformserializenuevo.slice(0,ruexformserializenuevo.length-9);
    if(ruexformserializenuevo!=ruexformserialize) return true;
    else return false;
}

//--------------valores a modificar-------------//1 cambia , 2 aumenta,3quita
var razon_social_m=0;
var nombre_comercial_m=0;
{if !$empresa->matricula_fundempresa}var fundaempresa_m=0;{/if}
var tipo_empresa_m=0;
var oea_m=0;
var direccionfiscal_m=0;
var rubro_minerales_m=0;
var nim_m=0;
var ico_m=0;
var rl_m=0;
var renovar_m=0;
var renovar_m=0;
var enf_m=0;
//--------------los avisos-------------
ocultar('confdatorelediv');
ocultar('razon_social_div');
ocultar('nombre_comercial_div');
{if !$empresa->matricula_fundempresa}ocultar('fundaempresa_div');{/if}
ocultar('tipoempresa_div');
ocultar('oea_div');
ocultar('direccionfiscal_div');
ocultar('remin_div');
ocultar('nim_div');
ocultar('nime_div');
ocultar('ico_div');
ocultar('icom_div');
ocultar('icoe_div');
ocultar('rl_div');
ocultar('renovacion_div');
ocultar('oeae_div');
ocultar('enf_div');
function verificarRelevantes()
{
    var sw=false;
    if($("#razonsocial").val().trim()!='{$empresa->razon_social}') 
    {
        razon_social_m=1;sw=true;
        mostrar('razon_social_div');
        $('#razon_social_campo').html($('#razonsocial').val());//alert('se modifico la razon social');
    }
    if($("#nombrecomercial").val().trim()!='{$empresa->nombre_comercial}') 
    {
        nombre_comercial_m=1;sw=true;
        mostrar('nombre_comercial_div');
        $('#nombre_comercial_campo').html($('#nombrecomercial').val());//alert('se modifico la razon social');
    }
    {if !$empresa->matricula_fundempresa}
        if($("#fundaempresa").length)
        {
            fundaempresa_m=2;sw=true;//alert('anandio fundaempresa'+$('#fundaempresa').val())
            mostrar('fundaempresa_div');
             $('#fundaempresa_campo').html($('#fundaempresa').val());
        }
    {/if}
    {if !$empresa->menor_cuantia} 
    if($("#tipoempresa").val()!='{$empresad->idtipo_empresa}')
    {
        tipo_empresa_m=1;sw=true;//alert('cabio empresa');
        mostrar('tipoempresa_div');
        $('#tipoempresa_campo').html(tipoempresa.text());
    }
    {/if}
    {if !$empresa->menor_cuantia}
        {if $empresa->oea}
            if($("#oea").length)
            {
                if($("#oea").val().trim()!='{$empresa->oea}')
                {
                    oea_m=1; sw=true;//alert('cambio oea');
                    mostrar('oea_div');
                    $('#oea_campo').html($('#oea').val());
                }
            }
            else
            {
                oea_m=1; sw=true; mostrar('oeae_div');
            }
        {else}

            if($("#oea").length)
            {
                oea_m=2;sw=true; //alert('aumento oea');
                mostrar('oea_div');
                $('#oea_campo').html($('#oea').val());
            }
        {/if}
        {if $empresa->frecuente}
            if($('input[name="radioenf"]:checked').val()!='{if $empresa->frecuente==''}0{else}1{/if}')
            {
                enf_m=2;sw=true; //alert('aumento oea');
                mostrar('enf_div');
            }
        {/if}
    {/if}
    if($("#direccionfiscal").val().trim()!='{$empresa->direccionfiscal}') 
    {
        direccionfiscal_m=1;sw=true;//alert('se modifico la direccion fiscal');
        mostrar('direccionfiscal_div');
        $('#direccionfiscal_campo').html($('#direccionfiscal').val());
    }  
    var swrma=0;
    {assign var=array_rubro_exportacionesb value=","|explode:$empresad->idrubro_exportaciones} 
    {foreach from=$array_rubro_exportacionesb item=idrubro}
        {if $idrubro==8} swrma=1;{/if}
    {/foreach}
    var swrmd=0;    
    $("input:checkbox[name='rubroexportacionesarray[]']:checked").each(function()
    {
        
    if($( this ).val()==8)  swrmd=1;
    });
    if(swrma==0 && swrmd==1) { rubro_minerales_m=1;sw=true; mostrar('remin_div');/*alert('aumento minerales');*/ }
    if(swrma==1 && swrmd==0) { rubro_minerales_m=3;sw=true; /*alert('quito minerales');*/ }
    {if $empresa->nim}
        if($("#nim").length)
        {
            if($("#nim").val().trim()!='{$empresa->nim}')
            {
                nim_m=1;sw=true;// alert('cambia nim');
                mostrar('nim_div');
                $('#nim_campo').html($('#nim').val());
            }
        }
        else
        {
            nim_m=2;sw=true;
             mostrar('nime_div');
        }            
    {else}
        if($("#nim").length)
        {
            nim_m=2;sw=true; //alert('aumento nim');
            mostrar('nim_div');
            $('#nim_campo').html($('#nim').val());
        }
    {/if}   
    {if $ico->ico}
        if($("#ico").length)
        {
            if($("#ico").val().trim()!='{$ico->ico}')
            {
                ico_m=1;sw=true; //alert('cambia ico');
                 mostrar('ico_div');
                $('#ico_campo').html($('#ico').val());
            }
        }
        else 
        {
            ico_m=1;sw=true;
            mostrar('icoe_div');
        }
    {else}
        if($('input[name="respico"]:checked').val()=='no' )
        {
            ico_m=2;sw=true;//alert ('se aumento cafe');
            mostrar('icom_div');
        }
        if($("#ico").length)
        {
            ico_m=2;sw=true;//alert ('se aumento cafe');
            mostrar('ico_div');
            $('#ico_campo').html($('#ico').val());
        }
        
    {/if} 
    if($("#representante").val()!='{$persona->id_persona}')
    {
         rl_m=1;sw=true;//alert('cabio  rl');
         mostrar('rl_div');
         $('#rl_campo').html(representante.text());
    }
    
    if($('#renovacion').is(':checked'))
    {
        renovar_m=2;sw=true;//alert('va a renovar el peregil');
        mostrar('renovacion_div');
    }
  //------------------para mostrar  los comentarios--------------

  if(sw)
  {
      mostrar('confdatorelediv');
      mostrar('correoconf_div');
  }
  else ocultar('correoconf_div');
  
}
//-----ocultar estado razoin social*----------------------------------------/
{if $empresad->idtipo_empresa!=8}ocultar('tituloco');{/if}
</script> 
       