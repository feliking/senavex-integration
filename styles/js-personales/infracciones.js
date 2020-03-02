var infracciones={
    anadirInfraccion:function(id){
        var variables = 'formInfraccion' + (id ? '&id_infraccion=' + id : ''),
            title = id ? 'Infracción':'Nueva Infracción';

        cerrarDemas('Infracción','Infracciones');
        cerrarDemas('Nueva Infracción');
        anadir(title,'admInfraccion',variables);
    },
    guardarInfraccion:function(){
        if (infracciones.elementos.form.validate()) {
            cambiar('infraccionForm','infraccion_loading_ddjj');
            var data='opcion=admInfraccion&tarea=guardarInfraccion&'+ $('#infraccionForm').serialize();
            $.ajax({
                type: 'post',
                url: 'index.php',
                data:data,
                success: function (data) {
                    var data = JSON.parse(data);
                    if(+data.status) {
                        remover(tabStrip.select());
                        cerraractualizartab('Infracciones','admInfraccion','infracciones');
                    }
                }
            });
        }
    },
    verInfraccion:function(id){
        cerrarDemas('Infracción');
        anadir('Infracción','admInfraccion','verInfraccion&id_infraccion='+id);
    },
    eliminarInfraccion:function(id){
        var data='opcion=admInfraccion&tarea=eliminarInfraccion&id_infraccion='+ id;
        $.ajax({
            type: 'post',
            url: 'index.php',
            data:data,
            success: function (data) {
                var data = JSON.parse(data);
                if(+data.status) {
                    fadeMessage(data.message);
                    cerraractualizartab('Infracciones','admInfraccion','infracciones');
                }
            }
        });
    },
    listarInfracciones:function(){
        //anadimos el popup al dom si esque no se lo anadio antes
        if(!$('#popup_infracciones').length){
            $('body').append('<div id="popup_infracciones" style="display: none"><div>');
            $.ajax({
                type: 'post',
                url: 'index.php',
                data:{opcion:'admInfraccion',tarea:'listarInfracciones'},
                success: function (data) { $('#popup_infracciones').html(data);}
            });
        }
        //abrimos o instancioamos el popup..
        instanciarPopups('popup_infracciones','800px','900px');
    },
    elementos:{
        form:{},
        grid:{},
        formCodigo:{},
        formMulta:{}
    }
};

function setObjetos(objeto,contenedor){
    // se envia la variable contenedor, no el valor de la variable... como argumento
    // este metodo asigna todos los elemento de  un objecto a jquery objects
    var wrapper,elementId;
    for (var property in objeto) {
        if (objeto.hasOwnProperty(property)) {
            elementId = objeto[property] instanceof jQuery ? objeto[property].attr('id'):objeto[property];
            wrapper = elementId===contenedor?"":"#"+contenedor+" ";
            objeto[property] = $(wrapper+"#"+ elementId);
        }
    }

}

//iniciaaciones
function iniciarInfracciones(){
    infracciones.elementos.grid= $("#infracciones",'#contenedorInfracciones');
    infracciones.elementos.grid.kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "index.php?opcion=admInfraccion&tarea=infraccionesJson",
                    dataType: "json"
                }
            },
            pageSize: 10
        },
        sortable: true,
        scrollable: false,
        selectable: "simple",
        reorderable: true,
        resizable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {field: "codigo", title: "Codigo"},
            {field: "descripcion", title: "Descripción de la Infracción"},
            {field: "multa", title: "Multa UFV\'s",filterable:false},
            {field: "sancion", title: "Sanción",filterable:false},
            {field: 'Opciones', width:240,filterable:false,
                template: '<div onclick="infracciones.verInfraccion(#= id_inf_infraccion #)" class="k-button link">Ver</div><div onclick="infracciones.anadirInfraccion(#= id_inf_infraccion #)" class="k-button link">Editar</div><div onclick="infracciones.eliminarInfraccion(#= id_inf_infraccion #)" class="k-button link">Eliminar</div>'},
        ]
    });
}
function infraccionesForm(){
    var elem = infracciones.elementos;
    elem.formCodigo = $('#infraccionCodigo','#infraccionForm');
    elem.formMulta = $('#infraccionMulta','#infraccionForm');

    elem.formCodigo.kendoNumericTextBox({format: "#",decimals: 0,restrictDecimals: true});
    elem.formMulta.kendoNumericTextBox({format: "#",decimals: 0});

    elem.form = $("#infraccionForm").kendoValidator({
        rules:{
            codigo: function(input) {
                if(typeof  input.data('codigo') !== 'undefined' )
                {
                    return Boolean(elem.formCodigo.data('kendoNumericTextBox').value());
                }
                return true;
            },
            multa: function(input){
                if(typeof  input.data('multa') !== 'undefined' )
                {
                    return Boolean(elem.formMulta.data('kendoNumericTextBox').value());
                }
                return true;
            }
        },
        messages:{
            codigo:'Por favor ingrese codigo de la infracción',
            multa:'Por favor ingrese la multa.'
        }
    }).data("kendoValidator");
}

