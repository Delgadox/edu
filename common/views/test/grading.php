<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

?>
<h1>test/list</h1>

<div class="body">


<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_content">
                <!----------Начало описания------------>
                <?php
                    echo '                    
                <div class="col-bg-5">
                    <div class=x_title">
                        <h3 class="x_title">'. $upload['title'].'</h3>
                    </div>
                    <div class="x_content left">
                        <span>Описание: '.$upload['description'].'</span>
                    </div>
                    <div class="x_content left">
                        <span>Дата: '.$upload['created_at'].'</span>
                    </div>
                    <div class="x_content left">
                        <span>Название теста: '.$upload->testHasFile[0]->test['title'].'</span>
                    </div>
                <!----------Конец описания------------>
                
                <!----------Начало файла------------>
                    <div class="x_panel">
                        <div class="bs-example" data-example-id="simple-jumbotron">
                            <div class="jumbotron">
                            <span>Тут могла быть ваша реклама</span>
                            </div>
                        </div>
                    </div>
                </div>'; ?>
                <!----------Конец файла------------>
                
                <!----------Начало нижней панели------------>
                <?php  echo '<div class="x_panel">'; ?>
                    <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'grade_id')->widget(Select2::classname(), [
                            'hideSearch' => true,
                            'data' => $items,
                            'options' => ['placeholder' => 'Выберите оценку...'],
                            'pluginOptions' => [
                            'allowClear' => true
                            ],
                            ]) ?>

                        <div class="left">
                            <a class="btn btn-danger" href="'.Url::to(['/common/test/list', 'id'=>$_GET['save']]) .'">Отмена</a>
                        </div>

                        <div class="form-group left">
                            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                <?php  echo '</div>'; ?>
                <!----------Начало нижней панели------------>
            </div>
        </div>
    </div>
</div>


</div>
