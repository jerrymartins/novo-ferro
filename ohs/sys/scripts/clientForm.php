<?php
use OHS\NF\Helpers\Helpers;

/*
if(isset($nCadastro)) { #então foi feita uma pesquisa por nCadastro, logo trata-se de um update
	$q = 'update';
}
*/

$sHtml = file_get_contents('ohs/pub/views/cadastro_fornecedor.html');

#Helpers::selectEstado('name do select', 'estado selecionado', 'classe css')

if (isset($result[0]['cEstado'])) {
	$selectedEstado = Helpers::selectEstado('cEstado', $result[0]['cEstado'], "form-control");
	$sHtml = str_replace('<!-- ohs:form:estados -->', $selectedEstado, $sHtml);

} else {
	$estados = Helpers::selectEstado('cEstado', '', 'form-control');
	$sHtml = str_replace('<!-- ohs:form:estados -->', $estados, $sHtml);
}

?>