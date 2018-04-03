<?php
/**
 * classe responsável por operações SQL na base de dados
 * @author Jerry Martins <zeroumbin@gmail.com>
 */

namespace OHS\NF\Sql;

use OHS\NF\Helpers\HelpersException;
use OHS\NF\Sql\SqlConnect;

class SqlQuery extends SqlAbstract
{
	private static $conn;

	public function __construct()
	{
		self::$conn = SqlConnect::doConnect();
	}

	/**
	 * INSERT genérico
	 * @param object $obj
	 * @return int $insertedLine = o id do registro inserido
	 */
	public function insert($obj)
	{
		//executa o método estático da classe Connect e retorna o obj conexão 
		$pdo = self::$conn;

		$columns = implode(',', $obj->columnsArray);

		$i = 0;
		$size = count($obj->columnsArray);

		try { // apenas um teste do log de erros

			if (strlen($columns) < 0) {
				throw new HelpersException("faltando dados", 1);
			}
			
			$insert = $pdo->prepare("INSERT INTO $obj->table ($columns) VALUES ($obj->bind)");

			parent::mountBindValue($obj, $insert);

		} catch (HelpersException $e) {
			echo "Erro: Script impossibilitado de continuar. Para relatar informações adicionais, entre em contato com o Administrador: " . $e->getAdminMail();
		}


		if ($result = $insert->execute()) {

			$insertedLine = $pdo->lastInsertId();

			return (int)$insertedLine;

		} else {

			if (defined('OHS_DEBUG') && OHS_DEBUG == 'sim') {
				ohs_log2file("[sql: falha] INSERT INTO $obj->table ($columns) VALUES ($obj->bind)");
			}
			//\print_r($count->errorInfo());
			return false;
		}
	}

	
	/**
	 * busca simples de um ou mais campos, sem envolver paginacao podendo incluir 'ORDER BY' como parte da condicao: (1 ORDER BY xxx)
	 * @param object $obj
	 * @return array de objetos $result
	 */
	public function select($obj)
	{
		try {
			$pdo = self::$conn;
			
			$columns = implode(',', $obj->columnsArray);
			$table = implode(',', $obj->tableArray);
	
			//paginação
			$start = ($obj->quantity * $obj->page) - $obj->quantity;
	
			if (strlen($obj->condition) > 0) {
				$sql = "SELECT $columns FROM $table WHERE $obj->condition LIMIT $start,$obj->quantity";
				
				$select = $pdo->prepare($sql);
				
				self::mountBindValue($obj, $select);
			}
	
			if ($select->execute()) {
	
				if ($rows = $select->rowCount()) {
	
					$result = $select->fetchAll(\PDO::FETCH_ASSOC);
	
					return $result;
	
				} else {
	
					if (defined('OHS_DEBUG') && OHS_DEBUG == 'sim') {
	
						$valuesCondition = \implode(',', $obj->conditionArray);
						throw new HelpersException("retornou vazio: $sql\n valores:$valuesCondition", 1, "erro_sql.txt");
					}
	
					return false;
				}
	
			} else {
	
				if (defined('OHS_DEBUG') && OHS_DEBUG == 'sim') {
	
					throw new HelpersException("erro ao processar consulta: $sql", 1);
				}
	
				return false;
			}
		} catch (HelpersException $e) {
			echo "Desculpe, houve problemas ao processar consulta. Para relatar informações adicionais, entre em contato com o Administrador: " . $e->getAdminMail();
		}
		
	}

	/**
	 * atualiza dados de campos selecionados
	 * @param object $obj = contendo a consulta montada, seus valores, condições valores para as condiçoes
	 * @return boolean
	 */
	public function update($obj)
	{
		$pdo = self::$conn;

		try {

			$query = "UPDATE $obj->table set ";

			foreach ($obj->columnsArray as $key => $value) {

				$query .= $obj->columnsArray[$key]."="."'".$obj->newValuesArray[$key]."'";
			
				if (isset($obj->columnsArray[$key + 1])) {

					$query .= ", ";
				}

				$update = $pdo->prepare($query);
			}

			if (strlen($obj->condition) > 0) {

				$query .= $obj->condition;
				$update = $pdo->prepare($query);
			
				parent::mountBindValue($obj, $update);
			}

			if ($result = $update->execute()) {
				
				return $result;

			} else {

				if (defined('OHS_DEBUG') && OHS_DEBUG == 'sim') {

					$newsValues = \implode(',',$obj->newsValuesArray);
					$valuesCondition = \implode(',',$obj->conditionArray);;
					//ohs_log2file("[sql: falha] $query");
					throw new HelpersException("erro ao processar consulta: $sql\n valores: $valuesCondition\n novos valores: $newsValues", 1);
					
				}

				print_r($update->errorInfo());

				return false;
			}

		} catch (\PDOException $e) {

			echo $e->getMessage();
			
		}
	}

	/**
	 * apaga um ou mais registros de uma tabela
	* @param object $obj
	* @return bool
	*/
	public function delete($obj)
	{
		//verifica se uma condição foi passada
		if (count($obj->conditionArray) > 0 && isset($obj->conditionArray[0])) {
			
			//executa o método estático da classe Connect e retorna o obj conexão 
			$pdo = self::$conn;
			
			$delete = $pdo->prepare("DELETE FROM $obj->table WHERE $obj->condition");
			
			parent::mountBindValue($obj, $delete);

			if ($delete->execute()) {

				return true;

			} else {

				if (defined('OHS_DEBUG') && OHS_DEBUG == 'sim') {

					ohs_log2file("[sql: falha] DELETE FROM $obj->table WHERE $obj->condition");
				}

				print_r( $delete->errorInfo() );

				return false;
			}

		} else {
			return false;
		}
	}
}

?>