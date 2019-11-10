<?php

namespace app\common\controllers;
use app\common\models\AnswerFileUpload;
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
        $uploads = testHasAnswerFileUpload::find()->where(['test_id'=>$_GET['id']])->all();
        $results=array();
//        print_r($uploads);
        foreach ($uploads as $upload){
            $results[]=$upload->afu;
        }
        $saved = $_GET['id'];

        return $this->render('list',['results'=>$results, 'saved'=>$saved]);
    }

    public function actionGrading()
    {
        if ($_SESSION['__id'] == null){
            return $this->redirect(Url::to(['../user/login']));
        }
        $upload = AnswerFileUpload::findOne(['id'=>$_GET['id']]);
//        ->test['title']
        return $this->render('grading', ['upload'=>$upload, 'TestName'=>$TestName]);
    }
}
