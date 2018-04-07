<?php
use OHS\NF\Controller\ItemController;
use OHS\NF\Controller\ClientController;
/*
echo "<pre>";
var_dump($data);
die("</pre>");
*/
$estadoNovo = "";
$estadoSemiNovo = "";
$estadoTodos = "";

// se todos forem novos
if ($data[0]['iEstado'] == 'novo') {
	$estadoNovo = "selected";
}else if ($data[0]['iEstado'] == 'seminovo') {
	$estadoSemiNovo = "selected";
}

//verifica se algum item do array é diferente, testando para verificar se tem apenas produtos novos, seminovos ou o array é misto
//cria 
$i = 0;
while ($i < (count($data) - 3)) {
	if($data[0]["iEstado"] != $data[$i]["iEstado"]) {
		$estadoTodos = "selected";
		$estadoNovo = "";
		$estadoSemiNovo = "";
		break;
	}
	$i++;

}

//se o preço do primeiro for maior que o preço do segundo
if ($data[0]['iPreco'] > $data[1]['iPreco']) {
	$selectedMaior = "selected";
} else {
	$selectedMenor = "selected";
}

if ($data['seoTitleSubCategories'] == "Todas as categorias" || $data['seoTitleSubCategories'] == "") {
	$data['seoTitleSubCategories'] = "";
}





// ------ subcategorias de itens ------------------
$subcats = ItemController::getSubCatArray($_SESSION['categoria']);
$menuSubs = '';//<li><a href='index.php?p=item&q=list&iSubCategory=Amortecedores'><i class='fa fa-angle-right'></i> Amortecedores</a></li>
$menuSubsMobile = '';// <a href='#' class='dropdown-item'><i class='fa fa-angle-right'></i> Amortecedores</a>

foreach ($subcats as $subId => $sub) {
	if ($subId > 1) {
		$menuSubs .= "<li><a href='index.php?p=item&q=list&iSubCategory=$sub'><i class='fa fa-angle-right'></i> $sub</a></li>";
		$menuSubsMobile .= "<a href='index.php?p=item&q=list&iSubCategory=$sub' class='dropdown-item'><i class='fa fa-angle-right'></i> $sub</a>";
	}
}
// adiciona categoria "outros"
$menuSubs .= "<li><a href='index.php?p=item&q=list&iSubCategory=Outros'><i class='fa fa-angle-right'></i> Outros</a></li>";
$menuSubsMobile .= "<a href='index.php?p=item&q=list&iSubCategory=Outros' class='dropdown-item'><i class='fa fa-angle-right'></i> Outros</a>";
// ------ FIM subcategorias de itens ------------------



/*
$infoClient = ClientController::infoDbArray($data[0]["fk_dono"], null);
$infoClient = ClientController::organizeArrayShowClient($infoClient[0]);
*/


//existem 3 itens no array que não são produtos, portanto deve-se subtrair 3 do tamanho do array

$itens = "";
$modals = "";
$address = "";

//cria lista de itens
for ($i=0; $i < count($data) - 3; $i++) {

	//recupera informações dos fornecedores das peças
	$infoClient = ClientController::infoDbArray($data[$i]["fk_dono"], null);
	$infoClient = ClientController::organizeArrayShowClient($infoClient[0]);

	if ($data[$i]['iEstado'] == 'novo') {
		$selectedNovo = "selected";
	}

	$address .= "<input type='hidden' id='addres-modal-$i' value='{$infoClient[0]['addressGoogleMap']}'/>";

	//$urlImageMini = $data[$i]['iPasta'].'/'.$data[$i]['iImagemMini'];
	$urlImage = $data[$i]['iPasta'].'/'.$data[$i]['iImagem'];

	if (!$data[$i]['iImagem']) {
		$urlImage = 'foto-padrao.png';
	}

	
	
	$itens .= "
				<article>
					<figure>
						<img src='ohs/data/images/$urlImage' alt='' />
					</figure>

					<hgroup>
						<h1>{$data[$i]['iTitulo']}</h1>
						<h2>R$ {$data[$i]['iPreco']}</h2>
					</hgroup>

					<div class='bts'>
						<strong data-toggle='modal' data-target='#Modal-{$i}'>Fornecedor</strong>
						<a href='index.php?p=relatorio&q=add&t=item&nI={$data[$i]['nItem']}'><i class='fa fa-cart-arrow-down'></i></a>
					</div>
				</article>
			";

	$modals .= "							
				<div class='modal-body'>
					<div class='modal fade' id='Modal-{$i}' tabindex='-1' role='dialog' aria-hidden='true'>
						<div class='modal-dialog modal-lg' role='document'>
							<div class='modal-content'>
								<div class='modal-header'>        
								   <div class='bloco'>
										<a href='index.php?p=relatorio&q=add&t=item&nI={$data[$i]['nItem']}' class='bts'><i class='fa fa-cart-arrow-down'></i></a>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close' onclick='clearMap();'>
											<span aria-hidden='true'>fechar | &times;</span>
										</button>
									</div>
									<h1 class='modal-title titulo'>{$infoClient[0]['cRazaoSocial']}</h1>
								</div>
								<div class='modal-body'>
									<!-- linha -->
									<div class='linha'>
										<!-- coluna esquerda -->
										<div class='col-esq-modal'>
											<img src='http://via.placeholder.com/180x145' alt=''>
										</div>
										<!-- coluna esquerda fim -->

										<!-- coluna meio -->
										<div class='col-meio-modal'>
											<ul>
												<li>CNPJ: {$infoClient[0]['cCpfCnpj']}</li>
												<li><i class='fa fa-volume-control-phone' aria-hidden='true'></i> <strong>{$infoClient[0]['tel']}</strong></li>
												<li><i class='fa fa-envelope-o' aria-hidden='true'></i> {$infoClient[0]['cEmail']}</li>
												<li><i class='fa fa-map-marker' aria-hidden='true'></i> <p>{$infoClient[0]['address']}</p></li>
											</ul>
										</div>
										<!-- coluna meio fim -->

										<!-- coluna direita -->
										<div class='col-dir-modal'>
											<img src='ohs/data/images/$urlImage' alt=''>
											<hgroup>
												<h1>{$data[$i]['iTitulo']}</h1>
												<h2>R$ {$data[$i]['iPreco']}</h2>
											</hgroup>
										</div>
										<!-- coluna direita fim -->
									</div>
									<!-- linha fim -->
								</div>
								<div class='modal-footer'>
									
									<!-- mapa -->
									<div class='linha'>
										<div class='mapa'>
											<iframe id='address-iFrame-$i' width='100%' height='400' frameborder='0' style='border:0' allowfullscreen></iframe>
										</div>
									</div>

									<script>
									var resultGoogleMap;
									var address = document.getElementById('addres-modal-$i');
									address = encodeURI(address.value);
									//console.log(address);
									
									axios.get('https://maps.googleapis.com/maps/api/geocode/json?address='+address+'&key=AIzaSyB5YE7Ec9ov23r-66p7z8SeCD2EFdI0IuY')
										.then(function (response) {
											resultGoogleMap = response;
											console.log(resultGoogleMap);


											console.log(resultGoogleMap.data.results[0].geometry.location);

											var lat = resultGoogleMap.data.results[0].geometry.location.lat;
											var long = resultGoogleMap.data.results[0].geometry.location.lng;


											var iframe = document.getElementById('address-iFrame-$i');
											console.log(iframe);
											iframe.src = 'https://www.google.com/maps/embed/v1/place?q='
															+lat+
															','
															+long+
							                                '&key=AIzaSyBEtYge5jrwEmwLqDc8bjTmnLaICAYlzM8'
											



										})
										.catch(function (error) {
											console.log(error);
										});
									

									</script>
									<!-- mapa fim -->
								</div>
							</div>
						</div>
					</div>
				</div>
			";
}

