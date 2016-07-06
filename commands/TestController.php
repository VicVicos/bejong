<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

/**
 * Test controller
 * %progdir%\modules\php\%phpdriver%\php-win.exe -c %progdir%\userdata\temp\config\php.ini -q -f %sitedir%\bejong.loc\cron.php
 */
 class TestController extends Controller
 {
     public function actionIndex()
     {
        $res = Yii::$app->mailer->compose('application')
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo('developitb@yandex.ru')
            ->setSubject('test cron')
            ->send();
        echo $res;
        echo "test";
     }
 }
