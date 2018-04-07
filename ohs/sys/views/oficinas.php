<?php
//existe um item no array que não é produto, portanto deve-se subtrair 1 do tamanho do array, e o total de itens encontrados
/*
echo "<pre>";
var_dump($data);
die("</pre>");
*/
$oficinas = "";
$modals .= "";

for ($i=0; $i < count($data) - 1; $i++) {
    $oficinas .= "
        <article>
            <figure>
                <img src='http://via.placeholder.com/350x150' alt='' />
            </figure>

            <hgroup>
                <h1>{$data[$i]['cRazaoSocial']}</h1>
            </hgroup>

            <div class='bts'>
                <strong data-toggle='modal' data-target='#{$i}' id='oficina-{$i}' onclick='getEl(this);'>Conhecer</strong>
                <a href='index.php?p=relatorio&q=add&nC={$data[$i]['nCadastro']}'><i class='fa fa-cart-arrow-down'></i></a>
            </div>
        </article>
    ";

    $modals .= "
        <div class='modal-body'>
            <div class='modal fade' id='{$i}' tabindex='-1' role='dialog' aria-hidden='true'>
                <div class='modal-dialog modal-lg' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>        
                           <div class='bloco'>
                                <a href='index.php?p=relatorio&q=add&nC={$data[$i]['nCadastro']}' class='bts'><i class='fa fa-cart-arrow-down'></i></a>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>fechar | &times;</span>
                                </button>
                            </div>
                            <h1 class='modal-title titulo'>{$data[$i]['cRazaoSocial']}</h1>
                        </div>
                        <div class='modal-body'>
                            <!-- linha -->
                            <div class='linha'>
                                <!-- coluna meio -->
                                <div class='col-meio-modal'>
                                    <ul>
                                        <li>CNPJ: {$data[$i]['cCpfCnpj']}</li>
                                        <li><i class='fa fa-volume-control-phone' aria-hidden='true'></i> <strong>{$data[$i]['tel']}</strong></li>
                                        <li><i class='fa fa-envelope-o' aria-hidden='true'></i> {$data[$i]['cEmail']}</li>
                                        <li><i class='fa fa-map-marker' aria-hidden='true'></i> <p>{$data[$i]['address']}</p></li>
                                    </ul>
                                </div>
                                <!-- coluna meio fim -->

                                <!-- coluna direita -->
                                <div class='col-dir-modal'>
                                    <img src='http://via.placeholder.com/226x153' alt=''>
                                </div>
                                <!-- coluna direita fim -->
                            </div>
                            <!-- linha fim -->
                        </div>
                        <div id='address'>
                        <input type='hidden' id='razaoSoc{$i}' class='razaoSocial' value='{$data[$i]['cRazaoSocial']}'>
                        <input type='hidden' id='address{$i}' class='address' value='{$data[$i]['addressGoogleMap']}'>
                        </div>
                        <div class='modal-footer'>
                            <!-- mapa -->
                            <div class='linha' id='divModalMap{$i}'>
                                
                                <!--<iframe id='frameMap' width='100%' height='400' frameborder='0' style='border:0' allowfullscreen></iframe>-->
                                
                            </div>
                            <!-- mapa fim -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ";
}

$templateString = "
            <!-- conteúdo -->
        <main class='conteudo oficina'>
            <!-- container -->
            <div class='container'>
                <!-- linha -->
                <div class='linha'>                    
                    <!-- titulo -->
                   <div class='col-topo'>
                        <hgroup>
                            <h1>Encontre uma oficina próxima</h1>
                            <h6>Encontrados {$data['rowCount']} oficina(s)</h6>
                        </hgroup>
                    </div>
                    <!-- titulo fim -->
                    
                    <!-- mapa -->
                        $templateStringMap
                    <!-- mapa fim -->
                    
                    <!-- listagem -->
                    <div class='listagem js-quadrado'>
                        <script>
                            var created = false;
                            

                            function removeIframeChilds() {
                              
                                //remove todos os elementos
                                while (divModalMap.firstChild) {
                                    divModalMap.removeChild(divModalMap.firstChild);
                                }

                                created = false;
                            }

                            function createIframeChild() {
                                divModalMap = document.getElementById('divModalMap'+idlocation);

                                console.log(divModalMap);

                                var frame = document.createElement('iframe');
                                frame.src = encodeURI('https://www.google.com/maps/embed/v1/place?q='+
                                locations[idlocation][1]+ ',' +
                                locations[idlocation][2]+
                                '&key=AIzaSyBEtYge5jrwEmwLqDc8bjTmnLaICAYlzM8');
                                frame.style.height = '400px';
                                frame.style.width = '100%';

                                divModalMap.appendChild(frame);

                                console.log(divModalMap);

                                created = true;
                            }
                            
                            function request(razaoSoc, addr, nEl) {

                                var localization = {};

                                var address = addr;

                                var divMap;

                                var razaoSocial = razaoSoc;
                                console.log(razaoSocial);
                                
                                    console.log(locations[idlocation]);

                                    if (created) {
                                       removeIframeChilds();
                                    }
                                    
                                    createIframeChild();
   
                                   console.log(encodeURI('https://www.google.com/maps/embed/v1/place?q='+locations[idlocation][1]+','+locations[idlocation][2]+'&key=AIzaSyBEtYge5jrwEmwLqDc8bjTmnLaICAYlzM8'));
 
                            }
                        </script>
                        <!-- oficinas --> 
                            $oficinas
                        <!-- fim oficinas -->

                        <!-- modal -->
                            $modals
                        <!-- modal fim -->

                        
                    </div>
                    <!-- listagem -->

                    {$data['pagination']}
                    
                </div>
                <!-- linha fim -->
            </div>
            <!-- container fim -->
        </main>
        <!-- conteúdo fim -->
        <script>
            var idlocation;
            
            function getEl(el) {

                var idAddress = el.id.split('-');
                
                var selectorAddress = '#address' + idAddress[1];
                var selectorRazaoSoc = '#razaoSoc' + idAddress[1];

                idlocation = idAddress[1];

                //console.log(idlocation);

                //pega os campos input com endereço e razão social
                var addressEl = document.querySelector(selectorAddress);
                var razaoSocEl = document.querySelector(selectorRazaoSoc);

                //console.log(razaoSocEl.value);
                //console.log(addressEl.value);

                request(razaoSocEl.value, addressEl.value, idAddress[1]);


            }

            
        </script>

";

//<iframe src='https://www.google.com/maps/embed/v1/place?q=40.7127837,-74.0059413&amp;key=AIzaSyB5YE7Ec9ov23r-66p7z8SeCD2EFdI0IuY'allowfullscreen></iframe>


?>
