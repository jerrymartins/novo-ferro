<?php
namespace OHS\NF\Controller;

use OHS\NF\Model\Page;

class PageController
{
	public static function getPageContent(int $nPage)
	{
		if ($nPage) {
			$select = new Page();
			$result = $select->getPageContent($nPage);

			return $result;
		}

	}
}

?>