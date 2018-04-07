<?php
namespace OHS\NF\Model;

use OHS\NF\Model\Sql\SqlQuery;
use OHS\NF\Model\Helpers\Helpers;

class Client
{
	public function save()
	{
		#dados recebidos via post
		//verifica se aceitou os termos
		if (isset($_POST['cCheckBoxAccept']) && $_POST['cCheckBoxAccept'] === "s") {
			$cCheckBoxAccept = "s";
		} else {
			return $sHtml = "é preciso aceitar os termos";
		}

		//verifica os checkbox's marcados
		if (!isset($_POST['cCheckBoxF']) && !isset($_POST['cCheckBoxO']) && ($_POST['cCheckBoxF'] != "f" || $_POST['cCheckBoxO'] != "o"))  {
			return $sHtml = "marque as opções fornecedor, oficina ou as duas";
			
		} elseif (isset($_POST['cCheckBoxF']) && !isset($_POST['cCheckBoxO'])) {
			$cType = Helpers::cleanVar('cCheckBoxF');
		} elseif (isset($_POST['cCheckBoxO']) && !isset($_POST['cCheckBoxF'])) {
			$cType = Helpers::cleanVar('cCheckBoxO');
		} elseif (isset($_POST['cCheckBoxF']) && isset($_POST['cCheckBoxO'])) {
			$cType = 'fo';
		}

		//se o filtro de e-mail retornar false
		if (!$cEmail = Helpers::cleanVar('cEmail', 'email')) {
			return $sHtml = "e-mail inválido: ".$_POST['cEmail'];
		}

		$cCpfCnpj = Helpers::removeCharacters(Helpers::cleanVar('cCpfCnpj'));		
		$cName = Helpers::cleanVar('cRazaosocial');
		$cInscricaoEstadual = Helpers::cleanVar('cInscricaoEstadual');
		$cContact = Helpers::cleanVar('cResponsavel');
		$cDDDTel = Helpers::removeCharacters(Helpers::cleanVar('cDDDTel'));
		$cTelephone = Helpers::removeCharacters(Helpers::cleanVar('cTelefone'));
		$cDDDCel = Helpers::removeCharacters(Helpers::cleanVar('cDDDCel'));
		$cCelular = Helpers::removeCharacters(Helpers::cleanVar('cCelular'));
		$cRua = Helpers::cleanVar('cRua');
		$cNumero = Helpers::cleanVar('cNumero');
		$cPontoReferencia = Helpers::cleanVar('cPontoReferencia');
		$cBairro = Helpers::cleanVar('cBairro');
		$cCep = Helpers::removeCharacters(Helpers::cleanVar('cCep'));
		$cCidade = Helpers::cleanVar('cCidade');
		$cEstado = Helpers::cleanVar('cEstado');
		$cPassword = Helpers::cleanVar('cSenha'); //gera um hash da senha
		$cPasswordConfirm = Helpers::cleanVar('cSenhaConfirm');	
	
		if(strcmp($cPassword, $cPasswordConfirm) == 0) {
			$cPassword = Helpers::newPasswordHash($cPassword);
		} else {
			return $sHtml = "Senhas não conferem";
		}
		//data de alteração do registro
		$cDateT = date("Y-m-d H:i:s");

		$table = 'nf_cadastro';
		$columnsArray = [
			'cCpfCnpj',
			'cData',
			'cTipo',
			'cEmail',
			'cRazaoSocial',
			'cResponsavel',
			'cDDDTel',
			'cTelefone',
			'cDDDCel',
			'cCelular',
			'cRua',
			'cNumero',
			'cBairro',
			'cPontoReferencia',
			'cCep',
			'cCidade',
			'cEstado',
			'cInscricaoEstadual',
			'cSenha'	
		];
		$insertValuesArray = [
			$cCpfCnpj,
			$cDateT,
			$cType,
			$cEmail,
			$cName,
			$cContact,
			$cDDDTel,
			$cTelephone,
			$cDDDCel,
			$cCelular,
			$cRua,
			$cNumero,
			$cBairro,
			$cPontoReferencia,
			$cCep,
			$cCidade,
			$cEstado,
			$cInscricaoEstadual,
			$cPassword
		];
		$typeArray = ['string', 'string', 'string', 'string','string', 'string', 'string', 'string','string', 'string', 'string', 'string','string', 'string', 'string', 'string','string', 'string', 'string'];

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
	}

