<div class="row-fluid  form" >
    <div class="row-fluid "  id="revisarempresatemporal" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="row-fluid form titulofraccionada" >
                    <div class="span3" >
                    PRODUCTO
                    </div> 
                    <div class="span3" >
                    SALDO
                    </div>     
                    <div class="span6" >
                    CANTIDAD A UTILIZAR
                    </div> 
                </div> 
                {foreach $facturainsumos->insumosfactura as $insumofactura} 
                <div class="row-fluid form filafracionamiento" >
                    <div class="span3" >
                        {$insumofactura->descripcion}
                    </div> 
                    <div class="span3" >
                        <span id="span{$facturainsumos->id_factura}-{$insumofactura->id_insumos_factura}">{$insumofactura->cantidad}</span>
                    </div> 
                    <div class="span4" >
                        <input id="slider{$facturainsumos->id_factura}-{$insumofactura->id_insumos_factura}" 
                               class="balSlider" value="0" />
                        <script> 
                            var slider{$facturainsumos->id_factura}r{$insumofactura->id_insumos_factura} = $("#slider{$facturainsumos->id_factura}-{$insumofactura->id_insumos_factura}").kendoSlider({
                                increaseButtonTitle: "Right",
                                decreaseButtonTitle: "Left",
                                min: 0,
                                max: {$insumofactura->cantidad},
                                smallStep: 1,
                                largeStep: 1,
                                change: function(e) {
                                    $("#span{$facturainsumos->id_factura}-{$insumofactura->id_insumos_factura}").html({$insumofactura->cantidad}-e.value);//span
                                    var numerictextbox = $("#campo{$facturainsumos->id_factura}-{$insumofactura->id_insumos_factura}").data("kendoNumericTextBox");
                                    numerictextbox.value(e.value); 
                                    //aqui vamos a enviar al kendo grid
                                    actualizarkendogrid{$insumofactura->id_factura}('{$insumofactura->descripcion}','{$insumofactura->peso_neto}','{$insumofactura->peso_bruto}','{$insumofactura->cantidad}',e.value,'{$insumofactura->id_insumos_factura}');
                                }
                            }).data("kendoSlider");
                            slider{$facturainsumos->id_factura}r{$insumofactura->id_insumos_factura}.wrapper.css("width", "250px");
                            slider{$facturainsumos->id_factura}r{$insumofactura->id_insumos_factura}.resize();
                        </script>
                    </div> 
                    <div class="span2">
                        <input type="text" class="k-textbox" style="width:80%;"  
                        name="campo{$facturainsumos->id_factura}-{$insumofactura->id_insumos_factura}" 
                        id="campo{$facturainsumos->id_factura}-{$insumofactura->id_insumos_factura}" 
                        value="0"/>
                        <script>
                            $("#campo{$facturainsumos->id_factura}-{$insumofactura->id_insumos_factura}").kendoNumericTextBox({
                                    max: {$insumofactura->cantidad},
                                    min:0,
                                    spinners: false,
                                    change: function() {
                                    var value = this.value();
                                    $("#span{$facturainsumos->id_factura}-{$insumofactura->id_insumos_factura}").html({$insumofactura->cantidad}-value);//span
                                    slider{$facturainsumos->id_factura}r{$insumofactura->id_insumos_factura}.value(value);//slide
                                    //aqui vamos a enviar al kendo grid
                                    actualizarkendogrid{$insumofactura->id_factura}('{$insumofactura->descripcion}','{$insumofactura->peso_neto}','{$insumofactura->peso_bruto}','{$insumofactura->cantidad}',value,'{$insumofactura->id_insumos_factura}');
                                    }
                            });
                        </script>
                    </div> 
                </div> 
                {/foreach}                    
                
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>
                <div class="row-fluid  form" >
                    <div class="span12" >
                        <div class="k-block fadein">
                            <div class="k-header">
                                <div class="row-fluid  form" >
                                    <div class="span12" >
                                        <div class="titulonegro" >FACTURA COMERCIAL DE EXPORTACI&Oacute;N</div>  
                                    </div>                                      
                                </div>  
                            </div>
                            <form id="facturaform{$facturainsumos->id_factura}">
                                <div class="row-fluid form" >
                                    <div class="span2">
                                        <img  id="imagenempresacabecera" src="styles/img/empresas/{$id_empresa}.{$formato_imagen}" onError='this.onerror=null;imgendefectoempresa(this);' />
                                    </div>
                                    <div class="span7" >
                                        <div class="row-fluid " >
                                            <div class="span12  cabecerafactura" >
                                                 <span class="titulofactura" >{$facturainsumos->empresa->razon_social}</span> <br>
                                                {$facturainsumos->empresa->direccion}<br>
                                                Telf. {$facturainsumos->empresa->numero_contacto} {if $facturainsumos->empresa->fax} Fax:{$empresa->fax}{/if}<br>
                                                {$facturainsumos->empresa->email} {if $facturainsumos->empresa->pagina_web}{$facturainsumos->empresa->pagina_web}{/if}<br> 
                                                {$facturainsumos->empresa->ciudad}-BOLIVIA
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="span3">
                                        <div class="bordefactura fadein" id="bordefactura" style="padding-bottom:2px;padding-top:4px;">
                                            
                                            <input type="text" class="k-textbox"  style="width:90%;margin-bottom:5px;" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                                                    placeholder="Nro. de Factura"  name="nrofactura" id="nrofactura" required validationMessage="Por favor ingrese el numero de su factura." /><br>
                                            Factura no Dosificada
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid form" >
                                    <div class="barra" >                                         
                                    </div> 
                                </div> 
                                <div class="row-fluid form" >   
                                    <div class="span4" >
                                        <input type="text" class="k-textbox"  placeholder='Consignatario/ Cliente' name="cliente{$facturainsumos->id_factura}" id="cliente{$facturainsumos->id_factura}" 
                                               required validationMessage="Por favor ingrese el Consignatario/Cliente." />
                                    </div> 
                                    <div class="span4" >
                                        <input type="text" class="k-textbox"  placeholder='Dirección' name="direccionfactura{$facturainsumos->id_factura}" id="direccionfactura{$facturainsumos->id_factura}" 
                                               required validationMessage="Por favor ingrese la Dirección." />
                                    </div> 
                                    <div class="span4" >
                                        <input type="text" class="k-textbox"  placeholder='Telf.' name="telffactura{$facturainsumos->id_factura}" id="telffactura{$facturainsumos->id_factura}" 
                                               required validationMessage="Por favor ingrese el numero Telefonico." />
                                    </div>  
                                </div>
                                <div class="row-fluid form" > 
                                    <div class="span4" >
                                        <input type="text" class="k-textbox"  placeholder='Puerto de embarque' name="puertoembarque{$facturainsumos->id_factura}" id="puertoembarque{$facturainsumos->id_factura}" 
                                               required validationMessage="Por favor ingrese el puerto de embarque." />
                                    </div> 
                                    <div class="span4" >
                                        <input type="text" class="k-textbox"  placeholder='Destino' name="destinofactura{$facturainsumos->id_factura}" id="destinofactura{$facturainsumos->id_factura}" 
                                               required validationMessage="Por favor ingrese el destino." />
                                    </div> 
                                    <div class="span1 parametro" >
                                        Fecha:
                                    </div>     
                                    <div class="span3 campo" >
                                       {$fechafactura}
                                    </div>  
                                </div>
                                <div class="row-fluid form" >
                                    <div class="barra" >                                         
                                    </div> 
                                </div> 
                                <div class="row-fluid form" >
                                    <div class="span12" >
                                        <div id="insumosfactura{$facturainsumos->id_factura}"></div>
                                    </div> 
                                </div> 
                            </form>
                            <div class="row-fluid form" >
                                <div class="span12" >
                                    TOTAL: <span id="totalfactura{$facturainsumos->id_factura}">0</span> $us DOLARES AMERICANOS
                                </div> 
                            </div> 
                            <div class="row-fluid  form" >
                                <div class="span4" >
                                </div>
                                <div class="span2 " >
                                 <input id="cancelarfactura{$facturainsumos->id_factura}" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                                </div> 
                                <div class="span2" >
                                <input id="registrarfactura{$facturainsumos->id_factura}" type="button" value="Registrar" class="k-primary" style="width:100%"/> <br><br>
                                </div>
                                <div class="span4" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                       
