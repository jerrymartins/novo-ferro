<?php
/*
echo "<pre>";
var_dump($data);
die("</pre>");
*/
function createMap($data) {

    $inputRazaoSocial = '';
    $inputAddress = '';
    for ($i=0; $i < count($data) - 1; $i++) {

        $inputRazaoSocial .= "<input type='hidden' class='razaoSocial' value='{$data[$i]['cRazaoSocial']}'>";
        $inputAddress .= "<input type='hidden' class='address' value='{$data[$i]['addressGoogleMap']}'>";
    }

    $templateStringMap = "

    <div id='inputAddres'>
    $inputAddress
    $inputRazaoSocial
    </div>

    <div class='mapa'>
        <div id='map' style='display: inline-block; width: 100%; height: 400px;'>
            <script>

                var locations = [];
                
                // infoGM - informações Google Map
                var infoGM = [];

                //array de input's com endereços
                var addressInput = document.getElementsByClassName('address');
                var address = [];

                /*as requisições são assíncronas, logo não consigo definir a razão social juntamente com o address, 
                pois não sei quando uma requisição terá retornado um resultado de endereço para eu associar com a razão social,
                por isso precisei definir um contador que só será incrementado quando uma requisição receber uma resposta
                ver linha 49 do template google map
                */
                var count = 0;

                //array de input's com razão social
                var razaoSocInput = document.getElementsByClassName('razaoSocial');
                var razaoSocial = [];

                for (var i = 0; i < addressInput.length; i++) {
                    address.push(addressInput[i].value);
                    console.log(address[i]);
                }

                for (var i = 0; i < address.length; i++) {

                    axios.get('https://maps.googleapis.com/maps/api/geocode/json?address=' + encodeURI(address[i]) + '&key=AIzaSyB5YE7Ec9ov23r-66p7z8SeCD2EFdI0IuY')
                    .then(function (response) {
                        //quando receber uma resposta, adicione-a no array infoGM
                        if(infoGM.push(response)) {
                            razaoSocial.push(razaoSocInput[count].value);
                            count++;
                        }
                        
                        if (infoGM.length == address.length) {
                            loadScript();
                        }

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }


                function initialize() {

                    for (var i = 0; i < infoGM.length; i++) {

                        locations.push([
                            razaoSocial[i],
                            infoGM[i].data.results[0].geometry.location.lat,
                            infoGM[i].data.results[0].geometry.location.lng,
                            i+1
                        ]);
                    }

                    window.map = new google.maps.Map(document.getElementById('map'), {
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });

                    var infowindow = new google.maps.InfoWindow();

                    var bounds = new google.maps.LatLngBounds();

                    for (i = 0; i < locations.length; i++) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                            map: map,
                            icon: 'ohs/pub/images/map-icon.png'
                        });

                        bounds.extend(marker.position);

                        google.maps.event.addListener(marker, 'click', (function (marker, i) {
                            return function () {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                    }

                    map.fitBounds(bounds);
                    
                    var listener = google.maps.event.addListener(map, 'idle', function () {
                        if(razaoSocial.length > 1) {
                           map.setZoom(12); 
                       } else {
                            map.setZoom(14);
                       }
                        
                        google.maps.event.removeListener(listener);
                    });
                }

                function loadScript() {
                    //adicionando script do google
                    var script = document.createElement('script');
                    script.type = 'text/javascript';
                    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCgMDLmIF-p9LD8m8icoMeXChb_7wA9_nw&callback=initialize';
                    document.body.appendChild(script);
                }

            </script>
        </div>
    </div>
    ";

    return $templateStringMap;



}

$templateStringMap = createMap($data);

?>

