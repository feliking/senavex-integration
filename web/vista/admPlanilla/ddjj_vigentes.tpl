<div class="row-fluid  form" id="planilla_vigente_ddjj">
    <div class="row-fluid "   >
        <div class="span1 hidden-phone" ></div>
        <div class="span10" >
            <div class="k-block fadein">
                
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > DDJJ VIGENTES </div>
                        </div>
                    </div>
                </div>
                <form name="formPlanillaDDJJvigente" id="formPlanillaDDJJvigente" method="post"  action="index.php">  
                <div id="header" name="header">
                    <div class="row-fluid  form" > 
                            <div class="span1 hidden-phone" ></div>
                            <div class="span2 parametro" >RUEX</div>
                            <div class="span2 "><input  id="ruex_combo_ddjj_vigente" name="ruex_combo_ddjj_vigente" required validationMessage="Ingrese un Nro RUEX"></div>
                        
                    </div>
                    <div class="row-fluid  form" >   
                            <div class="span1 hidden-phone" ></div>
                            <div class="span2 parametro" >Razon social</div>
                            <div class="span7 "><input type="text" id="razon_social_ddjj_vigente" name="razon_social_ddjj_vigente" disabled="disabled" class="k-textbox k-state-disabled" ></div>
                    </div>

                    <div class="row-fluid  form" id="botones_vigentes_ddjj">   
                        <div class="row-fluid  form" >
                            <div class="span2 hidden-phone" ></div>
                            <div class="span2" >
                                <input id="volver1" type="button" value="Volver" class="k-primary" style="width:100%"/>
                            </div>
                            <div class="span1 hidden-phone" ></div>
                            <div class="span3" id="imprime_ddjj_vigente1">

                            </div>
                        </div>
                    </div>

                    <div class="row-fluid  form" >   
                            <div class="span1 hidden-phone"></div>
                            <div class="span10" id="listado_vigentes"></div>
                    </div>

                    <div class="row-fluid  form" >
                        <div class="span2 hidden-phone" ></div>
                        <div class="span2" >
                            <input id="volver" type="button" value="Volver" class="k-primary" style="width:100%"/>
                        </div>
                        <div class="span1 hidden-phone" ></div>
                        <div class="span3" id="imprime_ddjj_vigente">

                        </div>
                    </div>
                </div>
                                   
                    <input type="hidden" name="opcion" id="opcion" value="admPlanilla" />
                    <input type="hidden" name="tarea" id="tarea" value="ListarVigentesDDJJ" /> 
                    <div id="ddjj_cuerpo_del" name="ddjj_cuerpo_del"></div>
                </form>

            </div>
        </div>
    </div>
</div>
<style type="text/css">

  table { 
        width: 100%; 
        border-collapse: collapse;
        border-radius: 5px;
    }
    /* Zebra striping */
    tr:nth-of-type(odd) { 
        background: #eee; 
    }
    th { 
        background: #333; 
        color: white; 
        font-weight: bold; 
    }
    td, th { 
        padding: 6px; 
        border: 1px solid #ccc; 
        text-align: left; 
        font: 12px/1.4 Serif, Georgia; 
    }
</style>


