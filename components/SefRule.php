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
        switch ($route) {
            case 'site/index':
                return "";
                break;
            case 'page/about':
                return 'about';
                break;
            case 'page/uslugi':
                return 'page/uslugi';
                break;
            case 'page/services':
                return 'page/services';
                break;
            case 'page/team':
                return 'page/team';
                break;
            case 'page/contacts':
                return 'page/contacts';
                break;
            // default:
            //     return '';
            //     break;
        }
        // if (isset($params["mode"])) {
        //     switch ($params["mode"]) {
        //         case 'application':
        //             return 'site/contact/application';
        //             break;
        //         case 'cargo':
        //             return '';
        //             break;
        //         default:
        //             return "site/contact?mode=".$params["mode"];
        //             break;
        //     }
        //
        // }
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
    /**
     * [getAlias description]
     * @method getAlias
     * @param  [type]   $id [description]
     * @return [type]       [description]
     */
    private function getAlias ($id)
    {
        return Article::find()->where(['id' => $id])->one();
    }
}

?>
