<div class="row-fluid" id="factura_depositos{$id_fact}" name="factura_depositos{$id_fact}" >
    <div class="titulo" > DEPOSITOS </div>
    <div class="k-block fadein">
        <div class="k-cuerpo" id="contenido{$id_fact}" name="contenido{$id_fact}">

        </div>
    </div>
</div>
        
<script>
    $.ajax({
        type: 'post',
        url: 'index.php',
        data: 'opcion=admDeposito&tarea=verDepositosPorFactura&id_factura={$id_fact}',
        success: function (data) {
            var campo = '';
            var dt=eval("("+data+")");
            for(var i=0; i<dt.length; i++){
                campo += '<div class="row-fluid form ">'+ 
                            '<div class="span2 parametro" >Fecha Depósito</div>'+
                            '<div class="span1 campo">'+dt[i].fecha+'</div>'+
                            '<div class="span1 parametro" >Código Depósito</div>'+
                            '<div class="span1 campo" >'+dt[i].codigo+'</div>'+
                            '<div class="span1 parametro" >Monto Depósito</div>'+
                            '<div class="span1 campo">'+dt[i].monto+'</div> '+
                            '<div class="span1 parametro" >Observación</div>'+
                            '<div class="span4 campo">'+dt[i].descripcion+'</div>'+
                        '</div>';
            }
            $('#contenido{$id_fact}').append(campo);
        }
    });
</script>