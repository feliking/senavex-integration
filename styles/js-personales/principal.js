/* 
 * autor: Renzo Calla
 */

//para remplazar caracteres
kendo.culture("es-BO");
/* 
 * autor: Renzo Calla
 */
//para remplazar caracteres
//***********************firmadigital*******************************/
//esta variaple va a ser general para firmas pin*/
    var pin=0;
    var id_transaccion_pin=0;
    var swfirma=0;//esto es par el sw dentro de  la firma
/*****************************************************************************/    
    
String.prototype.replaceAt=function(viejo,nuevo) {// para las opcionetes
    
    st=this;
    x=this.charAt(viejo);
    st=this.substr(0,viejo)+this.substr(viejo+1,this.length);
    st=st.substr(0,nuevo)+x+st.substr(nuevo,this.length);
    //st=st.slice(1)
    return st;
}

function cambiar(esconder,mostrar)
{
    if(typeof  esconder !== 'string') {
        $.each(esconder, function( index, value ) {
            document.getElementById(value).style.display = "none";
        });
    } else {
        document.getElementById(esconder).style.display = "none";
    }
    if(typeof  mostrar !== 'string') {
        $.each(mostrar, function( index, value ) {
            document.getElementById(value).style.display = "inline";
        });
    } else {
        document.getElementById(mostrar).style.display = "inline";
    }
}
function ocultar(ocul)
{
    if(document.getElementById(ocul))
    {
        document.getElementById(ocul).style.display = "none";
    }
    
}
function mostrar(most)
{
    if(document.getElementById(most))
    {
        document.getElementById(most).style.display = "inline";  
    }
}
/*////estas son las gunciones para el tab*************************/
/*
FUnciones para los tab
 */
