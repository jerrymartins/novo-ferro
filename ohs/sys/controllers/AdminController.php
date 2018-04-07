<?php
namespace OHS\NF\Controller;

use OHS\NF\Model\Admin;

class AdminController 
{
	public static function configInfoArray()
	{
		$info = new Admin();

		return $info->configInfoArray();
	}

	public static function configUpdate()
	{
		$update = new Admin();

		return $update->configUpdate();
	} 

	public static function categoryUpdate()
	{
		$update = new Admin();

		return $update->categoryUpdate();
	}

	public static function pageUpdateQS()
	{
		$update = new Admin();

		return $update->pageUpdateQS();	
	}
}

?>