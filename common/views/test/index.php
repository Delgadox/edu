<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<h1>Список созданных вами тестов</h1>

<div class="body">


<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <!-- --------Начало блоков---------- -->
                    <?php
                    if ($posts == null){
                        echo "У данного пользователя нету тестов";
                    }
                    foreach ($posts as $post){
                        echo '                    
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div>
                                <h3 class="x_title">'. $post['title'].'</h3>
                            </div>
                            <div class="x_content">
                                <span class="text">Описание: '.$post['description'].'</span>
                            </div>
                            <div class="x_content">
                                <span>Дата: '.$post['begin_at'].'</span>
                            </div>
                            <br>
                            <div class="x_content rightbut">
                                <a href="'.Url::to(['/common/test/list', 'id' => $post['id']]).'" class="btn btn-primary right">Открыть</a>
                            </div>
                        </div>
                    </div>';
                    }
                    ?>
                    <div class="buttonPos">
                    <?= LinkPager::widget([
                        'pagination' => $pages,
//                        'options' => ['class' => 'paginationplus']
                    ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