	public function InfoDbClientArray(int $nCadastro = NULL, string $cType = NULL, $search = NULL)
	{
		//definindo tabela/s e colunas a serem retornadas
		$tableArray = ['nf_cadastro'];
		$pageInt = 1;
		$columnsArray = [
			'nCadastro',
			'cCpfCnpj', 
			'cRazaoSocial',
			'cTipo',
			'cResponsavel',	
			'cEmail',
			'cInscricaoEstadual',
			'cDDDTel',
			'cTelefone',
			'cDDDCel',
			'cCelular',
			'cRua',
			'cNumero', 
			'cBairro',
			'cPontoReferencia', 
			'cCep', 
			'cCidade', 
			'cEstado'
		];

		if (isset($search) && !empty($search)) {
			$condition = "cRazaoSocial LIKE ? AND cEstado LIKE ?";
			$conditionArray = ["%".$search."%", "%".$_SESSION["estado"]."%"];
			$typeArray = ['string', 'string'];
			$quantityInt = OHS_QTD; //no layout existem 16 itens por página
			$pageInt = 1; // paginação, numero da pagina

		} else {
			//exibe apenas um
			if (isset($nCadastro) && !empty($nCadastro)) {
				$condition = "nCadastro = ?";
				$conditionArray = [$nCadastro];
				$typeArray = ['integer'];
				//define LIMIT 0,1 na consulta sql
				$quantityInt = 1;
				$pageInt = 1;

				//lista por tipo
			} elseif (isset($cType) && !empty($cType)) {
				$condition = "cTipo = ? AND cEstado = ?";
				$conditionArray = [$cType, $_SESSION["estado"]];
				$typeArray = ['string', 'string'];
				$quantityInt = OHS_QTD; //no layout existem 16 itens por página
				$pageInt = 1;

			} elseif ((!isset($cType) || empty($cType)) && (!isset($nCadastro) || empty($nCadastro))) { //lista fornecedores por padrão
				$condition = "cTipo = ?";
				$conditionArray = ['f'];
				$typeArray = ['string'];
				$quantityInt = OHS_QTD;
				$pageInt = 1;
			}
		}

		
		
		$select = new SqlQuery();
		$obj = Helpers::configObjSelect($tableArray, $columnsArray, $condition, $conditionArray, $typeArray, $quantityInt, $pageInt);
		$result = $select->select($obj);

		return $result;
	}