function cleanDDJJ(){
    $('#unidadmedida-list').next().remove();
    $('#unidadmedida-list').remove();
    $('#combo_fabricas').remove();
    $("#fabricas").parents('.k-window').remove();
    $("#combo_fabricas_listbox").parents('.k-animation-container').remove();
    $("#combo_fabricas_listbox").parents('.k-list-container').remove();

    //console.log('remover regional combo',$('#regionalCombo-list'));
    $('#regionalCombo-list').remove();
    //console.log('Lista de avenidas',$('#ed_tc_-list'));
    $('#ed_tc_-list').remove();
    //console.log('lista de direccion',$('#ed_td_-list'));
    $('#ed_td_-list').remove();
    //console.log('eliminar barrio',$('#ed_tz_-list'));
    $('#ed_tz_-list').remove();
    //console.log('eliminar municipio',$('#ed_municipio_-list'));
    $('#ed_municipio_-list').remove();
    //console.log('eliminar sdfsdf',$('#ed_dpto_-list'));
    $('#ed_dpto_-list').remove();
    //console.log($("#criterio_origen-list"),'to be removed');
    $("#criterio_origen-list").remove();
    //console.log($('.autocomplete-suggestions'));
    $('.autocomplete-suggestions').remove();
    $('.dz-hidden-input').remove();
}
function cleanRemoveDDJJ() {
    $('#criterio_origen-list').parent('.k-animation-container').remove();
    $('#criterio_origen-list').remove();

}
function cleanReasignarDDJJ() {
    $('#r_fechaVigencia_dateview').parent('.k-animation-container').remove();
}
//esto es la variable de tabstrip
function remover(tab)
{
    //alert( tab.text())

    otherTab = tab.next();
    otherTab = otherTab.length ? otherTab : tab.prev();
    tabStrip.remove(tab);
    if(tab.hasClass("k-state-active"))
    {
        tabStrip.select(otherTab);
    }

}
function anadir(titulo,opcion,tarea)
{
    if(titulo=="Nueva DDJJ" || titulo=="Corregir DDJJ") cleanDDJJ();
    if(titulo=="Revisar DD.JJ.") cleanRemoveDDJJ();
    if(titulo.startsWith('Reasignar')) cleanReasignarDDJJ();
    var sw=0;
    long=tabStrip.tabGroup.children("li").length - 1;
    for (var i = 1; i <= long; i++)
    {
        tab=tabStrip.tabGroup.children("li").eq(i);
        if(tab.text().trim()==titulo)
        {
               tabStrip.select(tab);
               sw=1;
               break;
        }
    }
    if (sw == 0) {
        tabStrip.append({
            text: titulo+"  <img src='styles/img/cerrar.png' onclick='remover($(this).closest(\"li\"))'>",
            encoded: false,
            contentUrl: "index.php?opcion="+opcion+"&tarea="+tarea+""
           // contentUrl: "http://172.21.1.104/sico/index.php?opcion="+opcion+"&tarea="+tarea+""
        });
        tabStrip.select((tabStrip.tabGroup.children("li").length - 1));
    }
}
function anadir2(titulo,opcion,tarea)
{
    var sw=0;
    long=tabStrip.tabGroup.children("li").length - 1;
    for (var i = 1; i <= long; i++)
    {
        tab=tabStrip.tabGroup.children("li").eq(i);
        if(tab.text().trim()==titulo)
        {
               tabStrip.select(tab);
               sw=1;
               break;
        }
    }
    if (sw == 0) {
        tabStrip.append({
            text: titulo+" ",
            encoded: false,
            contentUrl: "index.php?opcion="+opcion+"&tarea="+tarea+""
           // contentUrl: "http://172.21.1.104/sico/index.php?opcion="+opcion+"&tarea="+tarea+""
        });
        tabStrip.select((tabStrip.tabGroup.children("li").length - 1));
    }
}
function verificarsiexiste(titulo)
{
    var sw=false;
    long=tabStrip.tabGroup.children("li").length - 1;
    for (var i = 1; i <= long; i++)
    {
        tab=tabStrip.tabGroup.children("li").eq(i);
        if(tab.text().trim()==titulo)
        {
            sw=true;
        }
    }
    return sw;
}
function cerraractualizartab(titulo,controlador,tarea)
{
    long=tabStrip.tabGroup.children("li").length - 1;
    tabStrip.remove(tabStrip.select());
    for (var i = 1; i <= long; i++)
    {
        tab=tabStrip.tabGroup.children("li").eq(i);
        if(tab.text().trim()==titulo)
        {
            tabStrip.remove(tab);
            break;
        }
    }
    anadir(titulo,controlador,tarea);
}
function cerrarDemas(prefijo,except)
{
    long=tabStrip.tabGroup.children("li").length - 1;
    for (var i = 1; i <= long; i++)
    {
        tab=tabStrip.tabGroup.children("li").eq(i);
        if(tab.text().trim()!=except && tab.text().trim().startsWith(prefijo))
        {
            tabStrip.remove(tab);
            break;
        }
    }
}
function cerraractualizartab2(titulo,controlador,tarea)
{
            long=tabStrip.tabGroup.children("li").length - 1;
            tabStrip.remove(tabStrip.select());
            for (var i = 1; i <= long; i++) 
            {
                tab=tabStrip.tabGroup.children("li").eq(i);                
                if(tab.text().trim()==titulo)
                {
                    tabStrip.remove(tab);
                    break;
                }                
            }
            anadir(titulo,controlador,tarea);
        }
