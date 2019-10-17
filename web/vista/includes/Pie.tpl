
       
    </div>  
 </div>  
{if  isset($login)} 
<div class="container hidden-phone" id="footer" >	
        <div class="row-fluid ">
             <div class="span1"  >
                       
             </div>
             <div class="span2" >
                      <center> 
                          <p onclick="informacion()"> Quienes somos? </p>
                      </center>    
             </div>
                    <div class="span4" >
                      <center> 
                        <p onclick="terminos()">  Terminos y Condiciones  </p>
                      </center>    
                    </div>
                    <div class="span4" >
                      <center> 
                         <p ><a href="http://www.senavex.gob.bo" TARGET="_new">Senavex 2014, Todos los derechos reservados </a></p>
                      </center>    
                    </div>
                    <div class="span1" >
                       
                    </div>
        </div> 
  </div>      
<div id="inf"  style="display:none">
                <div id="example" class="k-content">
                <div id="wrap" class="first-page">
                    <ul id="book">
                        <li><img src="styles/img/revista/maserati.jpg" alt="Page 12" /></li>
                        <li><img src="styles/img/revista/mazda.jpg" alt="Page 11" /></li>
                        <li><img src="styles/img/revista/maserati.jpg" alt="Page 10" /></li>
                        <li><img src="styles/img/revista/mazda.jpg" alt="Page 9" /></li>
                        <li><img src="styles/img/revista/maserati.jpg" alt="Page 8" /></li>
                        <li><img src="styles/img/revista/mazda.jpg" alt="Page 7" /></li>
                        <li><img src="styles/img/revista/maserati.jpg" alt="Page 6" /></li>
                        <li><img src="styles/img/revista/mazda.jpg" alt="Page 5" /></li>
                        <li><img src="styles/img/revista/mercedes.jpg" alt="Page 4" /></li>
                        <li><img src="styles/img/revista/audi.jpg" alt="Page 3" /></li>
                        <li><img src="styles/img/revista/ferrari.jpg" alt="Page 2" /></li>
                        <li class="current"><img src="styles/img/revista/audi2.jpg" alt="Page 2" /></li>
                    </ul>

                    <a href="#" id="previous">Previous page</a>
                    <a href="#" id="next">Next page</a>
                </div>

                <script>
                    function current(page) {
                        var book = $("#book"),
                            pages = book.children(),
                            pagesCount = pages.length,
                            current = pages.filter(".current"),
                            currentIndex = pagesCount - current.index(),
                            newPage;

                        if (!arguments.length) {
                            return currentIndex;
                        }

                        if (book.data("animating")) {
                            return;
                        }

                        $("#wrap").toggleClass("first-page", page == 1)
                                  .toggleClass("last-page", page == pagesCount);

                        if (page != currentIndex) {
                            current.removeClass("current");
                            newPage = pages.eq(pagesCount - page).addClass("current");

                            if (page > currentIndex) {
                                kendo.fx(book).pageturnHorizontal(current, newPage).play();
                            } else {
                                kendo.fx(book).pageturnHorizontal(newPage, current).reverse();
                            }
                        }
                    }

                    $("#previous").click(function(e) {
                        e.preventDefault();
                        current(Math.max(1, current() - 1));
                    });

                    $("#next").click(function(e) {
                        e.preventDefault();
                        current(Math.min(12, current() + 1));
                    });
                    
                </script>

                <style>
                    #wrap {
                        background-image: url("styles/img/revista/maserati.png");
                        width: 657px;
                       /* height: 482px;*/
                        margin: 0.5em auto 0.5em;
                        position: relative;
                    }

                    #book {
                        position: relative;
                        width: 650px;
                        height: 477px;
                        margin: 0 auto;
                        padding: 0;
                        list-style-type: none;
                    }

                    #book > li {
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        background-color: #fff;
                    }

                    #actions {
                        overflow: hidden;
                        margin: 0 auto 3em;
                        width: 650px;
                    }

                    #previous, #next {
                        text-decoration: none;
                        text-indent: -999em;
                        overflow: hidden;
                        display: block;
                        height: 100%;
                        width: 90px;
                        position: absolute;
                        top: 0;
                        background-repeat: no-repeat;
                        background-position: 50% 50%;
                        opacity: .5
                    }

                    #previous:hover, #next:hover {
                        opacity: 1;
                    }

                    #previous {
                        left: 0;
                        background-image: url("styles/img/revista/arrow-left.png");
                    }

                    #next {
                        right: 0;
                        background-image: url("styles/img/revista/arrow-right.png");
                    }

                    .first-page #previous,
                    .last-page #next {
                        display: none;
                    }
                </style>
            </div>
            
     </div>
{/if}
    <div id="ter"  style="display:none">
         
             <div class="row-fluid " >
                    <div class="span12" >
                       <div class="titulo" >Terminos y Condiciones</div>
                    </div>
             </div>
             <div class="row-fluid " >
                    <div class="span12" >
                        {include file="avisos/terminoscondiciones.tpl"}
                    </div>
             </div>
             <div class="row-fluid " >
                    <div class="span12" >
                       
                    </div>
             </div>
        
             
     </div>
    <script>
        {literal}
        var inf = $("#inf");
        var ter = $("#ter");
        function informacion()
        {
            if (!$("#inf").data("kendoWindow")) { 
            inf.kendoWindow({
                      
                      draggable: true,
                      height: "570px",                      
                      width: "700px",
                      resizable: true,
                      actions: [ "Minimize", "Maximize", "Close"],
                      animation: {
                        close: {
                          effects: "fade:out",
                          duration: 1000
                        },
                         open: {
                            effects: "fade:in",
                             duration: 1000
                          }
                        }                       
                }).data("kendoWindow");
                inf.data("kendoWindow").open();
                    inf.data("kendoWindow").center();
                }
                else
                {
                    inf.data("kendoWindow").open();
                    inf.data("kendoWindow").center();
                }
        }
        function terminos()
        {
            if (!$("#ter").data("kendoWindow")) { 
              ter.kendoWindow({
                      
                      draggable: true,
                      height: "550px",                      
                      width: "600px",
                      resizable: true,
                      actions: [ "Minimize", "Maximize", "Close"],
                      animation: {
                        close: {
                          effects: "fade:out",
                          duration: 1000
                        },
                         open: {
                            effects: "fade:in",
                             duration: 1000
                          }
                        }
                }).data("kendoWindow");
                ter.data("kendoWindow").open();
                    ter.data("kendoWindow").center();}
            else
                {
                    ter.data("kendoWindow").open();
                    ter.data("kendoWindow").center();
                }
        }
        function detectmob() { 
           if( navigator.userAgent.match(/Android/i)
               || navigator.userAgent.match(/webOS/i)
               || navigator.userAgent.match(/iPhone/i)
               || navigator.userAgent.match(/iPad/i)
               || navigator.userAgent.match(/iPod/i)
               || navigator.userAgent.match(/BlackBerry/i)
               || navigator.userAgent.match(/Windows Phone/i)
               ){
                 return true;
               }
               else {
                 return false;
               }
           } 
           function isDate(txtDate)
                {
                  var currVal = txtDate;
                  if(currVal == '')
                    return false;
                  //Declare Regex 
                  var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
                  var dtArray = currVal.match(rxDatePattern); // is format OK?
                  if (dtArray == null)
                     return false;
                  //Checks for mm/dd/yyyy format. 
                    dtDay = dtArray[1];
                    dtMonth= dtArray[3];
                    dtYear = dtArray[5]; 
                  if (dtMonth < 1 || dtMonth > 12)
                      return false;
                  else if (dtDay < 1 || dtDay> 31)
                      return false;
                  else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31)
                      return false;
                  else if (dtMonth == 2)
                  {
                     var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
                     if (dtDay> 29 || (dtDay ==29 && !isleap))
                          return false;
                  }
                  return true;
                }
     {/literal}
    </script>
{*-----------------------------esta parte es para las ayudas----------------------------*}
<div id="ayuda"  style="display:none">
    {if !$nombre}
    ayuda registrate
    {/if}