	public function update($nCadastro)
	{
		if (isset($_POST['cCheckBoxAccept']) && $_POST['cCheckBoxAccept'] === "s") {
			$cCheckBoxAccept = "s";
		} else {
			return $sHtml = "é preciso aceitar os termos update";
		}

		//verifica os checkbox's marcados
		if (!isset($_POST['cCheckBoxF']) && !isset($_POST['cCheckBoxO']) && ($_POST['cCheckBoxF'] != "f" || $_POST['cCheckBoxO'] != "o"))  {
			return $sHtml = "marque as opções fornecedor e/ou oficina";
			
		} elseif (isset($_POST['cCheckBoxF']) && !isset($_POST['cCheckBoxO'])) {
			$cType = Helpers::cleanVar('cCheckBoxF');
		} elseif (isset($_POST['cCheckBoxO']) && !isset($_POST['cCheckBoxF'])) {
			$cType = Helpers::cleanVar('cCheckBoxO');
		} elseif (isset($_POST['cCheckBoxF']) && isset($_POST['cCheckBoxO'])) {
			$cType = 'fo';
		}
		
		//se o filtro de e-mil retornar false
		if (!$cEmail = Helpers::cleanVar('cEmail', 'email')) {
			return $sHtml = "e-mail inválido: ".$_POST['cEmail'];
		}
		
		$cCpfCnpj = Helpers::removeCharacters(Helpers::cleanVar('cCpfCnpj'));	
		$cName = Helpers::cleanVar('cRazaosocial');
		$cInscricaoEstadual = Helpers::cleanVar('cInscricaoEstadual');
		$cContact = Helpers::cleanVar('cResponsavel');
		$cDDDTel = Helpers::removeCharacters(Helpers::cleanVar('cDDDTel'));
		$cTelephone = Helpers::removeCharacters(Helpers::cleanVar('cTelefone'));
		$cDDDCel = Helpers::removeCharacters(Helpers::cleanVar('cDDDCel'));
		$cCelular = Helpers::removeCharacters(Helpers::cleanVar('cCelular'));
		$cRua = Helpers::cleanVar('cRua');
		$cNumero = Helpers::cleanVar('cNumero');
		$cPontoReferencia = Helpers::cleanVar('cPontoReferencia');
		$cBairro = Helpers::cleanVar('cBairro');
		$cCep = Helpers::removeCharacters(Helpers::cleanVar('cCep'));
		$cCidade = Helpers::cleanVar('cCidade');
		$cEstado = Helpers::cleanVar('cEstado');
		$cPassword = Helpers::cleanVar('cSenha');
		$cPasswordConfirm = Helpers::cleanVar('cSenhaConfirm');

		if(strcmp($cPassword, $cPasswordConfirm) == 0 && !empty($cPassword)) {
			$cPassword = Helpers::newPasswordHash($cPassword);
		}

		//armazenando os dados recebidos via post em variáveis e arrays
		$cChangeDateT = date("Y-m-d H:i:s");
		$table = 'nf_cadastro';
		$columnsArray = [
			'cCpfCnpj',
			'cDataAlteracao',
			'cTipo',
			'cEmail',
			'cRazaoSocial',
			'cResponsavel',
			'cDDDTel',
			'cTelefone',
			'cDDDCel',
			'cCelular',
			'cRua',
			'cNumero',
			'cBairro',
			'cPontoReferencia',
			'cCep',
			'cCidade',
			'cEstado',
			'cInscricaoEstadual',
			'cSenha'
		];
		$newValuesArray = [
			$cCpfCnpj,
			$cChangeDateT,
			$cType,
			$cEmail,
			$cName,
			$cContact,
			$cDDDTel,
			$cTelephone,
			$cDDDCel,
			$cCelular,
			$cRua,
			$cNumero,
			$cBairro,
			$cPontoReferencia,
			$cCep,
			$cCidade,
			$cEstado,
			$cInscricaoEstadual,
			$cPassword
		];

		//caso não informe a nova senha, retire a senha da lista de itens a ser alterados
		if (empty($cPassword)) {
			array_pop($newValuesArray);
			array_pop($columnsArray);

		}

		//echo "<pre>".var_dump($columnsArray)."</pre>";
		//echo "<pre>".var_dump($newValuesArray)."</pre>";
		//die();

		$condition = ' WHERE nCadastro = ?';
		$conditionArray = [$nCadastro];
		$typeArray = ['integer'];
		
		//instancia da classe cliente e chamada do método updateClient para atualizar dados
		$updateQuery = new SqlQuery();
		$obj = Helpers::configObjUpdate($table, $columnsArray, $newValuesArray, $condition, $conditionArray, $typeArray);

		if ( $updateQuery->update($obj) ) {
			header("Location: index.php?p=index");
		} else{
			return $sHtml = "<p>Dados não alterados</p>";
		}
	}

