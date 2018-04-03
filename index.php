<?php
/**
 * Arquivo de entrada no sistema Novo Ferro
 */

#utilidades
use OHS\NF\Helpers\Helpers;

// config
// e-mail que recebe erros e exceções
define('OHS_EMAILWEBMASTER', 'zeroumbin@gmail.com');
// caminho para a raiz do sistema
define('OHS_PATH', getcwd());
// ativar log de problemas menos severos? Log de erros mais sérios devem ser criados sempre, independente dessa constante
define('OHS_DEBUG', true);

require_once 'vendor/autoload.php';


$p = Helpers::cleanVar('p');
$q = Helpers::cleanVar('q');

// saídas HTML do sistema incrementam essa variável
$sHtml = '';

switch ($p) {
	case 'cadastro':

		switch ($q) {
			case '':
			case 'form':
				include(OHS_PATH."/ohs/sys/scripts/clientForm.php");
				break;

			case 'save':
				include(OHS_PATH."/ohs/sys/scripts/client.php");
				break;

			case 'edit':
				$nCadastro = Helpers::cleanVar('nC');
				$q = 'list';
				include(OHS_PATH."/ohs/sys/scripts/client.php");
				include(OHS_PATH."/ohs/sys/scripts/clientForm.php");
				break;

			case 'update':
				include(OHS_PATH."/ohs/sys/scripts/client.php");
				break;

			case 'delete':
				//no momento recebe o nCadastro via get
				$nCadastro = Helpers::cleanVar('nC');
				include(OHS_PATH."/ohs/sys/scripts/client.php");
				break;

			case 'formItem':
				$q = 'save';
				$fk_dono =  28; //Helpers::cleanVar('nC'); // id de um cliente, testando com 28
				include(OHS_PATH."/ohs/sys/scripts/item.php");
				break;
		}

		break;
		
	case 'show':
		switch($q) {
			case 'f':
				if($nCadastro = Helpers::cleanVar('nC')) {
					$q = 'list';
					include(OHS_PATH."/ohs/sys/scripts/client.php");
					include(OHS_PATH."/ohs/sys/scripts/clientShowFornecedor.php");
				} elseif (!isset($_POST['nC']) && !isset($_GET['nC'])) {
					$q = 'list';
					include(OHS_PATH."/ohs/sys/scripts/client.php");
					include(OHS_PATH."/ohs/sys/scripts/clientListFornecedor.php");
				}
				
				break;
			
			case 'o':
				$q = 'list';
				$cType = 'o';
				include(OHS_PATH."/ohs/sys/scripts/client.php");
				include(OHS_PATH."/ohs/sys/scripts/clientListOficina.php");
				break;

			case 'i':
				$q = 'list';
				$iCategory = Helpers::cleanVar('category');
				include(OHS_PATH."/ohs/sys/scripts/item.php");
				include(OHS_PATH."/ohs/sys/scripts/itemList.php");
				break;
		}
		
}

echo $sHtml;

?>