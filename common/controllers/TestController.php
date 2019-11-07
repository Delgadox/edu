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
        $test = test::find()->where(['created_by'=> $_SESSION['__id']])->asArray()->all();
        return $this->render('index',['test'=>$test]);
    }

    public function actionList()
    {
        if ($_SESSION['__id'] == null){
            return $this->redirect(Url::to(['../user/login']));
        }
        $uploads = testHasAnswerFileUpload::find()->where(['test_id'=>$_GET['id']])->asArray()->all();
        $results=array();
        foreach ($uploads as $upload){
            $results[]=$upload->answerfileupload;
        }
        print_r ($results);

        return $this->render('list',['uploads'=>$uploads]);
    }
}
