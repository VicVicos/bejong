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
                <a href="' . Url::to(['/page/about']) . '">О компании</a>
            </li>
            <li>
                <a href="#">Услуги</a>
                <ul>
                    <li>
                        <a href="' . Url::to(['/page/page', 'id' => 13]) . '">Воздушные перевозки</a>
                    </li>
                    <li>
                        <a href="' . Url::to(['/page/page', 'id' => 15]) . '">Морские перевозки</a>
                    </li>
					<li>
                        <a href="' . Url::to(['/page/page', 'id' => 14]) . '">Наземные перевозки</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Сервис</a>
				<ul>
                    <li>
                        <a href="' . Url::to(['/page/page', 'id' => 20]) . '">Консолидация товара</a>
                    </li>
                    <li>
                        <a href="' . Url::to(['/page/page', 'id' => 21]) . '">Упаковка</a>
						<ul>
                    <li>
                        <a href="' . Url::to(['//page/page', 'id' => 26]) . '">Жесткая упаковка</a>
                    </li>
                    <li>
                        <a href="' . Url::to(['/page/page', 'id' => 27]) . '">Жесткий короб</a>
                    </li>
					<li>
                        <a href="' . Url::to(['/page/page', 'id' => 28]) . '">Воздушно-пузырьковая пленка</a>
                    </li>
					<li>
                        <a href="' . Url::to(['/page/page', 'id' => 29]) . '">Картонная коробка</a>
                    </li>
					<li>
                        <a href="' . Url::to(['/page/page', 'id' => 30]) . '">Мешок</a>
                    </li>
                </ul>
                    </li>
					<li>
                        <a href="' . Url::to(['/page/page', 'id' => 22]) . '">Услуги переводчика</a>
                    </li>
					<li>
                        <a href="' . Url::to(['/page/page', 'id' => 23]) . '">Выезд на фабрику</a>
                    </li>
					<li>
                        <a href="' . Url::to(['/page/page', 'id' => 24]) . '">Встреча в аэропорту</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="' . Url::to(['/page/team']) . '">Наша команда</a>
            </li>
            <li>
                <a href="' . Url::to(['/page/jobs']) . '">Вакансии</a>
            </li>
            <li>
                <a href="' . Url::to(['/page/contacts']) . '">Контакты</a>
            </li>
        </ul>
        ';
        return $wrpMenu;
	}

    public function rez ()
    {
        // $menu = [
        //     'page/about' => 'О компании',
        //     'page/uslugi' => 'Услуги',
        //     'page/services' => 'Сервис',
        //     'page/team' => 'Наша команда',
        //     'page/contacts' => 'Контакты'
        // ];
        // $li = '';
        // foreach ($menu as $link => $title) {
        //
        //     $a = Html::a($title, Url::to([$link]));
        //     $li .= Html::tag('li', $a);
        // }
        // $wrpMenu = Html::tag('ul', $li, ['class' => 'nav-menu']);
    }
}
?>