var sanciones = {
    ruex:0,
    e:{ //objetos jquery
        form:'sancionForm',
        nit:'nit_sancion',
        ruex:'ruex',
        rLegal:'representante_legal',
        tipoInfraccion:'tipo_infraccion',
        fechaEmision:'fecha_emision',
        razonSocial:'razon_social',
        direccion:'direccion_fiscal',
        motivoVulnerable:'motivo_vulnerable'
    },
    l:{
        grid:'sanciones',
        menuSanciones:'menusanciones'
    },
    v:{
        slider:'sancionSlider',
        ulFlujo:'sancionesFlujo'
    },
    iniciarSanciones: function(){
        var $this = this,estado='';
        setObjetos(this.l, 'contenedorSanciones');
        $this.esUnidadLegal = $('#esUnidadLegal').length;




        // seteamos el combo box
        if($this.esUnidadLegal) {
            // obtenemos el index
            var index = (typeof(Storage) !== "undefined") && localStorage.menuSanciones ?+localStorage.menuSanciones:0;
            // create DropDownList from input HTML element
            $this.setEstadoSancion(function(){
                $this.l.menuSanciones.kendoDropDownList({
                    dataTextField: "descripcion",
                    dataValueField: "id_estado",
                    dataSource: $this.estadoSanciones,
                    index: index,
                    change:function(){
                        $this.actualizaGrillaSanciones(this.value());
                    }
                });
            });
        }

        //  seteamos el kendo grid
        $this.l.grid.kendoGrid({
            sortable: true,
            scrollable: false,
            selectable: "simple",
            reorderable: true,
            resizable: true,
            pageable: {
                refresh: true,
                pageSizes: true,
                buttonCount: 5
            },
            columns: [
                {field: "ruex", title: "RUEX"},
                {field: "razon_social", title: "Razón Social"},
                {field: "tipo_sancion", title: "Tipo Infracción",filterable:false},
                {field: "cite", title: "Informe Técnico (CITE)",filterable:false},
                {field: 'Opciones', width:240,filterable:false,
                    template: template(this)
                }
            ]
        });
        //seteamos el data de la grilla
        $this.actualizaGrillaSanciones();

        //funciton para setear las opciones de la grilla
        function template(){
            var template='';
            template += !$this.esUnidadLegal?'#if( estado ==1){# <div onclick="sanciones.anadirSancion(#= id_inf_sancion #)" class="k-button link">Editar</div> #}#':'';
            template += '<div onclick="sanciones.verSancion(#= id_inf_sancion #)" class="k-button link">Ver</div>';
            template += !$this.esUnidadLegal?'#if( estado ==1){# <div onclick="sanciones.eliminarSancion(#= id_inf_sancion #)" class="k-button link">Eliminar</div>#}#':'';
            return template;
        }

    },
    anadirSancion: function (id) {
        var variables = 'formSancion' + (id ? '&id_sancion=' + id : ''),
            title = id ? 'Edición Infracción':'Registro Infracción';
        cerrarDemas('Edición Infracción','Registro Infracciones');
        cerrarDemas('Registro Infracción');
        anadir(title,'admSancion',variables);
    },
    sancionesForm:function(){
        //seteamod objetos para convertirlos en jquery objectos
        var e = this.e;
        setObjetos(e, 'sancionForm');

        ///seteamos el acutomplete de Ruex
        e.ruex.autoComplete({
            minChars: 4,
            source: function(term, suggest){
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data:{
                        opcion:'admEmpresa',
                        tarea:'searchEmpresa',
                        term:term.trim()
                    },
                    success: function(data) {
                        data=JSON.parse(data);
                        var suggestions = [];
                        for (i=0;i<data.length;i++)
                            suggestions.push(data[i].ruex)
                        suggest(suggestions);
                    }
                });

            },
            onSelect:function(event, term, item) {
               sanciones.getEmpresaRuex(term);
            }
        }).change(function() {
            sanciones.getEmpresaRuex(+e.ruex.val());
        });

        var tipoInfraccion = e.form.find('#edicion_tipo_sancion').length?e.form.find('#edicion_tipo_sancion').val().split(','):[];
        // seteamos el multiselec
        e.tipoInfraccion.kendoMultiSelect({
            dataTextField: 'descripcion',
            dataValueField: 'id_inf_infraccion',
            value:tipoInfraccion,
            dataSource: {
                transport: {
                    read: {
                        dataType: "json",
                            url: 'index.php?opcion=admInfraccion&tarea=infraccionesJson',
                            cache: false
                    }
                }
            }
        });
        // seteamos el datepicker
        e.fechaEmision.kendoDatePicker({
            value: $('#edicion_emision_informe').length?$('#edicion_emision_informe').val(): new Date()
        });
        // seteamos el validador
        e.form.kendoValidator({
            rules:{
                tipo_infraccion: function(input) {
                    if(typeof  input.data('tipo_infraccion') !== 'undefined' )
                    {
                        return e.tipoInfraccion.data('kendoMultiSelect').value().length;
                    }
                    return true;
                },
                fecha_emision: function(input){
                    if(typeof  input.data('fecha_emision') !== 'undefined' )
                    {
                        return kendo.toString(sanciones.e.fechaEmision.data('kendoDatePicker').value(),'d');
                    }
                    return true;
                }
            },
            messages:{
                tipo_infraccion:'Por favor ingrese codigo de la infracción',
                fecha_emision:'Por favor ingrese la fecha de registro del informe.'
            }
        }).data("kendoValidator");

        //seteamos los radio buttons
        $('input:radio[name="vulnerable_acuerdo"]').change(function(){
            sanciones.radioVulnerableHide($(this));
        });
        sanciones.radioVulnerableHide($('input:checked[name="vulnerable_acuerdo"]'));
    },
    radioVulnerableHide:function($radio){
        //seteamod objetos para convertirlos en jquery objectos
        var e = this.e;
        if ($radio.is(':checked') && $radio.val() === "si") e.motivoVulnerable.show();
        else e.motivoVulnerable.hide();

    },
    getEmpresaRuex:function(ruex){
        var e = this.e;
        if(ruex===sanciones.ruex) {
            sanciones.ruex = ruex;
            return;
        }
        $.ajax({
            type: 'post',
            url: 'index.php',
            data:{
                opcion:'admEmpresa',
                tarea:'getEmpresaPorRuex',
                ruex:ruex
            },
            success: function(data) {
                data=JSON.parse(data);
                if(data.status==='success'){
                    e.razonSocial.val(data.razon_social);
                    e.nit.val(data.nit);
                    e.rLegal.val(data.representante_legal);
                    e.direccion.val(data.direccion);
                }
            }
        });
    },
    guardarSancion:function(){
        var form = this.e.form;
        if(form.data('kendoValidator').validate()){
            cambiar('sancionForm','sancion_loading_ddjj');
            var data = 'opcion=admSancion&tarea=guardarSancion&';
            data += form.serialize();
            data += '&tipo_infracciones='+sanciones.e.tipoInfraccion.data('kendoMultiSelect').value().join();
            data += '&fecha_emisionK='+kendo.toString(sanciones.e.fechaEmision.data('kendoDatePicker').value(),'yyyy-MM-dd');
            $.ajax({
                type: 'post',
                url: 'index.php',
                data:data,
                success: function (data) {
                    var data = JSON.parse(data);
                    if(+data.status) {
                        remover(tabStrip.select());
                        cerraractualizartab('Infracciones','admSancion','sanciones');
                    }
                }
            });
        }
    },
    eliminarSancion:function(id){
        var data='opcion=admSancion&tarea=eliminarSancion&id_sancion='+ id;
        $.ajax({
            type: 'post',
            url: 'index.php',
            data:data,
            success: function (data) {
                var data = JSON.parse(data);
                if(+data.status) {
                    fadeMessage(data.message);
                    cerraractualizartab('Infracciones','admSancion','sanciones');
                }
            }
        });
    },
    setEstadoSancion:function(callback){ //devuelve el estado de las sanciones
        var $this = this;
        if(!$this.estadoSanciones){
            $.ajax({
                type: 'post',
                url: 'index.php',
                data:{
                    opcion:'admSancion',
                    tarea:'estadoSanciones'
                },
                success: function (data) {
                    $this.estadoSanciones= JSON.parse(data);
                    $this.estadoSanciones.unshift({id_estado:0,descripcion:"Mostrar todos"});
                    callback();
                }
            });
        }
        else callback();
    },
    actualizaGrillaSanciones:function(id){
        if (!jQuery.contains(document, sanciones.l.grid[0])) return;

        if((typeof(Storage) !== "undefined")){
            id= !id && localStorage.menuSanciones?+localStorage.menuSanciones:id;
            localStorage.menuSanciones= +id;
        }

        id=id||0;
        var grid = sanciones.l.grid.data("kendoGrid"),
        estado= +id ?'&estado='+ id :'',
        data = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admSancion&tarea=sancionesJson"+estado,
                    dataType: "json"
                }
            },
            pageSize: 10
        });
        grid.setDataSource(data);
        grid.refresh();
    },
    verSancion:function(id){
        cerrarDemas('Infracción','');
        anadir('Infracción '+id,'admSancion','verSancion&id='+id);
    },
    iniciarSlider:function(){
        var v = this.v;
        setObjetos(v, 'sancion-wrapper');
        //ponemos set timeout por que necesitamos que el doom se renderice completamente

        v.slider.renzoSlider({index:+v.slider.attr('ultimo_estado')});
        //seteamos los eventos click del slider
        v.ulFlujo.find('.selectable').click(function(){
            v.slider.renzoSlider('goToItem',$(this).attr('item'));
        });
    }

}

