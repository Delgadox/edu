<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
?>
<h1>Список файлов отправленных на тест</h1>

<div class="body">


<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="left">
                <a class="btn btn-primary" href="<?php echo Url::to(['/common/test/index']) ?>">Назад</a>
            </div>
            <div class="x_content">
                <div class="row">
                    <!-- --------Начало блоков---------- -->
                    <?php
                    if ($results == null){
                        echo "Не один из пользователей не отправил работу к данному тесту";
                    }else{
                        foreach ($results as $result){
                            echo '                    
                    <div class="col-md-55">
                        <div class="thumbnail bheight">
                            <div class="sheight">
                                <div>
                                    <h3 class="x_title">'. $result['title'].'</h3>
                                </div>
                                ';
                            if($result['description']!=null){
                                echo '                            
                                    <div class="x_content">       
                                        <span>Описание: '.$result['description'].'</span>
                                    </div>';
                            };
                            echo '
                                <div class="x_content">
                                    <span>Дата: '.$result['created_at'].'</span>
                                </div>
                                <div class="x_content">
                                    <span>Имя Ученика: '.$result->createdBy['username'].'</span>
                                </div>
                                <div class="x_content">
                                    <span>Оценка: '.$result->testHasFile[0]->grade['grade_json'].'</span>
                                </div>
                            </div>
                            <div class="x_content right">
                                <a href="'.Url::to(['/common/test/grading', 'id' => $result['id'],'save' => $saved]).'" class="btn btn-primary right">Открыть</a>
                            </div>
                        </div>
                    </div>
                    ';}
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
