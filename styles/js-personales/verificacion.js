//*******************acordion item**********************
function verVerificacion(id_ver_verificacion){
    anadir("Verificación "+id_ver_verificacion,'admVerificaciones','verVerificacion&id='+id_ver_verificacion);
}
function editarVerificacion(id_ver_verificacion){
    cerrarDemas('Editar Verificación','');
    anadir("Editar Verificación",'admVerificaciones','editarVerificacion&id='+id_ver_verificacion);
}
function guardarInforme(id_ver_verificacion){
    $('#nroInformeValidation').addClass('hidden');

    if($('#nroInforme').val() != ''){
        $.ajax({
            type: 'post',
            url: 'index.php',
            data:{
                opcion:'admVerificaciones',
                tarea:'guardarInforme',
                id_ver_verificacion:id_ver_verificacion,
                informe:$('#nroInforme').val()
            },
            success: function(data) {
                fadeMessage('Se guardo el Informe de la visita de verificación Nro '+ id_ver_verificacion + ', Exitosamente!');
                var data=JSON.parse(data);
            }
        });
    } else $('#nroInformeValidation').removeClass('hidden');
}
function asignarPersonal(id_verificacion){
    var id_persona = $("#personalverificaciones").data("kendoDropDownList");
    if(id_persona.value()!=''){
        $.ajax({
            type: 'post',
            url: 'index.php',
            data:{
                opcion:'admVerificaciones',
                tarea:'asignarPersonal',
                id_ver_verificacion:id_verificacion.toString(),
                id_persona_verificacion:id_persona.value()
            },
            success: function(data) {
                var data = JSON.parse(data);
                if(!+data.status) fadeMessage('ocurrio un error',data.message);
                else fadeMessage('Se asigno el personal a la visita de verificación correctamente.');
            }
        });
    }else{
        $('#personalverificacionesValidator').removeClass('hidden');
    }
}
function eliminarVerificacion(id_verificacion){
    confirmDataMessage("Esta seguro que quiere eliminar la verificación, ingrese una Justificación",function(text){
        cambiar('verificacion_edicion_template','verificaion_loading_ddjj');
        $.ajax({
            type: 'post',
            url: 'index.php',
            data:{
                opcion:'admVerificaciones',
                tarea:'eliminarVerificacion',
                id_ver_verificacion:id_verificacion,
                justificacion:text
            },
            success: function(data) {
                cambiar('verificaion_loading_ddjj','verificacion_edicion_template');
                fadeMessage('Se elimino la verificación, Exitosamente!');
                var data = JSON.parse(data);
                if(!+data.status) fadeMessage('ocurrio un error',data.message);
                else{
                    remover(tabStrip.select());
                    cerraractualizartab('Verificaciones','admVerificaciones','verificaciones');
                }
            }
        })
    });
}


//setting the accordion item
$('body').on('click', '.accordion-item', function(){
    var acordionHeight=$(this).next().outerHeight(true)+45,
        acordion=$(this).parent();
    if(acordion.hasClass('close')) acordion.css('height',acordionHeight).removeClass('close');
    else acordion.removeAttr('style').addClass('close');
});

//tooltips live
$("body").on('mouseover','.tooltip-item', function () {
    $(this).kendoTooltip({
        width: 400,
        position: "top"
    }).data("kendoTooltip");
})


