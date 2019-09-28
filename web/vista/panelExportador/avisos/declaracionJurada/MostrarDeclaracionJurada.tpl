<div class="row-fluid  form" >
    <div class="row-fluid "  id="revisarempresatemporal" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro">Declaración Jurada</div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span2 parametro">Acuerdo:</div>
                    <div class="span4 campo">{$ddjj->acuerdo->getDescripcion()}</div>
                    <div class="span2 parametro">Vigencia:</div>
                    <div class="span4 campo">{$ddjj->acuerdo->getVigencia_ddjj()} días</div>
                </div>
                <div class="row-fluid " >
                    <div class="span2 parametro">
                        Descripción Comercial:
                    </div>     
                    <div class="span4 campo" >
                        {$ddjj->getDescripcion_comercial()}
                    </div>  
                    <div class="span2 parametro">
                        Caracteristas:
                    </div>     
                    <div class="span4 campo" >
                        {$ddjj->getCaracteristicas()} días
                    </div>
                </div>
                <div class="row-fluid " >
                    <div class="span2 parametro">
                        Clasificación Arancelaria:
                    </div>     
                    <div class="span4 campo" >
                        {$ddjj->getId_detalle_arancel()}
                    </div>  
                    <div class="span2 parametro">
                        Valor de la Mercancia:
                    </div>     
                    <div class="span4 campo" >
                        {$ddjj->getValor_mercancia()}$
                    </div>
                </div>
                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        Unidad de Medida:
                    </div>     
                    <div class="span4 campo" >
                        Pieza
                    </div>  
                    <div class="span2 parametro" >
                        Porcentaje de Costo:
                    </div>     
                    <div class="span4 campo" >
                        90%
                    </div>
                </div>
                <div class="row-fluid " >
                    <div class="span2 parametro" >
                        Observaciones:
                    </div>     
                    <div class="span4 campo" >
                        
                    </div>  
                    
                </div>
                
            </div>
        </div>
    </div>
</div>