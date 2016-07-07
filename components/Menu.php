<?php
namespace app\components;

use Yii;
use yii\web\UrlManager;
// Для подключения потов
use yii\base\Widget;

// Прочие модели
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
        $url = new UrlManager();
        $action = '';
        $menu = [
            'page/about' => 'О компании',
            'page/uslugi' => 'Услуги',
            'page/services' => 'Сервис',
            'page/team' => 'Наша команда',
            'page/contacts' => 'Контакты'
        ];
        $li = '';
        foreach ($menu as $link => $title) {

            $a = Html::a($title, Url::to([$link]));
            $li .= Html::tag('li', $a);
        }
        $wrpMenu = Html::tag('ul', $li, ['class' => 'nav-menu']);
        return $wrpMenu;
	}
}
?>
