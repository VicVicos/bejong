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

                $elem .= Html::tag('div', $content . $imgWrp, ['class' => 'col-md-12 slick-elem']);
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