/// fucniones para la conclusion de revision de verificaciones por parte del analista
function verificacionValidator(){
    var validation = true;
    $('#verificacionResultadoValidation').addClass('hidden');
    $('#verificacionResultadoRadioValidation').addClass('hidden');
    $('#nroInformeValidation').addClass('hidden');

    if($('#verificacionResultado').val() == ''){
        validation=false;
        $('#verificacionResultadoValidation').removeClass('hidden');
    }
    if(!$("input[name='verificacionResultadoRadio']:checked").length){
        validation=false;
        $('#verificacionResultadoRadioValidation').removeClass('hidden');
    }
    if($('#nroInforme').length && $('#nroInforme').val().trim() == ''){
        validation=false;
        $('#nroInformeValidation').removeClass('hidden');
    }
    return validation;
}
function aceptarVerificacionDdjj(id_ver_verificacion){
    if(verificacionValidator()){

        cambiar('verificacion_edicion_template','verificaion_loading_ddjj');
        $.ajax({
            type: 'post',
            url: 'index.php',
            data:{
                opcion:'admVerificaciones',
                tarea:'aceptarVerificacionDdjj',
                id_ver_verificacion:id_ver_verificacion,
                resumen:$('#verificacionResultado').val(),
                estado_verificacion:$("input[name='verificacionResultadoRadio']:checked").val(),
                informe:$('#nroInforme').val().trim()
            },
            success: function(data) {
                var data = JSON.parse(data);
                cambiar('verificaion_loading_ddjj','verificacion_edicion_template');
                if(!+data.status) fadeMessage('ocurrio un error',data.message);
                else{
                    remover(tabStrip.select());
                    cerraractualizartab('Verificaciones','admVerificaciones','verificaciones');
                    fadeMessage('Se acepto la visita de Verificación');
                }
            }
        })
    }
}
function rechazarVerificacionDdjj(id_ver_verificacion){
    if(verificacionValidator()){
        cambiar('verificacion_edicion_template','verificaion_loading_ddjj');
        $.ajax({
            type: 'post',
            url: 'index.php',
            data:{
                opcion:'admVerificaciones',
                tarea:'rechazarVerificacionDdjj',
                id_ver_verificacion:id_ver_verificacion,
                resumen:$('#verificacionResultado').val(),
                estado_verificacion:$("input[name='verificacionResultadoRadio']:checked").val()
            },
            success: function(data) {
                cambiar('verificaion_loading_ddjj','verificacion_edicion_template');
                var data = JSON.parse(data);
                if(!+data.status) fadeMessage('ocurrio un error',data.message);
                else{
                    remover(tabStrip.select());
                    cerraractualizartab('Verificaciones','admVerificaciones','verificaciones');
                    fadeMessage('Se rechazo la visita de Verificación');

                }
            }
        })
    }
}

///////-------------------------fade in message-----------------------------
(function(global,$){
    $('body').append('<div class="fade-message-container"><div class="fade-message-content"></div></div>');
    var fadeMessage={
        fadeMessageContainer:$('.fade-message-container'),
        messageContent: $('.fade-message-content'),
        display:function (text,time){
            fadeMessage.messageContent.text(text);
            fadeMessage.fadeMessageContainer.addClass('displayed');
            setTimeout(function(){
                fadeMessage.fadeMessageContainer.removeClass('displayed');
            },time?time:5000);
        }
    };
    global.fadeMessage=fadeMessage.display;

})(window,jQuery);

//////////-----------------------confirm message---------------------------
(function(global,$) {
    $('body').append('<div class="confirm-message-container"><div class="confirm-message-content"><span></span><ul><li><button class="si-button k-button">Si</button></li><li><button class="no-button k-button">No</button></li></ul></div></div>')

    var confirmMessage={
        confirmMessageContainer:$('.confirm-message-container'),
        confirmMessageContent:$('.confirm-message-content'),
        si:function(){},
        no:function(){},
        init:function (){
            confirmMessage.confirmMessageContent.find('.si-button').click(function(){
                confirmMessage.confirmMessageContainer.removeClass('displayed');
                confirmMessage.si();
            });
            confirmMessage.confirmMessageContent.find('.no-button').click(function(){
                confirmMessage.confirmMessageContainer.removeClass('displayed');
                confirmMessage.no();
            });
        },
        display: function(question,yesCallback,noCallback){
            confirmMessage.confirmMessageContent.find('span').text(question);
            confirmMessage.confirmMessageContainer.addClass('displayed');

            confirmMessage.si=function(){};
            confirmMessage.no=function(){};

            if(typeof yesCallback === 'function') confirmMessage.si=yesCallback;
            if(typeof noCallback === 'function') confirmMessage.no=noCallback;
        }
    };
    confirmMessage.init();
    global.confirmMessage=confirmMessage.display;
})(window,jQuery);
//////////-----------------------confirm data message---------------------------
(function(global,$) {
    $('body').append('<div class="confirm-data-message-container">' +
        '<div class="confirm-data-message-content"><p></p>' +
        '<textarea class="k-textbox"></textarea><span class="k-widget k-tooltip k-tooltip-validation k-invalid-msg hidden fadein" id="confirmDataMessageValidator"><span class="k-icon k-warning"> </span> El texto es requerido</span>' +
        '<ul><li><button class="si-button k-button">Si</button></li><li><button class="no-button k-button">No</button></li></ul>' +
        '</div></div>');

    var confirmDataMessage={
        confirmDataMessageContainer:$('.confirm-data-message-container'),
        confirmDataMessageContent:$('.confirm-data-message-content'),
        confirmDataMessageText:$('.confirm-data-message-content textarea'),
        confirmDataMessageValidation:$('.confirm-data-message-content #confirmDataMessageValidator'),
        si:function(){},
        no:function(){},
        init:function (){
            confirmDataMessage.confirmDataMessageContent.find('.si-button').click(function(){
                confirmDataMessage.confirmDataMessageValidation.addClass('hidden');
                if(confirmDataMessage.confirmDataMessageText.val().trim() !=''){
                    confirmDataMessage.confirmDataMessageContainer.removeClass('displayed');
                    confirmDataMessage.si(confirmDataMessage.confirmDataMessageText.val());
                    confirmDataMessage.confirmDataMessageText.val('');
                }else{
                    confirmDataMessage.confirmDataMessageValidation.removeClass('hidden');
                }
            });
            confirmDataMessage.confirmDataMessageContent.find('.no-button').click(function(){
                confirmDataMessage.confirmDataMessageContainer.removeClass('displayed');
                confirmDataMessage.no();
            });
        },
        display: function(question,yesCallback,noCallback){
            confirmDataMessage.confirmDataMessageContent.find('p').text(question);
            confirmDataMessage.confirmDataMessageContainer.addClass('displayed');

            confirmDataMessage.si=function(){};
            confirmDataMessage.no=function(){};

            if(typeof yesCallback === 'function') confirmDataMessage.si=yesCallback;
            if(typeof noCallback === 'function') confirmDataMessage.no=noCallback;
        }
    };
    confirmDataMessage.init();
    global.confirmDataMessage=confirmDataMessage.display;
})(window,jQuery);



