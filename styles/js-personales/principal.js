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
/* window.onbeforeunload = function (e) {// para las opcionetes
    if(viejo!=-1)
    {   
        
            $.ajax({             
                type: 'post',
                url: 'index.php',
                data: 'opcion=funcionesGenerales&tarea=cambiaropciones&opciones_persona_c='+opciones_persona                                               
            });
    }
};*/
/*$('input[type="text"],textarea').keypress(function(e){
    alert('sd');
   var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});
*//*
$(document).keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){      
          //  alert('sdfidsy');
		var grid = $("#grid").data("kendoGrid");       
	} 
});*/
function cambiar(esconder,mostrar)
{
    document.getElementById(esconder).style.display = "none";
    document.getElementById(mostrar).style.display = "inline";
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
     
	if($(e.target).hasClass('no-restriccion')){
        var regex = new RegExp("^[a-zA-Z0-9_, \b@.áéíóúÁÉÍÓÚ%()*+&/;:'/ñÑ-]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    } else {
        var regex = new RegExp("^[a-zA-Z0-9_, \b@.áéíóúÁÉÍÓÚ/ñÑ-]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    }
    if($(e.target).hasClass('no-restriccion-all')){
        var regex = new RegExp("^[a-zA-Z0-9\\\\p{all}]{0,50}");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    }
    if(e.keyCode == 9) return true;	
        if (regex.test(str)) {
            return true;
        }
        e.preventDefault();
        return false;
});