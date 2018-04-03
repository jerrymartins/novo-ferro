<?php
/**
* classe com métodos utilitários
*/

namespace OHS\NF\Helpers;

final class Helpers
{
	/**
	 * verifica o método de envio de uma informação, limpa e a retorna
	 * @param string/number $name é o name da informação enviada, seja via get ou post
	 * @return $q
	 */	
	public static function cleanVar($name)
	{
		if (isset($_POST[$name])) {
			$q = strip_tags($_POST[$name]);
		} else if (isset($_GET[$name])) {
			$q = strip_tags($_GET[$name]);
		} 

		if (isset($q)) {
			return $q;
		} else {
			return false;
		}
	}

	/**
	 * remove todos os caracteres de um número, retornando apenas o número
	 * @param string $valor uma string contendo numeros e caracteres
	 * @return int $numerosLimpo
	 */
	public static function removeCharacters($value)
	{
		$cleanNumber = preg_replace('/[^0-9]/', '', $value);

		return $cleanNumber;
	}


	/**
	 * formata uma data para formato brasileiro ou MySql
	 * @param $date = a data fornecida
	 * @param $mode = "db" para mysql ou "br" para data brasileira]
	 * @param $type = "" ou "datetime"
	 * @return string $formatedDate
	 */

	public static function formatDate($date, $mode = 'db', $type = '')
	{
		if ($mode == 'br') {
			$dtYear = substr($date, 0, 4);
			$dtMonth = substr($date, 5, 2);
			$dtDay = substr($date, 8, 2);
			$formatedDate = "$dtDay/$dtMonth/$dtYear";
		} else {
			$dtYear = substr($date, 6, 4);
			$dtMonth = substr($date, 3, 2);
			$dtDay = substr($date, 0, 2);
			$formatedDate = "$dtYear-$dtMonth-$dtDay";
		}

		if ($type == 'datetime') {
			$hour = substr($dt, 10, 9);
			$formatedDate = $formatedDate.$hora;
		}

		return $formatedDate;
	}

	/**
	 * este método cria uma máscara para um valor, seja ele cep, cpf, cnpj, número de telefone, a mascara
	 * é definida pelo programador, ela pode ser de qualquer tipo, desde que compatível com o número
	 * @param string $numero numero que será mascarado
	 * @param string $mascara máscara a ser usada ex:
	 * para cep enviar xxxxx-xxx
	 * para cpf enviar xxx.xxx.xxx-xx
	 * para cnpj enviar xx.xxx.xxx/xxxx-xx
	 * 
	 * @return string numero mascarado
	 */
	public static function formatNumber($val, $mask)
	{
		$maskared = '';
		$k = 0;

		for ($i = 0; $i <= strlen($mask) - 1; $i++) {

			if($mask[$i] == 'x') {

				if(isset($val[$k])) {
					$maskared .= $val[$k++];
				}

			} else {

				if(isset($mask[$i])) {
					$maskared .= $mask[$i];
				}
			}
		}

		return $maskared;
	}


