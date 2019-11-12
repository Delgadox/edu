<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
?>
<h1>test/index</h1>

<div class="body">


<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <!-- --------Начало блоков---------- -->
                    <?php
                    if ($test == null){
                        echo "У данного пользователя нету тестов";
                    }
                    foreach ($test as $tests){
                        echo '                    
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div>
                                <h3 class="x_title">'. $tests['title'].'</h3>
                            </div>
                            <div class="x_content">
                                <span>Описание: '.$tests['description'].'</span>
                            </div>
                            <div class="x_content">
                                <span>Дата: '.$tests['begin_at'].'</span>
                            </div>
                            <div class="x_content right">
                                <a href="'.Url::to(['/common/test/list', 'id' => $tests['id']]).'" class="btn btn-success right">Открыть</a>
                            </div>
                        </div>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
