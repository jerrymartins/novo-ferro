<?php
namespace OHS\NF\Controller;

use OHS\NF\Model\Item;

class ItemController 
{
	public static function save()
	{
		$save = new Item();

		return $save->save();
	}

	public static function infoDbArray(int $nItem = NULL, int $nFkDono = NULL, string $iCategory = NULL, string $iSubCategory = NULL, string $iEstado = NULL, string $iPreco = NULL, $search = NULL)
	{
		$list = new Item();

		return $list->list($nItem, $nFkDono, $iCategory, $iSubCategory, $iEstado, $iPreco, $search);
	}

	public static function update(int $nCadastro)
	{
		$update = new Item();

		return $update->update($nCadastro);
	}

	public static function delete(int $nCadastro)
	{
		$delete = new Item();

		return $delete->delete($nCadastro);
	}
  
	public static function edit($result)
	{
	  $array = new Item();
	
	  return $array->edit($result);
	}

	public static function newSubCategory()
	{
		$saveSubCategory = new Item();

		return $saveSubCategory->newSubCategory();
	}

	public static function getSubCatArray($cat)
	{
	  $array = new Item();
	
	  return $array->getSubCatArray($cat);
	}

	public static function getSubCatAdminArray()
	{
	  $array = new Item();
	
	  return $array->getSubCatAdminArray();
	}

	public static function deleteSubCategory(int $idSubCategory)
	{
		$delete = new Item();
	
		return $delete->deleteSubCategory($idSubCategory);
	}

	public static function updateFkItem(int $fkSubCategory)
	{
		$update = new Item();

		return $update->updateFkItem($fkSubCategory);
	}

}

?>