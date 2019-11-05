<?php

namespace app\common\controllers;
use yii\helpers\Url;

use yii\web\Controller;

/**
 * Default controller for the `Teacher` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect(Url::to(['/common/test/index']));
    }
}
