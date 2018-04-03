<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>[CONTEUDO-TITULO]</title>
		<meta name="author" content="www.theoazevedo.com.br" />
		<meta name="Description" content="[CONTEUDO-DESCRIPTION]" />
		<meta name="Keywords" content="[CONTEUDO-KEYWORDS]" />
		<link rel="stylesheet" href="ohs/pub/css/style.css" />
	</head>
	<body>
		<!-- menu mobile -->
		<menu class="menu-mobile">
			<!-- logo menu -->
			<header class="menu-mobile-header">
				<img src="ohs/pub/images/logo.png" alt="" />
			</header>
			<!-- logo menu fim -->
			<ul class="nav">
				<li><a href="#">Menu 01</a></li>
				<li><a href="#">Menu 02</a></li>
				<li><a href="#">Menu 03</a></li>
				<li><a href="#">Menu 04</a></li>
			</ul>
		</menu>
		<!-- menu mobile fim -->
		
		<!-- menu -->
		<nav class="menu">
			<div class="container">
				<!-- off canvas -->
				<div class="off-canvas">
					<a href="#" class="js-open-sidebar"><i class="fa fa-bars"></i>Menu</a>
				</div>
				<!-- off canvas fim -->
				
				<!-- frase versão desktop -->
				<p class="frase">
					<i class="fa fa-user-o"></i> <span>Olá,</span> <a href="#">faça seu login</a> <span>ou</span> <a href="#">cadastre-se</a>
				</p>
				<!-- frase versão desktop fim -->
				
				<!-- logo versão desktop  -->
				<a href="index.php" class="logo"><img src="ohs/pub/images/logo.png" alt="" /></a>
				<!-- logo versão desktop fim -->
				
				<!-- fone versão desktop -->
				<p class="fone"><i class="fa fa-volume-control-phone"></i> 0908.0960 | 6080.0960</p>
				<!-- fone versão desktop fim -->
				
				<!-- carrinho de comrpas -->
				<div class="shopping-cart">
					<a href="#"><i class="fa fa-cart-arrow-down"></i>08</a>
				</div>
			</div>
		</nav>
		<!-- menu fim -->
						
		<!-- topo -->
		<header class="topo">
			<!-- container -->
			<div class="container">
				<!-- logo -->
				<a href="index.php"><img src="ohs/pub/images/logo.png" alt="" /></a>
				<p class="text-center">
					<i class="fa fa-user-o"></i> <span>Olá,</span> <a href="#">faça seu login</a> <span>ou</span> <a href="#">cadastre-se</a>
				</p>
			</div>
			<!-- container fim -->
		</header>
		<!-- topo fim -->

		<!-- cabeçalho -->
		<div class="cabecalho cabecalho-miolo">
			<!-- imagens -->
			<picture>
				<source media="(max-width: 767px)" srcset="ohs/pub/images/cabecalho-miolo-cadastre-se-mobile.jpg" />
				<source media="(min-width: 768px) and (max-width: 1024px)" srcset="ohs/data/interface/cabecalho-miolo-cadastre-se-tablet.jpg" />				
				<img srcset="ohs/pub/images/cabecalho-miolo-cadastre-se-desktop.jpg" alt="" />
			</picture>
			
			<!-- triangulo -->
			<span></span>
			<!-- triangulo -->
			<!-- imagens fim -->
			
			<!-- container -->
			<div class="container">
				<!-- bloco -->
				<div class="bloco linha">
					<!-- título categorias  -->
					<h1>[TITULO-CATEGORIAS]</h1>
					<!-- título categorias  fim -->

					<!-- buscar -->
					<form action="" method="get">
						<div class="bloco">
							<input type="text" class="form-control form-control-lg" placeholder="O que você procura?" />
							<i class="fa fa-search"></i>
							<input type="submit" value="Buscar" />
						</div>
					</form>
					<!-- buscar fim -->
				</div>
				<!-- bloco fim -->
			</div>
			<!-- container -->
		</div>
		<!-- cabeçalho fim -->
		
		<!-- conteúdo -->
		<main class="conteudo oficina">
			<!-- container -->
			<div class="container">
				<!-- linha -->
				<div class="linha">
					<!-- migalha de pão -->
					<nav class="breadcrumb migalha-de-pao">
						<a class="breadcrumb-item" href="#">Home</a>
						<span class="breadcrumb-item active">Oficina</span>
					</nav>
					<!-- migalha de pão fim -->
					
					<!-- titulo -->
                   <div class="col-topo">
                        <hgroup>
                            <h1>Encontre uma oficina próxima</h1>
                            <h6>Encontrados 128 oficina(s)</h6>
                        </hgroup>
                    </div>
                    <!-- titulo fim -->
					
					<!-- mapa -->
                    <div class="mapa">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
				    <!-- mapa fim -->
				    
				    <!-- listagem -->
				    <div class="listagem js-quadrado">
                        
                       <!-- linha -->
                        <div class="linha">
                            <!-- oficinas -->
                            <?php
                            //foreach
                            $htmlOficinas = '';
                            for ($i = 0; $i < count($oficinas); $i++) {
                                $htmlOficinas .= "
                                <article>
                                    <figure>
                                        <img src='http://via.placeholder.com/350x150' alt='' />
                                    </figure>

                                    <hgroup>
                                        <h1>{$oficinas[$i]['cRazaoSocial']}</h1>
                                    </hgroup>

                                    <div class='bts'>
                                        <strong data-toggle='modal' data-target='#Modal-1'>Conhecer</strong>
                                        <a href='#'><i class='fa fa-cart-arrow-down'></i></a>
                                    </div>
                                </article>
                                ";
                            }
                            
                            echo $htmlOficinas;
                            ?>
                        </div>
                        <!-- linha fim -->
                        
                        <!-- linha 2 -->
                        <div class="linha">
                            <article>
                                <figure>
                                    <img src="http://via.placeholder.com/350x150" alt="" />
                                </figure>

                                <hgroup>
                                    <h1>Turbo oficina 05</h1>
                                </hgroup>

                                <div class="bts">
                                    <strong data-toggle="modal" data-target="#Modal-5">Conhecer</strong>
                                    <a href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                </div>
                            </article>
                            <article>
                                <figure>
                                    <img src="http://via.placeholder.com/350x150" alt="" />
                                </figure>

                                <hgroup>
                                    <h1>Oficina virtual 06</h1>
                                </hgroup>

                                <div class="bts">
                                    <strong data-toggle="modal" data-target="#Modal-6">Conhecer</strong>
                                    <a href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                </div>
                            </article>
                            <article>
                                <figure>
                                    <img src="http://via.placeholder.com/350x150" alt="" />
                                </figure>

                                <hgroup>
                                    <h1>Pro-r motoparts 07</h1>
                                </hgroup>

                                <div class="bts">
                                    <strong data-toggle="modal" data-target="#Modal-7">Conhecer</strong>
                                    <a href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                </div>
                            </article>
                            <article>
                                <figure>
                                    <img src="http://via.placeholder.com/350x150" alt="" />
                                </figure>

                                <hgroup>
                                    <h1>Oficina do tenista 08</h1>
                                </hgroup>

                                <div class="bts">
                                    <strong data-toggle="modal" data-target="#Modal-8">Conhecer</strong>
                                    <a href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                </div>
                            </article>
                        </div>
                        <!-- linha fim -->
                        
                        <!-- linha 3 -->
                        <div class="linha">
                            <article>
                                <figure>
                                    <img src="http://via.placeholder.com/350x150" alt="" />
                                </figure>

                                <hgroup>
                                    <h1>Turbo oficina 09</h1>
                                </hgroup>

                                <div class="bts">
                                    <strong data-toggle="modal" data-target="#Modal-9">Conhecer</strong>
                                    <a href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                </div>
                            </article>
                            <article>
                                <figure>
                                    <img src="http://via.placeholder.com/350x150" alt="" />
                                </figure>

                                <hgroup>
                                    <h1>Oficina virtual 10</h1>
                                </hgroup>

                                <div class="bts">
                                    <strong data-toggle="modal" data-target="#Modal-10">Conhecer</strong>
                                    <a href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                </div>
                            </article>
                            <article>
                                <figure>
                                    <img src="http://via.placeholder.com/350x150" alt="" />
                                </figure>

                                <hgroup>
                                    <h1>Pro-r motoparts 11</h1>
                                </hgroup>

                                <div class="bts">
                                    <strong data-toggle="modal" data-target="#Modal-11">Conhecer</strong>
                                    <a href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                </div>
                            </article>
                            <article>
                                <figure>
                                    <img src="http://via.placeholder.com/350x150" alt="" />
                                </figure>

                                <hgroup>
                                    <h1>Oficina do tenista 12</h1>
                                </hgroup>

                                <div class="bts">
                                    <strong data-toggle="modal" data-target="#Modal-12">Conhecer</strong>
                                    <a href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                </div>
                            </article>
                        </div>
                        <!-- linha fim -->
                        
                        <!-- modal -->
                        <div class="modal-body">
                                <div class="modal fade" id="Modal-1" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">        
                                               <div class="bloco">
                                                    <a href="" class="bts"><i class="fa fa-cart-arrow-down"></i></a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">fechar | &times;</span>
                                                    </button>
                                                </div>
                                                <h1 class="modal-title titulo">Turbo oficina 01</h1>
                                            </div>
                                            <div class="modal-body">
                                                <!-- linha -->
                                                <div class="linha">
                                                    <!-- coluna meio -->
                                                    <div class="col-meio-modal">
                                                        <ul>
                                                            <li>CNPJ: 07.413.835/0001-12</li>
                                                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>00 0908.0960 | 6080.0960</strong></li>
                                                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> contato@abreumotopecas.com.br</li>
                                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Rua Vitória, 676 - Santa Efigênia (Próximo a Rua General Osório e ao Metrô Republica) São Paulo / SP - CEP: 01210-002</p></li>
                                                        </ul>
                                                    </div>
                                                    <!-- coluna meio fim -->

                                                    <!-- coluna direita -->
                                                    <div class="col-dir-modal">
                                                        <img src="http://via.placeholder.com/226x153" alt="">
                                                    </div>
                                                    <!-- coluna direita fim -->
                                                </div>
                                                <!-- linha fim -->
                                            </div>
                                            <div class="modal-footer">
                                                <!-- mapa -->
                                                <div class="linha">
                                                    <div class="mapa">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <!-- mapa fim -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal fim -->
                        
                        <!-- modal -->
                        <div class="modal-body">
                                <div class="modal fade" id="Modal-2" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">        
                                               <div class="bloco">
                                                    <a href="" class="bts"><i class="fa fa-cart-arrow-down"></i></a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">fechar | &times;</span>
                                                    </button>
                                                </div>
                                                <h1 class="modal-title titulo">Oficina virtual 02</h1>
                                            </div>
                                            <div class="modal-body">
                                                <!-- linha -->
                                                <div class="linha">
                                                    <!-- coluna meio -->
                                                    <div class="col-meio-modal">
                                                        <ul>
                                                            <li>CNPJ: 07.413.835/0001-12</li>
                                                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>00 0908.0960 | 6080.0960</strong></li>
                                                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> contato@abreumotopecas.com.br</li>
                                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Rua Vitória, 676 - Santa Efigênia (Próximo a Rua General Osório e ao Metrô Republica) São Paulo / SP - CEP: 01210-002</p></li>
                                                        </ul>
                                                    </div>
                                                    <!-- coluna meio fim -->

                                                    <!-- coluna direita -->
                                                    <div class="col-dir-modal">
                                                        <img src="http://via.placeholder.com/226x153" alt="">
                                                    </div>
                                                    <!-- coluna direita fim -->
                                                </div>
                                                <!-- linha fim -->
                                            </div>
                                            <div class="modal-footer">
                                                <!-- mapa -->
                                                <div class="linha">
                                                    <div class="mapa">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <!-- mapa fim -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal fim -->
                        
                        <!-- modal -->
                        <div class="modal-body">
                                <div class="modal fade" id="Modal-3" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">        
                                               <div class="bloco">
                                                    <a href="" class="bts"><i class="fa fa-cart-arrow-down"></i></a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">fechar | &times;</span>
                                                    </button>
                                                </div>
                                                <h1 class="modal-title titulo">Pro-r motoparts 03</h1>
                                            </div>
                                            <div class="modal-body">
                                                <!-- linha -->
                                                <div class="linha">
                                                    <!-- coluna meio -->
                                                    <div class="col-meio-modal">
                                                        <ul>
                                                            <li>CNPJ: 07.413.835/0001-12</li>
                                                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>00 0908.0960 | 6080.0960</strong></li>
                                                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> contato@abreumotopecas.com.br</li>
                                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Rua Vitória, 676 - Santa Efigênia (Próximo a Rua General Osório e ao Metrô Republica) São Paulo / SP - CEP: 01210-002</p></li>
                                                        </ul>
                                                    </div>
                                                    <!-- coluna meio fim -->

                                                    <!-- coluna direita -->
                                                    <div class="col-dir-modal">
                                                        <img src="http://via.placeholder.com/226x153" alt="">
                                                    </div>
                                                    <!-- coluna direita fim -->
                                                </div>
                                                <!-- linha fim -->
                                            </div>
                                            <div class="modal-footer">
                                                <!-- mapa -->
                                                <div class="linha">
                                                    <div class="mapa">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <!-- mapa fim -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal fim -->
                        
                        <!-- modal -->
                        <div class="modal-body">
                                <div class="modal fade" id="Modal-4" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">        
                                               <div class="bloco">
                                                    <a href="" class="bts"><i class="fa fa-cart-arrow-down"></i></a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">fechar | &times;</span>
                                                    </button>
                                                </div>
                                                <h1 class="modal-title titulo">Oficina do tenista 04</h1>
                                            </div>
                                            <div class="modal-body">
                                                <!-- linha -->
                                                <div class="linha">
                                                    <!-- coluna meio -->
                                                    <div class="col-meio-modal">
                                                        <ul>
                                                            <li>CNPJ: 07.413.835/0001-12</li>
                                                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>00 0908.0960 | 6080.0960</strong></li>
                                                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> contato@abreumotopecas.com.br</li>
                                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Rua Vitória, 676 - Santa Efigênia (Próximo a Rua General Osório e ao Metrô Republica) São Paulo / SP - CEP: 01210-002</p></li>
                                                        </ul>
                                                    </div>
                                                    <!-- coluna meio fim -->

                                                    <!-- coluna direita -->
                                                    <div class="col-dir-modal">
                                                        <img src="http://via.placeholder.com/226x153" alt="">
                                                    </div>
                                                    <!-- coluna direita fim -->
                                                </div>
                                                <!-- linha fim -->
                                            </div>
                                            <div class="modal-footer">
                                                <!-- mapa -->
                                                <div class="linha">
                                                    <div class="mapa">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <!-- mapa fim -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal fim -->
                        
                        <!-- modal -->
                        <div class="modal-body">
                                <div class="modal fade" id="Modal-5" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">        
                                               <div class="bloco">
                                                    <a href="" class="bts"><i class="fa fa-cart-arrow-down"></i></a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">fechar | &times;</span>
                                                    </button>
                                                </div>
                                                <h1 class="modal-title titulo">Oficina do tenista 05</h1>
                                            </div>
                                            <div class="modal-body">
                                                <!-- linha -->
                                                <div class="linha">
                                                    <!-- coluna meio -->
                                                    <div class="col-meio-modal">
                                                        <ul>
                                                            <li>CNPJ: 07.413.835/0001-12</li>
                                                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>00 0908.0960 | 6080.0960</strong></li>
                                                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> contato@abreumotopecas.com.br</li>
                                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Rua Vitória, 676 - Santa Efigênia (Próximo a Rua General Osório e ao Metrô Republica) São Paulo / SP - CEP: 01210-002</p></li>
                                                        </ul>
                                                    </div>
                                                    <!-- coluna meio fim -->

                                                    <!-- coluna direita -->
                                                    <div class="col-dir-modal">
                                                        <img src="http://via.placeholder.com/226x153" alt="">
                                                    </div>
                                                    <!-- coluna direita fim -->
                                                </div>
                                                <!-- linha fim -->
                                            </div>
                                            <div class="modal-footer">
                                                <!-- mapa -->
                                                <div class="linha">
                                                    <div class="mapa">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <!-- mapa fim -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal fim -->
                        
                        <!-- modal -->
                        <div class="modal-body">
                                <div class="modal fade" id="Modal-6" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">        
                                               <div class="bloco">
                                                    <a href="" class="bts"><i class="fa fa-cart-arrow-down"></i></a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">fechar | &times;</span>
                                                    </button>
                                                </div>
                                                <h1 class="modal-title titulo">Oficina do tenista 06</h1>
                                            </div>
                                            <div class="modal-body">
                                                <!-- linha -->
                                                <div class="linha">
                                                    <!-- coluna meio -->
                                                    <div class="col-meio-modal">
                                                        <ul>
                                                            <li>CNPJ: 07.413.835/0001-12</li>
                                                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>00 0908.0960 | 6080.0960</strong></li>
                                                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> contato@abreumotopecas.com.br</li>
                                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Rua Vitória, 676 - Santa Efigênia (Próximo a Rua General Osório e ao Metrô Republica) São Paulo / SP - CEP: 01210-002</p></li>
                                                        </ul>
                                                    </div>
                                                    <!-- coluna meio fim -->

                                                    <!-- coluna direita -->
                                                    <div class="col-dir-modal">
                                                        <img src="http://via.placeholder.com/226x153" alt="">
                                                    </div>
                                                    <!-- coluna direita fim -->
                                                </div>
                                                <!-- linha fim -->
                                            </div>
                                            <div class="modal-footer">
                                                <!-- mapa -->
                                                <div class="linha">
                                                    <div class="mapa">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <!-- mapa fim -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal fim -->
                        
                        <!-- modal -->
                        <div class="modal-body">
                                <div class="modal fade" id="Modal-7" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">        
                                               <div class="bloco">
                                                    <a href="" class="bts"><i class="fa fa-cart-arrow-down"></i></a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">fechar | &times;</span>
                                                    </button>
                                                </div>
                                                <h1 class="modal-title titulo">Oficina do tenista 07</h1>
                                            </div>
                                            <div class="modal-body">
                                                <!-- linha -->
                                                <div class="linha">
                                                    <!-- coluna meio -->
                                                    <div class="col-meio-modal">
                                                        <ul>
                                                            <li>CNPJ: 07.413.835/0001-12</li>
                                                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>00 0908.0960 | 6080.0960</strong></li>
                                                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> contato@abreumotopecas.com.br</li>
                                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Rua Vitória, 676 - Santa Efigênia (Próximo a Rua General Osório e ao Metrô Republica) São Paulo / SP - CEP: 01210-002</p></li>
                                                        </ul>
                                                    </div>
                                                    <!-- coluna meio fim -->

                                                    <!-- coluna direita -->
                                                    <div class="col-dir-modal">
                                                        <img src="http://via.placeholder.com/226x153" alt="">
                                                    </div>
                                                    <!-- coluna direita fim -->
                                                </div>
                                                <!-- linha fim -->
                                            </div>
                                            <div class="modal-footer">
                                                <!-- mapa -->
                                                <div class="linha">
                                                    <div class="mapa">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <!-- mapa fim -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal fim -->
                        
                        <!-- modal -->
                        <div class="modal-body">
                                <div class="modal fade" id="Modal-8" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">        
                                               <div class="bloco">
                                                    <a href="" class="bts"><i class="fa fa-cart-arrow-down"></i></a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">fechar | &times;</span>
                                                    </button>
                                                </div>
                                                <h1 class="modal-title titulo">Oficina do tenista 08</h1>
                                            </div>
                                            <div class="modal-body">
                                                <!-- linha -->
                                                <div class="linha">
                                                    <!-- coluna meio -->
                                                    <div class="col-meio-modal">
                                                        <ul>
                                                            <li>CNPJ: 07.413.835/0001-12</li>
                                                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>00 0908.0960 | 6080.0960</strong></li>
                                                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> contato@abreumotopecas.com.br</li>
                                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Rua Vitória, 676 - Santa Efigênia (Próximo a Rua General Osório e ao Metrô Republica) São Paulo / SP - CEP: 01210-002</p></li>
                                                        </ul>
                                                    </div>
                                                    <!-- coluna meio fim -->

                                                    <!-- coluna direita -->
                                                    <div class="col-dir-modal">
                                                        <img src="http://via.placeholder.com/226x153" alt="">
                                                    </div>
                                                    <!-- coluna direita fim -->
                                                </div>
                                                <!-- linha fim -->
                                            </div>
                                            <div class="modal-footer">
                                                <!-- mapa -->
                                                <div class="linha">
                                                    <div class="mapa">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <!-- mapa fim -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal fim -->
                        
                        <!-- modal -->
                        <div class="modal-body">
                                <div class="modal fade" id="Modal-9" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">        
                                               <div class="bloco">
                                                    <a href="" class="bts"><i class="fa fa-cart-arrow-down"></i></a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">fechar | &times;</span>
                                                    </button>
                                                </div>
                                                <h1 class="modal-title titulo">Oficina do tenista 09</h1>
                                            </div>
                                            <div class="modal-body">
                                                <!-- linha -->
                                                <div class="linha">
                                                    <!-- coluna meio -->
                                                    <div class="col-meio-modal">
                                                        <ul>
                                                            <li>CNPJ: 07.413.835/0001-12</li>
                                                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>00 0908.0960 | 6080.0960</strong></li>
                                                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> contato@abreumotopecas.com.br</li>
                                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Rua Vitória, 676 - Santa Efigênia (Próximo a Rua General Osório e ao Metrô Republica) São Paulo / SP - CEP: 01210-002</p></li>
                                                        </ul>
                                                    </div>
                                                    <!-- coluna meio fim -->

                                                    <!-- coluna direita -->
                                                    <div class="col-dir-modal">
                                                        <img src="http://via.placeholder.com/226x153" alt="">
                                                    </div>
                                                    <!-- coluna direita fim -->
                                                </div>
                                                <!-- linha fim -->
                                            </div>
                                            <div class="modal-footer">
                                                <!-- mapa -->
                                                <div class="linha">
                                                    <div class="mapa">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <!-- mapa fim -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal fim -->
                        
                        <!-- modal -->
                        <div class="modal-body">
                                <div class="modal fade" id="Modal-10" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">        
                                               <div class="bloco">
                                                    <a href="" class="bts"><i class="fa fa-cart-arrow-down"></i></a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">fechar | &times;</span>
                                                    </button>
                                                </div>
                                                <h1 class="modal-title titulo">Oficina do tenista 10</h1>
                                            </div>
                                            <div class="modal-body">
                                                <!-- linha -->
                                                <div class="linha">
                                                    <!-- coluna meio -->
                                                    <div class="col-meio-modal">
                                                        <ul>
                                                            <li>CNPJ: 07.413.835/0001-12</li>
                                                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>00 0908.0960 | 6080.0960</strong></li>
                                                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> contato@abreumotopecas.com.br</li>
                                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Rua Vitória, 676 - Santa Efigênia (Próximo a Rua General Osório e ao Metrô Republica) São Paulo / SP - CEP: 01210-002</p></li>
                                                        </ul>
                                                    </div>
                                                    <!-- coluna meio fim -->

                                                    <!-- coluna direita -->
                                                    <div class="col-dir-modal">
                                                        <img src="http://via.placeholder.com/226x153" alt="">
                                                    </div>
                                                    <!-- coluna direita fim -->
                                                </div>
                                                <!-- linha fim -->
                                            </div>
                                            <div class="modal-footer">
                                                <!-- mapa -->
                                                <div class="linha">
                                                    <div class="mapa">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <!-- mapa fim -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal fim -->
                        
                        <!-- modal -->
                        <div class="modal-body">
                                <div class="modal fade" id="Modal-11" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">        
                                               <div class="bloco">
                                                    <a href="" class="bts"><i class="fa fa-cart-arrow-down"></i></a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">fechar | &times;</span>
                                                    </button>
                                                </div>
                                                <h1 class="modal-title titulo">Oficina do tenista 11</h1>
                                            </div>
                                            <div class="modal-body">
                                                <!-- linha -->
                                                <div class="linha">
                                                    <!-- coluna meio -->
                                                    <div class="col-meio-modal">
                                                        <ul>
                                                            <li>CNPJ: 07.413.835/0001-12</li>
                                                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>00 0908.0960 | 6080.0960</strong></li>
                                                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> contato@abreumotopecas.com.br</li>
                                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Rua Vitória, 676 - Santa Efigênia (Próximo a Rua General Osório e ao Metrô Republica) São Paulo / SP - CEP: 01210-002</p></li>
                                                        </ul>
                                                    </div>
                                                    <!-- coluna meio fim -->

                                                    <!-- coluna direita -->
                                                    <div class="col-dir-modal">
                                                        <img src="http://via.placeholder.com/226x153" alt="">
                                                    </div>
                                                    <!-- coluna direita fim -->
                                                </div>
                                                <!-- linha fim -->
                                            </div>
                                            <div class="modal-footer">
                                                <!-- mapa -->
                                                <div class="linha">
                                                    <div class="mapa">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <!-- mapa fim -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal fim -->
                        
                        <!-- modal -->
                        <div class="modal-body">
                                <div class="modal fade" id="Modal-12" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">        
                                               <div class="bloco">
                                                    <a href="" class="bts"><i class="fa fa-cart-arrow-down"></i></a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">fechar | &times;</span>
                                                    </button>
                                                </div>
                                                <h1 class="modal-title titulo">Oficina do tenista 12</h1>
                                            </div>
                                            <div class="modal-body">
                                                <!-- linha -->
                                                <div class="linha">
                                                    <!-- coluna meio -->
                                                    <div class="col-meio-modal">
                                                        <ul>
                                                            <li>CNPJ: 07.413.835/0001-12</li>
                                                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>00 0908.0960 | 6080.0960</strong></li>
                                                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> contato@abreumotopecas.com.br</li>
                                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Rua Vitória, 676 - Santa Efigênia (Próximo a Rua General Osório e ao Metrô Republica) São Paulo / SP - CEP: 01210-002</p></li>
                                                        </ul>
                                                    </div>
                                                    <!-- coluna meio fim -->

                                                    <!-- coluna direita -->
                                                    <div class="col-dir-modal">
                                                        <img src="http://via.placeholder.com/226x153" alt="">
                                                    </div>
                                                    <!-- coluna direita fim -->
                                                </div>
                                                <!-- linha fim -->
                                            </div>
                                            <div class="modal-footer">
                                                <!-- mapa -->
                                                <div class="linha">
                                                    <div class="mapa">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <!-- mapa fim -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal fim -->
                    </div>
				    <!-- listagem -->
				    
				</div>
				<!-- linha fim -->
			</div>
			<!-- container fim -->
		</main>
		<!-- conteúdo fim -->
		
		<!-- rodapé -->
		<footer class="rodape">
			<!-- container -->
			<div class="container">
				<figure>
					<img src="ohs/pub/images/logo-branco.png" alt="" />
				</figure>
				<!-- fone -->
				<p><i class="fa fa-volume-control-phone"></i> 0908.0960 | 6080.0960</p>
				<!-- fone fim -->

				<!-- ícones redes sociais -->
				<aside>
					<a href="#" target="facebook"><i class="fa fa-facebook"></i></a>
					<a href="#" target="google+"><i class="fa fa-google-plus"></i></a>
					<a href="#" target="instagram"><i class="fa fa-instagram"></i></a>
				</aside>
				<!-- ícones redes sociais fim -->
			</div>
			<!-- container fim -->
		</footer>
		<!-- rodapé fim -->
	</body>
</html>
<script src="ohs/pub/js/main.js"></script>
<script src="ohs/pub/js/app.js"></script>