</div>
<script>
var varayuda='';
var ayudawindow= $("#ayuda");
function ayuda(controlador)
{
    if(varayuda!=controlador && controlador!='registrate')
    {
        //llamas al ajax para actualizar
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admAyuda&tarea='+controlador,
            success: function (data) {
                $("#ayuda").html(data);                
            }
        });
    }
    
    if (!$("#ayuda").data("kendoWindow")) { 
        ayudawindow.kendoWindow({
            draggable: true,
            height: "400px",                      
            width: "400px",
            resizable: true,
            actions: [ "Minimize", "Close"],
            animation: {
              close: {
                effects: "fade:out",
                duration: 1000
              },
               open: {
                  effects: "fade:in",
                   duration: 1000
                }
              }
        }).data("kendoWindow");
        ayudawindow.data("kendoWindow").open();
        ayudawindow.data("kendoWindow").center();
    }
    else
    {
        ayudawindow.data("kendoWindow").open();
        ayudawindow.data("kendoWindow").center();
    }
    varayuda=controlador;
}
</script>
{*libriries to be added*}
<script src="styles/js-personales/dropzone.min.js"></script>
<script src="styles/js-personales/papaparse.min.js"></script>
<script src="styles/js-personales/jquery.auto-complete.min.js"></script>
<script src="styles/js-personales/verificacion.js"></script>
<script src="styles/js-personales/infracciones.js"></script