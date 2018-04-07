<?php
namespace OHS\NF\Model;

use OHS\NF\Model\Sql\SqlQuery;
use OHS\NF\Model\Helpers\Helpers;

class Page
{
    public function getPageContent(int $nPage)
	{
		//definindo tabela/s e colunas a serem retornadas
		$tableArray = ['nf_paginas'];
		$pageInt = 1;
		$columnsArray = [
			'nPagina',
			'pDateUpdate',
			'pTitle',
			'pDescription',
			'pKeywords',
			'pText'			
		];				

		if (!empty($nPage)) {
			$condition = "nPagina = ?";
			$conditionArray = [$nPage];
			$typeArray = ['integer'];
			//define LIMIT 0,1 na consulta sql
			$quantityInt = 1;
		}
		
		$select = new SqlQuery();
		$obj = Helpers::configObjSelect($tableArray, $columnsArray, $condition, $conditionArray, $typeArray, $quantityInt, $pageInt);
		$result = $select->select($obj);

		return $result;
	}
}

?>