// esto es para las pins tracsanccionales
function generarPin(id_empresa,id_persona,id_evento)
{
    $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=generarPin&id_empresa='+id_empresa+'&id_persona='+id_persona+'&id_evento='+id_evento+'',
                success: function (data) {
                   res=data.split(":");
                   pin=res[0];
                   id_transaccion_pin=res[1];                   
                   $("#pinvista").html("<span style='color:red'>"+res[0]+"</span>");                   
                 }
                });
    
}
function generarPinCorreo(id_empresa,id_persona,id_evento)
{
    $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=generarPinCorreo&id_empresa='+id_empresa+'&id_persona='+id_persona+'&id_evento='+id_evento+'',
                success: function (data) {
                   res=data.split(":");
                   pin=res[0];
                   id_transaccion_pin=res[1];   
                   //$("#pinvista").html("<span style='color:red'>"+res[0]+"</span>");                  
                 }
                });
    
}
function borrarPin(nombre)
{
    $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=borrarPin&id_transaccion_pin='+id_transaccion_pin,
                success: function () {                
                 }
                });
    pin=0;
    id_transaccion_pin=0;                   
    $("#pinvista").html("Hola, "+nombre);    
}
function firmarPin(titulo,opcion,tarea,nombre,id_servicio_exportador)
{
    $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=firmarPin&id_transaccion_pin='+id_transaccion_pin+'&id_servicio_exportador='+id_servicio_exportador,
                success: function (data) {
                    if(data==1)
                    {   
                    cerraractualizartab(titulo,opcion,tarea);
                    }
                    else
                    {
                        alert('Verifique su conexion a internet,actualice su sistema eh intente nuevamente');
                    }
                 }
            });
    $("#pinvista").html("Hola, "+nombre);
}

/************************pra las imagenes**************************************/
function imgendefectopersona(img)
{
        img.src='styles/img/usuario.png';
}
function imgendefectoempresa(img)
{
        img.src='styles/img/usuario_empresas.png';
}
function imgendefectopersonaconf(img)
{
        img.src='styles/img/usuario_subirimagen.png';
}
function imgendefectoempresaconf(img)
{
        img.src='styles/img/empresa_subirimagen.png';
}
/*kendo.messages("es-ES");*/

//******************parap las fechas******************************/
function isDate(txtDate)
{
  var currVal = txtDate;
  if(currVal == '')
    return false;
  //Declare Regex 
  var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
  var dtArray = currVal.match(rxDatePattern); // is format OK?
  if (dtArray == null)
     return false;
  //Checks for mm/dd/yyyy format. 
    dtDay = dtArray[1];
    dtMonth= dtArray[3];
    dtYear = dtArray[5]; 
  if (dtMonth < 1 || dtMonth > 12)
      return false;
  else if (dtDay < 1 || dtDay> 31)
      return false;
  else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31)
      return false;
  else if (dtMonth == 2)
  {
     var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
     if (dtDay> 29 || (dtDay ==29 && !isleap))
          return false;
  }
  return true;
}
//--------------para el key de solo numeros-------------
function validateQty(event) {
    var key = window.event ? event.keyCode : event.which;
if (event.keyCode == 8 || event.keyCode == 46
 || event.keyCode == 37 || event.keyCode == 39) {
    return true;
}
else if ( key < 48 || key > 57 ) {
    return false;
}
else return true;
};

