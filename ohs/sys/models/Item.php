<?php
/**
* Arquivo com dados recebidos via post, dados do arquivo index.php
* Realiza operações de CRUD nas tabelas nf_categoria e nf_item para itens
* Tipos permitidos $typeArray = ['string','double','integer', 'object', 'boolean'];
* @author Jerry Martins <jerry.adriany@operahouse.com.br>
*/
namespace OHS\NF\Model; 

use OHS\NF\Model\Sql\SqlQuery;
use OHS\NF\Model\Helpers\Helpers;
use OHS\NF\Model\Helpers\Upload;
use OHS\NF\Controller\ClientController;

class Item
{
	public function save()
	{
		//verifica os checkbox's marcados
		if (!isset($_POST['iEstado'])) {
			return $sHtml = "Informe o estado de seu produto";
			
		} else {
			$iEstado = Helpers::cleanVar('iEstado');
			
		}

		/**
		 * pendente o desenvolvimento de upload de imagens
		 */
		
		//upload, redimensionamento, e criação de uma miniatura da imagem caso ela seja enviada
		if (isset($_FILES['imageItem'])) {
			$imageType = explode('.', $_FILES['imageItem']['name']);
			$imageType = end($imageType);


			//faz uma busca pela última pasta criada
			$select = new SqlQuery();
			$dirNumber = $select->query("SELECT iPasta FROM nf_item ORDER BY iPasta DESC LIMIT 0,1");
			//número da ultima pasta criada
			$dirNumber = $dirNumber['iPasta'];

			if (!$dirNumber) {
				$dirNumber = 1;
			}

			//verifica quantos itens possui a pasta, caso seja maior que X, uma nova pasta deve ser criada
			$numberItens = $select->query("SELECT COUNT(iImagem) FROM nf_item WHERE iPasta = $dirNumber");
	

			if ($numberItens["COUNT(iImagem)"] >= 5) {
				//incrementa o $i para criar uma nova pasta com o valor de $i
				$dirNumber++;

				$newDir = OHS_PATH . "/ohs/data/images/" . $dirNumber;
				mkdir($newDir);
				chmod($newDir, 0644);

				$dir = $newDir."/";

			} else {
				$dir = OHS_PATH . "/ohs/data/images/" . $dirNumber;
			}

			$image = new Upload($_FILES['imageItem']);

			if ($image->uploaded) {
				//cria a imagem tamanho X
				$image->allowed = array('image/*');

				//nome do arquivo
				//$fileName = 'image_resized'.time().'.'.$imageType;
				$fileName = 'image_resized'.time();

				$image->file_src_name_body   = $fileName;
				$image->image_resize         = true;
				$image->image_ratio_crop     = true;
				$image->image_x              = 320;
				//$image->image_ratio_x        = 320;
				$image->image_ratio_y        = 238;
				$image->process($dir);

				//cria miniatura da imagem
				/*
				//se redimensionou e salvou a imagem, então crie a miniatura dela         
				if ($image->processed) {
					//$fileNameMin = 'image_resized_min'.time().'.'.$imageType;
					$fileNameMin = 'image_resized_min'.time();
					$image->file_new_name_body   = $fileNameMin;
					$image->image_resize         = true;
					$image->image_x              = 200;
					$image->image_ratio_y        = true;
					$image->process($dir);

					$image->clean();
				} else {
					return $sHtml = 'error : ' . $image->error;
				}
				*/
			}
				
		} else {
			return $sHtml = "Imagem não enviada";
		}
		
		//adiciona a extenão à imagem antes de salvar seu nome na base de dados
		if (!empty($_FILES['imageItem']['name'])) {
			$fileName = $fileName.'.'.$imageType;

		} else {
			$fileName = NULL;
		}

		$fk_subcategory = Helpers::cleanVar('iSubcategoria');


		/*tratar*/
		$iDateT = date("Y-m-d H:i:s");
		$iCategory = Helpers::cleanVar('iCategoria');
		$fk_subcategoria = $idCategory;
		$fk_dono = Helpers::cleanVar('nC');
		$iTitle = Helpers::cleanVar('iTitulo');
		$iPrice = str_replace(",",".", Helpers::cleanVar('iPreco'));


		$table = 'nf_item';
		$columnsArray = [
			'iData',
			'iCategoria',
			'iTitulo',
			'iEstado',
			'iPreco',
			'iPasta',
			'iImagem',
			'iImagemMini',
			'fk_subcategoria',
			'fk_dono'
		];
		$insertValuesArray = [
			$iDateT,
			$iCategory,
			$iTitle,
			$iEstado,   
			$iPrice,
			$dirNumber,
			$fileName,
			$fileNameMin,
			$fk_subcategory,
			$fk_dono
		];
		
		//tipos permitidos ['string', 'double', 'integer', 'boolean', 'object']; ver classe SqlAbstract
		$typeArray = ['string','string','string','string','double', 'integer', 'string','string','integer','integer'];

		$insert = new SqlQuery();
		
		/**
		 * este método estático organiza as informações em um objeto anônimo da class stdClass e retorna
		 * o objeto organizado da forma necessária para ser consumido pelo método insert($obj)
		 */
		$obj = Helpers::configObjInsert($table, $columnsArray, $insertValuesArray, $typeArray);
		
		if ($insert->insert($obj) == false) {
			return $sHtml = "<p>não inserido</p>";
		} else {
			header("Location: index.php?p=cadastro&q=show&nC={$_SESSION['id']}");
		}
	}

