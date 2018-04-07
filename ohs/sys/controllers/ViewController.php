<?php
namespace OHS\NF\Controller;

use OHS\NF\Model\Helpers\Helpers;
use OHS\NF\Controller\AdminController;
use OHS\NF\Controller\ItemController;
use OHS\NF\Controller\ClientController;
use OHS\NF\Controller\ReportController;

class ViewController 
{
	/**
	 * id de um cliente
	 * @var int
	 */
	private $nC;

	/**
	 * path das páginas
	 * @var string
	 */
	//constante de classe privada só funciona com php 7.1 +
	//private const VIEWS_PATH = OHS_PATH . "/ohs/sys/views/";
	const VIEWS_PATH = OHS_PATH . "/ohs/sys/views/";
	/**
	 * propriedades de páginas
	 * @var string
	*/
	public $seoTitle;
	public $seoTitleSubCategories;
	public $seoDescription;
	public $seoKeywords;
	public $seoTitleCategories;
	//caminho de pão
	public $breadcrumbEstado;
	//peças/carros   peças/caminões  oficinas  cadastre-se
	public $breadcrumbSection;

	/**
	 * HTML estático
	 * @var string
	*/
	private $head;
	private $footer;
	private $header;
	private $menu;

	/**
	 * HTMl corpo principal
	 * @var string
	*/
	private $main;
	private $contentMain;

	/**
	 * Dados do cliente retornados da base de dados, organizados em um array
	 * @var array
	 */

	private $arrayAdminEditConfig;
	private $arrayAdminEditCategory;
	private $arrayEditClient;

	/**
	 * Array contendo dados de apenas um cliente
	 * @var array
	 */
	private $arrayShowClient;

	/**
	 * Array contendo dados de vários clientes
	 * @var array
	 */
	private $arrayListClient;

	/**
	 * Array contendo um ou mais itens
	 */
	private $arrayItem;

	/**
	 * array contendo informações editáveis da página quem-somos
	 */
	private $arrayPageContent;

	/**
	 * HTML montado
	 * @var string
	*/
	private $html;

	/**
	 * nome da categoria
	 */
	public $category;
	

	public function __construct()
	{
		$this->seoTitle = OHS_SEOTITLE;//'Novo Ferro';
		$this->seoDescription = OHS_SEODESCRIPTION;//'Descrição novo ferro php';
		$this->seoKeywords = OHS_SEOKEYWORDS;//'oficinas, peças, serviços';
	}

	/**
	 * Configura o Head da página
	 * @return void
	 */
	private function setHead()
	{
		// $this->head = file_get_contents(self::VIEWS_PATH . "head.html");
		require(self::VIEWS_PATH . "head.php");// $cabeca
		$this->head = $cabeca;

		$seo = ["[CONTEUDO-TITULO]","[CONTEUDO-DESCRIPTION]","[CONTEUDO-KEYWORDS]"];
		$seoProperty = [$this->seoTitle, $this->seoDescription, $this->seoKeywords];

		for($i = 0; $i < count($seo); $i++) {
			$this->head = str_replace(
				$seo[$i], $seoProperty[$i], $this->head
			);
		}
	}

	/**
	 * Configura o Menu da página
	 * @return void
	 */
	public function setMenu()
	{
		include(self::VIEWS_PATH . "menu.php");
		$this->menu = $templateString;
	}

	 /**
	 * Configura o Header da página
	 * @return void
	 */
	private function setHeader()
	{
		//[TITULO-CATEGORIAS] só existe no cabecalho.html, e esta view é usada em conjunto com os outros templates, mas quando 
		//a index do site é chamada, uma outra view de cabeçalho é utilizada, a cabecalho-index.html, que é um cabecalho com 
		//estilos diferentes do das demais páginas 
		//logo $this->seoTitleCategories só não é setado quando a index das páginas não é chamada 
		if (isset($this->seoTitleCategories)) {
			$this->header = file_get_contents(self::VIEWS_PATH . "cabecalho.html");
			$this->header = str_replace(
				"[TITULO-CATEGORIAS]", $this->seoTitleCategories, $this->header
			);
		} elseif ($this->category != 'admin') {
			$this->header = file_get_contents(self::VIEWS_PATH . "cabecalho-index.html");
		}
	}

	/**
	 * Configura a seção main da página, onde será injetado o conteúdo principal da página
	 * @return void
	 */
	private function setMain()
	{
		//não existe caminho de pão na index do site, logo eu testo se foi setada a propriedade
		//$this->breadcrumbEstado que representa o caminho de pão Estado, se foi, então a página solicitada não é a index
		if (isset($this->breadcrumbEstado)) {
			// páginas de catálogo: oficinas, fornecedores e itens
			$this->main = file_get_contents(self::VIEWS_PATH . "main.html");

			$this->main = str_replace("<!-- breadcrumb:estado -->", $this->breadcrumbEstado, $this->main);
			$this->main = str_replace("<!-- breadcrumb:section -->", $this->breadcrumbSection, $this->main);
			$this->main = str_replace(
				"[CONTEUDO]", $this->contentMain, $this->main
			);
		} elseif (isset($this->breadcrumbSection)) {
			// páginas institucionais ou de admin
			$this->main = file_get_contents(self::VIEWS_PATH . "main.html");
			$this->main = str_replace("<!-- breadcrumb:section -->", $this->breadcrumbSection, $this->main);
			$this->main = str_replace(
				"[CONTEUDO]", $this->contentMain, $this->main
			);
		} else {
			// home
			$this->main = file_get_contents(self::VIEWS_PATH . "main-index.html");
			$this->main = str_replace(
				"[CONTEUDO]", $this->contentMain, $this->main
			);
		}
	}

