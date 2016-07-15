<?php
namespace app\components;
// Для подключения потов
use yii\base\Widget;
// Прочие модели
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Article;

class Blocks extends Widget {
    /**
     * Отображаем виджет
     * @method run
     * @return str html код виджета
     */
    public $id;
	public function run()
    {
        switch ($this->id) {
            case 'block':
                return $this->block();
                break;
            case 'slide':
                return $this->slider();
                break;
            case 'review':
                return $this->review();
                break;
            default:
                return false;
                break;
        }
	}
    /**
     * Blocks
     * @method block
     * @return str html
     */
    private function block ()
    {
        // Выборка из модели постов
		$posts = Article::find()->where(['type' => 'block', 'status' => 'active'])->limit(4)->all();
        $elem = '';
        if (is_object($posts[0])) {
            foreach ($posts as $post) {
                // img
                $post->img = 'img/' . $post->img;
                $img = Html::tag('img', null, ['src' => $post->img, 'alt' => $post->title, 'title' => $post->title]);
                // Content
                $title = Html::tag('p', $post->title, ['class' => 'title first-bold']);
                $text = Html::tag('div', $post->intro, ['class' => 'content']);
                $a = Html::a('Подробнее', Url::to(['page/page', 'id' => $post->link]), ['class' => 'btn btn-default-1']);
                $content = Html::tag('div', $title . $text . $a);

                $elem .= Html::tag('div', $img . $content, ['class' => 'col-sm-6']);
            }
            return Html::tag('div', $elem, ['class'=>'row types']);
        } else {
            return '';
        }
    }
    /**
     * Slider
     * @method slider
     * @return str html
     */
    private function slider()
    {
        $posts = Article::find()->where(['type' => 'slide', 'status' => 'active'])->all();

        if (is_object($posts[0])) {
$html = <<<EOL
<div class="row slider">
    <div class="col-md-12 slick-elem slide-1">
        <div class="slick-content">
            <p id="title-1" class="title">{$posts['0']->title}</p>
            <p id="text-1">{$posts['0']->intro}</p>
            <a id="link-1" href="{$posts['0']->link}" class="btn btn-default-1">Подробнее</a>
        </div>
        <div class="slick-img">
            <img id="sudno" class="absolute" src="img/{$posts[0]->img}" alt="{$posts[0]->title}" title="{$posts[0]->title}">
        </div>
    </div>
    <div class="col-md-12 slick-elem slide-2">
        <div class="slick-content">
            <p id="title-2" class="title">{$posts['1']->title}</p>
            <div id="text-2">{$posts['1']->intro}</div>
            <a id="link-2" href="{$posts['1']->link}" class="btn btn-default-1">Подробнее</a>
        </div>
        <div class="slick-img">
            <img id="cloud" class="absolute" src="img/slider/clouds.png" alt="{$posts['1']->title}" title="{$posts['1']->title}">
            <img id="air" class="absolute" src="img/{$posts['1']->img}" alt="{$posts['1']->title}" title="{$posts['1']->title}">
        </div>
    </div>
    <div class="col-md-12 slick-elem slide-3">
        <div class="slick-content">
            <p id="title-3" class="title">{$posts['2']->title}</p>
            <div id="text-3">{$posts['2']->intro}</div>
            <a id="link-3" href="{$posts['2']->link}" class="btn btn-default-1">Подробнее</a>
        </div>
        <div class="slick-img">
            <img id="auto" class="absolute" src="img/slider/truck_2.png" alt="{$posts['2']->title}" title="{$posts['2']->title}">
            <img id="gruz" class="absolute" src="img/slider/truck_1.png" alt="{$posts['2']->title}" title="{$posts['2']->title}">
            <img id="guarantee" class="absolute" src="img/slider/guarantee.png" alt="{$posts['2']->title}" title="{$posts['2']->title}">
        </div>
    </div>
</div>
EOL;
            return $html;
        } else {
            return '';
        }
    }
    private function sliderRez()
    {
        $posts = Article::find()->where(['type' => 'slide', 'status' => 'active'])->all();
        $i = 1;
        if (is_object($posts[0])) {
            $elem = '';
            foreach ($posts as $post) {
                $post->link = empty($post->link) ? '#' : $post->link;
                $post->img = 'img/' . $post->img;
                // Content
                $title = Html::tag('p', $post->title, ['class' => 'title']);
                $text = Html::tag('p', $post->intro);
                $a = Html::a('Подробнее', Url::to($post->link), ['class' => 'btn btn-default-1']);
                $content = Html::tag('div', $title . $text . $a, ['class' => 'slick-content']);
                // Img
                $img = Html::tag('img', null, ['src' => $post->img, 'alt' => $post->title, 'title' => $post->title]);
                $imgWrp = Html::tag('div', $img, ['class' => 'slick-img']);

                $elem .= Html::tag('div', $content . $imgWrp, ['class' => 'col-md-12 slick-elem slide-' . $i]);
                $i++;
            }
            return Html::tag('div', $elem, ['class'=>'row slider']);
        } else {
            return '';
        }
    }
    private function review ()
    {
        $posts = Article::find()->where(['type' => 'review', 'status' => 'active'])->orderBy('id DESC')->all();
        if (is_object($posts[0])) {
            $elem = '';
            foreach ($posts as $post) {
                if ($post->img) {
                    $post->img = 'img/' . $post->img;
                } else {
                    $post->img = 'http://fakeimg.pl/290x290/?text=No_Foto';
                }
                $img = Html::tag('img', null, ['src' => $post->img, 'alt' => $post->title, 'title' => $post->title]);
                $wrpImg = Html::tag('div', $img, ['class' => 'img-circle']);
                $wrpImg = Html::tag('div', $wrpImg, ['class' => 'col-sm-3']);
                // Content
                $title = Html::tag('div', $post->title, ['class' => 'title']);
                $position = Html::tag('div', $post->intro, ['class' => 'position']);
                $text = Html::tag('div', $post->text, ['class' => 'text']);
                $content = Html::tag('div', $title . $position . $text, ['class' => 'col-sm-7']);

                $elem .= Html::tag('div', $wrpImg . $content, ['class' => 'row review']);
            }
            return Html::tag('div', $elem, ['class' => 'slick-reviews']);
        } else {
            return '';
        }
    }
}
?>