</div> 
<script>

//----------------------------------esto es para los botones------------------------------------------
$("#cancelarfactura{$facturainsumos->id_factura}").kendoButton();
var cancelarfactura{$facturainsumos->id_factura} = $("#cancelarfactura{$facturainsumos->id_factura}").data("kendoButton");
cancelarfactura{$facturainsumos->id_factura}.bind("click", function(e){
     remover(tabStrip.select()); 
});
$("#registrarfactura{$facturainsumos->id_factura}").kendoButton();
var registrarfactura{$facturainsumos->id_factura} = $("#registrarfactura{$facturainsumos->id_factura}").data("kendoButton");
registrarfactura{$facturainsumos->id_factura}.bind("click", function(e){  
    //aqui se validan los formualrios
    alert('jajaj');
   /* if(facturaform.validate())
    {
       
        guardainsumos();//en datosinsumosfactura
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admFactura&tarea=guardarFactura&'+$("form").serialize()+'&total='+total+'&'+datosinsumosfactura,
            success: function (data) {
                 var respuesta = eval('('+data+')');
                if(respuesta[0].suceso=='0')
                {
                     cerraractualizartab('Inventario','admInventario','');
                }
                else
                { 
                    alert('No se guardo correctamente, verifique su conexión a internet');
                }
            }
        });
    }*/
});
///-----------------------------esto es para el grid--------------------------------------------
var total{$facturainsumos->id_factura}=0;//es el total de la factura
dataSource{$facturainsumos->id_factura} = new kendo.data.DataSource({
    schema: {
        model: {
            fields: {
                id_producto: { 
                },
                producto: { 
                    defaultValue:" "
                },
                peso_bruto: {
                    type: "number"
                },
                peso_neto: { 
                    type: "number"
                },
                cantidad: {
                    type: "number"
                },
                total: {
                    type: "number",
                    validation: {
                        required: true,
                        totalvalidation: function (input) {
                         /*   if (input.is("[name='total']") && input.val() == "0") {
                                input.attr("data-totalvalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }
                            //--------------esta parte es para sumar el total------------------
                            if(input.is("[name='total']") && parseInt(input.val())!=0)
                            {
                                // aqui se tiene que sumar el total de los totales es igualarlo al comentario de padres de bebes
                                actualizatotal();
                            }
                            //-------------------------------------------------*/
                            return true;
                        }
                    }
                }
            }
        }
    }
});
$("#insumosfactura{$facturainsumos->id_factura}").kendoGrid({
    dataSource: dataSource{$facturainsumos->id_factura},
    editable: true,
    scrollable: false,
    resizable: true,
    selectable: "simple",
    columns: [
        { field: "id_producto"}, 
        { field: "producto", title: "Producto",editable: false},        
        { field: "peso_bruto", title: "Peso Bruto",editable: false},
        { field: "peso_neto", title: "Peso Neto",editable: false},
        { field: "cantidad", title: "Cantidad",editable: false},
        { field: "total", title: "Total $us"}
    ],
    edit: function(e) {
      if (e.model.isNew()) {
            //set field
            e.model.set("id_producto", arrayvalores{$insumofactura->id_factura}[0]);
            e.model.set("producto", arrayvalores{$insumofactura->id_factura}[1]); // Name: grid field to set
            e.model.set("peso_bruto", arrayvalores{$insumofactura->id_factura}[2]);
            e.model.set("peso_neto", arrayvalores{$insumofactura->id_factura}[3]);
            e.model.set("cantidad", arrayvalores{$insumofactura->id_factura}[4]);
        }
    }
});
//----------------------------esta funcion es clave de aqui paso los prametros para que se vaya actualizando dinamicamente el kendo grid 
//esta es mi variable array de valores
var arrayvalores{$insumofactura->id_factura}=[];
function actualizarkendogrid{$insumofactura->id_factura}(descripcion,peso_neto,peso_bruto,cantidadtotal,cantidadutilizada,id_insumos_factura)
{
    //si la cantidadutilizada es mayor a cero se añadira una fila a la grid si es que no existe
    if(cantidadutilizada==0)//se elimina las row en el kendogrid
    {
        
    }
    else// se añade una row en el kendo grid
    {   //id_producto,descripcion,peso_neto,peso_bruto,cantidadutilizada
        //--------------preguntamos si existe eliminamos y volvemos a crear -----------------------------
        
        var grid_factura = $("#insumosfactura{$insumofactura->id_factura}").data("kendoGrid");
        var data_factura = grid_factura.dataSource;
        var numfilas_factura = data_factura.total();
        var valores_factura = data_factura.data();
        var arr_factura = [];
        for (var i = 0; i < numfilas_factura; i++) {
            alert(valores_factura[i].id_producto);
        }
        
        arrayvalores{$insumofactura->id_factura} = [id_insumos_factura, descripcion,peso_neto,peso_bruto,cantidadutilizada];
        var insumosfactura{$insumofactura->id_factura} = $("#insumosfactura{$insumofactura->id_factura}").data("kendoGrid");
        insumosfactura{$insumofactura->id_factura}.addRow();
    }
}
</script>