	public function delete(int $nCadastro)
	{
		if (isset($nCadastro)) {
			//definindo tabela a ser consultada e número do registro a ser deletado da tabela
			$table = 'nf_cadastro';
			$condition = " nCadastro = ?";
			$conditionArray = [$nCadastro];
			$typeArray = ['integer'];

			//instancia da classe cliente e chamada do método deleteCliente para deletar registro
			$deleteQuery = new SqlQuery();
			$obj = Helpers::configObjDelete($table, $condition, $conditionArray, $typeArray);

			if ($deleteQuery->delete($obj)) {
				return $sHtml = "<p>Deletado.</p>";
			} else {
				return $sHtml = "<p>Não deletado</p>";
			}
		} else {
			return $sHtml = "<p>Nenhum ID informado.</p>";
		}
	}
	
	public function edit(array $result)
	{
		$ref = $result["cPontoReferencia"] ?? "";
		$cep = $result["cCep"] ?? "";
		$cnpj = $result["cCpfCnpj"] ?? "";
		$cType = $result["cTipo"] ?? "";
		
		if (isset($result['cEstado'])) {
			#Helpers::selectEstado('name do select', 'estado selecionado', 'classe css')
			$selectEstados = Helpers::selectEstado('cEstado', $result['cEstado'], "form-control");
		
		} else {
			$selectEstados = Helpers::selectEstado('cEstado', '', 'form-control');
		}
		
		if($ref && !empty($ref)) {
			$reference = "($ref)";
		} else {
			$reference = '';
		}
		
		$checkedF = "";
		$checkedO = "";
		if ($cType === 'f') {
			$checkedF = "checked";
		}
		if ($cType === 'o') {
			$checkedO = "checked";
		}
		if ($cType === 'fo') {
			$checkedF = "checked";
			$checkedO = "checked";
		}
		
		if(!empty($cnpj)) {
			$cnpj =  Helpers::formatNumber($cnpj, "xx.xxx.xxx/xxxx-xx") ?? "";
			$cep = Helpers::formatNumber($cep, "xxxxx-xxx") ?? "";
		}

		$data = array();

		$data["cRazaoSocial"] = $result["cRazaoSocial"] ?? "";
		$data["cCpfCnpj"] = $cnpj ?? "";
		$data["cDDDTel"] = $result["cDDDTel"] ?? "";
		$data["cTelefone"] = $result["cTelefone"] ?? "";
		$data["cDDDCel"] = $result["cDDDCel"] ?? "";
		$data["cCelular"] = $result["cCelular"] ?? "";
		$data["cEmail"] = $result["cEmail"] ?? "";
		$data["cRua"] = $result["cRua"] ?? "";
		$data["cNumero"] = $result["cNumero"] ?? "";
		$data["cBairro"] = $result["cBairro"] ?? "";
		$data["cPontoReferencia"] = $result["cPontoReferencia"] ?? "";
		$data["cCidade"] = $result["cCidade"] ?? "";
		$data["cCep"] = $cep ?? "";
		$data["cInscricaoEstadual"] = $result["cInscricaoEstadual"] ?? "";
		$data["cResponsavel"] = $result["cResponsavel"] ?? "";
		$data["cEstado"] = $selectEstados;
		$data["checkedF"] = $checkedF ?? "";
		$data["checkedO"] = $checkedO ?? "";

		return $data;
	}

