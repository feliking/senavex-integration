<h2>IX. DOCUMENTOS ADJUNTOS</h2>
<section class="ddjj-section ddjj-section-initial">
    <ul class="ddjj-ul">
        <li>Subir archivos PDF o imagenes(png, jpg).</li>
        <li>Los archivos no deben pesar mas de 2 MB.</li>
        <li>Podra subir un maximo de 5 archivos.</li>
        <li>El nombre de los archivos debe detallar el documento.(maximo 20 caracteres)</li>
    </ul>
    <form action="index.php" id="filesUploader" class="dropzone ddjj-uploader">
        <input type="hidden" name="opcion" value="admUploader"/>
        <input type="hidden" name="tarea" value="filesUpload"/>
        <div class="dz-message" data-dz-message><span>Arrastre los archivos a esta area ó haga click para subir un archivo.</span></div>
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    </form>
</section>
<script>
    var documentos_files=[
        {if $ddjj && !$clon}
        {foreach $ddjj->ddjjdocumentos as $documento}
        {
            name:"{$documento->nombre}",
            title:"{$documento->title}",
            size:{$documento->size},
            status:'success',
            edit:{if $edition}1{else}0{/if},
            type:"{$documento->formato}",
            id:"{$documento->id_ddjj_documentos}"
        },
        {/foreach}
        {/if}
    ];
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("form#filesUploader",
    {
        {literal}
        dictInvalidFileType:'Solo se permite imagenes o pdf.',
        dictFileTooBig:'El archivo pesa {{filesize}} MB, el peso permitido es de {{maxFilesize}}MB',
        dictFallbackMessage:'Su navegador no soporta la subida de acrchivos por favor intente con chrome.',
        dictResponseError:'Error de servidor: {{statusCode}}',
        dictCancelUpload:'Cancelar',
        dictCancelUploadConfirmation:'Esta seguro de cancelar',
        dictRemoveFile:'Eliminar',
        acceptedFiles:'image/jpg,image/jpeg,image/png,application/pdf',
        dictMaxFilesExceeded:'No se permite mas de 5 archivos por declaración jurada.',
        maxFilesize: 5, // MBz
        maxFiles:5,
        addRemoveLinks:true,
        {/literal}
    {if $ddjj && !$clon}
        init: function() {
            thisDropzone = this;
            $.each(documentos_files, function(key,value){
                var mockFile = { name: value.name, size: value.size,status:'success',edit:1,id:value.id };
                thisDropzone.emit("addedfile", mockFile);
                thisDropzone.emit("thumbnail", mockFile, "documents/ddjj/"+value.title);
                thisDropzone.emit("complete", mockFile);
            });
        }
    {/if}
    }).on("removedfile", function(file) {
       if(file.status=='success'){
           documentos_files = documentos_files.filter(function(document) {
               return document.name !== file.name;
           });
           var deletefile=true;
           $.each(myDropzone.files,function (index,object) {
               deletefile=!(object.name==file.name && object.status=='success');
           });
           if(deletefile){
               var data = 'opcion=admUploader&tarea=tmpFileDelete&name=' + file.name;
               {if $ddjj} if(file.edit) data = 'opcion=admUploader&tarea=fileDelete&id_ddjj_documentos=' + file.id;{/if}
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: data,
                    success: function(data) {
                        data=JSON.parse(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('jqXHR:');
                        console.log(jqXHR);
                        console.log('textStatus:');
                        console.log(textStatus);
                        console.log('errorThrown:');
                        console.log(errorThrown);
                    }
                });
           }
       }
    }).on('error', function(file, response) {
        var data = JSON.parse(response);
        $(file.previewElement).find('.dz-error-message').text(data.message);
    }).on('success', function(file) {
        var document={
            name:file.name,
            title:"",
            size:file.size,
            status:file.status,
            edit:0,
            type:file.type
        };
        documentos_files.push(document);
    });
</script>
