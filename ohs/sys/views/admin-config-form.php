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
	</style>

	<!-- config -->
	<form class='form-custom cadastre-se' action='index.php' method='post'>
		<input type='hidden' name='p' value='admin'>
		<input type='hidden' name='q' value='config-update'>

		<!-- título -->
		<h1 class='titulo'>Configuração do sistema Novo Ferro</h1>
		<!-- titulo fim -->
		";

foreach ($data as $key => $value) {
	// loop nos resultados [nConfig,configName,configValue,configDescription]
	$value['configDescription'] = utf8_encode($value['configDescription']);

	$templateString .= "
		<!-- linha -->
		<div class='linha'>
			<!-- coluna esquerda -->
			<div class='col-esq'>
				<div class='form-group'>
					<label class='sr-onlyy'>{$value['configDescription']}</label>
				</div>
			</div>
			<!-- coluna esquerda fim -->

			<!-- coluna meio -->
			<!-- coluna meio fim -->

			<!-- coluna direita -->
			<div class='col-dir'>
				<div class='form-group'>
					<input type='text' name='c[{$value['nConfig']}]' class='form-control' value='{$value['configValue']}' >
				</div>
			</div>
			<!-- coluna direita fim -->
		</div>
		<!-- linha fim -->


		";
}

$templateString .= "
		<!-- botão enviar -->
		<div class='linha'>
			<div class='col-esq'>
				<div class='form-group'>
					
				</div>
			</div>
			<div class='col-dir'>
				<div class='form-group'>
					<input type='submit' value='Atualizar Configuração' class='btn btn-info btn-lg' />
				</div>
			</div>
		</div>
		<!-- botão enviar fim -->
	</form>
	<!-- cadastre-se fim -->
	";
?>