<div id="{$id}Wrapper">
    <div class="ddjj-container">
        <div class="ddjj-body">
            <section class="ddjj-section">
                <div class="row-fluid form">
                    <label class="span3 ddjj-section-label" >
                        <span class="tooltip" title="Puede reasignar la fecha de vigencia">?</span>Fecha de Vencimiento:
                    </label>
                    <div class="span9 ddjj-input">
                        <input type="text" id="r_fechaVigencia"/>
                    </div>
                </div>
                <div class="row-fluid form">
                    <label class="span3 ddjj-section-label">
                        <span class="tooltip" title="Puede modificar la sub partida arancelaria de la mercancía a 10 dígitos conforme nomenclatura arancelaria vigente. Por ejemplo: 6105.10.00.00">?</span>Subpartida Arancelaria:
                    </label>
                    <div class="span3 ddjj-input">
                        <input id="r_arancel" type="text" class="k-textbox"/>
                    </div>
                    <label class="span3 ddjj-section-label">
                        Descripción nuevo arancel:
                    </label>
                    <div class="span3 ddjj-section-field" id="r_arancel_description">
                    </div>
                </div>
                <div class="row-fluid form">
                    <span id="r_arancel_validation" class="k-widget k-tooltip k-tooltip-validation k-invalid-msg hidden">
                        <span class="k-icon k-warning"> </span> Se requiere cambiar almenos la fecha de Vigencia o la partida.
                    </span>
                </div>
            </section>
        </div>
    </div>
    <div class="row-fluid form" >
        <ul class="ul-buttons">
            <li>
                <button id="review_ddjj_setVigencia" class="k-button btn-lg" onclick="reasignar.reasignarDatos()" >Modificar Datos</button>
            </li>
            <li>
                <input type="button"  value="Cancelar" class="k-button btn-lg" onclick="remover(tabStrip.select());"/>
            </li>
        </ul>
    </div>
</div>
<script>
    (function () {
        var arancelOpcionales;

        function setUnidades(term){
            var dataItem;
            if(arancelOpcionales.length){
                dataItem= arancelOpcionales.find(function(item){
                    return item.partida == term;
                });
            }
            if(dataItem){
                $('#r_arancel_description').html(dataItem.denominacion);
                $("#r_arancel_description").attr('id_partida',dataItem.id_partida);
            }else{
                $('#r_arancel_description').html('');
                $('#r_arancel_description').attr('id_partida','');
            }
        }
        $("#r_arancel").autoComplete({
            minChars: 3,
            source: function(term, suggest){
                term = term.toLowerCase();
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data:{
                        opcion:'admArancel',
                        tarea:'searchPartida',
                        term:term
                    },
                    success: function(data) {
                        arancelOpcionales=data=JSON.parse(data);
                        var suggestions = [];
                        for (i=0;i<data.length;i++)
                            suggestions.push(data[i].partida);
                        suggest(suggestions);
                    }
                });

            },
            onSelect:function(event, term, item) {
                setUnidades(term);
            }
        }).change(function() { setUnidades($( this ).val()) });
        $("#r_fechaVigencia").kendoDatePicker({
            min: new Date(),
            open: solveCalendar
        });
        function reasignarDatos() {
            $("#r_arancel_validation").addClass('hidden');
            if ($("#r_fechaVigencia").val() == '' &&  $('#r_arancel_description').attr('id_partida') == undefined) {
                $("#r_arancel_validation").removeClass('hidden').addClass('fadein');
                return;
            }
            confirmMessage("Esta seguro de cambiar los datos?",function(){
                cambiar(['{$id}Wrapper','reasignarDatos'],'reasignarDatosloading_ddjj');
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: {
                        opcion:'admDeclaracionJurada',
                        tarea:'saveReasignarDatos',
                        id_ddjj: '{$ddjj->id_ddjj}',
                        fecha_vencimiento: $("#r_fechaVigencia").val(),
                        id_partida: $('#r_arancel_description').attr('id_partida')
                    },
                    success: function(data) {
                        data=JSON.parse(data);
                        if(data.status=='success'){
                            cambiar('reasignarDatosloading_ddjj','reasignarDatos_notice_ddjj');
                        }else{
                            alert('Se produjo un error Intente nuevamente');
                            console.log(data);
                            cambiar('reasignarDatosloading_ddjj',['reasignarDatos','reasignarDatosActions']);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Se produjo un error Intente nuevamente');
                        cambiar('reasignarDatosloading_ddjj',['reasignarDatos','{$id}Wrapper']);
                        console.log('jqXHR:');
                        console.log(jqXHR);
                        console.log('textStatus:');
                        console.log(textStatus);
                        console.log('errorThrown:');
                        console.log(errorThrown);
                    }
                });
            });
        }
       window.reasignar = {
           reasignarDatos: reasignarDatos
       }
    })();
</script>
