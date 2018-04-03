<?php
$itens = [];

for ($i=0; $i<count($result); $i++){
    $itens[$i]['iTitulo'] = $result[$i]['iTitulo'];
    $itens[$i]['iPreco'] = $result[$i]['iPreco'];
}

include 'ohs/pub/views/item.php';

?>