<script>
    ComboboxRUEXddjjVigente('#ruex_combo_ddjj_vigente');
    
    $("#volver").kendoButton();
    var volver = $("#volver").data("kendoButton");
    volver.bind("click", function(e){
        cerraractualizartab('Planilla DDJJ','admPlanilla','show_planilla_ddjj');
    });
    $("#volver1").kendoButton();
    var volver1 = $("#volver1").data("kendoButton");
    volver1.bind("click", function(e){
        cerraractualizartab('Planilla DDJJ','admPlanilla','show_planilla_ddjj');
    });
    
    ocultar("botones_vigentes_ddjj");
    ocultar("imprime_ddjj_vigente");
    
    function ComboboxRUEXddjjVigente(texto){
        $(texto).kendoComboBox({
            placeholder:"RUEX",
            dataTextField: "descripcion",
            dataValueField: "id_tipo",
            dataSource: { 
                transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admPlanilla&tarea=listar_ruexs"
                        }
                }
            },
            change : function (e) {
                var valor = this.value();
                if (this.value() && this.selectedIndex === -1) { 
                    this.text('');
                }else{ 
                    var id_empresa_vigent = this.value();
                    $.ajax({
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admPlanilla&tarea=lista_ddjj_vigente&id='+this.value(),
                        success: function (data) {
                            // alert(data[0]);                  //Mostrara todo el array JSON
                            // alert(data[0].criterio_origen);  //Mostrara  indefinido
                            var dt=eval("("+data+")");
                            // alert(dt);                       //Mostrara Object Object
                            // alert(dt[0].criterio_origen);    //Mostrar el criterio
                            document.getElementById("listado_vigentes").innerHTML="";
                            if(dt.length>0){
                                cuerpo_listado = '<table><tr><th>Acuerdo</th><th>Descripcion comrecial</th><th>Nandina</th><th>Criterio de Origen</th><th>No. de DDJJ</th>'+
                                                '<th>Fecha Aprobacion</th><th>Fecha Vencimiento</th><th>Observaci&oacute;n</th></tr>';
                                $.each(dt, function(i, item) {
                                    fec_revi = item.fecha_revision.substring(0, 10);
                                    fec_rev = fec_revi.split("-");
                                    fec_venc = item.fecha_vencimiento.substring(0, 10);
                                    fec_ven = fec_venc.split("-");
                                    if(item.observacion){
                                        obs1 = item.observacion; 
                                    } else {
                                        obs1 = '';
                                    }
                                    cuerpo_listado += '<tr><td>'+ item.sigla +'</td><td>'+ item.descripcion +'</td><td>'+ item.nandina +'</td>'+
                                                        '<td>'+ item.criterio_origen +'</td><td>'+ item.nro_ddjj +'</td>'+'<td>'+ fec_rev[2] + '-'+ fec_rev[1] + '-'+fec_rev[0] + '</td><td>'+ fec_ven[2] + '-'+ fec_ven[1] + '-'+fec_ven[0] +'</td><td>'+ obs1 +'</td></tr>';
                                });
                                cuerpo_listado += '</table>';

                                mostrar("imprime_ddjj_vigente");
                                if(dt.length>11)
                                mostrar("botones_vigentes_ddjj");
                                else ocultar("botones_vigentes_ddjj");

                            } else {
                                ocultar("imprime_ddjj_vigente");
                                ocultar("botones_vigentes_ddjj");
                                cuerpo_listado = '<table><tr><th><center>La empresa no tiene Delcaraciones Juradas Vigentes</center></th></tr></table>';
                            }
                            $("#listado_vigentes").append(cuerpo_listado);

                        } //fin del success
                    });

                    $.ajax({
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admPlanilla&tarea=razon_empresa&ruex='+this.value(),
                        success: function (data) {
                            $("#razon_social_ddjj_vigente").val(data);
                            document.getElementById("imprime_ddjj_vigente").innerHTML="";
                            document.getElementById("imprime_ddjj_vigente1").innerHTML="";

                            cuerpo_boton = ' <div class="menucf"> '+
                            '<a href="index.php?opcion=admPlanilla&tarea=ImpresionSecundario&id_empresa='+id_empresa_vigent+'" target="_blank"><img src="styles/img/imp_b.png" class="menubottom ayuda"></a>'+
                            '<a href="index.php?opcion=admPlanilla&tarea=ImpresionDDJJvigente&id_empresa='+id_empresa_vigent+'" title="Imprimir Reporte" ><img src="styles/img/imp.png" class="menutop ayuda"></a>'+
                            '</div>';

                            
                            $("#imprime_ddjj_vigente").append(cuerpo_boton);
                            $("#imprime_ddjj_vigente1").append(cuerpo_boton);
                        }
                    });
                    
                }
            }
        }).data("kendoComboBox");
    }
    
</script>