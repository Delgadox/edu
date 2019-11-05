<?php

namespace app\common\controllers;
use app\common\models\Test;
use app\common\models\TestHasAnswerFileUpload;
use yii\helpers\Url;


class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if ($_SESSION['__id'] == null){
            return $this->redirect(Url::to(['../user/login']));
        }
        $upload = testHasAnswerFileUpload::find()->where()
        $test = test::find()->where(['created_by'=> $_SESSION['__id']])->asArray()->all();
        return $this->render('index',['test'=>$test]);
    }

}