	/**
	 * retorna um html com a lista de estados brasileiros, podendo um deles estar selecionado ou não
	 * @param string $estado nome do estado selecionado
	 * @param string $selectName nome do campo select 
	 * @return strinh select com options
	 */
	public static function selectEstado($selectName = '', $estado = '', $cssClass = '')
	{
		if ($estado) {
			$estadoSelecionado = $estado;
		} else {
			$estadoSelecionado = '';
		}

		//nome do select html
		if (!$selectName) {
			$selectName = '';
		}

		$estados = "<select name='$selectName' class = '$cssClass'>
			<option value='AC'>Acre</option>
			<option value='AL'>Alagoas</option>
			<option value='AP'>Amap&aacute;</option>
			<option value='AM'>Amazonas</option>
			<option value='BA'>Bahia</option>
			<option value='CE'>Cear&aacute;</option>
			<option value='DF'>Distrito Federal</option>
			<option value='ES'>Esp&iacute;rito Santo</option>
			<option value='GO'>Goi&aacute;s</option>
			<option value='MA'>Maranh&atilde;o</option>
			<option value='MT'>Mato Grosso</option>
			<option value='MG'>Minas Gerais</option>
			<option value='MS'>Mato Grosso do Sul</option>
			<option value='PA'>Par&aacute;</option>
			<option value='PB'>Para&iacute;ba</option>
			<option value='PR'>Paran&aacute;</option>
			<option value='PE'>Pernambuco</option>
			<option value='PI'>Piau&iacute;</option>
			<option value='RJ'>Rio de Janeiro</option>
			<option value='RN'>Rio Grande do Norte</option>
			<option value='RS'>Rio Grande do Sul</option>
			<option value='RO'>Rond&ocirc;nia</option>
			<option value='RR'>Roraima</option>
			<option value='SC'>Santa Catarina</option>
			<option value='SP'>S&atilde;o Paulo</option>
			<option value='SE'>Sergipe</option>
			<option value='TO'>Tocantins</option>
			</select>
			";

		$estados = str_replace(
			"<option value='{$estadoSelecionado}'>", // procura
			"<option value='{$estadoSelecionado}' selected>", //substitui
			$estados // onde
			);

		return $estados;
	}

	/** não usar
	 * retorna um html com a lista de categorias de peças, podendo uma delas estar selecionada ou não
	 * @param string $selectName nome do campo select 
	 * @param string $categoria nome da categoria selecionada
	 * @param string $cssClass classe css para formatação
	 * @return string select com options
	 */
	public static function selectCategorias($selectName = '', $categoria = '', $cssClass = '')
	{
		if ($categoria) {
			$categoriaSelecionada = $categoria;
		} else {
			$categoriaSelecionada = '';
		}

		//nome do select html
		if (!$selectName) {
			$selectName = '';
		}

		$categorias = "<select name='$selectName' class = '$cssClass'>
			<option value='Amortecedores'>Amortecedores</option>
			<option value='Baterias'>Baterias</option>
			<option value='Cabos'>Cabos</option>
			<option value='Carburador'>Carburador</option>
			<option value='Carenagens'>Carenagens</option>
			<option value='Cavaletes'>Cavaletes</option>
			<option value='Componentes De Freio'>Componentes de Freio</option>
			<option value='Componentes Elétricos'>Componentes Elétricos</option>
			<option value='Embreagem'>Embreagem</option>
			<option value='Escapamentos'>Escapamentos</option>
			<option value='Farol'>Farol</option>
			<option value='Filtros'>Filtros</option>
			<option value='Guidão'>Guidão</option>
			<option value='Lubrificantes'>Lubrificantes</option>
			<option value='Mantes e Manicotos'>Mantes e Manicotos</option>
			<option value='Motor'>Motor</option>
			<option value='Pedais e Pedaleiras'>Pedais e Pedaleiras</option>
			<option value='Retrovisores'>Retrovisores</option>
			<option value='Rodas e Componentes'>Rodas e Componentes</option>
			<option value='Transmissão'>Transmissão</option>
			<option value='Boias'>Boias</option>
			<option value='Bombas'>Bombas</option>
			<option value='Bancos'>Bancos</option>
			<option value='Rolamentos'>Rolamentos</option>
			</select>
			";

		$categorias = str_replace(
			"<option value='{$categoriaSelecionada}'>", // procura
			"<option value='{$categoriaSelecionada}' selected>", //substitui
			$categorias // onde
			);

		return $categorias;
	}
	
	/**
	 * gera o hash de uma string
	 * @param string $password senha informada pelo usuário
	 * @return string $newPasswordHash hash da senha informada
	 */
	public static function newPasswordHash($password)
	{
		$options = array('cost' => 10);
		$newPasswordHash = password_hash($password, PASSWORD_DEFAULT, $options);

		return $newPasswordHash;
	}

