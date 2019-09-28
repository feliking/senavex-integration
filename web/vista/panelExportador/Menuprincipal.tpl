<html lang="es-ES">
<head>
{include file="Librerias.tpl"}
<link href="styles/css-personales/k-window-bienvenida.css" rel="stylesheet">
</head>
<body > 
  
    <div class="container " >	
        <div class="row-fluid " >
            <div class="span12" ></div> 
        </div>
        <div class="row-fluid" >
            <div class="span3" >
                <div class="visible-desktop" ><center><img src="styles/img/senavex.png" width="100%" ></center></div>
            </div>
            <div class="span7">
                
            </div>
             <div class="span2" style="background:red;"> menu principal
                 <a href="index.php?opcion=admSalir" id="">salir</a>
            </div>
        </div> 
    </div>   
     
    {if  $sw_bienvenida_temporal == "0"}  <!--para la bienvenida del usuario temporal --> 
    <div class="container visible-desktop" >
        
            <div id="windowb"  >
                 <center><img src="styles/img/bienvenido.png"> </center>
                   <div id="mensajebienvenida">
                   <p>Bienvienido, a nuestra plataforma de servicios, el primer paso es registrar su empresa, para asi obtener su registro unico de exportaciónes.
                   </p>
                   <input type="checkbox" id="checkboxb"  > No mostrar nuevamente este mensaje.
               </div>
            </div>          
    </div>        
             {literal}
            <script>
                bienvenidasw=0;
                function enviarcheckboxb()
		{
                    if(bienvenidasw==1)
                    {
                        var parametros='opcion=login&tarea=checkboxbienvenida&sw='+bienvenidasw;   
                       $.ajax({
                           data:  parametros,
                           url:   'index.php',
                           type:  'post',
                           success:  function () {
                           }
                       });
                    }
                }
                $(document).ready(function() {
                $('#checkboxb').change(function() {
                        if($(this).is(":checked")) {bienvenidasw=1;
                        }
                        else
                        {  bienvenidasw=0;
                        }
                    });
                });
                var winb = $("#windowb").kendoWindow({
                      
                      draggable: true,
                      height: "150px",                      
                      width: "350px",
                      resizable: true,
                      actions: [
                                "Minimize",
                                "Maximize",
                                "Close"
                            ],
                      close: function(e) {
                          enviarcheckboxb();
                         },
                      animation: {
                        close: {
                          effects: "fade:out",
                          duration: 1000
                        }
                        }
                }).data("kendoWindow");
               
                winb.center(); 
                
            </script>   
            
           {/literal}
    {/if}       
                     
         
          
        
</body>
</html>