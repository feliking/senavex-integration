<div class="row-fluid form" id="documentReviewActions">
    <ul class="ul-buttons">
        <li>
            <button id="review_ddjj_setVigencia" class="k-button btn-lg" onclick="sendDdjjVigencia()" >Validar Cancelación</button>
        </li>
        <li>
            <input type="button"  value="Cancelar" class="k-button btn-lg" onclick="remover(tabStrip.select());"/>
        </li>
    </ul>
</div>
<script>
    function sendDdjjVigencia() {
        confirmMessage("Esta seguro de validar la Cancelación?",function(){
            cambiar(['documentReview','documentReviewActions'],'documentReviewloading_ddjj');
            $.ajax({
                type: 'post',
                url: 'index.php',
                data: {
                    opcion:'admDeclaracionJurada',
                    tarea:'validarCancelacion',
                    id_ddjj: '{$ddjj->id_ddjj}'
                },
                success: function(data) {
                    data=JSON.parse(data);
                    if(data.message=='success'){
                        cambiar('documentReviewloading_ddjj','documentReview_notice_ddjj');
                    }else{
                        alert('Se produjo un error Intente nuevamente');
                        console.log(data);
                        cambiar('documentReviewloading_ddjj',['documentReview','documentReviewActions']);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Se produjo un error Intente nuevamente');
                    cambiar('{$id}loading_ddjj','alta_ddjj');
                    cambiar('documentReviewloading_ddjj',['documentReview','documentReviewActions']);
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
</script>
