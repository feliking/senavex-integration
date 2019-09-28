
<div class="row-fluid fadein"  id="show_dir_{$ds_id}" name="show_dir_{$ds_id}" >
    <div >
        <div class="k-cuerpo">
            <div class="row-fluid " >
                <div class="span2 parametro" >Calle/Avenida/Plaza/Otro</div>
                <div class="span2 campo" id="sh_tc_{$ds_id}" name="sh_tc_{$ds_id}">                </div>
                <div class="span3 parametro" >Nombre Calle/Avenida/Plaza/Otro</div>
                <div class="span4 campo" id="sh_ntc_{$ds_id}" name="sh_ntc_{$ds_id}">                </div>
            </div>

            <div class="row-fluid " >
                <div class="span2 parametro" >Número de Domicilio</div>
                <div class="span1 campo" id="sh_num_domicilio_{$ds_id}" name="sh_num_domicilio_{$ds_id}">                </div>
                <div class="span4 parametro" >Nombre del Edificio</div>
                <div class="span3 campo" id="sh_nombre_edif_{$ds_id}" name="sh_nombre_edif_{$ds_id}">                </div>
                <div class="span1 parametro" >Piso</div>
                <div class="span1 campo" id="sh_piso_{$ds_id}" name="sh_piso_{$ds_id}">                </div> 
            </div>

            <div class="row-fluid " >
                <div class="span2 parametro" >Dpto/Oficina/Local</div>
                <div class="span2 campo" id="sh_td_{$ds_id}" name="sh_td_{$ds_id}">                </div>
                <div class="span3 parametro" >Número Dpto/Oficina/Local</div>
                <div class="span2 campo" id="sh_ntd_{$ds_id}" name="sh_ntd_{$ds_id}">                </div>
            </div>

            <div class="row-fluid " >
                <div class="span2 parametro" >Zona/Barrio/Otro</div>
                <div class="span2 campo" id="sh_tz_{$ds_id}" name="sh_tz_{$ds_id}">                </div>
                <div class="span3 parametro" >Nombre Zona/Barrio/Otro</div>
                <div class="span3 campo" id="sh_ntz_{$ds_id}" name="sh_ntz_{$ds_id}">                </div>
            </div>
            <div class="row-fluid " >
                <div class="span2 parametro" >Departamento</div>
                <div class="span2 campo" id="sh_dpto_{$ds_id}" name="sh_dpto_{$ds_id}">                </div>
                <div class="span2 parametro" >Municipio</div>
                <div class="span3 campo" id="sh_municipio_{$ds_id}" name="sh_municipio_{$ds_id}">                </div> 
            </div>
            <div class="row-fluid " >
                <div class="span2 parametro" >Teléfono Fijo</div>     
                <div class="span2 campo" id="sh_tfijo_{$ds_id}" name="sh_tfijo_{$ds_id}">                </div> 
                <div class="span2 parametro" >Teléfono Celular</div>     
                <div class="span2 campo" id="sh_tcel_{$ds_id}" name="sh_tcel_{$ds_id}">                </div> 
                <div class="span2 parametro" >Teléfono Fax</div>     
                <div class="span2 campo" id="sh_tfax_{$ds_id}" name="sh_tfax_{$ds_id}">                </div> 
            </div>
            <div class="row-fluid " >
                <div class="span2 parametro" >Dirección Descriptiva</div>     
                <div class="span9 campo" id="sh_dir_desc_{$ds_id}" name="sh_dir_desc_{$ds_id}">                </div>
            </div>
        </div>
    </div>    
</div>
<script>
    $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admDireccion&tarea=get_data_direccion&id_direccion={$ds_id}',
            success: function (data) {
                var dt=eval("("+data+")");
                $('#sh_tc_{$ds_id}').html(dt[0].tipo_calle);
                $('#sh_ntc_{$ds_id}').html(dt[0].nombre_tipo_calle);
                
                $('#sh_num_domicilio_{$ds_id}').html(dt[0].numero_domicilio);
                $('#sh_nombre_edif_{$ds_id}').html(dt[0].nombre_edificio);
                $('#sh_piso_{$ds_id}').html(dt[0].piso);
                $('#sh_td_{$ds_id}').html(dt[0].tipo_dpto);
                $('#sh_ntd_{$ds_id}').html(dt[0].numero_tipo_dpto);
                $('#sh_tz_{$ds_id}').html(dt[0].tipo_zona);
                $('#sh_ntz_{$ds_id}').html(dt[0].nombre_tipo_zona);
                $('#sh_dpto_{$ds_id}').html(dt[0].dpto);
                $('#sh_municipio_{$ds_id}').html(dt[0].municipio);
                $('#sh_tfijo_{$ds_id}').html(dt[0].tfijo);
                $('#sh_tcel_{$ds_id}').html(dt[0].tcel);
                $('#sh_tfax_{$ds_id}').html(dt[0].tfax);
                $('#sh_dir_desc_{$ds_id}').html(dt[0].dir_descript);
           }
        });
</script>
