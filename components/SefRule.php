<?php
namespace app\components;

use yii\web\UrlRule;

use app\models\Sef;

class SefRule extends UrlRule
{
    // Базовая часть
	public $connectionID = 'db';

	public function init()
	{
		if ($this->name === null) $this->name = __CLASS__;
	}
    // *************

	public function createUrl($manager, $route, $params) {
        // При главной странице
        // var_dump($manager);
        // var_dump($route);
        // var_dump($params);
		if ($route == "page/index") {
			if (isset($params["page"])) return "?page=".$params["page"];
			else return "";
		} elseif ($route == "page/about") {
            // var_dump(1);
            if (isset($params["page"])) return "?page=".$params["page"];
			else return "about";
        }

        // Перебираем атрибуты в params и убираем последний &
		// if (count($params)) {
		// 	$link .= "?";
		// 	$page = false;
		// 	foreach ($params as $key => $value)
		// 	{
		// 		if ($key == "page")
		// 		{
		// 			$page = $value;
		// 			continue;
		// 		}
		// 		$link .= "$key=$value&";
		// 	}
		// 	$link = substr($link, 0, -1);
		// }
        // Берём из базы значение алиасы из БД и формируем строку
		// $sef = Sef::find()->where(["link" => $link])->one();
		// if ($sef) {
		// 	if ($page) return $sef->link_sef.".html?page=$page";
		// 	else return $sef->link_sef.".html";
		// }
		// return false;
	}
    /**
     * [parseRequest description]
     * @param  [type] $manager [description]
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
	public function parseRequest($manager, $request)
	{
		$pathInfo = $request->getPathInfo();
		if (preg_match('%^(.*)\.html$%', $pathInfo, $matches))
		{

			$link_sef = $matches[1];
			$sef = Sef::find()->where(["link_sef" => $link_sef])->one();
			if ($sef) {
				$link_data = explode("?", $sef->link);
				$route = $link_data[0];
				$params = array();
				if ($link_data[1])
				{
					$temp = explode("&", $link_data[1]);
					foreach ($temp as $t)
					{
						$t = explode("=", $t);
						$params[$t[0]] = $t[1];
					}
				}
				return [$route, $params];
			}
		}
		return false;
	}
}

?>
