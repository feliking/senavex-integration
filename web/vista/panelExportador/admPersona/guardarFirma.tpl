<link rel="stylesheet" type="text/css" href="styles/css-personales/component.css" media="screen" />
<div class="k-block fadein">
    <div class="k-header">
        <div class="row-fluid  form" >
            <div class="span12" >
                <div class="titulonegro" > Guardar Firma</div>  
            </div>                                      
        </div>  
    </div>
    <div class="k-cuerpo fadein" id="uploadImg">
        <div class="row-fluid form fadein" >
            <div class="span12" > Si usted alguna vez envia un documento firmado a nuestras oficinas, por motivos de comparaci&oacute;n le solicitamos que almacene su firma en una imagen (solo puede almacenarla una vez, le recomendamos almacenar la firma adecuada).</div>
        </div>
        <div class="row-fluid fadein" >
            <div class="span5" ></div>
            <div class="span2" >
                <input id="subirimagen" type="button"  value="Seleccionar Imagen" class="k-primary" style="width:100%"/>
                <input type="file" name="firmaupload" id="firmaupload"  style="display: none;" accept="image/*"/>
            </div>
            <div class="span5" ></div>
        </div> 
        <div class="row-fluid form fadein" >
            <div class="span12" > Tambi&eacute;n puede utilizar nuestro <span class='terminos letrarelevante' id='spanpanelinteractivo' onclick="cambiar('uploadImg','dibujarImg');croppanel=false;">panel interactivo.</span></div>
            <script>
                var box2 = document.getElementById('spanpanelinteractivo')
                 box2.addEventListener('touchend', function(e){
                    cambiar('uploadImg','dibujarImg');croppanel=false;
                }, false)
            </script>  
        </div>
        <canvas id="canvaslast"   style="display:none;"></canvas>
    </div>    
    <div class="k-cuerpo fadein" id="cropImg">
        <div class="row-fluid fadein" >
            <div class="span2" > </div>
            <div class="span8" > Coloque su firma en el recuadro rojo del centro.</div>
            <div class="span2" > </div>
        </div>
        <div class="row-fluid form fadein" >
            <div class="span2" > </div>
            <div class="span8 checkboxcomentario" > 
                - Puede mover la imagen presionando el boton derecho de su mouse sin soltar.<br>
                - Puede reducir o agrandar la imagen, presionando en el cuadro rojo de cualquiera de las esquinas.<br>
                - Si presiona la tecla SHIFT mientras reduce, la imagen conservara su roporcion.
            </div>
            <div class="span2" > </div>
        </div>
        <div class="row-fluid form fadein" >
            <div class="span12 " >      
                    <div class="component" id="placehere">
                        <div class="overlay">
                                <div class="overlay-inner">
                                </div>
                        </div>
                            <img class="resize-image" {*src="styles/img/g1tICO.png"*} >
                    </div>
                <script src="styles/js-personales/component.js"></script>
            </div> 
        </div> 
        <div class="row-fluid fadein" >
            <div class="span4" ></div>
            <div class="span2" >
                <input id="cancelarCrop" type="button"  value="Cancelar" class="k-primary" style="width:100%"/>
            </div>
            <div class="span2" >
                <input id="firmaCrop" type="button"  value="Cortar" class="k-primary" style="width:100%"/>
            </div>
            <div class="span4" ></div>
        </div> 
    </div>    
     <div class="k-cuerpo fadein" id="guardarImg">
        <div class="row-fluid fadein form" >
            <div class="span12" > Esta listo para guardar su firma, aseg&uacute;rese de que  su firma se distingue claramente (solo podra guardarla una vez).</div>
        </div>
         <div class="row-fluid form fadein" >
            <div class="span4 " ></div> 
             <div class="span4 " >       
                <img id="imgfirmaguardar" width="100%"  border="1" >
            </div> 
             <div class="span4 " ></div> 
        </div> 
        <div class="row-fluid fadein" >
            <div class="span4" ></div>
            <div class="span2" >
                <input id="cancelarGuar" type="button"  value="Cancelar" class="k-primary" style="width:100%"/>
            </div>
            <div class="span2" >
                <input id="guardarFirma" type="button"  value="Guardar" class="k-primary" style="width:100%"/>
            </div>
            <div class="span4" ></div>
        </div> 
    </div>    
    <div class="k-cuerpo fadein" id="dibujarImg">
        <div class="row-fluid fadein form" >
            <div class="span12" > Apretando el mouse, firme en el recuadro siguiente</div>
        </div>
         <div class="row-fluid form fadein" >
            <div class="span2" ></div>
            <div class="span8" >
                 <canvas id="canvasdraw"  width="600" height="360" style="border: 1px solid #ccc;"></canvas>
            </div> 
            <div class="span2" ></div>
        </div> 
        <div class="row-fluid fadein" >
            <div class="span3" ></div>
            <div class="span2" >
                <input id="cancelarDib" type="button"  value="Cancelar" class="k-primary" style="width:100%"/>
            </div>
            <div class="span2" >
                <input id="borrarDib" type="button"  value="Borrar" class="k-primary" style="width:100%"/>
            </div>
            <div class="span2" >
                <input id="guardarDib" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
            </div>
            <div class="span3" ></div>
        </div> 
    </div> 
    <div class="k-cuerpo fadein" id="loadingFirma">
        <div class="row-fluid  form" >
            <div class="span12 hidden-phone" >
                <img id="" src="styles/img/logo_intro.png"  >
            </div>
        </div> 
        <div class="row-fluid  form" >
            <div class="span3" > </div>
            <div class="span6" >
                <p> Espere un momento por favor.....
                </p> 
            </div>  
            <div class="span3" ></div>
        </div> 
        <div class="row-fluid  form" >
            <div class="row-fluid" >
                <div class="span3"> 
               </div>
               <div class="span6" > 
                   <div id="progressBarfirma" style="width:100%;height: 8px;"></div>
               </div>
                <div class="span3" > 
               </div>
           </div>
        </div> 
    </div> 
    <div class="k-cuerpo fadein"  id="firmaerrorguardar" >
        <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> No se pudo guardar la firma intente nuevamente por favor.
                    </p> 
                </div>  
                <div class="span1" ></div>
        </div> 
        <div class="row-fluid  form" >
                <div class="span5 hidden-phone" >
                 </div>
                 <div class="span2 " >
                     <input id="aceptarerrorguardar" type="button"  value="Aceptar" class="k-primary" style="width:100%"/>
                 </div> 
                 <div class="span5 hidden-phone" >
                 </div>
        </div> 
    </div>   
