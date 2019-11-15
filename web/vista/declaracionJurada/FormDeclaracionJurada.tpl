{*<script src="styles/js-personales/jquery.auto-complete.min.js"></script>*}
{*<link rel="stylesheet" type="text/css" href="styles/css-personales/jquery.auto-complete.css" media="screen" />*}

<div class="row-fluid  form" id="alta_ddjj_container">
    <div class="span12" >
        <div class="ddjj-container fadein">
            <!--label onclick="cambiarRegional(true)" class="ddjj-section-label pointer">Cambiar Regional?</label-->
            <div class="ddjj-header">
                <div class="row-fluid">
                    <div class="span12">
                        <img class="hidden-phone" src="styles/img/portada/logo.png">
                        <h1>Declaración Jurada de Origen</h1>
                    </div>
                </div>
            </div>
            <div class="ddjj-body">
{*                <form name="alta_ddjj" id="alta_ddjj" method="post"  action="index.php">*}
{*                    <input type="hidden" id="alta_ddjj_key" name="alta_ddjj_key" value="{$key}"/>*}
{*                    <input type="hidden" name="id_arancel" value="{$arancel_vigente->id_arancel}"/>*}
{*                    <h2>I. DATOS DEL EXPORTADOR</h2>*}
{*                    <section class="ddjj-section">*}
{*                        <div class="row-fluid form">*}
{*                            <label class="span2 ddjj-section-label ">1.1 No. RUEX:</label>*}
{*                            <div class="span2 ddjj-section-field">{$representanteEmpresa[1]->ruex}</div>*}
{*                            <label class="span2 ddjj-section-label">1.2 No. NIT:</label>*}
{*                            <div class="span2 ddjj-section-field">{$representanteEmpresa[1]->nit}</div>*}
{*                        </div>*}
{*                        <div class="row-fluid">*}
{*                            <label class="span2 ddjj-section-label">1.3 Razón Social:</label>*}
{*                            <div class="span10 ddjj-section-field">{$representanteEmpresa[1]->razon_social}</div>*}
{*                        </div>*}
{*                        <div class="row-fluid">*}
{*                            <label class="span2 ddjj-section-label">1.4 Domicilio Fiscal:</label>*}
{*                        </div>*}
{*                        <div class="row-fluid">*}
{*                            {$direccion}*}
{*                        </div>*}
{*                    </section>*}
{*                    <h2>II. DATOS DEL PRODUCTOR</h2>*}
{*                    <section class="ddjj-section" >*}
{*                    <span class="ddjj-section-alert">*}
{*                        Nota.- En caso que el exportador no sea el productor de la mercancía a exportar, debe llenar los datos del productor o productores de quien adquiere la mercancia.*}
{*                    </span>*}
{*                        <label class="ddjj-section-label center bold"><span class="tooltip" title="En caso que el exportador sea comercializador (adquiere la mercancía terminada de un productor) debe registrar la siguiente información.">?</span>Es comercializador?*}
{*                            <input type="radio" name="esComercializador" value="true" {if $ddjj && $ddjj->comercializador} checked{/if}> Si*}
{*                            <input type="radio" name="esComercializador" value="false" {if $ddjj && !$ddjj->comercializador} checked{/if}> No</label>*}
{*                        <div class="row-fluid fadein"><input type="hidden" name="hiddenvalidatorec" data-escomercializador=""></div>*}
{*                        <div class="tabla_comercializadores_container {if ($ddjj && !$ddjj->comercializador) || !$ddjj}none{/if} fadein">*}
{*                            <label class="ddjj-section-label">Agrege uno o más productores.</label>*}
{*                            <div id="tabla_comercializadores" class="fadein"></div>*}
{*                            <ul class="ul-buttons">*}
{*                                <li>*}
{*                                    <input id="addfilacomercializador" type="button" value="Agregar Productor" class="k-button"  onclick="agregarfilacomercializador();"/>*}
{*                                </li>*}
{*                                <li>*}
{*                                    <input id="elimfilacomercializador" type="button" value="Remover Productor" class="k-button" onclick="eliminarfilacomercializador();"/>*}
{*                                </li>*}
{*                            </ul>*}
{*                            <div class="row-fluid fadein"><input type="hidden" name="hiddenvalidatorpro" data-productor=""></div>*}
{*                        </div>*}
{*                        <div class="tabla_fabrica_comer {if ($ddjj && !$ddjj->comercializador) || !$ddjj}none{/if} fadein">*}
{*                    <span class="ddjj-section-alert">*}
{*                        Nota.- En caso que la dirección de la planta de producción o fábrica sea distinto al domicilio fiscal, agregue la siguiente información.*}
{*                        </span>*}
{*                            <div class="row-fluid form">*}
{*                                <label class="span5 ddjj-section-label"><span class="tooltip" title="En caso que el exportador tenga una dirección de fábrica distinta a la dirección del domicilio fiscal, deberá seleccionar la dirección registrada anteriormente.">?</span>Seleccione la dirección de la Fábrica donde se elabora la mercancía</label>*}
{*                                <div class="span5" >*}
{*                                    <input id="combo_fabricas" name="combo_fabricas" class="form-select" autocomplete="new-password"*}
{*                                           validationMessage="Por favor Introduzca la Fábrica"/>*}
{*                                </div>*}
{*                                <div class="span2">*}
{*                                    <input id="addfabrica" type="button" value="Agregar Fábrica" class="k-button form-button" onclick="addFabrica()"/>*}
{*                                </div>*}
{*                            </div>*}
{*                        </div>*}
{*                    </section>*}
{*                    <h2>III. DATOS DE LA MERCANCÍA</h2>*}
{*                    <section class="ddjj-section">*}
{*                        <div class="row-fluid form">*}
{*                            <label class="span3 ddjj-section-label" >*}
{*                                3.1 <span class="tooltip" title="Indicar el nombre comercial de la mercancía o nombre de transacción entre el exportador y el importador, la cual será reflejada en el certificado de origen. Por ejemplo: Camisa de color azul ">?</span>Denominación Comercial:*}
{*                            </label>*}
{*                            <div class="span9 ddjj-input">*}
{*                                <input type="text" class="k-textbox"  name="denominacion_comercial" id="denominacion_comercial"*}
{*                                       required validationMessage="Por favor ingrese la Denomincacion Comercial" {if $ddjj && $ddjj->denominacion_comercial}value="{$ddjj->denominacion_comercial}"{/if}/>*}
{*                            </div>*}
{*                        </div>*}
{*                        <div class="row-fluid form">*}
{*                            <label class="span3 ddjj-section-label" >*}
{*                                3.2 <span class="tooltip" title="Indicar el uso y aplicación de la mercancía. Por ejemplo: Prenda de vestir que cubre el dorso del cuerpo para dama">?</span>Uso o aplicación:*}
{*                            </label>*}
{*                            <div class="span9 ddjj-input" >*}
{*                                <input type="text" class="k-textbox" name="aplicacion" id="aplicacion"*}
{*                                       required validationMessage="Por favor ingrese sus Usos y Aplicaciones" {if $ddjj && $ddjj->aplicacion}value="{$ddjj->aplicacion}"{/if}/>*}
{*                            </div>*}
{*                        </div>*}
{*                        <div class="row-fluid form">*}
{*                            <label class="span3 ddjj-section-label" >*}
{*                                3.3 <span class="tooltip" title="Indicar el nombre técnico de la mercancía, bajo las especificaciones técnicas. Por ejemplo: Madera de bambu">?</span>Nombre Técnico: (opcional)*}
{*                            </label>*}
{*                            <div class="span9 ddjj-input" >*}
{*                                <input type="text" class="k-textbox" name="nombre_tecnico" id="nombre_tecnico"/>*}
{*                            </div>*}
{*                        </div>*}
{*                        <div class="row-fluid form">*}
{*                            <label class="span4 ddjj-section-label" >*}
{*                                3.4 <span class="tooltip" title="Registre las distinas especificaicones de su mercancia. Ejem. En caso quinua, registrar Rojo, Negro y Blanco" title="Indicar las características técnicas de la mercancía, en relación al Sistema Armonizado de Designación y Codificación de Mercancías. Por ejemplo: Camisa de punto para hombre, (60% algodón, 40% poliéster)">?</span>Especificaciones de la mercancia:*}
{*                            </label>*}
{*                            <div class="span8 ddjj-input" >*}
{*                                <input type="text" class="k-textbox" name="caracteristicas" id="caracteristicas"*}
{*                                       required validationMessage="Por favor las caracteristicas técnicas del producto"*}
{*                                       {if $ddjj && $ddjj->caracteristicas}value="{$ddjj->caracteristicas}"{/if}/>*}
{*                            </div>*}
{*                        </div>*}
{*                        <div class="row-fluid form">*}
{*                            <label class="span3 ddjj-section-label">*}
{*                                3.5 <span class="tooltip" title="Indicar la sub partida arancelaria de la mercancía a 10 dígitos conforme nomenclatura arancelaria vigente. Por ejemplo: 6105.10.00.00">?</span>Subpartida Arancelaria:*}
{*                            </label>*}
{*                            <div class="span3 ddjj-input">*}
{*                                <input id="ddjj_arancel" autofocus type="text" class="k-textbox" required validationMessage="Por favor Introduzca la Subpartida Arancelaria"/>*}
{*                                <input type="hidden" name="hiddenvalidatorda" data-ddjjarancel="" aria-invalid="true" class="k-invalid">*}
{*                            </div>*}
{*                            <label class="span3 ddjj-section-label">*}
{*                                3.6 Descripción Arancel*}
{*                            </label>*}
{*                            <div class="span3 ddjj-section-field" id="descripcion_arancel">*}
{*                                {$ddjj->partida->denominacion}*}
{*                            </div>*}
{*                        </div>*}
{*                        <div class="row-fluid form">*}
{*                            <div class="tabla_comercializadores_datos_produccion {if ($ddjj && !$ddjj->comercializador) || !$ddjj}none{/if} fadein">*}
{*                                <label class="span3 ddjj-section-label">*}
{*                                    3.7 <span class="tooltip" title="Indicar la capacidad de producción mensual de la mercancía registrada.">?</span>Capacidad de producción mensual:*}
{*                                </label>*}
{*                                <div class="span3 ddjj-input" >*}
{*                                    <input type="number" id="produccion_mensual_mercancia" name="produccion_mensual_mercancia" min="0" maxlength="20"*}
{*                                           value="{if $ddjj && $ddjj->produccion_mensual}{$ddjj->produccion_mensual}{/if}"/>*}
{*                                    <div class="row-fluid fadein"><input type="hidden" name="hiddenvalidatortpmp" data-produccionmensual></div>*}
{*                                </div>*}
{*                                <label class="span3 ddjj-section-label">*}
{*                                    3.8 Unidad de Medida Comercial:*}
{*                                </label>*}
{*                                <div class="span3 ddjj-section-field" id="unidadmedida">*}
{*                                    {$ddjj->id_unidad_medida}*}
{*                                </div>*}
{*                            </div>*}
{*                        </div>*}
{*                    </section>*}
{*                    <h2>IV. TRATAMIENTO ESPECIAL</h2>*}
{*                    <section class="ddjj-section">*}
{*                        <div class="row-fluid form">*}
{*                            <label class="span12 ddjj-section-label ">*}
{*                                4.1 La mercancía será utilizada en ferias o como muestra:*}
{*                                <input type="radio" name="muestra" id="muestra" value="true" {if $ddjj && $ddjj->muestra} checked{/if}> Si*}
{*                                <input type="radio" name="muestra" id="muestra" value="false" {if $ddjj && !$ddjj->muestra} checked{/if}> No*}
{*                            </label>*}
{*                        </div>*}
{*                    </section>*}
{*                    <h2>V. ACUERDO COMERCIAL O SISTEMA GENERALIZADO DE PREFERENCIAS</h2>*}
{*                    <section class="ddjj-section">*}
{*                        <label class="ddjj-section-label">*}
{*                            5.1 <span class="tooltip" title="Seleccione el Acuerdo Comercial o Sistema Generalizado de Preferencias, donde el país de destino de la exportación es parte.">?</span>Seleccione el Acuerdo Comercial o Régimen Preferencial, del cual desea beneficiarse:*}
{*                        </label>*}
{*                        {foreach $tipoacuerdos as $tipoacuerdo}*}
{*                            <div class="ddjj-subsection">*}
{*                                <h3>{{$tipoacuerdo->descripcion}}</h3>*}
{*                                <div class="acuerdo">*}
{*                                    {foreach $acuerdos as $acuerdo}*}
{*                                        {if $acuerdo->id_tipo_acuerdo==$tipoacuerdo->id_tipo_acuerdo}*}
{*                                            <div class="acuerdo-radio" >*}
{*                                                <input type="radio" name="acuerdo" value="{$acuerdo->id_acuerdo}"*}
{*                                                       data-valor-internacional="{$acuerdo->id_tipo_valor_internacional}"*}
{*                                                       data-acuerdo-descripcion="{$acuerdo->descripcion}"*}
{*                                                       data-acuerdo-sigla="{$acuerdo->sigla}"*}
{*                                                       data-tipoacuerdo-descripcion="{$tipoacuerdo->descripcion}"*}
{*                                                       data-idtipo-acuerdo="{$tipoacuerdo->id_tipo_acuerdo}"*}
{*                                                       data-valor-descripcion="{$acuerdo->tipo_valor_internacional->abreviatura}"*}
{*                                                       data-arancel="{foreach $acuerdo->acuerdo_arancel as $acuerdo_arancel}{$acuerdo_arancel->id_arancel}{if not $acuerdo_arancel@last},{/if}{/foreach}"*}
{*                                                        {if $ddjj && $ddjj->id_acuerdo == $acuerdo->id_acuerdo} checked{/if}*}
{*                                                >*}
{*                                                {$acuerdo->sigla}*}
{*                                            </div>*}
{*                                        {/if}*}
{*                                    {/foreach}*}
{*                                </div>*}
{*                            </div>*}
{*                        {/foreach}*}
{*                        <div class="row-fluid fadein"><input type="hidden" name="hiddenvalidator" data-checkvalidator=""></div>*}

