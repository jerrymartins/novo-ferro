<?php
namespace OHS\NF\Model;

use OHS\NF\Model\Sql\SqlQuery;
use OHS\NF\Model\Helpers\Helpers;
use OHS\NF\Controller\ItemController;

class Admin
{

	/**
	 * retorna array com dados para edição do config
	 * @return array
	 */
	public function configInfoArray()
	{
		//definindo tabela/s e colunas a serem retornadas
		$tableArray = ['nf_config'];
		$pageInt = 1;
		$columnsArray = [
			'nConfig',
			'configName',
			'configValue',
			'configDescription'
		];

		$condition = "nConfig > ?";
		$conditionArray = ['0'];
		$typeArray = ['integer'];
		//define LIMIT 0,1 na consulta sql
		$quantityInt = 100;

		
		$select = new SqlQuery();
		$obj = Helpers::configObjSelect($tableArray, $columnsArray, $condition, $conditionArray, $typeArray, $quantityInt, $pageInt);
		$result = $select->select($obj);

		return $result;
	}

	/**
	 * Atualiz o config do site
	 * @return string $notificacao
	 */
	public function configUpdate()
	{
		if ($_POST['c'] && is_array($_POST['c'])) {

			$table = 'nf_config';
			$columnsArray = [
				'configValue'
			];

			foreach ($_POST['c'] as $key => $value) {
				$nConfig = strip_tags($key);
				$configValue = strip_tags($value);

				$newValuesArray = [
					$configValue
				];

				$condition = ' WHERE nConfig = ?';
				$conditionArray = [$nConfig];
				$typeArray = ['integer'];

				$updateQuery = new SqlQuery();
				$obj = Helpers::configObjUpdate($table, $columnsArray, $newValuesArray, $condition, $conditionArray, $typeArray);

				//instancia da classe SqlQuery > método update para atualizar dados
				$updateQuery->update($obj);
			}

			return $sHtml = "Configuração atualizada. Dados ficarão disponíveis em alguns segundos.";
		} else {
			return $sHtml = "Dados não foram atualizados";
		}
    }

	/**
	 * Atualiz categorias do site
	 * @return string $notificacao
	 */
	public function categoryUpdate()
	{
		if ($_POST['q'] == 'categoria-update') {

			// cria uma nova categoria?
			$sNovo = Helpers::cleanVar('sNovo');

			if ($sNovo) {
				// @todo: criar uma nova categoria
				// $nsCarro = Helpers::cleanVar('nsCarro');
				// $nsCaminhao = Helpers::cleanVar('nsCaminhao');
				// $nsLancha = Helpers::cleanVar('nsLancha');
				// $nsMoto = Helpers::cleanVar('nsMoto');
				//
				//
				ItemController::newSubCategory();
				
			}

			$table = 'nf_subcategoria';
			$columnsArray = [
				'sSubCategoria',
				'sCarro',
				'sCaminhao',
				'sLancha',
				'sMoto'
			];

			$sCarroPost = $_POST['sCarro'];
			$sCaminhaoPost = $_POST['sCaminhao'];
			$sLanchaPost = $_POST['sLancha'];
			$sMotoPost = $_POST['sMoto'];

			foreach ($_POST['s'] as $key => $value) {
				$nSubcategoria = strip_tags($key);
				$sSubCategoria = strip_tags($value);

				// é para deletar?
				if (!$sSubCategoria) {

					if (ItemController::deleteSubCategory($nSubcategoria)) {
						if (ItemController::updateFkItem($nSubcategoria)) {
							return $sHtml = "categoria removida.";
						} else {
							die($nSubcategoria);
						}		
						
					} else {
						return $sHtml = "não foi possível remover categoria.";
					}
					

				} else {

					$sCarro = !isset($sCarroPost[$key]) ? '0' : '1';
					$sCaminhao = !isset($sCaminhaoPost[$key]) ? '0' : '1';
					$sLancha = !isset($sLanchaPost[$key]) ? '0' : '1';
					$sMoto = !isset($sMotoPost[$key]) ? '0' : '1';

					$newValuesArray = [
						$sSubCategoria,
						$sCarro,
						$sCaminhao,
						$sLancha,
						$sMoto
					];

					$condition = ' WHERE nSubcategoria = ?';
					$conditionArray = [$nSubcategoria];
					$typeArray = ['integer'];

					$updateQuery = new SqlQuery();
					$obj = Helpers::configObjUpdate($table, $columnsArray, $newValuesArray, $condition, $conditionArray, $typeArray);

					//instancia da classe SqlQuery > método update para atualizar dados
					$updateQuery->update($obj);
				}
			}

			return $sHtml = "Categorias atualizadas.";
		} else {
			return $sHtml = "Erro! Categorias não foram atualizadas.";
		}
	}

	/**
	 * Atualiza as informações da página quem somos
	 * 
	 */
	public function pageUpdateQS()
	{
		$title = Helpers::cleanVar('pTitle');
		$pDescription = Helpers::cleanVar('pDescription');
		$pKeywords = Helpers::cleanVar('pKeywords');
		$pContent = Helpers::cleanVar('pContent');

		//armazenando os dados recebidos via post em variáveis e arrays
		$cChangeDateT = date("Y-m-d H:i:s");
		$table = 'nf_paginas';

		$columnsArray = [
			'pTitle',
			'pDescription',
			'pKeywords',
			'pText',
			'pDateUpdate'
		];

		$newValuesArray = [
			$title,
			$pDescription,
			$pKeywords,
			$pContent,
			$cChangeDateT
		];

		$condition = ' WHERE nPagina = ?';
		$conditionArray = [1];
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

}

?>