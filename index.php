<?php
/**
 * Arquivo de entrada no sistema Novo Ferro
 */

//operações com clientes e seus produtos
use OHS\NF\Controller\ClientController;
use OHS\NF\Controller\ViewController;
use OHS\NF\Controller\ItemController;
use OHS\NF\Controller\AdminController;

use OHS\NF\Model\Sql\SqlQuery;

//utilidades
use OHS\NF\Model\Helpers\Helpers;

// se usuário for admin, indicar caminho da classe
use OHS\NF\Model\Admin;


require_once 'vendor/autoload.php';

// caminho para a raiz do sistema
define('OHS_PATH', getcwd());

// config ajustável pelo cliente (tabela nf_config)
Helpers::getConfig();

/*
// e-mail que recebe erros e exceções
define('OHS_EMAILWEBMASTER', 'novoferro@operahouse.com.br');
// ativar log de problemas menos severos? Log de erros mais sérios devem ser criados sempre, independente dessa constante
define('OHS_DEBUG', true);
//define quantidade de itens por página
define('OHS_QTD', 16);
*/

$p = Helpers::cleanVar('p');
$q = Helpers::cleanVar('q');


//inicia uma sessão
session_start();

//dados do usuário
$_SESSION["estado"];
$_SESSION["logado"];
$_SESSION["usuario"];
$_SESSION["id"];

//dados do produto
$_SESSION["categoria"];
$_SESSION["subCategoria"];

//configura uma variável global com o estado selcionado pelo cliente
if ($_POST['estados-brasil']) {
	$_SESSION["estado"] = Helpers::cleanVar('estados-brasil');
	//die($_SESSION["estado"] = Helpers::cleanVar('estados-brasil'));
}


//instancia da classe ViewController deve ficar logo abaixo do autoload
$view = new ViewController();

// saídas HTML do sistema incrementam essa variável
$sHtml = '';

