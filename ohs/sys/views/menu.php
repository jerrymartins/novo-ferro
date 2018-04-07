<?php
if ($_SESSION["logado"] == false) {
	$links = "<i class='fa fa-user-o'></i> <span>Olá,</span> <a href='#' onclick='showModalLogin();'>faça seu login</a> <span>ou</span> <a href='index.php?p=cadastro'>cadastre-se</a>";
} else {
	$links = "<a href='index.php?p=cadastro&q=show&nC={$_SESSION['id']}'><i class='fa fa-user-o'></i></a> <a href='index.php?p=cadastro&q=show&nC={$_SESSION['id']}'><span>{$_SESSION['usuario']}</span></a> <a href='index.php?p=cadastro&q=logout' >sair</a>";
}

//total de itens no carrinho
$totalReport = count($_SESSION["relatorio"]);

$link = "<a href='index.php?p=relatorio'><i class='fa fa-cart-arrow-down'></i>$totalReport</a>";

if ($totalReport == 0) {
	$link = "<a href='#'><i class='fa fa-cart-arrow-down'></i>$totalReport</a>";
}



$templateString = "
		<!-- menu -->
		<nav class='menu'>
			<div class='container'>
				<!-- off canvas -->
				<div class='off-canvas'>
					<a href='#' class='js-open-sidebar'><i class='fa fa-bars'></i>Menu</a>
				</div>
				<!-- off canvas fim -->
				
				<!-- frase versão desktop -->
				<p class='frase'>
					$links
				</p>
				<!-- frase versão desktop fim -->
				
				<!-- logo versão desktop  -->
				<a href='index.php?p=index' class='logo'><img src='ohs/pub/images/logo.png' alt='' /></a>
				<!-- logo versão desktop fim -->
				
				<!-- fone versão desktop -->
				<p class='fone'><i class='fa fa-volume-control-phone'></i> ".OHS_TELEFONESITE."</p>
				<!-- fone versão desktop fim -->
				
				<!-- carrinho de compras -->
				<div class='shopping-cart'>
					$link
				</div>
			</div>
		</nav>
		<!-- menu fim -->


						
		<!-- topo -->
		<header class='topo'>
			<!-- container -->
			<div class='container'>
				<!-- logo -->
				<a href='index.php?p=index'><img src='ohs/pub/images/logo.png' alt='' /></a>
				<p class='text-center'>
					$links
				</p>
			</div>
			<!-- container fim -->
		</header>
		<!-- topo fim -->

	";

?>