<?php
/**
 * esta classe fornece métodos que se repetem em todas as classes concretas
 * @author Jerry Martins <zeroumbin@gmail.com>
 */

namespace OHS\NF\Model\Sql;

abstract class SqlAbstract
{

	public function mountBindValue($obj, $select) {

		//se existe a propriedade $obj->conditionArray então o objeto serve para deletar, atualizar ou listar dados
		if (isset($obj->conditionArray)) { 
			$obj->iterate = $obj->conditionArray;
		}				

		//se tem valores a ser inseridos então é para insert
		if (isset($obj->insertValuesArray)) {
			$obj->iterate = $obj->insertValuesArray;
		}				

		$i = 1;			
		$j = 0;			

		foreach ($obj->iterate as $key) {

			switch ($obj->typeArray[$j]) {

				case 'integer':
					$select->bindValue($i, $key, \PDO::PARAM_INT);
					break;

				case 'string':
					$select->bindValue($i, $key, \PDO::PARAM_STR);
					break;

				case 'double':
					$select->bindValue($i, $key, \PDO::PARAM_INT);
					break;

				case 'boolean':
					$select->bindValue($i, $key, \PDO::PARAM_BOL);
					break;

				case 'object':
					$select->bindValue($i, $key, \PDO::PARAM_OBJ);
					break;

				default:
					print_r($select->errorInfo());
					break;
			}

			$i++;
			$j++;
		}
	}
}

?>