	public function list(int $nItem = NULL, int $nFkDono = NULL, string $iCategory = NULL, string $iSubCategory = NULL, string $iEstado = NULL, string $iPreco = NULL, $search = NULL)
	{
		$condition = '';
		$conditionArray = array();
		$quantityInt = OHS_QTD; //define LIMIT 0,16 na consulta sql
		$typeArray = array();


		//se um id de item for informado, retorne-o
		if (!empty($nItem)) {
			$condition = "nItem = ?";
			$conditionArray = [$nItem];
			$typeArray = ['integer'];
			$quantityInt = 1;

		} elseif (isset($search)) {
			//faz uma busca por uma nome informado pelo usuário
			$condition = "iTitulo LIKE ?";
			$conditionArray = ["%".$search."%"];
			$typeArray = ['string'];
			$quantityInt = OHS_QTD;

			
		} else {
			$condition = "iCategoria LIKE ?";

			//lista tudo de uma categoria: carro, moto, caminhão, ônibus
			if (!empty($iCategory) && empty($iSubCategory) && empty($search)) {

				//$condition = "iCategoria LIKE ?";
				$conditionArray = [$_SESSION["categoria"]];
				$typeArray = ['string'];
				$quantityInt = OHS_QTD;
			
			}
			//lista com base na categoria e subcategoria informada
			if (!empty($iSubCategory) && !empty($_SESSION["categoria"]) && empty($search)) {
				//recupera o id da subCategoria
				$fk_subcategory = self::getSubCatId($iSubCategory);

				
				//se for uma pesquisa com o select "Todas as categorias"
				if ($fk_subcategory == FALSE) {
					$condition .= "";
					$conditionArray = [$_SESSION["categoria"]]; 
					$typeArray = ['string'];

				} else {
					$condition .= " AND fk_subcategoria = ?";
					$conditionArray = [$_SESSION["categoria"], $fk_subcategory]; 
					$typeArray = ['string', 'string'];
				}
				
				$quantityInt = OHS_QTD;

				//lista todos itens por padrão
			}

			// para listar com base no estado ignorando o preço
			if (!empty($iEstado) && !empty($iPreco)) {

				//matenha a consulta como está, consultado todos os itens ignorando seu estado (novo / seminovo) mas ordenando pelo preco
				if ($iEstado == "todos") {
					if ($iPreco == "maior") {
						$condition .= " ORDER BY iPreco DESC";
					} else if ($iPreco == "menor") {
						$condition .= " ORDER BY iPreco ASC";
					}

				//adicione a pesquisa por estado (novo / seminovo)
				} else {

					if ($iPreco == "maior") {
						$condition .= " AND iEstado LIKE ? ORDER BY iPreco DESC";
					} else if ($iPreco == "menor") {
						$condition .= " AND iEstado LIKE ? ORDER BY iPreco ASC";
					}

					array_push($conditionArray, $iEstado);
					array_push($typeArray, 'string');
				}

			}

			//para listar itens de um fornecedor específico, do mais recente para o mais antigo
			if (!empty($nFkDono)) {
				$condition = "fk_dono = ?";
				$conditionArray = [$nFkDono];
				$typeArray = ['integer'];

				//ordena pela data de cadastro
				$condition .= " ORDER BY iData DESC";
			}

		}


		//definindo tabela/s e colunas a serem retornadas
		$tableArray = ['nf_item'];
		//colunas retornadas são as mesmas para as consultas
		$columnsArray = [
			'nItem',
			'iTitulo',
			'iPreco',
			'iCategoria',
			'iEstado',
			'fk_dono',
			'fk_subcategoria',
			'iImagem',
			'iPasta'
		];

		$pageInt = 1;

		$select = new SqlQuery();
		$obj = Helpers::configObjSelect($tableArray, $columnsArray, $condition, $conditionArray, $typeArray, $quantityInt, $pageInt);

		/*
		echo "<pre>";
		var_dump($obj);
		die("</pre>");
		*/
		$result = $select->select($obj);

		return $result;
	}


