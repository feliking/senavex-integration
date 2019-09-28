
<div  id="formulario" >
    <div class="row-fluid" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="titulo">ESTADISTICAS</div>
            </div>
            <div class="k-cuerpo">
                <form name="formEstadisticas" id="formEstadisticas" method="post"  action="index.php">
                    
                    <div class="span11">
                        <fieldset class="row-fluid  form " id="fieldset" >
                            <legend>TABLAS</legend>
                            <div id="tablas_general">
                                <div class="span10" >
                                    <div class="span3 " id="tabla" >
                                        <input style="width:100%;" id="idtabla_0" name="idtabla_0">
                                    </div>
                                    <input class="span1 " type="button" name="agregar" id="agregar" value="+">
                                </div>
                                <div class="span11" id="contenido-gral-idtabla_0">
                                   <div id="contenido-idtabla_0">

                                   </div>
                                </div>
                            </div>
                        </fieldset>
                        
                    </div>

                    <div class="row-fluid form" >
                        <div class="span4 hidden-phone" ></div>
                        <div class="span2 " >
                            <input id="cancelar" name="cancelar" type="button"  value= "Cancelar" class="k-primary" style="width:100%"/>
                        </div> 
                        <div class="span2 " >
                            <input id="aceptar" name="aceptar" type="button"  value= "Aceptar" class="k-primary" style="width:100%"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>