$(document).on("keypress", 'input[type="text"],textarea', function(e) {
    if($(e.target).hasClass('skip-restriccion') ||
        $(e.target).parent().hasClass('k-edit-cell')
    ) return  true;
	if($(e.target).hasClass('no-restriccion')){
        var regex = new RegExp("^[a-zA-Z0-9_, \b@.áéíóúÁÉÍÓÚ%()*+&/;:'/ñÑ-]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    } else {
        var regex = new RegExp("^[a-zA-Z0-9_, \b@.áéíóúÁÉÍÓÚ/ñÑ-]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    }
    if(e.keyCode == 9) return true;
    if (regex.test(str)) return true;
    e.preventDefault();
    return false;
});


///function to validate row kendogrid
function validateKendogrid(kendo_grid) {
    var cells = $(kendo_grid.tbody).find("td");
    if(cells.length>0)
    {
        cells.each(function (e) {
            $(this).click();
        });
    }
    return false;
}
// it should send a $(#grid).data('KendoGrid') type
function addKendoGridRow(GridData){
    validateKendogrid(GridData);
    GridData.addRow();
}
// it should send a $(#grid).data('KendoGrid') type
function deleteKendoGridRow(GridData){
    var currentDataItem = GridData.dataItem(GridData.select());
    if(!!currentDataItem) {
        var dataRow = GridData.dataSource.getByUid(currentDataItem.uid);
    }
    else{
        var dataItem = GridData.dataSource.get(0);
        var dataRow =  GridData.dataSource.getByUid(dataItem.uid);
    }
    GridData.dataSource.remove(dataRow);
}

function validatePass(e) {
    var regex = new RegExp("^[a-zA-Z0-9_, \b]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str))  return true;
}
// it should send a $(#grid).data('KendoGrid') type
function refreshingTotal(GridData,field){
    var total=0;
    var GridDataSource = GridData.dataSource;
    var numrows = GridDataSource.total();
    var values = GridDataSource.data();
    for (var i = 0; i < numrows; i++) {
        var val=values[i][field];
        if(values[i][field]=='')val=0;
        total+= parseFloat(val);
    }
    total=total || 0;
    return total;
}
function checkGrid(GridData)
{
    if(GridData.dataSource.total()==0) return false;
    validateKendogrid(GridData);
    var body = $(GridData.tbody);
    return !(body.find('.k-tooltip-validation:visible').length);
}

function  generateTableHtml(GridData,valor_internacional) {
    var columns=GridData.columns;
    var head=$('<thead></thead>');
    var tr=$('<tr></tr>')
    $.each(columns,function (index,column) {
        var ctitle = column.title;
        // if(column.field=='sobrevalor') ctitle+=' '+valor_internacional;
        tr.append('<th>' + ctitle + '</th>');
    });
    head.append(tr);

    var GridDataSource = GridData.dataSource;
    var numrows = GridDataSource.total();
    var values = GridDataSource.data();
    var body=$('<tbody></tbody>');
    for (var i = 0; i < numrows; i++) {
        var tr=$('<tr></tr>')
        $.each(columns,function (index,column) {
            var text='';
            if(column.field=='sobrevalor') text=values[i][column.field]+'%';
            else if(column.field=='unidad_medida') text=getDescripcionUnidadMedida(+values[i][column.field]);
            else if(column.field=='pais') text=getPaisNombre(+values[i][column.field]);
            else if(column.field=='acuerdo') text=getAcuerdoSigla(+values[i][column.field]);
            else text = values[i][column.field];
            tr.append('<td>'+text+'</td>');
        });
        body.append(tr);
    }

    var tr = $('<tr></tr>');
    var td='';
    for (var i = 0; i < (columns.length-3); i++) {
        td+='<td></td>';
    }
    var footertotal='<td class="ddjj-table-total-label">Total:</td><td class="ddjj-table-total view-total-valor"></td><td class="ddjj-table-total view-total-sobrevalor"></td>';
    var footer=$('<tfoot><tr>'+td+footertotal+'</tr></tfoot>');

    return{
        head:head,
        body:body,
        footer:footer
    };
}

function getTableData(GridData) {
    var columns=GridData.columns;
    var data = GridData.dataSource;
    var numrows = data.total();
    var values = data.data();

    var array_data = [];
    for (var i = 0; i < numrows; i++) {
        var row={}
        $.each(columns,function (index,column) {
            if(values[i][column.field]){
                row[column.field]=values[i][column.field];
            }
        });
        array_data.push(row);
    }
    return JSON.stringify(array_data);
}
function getPercentage(total_value,part_value){
    total_value=total_value||0;
    part_value=part_value||0;
    if(part_value==0 || total_value==0) return 0;
    else return kendo.toString(part_value*100/total_value,"0.00");
}
function updateSobrevalor(GridData,total){
    var rows=GridData.dataSource.data();
    if(rows.length>0)
    {
        $.each( rows, function( key, value ) {
            var dataitem=GridData.dataSource.getByUid(rows[key].uid);
            dataitem.set('sobrevalor',getPercentage(+total,rows[key].valor));
        });
    }
    GridData.refresh();
}
//funcion para insertar texto dinamico en un input o texto
function insertAtCaret(areaId, text) {
    var txtarea = document.getElementById(areaId);
    if (!txtarea) { return; }

    var scrollPos = txtarea.scrollTop;
    var strPos = 0;
    var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
        "ff" : (document.selection ? "ie" : false ) );
    if (br == "ie") {
        txtarea.focus();
        var range = document.selection.createRange();
        range.moveStart ('character', -txtarea.value.length);
        strPos = range.text.length;
    } else if (br == "ff") {
        strPos = txtarea.selectionStart;
    }

    var front = (txtarea.value).substring(0, strPos);
    var back = (txtarea.value).substring(strPos, txtarea.value.length);
    txtarea.value = front + text + back;
    strPos = strPos + text.length;
    if (br == "ie") {
        txtarea.focus();
        var ieRange = document.selection.createRange();
        ieRange.moveStart ('character', -txtarea.value.length);
        ieRange.moveStart ('character', strPos);
        ieRange.moveEnd ('character', 0);
        ieRange.select();
    } else if (br == "ff") {
        txtarea.selectionStart = strPos;
        txtarea.selectionEnd = strPos;
        txtarea.focus();
    }

    txtarea.scrollTop = scrollPos;
}
///variable para obtener contenido dinamicamente
function getContenido(opcion,tarea,response){
    $.ajax({
        type: 'post',
        url: 'index.php',
        data: 'opcion='+opcion+'&tarea='+tarea,
        success: function(data) {
            response(data);
        }
    });
}
//-----metodo generico para instanciar popups-----------
function instanciarPopups(id,width,height){
    var width = width || '700px',
        height = height || '600px',
        popup = $("#"+id);
    if (!popup.data("kendoWindow")) {
        popup.kendoWindow({
            draggable: true,
            height: width,
            width: height,
            resizable: true,
            actions: [ "Minimize", "Maximize", "Close"],
            animation: {
                close: {
                    effects: "fade:out",
                    duration: 1000
                },
                open: {
                    effects: "fade:in",
                    duration: 1000
                }
            }
        }).data("kendoWindow");
        popup.data("kendoWindow").open();
        popup.data("kendoWindow").center();}
    else
    {
        popup.data("kendoWindow").open();
        popup.data("kendoWindow").center();
    }
}
//--------para resolver el problema de los combos----------
function solveDropdowns(e){
    var $item =$('#'+e.sender.element[0].id+'-list');
    if(!$item.length){
        $item = $(e.sender.list[0]);
    }
    if(!$item.length) return;
    setTimeout(function () {
        if($item.length && $item.css('display')=='none'){
            $item.css('display','block');
        }
        var $container = $item.closest('.k-animation-container');
        if($container.length && $container.css('display')=='none'){
            $container.css({
                "display":"block",
                "overflow":"visible",
                "transform":"initial"
            });
        }
    },1000);
}
function solveCalendar(e){
    var $item =$('#'+e.sender.element[0].id+'_dateview');
    setTimeout(function () {
        if($item.length && $item.css('display')=='none'){
            $item.css('display','block');
            $item.css('transform','translateY(0)');
        }
        var $container = $item.closest('.k-animation-container');
        if($container.length && $container.css('display')=='none'){
            $container.css({
                "display":"block",
            });
        }
    },1000);
}
function removeSugegstions(e){
    $(e.sender.input[0]).attr("autocomplete","new-password");
}
function tabOnKendoGrid(GridTable){
    GridTable.table.on("keydown",function(e){
        if (e.keyCode === kendo.keys.TAB && $($(e.target).closest('.k-edit-cell'))[0]) {
            var currentCell = GridTable.table.find('.k-edit-cell')
            var index = currentCell.index();
            var parentUid = currentCell.parent().attr('data-uid');
            setTimeout(function(){
                var td = $('tr[data-uid="'+parentUid+'"]').children('td').eq(index+1);
                if(td.length){
                    td.click();
                }
            },150);
        }
    });

}