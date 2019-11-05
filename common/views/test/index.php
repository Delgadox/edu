<?php
/* @var $this yii\web\View */
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
                    foreach ($test as $tests){
                        echo '                    
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div>
                                <h3>'. $tests['title'].'</h3>
                            </div>
                            <div>
                                <h3>'. $tests[''].'</h3>
                            </div>  
                            <div>
                                <h3>'. .'</h3>
                            </div>
                            <div>
                                <h3>'. .'</h3>
                            </div>
                            <div>
                                <h3>'. .'</h3>
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