<div id="group_by">
    <div class="k-block fadein">
        <div class="k-header">
            <div class="titulo">Agrupar</div>
        </div>
        <div class="k-cuerpo">
            <div class="span11">
                <div class="span3 " id="tabla" >
                    <input style="width:100%;" id="group" name="group">
                </div>       
            </div>
            <div class="row-fluid form" >
                <div class="span4 hidden-phone" ></div>
                <div class="span2 " >
                    <input id="g_cancelar" name="g_cancelar" type="button"  value= "Cancelar" class="k-primary" style="width:100%"/>
                </div> 
                <div class="span2 " >
                    <input id="g_aceptar" name="g_aceptar" type="button"  value= "Aceptar" class="k-primary" style="width:100%"/>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
   ocultar("group_by");
    $("#aceptar").kendoButton();
    $("#cancelar").kendoButton();
    
    $("#g_aceptar").kendoButton();
    $("#g_cancelar").kendoButton();
    
    $("#agregar").kendoButton();
    var nivel=0;
    var aceptar = $("#aceptar").data("kendoButton");
    var cancelar = $("#cancelar").data("kendoButton");
    
    var g_aceptar = $("#g_aceptar").data("kendoButton");
    var g_cancelar = $("#g_cancelar").data("kendoButton");
    
    var agregar = $("#agregar").data("kendoButton");
    cargarIDTABLA2("idtabla_0","");
    aceptar.bind("click", function(e){
        cambiar("formulario","group_by");
    })
    cancelar.bind("click", function(e){
        cerraractualizartab('tabla','admReportesEstadisticas','ruta&tipo=CertificadoOrigen&nivel='+nivel);
    })
    g_aceptar.bind("click", function(e){
        window.open('index.php?opcion=admReportesEstadisticas&tarea=lista&'+$("#formEstadisticas").serialize()+'&group='+$("#group").val(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
{*        cerraractualizartab('tabla','admReportesEstadisticas','prueba&'+$("#formEstadisticas").serialize());*}
{*        cerraractualizartab('tabla','admReportesEstadisticas','prueba&'+$("#formEstadisticas").serialize());*}
{*        cerraractualizartab('tabla','admReportesEstadisticas','ruta&'+$("#formEstadisticas").serialize()+'&idtabla_select=|CertificadoOrigen|COAladi|COAladiDdjjFactura');*}
    });
    g_cancelar.bind("click", function(e){
       cambiar("group_by","formulario"); 
{*      cerraractualizartab('tabla','admReportesEstadisticas','prueba&tipo=CertificadoOrigen&nivel='+nivel);*}
    });
    var count_tabla=0;
    agregar.bind("click", function(e){
       
        /*var x=(count_tabla==0? "":"_"+count_tabla);
        
        alert(x);*/
        var aux="";
        for(var index=0 ; index<=count_tabla ; index++){
            aux=aux+$("#idtabla_"+index).val()+"|";
        }
        aux=aux.substring(0, aux.length-1);
{*        var clase=$("#idtabla_"+count_tabla).val();*}
        count_tabla=count_tabla+1;
  
        Agregar("idtabla_"+count_tabla, aux);
        
    });

    function Agregar(idtabla,nombre){
        var tag=    
            '<div id="tablas_general-'+idtabla+'">'+
                '<div class="span10" >'+
                    '<div class="span3 " id="tabla_'+idtabla+'" >'+
                        '<input style="width:100%;" id="'+idtabla+'" name="'+idtabla+'">'+
                    '</div>'+
                    '<input type="button" class="span1" name="eliminar" id="eliminar" value="-"  onclick="Eliminar(\''+'tablas_general-'+idtabla+'\')">'+
                '</div>'+
                '<div class="span11" id="contenido-gral-'+idtabla+'">'+
                    '<div id="contenido-'+idtabla+'"></div>'+
                '</div>'+
            '</div>';
        $("#fieldset").append(tag);
        cargarIDTABLA2(idtabla,nombre);

    }
    function Eliminar(tag){
        
        var x1 = tag.split("-");
        var x2 = x1[x1.length-1].split("_")
        
        for(var index=x2[1]; index<=count_tabla ; index++){
            $('#'+x1[0]+'-'+x2[0]+'_'+index).remove();
        }
        count_tabla=x2[1]-1;
{*        $('#'+tag).remove();*}
    }
    
    var group=$("#group").kendoComboBox({
        dataTextField: "descripcion",
        dataValueField: "id",
        dataSource: [
            { id: 0, descripcion: "NINGUNO" }
        ],
        value:'0',
    });
                    
    function cargarIDTABLA2(idtabla,nombre){
        $("#"+idtabla).kendoDropDownList({ 
            optionLabel:"SELECCIONAR",
            dataTextField: "descripcion",
            dataValueField: "id",
            dataSource: {
                transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admReportesEstadisticas&tarea=ruta&idtabla_select="+nombre
                    }
                }
            },
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) { 
                    this.text('');
                }else{
                    var value=this.value();
                    //anterior=this.value()
                    $.ajax({
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admReportesEstadisticas&tarea=cargarTabla&idtabla='+value,
                        success: function (data) {
                            var dt=eval("("+data+")");
                            $("#contenido-"+idtabla).remove();
                            
                            var div=' <div id="contenido-'+idtabla+'"><div class="span11" id="propiedades-'+idtabla+'-'+value+'"> </div></div>';
                            $("#contenido-gral-"+idtabla).append(div);
                            if(dt.campos.length>0){
                                check='<div fadein id="chk-campos" class="span4">';
                                for(var i = 0; i < dt.campos.length; i++) {
                                    //var id = dt.campos[i].id.split("-");
                                    var descripcion=dt.campos[i].descripcion;
                                    check=check+'<div class="span8" id="div-'+idtabla+'-'+dt.campos[i].id+'">'+
                                                    '<input type="checkbox" id="CP-'+idtabla+'-attr-'+dt.campos[i].id+'" name="CP-'+idtabla+'-attr-'+dt.campos[i].id+'" onclick="tagCampos(\''+descripcion+'\',this.checked,\''+idtabla+'-'+dt.campos[i].id+'\')" value="CP-'+dt.campos[i].id+'" >'+descripcion+'</input>'+
                                                    //'<div id="att-'+dt.campos[i].id+'"></div>'+
                                                '</div>';
                                }
                                check=check+'</div>';
                                $("#propiedades-"+idtabla+'-'+value).append(check);
                            }
                            if(dt.relaciones.length>0){
                                check='<div fadein id="chk-relaciones" class="span4">';
                                for(var i = 0; i < dt.relaciones.length; i++) {
                                    //var id = dt.relaciones[i].id.split("-");
                                    var descripcion=dt.relaciones[i].descripcion;
                                    check=check+'<div class="span8" id="div-'+idtabla+'-'+dt.relaciones[i].id+'">'+
                                                    '<input type="checkbox" id="FK-'+idtabla+'-attr-'+dt.relaciones[i].id+'" name="FK-'+idtabla+'-attr-'+dt.relaciones[i].id+'" onclick="tagRelaciones(\''+descripcion+'\',this.checked,\''+idtabla+'-'+dt.relaciones[i].id+'\')" value="FK-'+dt.relaciones[i].id+'" >'+descripcion+'</input>'+
                                                    //'<div id="att-'+dt.relaciones[i].id+'" ></div>'+
                                                '</div>';
                                }
                                check=check+'</div>';
                                $("#propiedades-"+idtabla+'-'+value).append(check);
                            }
                            if(dt.descripcion.length>0){
                                check='<div fadein id="chk-descripcion" class="span4">';
                                for(var i = 0; i < dt.descripcion.length; i++) {
                                    //var id = dt.descripcion[i].id.split("-");
                                    var descripcion=dt.descripcion[i].descripcion;
                                    check=check+'<div class="span8" id="div-'+idtabla+'-'+dt.dt.descripcion[i].id+'">'+
                                                    '<input  type="checkbox" id="DS-'+idtabla+'-attr-'+dt.descripcion[i].id+'" name="DS-'+idtabla+'-attr-'+dt.descripcion[i].id+'" onclick="tagDescripcion(\''+descripcion+'\',this.checked,\''+idtabla+'-'+dt.descripcion[i].id+'\')" value="DS-'+dt.descripcion[i].id+'" >'+descripcion+'</input>'+
                                                    //'<div id="att-'+dt.descripcion[i].id+'" ></div>'+
                                                '</div>';
                                }
                                check=check+'</div>';
                                $("#propiedades-"+idtabla+'-'+value).append(check);
                            }

                        }
                    }); 
                }
            }
        });
    }
    
    function cargarIDTABLA(idtabla){
        $("#"+idtabla).kendoDropDownList({ 
            optionLabel:"TABLA",
            placeholder:"TABLA",
            ignoreCase: true,
            dataTextField: "value",
            dataValueField: "Id",
            dataSource: [
            {foreach $tablas as $key => $value} 
                 { value: "{$value}", Id: "{$key}"},
            {/foreach}  
            ],
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) { 
                    this.text('');

                }else{
                    
                    var value=this.value();
                    //anterior=this.value()
                    $.ajax({
                        type: 'post',
                        url: 'index.php',
                        data: 'opcion=admReportesEstadisticas&tarea=cargarTabla&idtabla='+value,
                        success: function (data) {
                            var dt=eval("("+data+")");
                            $("#contenido-"+idtabla).remove();
                            
                            var div=' <div id="contenido-'+idtabla+'"><div class="span11" id="propiedades-'+idtabla+'-'+value+'"> </div></div>';
                            $("#contenido-gral-"+idtabla).append(div);
                            if(dt.campos.length>0){
                                check='<div fadein id="chk-campos" class="span4">';
                                for(var i = 0; i < dt.campos.length; i++) {
                                    //var id = dt.campos[i].id.split("-");
                                    var descripcion=dt.campos[i].descripcion;
                                    check=check+'<div class="span8" id="div-'+idtabla+'-'+dt.campos[i].id+'">'+
                                                    '<input type="checkbox" id="CP-'+idtabla+'-attr-'+dt.campos[i].id+'" name="CP-'+idtabla+'-attr-'+dt.campos[i].id+'" onclick="tagCampos(\''+descripcion+'\',this.checked,\''+idtabla+'-'+dt.campos[i].id+'\')" value="CP-'+dt.campos[i].id+'" >'+descripcion+'</input>'+
                                                    //'<div id="att-'+dt.campos[i].id+'"></div>'+
                                                '</div>';
                                }
                                check=check+'</div>';
                                $("#propiedades-"+idtabla+'-'+value).append(check);
                            }
                            if(dt.relaciones.length>0){
                                check='<div fadein id="chk-relaciones" class="span4">';
                                for(var i = 0; i < dt.relaciones.length; i++) {
                                    //var id = dt.relaciones[i].id.split("-");
                                    var descripcion=dt.relaciones[i].descripcion;
                                    check=check+'<div class="span8" id="div-'+idtabla+'-'+dt.relaciones[i].id+'">'+
                                                    '<input type="checkbox" id="FK-'+idtabla+'-attr-'+dt.relaciones[i].id+'" name="FK-'+idtabla+'-attr-'+dt.relaciones[i].id+'" onclick="tagRelaciones(\''+descripcion+'\',this.checked,\''+idtabla+'-'+dt.relaciones[i].id+'\')" value="FK-'+dt.relaciones[i].id+'" >'+descripcion+'</input>'+
                                                    //'<div id="att-'+dt.relaciones[i].id+'" ></div>'+
                                                '</div>';
                                }
                                check=check+'</div>';
                                $("#propiedades-"+idtabla+'-'+value).append(check);
                            }
                            if(dt.descripcion.length>0){
                                check='<div fadein id="chk-descripcion" class="span4">';
                                for(var i = 0; i < dt.descripcion.length; i++) {
                                    //var id = dt.descripcion[i].id.split("-");
                                    var descripcion=dt.descripcion[i].descripcion;
                                    check=check+'<div class="span8" id="div-'+idtabla+'-'+dt.dt.descripcion[i].id+'">'+
                                                    '<input  type="checkbox" id="DS-'+idtabla+'-attr-'+dt.descripcion[i].id+'" name="DS-'+idtabla+'-attr-'+dt.descripcion[i].id+'" onclick="tagDescripcion(\''+descripcion+'\',this.checked,\''+idtabla+'-'+dt.descripcion[i].id+'\')" value="DS-'+dt.descripcion[i].id+'" >'+descripcion+'</input>'+
                                                    //'<div id="att-'+dt.descripcion[i].id+'" ></div>'+
                                                '</div>';
                                }
                                check=check+'</div>';
                                $("#propiedades-"+idtabla+'-'+value).append(check);
                            }

                        }
                    }); 
                }
            }
        });
    }
    function getInput(input){
        //DATE,INT,FLOAT,TXT,BOOL,NUMERIC
        var id = input.split("-");
        
        var i = document.createElement("input");
        i.type = "text";
        i.name = "input-" + input;
        i.id = "input-" + input;
       
        switch(id[3]) {
            case "BOOL":
                break;
            case "DATE":
                i=document.createElement("div");
                //i.type="date";
                //i.className="k-textbox span12";
                i.name = "input-" + input;
                i.id = "input-" + input;
                
                var a=document.createElement("input");
                var b=document.createElement("input");
                
                a.name=i.name+'-ini';
                a.id=a.name;
                a.type='date';
                a.className="k-textbox span9";
                
                b.name=i.name+'-fin';
                b.id=b.name;
                b.type='date';
                b.className="k-textbox span9";
                
                i.appendChild(a);
                i.appendChild(b);
                break;
            case "NUMERIC":
                 i=document.createElement("div");
                 i.name = "input-" + input;
                 i.id = "input-" + input;
{*                i.type="number";
                i.className="k-textbox span8";*}
               
                var num=document.createElement("input");
                var may=document.createElement("input");
                var men=document.createElement("input");
                var equ=document.createElement("input");
                
                num.id=num.id=i.name+'-valor';
                num.name=num.id;
                num.type='text';
                num.className="k-textbox span8";
                
                may.id=i.name+'-may';
                may.name=may.id;
                may.type='checkbox';
                var label1 = document.createElement('label')
                var div1 = document.createElement('div')
                label1.htmlFor = "id";
                label1.appendChild(document.createTextNode('Mayor'));
                div1.className="span4";

                men.id=i.name+'-men';
                men.name=men.id;
                men.type='checkbox';
                var div2 = document.createElement('label')
                var label2 = document.createElement('label')
                label2.htmlFor = "id";
                label2.appendChild(document.createTextNode('Menor'));
                div2.className="span4";
                
                equ.id=i.name+'-equ';
                equ.name=equ.id;
                equ.type='checkbox';
                var div3 = document.createElement('label');
                var label3 = document.createElement('label');
                label3.htmlFor = "id";
                label3.appendChild(document.createTextNode('Igual'));
                div3.className="span4";
                
                div1.appendChild(label1);
                div1.appendChild(may);
                i.appendChild(div1);
                
                div2.appendChild(label2);
                div2.appendChild(men);
                i.appendChild(div2);
                
                div3.appendChild(label3);
                div3.appendChild(equ);
                i.appendChild(div3)
                
                i.appendChild(num);
                break;
            case "TXT":
                i.type="text";
                i.className="k-textbox span8";
                break;
            /*case "INT":
                i.type="text";
                break;
            
            case "FLOAT":
                break;
            case "BOOL":
                break;*/
            default:
                i.type="text";
                i.classNames="span7";
                //tag+='<input id="id-input-'+input+'" '+(bool==true? 'class="k-textbox"':'')+' type="text">';
                break;
        }
        //return tag+'></div>';
        return i;
    }
    function tagDescripcion(descripcion,checked,array){
        
    }
    function tagRelaciones(descripcion,checked,array){
        var tag='';
        var a=array.split('-');
       
        if(checked==true){
{*            alert(array);*}
            tag=getInput(array);
            $("#div-"+array).append(tag);
            $("#input-"+array).kendoComboBox({

                dataTextField: "descripcion",
                dataValueField: "id",
                dataSource: {
                    transport: {
                        read: {
                            dataType: "json",
                            url: "index.php?opcion=admReportesEstadisticas&tarea=cargarCombo&value="+a[1]
                        }
                    }
                },
                change : function (e) {
                    if (this.value() && this.selectedIndex === -1) { 
                        this.text('');
                    }else{  
                        //alert(this.selectedIndex);
                    }
                }
            });
            $("#group").data("kendoComboBox").dataSource.add({ id: array, descripcion: descripcion });
          
        }
        else
        {
            $("#div-"+array).children("span").remove();
            
            var item=$("#group").data("kendoComboBox").dataSource.get(array);
            $("#group").data("kendoComboBox").dataSource.remove(item);
            
           
        }
    }
    function tagCampos(descripcion,checked, array){
        var tag='';
        if(checked==true){
            tag=getInput(array,true);
 
            $("#div-"+array).append(tag);
             $("#group").data("kendoComboBox").dataSource.add({ id: array, descripcion: descripcion });
        }
        else
        {
            var item=$("#group").data("kendoComboBox").dataSource.get(array);
            $("#group").data("kendoComboBox").dataSource.remove(item);
            $("#input-"+array).remove();
        }
    }
</script>
</body>
</html>