$templateString = "
		$address
		<!-- conteúdo -->
		<main class='conteudo produtos'>
			<!-- container -->
			<div class='container'>
				<!-- linha -->
				<div class='linha'>

					<!-- coluna esquerda -->
					<div class='col-esq'>
						<!-- menu sub-categorias -->
						<nav class='sub-categorias'>
							<h1 class='titulo'>Sub-Categorias</h1>
							<ul>
								$menuSubs
							</ul>
						</nav>
						<!-- menu sub-categorias fim -->
						
						<!-- meu sub-categoria mobile -->
						<div class='dropdown'>
							<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Sub-Categorias</button>
							<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
								$menuSubsMobile
							</div>
						</div>
						<!-- meu sub-categoria mobile fim -->
					</div>
					<!-- coluna esquerda fim -->

					<!-- coluna direita -->
					<div class='col-dir'>
						<!-- coluna topo -->
						<header class='col-topo'>
							<!-- titulo sub-categorias -->
							<hgroup>
								<h1>{$data['seoTitleSubCategories']}</h1>
								<h6>Encontrados {$data['rowCount']} produto(s)</h6>
							</hgroup>
							<!-- titulo sub-categorias fim -->
							
							<!-- bloco de seleção -->
							<div class='bloco-de-selecao'>
								<form class='form-custom' name='filterItem' action='index.php' method='post' onchange='document.forms.filterItem.submit();'>
								<input type='hidden' name='p' value='item' />
								<input type='hidden' name='q' value='list' />
								<input type='hidden' name='iCategory' value='{$data[0]['iCategoria']}' />
								<input type='hidden' name='iSubCategory' value='{$data['seoTitleSubCategories']}' />
								   <div class='linha desktop'>
									   <div class='col-esq'>
										   <div class='form-group'>
												<select class='form-control' name='iEstado'>
													<option value='todos' $estadoTodos>Todos</option>
													<option value='seminovo' $estadoSemiNovo>Semi-novo</option>
													<option value='novo' $estadoNovo>Novo</option>
												</select>
											</div>
										</div>
										<div class='col-dir'>
											<div class='form-group'>
												<select class='form-control' name='iPreco'>
													<option value='menor' $selectedMenor>Menor preço</option>
													<option value='maior' $selectedMaior>Maior preço</option>     
												</select>
											</div>
										</div>
									</div>
								</form>
							</div>
							<!-- bloco de seleção fim -->
							
							<!-- ícones listagem -->
							<aside class='icones'>
								<i class='fa fa-th js-icone-quadrado'></i>
								<i class='fa fa-bars js-icone-listagem ativo'></i>
							</aside>
							<!-- ícones listagem fim -->
						</header>
						<!-- coluna topo fim -->
						
						<!-- listagem -->
						<div class='listagem'>
							<div class='linha'>
								$itens
							</div>

							$modals

						</div>
						<!-- listagem fim -->
						
						{$data['pagination']}

					</div>
					<!-- coluna direita fim -->
				</div>
				<!-- linha fim -->
			</div>
			<!-- container fim -->
		</main>
		<!-- conteúdo fim -->
		";

?>