switch ($p) {
	case 'admin':// sessão de admin
		if ($_SESSION['isadmin'] == 1) {
			// indica que está num menu administrativo e impede a exibição de um cabeçalho
			$view->category = 'admin';

			switch ($q) {
				case 'config-update':
					// @todo incluir js alert na view para avisar sobre o update (sucesso ou erro)
					$sHtml .= Helpers::alert(AdminController::configUpdate());
				case 'config':
					$view->seoTitle = "Configuração Novo Ferro";
					$view->breadcrumbSection =  Helpers::createBreadCrumb("Admin > Configuração");

					$result = AdminController::configInfoArray();
					array_pop($result);
					$view->setAdminConfigEditArray($result);
					$view->setContentMain('admin-config-form.php');
					$sHtml .= $view->build();
					break;

				case 'overview':
					$view->seoTitle = 'Visão Geral do Sistema Novo Ferro';
					$view->breadcrumbSection =  Helpers::createBreadCrumb("Admin > Visão Geral");
					$view->setContentMain('admin-template.php');
					$sHtml = $view->build();
					break;

				case 'categoria-update':
					$sHtml .= Helpers::alert(AdminController::categoryUpdate());
				case 'categoria':
					$view->seoTitle = 'Categorias do Sistema Novo Ferro';
					$view->breadcrumbSection =  Helpers::createBreadCrumb("Admin > Categorias");

					$subcats = ItemController::getSubCatAdminArray('admin');
					$view->setAdminEditCategoryArray($subcats);
					$view->setContentMain('admin-category-form.php');
					$sHtml .= $view->build();
					break;

				case 'cadastro':
					$sHtml = 'Cadastro de clientes';
					$view->seoTitle = 'Cadastro de clientes do Sistema Novo Ferro';
					$view->breadcrumbSection =  Helpers::createBreadCrumb("Admin > Cadastros de clientes");
					$view->setContentMain('admin-template.php');
					$sHtml = $view->build();
					break;

				case 'quem-somos':
					$sHtml = 'Atualização: Quem Somos';
					$view->seoTitle = 'Atualização: Quem Somos';
					$view->breadcrumbSection =  Helpers::createBreadCrumb("Admin > Quem Somos");
					$view->setContentMain('admin-template.php');
					$sHtml = $view->build();
					break;
			}
		} else {
			header("Location:index.php");
		}
		break;

	case '':
	case 'index':
		$view->setContentMain('index-template.php');
		$sHtml = $view->build();
		break;

	case 'cadastro':

		switch ($q) {
			case '':
			case 'form':
				$view->seoTitleCategories = "Cadastre-se";
				$view->breadcrumbSection =  Helpers::createBreadCrumb("Cadastro");
				$view->setContentMain('form-fornecedor.php');
				$sHtml = $view->build();
				break;

			case 'save':
				$sHtml = ClientController::save();
				break;

			case 'edit':
				$view->seoTitleCategories = "Atualize seus dados";
				$view->breadcrumbSection = Helpers::createBreadCrumb("Editar dados");
				$nCadastro = Helpers::cleanVar('nC');
				$result = ClientController::infoDbArray($nCadastro, null);
				//envia um array com dados de um cliente retornados da DB
				$view->setClientEditArray(ClientController::edit($result[0]));
				$view->setNc($nCadastro);
				$view->setContentMain('form-fornecedor.php');
				$sHtml = $view->build();
				//include(OHS_PATH."/ohs/sys/controllers/clientForm.php");
				break;

			case 'update':
				$nCadastro = Helpers::cleanVar('nC');
				$sHtml = ClientController::update($nCadastro);
				break;

			case 'delete':
				//no momento recebe o nCadastro via get
				$nCadastro = Helpers::cleanVar('nC');
				$sHtml = ClientController::delete($nCadastro);
				break;

			case 'show':
				/* o operador coaless está disponível apartir do php7.1
				$cType = Helpers::cleanVar('cType') ?? 'f';
				$nCadastro = Helpers::cleanVar('nC') ?? null
				*/

				//opções para o caso de um id de cliente ser informado
				$nCadastro = Helpers::cleanVar('nC') ? Helpers::cleanVar('nC') : NULL;
				$nFkDono = $nCadastro;

				//lista fornecedor por padrão
				$cType = Helpers::cleanVar('cType') ? Helpers::cleanVar('cType') : 'o'; 


				if($cType === 'o' & !isset($nCadastro)) {
					$view->seoTitleCategories = "Oficinas";
					$view->breadcrumbEstado = Helpers::createBreadCrumb($_SESSION["estado"], '', "estado");
					$view->breadcrumbSection = Helpers::createBreadCrumb("Oficinas");
					$result = ClientController::infoDbArray(NULL, 'o');
					//envia um array com dados de um cliente retornados da DB
					$view->setClientListArray(ClientController::organizeArrayListClient($result));
					$view->setContentMain('oficinas.php');
					$sHtml = $view->build();

				} elseif($cType === 'f' & !isset($nCadastro)) {
					$result = ClientController::infoDbArray(NULL, 'f');
					include(OHS_PATH."/ohs/sys/controllers/clientListOficina.php");
				} elseif($cType === 'fo' & !isset($nCadastro)) {
					$sHtml = "é oficina e fornecedor";
				}

				if($nFkDono) {
					$view->seoTitleCategories = "Área do Fornecedor";
					$view->breadcrumbEstado = Helpers::createBreadCrumb($_SESSION["estado"], '', "estado");
					$view->breadcrumbSection = Helpers::createBreadCrumb("Fornecedor");
					$infoClient = ClientController::infoDbArray($nCadastro, NULL);
					$view->setClientShowArray(ClientController::organizeArrayShowClient($infoClient[0]));
					$view->setNc($nCadastro);
					//os produtos deste cliente
					$infoItem = ItemController::infoDbArray(NULL, $nFkDono, NULL, NULL, NULL, NULL, NULL);
					$view->setItemArray($infoItem);
					$view->setContentMain('fornecedor.php');
					$sHtml = $view->build();

				}
				break;

			case 'login':

				if (!empty($_POST['cSenha']) && !empty($_POST['cEmail'])) {
					$email = Helpers::cleanVar('cEmail');
					$password = Helpers::cleanVar('cSenha');

					$sHtml = Helpers::alert(ClientController::login($email, $password));
				} else {
					$sHtml = Helpers::alert("É preciso informar login e senha");
				}
				$view->setContentMain('index-template.php');
				$sHtml .= $view->build();
				break;

			case 'logout':
				if ($_SESSION["logado"] == true) {
					// muda o valor de logged_in para false
					$_SESSION['logado'] = false;
					 
					// finaliza a sessão
					session_destroy();
					 
					// retorna para a index.php
					header('Location: index.php');
				}
		}
		break;

	case 'search':

		$search = Helpers::cleanVar('search');

		//opções para o caso de um id de cliente ser informado
		if (isset($_GET['tipo']) && $_GET['tipo'] == "produto") {

			$view->seoTitleCategories = "Produtos encontrados";
			//$view->seoTitleSubCategories = isset($_SESSION["subCategoria"]) ? $_SESSION["subCategoria"] : "Todas as categorias";
			$view->seoTitleSubCategories = "Resultado";
			//$view->category = $_SESSION["categoria"];

			$view->breadcrumbEstado = Helpers::createBreadCrumb($_SESSION["estado"], '', "estado");

			if ($_SESSION["subCategoria"]) {
				$linkBreadcrumb = "index.php?p=item&q=list&iCategory={$_SESSION["categoria"]}";
				$view->breadcrumbSection = Helpers::createBreadCrumb("Peças"."/".ucfirst($_SESSION["categoria"]), $linkBreadcrumb);
				$view->breadcrumbSection .= Helpers::createBreadCrumb($_SESSION["subCategoria"]);
			} else {
				$view->breadcrumbSection = Helpers::createBreadCrumb("Peças"."/".ucfirst($_SESSION["categoria"]));
			}

			$view->setItemArray(ItemController::infoDbArray(NULL, NULL, NULL, NULL, NULL, NULL, $search));
			$view->setContentMain('produtos.php');

			$sHtml = $view->build();

		}

		if ((isset($_GET['tipo']) && $_GET['tipo'] == "oficina") || (isset($_GET['tipo']) && $_GET['tipo'] == "fornecedor")) {
			
			$view->seoTitleCategories = "Oficinas encontradas";
			$view->breadcrumbEstado = Helpers::createBreadCrumb($_SESSION["estado"], '', "estado");
			$view->breadcrumbSection = Helpers::createBreadCrumb("Oficinas");
			$result = ClientController::infoDbArray(NULL, 'o', $search);
			//envia um array com dados de um cliente retornados da DB
			$view->setClientListArray(ClientController::organizeArrayListClient($result));
			$view->setContentMain('oficinas.php');
			$sHtml = $view->build();
		}
		



		break;
	
	case 'item':
		switch($q) {
			case '':
			case 'list':
				//opções para o caso de um id de cliente ser informado
				$nCadastro = Helpers::cleanVar('nC') ? Helpers::cleanVar('nC') : null;
				$nItem = Helpers::cleanVar('nI') ? Helpers::cleanVar('nI') : null;
				
				
				if ((isset($_POST['iCategory']) || isset($_GET['iCategory'])) && (!empty($_GET['iCategory']) || !empty($_POST['iCategory']))) {
					$_SESSION["categoria"] = Helpers::cleanVar('iCategory');
				}
				
				if (isset($_POST['iSubCategory']) || isset($_GET['iSubCategory'])) {
					$_SESSION["subCategoria"] = Helpers::cleanVar('iSubCategory');
				}
				
				$_SESSION["subCategoria"] = Helpers::cleanVar('iSubCategory') ? Helpers::cleanVar('iSubCategory') : NULL;
				// lista produto subcategoria escapamento por padrão
				$iEstado = Helpers::cleanVar('iEstado') ? Helpers::cleanVar('iEstado') : NULL;
				$iPreco = Helpers::cleanVar('iPreco') ? Helpers::cleanVar('iPreco') : NULL;
				$nItem = Helpers::cleanVar('nItem') ? Helpers::cleanVar('nItem') : NULL;

				$view->seoTitleCategories = "Peças"."/".$_SESSION["categoria"];
				$view->seoTitleSubCategories = isset($_SESSION["subCategoria"]) ? $_SESSION["subCategoria"] : "Todas as categorias";
				//$view->category = $_SESSION["categoria"];

				$view->breadcrumbEstado = Helpers::createBreadCrumb($_SESSION["estado"], '', "estado");

				if ($_SESSION["subCategoria"]) {
					$linkBreadcrumb = "index.php?p=item&q=list&iCategory={$_SESSION["categoria"]}";
					$view->breadcrumbSection = Helpers::createBreadCrumb("Peças"."/".ucfirst($_SESSION["categoria"]), $linkBreadcrumb);
					$view->breadcrumbSection .= Helpers::createBreadCrumb($_SESSION["subCategoria"]);
				} else {
					$view->breadcrumbSection = Helpers::createBreadCrumb("Peças"."/".ucfirst($_SESSION["categoria"]));
				}

				if ($_SESSION["categoria"] == '') {
					die("teste session categoria vazio");
				}

				$view->setItemArray(ItemController::infoDbArray($nItem, $nFkDono, $_SESSION["categoria"], $_SESSION["subCategoria"], $iEstado, $iPreco, $search));
				$view->setContentMain('produtos.php');

				$sHtml = $view->build();
				break;

			case 'save':
				$sHtml = ItemController::save();
				break;

			case 'update':
				$nI = Helpers::cleanVar('nI');
				$sHtml = ItemController::update($nI);
				break;

			case 'delete':
				$nI = Helpers::cleanVar('nI');
				$sHtml = ItemController::delete($nI);
			break;
		}
		break;

	case 'quem-somos':
		$view->seoTitleCategories = "Quem Somos";
		$view->breadcrumbSection = Helpers::createBreadCrumb("Quem somos");
		$view->setContentMain('quem-somos.php', 'conteúdo definido no arquivo index, passado por parâmetro para a view quem-somos pelo método setContentMain');
		$sHtml = $view->build();
		break;

	case 'contato':
		$view->seoTitleCategories = "Contato";
		$view->breadcrumbSection = Helpers::createBreadCrumb("Contato");
		$view->setContentMain('contato.php');
		$sHtml = $view->build();
		break;

	case 'relatorio':
		switch($q) {
			case '':
				$view->seoTitleCategories = "Relatório";
				$view->breadcrumbEstado = Helpers::createBreadCrumb($_SESSION["estado"], '', "estado");
				$view->breadcrumbSection = Helpers::createBreadCrumb("Relatório");
				$view->setContentMain('relatorio.php');
				$sHtml = $view->build();
				break;		

			case 'add'://select
				$nItem = Helpers::cleanVar('nI');
				$nCadastro = Helpers::cleanVar('nC');


				if ($nItem) {
					$item = ["tipo" => "produto", "nI" => $nItem];

					$_SESSION["relatorio"][] = $item;
					//array_push($_SESSION["relatorio"]["itens"],$nItem);

				}

				if ($nCadastro) {
					$oficina = ["tipo" => "oficina", "nC" => $nCadastro];
					$_SESSION["relatorio"][] = $oficina;
					//array_push($_SESSION["relatorio"]["oficinas"],$nCadastro);
				}

				$sHtml = "<script>window.history.back();</script>";
				break;

			case 'remove':

				if ($nItem = Helpers::cleanVar('nI')) {
					Helpers::inArray($nItem, 'item');
				}

				if ($nCadastro = Helpers::cleanVar('nC')) {
					Helpers::inArray($nCadastro, 'oficina');
				}
				
				$sHtml = "<script>window.history.back();</script>";
				break;
		}
		break;
}


echo $sHtml;

?>