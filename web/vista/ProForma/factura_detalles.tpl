<div class="row-fluid" id="factura_detalle{$id_fact}" name="factura_detalle{$id_fact}" >
    <div class="titulo" > </div>
    <div class="k-block fadein">
        <div class="k-cuerpo" id="contenido_detalle{$id_fact}" name="contenido_detalle{$id_fact}">

        </div>
    </div>
</div>
        
<script>
    $.ajax({
        type: 'post',
        url: 'index.php',
        data: 'opcion=admProForma&tarea=verCertificadosVendidosFactura&id_factura={$id_fact}',
        success: function (data) {
            var campo = '';
            var dt=eval("("+data+")");
            for(var i=0; i<dt.length; i++){                 
                campo += '<div class="row-fluid form ">'+ 
                            '<div class="span4 campo">'+dt[i].servicio+'</div>'+
                            '<div class="span1 parametro" >FOB</div>'+
                            '<div class="span1 campo">'+dt[i].FOB+'</div> '+
                            '<div class="span1 parametro" >DEL</div>'+
                            '<div class="span1 campo">'+dt[i].del+'</div>'+
                            '<div class="span1 parametro" >AL</div>'+
                            '<div class="span1 campo">'+dt[i].al+'</div>'+
                        '</div>';
            }
            $('#contenido_detalle{$id_fact}').append(campo);
        }
    });
</script>