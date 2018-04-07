<?php
/**
 * Interface responsável por armazenar dados e definir assinatura do método da conexão ao banco de dados
 * @author Jerry Martins <zeroumbin@gmail.com>
 *
*/

namespace OHS\NF\Model\Sql;

interface SqlConnInterface
{
	#para uso localhost
	const HOST = '';
	const USER = '';
	const PASSWD = '';
	const DBNAME = '';

	public static function doConnect();
}

//echo Conn::HOST;   isso retorna o valor da constante, verificar forma de resolver isto

?>