////////------------------setting a slider------------------------------
(function ( $ ) {
    var object ={
      $container:{},
      $element:{},
      $items:[],
      current:0,
      length:0,
      width:0
    };
    var methods = {
        init : function(options) {
            object.$element = this,
            object.$items = object.$element.find('li'),
            object.length = object.$items.length,
            object.current = 0;

            methods._wrapElement();
            methods._setWidth();

            if(options && options.index){
                methods.goToItem(options.index)
            }

            //responsivo
            $( window ).resize(function() {
                methods._setWidth();
            });

        },
        _setWidth:function (){
            object.$container.css('width','auto');
            object.$element.css('width','auto');

            object.width = object.$element.outerWidth();

            object.$element.css('width', (object.$items.length * object.width) + 'px');
            $.each(object.$items,function(index,element){
                $(element).css('width',object.width);
            });
            object.$container.width(object.width);
        },
        _wrapElement:function(){
            object.$element.wrap('<div class="sancion-slider-wrapper"></div>');
            object.$container = $('.sancion-slider-wrapper');
        },
        next:function(){
            methods.goToItem(object.current+1);
        },
        prev:function(){
            methods.goToItem(object.current-1);
        },
        goToItem:function(i){
            if(object.current==i || 0 > i || i>=object.length) return;
            object.current=i;
            object.$element.css({
                transform:'translateX('+(i * - object.width)+'px)'
            })
        }
    };

    $.fn.renzoSlider = function(methodOrOptions) {
        if ( methods[methodOrOptions] ) {
            return methods[ methodOrOptions ].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof methodOrOptions === 'object' || ! methodOrOptions ) {
            // Default to "init"
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Method ' +  methodOrOptions + ' does not exist on jQuery.tooltip' );
        }
        return this;
    };
}( jQuery ));

function alerta()
    {
    var mensaje;
    var opcion = confirm("Clicka en Aceptar o Cancelar");
    if (opcion == true) {
        mensaje = "Has clickado OK";
	} else {
	    mensaje = "Has clickado Cancelar";
	}
	document.getElementById("ejemplo").innerHTML = mensaje;
}
////------------------eliminar ddjj -----------------------------
function eliminarDdjj(id_ddjj){
    confirmDataMessage("¿Esta seguro que quiere dar de baja la Declaración Jurada de Origen? Ingrese la justificación.", function (text) {
        $("#declaracionesjuradas").addClass('loading-block');
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: {
                opcion: 'admDeclaracionJurada',
                tarea: 'eliminarDeclaracion',
                id_ddjj: id_ddjj,
                justificacion: text
            },
            success: function (data) {
                var data = JSON.parse(data);
                if (!+data.status) fadeMessage('ocurrio un error', data.message);
                else {
                    remover(tabStrip.select());
                    cerraractualizartab('Declaración Jurada', 'admDeclaracionJurada', 'declaracionesJuradas');
                    fadeMessage('Se elimino la declaración Jurada Exitosamente.');
                }
                $("#declaracionesjuradas").removeClass('loading-block');
            }
        });
    });
}

function guardarCorreoVerificacion() {
    $.ajax({
        type: 'post',
        url: 'index.php',
        data:{
            opcion:'admVerificaciones',
            tarea:'guardarCorreo',
            correo:$('#correoverificaciones').val()
        },
        success: function(data) {
            var data = JSON.parse(data);
            if(!+data.status) fadeMessage('ocurrio un error',data.message);
            else{
                fadeMessage('Se guardo el Correo al que se enviaran notificaciones cuando se cree una verificación.');
            }
        }
    })
}