</div>
<script type="text/javascript"> 
var croppanel;
$("#subirimagen").kendoButton();
var subirimagen = $("#subirimagen").data("kendoButton");
subirimagen.bind("click", function(e){
    $('#firmaupload').click();   
    croppanel=true;
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.resize-image').attr('src', e.target.result);
            resizeableImage($('.resize-image'));
            delete window.resizeableImage;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#firmaupload").change(function(){
       readURL(this);
       cambiar('uploadImg','cropImg');
});
//---------------------para el croop-------------------
ocultar('cropImg');
$("#cancelarCrop").kendoButton();
var cancelarCrop = $("#cancelarCrop").data("kendoButton");
cancelarCrop.bind("click", function(e){
     cambiar('cropImg','uploadImg');
     var control = $("#firmaupload");
     control.replaceWith( control = control.clone( true ) );
});
$("#firmaCrop").kendoButton();
///-----------------------para guardar------------------------
ocultar('guardarImg');
$("#cancelarGuar").kendoButton();
var cancelarGuar = $("#cancelarGuar").data("kendoButton");
cancelarGuar.bind("click", function(e){
    if(croppanel)//this is for crop
    {
        cambiar('guardarImg','cropImg');
    }
    else // this is for draw img
    {
        cambiar('guardarImg','dibujarImg');
    }
});
$("#guardarFirma").kendoButton();
var guardarFirma = $("#guardarFirma").data("kendoButton");
guardarFirma.bind("click", function(e){
    var c = document.getElementById("canvaslast");
    var img = document.getElementById("imgfirmaguardar");
    c.width  = 250;
    c.height = 150;
    var ctx = c.getContext("2d");
    ctx.drawImage(img,0,0,250,150); if(!croppanel)ctx.drawImage(img,0,0,250,150);
    var dataURL = c.toDataURL();
    //------------------send serv-----------------------------------------
        cambiar('guardarImg','loadingFirma');
        var swdevueltaajaxfirma=2;
        var pbf = $("#progressBarfirma").data("kendoProgressBar");
        pbf.value(0);
        var intervalf = setInterval(function () {
            if (pbf.value() < 100) {
                if(swdevueltaajaxfirma==1)
                {
                    swdevueltaajaxfirma=2;
                    pbf.value(pbf.value() + 1);
                     clearInterval(intervalf);
                }
                if(swdevueltaajaxfirma==0)
                {
                    clearInterval(intervalf);
                    cambiar('loadingFirma','firmaerrorguardar');
                }
                if(pbf.value()==99)
                {
                    if(swdevueltaajaxfirma==1)//devolvio ajax ok
                    {
                        swdevueltaajaxfirma=2;
                         pbf.value(pbf.value() + 1);
                    }
                    if(swdevueltaajaxfirma==0)//devolvio ajax mal
                    {
                        clearInterval(intervalf);
                        cambiar('loadingFirma','firmaerrorguardar');
                    }
                }
                else
                {
                    pbf.value(pbf.value() + 1);
                }
            } 
            else
            {
                clearInterval(intervalf);
            }
        }, 80); 
        $.ajax( {
           url: 'index.php',
           type: 'post',
           data:'opcion=funcionesGenerales&tarea=subirFirma&imagen='+dataURL,
           success: function (data) { 
                var respuesta = eval('('+data+')');
               if(respuesta[0].suceso=='1')
               {    
                   ocultar('guardarfirmaspan');
                   remover(tabStrip.select());
                   swdevueltaajaxfirma=1;
               }
               else
               {   swdevueltaajaxfirma=0;
               }
           }
       });
    //----------------------------------------------------------------------
    ctx.clearRect(0, 0, c.width, c.height);
});
//-------------------------para dibujar la imagen----------------------------
ocultar('dibujarImg');
$("#cancelarDib").kendoButton();
var cancelarDib = $("#cancelarDib").data("kendoButton");
cancelarDib.bind("click", function(e){
     cambiar('dibujarImg','uploadImg');
      $( "#borrarDib" ).click();
});
$("#borrarDib").kendoButton();
$("#guardarDib").kendoButton();
//------------for loading------------------------------------
ocultar('loadingFirma');
$("#progressBarfirma").kendoProgressBar({
    showStatus: false,
    animation: false,
    min: 0,
    max: 100,
    type: "percent",
    complete: function(e) {
      }
});
ocultar('firmaerrorguardar');
$("#aceptarerrorguardar").kendoButton();
var aceptarerrorguardar= $("#aceptarerrorguardar").data("kendoButton");
aceptarerrorguardar.bind("click", function(e){  
    cambiar('firmaerrorguardar','uploadImg');
});
</script> 