<!--html >
<head>

<link href="styles/css-personales/k-window-bienvenida.css" rel="stylesheet">
</head>
<body--> 
           
            <div class="row-fluid ">
                <div class="span12" >
                    <div class="row-fluid" >
                        <div class="span1 hidden-phone" >
                        </div>
                        <div class="span10">
                             
                            <div class="k-block fadein">
                                <div class="k-header">
                                    <div class="row-fluid  form" >
                                        <div class="span12" >
                                            <div class="titulonegro" > {$titulo} </div>  
                                        </div>                                      
                                    </div>  
                                </div>
                                <!--div class="k-header k-headerrojo"><div class="tituloblanco"></div></div-->
                                <div class="k-cuerpo">  
                                    <div class="row-fluid  form" >
                                           <div class="span1 hidden-phone" ></div>
                                           <div class="span10" >
                                               {$aviso}
                                            </div>  
                                           <div class="span1 hidden-phone" ></div>
                                    </div> 
                                <form id="formaviso" method="post" action="index.php">
                                    <input type="hidden" name="id_proforma" id="id_proforma" value="{$id_proforma}" />
                                    <div class="row-fluid  form" >
                                        <input type="button" id="proforma" value="Ver Factura">
                                          <input type="button" id="deposito" value="Ingresar Deposito">
                                    </div>
                                    
                                </form>
                                </div>   
                            </div>
                        </div>
                        <div class="span1 hidden-phone" >

                        </div>
                    </div>
                </div> 
            </div>            
      
       
<script> 
    $("#deposito").kendoButton();
    $("#proforma").kendoButton();

    var deposito = $("#deposito").data("kendoButton");
    var proforma = $("#proforma").data("kendoButton");
    
    deposito.bind("click", function(e){  
      //  alert($("#formaviso").serialize());
        cerraractualizartab("Deposito",'admDeposito','depositoIngresar&'+$("#formaviso").serialize());
        /*var dato="&opcion=admDeposito&tarea=depositoIngresar&"+$("#formaviso").serialize();
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: dato,
            success: function (data) {
                //alert(data);
                //cerraractualizartab("Deposito",'admDeposito','depositoIngresar');
            }
        });*/
    });
    
    proforma.bind("click", function(e){  
       // alert($("#formaviso").serialize());
        cerraractualizartab('Facturar','admProForma','verProforma&'+$("#formaviso").serialize());
    });
     
     
</script>  
                        