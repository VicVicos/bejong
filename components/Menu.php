<?php
namespace app\components;

use Yii;
use yii\web\UrlManager;
use yii\base\Widget;

use yii\helpers\Html;
use yii\helpers\Url;

class Menu extends Widget {
    /**
     * Отображаем виджет
     * @method run
     * @return str html код виджета
     */
	public function run()
    {
        $wrpMenu = '
        <ul class="nav-menu">
            <li>
                <a href="' . Url::to(['page/about']) . '">О компани</a>
            </li>
            <li>
                <a href="' . Url::to(['page/uslugi']) . '">Услуги</a>
                <ul>
                    <li>
                        <a href="' . Url::to(['page/page', 'id' => 13]) . '">Статьяи</a>
                    </li>
                    <li>
                        <a href="' . Url::to(['page/page', 'id' => 13]) . '">Новая статья</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="' . Url::to(['page/services']) . '">Сервис</a>
            </li>
            <li>
                <a href="' . Url::to(['page/team']) . '">Наша команда</a>
            </li>
            <li>
                <a href="' . Url::to(['page/contacts']) . '">Контакты</a>
            </li>
        </ul>
        ';
        return $wrpMenu;
	}
}
?>