{*                        <span id="nota_aclaratoria_sgp" class="ddjj-section-alert_1 fadein hidden">Nota Aclaratoria En caso que la mercancía a exportar no figure en la lista de productos beneficiados, significa que la misma no se beneficia de las preferencias arancelarias del SGP solicitado. Consigueintemente, se sugiere seleccione en el campo 5.1 Terceros Paises, con la finalidad de poder acceder a la emisión del Certificado de Origen tipo Terceros Paises</span>*}
{*                        {foreach $aranceles as $arancel}*}
{*                            <div id="ddjj_arancel_{$arancel->id_arancel}" class="none">*}
{*                                <div class="row-fluid form">*}
{*                                    <label class="span2 ddjj-section-label ddjj-section-label-right">5.2 <span class="tooltip" title="Esta casilla indica la nomenclatura utilizada, la cual se encuentra es establecida en el Acuerdo Comercial o Sistema Generalizado de Preferencias.">?</span>Clasificación Usada:</label>*}
{*                                    <div id="denominacion_arancel_{$arancel->id_arancel}" class="span3 ddjj-ddjj-section-field">*}
{*                                        {$arancel->denominacion}*}
{*                                    </div>*}
{*                                    <label class="span2 ddjj-section-label ddjj-section-label-right">5.3 <span class="tooltip" title="Indicar la sub partida arancelaria correspondiente a la nomenclatura establecida en el Acuerdo Comercial o Sistema Generalizado de Preferencias.  Respecto a los Sistemas Generalizado de Preferencias, en caso de no encontrase la sub partida arancelaria correlacionada en el presente listado, refleja que esta no es beneficiada de un desgravamen arancelario, por lo tanto Declaración Jurada de Origen será emitida para Terceros Países.">?</span>Subpartida Arancelaria:</label>*}
{*                                    <div class="span5 ddjj-input">*}
{*                                        <input id="{$arancel->id_arancel}_ddjj_arancel" type="text" class="k-textbox" data-value="{foreach $partidas as $partida}{if $partida->id_arancel==$arancel->id_arancel}{$partida->id_partida}{/if}{/foreach}"*}
{*                                               data-text="{foreach $partidas as $partida}{if $partida->id_arancel==$arancel->id_arancel}{$partida->partida}{/if}{/foreach}"/>*}
{*                                    </div>*}
{*                                </div>*}
{*                                <div class="row-fluid form">*}
{*                                    <label class="span2 ddjj-section-label ddjj-section-label-right">5.4 Descripción Arancel:</label>*}
{*                                    <div class="span10 ddjj-section-field" id="descripcion_arancel_{$arancel->id_arancel}">*}
{*                                        {foreach $partidas as $partida}{if $partida->id_arancel==$arancel->id_arancel}{$partida->denominacion}{/if}{/foreach}*}
{*                                    </div>*}
{*                                </div>*}
{*                            </div>*}
{*                        {/foreach}*}
{*                        <input type="hidden" name="hiddenvalidatoracorp" data-arancelesacorp="" class="k-invalid" aria-invalid="true">*}
{*                    </section>*}
{*                    <h2>VI. COMPONENTES QUE FORMAN PARTE DE LA ESTRUCTURA DE LA MERCANCÍA</h2>*}
{*                    <section class="ddjj-section">*}
{*                        <label class="ddjj-section-label">*}
{*                            6.1 <span class="tooltip" title="En este campo, indicar los insumos que forman parte de la estructura de la mercancía que son originarios de Bolivia.">?</span>Materiales e Insumos de Origen Nacional:*}
{*                        </label>*}
{*                        <div id="tabla_insumosnacionales" class="fadein"></div>*}
{*                        <ul class="ul-buttons">*}
{*                            <li>*}
{*                                <input id="addfilainsumosnacionales" type="button" value="Añadir Insumo" class="k-button" onclick="agregarfilainsumosnacionales();"/>*}
{*                            </li>*}
{*                            <li>*}
{*                                <input id="elimfilainsumosnacionales" type="button" value="Remover Insumo" class="k-button" onclick="eliminarfilainsumosnacionales();"/>*}
{*                            </li>*}
{*                        </ul>*}
{*                        <div class="row-fluid form">*}
{*                            <label class="span4 ddjj-section-label">*}
{*                                6.2 Total Materiales e Insumos Nacionales:*}
{*                            </label>*}
{*                            <div class="ddjj-total"><span class="total-valor-label">Total % Sobrevalor:</span><span id="totalSobrevalorIN" class="ddjj-total-result">0</span>%</div>*}
{*                            <div class="ddjj-total">*}
{*                                Total Valor ($us): <span id="totalValorIN" class="ddjj-total-result">0</span>*}
{*                            </div>*}
{*                            <div style="clear: both;"></div>*}
{*                        </div>*}
{*                        <div class="row-fluid fadein"><input type="hidden" name="hiddenvalidatorin" data-insumosnacionales=""></div>*}
{*                    </section>*}
{*                    <section class="ddjj-section">*}
{*                        <label class="ddjj-section-label">6.3 <span class="tooltip" title="En este campo, indicar los insumos que forman parte de la estructura de la mercancía que son originarios en el extranjero.">?</span>Materiales e Insumos Importados y/o Adquiridos en el Mercado Nacional:</label>*}
{*                        <div id="tabla_insumosimportados"></div>*}
{*                        <ul class="ul-buttons">*}
{*                            <li>*}
{*                                <input id="addfilainsumosimportados" type="button" value="Añadir Insumo" class="k-button" onclick="agregarfilainsumosimportados();"/>*}
{*                            </li>*}
{*                            <li>*}
{*                                <input id="elimfilainsumosimportados" type="button" value="Eliminar Insumo" class="k-button" onclick="eliminarfilainsumosimportados();"/>*}
{*                            </li>*}
{*                        </ul>*}
{*                        <div class="row-fluid form">*}
{*                            <label class="span4 ddjj-section-label">6.4 Total Materiales e Insumos Importados:</label>*}
{*                            <div class="ddjj-total"><span class="total-valor-label">Total % Sobrevalor:</span><span id="totalSobrevalorII" class="ddjj-total-result">0</span>%</div>*}
{*                            <div class="ddjj-total">*}
{*                                Total Valor ($us): <span id="totalValorII" class="ddjj-total-result">0</span>*}
{*                            </div>*}
{*                            <div style="clear: both;"></div>*}
{*                        </div>*}
{*                        <div class="row-fluid fadein"><input type="hidden" name="hiddenvalidatorii" data-insumosimportados=""></div>*}
{*                    </section>*}
{*                    <section class="ddjj-section">*}
{*                        <div class="row-fluid form">*}
{*                            <label class="span6 ddjj-section-label">6.5 Mano de Obra, otros costos de Fabricación y Unidad:</label>*}
{*                            <div class="ddjj-total">*}
{*                                <span class="total-valor-label">Total % Sobrevalor:</span>*}
{*                                <span id="totalSobrevalorMO" class="ddjj-total-result">0</span>%*}
{*                            </div>*}
{*                            <div class="ddjj-total">*}
{*                                Total Valor ($us):*}
{*                                <div class="ddjj-total-input"><input id="totalValorMO" name="totalValorMO" maxlength="20" {if $ddjj && $ddjj->valor_mano_obra}value="{$ddjj->valor_mano_obra}"{/if}/></div>*}
{*                            </div>*}
{*                            <div style="clear: both;"></div>*}
{*                        </div>*}
{*                        <div class="row-fluid form">*}
{*                            <label class="span6 ddjj-section-label">6.6 Total Valor en Fabrica por Producto: (Campo 6.6) = (Campo 6.2) + (Campo 6.4) + (Campo 6.5)</label>*}
{*                            <div class="ddjj-total">*}
{*                                <span class="total-valor-label">Total % Sobrevalor:</span><span id="totalEnFabricaPercentage" class="ddjj-total-result">0</span>%*}
{*                            </div>*}
{*                            <div class="ddjj-total">*}
{*                                Total Valor ($us): <span id="totalEnFabrica" class="ddjj-total-result">0</span>*}
{*                            </div>*}
{*                            <div style="clear: both;"></div>*}
{*                        </div>*}
{*                        <!--div class="row-fluid form">*}
{*                        <label class="span6 ddjj-section-label">5.7 Costos de Logistica hasta Frontera Nacional (flete, seguro, carga, etc.)</label>*}
{*                        <div class="ddjj-total">*}
{*                            <span class="total-valor-label">Total % Sobrevalor:</span>*}
{*                            <span id="costoFronterePercentage" class="ddjj-total-result">0</span>%*}
{*                        </div>*}
{*                        <div class="ddjj-total">*}
{*                            Total Valor ($us):*}
{*                            <div class="ddjj-total-input"><input id="costoFrontera" name="costoFontera" maxlength="20" {if $ddjj && $ddjj->valor_frontera}value="{$ddjj->valor_frontera}"{/if}/></div>*}
{*                        </div>*}
{*                        <div style="clear: both;"></div>*}
{*                    </div>*}
{*                    <div class="row-fluid form">*}
{*                        <label class="span6 ddjj-section-label">5.8 Total Valor FOB por Producto: (Campor 5.8) = (Campo 5.6) + (Campo 5.7)</label>*}
{*                        <div class="ddjj-total">*}
{*                            <span class="total-valor-label">Total % Sobrevalor:</span>*}
{*                            <span id="fobPercentage" class="ddjj-total-result">0</span>%*}
{*                        </div>*}
{*                        <div class="ddjj-total">*}
{*                            Total Valor ($us):<span id="fob" class="ddjj-total-result">0</span>*}
{*                        </div>*}
{*                        <div style="clear: both;"></div>*}
{*                    </div-->*}
{*                    </section>*}
{*                    <h2>VII. LA MERCANCIA ES PRODUCIDA EN ZONA FRANCA</h2>*}
{*                    <section class="ddjj-section">*}
{*                        <div class="acuerdo">*}
{*                            {foreach $zonas_especiales as $zona_especial}*}
{*                                <div class="acuerdo-checkbox">*}
{*                                    <input type="radio" name="lista_elaboracion" class="zonas_especiales*}
{*                            {if $zona_especial->denominacion=='Otros'}otros{/if}" value="{$zona_especial->id_zonas_especiales}"*}
{*                                           {if $ddjj}{foreach $ddjj->zonasespeciales as $zona}{if $zona->id_zonas_especiales==$zona_especial->id_zonas_especiales}checked{/if}{/foreach}{/if}*}
{*                                           data-descripcion="{$zona_especial->denominacion}">*}
{*                                    {$zona_especial->denominacion}*}
{*                                    {if $zona_especial->denominacion=='Otros'}*}
{*                                        <div id="div_elaboraciondetalle" class="{if !$ddjj->detalle_otros}none{/if} fadein ddjj-input">*}
{*                                            <label class="ddjj-section-label">Detallar:</label>*}
{*                                            <input type="text" class="k-textbox"  name="elaboracion_detalle" id="elaboracion_detalle" value="{$ddjj->detalle_otros}"/>*}
{*                                        </div>*}
{*                                    {/if}*}
{*                                </div>*}
{*                            {/foreach}*}
{*                        </div>*}
{*                        <div class="row-fluid fadein"><input type="hidden" name="hiddenvalidatorcz" data-checkzonas=""></div>*}
{*                    </section>*}
{*                    <h2>VIII. DESCRIPCIÓN DEL PROCESO PRODUCTIVO</h2>*}
{*                    <section class="ddjj-section">*}
{*                        <div class="row-fluid  form" >*}
{*                            <div class="span12 ddjj-input">*}
{*                                <textarea id="procesoproductivo" name="procesoproductivo" class="k-textbox form-textarea" rows="8" value="">{if $ddjj && $ddjj->proceso_productivo}{$ddjj->proceso_productivo}{/if}</textarea>*}
{*                                <input type="hidden" name="hiddenvalidatordpp" data-descripcionproceso="">*}
{*                            </div>*}
{*                        </div>*}
{*                    </section>*}

{*                    <!--table class="ddjj-table" style="visibility: hidden">*}
{*                        <thead><tr><th> REO(campo opcional, se llena automaticamente al escojer la partida)</th></tr></thead>*}
{*                        <tbody>*}
{*                        <tr>*}
{*                            <td id="ddjj_reo">*}
{*                                $ddjj->reo}*}
{*                            </td>*}
{*                        </tr>*}
{*                        </tbody>*}
{*                    </table-->*}

{*                </form>*}
{*                {include file="declaracionJurada/dropzoneUploader.tpl"}*}

                <div class="row-fluid form" >
                    <ul class="ul-buttons">
                        <li>
                            <input type="button" value="Declarar" class="k-button btn-lg" onclick="previewDdjj()" />
                        </li>
                        <li>
                            <input type="button"  value="Cancelar" class="k-button btn-lg " onclick="remover(tabStrip.select())"/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{*{include file="declaracionJurada/FormFabrica.tpl"}*}
{*{include file="declaracionJurada/LoadingDeclaracionJurada.tpl" customtitle="Guardando Declaración Jurada de Origen" id='view_ddjj'}*}
{*{include file="declaracionJurada/NoticeDeclaracionJurada.tpl"*}
{*custom_message="Le informamos que su declaración jurada de origen ha sido guardada y será revisada por el SENAVEX en un plazo de tres días, gracias."*}
{*alta_ddjj="true" id="ddjj"}*}
{*{include file="declaracionJurada/FormDeclaracionJuradaScript.tpl"}*}
