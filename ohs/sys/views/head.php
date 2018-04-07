<?php

$cabeca = "
<!DOCTYPE html>
<html lang='pt-br'>
	<head>
		<meta charset='UTF-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1' />
		<title>[CONTEUDO-TITULO]</title>
		<meta name='author' content='www.theoazevedo.com.br' />
		<meta name='Description' content='[CONTEUDO-DESCRIPTION]' />
		<meta name='Keywords' content='[CONTEUDO-KEYWORDS]' />
		<link rel='stylesheet' href='ohs/pub/css/style.css' />
		<script src='ohs/pub/js/axios.min.js' type='text/javascript'></script>
	</head>
	<body>
	";

if ($_SESSION['isadmin'] == 1) {
	// sessão de admin
	$cabeca .= "
			<!-- menu mobile -->
			<menu class='menu-mobile'>
				<!-- logo menu -->
				<header class='menu-mobile-header'>
					<a href='index.php'><img src='ohs/pub/images/logo.png' alt='' /></a>
				</header>
				<!-- logo menu fim -->
				<ul class='nav'>
					<li><a href='index.php?p=admin&q=overview'>Visão Geral</a></li>
					<li><a href='index.php?p=admin&q=config'>Config</a></li>
					<li><a href='index.php?p=admin&q=categoria'>Categorias</a></li>
					<li><a href='index.php?p=admin&q=cadastro'>Cadastros</a></li>
					<li><a href='index.php?p=admin&q=quem-somos'>Página: Quem Somos</a></li>
				</ul>
			</menu>
			<!-- menu mobile fim -->
		";

} else {
	// sessão de usuário
	$cabeca .= "
			<!-- menu mobile -->
			<menu class='menu-mobile'>
				<!-- logo menu -->
				<header class='menu-mobile-header'>
					<img src='ohs/pub/images/logo.png' alt='' />
				</header>
				<!-- logo menu fim -->
				<ul class='nav'>
					<li><a href='index.php?p=item&q=list&iCategory=carro'>Peças/Carros</a></li>
					<li><a href='index.php?p=item&q=list&iCategory=lancha'>Peça/Lancha e Jets</a></li>
					<li><a href='index.php?p=item&q=list&iCategory=caminhao'>Peça/Caminhões</a></li>
					<li><a href='index.php?p=item&q=list&iCategory=moto'>Peça/Motos</a></li>
					<li><a href='index.php?p=cadastro&q=show&cType=o'>Oficinas</a></li>
					<li><a href='index.php?p=cadastro'>Cadastre-se</a></li>
					<li><a href='index.php?p=quem-somos'>Quem somos</a></li>
					<li><a href='index.php?p=contato'>Contato</a></li>
				</ul>
			</menu>
			<!-- menu mobile fim -->
		";
}

?>