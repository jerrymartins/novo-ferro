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
				<source media="(min-width: 768px) and (max-width: 1024px)" srcset="ohs/pub/images/cabecalho-miolo-cadastre-se-tablet.jpg" />				
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
		<main class="conteudo fornecedor">
			<!-- container -->
			<div class="container">
				<!-- linha -->
				<div class="linha">
					<!-- migalha de pão -->
					<nav class="breadcrumb migalha-de-pao">
						<a class="breadcrumb-item" href="#">Home</a>
						<span class="breadcrumb-item active">Área do Fornecedor</span>
					</nav>
					<!-- migalha de pão fim -->
					
					<!-- dados do fornecedor -->
					<div class="dados-fornecedor">
					    <!-- logo -->
					    <figure><img src="http://via.placeholder.com/260x215" /></figure>
					    <!-- logo fim -->
					    
					    <!-- dados cadastrais -->
					    <article>
					        <h1 class="titulo"><?php echo $name ?></h1>
					         <ul>
                                <li>CNPJ: <?php echo $cnpj ?></li>
                                <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong><?php echo $telephones ?></strong></li>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $email ?></li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p><?php echo $address ?></p></li>
                            </ul>
					    </article>
					    <!-- dados cadastrais fim -->
					    
					    <!-- botão editar -->
					    <div class="bt-editar">
					        <a href="" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Editar dados da empresa</a>
					    </div>
					    <!-- botão editar fim -->
					</div>
					<!-- dados do fornecedor fim -->
					
					<!-- mapa -->
                    <div class="mapa">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31872.173996252954!2d-59.985483200000004!3d-3.0888671999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1504236737376" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
				    <!-- mapa fim -->
				    
				    <!-- produtos cadastrados -->
				    <section class="produtos-cadastrados">
                        <div class="linha">
				            <h1 class="titulo">Produtos cadastrados</h1>
				            <div class="bt-editar">
				                <a href="" class="btn btn-info" data-toggle="modal" data-target="#Modal-1"><i class="fa fa-pencil-square-o"></i> Cadastrar Novo Produto</a>
				            </div> 
				        </div>
				        <!-- listagem de produtos cadastrados -->
				        <div class="linha">
				            <div class="bloco">
                               <article>
                                <figure>
                                    <img src="http://via.placeholder.com/205x150" alt="" />
                                </figure>
                                
                                <div class="bloco">
                                    <hgroup>
                                        <h1>Escapamento Stx 200 Motard R5 - Roncar 01</h1>
                                        <h2>R$ 99,90</h2>
                                    </hgroup>

                                    <div class="bts">
                                        <strong><i class="fa fa-pencil"></i></strong>
                                        <a href="#"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                            </article>
                            </div>
                            <div class="bloco">
                               <article>
                                <figure>
                                    <img src="http://via.placeholder.com/205x150" alt="" />
                                </figure>
                                
                                <div class="bloco">
                                    <hgroup>
                                        <h1>Escapamento Stx 200 Motard R5 - Roncar 01</h1>
                                        <h2>R$ 99,90</h2>
                                    </hgroup>

                                    <div class="bts">
                                        <strong><i class="fa fa-pencil"></i></strong>
                                        <a href="#"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                            </article>
                            </div>
                            <div class="bloco">
                               <article>
                                <figure>
                                    <img src="http://via.placeholder.com/205x150" alt="" />
                                </figure>
                                
                                <div class="bloco">
                                    <hgroup>
                                        <h1>Escapamento Stx 200 Motard R5 - Roncar 01</h1>
                                        <h2>R$ 99,90</h2>
                                    </hgroup>

                                    <div class="bts">
                                        <strong><i class="fa fa-pencil"></i></strong>
                                        <a href="#"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                            </article>
                            </div>
                            <div class="bloco">
                               <article>
                                <figure>
                                    <img src="http://via.placeholder.com/205x150" alt="" />
                                </figure>
                                
                                <div class="bloco">
                                    <hgroup>
                                        <h1>Escapamento Stx 200 Motard R5 - Roncar 01</h1>
                                        <h2>R$ 99,90</h2>
                                    </hgroup>

                                    <div class="bts">
                                        <strong><i class="fa fa-pencil"></i></strong>
                                        <a href="#"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                            </article>
                            </div>
                            <div class="bloco">
                               <article>
                                <figure>
                                    <img src="http://via.placeholder.com/205x150" alt="" />
                                </figure>
                                
                                <div class="bloco">
                                    <hgroup>
                                        <h1>Escapamento Stx 200 Motard R5 - Roncar 01</h1>
                                        <h2>R$ 99,90</h2>
                                    </hgroup>

                                    <div class="bts">
                                        <strong><i class="fa fa-pencil"></i></strong>
                                        <a href="#"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                            </article>
                            </div>
                            <div class="bloco">
                               <article>
                                <figure>
                                    <img src="http://via.placeholder.com/205x150" alt="" />
                                </figure>
                                
                                <div class="bloco">
                                    <hgroup>
                                        <h1>Escapamento Stx 200 Motard R5 - Roncar 01</h1>
                                        <h2>R$ 99,90</h2>
                                    </hgroup>

                                    <div class="bts">
                                        <strong><i class="fa fa-pencil"></i></strong>
                                        <a href="#"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                            </article>
                            </div>
                            
                            <!-- paginação -->
                            <nav class="paginacao">
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                    <li><a href="#" class="ativo">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </nav>
                            <!-- paginação fim -->
				        </div>
				        <!-- listagem de produtos cadastrados fim -->
				        
				        <!-- modal -->
                            <div class="modal-body">
                                <div class="modal fade" id="Modal-1" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">        
                                               <div class="bloco">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">fechar | &times;</span>
                                                    </button>
                                                </div>
                                                <h1 class="modal-title titulo">Cadastrar produtos</h1>
                                            </div>
                                            <div class="modal-body">
                                                <!-- linha -->
                                                <div class="linha">
                                                    <!-- coluna meio -->
                                                    <div class="col-meio-modal">
                                                        
                                                        <form class="form-custom" method="post" action="index.php">
                                                            <input type="hidden" name="p" value="cadastro">
                                                            <input type="hidden" name="q" value="formItem">
                                                            <!-- linha novo ou usado -->
                                                            <div class="linha">
                                                                <div class="col-esq">
                                                                    <div class="form-group">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="radio" name="iEstado" id="inlineRadio1" value="novo"> Novo
                                                                        </label>

                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="radio" name="iEstado" id="inlineRadio1" value="seminovo"> Usados
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- linha novo ou usado fim -->
                                                            
                                                            <!-- linha categoria e sub-categoria -->
                                                            <div class="linha desktop">
                                                                <div class="col-esq">
                                                                    <div class="form-group">
                                                                        <select class="form-control form-control" name="iCategoria">
                                                                            <option value="carro">Carro</option>
                                                                            <option value="moto">Moto</option>
                                                                            <option value="lancha">Lancha</option>
                                                                            <option value="caminhao">Caminhão</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-dir">
                                                                    <div class="form-group">
                                                                        <!-- inicio ohs:form:categorias -->
                                                                        <?php
                                                                        use OHS\NF\Helpers\Helpers;
                                                                        echo Helpers::selectCategorias('iSubcategoria', '', 'form-control form-control');
                                                                        ?>
                                                                        <!-- fim ohs:form:categorias -->

                                                                        <!--<select class="form-control form-control">
                                                                            <option>Selecionar Sub-categoria</option>
                                                                        </select>-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- linha categoria e sub-categoria fim -->
                                                            
                                                            <!-- linha produto e valor -->
                                                            <div class="linha desktop">
                                                                <div class="col-esq">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="iTitulo" placeholder="Nome do produto" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-dir">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="iPreco" placeholder="Valor R$" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- linha produto e valor fim -->
                                                            
                                                            <!-- linha carregar imagem do produto -->
                                                            <div class="linha">
                                                                <div class="col-esq">
                                                                    <div class="form-group">
                                                                        <label class="custom-file">
                                                                            <input type="file" id="file" class="custom-file-input">
                                                                            <span class="custom-file-control br"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                                                        </label> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- linha carregar imagem do produto -->
                                                            
                                                            <!-- linha cadastrar -->
                                                            <div class="linha">
                                                                <div class="col-esq">
                                                                    <div class="form-group">
                                                                        <input type="submit" class="btn btn-info" value="Cadastrar" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- linha cadastrar -->
                                                        </form>
                                                    </div>
                                                    <!-- coluna meio fim -->
                                                </div>
                                                <!-- linha fim -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal fim -->
				    </section>
				    <!-- produtos cadastrados fim -->
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