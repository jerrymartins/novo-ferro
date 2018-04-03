<?php
/**
 * Classe resposnável por realizar conexão ao banco de dados
 * @author Jerry Martins <zeroumbin@gmail.com>
 *
*/

namespace OHS\NF\Sql;

use OHS\NF\Sql\SqlConnInterface;

class SqlConnect implements SqlConnInterface
{
	private static $conn;

	// Impedir instanciação
	private function __construct() 
	{

	}

	// Impedir clonar
	private function __clone() 
	{

	}

	//Impedir utilização do Unserialize
	private function __wakeup() 
	{

	}

	public static function doConnect() 
	{

		if(!isset(self::$conn)) {

			try {
				self::$conn = new \PDO("mysql:host=".SqlConnInterface::HOST.";dbname=".SqlConnInterface::DBNAME, SqlConnInterface::USER, SqlConnInterface::PASSWD, array(\PDO::ATTR_PERSISTENT => true));

				self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

				return self::$conn;

			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		return self::$conn;
	}
}

?>