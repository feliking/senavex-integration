<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-02 21:16:25
         compiled from "/enex/web1/sitio/web/vista/importTemporal/AvisoImportacionTemporal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1940655285d5db30359b680-14079433%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c5a792fc8ddc739559b4b35f86c8e2712f2072e' => 
    array (
      0 => '/enex/web1/sitio/web/vista/importTemporal/AvisoImportacionTemporal.tpl',
      1 => 1566938416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1940655285d5db30359b680-14079433',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d5db3035d5bf8_67215824',
  'variables' => 
  array (
    'id_empresa' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d5db3035d5bf8_67215824')) {function content_5d5db3035d5bf8_67215824($_smarty_tpl) {?><html >
<head>
<?php echo $_smarty_tpl->getSubTemplate ("includes/Librerias.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link href="styles/css-personales/k-window-bienvenida.css" rel="stylesheet">
</head>
<body> 
            <div class="row-fluid ">
                <div class="span12" >
                    <div class="row-fluid" >
                        <div class="span1 hidden-phone" >
                        </div>
                        <div class="span10">
                            <div class="k-block fadein">
                                <?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js"><?php echo '</script'; ?>
>
                                <div class="k-header k-headerrojo"><div class="tituloblanco">Atenci&oacute;n</div></div>
                                <div class="k-cuerpo">  
                                    <div class="row-fluid form" >
                                           <div class="span12" >
                                             <p> Felicidades!! Tu registro se lleno satisfactoriamente.<br><br>
                                                Por favor imprima su formulario en dos copias, firmelas y con todos los requisitos presentar<br>
                                                en ventanillas del SENAVEX para validar su registro<br><br>
                                                Agradecemos tu colaboración , SENAVEX.
                                            </p> 
                                            <div class="span4 " > 
                                                <div class="span1 " >
                                                    <div class="menucf">
                                                        <a href='index.php?opcion=impresionRui&tarea=impresionRui&id_empresa=<?php echo $_smarty_tpl->tpl_vars['id_empresa']->value;?>
' target='_blank'><img src="styles/img/imp_b.png"   class="menubottom ayuda"></a>
                                                        <a href='index.php?opcion=impresionRui&tarea=impresionRui&id_empresa=<?php echo $_smarty_tpl->tpl_vars['id_empresa']->value;?>
' target='_blank'><img src="styles/img/imp.png"    class="menutop ayuda"></a>
                                                    </div>
                                                </div>
                                            </div>
                                           </div>  
                                    </div> 

                                    <div class="row-fluid  form"  id="mapa">
                                        <div class="span12 fadein" >
                                           <div id="map-canvas"></div>
                                        </div>  
                                    </div> 
                                </div>   
                                <?php echo '<script'; ?>
> 
                                   
                                ocultar('mapa');
                                ocultar('cdiv1');
                                ocultar('cdiv2');
                                ocultar('cdiv3');
                                ocultar('cdiv4');
                                ocultar('cdiv5');
                                ocultar('cdiv6');
                                ocultar('cdiv7');
                                ocultar('cdiv8');
                                ocultar('cdiv9');
                                ocultar('cdiv10');
                                var map;
                                var marker;
                                function initialize() {
                                var mapCanvas = document.getElementById('map-canvas');
                                 var myLatlng  = new google.maps.LatLng(-17.786398240342834,-63.181103644180325);
                                var mapOptions = {
                                  center: myLatlng,
                                  zoom: 16,
                                  mapTypeId: google.maps.MapTypeId.ROADMAP
                                };
                                 map = new google.maps.Map(mapCanvas, mapOptions);
                                 marker = new google.maps.Marker({position:myLatlng, map:map});
                                }
                                google.maps.event.addDomListener(window, 'load', initialize);
                                var cdivant='1';
                                function mostrarContacto(num)
                                {
                                    ocultar('cdiv'+cdivant); 
                                    cdivant=num;
                                    mostrar('cdiv'+num);
                                    mostrar('mapa');

                                    switch(num) {
                                        case '1':
                                            //var latlng  = new google.maps.LatLng(-17.786398240342834,-63.181103644180325); //santacruj
                                            var latlng  = new google.maps.LatLng(-17.803342, -63.185519); //santacruj
                                            google.maps.event.trigger(map, 'resize');
                                            marker.setPosition(latlng);
                                            map.setCenter(latlng); 
                                            map.setZoom( map.getZoom() );
                                            break;
                                        case '2':
                                            var latlng  = new google.maps.LatLng(-16.500050,-68.132177);// la paz
                                            map.setCenter(latlng); 
                                            marker.setPosition(latlng);
                                            google.maps.event.trigger(map, 'resize');
                                            map.setZoom( map.getZoom() );
                                            break;
                                        case '3':
                                            var latlng  = new google.maps.LatLng(-16.50880671,-68.16421207);//el alto
                                            map.setCenter(latlng);
                                            marker.setPosition(latlng);
                                            google.maps.event.trigger(map, 'resize');
                                            map.setZoom( map.getZoom() );
                                            break;
                                        case '4':
                                            var latlng  = new google.maps.LatLng(-17.41049532,-66.17257113);//cochabamba
                                            map.setCenter(latlng);
                                            marker.setPosition(latlng);
                                            google.maps.event.trigger(map, 'resize');
                                            map.setZoom( map.getZoom() );
                                            break;
                                        case '5':
                                            var latlng  = new google.maps.LatLng(-19.58547661,-65.75434256);// potosi
                                            map.setCenter(latlng); 
                                            marker.setPosition(latlng);
                                            google.maps.event.trigger(map, 'resize');
                                            map.setZoom( map.getZoom() );
                                            break;
                                        case '6':
                                            var latlng  = new google.maps.LatLng(-17.97058145,-67.11558103);//oruro
                                            map.setCenter(latlng); 
                                            marker.setPosition(latlng);
                                            google.maps.event.trigger(map, 'resize');
                                            map.setZoom( map.getZoom() );
                                            break;
                                        case '7':
                                            var latlng  = new google.maps.LatLng(-19.047342640745597,-65.26133291667173);//sucre
                                            map.setCenter(latlng);
                                            marker.setPosition(latlng);
                                            google.maps.event.trigger(map, 'resize');
                                            map.setZoom( map.getZoom() );
                                            break;
                                        case '8':
                                            ocultar('mapa');
                                            //var myLatlng  = new google.maps.LatLng();//riberalta no tiene
                                            break;
                                        case '9':
                                            var latlng  = new google.maps.LatLng(-22.01578830,-63.67800933);//yacuiba
                                            map.setCenter(latlng); 
                                            marker.setPosition(latlng);
                                            google.maps.event.trigger(map, 'resize');
                                            map.setZoom( map.getZoom() );
                                            break;
                                        case '10':
                                            var latlng  = new google.maps.LatLng(-21.533595,-64.731523);//tarija
                                            map.setCenter(latlng); 
                                            marker.setPosition(latlng);
                                            google.maps.event.trigger(map, 'resize');
                                            map.setZoom( map.getZoom() );
                                            break;
                                        default:
                                            break;
                                    }    


                                }

                                 
                                <?php echo '</script'; ?>
> 
                            </div>
                        </div>
                        <div class="span1 hidden-phone" >

                        </div>
                    </div>
                </div> 
            </div>            
     
     <?php echo $_smarty_tpl->getSubTemplate ("includes/Pie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
  
  
</body>
</html>
<?php }} ?>
