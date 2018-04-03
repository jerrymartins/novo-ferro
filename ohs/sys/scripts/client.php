<?php
/**
* Arquivo com dados recebidos via post, dados do arquivo index.php $nCadastro
* e objetos instanciados da classe Client
* @author Jerry Martins <jerry.adriany@operahouse.com.br>
*/

use OHS\NF\Sql\SqlQuery;
use OHS\NF\Helpers\Helpers;

switch ($q) {

	case 'save':
		//dados recebidos via post
		
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

		$cCpfCnpj = Helpers::cleanVar('cCpfCnpj');		
		$cName = Helpers::cleanVar('cRazaosocial');
		$cInscricaoEstadual = Helpers::cleanVar('cInscricaoEstadual');
		$cContact = Helpers::cleanVar('cResponsavel');
		$cEmail = Helpers::cleanVar('cEmail');
		$cDDDTel = Helpers::cleanVar('cDDDTel');
		$cTelephone = Helpers::cleanVar('cTelefone');
		$cDDDCel = Helpers::cleanVar('cDDDCel');
		$cCelular = Helpers::cleanVar('cCelular');
		$cRua = Helpers::cleanVar('cRua');
		$cNumero = Helpers::cleanVar('cNumero');
		$cPontoReferencia = Helpers::cleanVar('cPontoReferencia');
		$cBairro = Helpers::cleanVar('cBairro');
		$cCep = Helpers::cleanVar('cCep');
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

		break;


	case 'list':
		//definindo tabela/s e colunas a serem retornadas
		$tableArray = ['nf_cadastro'];
		$pageInt = 1;
		$columnsArray = [
			'cCpfCnpj', 
			'cRazaoSocial',	
			'cEmail', 
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

		if (isset($nCadastro) && !empty($nCadastro)) { //exibe apenas um
			$condition = "nCadastro = ?";
			$conditionArray = [$nCadastro];
			$typeArray = ['integer'];
			$quantityInt = 1; //define LIMIT 0,1 na consulta sql

		} elseif (isset($cType) && !empty($cType)) { //lista por tipo
			$condition = "cTipo = ?";
			$conditionArray = [$cType];
			$typeArray = ['string'];
			$quantityInt = 16; //no layout existem 16 itens por página

		} elseif ((!isset($cType) || empty($cType)) && (!isset($nCadastro) || empty($nCadastro))) { //lista fornecedores por padrão
			$condition = "cTipo = ?";
			$conditionArray = ['f'];
			$typeArray = ['string'];
			$quantityInt = 16;
		}
		
		$select = new SqlQuery();
		$obj = Helpers::configObjSelect($tableArray, $columnsArray, $condition, $conditionArray, $typeArray, $quantityInt, $pageInt);

		$result = $select->select($obj);
		break;


	case 'update':
		//dados recebidos via post
		$nCadastro = Helpers::cleanVar('nCadastro');
		$cCpfCnpj = Helpers::cleanVar('cCpfCnpj');
		$cType = Helpers::cleanVar('cTipo');
		$cName = Helpers::cleanVar('cNome');
		$cContact = Helpers::cleanVar('cResponsavel');
		$cEmail = Helpers::cleanVar('cEmail');
		$cTelephone = Helpers::cleanVar('cTelefone');
		$cRua = Helpers::cleanVar('cRua');
		$cNumero = Helpers::cleanVar('cNumero');
		$cBairro = Helpers::cleanVar('cBairro');
		$cCep = Helpers::cleanVar('cCep');
		$cCidade = Helpers::cleanVar('cCidade');
		$cEstado = Helpers::cleanVar('cEstado');
		$cPassword = Helpers::newPasswordHash(Helpers::cleanVar('cSenha'));

		//armazenando os dados recebidos via post em variáveis e arrays
		$cChangeDateT = date("Y-m-d H:i:s");
		$table = 'nf_cadastro';
		$columnsArray = [
			'cCpfCnpj',
			'cDataAlteracao',
			'cTipo',
			'cRazaoSocial', 
			'cResponsavel',
			'cEmail',
			'cTelefone',
			'cRua', 
			'cNumero',
			'cBairro',
			'cCep',
			'cCidade',
			'cEstado',
			'cSenha'
		];
		$newValuesArray = [$cCpfCnpj, $cChangeDateT, $cType, $cName, $cContact, $cEmail,$cTelephone, $cRua, $cNumero, $cBairro, $cCep, $cCidade, $cEstado, $cPassword];
		$condition = ' WHERE nCadastro = ?';
		$conditionArray = [$nCadastro];
		$typeArray = ['integer'];

		//instancia da classe cliente e chamada do método updateClient para atualizar dados
		$updateQuery = new SqlQuery();
		$obj = Helpers::configObjUpdate($table, $columnsArray, $newValuesArray, $condition, $conditionArray, $typeArray);

		if ( $updateQuery->update($obj) ) {
			return $sHtml = "<p>Dados alterados.</p>";
		} else{
			return $sHtml = "<p>Dados não alterados</p>";
		}

		break;


	case 'delete':

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
		}
		break;
}

?>