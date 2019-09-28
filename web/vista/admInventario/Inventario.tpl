<div class="row-fluid  form" > 
    <div class="row-fluid "  id="revisarempresatemporal" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" >FACTURA COMERCIAL DE EXPORTACI&Oacute;N</div>  
                        </div>                                      
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span2">
                        <img  id="imagenempresacabecera" src="styles/img/empresas/{$facturaempresainsumos->empresa->id_empresa}.{$facturaempresainsumos->empresa->formato_imagen}" onError='this.onerror=null;imgendefectoempresa(this);' />
                    </div>
                    <div class="span7" >
                        <div class="row-fluid " >
                            <div class="span12  cabecerafactura" >
                                {if $esdosificada=='2'}
                                    <span class="titulofactura" >FACTURA OPERADOR DE UN TERCER PA&Iacute;S</span>
                                {else}
                                    <span class="titulofactura" >{$facturaempresainsumos->empresa->razon_social}</span> <br>
                                {$facturaempresainsumos->empresa->direccion}<br>
                                Telf. {$facturaempresainsumos->empresa->numero_contacto} {if $facturaempresainsumos->empresa->fax} Fax:{$facturaempresainsumos->empresa->fax}{/if}<br>
                                {$facturaempresainsumos->empresa->email} {if $facturaempresainsumos->empresa->pagina_web}{$facturaempresainsumos->empresa->pagina_web}{/if}<br> 
                                {$facturaempresainsumos->empresa->ciudad}-BOLIVIA
                                {/if}
                            </div>  
                        </div>
                    </div>
                    <div class="span3">
                        <div class="bordefactura">
                            <span class="titulofactura" >
                            {if $esdosificada=='1'}
                            NIT: {$facturaempresainsumos->empresa->nit}</span><br>
                            {/if}                           
                            {if $esdosificada=='1'}
                            Autorización Nro: {$facturaempresainsumos->numero_autorizacion}<br>
                            {elseif $esdosificada=='0'}
                            No Dosificada<br>
                            {/if}
                             Nro: {if $facturaempresainsumos->numero_factura=='0'}Sin N&uacute;mero{else}{$facturaempresainsumos->numero_factura}{/if}<br>
                        </div>
                    </div>
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid " >
                    <div class="span1 parametro" >
                        {if $esdosificada=='2'}Nombre:{else}Importador:{/if}
                    </div>     
                    <div class="span2 campo" >
                        {$facturaempresainsumos->importador}
                    </div>  
                    <div class="span2 parametro" >
                         {if $esdosificada=='2'} Pa&iacute;s:{else} Pa&iacute;s del importador:{/if}
                    </div>     
                    <div class="span2 campo" >
                        {$facturaempresainsumos->pais_importador}
                    </div>  
                    <div class="span1 parametro" >
                        Dirección:                        
                    </div>     
                    <div class="span4 campo" >
                        {$facturaempresainsumos->direccion_importador}
                    </div>  
                </div>
                {if $esdosificada!='2'}    {* esto es para restringir al tercer operador*}
                    {if $facturaempresainsumos->consignatario OR $facturaempresainsumos->pais_consignatario OR $facturaempresainsumos->direccion_consignatario }
                    <div class="row-fluid " >
                        {if $facturaempresainsumos->consignatario}
                        <div class="span1 parametro" >
                            Consignatario:
                        </div>     
                        <div class="span2 campo" >
                            {$facturaempresainsumos->consignatario}
                        </div>  
                        {/if}
                        {if $facturaempresainsumos->pais_consignatario}
                        <div class="span2 parametro" >
                            Pa&iacute;s del consignatario:
                        </div>     
                        <div class="span2 campo" >
                            {$facturaempresainsumos->pais_consignatario}
                        </div>  
                        {/if}
                        {if $facturaempresainsumos->direccion_consignatario}
                        <div class="span1 parametro" >
                            Dirección:
                        </div>     
                        <div class="span4 campo" >
                            {$facturaempresainsumos->direccion_consignatario}
                        </div>  
                        {/if}
                    </div>
                    {/if}  

                    <div class="row-fluid " >
                        <div class="span2 parametro" >
                            Puerto de embarque:
                        </div>     
                        <div class="span2 campo" >
                            {$facturaempresainsumos->puerto_embarque}
                        </div> 
                        <div class="span2 parametro" >
                            Pais de destino:
                        </div>     
                        <div class="span2 campo" >
                             {$facturaempresainsumos->pais->nombre}
                        </div> 
                        <div class="span2 parametro" >
                            Fecha:
                        </div>     
                        <div class="span2 campo" >
                            {$facturaempresainsumos->fecha_emision}
                        </div> 
                    </div>     
                    {if $facturapadre}
                    <div class="row-fluid " >
                        <div class="span4 parametro" >
                           Dependiente de la factura dosificada Nro:
                        </div>     
                        <div class="span8 campo" >
                            {$facturapadre}
                        </div>  
                    </div>    
                    {/if}
                {else}
                    <div class="row-fluid " >
                        <div class="span2 parametro" >
                            Raz&oacute;n Social:
                        </div>     
                        <div class="span6 campo" >
                            {$facturaempresainsumos->razon_social}
                        </div> 
                        <div class="span2 parametro" >
                            Pais de destino:
                        </div>       
                        <div class="span2 campo" >
                            {$facturaempresainsumos->pais_importador}
                        </div> 
                    </div>     
                {/if}
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid form" >
                    <div class="span12" >
                        <table id="insumos{if $esdosificada=='1'}{$facturaempresainsumos->id_factura}{$esdosificada}{elseif $esdosificada=='0'}{$facturaempresainsumos->id_factura_no_dosificada}{$esdosificada}{else}{$facturaempresainsumos->id_factura_tercer_operador}{$esdosificada}{/if}">
                            <colgroup>
                                <col />
                                <col />
                                <col />
                                <col />
                                <col />
                                <col />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad/Peso</th>
                                    <th>Unidad de Medida</th>
                                    {if $esdosificada!='2'}
                                    <th>Precio Unitario</th>
                                    <th>Total $us</th>
                                    {if $esdosificada=='1'}
                                    <th>Valor FOB $us</th>
                                    {/if}
                                    {else}
                                    <th>Total $us</th>
                                    {/if}
                                </tr>
                            </thead>
                            <tbody>
                                {if $esdosificada=='1'}
                                {foreach $facturaempresainsumos->insumosfactura as $insumosfactura} 
                                    <tr>
                                    <td>{$insumosfactura->descripcion}</td>
                                    <td>{$insumosfactura->cantidad}</td>
                                    <td>
                                        {foreach $unidades as $unidad} 
                                            {if $insumosfactura->unidad_medida==$unidad->getId_unidad_medida()}
                                            {$unidad->getDescripcion()}
                                            {/if}
                                        {/foreach} 
                                    </td>
                                    <td>{$insumosfactura->precio_unitario}</td>
                                    <td>{$insumosfactura->precio}</td>
                                    <td>{$insumosfactura->valor_fob}</td>
                                    </tr>
                                {/foreach}
                                {elseif $esdosificada=='0'}
                                  {foreach $facturaempresainsumos->insumosfacturanodosificada as $insumosfactura} 
                                    <tr>
                                    <td>{$insumosfactura->descripcion}</td>
                                    <td>{$insumosfactura->cantidad}</td>
                                    <td>
                                        {foreach $unidades as $unidad} 
                                            {if $insumosfactura->unidad_medida==$unidad->getId_unidad_medida()}
                                            {$unidad->getDescripcion()}
                                            {/if}
                                        {/foreach} 
                                    </td>
                                    <td>{$insumosfactura->precio_unitario}</td>
                                    <td>{$insumosfactura->precio}</td>
                                    </tr>
                                {/foreach}
                                {else}
                                    {foreach $facturaempresainsumos->insumosfacturaterceroperador as $insumosfactura} 
                                        <tr>
                                        <td>{$insumosfactura->descripcion}</td>
                                        <td>{$insumosfactura->cantidad}</td>
                                        <td>
                                            {foreach $unidades as $unidad} 
                                                {if $insumosfactura->unidad_medida==$unidad->getId_unidad_medida()}
                                                {$unidad->getDescripcion()}
                                                {/if}
                                            {/foreach} 
                                        </td>
                                        <td>{$insumosfactura->precio_unitario}</td>
                                        </tr>
                                    {/foreach}
                                {/if}
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $("#insumos{if $esdosificada=='1'}{$facturaempresainsumos->id_factura}{$esdosificada}{elseif $esdosificada=='0'}{$facturaempresainsumos->id_factura_no_dosificada}{$esdosificada}{else}{$facturaempresainsumos->id_factura_tercer_operador}{$esdosificada}{/if}").kendoGrid({
                                    sortable: true,
                                    scrollable: false
                                });
                            });
                        </script>
                    </div> 
                </div> 
                {if $esdosificada!='2'}                 
                    <div class="row-fluid form" >
                        <div class="span12" >
                            TOTAL PRODUCTOS:  {$facturaempresainsumos->total_productos} $us DOLARES AMERICANOS
                        </div> 
                    </div>  
                {/if}   
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>
                {if $esdosificada=='1'}
                    <div class="row-fluid " >

                        <div class="span2 parametro" >
                            Incoterm:
                        </div>     
                        <div class="span4 campo" >
                            {$facturaempresainsumos->incoterm->sigla}
                        </div>  
                        <div class="span2 parametro" >
                            Flete y Seguro:
                        </div>     
                        <div class="span4 campo" >
                            {$facturaempresainsumos->flete} $us
                        </div>  
                    </div>
                    <div class="row-fluid form" >
                        <div class="barra" >    
                        </div> 
                    </div>
                    <div class="row-fluid form" >
                        <div class="span12" >
                            <span class="letrarelevante">TOTAL VALOR FOB FRONTERA:  {$facturaempresainsumos->total_incoterm} $us DOLARES AMERICANOS<span>
                        </div> 
                    </div> 
                {/if}
                {if $esdosificada=='2'}
                    <div class="row-fluid " >
                        <div class="span3" ></div>
                        <div class="span2 parametro">
                            Incoterm:
                        </div>     
                        <div class="span4 campo" >
                             {$facturaempresainsumos->incoterm->sigla}
                        </div>   
                        <div class="span3"></div>
                    </div>
                {/if}
            </div>
        </div>
    </div>                       
</div>   
       