	/**
	 * verifica se a senha informada confere com o hash
	 * @param string $password senha informada pelo usuário
	 * @param string $hash hash retornado da base consulta sql
	 * @return bool ou string em caso de precisar fazer rehash
	 */
	public static function passwordVerify($password, $hash)
	{
		$options = array('cost' => 10);

		if (password_verify($password, $hash)) {
			// Ferifica se o algoritmo de hash ou o custo da criptografia foram alterados
			if (password_needs_rehash($hash, PASSWORD_DEFAULT, $options)) {
				// se algo foi alterado, faça um novo hash e o retorne
				$newPasswordHash = password_hash($password, PASSWORD_DEFAULT, $options);

				return $newPasswordHash;
			}	
			return true;

		} else {
			return false;		
		}
	}

	/**
	 * Configura um objeto com dados para inserção na base de dados
	 * @param string $table nome da tabela
	 * @param array $columnsArray colunas onde serão inseridos dados
	 * @param array $insertValuesArray dados que serão inseridos
	 * @param array $typeArray tipos do php : integer - double - string - boolean - object
	 * @return object $obj objeto personalizado
	 */
	public static function configObjInsert(string $table, array $columnsArray, array $insertValuesArray, array $typeArray)
	{
		$obj = new \stdClass;
		$obj->table = $table;
		$obj->columnsArray = $columnsArray;
		$obj->insertValuesArray = $insertValuesArray;
		$obj->typeArray = $typeArray;
		$obj->bind = implode(',', array_fill(0, count($obj->columnsArray), '?'));

		return $obj;
	}

	/**
	 * Configura um objeto com dados para realizar uma consulta na base de dados
	 * @param array $tableArray nome/s de tabela/s que serão consultadas
	 * @param array $columnsArray nomes das colunas que serão retornadas
	 * @param string $condition condição da consulta
	 * @param array $conditionArray valores da condição da consulta
	 * @param array $typeArray tipo de dados contidos na condição
	 * @param int $valuesQuantity quantidade de dados retornados 
	 * @param int $page número da página (para paginação)
	 * @return object $obj objeto personalizado
	 */
	public static function configObjSelect(array $tableArray, array $columnsArray, string $condition, array $conditionArray, array $typeArray, int $valuesQuantity, $page)
	{
		$obj = new \stdClass;
		$obj->tableArray = $tableArray;
		$obj->columnsArray = $columnsArray;
		$obj->condition = $condition;
		$obj->conditionArray = $conditionArray;
		$obj->typeArray = $typeArray;
		$obj->quantity =  $valuesQuantity; // total de itens listados no layout
		$obj->page = $page; //numero atual da página
		
		return $obj;
	}

	/**
	 * Configura um objeto com dados para atualizar um registro
	 * @param string $table nome da tabela
	 * @param array $columnsArray nomes das colunas que terão dados alterados
	 * @param array $newValuesArray novos valores 
	 * @param string $condition condição da consulta
	 * @param array $conditionArray valores da condição
	 * @param array $typeArray tipos de dados dos valores da condição
	 * @return object $obj objeto personalizado
	 */
	public static function configObjUpdate(string $table, array $columnsArray, array $newValuesArray,  string $condition, array $conditionArray, array $typeArray)
	{
		$obj = new \stdClass;
		$obj->table = $table;
		$obj->columnsArray = $columnsArray;
		$obj->newValuesArray = $newValuesArray;
		$obj->condition = $condition;
		$obj->conditionArray = $conditionArray;
		$obj->typeArray = $typeArray;

		return $obj;
	}

	/**
	 * Configura um objeto com dados para deletar um registro
	 * @param string $table nome da tabela
	 * @param string $condition condição para apagar o registro
	 * @param array $conditionArray valores da condição
	 * @param array $typeArray tipos dos valores da condição
	 * @return object $obj objeto personalizado
	 */
	public static function configObjDelete(string $table, string $condition, array $conditionArray, array $typeArray)
	{
		$obj = new \stdClass;
		$obj->table = $table;
		$obj->condition = $condition;
		$obj->conditionArray = $conditionArray;
		$obj->typeArray = $typeArray;

		return $obj;
	}
}

?>