	public function login(string $email, string $password)
	{
		$select = new SqlQuery();

		$_SESSION['isadmin'] = 0;

		// se não for um e-mail, então deve ser um login de administrador, recupere a senha e armazene em result
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$result = $select->getUser($email, 'admin');

			//se não existir o usuário informado
			if (!$result) {
				return $sHtml = "Usuário não encontrado";
			}

			/*
				strcmp retorna < 0 se a primeira string for maior que a segunda, > 0 se a primeira for maior que a segunda,
				e retorna 0 se as strings forem idênticas, incluindo camel case
			*/
			$validatePass = strcmp($password, $result['adSenha']);
			$validateLogin = strcmp($email, $result['adNome']);
			
			if ($validateLogin == 0 && $validatePass == 0) {
				$_SESSION['logado'] = true;
				$_SESSION['usuario'] = $result['adNome'];
				$_SESSION['isadmin'] = 1;

				header("Location: index.php?p=admin&q=overview");//return $sHtml = "Página do administrador";

			} else {
				return $sHtml = "Erro! Verifique login e senha.";
			}
		
		} else {

			$result = $select->getUser($email);
			//se não existir o usuário informado
			if (!$result) {
				return $sHtml = "Erro! Usuário não encontrado.";
			}


			$validate = Helpers::passwordVerify($password, $result["cSenha"]);

			if ($validate) {

				$_SESSION['logado'] = true;
				$_SESSION['usuario'] = $result['cRazaoSocial'];
				$_SESSION['id'] = $result['nCadastro'];
				//header("Location: index.php?p=cadastro&q=show&nC={$_SESSION['id']}");
				header("Location: index.php");
			} else {
				return $sHtml = "Erro! Verifique login e senha.";
			}
		}
	}

	public function organizeArrayShowClient(array $result)
	{
		$data = array();
		
		$data[0]["cRazaoSocial"] = $result["cRazaoSocial"] ?? "";
		$data[0]["cCpfCnpj"] = $result["cCpfCnpj"] ?? "";
		$data[0]["cDDDTel"] = $result["cDDDTel"] ?? "";
		$data[0]["cTelefone"] = $result["cTelefone"] ?? "";
		$data[0]["cDDDCel"] = $result["cDDDCel"] ?? "";
		$data[0]["cCelular"] = $result["cCelular"] ?? "";
		$data[0]["cEmail"] = $result["cEmail"] ?? "";
		$data[0]["cRua"] = $result["cRua"] ?? "";
		$data[0]["cNumero"] = $result["cNumero"] ?? "";
		$data[0]["cBairro"] = $result["cBairro"] ?? "";
		$data[0]["cPontoReferencia"] = $result["cPontoReferencia"] ?? "";
		$data[0]["cCidade"] = $result["cCidade"] ?? "";
		$data[0]["cEstado"] = $result["cEstado"] ?? "";
		$data[0]["cCep"] = $result["cCep"] ?? "";
		$data[0]["cInscricaoEstadual"] =  $result["cInscricaoEstadual"] ?? "";
		$data[0]["cResponsavel"] = $result["cResponsavel"] ?? "";

		//os telefones organizados
		$data[0]["tel"] = ""; 
		
		if($data[0]["cPontoReferencia"] && !empty($data[0]["cPontoReferencia"])) {
			$data[0]["cPontoReferencia"] = "({$data[0]['cPontoReferencia']})";
		}
		// se tiver telefone e celular
		if ($data[0]["cTelefone"] && $data[0]["cCelular"]) {
		
			if ($data[0]["cDDDTel"] == $data[0]["cDDDCel"]) {
				$data[0]["tel"] = $data[0]["cDDDTel"] . " " . $data[0]["cTelefone"] . " | " . $data[0]["cCelular"];
			} else {
				$data[0]["tel"] = $data[0]["cDDDTel"] . " " . $data[0]["tel"] . " | " . $data[0]["cDDDCel"] . " " . $data[0]["cCelular"];
			}
		//se tiver somente telefone	
		} elseif ($data[0]["cTelefone"]) {
			$data[0]["tel"] = $data[0]["cDDDTel"] . " " . $data[0]["cTelefone"];
		//se tiver somente celular
		} elseif ($data[0]["cCelular"]) {
			$data[0]["tel"] = $data[0]["cDDDCel"] . " " . $data[0]["cCelular"];
		}
		
		$data[0]["cCpfCnpj"] =  Helpers::formatNumber($data[0]["cCpfCnpj"], "xx.xxx.xxx/xxxx-xx");
		
		$data[0]["cCep"] = Helpers::formatNumber($data[0]["cCep"], "xxxxx-xxx");
		
		$cCep = $data[0]["cCep"];
		$data[0]["address"] = "{$data[0]['cRua']}, {$data[0]['cNumero']} - {$data[0]['cBairro']} {$data[0]['cPontoReferencia']} {$data[0]['cCidade']} / {$data[0]['cEstado']} - CEP: {$data[0]['cCep']}";

		$data[0]["addressGoogleMap"] = $data[0]['cRua'] . ', ' . $data[0]['cNumero'] . ' - ' . $data[0]['cBairro'] . ', ' . $data[0]['cCidade'] . ' - ' . $data[0]['cEstado'] . ', ' . $cCep;

		return $data;
	}

	public function organizeArrayListClient(array $result)
	{
		$data = array();
		$cep = array();
		
		//existe um item ($result['rowCount']) neste array que não contém dados de cliente, e sim o total de oficinas/fornecedores encontrados, ele é subtraído do total de itens do aray
		for ($i=0; $i < count($result) - 1; $i++) {
			//os telefones organizados
			$data[$i]["tel"] = ""; 
			
			if($result[$i]["cPontoReferencia"] && !empty($result[$i]["cPontoReferencia"])) {
				$data[$i]["cPontoReferencia"] = "({$result[$i]['cPontoReferencia']})";
			}
			// se tiver telefone e celular
			if ($result[$i]["cTelefone"] && $result[$i]["cCelular"]) {
			
				if ($result[$i]["cDDDTel"] == $result[$i]["cDDDCel"]) {
					$data[$i]["tel"] = $result[$i]["cDDDTel"] . " " . $result[$i]["cTelefone"] . " | " . $result[$i]["cCelular"];
				} else {
					$data[$i]["tel"] = $result[$i]["cDDDTel"] . " " . $result[$i]["tel"] . " | " . $result[$i]["cDDDCel"] . " " . $result[$i]["cCelular"];
				}
			//se tiver somente telefone	
			} elseif ($result[$i]["cTelefone"]) {
				$data[$i]["tel"] = $result[$i]["cDDDTel"] . " " . $result[$i]["cTelefone"];
			//se tiver somente celular
			} elseif ($result[$i]["cCelular"]) {
				$data[$i]["tel"] = $result[$i]["cDDDCel"] . " " . $result[$i]["cCelular"];
			}

			$cep[$i]  = Helpers::formatNumber($result[$i]["cCep"], "xxxxx-xxx");

			$data[$i]["cRazaoSocial"] = $result[$i]["cRazaoSocial"];
			$data[$i]["nCadastro"] = $result[$i]["nCadastro"];
			$data[$i]["address"] = "{$result[$i]['cRua']}, {$result[$i]['cNumero']} - {$result[$i]['cBairro']} {$result[$i]['cPontoReferencia']} {$result[$i]['cCidade']} / {$result[$i]['cEstado']} - CEP: {$result[$i]['cCep']}";

			$data[$i]["addressGoogleMap"] = $result[$i]['cRua'] . ', ' . $result[$i]['cNumero'] . ' - ' . $result[$i]['cBairro'] . ', ' . $result[$i]['cCidade'] . ' - ' . $result[$i]['cEstado'] . ', ' . $cep[$i];
			$data[$i]['cCpfCnpj'] = Helpers::formatNumber($result[$i]["cCpfCnpj"], "xx.xxx.xxx/xxxx-xx");
			$data[$i]['cEmail'] = $result[$i]['cEmail'];
			$data[$i]['nCadastro'] = $result[$i]['nCadastro'];
		}

		$data['rowCount'] = $result['rowCount'];



		return $data;
	}
}

?>