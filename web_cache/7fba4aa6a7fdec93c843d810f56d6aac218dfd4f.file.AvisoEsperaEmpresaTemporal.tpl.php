<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-08 10:27:23
         compiled from "/enex/web1/sitio/web/vista/empresaTemporal/AvisoEsperaEmpresaTemporal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172521824057cedf76200388-50202236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fba4aa6a7fdec93c843d810f56d6aac218dfd4f' => 
    array (
      0 => '/enex/web1/sitio/web/vista/empresaTemporal/AvisoEsperaEmpresaTemporal.tpl',
      1 => 1493940906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172521824057cedf76200388-50202236',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cedf7621c1f6_75684312',
  'variables' => 
  array (
    'emailrp' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cedf7621c1f6_75684312')) {function content_57cedf7621c1f6_75684312($_smarty_tpl) {?><html >
<head>
<?php echo $_smarty_tpl->getSubTemplate ("includes/Librerias.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link href="styles/css-personales/k-window-bienvenida.css" rel="stylesheet">
</head>
<body> 
            <?php echo $_smarty_tpl->getSubTemplate ("includes/Cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                                             <p> Felicidades!! Tu registro se lleno satisfactoriamente, se ha enviado el <span class="letrarelevante" >usuario</span> y <span class="letrarelevante" >contraseña</span> de tu empresa al email : <span class="letrarelevante" id='emailrlspan'><?php echo $_smarty_tpl->tpl_vars['emailrp']->value;?>
</span><br>
                                                Conjuntamente se envio otro e-mail indicando los documentos que necesitas presentar para validar tu Registro<br>
                                                Agradecemos tu colaboración , SENAVEX.
                                            </p> 
                                           </div>  
                                    </div> 
                                    <div class="row-fluid " >
                                        <div class="span12" >
                                            <center>
                                                <div class="cfd" onclick='mostrarContacto("1")'>
                                                    <img class="bottom" src="styles/img/deps/santacruz_b.png" style="max-width:60px;" >
                                                    <img class="top" src="styles/img/deps/santacruz.png" style="max-width:60px;" >
                                                </div>
                                                <div class="cfd" onclick='mostrarContacto("2")'>
                                                    <img class="bottom" src="styles/img/deps/lapaz_b.png" style="max-width:60px;" >
                                                    <img class="top" src="styles/img/deps/lapaz.png" style="max-width:60px;" >
                                                </div>
                                                <div class="cfd" onclick='mostrarContacto("3")'>
                                                    <img class="bottom" src="styles/img/deps/elalto_b.png" style="max-width:60px;" >
                                                    <img class="top" src="styles/img/deps/elalto.png" style="max-width:60px;" >
                                                </div>
                                                <div class="cfd" onclick='mostrarContacto("4")'>
                                                    <img class="bottom" src="styles/img/deps/cochabamba_b.png" style="max-width:60px;" >
                                                    <img class="top" src="styles/img/deps/cochabamba.png" style="max-width:60px;" >
                                                </div>
                                                <div class="cfd" onclick='mostrarContacto("5")'>
                                                    <img class="bottom" src="styles/img/deps/potosi_b.png" style="max-width:60px;" >
                                                    <img class="top" src="styles/img/deps/potosi.png" style="max-width:60px;" >
                                                </div>
                                                <div class="cfd" onclick='mostrarContacto("6")'>
                                                    <img class="bottom" src="styles/img/deps/oruro_b.png" style="max-width:60px;" >
                                                    <img class="top" src="styles/img/deps/oruro.png" style="max-width:60px;" >
                                                </div>
                                                <div class="cfd" onclick='mostrarContacto("7")'>
                                                    <img class="bottom" src="styles/img/deps/sucre_b.png" style="max-width:60px;" >
                                                    <img class="top" src="styles/img/deps/sucre.png" style="max-width:60px;" >
                                                </div>
                                                <div class="cfd" onclick='mostrarContacto("8")'>
                                                    <img class="bottom" src="styles/img/deps/riberalta_b.png" style="max-width:60px;" >
                                                    <img class="top" src="styles/img/deps/riberalta.png" style="max-width:60px;" >
                                                </div>
                                                <div class="cfd" onclick='mostrarContacto("9")'>
                                                    <img class="bottom" src="styles/img/deps/yacuiba_b.png" style="max-width:60px;" >
                                                    <img class="top" src="styles/img/deps/yacuiba.png" style="max-width:60px;" >
                                                </div>
                                                <div class="cfd" onclick='mostrarContacto("10")'>
                                                    <img class="bottom" src="styles/img/deps/tarija_b.png" style="max-width:60px;" >
                                                    <img class="top" src="styles/img/deps/tarija.png" style="max-width:60px;" >
                                                </div>
                                            </center>
                                        </div>  
                                    </div> 
                                    <div class="row-fluid" id="cdiv1">
                                        <div class="span12 fadein" >
                                            SANTA CRUZ<br>
                                            C. Mariano telchi #57, 2do anillo,(detras de Saguapac)<br> 
                                            Teléfono: 591 | 2 | 312-2466<br>
                                            Fax: 591 | 2 | 312-2466<br><br>
                                        </div>  
                                    </div> 
                                    <div class="row-fluid" id="cdiv2">
                                        <div class="span12 fadein" >
                                            LA PAZ<br> 
                                            Av Camacho esq. Bueno Nº. 1488 | Edif. Viceministerio de Comercio & Exportaciones, 5to. Piso<br> 
                                            Teléfono: 591 | 2 | 211-3621<br> 
                                            Fax: 591 | 2 | 237-2055<br><br> 
                                        </div>  
                                    </div> 
                                    <div class="row-fluid" id="cdiv3">
                                        <div class="span12 fadein" >
                                            EL ALTO<br>
                                            Av. 6 de marzo entre calles 4 y 5; Edif. La Urbana Nº 1440, 1er. Piso, Of. Nº 23 (cerca al Banco Unión).<br>
                                            Teléfono: 591 | 2 | 282-5491<br>
                                            Fax: 591 | 2 | 282-5491<br><br>
                                        </div>  
                                    </div> 
                                    <div class="row-fluid" id="cdiv4">
                                        <div class="span12 fadein" >
                                            COCHABAMBA<br>
                                            Av. Killman Nº 1681 Ex – Aeropuerto | "Centro Logístico de Comercio Exterior"<br>
                                            Teléfono: 591 | 2 | 411-3156<br>
                                            Fax: 591 | 2 | 411-3156<br><br>
                                        </div>  
                                    </div> 
                                    <div class="row-fluid" id="cdiv5">
                                        <div class="span12 fadein" >
                                            POTOSÍ<br>
                                            c. BUSTILLOS Nº 867 (Z. SAN ROQUE), Edif. CORONA REAL - 1er. PISO, Of. Nº 109<br>
                                            Teléfono: 591 | 2 | 612-2797<br>
                                            Fax: 591 | 2 | 612-2797<br><br>
                                        </div>  
                                    </div> 
                                    <div class="row-fluid" id="cdiv6">
                                        <div class="span12" >
                                            ORURO<br>
                                            C. PDTE. MONTES ESQ. CALLE SUCRE S/N OFICINA Nº 202<br>
                                            Teléfono: 591 | 2 | 511-7680<br>
                                            Fax: 591 | 2 | 511-7680<br><br>
                                        </div>  
                                    </div> 
                                    <div class="row-fluid" id="cdiv7">
                                        <div class="span12 fadein" >
                                            SUCRE<br>
                                            c. Estudiantes Nº 78, Piso 1 (Zona Central)<br>
                                            Teléfono: 591 | 2 | 691-7837<br>
                                            Fax: 591 | 2 | 691-7837<br><br>
                                        </div>  
                                    </div> 
                                    <div class="row-fluid" id="cdiv8">
                                        <div class="span12 fadein" >
                                            RIBERALTA<br>
                                            Av. Amazónica s/n Esq. Calle Coco (Frente al complejo de COTERI) Urbanización Santa Teresita.<br>
                                            Teléfono: 591 | 2 | 852-2099<br>
                                            Fax: 591 | 2 | 852-2099<br><br>
                                        </div>  
                                    </div> 
                                    <div class="row-fluid" id="cdiv9">
                                        <div class="span12 fadein" >
                                            YACUIBA<br>
                                            C. SUCRE ESQ. COMERCIO, GALERIA YULI, 2do. NIVEL, OFICINA Nº 14<br>
                                            Teléfono: 591 | 2 | 683-0435<br>
                                            Fax: 591 | 2 | 683-0435<br><br>
                                        </div>  
                                    </div> 
                                    <div class="row-fluid" id="cdiv10">
                                        <div class="span12 fadein" >
                                            TARIJA<br>
                                            c. Ingavi N° 156 entre Colón y Suipacha, Edificio "Coronado" 2° piso<br>
                                            Teléfono: 591 | 2 | 611-2825<br>
                                            Fax: 591 | 2 | 611-2825<br><br>
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