	/**
	 * Configura o conteúdo principal da página, que será injetado na seção main
	 * @param string $template nome do template a ser injetado na página
	 * @return void
	 */
	public function setContentmain(string $template, string $content = '')
	{
		switch ($template) {
			
			case "admin-config-form.php":
				$data = $this->arrayAdminEditConfig;
				break;
			case "admin-category-form.php":
				$data = $this->arrayAdminEditCategory;
				break;

			case "admin-quem-somos.php":
				$data = $this->arrayPageContent;
				break;

			case "form-fornecedor.php":
				// $this->dataUpdateClient é setado pelo método setClientEditData, chamado em index.php
				// trata-se de um array com a estrutura: $data['cEstado'],$data['cEmail'] ...
				$data = $this->arrayEditClient;
				
				$q = "save";
				//dados que serão usados no formulário incluindo o select com o estado já selecionado e pronto para ser exbido
				if ($data) {
					
					$q = "update";
					$nC = $this->nC;          
				} else {
					// cria um select dos estados sem nenhum estado selecionado para incluir no template de formulário cadastro
					$data['cEstado'] =  Helpers::selectEstado('cEstado', '', 'form-control');
				}
				
				break;

			case 'fornecedor.php':
				if ($this->arrayShowClient) {
					//isto será um valor no campo input do formulário
					$nC = $this->nC;
					$data = $this->arrayShowClient;
					$data["nc"] = $nC;
					//print_r($data);
					//die;
					//adiciona o select de categorias ao array enviado ao template
					$data['selectSubCat'] = Helpers::selectCategorias('iSubcategoria', '', 'form-control form-control');
					//$data['selectSubCat'] = Helpers::selectCategorias('iSubcategoria', '', 'form-control form-control', $sCat);
					$data['item'] = $this->arrayItem;
					
					//inclui arquivo com a variável $map que está em fornecedor.php
					include(self::VIEWS_PATH . 'googlemap.php');
				}
				break;

			case 'oficinas.php':
				$data = $this->arrayListClient;
				if ($data['rowCount'] > 16) {
					$data['pagination'] =  Helpers::createPagination();
				}
				
				include(self::VIEWS_PATH . 'googlemap.php');
				
				break; 

			case 'produtos.php':
				$data = $this->arrayItem;

				$data['seoTitleSubCategories'] = $this->seoTitleSubCategories;
				$data['categorie'] = $this->categorie;
				if ($data['rowCount'] > 16) {
					$data['pagination'] =  Helpers::createPagination();
				}
				
				break;

			case 'quem-somos.php':
				//conteúdo a ser exibido no template quem somos
				$data = $content;
				break;

			case 'index-template.php':

				break;

			case 'contato.php':

				break;

			case 'relatorio.php':
				$data['itens'] = ReportController::getItens();
				$data['oficinas'] = ReportController::getOficinas();

				break;
		}

		include(self::VIEWS_PATH . $template);
		$this->contentMain = $templateString;
	}

	/**
	 * Estes métodos configuram as propriedades com um array
	 * de dados. É chamado no arquivo index.php
	 * @return void
	 */
	public function setAdminConfigEditArray(array $arrayAdminEditConfig)
	{
		$this->arrayAdminEditConfig = $arrayAdminEditConfig;
	}

	public function setAdminEditCategoryArray(array $arrayAdminEditCategory)
	{
		$this->arrayAdminEditCategory = $arrayAdminEditCategory;
	}

	public function setClientEditArray(array $arrayEditClient)
	{
		$this->arrayEditClient = $arrayEditClient;
	}

	public function setClientShowArray(array $arrayShowClient)
	{
		$this->arrayShowClient = $arrayShowClient;
	}

	public function setClientListArray(array $arrayListClient)
	{
		$this->arrayListClient = $arrayListClient;
	}

	public function setItemArray(array $arrayItem)
	{
		$this->arrayItem = $arrayItem;
	}

	public function setPageContentArray(array $arrayPageContent)
	{
		$this->arrayPageContent = $arrayPageContent;
	}

	/**
	 * inicializa a propriedade $this->nC com o id de um cliente
	 * @param int $nC
	 * @return void
	 */
	public function setNc($nC)
	{
		$this->nC = $nC;
	}

	/**
	 * constrói a página com os templates e dados informados
	 * @return void
	 */
	public function build()
	{
		//insere uma view header padrão
		self::setHeader();

		self::setHead();
		self::setMenu();
		self::setMain();

		//se o cliente já selecinou seu estado, envie um footer sem o modal estado, senão mande com modal
		if (isset($_SESSION["estado"])) {
			// $this->footer = file_get_contents(self::VIEWS_PATH . "footer.html");
			require(self::VIEWS_PATH . "footer.php");
		} else {
			// $this->footer = file_get_contents(self::VIEWS_PATH . "footer-with-modal.html");
			require(self::VIEWS_PATH . "footer-with-modal.php");
		}
		$this->footer = $footer;
		
		
		$this->html .= $this->head . $this->menu . $this->header . $this->main .$this->footer;

		return $this->html;
	}      
}
?>