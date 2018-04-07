<?php
namespace OHS\NF\Controller;

use OHS\NF\Model\Client;

class ClientController 
{
    public static function save()
    {
		$save = new Client();

		return $save->save();
    }

    public static function infoDbArray(int $nCadastro = NULL, string $cType = NULL, $search = NULL)
    {
    	$list = new Client();

      	return $list->InfoDbClientArray($nCadastro, $cType, $search);
	}
		
	public static function organizeArrayShowClient(array $result)
	{
		$organize = new Client();
		return $organize->organizeArrayShowClient($result);
	}

    public static function organizeArrayListClient(array $result)
    {
        $organize = new Client();
        return $organize->organizeArrayListClient($result);
    }

    public static function update(int $nCadastro)
    {
		$update = new Client();

		return $update->update($nCadastro);
    }

    public static function delete(int $nCadastro)
    {
		$delete = new Client();

		return $delete->delete($nCadastro);
  	}
  
  	public static function edit($result)
  	{
    	$array = new Client();
    
    	return $array->edit($result);
  	}

    public static function login(string $email, string $password)
    {
        $login = new Client();
        return $login->login($email, $password);
    }
       
}

?>