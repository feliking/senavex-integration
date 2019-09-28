<html >
<head>
{include file="includes/Librerias.tpl"}
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
                                <script src="https://maps.googleapis.com/maps/api/js"></script>
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
                                                        <a href='index.php?opcion=impresionRui&tarea=impresionRui&id_empresa={$id_empresa}' target='_blank'><img src="styles/img/imp_b.png"   class="menubottom ayuda"></a>
                                                        <a href='index.php?opcion=impresionRui&tarea=impresionRui&id_empresa={$id_empresa}' target='_blank'><img src="styles/img/imp.png"    class="menutop ayuda"></a>
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
                                <script> 
                                {literal}   
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

                                {/literal} 
                                </script> 
                            </div>
                        </div>
                        <div class="span1 hidden-phone" >

                        </div>
                    </div>
                </div> 
            </div>            
     
     {include file="includes/Pie.tpl"}  
  
</body>
</html>
