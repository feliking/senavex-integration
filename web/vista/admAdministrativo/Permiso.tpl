<div class="row-fluid ">
    <div class="span12" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="row-fluid  form" >
                    <div class="span12" >
                        <div class="titulonegro" > {$ausenciaasistente->tipoausencia->descripcion}</div>  
                    </div>                                      
                </div>  
            </div>
            <div class="row-fluid " >
                <div class="span2" >
                </div> 
                <div class="span2 parametro" >
                    Funcionario:
                </div>     
                <div class="span6 campo" >
                    {$ausenciaasistente->persona->nombres} {$ausenciaasistente->persona->paterno} {$ausenciaasistente->persona->materno}
                </div>  
                <div class="span2" >
                </div> 
            </div>    
            <div class="row-fluid " >
                <div class="span2" >
                </div> 
                <div class="span2 parametro" >
                    Desde:
                </div>     
                <div class="span2 campo" >
                    {$ausenciaasistente->fecha_desde} 
                </div>  
                <div class="span2 parametro" >
                    Hasta:
                </div>     
                <div class="span2 campo" >
                    {$ausenciaasistente->fecha_hasta} 
                </div>  
                <div class="span2" >
                </div> 
            </div>    
            <div class="row-fluid " >
                <div class="span2" >
                </div> 
                <div class="span2 parametro" >
                    Motivo:
                </div>     
                <div class="span6 campo" >
                    {$ausenciaasistente->motivo} 
                </div>  
                <div class="span2" >
                </div> 
            </div>  
        </div>
    </div>
</div>       
           
       