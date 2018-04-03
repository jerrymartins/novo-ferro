<?php
use OHS\NF\Helpers\Helpers;


if(isset($result)) {
	$name = $result[0]["cRazaoSocial"];
	$cnpj = $result[0]["cCpfCnpj"];
	$dddTel = $result[0]["cDDDTel"];
	$tel = $result[0]["cTelefone"];
	$dddCel = $result[0]["cDDDCel"];
	$cel = $result[0]["cCelular"];
	$email = $result[0]["cEmail"];
	$rua = $result[0]["cRua"];
	$num = $result[0]["cNumero"];
	$bairro = $result[0]["cBairro"];
	$ref = $result[0]["cPontoReferencia"];
	$cidade = $result[0]["cCidade"];
	$estado = $result[0]["cEstado"];
	$cep = $result[0]["cCep"];

}

if($ref && !empty($ref)) {
	$reference = "($ref)";
} else {
	$reference = '';
}
if ($tel && $cel) {

	if ($dddTel == $dddCel) {
		$telephones = $dddTel . " " . $tel . " | " . $cel;
	} else {
		$telephones = $dddTel . " " . $tel . " | " . $dddCel . " " . $cel;
	}
} elseif ($tel) {
	$telephones = $dddTel . " " . $tel;
} elseif ($cel) {
	$telephones = $dddCel . " " . $cel;
}

$cnpj =  Helpers::formatNumber($cnpj, "xx.xxx.xxx/xxxx-xx");
$cep = Helpers::formatNumber($cep, "xxxxx-xxx");
$address = "$rua, $num - $bairro $reference $cidade / $estado - CEP: $cep";

include 'ohs/pub/views/fornecedor.php';

?>