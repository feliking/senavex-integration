<div class="row-fluid  form" >
    <div class="row-fluid "  id="revisarempresatemporal" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > FACTURA N° {$facturaSenavex->getId_factura_senavex()} </div>  
                        </div>                                      
                    </div>  
                </div>
                
                <div class="row-fluid  form" >
                    
                    <div class="span2 parametro" >
                        <b>NIT :</b>
                    </div>     
                    <div class="span2 campo" >
                        {$empresa->getNit()}
                    </div>  
                    
                    <div class="span2 parametro"  >
                        <b> FECHA EMISIÓN :</b>
                    </div>     
                    <div class="span2 campo">
                           {$facturaSenavex->getFecha_emision()}
                    </div>  
                 
                </div>
               
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                        <b>CLIENTE :</b>
                    </div>     
                    <div class="span10 campo" >
                        {$empresa->getRazon_Social()}
                    </div>  
                </div>
                            
                
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>            
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" >DETALLE</div>  
                        </div>                                      
                    </div>  
                </div>
                    {foreach from=$listaServicios item=array}
                        <div class="row-fluid  form" >
                            <div class="span3 parametro" >
                               <b> {$array[0]}</b>
                            </div>     
                            <div class="span3 campo" >
                               {$array[1]} Bs
                            </div>     
                        </div>
                    {/foreach}
                <div class="row-fluid  form" >
 
                    <div class="row-fluid form" >
                        <div class="barra" ></div> 
                    </div>
                    
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            TOTAL 
                        </div>     
                        <div class="span3 campo" >
                               {$facturaSenavex->getTotal()} Bs
                        </div>     
                    </div>
                </div>
               
                <div class="row-fluid form" >
                        <div class="barra" ></div> 
                </div>
                <div class="row-fluid  form" >
                   <div class="span3 parametro" >
                           son :
                   </div>
                   <div class="span5 campo" >
                       {$literal}
                   </div>
                </div>
                <div class="row-fluid  form" >
                   <div class="span3 parametro" >
                           Codigo de Control :
                   </div>
                   <div class="span2 campo" >
                       {$facturaSenavex->getCodigo_control()}
                   </div>
                   
                </div>
                <div class="row-fluid form" >
                        <div class="barra" ></div> 
                </div>
                <div class="row-fluid  form" >
                   <div class="span7 parametro" >
                       {$codigo_qr}
                   </div>
                </div>
                   <form name="formfirmaruex" id="formfirmaruex" method="post"  action="index.php" >
                        <input type="hidden" name="opcion" id="opcion" value="admEmpresa" />
                        <input type="hidden" name="tarea" id="tarea" value="ruexfirmado" />
                        
                        <div class="row-fluid  form" >
                            <div class="span4 hidden-phone" >
                             </div>
                             <div class="span4 hidden-phone" >
                             </div>
                             <div class="span2 " >
                                 <input id="firmarruex" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                             </div> 
                             
                         </div> 
                    </form> 
            </div>
           
        </div>
    </div>                       
</div>   
