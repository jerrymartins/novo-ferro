<?php
/**
 * classe personalizada instanciada sempre que um erro ocorrer no sistema
 */

namespace OHS\NF\Helpers;

# com namespaces, é necessário colocar \ antes de classes nativas do php, para que seja procurada no core
class HelpersException extends \Exception  
{
	# email de quem deve receber o aviso de erro
	private $mailAdmin = OHS_EMAILWEBMASTER;
	private $logFile;

	function __construct($message = null, $code = 0, $logFile = '')
	{
		parent::__construct($message, $code);

		$dir = getcwd()."/ohs/sys/logs/";

		if ($logFile) {
			$this->logFile = $dir . $logFile;
		} else {
			$this->logFile = $dir . "error_log.txt";
		}		

		$data = date('Y-m-d H:i:s');

		error_log( 
			"\n ======== $data =========" .
			"\n Erro no arquivo : " . $this->getFile().
			"\n Linha:      " . $this->getLine() .
			"\n Mensagem:   " . $this->getMessage() .
			"\n Codigo:     " . $this->getCode() .
			"\n Trace(str): " . $this->getTraceAsString() 
			, 3
			, $this->logFile
		);
	}

	public function getAdminMail()
	{
		return $this->mailAdmin;
	}
}

?>