var seguimiento = {
    seguimientoForm:function(id){
        var $fecha = $('#seguimientoForm' + id + ' #fecha_emision'),
            $fecha2 = $('#seguimientoForm' + id + ' #fecha_emision_dos'),
            $form = $('#seguimientoForm' + id);
        //set Fecha
        $fecha.kendoDatePicker({
            value: $('#seguimientoForm'+id+' #fecha_emision_hidden').length?$('#seguimientoForm'+id+' #fecha_emision_hidden').val(): new Date()
        });
        //set Fecha dos
        if($fecha2.length){
            $fecha2.kendoDatePicker({
                value: $('#seguimientoForm'+id+' #fecha_dos').length?$('#seguimientoForm'+id+' #fecha_dos').val(): new Date()
            });
        }
        //set Validator
        $form.kendoValidator({
            rules:{
                fecha_emision: function(input){
                    if(typeof  input.data('fecha_emision') !== 'undefined' )
                    {
                        return kendo.toString($fecha.data('kendoDatePicker').value(),'d');
                    }
                    return true;
                }
            },
            messages:{
                fecha_emision:'Por favor ingrese la fecha de emisión del informe.'
            }
        }).data("kendoValidator");


        if($('#seguimientoForm' + id + ' #monto_bs').length){
            $('#seguimientoForm' + id + ' #monto_bs').kendoNumericTextBox({ format:"n",
                min:0});
        }
        if($('#seguimientoForm' + id + ' #tipo_cambio').length) {
            $('#seguimientoForm' + id + ' #tipo_cambio').kendoNumericTextBox({
                format: "n",
                min: 0
            });
        }
    },
    guardarSequimiento:function(id){
        var $form = $('#seguimientoForm' + id);
        if($form.data('kendoValidator').validate()){
            $form.addClass('loading-block');
            var $fecha = $('#seguimientoForm' + id + ' #fecha_emision'),
                $fecha2 = $('#seguimientoForm' + id + ' #fecha_emision_dos');

            //cambiar('sancionForm','sancion_loading_ddjj');
            var data = 'opcion=admSancion&tarea=guardarSeguimiento&';
            data += $form.serialize();
            data += '&fecha_emision_informe='+kendo.toString($fecha.data('kendoDatePicker').value(),'yyyy-MM-dd');
            data += $fecha2.length?'&fecha_dos='+kendo.toString($fecha2.data('kendoDatePicker').value(),'yyyy-MM-dd'):'';
            $.ajax({
                type: 'post',
                url: 'index.php',
                data:data,
                success: function (data) {
                    $form.removeClass('loading-block');
                    var data = JSON.parse(data);
                    if(+data.status) {
                        sanciones.actualizaGrillaSanciones();
                        cerraractualizartab('Infracción '+data.id_sancion,'admSancion','verSancion&id='+data.id_sancion);
                        fadeMessage('La Información se guardo correctamente.');
                    }
                }
            });
        }
    },
    editarSequimiento:function(id,id_sancion,id_estado,traerFormulario){
        var $this=this,
            $liContainer = $('#sequimiento'+id);
        if(!$this['seguimientoContainer'+id]) $this['seguimientoContainer'+id]={};
        //almacenar el sequimineto en una variable
        if(!$this['seguimientoContainer'+id].vista){
            $this['seguimientoContainer'+id].vista=$liContainer.html();
        }

        //traer el formulario de sequimiento y ponerlo en el contenedor
        if(!$this['seguimientoContainer'+id].formulario){
            $liContainer.addClass('loading-block');
            $.ajax({
                type: 'post',
                url: 'index.php',
                data:{
                    opcion:'admSancion',
                    tarea:'getFormularioSeguimiento',
                    id_seguimiento:id,
                    id_sancion:id_sancion,
                    id_estado:id_estado
                },
                success: function (data) {
                    $this['seguimientoContainer'+id].formulario=data;
                    $liContainer.removeClass('loading-block').html(traerFormulario?$this['seguimientoContainer'+id].formulario:$this['seguimientoContainer'+id].vista);
                }
            });
        }

        $liContainer.html(traerFormulario?$this['seguimientoContainer'+id].formulario:$this['seguimientoContainer'+id].vista);

    },
    eliminarSequimiento:function(id_seguimiento,id_sancion){
        var $form = $('#seguimientoForm' + id_seguimiento);
        $.ajax({
            type: 'post',
            url: 'index.php',
            data:{
                opcion:'admSancion',
                tarea:'eliminarSeguimiento',
                id_seguimiento:id_seguimiento,
                id_sancion:id_sancion
            },
            success: function (data) {
                $form.removeClass('loading-block');
                var data = JSON.parse(data);
                if(+data.status) {
                    sanciones.actualizaGrillaSanciones();
                    cerraractualizartab('Infracción '+data.id_sancion,'admSancion','verSancion&id='+data.id_sancion);
                    fadeMessage('Se elimino el paso correctamente.');
                }
            }
        });
    }
}

