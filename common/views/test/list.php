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
//                    foreach ($uploads as $upload){
                        echo '                    
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div>
                                <h3 class="x_title">'. $uploads['title'].'</h3>
                            </div>
                            <div class="x_content">
                                <span>'. $uploads[''].'</span>
                            </div> 
                            <div class="x_content">
                                <span>Описание</span>
                            </div>
                            <div class="x_content">
                                <span>Дата</span>
                            </div>
                            <div class="x_content right">
                                <a href="'.Url::to(['/common/test/grading', 'id' => $uploads['id']]).'" class="btn btn-success right">Открыть</a>
                            </div>
                        </div>
                    </div>';
//                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
