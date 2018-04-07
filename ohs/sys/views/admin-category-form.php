<?php
/**
 * Formulário exibido para editar itens do config do site
 * @var string $templateString
 */

$templateString = "
	<!-- admin -->
	<style>
	.linha:nth-child(1) {border-top: 2px solid #c00;}
	h1.titulo {color:#000;}
	th {font-weight: bold;}
	td {text-align:center;}
	td:nth-child(1) {text-align:left;}
	input[type=text] {height: 35px !important; width: 300px;}
	</style>

	<!-- categorias -->
	<form class='form-custom cadastre-se' action='index.php' method='post'>
		<input type='hidden' name='p' value='admin'>
		<input type='hidden' name='q' value='categoria-update'>

		<!-- título -->
		<h1 class='titulo'>Categorias do Sistema Novo Ferro</h1>
		<!-- titulo fim -->

		<p>Os nomes e o uso das categorias podem ser editados abaixo. </p>
		<p>Para incluir uma nova categoria, digite o nome no último campo.</p>
		<p>Pra excluir uma categoria, apague seu nome.</p>

		<table cellspacing = '2' cellpadding = '3'>
			<tr>
				<th>Categoria</th>
				<th>Carro</th>
				<th>Caminhão</th>
				<th>Lancha</th>
				<th>Moto</th>
			</tr>
		";

foreach ($data as $key => $value) {
	// loop nos resultados [nSubcategoria,sSubCategoria,sCarro,sCaminhao,sLancha,sMoto]

	$value['sCarro'] ? $sCarroCheck = 'checked' : $sCarroCheck = '';
	$value['sCaminhao'] ? $sCaminhaoCheck = 'checked' : $sCaminhaoCheck = '';
	$value['sLancha'] ? $sLanchaCheck = 'checked' : $sLanchaCheck = '';
	$value['sMoto'] ? $sMotoCheck = 'checked' : $sMotoCheck = '';

	$templateString .= "
		<tr>
			<td><input type = 'text' name = 's[$key]' value='{$value['sSubCategoria']}' ></td>
			<td><input type = 'checkbox' name = 'sCarro[$key]' value = '{$value['sCarro']}' $sCarroCheck></td>
			<td><input type = 'checkbox' name = 'sCaminhao[$key]' value = '{$value['sCaminhao']}' $sCaminhaoCheck></td>
			<td><input type = 'checkbox' name = 'sLancha[$key]' value = '{$value['sLancha']}' $sLanchaCheck></td>
			<td><input type = 'checkbox' name = 'sMoto[$key]' value = '{$value['sMoto']}' $sMotoCheck></td>
		</tr>
		";
}

$templateString .= "
		<tr>
			<td><input type = 'text' name = 'sNovo' placeholder = 'Digite a nova categoria aqui' ></td>
			<td><input type = 'checkbox' name = 'nsCarro' value = '1' checked></td>
			<td><input type = 'checkbox' name = 'nsCaminhao' value = '1'></td>
			<td><input type = 'checkbox' name = 'nsLancha' value = '1'></td>
			<td><input type = 'checkbox' name = 'nsMoto' value = '1'></td>
		</tr>
		<tr>
			<td colspan='5'><input type='submit' value='Atualizar Categorias' class='btn btn-info btn-lg' /></td>
		</tr>
	</table>
	<!-- FIM categorias -->
	</form>
	";
?>