var repSanciones = {
    e:{
      tabs:'botones-reporte',
      contenedor:'reporte-contenedor',
      filtroEstado:'reporteEstado',
      filtroAnio:'reporteAnio',
      filtroRegional:'reporteRegional'
    },
    anios:[],
    getAnios:function(){
        if(!this.anios.length){
            //isntancioar anio multiselect
            var currentYear = new Date().getFullYear(),
                startYear = 2015;

            while ( startYear <= currentYear ) {
                this.anios.push(currentYear--);
            }
        }
        return this.anios;
    },
    setRegionales:function(callback){
        var $this = this;
        if(!$this.regionales){
            $.ajax({
                type: 'post',
                url: 'index.php',
                data:{
                    opcion:'admRegional',
                    tarea:'listarRegionales_inf'
                },
                success: function (data) {
                  
                    $this.regionales= JSON.parse(data);
                    $this.regionales.unshift({id_regional:0,ciudad:"Mostrar todos"});
                    callback();
                }
            });
        }
        else callback();
    },
    iniciaReportes:function(){
        var e = repSanciones.e;
        setObjetos(e, 'sanciones-reporte-container');

        //instanciar filtro Estado multiselct
        var valorEstados = (typeof(Storage) !== "undefined") && localStorage.repSanEstados?
            localStorage.repSanEstados.split(','):[0];
        sanciones.setEstadoSancion(function(){
            e.filtroEstado.kendoMultiSelect({
                dataTextField: 'descripcion',
                dataValueField: 'id_estado',
                dataSource: sanciones.estadoSanciones,
                value:valorEstados,
                change:function(){repSanciones.getReporte();},
                dataBound: repSanciones.getReportesFiltrosReady
            });
        });

        //instancioamos filtro multiselect
        var valorAnios = (typeof(Storage) !== "undefined") && localStorage.repSanAnios?
            localStorage.repSanAnios.split(','): new Date().getFullYear();
        e.filtroAnio.kendoMultiSelect({
            dataSource: this.getAnios(),
            value:valorAnios,
            change:function(){repSanciones.getReporte();},
            dataBound: repSanciones.getReportesFiltrosReady
        });

        //instancioamos filtro regional
        var valorRegionales = (typeof(Storage) !== "undefined") && localStorage.repSanRegionales?
            localStorage.repSanRegionales.split(','):[0];
        this.setRegionales(function(){
            e.filtroRegional.kendoMultiSelect({
                dataTextField: 'ciudad',
                dataValueField: 'id_regional',
                dataSource: repSanciones.regionales,
                value:valorRegionales,
                change:function(){repSanciones.getReporte();},
                dataBound: repSanciones.getReportesFiltrosReady
            });
        });
    },
    getReportesFiltrosReady:function(){
        //llama a reportes solo si los filtros estan instanciados
        var e = repSanciones.e;
        if(typeof e.filtroEstado.data('kendoMultiSelect') !== 'undefined' &&
           typeof e.filtroAnio.data('kendoMultiSelect') !== 'undefined' &&
           typeof e.filtroRegional.data('kendoMultiSelect') !== 'undefined' ){
            repSanciones.getReporte();
        }
    },
    getReporte:function(id){
        var e = repSanciones.e;

        //obtenemos filtros
        var anios = e.filtroAnio.data('kendoMultiSelect').value().sort().join(),
            regionales = e.filtroRegional.data('kendoMultiSelect').value().join(),
            estados = e.filtroEstado.data('kendoMultiSelect').value().join();

            if(!anios.length) anios=this.anios.sort().join();

        //guardamos el estados y filtros en storage
        if(typeof(Storage) !== "undefined"){
            if(id) localStorage.reporteSanciones=id;
            else id=localStorage.reporteSanciones;
            localStorage.repSanAnios=anios;
            localStorage.repSanRegionales=regionales;
            localStorage.repSanEstados=estados;
        }
        //si no estuviera definido el id
        if(!id) id = 'general';

        //deshabilitar el botton cargado
        e.tabs.find('button').removeClass('k-state-disabled').removeAttr('disabled');
        e.tabs.find('#'+id).addClass('k-state-disabled').attr('disabled','disabled');

        //traemos el reporte
        e.contenedor.addClass('loading-block');
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: {
              opcion:'admSancionReporte',
              tarea:'getReporte',
              id:id,
              anios:anios ,
              regionales:regionales,
              estados:estados
            },
            success: function(data) {
                repSanciones.e.contenedor.removeClass('loading-block').html(data);
            }
        });
    },
    setReporteGeneral:function(){
        $('#sancionesReporteGeneral').on('click', '.accordion-table-toogle', function(){
            var $detalle = $('#'+$(this).attr('accordion')),
                heigth=$detalle.find('.accordion-table-content').outerHeight(true);

            if($detalle.hasClass('close')) $detalle.css('height',heigth).removeClass('close');
            else $detalle.removeAttr('style').addClass('close');
        });
    }
}
