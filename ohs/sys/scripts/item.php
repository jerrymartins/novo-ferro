<?php
/**
* Arquivo com dados recebidos via post, dados do arquivo index.php
* Realiza operações de CRUD nas tabelas nf_categoria e nf_item para itens
* Tipos permitidos $typeArray = ['string','double','integer', 'object', 'boolean'];
* @author Jerry Martins <jerry.adriany@operahouse.com.br>
*/

use OHS\NF\Sql\SqlQuery;
use OHS\NF\Helpers\Helpers;

switch ($q) {

	case 'save':
		//dados recebidos via post

		//verifica os checkbox's marcados
		if (!isset($_POST['iEstado'])) {
			return $sHtml = "Informe o estado de seu produto";
			
		} else {
			$iEstado = Helpers::cleanVar('iEstado');
			
		}

		// recupera o id da subcategoria
		if (isset($_POST['iSubcategoria'])) {
			$condition = "sSubcategoria LIKE ?";
			$conditionArray = [Helpers::cleanVar('iSubcategoria')];
			$columnsArray = ['nSubcategoria'];
			$typeArray = ['string'];
			$quantityInt = 1;
			$pageInt = 1;
		}	

		$tableArray = ['nf_subcategoria'];
		$select = new SqlQuery();
		$objSelect = Helpers::configObjSelect($tableArray, $columnsArray, $condition, $conditionArray, $typeArray, $quantityInt, $pageInt);
		$result = $select->select($objSelect);
		$idCategory = $result[0]['nSubcategoria']; //id da sub categoria

		/*tratar*/
		$iDateT = date("Y-m-d H:i:s");
		$iCategoria = Helpers::cleanVar('iCategoria');
		$fk_subcategoria = $idCategory;
		$iTitulo = Helpers::cleanVar('iTitulo');
		$iPreco = Helpers::cleanVar('iPreco');

		$table = 'nf_item';
		$columnsArray = [
			'iData',
			'iCategoria',
			'iTitulo',
			'iEstado',
			'iPreco',
			'fk_subcategoria',
			'fk_dono'
		];
		$insertValuesArray = [
			$iDateT,
			$iCategoria,
			$iTitulo,
			$iEstado,	
			$iPreco,
			$fk_subcategoria,
			$fk_dono
		];
		//tipos permitidos ['string', 'double', 'integer', 'boolean', 'object']; ver classe SqlAbstract
		$typeArray = ['string','string','string','string','double','integer','integer'];

		$insert = new SqlQuery();
		
		/**
		 * este método estático organiza as informações em um objeto anônimo da class stdClass e retorna
		 * o objeto organizado da forma necessária para ser consumido pelo método insert($obj)
		 */
		$obj = Helpers::configObjInsert($table, $columnsArray, $insertValuesArray, $typeArray);
		
		if ($insert->insert($obj) == false) {
			return $sHtml = "<p>não inserido</p>";
		} else {
			return $sHtml = "<p>inserido</p>";
		}

		break;

	case 'list':
	
		if (isset($nItem) && !empty($nItem)) { //exibe apenas um
			$condition = "nItem = ?";
			$conditionArray = [$nItem];
			$columnsArray = [
				'iTitulo',
				'iPreco'
			];
			$typeArray = ['integer'];
			$quantityInt = 1; //define LIMIT 0,1 na consulta sql

		} elseif (isset($iCategory) && !empty($iCategory)) { //lista por tipo
			$condition = "iCategoria = ?";
			$conditionArray = [$iCategory];
			$columnsArray = [
				'iTitulo',
				'iPreco'
			];
			$typeArray = ['string'];
			$quantityInt = 16; //no layout existem 16 itens por página

		} else { //lista todos itens por padrão
			$condition = "nItem > ?";
			$conditionArray = [0];
			$columnsArray = [
				'iTitulo',
				'iPreco'
			];
			$typeArray = ['integer'];
			$quantityInt = 16;
		}
		//definindo tabela/s e colunas a serem retornadas
		$tableArray = ['nf_item'];
		$pageInt = 1;
		
		$select = new SqlQuery();
		$obj = Helpers::configObjSelect($tableArray, $columnsArray, $condition, $conditionArray, $typeArray, $quantityInt, $pageInt);

		$result = $select->select($obj);
		break;
}

?>