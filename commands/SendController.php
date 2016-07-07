<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\Mailer;

/**
 * Test controller
 * %progdir%\modules\php\%phpdriver%\php-win.exe -c %progdir%\userdata\temp\config\php.ini -q -f %sitedir%\bejong.loc\cron.php
 */
 class SendController extends Controller
 {
     public function actionIndex()
     {
        $now = new \DateTime('now');
        $now = $now->format('Y-m-d');
        $mail = new Mailer();
        $data = $mail->findByDate($now);

        if (!empty($data)) {
            foreach ($data as $key => $item) {
                $res = Yii::$app->mailer->compose('payment',['data' => $item])
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setTo($item['email'])
                ->setSubject('Уведомление о платеже')
                ->send();
                if ($res) {
                    echo "Send?";
                } else {
                    echo "((";
                }
            }
        } else {

        }
     }
 }