	public function updateFkItem(int $fk_subcategory)
	{
		//armazenando os dados recebidos via post em variáveis e arrays
		$iChangeDateT = date("Y-m-d H:i:s");
		$table = 'nf_item';

		$columnsArray = [
			'fk_subcategoria',
			'iDataAlteracao '
		];

		$newValuesArray = [
			1,
			$iChangeDateT
		];

		$condition = ' WHERE fk_subcategoria = ?';
		$conditionArray = [$fk_subcategory];
		$typeArray = ['integer'];
		
		//instancia da classe cliente e chamada do método updateClient para atualizar dados
		$updateQuery = new SqlQuery();
		$obj = Helpers::configObjUpdate($table, $columnsArray, $newValuesArray, $condition, $conditionArray, $typeArray);

		if ( $updateQuery->update($obj) ) {
			return TRUE;
		} else{
			return FALSE;
		}
	}

	public function newSubCategory()
	{
		#dados recebidos via post
		$sNovo = Helpers::cleanVar('sNovo');

		$nsCarro = isset($_POST['nsCarro']) ? Helpers::cleanVar('nsCarro') : 0;
		$nsCaminhao = isset($_POST['nsCaminhao']) ? Helpers::cleanVar('nsCaminhao') : 0;
		$nsLancha = isset($_POST['nsLancha']) ? Helpers::cleanVar('nsLancha') : 0;
		$nsMoto = isset($_POST['nsMoto']) ? Helpers::cleanVar('nsMoto') : 0;
		/*
		echo $nsCarro."ok <br/>";
		echo $nsCaminhao."ok <br/>";
		echo $nsLancha."ok <br/>";
		echo $nsMoto."ok <br/>";

		die();
		*/
		$table = 'nf_subcategoria';

		$columnsArray = [
			'sSubCategoria',
			'sCarro',
			'sCaminhao',
			'sLancha',
			'sMoto'
		];

		$insertValuesArray = [
			$sNovo,
			$nsCarro,
			$nsCaminhao,
			$nsLancha,
			$nsMoto
		];

		$typeArray = ['string', 'string', 'string', 'string', 'string'];

		$insert = new SqlQuery();
		/**
		 * este método estático organiza as informações em um objeto anônimo da class stdClass e retorna
		 * o objeto organizado da forma necessária para ser consumido pelo método insert($obj)
		 */
		$obj = Helpers::configObjInsert($table, $columnsArray, $insertValuesArray, $typeArray);

		if ($insert->insert($obj) == FALSE) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	/**
	 * @param int $idCategory id de uma subcategoria
	 * @return  string $sHtml string html
	 * 
	 */
	public function deleteSubCategory(int $idSubCategory)
	{
		if (isset($idSubCategory)) {
			//definindo tabela a ser consultada e número do registro a ser deletado da tabela
			$table = 'nf_subcategoria';
			$condition = " nSubcategoria = ?";
			$conditionArray = [$idSubCategory];
			$typeArray = ['integer'];

			//instancia da classe cliente e chamada do método deleteCliente para deletar registro
			$deleteQuery = new SqlQuery();
			$obj = Helpers::configObjDelete($table, $condition, $conditionArray, $typeArray);

			if ($deleteQuery->delete($obj)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	/**
	 * recupera o id da subcategoria
	 * @param string $subCategory nome da subcategoria
	 * @return int id da subcategoria
	 * 
	 */
	public function getSubCatId($subCategory)
	{
		if ($subCategory == "Todas as categorias" || $subCategory == "") {
			return FALSE;
		}
		//recupera o id da sub
		$condition = "sSubcategoria LIKE ?";
		$conditionArray = [$subCategory];
		$columnsArray = ['nSubcategoria'];
		$typeArray = ['string'];
		$quantityInt = OHS_QTD;
		$pageInt = 1;
	  
		$tableArray = ['nf_subcategoria'];
		$select = new SqlQuery();
		$objSelect = Helpers::configObjSelect($tableArray, $columnsArray, $condition, $conditionArray, $typeArray, $quantityInt, $pageInt);
		$result = $select->select($objSelect);
		$idCategory = $result[0]['nSubcategoria']; //id da sub categoria

		return $idCategory;
	}

	/**
	 * recupera o nome de uma subcategoria
	 * @param int $id
	 * @return string nome da subcategoria
	 *
	 */
	public function getSubCat(int $id)
	{
		//recupera subcategoria
		$condition = " LIKE ?";
		$conditionArray = [$subCategory];
		$columnsArray = ['nSubcategoria'];
		$typeArray = ['string'];
		$quantityInt = OHS_QTD;
		$pageInt = 1;
	  
		$tableArray = ['nf_subcategoria'];
		$select = new SqlQuery();
		$objSelect = Helpers::configObjSelect($tableArray, $columnsArray, $condition, $conditionArray, $typeArray, $quantityInt, $pageInt);
		$result = $select->select($objSelect);
		$idCategory = $result[0]['nSubcategoria']; //id da sub categoria

		return $idCategory;
	}

	/**
	 * deleta um produto da tabela nf_item
	 * @param int $nItem id do produto a ser deletado
	 * @return string $sHtml
	 * 
	 */
	public function delete(int $nItem)
	{
		if (isset($nItem)) {
			//definindo tabela a ser consultada e número do registro a ser deletado da tabela
			$table = 'nf_item';
			$condition = " nItem = ?";
			$conditionArray = [$nItem];
			$typeArray = ['integer'];

			//instancia da classe cliente e chamada do método deleteCliente para deletar registro
			$deleteQuery = new SqlQuery();
			$obj = Helpers::configObjDelete($table, $condition, $conditionArray, $typeArray);

			if ($deleteQuery->delete($obj)) {
				//return $sHtml = "<p>Deletado.</p>";
				header("Location: index.php?p=cadastro&q=show&nC={$_SESSION['id']}");
			} else {
				return $sHtml = "<p>Não deletado</p>";
			}
		} else {
			return $sHtml = "<p>Nenhum ID informado.</p>";
		}
	}

	/**
	 * Retorna um array associativo de subcategorias [id => subcategoria]
	 * @param  string $cat o nome da categoria [carro, lancha, moto, caminhao]
	 * @return array $subcatArray
	 */
	public function getSubCatArray($cat)
	{
		switch ($cat) {
			case 'carro':
				$condition = "sCarro = ?";
				break;
			case 'caminhao':
				$condition = "sCaminhao = ?";
				break;
			case 'lancha':
				$condition = "sLancha = ?";
				break;
			case 'moto':
				$condition = "sMoto = ?";
				break;
		}

		$condition .= " ORDER BY sSubCategoria";
		
		$conditionArray = [1];
		$columnsArray = ['nSubcategoria', 'sSubCategoria'];
		$typeArray = ['string'];
		$quantityInt = 200;
		$pageInt = 1;
	  
		$tableArray = ['nf_subcategoria'];
		$select = new SqlQuery();
		$objSelect = Helpers::configObjSelect($tableArray, $columnsArray, $condition, $conditionArray, $typeArray, $quantityInt, $pageInt);

		$result = $select->select($objSelect);

		foreach ($result as $key => $value) {
			if ($value['nSubcategoria'] && $value['sSubCategoria']) {
				$subcatArray[$value['nSubcategoria']] = $value['sSubCategoria'];
			}
		}

		return $subcatArray;
	}

	/**
	 * Retorna um array associativo de subcategorias [id => subcategoria]
	 * @param  string $cat o nome da categoria [carro, lancha, moto, caminhao]
	 * @return array $subcatArray
	 */
	public function getSubCatAdminArray()
	{
		$columnsArray = [
			'nSubcategoria', 
			'sSubCategoria',
			'sCarro',
			'sCaminhao',
			'sLancha',
			'sMoto'
		];

		$condition = "nSubcategoria > ?";

		$condition .= " ORDER BY sSubCategoria";
		$conditionArray = ['1'];
		$typeArray = ['integer'];
		$quantityInt = 300;
		$pageInt = 1;
	  
		$tableArray = ['nf_subcategoria'];
		$select = new SqlQuery();
		$objSelect = Helpers::configObjSelect($tableArray, $columnsArray, $condition, $conditionArray, $typeArray, $quantityInt, $pageInt);

		$result = $select->select($objSelect);

		foreach ($result as $key => $value) {
			if ($value['nSubcategoria']) {
				$subcatArray[$value['nSubcategoria']] = array(
					'sSubCategoria' => $value['sSubCategoria'],
					'sCarro' => $value['sCarro'],
					'sCaminhao' => $value['sCaminhao'],
					'sLancha' => $value['sLancha'],
					'sMoto' => $value['sMoto']
				);
			}
		}

		return $subcatArray;
	}

	public function update($nItem)
	{
		//verifica os checkbox's marcados
		if (!isset($_POST['iEstado'])) {
			return $sHtml = "Informe o estado de seu produto";
			
		} else {
			$iEstado = Helpers::cleanVar('iEstado');
			
		}

		/**
		 * pendente o desenvolvimento de upload de imagens
		 */
		
		//upload, redimensionamento, e criação de uma miniatura da imagem caso ela seja enviada
		if (isset($_FILES['imageItem'])) {
			$imageType = explode('.', $_FILES['imageItem']['name']);
			$imageType = end($imageType);


			//faz uma busca pela última pasta criada
			$select = new SqlQuery();
			$dirNumber = $select->query("SELECT iPasta FROM nf_item ORDER BY iPasta DESC LIMIT 0,1");
			//número da ultima pasta criada
			$dirNumber = $dirNumber['iPasta'];

			if (!$dirNumber) {
				$dirNumber = 1;
			}

			//verifica quantos itens possui a pasta, caso seja maior que X, uma nova pasta deve ser criada
			$numberItens = $select->query("SELECT COUNT(iImagem) FROM nf_item WHERE iPasta = $dirNumber");
	

			if ($numberItens["COUNT(iImagem)"] >= 5) {
				//incrementa o $i para criar uma nova pasta com o valor de $i
				$dirNumber++;

				$newDir = OHS_PATH . "/ohs/data/images/" . $dirNumber;
				mkdir($newDir);
				chmod($newDir, 0644);

				$dir = $newDir."/";

			} else {
				$dir = OHS_PATH . "/ohs/data/images/" . $dirNumber;
			}

			$image = new Upload($_FILES['imageItem']);

			if ($image->uploaded) {
				//cria a imagem tamanho X
				$image->allowed = array('image/*');

				//nome do arquivo
				//$fileName = 'image_resized'.time().'.'.$imageType;
				$fileName = 'image_resized'.time();

				$image->file_src_name_body   = $fileName;
				$image->image_resize         = true;
				$image->image_ratio_crop     = true;
				$image->image_x              = 320;
				//$image->image_ratio_x        = 320;
				$image->image_ratio_y        = 238;
				$image->process($dir);

			}
				
		} else {
			return $sHtml = "Imagem não enviada";
		}
		
		//adiciona a extenão à imagem antes de salvar seu nome na base de dados
		if (!empty($_FILES['imageItem']['name'])) {
			$fileName = $fileName.'.'.$imageType;

		} else {
			$fileName = NULL;
		}

		$fk_subcategory = Helpers::cleanVar('iSubcategoria');


		/*tratar*/
		$iDateT = date("Y-m-d H:i:s");
		$iCategory = Helpers::cleanVar('iCategoria');
		$iTitle = Helpers::cleanVar('iTitulo');
		$iPrice = str_replace(",",".", Helpers::cleanVar('iPreco'));


		$table = 'nf_item';

		$columnsArray = [
			'iDataAlteracao',
			'iCategoria',
			'iTitulo',
			'iEstado',
			'iPreco',
			'fk_subcategoria',
			'iPasta',
			'iImagem'
		];

		$newsValuesArray = [
			$iDateT,
			$iCategory,
			$iTitle,
			$iEstado,   
			$iPrice,
			$fk_subcategory,
			$dirNumber,
			$fileName
		];

		if (empty($_FILES['imageItem']['name'])) {
			//remove colunas de pasta e nome do arquivo a ser atualizado
			array_pop($columnsArray);
			array_pop($columnsArray);

			array_pop($newsValuesArray);
			array_pop($newsValuesArray);
		}
		
		$condition = ' WHERE nItem = ?';
		$conditionArray = [$nItem];
		$typeArray = ['integer'];
		
		//instancia da classe cliente e chamada do método updateClient para atualizar dados
		$updateQuery = new SqlQuery();
		$obj = Helpers::configObjUpdate($table, $columnsArray, $newsValuesArray, $condition, $conditionArray, $typeArray);

		if ( $updateQuery->update($obj) ) {
			header("Location: index.php?p=cadastro&q=show&nC={$_SESSION['id']}");
		} else{
			return $sHtml = "<p>Dados não alterados</p>";
		}
	}
}
?>