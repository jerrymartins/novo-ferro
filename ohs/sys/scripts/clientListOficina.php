<?php
$oficinas = [];

for ($i=0; $i<count($result); $i++){
    $oficinas[$i]['cRazaoSocial'] = $result[$i]['cRazaoSocial'];
}

include 'ohs/pub/views/oficina.php';

?>